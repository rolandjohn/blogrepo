<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function scopeIncomplete($query) //App\Task::incomplete()->get();
    {
    	return $query->where('completed', 0);
    }
}
