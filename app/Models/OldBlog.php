<?php
namespace App\Models;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class OldBlog
{
    public $title;
    public $slug;
    public $intro;
    public $body;
    public $date;

    public function __construct($title, $slug, $intro, $body, $date)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->intro = $intro;
        $this->body = $body;
        $this->date = $date;
    }

    // public static function findData($filename)
    // {
    //     $path = resource_path("blogs/$filename.html");
    //     if (!file_exists($path)) {
    //         // dd("No file found!");
    //         // abort(404);
    //         return redirect('/');
    //     }

    //     // Use file get contents cause executing this funciton many times can damage website performance
    //     return cache()->remember("blogs.$filename", now()->addSeconds(5), function () use ($path) {
    //         return file_get_contents($path);
    //     });
    // }

    public static function all()
    {
        return collect(File::files(resource_path('blogs')))
                ->map(function($fObj){
                    $yfm_fObj = YamlFrontMatter::parseFile($fObj);
                    return new OldBlog($yfm_fObj->title,$yfm_fObj->slug,$yfm_fObj->intro,$yfm_fObj->body(),$yfm_fObj->date);
                })
                ->sortByDesc('date');
        // return array_map(function($fObj){
        //     $yfm_fObj = YamlFrontMatter::parseFile($fObj);
        //     return new Blog($yfm_fObj->title,$yfm_fObj->slug,$yfm_fObj->intro,$yfm_fObj->body());
        // },$fileObjArr);
    }

    public static function findData($filename){
        $blogs = static::all();
        return $blogs->firstWhere('slug',$filename);
    }

    public static function findOrFail($filename){
        $blogs = static::findData($filename);
        if (!$blogs) {
            throw new ModelNotFoundException();
        }
        return $blogs;
    }

    // public static function all(){
    //     $fileObjArr = File::files(resource_path('blogs'));
    //     return array_map(function($fObj){
    //         return $fObj->getContents();
    //     },$fileObjArr);
    // }

    // public static function all()
    // {
    //     $fileObjArr = File::files(resource_path('blogs'));
    //     $blogObjArr = [];
    //     foreach ($fileObjArr as $fileObj) {
    //         $yfm_fObj = YamlFrontMatter::parseFile($fileObj);
    //         $blogObj = new Blog($yfm_fObj->title,$yfm_fObj->slug,$yfm_fObj->intro,$yfm_fObj->body());
    //         $blogObjArr[]=$blogObj;
    //     }

    //     return $blogObjArr;
    // }

    
}
