<?php

namespace Tests\Unit;

use App\DTOs\LoginTransferData;
use App\DTOs\LogoutTransferData;
use App\Interfaces\TransferRepositoryInterface;
use App\Models\Transfer;
use App\Services\TransferService;
use Mockery;
use PHPUnit\Framework\TestCase;

class TransferServiceTest extends TestCase
{

    public function test_transfer_after_logout_creates_unfinished_transfer(): void
    {
        $mockRepository = Mockery::mock(TransferRepositoryInterface::class);

        $dto = new LogoutTransferData(
            vehicle_number: 2,
            materials_check: true,
            cash_before: 120,
            km_start: 2158,
        );

        $mockTransfer = Mockery::mock(Transfer::class);

        $mockRepository->shouldReceive('create')
            ->once()
            ->with(Mockery::on(function ($data) use ($dto) {
                return $data['vehicle_id'] === $dto->vehicle_number
                    && $data['materials_check'] === $dto->materials_check
                    && $data['cash_before'] === $dto->cash_before
                    && $data['km_start'] === $dto->km_start
                    && $data['is_done'] === false;
            }))
            ->andReturn($mockTransfer);

        $service = new TransferService($mockRepository);

        $result = $service->transferOnLogout($dto);

        $this->assertEquals($mockTransfer, $result);

    }

    public function test_transfer_after_login_updates_unfinished_transfer(): void
    {
        $mockRepository = Mockery::mock(TransferRepositoryInterface::class);

        $dto = new LoginTransferData(
            vehicle_number: 2,
            materials_check: true,
            cash_after: 120,
            km_end: 2158,
        );

        $mockTransfer = Mockery::mock(Transfer::class);

        $mockRepository->shouldReceive('findTransferByUnfinishedVehicle')
            ->once()
            ->with(2)
            ->andReturn($mockTransfer);

        $mockRepository->shouldReceive('update')
            ->once()
            ->with($mockTransfer, Mockery::on(function ($data) use ($dto) {
                return $data['materials_check'] === $dto->materials_check
                    && $data['cash_after'] === $dto->cash_after
                    && $data['km_end'] === $dto->km_end
                    && $data['is_done'] === true;
            }))
            ->andReturn($mockTransfer);

        $service = new TransferService($mockRepository);

        $result = $service->transferOnLogin($dto);

        $this->assertEquals($mockTransfer, $result);

    }

}
