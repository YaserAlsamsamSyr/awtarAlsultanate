<?php

namespace App\Http\Controllers;

// use Telegram\Bot\Laravel\Facades\Telegram;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\SentMsgMail;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Country;
use App\Models\User;
use Carbon\Carbon;
use Exception;

class HomeController extends Controller
{
        public function home() {
            try{
                $pros = Product::inRandomOrder()->where('isDeleted',false)->orderBy('id', 'desc')->limit(5)->with('imgs')->get();
                $lang=session('lang');
                $category='';
                if($lang=='ar')
                     $category=Category::select('id','category','img')->where('isDeleted',false)->get();
                else
                     $category=Category::select('id','enName','img')->where('isDeleted',false)->get();
                if (!empty($pros) && count($pros)>=5) {
                    $pro=Product::where('isDeleted',false)->where('name','=','عطر الروح')->orWhere('name', '=', 'نهاوند')->orWhere('name', '=', 'عجم')->orWhere('name', '=', 'هزام')->get();
                    if(count($pro)==4){
                        $alroh='';
                        $alrohimg='';
                        $alrohname='';
                        $slider=array();
                        foreach($pro as $p){
                             if($p->name=="عطر الروح"){
                                   $alroh=$p->id;
                                   $alrohimg=($p->imgs()->first())->img;
                                   if($lang=='ar')
                                        $alrohname=$p->name;
                                   else
                                        $alrohname=$p->enName;
                             } else{
                                if($lang=='ar')
                                    array_push($slider,['id'=>$p->id,'name'=>$p->name,'desc'=>$p->desc]);
                                else
                                    array_push($slider,['id'=>$p->id,'name'=>$p->enName,'desc'=>$p->enDesc]);
                            }
                        }
                        return view('awtar.index',['categories'=>$category,'alrohname'=>$alrohname,'alrohimg'=>$alrohimg,'alrohId'=>$alroh,'slider'=>$slider,'products'=>$pros]);
                    }
                }
                return view('awtar.index',['categories'=>[],'alrohname'=>'','alrohimg'=>'','alrohId'=>'','slider'=>[],'products'=>[]]);
            } catch(Exception $err){
                return response()->json(['message'=>$err->getMessage()]);
            }
        }
    
        public function login(){
            try{
                if(Auth::user())
                     return redirect()->route('profile.edit');
                return redirect()->route('login');
            } catch(Exception $err){
                return response()->json(['message'=>$err->getMessage()]);
            }
        }

        public function addToCard(Request $req){
            try{
                $pro=Product::find($req->proId);
                if(!$pro)
                    return response()->json(['message'=>"this product not found"],404);
                $newPro=[
                    'id'=>$pro->id,
                    'img'=>$pro->imgs[0]->img,
                    'name'=>session('lang')=='ar'?$pro->name:$pro->enName,
                    'price'=>$pro->newPrice==0?$pro->oldPrice:$pro->newPrice,
                    'quantity'=>$req->quantity
                ];
                if ($req->session()->has('card')) {
                    $count=$req->session()->get('quan');
                    $count+=$req->quantity;
                    $prosArray = $req->session()->get('card');
                    array_push($prosArray,$newPro);
                    $req->session()->put('card',$prosArray);
                    $req->session()->put('quan',$count);
                }else{
                    $req->session()->put('card',[$newPro]);
                    $req->session()->put('quan',$req->quantity);
                }
                return redirect(config('APP_URL')."product/".$req->proId);
            } catch(Exception $err){
                return response()->json(['message'=>$err->getMessage()],500);
            }
        }

        public function viewCard(){
            try {    
                $lang=session('lang');
                $category='';
                if($lang=='ar')
                     $category=Category::select('id','category','img')->where('isDeleted',false)->get();
                else
                     $category=Category::select('id','enName','img')->where('isDeleted',false)->get();
                return view('awtar.shippingCard',['categories'=>$category]);
            
            } catch(Exception $err){
                return response()->json(['message'=>$err->getMessage()]);
            }
        }

        public function removeFromCard(Request $req,int $id){
            try{
                $prosArray = $req->session()->get('card');
                $count=$req->session()->get('quan');
                for($i=0;$i<count($prosArray);$i++)
                        if($prosArray[$i]['id']==$id){
                             $count-=$prosArray[$i]['quantity'];
                              unset($prosArray[$i]);
                              $prosArray = array_values($prosArray);
                              break;
                        }
    
                $req->session()->forget('card');
                $req->session()->put('card',$prosArray);
                $req->session()->forget('quan');
                $req->session()->put('quan',$count);
                
                return redirect()->route('viewCard');
            } catch(Exception $err){
                return response()->json(['message'=>$err->getMessage()]);
            }
        }

