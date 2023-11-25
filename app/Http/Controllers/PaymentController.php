<?php
namespace App\Http\Controllers;
use App\Helpers\CommonHelper;
use App\Models\User;
use App\Notifications\PaymentDone;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Paystack;

class PaymentController extends Controller
{

    public function index(){
        $split = [
            "type" => "percentage",
            "currency" => "KES",
            "subaccounts" => [
                [ "subaccount" => "ACCT_li4p6kte2dolodo", "share" => 10 ],
            ],
            "bearer_type" => "all",
            "main_account_share" => 70
        ];
        return view('pay',compact('split'));
    }
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function redirectToGateway( Request $request)
    {
         User::where('id',session('user')->id)->update([
               'payment' => 1,
            ]);
            $t = User::where('id',session('user')->id)->first();
             return redirect()->route('application');

        $paystack = new Paystack();
        $request->email = session('user')->email;
        $request->orderID = session('user')->id;
        $request->amount = "1050000";
        $request->quantity = "1";
        $request->currency = "NGN";
        $request->metadata = json_encode($array = ['first_name' => session('user')->first_name,'last_name' => session('user')->last_name,'phone' => session('user')->phone]);
        return $paystack->getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paystack = new Paystack();
        $paymentDetails =$paystack->getPaymentData();

        if ($paymentDetails['status']){
              User::where('id',session('user')->id)->update([
               'payment' => 1,
            ]);
            $t = User::where('id',session('user')->id)->first();
            CommonHelper::SendSms($t->phone,"Congratulations!!, Your Payment has been Successfully Received, Reference: ".$paymentDetails['data']['reference']);

            $t->notify(new PaymentDone($paymentDetails['data']));

        }
        session([
            'user' => $t
        ]);
        return redirect()->route('application');
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
