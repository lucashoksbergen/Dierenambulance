<?php
namespace App\DTOs;

use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Decimal;

class LogoutTransferData
{
    public function __construct(
        public string $vehicle_number,
        public bool $materials_check,
        public string $cash_before, // needs to be converted to decimal
        public int $km_start,
    ) {}

    public static function fromRequest(Request $request)
    {
        return new self(
            vehicle_number: $request->input('vehicle_number'),
            materials_check: $request->input('materials_check'),
            cash_before: $request->input('cash_before'),
            km_start: $request->input('km_start'),
        );    
    }
}