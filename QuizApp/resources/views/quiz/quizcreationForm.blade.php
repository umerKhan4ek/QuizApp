@extends('welcome')

@section('content')

<form action="{{ route('createQuizQuestions') }}" method="POST">

    @csrf
    <input type="hidden" value="{{$id}}" name="quizId">
    <div class="row">
        @for ($i = 1; $i <= $quizLimit; $i++) 
        <div class="col-md-4">
            <div class="form-group">
                <label for=""> <b> Question {{$i}} </b> </label>
                <input type="text" name="Question[]" id="" class="form-control" placeholder="Enter Question">
            </div>
            

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Option 1</label>
                        <input type="text" name="Opt1[]" id="" class="form-control" placeholder="Enter Question">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Option 2</label>
                        <input type="text" name="Opt2[]" id="" class="form-control" placeholder="Enter Question">
                    </div>
                </div>

            </div>
            

            
        </div>
    @endfor
    
    </div>


        <div >

            <button class="btn btn-success" >Save</button>
        </div>
    

</form>
@endsection


