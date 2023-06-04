@extends('layouts.public')
@section('content')

    <div class="container-fluid">
        <div class="mt-5 mb-5">
            <h1 class="display-1" style="font-family: 'Arial', sans-serif; font-size: 4rem; font-weight: bold; text-transform: uppercase; color: #333; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); max-width: 100%;">{{ __('transQuestion.Welcome to the community')}}:</h1>
        </div>    
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('questions.create') }}" class="btn btn-light btn-lg" style="font-size: 1.2rem;">{{ __('transQuestion.Ask a question')}}</a>
            </div>
        <hr class="border-t-4 border-primary w-3/4 my-6 mx-auto">
        @foreach ($questions as $question)
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title">
                        {{ $question->title }}
                    </h3>
                    <p class="card-text">
                        {{ $question->description }}
                    </p>
                    <a href="{{ route('questions.show', $question->id) }}" class="btn btn-link btn-sm">{{ __('transQuestion.View Details')}}</a>
                </div>
            </div>
        @endforeach
    </div>
    <hr />
    {{ $questions->links('vendor.pagination.bootstrap-5') }}
    
@endsection
