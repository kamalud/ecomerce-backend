<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Exception;

use Image;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::orderBy('id','desc')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
      try{
        if($request->has('image')){
           $image = $request->file('image');
           $file_ex = $image->getClientOriginalExtension();
           $filename = time().'.'.$file_ex;
        }
      Image::make($image)->save(public_path('uploads/slider/') . $filename)->resize(500, 250);

       $slider = new Slider();
       $slider->name = $request->name;
       $slider->image = $filename;
       $slider->save();

       return success_response([],__('message.slider.create.success'));
      }catch(Exception $e){
        return success_response([],__('message.slider.create.error'));
      }


      

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       try{
        $slider = Slider::find($id);
         if($request->has('image')){
          if(unlink(public_path('uploads/slider/'))){
            unlink(public_path('uploads/slider/'));
          };
            $image = $request->file('image');
            $file_ex = $image->getClientOriginalExtension();
            $filename = time().'.'.$file_ex;
         }
       Image::make($image)->save(public_path('uploads/slider/') . $filename)->resize(500, 250);

        $slider = Slider::find($id);
        $slider->name = $request->name;
        $slider->image = $filename;
        $slider->save();

        return success_response([],__('message.slider.update.success'));
       }catch(Exception $e){
        return success_response([],__('message.slider.update.error'));
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       try{
        $slider = Slider::find($id);
        unlink(public_path('uploads/slider/').$slider->image);

        $slider->delete();

        return success_response([],__('message.slider.manage.delete'));
       }catch(Exception $e){
        return success_response([],__('message.slider.manage.not_found'));
       }
    }
}