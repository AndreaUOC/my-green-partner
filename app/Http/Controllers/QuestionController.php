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
        $questions = Question::orderBy('id', 'desc')->paginate(5);
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
        $this->validate($request, [
            'title' => 'required|max:255'
        ]);
        $question = new Question();
        $question->title = $request->title;
        $question->description = $request->description;
        
        if (Auth::check()) {
            $question->user_id = Auth::id();
        }
        

        
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
        $question = Question::findOrFail($id);
        
        return view('questions.show')->with('question', $question);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $question = Question::findOrFail($id);

        if(Auth::user()->id == $question->user_id){

            return view('questions.edit-question')->with('question', $question);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required'
        ]);

        $question = Question::findOrFail($id);

        if(Auth::user()->id == $question->user_id){
            $question->title = $request->title;
            $question->description = $request->description;
            $question->save();

            return redirect()->route('questions.show', $question->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $question = Question::findOrFail($id);

        if(Auth::user()->id == $question->user_id){
            $question->delete();

            return redirect()->route('questions.index');
        }
    }
}
