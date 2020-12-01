@extends('welcome')

@section('content')

<form  method="POST" id="Qform">

    @csrf
    <div class="card w-50 m-auto" >
        <h5 class="card-header"  >Question <span id="number">{{$GetJsonQuestion[0]->id}}</span> </h5>
        <div class="card-body">
            <h5 class="card-title" id="question"> {{$GetJsonQuestion[0]->question}} </h5>

            <b>Options</b>
            <br>
            <br>
            <div class="form-check">
                
                <input class="form-check-input" type="radio" name="option" id="option1" value="option1" >
                
                <label class="form-check-label" for="option1">
                <p id="option1">  {{$GetJsonQuestion[0]->option1}}   </p>

                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="option" id="option2" value="option2">
                <label class="form-check-label" for="option2">
                <p id="option2">  {{$GetJsonQuestion[0]->option2}}   </p>

                </label>
              </div>

          <button class="btn btn-primary btn-sm float-right" id="next">Next</button>
        </div>
      </div>
</form>
@endsection

@section('script')
    <script>
        var getAll = "{{$GetJsonQuestion}}";
        var getQuesion = @json($GetJsonQuestion);
        // var array =  {!! json_encode($GetJsonQuestion) !!};


        var quizLength =' {{$totalQuestions}}'
        var totallength=  @json($totalQuestions);

        
        // var quizLengthNumber = parseInt(quizLength);

        var counter =1;

        // console.log(typeof quizlength)

        // console.log(( getJson[0].question ))

        $(document).ready(function() {
   
        $("#Qform").submit(function(e){
            return false;
        });

        $( "#next" ).click(function() {


                // console.log(jQuery.type(i))
                if(counter<totallength)
                {

                    // $(":radio[name='option'][value='option2']").attr('checked', true);
                    document.getElementById("option1").checked = true;
                    changeText =  $('#number').text( getQuesion[counter].id );
                    changeText =  $('#question').text( getQuesion[counter].question );
                    changeText =  $('#option1').text( getQuesion[counter].option1 );
                    changeText =  $('#option2').text( getQuesion[counter].option2 );

                    counter++;
                    // console.log(changeText[0])

                }



        });
    });
        
    </script>
@endsection