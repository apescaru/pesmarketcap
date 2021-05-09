<?php

namespace Database\Seeders;

use App\Models\Source;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $sources = [
            "reddit" => [
                "https://www.reddit.com/r/AllCryptoBets",
                "https://www.reddit.com/r/CryptoMarsShots",
                "https://www.reddit.com/r/SatoshiStreetBets",
                "https://www.reddit.com/r/CryptoMars",
                "https://www.reddit.com/r/SatoshiBets",
                "https://www.reddit.com/r/CryptoMarkets",
                "https://www.reddit.com/r/Cryptopumping",
                "https://www.reddit.com/r/CryptoCurrencies",
                "https://www.reddit.com/r/Moonshotcrypto",
                "https://www.reddit.com/r/altcoin",
                "https://www.reddit.com/r/AltStreetBets",
                "https://www.reddit.com/r/CryptoMoonShots",
                "https://www.reddit.com/r/Cryptostreetbets",
                "https://www.reddit.com/r/CryptoCurrencyTrading",
                "https://www.reddit.com/r/cryptomooncalls",
                "https://www.reddit.com/r/CryptoTrade",
                "https://www.reddit.com/r/shitcoinmoonshots",
                "https://www.reddit.com/r/AltcoinTrader",
                "https://www.reddit.com/r/MarsWallStreet",
                "https://www.reddit.com/r/CryptoMoon",
            ],
        ];

        foreach ($sources['reddit'] as $redditSource) {
            Source::create([
               "name" => "reddit",
               "url" => $redditSource,
            ]);
        }
    }
}
