<?php

namespace App\Console\Commands;

use App\Models\Poocoin;
use App\Models\Reddit;
use Illuminate\Console\Command;

class RedditPoocoin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reddit:poocoin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach(Poocoin::get() as $p) {
            $matches = Reddit::where("title", "LIKE", "%$p->name%")->orWhere("description", "LIKE", "%$p->name%")->pluck("id")->toArray();

            $p->reddits()->attach($matches);
        }

        return 0;
    }
}
