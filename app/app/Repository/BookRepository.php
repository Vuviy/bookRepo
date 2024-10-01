<?php

namespace App\Repository;

use App\Contract\BookRepositoryInterface;
use Doctrine\ORM\EntityRepository;
use LaravelDoctrine\ORM\Pagination\PaginatesFromParams;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


class BookRepository extends EntityRepository implements BookRepositoryInterface
{
    use PaginatesFromParams;

    public function paginateAllBooks(int $perPage = 15): LengthAwarePaginator
    {
        $builder = $this->createQueryBuilder('b')
            ->select('b', 'a')
            ->leftJoin('b.authors', 'a');

        return $this->paginate($builder->getQuery(), $perPage);
    }
}
