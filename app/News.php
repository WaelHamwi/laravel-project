<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Editor;
use App\Category;
use Hamcrest\Core\Set;

class News extends Model
{
    protected $table = 'news';
    protected $igIncrements = 'id';
    protected $fillable=['name','id_editor'];
    

 public function belongs_to(){
     return $this->belongsTo(Editor::class, $foreignKey ='id_editor', $ownerkey='id',$relation='one-to-many');
 }
 public function category()
{
  //  return $this->belongsTo(Category::class);
  return $this->belongsTo(Category::class, $foreignKey ='id_category', $ownerkey='id',$relation='one-to-many');
}

}
/* public function __construct($id="")
 {

     $this->id = $id;
 }

public static function belongs_toCategory($id) {
    $model = new self();
    return $model->belongsTo(Category::class, $foreignKey =$id, $ownerkey='id', $relation='one-to-many');
}
}
 public static function belongs_toCategory($id){
   return $this->belongsTo(Category::class, $foreignKey =$id, $ownerkey='id',$relation='one-to-many')->where('id_category',$id);
}*/