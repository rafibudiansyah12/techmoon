<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class EventRegistration extends Model { protected $fillable=['event_id','customer_id','status','registered_at']; protected $casts=['registered_at'=>'datetime']; public function event(){return $this->belongsTo(Event::class);} public function customer(){return $this->belongsTo(Customer::class);} }
