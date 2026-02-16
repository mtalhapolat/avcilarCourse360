<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kefken extends Model
{
    use HasFactory;

    protected $table = 'kefken_enrollments';

    public static function getGroup($id)
    {
        $group = DB::table('kefken_groups')->where('id', $id)->first();

        return $group->title;
    }
}
