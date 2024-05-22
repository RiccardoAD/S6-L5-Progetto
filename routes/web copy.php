<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\PagesController;
use Database\Seeders\ActivitySeeder;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, "welcome"] )->name("welcome");
// Route::get('/activity', [ActivityController::class, "elenco"] )->name("activity.elenco");
// Route::get('/activity/add', [ActivityController::class, "create"] )->name("activity.create");
// Route::get('/activity/{id}', [ActivitySeeder::class, "show"] )->name("activity.show");
// Route::get('/activity/{id}/edit', [ActivityController::class, "edit"] )->name("activity.edit");
// Route::get('/activity/{id}/delite', [ActivityController::class, "destroy"] )->name("activity.destroy");

Route::resource("activities", ActivityController::class);