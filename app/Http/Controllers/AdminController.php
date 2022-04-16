<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Menu;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth;
use App\Services\OrderService;

class AdminController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();

        return view('admin.index',
        compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $menus = $user->menus;

        $fromTodayEvents = OrderService::orderHistory($menus,'fromToday');//、未来分表示はしていません
        $pastEvents = OrderService::orderHistory($menus,'past');

        return view('admin.show',compact('fromTodayEvents','pastEvents','user'));
       
    }
}
