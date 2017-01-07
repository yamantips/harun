<?
session_start();
include("f_ayar.php");

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>D O Y A M A D I M . C O M</title>
<style type="text/css">
body {
	background-color: #ECECEC;
}
.style1 {color: #FFFFFF}
-->
</style></head>

<body>
<table width="75%" height="80%" border="0" align="center" bgcolor="#663333">
  <tr>
    <td width="20%" rowspan="2" valign="top">
	
	<table height="100%" width="100%">
	<tr><td>
	<img align="top" src="logo_ys.jpg" />	
	</td></tr>
	<tr><td bgcolor="#CC9900">
	<? include("f_giris.php"); ?>
	</td></tr></table>
	
	</td>
    <td width="80%" height="29" valign="top">
	
	<table width="100%" height="48%">
	<tr><td valign="top">
	  <div align="center"><a href="index.php" class="style1">Anasayfa</a>	      </div></td><td valign="top">
	        <div align="center"><a href="f_listele.php" target="cerceve" class="style1">Menü Seç</a>                    </div></td><td valign="top">
			<div align="center"><a href="f_kayit.php" target="cerceve" class="style1">Firma Kay&#305;t </a> </div>
	  </td></tr></table>
	
	</td>
  </tr>
  <tr>
    <td>
	
<iframe width="100%" height="100%" align="top" src="anasayfam.php" frameborder="0" scrolling="auto" name="cerceve" style="background-color:#FFFFFF">	</iframe>
	</td>
  </tr>
</table>
</body>
</html>
