<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CdcDataResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'row_id' => $this->row_id,
            'jurisdiction' => $this->jurisdiction,
            'demographic' => $this->demographic,
            'overall' => $this->overall,
            'recommendation' => $this->recommendation,
            'date_range' => $this->date_range,
            'year' => $this->year,
            'frequency' => $this->frequency,
            'percentage' => $this->percentage,
            'confidence_interval' => $this->confidence_interval,
            'sample_size' => $this->sample_size,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

