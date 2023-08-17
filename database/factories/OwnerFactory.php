<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Owner;

class OwnerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Owner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'phone' => $this->faker->regexify('[A-Za-z0-9]{15}'),
            'address' => $this->faker->regexify('[A-Za-z0-9]{255}'),
        ];
    }
}
