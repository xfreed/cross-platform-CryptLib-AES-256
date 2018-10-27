<?php 
$method = 'aes-256-cbc';
if(isset($_POST["submit"])){	
	$plaintext = $_POST['text'];
	$password = $_POST['key'];	
// Must be exact 32 chars (256 bit)
	$password = substr(hash('sha256', $password, true), 0, 32);
// IV must be exact 16 chars (128 bit)
	$iv = mcrypt_create_iv(16, MCRYPT_DEV_RANDOM);
	$encrypted = base64_encode(openssl_encrypt($plaintext, $method, $password, OPENSSL_RAW_DATA, $iv)) . $iv;
}
else{
	$plaintext = $_POST['textd'];
	$password = $_POST['keyd'];	
	$password = substr(hash('sha256', $password, true), 0, 32);
	$iv = substr($plaintext, strlen($plaintext)-16,strlen($plaintext));
	$plaintext =  substr($plaintext, 0, strlen($plaintext)-16);

	$decrypted = openssl_decrypt(base64_decode($plaintext), $method, $password, OPENSSL_RAW_DATA, $iv);
}
?>
<style>
input{
	margin: 5px;
}
</style>
<h1>Crypt</h1>
<form method = "post">
	<textarea name="text" placeholder="Text"></textarea><br>
	<input type="" name="key" placeholder="key">
	<button name="submit" value="crypt">Submit</button>
</form>
<h1>Decrypt</h1>
<form method="post">
	<textarea name="textd" placeholder="Text"></textarea><br>
	<input type="" name="keyd" placeholder="key">
	<button name="submitd" value="decrypt">decrypt</button>
</form>

<?php 
echo 'encrypted to: ' . $encrypted . "<br>";
echo 'decrypted to: ' . $decrypted ;
?>