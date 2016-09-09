<?php

namespace Monbord\Repositories;
use Monbord\User;

 class TaskRepository{
    public function forUser(User $user){
        return $user->tasks()->orderBy('created_at', 'asc')->get();
    }
}