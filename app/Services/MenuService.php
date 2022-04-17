<?php

namespace App\Services;

use Illuminate\Support\Facades\DB; 
use Carbon\Carbon;

class MenuService
{
  public static function checkMenuDuplication($day_date)
  {
    $check = DB::table('menus')
    ->whereDate('day_date','=',$day_date)
    ->exists();
    return $check;
  }
}