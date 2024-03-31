<?php

namespace App\ThirdTask;

/**
 * Поиск файлов
 *
 * Class FileSearcher
 * @package App\ThirdTask
 */
class FileSearcher
{
    /**
     * @var string - название дирректории для поиска относительно корня проекта
     */
    private string $dirPath;

    public function __construct(string $dirPath)
    {
        $this->dirPath = $dirPath;
    }

    /**
     * Поиск названий файлов
     *
     * @param string $ext - расширение файлов для поиска
     * @return array|false - массив с названиями файлов или false,
     *                       если ни одного файла не найдено
     */
    public function find(string $ext = '')
    {
        $files = scandir($this->dirPath);
        $filteredFiles = preg_grep("/^[0-9a-zA-Z]+\.$ext/", $files);
        if ($filteredFiles) {
            sort($filteredFiles, SORT_NATURAL | SORT_FLAG_CASE);
        }

        return $filteredFiles;
    }
}
