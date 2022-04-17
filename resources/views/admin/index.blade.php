<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          職員社食履歴
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="text-center py-4"><a href="{{route('admin.create')}}" class="bg-blue-500  hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
              職員追加
            </a></div>
            @if (session('status'))
                <div class="mb-4  text-center font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <h2 class="font-semibold pt-12 text-center text-xl text-gray-800 leading-tight">
              職員一覧
            </h2>
            <section class="text-gray-600 body-font">
              <div class="container px-5 py-12 mx-auto">
                <table class="table-auto w-full text-left whitespace-no-wrap">
                  <thead>
                    <tr>
                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">職員名</th>                    
                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">部署名</th>                    
                    </tr>                 
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <td class="px-4 py-3 text-blue-500"><a href="{{ route('admin.show', ['id'=> $user->id ])}}">{{$user->name}}</a></td>
                      <td class="px-4 py-3">{{$user->department}}</td>
                    </tr>
                    @endforeach          
                  </tbody>
                </table>
              </div>
            </section>
          </div>
      </div>
  </div>
  
</x-app-layout>
