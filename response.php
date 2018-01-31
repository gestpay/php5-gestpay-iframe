<?php

$test_env = true;

if ($test_env) {
    $wsdl = "https://sandbox.gestpay.net/gestpay/gestpayws/WSCryptDecrypt.asmx?WSDL"; //TESTCODES
} else {
    $wsdl = "https://ecomms2s.sella.it/gestpay/gestpayws/WSCryptDecrypt.asmx?WSDL"; //PRODUCTION
}

$client = new SoapClient($wsdl);
$objectResult = null;


$shopLogin = $_GET["a"];
$CryptedString = $_GET["b"];
echo $shopLogin . '<br/>';
echo $CryptedString . '<br/>';

$params = array('shopLogin' => $shopLogin, 'CryptedString' => $CryptedString);

try {
    $objectResult = $client->Decrypt($params);

} catch(SoapFault $fault) {
    trigger_error("SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring})", E_USER_ERROR);
}

//parse the XML result
$result = simplexml_load_string($objectResult->DecryptResult->any);

$errCode = (string) $result->ErrorCode;
$errorDescription = (string) $result->ErrorDescription;

if ($errCode != "0") {
    // Display the error
    echo '<h2>Error</h2><pre>' . $errCode . '</pre>';
    echo '<h2>Description</h2><pre>' . $errorDescription . '</pre>';
} else {
    // Display the result
    echo '<h2></h2>';

    echo '<h2>Result</h2>';
    echo '<pre>';

    print_r ($result);

    echo '</pre>';
}

?>