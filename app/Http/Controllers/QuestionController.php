<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestion;
use App\Models\Question;

class QuestionController extends Controller
{
        /**
     * 
     *
     * @param \Illuminate\Request\RequestObject
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addQuestion(StoreQuestion $request)
    {
        $question = new Question;
        $question->question_text = $request->get('question');
        $question->save();

        return redirect('/');

    }
}
