<?php

declare(strict_types=1);

class PdoCondition
{
    private $name;
    private $value;
    private $type;

    public function __construct(string $name, $value, $type = PDO::PARAM_STR)
    {
        $this->name = $name;
        $this->value = $value;
        $this->type = $type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getType()
    {
        return $this->type;
    }
}
