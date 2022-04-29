<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(\Illuminate\Http\Request $request)
 */
class Sample extends Model
{
    use HasFactory;

    public $fillable = [
        'firstname',
        'lastname',
        'phone',
        'email'
    ];
}
