<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    protected $guarded = []; //不可以注入的字段
//    protected $fillable = ['title','content']; //可以注入的字段
}
