<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moneytrackerapp extends Model
{
    use HasFactory;
    protected $fillable=['amount','content','category','categorystring'];
}