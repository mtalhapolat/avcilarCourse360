<?php

namespace App\Http\Controllers;

use App\Models\branch;
use App\Models\Events;
use App\Models\Kefken;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KefkenController extends Controller
{

    public static function upperFirst($str)
    {
        $str = mb_strtolower($str,"UTF-8");
        $str = mb_convert_case($str, MB_CASE_TITLE, "UTF-8");

        return ucfirst($str);
    }


    public function home(Request $request) {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            session(['loginpageurl' => $request->fullUrl()]);
            return redirect()->route('login');
        }

        $enrollments = Kefken::where('deleted_at', null)->where('user_id', $studentid)->orWhere('student_identity', $student->identity)->orWhere('student2_identity', $student->identity)->get();

        return view('kefken', compact('student',  'request', 'enrollments'));
    }

    public function insertenroll(Request $request) {


        $studentid = $request->session()->get('studentlogin');
        $dosyaAdi = null;

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            return redirect()->route('login');
        }


        if ($request->group_id == 3) {

            $request->validate([
                'student_file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:30720',
            ],
                [
                    'student_file.required' => 'Lütfen istenen belgeyi yükleyiniz.',
                    'student_file.mimes' => 'Geçersiz dosya yüklediniz.',
                    'student_file.max' => 'Yüklediğiniz dosyanın boyutu sınırı aşıyor. En fazla 4mb olabilir.',
                ]);

            if ($request->hasFile('student_file')) {
                $dosya = $request->file('student_file');

                $dosyaAdi = time() . 'kefken' . '.' . $dosya->getClientOriginalExtension();

                $yol = $dosya->storeAs('/forms/', $dosyaAdi, 'uploads');
            }
        }



        if($request->visit_date == "2025-06-23") {
            $formid = 1;
        } else if ($request->visit_date == "2025-07-21"){
            $formid = 2;
        } else if ($request->visit_date == "2025-08-04" && $request->group_id == "1"){
            $formid = 3;
        } else if ($request->visit_date == "2025-06-30"){
            $formid = 4;
        } else if ($request->visit_date == "2025-08-04" && $request->group_id == "2"){
            $formid = 5;
        } else if ($request->visit_date == "2025-08-11"){
            $formid = 6;
        } else if ($request->visit_date == "2025-07-28"){
            $formid = 7;
        } else if ($request->visit_date == "2025-08-25"){
            $formid = 8;
        } else {
            $formid = $request->form_id;
        }


        $newRecord = DB::table('kefken_enrollments')->insertGetId([
            'form_id' => $formid,
            'group_id' => $request->group_id,
            'user_id' => $student->id,
            'statu' => 0,
            'parent_name' => $request->parent_name,
            'parent_surname' => $request->parent_surname,
            'parent_identity' => $request->parent_identity,
            'parent_birthday' => $request->parent_birthday,
            'parent_phone' => $request->parent_phone,
            'student_name' => $request->student_name,
            'student_surname' => $request->student_surname,
            'student_identity' => $request->student_identity,
            'student_birthday' => $request->student_birthday,
            'student_gender' => $request->student_gender,
            'student_phone' => $request->student_phone,
            'student_info' => $request->student_info,
            'student_size' => $request->student_size,
            'student_size2' => $request->student_size2,
            'student2_name' => $request->student2_name,
            'student2_surname' => $request->student2_surname,
            'student2_identity' => $request->student2_identity,
            'student2_birthday' => $request->student2_birthday,
            'student2_gender' => $request->student2_gender,
            'student2_phone' => $request->student2_phone,
            'student2_info' => $request->student2_info,
            'student3_name' => $request->student3_name,
            'student3_surname' => $request->student3_surname,
            'student3_identity' => $request->student3_identity,
            'student3_birthday' => $request->student3_birthday,
            'student3_gender' => $request->student3_gender,
            'student3_phone' => $request->student3_phone,
            'student3_info' => $request->student3_info,
            'student4_name' => $request->student4_name,
            'student4_surname' => $request->student4_surname,
            'student4_identity' => $request->student4_identity,
            'student4_birthday' => $request->student4_birthday,
            'student4_gender' => $request->student4_gender,
            'student4_phone' => $request->student4_phone,
            'student4_info' => $request->student4_info,
            'student5_name' => $request->student5_name,
            'student5_surname' => $request->student5_surname,
            'student5_identity' => $request->student5_identity,
            'student5_birthday' => $request->student5_birthday,
            'student5_gender' => $request->student5_gender,
            'student5_phone' => $request->student5_phone,
            'student5_info' => $request->student5_info,
            'student6_name' => $request->student6_name,
            'student6_surname' => $request->student6_surname,
            'student6_identity' => $request->student6_identity,
            'student6_birthday' => $request->student6_birthday,
            'student6_gender' => $request->student6_gender,
            'student6_phone' => $request->student6_phone,
            'student6_info' => $request->student6_info,
            'student2_size' => $request->student2_size,
            'student2_size2' => $request->student2_size2,
            'student_document' => $dosyaAdi,
            'marriage_date' => $request->marriage_date,
            'visit_date' => $request->visit_date,
        ]);

        $group = DB::table('kefken_groups')->where('id', $request->group_id)->first();

        MessageController::sendMessage($student->phone, 'Sevgili ' . self::upperFirst($student->name) . '; ' . "\n" . "Kefken " . $group->title . ' başvurunuz alınmıştır. Başvurunuz değerlendirildikten sonra tarafınıza bilgi verilecektir. İyi günler dileriz.');

        return response()->json(['success' => true]);

    }

    public static function kefkenenrollcheck(Request $request)
    {

        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            return redirect()->route('login');
        }

        if (isset($request->identity)) {
            $count = Kefken::where('student_identity', $request->identity)->where('deleted_at', null)->get()->count();
            $count = $count + Kefken::where('student2_identity', $request->identity)->where('deleted_at', null)->get()->count();
            $count = $count + Kefken::where('student3_identity', $request->identity)->where('deleted_at', null)->get()->count();
            $count = $count + Kefken::where('student4_identity', $request->identity)->where('deleted_at', null)->get()->count();
            $count = $count + Kefken::where('student5_identity', $request->identity)->where('deleted_at', null)->get()->count();
            $count = $count + Kefken::where('student6_identity', $request->identity)->where('deleted_at', null)->get()->count();
        }

        if (isset($request->identity2)) {
            $count = $count + Kefken::where('student_identity', $request->identity2)->where('deleted_at', null)->get()->count();
            $count = $count + Kefken::where('student2_identity', $request->identity2)->where('deleted_at', null)->get()->count();
            $count = $count + Kefken::where('student3_identity', $request->identity2)->where('deleted_at', null)->get()->count();
            $count = $count + Kefken::where('student4_identity', $request->identity2)->where('deleted_at', null)->get()->count();
            $count = $count + Kefken::where('student5_identity', $request->identity2)->where('deleted_at', null)->get()->count();
            $count = $count + Kefken::where('student6_identity', $request->identity2)->where('deleted_at', null)->get()->count();
        }

        if ($count == 0) {
            return 'false';
        } else {
            return 'true';
        }

    }
}
