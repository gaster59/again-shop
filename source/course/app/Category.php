<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $_table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $_fillable = [
        'name',
        'description',
        'meta_tags',
        'meta_description',
        'created_by',
        'updated_by',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $_guarded = [];

    /**
     * @method getCategories
     * @return Array
     */
    public function getCategories()
    {
        $fields = [
            'id',
            'name',
            'description',
            'parent_id',
        ];

        $result = $this->select($fields)->get();
        return $result;
    }

    /**
     * @method getDetailCategory
     * @param Integer $id
     * @return Object
     */
    public function getDetailCategory($id)
    {
        $result = $this->select()->where('id', $id)->first();
        return $result;
    }
}
