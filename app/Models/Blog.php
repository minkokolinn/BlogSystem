<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // protected $fillable = ['title','intro','body'];

    protected $with = ["author","category"];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function subscribers(){
        return $this->belongsToMany(User::class,'blog_user');
    }

    public function subscribe(){
        $this->subscribers()->attach(auth()->id());
    }
    public function unSubscribe(){
        $this->subscribers()->detach(auth()->id());
    }

    public function scopeFilter($query,$filter){
        $query->when($filter['search']??false,function($query,$searchVal){
            $query->where(function($query) use ($searchVal){
                $query->where('title','LIKE','%'.$searchVal.'%')
                        ->orWhere('body','LIKE','%'.$searchVal.'%');
            });
        });

        $query->when($filter['category']??false,function($query,$searchCat){
            $query->whereHas('category',function($query) use ($searchCat){
                $query->where('slug',$searchCat);
            });
        });

        $query->when($filter['username']??false,function($query,$searchAut){
            $query->whereHas('author',function($query) use ($searchAut){
                $query->where("username",$searchAut);
            });
        });
    }
}
