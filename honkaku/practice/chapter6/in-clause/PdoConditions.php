<?php

declare(strict_types=1);

require_once dirname(__FILE__) . '/PdoCondition.php';

class PdoConditions
{
    private $conditions;

    public function __construct()
    {
        $this->conditions = [];
    }

    public function add(PdoCondition $condition): void
    {
        $this->conditions[$condition->getName()] = $condition;
    }

    public function hasName(string $name): bool
    {
        return isset($this->conditions[$name]);
    }

    public function getAll(): array
    {
        return $this->conditions;
    }
}
