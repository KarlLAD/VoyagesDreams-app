<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favoris extends Model
{
    use HasFactory;

    // clé étrangère user
  public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // clé étrangère product
  public function product(): BelongsTo
    {
        return $this->belongsTo(Products::class);
    }


}

