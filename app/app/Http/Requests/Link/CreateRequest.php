<?php

namespace App\Http\Requests\Link;

use App\Exceptions\ValidationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;

/**
 * @property mixed link
 */
class CreateRequest extends FormRequest
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
            'link' => ['required', 'string', 'min:3', 'max:2048'],
        ];
    }

    /**
     *
     * @throws ValidationException
     */
    public function passedValidation()
    {
        $url = $this->link;
        $url = filter_var($url, FILTER_SANITIZE_URL);
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new ValidationException([Lang::get('validation.correct')]);
        }
    }
}
