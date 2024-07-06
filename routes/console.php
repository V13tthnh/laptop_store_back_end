<?php

use App\Models\Category;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

//Xóa vĩnh viễn mục xóa mềm không cần thiết trong $expires ngày
Schedule::call(function () {
    Category::whereNotNull('deleted_at')
        ->where('deleted_at', '<=', now()->subDays(Category::$expires))
        ->forceDelete();
})->daily();

// Schedule::command('forceDeleteCategoryAfterOneMonth')->daily();
