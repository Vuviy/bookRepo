<?php

namespace Database\Factories;

use App\Entities\Publisher;
use LaravelDoctrine\ORM\Facades\EntityManager;

class PublisherFactory
{

    public static function create(int $count): void
    {
        $i = 0;
        for ($i; $count>$i; $i++){
            $author = new Publisher(name: fake()->name(), created_at: fake()->dateTime());
            EntityManager::persist($author);
        }

        EntityManager::flush();
    }
}
