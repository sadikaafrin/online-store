<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    public static $unit;

    public static function newUnit($request)
    {
        self::$unit = new Unit();
        self::saveBasicinfo(self::$unit, $request);

    }

    public static function updateUnit($request, $id)
    {
        self::$unit = Unit::find($id);
        self::saveBasicinfo(self::$unit, $request);
    }

    public static function deleteUnit($id)
    {
        self::$unit = Unit::find($id);
        self::$unit->delete();
    }

    public static function saveBasicinfo($unit, $request)
    {
        $unit->name           = $request->name;
        $unit->code    = $request->code;
        $unit->description    = $request->description;
        $unit->save();
    }
}
