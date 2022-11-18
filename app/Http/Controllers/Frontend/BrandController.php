<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
      public function index(){
        $data = Brand::orderBy('id','desc')->get();
        return success_response($data);
      }
}
