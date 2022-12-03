<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Extension;

use Faker\Calculator;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    private function ean(int $length = 13): string
    {
        $code = Extension\Helper::numerify(str_repeat('#', $length - 1));

        return sprintf('%s%s', $code, Calculator\Ean::checksum($code));
    }

    public function definition()
    {
        return [
            'title' => fake()->unique()->word,
            'author_id' => User::factory()->create()->id,
            'isbn' => $this->ean(3) . '-' . $this->ean(3) . '-'. $this->ean(4) . '-' . $this->ean(2) . '-' . $this->ean(1),
            'editorial' => fake()->company(),
            'publication_year' => fake()->year(),
            'language' => fake()->randomElement($array = array ('Español','Ingles','Frances')),
            'pages' => fake()->numberBetween(200,400),
            'cover_photo_path' => fake()->imageUrl($width=400, $height=400),
        ];
    }
}
