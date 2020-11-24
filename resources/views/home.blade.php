@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Vegan Question and Answer Forum</h2>
        </div>
        <div class="col-md-12 my-5">
            <form method="post">
                @csrf
                <div class="form-group">
                    <textarea name="question" class="form-control @error('question') border-danger @enderror" placeholder="{{ Arr::random($randomQuestions) }}" rows="5" autofocus>{{ old('question') }}</textarea>
                </div>
                @if($errors)
                    <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                        <li class="text-danger font-weight-bold">{{ $error }}</li>
                    @endforeach
                    </ul>
                @endif
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Ask a Question</button>
                </div>
            </form>
        </div>
        @if(!$questions->isEmpty())
            @foreach($questions as $question)
                <div class="col-md-12 d-flex justify-content-between align-items-center bg-white rounded shadow-sm my-4 py-4">
                    <div>
                        <h3>
                            <a class="text-body" href="{{ route('answers', ['id' => $question->id ]) }}">{{ $question->question_text }}</a>
                        </h3>
                        <p class="text-muted"><small>Asked {{ $question->created_at->diffForHumans() }}</small></p>
                    </div>
                    <p>{{ $question->answers_count }} {{ Str::of('answer')->plural($question->answers_count) }}</p>
                </div>
            @endforeach
        @else
        <div class="col-md-4 offset-md-4 text-center text-muted bg-white rounded py-4">
            <h3>It sure is quiet in here...</h3>
            <p>Be the first to ask us a question!</p>
        </div>
        @endif
    </div>

@endsection