<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eventenroll extends Model
{
    use HasFactory;

    protected $table = 'event_enrollments';

    public static function getEvent($id)
    {
        $event = Events::where('id', $id)->first();

        return $event;
    }
}
