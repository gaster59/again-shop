<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blogs';

    public function getBlogs()
    {
        $fields = [
            'name',
            'description',
            'summary',
            'img'
        ];
        $result = $this->select($fields)
                        ->where('deleted_at', null)
                        ->get();
        return $result;
    }
}
