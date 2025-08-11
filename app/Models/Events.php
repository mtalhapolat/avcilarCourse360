<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Events extends Model
{
    use HasFactory;

    protected $table = 'events';

    public static function getVenue($id)
    {
        $venue = DB::table('venues')->where('id', $id)->first();

        return $venue;
    }

    public static function getCategory($id)
    {
        $category = DB::table('event_categories')->where('id', $id)->first();


        return $category;
    }

    public static function getEnrollCount($event_id){
        $count = eventenroll::where('event_id', $event_id)->whereIn('statu', [0,1])->count();

        return $count;
    }
}
