<?php

namespace App\Observers;

use App\Models\Doer;
use App\Models\Task;

class DoerObserver
{

    /**
     * Handle the Doer "deleting" event.
     *
     * @param  \App\Models\Doer  $doer
     * @return void
     */
    public function deleting(Doer $doer)
    {
        $Tasks = Task::get();
        foreach ($Tasks as $Task) {
            $isDoer = $Task->doers()->where('id', $doer->id)->count();
            $doerCount = $Task->doers()->wherePivot('task_id', '=', $Task->id)->count();
            if ($isDoer && $doerCount==1)
                return false;
        }
    }
}
