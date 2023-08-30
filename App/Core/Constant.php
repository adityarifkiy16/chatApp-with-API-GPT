<?php
$relativePath = "/ChatAI/Public"; // Your relative path

// Get the server protocol (http or https)
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";

// Get the server name (localhost or domain name)
$serverName = $_SERVER['SERVER_NAME'];

// Get the server port
$serverPort = $_SERVER['SERVER_PORT'];

// Construct the absolute URL
$absoluteURL = "{$protocol}://{$serverName}";

// If the port is not the default (80 for http, 443 for https), include it in the URL
if (($protocol === "http" && $serverPort != 80) || ($protocol === "https" && $serverPort != 443)) {
    $absoluteURL .= ":{$serverPort}";
}

$absoluteURL .= $relativePath;

define("BASEURL", $absoluteURL);
