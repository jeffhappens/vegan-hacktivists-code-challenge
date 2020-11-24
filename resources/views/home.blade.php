@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- <h2>Vegan Question and Answer Forum</h2> -->
        </div>
        <div class="col-md-12 my-5">
            <form method="post">
                @csrf
                <div class="form-group">
                    <textarea name="question" class="form-control @error('question') border-danger @enderror" rows="5" autofocus>{{ old('question') }}</textarea>
                </div>
                @if($errors)
                    <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                        <li class="text-danger font-weight-bold">{{ $error }}</li>
                    @endforeach
                    </ul>
                @endif
                <button type="submit" class="btn btn-primary">Ask a Question</button>
            </form>
        </div>
        @if(!$questions->isEmpty())
            @foreach($questions as $question)
                <div class="col-md-12 d-flex justify-content-between align-items-center bg-light my-2 py-2">
                    <h3>
                        <a href="">{{ $question->question_text }}</a>
                    </h3>
                    <p>{{ $question->answers_count }} {{ Str::of('answer')->plural($question->answers_count) }}</p>
                </div>
            @endforeach
        @endif
    </div>

@endsection