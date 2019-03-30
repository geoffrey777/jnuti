<?php session_start(); ?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8"/>
		<title> Accueil </title>
		<link rel="stylesheet" href="style/style.css" />
		<link rel="icon" type="image/png" href="http://mathland.ddns.net/favicon.png" />

	</head>

	<body class="index">
	
		<?php include("header.php"); ?>

		<!-- Annivs -->
		<?php
			$date=date("d m");
			if ($date=="16 05" OR $date=="25 12" OR $date=="05 10" OR $date=="11 09" OR $date=="25 01")
				{
		?>
				</br>
				<div style="display:normal; background-color:black; text-align:center;">
				<p style="font-size:100px; color:yellow; text-align:center;"><span style="text-decoration: blink;">JOYEUX JNUT D'ANNIVERSAIRE !!</span></p>
				</div>
		<?php		
				}
		?>

		<!-- Reset bide -->
		<?php
			$bouffes=array("tacos.txt", "kfc.txt", "pizza.txt", "kebab.txt", "burger.txt", "cafette.txt", "cantine.txt", "pauvre.txt");
			if (date("N")==6)
				{
				foreach($bouffes as $bouffe)
					{
					$lien="pages/BAJ/bide/".$bouffe;
					$fichier=fopen($lien, "r+");
					ftruncate($fichier, 0);
					fwrite($fichier, 0);
					fclose($fichier);
					}
				}
		?>

		<!-- Admin autologin -->
		<?php
			if (($_SERVER['REMOTE_ADDR']=="66.249.93.57"
			OR $_SERVER['REMOTE_ADDR']=="mathland.ddns.net" OR $_SERVER['REMOTE_ADDR']=="88.163.146.166") AND $_POST["deco"]!=1)
				{
				$_SESSION["admin"]=1;
				}
		?>

		<!-- Déconnexion -->
		<?php
			if ($_POST["deco"]==1)
				{
				$_SESSION["admin"]=0;
				}
		?>

		<div>

			<?php include("navindex.php"); ?>

			<section>

			<!-- Chopper l'ip -->
			<?php
				if ($_POST["admin"]=="codespaghetti")
					{
					$_SESSION["admin"]=1;
					}
				elseif (isset($_POST["admin"]))
					{
					echo "<p>Mot de passe invalide<br/>";
					$ip=$_SERVER['REMOTE_ADDR'];
					echo "Votre ip est : $ip</p>";
					$ips=fopen("listeip.txt", "a+");
					if (fgets($ips, 10)=="")
						{
						fwrite ($ips, $ip);
						}
				else 
					{
					fwrite ($ips, "\n$ip"); }
					fclose($ips);
					}
			?>

				<article>
					<h1> Bienvenue sur <?php if($_SESSION["admin"]==1){ echo "votre site Mathland cher créateur";} else{ echo "Mathland";}?></h1>
					<h2> Actualité ! </h2>
					<iframe width="420" height="315" src="https://www.youtube.com/embed/1k50apn2B9o" frameborder="0" allowfullscreen></iframe>
					<p> 
						Notre objectif est simple : livrer un bilan vulgarisé de nos connaissances ou expériences ayant attrait aux sciences.  En clair vous faire partager cette curiosité qui nous anime, cette verve qui pousse des milliers d’hommes et de femmes dans le monde : COMPRENDRE ! <br/>
Voilà un mot résumant parfaitement la motivation du scientifique… Comprendre le fonctionnement de ce qui nous entoure. Avec les sciences expérimentales telles que la <a href="/pages/physique/pindex.php"> physique </a>, la chimie, la biologie ou la géologie. Parmi ces empiristes, un petit groupe, ont troqué leurs blouses contre des craies blanches… Transcendant la réalité du quotidien, ils recherchent l’abstraction : un univers où se conjugue quantités infinies et géométrie parfaite : <a href="pages/maths/mindex.php">La Mathématique</a>. <br/>
Elle est au coeur des autres sciences et semble être indispensable pour comprendre, modéliser, simplifier et hiérarchiser notre monde chaotique. Elle semble être le socle sur lequel repose l’univers. Il est donc évident que nos créations soient emplies de son empreinte… Que ce soit dans l’ingénierie, <a href = "pages/aero/aindex.php"> l’aéronautique </a>, <a href="pages/info/iindex.php"> l’informatique</a>, la programmation… Tous ces domaines s’appliquent sur la logique « mathématique » élancée par Aristote, puis complétée et remise en question par des logiciens tel que Gödel (contemporains à Einstein).<br/>
Ainsi vous retrouverez sur ce site quelques domaines, vous permettant, on l’espère, d’apprécier, du moins d’approcher, la puissance de la Mathématique.<br/>
Mais aussi et surtout de la machinerie intellectuelle de chacun de nous, qui a permis, qui permet et qui permettra l’essor aux yeux de tous de l’essence même de ce monde.<br/>
<br/>
Vous souhaitant une agréable navigation sur notre site, en espérant que vous nous concéderez volontiers quelques<a href="pages/BAJ/bindex.php"> excés de légèreté…  </a> après tout même les plus grands scientifiques savaient plaisanter !<br/>
<br/>
L’équipe rédactrice de Mathland

						<?php
							if ($_SESSION["admin"]!=1)
								{
						?>
								<form style="display:inline; text-align:right;" method="post" action="index.php">
									<p>su :<input type="password" name="admin" />
									<input type="submit" value="Login" />
									</p>
								</form>
							<?php 
								}
							else 
								{
							?>
								<form style="display:inline; text-align:right;" method="post" action="index.php">
									<p>
									<input type="hidden" name="deco" value=1/>
									<input type="submit" value="Logout" />
									</p>
								</form>	
						<?php 
								} 
						?>
					</p>
				</article>
			</section>
		</div>
	</body>
</html>