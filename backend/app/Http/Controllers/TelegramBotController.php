<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception; // <-- Tambahkan ini

class TelegramBotController extends Controller
{
    /**
     * Menangani pembaruan (update) yang masuk dari webhook Telegram.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function handleWebhook(Request $request)
    {
        try {
            // Log bahwa handler dimulai
            Log::info('Webhook handler started.');

            // Mengambil semua data yang dikirim oleh Telegram
            $update = $request->all();

            // Mencatat seluruh data update ke dalam file log Laravel
            Log::info('Webhook update received: ' . json_encode($update, JSON_PRETTY_PRINT));

            // Log bahwa handler selesai dengan sukses
            Log::info('Webhook handler finished successfully.');

            // Memberitahu Telegram bahwa kita sudah menerima datanya.
            return response()->json(['status' => 'ok']);

        } catch (Exception $e) {
            // Jika terjadi error di dalam blok try, catat error tersebut
            Log::error('Error in webhook handler: ' . $e->getMessage());
            
            // Memberitahu Telegram (atau kita) bahwa ada masalah di server
            return response()->json(['status' => 'error', 'message' => 'Internal Server Error'], 500);
        }
    }
}
