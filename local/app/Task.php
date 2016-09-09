<?php

namespace Monbord;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = ['name', 'progress', 'comment', 'priority', 'status'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
