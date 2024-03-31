<?php

namespace App\FirstTask;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Class Hawking
 * @package App\FirstTask
 */
final class Hawking
{
    public function __construct()
    {
        $this->bros();
        $this->brothers();
    }

    /**
     * Создание тестовой таблицы в базе
     *
     * @return void
     */
    private function bros(): void
    {
        if (!Schema::hasTable('test')) {
            Schema::create(
                'test',
                function (Blueprint $table) {
                    $table->id();
                    $table->string('script_name', 25);
                    $table->integer('start_time');
                    $table->integer('end_time');
                    $table->enum('result', ['normal', 'illegal', 'failed', 'success']);

                    $table->index('result', 'test_result_idx');
                }
            );
        }
    }

    /**
     * Заполнение тестовой таблицы случайными данными
     *
     * @return void
     */
    private function brothers(): void
    {
        $insertArr = [];
        foreach (range(1, 20) as $number) {
            $insertArr[] = [
                'script_name' => "script_$number",
                'start_time' => $number,
                'end_time' => $number + 1,
                'result' => rand(1, 4),
            ];
        }
        DB::table('test')->insert($insertArr);
    }

    /**
     * Данные test
     *
     * @return Collection
     * Пример одного элемента данных:
     * [
     *   'id' => 1, - int, идентификатор test-записи
     *   'script_name' => 'script_1', - string, название скрипта
     *   'start_time' => 0, - int, начало выполнения скрипта
     *   'end_time' => 1, - int, окончание выполнения скрипта
     *   'result' => 'normal', - normal|success, результат
     * ]
     */
    public function production()
    {
        return DB::table('test')
            ->select('*')
            ->where('result', 'normal')
            ->orWhere('result', 'success')
            ->get();
    }
}
