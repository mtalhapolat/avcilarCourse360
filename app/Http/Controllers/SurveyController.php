<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    public function home(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            return redirect()->route('login');
        }

        $answercheck = DB::table('survey_answers')->where('survey_id', 1)->where('student_id', $student->id)->first();

        return view('survey', compact('student', 'answercheck'));
    }

    public function insertsurveyanswer(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            return redirect()->route('login');
        }

        $parameterNames = array_keys($request->except('formid'));

        $newanswer = DB::table('survey_answers')->insertGetId([
            'survey_id' => 1,
            'question_id' => 1,
            'student_id' => $student->id,
            'answer' => $request->input("survey")
        ]);

        return response()->json(['success' => true]);
    }
}
