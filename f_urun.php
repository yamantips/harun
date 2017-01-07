<?
session_start();
$admin=$_SESSION['user'];
$pasword=$_SESSION['pasword'];
include("f_ayar.php");
?>

<table width="100%">

<?
$liste=mysql_query("SELECT * FROM firma WHERE firma_kadi='$admin' and firma_sifre='$pasword'");
$kayit=mysql_fetch_row($liste);
$firma_id=$kayit[0];
$kliste=mysql_query("select * from kategori where firma_id='$firma_id'");
while ($kkayit=mysql_fetch_row($kliste))
{
?>
<tr bgcolor="#0066FF"><td align="center">
Ürün Id
</td>
<td align="center">
Ürün Adi
</td>
<td align="center">
Ürün Fiyat
</td>
<td align="center">
Ürün Resim
</td>
<td align="center">
Kategori Id
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
<?
$sorgu=mysql_query("select * from urun where k_id='$kkayit[0]'");
while ($ukayit=mysql_fetch_row($sorgu))
{
echo "<tr>";
if ($ukayit[0]=="")
echo "<td align=center>"."Bos</td>";
else
echo "<td align=center>"."$ukayit[0]</td>";
if ($ukayit[1]=="")
echo "<td align=center>"."Bos</td>";
else
echo "<td align=center>"."$ukayit[1]</td>";
if ($ukayit[2]=="")
echo "<td align=center>"."Bos</td>";
else
echo "<td align=center>"."$ukayit[2]</td>";
if ($ukayit[3]=="")
echo "<td align=center>"."Bos</td>";
else
{
echo "<td align=center>";
?>
<img src="<? echo $ukayit[3]; ?>" />
<?
echo "</td>";
}
if ($ukayit[4]=="")
echo "<td align=center>"."Bos</td>";
else
echo "<td align=center>"."$ukayit[4]</td>";
if ($ukayit[5]=="")
echo "<td align=center>"."Bos</td>";
else
echo "<td align=center>"."$ukayit[5]</td>";
?>
<td align="center"><a href="f_form.php? islem=uguncelle& uno=<? echo "$ukayit[0]"; ?>"><img src="guncelle.jpg" /></a></td>
<td align="center"><a href="f_islem.php?islem=usil& uno=<? echo "$ukayit[0]"; ?>"><img src="sil.jpg" /></a></td>
<?
echo "</tr>";
}}
?>
<tr><td>
<a href="f_form.php?islem=uekle">Ürün Ekle</a>
</td></tr>
</table>
</body>
</html>
