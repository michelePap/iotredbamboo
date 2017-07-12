<?php
session_start();
?>
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
                <a class="navbar-brand" href="index.html">IoT RED BAMBOO SOFTWARE</a>
            </div>
            <!-- /.navbar-header -->
                <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
						<?php
                        $usermenu = '<li><a><i class="fa fa-user fa-fw"></i> Ciao, ';
                        echo $usermenu;
                        $username = $_SESSION['username'];
                        echo htmlspecialchars($username);
                        $end = ' ! </a>';;
                        echo $end;
                        
						?>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../../index.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

 <div id="wrapper" class="ambienti">
            <div class="row ">
                <div class="col-lg-12 ">
                    <h1 class="page-header">Ambienti</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<?php

						include '../../model/visualizzaAmbienti.php';
						echo '<div class="row">';
						$RisultatoAmbientiUtente = interrogazioneAmbientiUtente($_SESSION['username']);
						
						foreach ($RisultatoAmbientiUtente as $AmbientiUtente){

                            $list = '<div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-industry fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="nomeAmbiente">' . $AmbientiUtente['NomeAmbiente'] . '</div>
                                            <div class="tipologiaAmbiente">' . $AmbientiUtente['TipologiaAmbiente'] . '</div>        
                                        </div>
                                    </div>
                                </div>            
                                <div class="panel-footer">
                                    <a href="SensoriUtente.php?idAmbiente=' . $AmbientiUtente['IdAmbiente'] . '">Visualizza dati sensori</a>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>';
			
							echo $list;
							
				}
				?>
        
    </div>
    
    <!-- jQuery -->
    <script src="../../js/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap/bootstrap.min.js"></script>

  

</body>

</html>
