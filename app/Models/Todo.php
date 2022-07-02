<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    // protected $table = 'todos'; // نام جدول را به مدل می دهیم ، می توانیم بگیم به این مدل 
    //جدولش یه چیز دیگه باشه
    protected $fillable =['title','description','done','user_id']; // اجازه میدیم که این فیلدها ذخیره شوند
    // protected $gaurded = ['title'];//اجازه نمیدهیم ایم فیلدها ذخیره شوند


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     *global scope  
     */
    //
    //برای اضافه کردن شرط روی سلکت های جدول
    // protected static  function boot(){
    //     parent::boot();

    //     static::addGlobalScope('idgir',function($query){
    //         $query->where('id' ,'>',27);
    //     });
    // }

    // localscope
    // public function scopeMaxid($query,$value){
    //     $query->where('id' , '>',$value);
    // }

    // accessor -> get value of column with custom pattern
    //first_name => FirstNameAttribute
    // public function getTitleAttribute($value){
    //     return strtoupper($value);
    // }


    // mutator -> set value of column with custom pattern
    // first_name => setFirstNameAttribute
    //when insert data
    // public function setTitleAttribute($value){
    //     $this->attributes['title']= strtoupper($value);
    // }



}

