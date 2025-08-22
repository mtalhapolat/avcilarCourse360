<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\student;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\Stub;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if ($request->session()->get('studentlogin') != null)
        {
            return redirect()->route('home');
        }

        return view('login', compact('request'));
    }

    public function authenticate(Request $request)
    {
        if ($request->session()->get('studentlogin') != null)
        {
            return redirect()->route('home');
        }

        $date = strtotime($request->birthday);

        $birthday = date('Y-m-d',$date);

        $student = student::where('identity', $request->identity)->where('birthday', $birthday)->first();

        if ($student) {
            $kpsresult = $this->kpsbridge($request->identity, $birthday);
            if ($kpsresult != null) {
                $student->city = $kpsresult['city'];
                $student->town = $kpsresult['town'];
                $student->district = $kpsresult['district'];
                $student->street = $kpsresult['street'];
                $student->exteriorDoor = $kpsresult['exteriorDoor'];
                $student->interiorDoor = $kpsresult['interiorDoor'];
                $student->address = $kpsresult['address'];
                $student->nationality = $kpsresult['nationality'];
                $student->save();
            }
            $request->session()->put('studentlogin', $student->id);
            if (session()->has('loginpageurl')) {
                return redirect()->to(session()->get('loginpageurl'));
            }
            return redirect()->route('home');
        } else {

            $kpsresult = $this->kpsbridge($request->identity, $birthday);

            if ($kpsresult == null)
                return redirect()->back()->withErrors("Kimlik bilgileriniz doğrulanamadı.");
            else {
                if ($kpsresult['gender'] == 1)
                    $studentimage = 'male.png';
                else
                    $studentimage = 'female.png';

                $newstudentid = DB::table('students')->insertGetId([
                    'name' => $kpsresult['name'],
                    'surname' => $kpsresult['surname'],
                    'identity' => $request->identity,
                    'birthday' => $birthday,
                    'nationality' => $kpsresult['nationality'],
                    'motherName' => $kpsresult['motherName'],
                    'fatherName' => $kpsresult['fatherNam'],
                    'gender' => $kpsresult['gender'],
                    'image' => $studentimage,
                    'birthPlace' => $kpsresult['birthPlace'],
                    'maritalStatus' => $kpsresult['maritalStatus'],
                    'identitySerial' => $kpsresult['SeriNo'],
                    'city' => $kpsresult['city'],
                    'town' => $kpsresult['town'],
                    'district' => $kpsresult['district'],
                    'street' => $kpsresult['street'],
                    'exteriorDoor' => $kpsresult['exteriorDoor'],
                    'interiorDoor' => $kpsresult['interiorDoor'],
                    'address' => $kpsresult['address'],
                    'statu' => "active"
                ]);
                $newstudent = student::where('id', $newstudentid)->first();
                if ($newstudent != null) {
                    $request->session()->put('studentlogin', $newstudent->id);
                    if (session()->has('loginpageurl')) {
                        return redirect()->to(session()->get('loginpageurl'));
                    }
                    return redirect()->route('home');
                } else {
                    return redirect()->route('login')->withErrors("Kayıt oluşturulurken hata. Kurum ile iletişime geçiniz.");
                }
            }
        }
    }

    public function kpsbridge($identity, $birthday)
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

        if ($result == null) {
            return null;
        }

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

        if ($result == null) {
            return null;
        }

        $resultarr = json_decode($result, true);

        if ($resultarr['code'] != 0)
            return null;

        if (isset($resultarr["data"]["collocutor"]["nationalityDescription"])){
            $kpsresult['nationality'] = $resultarr["data"]["collocutor"]["nationalityDescription"];
        }

        $kpsresult['name'] = $resultarr["data"]["collocutor"]["name"];
        $kpsresult['surname'] = $resultarr["data"]["collocutor"]["surname"];
        $kpsresult['motherName'] = $resultarr["data"]["collocutor"]["motherName"];
        $kpsresult['fatherNam'] = $resultarr["data"]["collocutor"]["fatherName"];
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

    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect()->route('login');
    }

    public function uploadfile(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            return redirect()->route('login');
        }

        $myfiles = student::getUploadedFiles($student->id);

        return view('uploadFile', compact('student', 'myfiles', 'request'));
    }

    public function insertfile(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            return redirect()->route('login');
        }

        $request->validate([
            'type' => 'required|in:1,2,3,4,5',
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:8096',
        ]);

        if ($request->hasFile('file')) {
            $dosya = $request->file('file');

            $dosyaAdi = time() . '_' . $request->type . '.' . $dosya->getClientOriginalExtension();

            $yol = $dosya->storeAs('/belgeler/' . $request->type, $dosyaAdi, 'uploads');

            $newfileid = DB::table('student_files')->insertGetId([
                'student_id' => $student->id,
                'type' => $request->type,
                'file_type' => $dosya->getClientOriginalExtension(),
                'url' => $yol,
                'statu' => 0
            ]);

            if (DB::table('student_files')->where('id')->get() == null)
                return redirect()->back()->with('error', 'Belge kaydedilirken bir hata oluştu.');

            MessageController::sendMessage($student->phone, 'Sayın ' . $student->name . '; ' . "\n" . 'Yüklediğiniz ' . $student->getFileType($request->type) . ' tarafımıza ulaştı. Belgeniz incelendikten sonra tarafınıza bilgi verilecektir. İyi günler dileriz.');


            return redirect()->back()->with('success', 'Belge başarıyla yüklendi.');
        }

        return redirect()->back()->with('error', 'Belge yüklenirken bir hata oluştu.');
    }

    public function deletefile(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            return redirect()->route('login');
        }

        $sfile = DB::table('student_files')->where('id', $request->fileid)->where('statu', 0)->delete();

        return "ok";

    }


    public function applogin(Request $request)
    {
        if ($request->reference != 'beyogluapp' || $request->identity == null || $request->birthday == null) {
            return redirect()->route('login');
        }

        $date = strtotime($request->birthday);

        $birthday = date('Y-m-d',$date);

        $student = student::where('identity', $request->identity)->where('birthday', $birthday)->first();

        if ($student) {
            $kpsresult = $this->kpsbridge($request->identity, $birthday);
            if ($kpsresult != null) {
                $student->city = $kpsresult['city'];
                $student->town = $kpsresult['town'];
                $student->district = $kpsresult['district'];
                $student->street = $kpsresult['street'];
                $student->exteriorDoor = $kpsresult['exteriorDoor'];
                $student->interiorDoor = $kpsresult['interiorDoor'];
                $student->address = $kpsresult['address'];
                $student->save();
            }
            $request->session()->put('studentlogin', $student->id);
            if (session()->has('loginpageurl')) {
                return redirect()->to(session()->get('loginpageurl'));
            }
            if ($request->routpage == 'home')
                return redirect()->route('home');
            elseif ($request->routpage == 'sports')
                return redirect()->route('sports');
            else
                return redirect()->route('home');
        } else {

            $kpsresult = $this->kpsbridge($request->identity, $birthday);

            if ($kpsresult == null)
                return redirect()->back()->withErrors("Kimlik bilgileriniz doğrulanamadı.");
            else {
                if ($kpsresult['gender'] == 1)
                    $studentimage = 'male.png';
                else
                    $studentimage = 'female.png';

                $newstudentid = DB::table('students')->insertGetId([
                    'name' => $kpsresult['name'],
                    'surname' => $kpsresult['surname'],
                    'identity' => $request->identity,
                    'birthday' => $birthday,
                    'nationality' => $kpsresult['nationality'],
                    'motherName' => $kpsresult['motherName'],
                    'fatherName' => $kpsresult['fatherNam'],
                    'gender' => $kpsresult['gender'],
                    'image' => $studentimage,
                    'birthPlace' => $kpsresult['birthPlace'],
                    'maritalStatus' => $kpsresult['maritalStatus'],
                    'identitySerial' => $kpsresult['SeriNo'],
                    'city' => $kpsresult['city'],
                    'town' => $kpsresult['town'],
                    'district' => $kpsresult['district'],
                    'street' => $kpsresult['street'],
                    'exteriorDoor' => $kpsresult['exteriorDoor'],
                    'interiorDoor' => $kpsresult['interiorDoor'],
                    'address' => $kpsresult['address'],
                    'referance' => "beyogluapp",
                    'statu' => "active"
                ]);
                $newstudent = student::where('id', $newstudentid)->first();
                if ($newstudent != null) {
                    $request->session()->put('studentlogin', $newstudent->id);
                    if (session()->has('loginpageurl')) {
                        return redirect()->to(session()->get('loginpageurl'));
                    }
                    if ($request->routpage == 'home')
                        return redirect()->route('home');
                    elseif ($request->routpage == 'sports')
                        return redirect()->route('sports');
                    else
                        return redirect()->route('home');
                    return redirect()->route('home');
                } else {
                    return redirect()->route('login')->withErrors("Kayıt oluşturulurken hata. Kurum ile iletişime geçiniz.");
                }
            }
        }

    }
}
