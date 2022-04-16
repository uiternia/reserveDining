<?php

namespace App\Services;

use Illuminate\Support\Facades\DB; 
use Carbon\Carbon;

class OrderService
{
  public static function orderHistory($menus,$string)
  {
    $reservedEvents = [];

    if($string === 'fromToday')
    {
      foreach($menus->sortBy('day_date') as $menu)
      {
        if(is_null($menu->pivot->canceled_date) &&
          $menu->day_date >= Carbon::tomorrow()->format('Y-m-d'))
        {
          $menuInfo = [
            'id' => $menu->id,
            'day_date' => $menu->day_date, 
          ];
          array_push($reservedEvents,$menuInfo);
        }
      }
    }

    if($string === 'past')
    {
      foreach($menus->sortBy('day_date') as $menu)
      {
        if(is_null($menu->pivot->canceled_date) &&
          $menu->day_date < Carbon::tomorrow()->format('Y-m-d'))
        {
          $menuInfo = [
            'id' => $menu->id,
            'day_date' => $menu->day_date, 
          ];
          array_push($reservedEvents,$menuInfo);
        }
      }
    }

    return $reservedEvents;
  }
}