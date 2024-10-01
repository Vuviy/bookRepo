<?php

namespace App\Http\Controllers;

//use App\Entities\Book;
//use App\Entities\Publisher;
use App\Entities\Author;
use App\Entities\Book;
use App\Entities\Publisher;
use App\Entities\Publisher1;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use LaravelDoctrine\ORM\Facades\EntityManager;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $em;

//    public function __construct(EntityManagerInterface $em)
//    {
//        $this->em = $em;
//    }
//
//    public function ddd()
//    {
//
//
////        $book = EntityManager::find('App\Entities\Book', 1);
////        $author = EntityManager::find('App\Entities\Author', 1);
//        $pub = EntityManager::find('App\Entities\Publisher', 7);
//
////        dd($pub->getQuery()->getSQL());
////        dd($book);
////        dd($author);
//        dd($pub);
//
//
//
//
////        $publisher = $this->em->createQueryBuilder()-> findBy(Publisher::class, 2);
////        $books = $publisher->getBooks();
//
//
////        $publisherWithBooks = $this->em->createQueryBuilder()
////            ->select('p, b')
////            ->from(Publisher::class, 'p')
////            ->leftJoin('p.books', 'b') // З'єднуємо з книгами
////            ->where('p.id = :id')
////            ->setParameter('id', 2)
////            ->getQuery()
////            ->getOneOrNullResult();
//
//
////        dd($publisherWithBooks);
//
//
////        $book = new Book;
////        $book->setTitle('title');
//
//
//
//
////        dd(__DIR__ . '/../app/Entities');
////        dd(base_path('app/Entities'));
////        $pub = new Publisher();
////        $pub->setName('name');
//
//
//
//
////        dd($ddd);
//
//
////        $ddd->setName('bhbhbhb');
//
//
//
////        dd($ddd);
//
////        $book = new Book(title: 'title111', created_at: now());
////
////        $auhtor1 = new Author(name: 'name1', created_at: now());
////        $auhtor3 = new Author(name: 'name3', created_at: now());
////        $auhtor4 = new Author(name: 'name4', created_at: now());
////
////        EntityManager::persist($auhtor1);
////        EntityManager::persist($auhtor3);
////        EntityManager::persist($auhtor4);
////
////        $book->addAuthor($auhtor1);
////        $book->addAuthor($auhtor3);
////        $book->addAuthor($auhtor4);
////
////        $pubb = new Publisher(name: 'name4', created_at: now());
////        EntityManager::persist($pubb);
////
////        $book->setPublisher($pubb);
////
////        EntityManager::persist($book);
////
////        EntityManager::flush();
//
//
//    }
}
