<?php declare(strict_types=1);

use App\Combine;
use App\ListNames;
use App\TreeStructure;
use PHPUnit\Framework\TestCase;

class CombineTest extends TestCase
{
    private string $listFileName = __DIR__ . '/files/list.json';
    private string $treeFileName = __DIR__ . '/files/tree.json';
    private string $expectFileName = __DIR__ . '/files/expect.json';

    public function testGetNamesById(): void
    {
        $names = new ListNames($this->listFileName);
        $names->prepareNames();
        $tree = new TreeStructure($this->treeFileName);

        $combine = new Combine($names, $tree);

        $expectJson = \json_decode(\file_get_contents($this->expectFileName), true);
        $json = \json_decode($combine->getJsonData(), true);

        $this->assertEquals($expectJson, $json);
    }
}
