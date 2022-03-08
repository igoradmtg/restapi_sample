<?php
// router
function route($method, $urlData, $formData) {
    // Getting all information about a user
    // GET /users/{userId}
    if ($method === 'GET' && count($urlData) === 1) {
        // Get client id
        $userId = $urlData[0];
        // Retrieving all user data from the database...
        // Sending a response to the client
        echo json_encode(array(
            'method' => 'GET',
            'id' => $userId,
            'info' => array(
                'email' => 'admtg@bk.ru',
                'name' => 'Admtg',
                'url' => 'https://github.com/igoradmtg'
            ),
            'orders' => array(
                array(
                    'orderId' => 500,
                    'summa' => 20,
                    'orderDate' => '01.01.2041'
                ),
                array(
                    'orderId' => 501,
                    'summa' => 25,
                    'orderDate' => '01.01.2041'
                )
            )
        ));
        return;
    }
    // Getting general information about a user
    // GET /users/{userId}/info
    if ($method === 'GET' && count($urlData) === 2 && $urlData[1] === 'info')  {
        // Get client id
        $userId = $urlData[0];
        // Pulling general user data from the database ...
        // Sending a response to the client
        echo json_encode(array(
            'method' => 'GET',
            'id' => $userId,
            'info' => array(
                'email' => 'admtg@bk.ru',
                'name' => 'Admtg',
                'url' => 'https://github.com/igoradmtg'
            )
        ));
        return;
    }
    // Receiving user orders
    // GET /users/{userId}/orders
    if ($method === 'GET' && count($urlData) === 2 && $urlData[1] === 'orders')  {
        // Get client id
        $userId = $urlData[0];
        // Extracting data about user orders from the database...
        // Sending a response to the client
        echo json_encode(array(
            'method' => 'GET',
            'id' => $userId,
            'orders' => array(
                array(
                    'orderId' => 501,
                    'summa' => 20,
                    'orderDate' => '01.01.2041'
                ),
                array(
                    'orderId' => 502,
                    'summa' => 50,
                    'orderDate' => '01.01.2041'
                )
            )
        ));
        return;
    }
    // Displaying an error
    header('HTTP/1.0 400 Bad Request');
    echo json_encode(array(
        'error' => 'Bad Request'
    ));
}
