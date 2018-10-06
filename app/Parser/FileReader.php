<?php
/**
 * Created by PhpStorm.
 * User: macms
 * Date: 27.08.2018
 * Time: 13:23
 */

namespace App\Parser;

class FileReader
{
    const IP_FILES_PATH = 'data/';

    public function getFullPath($file)
    {
        return public_path(self::IP_FILES_PATH . $file);
    }

    /**
     * Метод читает фаил и возвращает массив строк
     *
     * @param string $file Фаил
     *
     * @return array
     */
    public function read($file)
    {
        $fileHandler = fopen($file, 'rt');
        $data = [];
        while ($row = fgetcsv($fileHandler, null, '|')) {
            $data[] = $row;
        }
        fclose($fileHandler);

        return $data;
    }
}