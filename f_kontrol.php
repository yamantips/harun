<?php
ob_start();
session_start();

$admin=$_SESSION['user'];
$pasword=$_SESSION['pasword'];

include("f_ayar.php");


if (empty($_SESSION['user']))
{
$kullanici=$_POST['f_kadi'];
$sifre=$_POST['f_sifre'];
$sorgu=("SELECT * FROM firma where firma_kadi='$kullanici' and firma_sifre='$sifre'");
$tablo=mysql_query($sorgu);

if (mysql_num_rows($tablo)>0)
{

$_SESSION['user']=$kullanici;
$_SESSION['pasword']=$sifre;
header("refresh:2;url=fkp.php");
}
else
{
//hatali kullanici adi veya sifre oldugunda calisan bolum
echo "<center>hatali kullanici adi veya sifre Lütfen yeniden giris yapiniz<br>";
header("refresh:2;url=index.php");
echo "<br>";
}
}
else
{
// oturum acikken giris yapildiginda calisan bolum
echo "zaten su anda sistemde "."$admin"." oturumu açik kapatmadan 2. kez giremezsiniz";
echo "<br>";
echo "Çikis yapmak  için <a href='f_kapat.php'> TIKLAYINIZ";
}

?>
</center>
