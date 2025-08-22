<?php

namespace App\Http\Controllers;

use App\Models\area;
use App\Models\branch;
use App\Models\center;
use App\Models\enroll;
use App\Models\eventenroll;
use App\Models\Events;
use App\Models\KinderGarten;
use App\Models\KinderGartenEnroll;
use App\Models\lesson;
use App\Models\student;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public static function upperFirst($str)
    {
        $str = mb_strtolower($str,"UTF-8");
        $str = mb_convert_case($str, MB_CASE_TITLE, "UTF-8");

        return ucfirst($str);
    }


    public function home(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            return redirect()->route('login');
        }

        return view('home', compact('student'));
    }

    public function basvuru(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            session(['loginpageurl' => $request->fullUrl()]);
            return redirect()->route('login');
        }

        $nowdate = now()->format('Y-m-d');

        $lessons = DB::table('lessons')
            ->join('centers', 'centers.id', '=', 'lessons.center_id')
            ->join('branches', 'branches.id', '=', 'lessons.branch_id')
            ->join('areas', 'areas.id', '=', 'branches.area_id')
            ->select(
                'lessons.id as lesson_id',
                'areas.title as area',
                'areas.id as area_id',
                'branches.title as branch',
                'branches.id as branch_id',
                'centers.title as center',
                'centers.id as center_id',
                'lessons.hours as hours',
                'lessons.date_start as date_start',
                'lessons.date_end as date_end',
                'lessons.quota as quota',
                'lessons.addquota as addquota',
                'lessons.lesson_type as lesson_type',
                'lessons.ageRangeMin as ageRangeMin',
                'lessons.ageRangeMax as ageRangeMax',
                'lessons.ikamet_only as ikamet_only',
                'lessons.student_only as student_only',
                'lessons.disabled_only as disabled_only',
                'lessons.education as education',
                'lessons.gender as gender',
                'lessons.statement as statement',
            )
            ->where('lessons.statu', 1)
            ->where('lessons.date_enroll_start','<=', $nowdate)
            ->where('lessons.date_enroll_end','>=', $nowdate)
            ->get()
            ->sortByDesc('lesson_id');

        $centers = center::whereIn('id', $lessons->pluck('center_id'))->get()->sortBy('title');
        $branches = branch::whereIn('id', $lessons->pluck('branch_id'))->get()->sortBy('title');
        $areas = area::whereIn('id', $branches->pluck('area_id'))->get()->sortBy('title');

        $enrollcounts = DB::table('enrollments')
            ->select(
                'enrollments.lesson_id',
                DB::raw('COUNT(*) as totalcount')
            )
            ->whereIn('enrollments.statu', [0,1])
            ->groupBy('lesson_id')
            ->get();

        return view('basvuru', compact('student', 'lessons', 'centers', 'areas', 'branches', 'enrollcounts', 'request'));
    }

    public function akademibeyoglu(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            session(['loginpageurl' => $request->fullUrl()]);
            return redirect()->route('login');
        }

        $nowdate = now()->format('Y-m-d');

        $akademibraches = branch::where('area_id', '3044')->pluck('id');

        $lessons = lesson::where('statu', 1)->where('date_enroll_start','<=', $nowdate)->where('date_enroll_end','>=', $nowdate)->whereIn('branch_id', $akademibraches)->get()->sortByDesc('id');
        $centers = center::whereIn('id', $lessons->pluck('center_id'))->get()->sortBy('title');
        $branches = branch::whereIn('id', $lessons->pluck('branch_id'))->get()->sortBy('title');
        $areas = area::whereIn('id', $branches->pluck('area_id'))->get()->sortBy('title');

        return view('akademibeyoglu', compact('student', 'lessons', 'centers', 'areas', 'branches', 'request'));
    }

    public function registered(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            return redirect()->route('login');
        }

        $enrollments = enroll::where('student_id', $student->id)->orderByDesc('created_at')->get();
        $enrollmentsid = enroll::where('student_id', $student->id)->get('lesson_id');

        $lessons = lesson::where('statu', 1)->whereIn('id', $enrollmentsid)->get();
        $centers = center::where('statu', 1)->get();
        $areas = area::where('statu', 1)->get();
        $branches = branch::where('statu', 1)->get();

        $eventenrollments = eventenroll::where('student_id', $student->id)->orderByDesc('created_at')->get();

        return view('registered', compact('student', 'lessons', 'centers', 'areas', 'branches', 'enrollments', 'eventenrollments'));
    }

    public function profile(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            return redirect()->route('login');
        }

        $educations = DB::table('student_education')->where('statu', 1)->get();

        return view('profile', compact('student', 'educations'));
    }

    public function certificates(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            return redirect()->route('login');
        }

        $certificates = DB::table('enrollments')
            ->join('students', 'enrollments.student_id', '=', 'students.id')
            ->join('lessons', 'enrollments.lesson_id', '=', 'lessons.id')
            ->join('branches', 'lessons.branch_id', '=', 'branches.id')
            ->join('centers', 'lessons.center_id', '=', 'centers.id')
            ->select('students.name as student_name', 'students.surname as student_surname', 'students.identity as student_identity', 'branches.title as branch', 'centers.title as center', 'lessons.date_end as date_end', 'lessons.hours as hours', 'lessons.lesson_type as lesson_type', 'enrollments.id as enroll_id', 'enrollments.success_statu as success_statu')
            ->where('student_id', $student->id)
            ->whereIn('success_statu', [1,2])->get()
            ->sortByDesc('date_end');

        return view('certificates', compact('student', 'certificates'));
    }

    public function anaokulu(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            return redirect()->route('login');
        }

        $kindergartens = KinderGarten::where('statu', 1)->get();

        return view('anaokulu', compact('student', 'kindergartens'));
    }

    public function etkinlikler(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            session(['loginpageurl' => $request->fullUrl()]);
            return redirect()->route('login');
        }

        $nowdate = now()->format('Y-m-d');

        $events = Events::where('statu', 1)->whereNot('category_id', 1006)->whereNot('category_id', 2)->where('date_enroll_start','<=', $nowdate)->where('date_enroll_end','>=', $nowdate)->get()->sortByDesc('id');

        $eventscount = $events->count();

        $categories = DB::table('event_categories')->whereIn('id', $events->pluck('category_id'))->get();

        return view('etkinlikler', compact('student', 'events', 'eventscount', 'categories', 'request'));
    }

    public function sports(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            session(['loginpageurl' => $request->fullUrl()]);
            return redirect()->route('login');
        }

        $nowdate = now()->format('Y-m-d');

        $events = Events::where('statu', 1)->where('category_id', 1006)->where('date_enroll_start','<=', $nowdate)->where('date_enroll_end','>=', $nowdate)->get();

        $eventscount = $events->count();

        $categories = DB::table('event_categories')->whereIn('id', $events->pluck('category_id'))->get();

        $sportbranches = branch::where('area_id', 27)->pluck('id');

        $lessons = lesson::whereIn('branch_id', $sportbranches)->where('statu', 1)->where('date_enroll_end','>', $nowdate)->where('date_end','>', $nowdate)->get();

        return view('sports', compact('student', 'events', 'eventscount', 'categories', 'lessons', 'request'));
    }


    public function kefken(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            session(['loginpageurl' => $request->fullUrl()]);
            return redirect()->route('login');
        }

        $nowdate = now()->format('Y-m-d');


        $events = Events::where('statu', 1)->where('category_id', 2)->where('date_enroll_start','<=', $nowdate)->where('date_enroll_end','>=', $nowdate)->get();

        $eventscount = $events->count();

        $categories = DB::table('event_categories')->whereIn('id', $events->pluck('category_id'))->get();

        $sportbranches = branch::where('area_id', 27)->pluck('id');

        return view('kefken', compact('student', 'events', 'eventscount', 'categories', 'request'));
    }

    public function ozgem(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            session(['loginpageurl' => $request->fullUrl()]);
            return redirect()->route('login');
        }

        $nowdate = now()->format('Y-m-d');

        $events = Events::where('statu', 1)->where('category_id', 2019)->where('date_enroll_start','<=', $nowdate)->where('date_enroll_end','>=', $nowdate)->get();

        $eventscount = $events->count();

        $categories = DB::table('event_categories')->whereIn('id', $events->pluck('category_id'))->get();

        $sportbranches = branch::where('area_id', 3045)->pluck('id');

        $lessons = lesson::whereIn('branch_id', $sportbranches)->where('statu', 1)->where('date_enroll_end','>', $nowdate)->where('date_end','>', $nowdate)->get();

        $eventscount = $eventscount + $lessons->count();

        return view('ozgem', compact('student', 'events', 'eventscount', 'categories', 'lessons', 'request'));
    }

    public function insertenroll(Request $request)
    {

        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            return redirect()->route('login');
        }

        if ($student->phone == null || $student->education == null) {
            return "Başvuru yapmak için öncelikle kişisel bilgilerinizi doldurmalısınız. <br> <br> <button class='apply-button' style='width: 160px'><a href='/profile' style='text-decoration: none; color: white'>Profil Güncelle</a></button> ";
        }

        $lesson = lesson::where('id', $request->lessonid)->first();

        if ($lesson == null)
            return "Lesson Error";

        $enrollcheck = enroll::where('student_id', $student->id)->where('lesson_id', $lesson->id)->whereIn('statu', [0,1])->whereNull('deleted_at')->first();

        if ($enrollcheck != null)
            return "Bu kursa daha önce başvuru yapılmış.";

        $enrollbranch = $lesson->branch_id;

        $enrollbranchlessons = lesson::where('branch_id', $enrollbranch)->where('statu', 1)->pluck('id');

        $enrollsamebranchcheck = enroll::where('student_id', $student->id)->whereIn('lesson_id', $enrollbranchlessons)->whereIn('statu', [0,1])->whereNull('deleted_at')->first();

        if ($enrollsamebranchcheck != null)
            return "Aynı branşa ait başka kursa aktif başvurunuz bulunmaktadır. Aynı branştan en fazla 1 kursa katılabilirsiniz.";

        $enrollcount = enroll::where('lesson_id', $lesson->id)->whereIn('statu', [0,1])->count();

        if ($enrollcount >= $lesson->quota + $lesson->addquota)
            return "Maalesef bu kursun kontenjanı doldu :(";

        $newformat = DateTime::createFromFormat('Y-m-d', $student->birthday)->format('Y-m-d');
        $birth_date = $newformat;
        $current_date = date('Y-m-d');
        $birth_date_obj = new DateTime($birth_date);
        $current_date_obj = new DateTime($current_date);
        $diff = $current_date_obj->diff($birth_date_obj);
        $age = $diff->y;

        if ($age < $lesson->ageRangeMin || $age > $lesson->ageRangeMax)
            return "Yaşınız bu kurs için uygun değildir.";

        if ($lesson->gender == "Male" && $student->gender == 2)
            return "Bu kurs erkeklere özeldir.";

        if ($lesson->gender == "Female" && $student->gender == 1)
            return "Bu kurs kadınlara özeldir.";

        if ($lesson->ikamet_only == 1 && $student->town != "beyoğlu")
            return "Bu kurs ilçemizde ikamet eden hemşehrilerimize özeldir.";

        if ($lesson->student_only == 1) {
            $filecheck = DB::table('student_files')
                ->where('student_id', $student->id)
                ->where('type', 1)
                ->whereIn('statu', [0,1])
                ->get();

            if ($filecheck !== null)
                return "Bu kurs öğrencilere özel olduğundan dolayı önce Öğrenci Belgenizi yüklemeniz gerekmektedir. <br> <br> <button class='apply-button' style='width: 100px'><a href='/belgeyukle?filetype=0' style='text-decoration: none; color: white'>Yükle</a></button> ";
        }

        if ($lesson->disabled_only == 1) {
            $filecheck = DB::table('student_files')
                ->where('student_id', $student->id)
                ->where('type', 4)
                ->whereIn('statu', [0,1])
                ->get();

            if ($filecheck !== null)
                return "Bu kurs engelsizlere özel olduğundan dolayı önce Engelli Belgenizi yüklemeniz gerekmektedir. <br> <br> <button class='apply-button' style='width: 100px'><a href='/belgeyukle?filetype=4' style='text-decoration: none; color: white'>Yükle</a></button> ";
        }

        if ($lesson->education != null) {
            if ($lesson->education > $student->education) {
                return "Öğrenim durumunuz bu kurs için uygun değildir. Başvuru şartlarını kontrol ediniz.";
            }
        }

        if ($lesson->graduate != null) {
            if ($lesson->graduate != $student->graduate) {
                return "Mezuniyet durumunuz bu kurs için uygun değildir. Başvuru şartlarını kontrol ediniz.";
            }
        }


        $newenrollid = DB::table('enrollments')->insertGetId([
            'student_id' => $student->id,
            'lesson_id' => $request->lessonid,
            'statu' => 0
        ]);

        $newenroll = enroll::where('id', $newenrollid)->first();

        if ($newenroll == null)
            return "Newenroll Error";

        MessageController::sendMessage($student->phone, 'Sevgili ' . self::upperFirst($student->name) . '; ' . "\n" . $lesson->getBranch($lesson->id)->title . ' kursuna kaydınız alınmıştır. Başvurunuz değerlendirildikten sonra tarafınıza bilgi verilecektir. İyi günler dileriz.');

        return "ok";

    }

    public function inserteventenroll(Request $request)
    {

        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            return redirect()->route('login');
        }

        if ($student->phone == null || $student->education == null) {
            return "Başvuru yapmak için öncelikle kişisel bilgilerinizi doldurmalısınız. <br> <br> <button class='apply-button' style='width: 160px'><a href='/profile' style='text-decoration: none; color: white'>Profil Güncelle</a></button> ";
        }

        $event = Events::where('id', $request->eventid)->first();

        if ($event == null)
            return "Event Error";

        $eventenrollcheck = eventenroll::where('student_id', $student->id)->where('event_id', $event->id)->whereIn('statu', [0,1])->whereNull('deleted_at')->first();

        if ($eventenrollcheck != null)
            return "Bu etkinliğe daha önce başvuru yapılmış.";

        $enrollcount = eventenroll::where('event_id', $event->id)->whereIn('statu', [0,1])->count();

        if ($enrollcount >= $event->quota + $event->addquota)
            return "Maalesef bu etkinliğin kontenjanı doldu :(";

        $newformat = DateTime::createFromFormat('Y-m-d', $student->birthday)->format('Y-m-d');
        $birth_date = $newformat;
        $current_date = date('Y-m-d');
        $birth_date_obj = new DateTime($birth_date);
        $current_date_obj = new DateTime($current_date);
        $diff = $current_date_obj->diff($birth_date_obj);
        $age = $diff->y;

        if ($age < $event->ageRangeMin || $age > $event->ageRangeMax)
            return "Yaşınız bu etkinlik için uygun değildir.";

        if ($event->gender == "Male" && $student->gender == 2)
            return "Bu etkinlik erkeklere özeldir.";

        if ($event->gender == "Female" && $student->gender == 1)
            return "Bu etkinlik kadınlara özeldir.";

        if ($event->ikamet_only == 1 && $student->town != "beyoğlu")
            return "Bu etkinlik ilçemizde ikamet eden hemşehrilerimize özeldir.";

        if ($event->student_only == 1) {
            $filecheck = DB::table('student_files')
                ->where('student_id', $student->id)
                ->where('type', 1)
                ->whereIn('statu', [0,1])
                ->get();

            if ($filecheck->count() == 0)
                return "Bu etkinlik öğrencilere özel olduğundan dolayı önce Öğrenci Belgenizi yüklemeniz gerekmektedir.";
        }

        if ($event->disabled_only == 1) {
            $filecheck = DB::table('student_files')
                ->where('student_id', $student->id)
                ->where('type', 4)
                ->whereIn('statu', [0,1])
                ->get();

            if ($filecheck !== null)
                return "Bu etkinlik engelsizlere özel olduğundan dolayı önce Engelli Belgenizi yüklemeniz gerekmektedir.";
        }

        if ($event->education != null) {
            if ($event->education > $student->education) {
                return "Öğrenim durumunuz bu etkinlik için uygun değildir. Başvuru şartlarını kontrol ediniz.";
            }
        }

        if ($event->graduate != null) {
            if ($event->graduate != $student->graduate) {
                return "Mezuniyet durumunuz bu etkinlik için uygun değildir. Başvuru şartlarını kontrol ediniz.";
            }
        }

        $neweventenrollid = DB::table('event_enrollments')->insertGetId([
            'student_id' => $student->id,
            'event_id' => $request->eventid,
            'statu' => 0
        ]);

        $neweventenroll = eventenroll::where('id', $neweventenrollid)->first();

        if ($neweventenroll == null)
            return "New eventenroll Error";

        MessageController::sendMessage($student->phone, 'Sevgili ' . self::upperFirst($student->name) . '; ' . "\n" . $event->title . ' kaydınız alınmıştır. Başvurunuz değerlendirildikten sonra tarafınıza bilgi verilecektir. Keyifli vakitler dileriz :)');


        return "ok";

    }

    public function cancellenroll(Request $request)
    {

        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            return redirect()->route('login');
        }

        $lesson = lesson::where('id', $request->lessonid)->first();

        if ($lesson == null)
            return "Lesson Error";

        $enrollcheck = enroll::where('student_id', $student->id)->where('lesson_id', $lesson->id)->where('statu', 0)->first();

        if ($enrollcheck == null)
            return "Bu kursa ait aktif başvurunuz bulunmamaktadır.";

        if ($enrollcheck->statu == 1)
            return "Kesin kayıt yapılan başvuru iptal edilemez.";

        $enrollcheck->statu = 2;
        $enrollcheck->cancelled_date = now();
        $enrollcheck->cancelled_reason = "Kendisi iptal etti.";
        $enrollcheck->save();

        MessageController::sendMessage($student->phone, 'Sevgili ' . self::upperFirst($student->name) . '; ' . "\n" . $lesson->getBranch($lesson->id)->title . ' kursu kaydınız talebinize istinaden iptal edilmiştir. İyi günler dileriz.');

        return "ok";

    }

    public function cancelleventenroll(Request $request)
    {

        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            return redirect()->route('login');
        }

        $event = Events::where('id', $request->eventid)->first();

        if ($event == null)
            return "Event Error";

        $eventenrollcheck = eventenroll::where('student_id', $student->id)->where('event_id', $event->id)->whereIn('statu', [0,1])->whereNull('deleted_at')->first();

        if ($eventenrollcheck == null)
            return "Bu etkinliğe ait aktif başvurunuz bulunmamaktadır.";

        $eventenrollcheck->statu = 2;
        $eventenrollcheck->cancelled_date = now();
        $eventenrollcheck->cancelled_reason = "Kendisi iptal etti.";
        $eventenrollcheck->save();

        MessageController::sendMessage($student->phone, 'Sevgili ' . self::upperFirst($student->name) . '; ' . "\n" . $event->title . ' kaydınız talebinize istinaden iptal edilmiştir. İyi günler dileriz.');


        return "ok";

    }

    public function insertkindergartenenroll(Request $request)
    {

        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            return redirect()->route('login');
        }

        if ($student->phone == null || $student->education == null) {
            return "Başvuru yapmak için öncelikle kişisel bilgilerinizi doldurmalısınız. <br> <br> <button class='apply-button' style='width: 160px'><a href='/profile' style='text-decoration: none; color: white'>Profil Güncelle</a></button> ";
        }

        $kindergarten = KinderGarten::where('id', $request->kindergartenid)->first();

        if ($kindergarten == null)
            return "Kindergarten Error";

        $kindergartenenrollcheck = KinderGartenEnroll::where('student_id', $student->id)->where('kindergarten_id', $kindergarten->id)->whereNull('deleted_at')->first();

        if ($kindergartenenrollcheck != null)
            return "Bu anaokuluna daha önce başvuru yapılmış.";

        $enrollcount = KinderGartenEnroll::where('kindergarten_id', $kindergarten->id)->whereIn('statu', [0,1])->count();

        if ($enrollcount >= $kindergarten->quota + $kindergarten->addquota)
            return "Maalesef bu anaokulumuzun kontenjanı doldu :(";

        $newformat = DateTime::createFromFormat('Y-m-d', $student->birthday)->format('Y-m-d');
        $birth_date = $newformat;
        $current_date = date('Y-m-d');
        $birth_date_obj = new DateTime($birth_date);
        $current_date_obj = new DateTime($current_date);
        $diff = $current_date_obj->diff($birth_date_obj);
        $age = $diff->y;

        if ($age < $kindergarten->ageRangeMin || $age > $kindergarten->ageRangeMax)
            return "Yaşınız bu anaokulu için uygun değildir.";

        if ($kindergarten->gender == "Male" && $student->gender == 2)
            return "Bu anaokulu erkek çocuklara özeldir.";

        if ($kindergarten->gender == "Female" && $student->gender == 1)
            return "Bu anaokulu kız çocuklara özeldir.";

        if ($kindergarten->ikamet_only == 1 && $student->town != "beyoğlu")
            return "Bu anaokulu ilçemizde ikamet eden çocuklara özeldir.";

        $newkindergartenenrollid = DB::table('kindergarten_enrollments')->insertGetId([
            'student_id' => $student->id,
            'parent_id' => $request->parent1,
            'kindergarten_id' => $request->kindergartenid,
            'statu' => 0
        ]);

        $newkindergartenenroll = KinderGartenEnroll::where('id', $newkindergartenenrollid)->first();

        if ($newkindergartenenroll == null)
            return "New kindergartenenroll Error";

        MessageController::sendMessage($student->phone, 'Sevgili ' . self::upperFirst($student->name) . '; ' . "\n" . $kindergarten->title . ' kaydınız alınmıştır. Başvurunuz değerlendirildikten sonra tarafınıza bilgi verilecektir. İyi günler dileriz.');


        return "ok";

    }

    public function cancellkindergartenenroll(Request $request)
    {

        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            return redirect()->route('login');
        }

        $kindergarten = KinderGarten::where('id', $request->kindergartenid)->first();

        if ($kindergarten == null)
            return "Event Error";

        $kindergartenenrollcheck = KinderGartenEnroll::where('student_id', $student->id)->where('kindergarten_id', $kindergarten->id)->whereNull('deleted_at')->first();

        if ($kindergartenenrollcheck == null)
            return "Bu anaokuluna ait aktif başvurunuz bulunmamaktadır.";

        $kindergartenenrollcheck->deleted_at = now();
        $kindergartenenrollcheck->statu = 2;
        $kindergartenenrollcheck->cancelled_reason = "Kendisi iptal etti.";
        $kindergartenenrollcheck->save();

        MessageController::sendMessage($student->phone, 'Sevgili ' . self::upperFirst($student->name) . '; ' . "\n" . $kindergarten->title . ' kaydınız talebinize istinaden iptal edilmiştir. İyi günler dileriz.');

        return "ok";
    }

    public function profileupdate(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            return redirect()->route('login');
        }

        $student->email = $request->inputArray[2];
        $student->phone = $request->inputArray[3];
        $student->address = $request->inputArray[4];
        $student->working = $request->inputArray[7];
        $student->disability = $request->inputArray[8];
        $student->disability_type = $request->inputArray[9];
        $student->disability_diagnosis = $request->inputArray[10];
        $student->emergency = $request->inputArray[11];

        if ($request->inputArray[8] == "Hayır"){
            $student->disability_type = null;
            $student->disability_diagnosis = null;
        }

        if (sizeof($request->inputArray) > 12) {
            $student->parent_name = $request->inputArray[12];
            $student->parent_identity = $request->inputArray[13];
            $student->parent_phone = $request->inputArray[14];
        }

        if ($request->inputArray[5] != null || $request->inputArray[5] != "") {
            //$edu = DB::table('student_education')->where('title', $request->inputArray[5])->first();
            $student->education = $request->inputArray[5];
        }

        if ($request->inputArray[6] != null || $request->inputArray[6] != "") {
            if ($request->inputArray[6] == "Öğrenci" || $request->inputArray[6] == '1')
                $student->graduate = 1;
            elseif ($request->inputArray[6] == "Mezun" || $request->inputArray[6] == '2')
                $student->graduate = 2;
        }

        $student->save();

        return "ok";
    }

    public function tournament(Request $request)
    {
        $studentid = $request->session()->get('studentlogin');

        if ($studentid != null) {
            $student = student::where('id', $studentid)->first();
        } else {
            session(['loginpageurl' => $request->url()]);
            return redirect()->route('login');
        }

        $enroll = DB::table('form_answers')->where('student_id', $studentid)->where('form_id', 2)->first();

        if ($enroll != null) {
            $enroll_details = DB::table('form_answer_fields')->where('form_answer_id', $enroll->id)->get();
        } else {
            $enroll_details = null;
        }

        return view('tournament', compact('student', 'enroll_details', 'enroll'));
    }

    public function getBranchInfo(Request $request)
    {
        $lesson = lesson::where('id', $request->courseId)->first();
        $branch = branch::where('id', $lesson->branch_id)->first();
        $branchinfo[0] = $branch->title;
        $branchinfo[1] = $branch->statement;

        return $branchinfo;
    }

    public function getCertificate(Request $request)
    {
        $enroll = enroll::where('id', $request->enrollId)->first();

        if ($enroll->success_statu == 1 || $enroll->success_statu == 2) {
            $enroll[0] = student::where('id', $enroll->student_id)->first()->name . " " . student::where('id', $enroll->student_id)->first()->surname;
            $enroll[1] = Carbon::parse($enroll->getLesson($enroll->lesson_id)->date_start)->format('d.m.Y');
            $enroll[2] = Carbon::parse($enroll->getLesson($enroll->lesson_id)->date_end)->format('d.m.Y');
            $enroll[3] = $enroll->getLesson($enroll->lesson_id)->hours;
            $enroll[4] = branch::where('id', $enroll->getLesson($enroll->lesson_id)->branch_id)->first()->title;
        }

        return $enroll;
    }
}
