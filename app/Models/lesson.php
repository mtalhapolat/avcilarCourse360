<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class lesson extends Model
{
    use HasFactory;

    protected $table = 'lessons';

    public static function getBranch($lessonid)
    {
        $lesson = lesson::where('id', $lessonid)->first();
        $branch = branch::where('id', $lesson->branch_id)->first();

        return $branch;
    }

    public static function getCenter($lessonid)
    {
        $lesson = lesson::where('id', $lessonid)->first();
        $center = center::where('id', $lesson->center_id)->first();

        return $center;
    }

    public static function getArea($lessonid)
    {
        $lesson = lesson::where('id', $lessonid)->first();
        $area = area::where('id', $lesson->area_id)->first();

        return $area;
    }

    public static function getLessonDays($id){
        $days = DB::table('lessons_days')->where('lesson_id', $id)->get();

        return $days;
    }

    public static function getWeekDay($number){
        if ($number == 1)
            return "Pazartesi";
        elseif (($number == 2))
            return "Salı";
        elseif (($number == 3))
            return "Çarşamba";
        elseif (($number == 4))
            return "Perşembe";
        elseif (($number == 5))
            return "Cuma";
        elseif (($number == 6))
            return "Cumartesi";
        elseif (($number == 7))
            return "Pazar";
        else
            return "-";
    }

    public static function getEnrollCount($lesson_id){
        $count = enroll::where('lesson_id', $lesson_id)->whereIn('statu', [0,1])->count();

        return $count;
    }

}
