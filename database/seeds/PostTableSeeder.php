<?php

use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Storage::disk('public')->deleteDirectory('posts');

        Post::truncate(); // limpiamos la tabla
        Category::truncate();
        Tag::truncate();

        $category = new Category();
        $category->name = "Negocios Internacionales";
        $category->save();

        $category = new Category();
        $category->name = "Ciencia de Datos";
        $category->save();

        $category = new Category();
        $category->name = "Cine Mexicano";
        $category->save();


        $post = new Post;
        $post->title = "Mi primer post";
        $post->url = Str::slug("Mi primer post");
        $post->excerpt = "Estracto de mi primer post";
        $post->body = "<p>Contenido de mi primer post";
        $post->published_at = Carbon::now()->subDays(4);//restamos 4 dias a la fecha actual
        $post->category_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'etiqueta 1']));

        $post = new Post;
        $post->title = "Mi segundo post";
        $post->url = Str::slug("Mi segundo post");
        $post->excerpt = "Estracto de mi segundo post";
        $post->body = "<p>Contenido de mi segundo post";
        $post->published_at = Carbon::now()->subDays(3);
        $post->category_id = 2;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'etiqueta 2']));

        $post = new Post;
        $post->title = "Mi tercer post";
        $post->url = Str::slug("Mi tercer post");
        $post->excerpt = "Estracto de mi tercer post";
        $post->body = "<p>Contenido de mi tercer post";
        $post->published_at = Carbon::now()->subDays(2);
        $post->category_id = 2;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'etiqueta 3']));

        $post = new Post;
        $post->title = "Mi cuarto post";
        $post->url = Str::slug("Mi cuarto post");
        $post->excerpt = "Estracto de mi cuarto post";
        $post->body = "<p>Contenido de mi cuarto post";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 3;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'etiqueta 4']));

        $post = new Post;
        $post->title = "Mi quinto post";
        $post->url = Str::slug("Mi quinto post");
        $post->excerpt = "Estracto de mi quinto post";
        $post->body = "<p>Contenido de mi quinto post";
        $post->published_at = Carbon::now();
        $post->category_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'etiqueta 5']));
    }
}
