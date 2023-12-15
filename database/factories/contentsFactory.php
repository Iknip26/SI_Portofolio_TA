<?php

namespace Database\Factories;

use App\Models\contents;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\contents>
 */
class contentsFactory extends Factory
{
    protected $model = contents::class;

    public function definition()
    {
        return [
            'id_dosen' => $this->faker->randomElement([13, 15, 16]),
            'thumbnail_image_url' => $this->faker->imageUrl(),
            'tittle' => $this->faker->sentence(),
            'tipe_konten' => $this->faker->randomElement(['jurnal', 'tugas akhir']),
            'content_url' => null,
            'video_url' => null,
            'video_tittle' => null,
            'github_url' => $this->faker->url,
            'description' => $this->faker->paragraph(),
            'owner' => $this->faker->name(),
            'owner_contact' => $this->faker->phoneNumber(),
        ];
    }
}