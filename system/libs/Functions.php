<?php 

function show($stuff)
{
	echo "<pre>";
	print_r($stuff);
	echo "</pre>";
}


function get_random_string_max($length) {

	$array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
	$text = "";

	$length = rand(4,$length);

	for($i=0;$i<$length;$i++) {

		$random = rand(0,61);
		
		$text .= $array[$random];

	}

	return $text;
}

function check_page($pageTitle, $nav, $true, $false)
{
	if($pageTitle == $nav){
		echo " ".$true." ";
	}else{
		echo " ".$false." ";
	}
}

function check_message($color)
{
	if(isset($_SESSION['message']) && $_SESSION['message'] != "")
	{
		?>
		<div class="alert alert-<?=$color?> alert-dismissible fade show" role="alert" style="font-size: 20px;">
  			<strong>Thông báo: </strong><?=$_SESSION['message']?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		<?php		
		unset($_SESSION['message']);
	}
}

function read_list_local()
{
	$file = file_get_contents(ASSETS . "local.json");
	$a = json_decode($file, true);
	foreach ($a as $key => $val) {
		if($val['code'] == 'SG'){
			echo "hồ chí minh city";
		}
	}
}