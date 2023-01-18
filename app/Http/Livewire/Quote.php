<?php

namespace App\Http\Livewire;

use App\Services\QuotesAPI;
use Livewire\Component;

class Quote extends Component
{
    private QuotesAPI $api;

    public string $quote;

    public string $author;

    public function __construct()
    {
        $this->api = new QuotesAPI();
    }

    private function getQuote()
    {
        $randomQuote = $this->api->randomQuote();

        $this->quote = $randomQuote->content;
        $this->author = $randomQuote->originator?->name;
    }

    public function render()
    {
        $this->getQuote();

        return view('livewire.quote');
    }
}
