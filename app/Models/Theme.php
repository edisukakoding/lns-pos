<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(string[] $wallpaper)
 */
class Theme extends Model
{
    use HasFactory;
    public $fillable = ['value', 'text', 'group'];
}
