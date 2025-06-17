<?php
namespace App\DTOs;

use Illuminate\Http\Request;


class LoginTransferData
{
    public function __construct(
        public string $vehicle_number,
        public bool $materials_check,
        public string $cash_after, // needs to be converted to decimal
        public int $km_end,
    ) {}

    public static function fromRequest(Request $request)
    {
        return new self(
            vehicle_number: $request->input('vehicle_number'),
            materials_check: $request->input('materials_check'),
            cash_after: $request->input('cash_after'),
            km_end: $request->input('km_end'),
        );    
    }
}