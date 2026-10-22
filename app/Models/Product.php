<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Product extends Model { use HasFactory; protected $fillable=['pillar_id','name','slug','description','price','price_type','stock','image','is_featured','is_active']; protected $casts=['is_featured'=>'boolean','is_active'=>'boolean','price'=>'decimal:2']; public function pillar(){return $this->belongsTo(Pillar::class);} public function inquiries(){return $this->hasMany(Inquiry::class);} public function scopeActive($q){return $q->where('is_active',true);} public function scopeFeatured($q){return $q->where('is_featured',true);} }
