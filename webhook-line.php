<?php 
$method = $_SERVER['REQUEST_METHOD'];
// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	$text = $json->result->parameters->text;
	switch ($text) {
		case 'hi':
			$speech = "Hi, Nice to meet you";
			break;
		case 'bye':
			$speech = "Bye, good night";
			break;
		case 'anything':
			$speech = "Yes, you can type anything here.";
			break;
		case 'input.greeting':
			$speech = "สวัสดีค่ะ";
			break;
		case 'input.unknown':
			$speech = "unknown";
			break;		
		default:
			$speech = "Sorry, I didnt get that. Please ask me something else.";
			break;
			
	}
	$json = json_encode([
                'speech'   => $speech,
                'displayText' => $speech,
                'data' => [],
                'contextOut' => [],
                'source' =>  'webhook'
        ]);
	
	/*$response = new \stdClass();
	$response->speech = $speech;
	$response->displayText = $speech;
	$response->source = "agent";
	echo json_encode($response);*/
	echo $json;
}
else
{
	echo "Method not allowed";
}
?>
