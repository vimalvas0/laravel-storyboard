<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoryRequest extends FormRequest
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
            'title'=> ['required', function($attribute, $value, $fail)
                        {
                            if($value == 'Vimal') 
                            {
                                $fail(strtoupper($attribute) . " name cannot take $value as a value. Choose another.");
                            }
                        },
                    Rule::unique('stories') //Keep it unique in stories table
                ],
            'body'=> 'required',
            'type'=> 'required',
            'status'=> 'required',
        ];
    }


    public function withValidator($v)
    {

        // We want body limit to be this if input value is given as that
        $v->sometimes('body', 'max:20', function($input){
            return $input->type == 'short';
        });
    }


    public function messages(){
        return [
            // 'title.required' => 'Please Enter a Title'
            'required' => 'Please Enter a :attribute',
            'title.required' => 'Story must have a title.',
            'body.required' => 'Empty Story not allowed.'
        ]; 
    }
}
