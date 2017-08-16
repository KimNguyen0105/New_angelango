<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AglCollection;

class CollectionController extends Controller
{
    //
    public function getCollection()
    {
        try{
            $collections=AglCollection::orderBy('updated_at','desc')->get();
            return view('admin.collection.home',['collections'=>$collections]);
        }
        catch (\Exception $e)
        {
            return redirect('/admin');
        }
    }
    public function get
}
