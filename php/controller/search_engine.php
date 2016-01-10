<?php

	/*
		Search Engine 0.0.1a (09/01/16)
		Powered by a Naive-Bayes Classification Algorithm, need to find something
		to do something like this but better.
		( ͡° ͜ʖ ͡°)
	*/

	require_once '../../vendor/autoload.php';
	require_once '../model/user.php';
	require_once '../model/secret.php';
	use Fieg\Bayes\Classifier;
	use Fieg\Bayes\Tokenizer\WhitespaceAndPunctuationTokenizer;

	$tokenizer = new WhitespaceAndPunctuationTokenizer();
	$classifier = new Classifier($tokenizer);

	$ignore_user = ['find ','encuentra ','get ','usuario ','secretos de ','secrets of'];
	$ignore_cat = ['show ','category ','categoria ','muestrame ','secretos de ','secrets from '];


	for ($i=0; $i < count($ignore_user); $i++) { 
		$classifier->train('search_user', $ignore_user[$i]);
	}

	for ($i=0; $i < count($ignore_cat); $i++) { 
		$classifier->train('search_category', $ignore_cat[$i]);
	}

	$query = $_POST['query'];

	$result = $classifier->classify($query);

	if($result["search_user"] > $result["search_category"]){
		
		$result = $query;
		for ($i=0; $i < count($ignore_user); $i++) { 
			$result = str_replace($ignore_user[$i], "", $result);
		}
		$u = new User();
		$r = $u->like("username", $result, false);
		for ($i=0; $i < count($r); $i++) { 
			//( ͡° ͜ʖ ͡°)
			$r[$i]["pw"] = "7w7";
		}
		echo json_encode((array)$r);

	}elseif ($result["search_user"] == 0.5) {
		
		echo "I'm not sure...";
	
	}else{
	
		$result = $query;
		for ($i=0; $i < count($ignore_cat); $i++) { 
			$result = str_replace($ignore_cat[$i], "", $result);
		}
		$s = new Secret();
		$r = $s->like("category", $result, false);
		echo json_encode((array)$r);
	
	}
?>