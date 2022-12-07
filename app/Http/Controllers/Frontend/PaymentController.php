<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\StorePaymentRequest;
use App\Models\Excursion;
use App\Models\ExcursionSchedule;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(): View
    {
        return view('frontend.pages.payment');
    }

    public function success(): View
    {
        return view('frontend.pages.payment.success');
    }

    public function cancel(): View
    {
        return view('frontend.pages.payment.cancel');
    }

    public function error(): View
    {
        return view('frontend.pages.payment.error');
    }

    public function payment($id): View
    {
        $schedule = ExcursionSchedule::findOrFail($id);
        return view('frontend.pages.payment.index', compact('schedule'));
    }

    public function paymentStore(StorePaymentRequest $request)
    {
//        dd(asset('storage/payment/banktestcanew.crt'));
        // корневой сертификат банка
        $caFile = asset('storage/payment/banktestcanew.crt');
        // сертификат торговца
        $certFile = asset('storage/payment/2000214.crt');
        // ключ сертификата
        $keyFile = asset('storage/payment/user.key');
        // пароль ключа (если есть)
        $privateCertPass = 'qwe23yks5';
        // идентификатор мерчанта
        $mid = '2000214';
        // адрес для отправки запроса
        $serverURI = 'https://91.208.121.39:7443/Exec';


        // исходящее xml_сообщение
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<TKKPG>';
        $xml .= '<Request>';
        $xml .= '<Operation>CreateOrder</Operation>';
        $xml .= '<Language>RU</Language>';
        $xml .= '<Order>';
        $xml .= '<OrderType>Purchase</OrderType>';
        $xml .= '<Merchant>'.$mid.'</Merchant>';
        $xml .= '<Amount>15000</Amount>';
        $xml .= '<Currency>643</Currency>';
        $xml .= '<Description>Test</Description>';
        $xml .= '<ApproveURL>https://fed-cpi.ru/payment/success</ApproveURL>';
        $xml .= '<CancelURL>https://fed-cpi.ru/payment/cancel</CancelURL>';
        $xml .= '<DeclineURL>https://fed-cpi.ru/payment/error</DeclineURL>';
        $xml .= '</Order>';
        $xml .= '</Request>';
        $xml .= '</TKKPG>';

        $ch = curl_init($serverURI);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSLCERT, $certFile);
        curl_setopt($ch, CURLOPT_CAINFO, $caFile);

        curl_setopt($ch, CURLOPT_SSLKEY, $keyFile);
        curl_setopt($ch, CURLOPT_SSLCERTPASSWD, $privateCertPass);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);

        // ответ TWPG
        $xmlResponse = curl_exec($ch);

        // 0 - успешное выполнение запроса
        echo curl_errno($ch);

//        dd($request->all());
//        return view('frontend.pages.payment.index');
    }
}
