<?php

namespace App\Http\Controllers;

use App\Contract\BookRepositoryInterface;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;


class BookController extends Controller
{

    public function __construct(private readonly BookRepositoryInterface $repository)
    {
    }

    public function getBooks(Request $request)
    {
        $perPage = $request->get('perPage');

        if (null === $perPage){
            $perPage = 15;
        }
        $books = $this->repository->paginateAllBooks($perPage);

        return BookResource::collection($books);

    }
}
