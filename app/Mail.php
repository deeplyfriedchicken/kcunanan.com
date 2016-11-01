<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
  protected $fillable = [
      'name', 'subject', 'email', 'message', 'seen', 'created_at', 'updated_at'
  ];
}
