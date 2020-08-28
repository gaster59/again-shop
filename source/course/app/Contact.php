<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contacts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'message',
        'response',
        'updated_by',
        'deleted_by'
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * @method getBlogsPaginate
     * @param Integer $limit
     * @return Array
     */
    public function getBlogsPaginate($limit)
    {
        $result = $this->paginate($limit);
        return $result;
    }

    /**
     * @method getDetailBlog
     * @param Integer $id
     * @return object
     */
    public function getDetailContact($id)
    {
        $result = $this->select()->where('id', $id)->first();
        return $result;
    }
}
