<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;

use App\Parser\FileReader;
use App\Parser\ClientsManager;

/**
 * Утилита для загрузки информации из файлов логов в БД
 *
 * @package App\Console\Commands
 * @author   Семенов Максим
 */
class ParseFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command parse files';

    protected $fileReader;
    protected $clientsManager;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(FileReader $fileReader, ClientsManager $clientsManager)
    {
        parent::__construct();

        $this->fileReader = $fileReader;
        $this->clientsManager = $clientsManager;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $file = $this->fileReader->getFullPath('2.txt');
        $data = $this->fileReader->read($file);
        $this->clientsManager->clientManager($data);

        $file = $this->fileReader->getFullPath('1.txt');
        $data = $this->fileReader->read($file);
        $this->clientsManager->managerUrl($data);
    }
}
