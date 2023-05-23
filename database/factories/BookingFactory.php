<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Booking::class;
    public function definition()
    {
        return [
            "name" => $this->faker->name('male'),
            "email" => $this->faker->unique()->safeEmail(),
            "address" => $this->faker->address(),
            "phone" => $this->faker->phoneNumber(),
            "status" => ["approved","accepted","pending"][rand(0,2)],
        ];
    }
}
