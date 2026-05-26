<?php

namespace App\Filament\Admin\Resources\ProjectdetailResource\Pages;

use App\Filament\Admin\Resources\ProjectdetailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectdetail extends EditRecord
{
    protected static string $resource = ProjectdetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
