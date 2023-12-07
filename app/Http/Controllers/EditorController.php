<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Editor;
use App\News;

class EditorController extends Controller
{
    public function create(){
        $pageTitle='Add editor';
        return view('control\cpanel\editor\add')->with('pageTitle',$pageTitle);
    }
    public function store(Request $request){
        $validate=$request->validate([
            'name'=>'required',
            'salary'=>'required|numeric',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $fileName=time(). '.' .$request->main_image->extension();
        $request->main_image->move(public_path('images'), $fileName);
        $editor=new Editor();
        $editor->name=$request->name;
        $editor->salary=$request->salary;
        $editor->main_image=$fileName;
        if($editor->save()) {
            return back()->with(['message'=>'editor has been added']);
    }
    else{
        return back()->with(['message'=>'editor has not been added']);
    }
}
    public function all(){
        $pageTitle='all editors';
        $allEditors=Editor::all();
        $news=News::all();
        return view('control\cpanel\editor\all',array('pageTitle'=>$pageTitle,'allEditors'=>$allEditors,'news'=>$news));
    }
    public function show($id){
        $pageTitle='edit editor';
        $editor=Editor::find($id);
        //return view('control\cpanel\editor\edit',['pageTitle' => 'edit editor']);
        return view('control\cpanel\editor\edit',array('pageTitle'=>$pageTitle,'editor'=>$editor));
    }
    public function update(Request $request, $id ){
        $validated=$request->validate([
            'name'=>'required',
            'salary'=>'required|numeric',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $fileName=time(). '.' .$request->main_image->extension();
        $request->main_image->move(public_path('images'),$fileName);
        $editor=Editor::find($id);
        $editor->name=$request->name;
        $editor->salary=$request->salary;
        $editor->main_image=$fileName;
        if($editor->save()) {
            return back()->with(['message'=>'editor has been updated']);
    }
    else{
        return back()->with(['message'=>'editor has not been updated']);
    }
    }
    public function delete($id){
        $editor=Editor::find($id);
        if($editor->delete()) {
            return back()->with(['message'=>'news has been deleted']);
    }
    else{
        return back()->with(['message'=>'news has not been deleted']);
    }
        
    }
}
