<?php
namespace Database\Factories;
use App\Models\{Product,Pillar};use Illuminate\Database\Eloquent\Factories\Factory;use Illuminate\Support\Str;
class ProductFactory extends Factory { protected $model=Product::class; public function definition(): array {$name=fake()->words(3,true);return ['pillar_id'=>Pillar::factory(),'name'=>$name,'slug'=>Str::slug($name).'-'.fake()->unique()->numberBetween(1,99999),'description'=>fake()->paragraph(),'price'=>fake()->numberBetween(10000,5000000),'price_type'=>'tetap','stock'=>null,'image'=>null,'is_featured'=>false,'is_active'=>true];} }
