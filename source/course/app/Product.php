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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'summary',
        'avatar',
        'avatar_thumb',
        'meta_tags',
        'meta_description',
        'price',
        'price_down',
        'created_by',
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
     * @method getProducts
     */
    public function getProducts()
    {
        $result = $this->get();
        return $result;
    }

    /**
     * @method getProductsPaginate
     * @param Integer $limit
     * @return Array
     */
    public function getProductsPaginate($limit)
    {
        $result = $this->where('price_down', '=', 0)->paginate($limit);
        return $result;
    }

    /**
     * @method getProductsSell
     * @param Integer $limit
     * @return Array
     */
    public function getProductsSell($limit)
    {
        $result = $this->where('price_down', '!=', 0)->limit($limit)->orderBy('updated_by', 'desc')->get();
        return $result;
    }

    /**
     * @method getProductsPaginate
     * @param Integer $limit
     */
    public function getProductsByCategoryPaginate($categoryId, $limit)
    {
        $result = $this->join('product_categories', 'products.id', '=', 'product_categories.product_id')
            ->where('category_id', $categoryId)->paginate($limit);
        return $result;
    }

    /**
     * @method getDetailProduct
     * @param Integer $id
     * @return object
     */
    public function getDetailProduct($id)
    {
        $result = $this->where('id', $id)->first();
        return $result;
    }
}
