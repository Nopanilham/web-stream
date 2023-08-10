<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Package;
use App\Models\UserPremium;
use Illuminate\Support\Carbon;

class WebhookController extends Controller
{
    public function handler(Request $request)
    {
        \Midtrans\Config::$isProduction = (bool) env('MIDTRANS_IS_PRODUCTION');
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        $notif = new \Midtrans\Notification();

        $transactionStatus = $notif->transaction_status;
        $transactionCode = $notif->order_id;
        $fraudStatus = $notif->fraud_status;

        $status = '';

        if ($transactionStatus == 'capture'){
            if ($fraudStatus == 'challenge'){

                $status = 'challenge';

            } else if ($fraudStatus == 'accept'){
                $status = 'success';
            }

        } else if ($transactionStatus == 'settlement'){
            $status = 'success';
                
        } else if ($transactionStatus == 'cancel' ||
            $transactionStatus == 'deny' ||
            $transactionStatus == 'expire'){
            $status = 'failure';

        } else if ($transactionStatus == 'pending'){
            $status = 'pending';  
        }

        $transaction = Transaction::with('package')
            ->where('transaction_code', $transactionCode)
            ->first();

        if ($status === 'success') {

            $UserPremium = UserPremium::where('user_id', $transaction->user_id)->first();

            if($UserPremium) {
                //Subscription yang telah diperbarui atau extends
                $endOfSubscription = $UserPremium->end_of_subscription;
                $date = Carbon::createFromFormat('Y-m-d', $endOfSubscription);
                $newEndOfSubscription = $date->addDays($transaction->package->max_days)->format('Y-m-d');

                $UserPremium->update([
                    'package_id' => $transaction->package_id,
                    'end_of_subscription' => $newEndOfSubscription
                ]);
            } else {
                //subscription untuk yang pertama kali
                UserPremium::create([
                    'package_id' => $transaction->package->id,
                    'user_id' => $transaction->user_id,
                    'end_of_subscription' => now()->addDays($transaction->package->max_days)
                ]);
            }
        }

        $transaction->update(['status' => $status]);
    }
}
