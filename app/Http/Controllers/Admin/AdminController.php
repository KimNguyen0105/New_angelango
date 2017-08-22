<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AglSystemConfig;
use App\Models\AglOrderStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use App\Models\AglSlide;
use App\Models\AglStyleLife;
use App\Models\AglTopShopNews;
use App\Models\AglMenu;

class AdminController extends Controller
{


    public function Home()
    {
        return view('admin.home');
    }
    public function getConfig()
    {
        $config=AglSystemConfig::first();
        return view('admin.config.home',['config'=>$config]);
    }
    public function postConfig(Request $request)
    {
        try{
            $config=AglSystemConfig::first();
            $config->address_vi=$request->address_vi;
            $config->address_en=$request->address_en;
            $config->google_map=$request->google_map;
            $config->hotline=$request->hotline;
            $config->phone_number=$request->phone_number;

            $config->facebook_link=$request->facebook_link;
            $config->twitter_link=$request->twitter_link;
            $config->instagram_link=$request->instagram_link;

            $config->seo_title=$request->seo_title;
            $config->seo_keyword=$request->seo_keyword;
            $config->seo_author=$request->seo_author;
            $config->seo_description=$request->seo_description;
            $config->google_analytic=$request->google_analytic;
            if($request->hasFile('file'))
            {
                if(file_exists("images/config/".$config->logo))
                {
                    unlink("images/config/".$config->logo);
                }
                $image = $request->file('file');
                $filename  = 'logo_'.time() . '.' . $image->getClientOriginalExtension();
                $path = public_path('images/config/' . $filename);
                Image::make($image->getRealPath())->resize(100, 120)->save($path);
                $config->logo=$filename;
            }
            if($config->save())
            {
                return redirect('/admin/config')->with('success','Cập nhật thông tin thành công');
            }
            else{
                return redirect('/admin/config')->with('failed','Cập nhật thông tin thất bại');
            }
        }
        catch (\Exception $e)
        {
            dd($e);
            return redirect('/admin/config');
        }
    }
    public function getSlide()
    {
        $slide=AglSlide::orderBy('updated_at','desc')->get();
        return view('admin.home.slide',['slides'=>$slide]);
    }
    public function getSlideByID($id)
    {
        try{
            if($id==0)
            {
                return view('admin.home.slide-detail');
            }
            else{
                $slide=AglSlide::find($id);
                if($slide)
                {
                    return view('admin.home.slide-detail-edit',['slide'=>$slide]);
                }
                else{
                    return redirect('admin/slide');
                }
            }
        }
        catch (\Exception $e)
        {
            return redirect('admin/slide')->with('failed','Lấy thông tin slide thất bại');
        }

    }
    public function postSlide($id, Request $request)
    {
        try{
            $show=0;
            if($request->is_show)
            {
                $show=1;
            }
            if($id==0)
            {
                $slide=new AglSlide();
                $slide->title_vi=$request->title_vi;
                $slide->title_en=$request->title_en;
                $slide->link=$request->link;
                $slide->is_show=$show;
                $slide->sort_order=$request->sort_order;
                if($request->hasFile('file'))
                {
                    $image = $request->file('file');
                    $filename  = 'slide_'.time() . '.' . $image->getClientOriginalExtension();
                    $path = public_path('images/slide/' . $filename);
                    Image::make($image->getRealPath())->resize(1700, 700)->save($path);
                    $slide->avatar=$filename;
                }
            }
            else{
                $slide=AglSlide::find($id);
                $slide->title_vi=$request->title_vi;
                $slide->title_en=$request->title_en;
                $slide->link=$request->link;
                $slide->is_show=$show;
                $slide->sort_order=$request->sort_order;
                if($request->hasFile('file'))
                {
                    if(file_exists("images/slide/".$slide->avatar))
                    {
                        unlink("images/slide/".$slide->avatar);
                    }
                    $image = $request->file('file');
                    $filename  = 'slide_'.time() . '.' . $image->getClientOriginalExtension();
                    $path = public_path('images/slide/' . $filename);
                    Image::make($image->getRealPath())->resize(1700, 700)->save($path);
                    $slide->avatar=$filename;
                }
            }
            $slide->save();
            return redirect('admin/slide')->with('success','Thêm slide thành công');
        }
        catch (\Exception $e)
        {
            return redirect('admin/slide')->with('failed','Thêm slide thất bại');
        }
    }
    public function DeleteSlide($id)
    {
        try{
            $slide=AglSlide::find($id);
            if($slide)
            {
                if(file_exists("images/slide/".$slide->avatar))
                {
                    unlink("images/slide/".$slide->avatar);
                }
                AglSlide::where('id',$id)->delete();
                return redirect('admin/slide')->with('success','Xóa slide thành công');
            }
        }
        catch (\Exception $e)
        {
            return redirect('admin/slide')->with('failed','Xóa slide thất bại');
        }
    }
    public function getStyleLife()
    {
        $style=AglStyleLife::orderBy('updated_at','desc')->get();
        return view('admin.home.style-life',['styles'=>$style]);
    }
    public function getStyleLifeByID($id)
    {
        try{
            if($id==0)
            {
                return view('admin.home.style-life-detail');
            }
            else{
                $style=AglStyleLife::find($id);
                if($style)
                {
                    return view('admin.home.style-life-detail-edit',['style'=>$style]);
                }
                else{
                    return redirect('admin/style-life');
                }
            }
        }
        catch (\Exception $e)
        {
            return redirect('admin/style-life')->with('failed','Lấy thông tin thời trang và cuộc sống thất bại');
        }

    }
    public function postStyleLife($id, Request $request)
    {
        try{
            if($id==0)
            {
                $style=new AglStyleLife();
                $style->content_vi=$request->content_vi;
                $style->content_en=$request->content_en;
            }
            else{
                $style=AglStyleLife::find($id);
                $style->content_vi=$request->content_vi;
                $style->content_en=$request->content_en;
            }
            $style->save();
            return redirect('admin/style-life')->with('success','Thêm thành công');
        }
        catch (\Exception $e)
        {
            return redirect('admin/style-life')->with('failed','Thêm thất bại');
        }
    }
    public function DeleteStyleLife($id)
    {
        try{
            AglStyleLife::where('id',$id)->delete();
            return redirect('admin/style-life')->with('success','Xóa thành công');
        }
        catch (\Exception $e)
        {
            return redirect('admin/slide')->with('failed','Xóa thất bại');
        }
    }


