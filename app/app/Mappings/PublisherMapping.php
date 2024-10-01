<?php

namespace App\Mappings;

use App\Entities\Book;
use App\Entities\Publisher;
use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;

class PublisherMapping extends EntityMapping
{
    /**
     * Returns the fully qualified name of the class that this mapper maps.
     *
     * @return string
     */
    public function mapFor()
    {
        return Publisher::class;
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
        $builder->oneToMany(Book::class, 'books')->mappedBy('publisher');
        $builder->dateTime('created_at');
        $builder->dateTime('updated_at');
    }
}
