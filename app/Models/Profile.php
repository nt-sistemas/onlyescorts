<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'category_id', 'about_me', 'avatar', 'slide', 'slug', 'phone', 'birth', 'city', 'gender', 'country'];


  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function images()
  {
    return $this->hasMany(Image::class);
  }

  public function views()
  {
    return $this->hasMany(View::class);
  }
}
