<?php

namespace App\Console\Commands;

use App\models\Tag;
use Illuminate\Console\Command;

class CreateTag extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:tag {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new tag';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
        Tag::create(['name'=>$name]);
        $this->info("Tag $name created successfully");
    }
}
