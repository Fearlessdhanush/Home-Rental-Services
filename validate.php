<?php

$xmlFile = 'ex.xml';

libxml_use_internal_errors(true); // Suppress libxml errors and allow fetching them manually

$dom = new DOMDocument;
$dom->load($xmlFile);

if ($dom->validate()) {
    echo "The XML document is valid!";
} else {
    echo "The XML document is not valid!";
    $errors = libxml_get_errors(); // Fetch all errors
    foreach ($errors as $error) {
        echo "\n", display_xml_error($error, $xmlFile);
    }
    libxml_clear_errors(); // Clear all errors after processing
}

function display_xml_error($error, $xml)
{
    $return = $xml . " - Line: " . $error->line . " - Message: ";
    switch ($error->level) {
        case LIBXML_ERR_WARNING:
            $return .= "Warning $error->code: ";
            break;
        case LIBXML_ERR_ERROR:
            $return .= "Error $error->code: ";
            break;
        case LIBXML_ERR_FATAL:
            $return .= "Fatal Error $error->code: ";
            break;
    }
    $return .= trim($error->message) . "\n";
    return $return;
}
?>
