<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $imageDirectory = public_path('images');
        $imageFiles = collect(scandir($imageDirectory))
            ->filter(function ($file) use ($imageDirectory) {
                $filePath = $imageDirectory . DIRECTORY_SEPARATOR . $file;
                return is_file($filePath) && in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']);
            })
            ->values()
            ->toArray();

        if (empty($imageFiles)) {
            throw new \Exception("No images found in the 'public/images' directory.");
        }
        for ($i = 0; $i < 4; $i++) {
            $article = Article::create([
                'title' => $faker->sentence(),
                'slug' => $faker->slug(),
                'excerpt' => $faker->text(100),
                'content' => $faker->paragraphs(3, true),
            ]);
            $randomImage = $imageFiles[array_rand($imageFiles)];
            $article->addMedia(public_path('images/' . $randomImage))
                ->preservingOriginal()
                ->toMediaCollection('featured_image');
        }
    }
}
