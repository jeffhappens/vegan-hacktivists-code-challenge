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
        $randomQuestions = [
            'Will cows explode if they aren\'t milked?',
            'How do vegans get their protein?',
            'How many chickens are killed every day by factory farming?',
            'Isn\'t is expensive to go vegan?',
            'Can I still have cheese?',
            'Will I become deficient in B vitamins?'
        ];

        // return response($questions);
        return view('home', compact(['questions', 'randomQuestions']));
    }

    public function question()
    {
        return view('question');
    }

}
