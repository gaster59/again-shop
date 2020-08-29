<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RenewPasswordRequest extends FormRequest
{

    public function __construct()
    {
        parent::__construct();
    }

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
            'old_password'   => 'required|password:admin', //admin is guard
            'new_password'   => 'required|min:6',
            'renew_password' => 'required|same:new_password',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [

        ];
    }
}
