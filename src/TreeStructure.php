<?php declare(strict_types=1);


namespace App;


class TreeStructure extends ReadJsonDataAbstract
{
    public array $data;

    public function getData(): array
    {
        return $this->data;
    }
}
