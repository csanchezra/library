<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // protected $table = "users"; Sin importan la convencion
    protected $fillable = ['student_id','first_name','last_name','approved','rejected','category','roll_num','branch','year','email_id']; // cosas que entiende elocuent a guardar
    protected $guarded = []; // cosas que ignora elocuent

    protected $primaryKey = 'student_id';

    // public function getRouteKeyName()
    // {
    //     // return $this->getKeyName();
    //     return 'slug';
    // }
}
