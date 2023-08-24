<?php
namespace Sample;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment; //ProductionEnvironment for live

ini_set('error_reporting', E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class PayPalClient
{
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }

    public static function environment()
    {
      $clientId = getenv("CLIENT_ID") ?: "AcKWT8P-lS13FI3puFICc1oXMk_NO_n-Xtau2DOuwcxLzuHkzvVG4lzBRGZ10-n0I8uyrxTQXdjnD-Hf"; //sb client ID
      $clientSecret =  getenv("CLIENT_SECRET") ?: "EBHXRj8dLmIhkBZM7fdsxH15WjgwUuZyEK7G5I1_nmdX_JAlMaCjhADwO1AjJot6asHzbbo4vsc67zMm"; //sb Secret ID
      return new SandboxEnvironment($clientId, $clientSecret); // ProductionEnvironment($clientId, $clientSecret) forlive
    }
}

?>