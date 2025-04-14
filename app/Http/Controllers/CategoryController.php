<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryRequest;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        try{
            if (Auth::check()){
                $accType = Auth::user()->accountType;
                if($accType=="aaddmmii0n0n"){
                     $category=Category::select('id','category')->where('isDeleted',false)->orderBy('id','desc')->get();
                     return view('awtar.admin.category',['categories'=>$category,'accType'=>$accType]);
                }
            }
            return ;
        } catch(Exception $err){
            return response()->json(['message'=>$err->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $req)
    {
        try{  
          $req->validated();
          if (Auth::check()){
                $accType = Auth::user()->accountType;
                if($accType=="aaddmmii0n0n"){
                          $cat=new Category();
                          $cat->category=$req->category;
                          $cat->user_id=auth()->id();
                          $cat->save();
                          return redirect(config('app.url')."category");
                }
            }
            return;
        } catch(Exception $err){
            return response()->json(['message'=>$err->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $req, string $id)
    {
        try{
            $req->validated();
            $cat=$id;
            $pattern="/^([0-9]+)$/";
            if(!preg_match($pattern, $cat))
                return;
            if (Auth::check()){
                $accType = Auth::user()->accountType;
                if($accType=="aaddmmii0n0n"){
                       $cat=Category::find($id);
                       $cat->category=$req->category;
                       $cat->save();
                       return redirect(config('app.url')."category");
                }
            }
            return;
        } catch(Exception $err){
            return response()->json(['message'=>$err->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
             $cat=$id;
             $pattern="/^([0-9]+)$/";
             if(!preg_match($pattern, $cat))
                 return;
             if (Auth::check()){
                 $accType = Auth::user()->accountType;
                 if($accType=="aaddmmii0n0n"){
                     $cat=Category::find($id);
                     $products=$cat->products()->get();
                     foreach($products as $j){
                         foreach($j->imgs()->get() as $i){
                             $arr = explode('/images/products/', $i->img);
                             if(file_exists(public_path('/images/products/'.$arr[1])))
                                 unlink(public_path('/images/products/'.$arr[1]));
                             $i->delete(); 
                         }
                         $j->isDeleted=true;
                         $j->save();
                     }
                     $cat->isDeleted=true;
                     $cat->save();
                     return redirect(config('app.url')."category");
                 }
             }
             return;
        }catch(Exception $err){
            return response()->json(['message'=>$err->getMessage()]);
        }
    }
}
