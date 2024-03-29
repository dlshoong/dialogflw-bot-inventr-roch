<?php

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is post
if ($method == "POST"){
    $requestBody = file_get_contents('php://input');
    $json = json_decode($requestBody);

    $text = $json->queryResult->parameters->Product;

    switch ($text) {
        case 'hi':
            $speech = "Hi, Nice to meet you :) ";
            break;

        case 'bye':
            $speech = "Bye :)" ;
            break;
        
        case "Rivotril":
            $speech = "There are 10.";
            break;

        default:
            $speech = "Sorry, I didnt get that. Please ask another question.";
            break;
    }

    $response = new \stdClass();
    $response->fulfillmentText = $speech;
    echo json_encode($response);

}else{
    echo "Method not allowed";
}



?>