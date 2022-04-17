<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         職員情報変更
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
                <form method="POST" action="{{route('admin.update',['id'=> $user->id ])}}" class="w-10/12 mx-auto md:max-w-md">
                    @csrf
                  
                    <div class="mb-8">
                        <label for="name" class="text-sm block">名前</label>
                        <input type="text" id="name"  name="name" required class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50">
                    </div>
                    <div class="mb-8">
                        <label for="email" class="text-sm block">email</label>
                        <input type="email" id="email" name="email" required class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50">
                    </div>
                    <div class="mb-8">
                        <label for="password" class="text-sm block">パスワード</label>
                        <input type="password" id="password" name="password" required class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50">
                    </div>
                    <div class="mb-8">
                        <label for="department" class="text-sm block">部署名</label>
                        <input type="text" id="department" name="department" required class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50">
                    </div>
                    
                        <input type="hidden" id="role" name="role" value="9">
                    
                    <div class="text-center mb-8">
                    <x-jet-button>
                        職員情報を変更する
                    </x-jet-button>
                    </div>
                </form>
            </div>
          </div>
      </div>
  </div>
  
</x-app-layout>