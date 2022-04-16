<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; 
use App\Models\Menu;
use App\Models\Reservatioin;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function dashboard()
    {
        $day = Carbon::tomorrow();

        $today = Carbon::today();

        $reservedPeople = DB::table('reservations')
        ->select('menu_id',DB::raw('sum(number_of_people) as number_of_people'))
        ->groupBy('menu_id');

        //後にサービスコンテナに切り分け $menu $todayMenu
        $menus = DB::table('menus')
        ->leftJoinSub($reservedPeople,'reservedPeople',function($join){
            $join->on('menus.id', '=' ,'reservedPeople.menu_id');
        })
        ->whereDate('day_date','>=' , $day)
        ->orderBy('day_date','asc')
        ->paginate(30);

        $todayMenus = DB::table('menus')
        ->leftJoinSub($reservedPeople,'reservedPeople',function($join){
            $join->on('menus.id', '=' ,'reservedPeople.menu_id');
        })
        ->whereDate('day_date','=' , $today)
        ->get();

        return view('dashboard',
        compact('menus','reservedPeople','todayMenus'));
    }
    public function detail($id)
    {
        $menu = Menu::findOrfail($id);
        

        $reservedPeople = DB::table('reservations')
        ->select('menu_id',DB::raw('sum(number_of_people) as number_of_people'))
        ->whereNull('canceled_date')
        ->groupBy('menu_id')
        ->having('menu_id',$menu->id)
        ->first();

        if(!is_null($reservedPeople))
        {
            $reservablePeople = $menu->max_people - $reservedPeople->number_of_people;
        }else
        {
            $reservablePeople = $menu->max_people;
        }

        $isReserved = Reservation::where('user_id', '=' , Auth::id())
        ->where('menu_id', '=', $id)
        ->where('canceled_date','=',null)
        ->latest()
        ->first();

        return view('menu-detail',compact('menu','reservablePeople','isReserved','reservedPeople'));
    }

    public function ticket($id)
    {
        $menu = Menu::findOrfail($id);
        

        $reservedPeople = DB::table('reservations')
        ->select('menu_id',DB::raw('sum(number_of_people) as number_of_people'))
        ->whereNull('canceled_date')
        ->groupBy('menu_id')
        ->having('menu_id',$menu->id)
        ->first();

        if(!is_null($reservedPeople))
        {
            $reservablePeople = $menu->max_people - $reservedPeople->number_of_people;
        }else
        {
            $reservablePeople = $menu->max_people;
        }

        $isReserved = Reservation::where('user_id', '=' , Auth::id())
        ->where('menu_id', '=', $id)
        ->where('canceled_date','=',null)
        ->latest()
        ->first();

        return view('ticket',compact('menu','reservablePeople','isReserved','reservedPeople'));
    }
    
    public function reserve(Request $request)
    {
        $menu = Menu::findOrFail($request->id);

        $reservedPeople = DB::table('reservations')
        ->select('menu_id',DB::raw('sum(number_of_people) as number_of_people'))
        ->groupBy('menu_id')
        ->having('menu_id',$menu->id)
        ->first();

        if(is_null($reservedPeople) ||
         $menu->max_people >= $reservedPeople->number_of_people + $request->reservedPeople)
         {
             Reservation::create([
                 'user_id' => Auth::id(),
                 'menu_id' => $request['id'],
                 'number_of_people' => $request['reservedPeople']
             ]);
             session()->flash('status','予約が完了しました。');
            return to_route('dashboard');
         }
         else
         {
            session()->flash('status','満員で予約ができませんでした。');
            return to_route('dashboard');
         }
    }

    
}
