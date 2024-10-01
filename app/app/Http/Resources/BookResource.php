<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{

    /**
     * The "data" wrapper that should be applied.
     *
     * @var string|null
     */
    public static $wrap = 'books';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $authors = [];

        foreach ($this->getAuthors() as $author){
            $authors[] = ['id' => $author->getId(), 'name' => $author->getName()];
        }

        return [
            'id' => $this->getId(),
            'title' => $this->title,
            'publisher' => $this->getPublisher() ?
                 [
                    'id' => $this->getPublisher()->getId(),
                    'name' => $this->getPublisher()->getName()
                ] : null,
            'authors' => $authors,

            'created_at' => $this->created_at ? $this->created_at->format('Y-m-d H:m:s') : null,
            'updated_at' => $this->getUpdatedAt() ? $this->getUpdatedAt()->format('Y-m-d H:m:s') : null,
        ];    }
}
