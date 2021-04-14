<?php

// namespace App;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topups extends Model
{

    protected $table = 'topups';

    public function user(){
        return $this->belongsTo(User::class);
    }
}