<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Story extends Model
{
  use HasFactory;

  protected $fillable = ['path', 'filename'];

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }
}
