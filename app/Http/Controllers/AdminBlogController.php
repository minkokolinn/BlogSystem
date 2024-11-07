<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;
use App\Models\Blog;

class AdminBlogController extends Controller
{
    public function index(){
        return view('admin.blogs.index',[
            "blogs"=>Blog::latest()->paginate(3)
        ]);
    }

    public function create(){
        return view('blogs.create',[
            'categories'=>Category::all()
        ]);
    }

    public function store(){
        $formData = request()->validate([
            "title"=>['required'],
            "slug"=>['required',Rule::unique('blogs','slug')],
            "intro"=>['required'],
            "body"=>['required'],
            "category_id"=>['required',Rule::exists('categories','id')]
        ]);
        $formData['user_id']=auth()->id();
        $formData['thumbnail']=request()->file('thumbnail')->store('thumbnails');
        
        Blog::create($formData);
        return redirect('/');
    }

    public function destory(Blog $blog){
        $blog->delete();
        return redirect('/admin/blogs');
    }
}
