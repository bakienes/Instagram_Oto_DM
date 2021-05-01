<?php
set_time_limit(0);
require_once dirname(__FILE__) . '/vendor/src/PronounceableWord/DependencyInjectionContainer.php';
include("../config.php");
function ara($bas, $son, $yazi)
{
    @preg_match_all('/' . preg_quote($bas, '/') .
    '(.*?)'. preg_quote($son, '/').'/i', $yazi, $m);
    return @$m[1];
}
define('MINIMUM_LENGTH', 5);
define('MAXIMUM_LENGTH', 7);
$length = rand(MINIMUM_LENGTH, MAXIMUM_LENGTH);
for($i=0; $i < 400; $i++){
$container = new PronounceableWord_DependencyInjectionContainer();
$generator = $container->getGenerator();
$word = $generator->generateWordOfGivenLength($length);
echo '<table border="1" bgcolor="#aabbcc">
  <tr>
    <td style="height:20px; width:100%;" color="whıte">'.$word.'</td>
  </tr>
</table>';	
$sorgumail = mysqli_query($con, "SELECT * FROM words WHERE word='$word'");
$sonucmail = mysqli_fetch_assoc($sorgumail);
if(empty($sonucmail)){
mysqli_query($con,"INSERT INTO words (word,submit) VALUES ('$word','no')");
}
}
?>