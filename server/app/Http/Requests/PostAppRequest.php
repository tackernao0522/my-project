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
            'item-image' => ['file', 'image'],
            'title' => ['required', 'string', 'max:255'],
            'tags' => 'json|regex:/^(?!.*\s).+$/u|regex:/^(?!.*\/).*$/u',
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
            'tags' => '本文',
            'language' => '言語',
            'framework' => 'フレームワーク',
            'description' => 'アプリの説明',
            'url' => 'リンク先には',
        ];
    }

    public function passedValidation()
    {
        $this->tags = collect(json_decode($this->tags))
            ->slice(0, 5)
            ->map(function ($requestTag) {
                return $requestTag->text;
            });
    }
}
