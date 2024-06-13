<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <!--
    Created by Artisteer v3.0.0.38499
    Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
    -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Home</title>
    <meta name="description" content="Description" />
    <meta name="keywords" content="Keywords" />


    <link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->

    <script type="text/javascript" src="../jquery.js"></script>
    <script type="text/javascript" src="../script.js"></script>
    <script type="text/javascript">
    function fokus(){
		$("#textusername").focus();
		}
    </script>
</head>
<body onload="fokus();">
<div id="art-page-background-glare">
    <div id="art-page-background-glare-image"> </div>
</div>
<div id="art-main">
    <div class="art-sheet">
        <div class="art-sheet-tl"></div>
        <div class="art-sheet-tr"></div>
        <div class="art-sheet-bl"></div>
        <div class="art-sheet-br"></div>
        <div class="art-sheet-tc"></div>
        <div class="art-sheet-bc"></div>
        <div class="art-sheet-cl"></div>
        <div class="art-sheet-cr"></div>
        <div class="art-sheet-cc"></div>
        <div class="art-sheet-body">
            <div class="art-header">
                <div class="art-header-clip">
                <div class="art-header-center">
                    <div class="art-header-png"></div>
                </div>
                </div>
                <div class="art-headerobject"></div>
                <div class="art-logo">
               <img width="140" height="140" src="../images/logo-kota.png" style="position:absolute; float:left; top:-50px; left:-180px;" />
                                 <h1 class="art-logo-name"><a href="../index.html">PEMERINTAH KOTA LHOKSEUMAWE <br />DINAS PENDIDIKAN PEMUDA DAN OLAHRAGA</a></h1>
                                                 <h2 class="art-logo-text">Sistem Informasi Pelayanan Sertifikasi Guru</h2>
                                </div>
            </div>
            <div class="cleared reset-box"></div><div class="art-nav">
	<div class="art-nav-l"></div>
	<div class="art-nav-r"></div>
<div class="art-nav-outer">
	<? include "menu.php"; ?>
</div>
</div>
<div class="cleared reset-box"></div>
<div class="art-content-layout">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell art-content">
<div class="art-post">
    <div class="art-post-body">
<div class="art-post-inner art-article">
<div class="art-postcontent">
<br /><br />
<div align="center">                                
<form name="form1" id="form1" onsubmit="return validasi(this);" method="post" action="do_login.php" >
<div style="width:200px; text-align:left;">NUPTK&nbsp;<input type="text" name="textusername" size="20" placeholder="Nama Pengguna" id="textusername" /></div>

<br />
<div style="width:200px; text-align:left;">Password&nbsp;<input type="password" name="textpassword" size="20" placeholder="Password" /></div>
<br />
<input type="submit" value="Login" /> 
</form>
</div>
                <div class="cleared"></div>
                </div>

		<div class="cleared"></div>
    </div>
</div>

                      <div class="cleared"></div>
                    </div>
                </div>
            </div>
            <div class="cleared"></div>
            <div class="art-footer">
                <div class="art-footer-t"></div>
                <div class="art-footer-l"></div>
                <div class="art-footer-b"></div>
                <div class="art-footer-r"></div>
                <div class="art-footer-body">
                            <div class="art-footer-text">
                                
<p><br /></p>
<p>Copyright © 2014. Dinas Pendidikan Pemuda dan Olahraga Kota Lhokseumawe All Rights Reserved.</p>


                                                            </div>
                    <div class="cleared"></div>
                </div>
            </div>
    		<div class="cleared"></div>
        </div>
    </div>
    <div class="cleared"></div>
    <p class="art-page-footer"><a href="http://www.artisteer.com/?p=website_templates">Website Template</a> created with Artisteer.</p>
</div>

</body>
</html>
