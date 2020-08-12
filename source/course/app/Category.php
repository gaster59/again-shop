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
    protected $table = 'categories';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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

    public function getDetailCategory($id)
    {
        $result = $this->select()->where('id', $id)->first();
        return $result;
    }
}
