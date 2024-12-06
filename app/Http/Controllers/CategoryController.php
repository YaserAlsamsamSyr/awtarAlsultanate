<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()){
            $accType = Auth::user()->accountType;
            if($accType=="aaddmmii0n0n"){
                 $category=Category::select('id','category')->orderBy('id','desc')->get();
                 return view('awtar.admin.category',['categories'=>$category,'accType'=>$accType]);
            }
        }
        return ;
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cat=$id;
        $pattern="/^([0-9]+)$/";
        if(!preg_match($pattern, $cat))
            return;
        if (Auth::check()){
            $accType = Auth::user()->accountType;
            if($accType=="aaddmmii0n0n"){
                $cat=Category::find($id);
                $cat->delete();
                return redirect(config('app.url')."category");
            }
        }
        return;
    }
}
