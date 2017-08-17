<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AglCollection;
use Image;

class CollectionController extends Controller
{
    //
    public function getCollection()
    {
        try{
            $collections=AglCollection::where('status',1)->orderBy('updated_at','desc')->get();
            foreach ($collections as $collection)
            {
                $image=explode(';',substr($collection->avatar, 0, -1));
                if(count($image)!=0)
                {
                    $collection->avatar=$image[0];
                }
            }
            return view('admin.collection.home',['collections'=>$collections]);
        }
        catch (\Exception $e)
        {
            return redirect('/admin');
        }
    }
    public function getCreateCollection()
    {
        return view('admin.collection.create_collection');
    }
    public function postCreateCollection(Request $request)
    {
        try{
            $collection=new AglCollection();
            $collection->title_vi=$request->title_vi;
            $collection->title_en=$request->title_en;
            $collection->content_vi=$request->content_vi;
            $collection->content_en=$request->content_en;
            $collection->slug_vi=str_slug($request->title_vi);
            $collection->slug_en=str_slug($request->title_en);
            $collection->status=1;
            if($request->hasFile('file-multi'))
            {
                $images='';
                $file_ary = $request->file('file-multi');
                $i=1;
                foreach ($file_ary as $file) {
                    $filename='collection_'.$i.time().'.' . $file->getClientOriginalExtension();
                    $path = public_path('images/collection/' . $filename);
                    Image::make($file->getRealPath())->resize(240, 300)->save($path);
                    $i++;
                    $images.=$filename.';';
                }
            }
            $collection->avatar=$images;
            if($collection->save())
            {
                return redirect('/admin/collection')->with('success', 'Thêm tin tức thành công');
            }
            else{
                return redirect('/admin/collection/create-collection')->with('failed', 'Thêm tin tức thất bại');
            }
        }
        catch (\Exception $e)
        {
            return redirect('/admin/collection')->with('failed','Thêm bộ sưu tập thất bại');
        }
    }
    public function getEditCollection($id)
    {
        try{

            $collection=AglCollection::find($id);
            if($collection)
            {
                $images=explode(';',substr($collection->avatar, 0, -1));
                return view('admin.collection.edit_collection',['collection'=>$collection,'images'=>$images]);
            }
            else{
                return redirect('/admin/collection');
            }
        }
        catch (\Exception $e)
        {
            dd($e);
            return redirect('/admin/collection');
        }
    }
    public function postEditCollection($id, Request $request)
    {
        try{
            $collection=AglCollection::find($id);
            $collection->title_vi=$request->title_vi;
            $collection->title_en=$request->title_en;
            $collection->content_vi=$request->content_vi;
            $collection->content_en=$request->content_en;
            $collection->slug_vi=str_slug($request->title_vi);
            $collection->slug_en=str_slug($request->title_en);
            $collection->status=1;
            $images=$collection->avatar;
            if($request->hasFile('file-multi'))
            {
                $file_ary = $request->file('file-multi');
                $i=1;
                foreach ($file_ary as $file) {
                    $filename='collection_'.$i.time().'.' . $file->getClientOriginalExtension();
                    $path = public_path('images/collection/' . $filename);
                    Image::make($file->getRealPath())->resize(240, 300)->save($path);
                    $i++;
                    $images.=$filename.';';
                }
            }

            $collection->avatar=$images;
            if($collection->save())
            {
                return redirect('/admin/collection')->with('success', 'Thêm tin tức thành công');
            }
            else{
                return redirect('/admin/collection/edit-collection/'.$id)->with('failed', 'Thêm tin tức thất bại');
            }
        }
        catch (\Exception $e)
        {
            return redirect('/admin/collection')->with('failed','Thêm bộ sưu tập thất bại');
        }
    }
    public function DeleteCollection($id)
    {
        try{
            $collection=AglCollection::find($id);
            if($collection)
            {
                $images=explode(';',substr($collection->avatar, 0, -1));
                foreach ($images as $image)
                {
                    if(file_exists("images/collection/".$image))
                    {
                        unlink("images/collection/".$image);
                    }
                }
                $collection->status=0;
                if($collection->save())
                {
                    return redirect('/admin/collection')->with('success', 'Xóa tin tức thành công');
                }
                else{
                    return redirect('/admin/collection')->with('failed', 'Xóa tin tức thất bại');
                }
            }
        }
        catch (\Exception $e)
        {
            return redirect('/admin/collection')->with('failed', 'Xóa tin tức thất bại');
        }
    }
}
