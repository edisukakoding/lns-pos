<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 */
class Department extends Model
{
    use HasFactory;
    public $fillable = ['department_code', 'department_name', 'description'];
}
