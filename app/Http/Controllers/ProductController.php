<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Img;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        try{
            $cat=$req->id;
            $pattern="/^(-1|[0-9]+)$/";
            if(!preg_match($pattern, $cat)){
                return;
            }
            $category=Category::select('id','category')->where('isDeleted',false)->get();
            // here I am
            $products='';
            if($cat==-1)
                $products=Product::select('id','name', 'newPrice','oldPrice')->where('isDeleted',false)->orderBy('id', 'desc')->with(['imgs'])->get();
            else
                $products=Product::where('category_id',$cat)->select('id','name', 'newPrice','oldPrice')->where('isDeleted',false)->orderBy('id', 'desc')->with(['imgs'])->get();        
            if (Auth::check()){
                $accType = Auth::user()->accountType;
                if($accType=="aaddmmii0n0n")     
                    return view('awtar.admin.adminHome',['categories'=>$category,'products'=>$products,'accType'=>$accType]);
            }
            return view('awtar.products',['categories'=>$category,'pros'=>$products]);
        }catch( Exception $err){
            return response()->json(['message'=>$err->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try{
              if (Auth::check()){
                  $accType = Auth::user()->accountType;
                  $category=Category::select('id','category')->where('isDeleted',false)->get();
                  if($accType=="aaddmmii0n0n")     
                      return view('awtar.admin.createProduct',['categories'=>$category,'accType'=>$accType]);
              }
              return;
        } catch(Exception $err){
            return response()->json(['message'=>$err->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $req)
    {
        try{
            $req->validated();
            if (Auth::check()){
                $accType = Auth::user()->accountType;
                if($accType=="aaddmmii0n0n"){
                    $product=[
                    'name'=>$req->name,
                    'desc'=>$req->desc,
                    'newPrice'=>$req->newPrice,
                    'oldPrice'=>$req->oldPrice,
                    'user_id'=>Auth::user()->id,
                    'category_id'=>$req->category
                    ];
                    $pro=Product::create($product);
                    // upload imgs
                    if($req->hasFile('imgs')){
                        $files=$req->file('imgs');
                        foreach($files as $file){
                            $name=time().$file->getClientOriginalName();
                            $file->move(public_path().'/images/products', $name);
                            $path=config('app.url').'images/products/'. $name;
                            // $pro->imgs()->create($path);
                            $img=new Img();
                            $img->img=$path;
                            $img->product_id=$pro->id;
                            $img->save();
                        }
                    }
                    return redirect()->route('adminHome');
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
    public function show(Request $req,string $id)
    {
        try{
            $pattern="/^([0-9]+)$/";
            if(!preg_match($pattern, $id)){
                return;
            }
            $category=Category::select('id','category')->where('isDeleted',false)->get();
            $product=Product::with(['imgs','category'])->where('isDeleted',false)->find($id);
            if (Auth::check()){
                $accType = Auth::user()->accountType;
                if($accType=="aaddmmii0n0n")     
                    return view('awtar.admin.proInfo',['categories'=>$category,'pro'=>$product,'accType'=>$accType]);
            }
            return view('awtar.proInfo',['categories'=>$category,'pro'=>$product]);
        } catch(Exception $err){
            return response()->json(['message'=>$err->getMessage()]);
        }
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
    public function update(ProductRequest $req, string $id)
    {
        try{
            $pattern="/^([0-9]+)$/";
            if(!preg_match($pattern, $id)){
                return;
            }
            if (Auth::check()){
                $accType = Auth::user()->accountType; 
                if($accType=="aaddmmii0n0n")  {
                $req->validated();
                $pro=Product::find($id);
                $pro->update([
                    'name'=>$req->name,
                    'desc'=>$req->desc,
                    'newPrice'=>$req->newPrice,
                    'oldPrice'=>$req->oldPrice,
                    'category_id'=>$req->category
                    ]);
                // delete old image
                foreach($pro->imgs()->get() as $i){
                    $arr = explode('/images/products/', $i->img);
                    if(file_exists(public_path('/images/products/'.$arr[1])))
                        unlink(public_path('/images/products/'.$arr[1]));  
                }
                $pro->imgs()->delete();
                // upload new image
                if($req->hasFile('imgs')){
                    $files=$req->file('imgs');
                    foreach($files as $file){
                        $name=time().$file->getClientOriginalName();
                        $file->move(public_path().'/images/products', $name);
                        $path=config('app.url').'images/products/'. $name;
                        // $pro->imgs()->create($path);
                        $img=new Img();
                        $img->img=$path;
                        $img->product_id=$id;
                        $img->save();
                    }
                }
                return redirect(config('app.url').'product/'.$id);
              }
            }
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
            if (Auth::check()){
                $accType = Auth::user()->accountType; 
                if($accType=="aaddmmii0n0n")  {
                    $pattern="/^([0-9]+)$/";
                    if(!preg_match($pattern, $id)){
                        return;
                    }
                    $product=Product::find($id);
    
                    foreach($product->imgs()->get() as $i){
                        $arr = explode('/images/products/', $i->img);
                        if(file_exists(public_path('/images/products/'.$arr[1])))
                            unlink(public_path('/images/products/'.$arr[1])); 
                        $i->delete();  
                    }                  
                    // File::delete($i->img);
                    $product->isDeleted=true;
                    $product->save();  
                    return redirect(config('app.url')."product?id=-1");
                }
            }
            return;
        } catch(Exception $err){
            return response()->json(['message'=>$err->getMessage()]);
        }
    }
}
