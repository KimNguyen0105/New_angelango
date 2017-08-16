<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\AglNews;
use Image;

class NewsController extends Controller
{
    //
    public function getNews()
    {
        $news = AglNews::orderBy('updated_at', 'desc')->get();
        return view('admin.news.home', [
            'news' => $news
        ]);
    }
    public function getCreateNews()
    {
        return view('admin.news.create_news');
    }
    public function postCreateNews(Request $request)
    {
        try{
            $news=new AglNews();
            $news->title_vi=$request->title_vi;
            $news->title_en=$request->title_en;
            $news->content_vi=$request->content_vi;
            $news->content_en=$request->content_en;
            $news->slug_vi=str_slug($request->title_vi);
            $news->slug_en=str_slug($request->title_en);
            $news->seo_title=$request->seo_title;
            $news->seo_keyword=$request->seo_keyword;
            $news->seo_author=$request->seo_author;
            $news->seo_description=$request->seo_description;
            $news->status=1;
            if($request->hasFile('file'))
            {
                $image = $request->file('file');
                $filename  = 'news_'.time() . '.' . $image->getClientOriginalExtension();
                $path = public_path('images/news/' . $filename);
                Image::make($image->getRealPath())->resize(300, 200)->save($path);
                $news->avatar=$filename;
            }
            if($news->save())
            {
                return redirect('/admin/news')->with('success', 'Thêm tin tức thành công');
            }
            else{
                return redirect('/admin/news/create-news')->with('failed', 'Thêm tin tức thất bại');
            }
        }
        catch (\Exception $e)
        {
            return view('admin.news.detail_news')->with('failed', 'Thêm tin tức thất bại');
        }
    }
    public function getEditNews($id)
    {
        try{
            $news=AglNews::find($id);
            return view('admin.news.edit_news',['news'=>$news]);
        }
        catch (\Exception $e)
        {
            return view('admin.news.home')->with('failed', 'Thêm tin tức thất bại');
        }
    }
    public function postEditNews($id, Request $request)
    {
        try{
            $news=AglNews::find($id);
            if($news)
            {
                $news->title_vi=$request->title_vi;
                $news->title_en=$request->title_en;
                $news->content_vi=$request->content_vi;
                $news->content_en=$request->content_en;
                $news->slug_vi=str_slug($request->title_vi);
                $news->slug_en=str_slug($request->title_en);
                $news->seo_title=$request->seo_title;
                $news->seo_keyword=$request->seo_keyword;
                $news->seo_author=$request->seo_author;
                $news->seo_description=$request->seo_description;
                if($request->hasFile('file'))
                {
                    if(file_exists("images/news/".$news->avatar))
                    {
                        unlink("images/news/".$news->avatar);
                    }
                    $image = $request->file('file');
                    $filename  = 'news_'.time() . '.' . $image->getClientOriginalExtension();
                    $path = public_path('images/news/' . $filename);
                    Image::make($image->getRealPath())->resize(600, 465)->save($path);
                    $news->avatar=$filename;
                }
                if($news->save())
                {
                    return redirect('/admin/news')->with('success', 'Thêm tin tức thành công');
                }
                else{
                    return redirect('/admin/news/edit-news/'.$id)->with('failed', 'Thêm tin tức thất bại');
                }
            }

        }
        catch (\Exception $e)
        {
            return view('admin.news.home')->with('failed', 'Thêm tin tức thất bại');
        }
    }
    public function DeleteNews($id)
    {
        try{
            $news=AglNews::find($id);
            if($news)
            {
                if(file_exists("images/news/".$news->avatar))
                {
                    unlink("images/news/".$news->avatar);
                }
                $news->status=0;
                if($news->save())
                {
                    return redirect('/admin/news')->with('success', 'Xóa tin tức thành công');
                }
                else{
                    return redirect('/admin/news')->with('failed', 'Xóa tin tức thất bại');
                }
            }
        }
        catch (\Exception $e)
        {
            return redirect('/admin/news')->with('failed', 'Xóa tin tức thất bại');
        }
    }
}
