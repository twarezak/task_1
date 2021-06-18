<?php declare(strict_types=1);


namespace App;


class Combine
{

    private ListNames $list;
    private TreeStructure $tree;

    public function __construct(ListNames $list, TreeStructure $tree)
    {
        $this->list = $list;
        $this->tree = $tree;
    }

    public function getJsonData(): string
    {
        return \json_encode($this->combine($this->tree->getData()));
    }

    private function combine(array $data): array
    {
        $result = [];

        foreach ($data as $leaf) {
            $leaf['children'] = $this->combine($leaf['children']);

            $name = $this->list->getNameById($leaf['id']);
            if ($name) {
                $leaf['name'] = $name;
            }
            $result[] = $leaf;
        }

        return $result;
    }

}
