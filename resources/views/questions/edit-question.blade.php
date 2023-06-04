@extends('layouts.public')

@section('content')
    <div class="container">
        <h1>{{__('transQuestion.Edit message')}}</h1>

        <form action="{{ route('questions.update', $question->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="form-group">
                <label for="title">{{__('transQuestion.Concept')}}:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $question->title }}">
            </div>

            <div class="form-group">
                <label for="description">{{__('transQuestion.Description')}}:</label>
                <textarea class="form-control" id="description" name="description">{{ $question->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">{{__('transLayout.Update')}}</button>
        </form>
    </div>
@endsection
