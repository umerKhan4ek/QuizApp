@extends('welcome')

@section('content')

@if(Session::has('message'))
<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
  <strong>
      {!! session()->get('message') !!}
  </strong>
</div>
@endif

@if(Session::has('danger'))
<div class="alert alert-dismissable alert-danger">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
  <strong>
      {!! session()->get('danger') !!}
  </strong>
</div>
@endif

<div class="">
    <a href="/limit" class="btn btn-primary float-right mb-3">Make Quiz</a>
</div>

<table class="table ">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">QuizName</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($allQuiz as $SingleQuiz)
        <tr>

            <th scope="row">{{    $SingleQuiz->id}}</th>
            <td>{{$SingleQuiz->quizname}}</td>

            <td>
              <a href="{{route('QuestionCreationForm',$SingleQuiz->id)}}" class="btn btn-success btn-sm">Make Questions</a>
              <a class="btn btn-danger btn-sm" href="{{ route('quiz.delete', $SingleQuiz->id) }}">Delete this Quiz</a>
              <a class="btn btn-primary btn-sm" href="{{ route('quiz.Attempt', $SingleQuiz->id) }}">Attempt this Quiz</a>
            </td>
      
        </tr>
        
      @endforeach
     
    </tbody>
  </table>
@endsection 