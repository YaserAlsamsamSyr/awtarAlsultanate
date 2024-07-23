<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
// create parcode
use SimpleSoftwareIO\QrCode\Facades\QrCode;
//

class adminController extends Controller
{
    public function aHome(Request $req)
    {  
        
        if (Auth::check()){
            $accType = Auth::user()->accountType;
            if($accType=="aaddmmii0n0n"){
                $cat=$req->id;
                if($cat!=null){
                    $pattern="/^(-1|[0-9]+)$/";
                    if(!preg_match($pattern, $cat)){
                        return;
                    }
                } else $cat=-1;
                return redirect(config('app.url').'/product?id='.$cat);
            }
        }
        return;
    }

    public function getBarcode(String $name,int $id){
                // create parcode for new product and send it to admin
                QrCode::size(400)->margin(5)->generate(config('app.url').'/'.'product/'.$id, public_path('images/qrcode.svg') );
                $file= public_path(). "/images/qrcode.svg";
                $headers = array(
                          'Content-Type: application/svg',
                        );
                return response()->download($file, $name.'.svg', $headers);
                //
    }
    
    public function viewUsers(){
        if (Auth::check()){
            $accType = Auth::user()->accountType;
            if($accType=="aaddmmii0n0n"){
                $category=Category::select('id','category')->get();
                $users=User::where('accountType','!=','aaddmmii0n0n')->select('email','id')->get();
                return view('awtar.admin.viewUsers',['categories'=>$category,'users'=>$users,'accType'=>$accType]);
            }
        }
        return ;
    }

    public function deleteUser(String $id){
        if (Auth::check()){
            $accType = Auth::user()->accountType;
            if($accType=="aaddmmii0n0n"){
                   $user=User::find($id);
                   $user->delete();
                   return redirect()->route('viewUsers');
            }
        }
        return;
    }

}