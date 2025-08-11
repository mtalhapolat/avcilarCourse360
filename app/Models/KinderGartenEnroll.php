<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KinderGartenEnroll extends Model
{
    use HasFactory;

    protected $table = 'kindergarten_enrollments';

    public static function getKinderGarten($id)
    {
        $kindergarten = KinderGarten::where('id', $id)->first();

        return $kindergarten;
    }

    public static function getStudentKinderGarten($id)
    {
        $student = student::where('id', $id)->first();

        return $student;
    }

    public static function getSchoolKinderGarten($id)
    {
        $school = KinderGarten::where('id', $id)->first();

        return $school;
    }

    public static function getGroupKinderGarten($id)
    {
        $group = DB::table('kindergarten_groups')->where('id', $id)->first();

        return $group;
    }
}
