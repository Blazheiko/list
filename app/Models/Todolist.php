<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed getPublishedPost
 */
class Todolist extends Model
{
    protected $fillable = [ 'id','title','content' ];
//    public function getPublishedTodolist()
//    {
//        // $posts = Post::all();
//        $posts = Post::latest('id')->get();
//        return $posts ;
//    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }

}
