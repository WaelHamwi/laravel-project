<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\News;
use App\Category;

class Editor extends Model
{
    protected $table = 'editors';
    protected $fillable=['name','salary','main_image'];
    public function has_many(){
        return $this->hasMany(News::class, 'id_editor', 'id');
    }
    public function categories()
{
    return $this->hasMany(Category::class,'id_manager');
}
    /*public function editorHasManyCategory(){
        return $this->many(Category::class, 'id_category', 'id');
    }*/
}
