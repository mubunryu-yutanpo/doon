<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidRequest extends FormRequest
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
            //viewで設定している各フォームのname属性の名前になるよ
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|max:255',
            'password' => 'sometimes|required|string|max:255|min:8',
            'title' => 'sometimes|required|string|max:255',
            'subtitle'=> 'sometimes|required|string|max:255',
            'problem_statement' => 'sometimes|required|string|max:255',
            'correct' => 'sometimes|required|string|max:255',
            'fake1' => 'sometimes|required|string|max:255',
            'fake2' => 'sometimes|required|string|max:255',
            'fake3' => 'sometimes|required|string|max:255',
            'comment' => 'sometimes|string|nullable|max:255|',
        ];
    }

    public function messages(){
        return[
            //フォームリクエスト（バリデーション）のエラーメッセージ設定
            // 'name.required' => '入力必須です',
            // 'email.required' => '入力必須です',
            // 'password.required' => '入力必須です',
            'title.required' => '入力必須です',
            'subtitle.required' => '入力必須です',
            'problem_statement.required' => '入力必須です' ,
            'correct.required' => '入力必須です',
            'fake1.required' => '入力必須です',
            'fake2.required' => '入力必須です',
            'fake3.required' => '入力必須です',
        ];
    }

}
