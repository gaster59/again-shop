<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blogs';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * @method getBlogs
     * @return array
     */
    public function getBlogs()
    {
        $fields = [
            'name',
            'description',
            'summary',
            'avatar',
        ];
        $result = $this->select($fields)->get();
        return $result;
    }

    /**
     * @method getDetailBlog
     * @param Integer $id
     * @return object
     */
    public function getDetailBlog($id)
    {
        $result = $this->select()->where('id', $id)->first();
        return $result;
    }
}
