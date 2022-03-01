<?php

declare(strict_types=1);

require_once dirname(__FILE__) . '/PdoConditions.php';
require_once dirname(__FILE__) . '/PdoCondition.php';

class PdoExecutor
{
    private $pdo;
    private $debugSql;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function execute(string $sql, PdoConditions $conditions, bool $isSkipExecute = false): PDOStatement
    {
        $this->debugSql = $sql = $this->replaceSql($sql, $conditions);
        $statement = $this->pdo->prepare($sql);
        $placeHolders = [];
        foreach ($conditions->getAll() as $condition) {
            $conditionValue = $condition->getValue();
            if (is_array($conditionValue)) {
                for ($i = 0; $i < count($conditionValue); $i++) {
                    $placeHolderName = $this->generateSequentialPlaceHolder($condition->getName(), $i);
                    $placeHolders[$placeHolderName] = [$conditionValue[$i], $condition->getType()];
                }
            } else {
                $placeHolders[$condition->getName()] = [$condition->getValue(), $condition->getType()];
            }
        }
        foreach ($placeHolders as $name => $values) {
            list($value, $type) = $values;
            if ($this->hasPlaceHolder($sql, $name)) {
                $statement->bindValue($name, $value, $type);
                if ($type === PDO::PARAM_STR) {
                    $this->debugSql = str_replace($name, "'" . $value . "'", $this->debugSql);
                } else {
                    $this->debugSql = str_replace($name, $value, $this->debugSql);
                }
            }
        }
        if ($isSkipExecute) {
            return $statement;
        }
        $statement->execute();
        return $statement;
    }

    public function getDebugSql()
    {
        return $this->debugSql;
    }

    protected function replaceSql(string $sql, PdoConditions $conditions): string
    {
        foreach ($conditions->getAll() as $condition) {
            $conditionValue = $condition->getValue();
            if (is_array($conditionValue)) {
                $placeHolders = [];
                for ($i = 0; $i < count($conditionValue); $i++) {
                    $placeHolders[] = $this->generateSequentialPlaceHolder($condition->getName(), $i);
                }
                $sql = str_replace($condition->getName(), implode(',', $placeHolders), $sql);
            }
        }
        return $sql;
    }

    private function generateSequentialPlaceHolder(string $placeHolderName, int $number): string
    {
        return $placeHolderName . '_' . str_pad(strval($number), 4, '0', STR_PAD_LEFT);
    }

    private function hasPlaceHolder($sql, $placeHolderName): bool
    {
        return strpos($sql, $placeHolderName) !== false;
    }
}
