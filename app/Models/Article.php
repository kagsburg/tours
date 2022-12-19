<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = 'articles';
    protected $fillable = [
        'title', 'description', 'content', 'category_id','user_id','cover_image','is_deleted'
    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }
}
