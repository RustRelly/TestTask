<?php

namespace App\Console\Commands;

use App\ThirdTask\FileSearcher;
use Illuminate\Console\Command;

/**
 * Поиск файлов с разрешением bros в папке hawking
 *
 * Class ThirdTask
 * @package App\Console\Commands
 */
class ThirdTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'third-task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Поиск
     */
    public function handle()
    {
        $files = (new FileSearcher(base_path('hawking')))->find('bros');

        print_r($files);
    }
}
