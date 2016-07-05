<?php /** --- about.php --- **/
	require_once './codePiece/session.php';
	require_once './codePiece/intro.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>LMS Security Systems</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="images/styles.css" type="text/css" />
        <script type="application/javascript" src="library/graphics.js" ></script>
    </head>
	
	<body>
	<div id="wrap">
        <?php require_once './codePiece/header.php'; ?>

        <div id="content-wrap">
            <img src="images/security.jpg" width="950" height="250" alt="headerphoto" class="no-border" />
            <?php require_once './codePiece/sidebar.php'; ?>
    		
    		<div id="main">
				<?php require_once './codePiece/noscript.php';	?>
      			<h1><span class="gray">Some</span> <span class="darkgray">Additional</span> Informations</h1>
                <p>Our project is a security system based on Microsoft .NET Gadgeteer, developed mainly in C# using the .NET framework v4.3 (for server side) and the .NET Micro Framework v4.3 (for the client side). To perform image processing in the server side, we chose to use the AForge.NET library (that is available under the terms of GNU General Public License).</p>
                <p>Microsoft <strong>.NET Gadgeteer</strong> is an open-source toolkit for building small electronic devices using the .NET Micro Framework. It combines the advantages of object-oriented programming, solderless assembly of electronics, and support for customizable physical design.</p>
                <p>The <strong>.NET Framework</strong> is a software framework developed by Microsoft that runs primarily on Microsoft Windows composed mainly by two modules: The Framework Class Library (FCL) and the Common Language Runtime (CLR).<br>
                    The Framework Class Library is a large class library that provides language interoperability (each language can use code written in other languages) across several programming languages. Programs written for .NET Framework are executed in a software environment known as Common Language Runtime, an application virtual machine that provides services such as security, memory management, and exception handling. For that reason, the code written using .NET Framework is called "managed code".</p>
                <p>The <strong>.NET Micro Framework</strong> (also called NETMF) is an open-source .NET platform for resource-constrained devices with at least 256 KB of flash memory and 64 KB of RAM. It includes a small version of the .NET CLR and supports development in C#, Visual Basic .NET, and debugging (in an emulator or on hardware) using Microsoft Visual Studio. NETMF has a subset of the .NET base class libraries, an implementation of Windows Communication Foundation (WCF), a GUI framework loosely based on Windows Presentation Foundation (WPF), and a Web Services stack based on SOAP and WSDL. NETMF also features additional libraries specific to embedded applications. The .NET Micro Framework aims to make embedded development easier, faster, and less expensive by giving embedded developers access to the modern technologies and tools used by desktop application developers. Additionally, it allows desktop .NET developers to use their skills in the embedded world, enlarging the pool of qualified embedded developers.</p>
                <p><strong>AForge.NET</strong> is an open source C# framework with several image processing functionalities designed for developers and researchers in the fields of Computer Vision and Artificial Intelligence originally developed by Andrew Kirillov for the .NET Framework.</p>
                <br>
                <h2>Our Project</h2>
                <img src="images/physical_project.jpeg" width="617" height="387" alt="Picture of our project." class="no-border" style="margin:0 0 30px 0;" />
                <br>
                <p> <span style="color:red">Disclaimer</span>:<br> All pictures present in the website are not of our property. We do not hold any rights on them.</p>
                <br>
				<div class="maps">
					<h2>Where to find us</h2>
					<p><strong>LMS Security Systems</strong> <br> Corso Inghilterra, 25 - Turin - Italy</p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3675.156520999295!2d7.663592903808626!3d45.073405913507976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47886d0586cd8db7%3A0xc2ecb5447b50cf7c!2sCorso+Inghilterra%2C+25%2C+10138+Torino!5e0!3m2!1sit!2sit!4v1467736609274" width="500" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
                <BR>
      		</div>
		</div>
		<?php include_once './codePiece/footer.php'; ?>
	</div>
    <script type="text/javascript">
        setCurrent(document.getElementById("About"));
        setSpan(document.getElementById("about"), "About");
    </script>
	</body>
</html>
