<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AglGuide;

class GuideController extends Controller
{
    //
    public function getGuide()
    {
        $guide=AglGuide::orderBy('updated_at','desc')->get();
        return view('admin.guide.home',['guides'=>$guide]);
    }
    public function getGuideByID($id)
    {
        try{
            if($id==0)
            {
                return view('admin.guide.guide-detail');
            }
            else{
                $guide=AglGuide::find($id);
                if($guide)
                {
                    return view('admin.guide.guide-detail-edit',['guide'=>$guide]);
                }
                else{
                    return redirect('admin/guide')->with('failed','Lấy hướng dẫn thất bại');
                }
            }
        }
        catch (\Exception $e)
        {
            return redirect('admin/guide')->with('failed','Lấy hướng dẫn thất bại');
        }
    }
    public function postGuide($id, Request $request)
    {
        try{
            if($id==0)
            {
                $guide=new AglGuide();
                $guide->title_vi=$request->title_vi;
                $guide->title_en=$request->title_en;
                $guide->content_vi=$request->content_vi;
                $guide->content_en=$request->content_en;
                $guide->sort_order=$request->sort_order;
                $guide->save();
                return redirect('admin/guide')->with('success','Thêm hướng dẫn thành công');
            }
            else{
                $guide=AglGuide::find($id);
                $guide->title_vi=$request->title_vi;
                $guide->title_en=$request->title_en;
                $guide->content_vi=$request->content_vi;
                $guide->content_en=$request->content_en;
                $guide->sort_order=$request->sort_order;
                $guide->save();
                return redirect('admin/guide')->with('success','Cập nhật hướng dẫn thành công');
            }
        }
        catch (\Exception $e)
        {
            return redirect('admin/guide')->with('failed','Lấy hướng dẫn thất bại');
        }
    }
    public function DeleteGuide($id)
    {
        try{
            $guide=AglGuide::find($id);
            if($guide)
            {
                AglGuide::find($id)->delete();
                return redirect('admin/guide')->with('success','Xóa hướng dẫn thành công');
            }
        }
        catch (\Exception $e)
        {
            return redirect('admin/guide')->with('failed','Xóa hướng dẫn thất bại');
        }
    }
}
