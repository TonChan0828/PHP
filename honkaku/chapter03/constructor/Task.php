<?php

declare(strict_types=1); 

class Task
{
    // タスク名
    public $name;

    // 優先度
    public $priority;

    // 進行度
    public $progress;

    // コンストラクタ
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->priority = 1; // 優先度「中」を初期値とする
        $this->progress = 0; // 進行度ははじめはゼロ
    }
}
