<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reddit extends Model
{
    use HasFactory;

    protected $table = 'reddit';

    public function poocoin() {
        return $this->belongsToMany(Poocoin::class, "poocoin_reddit", "reddit_id", "poocoin_id");
    }
}
