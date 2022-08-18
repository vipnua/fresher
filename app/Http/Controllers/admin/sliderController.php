<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
class sliderController extends Controller
{
    protected $slider;
    public function __construct(SliderService $slider){
        $this->slider = $slider;
    }
    public function create(){
        return View('admin.slider.add',['title'=>'slider add']);
    }
    public function addslider(Request $request){
        $this -> validate($request,[
            'name' => 'required',
            'thumb' => 'required',
            'url' => 'required',
        ]);
        $this ->slider->insert($request);
        return redirect()->back();
    }

}
