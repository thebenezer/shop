<?php

namespace Sample;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

ini_set('error_reporting', E_ALL); // or error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class PayPalClient
{
    /**
     * Returns PayPal HTTP client instance with environment that has access
     * credentials context. Use this instance to invoke PayPal APIs, provided the
     * credentials have access.
     */
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }

    /**
     * Set up and return PayPal PHP SDK environment with PayPal access credentials.
     * This sample uses SandboxEnvironment. In production, use LiveEnvironment.
     */
    public static function environment()
    {
        $clientId = getenv("CLIENT_ID") ?: "AdUfs155hbsqLcVXWFpohb2fRt2-noovFWlkv0ch5xLs4c-pKDz_3SZYppQrJn4oQeBAtZrelsuKn654";//PAYPAL-SANDBOX-CLIENT-ID
        $clientSecret = getenv("CLIENT_SECRET") ?: "EDkcQEbUa4yv5P_Nut5bQCsat1Hk9RypJF6q2N_aLH1kUd4w0kF2Tcf0tmbS60c0y082xoMqDMPYrt5J";//PAYPAL-SANDBOX-CLIENT-SECRET
        return new SandboxEnvironment($clientId, $clientSecret);
    }
}
