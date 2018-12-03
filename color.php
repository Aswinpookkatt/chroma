<?php

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->queryResult->parameters->colortype;

$text=strtolower($text);
	switch ($text) {
		case 'blue':
			$speech = "blue is a good color";
			break;

		case 'black':
			$speech = "black is very nice color";
			break;

		case 'green':
			$speech = "green ";
			break;

		default:
			$speech = "Sorry, I didnt get that. Please ask me something else.";
			break;
	}

	$response = new \stdClass();
	$response->speech = $speech;
	$response->displayText = $speech;
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
