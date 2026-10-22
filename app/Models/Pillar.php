<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Pillar extends Model { use HasFactory; protected $fillable=['name','slug','description','icon']; public function products(){return $this->hasMany(Product::class);} public function events(){return $this->hasMany(Event::class);} }
