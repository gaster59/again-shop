<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'menus';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'title',
        'parent_id'
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * @method getMenus
     * @return array
     */
    public function getMenus()
    {
        $fields = [
            'id',
            'name',
            'title',
            'parent_id'
        ];

        $result = $this->select($fields)->get();
        return $result;
    }
}
