<?php

namespace App\Console\Commands;

use App\Models\Reddit;
use App\Models\Source;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Vlinde\ConvertsApiImporter\Services\Api\ConvertsAPI;

class GetPosts extends Command
{
    public $conapi;
    public $secret;

    private const ENDPOINT_BEGIN = "https://convertsapi.com/api/posts/importer?secret_code=";
    private const ENDPOINT_MIDDLE = "&debug=1&limit=3&link=";
    private const ENDPOINT_END = "/top.json?sort=top&limit=5";

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:posts';

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

        $this->conapi = new ConvertsAPI();
        $this->secret = 'DGW$T$WREF34534534tgTYI^IILILL';
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sources = Source::get();

        foreach ($sources as $source) {
            $endpoint = $source->url . self::ENDPOINT_END;
            $result = $this->getHttpResult($endpoint);

            foreach ($result->data->children as $post) {
                $this->parsePost($post, $source);
            }

        }

        return 0;
    }

    public function parsePost($post,Source $source) {
        $data = [
            "unique_id" => $post->data->id,
            "url" => $post->data->url,
            "author" => $post->data->author,
            "author_id" => $post->data->author_fullname,
            "title" => $post->data->title,
            "description" => $post->data->selftext,
            "description_html" => htmlspecialchars_decode($post->data->selftext_html),
            "upvote_ratio" => $post->data->upvote_ratio,
            "ups" => $post->data->ups,
            "score" => $post->data->score,
            "original_posted" => Carbon::createFromTimestamp($post->data->created)->toDateTimeString(),
            "original_posted_utc" => Carbon::createFromTimestamp($post->data->created_utc)->toDateTimeString(),
        ];

        $existingpost = Reddit::where("unique_id", $data["unique_id"])->exists();

        if(!$existingpost) {
            if (!Reddit::where([
                "author_id" => $data["author_id"],
                "title" => $data["title"],
            ])->exists()) {
                $r = new Reddit();
                $r->unique_id = $data["unique_id"];
                $r->url = $data["url"];
                $r->author = $data["author"];
                $r->author_id = $data["author_id"];
                $r->title = $data["title"];
                $r->description = $data["description"];
                $r->description_html = $data["description_html"];
                $r->upvote_ratio = $data["upvote_ratio"];
                $r->ups = $data["ups"];
                $r->score = $data["score"];
                $r->original_posted = $data["original_posted"];
                $r->original_posted_utc = $data["original_posted_utc"];
                $r->source_id = $source->id;

                $r->save();
            }
        } else {
            Reddit::where("unique_id", $data["unique_id"])->update([
                "ups" => $data["ups"],
                "upvote_ratio" => $data["upvote_ratio"],
                "score" => $data["score"],
            ]);
        }
    }

    public function getHttpResult($endpoint) {
        $body = Http::get($endpoint)->body();
        return json_decode($body);
    }
}