        public function updateCard(Request $req){
            try{
                $prosArray = $req->session()->get('card');
                $count=$req->session()->get('quan');
                $x='';$y='';
                for($i=0;$i<count($prosArray);$i++){
                    $y=$req->input("pro".$prosArray[$i]['id']."quan");
                    $count-=$prosArray[$i]['quantity'];
                    $count+=$y;
                    $prosArray[$i]['quantity']=$y;
                }
    
                $req->session()->forget('card');
                $req->session()->put('card',$prosArray);
                $req->session()->forget('quan');
                $req->session()->put('quan',$count);
                
                return redirect()->route('viewCard');
            } catch(Exception $err){
                return response()->json(['message'=>$err->getMessage()]);
            }     
        }

        public function confirmOrder(){
            try{    
                $lang=session('lang');
                $category='';
                $countries='';
                if($lang=='ar') {
                     $category=Category::select('id','category')->where('isDeleted',false)->get();
                     $countries=Country::select('name','price_id')->with(
                        ['price' => function ($query) {
                            $query->select('id','vat', 'delivery');
                        }]
                    )->get();
                } else {
                    $category=Category::select('id','enName')->where('isDeleted',false)->get();
                    $countries=Country::select('enName','price_id')->with(
                       ['price' => function ($query) {
                           $query->select('id','vat', 'delivery');
                       }]
                    )->get();
                }
                return view('awtar.confirmOrder',['categories'=>$category,'countries'=>$countries]); 
            } catch(Exception $err){
                return response()->json(['message'=>$err->getMessage()]);
            }
        }
        
        public function myOrders(){
            try{
                $myCustomers=User::find(auth()->id())->customers()->latest()->paginate(10);
                $lang=session('lang');
                $category='';
                if($lang=='ar')
                     $category=Category::select('id','category')->where('isDeleted',false)->get();
                else
                     $category=Category::select('id','enName')->where('isDeleted',false)->get();
                if (sizeof($myCustomers)==0)
                     return view('awtar.order',['myCustomers'=>[],'orders'=>[],'categories'=>$category]);
                $allOrder=[];
                    $allOrder=array($myCustomers[0]->products()->select('enName','name')->get());
                    for($i=1;$i<count($myCustomers);$i++){
                       $pros=$myCustomers[$i]->products()->select('enName','name')->get();
                       array_push($allOrder,$pros);
                    }
                return view('awtar.order',['myCustomers'=>$myCustomers,'orders'=>$allOrder,'categories'=>$category]);
            } catch(Exception $err){
                return response()->json(['message'=>$err->getMessage()]);
            }
        }

        public function contactUs(){
            try{
                $lang=session('lang');
                $category='';
                if($lang=='ar')
                     $category=Category::select('id','category')->where('isDeleted',false)->get();
                else
                     $category=Category::select('id','enName')->where('isDeleted',false)->get();
                return view('awtar.contactUs',['categories'=>$category]);
            } catch(Exception $err){
                return response()->json(['message'=>$err->getMessage()]);
            }
        }
        
        public function termAndCondition(){
            try{
                $lang=session('lang');
                $category='';
                if($lang=='ar')
                     $category=Category::select('id','category')->where('isDeleted',false)->get();
                else
                     $category=Category::select('id','enName')->where('isDeleted',false)->get();
                return view('awtar.termsAndConditions',['categories'=>$category]);
            } catch(Exception $err){
                return response()->json(['message'=>$err->getMessage()]);
            }
        }

        public function policy(){
            try{
                $lang=session('lang');
                $category='';
                if($lang=='ar')
                     $category=Category::select('id','category')->where('isDeleted',false)->get();
                else
                     $category=Category::select('id','enName')->where('isDeleted',false)->get();
                return view('awtar.policy',['categories'=>$category]);
            } catch(Exception $err){
                return response()->json(['message'=>$err->getMessage()]);
            }
        }

        public function contactsDownload(){
            try{
                $file= public_path(). "/files/AwtarContacts.pdf";
                $headers = array(
                          'Content-Type: application/pdf',
                        );
                return response()->download($file, 'AwtarContacts.pdf', $headers);
            } catch(Exception $err){
                return response()->json(['message'=>$err->getMessage()]);
            }
        }
        
        public function company(){
            try{
                $fileName='';
                $locale=session('lang');
                if($locale=="ar")
                    $fileName='AwtarOverview_ar.pdf';
                else
                    $fileName='AwtarOverview_en.pdf';
                $file= public_path(). "/files/".$fileName;
                $headers = array(
                          'Content-Type: application/pdf',
                        );
                return response()->download($file, $fileName, $headers);
            } catch(Exception $err){
                return response()->json(['message'=>$err->getMessage()]);
            }
        }

