<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\DB;

class categoryController extends Controller
{
     public function store(Request $request){
        
        $store = new category();
    	$store->name = $request->input('name');
    	$store->category = $request->input('category');

    	$store->save();
      
        $category = DB::table('categories')->whereNotNull('name')->orderBy('name','asc')->get();
        return view('categories', ['categories'=> $category]);   
    }

       public function supprimer($id){
         category::find($id)->delete();
         $category = DB::table('categories')->whereNotNull('name')->orderBy('name','asc')->get();;
        return view('categories', ['categories'=> $category]); 
    }

}
