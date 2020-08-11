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

        $result = $this->select($fields)->where('deleted_at', null)->get();
        return $result;
    }

    public function getDetailCategory($id)
    {
        $result = $this->select()->where('id', $id)->where('deleted_at', null)->first();
        return $result;
    }
}
