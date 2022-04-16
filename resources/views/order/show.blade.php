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
                  </div>
                <form id="cancel_{{$menu->id}}" method="post" action="{{route('order.cancel',['id'=> $menu->id ])}}" class="ml-2">
                    @csrf
                    <div class="my-4 mx-4 text-center">
                   <a href="#" data-id="{{$menu->id}}" onclick="cancelPost(this)" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                     キャンセルする
                   </a>
                    </div>
                </form>
            </div>
          </div>
      </div>
  </div>
  <script>
    function cancelPost(e) {
      'use strict';
      if (confirm('本当にキャンセルしてもよろしいですか?')) 
      {
       document.getElementById('cancel_' + e.dataset.id).submit(); 
      }
      }
  </script>
</x-app-layout>