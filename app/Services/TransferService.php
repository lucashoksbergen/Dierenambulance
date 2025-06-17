<?php

namespace App\Services;

use App\DTOs\LoginTransferData;
use App\DTOs\LogoutTransferData;
use App\Repositories\TransferRepository;

class TransferService
{

    public function __construct(protected TransferRepository $transferRepository)
    {
    }


    public function transferOnLogout(LogoutTransferData $dto)
    {
        return $this->transferRepository->create([
            'vehicle_id' => $dto->vehicle_number,
            'materials_check' => $dto->materials_check,
            'cash_before' => $dto->cash_before,
            'km_start' => $dto->km_start,
            'is_done' => false
        ]);
    }

    public function transferOnLogin(LoginTransferData $dto)
    {

        $unfinishedTransfer = $this->transferRepository->findTransferByUnfinishedVehicle($dto->vehicle_number);

        // Found unfinished entry in Transfer table with matching vehicle number, so updates this entry
        if ($unfinishedTransfer) {
            return $this->transferRepository->update($unfinishedTransfer, [
                'materials_check' => $dto->materials_check,
                'cash_after' => $dto->cash_after,
                'km_end' => $dto->km_end,
                'is_done' => true
            ]);
        }

        // Did not find it, so creates a new entry instead with all fields filled
        return $this->transferRepository->create([
            'vehicle_id' => $dto->vehicle_number,
            'materials_check' => $dto->materials_check,
            'cash_before' => $dto->cash_after,
            'cash_after' => $dto->cash_after,
            'km_start' => $dto->km_end,
            'km_end' => $dto->km_end,
            'is_done' => true
        ]);
    }


}