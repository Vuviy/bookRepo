<?php

namespace App\Mappings;

use App\Entities\Author;
use App\Entities\Book;
use App\Entities\Publisher;
use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;

class BookMapping extends EntityMapping
{
    /**
     * Returns the fully qualified name of the class that this mapper maps.
     *
     * @return string
     */
    public function mapFor()
    {
        return Book::class;
    }

    /**
     * Load the object's metadata through the Metadata Builder object.
     *
     * @param Fluent $builder
     */
    public function map(Fluent $builder)
    {
        $builder->increments('id');
        $builder->string('title');
        $builder->manyToMany(Author::class, 'authors');
        $builder->manyToOne(Publisher::class, 'publisher')->inversedBy('books')->cascadePersist();
        $builder->dateTime('created_at');
        $builder->dateTime('updated_at');
    }
}
