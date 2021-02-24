<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostAppRequest extends FormRequest
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
        return [
            'item-image' => ['required', 'file', 'image'],
            'title' => ['required', 'string', 'max:255'],
            'language' => ['required', 'string', 'max:255'],
            'framework' => ['max:255'],
            'description' => ['required', 'string', 'max:2000'],
            'url' => ['url', 'nullable'],
        ];
    }

    public function attributes()
    {
        return [
            'item-image' => 'アプリ画像',
            'title' => 'アプリ名',
            'language' => '言語',
            'framework' => 'フレームワーク',
            'description' => 'アプリの説明',
            'url' => 'リンク先には',
        ];
    }
}
