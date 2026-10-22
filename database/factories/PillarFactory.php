<?php
namespace Database\Factories;
use App\Models\Pillar;use Illuminate\Database\Eloquent\Factories\Factory;use Illuminate\Support\Str;
class PillarFactory extends Factory { protected $model=Pillar::class; public function definition(): array {$name=fake()->unique()->words(2,true);return ['name'=>$name,'slug'=>Str::slug($name).'-'.fake()->unique()->numberBetween(1,99999),'description'=>fake()->sentence(),'icon'=>'rocket'];} }
