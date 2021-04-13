<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function events()
    {
        return $this->hasMany(Event::class, 'event_id', 'id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function saveQuietly()
    {
        return static::withoutEvents(function () {
            return $this->save();
        });
    }
}
