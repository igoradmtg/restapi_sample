<?php
// Getting data from the request body
function getFormData($method) {
    // GET or POST: return data as is
    if ($method === 'GET') return $_GET;
    if ($method === 'POST') return $_POST;
    // PUT, PATCH or DELETE
    $data = array();
    $exploded = explode('&', file_get_contents('php://input'));

    foreach($exploded as $pair) {
        $item = explode('=', $pair);
        if (count($item) == 2) {
            $data[urldecode($item[0])] = urldecode($item[1]);
        }
    }

    return $data;
}

// Defining the request method
$method = $_SERVER['REQUEST_METHOD'];

// Getting data from the request body
$formData = getFormData($method);


// We understand the url
$url = (isset($_GET['q'])) ? $_GET['q'] : '';
$url = rtrim($url, '/');
$urls = explode('/', $url);

// Define router and url data
$router = $urls[0];
$urlData = array_slice($urls, 1);

// We connect the file router and run the main function
include_once 'routers/' . $router . '.php';
route($method, $urlData, $formData);
