<?php
require 'aws-autoloader.php';

use Aws\S3\S3Client;

$client = S3Client::factory(array(
	 'key'    => 'AKIAIXB74XOIQONRKO4A',
	 'secret' => '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',
	 'region'  => 'us-west-2'
));


	// Upload an object by streaming the contents of a file
	// $pathToFile should be absolute path to a file on disk
	$result = $client->putObject(array(
		'Bucket'     => 'happyme',
		'Key'        => basename($_FILES["archivo"]["name"]),
		'Body' => $_FILES["archivo"]["tmp_name"],
		'SourceFile' => $_FILES["archivo"]["tmp_name"],
		'Metadata'   => array(
			'Project' => 'happyme',
			'Baz' => '123'
		)
	));
	
	// We can poll the object until it is accessible
	$client->waitUntil('ObjectExists', array(
		'Bucket' => 'happyme',
		'Key'    => $_FILES["archivo"]["name"]
	));
	
	
	
	guardar_path_video($result['ObjectURL'], $_POST['user'], $_POST['sender']);


function guardar_path_video ($path, $user, $sender)
{
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL,"http://172.17.31.132/happy/index.php?mensaje");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,"id=1&mensaje=&emisor=".$sender."&destinatario=".$user."&link=".$path);

	// receive server response ...
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$server_output = curl_exec ($ch);

	curl_close ($ch); 	
}


?>