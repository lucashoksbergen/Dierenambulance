<?php

namespace App\Repositories;

use App\Models\Transfer;

class TransferRepository
{
    public function findTransferByUnfinishedVehicle(int $vehicleId)
    {
        return Transfer::where('vehicle_id', $vehicleId)
            ->where('is_done', false)
            ->first();
    }

    public function create(array $data)
    {
        return Transfer::create($data);
    }

    public function update(Transfer $transfer, array $data)
    {
        $transfer->update($data);
        return $transfer;
    }

}