<?php
ob_start();
session_start();

$admin = $_SESSION['user'];
$pasword=$_SESSION['pasword'];
$menuadi=$_SESSION['menu_adi'];

include("f_ayar.php");
$islem=$_GET['islem'];

if ($islem==fguncelle)
{

$fno=$_GET['fno'];
$f_adi=$_POST['f_adi'];
$f_adres=$_POST['f_adres'];
$f_tel=$_POST['f_tel'];
$f_kadi=$_POST['f_kadi'];
$f_sifre=$_POST['f_sifre'];
$guncelle=("UPDATE firma SET firma_adi='$f_adi',firma_adres='$f_adres',firma_tel='$f_tel',firma_kadi='$f_kadi',firma_sifre='$f_sifre' WHERE firma_id=$fno");
if (mysql_query($guncelle,$bgln))
{
$_SESSION['user']=$f_kadi;
$_SESSION['pasword']=$f_sifre;
echo "<center>güncelleme islemi basariyla yapilmistir</center>";
header("refresh:1;url=fkp.php?islem=");
}
else
echo "hata";
}
else if ($islem==uguncelle)
{

$uno=$_GET['uno'];
$u_adi=$_POST['u_adi'];
$u_fiyat=$_POST['u_fiyat'];
//resimle ilgili bölüm
$kaynak      =$_FILES['file']['tmp_name'];
$aisim        =$_FILES['file']['name']; 
$tip         =$_FILES['file']['type']; 
$buyukluk    =$_FILES['file']['size']; 
$desteklenenformatlar = array ("image/jpeg","image/pjpeg","image/png","image/gif");
$kaydedilecekyer = "/wamp/www";
if (in_array ($tip, $desteklenenformatlar))
{
$isim.=$aisim;
$dosya = $kaydedilecekyer . "/".$isim;
move_uploaded_file ($kaynak, $dosya);

}

if ($isim=="")
$guncelle=("UPDATE urun SET urun_adi='$u_adi',urun_fiyat='$u_fiyat' WHERE urun_id=$uno");
else
$guncelle=("UPDATE urun SET urun_adi='$u_adi',urun_fiyat='$u_fiyat',urun_resim='$isim' WHERE urun_id=$uno");
if (mysql_query($guncelle,$bgln))
{
echo "<center>güncelleme islemi basariyla yapilmistir</center>";
header("refresh:1;url=fkp.php?islem=uislem");
}
}
else if ($islem==kguncelle)
{

$k_id=$_GET['kno'];
$k_adi=$_POST['k_adi'];
$guncelle=("UPDATE kategori SET k_adi='$k_adi' WHERE k_id=$k_id");
mysql_query($guncelle,$bgln);
header("refresh:1;url=fkp.php");
}
else if ($islem==uekle)
{
$u_adi=$_POST["urun_adi"];
$u_fiyat=$_POST["urun_fiyat"];
$u_kg=$_POST["kg"];


$kaynak      =$_FILES['file']['tmp_name'];
$aisim        =$_FILES['file']['name']; 
$tip         =$_FILES['file']['type']; 
$buyukluk    =$_FILES['file']['size']; 
$desteklenenformatlar = array ("image/jpeg","image/pjpeg","image/png","image/gif");
$kaydedilecekyer = "/wamp/www";
if (in_array ($tip, $desteklenenformatlar))
{
$isim.=$aisim;
$dosya = $kaydedilecekyer . "/".$isim;
move_uploaded_file ($kaynak, $dosya);
}


$liste=mysql_query("SELECT * FROM firma WHERE firma_kadi='$admin' and firma_sifre='$pasword'");
$kayit=mysql_fetch_row($liste);
$firma_id=$kayit[0];

$sorgu="insert into urun (urun_adi,urun_fiyat,urun_resim,k_id,firma_id) values ('".$u_adi."','".$u_fiyat."','".$isim."','".$u_kg."',".$firma_id.")";
mysql_query($sorgu,$bgln);
echo "$aisim";
header("refresh:2;url=fkp.php");
}
else if ($islem==kekle)
{


$kg_adi=$_POST["k_adi"];
$liste=mysql_query("SELECT * FROM firma WHERE firma_kadi='$admin' and firma_sifre='$pasword'");
$kayit=mysql_fetch_row($liste);
$firma_id=$kayit[0];

$sorgu="insert into kategori (k_adi,firma_id) values ('".$kg_adi."',".$firma_id.")";
mysql_query($sorgu,$bgln);
header("refresh:0;url=fkp.php");
}
else if ($islem==ksil)
{

$k_no=$_GET['kno'];
$sorgu="delete  from urun where k_id='$k_no'";
mysql_query($sorgu,$bgln);
$sorgu="delete  from kategori where k_id='$k_no'";
mysql_query($sorgu,$bgln);
header("refresh:0;url=fkp.php");
}
else if ($islem==usil)
{
$uno=$_GET['uno'];
$sorgu="delete from urun where urun_id='$uno'";
mysql_query($sorgu,$bgln);
header("refresh:0;url=fkp.php");
}
else if ($islem==fsil)
{

$f_no=$_GET['fno'];
$fsil="delete from firma where firma_id='$f_no'";
$ksil="delete from kategori where firma_id='$f_no'";
$msil="delete from menu where firma_id='$f_no'";
$usil="delete from urun where firma_id='$f_no'";
mysql_query($fsil,$bgln);
mysql_query($ksil,$bgln);
mysql_query($msil,$bgln);
mysql_query($usil,$bgln);
session_destroy();
header("location: index.php");

ob_end_flush();
}
else if ($islem==msil)
{

$mno=$_GET['mno'];
$sorgu="delete from menu where menu_id='$mno'";
mysql_query($sorgu,$bgln);
header("refresh:0;url=fkp.php");
}
else if ($islem==mekle)
{

$fsorgu=("select * from firma where firma_kadi='$admin' and firma_sifre='$pasword'");
$fliste=mysql_query($fsorgu,$bgln);
$fkayit=mysql_fetch_row($fliste);
$madi=$_POST['m_adi'];
$mfiyat=$_POST['m_fiyat'];


$kaynak      =$_FILES['file2']['tmp_name'];
$aisim        =$_FILES['file2']['name']; 
$tip         =$_FILES['file2']['type']; 
$buyukluk    =$_FILES['file2']['size']; 
$desteklenenformatlar = array ("image/jpeg","image/pjpeg","image/png","image/gif");
$kaydedilecekyer = "/wamp/www";
if (in_array ($tip, $desteklenenformatlar))
{
$isim.=$aisim;
$dosya = $kaydedilecekyer . "/".$isim;
move_uploaded_file ($kaynak, $dosya);
}

if ($madi!="")
{
$sorgu="insert into menu (menu_isim,menu_resim,fiyat,firma_id) values ('".$madi."','".$isim."','".$mfiyat."','".$fkayit[0]."')";
mysql_query($sorgu,$bgln);
$_SESSION['menu_adi']=$madi;
}

?>
<form action="<? $PHP_SELF ?>" method="POST">
<?php
$liste=mysql_query("SELECT * FROM firma WHERE firma_kadi='$admin' and firma_sifre='$pasword'");
$kayit=mysql_fetch_row($liste);
?>
<center>
  <select name="sec">
    <option>Kategori Seçin</option>
    <?php
$kliste=mysql_query("select * from kategori where firma_id='$kayit[0]'");
while ($kkayit=mysql_fetch_row($kliste))
{
?>
    <option value="<? echo "$kkayit[0]"; ?>"><? echo "$kkayit[1]"; ?></option>
    <?php
}
?>
    <input type="submit" value="Tamam" />
  </select>
</center>
</form>
<?php
$secim=$_POST['sec'];
$sorgu=mysql_query("select * from urun where k_id='$sec'");
?>
<form action="<?php $PHP_SELF ?>" method="POST">
 <center> <select name="usec">
    <option>Ürün Seçin</option>
    <?php
while ($ukayit=mysql_fetch_row($sorgu))
{
?>
    <option value="<? echo "$ukayit[1]"; ?>"> <? echo "$ukayit[1]"; ?></option>
    <?php
}
?>
  </select>
  <input type="submit" value="Ekle" /><br />
<a href="fkp.php">veya ekleme</a></center>
</form>
<?php

$u_sec=$_POST['usec'];
$m_sorgu="select * from menu where menu_isim='$menuadi'";
$m_liste=mysql_query($m_sorgu,$bgln);
$m_kayit=mysql_fetch_row($m_liste);
if ($m_kayit[2]=="")
{
$guncelle=("UPDATE menu SET urun1='$u_sec' WHERE menu_id='$m_kayit[0]'");
}
else if ($m_kayit[3]=="")
{
$guncelle=("UPDATE menu SET urun2='$u_sec' WHERE menu_id='$m_kayit[0]'");
}
else if ($m_kayit[4]=="")
{
$guncelle=("UPDATE menu SET urun3='$u_sec' WHERE menu_id='$m_kayit[0]'");
}
else if ($m_kayit[5]=="")
{
$guncelle=("UPDATE menu SET urun4='$u_sec' WHERE menu_id='$m_kayit[0]'");
}
else if ($m_kayit[6]=="")
{
$guncelle=("UPDATE menu SET urun5='$u_sec' WHERE menu_id='$m_kayit[0]'");
}
mysql_query($guncelle,$bgln);

}
?>