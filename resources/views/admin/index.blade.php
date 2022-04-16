<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          職員社食履歴
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <section class="text-gray-600 body-font">
              <div class="container px-5 py-12 mx-auto">
                @foreach($users as $user)
              <a href="{{ route('admin.show', ['id'=> $user->id ])}}">{{$user->name}}</a>
              @endforeach
              </div>
            </section>
          </div>
      </div>
  </div>
</x-app-layout>
