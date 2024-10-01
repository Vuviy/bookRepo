<?php

namespace App\Http\Controllers\Api;

use App\DTO\BookDTO;
use App\Handler\BookCreateHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{

    public function __construct(private readonly BookCreateHandler $handler)
    {
    }

    public function create(BookRequest $request): JsonResponse
    {
        $data = new BookDTO(title: $request->title, publisher_id: $request->publisher_id, authors: $request->authors);

        return response()->json($this->handler->handle($data));
    }
}
