<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Order;
use Exception;
use Illuminate\Support\Facades\DB;

// create parcode
use SimpleSoftwareIO\QrCode\Facades\QrCode;
//

class adminController extends Controller
{
    public function aHome(Request $req){  
        try{
            if (Auth::check()){
                $accType = Auth::user()->accountType;
                if($accType=="aaddmmii0n0n"){
                    $cat=$req->id;
                    if($cat!=null){
                        $pattern="/^(-1|[0-9]+)$/";
                        if(!preg_match($pattern, $cat)){
                            return;
                        }
                    } else $cat=(Category::where('isDeleted',0)->first())->id;
                    return redirect(config('app.url').'product?id='.$cat);
                }
            }
            return;
        }catch(Exception $err){
            return response()->json(['message'=>$err->getMessage()]);
        }
    }

    public function getBarcode(String $name,int $id){
        try{
            // create parcode for new product and send it to admin
            QrCode::size(400)->margin(5)->generate(config('app.url').'product/'.$id, public_path('images/qrcode.svg') );
            $file= public_path(). "/images/qrcode.svg";
            $headers = array(
                      'Content-Type: application/svg',
                    );
            return response()->download($file, $name.'.svg', $headers);
            //
        }catch(Exception $err){
            return response()->json(['message'=>$err->getMessage()]);
        }
    }
    
    public function viewUsers(){
        try{
            if (Auth::check()){
                $accType = Auth::user()->accountType;
                if($accType=="aaddmmii0n0n"){
                    $category=Category::select('id','category')->where('isDeleted',false)->get();
                    // $users=User::where('accountType','!=','aaddmmii0n0n')->select('name','email','id')->latest()->paginate(10);
                    $users=User::select('name','email','id')->latest()->paginate(1);
                    return view('awtar.admin.viewUsers',['categories'=>$category,'users'=>$users,'accType'=>$accType]);
                }
            }
            return ;
        } catch(Exception $err){
            return response()->json(['message'=>$err->getMessage()]);
        }
    }

    public function deleteUser(String $id){
        try{
             if (Auth::check()){
                 $accType = Auth::user()->accountType;
                 if($accType=="aaddmmii0n0n"){
                        $user=User::find($id);
                        $user->delete();
                        return redirect()->route('viewUsers');
                 }
             }
             return;
        }catch(Exception $err){
            return response()->json(['message'=>$err->getMessage()]);
        }
    }
    
    public function updateUserPassword(Request $req){
        try{
            if (Auth::check()){
                    $accType = Auth::user()->accountType;
                    if($accType=="aaddmmii0n0n"){
                           $req->validate([
                               'password' => ['required', Rules\Password::defaults()],
                           ]);
                           $user=User::find($req->userId);
                           $user->password=Hash::make($req->password);
                           $user->save();
                           return redirect()->route('viewUsers');
                    }
            }
            return;
        }catch(Exception $err){
            return response()->json(['message'=>$err->getMessage()]);
        }
    }

    public function viewOrders(Request $req){
        try{
            $pattern="/^([0-9]+)$/";
            if(!preg_match($pattern,$req->id))
                return;
            $myCustomers=User::find($req->id)->customers()->latest()->paginate(10);
            $category=Category::select('id','category')->where('isDeleted',false)->get();
            if (sizeof($myCustomers)==0)
                return view('awtar.admin.order',['myCustomers'=>[],'orders'=>[],'categories'=>$category]);
            $allOrder=array($myCustomers[0]->products()->select('name')->get());
            for($i=1;$i<count($myCustomers);$i++){
               $pros=$myCustomers[$i]->products()->select('name')->get();
               array_push($allOrder,$pros);
            }
            return view('awtar.admin.order',['myCustomers'=>$myCustomers,'orders'=>$allOrder,'categories'=>$category]);
        } catch(Exception $err){
            return response()->json(['message'=>$err->getMessage()]);
        }
    }

    public function getMoney(){
        try{
            $orders = Order::select('year', 'month', DB::raw('sum(totalPrice) as total'))
                       ->groupBy('year', 'month')
                       ->latest()->paginate(10);
            $category=Category::select('id','category')->where('isDeleted',false)->get();
            return view('awtar.admin.money',['data'=>$orders,'categories'=>$category]);
        }catch(Exception $err){
            return response()->json(['message'=>$err->getMessage()]);
        }
    }
}