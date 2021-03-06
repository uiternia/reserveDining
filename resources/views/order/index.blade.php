<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         注文履歴
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
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">注文履歴(明日以降はキャンセル可能です)</th>     
                      </tr> 
                    </thead>
                    <tbody>
                      @foreach($fromTodayEvents as $menu)
                      <tr>
                        <td class="px-4 py-3 text-blue-500"><a href="{{route('order.show',['id'=>$menu['id']])}}">{{$menu['day_date']}}</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>                  
                </div>
              </div>
            </section>
          </div>
      </div>
  </div>

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

        </div>
    </div>
</div>
  
</x-app-layout>