<?php

namespace App\Interfaces;

use App\Models\Transfer;

interface TransferRepositoryInterface
{

    public function create(array $data);
    public function update(Transfer $transfer, array $data);
    public function findTransferByUnfinishedVehicle(int $vehicleId);
}