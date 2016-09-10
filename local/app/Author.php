<?php

namespace Monbord;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    public function quotes(){
        return $this->hasMany(Quote::class);
    }
}
