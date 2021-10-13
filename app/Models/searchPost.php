<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

use Spatie\YamlFrontMatter\YamlFrontMatter;


class searchPost
{

    public $slug;

    public $title;

    public $date;

    public $excerpt;

    public $body;

    

    public function __construct($slug, $title, $excerpt, $date, $body)
    {
        $this->slug = $slug;
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
    }



    public static function all()
    {
           return collect(File::files(resource_path("posts/")))
    
            ->map(function($file){
                return YamlFrontMatter::parseFile($file);
            })

            ->map(function($document){
                return new searchPost(
                    $document->slug,
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                );
            })
            ->sortByDesc('date'); 
        
    }

    public static function find($element)
    {
        return static::all()->firstWhere('slug' , $element);
    }

    public static function findorfail($element)
    {
        $el = static::find($element);

        if(! $el){
            throw new ModelNotFoundException();
        }

        return $el;
    }
}
