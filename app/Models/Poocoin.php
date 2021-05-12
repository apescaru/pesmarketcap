<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poocoin extends Model
{
    use HasFactory;

    protected $table = "poocoin";

    public function reddits() {
        return $this->belongsToMany(Reddit::class, "poocoin_reddit", "poocoin_id", "reddit_id");
    }
}
