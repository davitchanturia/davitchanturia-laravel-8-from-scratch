<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // parameter is null but if we will set parameter it will create new post
        $post ??= new Post();

        $rules = [
            'title'          => ['required'],
            'thumbnail'      => $post->exists() ? ['image', 'mimes:jpeg,png,jpg,gif,svg'] : ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'slug'           => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt'        => ['required'],
            'body'           => ['required'],
            'category_id'    => ['required', Rule::exists('categories', 'id')],
        ];

        return $rules;
    }
}
