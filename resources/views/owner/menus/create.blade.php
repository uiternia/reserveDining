<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         献立追加
      </h2>
  </x-slot>

  {{-- <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
             
          </div>
      </div>
  </div> --}}
  <div class="py-12">
  <div class="mt-8">
    <form class="w-10/12 mx-auto md:max-w-md">
        <div class="mb-8">
            <label for="staple_food" class="text-sm block">主食</label>
            <input type="text" id="staple_food" class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50" value="米飯">
        </div>
        <div class="mb-8">
            <label for="emai" class="text-sm block">Eメール</label>
            <input type="email" id="email" class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50" placeholder="Eメール">
        </div>
        <div class="mb-8">
            <label for="address" class="text-sm block">住所</label>
            <input type="text" id="address" class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50" placeholder="住所">
        </div>
        <div class="mb-8">
            <label for="phone_number" class="text-sm block">電話番号</label>
            <input type="tel" id="phone_number" class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50" placeholder="電話番号">
        </div>
        <div class="mb-8">
            <label for="other">その他</label>
            <textarea  id="other" cols="30" rows="8" class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50" placeholder="その他"></textarea>
        </div>
    </form>
</div>
  </div>
</x-app-layout>