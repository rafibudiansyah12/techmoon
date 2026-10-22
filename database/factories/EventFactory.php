<?php
namespace Database\Factories;
use App\Models\{Event,Pillar};use Illuminate\Database\Eloquent\Factories\Factory;
class EventFactory extends Factory { protected $model=Event::class; public function definition(): array {return ['pillar_id'=>Pillar::factory(),'title'=>fake()->sentence(4),'type'=>fake()->randomElement(['bootcamp','seminar']),'description'=>fake()->paragraph(),'start_at'=>now()->addDays(fake()->numberBetween(5,90)),'location'=>fake()->city(),'quota'=>fake()->numberBetween(10,50),'fee'=>fake()->numberBetween(0,500000),'status'=>'buka','image'=>null];} }
