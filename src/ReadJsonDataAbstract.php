<?php declare(strict_types=1);


namespace App;


use App\Exceptions\FileParseException;
use TypeError;

class ReadJsonDataAbstract
{
    protected array $data;

    public function __construct(string $fileName)
    {
        try {
            $this->data = \json_decode(\file_get_contents($fileName), true);
        } catch (TypeError $e) {
            throw new FileParseException('Cannot parse file ' . $fileName);
        }
    }
}
