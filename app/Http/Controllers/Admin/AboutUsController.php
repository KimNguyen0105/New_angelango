<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AglAboutUs;
use App\Models\AglAboutUsDifferent;
use Image;

class AboutUsController extends Controller
{
    //
    public function getAboutUs()
    {
        $about=AglAboutUs::get();
        return view('admin.about.home',['abouts'=>$about]);
    }
    public function getAboutUsByID($id)
    {
        try{
            $about=AglAboutUs::find($id);
            if($about)
            {
                if($id==4)
                {
                    $images=null;
                    if(!empty($about->images_other))
                    {
                        $images=explode(';',substr($about->images_other, 0, -1));
                    }
                    return view('admin.about.about-detail',['about'=>$about,'images'=>$images]);
                }
                else{
                    return view('admin.about.about-detail',['about'=>$about]);
                }
            }
           else{
               return redirect('admin/about-us')->with('failed','Lấy thông tin giới thiệu thất bại');
           }
        }
        catch (\Exception $e)
        {
            return redirect('admin/about-us')->with('failed','Lấy thông tin giới thiệu thất bại');
        }
    }
    public function postAboutUsByID($id, Request $request)
    {
        try{
            $about=AglAboutUs::find($id);
            $about->title_vi=$request->title_vi;
            $about->title_en=$request->title_en;
            $about->content_vi=$request->content_vi;
            $about->content_en=$request->content_en;
            if($request->hasFile('file'))
            {
                if(file_exists("images/about-us/".$about->avatar))
                {
                    unlink("images/about-us/".$about->avatar);
                }
                $image = $request->file('file');
                $filename  = 'about_'.time() . '.' . $image->getClientOriginalExtension();
                $path = public_path('images/about-us/' . $filename);
                Image::make($image->getRealPath())->resize(400, 360)->save($path);
                $about->avatar=$filename;
            }
            $images=$about->images_other;
            if($request->hasFile('file-multi'))
            {
                $file_ary = $request->file('file-multi');
                $i=1;
                foreach ($file_ary as $file) {
                    $filename='about_'.$i.time().'.' . $file->getClientOriginalExtension();
                    $path = public_path('images/about-us/' . $filename);
                    Image::make($file->getRealPath())->resize(400, 360)->save($path);
                    $i++;
                    $images.=$filename.';';
                }
            }
            $about->images_other=$images;
            $about->save();
            return redirect('admin/about-us')->with('success','Cập nhật thông tin giới thiệu thành công');
        }
        catch (\Exception $e)
        {
            return redirect('admin/about-us')->with('failed','Cập nhật thông tin giới thiệu thất bại');
        }
    }
    public function DeleteAboutUsImage($id, Request $request)
    {
        try{
            $about=AglAboutUs::find($id);
            $images=explode(';',$about->images_other);
            $deletes=$request->images;
            foreach ($deletes as $delete)
            {
                if(($key = array_search($delete, $images)) !== false) {
                    if(file_exists("images/about-us/".$delete))
                    {
                        unlink("images/about-us/".$delete);
                    }
                    unset($images[$key]);
                }
            }
            $about->images_other=implode(';',$images);
            $about->save();
            return 1;
        }
        catch (\Exception $e)
        {
            return 0;
        }
    }
    public function getAboutUsDifferent()
    {
        $about=AglAboutUsDifferent::get();
        return view('admin.about.about-different',['abouts'=>$about]);
    }
    public function getAboutUsByIDDifferent($id)
    {
        try{
            $about=AglAboutUsDifferent::find($id);
            if($about)
            {
                return view('admin.about.about-detail-different',['about'=>$about]);

            }
            else{
                return redirect('admin/about-us-different')->with('failed','Lấy thông tin giới thiệu thất bại');
            }
        }
        catch (\Exception $e)
        {
            return redirect('admin/about-us-different')->with('failed','Lấy thông tin giới thiệu thất bại');
        }
    }
    public function postAboutUsByIDDifferent($id, Request $request)
    {
        try{
            $about=AglAboutUsDifferent::find($id);
            $about->title_vi=$request->title_vi;
            $about->title_en=$request->title_en;
            $about->content_vi=$request->content_vi;
            $about->content_en=$request->content_en;
            $about->sort_order=$request->sort_order;
            if($request->hasFile('file'))
            {
                if(file_exists("images/about-us/".$about->avatar))
                {
                    unlink("images/about-us/".$about->avatar);
                }
                $image = $request->file('file');
                $filename  = 'about_different'.time() . '.' . $image->getClientOriginalExtension();
                $path = public_path('images/about-us/' . $filename);
                Image::make($image->getRealPath())->resize(50, 50)->save($path);
                $about->avatar=$filename;
            }
            $about->save();
            return redirect('admin/about-us-different')->with('success','Cập nhật thông tin giới thiệu thành công');
        }
        catch (\Exception $e)
        {
            return redirect('admin/about-us-different')->with('failed','Cập nhật thông tin giới thiệu thất bại');
        }
    }
}
