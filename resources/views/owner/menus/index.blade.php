<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         社食日程
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <section class="text-gray-600 body-font">
              <div class="container px-5 py-24 mx-auto">
               @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
                </div>
               @endif
                <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                  <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                      <tr>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">日付</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">主菜</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">予約人数</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($menus as $menu)
                      <tr>
                        <td class="px-4 py-3"><a href="{{ route('menus.show', ['menu'=> $menu->id ])}}">{{$menu->day_date}}</a></td>
                        <td class="px-4 py-3">{{$menu->main_dish}}</td>
                        <td class="px-4 py-3">これから</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                 
                  <button onclick="location.href='{{ route('menus.create')}}'" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">追加する</button>
                </div>
              </div>
            </section>

          </div>
      </div>
  </div>
  
</x-app-layout>