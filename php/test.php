<?php
	require_once '../vendor/autoload.php';
	use Fieg\Bayes\Classifier;
	use Fieg\Bayes\Tokenizer\WhitespaceAndPunctuationTokenizer;

	$tokenizer = new WhitespaceAndPunctuationTokenizer();
	$classifier = new Classifier($tokenizer);

	$classifier->train('search_user', 'find');
	$classifier->train('search_user', 'encuentra a');
	$classifier->train('search_user', 'get');
	$classifier->train('search_user', 'usuario');

	$classifier->train('search_category', 'show');
	$classifier->train('search_category', 'category');
	$classifier->train('search_category', 'categoria');
	$classifier->train('search_category', 'muestrame');
	$classifier->train('search_category', 'secretos de');
	$classifier->train('search_category', 'secrets of');

	//$result = $classifier->classify($_POST['query']);
	
	$result = $classifier->classify("Juan");
	if($result["search_user"] > $result["search_category"]){
		echo "You are looking for a user, dont ya?";
	}elseif ($result["search_user"] == 0.5) {
		echo "I'm not sure...";
	}else{
		echo "You are looking for a category, dont ya?";
	}
?>