<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Editor;
use App\News;


class NewsController extends Controller
{
    public function create(){
        $pageTitle="Add News";
        $allCategories=Category::all();
        $allEditors=Editor::all();
        return view('control\cpanel\news\add',array('pageTitle'=>$pageTitle,'allEditors'=>$allEditors,'allCategories'=>$allCategories));
    }
    public function store(Request $request){
        $validate=$request->validate([
        'name'=>'required|unique:news',
        'content'=>'required',
        'id_editor'=>'required',
        'id_category'=>'required',
        'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $fileName=time(). '.' .$request->main_image->extension();
        $request->main_image->move(public_path('images'), $fileName);
        //$request->main_image->storeAs('public/images',$fileName);
        $news=new News();
        $news->name=$request->name;
        $news->id_editor=$request->id_editor;
        $news->id_category=$request->id_category;
        $news->content=$request->content;
        $news->main_image=$fileName;//$filename it gets the request be attention
        if($news->save()) {
            return back()->with(['message'=>'editor has been added']);
    }
    else{
        return back()->with(['message'=>'editor has not been added']);
    }
    }
    public function all(){
        $pageTitle="all News";
        $allCategories=Category::all();
        $allEditors=Editor::all();
        $allNews=News::all();
        return view('control\cpanel\news\all',array(
            'pageTitle'=>$pageTitle,
            'allCategories'=>$allCategories,
            'allNews'=>$allNews,
            'allEditors'=>$allEditors
        ));
    }

    public function show($id){
        $pageTitle='news page';
        $News=News::find($id);
        $allEditors=Editor::all();
        $allCategories=Category::all();
        //$allCategories=Category::all();
        //$allEditors=Editor::all();
        return view('control\cpanel\news\edit',array(
            'pageTitle'=>$pageTitle,
            'News'=>$News,
            'allEditors'=>$allEditors,
            'allCategories'=>$allCategories
));
    }
    public function delete($id){
        $news=News::find($id);
        if($news->delete($id)) {
            return back()->with(['message'=>'news has been deleted']);
    }
    else{
        return back()->with(['message'=>'news has not been deleted']);
    }
        
    }
    public function update(Request $request, $id){
        $validate=$request->validate([
            'name'=>'required|unique:news',
            'content'=>'required',
            'id_editor'=>'required',
            'id_category'=>'required',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
        
        $fileName=time(). '.' .$request->main_image->extension();
        $request->main_image->move(public_path('images'), $fileName);
        $news=News::find($id);        
        $news->name=$request->name;
        $news->id_editor=$request->id_editor;
        $news->id_category=$request->id_category;
        $news->content=$request->content;
        $news->main_image=$fileName;//$filename it gets the request be attention
        if($news->save()) {
            return back()->with(['message'=>'news has been updated']);
    }
    else{
        return back()->with(['message'=>'news has not been updated']);
    }
        
    }
   
}
