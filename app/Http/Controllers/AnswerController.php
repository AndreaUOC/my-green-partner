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
        
        $this->validate($request, [
            /*'content' => "required|min:15",*/
            'question_id' => 'required|integer'
        ]);

        $answer = new Answer();
        $answer->content = $request->content;
        
        if (Auth::check()) {
            $answer->user_id = Auth::id();
        }

        
        $question = Question::findOrFail($request->question_id);
        $question->answers()->save($answer);

        
        return redirect()->route('questions.show', $question->id);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $answer = Answer::findOrFail($id);
        $question = $answer->question;

        
        if(Auth::user()->id == $answer->user_id){
            
            return view('questions.edit-answer', compact('answer', 'question')); 
        } 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $this->validate($request, [
            'content' => 'required|min:15'
        ]);

        
        $answer = Answer::findOrFail($id);

        $answer->content = $request->content;
        $answer->save();

        return redirect()->route('questions.show', $answer->question->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $answer = Answer::findOrFail($id);
        $questionId = $answer->question->id;
        $answer->delete();

        return redirect()->route('questions.show', $questionId);
    }
}
