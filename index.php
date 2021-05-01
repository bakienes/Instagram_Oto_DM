<?php

/**
 * Veritabanı bağlantı bilgilerimizin olduğu sayfayı dahil ediyoruz.
 */
include_once ("app/config/config.php");

$db = new Db();

/**
 * Veritabanımıza bağlanmaya çalışıyoruz.
 * Bağlanamazsak, hata mesajını ekrana yazdırıyoruz
 */
if (!$db->connect()) {
    die("Hata: Veritabanına bağlanırken bir hata oluştu." . $db->error());
}

/**
 * login_user oturum değişkeninden bilgileri alıyoruz ve
 * $user değişkenine kaydediyoruz.
 *
 * Eğer kullanıcımız oturum açmış ise, $user dolu olacak.
 * Eğer kullanıcımız daha önce oturum açmamış ise, $user boş olacak.
 *
 */
$user = $_SESSION["login_user"];

/**
 * Kullanıcı zaten oturum açmış ise index.php ye yönlendiriyoruz.
 * $user dolu ise, yada içinde her hangi bir değer var ise, bunun anlamı kullanıcımız oturum açmış.
 * Eğer $user boş ise, bunun anlamı kullanıcımız henüz oturum açmamış
 */
if ($user) {
    header("location: member/admin/");
    exit;
}else{header("location: member/");}
?>