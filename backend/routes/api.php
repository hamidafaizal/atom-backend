<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TelegramBotController; // <-- Tambahkan ini

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// --- ROUTE UNTUK WEBHOOK TELEGRAM ---
// Alamat ini yang akan kita berikan ke Telegram.
// Contoh: https://domain-anda.com/api/telegram/webhook
Route::post('/telegram/webhook', [TelegramBotController::class, 'handleWebhook']);
