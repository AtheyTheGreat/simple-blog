<?php

namespace Tests\Feature;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_article_with_image()
    {

        $image = UploadedFile::fake()->image('new_image.png');
        $data = [
            'title' => 'Test Article',
            'slug' => 'test-article',
            'excerpt' => 'This is a test excerpt.',
            'content' => 'This is test content.',
            'featured_image' => $image,
        ];

        $response = $this->post(route('articles.store'), $data);
        $response->assertRedirect(route('articles.index'));

        $this->assertDatabaseHas('articles', [
            'title' => 'Test Article',
            'slug' => 'test-article',
            'excerpt' => 'This is a test excerpt.',
            'content' => 'This is test content.',
        ]);

        $article = Article::first();
        $this->assertNotNull($article->getFirstMedia('featured_image'));
        $this->assertTrue(file_exists($article->getFirstMedia('featured_image')->getPath()));
    }
    public function test_update_article_with_image()
    {
        $article = Article::factory()->create();
        $newImage = UploadedFile::fake()->image('new_image.png');

        $data = [
            'title' => 'Updated Article Title',
            'slug' => 'updated-article-title',
            'excerpt' => 'Updated excerpt.',
            'content' => 'Updated content.',
            'featured_image' => $newImage,
        ];

        $response = $this->patch(route('articles.update', $article->slug), $data);
        $response->assertRedirect(route('article.show', $data['slug']));
        $this->assertDatabaseHas('articles', [
            'title' => 'Updated Article Title',
            'slug' => 'updated-article-title',
        ]);

        $article->refresh();
        $this->assertNotNull($article->getFirstMedia('featured_image'));
        $this->assertTrue(file_exists($article->getFirstMedia('featured_image')->getPath()));
    }
    public function test_delete_article_with_image()
    {
        $article = Article::factory()->create();
        $image = UploadedFile::fake()->image('file.png');
        $article->addMedia($image)->toMediaCollection('featured_image');
        $response = $this->delete(route('articles.destroy', $article));
        $response->assertRedirect(route('articles.index'));
        $this->assertDatabaseMissing('articles', ['id' => $article->id]);

        $this->assertNull($article->getFirstMedia('featured_image'));
    }
}
