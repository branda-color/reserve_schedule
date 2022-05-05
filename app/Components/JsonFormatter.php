<?php
namespace App\Components;

// 繼承 Monolog 的 JsonFormatter 來達到我們的需求
use Monolog\Formatter\JsonFormatter as BaseJsonFormatter;

class JsonFormatter extends  BaseJsonFormatter
{
    public function format(array $record):string
    {
        // 加入我們需要的資料
        $newRecord = [
            'time' => $record['datetime']->format('Y-m-d H:i:s'),
            // message 就是我們原本的 log
            // 注意：這邊的 log 已經被轉換成字串了，並不會是 array，因此建議直接以 JSON 傳遞資料
            'result' => json_decode($record['message'], true),
        ];

        // Contextual Information
        if (!empty($record['context'])) {
            $newRecord = array_merge($newRecord, $record['context']);
        }
        // 轉換成 JSON 並換行
        $json = $this->toJson($newRecord) . ($this->appendNewline ? "\n" : '');

        return $json;

    }
}