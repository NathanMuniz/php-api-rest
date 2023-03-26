<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  use HasFactory;


  protected $fillable = [
    'name',
    'slug',
    'description',
    'price'
  ];

  protected $hidden = [
    'password',
    'remember_tokne',
  ];

  protected $casts = [
    'email_verified_at' => 'datetime',
  ];
}
