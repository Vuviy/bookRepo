<?php

namespace App\Console\Commands;

use App\DTO\BookDTO;
use App\Handler\BookCreateHandler;
use App\Http\Requests\BookRequest;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class BookCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'book:create
    {title : Title of book}
    {publisherId :  Id of exist publisher}
    {authors* :  Id of exist authors}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create book';


    public function __construct(private readonly BookCreateHandler $handler)
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     *
     * @return array
     */
    public function handle()
    {
        $data = [
            'title' => $this->argument('title'),
            'publisher_id' => $this->argument('publisherId'),
            'authors' => $this->argument('authors'),
        ];
        $this->validate($data);

        $bookDTO = new BookDTO(title: $this->argument('title'), publisher_id: $this->argument('publisherId'), authors: $this->argument('authors'));

        $this->info(json_encode($this->handler->handle($bookDTO)));

    }


    public function validate(array $data): void
    {
        $request = new BookRequest();

        $validator = Validator::make($data, $request->rules());

        if ($validator->fails()) {
            $this->error('Validation failed!');
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return;
        }
    }
}
