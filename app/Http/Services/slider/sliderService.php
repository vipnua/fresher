<?php


namespace App\Http\Services\Slider;


use App\Models\Slider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SliderService
{
    public function insert($request){
        try{
            Slider::create($request->input());
            $request->session()->flash('success', 'Thêm mới slider thành công ! :D');
        }catch(\Exception $err){
            $request->session()->flash('error', 'Chưa thêm được anh bạn à');
            \log::info($err -> getMessage());

            return false;
        }
        return true;
    }
}
