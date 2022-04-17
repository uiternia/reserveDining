<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            社員食予約
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <section class="text-gray-600 body-font">
                <div class="container px-5 py-12 mx-auto">
                    <h3 class="text-center mb-12 font-semibold text-m text-gray-800 leading-tight">
                        明日からの社食を予約できます。
                    </h3>
                 @if (session('status'))
                  <div class="mb-4 font-medium text-sm text-green-600">
                  {{ session('status') }}
                  </div>
                 @endif
                  <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                    <table class="table-auto w-full text-center whitespace-no-wrap">
                      <thead>
                        <tr>
                          <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">日付</th>
                          <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">主菜</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($menus as $menu)
                        <tr>
                          <td class="md:px-4 py-3 text-blue-500"><a href="{{ route('menus.detail', ['id'=> $menu->id ])}}">{{$menu->day_date}}</a></td>
                          <td class="md:px-4 py-3">{{$menu->main_dish}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{$menus->links()}}
                  </div>
                </div>
              </section>
  
            </div>
        </div>
    </div>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="text-gray-600 body-font">
              <div class="text-center">
                @foreach ($todayMenus as $todayMenu)
                <a href="{{route('menus.ticket',['id'=>$todayMenu->id])}}" class="bg-blue-500  text-xl hover:bg-blue-700 text-white font-bold py-8 px-16 rounded">
                  本日の予約確認 
                </a>
                @endforeach
              </div>
            </section>
      </div>
  </div>
</x-app-layout>
