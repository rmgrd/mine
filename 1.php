<center>
	<br><b>Daj cos prosze</b><br><br><br><br>
	
	<?php
	if(isset($_POST['buyItem']) && isset($_POST['playerName'])){
		
		$itemID = $_POST['buyItem'];
		$playerName = $_POST['playerName'];
		
		if($itemID == null) die("Wybierz opcje");
		if($playerName == null) die("Napisz nazwe gracza");
				
		require_once("WebsenderAPI.php"); 
		
		$host = "127.0.0.1"; $password = "1231"; $port = 9876;
		$wsr = new WebsenderAPI($host,$password,$port); 
		
		if($wsr->connect()){ 
			
			echo "<b>$itemID Zrobione!</b><br><br>";
			
			if($itemID == "Chest") $itemName = "chest";
			elseif($itemID == "IronSword") $itemName = "iron_sword";
			elseif($itemID == "ChestPlate") $itemName = "iron_chestplate";
			else die("This not a item!");
			
			$wsr->sendCommand("give $playerName $itemName 1");
			
		}else{
			echo "<b>ERROR: Error zobacz ip albo jaki port</b><br><br>";
		}
		
		$wsr->disconnect();
	}
	?>
	<form method="POST">

		nazwa gracza: <input type="text" name="playerName" value=""><br><br>
		wybierz item:<br>
		<input type="submit" name="buyItem" value="Srebna klata">
		<input type="submit" name="buyItem" value="zelazny miecz">
		<input type="submit" name="buyItem" value="skrzynia ">

	</form>
</center>