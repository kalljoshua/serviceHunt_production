<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategory;
use App\ServiceRequest;

class SubmissionController extends Controller
{
    //
    public function getSubCategories(Request $request, $id)
    {
        # code...
        if ($request->ajax()) {

            $sector = SubCategory::find($id);
            return Response::json($sector->category);;

        }
    }

    public function secondMethod($id)
    {
        $subcategories = DB::table('sub_categories')->where('category_id', $id)->get();
        return View::make('user.thisview', ['subcategories' => $subcategories]);
    }

    function orders()
    {
        $orders = ServiceRequest::where('type',2);
    }

}