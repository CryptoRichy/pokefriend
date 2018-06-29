<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Char extends Model
{
    protected $fillable = [
        'user_id' , 'char_name' , 'char_team' , 'char_id' , 'char_lv'
    ];
}
