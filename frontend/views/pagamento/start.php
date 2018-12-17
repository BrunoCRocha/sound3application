<?php

    define('SITE_URL','http://localhost/sound3application/frontend/web/index.php');

    $paypal = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'AS-mpIvVyQUAjq7YhTib-Ul5BCM2DMd1SGUjYQXpwqcwmQoBLp5Z7nhpNUh6CnGi8tjCv6XnRs2iJi80',
            'EMKc7zorWkJOhaWH_0daDNHgXW-9uFYYDXCl9L-lAUceRFuE4fIb55X327hIJQ2CybIQBSg4KMeLD8v1'
        )
    );
