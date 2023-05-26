<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = "tasks";
    protected $primaryKey = "id";
    protected $guarded = [];

    protected $attributes = [
        'status' => 'open'
    ];
}
