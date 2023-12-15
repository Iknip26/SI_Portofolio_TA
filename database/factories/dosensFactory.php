<?php

namespace Database\Factories;

use App\Models\Dosen;
use App\Models\dosens;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class dosensFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = dosens::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_user' => 31,
            'name' => $this->faker->name,
            'image_profile' => 'public/profile/image/default_img.png', // Gantilah dengan path atau URL gambar profil default
            'contact' => $this->faker->phoneNumber,
            'major' => $this->faker->randomElement(['M.Kom', 'M.Eng', 'M.Cs']),
        ];
    }
}