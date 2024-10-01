<?php

namespace App\Console\Commands;

use Database\Factories\AuthorFactory;
use Illuminate\Console\Command;

class AuthorCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'authors:create {count : Count of authors}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create authors';

    public function handle()
    {
        $count = $this->argument('count');

        AuthorFactory::create($count);

        $this->info($count.' Authors was created');

        return Command::SUCCESS;
    }
}
