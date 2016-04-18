<?php
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim(array('db'=>$db));


$app->get('/customers', function () {

		require  'config/db.php';

	    try {
	    	$sql = 'SELECT * from customers';

	    	$data = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	    	echo json_encode($data);
		    $db = null;
		} catch (PDOException $e) {
		    echo json_encode(array('error'=>'Something went wrong'));
		}
		

});

$app->get('/customers/:customer_id', function ($customer_id) {
    echo "customer id is ".$id;
});

$app->post('/customers', function () {

	print_r(file_get_contents("php://input"));
    
});

$app->put('/customers/:customer_id', function ($customer_id) {
    echo "customer id is put ".$customer_id;
});

$app->delete('/customers/:customer_id', function ($customer_id) {
    echo "customer id is delete ".$customer_id;
});

$app->get('/customers/:customer_id/address', function ($customer_id) {
    echo "address id for customer ".$customer_id;
});


$app->run();



?>




