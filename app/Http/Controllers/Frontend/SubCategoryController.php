<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
class SubCategoryController extends Controller
{
    public function index(){
        $data = SubCategory::orderBy('id','desc')->get();
        return success_response($data);
      }
}
