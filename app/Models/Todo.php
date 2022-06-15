<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    // protected $table = 'todos'; // نام جدول را به مدل می دهیم ، می توانیم بگیم به این مدل 
    //جدولش یه چیز دیگه باشه
    protected $fillable =['title','description']; // اجازه میدیم که این فیلدها ذخیره شوند
    // protected $gaurded = ['title'];//اجازه نمیدهیم ایم فیلدها ذخیره شوند
}
