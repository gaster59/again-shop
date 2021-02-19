<?php

namespace App\Http\Controllers\Admin;

use App\Quiz;
use Illuminate\Http\Request;
use App\Http\Requests\QuizRequest;

class QuizController extends BaseAdminController
{
    public $quiz;

    public function __construct(Quiz $quiz)
    {
        $this->quiz = $quiz;
    }

    /**
     * @method index
     */
    public function index(Request $request)
    {
        $quizes = $this->quiz->getQuizPaginate();
        return view('admin.quiz.index', [
            'quizes' => $quizes,
            'q' => $request->query('q', '')
        ]);
    }

    public function add()
    {
        return view('admin.quiz.add');
    }

    public function doAdd(QuizRequest $request)
    {
        
    }
}
