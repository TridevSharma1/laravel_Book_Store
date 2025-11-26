<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title'       => 'The Alchemist',
                'author'      => 'Paulo Coelho',
                'isbn'        => '9780062315007',
                'quantity'    => 10,
                'book_image'  => null,
                'description' => 'A philosophical adventure novel.',
            ],
            [
                'title'       => '1984',
                'author'      => 'George Orwell',
                'isbn'        => '9780451524935',
                'quantity'    => 8,
                'book_image'  => null,
                'description' => 'A novel about totalitarianism.',
            ],
            [
                'title'       => 'Harry Potter and the Sorcerer\'s Stone',
                'author'      => 'J.K. Rowling',
                'isbn'        => '9780590353427',
                'quantity'    => 12,
                'book_image'  => null,
                'description' => 'The first book in the Harry Potter series.',
            ],
            [
                'title'       => 'The Hobbit',
                'author'      => 'J.R.R. Tolkien',
                'isbn'        => '9780547928227',
                'quantity'    => 5,
                'book_image'  => null,
                'description' => 'A fantasy adventure novel.',
            ],
            [
                'title'       => 'To Kill a Mockingbird',
                'author'      => 'Harper Lee',
                'isbn'        => '9780061120084',
                'quantity'    => 7,
                'book_image'  => null,
                'description' => 'A novel about racial injustice.',
            ],
            [
                'title'       => 'The Great Gatsby',
                'author'      => 'F. Scott Fitzgerald',
                'isbn'        => '9780743273565',
                'quantity'    => 9,
                'book_image'  => null,
                'description' => 'A story of the Jazz Age and lost dreams.',
            ],
            [
                'title'       => 'Moby Dick',
                'author'      => 'Herman Melville',
                'isbn'        => '9781503280786',
                'quantity'    => 4,
                'book_image'  => null,
                'description' => 'The voyage of the whaling ship Pequod.',
            ],
            [
                'title'       => 'Pride and Prejudice',
                'author'      => 'Jane Austen',
                'isbn'        => '9781503290563',
                'quantity'    => 11,
                'book_image'  => null,
                'description' => 'A romantic novel of manners.',
            ],
            [
                'title'       => 'The Catcher in the Rye',
                'author'      => 'J.D. Salinger',
                'isbn'        => '9780316769488',
                'quantity'    => 6,
                'book_image'  => null,
                'description' => 'A novel about teenage rebellion.',
            ],
            [
                'title'       => 'The Lord of the Rings',
                'author'      => 'J.R.R. Tolkien',
                'isbn'        => '9780544003415',
                'quantity'    => 3,
                'book_image'  => null,
                'description' => 'An epic high fantasy trilogy.',
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
