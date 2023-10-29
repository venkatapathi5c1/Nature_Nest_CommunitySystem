<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
/*
 * PayPal and database configuration
 */

// PayPal configuration
define('PAYPAL_ID', 'sb-d10rh3706505@business.example.com');
define('PAYPAL_SANDBOX', true); //TRUE or FALSE

define('PAYPAL_RETURN_URL', 'http://localhost/HouseRentalManagement/success.php');
define('PAYPAL_CANCEL_URL', 'http://localhost/HouseRentalManagement/cancel.php');
define('PAYPAL_CURRENCY', 'USD');

// Change not required
define('PAYPAL_URL', (PAYPAL_SANDBOX == true) ? "https://www.sandbox.paypal.com/cgi-bin/webscr" : "https://www.paypal.com/cgi-bin/webscr");
