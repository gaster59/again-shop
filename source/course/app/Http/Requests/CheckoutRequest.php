<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Country;

class CheckoutRequest extends FormRequest
{

    private $__country;

    public function __construct(Country $country)
    {
        $this->country = $country;
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
        $countries = $this->country->getCountries();
        $listCountry = '';
        foreach($countries as $item) {
            $listCountry .= $item->country_code.',';
        }
        $listCountry = substr($listCountry, 0, -1);

        return [
            'customer_first_name' => 'required|max:70',
            'customer_last_name' => 'required|max:70',
            'country_id'=> "required|in:$listCountry",
            'address' => 'required|max:200',
            'ship_address' => 'required|max:200',
            'city' => 'required|max:50',
            'postal_code' => 'required|max:10',
            'phone' => 'required',
            'email' => 'required|email',
            'memo' => 'max:200'
        ];
    }

}
