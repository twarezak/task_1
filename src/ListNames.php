<?php declare(strict_types=1);


namespace App;

class ListNames extends ReadJsonDataAbstract
{
    private array $names;

    public function prepareNames()
    {
        $names = \array_column($this->data, 'translations', 'category_id');

        \array_walk($names, function (&$item) {
            $item = $item['pl_PL']['name'];
        });

        $this->names = $names;
    }

    public function getNameById(int $id): ?string
    {
        return $this->names[$id] ?? null;
    }

}
