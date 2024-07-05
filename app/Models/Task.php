<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'description', 'completed', 'priority_id'];

    protected $casts = [
        'completed' => 'boolean',
        'priority_id' => 'integer',
    ];

    public function priority()
    {
        return $this->belongsTo(Priorities::class);
    }
}
