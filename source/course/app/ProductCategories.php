<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_categories';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * @method getCategoryFromProduct
     * @param Integer $productId
     * @return array
     */
    public function getCategoryFromProduct($productId)
    {
        $result = $this->where('product_id', $productId)->get();
        return $result;
    }

    /**
     * @method deleteCategoryFromProduct
     * @param Integer $productId
     */
    public function deleteCategoryFromProduct($productId)
    {
        DB::table($this->getTable())->where('product_id', $productId)->delete();
    }

}
