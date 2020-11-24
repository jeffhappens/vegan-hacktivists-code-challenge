<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class PageController extends Controller
{
    /**
     * 
     *
     * @return \Illuminate\View
     */
    public function home()
    {
        $questions = Question::withCount('answers')->latest()->get();

        // return response($questions);
        return view('home', compact('questions'));
    }

    public function question()
    {
        return view('question');
    }

}
