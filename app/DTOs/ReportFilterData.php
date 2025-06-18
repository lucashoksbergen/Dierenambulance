<?php

namespace App\DTOs;

use Carbon\Traits\Timestamp;
use Illuminate\Http\Request;


class ReportFilterData
{

    public function __construct( // Are all nullable so ?string
        public ?string $municipality, // Owner->municipality
        public ?string $animal_type, // Animal->type -> dog, cat, bird or other
        public ?string $other_type, // Animal, used if type is 'other'
        public ?string $report_type, // Reports->type -> taxi, stray or pet
        public ?string $city, // Reports->city hometown/city/etc.
        public ?string $date, // Reports->updated_at
        public ?string $status, // Reports->report_status
        public int $pagination = 50, 
        public array $queryParameters = [],
    ){}

    public static function fromRequest(Request $request) 
    {
        return new self(
            municipality: $request->input('municipality'),
            animal_type: $request->input('animaltype'),
            other_type: $request->input('othertype'),
            report_type: $request->input('reporttype'),
            city: $request->input('city'),
            date: $request->input('date'),
            status: $request->input('status'),
            pagination: 50,
            queryParameters: $request->all(),
        );
    }
}