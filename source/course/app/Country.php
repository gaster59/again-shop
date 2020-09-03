<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $_table = 'countries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $_fillable = [
        'country_code',
        'country_name',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $_guarded = [];

    /**
     * @method getCountries
     * @return Array
     */
    public function getCountries()
    {
        $fields = [
            'id',
            'country_code',
            'country_name',
        ];

        $result = $this->select($fields)->get();
        return $result;
    }
}
