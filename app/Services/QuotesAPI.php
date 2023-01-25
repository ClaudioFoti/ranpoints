<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class QuotesAPI
{
    private string $host = 'quotes15.p.rapidapi.com';

    private string $base_url = 'https://quotes15.p.rapidapi.com/quotes/';

    private function request($endpoint, $parameters = [])
    {
        $response = Http::withHeaders([
            'X-RapidAPI-Key' => env('QUOTES_API_KEY'),
            'X-RapidAPI-Host' => $this->host,
        ])->get($this->base_url.$endpoint.'/', $parameters);

        if($response->status() === 200){
            return json_decode($response->body());
        }

        return null;
    }

    public function randomQuote($language = 'en')
    {
        return $this->request('random', ['language_code' => $language]);
    }
}
