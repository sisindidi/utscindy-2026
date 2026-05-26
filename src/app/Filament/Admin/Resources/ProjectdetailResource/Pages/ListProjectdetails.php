<?php

namespace App\Filament\Admin\Resources\ProjectdetailResource\Pages;

use App\Filament\Admin\Resources\ProjectdetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjectdetails extends ListRecords
{
    protected static string $resource = ProjectdetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
