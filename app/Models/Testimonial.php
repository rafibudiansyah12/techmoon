<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Testimonial extends Model { protected $fillable=['customer_id','name','content','rating','is_published']; protected $casts=['is_published'=>'boolean']; public function customer(){return $this->belongsTo(Customer::class);} }
