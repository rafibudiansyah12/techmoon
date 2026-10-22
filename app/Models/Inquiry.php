<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Inquiry extends Model { protected $fillable=['customer_id','product_id','handled_by','message','budget','status','internal_note']; protected $casts=['budget'=>'decimal:2']; public function customer(){return $this->belongsTo(Customer::class);} public function product(){return $this->belongsTo(Product::class);} public function handler(){return $this->belongsTo(User::class,'handled_by');} }
