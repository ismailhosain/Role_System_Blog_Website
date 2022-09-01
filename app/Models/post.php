<?php

namespace App\Models;

use App\Models\category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class post extends Model
{

      protected $table='posts';

      protected $fillable = [
      'category_id',
      'name',
      'slug',
      'description',
      'yt_frame',
      'meta_title',
      'meta_description',
      'meta_keyword',
      'status',
      'created_by',
      ];

    use HasFactory;

     public function category()
     {
     return $this->belongsTo(category::class,'category_id','id'); //eikhane category hocce model name,category_id hocce foreign key and id hocce primary key
     }

     public function user()   //eikhaner user function ti use hoise post blade er post by te
     {
     return $this->belongsTo(User::class,'created_by','id');
     }


}
