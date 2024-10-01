<?php

namespace App\Handler;

use App\DTO\BookDTO;
use App\Entities\Author;
use App\Entities\Book;
use App\Entities\Publisher;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class BookCreateHandler
{


    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    public function handle(BookDTO $data): array
    {
        try {
            $book = new Book(title: $data->title, created_at: now());
            $publisher = $this->entityManager->find(Publisher::class, $data->publisherId);
            if (null === $publisher){
                return ['error' => 'Publisher with id'. $data->publisherId. 'not exist'];
            }
            $book->setPublisher($publisher);

            foreach ($data->authors as $id) {
                $author = $this->entityManager->find(Author::class, $id);
                if (null === $author){
                    return ['error' => 'Author with id '. $id. ' not exist'];
                }
                $book->addAuthor($author);
            }
            $this->entityManager->persist($book);
            $this->entityManager->flush();
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
        return ['message' => 'Book created'];
    }
}
