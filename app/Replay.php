<?php

namespace App;


class Replay extends Model
{
    public function user () {
        return $this->belongsTo(User::class);
    }

    public function discussion () {
        return $this->belongsTo(discussion::class);
    }
}
