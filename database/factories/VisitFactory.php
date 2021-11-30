<?php

namespace Database\Factories;

use App\Models\SubService;
use App\Models\Visit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;


class VisitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Visit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $services = SubService::all()->toArray();
        $randomService=Arr::random($services);
        return [
            'service' => $randomService['name'],
            'name' => $this->faker->name(),
            'price' => $this->faker->numberBetween(100,200),
            'start' => $this->faker->dateTimeBetween('now', '+2 months'),
            'end' => $this->faker->dateTimeBetween('now', '+2 months'),
            'client_id' => '10',
            'created_by' => 'admin'
        ];
    }
}
