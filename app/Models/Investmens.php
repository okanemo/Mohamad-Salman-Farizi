<?php

// namespace App;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invesments extends Model
{

    protected $fillable = 'status';

    public function user(){
        return $this->belongsTo(User::class);
    }
}