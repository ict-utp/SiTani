<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'quantity' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'period' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'address' => $this->faker->text,
            'description' => $this->faker->text,
        ];
    }
}
