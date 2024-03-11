<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class AdminController extends Controller
{
    public function view_news(){
        return view('admin.news');
    }

    public function add_news(Request $request){
        $news=new news;
        $news->title=$request->title;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('news', $imagename);
        $news->image=$imagename;
        $news->categories=$request->categories;
        $news->description=$request->description;
        $news->save();
    }
}
