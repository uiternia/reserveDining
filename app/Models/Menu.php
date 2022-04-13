<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'staple_food',
        'main_dish',
        'side_dish',
        'soup',
        'fruit',
        'day_date',
        'max_people',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'reservations')
        ->withPivot('id','number_of_people');
    }
}
