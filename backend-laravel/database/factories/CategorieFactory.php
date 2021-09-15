<?php

namespace Database\Factories;

use App\Models\categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategorieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = categorie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->text(50),
            'condition'=>$this->faker->text(300)
        ];
    }
}
