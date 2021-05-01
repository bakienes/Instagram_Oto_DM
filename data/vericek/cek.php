<?php
$tarih = date("d.m.Y"); 
$saat = date("H:i:s"); 
include("../../app/config/config2.php");
$sorgu = $con->query("SELECT * FROM mailler order by id desc limit 0, 1"); 
while ($sonuc = $sorgu->fetch_assoc()) { 
$id1 = $sonuc['id'];
$mail1 = $sonuc['mail'];
$username1 = $sonuc['username'];
$submit1 = $sonuc['submit']; } 

$sorgu = $con->query("SELECT * FROM mailler order by id desc limit 1, 1"); 
while ($sonuc = $sorgu->fetch_assoc()) { 
$id2 = $sonuc['id']; 
$mail2 = $sonuc['mail'];
$username2 = $sonuc['username'];
$submit2 = $sonuc['submit']; }

$sorgu = $con->query("SELECT * FROM mailler order by id desc limit 2, 1");
while ($sonuc = $sorgu->fetch_assoc()) { 
$id3 = $sonuc['id']; 
$mail3 = $sonuc['mail'];
$username3 = $sonuc['username'];
$submit3 = $sonuc['submit']; }

$sorgu = $con->query("SELECT * FROM mailler order by id desc limit 3, 1"); 
while ($sonuc = $sorgu->fetch_assoc()) { 
$id4 = $sonuc['id']; 
$mail4 = $sonuc['mail'];
$username4 = $sonuc['username'];
$submit4 = $sonuc['submit']; }

$sorgu = $con->query("SELECT * FROM mailler order by id desc limit 4, 1"); 
while ($sonuc = $sorgu->fetch_assoc()) { 
$id5 = $sonuc['id']; 
$mail5 = $sonuc['mail'];
$username5 = $sonuc['username'];
$submit5 = $sonuc['submit']; }

$sorgu = $con->query("SELECT * FROM mailler order by id desc limit 5, 1"); 
while ($sonuc = $sorgu->fetch_assoc()) { 
$id6 = $sonuc['id']; 
$mail6 = $sonuc['mail'];
$username6 = $sonuc['username'];
$submit6 = $sonuc['submit']; }

$sorgu = $con->query("SELECT * FROM mailler order by id desc limit 6, 1"); 
while ($sonuc = $sorgu->fetch_assoc()) { 
$id7 = $sonuc['id']; 
$mail7 = $sonuc['mail'];
$username7 = $sonuc['username'];
$submit7 = $sonuc['submit']; }

$sorgu = $con->query("SELECT * FROM mailler order by id desc limit 7, 1"); 
while ($sonuc = $sorgu->fetch_assoc()) { 
$id8 = $sonuc['id']; 
$mail8 = $sonuc['mail'];
$username8 = $sonuc['username'];
$submit8 = $sonuc['submit']; }

$sorgu = $con->query("SELECT * FROM mailler order by id desc limit 8, 1"); 
while ($sonuc = $sorgu->fetch_assoc()) { 
$id9 = $sonuc['id']; 
$mail9 = $sonuc['mail'];
$username9 = $sonuc['username'];
$submit9 = $sonuc['submit']; }

?>
