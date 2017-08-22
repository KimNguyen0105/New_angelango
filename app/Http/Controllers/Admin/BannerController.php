<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\AglBanner;
use Image;

class BannerController extends Controller
{
    //
    public function getBanner()
    {
        $banner = AglBanner::orderBy('id', 'desc')->get();
        return view('admin.banner.home', [
            'banner' => $banner
        ]);
    }
   
   
    public function getEditBanner($id)
    {
        try{
            $banner=AglBanner::find($id);
            return view('admin.banner.edit_banner',['banner'=>$banner]);
        }
        catch (\Exception $e)
        {
            return view('admin.banner.home')->with('failed', 'Cập nhật thất bại');
        }
    }
    public function postEditBanner($id, Request $request)
    {
        try{
            $banner=AglBanner::find($id);
            if($banner)
            {
                
                if($request->hasFile('file'))
                {
                    if(file_exists("images/banner/".$banner->image))
                    {
                        unlink("images/banner/".$banner->image);
                    }
                    $image = $request->file('file');
                    $filename  = 'banner_'.time() . '.' . $image->getClientOriginalExtension();
                    $path = public_path('images/banner/' . $filename);
                    Image::make($image->getRealPath())->resize(1350, 560)->save($path);
                    $banner->image=$filename;
                }
                if($banner->save())
                {
                    return redirect('/admin/banner')->with('success', 'Cập nhật thành công');
                }
                else{
                    return redirect('/admin/banner/edit-banner/'.$id)->with('failed', 'Cập nhật thất bại');
                }
            }

        }
        catch (\Exception $e)
        {
            return view('admin.banner.home')->with('failed', 'Cập nhật thất bại');
        }
    }
    
}
