<?php
function getFormUrl() {
    $api_url = "http://localhost:4287";
    $api_key = "k68c5591770554f85b1d70cf273f16d98:S#zpDXa#emwyQ%1UQ%LE-w&S";
    $context = [
        "subject" => "PaulBismuth",
        "orientation" => "VERTICAL",
        "info" => "I1",
        "elements" => array("Market.1","Channel.1","Frequency.1","Core.1"),
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

    return $api_url."/consents?t=".$consent_token;

}

$formUrl = getFormUrl();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Right Consents iFrame Integration Test</title>
</head>
<body>
  <h2 style="text-align: center">Right Consents iFrame Integration Test</h2>
  <iframe width="700" height="500" src="<?php echo $formUrl ?>"></iframe>
</body>
</html>

