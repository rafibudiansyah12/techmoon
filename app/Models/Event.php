<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Event extends Model { use HasFactory; protected $fillable=['pillar_id','title','type','description','start_at','location','quota','fee','status','image']; protected $casts=['start_at'=>'datetime','fee'=>'decimal:2']; public function pillar(){return $this->belongsTo(Pillar::class);} public function registrations(){return $this->hasMany(EventRegistration::class);} public function scopeUpcoming($q){return $q->where('start_at','>=',now())->whereIn('status',['buka','penuh']);} public function getRemainingQuotaAttribute(){return max(0,$this->quota-$this->registrations()->where('status','!=','batal')->count());} }
