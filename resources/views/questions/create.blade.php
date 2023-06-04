@extends('layouts.public')
@section('content')



<div class="container">
    <h1>{{__('transQuestion.New message')}}</h1>
    <hr />
    <form action="{{ route('questions.store') }}" method="POST">
        {{ csrf_field() }}
        <label for="title">{{__('transQuestion.Concept')}}:</label>
        <input type="text" name ="title" id="title" class="form-control" />

        <label for="description">{{__('transQuestion.Description')}}:</label>
        <textarea class="form-control" name="description" id="description" rows="4"></textarea>

        <input type="submit" class="btn btn-primary" value="{{__('transLayout.Submit')}}" />
    </form>
</div>

@endsection
