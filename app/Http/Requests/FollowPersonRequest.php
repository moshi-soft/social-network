<?php

namespace App\Http\Requests;

use App\Models\Follower;
use App\Rules\abcIsFollowingPerson;
use App\Rules\IsFollowingPerson;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class FollowPersonRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        //dd($this->route('pageId'));
//        $total = Follower::where('follower_id', '=', auth()->id())->where('followable_id', '=', $this->pageId)->count();
//        dd($total);
        dd([new IsFollowingPerson(pageId: $this->route('pageId'))]);
        return [
//             [new IsFollowingPerson(pageId: $this->route('pageId'))],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->error('Validation Errors', $validator->errors(), 422)
        );
    }
}
