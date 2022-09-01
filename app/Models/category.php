<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
   protected $table='categories';

    protected $fillable = [
    'name',
    'slug',
    'description',
    'image',
    'meta_title',
    'meta_description',
    'meta_keyword',
    'navbar_status',
    'status',
    'created_by',
    ];


    use HasFactory;

    public function postsdelete()
    {
    return $this->hasMany(post::class,'category_id','id');
    }
}
