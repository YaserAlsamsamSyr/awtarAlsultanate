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

class HomeController extends Controller
{
    public function home() {
        return "ddd";
        $pros = Product::orderBy('id', 'desc')->take(6)->with('imgs')->get();
        $category=Category::select('id','category')->get();
        if (!empty($pros) && count($pros)>=6) {
            $pro=Product::where('name','=','عطر الروح')->orWhere('name', '=', 'ميكس عود')->orWhere('name', '=', 'عجم')->orWhere('name', '=', 'هزام')->get();
            if(count($pro)==4){
                $alroh='';
                $slider=array();
                foreach($pro as $p){
                     if($p->name=="عطر الروح")
                           $alroh=$p->id;
                    else
                       array_push($slider,['id'=>$p->id,'name'=>$p->name]);
                }
                return view('awtar.index',['categories'=>$category,'alrohId'=>$alroh,'slider'=>$slider,'products'=>$pros]);
            }
        }
        return view('awtar.index',['categories'=>$category,'alrohId'=>'','slider'=>[],'products'=>[]]);
    }

    public function login(){
        if(Auth::user()){
             return redirect()->route('profile.edit'); 
        }
        return redirect()->route('login');
    }

    public function addToCard(Request $req){
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
        return redirect(config('APP_URL')."/product/".$req->proId);
        }

        public function viewCard(){
            $category=Category::select('id','category')->get();
            return view('awtar.shippingCard',['categories'=>$category]);
        }

        public function removeFromCard(Request $req,int $id){
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

            $category=Category::select('id','category')->get();
            return view('awtar.shippingCard',['categories'=>$category]);
        }

        public function updateCard(Request $req){

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
            $category=Category::select('id','category')->get();
            return view('awtar.shippingCard',['categories'=>$category]);     
        }

        public function confirmOrder(){
            $category=Category::select('id','category')->get();
            return view('awtar.confirmOrder',['categories'=>$category]); 
        }

        public function confirmOrderPost(CustomerRequest $req){
                $req->validated();

                $user=User::find(auth()->id());
                $customer=new Customer();
                $customer->firstName=$req->firstName;
                $customer->lastName=$req->lastName;
                $customer->city=$req->city;
                $customer->address=$req->address;
                $customer->phone=$req->phone;
                $customer->notics=$req->notics;
                $cusId=$user->customers()->save($customer);
                // get email and ubove info then get card and send them
                $category=$req->session()->get('card');
                $req->session()->get('quan');
                $a=array();
                for($i=0;$i<count($category);$i++){
                    $a=array($category[$i]['id']=>['totalPrice'=>$category[$i]['price']*$category[$i]['quantity'],'quantity'=>$category[$i]['quantity']]);
                    $cusId->products()->attach($a);
                }
                $req->session()->forget('quan');
                $req->session()->forget('card');
                return redirect()->route('index');
        }
        public function myOrders(){
             $myCustomers=User::find(auth()->id())->customers()->get();
             $category=Category::select('id','category')->get();
             if (sizeof($myCustomers)==0)
                  return view('awtar.order',['orders'=>[],'categories'=>$category]);
             $allOrder=array($myCustomers[0]->products()->select('name')->get());
             for($i=1;$i<count($myCustomers);$i++){
                $pros=$myCustomers[$i]->products()->select('name')->get();
                array_push($allOrder,$pros);
             }
             return view('awtar.order',['orders'=>$allOrder,'categories'=>$category]);
        }

        public function contactUs(){
            $category=Category::select('id','category')->get();
            return view('awtar.contactUs',['categories'=>$category]);
        }
        
        public function termAndCondition(){
            $category=Category::select('id','category')->get();
            return view('awtar.termsAndConditions',['categories'=>$category]);
        }

        public function policy(){
            $category=Category::select('id','category')->get();
            return view('awtar.policy',['categories'=>$category]);
        }

        public function contactsDownload(){
            $file= public_path(). "/files/AwtarContacts.pdf";
            $headers = array(
                      'Content-Type: application/pdf',
                    );
            return response()->download($file, 'AwtarContacts.pdf', $headers);
        }

}