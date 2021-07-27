<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sq_mt',
        'photo_main',
        'photo_1',
        'photo_2',
        'photo_3',
        'photo_4',
        'photo_5',
        'master_bedroom',
        'bathroom',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
