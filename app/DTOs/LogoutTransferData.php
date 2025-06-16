<?php
namespace App\DTOs;

use Ramsey\Uuid\Type\Decimal;

class LogoutTransferData
{
    public function __construct(
        public string $vehicle_number,
        public bool $materials_check,
        public string $cash_before, // needs to be converted to decimal
        public int $km_start,
    ) {}
}