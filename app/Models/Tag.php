<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Topic;

class Tag extends Model
{
    use HasFactory;

    /**
     * Fields which could be mass saved
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Relation between tag and topic model
     *
     * @return BelongsToMany
     */
    public function topics(): BelongsToMany
    {
        return $this->belongsToMany(Topic::class);
    }
}
