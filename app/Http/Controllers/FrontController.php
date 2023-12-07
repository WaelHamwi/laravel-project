<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Editor;
use App\News;
use App\Category;

class FrontController extends Controller
{
    public function Index(){
        $pageTitle="News Page";
        $allNews=News::all();
        return view('control\front\index',array(
            'pageTitle'=>$pageTitle,
            'allNews'=>$allNews

        ));
    }
    public function show($id){
        $pageTitle="single News Page";
        $news=News::find($id);
        return view('control\front\news',array(
            'pageTitle'=>$pageTitle,
            'news'=>$news
            
        ));
    }
    public function category(){
        $pageTitle="categories Page";
        $allCategories=category::all();
        return view('control\front\category',array(
            'pageTitle'=>$pageTitle,
            'allCategories'=>$allCategories

        ));}

       /* public function newsRelatedToCategory(){
            $pageTitle="newsRelatedToCategory";
            $categories=Category::all();
            //$allNewsRelatedToCategory=News::belongs_toCategory($id)->get();//all news as an array  
            return view('control\front\newsCategory',array(
                'pageTitle'=>$pageTitle,
                'categories'=>$categories
            ));
        
            }*/
            public function newsRelatedToCategory($id)
{
    //
    $category = Category::where('id', $id)->first();

    $News = News::whereIn('id_category', [$category->id])->orderby('id', 'asc')->paginate('12');//function to get all news related to a specific category
    //dd($News);

    return view('control\front\newsCategory', compact('category', 'News'));

       /* public function newsRelatedToCategory($id){
        $pageTitle="newsRelatedToCategory";
        $categoryOnly=Category::find($id);
        //$allNewsRelatedToCategory=News::belongs_toCategory($id)->get();//all news as an array
        dd($news);   
        return view('control\front\newsCategory',array(
            'pageTitle'=>$pageTitle,
            'news'=>$news,
            'category'=>$category
        ));
    
        }*/
    
    
    } 
}
