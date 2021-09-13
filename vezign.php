<?php	
	session_start(); 
	require_once("dbcontroller.php");
	$db_handle = new DBController();
	if (!isset($_SESSION['username'])) {
		header("location:index.php");
	}
	require_once("perpage.php");
	$nume = "";
	$id = "";
	$status_client = "";
	
	$queryCondition = "";
	if(!empty($_POST["search"])) {
		foreach($_POST["search"] as $k=>$v){
			if(!empty($v)) {

				$queryCases = array("denumire_client","agent_nova","id");
				if(in_array($k,$queryCases)) {
					if(!empty($queryCondition)) {
						$queryCondition .= " AND ";
					} else {
						$queryCondition .= " WHERE ";
					}
				}
				switch($k) {
					case "denumire_client":
						$nume = $v;
						$queryCondition .= "denumire_client LIKE '" . $v . "%'";
						break;
					case "agent_nova":
						$code = $v;
						$queryCondition .= "agent_nova LIKE '" . $v . "%'";
						break;
					case "id":
						$code = $v;
						$queryCondition .= "id LIKE '" . $v . "%'";
						break;
				}
			}
		}
	}
	$orderby = " ORDER BY id asc"; 
	$sql = "SELECT * FROM clientign " . $queryCondition;
	$href = 'vezign.php';					
		
	$perPage = 50;  
	$page = 1;
	if(isset($_POST['page'])){
		$page = $_POST['page'];
	}
	$start = ($page-1)*$perPage;
	if($start < 0) $start = 0;
	$query =  $sql . $orderby .  " limit " . $start . "," . $perPage; 
	$result = $db_handle->runQuery($query);
	
	if(!empty($result)) {
		$result["perpage"] = showperpage($sql, $perPage, $href);
	}

	if(isset($_POST["export"])) {
		$query2 = "SELECT * FROM clientign";
		$result2 = $db_handle->executeQuery($query2);
		$fisier = "clienti-GN-nova".date('d-m-Y').".xls";
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename='.$fisier);
		$heading = false;
		if(!empty($result2)) {
			foreach ($result2 as $k) {
				if(!$heading) {
					echo implode("\t", array_keys($k)) . "\n";
					$heading = true;
				}
				
				echo implode("\t", is_array($k)? array_values($k) :$k) . "\n";
				error_reporting(0);

			}
		}

		exit();
	}
?>
<html>
	<?php include "header.php" ?>
	<body>
<div class='dashboard'>
	<div class="dashboard-nav">
        <header>
			<a href="" class="brand-logo"><span>Nova Power&Gas</span></a>
		</header>
		<nav class="dashboard-nav-list">
			<a href="admin.php" class="dashboard-nav-item">Panou principal</a>
			<a href="adauga_client.php" class="dashboard-nav-item">Adauga client dual</a>
			<a href="adauga_clientEE.php" class="dashboard-nav-item">Adauga client EE</a>
			<a href="adauga_clientGN.php" class="dashboard-nav-item">Adauga client GN</a>
			<a href="veziee.php" class="dashboard-nav-item">Vezi clienti EE</a>
			<a href="vezign.php" class="dashboard-nav-item active">Vezi clienti GN</a>
			<a href="profitagenti.php" class="dashboard-nav-item ">Profit agenti EE</a>
			<a href="profitagentiGN.php" class="dashboard-nav-item ">Profit agenti GN</a>
          	<div class="nav-item-divider"></div>
         	<a href="logout.php" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
        </nav>
    </div>
    <div class='dashboard-app'>
        <div class='dashboard-content'>
            <div class='container'>
                <div class='card'>
                    <div class='card-header'>
                        <h1>Vezi clienti Gaze Naturale</h1>
                    </div>
                    <div class='card-body'>
						<form name="" method="post" action="vezign.php">
							<div class="mb-3">
							<p>
								<input type="text" placeholder="Denumire Client" name="search[denumire_client]" class="form-control-sm" value="<?php echo $nume; ?>"/>
								<input type="text" placeholder="Agent" name="search[agent_nova]" class="form-control-sm" value="<?php echo $id; ?>"/>
								<input type="text" placeholder="ID" name="search[id]" class="form-control-sm" value="<?php echo $status_client; ?>"/>
								<input type="submit" name="go" class="btn btn-danger mb-1" value="Cautare">
								<input type="submit" name="export" class="btn btn-danger mb-1" value="Export">
								<input type="reset" class="btn btn-danger mb-1" value="Reset" onclick="window.location='vezign.php'">
							</p>
							</div>
							
							<table class="table">
								<thead>
									<tr>
									<th scope="col"><strong>Id</strong></th>
									<th scope="col"><strong>Denumire client</strong></th>          
									<th scope="col"><strong>Status client</strong></th>
									<th scope="col"><strong>Tip client</strong></th>
									<th scope="col"><strong>Nr. contract</strong></th>
									<th scope="col"><strong>tip_pret</strong></th>
									<th scope="col"><strong>Data intrare in vigoare</strong></th>
									<th scope="col"><strong>Data finalizare contract</strong></th>
									<th scope="col"><strong>Agent</strong></th>
									<th scope="col"><strong>Email contact</strong></th>
									<th scope="col"><strong>Modifica</strong></th>
									<th></th>									
									</tr>
								</thead>
								<tbody>
									<?php
									if(!empty($result)) {
										foreach($result as $k=>$v) {
										if(is_numeric($k)) {
									?>
									<tr>
									<td><?php echo $result[$k]["id"]; ?></td>
									<td><?php echo $result[$k]["denumire_client"]; ?></td>
									<td><?php echo $result[$k]["status_client"]; ?></td>
									<td><?php echo $result[$k]["tip_client"]; ?></td>
									<td><?php echo $result[$k]["nr_contract"]; ?></td> 
									<td><?php echo $result[$k]["tip_pret"]; ?></td> 
									<td><?php echo $result[$k]["data_intrare_ct"]; ?></td> 
									<td><?php echo $result[$k]["data_finalizare_ct"]; ?></td> 
									<td><?php echo $result[$k]["agent_nova"]; ?></td> 
									<td><?php echo $result[$k]["email_contact"]; ?></td> 
									<td>
										<a class="btn btn-dark btn-sm" href="actualizeazaGN.php?id=<?php echo $result[$k]["id"]; ?>">Actualizeaza</a> 
									</td>
									<td>
										<a class="btn btn-dark btn-sm" href="act_aditionalGN.php?id=<?php echo $result[$k]["id"]; ?>">AA</a> 
										<!-- <a class="btn btn-dark btn-sm" href="stergegn.php?action=delete&id=<?php echo $result[$k]["id"]; ?>">Sterge</a> -->
									</td>
									</tr>
								<tbody>
									
									<?php
										}
									}
									}
									if(isset($result["perpage"])) {
									?>
									<?php echo $result["perpage"]; ?>			
									<?php } ?>
									
							</table>
						</form>	
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        
			
		</div>
	</body>
</html>