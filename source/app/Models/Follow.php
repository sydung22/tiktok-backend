<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = ['user_id_1', 'user_id_2'];

    protected $with = ['user_2'];

    public function user_1()
    {
        return $this->belongsTo(User::class, 'user_id_1');
    }

    public function user_2()
    {
        return $this->belongsTo(User::class, 'user_id_2');
    }
}
