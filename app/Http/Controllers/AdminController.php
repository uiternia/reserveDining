<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Menu;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth;
use App\Services\OrderService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;

class AdminController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->orderBy('department','asc')->get();

        return view('admin.index',
        compact('users'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
            'department' => ['required'],
        ]);

        User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
        'department' => $request->department,
        ]);

        session()->flash('status','登録しました。');
        return to_route('admin.index');
    }


    public function show(Request $request ,$id)
    {
        $user = User::findOrFail($id);
        $menus = $user->menus;

        $fromTodayEvents = OrderService::orderHistory($menus,'fromToday');//、未来分表示はしていません
        $pastEvents = OrderService::orderHistory($menus,'past');

        return view('admin.show',compact('fromTodayEvents','pastEvents','user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
            'department' => ['required'],
        ]);

      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = $request->password;
      $user->role = $request->role;
      $user->department = $request->department;
      
      $user->save();

      session()->flash('status','内容を変更しました。');
      return to_route('admin.index');

    }

    public function delete($id)
    {
        $user = User::findOrFail($id)->delete();

        session()->flash('status','消去しました。');
        return to_route('admin.index');
    }

}
