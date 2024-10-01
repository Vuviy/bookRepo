<?php

namespace App\Console\Commands;

use Database\Factories\PublisherFactory;
use Illuminate\Console\Command;

class PublisherCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'publishers:create {count : Count of publishers}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create publishers';


    public function handle()
    {
        $count = $this->argument('count');

        PublisherFactory::create($count);

        $this->info($count.' Publishers was created');

        return Command::SUCCESS;
    }

}
