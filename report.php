<?php
// Sample data for the report (replace this with your actual data)
$userInteractions = 100;
$propertyViews = 500;
$contactInquiries = 20;

// Create a new XML document
$xml = new DOMDocument('1.0', 'UTF-8');

// Create root element
$report = $xml->createElement('report');
$xml->appendChild($report);

// Create child elements for user interactions, property views, and contact inquiries
$userInteractionsElement = $xml->createElement('userInteractions', $userInteractions);
$report->appendChild($userInteractionsElement);

$propertyViewsElement = $xml->createElement('propertyViews', $propertyViews);
$report->appendChild($propertyViewsElement);

$contactInquiriesElement = $xml->createElement('contactInquiries', $contactInquiries);
$report->appendChild($contactInquiriesElement);

// Output XML
$xmlString = $xml->saveXML();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XML Report</title>
</head>
<body>
    <h1>XML Report</h1>
    <pre><?php echo htmlspecialchars($xmlString); ?></pre>
</body>
</html>
