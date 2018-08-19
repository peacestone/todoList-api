<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function notificationable()
    {
        return $this->morphTo();
    }
}
