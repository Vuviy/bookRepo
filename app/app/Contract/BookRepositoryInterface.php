<?php

namespace App\Contract;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface BookRepositoryInterface
{
    public function paginateAllBooks(int $perPage = 15):  LengthAwarePaginator;
}
