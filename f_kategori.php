<?php
session_start();
?>

<html>
<head>

<title>kategori</title>
</head>

<body>
<table width="100%" border="0">
<tr bgcolor="#0066FF"><td align="center">
Kategori Id
</td>
<td align="center">
Kategori Adi
</td>
<td align="center">
Firma Id
</td>
<td align="center">
Güncelle
</td>
<td align="center">
Sil
</td>
</tr>

<?php
$admin=$_SESSION['user'];
$pasword=$_SESSION['pasword'];
include("../yemek_sepeti/yemek_sepeti/yemeksepeti/f_ayar.php");
$sorgu=mysql_query("SELECT * FROM firma WHERE firma_kadi='$admin' and firma_sifre='$pasword'");
$kayit=mysql_fetch_row($sorgu);
$ksorgu=mysql_query("select * from kategori where firma_id='$kayit[0]'");
while ($kkayit=mysql_fetch_row($ksorgu))
{
echo "<tr>";
echo "<td align=center>"."$kkayit[0]</td>";
echo "<td align=center>"."$kkayit[1]</td>";
echo "<td align=center>"."$kkayit[2]</td>";
?>
<td align="center"><a href="../yemek_sepeti/yemek_sepeti/yemeksepeti/f_form.php?islem=kguncelle&amp;kno=<? echo "$kkayit[0]"; ?>"><img src="../yemek_sepeti/yemek_sepeti/yemeksepeti/guncelle.jpg" /></a></td>
<td align="center"><a href="../yemek_sepeti/yemek_sepeti/yemeksepeti/f_islem.php?islem=ksil&amp; kno=<? echo "$kkayit[0]"; ?>"><img src="../yemek_sepeti/yemek_sepeti/yemeksepeti/sil.jpg" /></a></td>
<?php
echo "</tr>";
}
?>
<tr><td>
<a href="../yemek_sepeti/yemek_sepeti/yemeksepeti/f_form.php?islem=kekle">Kategori Ekle</a>
</td></tr>
</table>
</body>
</html>
