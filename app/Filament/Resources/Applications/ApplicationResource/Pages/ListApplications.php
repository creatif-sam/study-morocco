<?php

namespace App\Filament\Resources\Applications\ApplicationResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Applications\ApplicationResource;

class ListApplications extends ListRecords
{
    protected static string $resource = ApplicationResource::class;
}
