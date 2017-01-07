<?php
session_start();
$admin=$_SESSION['user'];
$pasword=$_SESSION['pasword'];
include("f_ayar.php");

$sorgu="select * from firma where firma_kadi='$admin' and firma_sifre='$pasword'";
$liste=mysql_query($sorgu,$bgln);
$kayit=mysql_fetch_row($liste);

$msorgu="select * from menu where firma_id='$kayit[0]'";
$mliste=mysql_query($msorgu,$bgln);
while ($mkayit=mysql_fetch_row($mliste))
{
?>
<hr size="5" color="#0000FF" />
<table>
<tr><td><img src="<?php echo "$mkayit[7]"; ?>" /></td>
<td>

<table>
<tr><td>
<font color="#FF0000" size="5"><b><?php echo "$mkayit[1]"; ?></b></font>
</td>
<td>
<font color="#0000FF" size="3"><?php echo "$mkayit[2]"; ?></font>
</td>
<td>
<font color="#0000FF" size="3"><?php echo "$mkayit[3]"; ?></font>
</td>
<td>
<font color="#0000FF" size="3"><?php echo "$mkayit[4]"; ?></font>
</td>
<td>
<font color="#0000FF" size="3"><?php echo "$mkayit[5]"; ?></font>
</td>
<td>
<font color="#0000FF" size="3"><?php echo "$mkayit[6]"; ?></font>
</td>
<td>
<font color="#FF0000" size="5"><?php echo "$mkayit[8]"; ?>&nbsp; TL</font>
</td></tr>
</table></td>
<td></td>
<td align="center"><a href="f_islem.php?islem=msil& mno=<?php echo "$mkayit[0]"; ?>"><img src="msil.jpg" alt="MENU SIL" /></a></td>
</tr></table>

<br />
<a href="f_form.php?islem=mekle">Menü olustur</a>