<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          職員社食履歴
      </h2>
  </x-slot>


  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <form method="get" action="{{route('admin.edit',['id'=> $user->id ])}}" class="ml-2">
            <x-jet-button>
              編集する
          </x-jet-button>
          </form>
          <h2 class="font-semibold pt-12 text-center text-xl text-gray-800 leading-tight">
            {{$user->name}}さんの注文履歴
          </h2>
          <section class="text-gray-600 body-font">
            <div class="container px-5 py-12 mx-auto">
              <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                <table class="table-auto w-full text-left whitespace-no-wrap">
                  <thead>
                    <tr>
                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">注文履歴(過去分)</th>                    
                    </tr>                 
                  </thead>
                  <tbody>
                    @foreach($pastEvents as $menu)
                    <tr>
                      <td class="px-4 py-3">{{$menu['day_date']}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
               
              </div>
            </div>
          </section>
          <form id="cancel_{{$user->id}}" method="POST" action="{{route('admin.delete',['id'=> $user->id ])}}" class="ml-2">
            @csrf
            <div class="text-center my-4">
              <a href="#" data-id="{{$user->id}}" onclick="cancelPost(this)" class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
              退職のためデータを消去する
              </a>
            </div>
          </form>
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
