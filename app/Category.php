<?php

namespace App;
use App\News;
use App\Editor;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $igIncrements = 'id';
  /*public function has_many(){
      return $this->hasMany(News::class,'id_category','id','one-to-many');
  }*/
  public function news()
{
    return $this->hasMany(News::class,'id_category');
}
public function editor()
{
    return $this->belongsTo(Editor::class,'id_manager');
}
/*public function noOfNewsInCategory($id){
    $category = Category::where('id', $id)->first();
    $News1 = News::whereIn('id_category', [$category->id])->orderby('id', 'asc')->count();
    return $News1;
    }*/
}
