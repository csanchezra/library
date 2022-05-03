<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\ Model as Eloquent;

class Post extends Eloquent
{
  protected $connection = 'mongodb';
  protected $collection = 'dataUsers';

  protected $fillable = [
    'slug',
  ];
}
