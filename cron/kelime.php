<?php
set_time_limit(0);
include("../app/config/config2.php");
function ara($bas, $son, $yazi)
{
    @preg_match_all('/' . preg_quote($bas, '/') .
    '(.*?)'. preg_quote($son, '/').'/i', $yazi, $m);
    return @$m[1];
}


	function generateRandomWord($length=4, $level=1){
    list($usec, $sec) = explode(' ', microtime());
    srand((float) $sec + ((float) $usec * 100000));
		
    $validchars[1] = "abcdfghjkmnpqrstvwxyzequal_asdfhgjklkqwertyuopozxcvbnm_1";
    $word  = "";
    $counter   = 0;
		
    while ($counter < $length) {
        $actChar = substr($validchars[$level], rand(0, strlen($validchars[$level])-1), 1);
        if (!strstr($word, $actChar)) {
            $word .= $actChar;
            $counter++;
        }
    }
		
    return $word;
}
for($i=0; $i < 500; $i++){
$word = generateRandomWord();
echo $word.'<br> ';	
$sorgumail = mysqli_query($con, "SELECT * FROM words WHERE word='$word'");
$sonucmail = mysqli_fetch_assoc($sorgumail);
if(empty($sonucmail)){
mysqli_query($con,"INSERT INTO words (word,submit) VALUES ('$word','no')");
}
}
