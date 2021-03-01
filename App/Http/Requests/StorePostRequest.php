<?php

namespace App\Http\Requests;

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
        /*if($this->user_id == auth()->user()->id){
            return true;
        }
        else{
            return false;

        }*/
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $post = $this->route()->parameter('post');

        $rules = [
           'name' => 'required|min:9|max:80',
           'slug' => 'required|unique:posts,slug,',
           'status'=> 'required|in:1,2',
           'file' => 'image',

        ];
        if($post){

           $rules['slug'] = 'required|unique:posts,slug,'.$post->id;

        }
        if($this->status == 2){
          $rules = array_merge($rules, [
              'category_id' => 'required',
              'tags' => 'required',
              'extrac' => 'required|min:25|max:800',
              'body' => 'required|min:60|max:5800',

          ]);


        }
        return $rules;
    }
}
