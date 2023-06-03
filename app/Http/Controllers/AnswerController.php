<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //pre-conditions, question_id required and the answer has to be more than 15 characters. 
        $this->validate($request, [
            /*'content' => "required|min:15",*/
            'question_id' => 'required|integer'
        ]);

        //Create a new answer 
        $answer = new Answer();
        $answer->content = $request->content;
        //Also store the user_id if is log in 
        if (Auth::check()) {
            $answer->user_id = Auth::id();
        }

        //Take the current question and save with the associate question
        $question = Question::findOrFail($request->question_id);
        $question->answers()->save($answer);

        //Redirect to the view with the question_id 
        return redirect()->route('questions.show', $question->id);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Find the answer and the question associate
        $answer = Answer::findOrFail($id);
        $question = $answer->question;

        //Only the author of the answer can edit
        if(Auth::user()->id == $answer->user_id){
            //Show the view for editing the answer 
            return view('questions.edit-answer', compact('answer', 'question')); // )->with('answer',$answer); 
        } 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Pre-conditions validate the form data
        $this->validate($request, [
            'content' => 'required|min:15'
        ]);

        // Find the answer record in the database by the id 
        $answer = Answer::findOrFail($id);

        // Update the answer record with the new data and save 
        $answer->content = $request->content;
        $answer->save();

        // Redirect to the show page of the question
        return redirect()->route('questions.show', $answer->question->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the answer record in the database
        $answer = Answer::findOrFail($id);

        // Get the question id before deleting the answer
        $questionId = $answer->question->id;

        // Delete the answer
        $answer->delete();

        // Redirect to the view 
        return redirect()->route('questions.show', $questionId);
    }
}
