<?php
namespace App\DTOs;

use Ramsey\Uuid\Type\Decimal;

class LoginTransferData
{
    public function __construct(
        public string $vehicle_number,
        public bool $materials_check,
        public string $cash_after, // needs to be converted to decimal
        public int $km_end,
    ) {}
}