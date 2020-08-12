<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $_table = 'products';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $_guarded = [];

    public function getProducts()
    {
        $result = $this->get();
        return $result;
    }

    public function getDetailProduct($id)
    {
        $result = $this->where('id', $id)->first();
        return $result;
    }
}
