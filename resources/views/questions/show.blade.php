@extends('layouts.public')
@section('content')
    <div class="container">
        <h1 class="display-4">{{ $question->title }}</h1>
        @if ($question->user_id)
            <h6><em>Autor: {{ $question->user->name }}</em></h6>
        @endif
        <p class="lead">
            {{ $question->description }}
        </p>

        <!-- display buttons for edit and delete questions -->
        @auth 
            @if(Auth::user()->id == $question->user_id)
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-primary me-md-2">Editar</a>
                    <form action="{{ route('questions.destroy', $question->id) }}" method="POST" style="display:inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Suprimir</button>
                    </form>
                </div>
            @endif
        @endauth

        <hr /> <!-- Content separator line  -->

        <!-- display all of the answers for this question -->
        @if ($question->answers->count() > 0)
            @foreach ($question->answers as $answer)
                <div class="card mb-3">
                    <div class="card-body">
                        @if ($answer->user_id)
                            <h6><em>Autor: {{ $answer->user->name }}</em></h6>
                        @endif
                        <p>
                            {{ $answer->content }}
                        </p>
                        @auth 
                            @if(Auth::user()->id == $answer->user_id)
                                <div class="btn-group">
                                    <!-- Button to edition answer -->
                                    <a href="{{ route('answers.edit', $answer->id) }}"
                                        class="btn btn-outline-primary btn-sm me-md-2">Editar</a>
                                    <!-- Button to delete -->
                                    <form action="{{ route('answers.destroy', $answer->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Suprimir</button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            @endforeach
        @else
            <p>
                Encara no hi ha respostes per a aquesta pregunta.
            </p>
        @endif


        <hr />


        <!-- display the form to submit a new answer -->
        <form action="{{ route('answers.store') }}" method="POST">
            {{ csrf_field() }}

            <h4>Envieu una resposta:</h4>
            <textarea class="form-control" name="content" rows="4"></textarea>
            <input type="hidden" value="{{ $question->id }}" name="question_id" />
            <button class="btn btn-success">Enviar</button>
        </form>
    </div>

@endsection
