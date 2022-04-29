<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // protected $table = "users"; Sin importan la convencion
    protected $fillable = ['book_id', 'title', 'author', 'category_id', 'description', 'added_by']; // cosas que entiende elocuent a guardar
    protected $guarded = []; // cosas que ignora elocuent

    // public function getRouteKeyName()
    // {
    //     // return $this->getKeyName();
    //     return 'slug';
    // }
}
