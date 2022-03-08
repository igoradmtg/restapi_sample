<?php
// router
function route($method, $urlData, $formData) {
    // Getting information about a product
    // GET /goods/{goodId}
    if ($method === 'GET' && count($urlData) === 1) {
        // Получаем id товара
        $goodId = $urlData[0];
        // Retrieving items from database...
        // Sending a response to the client
        echo json_encode(array(
            'method' => 'GET',
            'id' => $goodId,
            'good' => 'Huawei',
            'price' => 10
        ));

        return;
    }
    // Adding a new product
    // POST /goods
    if ($method === 'POST' && empty($urlData)) {
        // Adding item to database...
        // Sending a response to the client
        echo json_encode(array(
            'method' => 'POST',
            'id' => rand(1, 100),
            'formData' => $formData
        ));
        return;
    }
    // Update all item data
    // PUT /goods/{goodId}
    if ($method === 'PUT' && count($urlData) === 1) {
        // Get product id
        $goodId = $urlData[0];
        // Update all product fields in the database...
        // Sending a response to the client
        echo json_encode(array(
            'method' => 'PUT',
            'id' => $goodId,
            'formData' => $formData
        ));
        return;
    }
    // Partial update of product data
    // PATCH /goods/{goodId}
    if ($method === 'PATCH' && count($urlData) === 1) {
        // Get product id
        $goodId = $urlData[0];
        // We update only the specified product fields in the database...
        // Sending a response to the client
        echo json_encode(array(
            'method' => 'PATCH',
            'id' => $goodId,
            'formData' => $formData
        ));
        return;
    }
    // Deleting a product
    // DELETE /goods/{goodId}
    if ($method === 'DELETE' && count($urlData) === 1) {
        // Get product id
        $goodId = $urlData[0];
        // Removing a product from the database...
        // Sending a response to the client
        echo json_encode(array(
            'method' => 'DELETE',
            'id' => $goodId
        ));
        return;
    }
    // Displaying an error
    header('HTTP/1.0 400 Bad Request');
    echo json_encode(array(
        'error' => 'Bad Request'
    ));

}
