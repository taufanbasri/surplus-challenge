<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\File as HttpFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomFile = $this->faker->randomElement(File::files(public_path('images')));
        $filePath = Storage::disk('public')->put('images', new HttpFile($randomFile));

        return [
            'name' => $this->faker->name,
            'file' => $filePath,
            'enable' => $this->faker->boolean(),
        ];
    }
}
