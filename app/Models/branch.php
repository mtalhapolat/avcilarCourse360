<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branch extends Model
{
    use HasFactory;

    protected $table = 'branches';

    public static function getArea($branchid)
    {
        $branch = branch::where('id', $branchid)->first();
        $area = area::where('id', $branch->area_id)->first();

        return $area;
    }


}
