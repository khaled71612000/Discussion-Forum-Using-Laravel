<?php

namespace App;

use App\Notifications\ReplyMarkAsBestReply;
use App\Replay;


class Discussion extends Model
{
    // to get owner of disccusion this belongs to a user
    // user must be written not author 
    // or use foregin key user_id
    // bel0ongsto (..,'user_id')
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Replay::class);
    }

    // use this method to overwrite that laravel needs id to find object
    //use slug instead
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function bestReply()
    {
        return $this->belongsTo(Replay::class, 'reply_id');
    }

    public function markAsBestReply(Replay $reply)
    {
        $this->update([
            'reply_id' => $reply->id
        ]);

        $reply->user->notify(new ReplyMarkAsBestReply($reply->discussion));
    }
    // current quiery builder
    public function ScopeFilterByChannels($builder)
    {
        if (request()->query('channel')){
            // filer
            $channel = Channel::where('slug', request()->query('channel'))->first();
            if ($channel) {
                return $builder->where('channel_id', $channel->id);
            }
            return $builder;
        }
        return $builder;
    }
}
