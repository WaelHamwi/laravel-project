<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Editor;
use App\Category;
use App\News;

class CategoryController extends Controller
{
    public function create(){
        $pageTitle="add Category";
        $allEditors=Editor::all();
        return view('control\cpanel\category\add',array('pageTitle'=>$pageTitle,'allEditors'=>$allEditors));
    }
    public function store(Request $request){
     
        $Validate=$request->validate([
            'name'=>'required|unique:categories',
            'id_manager'=>'required',//validate to select tag
            'main_image'=>'required'
        ]);
        $fileName=time(). '.' .$request->main_image->extension();
        $request->main_image->move(public_path('images'),$fileName);
        $category=new Category();
        $category->name=$request->name;
        $category->id_manager=$request->id_manager;
        $category->main_image=$fileName;
        if($category->save()) {
            return back()->with(['message'=>'editor has been added']);
    }
    else{
        return back()->with(['message'=>'editor has not been added']);
    }
        
    }
    public function all(){
        $pageTitle="all Categories";
        $allCategories=Category::all();
       
        return view('control\cpanel\category\all',array('pageTitle'=>$pageTitle,'allCategories'=>$allCategories));
    }
    public function delete($id){
        $category=Category::find($id);
        if( $category->delete()) {
            return back()->with(['message'=>'news has been deleted']);
    }
    else{
        return back()->with(['message'=>'news has not been deleted']);
    }
       
    }
    public function edit($id){
        $category=Category::find($id);
        $allEditors=Editor::all();
        $pageTitle="edit editor";
        return view('control\cpanel\category\edit',array('pageTitle'=>$pageTitle,'category'=>$category,'allEditors'=>$allEditors));
    }
    public function update(Request $request, $id){
        $Validate=$request->validate([
        'name'=>'required|unique:categories',
        'id_manager'=>'required',
        'main_image'=>'required'
]);
        $fileName=time(). '.' .$request->main_image->extension();
        $request->main_image->move(public_path('images'),$fileName);
        $category=Category::find($id);
        $category->name=$request->name;
        $category->id_manager=$request->id_manager;
        $category->main_image=$fileName;
        if($category->save()) {
            return back()->with(['message'=>'category has been updated']);
    }
    else{
        return back()->with(['message'=>'category has not been updated']);
    }
    }
    public function Search(Request $request)
    {
       
       $news = News::where('name', 'LIKE', "%{$request->search}%")
            ->orWhere('id_editor',  'LIKE', "%{$request->search}%")
            ->orWhere('id_category',  'LIKE', "%{$request->search}%")
            ->orWhere('content',  'LIKE', "%{$request->search}%")->get();
        return view('control\front\searchNews',array(
            'news'=>$news
        ));
    }

}
