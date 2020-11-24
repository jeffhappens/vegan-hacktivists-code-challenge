<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAnswer;
use App\Models\Question;
use App\Models\Answer;

class AnswerController extends Controller
{
    //
    public function displayAnswers($id)
    {
        $question = Question::with('answers')->find($id);
        return view('answers', compact('question'));
    }

    public function storeAnswer(StoreAnswer $request)
    {
        $answer = new Answer;
        $answer->question_id = $request->get('question_id');
        $answer->answer_text = $request->get('answer');
        $answer->save();
        return redirect()->back();
    }
}
