<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $_table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $_fillable = [
        'memo',
        'total',
        'customer_id',
        'customer_first_name',
        'customer_last_name',
        'country_id',
        'ip',
        'address',
        'ship_address',
        'postal_code',
        'city',
        'phone',
        'email',
        'status',
        'updated_by',
        'deleted_by',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $_guarded = [];

    /**
     * @method getOrdersPaginate
     * @param Integer $limit
     * @return Array
     */
    public function getOrdersPaginate($limit)
    {
        $result = $this->paginate($limit);
        return $result;
    }

    /**
     * @method getDetailOrder
     * @param Integer $id
     * @return Array
     */
    public function getDetailOrder($id)
    {
        $order       = $this->where('id', $id)->first();
        $detailOrder = $this->select('order_details.*')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->where('order_details.order_id', $id)->get();
        return [
            $order,
            $detailOrder,
        ];
    }
}
