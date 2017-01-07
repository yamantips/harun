<?php
session_start();
include("f_ayar.php");
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%">
<tr bgcolor="#0066FF"><td align="center">
Firma Adi  
</td><td align="center">
Firma Adres
</td><td align="center">
Firma Telefon
</td><td align="center">
Kullanici Adi
</td><td align="center">
Sifre
</td><td align="center">
Guncelle
</td><td align="center">
Sil
</td></tr>
<?
$admin=$_SESSION['user'];
$pasword=$_SESSION['pasword'];

$sorgu=mysql_query("SELECT * FROM firma WHERE firma_kadi='$admin' and firma_sifre='$pasword'");
$kayit=mysql_fetch_row($sorgu);
if (mysql_num_rows($sorgu)>0)
{
echo "<tr>";
echo "<td align=center>"."$kayit[1]"."</td>";
echo "<td align=center>"."$kayit[2]"."</td>";
echo "<td align=center>"."$kayit[3]"."</td>";
echo "<td align=center>"."$kayit[4]"."</td>";
echo "<td align=center>"."$kayit[5]"."</td>";
?>
<td align="center"><a href="f_form.php? islem=fguncelle& fno=<?php echo "$kayit[0]"; ?>"><img src="guncelle.jpg" /></a></td>
<td align="center"><a href="f_islem.php?islem=fsil& fno=<?php echo "$kayit[0]"; ?>"><img src="sil.jpg" /></a></td>
<?php
echo "</tr>";
}
?>
</table>


</body>
</html>
