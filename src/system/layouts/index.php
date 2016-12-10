<!DOCTYPE html>
<html>
    <head>

        <base href="<?php echo BASEURL; ?>src/">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title> SISGES | Sistema de Gestão da SEMA</title>

        <link rel="shortcut icon" type="image/ico" href="public/images/favicon.ico" />

        <!-- font icones -->
        <link rel="stylesheet" href="public/vendor/fontawesome/css/font-awesome.css?<?php echo VERSAO; ?>" />
        <!-- Menu -->
        <link rel="stylesheet" href="public/vendor/metisMenu/dist/metisMenu.css?<?php echo VERSAO; ?>" />

        <link rel="stylesheet" href="public/vendor/animate.css/animate.css?<?php echo VERSAO; ?>" />
        <!-- Bootstrap -->
        <link rel="stylesheet" href="public/vendor/bootstrap/dist/css/bootstrap.css?<?php echo VERSAO; ?>" />
        <!-- Select dinamico -->
        <link rel="stylesheet" href="public/vendor/select2-3.5.2/select2.css?<?php echo VERSAO; ?>" />
        <link rel="stylesheet" href="public/vendor/select2-bootstrap/select2-bootstrap.css?<?php echo VERSAO; ?>" />
        <!-- Alerta Modal sem uso-->
        <link rel="stylesheet" href="public/vendor/sweetalert/lib/sweet-alert.css?<?php echo VERSAO; ?>" />
        <!-- Data table -->
        <link rel="stylesheet" href="public/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css?<?php echo VERSAO; ?>" />
        <!-- Icones grandes -->
        <link rel="stylesheet" href="public/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css?<?php echo VERSAO; ?>" />
        <link rel="stylesheet" href="public/fonts/pe-icon-7-stroke/css/helper.css?<?php echo VERSAO; ?>" />

        <link rel="stylesheet" href="public/styles/style.css?<?php echo VERSAO; ?>">
        <!-- AutoComplete-->
        <link rel="stylesheet" href="public/vendor/autocomplete/jquery.autocomplete.css?<?php echo VERSAO; ?>" />
        <!-- TimeOut-->
        <link rel="stylesheet" href="public/vendor/timeout/css/timeout-dialog.css?<?php echo VERSAO; ?>" /> 
        <!-- Div Data-->
        <link rel="stylesheet" href="public/vendor/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.min.css?<?php echo VERSAO; ?>" />
        <!-- Dropzone-->
        <link rel="stylesheet" href="public/vendor/dropzone/dropzone.css?<?php echo VERSAO; ?>" />

    </head>
    <body class="fixed-small-header fixed-navbar fixed-sidebar fixed-footer">


        <div class="splash">
            <div class="color-line"></div>
            <div class="splash-title">
                <h1>SISGES | Sistema de Gestão da SEMA</h1>
                <p>  Secretaria Municipal do Meio Ambiente 2016</p>
                <div class="spinner">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>
            </div>
        </div>

        <div id="header">
            <div class="color-line">
            </div>
            <div id="logo" class="light-version">
                <a class="" href="home">
                    <span class="nav-label font-light m-b-xs">

                        SISGES
                    </span>
                </a>
            </div>
            <nav role="navigation" class="no-print">
                <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
                <div class="small-logo">
                    <span class="text-primary">HOMER APP</span>
                </div>

                <div class="navbar-left">
                    <ul class="nav navbar-nav no-borders">
                        <li class="dropdown font-light ">
                            <a style="pointer-events: none;"></a>
                        </li>
                    </ul>
                </div>

                <div class="navbar-right">
                    <ul class="nav navbar-nav no-borders">
                        <li class="dropdown">
                            <a href="logout">
                                <i class="pe-7s-upload pe-rotate-90"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>


        <aside id="menu">
            <div id="navigation">
                <div class="profile-picture no-print">
                    <div class="stats-label text-color">
                        <div>
                            <span class="font-bold font-trans"><?php echo $_SESSION['nome']; ?></small>
                        </div>
                        <div>
                            <span class="font-extra-bold font-uppercase"><?php echo $_SESSION['nome_dep']; ?> - </span>
                            <small class="text-muted"><?php echo $_SESSION['descricao_dep']; ?></small>
                        </div>

                    </div>
                </div>
                <ul class="nav no-print" id="side-menu">

                    <li class="active">
                        <a href="home">
                            <span class="nav-label">  Home</span>
                            <span class="label label-success pull-right">v<?php echo VERSAO; ?></span>
                        </a>
                    </li>

                    <?php if (Help::permissaoMenu('manifestacao')): ?>
                        <li>
                            <a href="#"><span class="nav-label">Manifestação</span><span class="fa arrow"></span> </a>
                            <ul class="nav nav-second-level">
                                <?php if (Help::permissaoItem('manifestacao', 'cadastrar-intervencao')): ?>
                                    <li><a href="manifestacao/cadastrar-intervencao">Nova Intervenção</a></li>
                                <?php endif; ?>

                                <?php if (Help::permissaoItem('manifestacao', 'cadastrar-denuncia')): ?>
                                    <li><a href="manifestacao/cadastrar-denuncia">Nova Denúncia</a></li>
                                <?php endif; ?>

                                <?php if (Help::permissaoItem('manifestacao', 'consultar')): ?>
                                    <li><a href="manifestacao/consultar">Consultar</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>


                    <?php if (Help::permissaoMenu('demanda')): ?>

                        <li>
                            <a href="#"><span class="nav-label">demanda</span><span class="fa arrow"></span> </a>
                            <ul class="nav nav-second-level">

                                <?php if (Help::permissaoItem('demanda', 'dashboard')): ?>
                                    <li><a href="demanda/dashboard/categoria/novas">Dashboard</a></li>
                                <?php endif; ?>

                                <?php if (Help::permissaoItem('demanda', 'cadastrar')): ?>
                                    <li><a href="demanda/cadastrar">Nova Demanda</a></li>
                                <?php endif; ?>

                                <?php if (Help::permissaoItem('demanda', 'cadastrar-orgao')): ?>
                                    <li><a href="demanda/cadastrar-orgao">Cadastro Órgão</a></li>
                                <?php endif; ?>

                                <?php if (Help::permissaoItem('demanda', 'consultar')): ?>
                                    <li><a href="demanda/consultar">Consulta</a></li>
                                <?php endif; ?>

                                <?php if (Help::permissaoItem('demanda', 'consultaindividual')): ?>
                                    <li><a href="demanda/consultaindividual">Consulta Individual</a></li>
                                <?php endif; ?>

                            </ul>
                        </li>
                    <?php endif; ?>


                    <?php if (Help::permissaoMenu('oficio')): ?>
                        <li>
                            <a href="#"><span class="nav-label">Ofício</span><span class="fa arrow"></span> </a>
                            <ul class="nav nav-second-level">
                                <?php if (Help::permissaoItem('oficio', 'cadastrar')): ?>
                                    <li><a href="oficio/cadastrar">Cadastrar</a></li>
                                <?php endif; ?>

                                <?php if (Help::permissaoItem('oficio', 'cadastrar-promotor')): ?>
                                    <li><a href="oficio/cadastrar-promotor">Cadastrar Promotor</a></li>
                                <?php endif; ?>

                                <?php if (Help::permissaoItem('oficio', 'cadastrar-orgao')): ?>
                                    <li><a href="oficio/cadastrar-orgao">Cadastrar Órgão</a></li>
                                <?php endif; ?>

                                <?php if (Help::permissaoItem('oficio', 'consultar')) : ?>
                                    <li><a href="oficio/consultar">Consultar</a></li>
                                <?php endif; ?>

                                <?php if (Help::permissaoItem('oficio', 'pendentes')) : ?>
                                    <li><a href="oficio/pendentes">Pendentes</a></li>
                                <?php endif; ?>

                                <?php if (Help::permissaoItem('oficio', 'despachados')): ?>
                                    <li><a href="oficio/despachados">Despachados</a></li>
                                <?php endif; ?>

                                <?php if (Help::permissaoItem('oficio', 'consultaindividual')): ?>
                                    <li><a href="oficio/consultaindividual">Consulta Individual</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>


                    <?php if (Help::permissaoMenu('imobiliario')): ?>
                        <li>
                            <a href="#"><span class="nav-label">Imobiliário</span><span class="fa arrow"></span> </a>
                            <ul class="nav nav-second-level">
                                <?php if (Help::permissaoItem('imobiliario', 'cadastrar')): ?>
                                    <li><a href="imobiliario/cadastrar">Cadastrar</a></li>
                                <?php endif; ?>

                                <?php if (Help::permissaoItem('imobiliario', 'consultar')): ?>
                                    <li><a href="imobiliario/consultar">Consultar</a></li>
                                <?php endif; ?>

                                <?php if (Help::permissaoItem('imobiliario', 'historico')): ?>
                                    <li><a href="imobiliario/historico">Histórcio</a></li>
                                <?php endif; ?>

                                <?php if (Help::permissaoItem('imobiliario', 'mapa')) : ?>
                                    <li><a href="imobiliario/mapa">Projeto Infraero</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (Help::permissaoMenu('projetopiloto')): ?>
                        <li>
                            <a href="#"><span class="nav-label">Projeto Piloto</span><span class="fa arrow"></span> </a>
                            <ul class="nav nav-second-level">
                                <?php if (Help::permissaoItem('projetopiloto', 'infraero')): ?><li><a href="projetopiloto/infraero">Infraero</a></li><?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (Help::permissaoMenu('certificado')): ?>

                        <li>
                            <a href="#"><span class="nav-label">Certificado</span><span class="fa arrow"></span> </a>
                            <ul class="nav nav-second-level">

                                <?php if (Help::permissaoItem('certificado', 'disponiveis')): ?><li><a href="certificado/disponiveis">Disponíveis</a></li><?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (Help::permissaoMenu('administrador')): ?>
                        <li>
                            <a href="#"><span class="nav-label">administrador</span><span class="fa arrow"></span> </a>
                            <ul class="nav nav-second-level">
                                <?php if (Help::permissaoItem('administrador', 'cadastrar-usuario')): ?>
                                    <li><a href="administrador/cadastrar-usuario">Cadastrar Usuário</a></li>
                                <?php endif; ?>

                                <?php if (Help::permissaoItem('administrador', 'editar-usuario')): ?>
                                    <li><a href="administrador/editar-usuario">Editar Usuário</a></li>
                                <?php endif; ?>

                                <?php if (Help::permissaoItem('administrador', 'cadastrar-orgao')): ?>
                                    <li><a href="administrador/cadastrar-orgao">Cadastrar Órgão</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </aside>


        <div id="wrapper">

            <div class="small-header transition animated fadeIn no-print">
                <div class="hpanel">
                    <div class="panel-body">
                        <div id="hbreadcrumb" class="pull-right">
                            <ol class="hbreadcrumb breadcrumb">
                                <li>Usuário</li>
                                <li class="active">
                                    <span>Editar</span>
                                </li>
                            </ol>
                        </div>
                        <h2 class="font-light m-b-xs">
                            Editar Dados
                        </h2>
                        <small>Edição das dados dos usuários.</small>
                    </div>
                </div>
            </div>
            <div class="content animate-panel" id="print">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hpanel">
                            <div class="panel-body">
                                <!--Conteudo-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                </div>
            </div>
        </div>

        <footer class="footer">
            <span class="pull-right">
                SISGES - Sistema de Gestão da SEMA
            </span>
            Secretaria Municipal do Meio Ambiente 2016
        </footer>

        <!-- Jquery -->
        <script src="public/vendor/jquery/dist/jquery.min.1.12.4.js?<?php echo VERSAO; ?>"></script>
        <script src="public/vendor/jquery-ui/jquery-ui.min.1.12.0.js?<?php echo VERSAO; ?>"></script>  
        <!-- Barra Rolagem -->
        <script src="public/vendor/slimScroll/jquery.slimscroll.min.js?<?php echo VERSAO; ?>"></script>
        <script src="public/vendor/bootstrap/dist/js/bootstrap.min.js?<?php echo VERSAO; ?>"></script>
        <!-- Grafico dinamico  -->
        <script src="public/vendor/jquery-flot/jquery.flot.js?<?php echo VERSAO; ?>"></script>
        <script src="public/vendor/jquery-flot/jquery.flot.resize.js?<?php echo VERSAO; ?>"></script>
        <script src="public/vendor/jquery-flot/jquery.flot.pie.js?<?php echo VERSAO; ?>"></script>
        <script src="public/vendor/flot.curvedlines/curvedLines.js?<?php echo VERSAO; ?>"></script>
        <script src="public/vendor/jquery.flot.spline/index.js?<?php echo VERSAO; ?>"></script>
        <!-- Menu  -->
        <script src="public/vendor/metisMenu/dist/metisMenu.min.js?<?php echo VERSAO; ?>"></script>
        <!-- style botao checkbox  -->
        <script src="public/vendor/iCheck/icheck.min.js?<?php echo VERSAO; ?>"></script>
        <!-- mini graficos  -->
        <script src="public/vendor/peity/jquery.peity.min.js?<?php echo VERSAO; ?>"></script>
        <!-- mini graficos  -->
        <script src="public/vendor/sparkline/index.js?<?php echo VERSAO; ?>"></script>
        <!-- select dinamico  -->
        <script src="public/vendor/select2-3.5.2/select2.min.js?<?php echo VERSAO; ?>"></script>
        <!-- mascara inputs  -->
        <script src="public/vendor/mask/jquery.maskedinput.js?<?php echo VERSAO; ?>"></script>
        <!-- validacao inputs  -->
        <script src="public/vendor/jquery-validation/jquery.validate.min.js?<?php echo VERSAO; ?>"></script>
        <!-- AutoComplete -->
        <script src="public/vendor/autocomplete/jquery.autocomplete.js?<?php echo VERSAO; ?>"></script>
        <script src="public/vendor/autocomplete/auto.js?<?php echo VERSAO; ?>"></script>
        <!-- DataTables -->
        <script src="public/vendor/datatables/media/js/jquery.dataTables.min.js?<?php echo VERSAO; ?>"></script>
        <script src="public/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js?<?php echo VERSAO; ?>"></script>
        <!-- DataTables buttons scripts -->
        <script src="public/vendor/pdfmake/build/pdfmake.min.js?<?php echo VERSAO; ?>"></script>
        <script src="public/vendor/pdfmake/build/vfs_fonts.js?<?php echo VERSAO; ?>"></script>
        <script src="public/vendor/datatables.net-buttons/js/buttons.html5.min.js?<?php echo VERSAO; ?>"></script>
        <script src="public/vendor/datatables.net-buttons/js/buttons.print.min.js?<?php echo VERSAO; ?>"></script>
        <script src="public/vendor/datatables.net-buttons/js/dataTables.buttons.min.js?<?php echo VERSAO; ?>"></script>
        <script src="public/vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js?<?php echo VERSAO; ?>"></script>
        <!-- TimeOut scripts -->
        <script src="public/vendor/timeout/js/timeout-dialog.js?<?php echo VERSAO; ?>"></script>
        <!-- Div data -->
        <script src="public/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js?<?php echo VERSAO; ?>"></script>
        <!-- Dropzone-->
        <script src="public/vendor/dropzone/dropzone.js?<?php echo VERSAO; ?>"></script>

        <!-- App scripts -->
        <script src="public/scripts/homer.js?<?php echo VERSAO; ?>"></script>
        <!-- scripts graficos -->
        <script src="public/scripts/charts.js?<?php echo VERSAO; ?>"></script>

        <script type="text/javascript">
            $(".endereco").autocomplete('ajax/endereco', {
                width: 260,
                matchContains: true,
                selectFirst: false
            });

            var endereco_temporario = "";
            var endereco_id = "";
            $(".endereco").result(function (event, data) {
                jQuery('.bai_id').val(data[1]);
                jQuery('.dem_cep').val(data[2].substr(0, 5) + "-" + data[2].substr(5, 8));
                jQuery('.endereco_id').val(data[3]);
                endereco_id = data[3];
                endereco_temporario = data[0];

            });
        </script>

    </body>
</html>





