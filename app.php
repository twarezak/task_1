<?php
declare(strict_types=1);

use App\Combine;
use App\ListNames;
use App\TreeStructure;

require __DIR__ .'/vendor/autoload.php';

$treeFileName = 'tree.json';
$listFileName = 'list.json';

$list = new ListNames($listFileName);
$list->prepareNames();

$tree = new TreeStructure($treeFileName);

$combine = new Combine($list, $tree);

echo $combine->getJsonData();

echo "\n";
