<?php

namespace App\Services;

namespace App\Services;

class CdcDataParser
{
    public function parse(array $data): \Generator
    {

        foreach ($data as $row) {
            yield $this->transformRow($row);
        }
    }

    protected function transformRow(array $row): array
    {
        return [
            'row_id' => $row[0] ?? null,
            'jurisdiction' => $row[8] ?? null,
            'demographic' => $row[9] ?? null,
            'overall' => $row[10] ?? null,
            'recommendation' => $row[11] ?? null,
            'date_range' => $row[13] ?? null,
            'year' => $row[14] ?? null,
            'frequency' => $row[15] ?? null,
            'percentage' => $row[16] ?? null,
            'confidence_interval' => $row[17] ?? null,
            'sample_size' => $row[18] ?? 0,
        ];
    }

    public function chunkGenerator(\Generator $generator, $batchSize)
    {
        $batch = [];
        foreach ($generator as $item) {
            $batch[] = $item;
            if (count($batch) >= $batchSize) {
                yield $batch;
                $batch = [];
            }
        }
        // Yield the last batch
        if (!empty($batch)) {
            yield $batch;
        }
    }
}

