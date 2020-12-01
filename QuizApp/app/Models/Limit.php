<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Limit extends Model
{
    use HasFactory;

    protected $fillable = [

        'limit'
    ];

    public function question()
    {
        return $this->hasOne(QuestionCreation::class);
    }
}
