<?php

declare(strict_types=1); 

// ログ出力クラス
class Logger
{
    // ログファイル名
    private $fileName;

    // コンストラクタ
    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }

    // ログを出力する
    public function write(string $data): void
    {
        file_put_contents($this->fileName, $data, FILE_APPEND);
    }

    // ログファイルを初期化する
    public function clear(): void
    {
        file_put_contents($this->fileName, '');
    }
}