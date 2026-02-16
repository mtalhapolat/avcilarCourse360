<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enroll extends Model
{
    use HasFactory;

    protected $table = 'enrollments';

    public static function getLesson($id)
    {
        $lesson = lesson::where('id', $id)->first();

        return $lesson;
    }

    public static function getLessonEnrollCount($enroll_id){
        $enroll = enroll::where('id', $enroll_id)->first();
        $count = enroll::where('lesson_id', $enroll->lesson_id)->whereIn('statu', [0,1])->count();

        return $count;
    }
}
