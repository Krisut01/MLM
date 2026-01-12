<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// ⭐ Schedule daily farming rewards processing
Schedule::command('farming:rewards')
    ->daily()
    ->at('00:00')
    ->timezone('UTC')
    ->withoutOverlapping()
    ->onSuccess(function () {
        \Log::info('Daily farming rewards processed successfully');
    })
    ->onFailure(function () {
        \Log::error('Daily farming rewards processing failed');
    });
