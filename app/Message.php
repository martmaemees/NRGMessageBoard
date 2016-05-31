<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $dates = [
        'enddate', 'startdate'
    ];

    protected $fillable = [
        'title', 'body', 'startdate', 'enddate', 'user_id'
    ];

    # Query scope to get all the active messages from the database.
    public function scopeActive($query)
    {
        return $query->where('enddate', '>=', Carbon::now())
                    ->where('startdate', '<=', Carbon::now());
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