        public function langToggle(Request $req){
            try{
                if (session()->has('quan'))
                    $req->session()->forget('quan');
                if (session()->has('card'))
                    $req->session()->forget('card');
                $locale=session('lang');
                if($locale=="en")
                    $locale='ar';
                else
                    $locale="en";
                $req->session()->put('lang', $locale);
                return redirect()->route('index');
            } catch(Exception $err){
                return response()->json(['message'=>$err->getMessage()]);
            }
        }

        public function continueShop(){
            try{
                $lang=session('lang');
                $category='';
                if($lang=='ar')
                     $category=Category::select('id','category')->where('isDeleted',false)->first();
                else
                     $category=Category::select('id','enName')->where('isDeleted',false)->first();
                return redirect('/product?id='.$category->id);
            }catch( Exception $err){
                return response()->json(['message'=>$err->getMessage()]);
            }
        }

        public function confirmOrderPost(CustomerRequest $req){
            try{
                $lang=session('lang');
                $country='';
                if($lang=='ar')
                    $country=Country::where('name',$req->city)->get()[0];
                else
                    $country=Country::where('enName',$req->city)->get()[0];
                if(!$country){
                    if($lang=='ar')
                        $errMsg='المدينة غير موجودة';
                    else
                        $errMsg='the selected city not found';
                    $req->session()->put('error',$errMsg);
                    return redirect()->route('confirmOrder');
                }
                $category=$req->session()->get('card');
                $productAmount=$req->session()->get('quan');
                $finalPrice=0;
                // $orderinf='';
                for($i=0;$i<count($category);$i++){
                    $finalPrice+=$category[$i]['price']*$category[$i]['quantity'];
                }
                $vat=($country->price->vat/100)*$finalPrice;
                $deliveryPrice=$country->price->delivery*$productAmount;
                $req->validated();
                $customer=new Customer();
                $customer->email=$req->email;
                $customer->firstName=$req->firstName;
                $customer->lastName=$req->lastName;
                $customer->city=$req->city;
                $customer->address=$req->address;
                $customer->phone=$req->phone;
                $customer->notics=$req->notics;
                $customer->vat=$vat;
                $customer->delivery=$deliveryPrice;
                $cusId='';
                // // ///// check
                if (Auth::check()) {
                    $user=User::find(auth()->id());
                    $cusId=$user->customers()->save($customer);
                } else{
                    $customer->save();
                    $cusId=$customer;
                }
                // // get email and ubove info then get card and send them
                $a=array();
                $data=array();
                // $finalPrice=0;
                // $orderinf='';
                for($i=0;$i<count($category);$i++){
                    $a=array($category[$i]['id']=>[
                        'totalPrice'=>$category[$i]['price']*$category[$i]['quantity'],
                        'quantity'=>$category[$i]['quantity'],
                        'month'=>Carbon::now()->month,
                        'year'=>Carbon::now()->year,
                        'day'=>Carbon::now()->day
                    ]);
                    array_push($data,[
                        'name'=>$category[$i]['name'],
                        'quantity'=>$category[$i]['quantity'],
                        'unit_amount'=>$category[$i]['price']*1000
                    ]);
                    // $orderinf.="             ".$category[$i]['quantity']."X    ".$category[$i]['name']." \n";
                    // $finalPrice+=$category[$i]['price']*$category[$i]['quantity'];
                    $cusId->products()->attach($a);
                }
                if($vat!=0)
                    array_push($data,[
                        'name'=>"vat",
                        'quantity'=>1,
                        'unit_amount'=>floatval($vat)*1000
                    ]);
                    
                if($deliveryPrice!=0)
                array_push($data,[
                    'name'=>"delivery",
                    'quantity'=>1,
                    'unit_amount'=>$deliveryPrice*1000
                ]);
                $finalPrice=$finalPrice+floatval($deliveryPrice)+floatval($vat);
                // thawani
                $headers=[
                    'thawani-api-key'=>'JJM93P5SRJSVMJz03QaoHSShfzn4aR',
                ];
                $body=[
                    "client_reference_id"=>$cusId->id,
                    "mode"=>"payment",
                    "products"=>$data,
                    "success_url"=> env('APP_URL')."pay/success",
                    "cancel_url"=> env('APP_URL')."pay/fail",
                    "metadata"=> [
                      "order id"=>$cusId->id,
                      "firstName"=>$customer->firstName,
                      "lastName"=>$customer->lastName,
                      "email"=>$customer->email,
                      "city"=>$customer->city,
                      "address"=>$customer->address,
                      "phone"=>$customer->phone,
                      "currency"=>"OMR",
                      "created_at"=>$cusId->created_at,
                      "language"=>session('lang'),
                    ]
                ];
                $response='';
                try{
                    $response =Http::async(false)->withHeaders($headers)->post('https://checkout.thawani.om/api/v1/checkout/session',$body);
                }catch (Exception $err){
                    $response =Http::async(false)->withHeaders($headers)->post('https://checkout.thawani.om/api/v1/checkout/session',$body);
                }
                if(!$response->successful()){
                        $cus=Customer::find($cusId->id);
                        $cus->delete();
                        return redirect()->route('confirmOrder');
                }
                $res=$response->json();
                $sessionId= $res['data']['session_id'];
                $invId=$res['data']['invoice'];
                $msg=[
                    "تاريخ الطلب" =>Carbon::now()->addHours(4),
                    "رقم الطلب" => $cusId->id,
                    "اشعار الدفع" => $invId,
                    "الحساب" => $customer->email,
                    "الأسم الأول" => $customer->firstName,
                    "الكنية" => $customer->lastName,
                    "المدينة" => $customer->city,
                    "العنوان" => $customer->address,
                    "رقم الهاتف" => $customer->phone,
                    "ملاحظات" => $customer->notics,
                    "الطلب" => $data,
                    "الضريبة" => $vat,
                    "التوصيل" => $deliveryPrice,
                    "السعر النهائي" => $finalPrice
                ];
                $req->session()->put('invoicId',$invId);
                $req->session()->put('msg',$msg);
                $req->session()->put('orderId',$cusId->id);
                return redirect('https://checkout.thawani.om/pay/'.$sessionId.'?key=NGfaiGQdP8WzkabgcCQfPh7c1VWx0Y');
            } catch(Exception $err){
                return response()->json(['message'=>$err->getMessage()]);
            }
        }

