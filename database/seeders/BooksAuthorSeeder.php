<?php

namespace Database\Seeders;

use App\Models\BooksAuthor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksAuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            [
                'name' => 'ANDREA HIRATA',
                'slug' => 'andrea-hirata',
            ],

            [
                'name' => 'TERE LIYE',
                'slug' => 'tere-liye',
            ],
        ];

        foreach ($authors as $booksauthor) {
            $author = new BooksAuthor();

            $author->name = $booksauthor['name'];
            $author->slug = $booksauthor['slug'];

            $author->save();
        }
    }
}
