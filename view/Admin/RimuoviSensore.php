			<!DOCTYPE html>
			<html lang="it">
			
			<head>
			
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta name="description" content="">
				<meta name="author" content="">
			
				<title>IoT RED BAMBOO SOFTWARE</title>
			
				<!-- Bootstrap Core CSS -->
				<link href="../../css/bootstrap.css" rel="stylesheet">
				
				<!-- Custom CSS -->
				<link href="../../css/stilePersonalizzato.css" rel="stylesheet">
				<link href="../../css/sb-admin-2.css" rel="stylesheet">
				
				<!-- Custom Fonts -->
				<link href="../../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
				
				<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
				<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
				<!--[if lt IE 9]>
					<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
					<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
				<![endif]-->
			
			   
			</head>
			
			<body>
			
				<div id="wrapper" >
			
					<!-- Navigation -->
					<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
						<div class="navbar-header">
							<a class="navbar-brand" href="HomeAdmin.php">IoT RED BAMBOO SOFTWARE</a>
						</div>
						<!-- /.navbar-header -->
							<ul class="nav navbar-top-links navbar-right">
						
							<!-- /.dropdown -->
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="">
									<i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i>
								</a>
								<ul class="dropdown-menu dropdown-user">
									<li>
										<a><i class="fa fa-user fa-fw"></i> Ciao, Admin ! </a>
									</li>
									<li class="divider"></li>
									<li><a href="../../index.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
									</li>
								</ul>
							</li>
							
						</ul>
					</nav>
			
				 <div id="wrapper" class="ambienti">
						  <div class="row">
							</br>
							</br>
							</br>
							<form action="../../controller/RimuoviSensore.php" method="post">
					<div class="col-lg-7 col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
							   <h1 >Rimuovi Sensore &nbsp<i class="fa fa-thermometer tipologiaAmbiente">  </i></h1>
							</div>
							<div class="panel-heading">
								
								<div class="row">
									<div class="col-xs-3">
										<label>Sensori</label>
									</div>
									
										<div class="col-xs-9 text-right">
												<select class="form-control" name="IdSensore">
															<?php
															include '../../model/visualizzaSensori.php';
															include '../../model/decodificaStringaSensori.php';

															$RisultatoSensori = interrogazioneSensoriAdmin();

															foreach ($RisultatoSensori as $SensoriAdmin) {

																$StringaDati = $SensoriAdmin['StringaDati'];
																$TipoSensore = interrogazioneTipoSensore($StringaDati);
																$MarcaSensore = interrogazioneMarcaSensore($StringaDati);
																$Sensori = $SensoriAdmin['IdSensori'];
																$NomeAmb = $SensoriAdmin['NomeAmbiente'];

																$list = '<option>' . htmlspecialchars($Sensori) . '_' . htmlspecialchars($MarcaSensore) . '_' . htmlspecialchars($TipoSensore) . '_' . htmlspecialchars($NomeAmb) . '</option>';
																echo $list;
															}
															
															?>
												 </select>
												<input type="hidden" value="token" name="CsrfToken">
												</br>
											</div>
									</div>
								<div class="row">
									<div class="col-xs-12 text-right">
										<div class="form-group">
											<button type="submit" class="btn btn-default">Elimina Sensore</button>
											<button type="reset" class="btn btn-default">Resetta</button>
											</div>
									</div>
								</div>
					
							</div>
							
						</div>
						</div>
					</form>
					</div>
									
						<!-- /.row -->
					
					
				</div>
				
				<!-- jQuery -->
				<script src="../../js/jquery/jquery.min.js"></script>
			
				<!-- Bootstrap Core JavaScript -->
				<script src="../../js/bootstrap/bootstrap.min.js"></script>
			
			  
			
			</body>
			
			</html>
