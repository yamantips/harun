<?
include("f_ayar.php");
mysql_query("SET NAMES 'latin5'"); 
mysql_query("SET CHARACTER SET latin5"); 
mysql_query("SET COLLATION_CONNECTION = 'latin5_turkish_ci'"); 

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<center><b><u><h4>Firma Kayit Formu</h4></u></b></center>
<form id="form1" name="form1" method="post" action="f_kayittamam.php">

<table border="0" align="center">
<tr><td width="95" align="right">
Firma Adi </td>
<td width="6"></td>
<td width="161">
<input type="text" name="f_adi" /></td></tr>
<tr><td align="right">
Firma Adresi </td><td></td>
<td>
<textarea name="f_adres"></textarea></td></tr>
<tr><td align="right">
Firma Telefonu </td><td></td>
<td>
<input type="text" name="f_tel" /></td></tr>
<tr><td align="right">
Kullanici Adi </td><td></td>
<td>
<input type="text" name="kadi" /></td></tr>
<tr><td align="right">
Sifre </td><td></td>
<td>
<input type="text" name="sifre" /></td></tr>
<tr><td></td><td></td>
<td align="center">
<input type="submit" value="Kaydet" /></td></tr>
</table>
</form>

</body>
</html>