    public function getShopNews()
    {
        $shop=AglTopShopNews::get();
        return view('admin.home.shop-news',['shops'=>$shop]);
    }
    public function getShopNewsByID($id)
    {
        try{
            $shop=AglTopShopNews::find($id);
            if($shop)
            {
                return view('admin.home.shop-news-detail-edit',['shop'=>$shop]);
            }
            else{
                return redirect('admin/shop-news');
            }
        }
        catch (\Exception $e)
        {
            return redirect('admin/shop-news')->with('failed','Lấy thông tin thất bại');
        }

    }
    public function postShopNews($id, Request $request)
    {
        try{
            $shop=AglTopShopNews::find($id);
            $shop->title_vi=$request->title_vi;
            $shop->title_en=$request->title_en;
            if($request->hasFile('file'))
            {
                if(file_exists("images/home/".$shop->avatar))
                {
                    unlink("images/home/".$shop->avatar);
                }
                $image = $request->file('file');
                $filename  = 'home_'.time() . '.' . $image->getClientOriginalExtension();
                $path = public_path('images/home/' . $filename);
                Image::make($image->getRealPath())->resize(1700, 700)->save($path);
                $shop->avatar=$filename;
            }
            $shop->save();
            return redirect('admin/shop-news')->with('success','Cập nhật thành công');
        }
        catch (\Exception $e)
        {
            return redirect('admin/shop-news')->with('failed','Cập nhật thất bại');
        }
    }
    public function getMenu()
    {
        $menu=AglMenu::get();
        return view('admin.menu.home',['menus'=>$menu]);
    }
    public function postMenu(Request $request)
    {
        try{
            $id=$request->id;
            $shop=AglMenu::find($id);
            $shop->title_vi=$request->title_vi;
            $shop->title_en=$request->title_en;
            $shop->sort_order=$request->sort_order;
            $shop->save();
            return redirect('admin/menu')->with('success','Cập nhật thành công');
        }
        catch (\Exception $e)
        {
            return redirect('admin/menu')->with('failed','Cập nhật thất bại');
        }
    }
}