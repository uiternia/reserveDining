<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         献立追加
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
                <form method="POST" action="{{route('menus.store')}}" class="w-10/12 mx-auto md:max-w-md">
                    @csrf
                    <div class="mb-8">
                        <label for="day_date" class="text-sm block">日付</label>
                        <input type="text" id="menu_date" name="day_date">
                    </div>
                    <div class="mb-8">
                        <label for="staple_food" class="text-sm block">主食</label>
                        <input type="text" id="staple_food"  name="staple_food" required class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50" value="米飯">
                    </div>
                    <div class="mb-8">
                        <label for="main_dish" class="text-sm block">主菜</label>
                        <input type="text" id="main_dish" name="main_dish" required class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50">
                    </div>
                    <div class="mb-8">
                        <label for="side_dish" class="text-sm block">副菜</label>
                        <input type="text" id="side_dish" name="side_dish" required class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50">
                    </div>
                    <div class="mb-8">
                        <label for="soup" class="text-sm block">スープ</label>
                        <input type="text" id="soup" name="soup" required class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50">
                    </div>
                    <div class="mb-8">
                        <label for="fruit" class="text-sm block">果物</label>
                        <input type="text" id="fruit" name="fruit" required class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50">
                    </div>
                    <div class="mb-8">
                        <label for="max_people" class="text-sm block">最大人数(1〜100食まで)</label>
                        <input type="number" id="max_people" name="max_people" required class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50" value="100">
                    </div>
                    <div class="text-center mb-8">
                    <x-jet-button>
                        新規登録する
                    </x-jet-button>
                    </div>
                </form>
            </div>
          </div>
      </div>
  </div>
  <script src="{{ mix('js/flatpickr.js')}}"></script>
</x-app-layout>