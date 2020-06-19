<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_images';

    public function getImageByProduct($product_id)
    {
        $result = $this->select()
                        ->where('product_id', $product_id)
                        ->get();
        return $result;
    }
}
