<?php declare(strict_types=1);


use App\ListNames;
use PHPUnit\Framework\TestCase;

class ListNamesTest extends TestCase
{
    private string $listFileName = __DIR__ . '/files/list.json';

    public function testGetNamesById(): void
    {
        $names = new ListNames($this->listFileName);
        $names->prepareNames();

        $this->assertEquals('Kobiety', $names->getNameById(1));
        $this->assertNull($names->getNameById(100));
    }
}
