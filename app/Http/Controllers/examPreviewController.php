<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Question;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class examPreviewController extends Controller
{

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->model = $questionRepository;
    }

    public function index($id)
    {
        $exam = Exam::findOrFail($id);
        $questions = $this->model->preview($id);

        return view('exams.preview', compact('exam', 'questions', 'id'));
    }
}
