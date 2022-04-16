<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Menu;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth;
use App\Services\OrderService;

class OrderController extends Controller
{
    public function index(){
        $user = User::findOrFail(Auth::id());
        $menus = $user->menus;

        $fromTodayEvents = OrderService::orderHistory($menus,'fromToday');
        $pastEvents = OrderService::orderHistory($menus,'past');

        return view('order/index',compact('fromTodayEvents','pastEvents'));
    }

    public function show($id){
        $menu = Menu::findOrFail($id);
        $reservation = Reservation::where('user_id', '=' , Auth::id())
        ->where('menu_id', '=' , $id)
        ->latest()
        ->first();
        return view('order/show',compact('menu','reservation'));
    }

    public function cancel($id)
    {
        $reservation = Reservation::where('user_id', '=' , Auth::id())
        ->where('menu_id', '=' ,$id)
        ->latest()
        ->first();

        $reservation->canceled_date = Carbon::now()->format('Y-m-d H:i:s');
        $reservation->save();

        session()->flash('status','キャンセルしました。');
        return to_route('dashboard');
    }
}
