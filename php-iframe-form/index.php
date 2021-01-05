<?php
function getFormUrl() {
    $api_url = "http://localhost:4287";
    $iframe_host_url = "http://localhost:4287";
    $api_key = "PUT_YOUR_API_KEY_HERE ";
    $context = [
        "subject" => "test-subject",
        "orientation" => "VERTICAL",
        "info" => "I1",
        "elements" => array("Market.1"),
        "associatePreferences" => true,
        "callback" => "",
        "language" => "fr",
        "validity" => "P6M",
        "formType" => "FULL",
        "receiptDeliveryType" => "DISPLAY",
        "theme" => "",
        "iframe" => true
    ];

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $api_url . "/consents/token",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($context),
        CURLOPT_HTTPHEADER => array(
            "Authorization: Basic ".base64_encode($api_key),
            "Content-Type: application/json",
        ),
    ));

    $consent_token = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    }

    return $iframe_host_url."/consents?t=".$consent_token;

}

$formUrl = getFormUrl();

?>

<html>
<head>
    <meta charset="utf-8">
    <title>Right Consents iFrame Integration Test</title>
</head>
<body>
<h2 style="text-align: center">Right Consents iFrame Integration Test</h2>
<iframe width="700" height="500" src="<?php echo $formUrl ?>"></iframe>
</body>
</html>
