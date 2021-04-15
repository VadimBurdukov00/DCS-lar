<?php

namespace Database\Factories;

use App\Models\Doer;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doer::class;
    private  $posts = ["Разработчик", "Тестировщик"];
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'post' => $this->posts[array_rand($this->posts)]
        ];
    }
}
