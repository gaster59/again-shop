<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newsletter extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'newsletters';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'sort_order',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    /**
     * @method getCategories
     * @return Array
     */
    public function getNewsletters()
    {
        $fields = [
            'id',
            'email',
            'sort_order'
        ];

        $result = $this->select($fields)->get();
        return $result;
    }
}
