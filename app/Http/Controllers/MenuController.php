<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Menu;
use App\Services\MenuService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; 

class MenuController extends Controller
{
    
    public function index()
    {
        $today = Carbon::today();

        $reservedPeople = DB::table('reservations')
        ->select('menu_id',DB::raw('sum(number_of_people) as number_of_people'))
        ->whereNull('canceled_date')
        ->groupBy('menu_id');


        $menus = DB::table('menus')
        ->leftJoinSub($reservedPeople,'reservedPeople',function($join){
            $join->on('menus.id', '=' ,'reservedPeople.menu_id');
        })
        ->whereDate('day_date','>=' , $today)
        ->orderBy('day_date','asc')
        ->paginate(30);
        return view('owner.menus.index',
        compact('menus'));
    }

    
    public function create()
    {
        return view('owner.menus.create');
    }

    
    public function store(StoreMenuRequest $request)
    {

        $check = MenuService::checkMenuDuplication($request['day_date']);
        
        if($check){
            session()->flash('status','この日付は既に登録されています。');
            return view('owner.menus.create');
        }

        Menu::create([
        'staple_food' => $request['staple_food'],
        'main_dish' => $request['main_dish'],
        'side_dish' => $request['side_dish'],
        'soup' => $request['soup'],
        'fruit' => $request['fruit'],
        'day_date' => $request['day_date'],
        'max_people' => $request['max_people']
        ]);
        session()->flash('status','登録しました。');
        return to_route('menus.index');
    }

    
    public function show(Menu $menu)
    {
        $menu = Menu::findOrFail($menu->id);
        $users = $menu->users;

        $reservations = [];

        foreach($users as $user)
        {
            $reservedInfo = [
                'name' => $user->name,
                'canceled_date' => $user->pivot->canceled_date
            ];
            array_push($reservations,$reservedInfo);
        }

        return view('owner.menus.show',compact('menu','users','reservations'));
    }

    
    public function edit(Menu $menu)
    {
        $menu = Menu::findOrFail($menu->id);
        return view('owner.menus.edit',compact('menu'));
    }

    
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
      $menu = Menu::findOrFail($menu->id);
      $menu->staple_food = $request['staple_food'];
      $menu->main_dish = $request['main_dish'];
      $menu->side_dish = $request['side_dish'];
      $menu->soup = $request['soup'];
      $menu->fruit = $request['fruit'];
      $menu->day_date = $request['day_date'];
      $menu->max_people = $request['max_people'];
      $menu->save();

      session()->flash('status','内容を変更しました。');
      return to_route('menus.index');

    }

    
    public function destroy(Menu $menu)
    {
        
    }
}
