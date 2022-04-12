<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['jazzista', 'arrangiatore', 'bassista', 'violoncellista', 'direttore di coro', 'direttore di orchestra', 'DJ', 'insegnante', 'cantante', 'performer', 'virtuoso', 'polistrumentista', 'corista', 'corista religioso', 'membro banda', 'vocalist', 'cantautore', 'soprano', 'tenore', 'chitarrista classico', 'chitarrista folk', 'chitarrista rock'];
        foreach ($categories as $category_name) {
            $new_category = new Category();
            $new_category->name = $category_name;
            $new_category->save();
        }
    }
}
