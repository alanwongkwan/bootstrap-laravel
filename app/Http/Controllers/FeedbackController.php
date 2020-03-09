<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedback = Feedback::latest()->get();

        return view('pages.feedback', compact('feedback'));
    }

    public function show(Feedback $feedback)
    {
        return view('feedback.show', compact('feedback'));
    }

    public function store()
    {
        $article = new Feedback($this->validateFeedback());

        $article->email = request('email');
        $article->message = request('message');

        $article->save();

        return redirect()->route('page.contacts');
    }

    protected function validateFeedback()
    {
        return request()->validate([
            'email' => 'required|unique:feedback,email',
            'message' => ['required', 'min:10']
        ]);
    }
}
