@extends('welcome')

@section('content')

<form  method="POST" id="Qform">

    @csrf
    <div class="card w-50 m-auto" >
        <h5 class="card-header" id="number" value="hello">Question </h5>
        <div class="card-body">
            <h5 class="card-title" id="question">}</h5>

            <b>Options</b>
            <br>
            <div class="col-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1" >
                        <p id="option1">     </p>
                    </label>
                  </div>
                </div>

                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                           <p id="option2">  </p> 
                        </label>
                      </div>
                    </div>

          <button class="btn btn-primary btn-sm float-right" id="next">Next</button>
        </div>
      </div>
</form>
@endsection

@section('script')
    <script>
        // var getAll = "{{$GetJsonQuestion}}";

        var getAll = '<?php echo $GetJsonQuestion; ?>';
        
        var getJson =(JSON.parse(getAll))

        var quizLength =' {{$totalQuestions}}'
        
        var quizLengthNumber = parseInt(quizLength);

        var counter =0;


        console.log(( getJson[0].id ))

        $(document).ready(function() {
   
        $("#Qform").submit(function(e){
            return false;
        });

        $( "#next" ).click(function() {


                // console.log(jQuery.type(i))
                if(counter<quizLengthNumber)
                {

                    changeText =  $('#number').text( getAll[counter] );

                    counter++;
                    console.log(changeText[0])

                }



        });
    });
        
    </script>
@endsection