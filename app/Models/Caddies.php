<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Caddies extends Model
{
    use HasFactory;

      public function product(): HasMany
    {
        return $this->hasMany(Products::class);

    }
      public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
