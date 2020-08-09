<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    public function getCategories()
    {
        $fields = [
            'name',
            'description',
            'parent_id',
        ];

        $result = $this->select($fields)
            ->where('deleted_at', null)
            ->get();
        return $result;
    }
}
