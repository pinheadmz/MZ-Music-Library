<? ?>
<!DOCTYPE html>
<html>
<head>
	<title>MZ Music Library</title>
</head>
<body>
<span style="color:red"><i>click to play, right-click to download...</i></span>

<?
	// root music directory
	$msclib = 'musiclib';
	
	function printList($tabLevel, $dirName){
		$dir = opendir($dirName);
		while (false !== ($entry = readdir($dir))){
			if ($entry != '.' && $entry != '..'){
				if ( is_dir(($dirName . '/' . $entry)) ) {
					echo "<h" . (2 + $tabLevel) . ">";
					echo str_repeat("&nbsp;", (5 * $tabLevel));
					echo $entry;
					echo "</h" . (2 + $tabLevel) . ">";
					printList(($tabLevel + 1), ($dirName . '/' . $entry));
				} else {
					echo "<h" . (2 + $tabLevel) . ">";
					echo str_repeat("&nbsp;", (5 * $tabLevel));
					echo "&nbsp;<a href='" . $dirName . "/" . $entry ."' target='player'>[PLAY]</a>&nbsp;";
					echo $entry;
					
					echo "</h" . (2 + $tabLevel) . ">";
				}				
			}		
		}
		closedir($dir);
	}
	
	printList(0, $msclib);


?>
<div id="playerC" style="
						position:fixed;
						width: 320px;
						height: 100px;
						top: 50px;
						right: 50px;
						border: 3px solid black;
						background-color: grey;
						text-align:center;
						overflow: hidden">
	Player!
	<iframe name="player" id="player" style="
											width:100%;
											height: 80px;
											margin: auto;
											border: none"></iframe>
</div>

</body>
</html>
