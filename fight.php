<?php
include "include".DIRECTORY_SEPARATOR."header.php";
topHeader("Result of Fight");

if (isset($_POST['submit'])){
	if (!empty($_POST['fighters'])&&!empty($_POST['health'])&&!empty($_POST['attack'])&&!empty($_POST['resistance'])){
		$fighter=explode(',', $_POST['fighters']);
		$master=['health'=>$_POST['health'],'attack'=>$_POST['attack'],'resistance'=>$_POST['resistance']];
		
		$hits_by_fighters=0;
		$hits_by_master=0;
		$current_fighter=0;
		$is_master_dead=false;
		$total_damage_fighter=0;
		$total_damage_master=0;
		while (true) {
			//това е масива за всички битки, който продължава докато файтърите или мастера не умрат
			$fighter_real=[];
			switch ($fighter[$current_fighter]) {
				case '"a"':
					$fighter_real['health']=5;
					$fighter_real['attack']=6;
					$fighter_real['resistance']=2;
					break;
				case '"b"':
					$fighter_real['health']=6;
					$fighter_real['attack']=8;
					$fighter_real['resistance']=2;
					break;
					case '"g"':
					$fighter_real['health']=8;
					$fighter_real['attack']=6;
					$fighter_real['resistance']=5;
					break;
			}
			while (true) {
				//това е отделна битка
				$damage_fighter=$fighter_real['attack']-$master['resistance'];//изчисляваме силата на удара на файтъра
				$total_damage_fighter+=$damage_fighter;
				$hits_by_fighters++;
				$master['health']-=$damage_fighter;//вадим от здравето на мастъра силата на удара
				if ($master['health'] <= 0){  // ако това е вярно, то мастера е умрял
					$is_master_dead=true;
					break;
				}
				$damage_master=$master['attack']-$fighter_real['resistance'];//изчисляваме силата на удара на мастера
				$total_damage_master+=$damage_master;
				$hits_by_master++;
				$fighter_real['health']-=$damage_master; // вадим от здравето на текущия файтър удара на мастера
				if ($fighter_real['health'] <= 0) {//проверяваме дали текущия файтер е умрял
					break;
				}
			}
			if ($is_master_dead==true) {
				break;
			}
			$current_fighter++;//с това отиваме към следващия файтър в масива;
			if ($current_fighter == sizeof($fighter)){
				// това означава , че сме стигнали до последния файтър
				break;
			}

	}
	$result=[];

	if($is_master_dead == false){
		$result[0] ="Master";
	} else{
		$result[0]= "Fighters";
	}
	$result[1]= $current_fighter ; //Колко обити има
	$result[2]=sizeof($fighter)-$current_fighter; // Колко са живите ако мастъра е победен
	$result[3]=$master['health']; // Колко живата остават на мстъра
	$result[4]=$hits_by_fighters; // Колко удара е поел мастъра от боиците
	$result[5]=$hits_by_master; // Колко удара е нанесъл мастъра
	$result[6]=round($total_damage_fighter/$hits_by_fighters,2); //Средна щета на боиците върху мастъра
	$result[7]=round($total_damage_master/$hits_by_master,2); //Средна щета на мастъра върху боиците
?>
<div class="table-responsive-md">
<table class="table">
	<thead>
	<tr>
		<th scope="col">The winner is the</th>
		<th scope="col">Defeated fighters</th>
		<th scope="col">Fighters remain</th>
		<th scope="col"d>Master health</th>
		<th scope="col">Hits by fighters</th>
		<th scope="col">Hits by Master</th>
		<th scope="col">AVG damage dealt by Fighters</th>
		<th scope="col">AVG damage dealt by Master</th>
	</tr>
	</thead>
	<tbody>
	<tr>
<?php
for($i = 0; $i <count($result); $i++){
	echo "<td>".$result[$i]."</td>";
}
?>
</tr>
</tbody>
</table>
</div>
<?php	
}
else{
	echo "<h1 class='text-danger text-center'>Please input data</h1>";
	header('refresh:1; url=index.php');
}
	}

?>
