<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'description',
        'status',
        'user_id',
        'category_id'
    ];

    /**
     * Relation between topic and User
     *
     * @return relationship
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
