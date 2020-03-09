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
    // =====================================================================
    public function edit(Feedback $feedback)
    {
        return view('feedback.edit', compact('feedback'));
    }

    public function update(Feedback $feedback)
    {
        $feedback->update($this->validateUpdateFeedback());

        return redirect(route('feedback.show', $feedback));
    }

    public function destroy($feedback)
    {
        $post = Feedback::find($feedback);
        if ($post) {
            $post->delete();
        }

        return redirect()->route('page.feedback');
    }

    protected function validateFeedback()
    {
        return request()->validate([
            'email' => 'required|unique:feedback,email',
            'message' => ['required', 'min:10']
        ]);
    }

    protected function validateUpdateFeedback()
    {
        return request()->validate([
            'email' => 'required',
            'message' => ['required', 'min:10']
        ]);
    }
}
