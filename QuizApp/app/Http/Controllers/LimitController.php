<?php

namespace App\Http\Controllers;
use Session;
use App\Models\Limit;
use App\Models\QuestionCreation;
use DB;

use Illuminate\Http\Request;

class LimitController extends Controller
{
    //

    public function index()
    {

        $allQuiz = Limit::all();
        return view('quiz.ListOfQuiz',compact('allQuiz'));
    }
    public function LimitQuizForm()
    {
        return view('quiz.limitForm');
    }

    public function submit(Request $request)
    {
        $Limit = new Limit;

        $Limit->quizname = $request->QName;
        $Limit->limit = $request->QLimit;



        $Limit->save();

        Session::flash('message' , 'Successfully Created Limit Of Question');

        return redirect('/');

    }


    public function createQuestions($id)
    {

        $getLimit = Limit::find($id);
        $quizId = $getLimit->id;
        $quizLimit = $getLimit->limit;

        return view('quiz.quizcreationForm')->with('quizLimit',$quizLimit)->with('id' , $quizId);

    }

    // Save Question of QUiz Into Database
    public function createQuizQuestions(Request $request)
    {
        // dd($request->all());
       
        $question = $request->Question;
        $option1 = $request->Opt1;
        $option2 = $request->Opt2;

        $Quiz = Limit::find($request->quizId);
        
        $getLimit = $Quiz->limit;
        $Qcount = count($request->Question);
        $Optcount1 = count($request->Opt1);
        $Optcount2 = count($request->Opt2);

        if($getLimit==$Qcount && $getLimit==$Optcount1 && $getLimit==$Optcount2 )

        {
            // dd("hello");
            // dd($Qcount.$Optcount1.$Optcount2.$request->quizId.$getLimit);
            for($i=0; $i<$Qcount; $i++ )
            {
                $data = [
                    'quiz_Id' => $request->quizId,
                    'question' => $question[$i],
                    'option1' => $option1[$i],
                    'option2' => $option2[$i],
                ];
                QuestionCreation::insert($data);
            }
        }
        Session::flash('message' , 'Successfully Created Questions');
        return redirect('/');
    }

    public function DeleteQuiz($id)
    {
        $getLimit = Limit::find($id);

        // dd($getLimit->quizname);
        $getLimit->delete();

        return redirect('/')->with('danger' , 'Quiz Deleted Successfully');
    }

    // AttemptQuiz

    public function attemptQuiz( $id)
    {
        // return $id;
        // $getQuestions = DB::table('question_creations')->where('quiz_id' , '=' , $id)->get();

        $getQuestions = QuestionCreation::where('quiz_id' , '=' , $id)->get();

        // return $getQuestions;

        // $GetJsonQuestion = $getQuestions->toJson();
        $GetJsonQuestion = ($getQuestions);;

        $totalQuestions =  (count($getQuestions));

        // dd($GetJsonQuestion);

        return view('quiz.AttemptQuiz',compact('GetJsonQuestion', 'totalQuestions'));


    }


}
