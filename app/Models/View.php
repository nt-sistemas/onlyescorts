<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
  use HasFactory;

  protected $fillable = [
    'profile_id',
    'ip',
  ];

  public function profile()
  {
    return $this->belongsTo(Profile::class);
  }
}