        public function fail(Request $req){
            try{
                // delete order
                $orderId=$req->session()->get('orderId');
                try{
                    $order=Customer::find($orderId);
                    if($order)
                        $order->delete();
                } catch(Exception $err){
                    $order=Customer::find($orderId);
                    if($order)
                        $order->delete();
                }
                $req->session()->forget('invoicId');
                $req->session()->forget('msg');
                $req->session()->forget('orderId');
                
                $lang=session('lang');
                $errMsg='';
                if($lang=='ar')
                    $errMsg='لم تتم عملية الدفع بنجاح أعد المحاولة';
                else
                    $errMsg='The payment process was not completed successfully. Please try again';
                $req->session()->put('error',$errMsg);
                return redirect()->route('confirmOrder');
            }catch( Exception $err){
                return response()->json(['message'=>$err->getMessage()]);
            }
        }

        public function success(Request $req){
            $msg=$req->session()->get('msg');
            $sendMsg=new SentMsgMail($msg);
            $orderId='';
            $invo='';
            $check=false;
            $help=false;
            try{
                // update order [add invoice id to it]
                $invo=$req->session()->get('invoicId');
                $orderId=$req->session()->get('orderId');
                $order=Customer::find($orderId);
                if($order){
                    $order->invoId=$invo;
                    $order->check=true;
                    $order->save();
                    $check=true;
                }
                // to admin
                Mail::to(env('MAIL_USERNAME'))->send($sendMsg);
                $help=true;
                // to customer
                Mail::to($msg['الحساب'])->send($sendMsg);
                //
                // Telegram::sendMessage([
                //     'chat_id' => '6293673780',
                //     'text' =>$help,
                // ]);
                $req->session()->forget('invoicId');
                $req->session()->forget('msg');
                $req->session()->forget('orderId');
                $req->session()->forget('quan');
                $req->session()->forget('card');
                return view('awtar.success');
            }catch( Exception $err){
                if(!$check){
                    $order=Customer::find($orderId);
                    if($order){
                        $order->invoId=$invo;
                        $order->check=true;
                        $order->save();
                        $check=true;
                    }
                    try{
                        if(!$help)
                            Mail::to(env('MAIL_USERNAME'))->send($sendMsg);
                        Mail::to($msg['الحساب'])->send($sendMsg);
                        // Telegram::sendMessage([
                        //     'chat_id' => '6293673780',
                        //     'text' =>$msg,
                        // ]);
                    } catch(Exception $err){
                        if(!$help)
                            Mail::to(env('MAIL_USERNAME'))->send($sendMsg);
                        Mail::to($msg['الحساب'])->send($sendMsg);
                        // Telegram::sendMessage([
                        //     'chat_id' => '6293673780',
                        //     'text' =>$msg,
                        // ]);
                    }
                } else
                    if(!$help)
                        Mail::to(env('MAIL_USERNAME'))->send($sendMsg);
                    Mail::to($msg['الحساب'])->send($sendMsg);
                    // Telegram::sendMessage([
                    //     //962019183
                    //     'chat_id' => '6293673780',
                    //     'text' =>$msg,
                    // ]);
                $req->session()->forget('invoicId');
                $req->session()->forget('msg');
                $req->session()->forget('orderId');
                $req->session()->forget('quan');
                $req->session()->forget('card');
                return response()->json(['message'=>$err->getMessage()]);
            }
        }
}