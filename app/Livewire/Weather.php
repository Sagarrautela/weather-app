<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\City;

class Weather extends Component
{
    public $city;
    public $cities;
    public $currentWeather;
    public $futureWeather;

    public function mount()
    {
        $this->cities = City::all();
    }

    public function updated($name, $value)
    {

        $api_key = config('services.openweathermap.key');
        $cnt = 5;

        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q={$this->city}&appid={$api_key}&units=metric");

        $responseFuture = Http::get("https://api.openweathermap.org/data/2.5/forecast?q={$this->city}&cnt={$cnt}&appid={$api_key}");

        $this->currentWeather = $response->json();
        $this->futureWeather = $responseFuture->json();
    }

    public function render()
    {
        return view('livewire.weather');
    }

}
