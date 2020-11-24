@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 my-4">
        <a class="text-body" href="/">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-back" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z"/>
            </svg>
            Back to all questions
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12 my-4 bg-white rounded shadow py-4">
        <h2>{{ $question->question_text }}</h2>
        <p class="text-muted">Asked {{ $question->created_at->diffForHumans() }}</p>
    </div>
</div>
<div class="row my-4">
    @foreach($question->answers as $answer)
    <div class="col-md-12 my-2">
        <h4>{{ $answer->answer_text }}</h4>
        <p class="text-muted"><small>Answered {{ $answer->created_at->diffForHumans() }}</small></p>
    </div>
    @endforeach
</div>

<div class="row">
    <div class="col-md-12">
        <form method="post" action="/answer/store">
            @csrf
            <input type="hidden" name="question_id" value="{{ $question->id }}">
            <div class="form-group">
                <textarea name="answer" class="form-control @error('answer') border-danger @enderror" rows="5" autofocus>{{ old('answer') }}</textarea>
            </div>
            @if($errors)
                <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                    <li class="text-danger font-weight-bold">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <button type="submit" class="btn btn-primary">Answer this Question</button>
        </form>
    </div>
</div>
@endsection