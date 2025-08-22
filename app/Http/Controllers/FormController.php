<?php

namespace App\Http\Controllers;

use App\Models\Kefken;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    public static function upperFirst($str)
    {
        $str = mb_strtolower($str,"UTF-8");
        $str = mb_convert_case($str, MB_CASE_TITLE, "UTF-8");

        return ucfirst($str);
    }

    public function showform($id, Request $request) {

        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            return redirect()->route('login');
        }

        $form = DB::table('forms')->where('id', '=', $id)->first();
        $formfields = DB::table('form_fields')->where('form_id', '=', $id)->get();


        return view('showform', compact('form', 'student', 'formfields'));
    }

    public function yksbasvuru(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            session(['loginpageurl' => $request->url()]);
            return redirect()->route('login');
        }

        $enroll = DB::table('form_answers')->where('student_id', $studentid)->where('form_id', 1)->where('deleted_at', null)->first();

        if ($enroll != null) {
            $enroll_details = DB::table('form_answer_fields')->where('form_answer_id', $enroll->id)->get();
        } else {
            $enroll_details = null;
        }

        return view('yksbasvuru', compact('student', 'enroll_details', 'enroll'));
    }

    public function kefkenOrtaokul(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            session(['loginpageurl' => $request->url()]);
            return redirect()->route('login');
        }

        $enroll = DB::table('form_answers')->where('student_id', $studentid)->where('form_id', 1)->where('deleted_at', null)->first();

        if ($enroll != null) {
            $enroll_details = DB::table('form_answer_fields')->where('form_answer_id', $enroll->id)->get();
        } else {
            $enroll_details = null;
        }

        return view('kefken/kefken-ortaokul', compact('student', 'enroll_details', 'enroll'));
    }

    public function kefkenLise(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            session(['loginpageurl' => $request->url()]);
            return redirect()->route('login');
        }

        $enroll = DB::table('form_answers')->where('student_id', $studentid)->where('form_id', 1)->where('deleted_at', null)->first();

        if ($enroll != null) {
            $enroll_details = DB::table('form_answer_fields')->where('form_answer_id', $enroll->id)->get();
        } else {
            $enroll_details = null;
        }

        return view('kefken/kefken-lise', compact('student', 'enroll_details', 'enroll'));
    }

    public function kefkenUniversite(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            session(['loginpageurl' => $request->url()]);
            return redirect()->route('login');
        }

        $enroll = DB::table('form_answers')->where('student_id', $studentid)->where('form_id', 1)->where('deleted_at', null)->first();

        if ($enroll != null) {
            $enroll_details = DB::table('form_answer_fields')->where('form_answer_id', $enroll->id)->get();
        } else {
            $enroll_details = null;
        }

        return view('kefken/kefken-universite', compact('student', 'enroll_details', 'enroll'));
    }

    public function kefkenAnnecocuk(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            session(['loginpageurl' => $request->url()]);
            return redirect()->route('login');
        }

        $enroll = DB::table('form_answers')->where('student_id', $studentid)->where('form_id', 1)->where('deleted_at', null)->first();

        if ($enroll != null) {
            $enroll_details = DB::table('form_answer_fields')->where('form_answer_id', $enroll->id)->get();
        } else {
            $enroll_details = null;
        }

        return view('kefken/kefken-annecocuk', compact('student', 'enroll_details', 'enroll'));
    }

    public function kefkenEmekli(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            session(['loginpageurl' => $request->url()]);
            return redirect()->route('login');
        }

        $enroll = DB::table('form_answers')->where('student_id', $studentid)->where('form_id', 1)->where('deleted_at', null)->first();

        if ($enroll != null) {
            $enroll_details = DB::table('form_answer_fields')->where('form_answer_id', $enroll->id)->get();
        } else {
            $enroll_details = null;
        }

        return view('kefken/kefken-emekli', compact('student', 'enroll_details', 'enroll'));
    }

    public function kefkenGunubirlik(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            session(['loginpageurl' => $request->url()]);
            return redirect()->route('login');
        }

        $enroll = DB::table('form_answers')->where('student_id', $studentid)->where('form_id', 1)->where('deleted_at', null)->first();

        if ($enroll != null) {
            $enroll_details = DB::table('form_answer_fields')->where('form_answer_id', $enroll->id)->get();
        } else {
            $enroll_details = null;
        }

        $enrollcount = Kefken::where('student_identity', $student->identity)->where('deleted_at', null)->get()->count();
        $enrollcount = $enrollcount + Kefken::where('student2_identity', $student->identity)->where('deleted_at', null)->get()->count();
        $enrollcount = $enrollcount + Kefken::where('student3_identity', $student->identity)->where('deleted_at', null)->get()->count();
        $enrollcount = $enrollcount + Kefken::where('student4_identity', $student->identity)->where('deleted_at', null)->get()->count();
        $enrollcount = $enrollcount + Kefken::where('student5_identity', $student->identity)->where('deleted_at', null)->get()->count();
        $enrollcount = $enrollcount + Kefken::where('student6_identity', $student->identity)->where('deleted_at', null)->get()->count();


        $enrollments = Kefken::where('deleted_at', null)->where('user_id', $studentid)->orWhere('student_identity', $student->identity)->orWhere('student2_identity', $student->identity)->get();


        return view('kefken/kefken-gunubirlik', compact('student', 'enroll_details', 'enroll', 'enrollcount', 'enrollments'));
    }

    public function kefkenBalayi(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            session(['loginpageurl' => $request->url()]);
            return redirect()->route('login');
        }

        $enroll = DB::table('form_answers')->where('student_id', $studentid)->where('form_id', 1)->where('deleted_at', null)->first();

        if ($enroll != null) {
            $enroll_details = DB::table('form_answer_fields')->where('form_answer_id', $enroll->id)->get();
        } else {
            $enroll_details = null;
        }

        return view('kefken/kefken-balayi', compact('student', 'enroll_details', 'enroll'));
    }

    public function nisan(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            session(['loginpageurl' => $request->url()]);
            return redirect()->route('login');
        }

        $enroll = DB::table('form_answers')->where('student_id', $studentid)->where('form_id', 3)->where('deleted_at', null)->first();

        if ($enroll != null) {
            $enroll_details = DB::table('form_answer_fields')->where('form_answer_id', $enroll->id)->get();
        } else {
            $enroll_details = null;
        }

        return view('23nisan', compact('student', 'enroll_details', 'enroll'));
    }

    public function insertformanswer(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            return redirect()->route('login');
        }

        $parameterNames = array_keys($request->except('formid'));

        $newanswer = DB::table('form_answers')->insertGetId([
            'form_id' => $request->formid,
            'student_id' => $student->id,
            'statu' => 0,
        ]);

        $form = DB::table('forms')->where('id', '=', $request->formid)->first();

        $count = 0;
        while ($count < count($parameterNames)) {

            $parts = explode("_", $parameterNames[$count]);
            $field_id = $parts[1];

            $field = DB::table('form_fields')->where('id', '=', $field_id)->first();

            if ($field->field_type == 'text' || $field->field_type == 'radio') {
                DB::table('form_answer_fields')->insert([
                    'form_answer_id' => $newanswer,
                    'form_field_id' => $field_id,
                    'form_field_value' => $request->input('field_' . $field_id . '_'),
                ]);
                $count++;
            } else if ($field->field_type == 'person') {
                $person = array();
                array_push($person, $request->input('field_' . $field_id . '_name'));
                array_push($person, $request->input('field_' . $field_id . '_surname'));
                array_push($person, $request->input('field_' . $field_id . '_identity'));
                array_push($person, $request->input('field_' . $field_id . '_birthday'));

                DB::table('form_answer_fields')->insert([
                    'form_answer_id' => $newanswer,
                    'form_field_id' => $field_id,
                    'form_field_value' => json_encode($person)
                ]);
                $count = $count+4;
            } else if ($field->field_type == 'checkbox') {
                $checkbox = array();

                if ($request->input('field_' . $field_id . '_1') != null)
                array_push($checkbox, $request->input('field_' . $field_id . '_1'));
                if ($request->input('field_' . $field_id . '_2') != null)
                array_push($checkbox, $request->input('field_' . $field_id . '_2'));
                if ($request->input('field_' . $field_id . '_3') != null)
                array_push($checkbox, $request->input('field_' . $field_id . '_3'));

                DB::table('form_answer_fields')->insert([
                    'form_answer_id' => $newanswer,
                    'form_field_id' => $field_id,
                    'form_field_value' => json_encode($checkbox)
                ]);
                $count = $count + sizeof($checkbox);
            } else if ($field->field_type == 'file') {

                $request->validate([
                    'field_' . $field_id . '_' => 'required|file|mimes:pdf,jpg,jpeg,png|max:30720',
                    ],
                    [
                    'field_' . $field_id . '_.required' => 'Lütfen istenen belgeyi yükleyiniz.',
                    'field_' . $field_id . '_.mimes' => 'Geçersiz dosya yüklediniz.',
                    'field_' . $field_id . '_.max' => 'Yüklediğiniz dosyanın boyutu sınırı aşıyor. En fazla 4mb olabilir.',
                        ]);

                if ($request->hasFile('field_' . $field_id . '_')) {
                    $dosya = $request->file('field_' . $field_id . '_');

                    $dosyaAdi = time() . $field_id . '.' . $dosya->getClientOriginalExtension();

                    $yol = $dosya->storeAs('/forms/', $dosyaAdi, 'uploads');

                }

                DB::table('form_answer_fields')->insert([
                    'form_answer_id' => $newanswer,
                    'form_field_id' => $field_id,
                    'form_field_value' => $dosyaAdi
                ]);
                $count++;
            } else {
                $count++;
            }
        }

        if ($form->enroll_message != null) {
            MessageController::sendMessage($student->phone, 'Sevgili ' . self::upperFirst($student->name) . '; ' . "\n" . $form->enroll_message);
        }

            return response()->json(['success' => true]);

    }

    public static function getBetween($string, $start = "", $end = ""){
        if (strpos($string, $start)) { // required if $start not exist in $string
            $startCharCount = strpos($string, $start) + strlen($start);
            $firstSubStr = substr($string, $startCharCount, strlen($string));
            $endCharCount = strpos($firstSubStr, $end);
            if ($endCharCount == 0) {
                $endCharCount = strlen($firstSubStr);
            }
            return substr($firstSubStr, 0, $endCharCount);
        } else {
            return '';
        }
    }

    public function formkpsbridge(Request $request)
    {
        $identity = $request->input("identity");
        $birthday = $request->input("birthday");

        // API URL
        $url = 'https://iletisimapi.beyoglu.bel.tr/http';

        // Create a new cURL resource
        $ch = curl_init($url);

        // Setup request to send json via POST
        $action = "authenticateMember";
        $params = array(
            'username' => 'kpsbilgiislem',
            'password' => '302010bB**',
            'language'=> "tr"
        );
        $sp = array(
            'currentCompanyId' => 3443,
            'platform' => '3rdParty',
            'language'=> "tr"
        );

        $payload = json_encode(array("action" => $action, "params" => $params, "SP" => $sp));

        // Attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        // Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        // Return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the POST request
        $result = curl_exec($ch);

        // Close cURL resource
        curl_close($ch);

        $arr=explode('"', $result);
        $arr2=explode(':', $arr[10]);
        $arr3=explode(',', $arr2[1]);

        $url = 'https://iletisimapi.beyoglu.bel.tr/http';

        // Create a new cURL resource
        $ch = curl_init($url);

        // Setup request to send json via POST
        $action = "getCollocutorFromNvi";
        $params = array(
            'identityNumber' => $identity,
            'birthdate' => $birthday
        );
        $sp = array(
            'currentCompanyId' => 3443,
            'platform' => '3rdParty',
            'language'=> "tr",
            'originatorMemberId' => (int)$arr3[0],
            'proxyMemberId' => null,
            'sessionId'=> $arr[15]
        );
        $payload = json_encode(array("action" => $action, "params" => $params, "SP" => $sp));

        // Attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        // Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        // Return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the POST request
        $result = curl_exec($ch);

        // Close cURL resource
        curl_close($ch);

        $resultarr = json_decode($result, true);

        if ($resultarr['code'] != 0 || !isset($resultarr["data"]))
            return "kimlikhata";

        if (isset($resultarr["data"]["collocutor"]["nationalityDescription"])){
            $kpsresult['nationality'] = $resultarr["data"]["collocutor"]["nationalityDescription"];
        }

        $kpsresult['name'] = $resultarr["data"]["collocutor"]["name"];
        $kpsresult['surname'] = $resultarr["data"]["collocutor"]["surname"];
        $kpsresult['motherName'] = $resultarr["data"]["collocutor"]["motherName"];
        $kpsresult['fatherName'] = $resultarr["data"]["collocutor"]["fatherName"];
        $kpsresult['identityNumber'] = $resultarr["data"]["collocutor"]["identityNumber"];
        $kpsresult['gender'] = $resultarr["data"]["collocutor"]["genderId"];
        $kpsresult['birthPlace'] = $resultarr["data"]["collocutor"]["birthPlace"];
        $kpsresult['maritalStatus'] = $resultarr["data"]["collocutor"]["maritalStatusId"];
        $kpsresult['birthday'] = $resultarr["data"]["collocutor"]["KPSSorguMesaj"]["SorguSonucu"][0]["TCVatandasiKisiKutukleri"]["TCKKBilgisi"]["DogumTarih"]["Gun"];
        $kpsresult['birthmonth'] = $resultarr["data"]["collocutor"]["KPSSorguMesaj"]["SorguSonucu"][0]["TCVatandasiKisiKutukleri"]["TCKKBilgisi"]["DogumTarih"]["Ay"];
        $kpsresult['birthyear'] = $resultarr["data"]["collocutor"]["KPSSorguMesaj"]["SorguSonucu"][0]["TCVatandasiKisiKutukleri"]["TCKKBilgisi"]["DogumTarih"]["Yil"];
        $kpsresult['SeriNo'] = $resultarr["data"]["collocutor"]["KPSSorguMesaj"]["SorguSonucu"][0]["TCVatandasiKisiKutukleri"]["TCKKBilgisi"]["SeriNo"];

        if ($resultarr["data"]["address"] == null) {
            $kpsresult['city'] = null;
            $kpsresult['town'] = null;
            $kpsresult['district'] = null;
            $kpsresult['street'] = null;
            $kpsresult['exteriorDoor'] = null;
            $kpsresult['interiorDoor'] = null;
            $kpsresult['address'] = null;

            if ($kpsresult['nationality'] != 'TR' && $kpsresult['nationality'] != 'TC') {
                $newidentity = $resultarr["data"]["collocutor"]["KPSSorguMesaj"]["SorguSonucu"][0]["YabanciKisiKutukleri"]["KisiBilgisi"]["KazanilanTCKimlikNo"];
                $kpsresultforeign = $this->kpsbridgeforeignaddress($newidentity, $birthday);
                if (isset($kpsresult['SeriNo']))
                    $kpsresult['SeriNo'] = $kpsresultforeign['SeriNo'];
                if (isset($kpsresult['birthmonth']))
                    $kpsresult['birthmonth'] = $kpsresultforeign['birthmonth'];
                if (isset($kpsresult['birthyear']))
                    $kpsresult['birthyear'] = $kpsresultforeign['birthyear'];
                if (isset($kpsresult['birthday']))
                    $kpsresult['birthday'] = $kpsresultforeign['birthday'];

                if (isset($kpsresult['address'])) {
                    $kpsresult['city'] = $kpsresultforeign['city'];
                    $kpsresult['town'] = $kpsresultforeign['town'];
                    $kpsresult['district'] = $kpsresultforeign['district'];
                    $kpsresult['street'] = $kpsresultforeign['street'];
                    $kpsresult['exteriorDoor'] = $kpsresultforeign['exteriorDoor'];
                    $kpsresult['interiorDoor'] = $kpsresultforeign['interiorDoor'];
                    $kpsresult['address'] = $kpsresultforeign['address'];
                }
            }

        } else {
            $kpsresult['city'] = $resultarr["data"]["address"]["cityDescription"];
            $kpsresult['town'] = $resultarr["data"]["address"]["townDescription"];
            $kpsresult['district'] = $resultarr["data"]["address"]["districtDescription"];
            $kpsresult['street'] = $resultarr["data"]["address"]["streetDescription"];
            $kpsresult['exteriorDoor'] = $resultarr["data"]["address"]["exteriorDoorNumber"];
            $kpsresult['interiorDoor'] = $resultarr["data"]["address"]["interiorDoorNumber"];
            $kpsresult['address'] = $resultarr["data"]["address"]["explicitAddress"];
        }

        return $kpsresult;
    }

    public function kpsbridgeforeignaddress($identity, $birthday)
    {

        // API URL
        $url = 'https://iletisimapi.beyoglu.bel.tr/http';

        // Create a new cURL resource
        $ch = curl_init($url);

        // Setup request to send json via POST
        $action = "authenticateMember";
        $params = array(
            'username' => 'kpsbilgiislem',
            'password' => '302010bB**',
            'language'=> "tr"
        );
        $sp = array(
            'currentCompanyId' => 3443,
            'platform' => '3rdParty',
            'language'=> "tr"
        );

        $payload = json_encode(array("action" => $action, "params" => $params, "SP" => $sp));

        // Attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        // Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        // Return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the POST request
        $result = curl_exec($ch);

        // Close cURL resource
        curl_close($ch);

        $arr=explode('"', $result);
        $arr2=explode(':', $arr[10]);
        $arr3=explode(',', $arr2[1]);

        $url = 'https://iletisimapi.beyoglu.bel.tr/http';

        // Create a new cURL resource
        $ch = curl_init($url);

        // Setup request to send json via POST
        $action = "getCollocutorFromNvi";
        $params = array(
            'identityNumber' => $identity,
            'birthdate' => $birthday
        );
        $sp = array(
            'currentCompanyId' => 3443,
            'platform' => '3rdParty',
            'language'=> "tr",
            'originatorMemberId' => (int)$arr3[0],
            'proxyMemberId' => null,
            'sessionId'=> $arr[15]
        );
        $payload = json_encode(array("action" => $action, "params" => $params, "SP" => $sp));

        // Attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        // Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        // Return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the POST request
        $result = curl_exec($ch);

        // Close cURL resource
        curl_close($ch);

        $resultarr = json_decode($result, true);

        if ($resultarr['code'] != 0)
            return null;

        return $resultarr;

        if ($resultarr["data"]["address"] == null) {
            $kpsresult['city'] = null;
            $kpsresult['town'] = null;
            $kpsresult['district'] = null;
            $kpsresult['street'] = null;
            $kpsresult['exteriorDoor'] = null;
            $kpsresult['interiorDoor'] = null;
            $kpsresult['address'] = null;

        } else {
            $kpsresult['city'] = $resultarr["data"]["address"]["cityDescription"];
            $kpsresult['town'] = $resultarr["data"]["address"]["townDescription"];
            $kpsresult['district'] = $resultarr["data"]["address"]["districtDescription"];
            $kpsresult['street'] = $resultarr["data"]["address"]["streetDescription"];
            $kpsresult['exteriorDoor'] = $resultarr["data"]["address"]["exteriorDoorNumber"];
            $kpsresult['interiorDoor'] = $resultarr["data"]["address"]["interiorDoorNumber"];
            $kpsresult['address'] = $resultarr["data"]["address"]["explicitAddress"];
        }

        $kpsresult['SeriNo'] = $resultarr["data"]["collocutor"]["KPSSorguMesaj"]["SorguSonucu"][0]["TCVatandasiKisiKutukleri"]["TCKKBilgisi"]["SeriNo"];
        $kpsresult['birthday'] = $resultarr["data"]["collocutor"]["KPSSorguMesaj"]["SorguSonucu"][0]["TCVatandasiKisiKutukleri"]["TCKKBilgisi"]["DogumTarih"]["Gun"];
        $kpsresult['birthmonth'] = $resultarr["data"]["collocutor"]["KPSSorguMesaj"]["SorguSonucu"][0]["TCVatandasiKisiKutukleri"]["TCKKBilgisi"]["DogumTarih"]["Ay"];
        $kpsresult['birthyear'] = $resultarr["data"]["collocutor"]["KPSSorguMesaj"]["SorguSonucu"][0]["TCVatandasiKisiKutukleri"]["TCKKBilgisi"]["DogumTarih"]["Yil"];

        return $kpsresult;
    }

}
