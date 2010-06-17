<?
	if(strpos("localhost", $_SERVER['HTTP_HOST']) > -1)
		define("SITE_ROOT", "/media/css3memory/");
	else 
		define("SITE_ROOT", "/css3memory/");
	
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-us">

<head>
	
	<meta charset="utf-8" />
	<meta name="viewport" content="maximum-scale=1.0,initial-scale=1.0" />
	
	<title>CSS3 Memory</title>
	
	<link rel="stylesheet" href="<?=SITE_ROOT; ?>css/layout.css" media="screen" />
 
 	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
 	<script type="text/javascript" src="<?=SITE_ROOT; ?>js/gamelogic-1.0.js"></script>
</head>
<body>

<section class="game">
	
	<section class="information">
		<h1>
			CSS3 Memory
		</h1>
		
		<p>A game of memory in which you will have to find <strong>three matching cards</strong>. (as a tribute to the <abbr title="Cascading Style Sheets">CSS</abbr> level used for the transitions)</p>
		
		<p class="credits">
			Crafted with love by <a href="http://www.maykelloomans.com/">Maykel Loomans</a>. <br />
			Love it? Hate it? Questions? <a href="http://twitter.com/?status=@miekd">Tweet me!</a>
		</p>
	</section>
	
	<section class="gameboard">
		<ul>
		<?
			// 12 card types
				
			$cardtype_count = array(0,0,0,0,0,0,0,0,0,0,0,0,0);
		
			for($i=0; $i<36; $i++)
			{
				$card_selected = false;
			
				while(!$card_selected)
				{
					//$cardtype_count[$c] < 3
				
					$c = rand(1,12);
					
					if($cardtype_count[$c] < 3)
					{
						$current_card = $c;
						$cardtype_count[$c] += 1;
						
						$card_selected = true;
					} else {
					?>
					
					<!-- RETRY! -->
					
					<?
					}
				}
				
				?>
				<li id="card-<?=$i; ?>" class="card card-<?=$c; ?><?=(($rand = rand(1,99))>50) ? " card-alt" : ""; ?>">
					<? // (($rand = rand(1,99))>33) ? (($rand>66) ? " card-alt" : " card-alt2") : ""; ?>
					<span></span>
					<span class="back"></span>
				</li>
				<?
			}
		?>
		</ul>
		
		<p class="win">You won! Woohoo!</p>
	</section>
	
</section>

<footer><p><a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/"></a><br /><span xmlns:dc="http://purl.org/dc/elements/1.1/" href="http://purl.org/dc/dcmitype/InteractiveResource" property="dc:title" rel="dc:type">CSS3 Memory</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="http://www.miekd.com/" property="cc:attributionName" rel="cc:attributionURL">Maykel Loomans</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution-Share Alike 3.0 Unported License</a>.</p></footer>

</body>
</html>