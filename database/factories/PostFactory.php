<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $usuarios = User::all();
        $id = $usuarios[User::all()->count()-1]->id;

        $directorio = storage_path(). '/app/public/posts/';

        Storage::delete(['public/posts/', $id]);
        Storage::makeDirectory('public/posts/'. $id);

        return [
            'title' => $this->faker->sentence(5),
            'image' => 'posts/'. $id . '/' . $this->faker->image($directorio. $id, 400, 300, null, false),
            'content' => $this->faker->paragraph(3),
        ];
    }
}
