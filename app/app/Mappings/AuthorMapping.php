<?php

namespace App\Mappings;

use App\Entities\Author;
use App\Entities\Book;
use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;

class AuthorMapping extends EntityMapping
{
    /**
     * Returns the fully qualified name of the class that this mapper maps.
     *
     * @return string
     */
    public function mapFor()
    {
        return Author::class;
    }

    /**
     * Load the object's metadata through the Metadata Builder object.
     *
     * @param Fluent $builder
     */
    public function map(Fluent $builder)
    {
        $builder->increments('id');
        $builder->string('name');
        $builder->manyToMany(Book::class, 'books');
        $builder->dateTime('created_at');
        $builder->dateTime('updated_at');
    }
}
