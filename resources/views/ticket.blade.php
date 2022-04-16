<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         献立内容
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
           
            <div class="mt-8">
                    @if($isReserved === null)
                    @if($reservablePeople > 0)
                    <div class="text-center mb-8">本日分は予約されていません。またのご利用をお待ちしております。</div> 
                    @endif
                    @else
                      <div class="text-center text-xl mb-8">{{$menu->day_date}}<br>
                      ご予約いただきありがとうございます。</div>                
                    @endif
                    </div>
            </div>
          </div>
      </div>
  </div>
  
  
</x-app-layout>