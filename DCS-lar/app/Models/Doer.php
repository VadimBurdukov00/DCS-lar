<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doer extends Model
{
    use HasFactory;

    public function tasks()
    {
    	return $this->belongsToMany('App\Models\Task');
    }

    public function tasksWhere()
    {
    	return $this->belongsToMany('App\Models\Task')->wherePivot('task_id');
    }
}
