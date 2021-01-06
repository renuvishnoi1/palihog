<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Category;

class CategoryApiController extends Controller
{
    public function getCategoryList(Request $request){
    	
       
       $category= Category::where(['parent_id'=>0])->get();;
       
       return response()->json($category,200);
    }
    public function subCategory( $id){
    	$category= Category::where('parent_id',$id)->get();
       
       return response()->json($category,200);
    }
}
