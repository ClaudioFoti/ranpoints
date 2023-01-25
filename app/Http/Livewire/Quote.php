<?php

namespace App\Http\Livewire;

use App\Services\QuotesAPI;
use Livewire\Component;

class Quote extends Component
{
    private QuotesAPI $api;

    public string $quote;

    public string $author;

    public string $language;

    public array $languages = [
        [
            'code' => 'en',
            'text' => 'English',
        ],
        [
            'code' => 'fr',
            'text' => 'Français',
        ],
        [
            'code' => 'it',
            'text' => 'Italiano',
        ],
        [
            'code' => 'es',
            'text' => 'Español',
        ],
    ];

    public function __construct()
    {
        $this->api = new QuotesAPI();
        $this->language = 'en';
    }

    private function getQuote()
    {
        $collection = collect($this->languages);

        if ($collection->filter(fn ($language) => $language['code'] === $this->language)->count() > 0) {
            $randomQuote = $this->api->randomQuote($this->language);
        } else {
            $randomQuote = $this->api->randomQuote();
        }

        if ($randomQuote !== null) {
            $this->quote = $randomQuote->content;
            $this->author = $randomQuote->originator?->name;
        }
    }

    public function render()
    {
        $this->getQuote();

        return view('livewire.quote');
    }
}
