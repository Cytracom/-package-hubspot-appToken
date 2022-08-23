<?php
require "vendor/autoload.php";
include 'secrets.php';

$hubspot = Fungku\HubSpot\HubSpotService::make($privateAppToken);

$response = $hubspot->contacts()->all([
    'count'     => 10,
    'property'  => ['firstname', 'lastname'],
    'vidOffset' => 123456,
]);

foreach ($response->contacts as $contact) {
    echo sprintf(
        "Contact name is %s %s." . PHP_EOL,
        $contact->properties->firstname->value,
        $contact->properties->lastname->value
    );
}

?>