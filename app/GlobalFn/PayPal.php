<?php

use App\Models\Applicant;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;

function payPalClient()
{
    if (env('APP_ENV') === 'production') {
        logger("Production");
        return new PayPalHttpClient(
            new ProductionEnvironment(
                env("PAYPAL_CLIENT"),
                env("PAYPAL_SECRET")
            )
        );
    }
    return new PayPalHttpClient(
        new SandboxEnvironment(
            env("PAYPAL_CLIENT"),
            env("PAYPAL_SECRET")
        )
    );
}

function getAmount($oder_id)
{
    $client = payPalClient();
    $response = null;
    try {
        $response = $client->execute(new OrdersGetRequest($oder_id));
        $res = (object)$response->result;

        $amount = $res->purchase_units[0]->amount->value;
        return $amount;
    } catch (\Throwable $th) {
        logger("failed_to_get_donation_amount", [$th->getMessage()]);
        return null;
    }
}
function buildRequestBody($applicant)
{
    return array(
        'intent' => 'CAPTURE',
        'application_context' =>
        array(
            'return_url' => route("applicant.complete", $applicant),
            'brand_name' => env("APP_NAME"),
            'cancel_url' => 'https://ukzchema.co.uk'
        ),
        'purchase_units' =>
        array(
            0 =>
            array(
                'description' => 'Joining Fee',
                'custom_id' => $applicant->id,
                'amount' =>
                array(
                    'currency_code' => 'GBP',
                    'value' => setting('member.join_fee', '13')
                )
            )
        )
    );
}

function requestPayment(Applicant $applicant)
{
    $request = new OrdersCreateRequest();
    $request->prefer('return=representation');
    $request->body = buildRequestBody($applicant);
    $client = payPalClient();
    try {
        $response = $client->execute($request);
        return $response;
    } catch (\Throwable $th) {
        logger($th->getMessage(), [$th->statusCode]);
        abort(403, "Oops! Error. Contact Support");
    }
}

function captureOrder($order_id)
{
    $request = new OrdersCaptureRequest($order_id);
    $request->prefer('return=representation');
    $client = payPalClient();
    try {
        $response = $client->execute($request);
        return $response;
    } catch (\Throwable $th) {
        $msg = $th->getMessage();
        logger($msg);
        $not_approved = strpos($msg, "ORDER_NOT_APPROVED");
        $already_captured = strpos($msg, "ORDER_ALREADY_CAPTURED");
        if ($already_captured) return (object) ["statusCode" => 422, "result" => []];
        if ($not_approved) {
            abort(403, "Oops! Error (CODE-22). Contact support@ukzchema.co.uk");
        }
        abort(403, "Oops! Error. Contact Support");
    }
}
