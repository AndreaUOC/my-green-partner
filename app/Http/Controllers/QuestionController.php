<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Go to the model and get a group of records 
        $questions = Question::orderBy('id', 'desc')->paginate(5);
        //return the views, and pass in the group of records to loop through
        return view('questions.index')->with('questions', $questions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate the form data 
        $this->validate($request, [
            'title' => 'required|max:255'
        ]);
        //process the data and submit it 
        $question = new Question();
        $question->title = $request->title;
        $question->description = $request->description;
        //Also store the user_id if is log in 
        if (Auth::check()) {
            $question->user_id = Auth::id();
        }
        //$question->save();

        //if successful we want to redirect 
        if ($question->save()) {
            return redirect()->route('questions.show', $question->id);
        } else {
            redirect()->route('questions.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Use the model to get 1 record from the database 
        $question = Question::findOrFail($id);
        //show the view and pass the record to the view
        return view('questions.show')->with('question', $question);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Use the model to get the question record from the database
        $question = Question::findOrFail($id);

        //Only the author of the question can edit
        if(Auth::user()->id == $question->user_id){
            // Show the view for editing the question and pass the question record to the view
            return view('questions.edit-question')->with('question', $question);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Pre-conditions validate the form data
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required'
        ]);

        // Find the question record in the database
        $question = Question::findOrFail($id);

        //Only the author of the question can update
        if(Auth::user()->id == $question->user_id){
            // Update the question record with the new data
            $question->title = $request->title;
            $question->description = $request->description;

            // Save the updated question record
            $question->save();

            // Redirect to the show page of the question
            return redirect()->route('questions.show', $question->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the question record in the database
        $question = Question::findOrFail($id);

        //Only the author of the question can delete
        if(Auth::user()->id == $question->user_id){
            // Delete the question record
            $question->delete();

            // Redirect to the index page of questions 
            return redirect()->route('questions.index');
        }
    }
}
