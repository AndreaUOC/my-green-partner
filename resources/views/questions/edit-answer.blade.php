@extends('layouts.public')

@section('content')
    <div class="container">
        <h1>{{ $question->title }}</h1>
        <p class="lead">
            {{ $question->description }}
        </p> 

        <form action="{{ route('answers.update', $answer->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="content">{{__('transQuestion.Edit answer')}}:</label>
                <textarea class="form-control" name="content" id="content" rows="4">{{ $answer->content }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">{{__('transLayout.Update')}}</button>
        </form>
    </div>
@endsection
