<?php	 

	$checktoken = false;
	$limit_newsletter = 100;
	if(checktoken()){
		$checktoken = true;
	}
	function base64url_encode($data) { return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); } 
	function base64url_decode($data) { return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); } 
	function encodeKey($key,$msg){
		$encoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $msg, MCRYPT_MODE_CBC, md5(md5($key))));
		return $encoded;
	}
	function decodeKey($key,$msg){
		$decoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($msg), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
		return $decoded;
	}
	function checktoken(){
		$result = false;
		$email = "";
		$user_id = "";
		if(!empty($_SESSION['token'])){
			
			if(isset($_SESSION["email"])){
				$email=$_SESSION["email"];
			}
			if(isset($_SESSION["user_id"])){
				$user_id=$_SESSION["user_id"];
			}
			if($_SESSION['token'] == md5($email.$user_id)){
				$result = true;
			}else{
				$result = false;
			}
		}else{
			$result = false;
		}
		return $result;
	}
	function phpResize($imgpath = "", $func = '&w=50', $admin = false) {
		return $path = htmlspecialchars(phpThumbURL('src=../'.($admin?'../':'').$imgpath.$func));
	}
	function check($username="",$password=""){

		global $obj_db;
		global $PRIVATEuser_home;
		global $user;
		$result = false;
		$result_txt="";

		if($username=="" and (isset($_SESSION["euser"]))){ 
			$username=base64url_decode($_SESSION["euser"]); 
		}else{ 
			$username = $obj_db->escape($username); 
		}
		if($password=="" and (isset($_SESSION["epass"]))){ 
			$password=base64url_decode($_SESSION["epass"]); 
		}else{ 
			$password = $obj_db->escape($password); 
		}

		if(!empty($username) and !empty($password)){
			$result = $user->login($username,$password,1,5);
		}

		return $result;
	}
	/*
	$str=array();
	$str = explode( '/', $_SERVER['PHP_SELF'] );
	// and in_array($backoffice,$str,true)
	//if(basename($_SERVER['PHP_SELF'])!="login"){
	if($route!="login"){
		if(!check()){
			@header("location: ".url('login'));
			?>
			<script>
			window.location=<?php echo url('login');?>;
			</script>
			<?php 
		}
	}
	*/
	function getpara($unset=NULL){
	
	$array_g = $_GET;
	$unset = explode(",",$unset);
	
	
	if($unset!=NULL){
	
	foreach($unset as $val){
		unset($array_g[$val]);
	}
	}
	$i=1;
	$para = '?';
	foreach($array_g as $key=>$val){
	$para .= "$key=$val";
	if($i!=count($array_g)){$para .= "&";}
	$i++;
	}
	return $para;
	}
	
	
	function get_slug($txt){
		$i=1;
		global $obj_db;
		$badword = array("\"", "/");
		$slug = $txt;
		$slug = str_replace($badword, "",$slug );
		$slug = str_replace(" ","_",$slug );
		
		$num = mysql_num_rows($obj_db->select("".PREFIX."product","slug = '$slug'"));
		while($num==1){
			$i++;
			$slug = $slug."($i)";
			$num = mysql_num_rows($obj_db->select("".PREFIX."product","slug = '$slug'"));
		}
	
		return $slug;
	}
	function get_tags($txt){
		$txt = explode(",", $txt);
		return $txt;
	}
	function getValArr($val){
		$result ='';
		foreach($val as $val){
			$result .= "&filter[]=".$val;
		}
		return $result;
	}
	function get_client_ip() {
	    $ipaddress = '';
	    if (getenv('HTTP_CLIENT_IP'))
	        $ipaddress = getenv('HTTP_CLIENT_IP');
	    else if(getenv('HTTP_X_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	    else if(getenv('HTTP_X_FORWARDED'))
	        $ipaddress = getenv('HTTP_X_FORWARDED');
	    else if(getenv('HTTP_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_FORWARDED_FOR');
	    else if(getenv('HTTP_FORWARDED'))
	       $ipaddress = getenv('HTTP_FORWARDED');
	    else if(getenv('REMOTE_ADDR'))
	        $ipaddress = getenv('REMOTE_ADDR');
	    else
	        $ipaddress = 'UNKNOWN';
	    return $ipaddress;
	}

	function img($path,$type){
		global $mdir;
		$result = "";
		if($type=="gallery"){
			$result = $mdir."upload/gallery/".$path;
		}else{
			$result = $mdir."upload/content/".$path;
		}
		return $result; 
	}
	
	function sendmail($to_email="",$msg="",$subject=""){
		global $email_username;
		global $email_password;
		global $email_host;
		global $name_website;
		global $email_port;
		global $email_send;
		global $email_stmpsecure;
		

	    $body = "
	    <html>
	    	<body>".$msg."</body> 
	    </html>";
	    $subject = "=?utf-8?b?".base64_encode($subject)."?=";
		$mail = new PHPMailer(true); //New instance, with exceptions enabled
		$mail->Subject  =  $subject;
		//$mail->AddBCC("nongluck@systems2000.co.th,account@systems2000.co.th");
		$mail->From       = $email_username;
		$mail->FromName   = $name_website;
		$mail->MsgHTML($body);
		$mail->IsHTML(true);
		$mail->AddAddress($to_email);
		if(!$mail->Send()){ 
			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$headers .= 'To: '.$to_email.' <'.$to_email.'>' . "\r\n";
			$headers .= 'From: '.$email_username.' <'.$email_send.'>' . "\r\n";
			$headers .= 'Bcc: '.$setting['email_bcc'] . "\r\n";
			mail($to_email,$subject,$body,$headers); 
		}
		//mail($to_email,$subject,$body,$header);
	}
	function sendmailSmtp($to_email,$msg,$subject=""){
		global $email_username;
		global $email_password;
		global $email_host;
		global $name_website;
		global $email_port;
		global $email_send;
		global $email_stmpsecure;

		global $email_detail_header;
		global $email_detail_footer;
		global $email_detail;
		global $email_bcc;
		try {
			$mail = new PHPMailer(true); //New instance, with exceptions enabled

			$body             	= $msg;
			$body             	= preg_replace('/\\\\/','', $body); //Strip backslashes
			$subject 			= "=?utf-8?b?".base64_encode($subject)."?=";
			$mail->IsSMTP();                           // tell the class to use SMTP
			$mail->CharSet 		= "utf-8";
			$mail->SMTPAuth   	= true;                  // enable SMTP authentication
			$mail->Debugoutput 	= 'html';
			$mail->SMTPDebug 	= 0;
			$mail->Port       	= $email_port;                    // set the SMTP server port
			$mail->Host       	= $email_host; // SMTP server
			$mail->Username   	= $email_username;     // SMTP server username
			$mail->Password   	= $email_password;            // SMTP server password
			$mail->SMTPSecure 	= $email_stmpsecure;
			$mail->SMTPAuth 	= true;
			//$mail->IsSendmail();  // tell the class to use Sendmail
			
			$mail->AddAddress($to_email);
			//$mail->AddReplyTo($to,"First Last");
			/*$str = explode(',', $email_bcc);
			foreach ($str as $key => $value) {
				$mail->AddBCC($value);
			}*/
			$mail->From       = $email_username;
			$mail->FromName   = $email_send;

			$mail->Subject  = $subject;

			$mail->AltBody    = $body; // optional, comment out and test
			$mail->WordWrap   = 80; // set word wrap

			$mail->MsgHTML($body);

			$mail->IsHTML(true); // send as HTML

			$mail->Send();
			//echo 'Message has been sent.'.date('H:i:s');
		} catch (phpmailerException $e) {
			echo $e->errorMessage();
		}
	}
	function function_error($input){
			$file = dirname(__FILE__).DIRECTORY_SEPARATOR.'../log.txt';
			$sort = "";
			$current = file_get_contents($file);
			$sort = date("d-m-Y H:i:s")." ".$input."\n".$current;
			file_put_contents($file, $sort);
	}
	function debug($variable){
		echo "<pre>";
		var_dump($variable);
		echo "</pre>";
		exit();
	}
	function print_rs($variable){
		echo "<pre>";
		print_r($variable);
		echo "</pre>";
		exit();
	}
	function post($val=""){
		$result = '';
		if(isset($_POST[$val])){
			$result = $_POST[$val];
		}
		return $result;
	}
	function session($val=""){
		$result = '';
		if(isset($_SESSION[$val])){
			$result = $_SESSION[$val];
		}
		return $result;
	}
	function get($val=""){
		$result = '';
		if(isset($_GET[$val])){
			$result = $_GET[$val];
		}
		return $result;
	}
	function check_var($val=""){
		$result = '';
		if(isset($val)){
			$result = $val;
		}
		return $val;
	}
	function files($val=""){
		$result = '';
		if(isset($_FILES[$val])){
			$result = $_FILES[$val];
		}
		return $result;
	}
	function url($path){
		global $mdir;
		$result = $mdir.$path;
		return $result;
	}
	function route($path,$para=""){
		global $mdir;
		global $head_cat_id ;
		$str_para = '';
		if(!empty($para)){
			$str_para = "&".$para;
		}
		// $url_arr = parse_url($url, PHP_URL_QUERY);
		// $arr_url_val = explode('&', $str_para);

		$str_url = '';
		// var_dump($arr_url_val);	
		if(!strstr( $str_para, 'head_cat_id' )){
			$str_url = '&head_cat_id='.$head_cat_id;
		}
		$result = $mdir."index.php?route=".$path.$str_para.$str_url;
		return $result;
	}
	function style($path){
		global $mdir;
		$result = '<link rel="stylesheet" href="'.$mdir.$path.'">';
		return $result;
	}
	function script($path){
		global $mdir;
		$result = '<script src="'.$mdir.$path.'"></script>';
		return $result;
	}
	function redirect($route,$para=""){
		header('location: index.php?route='.$route.$para);
	}
	function method_post(){
		$result = false;
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$result = true;
		}
		return $result;
	}
	function upload($var,$path,$img_profile_name=""){
		if(empty($img_profile_name)){
			$img_profile_name = $var["name"];
		}
		$var = $_FILES[$var];
		$result = false;
		// print_r($var);
		// echo $path . ' ' . $img_profile_name;
		if(move_uploaded_file($var["tmp_name"],$path.$img_profile_name)){
			$result = true;
			// echo 'inside if';
		}
		// echo 'after if';
		return $result;
	}
	function check_login(){
		global $user;
		$resul = false;
		if(!$user->checkLogin()){
			redirect('student/page_login');
		}
	}
	function img_profile(){
		$result = "";
		if(!empty($_SESSION['fb_id'])){
			$result = $_SESSION['profile_path'];
		}else{
			$result = PROFILE_STUDENT_PATH.$_SESSION['profile_path'];
		}
		return $result;
	}
	function list_error($error = array()){
		$result = '';
		if($error){
			$result  = "<ul class='error text-danger'>";
			foreach ($error as $key => $value) {
				echo "<li>".$value."</li>";
			}
			$result .= "</ul>";
		}
		return $result;
	}
	function get_route(){
		$result = $_GET['route'];
		return $result;
	}
	function menu_active($route){
		$result = "";
		if($_GET['route']==$route){
			$result = "active";
		}
		return $result;
	}
	function num2wordsThai($number){     
	    $txtnum1 =  array('ศูนย์','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า','สิบ');
		$txtnum2 =  array('','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน');

		$number = str_replace(",","",$number);
		$number = str_replace(" ","",$number);
		$number = str_replace("บาท","",$number);
		$number = explode(".",$number);

		if(sizeof($number)>2){
			return 'error more 2 demical';
			exit;
		}
		$strlen = strlen($number[0]);
		$convert = '';
		for($i=0;$i<$strlen;$i++){
			$n = substr($number[0], $i,1);
			if($n!=0){
				if($i==($strlen-1) AND $n==1){ $convert .=  'เอ็ด'; }
				elseif($i==($strlen-2) AND $n==2){  $convert .= 'ยี่'; }
				elseif($i==($strlen-2) AND $n==1){  $convert .= ''; }
				else{ $convert .= $txtnum1[$n]; } 
				$convert .= $txtnum2[$strlen-$i-1];
			}
		}
		$convert .= 'บาท';
		if($number[1]=='0' OR $number[1]=='00' OR 
		$number[1]==''){
		$convert .= 'ถ้วน';
		}else{
		$strlen = strlen($number[1]);
		for($i=0;$i<$strlen;$i++){
		$n = substr($number[1], $i,1);
		if($n!=0){
		if($i==($strlen-1) AND $n==1){$convert 
		.= 'เอ็ด';}
		elseif($i==($strlen-2) AND 
		$n==2){$convert .= 'ยี่';}
		elseif($i==($strlen-2) AND 
		$n==1){$convert .= '';}
		else{ $convert .= $txtnum1[$n];}
		$convert .= $txtnum2[$strlen-$i-1];
		}
		}
		$convert .= 'สตางค์';
		}
		return $convert;
	}  
	function mb_wordwrap($str, $width = 75, $break = "\n", $cut = false) {
	    $lines = explode($break, $str);
	    foreach ($lines as &$line) {
	        $line = rtrim($line);
	        if (mb_strlen($line) <= $width)
	            continue;
	        $words = explode(' ', $line);
	        $line = '';
	        $actual = '';
	        foreach ($words as $word) {
	            if (mb_strlen($actual.$word) <= $width)
	                $actual .= $word.' ';
	            else {
	                if ($actual != '')
	                    $line .= rtrim($actual).$break;
	                $actual = $word;
	                if ($cut) {
	                    while (mb_strlen($actual) > $width) {
	                        $line .= mb_substr($actual, 0, $width).$break;
	                        $actual = mb_substr($actual, $width);
	                    }
	                }
	                $actual .= ' ';
	            }
	        }
	        $line .= trim($actual);
	    }
	    return implode($break, $lines);
	}
function utf8_wordwrap($str, $width, $break, $cut = false) {
    if (!$cut) {
        $regexp = '#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){'.$width.',}\b#U';
    } else {
        $regexp = '#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){'.$width.'}#';
    }
    if (function_exists('mb_strlen')) {
        $str_len = mb_strlen($str,'UTF-8');
    } else {
        $str_len = preg_match_all('/[\x00-\x7F\xC0-\xFD]/', $str, $var_empty);
    }
    $while_what = ceil($str_len / $width);
    $i = 1;
    $return = '';
    while ($i < $while_what) {
        preg_match($regexp, $str,$matches);
        $string = $matches[0];
        $return .= $string.$break;
        $str = substr($str, strlen($string));
        $i++;
    }
    return $return.$str;
}
function api($path){

	global $mdir_api;
	$get_url = $mdir_api.$path;
	//echo $get_url;exit();
	$cURL = curl_init();
	curl_setopt($cURL, CURLOPT_URL, trim($get_url));
	//curl_setopt($cURL, CURLOPT_HTTPGET, true);
	curl_setopt($cURL, CURLOPT_RETURNTRANSFER,TRUE);
	curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Accept: application/json'
	));

	$exec = curl_exec($cURL);

	$exec = trim($exec, "\xEF\xBB\xBF");
	//echo $exec;
	$result_json = json_decode($exec);
	//echo ">>";
	//var_dump($result_json);
	//echo $result_json;
	curl_close($cURL);

	return $result_json;
	// $cURL = curl_init();

	// curl_setopt($cURL, CURLOPT_URL,$mdir_api.$path);
	//curl_setopt($ch, CURLOPT_POST, 1);
	//curl_setopt($ch, CURLOPT_POSTFIELDS,"postvar1=value1&postvar2=value2&postvar3=value3");

	// in real life you should use something like:
	// curl_setopt($ch, CURLOPT_POSTFIELDS, 
	//          http_build_query(array('postvar1' => 'value1')));

	// receive server response ...
	// curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
	// curl_setopt($cURL, CURLOPT_HTTPGET, true);
	// curl_setopt($cURL, CURLOPT_RETURNTRANSFER,TRUE);
	// curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
	// 		'Content-Type: application/json',
	// 		'Accept: application/json'
	// ));
	// $server_output = curl_exec ($cURL);

	// curl_close ($cURL);
	// // further processing ....
	// if ($server_output) { 
	// 	$return = json_decode($server_output);
	// 	return $return;
	// }
}
function checkJson(){
	$json_errors = array(
	JSON_ERROR_NONE => 'No error has occurred',
	JSON_ERROR_DEPTH => 'The maximum stack depth has been exceeded',
	JSON_ERROR_CTRL_CHAR => 'Control character error, possibly incorrectly encoded',
	JSON_ERROR_SYNTAX => 'Syntax error',
	);
	echo 'Last error : ', $json_errors[json_last_error()], PHP_EOL, PHP_EOL;
}

function cut_tag_p ($data) {
	$data = str_replace("<p>", "", $data);
	$data = str_replace("</p>", "", $data);
	return $data;
}

?>