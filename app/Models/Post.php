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
}
