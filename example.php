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

$payload = [
  [
    "name" => "subject",
    "value" => "This is an example ticket"
  ],
  [
    "name" => "content",
    "value" => "Here are the details of the ticket."
  ],
  [
    "name" => "hs_pipeline",
    "value" => "0"
  ],
  [
    "name" => "hs_pipeline_stage",
    "value" => "1"
  ]
  ];

$response2 = $hubspot->tickets()->create($payload);
var_dump($response2);
?>