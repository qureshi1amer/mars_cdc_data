<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CdcDataFetcher
{

    public function fetchData()
    {
        $response = Http::withHeaders([
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
            'Accept' => 'application/json',
            'Referer' => 'https://data.cdc.gov/',
        ])->timeout(300)->get(env('CDC_URL'));

        if ($response->failed()) {

            throw new \Exception('Failed to fetch data from CDC.');
        }

        return $response->json();
    }
}
