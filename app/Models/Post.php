<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    // ამას ვუწერთ რომ ბევრი პოსტის წამოღებისას წამოიღოს მოცემული მნიშნელობების მიხედვით რითიც დაიზოგება ქუერების რაოდენობა და მალე ჩაიტვირთება
    protected $with = ['category', 'author'];

    // ამ მეთოდით Post მოდელიდან ვამყარებთ კავშირს Category-ზე  == Eloquent relationship
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    // კონტროლერში გამოძახებული ფილტერ მეთოდია
    public function scopeFilter ($query, array $filters)
    {
         
        // search ფილტრი
            $query->when($filters['search'] ?? false, function($query, $search){

                $query
                ->where('title', 'like', '%' . request('search') . '%' )
                ->orwhere('body', 'like', '%' . request('search') . '%' );

            });

        // category ფილტრი
            $query->when($filters['category'] ?? false, fn ($query, $category) =>
             // 1) გზა 1

                $query->whereHas('category', fn ($query) => //  მომიძებნე პოსტები რომლებსაც აქვთ კატეგორია
                    $query->where('slug', $category)  // კონკრეტულად ის პოსტებირომელთა კატეგორიის slug == იუზერის მმონიშნულ კატეგორიას

                )
            
             // 2) გზა 2 
                // $query
                // ->whereColumn('categories.id', 'posts.category_id')
                // ->where('categories.slug', $category)

            );   

            // author ფილტრი
            $query->when($filters['author'] ?? false, fn ($query, $author) =>
            // 1) გზა 1
               $query->whereHas('author', fn ($query) => 
                   $query->where('username', $author)
               )

           );
                
    }

}
