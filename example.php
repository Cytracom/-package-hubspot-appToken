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

$ticketPayload = [
  [
    "name" => "subject",
    "value" => "This is an example."
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

$createdTicket = $hubspot->tickets()->create($payload)->getData();
// Associate the ticket to company & customer
var_dump($createdTicket->objectId);

$crmPayload = [
  [
    "fromObjectId" => 'xxxxxxx',
    "toObjectId" => $createdTicket->objectId,
    "category" => "HUBSPOT_DEFINED",
    "definitionId" => 15 // contact to ticket
  ],
  [
    "fromObjectId" => 'xxxxxxx',
    "toObjectId" => $createdTicket->objectId,
    "category" => "HUBSPOT_DEFINED",
    "definitionId" => 25 // company to ticket
  ]
  ];

$crmBinding = $hubspot->crmassociations()->createBatch($crmPayload);
