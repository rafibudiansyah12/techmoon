<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Customer extends Model { protected $fillable=['name','email','phone','segment','organization']; public function inquiries(){return $this->hasMany(Inquiry::class);} public function registrations(){return $this->hasMany(EventRegistration::class);} }
