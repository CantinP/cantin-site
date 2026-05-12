<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function kofi(Request $request)
    {
        $data = json_decode($request->input('data'), true);

        if (!$data) {
            return response('Invalid payload', 400);
        }

        Donation::create([
            'platform' => 'kofi',
            'username' => $data['from_name'] ?? 'Anonyme',
            'amount'   => $data['amount'] ?? null,
            'currency' => $data['currency'] ?? 'EUR',
            'message'  => $data['message'] ?? null,
        ]);

        return response('OK', 200);
    }

    public function tipeee(Request $request)
    {
        $data = $request->all();

        Donation::create([
            'platform' => 'tipeee',
            'username' => $data['parameters']['username'] ?? 'Anonyme',
            'amount'   => $data['parameters']['amount'] ?? null,
            'currency' => 'EUR',
            'message'  => $data['parameters']['message'] ?? null,
        ]);

        return response('OK', 200);
    }
}
