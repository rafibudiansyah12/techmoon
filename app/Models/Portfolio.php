<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Portfolio extends Model { protected $fillable=['product_id','title','description','client_name','image','project_url']; public function product(){return $this->belongsTo(Product::class);} }
