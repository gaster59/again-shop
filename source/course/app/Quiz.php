<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'quiz';

    public function getQuizPaginate($limit = 10)
    {
        $result = $this->orderBy('id', 'desc')->paginate($limit);
        return $result;
    }
}
