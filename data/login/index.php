  <?php
include_once ("../../app/config/config.php");

$db = new Db();
if (!$db->connect()) { die("Hata: Veritabanına bağlanırken bir hata oluştu." . $db->error());}
$user = $_SESSION["login_user"];
if ($user) {header("location: ../../member/index.php?type=basarılı"); exit;}
$username = mysql_real_escape_string($_POST["username"]);
$password = mysql_real_escape_string($_POST["password"]);
$username = trim($username);
$password = trim($password);
$username = $db->quote($username);
$query= "SELECT * FROM user WHERE username=$username and password='$password'";
$result = $db->select($query);
if ($result && count($result) == 1) {
   
    $_SESSION["login_user"] = array(
        "id" => $result[0]["id"],
        "username" => $result[0]["username"],
       "password" => $result[0]["password"],
    );

    header("location: index.php?type=basarılı");
    exit;

} else {header("location: ../../member/index.php?type=yanlıs"); exit;
