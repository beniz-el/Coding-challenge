<?php

namespace App\Http\Controllers;

use App\Models\product;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
     public function store(Request $request){
        
        $store = new product();
    	$store->name = $request->input('name');
    	$store->description = $request->input('description');
    	$store->price = $request->input('price');
    	$store->category = $request->input('category');     
        
        if(request()->hasFile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/images/', $filename);
            $store->image = $filename;
        }
        else{
            return $request;
            $store->image = '';
        }

    	$store->save();
      
        $product = DB::table('products')->whereNotNull('name')->orderBy('name','asc')->orderBy('price','asc')->get();
        return view('products', ['products'=> $product]);   
    }

      public function search(Request $request){
        $search=$request->get('search');
        $product = DB::table('products')->where('category', 'like' ,'%' . $search . '%')->paginate(5);
        return view('products', ['products'=> $product]);
    }

      public function supprimer($id){
         product::find($id)->delete();
         $product = DB::table('products')->whereNotNull('name')->orderBy('name','asc')->get();;
        return view('products', ['products'=> $product]); 
    }

    public function select(){
         $category = DB::table('categories')->whereNotNull('name')->orderBy('name','asc')->get();
        return view('welcome', ['categories'=> $category]);   
    }
}
