<div>

    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
        {{ __('Weather App') }}
    </h2>

    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model.live="city">
        <option selected>Choose a country</option>
        @foreach ($cities as $item)
            <option value="{{$item->name}}">{{$item->name}}</option>
        @endforeach
    </select>

    @if ($currentWeather)
        <div class="max-w-md p-8 mx-auto rounded-lg dark:bg-gray-900 dark:text-gray-100">
            <div class="flex justify-between space-x-8">
                <div class="flex flex-col items-center">
                    <img src="https://openweathermap.org/img/wn/{{$currentWeather['weather'][0]['icon']}}.png" alt="">
                    <h1 class="text-xl font-semibold">{{$currentWeather['name']}}</h1>
                </div>
                <span class="font-bold text-8xl">{{Helper::tempFormat($currentWeather['main']['temp'])}}°</span>
            </div>
            <div class="flex justify-between mt-8 space-x-4 dark:text-gray-400">
                @foreach ($futureWeather['list'] as $weather)
                    <div class="flex flex-col items-center space-y-1">
                        <span class="uppercase">{{Helper::getTime($weather['dt'])}}</span>
                        <img src="https://openweathermap.org/img/wn/{{$weather['weather'][0]['icon']}}.png" alt="">
                        <span>{{Helper::tempFormat($weather['main']['temp']) / 10}}°</span>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
