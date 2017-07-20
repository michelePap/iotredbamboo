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
                    <a class="navbar-brand" href="HomeAdmin.php">IoT RED BAMBOO SOFTWARE</a>
                </div>
                <!-- /.navbar-header -->
                <ul class="nav navbar-top-links navbar-right">

                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <?php
                            $menu = '<a  href="../../view/Dashboard.php?idAmbiente='. $_GET['idAmbiente'] .
                            '"> Dashboard  
                                <i class="fa fa-bar-chart"></i>
                            </a>';
                            echo $menu;
                        ?>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                          <li>
                            <a><i class="fa fa-user fa-fw"></i> Ciao, Admin ! </a>
                         </li>
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
                <h1 class="page-header">Dati sensori</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <?php

        include '../../model/visualizzaSensori.php';
        include '../../model/decodificaStringaSensori.php';

        $ID = $_GET['idAmbiente'];
        echo '<div class="row">';

        $RisultatoSensori = interrogazioneSensori($ID);

     foreach ($RisultatoSensori as $SensoriAdmin){

            $TipoSensore = interrogazioneTipoSensore($SensoriAdmin['StringaDati']);
            $MarcaSensore = interrogazioneMarcaSensore($SensoriAdmin['StringaDati']);
            $pos = findNewPos((string)$SensoriAdmin['StringaDati']);
            $GiornoData = getGiorno($SensoriAdmin['StringaDati'], $pos);
            $MeseData = getMese($SensoriAdmin['StringaDati'], $pos);
            $AnnoData = getAnno($SensoriAdmin['StringaDati'], $pos);
            $OraData = getOra($SensoriAdmin['StringaDati'], $pos);
            $MinutiData = getMinuti($SensoriAdmin['StringaDati'], $pos);
            $ValoreSensore = getValore($SensoriAdmin['StringaDati'], $pos);
            $Messaggio = getMessaggio($SensoriAdmin['StringaDati'], $pos);

            $Stringa = htmlspecialchars($SensoriAdmin['StringaDati']);
            $Tipo = htmlspecialchars("Tipo Sensore: $TipoSensore");
            $Marca = htmlspecialchars("Marca Sensore: $MarcaSensore");
            $Data = htmlspecialchars("Data rilevazione: $GiornoData/$MeseData/$AnnoData ");
            $Ora = htmlspecialchars("Ora rilevazione: $OraData:$MinutiData");
            $Misura = htmlspecialchars("Misurazione: $ValoreSensore");

            $list = '<div class="col-lg-6 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-dot-circle-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="nomeAmbiente">' . htmlspecialchars($Stringa) . '</div>
                            <div class="tipologiaAmbiente">' . htmlspecialchars($Tipo) . '</div>
                            <div class="tipologiaAmbiente">' . htmlspecialchars($Marca) . '</div>
                            <div class="tipologiaAmbiente">' . htmlspecialchars($Data) . '</div>   
                            <div class="tipologiaAmbiente">' . htmlspecialchars($Ora) .'</div>
                            <div class="tipologiaAmbiente">' . htmlspecialchars($Misura) . '</div>
                            <div class="tipologiaAmbiente">' . htmlspecialchars($Messaggio) . '</div>
                        </div>
                    </div>
                </div>            
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
