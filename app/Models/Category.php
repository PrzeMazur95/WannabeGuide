<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Topic;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id'
    ];

    /**
     * Returns all topics belongs to specific category
     *
     */
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
}
