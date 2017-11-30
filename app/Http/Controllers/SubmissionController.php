<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategory;

class SubmissionController extends Controller
{
    //
    public function getSubCategories(Request $request, $id)
    {
      # code...
      f($request->ajax()){

          $sector = SubCategory::find($id);
          return Response::json( $sector->category );;

        }
    }
    public function secondMethod($id){
    $subcategories = DB::table('sub_categories')->where('category_id', $id)->get();
    return View::make('user.thisview', ['subcategories' => $subcategories]);
}
