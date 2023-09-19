<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guessHistory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'guesses';
    protected $fillable =['id','guess','result'];
}