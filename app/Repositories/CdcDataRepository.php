<?php

namespace App\Repositories;

use App\Models\CdcData;
use App\Services\CdcDataParser;

class CdcDataRepository
{

    public function __construct(private CdcDataParser $cdcDataParser){}

    protected $batchSize = 1000; // Adjust batch size as needed

    public function store(array $data)
    {

        $data = $data['data'] ?? [];

        if (empty($data)) { return; }

        $generator = $this->cdcDataParser->parse($data);
        foreach ($this->cdcDataParser->chunkGenerator($generator, $this->batchSize) as $chunk) {
            CdcData::insert($chunk);
        }

    }
}
