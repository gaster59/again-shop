<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $_table = 'order_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $_fillable = [
        'order_id',
        'product_id',
        'product_name',
        'price',
        'price_down',
        'quality',
        'total',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $_guarded = [];

}
