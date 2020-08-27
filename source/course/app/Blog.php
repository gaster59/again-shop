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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'summary',
        'avatar',
        'avatar_thumb',
        'meta_tags',
        'meta_description',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

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
    public function getDetailBlog($id)
    {
        $result = $this->select()->where('id', $id)->first();
        return $result;
    }
}
