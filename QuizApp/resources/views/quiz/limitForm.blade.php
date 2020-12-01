@extends('welcome')

@section('content')
        <div class="card p-4 mt-4" >
            <form method="POST" action="{{route('QuizLimitForm')}}">
                @csrf
                <div class="form-group">
                  <label for="quizname">Quiz Name </label>
                  <input type="text" class="form-control" id="quizname" aria-describedby="quizname" placeholder="Enter Quiz Name" name="QName">
                  
                </div>
                <div class="form-group">
                  <label for="Limit">Question Limit</label>
                  <input type="number" class="form-control" id="limit" placeholder="Enter you limit of Questions" name="QLimit">
                </div>
                
                <button type="Save" class="btn btn-success">Submit</button>
              </form>
        </div>
@endsection 