<?php

namespace App\Http\Controllers;

use App\Models\QrCode;
use Illuminate\Http\Request;

class QrcodeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($qrcode)
    {
        $qr = QrCode::with(
            'unit',
            'requesition',
            'requesition.requested',
        )->where('qr_code', $qrcode)->first();
        dd($qr);
        return view('item-information', compact('qr'));
    }
}
