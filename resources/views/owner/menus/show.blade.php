<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         献立内容
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <x-jet-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <div class="mt-8">
                <form method="get" action="{{route('menus.edit',['menu'=> $menu->id ])}}" class="ml-2">
                  <div class="sm:flex text-center justify-around">
                    <div class="sm:mr-8">
                        <label for="day_date" class="text-sm text-gray-500 block">日付</label>
                        {{$menu->day_date}}
                    </div>      
                    <div class="sm:mr-8 mb-4">
                      <label for="staple_date" class="text-sm text-gray-500 block">主食</label>
                      {{$menu->staple_food}}
                   </div>     
                   <div class="sm:mr-8 mb-4">
                    <label for="main_dish" class="text-sm text-gray-500 block">主菜</label>
                    {{$menu->main_dish}}
                 </div>     
                 <div class="sm:mr-8 mb-4">
                    <label for="side_date" class="text-sm text-gray-500 block">副菜</label>
                    {{$menu->side_dish}}
                 </div> 
                 <div class="sm:mr-8 mb-4">
                    <label for="soup" class="text-sm text-gray-500 block">スープ</label>
                    {{$menu->soup}}
                 </div>  
                 <div class="sm:mr-8 mb-4">
                    <label for="fruit" class="text-sm text-gray-500 block">フルーツ</label>
                    {{$menu->fruit}}
                 </div>  
                 <div class="sm:mr-8">
                    <label for="max_people" class="text-sm text-gray-500 block">最大人数</label>
                    {{$menu->max_people}}
                 </div>       
                  </div>
                    <div class="text-center my-8">
                    <x-jet-button>
                        編集する
                    </x-jet-button>
                    </div>
                </form>
            </div>
          </div>
      </div>
  </div>
  <div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"> 
    <div class="max-w-2xl mx-4 my-4">
    @if (!$users->isEmpty())
    <div class="text-center my-4">予約職員一覧</div>
    @foreach ($users as $user)
        {{$user->name}} /
    @endforeach
    @else
    @endif
    </div>
    </div>
    </div>
  <script src="{{ mix('js/flatpickr.js')}}"></script>
</x-app-layout>