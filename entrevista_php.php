
<?php 

$params = array(
	'api_key'	=> 'c55b1abb0b9c3798a3e7e01585efbd47',
	'method'	=> 'flickr.photosets.getPhotos',
	'photoset_id'	=> '72157687707589155',
	'user_id' => '157773796@N05',
	'per_page' => '6',
	'format'	=> 'php_serial',
);

$encoded_params = array();

foreach ($params as $k => $v){

	$encoded_params[] = urlencode($k).'='.urlencode($v);
}


#
# chamar a API e decodificar a resposta
#

$url = "https://api.flickr.com/services/rest/?".implode('&', $encoded_params);

$rsp = file_get_contents($url);

$rsp_obj = unserialize($rsp);

#
# exibir o título da foto (ou um erro se ele falhar)
#

if ($rsp_obj['stat'] == 'ok'){
	//var_dump($rsp_obj['photoset']['photo']);
	for ($i=0; $i < count($rsp_obj['photoset']['photo']); $i++) { 

		$photo_title = $rsp_obj['photoset']['photo'][$i]['title'];

		
		echo '<img src="http://farm'.$rsp_obj['photoset']['photo'][$i]['farm'].'.staticflickr.com/'.$rsp_obj['photoset']['photo'][$i]['server'].'/'.$rsp_obj['photoset']['photo'][$i]['id'].'_'.$rsp_obj['photoset']['photo'][$i]['secret'].'.jpg" alt="IMAGEM DO FLICKR"/>';
	}

}else{

	echo "Falha na chamada!";
}

#a:2:{s:8:"photoset";a:11:{s:2:"id";s:17:"72157687707589155";s:7:"primary";s:11:"36481205511";s:5:"owner";s:13:"157773796@N05";s:9:"ownername";s:11:"mk.oliveira";s:5:"photo";a:6:{i:0;a:9:{s:2:"id";s:11:"36481205511";s:6:"secret";s:10:"5ae2a011e2";s:6:"server";s:4:"4421";s:4:"farm";d:5;s:5:"title";s:24:"nacho-comida_12265_19013";s:9:"isprimary";s:1:"1";s:8:"ispublic";i:1;s:8:"isfriend";i:0;s:8:"isfamily";i:0;}i:1;a:9:{s:2:"id";s:11:"36572575756";s:6:"secret";s:10:"0590f68ae8";s:6:"server";s:4:"4342";s:4:"farm";d:5;s:5:"title";s:26:"indiana-comida_12226_18838";s:9:"isprimary";s:1:"0";s:8:"ispublic";i:1;s:8:"isfriend";i:0;s:8:"isfamily";i:0;}i:2;a:9:{s:2:"id";s:11:"36481205741";s:6:"secret";s:10:"c9510abc39";s:6:"server";s:4:"4360";s:4:"farm";d:5;s:5:"title";s:19:"comida-de-reveillon";s:9:"isprimary";s:1:"0";s:8:"ispublic";i:1;s:8:"isfriend";i:0;s:8:"isfamily";i:0;}i:3;a:9:{s:2:"id";s:11:"36481455371";s:6:"secret";s:10:"2a1f55edc9";s:6:"server";s:4:"4365";s:4:"farm";d:5;s:5:"title";s:11:"img-insta-4";s:9:"isprimary";s:1:"0";s:8:"ispublic";i:1;s:8:"isfriend";i:0;s:8:"isfamily";i:0;}i:4;a:9:{s:2:"id";s:11:"36481461621";s:6:"secret";s:10:"f7019d60a3";s:6:"server";s:4:"4391";s:4:"farm";d:5;s:5:"title";s:11:"img-insta-3";s:9:"isprimary";s:1:"0";s:8:"ispublic";i:1;s:8:"isfriend";i:0;s:8:"isfamily";i:0;}i:5;a:9:{s:2:"id";s:11:"35810130783";s:6:"secret";s:10:"894bba33bb";s:6:"server";s:4:"4419";s:4:"farm";d:5;s:5:"title";s:11:"img-insta-2";s:9:"isprimary";s:1:"0";s:8:"ispublic";i:1;s:8:"isfriend";i:0;s:8:"isfamily";i:0;}}s:4:"page";i:1;s:8:"per_page";s:1:"6";s:7:"perpage";s:1:"6";s:5:"pages";d:2;s:5:"total";s:1:"7";s:5:"title";s:10:"entrevista";}s:4:"stat";s:2:"ok";}