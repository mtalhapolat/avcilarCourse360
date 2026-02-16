<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class student extends Model
{
    use HasFactory;

    protected $table = 'students';

    public static function getUploadedFiles($studentid)
    {
        $files = DB::table('student_files')->where('student_id', $studentid)->get();

        return $files;

    }

    public static function getFileType($number)
    {
        if ($number == 1)
            return "Öğrenci Belgesi";
        elseif ($number == 2)
            return "Mezuniyet Belgesi";
        elseif ($number == 3)
            return "Sağlık Belgesi";
        elseif ($number == 4)
            return "Engelli Raporu";
        elseif ($number == 5)
            return "Çözger Raporu";
        else
            return null;

    }

    public static function getEducation($id)
    {
        $education = DB::table('student_education')->where('id', $id)->first();

        return $education->title;
    }
}
