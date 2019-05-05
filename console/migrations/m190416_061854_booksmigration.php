<?php

use yii\db\Migration;


class m190416_061854_booksmigration extends Migration
{
    public function safeUp()
    {
        $this->createBooks();
        $this->createAuthors();
        $this->createBooksToAuthors();
        $this->createPublishers();
    }
    public function safeDown()
    {
        $this->dropTable('book');
        $this->dropTable('author');
        $this->dropTable('book_to_author');
        $this->dropTable('publisher');
    }

    private function createBooks()
    {
        $this->createTable('books',[
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'isbn' => $this->string(),
            'date_publisher' => $this->date(),
            'publisher_id' => $this->integer()
        ]);
        $this->insert('books',[
            'id' => '1',
            'name' => 'Война и мир',
            'isbn' => '1234',
            'date_publisher' => '2013-04-12',
            'publisher_id' => '1'
        ]);
        $this->insert('books',[
            'id' => '2',
            'name' => 'Герой нашего времени',
            'isbn' => '2345',
            'date_publisher' => '2013-05-01',
            'publisher_id' => '2'
        ]);
        $this->insert('books',[
            'id' => '3',
            'name' => 'Учебник физики',
            'isbn' => '34556',
            'date_publisher' => '2000-04-04',
            'publisher_id' => '3'
        ]);
        $this->insert('books',[
            'id' => '4',
            'name' => 'Учебник химии',
            'isbn' => '5678',
            'date_publisher' => '2000-11-11',
            'publisher_id' => '3'
        ]);
        $this->insert('books',[
            'id' => '5',
            'name' => 'Гору от ума',
            'isbn' => '6789',
            'date_publisher' => '2001-02-02',
            'publisher_id' => '2'
        ]);
    }
    private function createAuthors()
    {
        $this->createTable('author',[
            'id' => $this->primaryKey(),
            'firstName' => $this->string(),
            'lastName' => $this->string()
        ]);
        $this->insert('author',[
            'id' => '2',
            'firstName' => 'Kolya',
            'lastName' => 'KOlyanov'
        ]);
        $this->insert('author',[
            'id' => '3',
            'firstName' => 'Georg',
            'lastName' => 'Chukov'
        ]);
        $this->insert('author',[
            'id' => '4',
            'firstName' => 'Jim',
            'lastName' => 'Kim'
        ]);
    }
    private function createBooksToAuthors()
    {
        $this->createTable('books_to_authors',[
            'id' => $this->primaryKey(),
            'booksId' => $this->integer(),
            'authorId' => $this->integer()
        ]);
        $this->insert('books_to_authors',[
            'id' => '1',
            'booksId' => '1',
            'authorId' => '2'
        ]);
        $this->insert('books_to_authors',[
            'id' => '2',
            'booksId' => '2',
            'authorId' => '2'
        ]);
        $this->insert('books_to_authors',[
            'id' => '3',
            'booksId' => '3',
            'authorId' => '3'
        ]);
        $this->insert('books_to_authors',[
            'id' => '4',
            'booksId' => '4',
            'authorId' => '1'
        ]);
        $this->insert('books_to_authors',[
            'id' => '5',
            'booksId' => '5',
            'authorId' => '1'
        ]);
    }
    private function createPublishers()
    {
        $this->createTable('publishers',[
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'date_registered' => $this->date()
        ]);
        $this->insert('publishers',[
            'id' => '1',
            'name' => 'Филькина грамота',
            'date_registered' => '1900-12-12'
        ]);
        $this->insert('publishers',[
            'id' => '2',
            'name' => 'Рулон обоев',
            'date_registered' => '1950-12-12'
        ]);
        $this->insert('publishers',[
            'id' => '3',
            'name' => 'Мукулатура',
            'date_registered' => '1990-12-12'
        ]);
    }
}
