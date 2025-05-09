<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Customer;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CustomerRequest;
use Telegram\Bot\Laravel\Facades\Telegram;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

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
                $newPro=[
                    'id'=>$req->proId,
                    'img'=>$req->proImg,
                    'name'=>$req->proName,
                    'price'=>$req->proPrice,
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
                return response()->json(['message'=>$err->getMessage()]);
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
                if($lang=='ar')
                     $category=Category::select('id','category')->where('isDeleted',false)->get();
                else
                     $category=Category::select('id','enName')->where('isDeleted',false)->get();
                return view('awtar.confirmOrder',['categories'=>$category]); 
            } catch(Exception $err){
                return response()->json(['message'=>$err->getMessage()]);
            }
        }

        public function confirmOrderPost(CustomerRequest $req){
            $help='';
            try{
                $msg='';
                $req->validated();
                $customer=new Customer();
                $customer->email=$req->email;
                $customer->firstName=$req->firstName;
                $customer->lastName=$req->lastName;
                $customer->city=$req->city;
                $customer->address=$req->address;
                $customer->phone=$req->phone;
                $customer->notics=$req->notics;
                $cusId='';
                ///// check
                if (Auth::check()) {
                    $user=User::find(auth()->id());
                    $cusId=$user->customers()->save($customer);
                } else{
                    $customer->save();
                    $cusId=$customer;
                }
                // get email and ubove info then get card and send them
                $category=$req->session()->get('card');
                $req->session()->get('quan');
                $a=array();
                $finalPrice=0;
                $orderinf='';
                for($i=0;$i<count($category);$i++){
                    $a=array($category[$i]['id']=>[
                        'totalPrice'=>$category[$i]['price']*$category[$i]['quantity'],
                        'quantity'=>$category[$i]['quantity'],
                        'month'=>Carbon::now()->month,
                        'year'=>Carbon::now()->year,
                        'day'=>Carbon::now()->day
                    ]);
                    $orderinf.="             ".$category[$i]['quantity']."X    ".$category[$i]['name']." \n";
                    $finalPrice+=$category[$i]['price']*$category[$i]['quantity'];
                    $cusId->products()->attach($a);
                }
                // send message to admin
                $msg=
                    "تاريخ الطلب ==>> ".now()."\n".
                    "رقم الطلب ==>> ". $cusId->id." \n".
                    "الحساب ==>> ".$customer->email." \n".
                    "الأسم الأول ==>> ".$customer->firstName." \n".
                    "الكنية ==>> ".$customer->lastName." \n".
                    "المدينة ==>> ".$customer->city." \n".
                    "العنوان ==>> ".$customer->address." \n".
                    "رقم الهاتف ==>> ".$customer->phone." \n".
                    "ملاحظات ==>> \n".
                    $customer->notics.
                    " \n".
                    "الطلب : \n".
                    $orderinf.
                    "\n". 
                    "السعر النهائي ==>> ".$finalPrice." OMR";
                    $req->session()->forget('quan');
                    $req->session()->forget('card');
                    $help=$msg;
                    Telegram::sendMessage([
                    'chat_id' => '6293673780',
                    'text' =>$help,
                ]);
                //
                return redirect()->route('index');
            } catch(Exception $err){
                $req->session()->forget('quan');
                $req->session()->forget('card');
                if($help!='')
                    Telegram::sendMessage([
                        //962019183
                        'chat_id' => '6293673780',
                        'text' =>$help,
                ]);
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
}