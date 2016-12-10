<?php
$usuario = new Usuario();
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $msg = $usuario->cadastrar();
}
?>
<!DOCTYPE html>
<html>
    <?php Helper\funcoes_helperincludes('head'); ?>
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
                <a class="" href="<?php echo BASEURL; ?>home">
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
                            <a href="<?php echo BASEURL . "logout"; ?>">
                                <i class="pe-7s-upload pe-rotate-90"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>


        <?php Helper\funcoes_helperincludes('menu'); ?>


        <div id="wrapper">

            <div class="small-header transition animated fadeIn no-print">
                <div class="hpanel">
                    <div class="panel-body">
                        <div id="hbreadcrumb" class="pull-right">
                            <ol class="hbreadcrumb breadcrumb">
                                <li>Usuário</li>
                                <li class="active">
                                    <span>Cadastrar</span>
                                </li>
                            </ol>
                        </div>
                        <h2 class="font-light m-b-xs">
                            Cadastro Usuário
                        </h2>
                        <small>Cadastro de novos usuários.</small>
                    </div>
                </div>
            </div>
            <div class="content animate-panel" id="print">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hpanel">
                            <div class="panel-body">
                                <p class="text-left"><strong>Lembretes</strong></p>
                                <ul class="unstyled">
                                    <li>A senha padrão é "abc123", no primeiro acesso será solicitado a alteração para uma senha pessoal.</li>
                                </ul>
                                <form name="formulario" novalidate="novalidate" action="" id="formulario" method="post">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="form-group col-lg-12 text-right">
                                                <?php echo $msg; ?>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label >Nome do Usuário:</label>
                                                <input type="text" id="usu_nome"  name="usu_nome" placeholder="" class="form-control">
                                            </div>

                                            <div class="form-group col-lg-2">
                                                <label >Departamento:</label>
                                                <select id="dep_id" class="form-control" name="dep_id" style="width: 100%">

                                                    <?php foreach (Help::listarTabela('departamento') as $value): ?>
                                                        <option value="<?php echo $value['dep_id']; ?>"><?php echo $value['dep_nome']; ?></option>
                                                    <?php endforeach; ?>

                                                </select>
                                            </div>

                                            <div class="form-group col-lg-2">
                                                <label >Matrícula:</label>
                                                <input type="text" id="usu_login"  name="usu_login" placeholder="" class="form-control maskmatricula">
                                            </div>

                                            <div class="form-group col-lg-2">
                                                <label >CPF:</label>
                                                <input type="text" id="usu_cpf"  name="usu_cpf" placeholder="" class="form-control maskcpf">
                                            </div>

                                            <div class="form-group col-lg-2">
                                                <label >Data Nascimento:</label>
                                                <input type="text" id="usu_dt_nascimento"  name="usu_dt_nascimento" placeholder="" class="form-control maskdata">
                                            </div>


                                            <div class="form-group col-lg-12">
                                                <h4>Permissão Módulos</h4>
                                            </div>

                                            <?php
                                            $path  = DIR_ROOT . BASEURL . 'modulos';
                                            $dir   = opendir($path);
                                            while (false !== ($pasta = readdir($dir))):
                                                $files[] = $pasta;
                                            endwhile;
                                            sort($files);

                                            foreach ($files as $pasta):
                                                if (strpos($pasta, '.') === false AND $pasta != "administrador"):
                                                    ?>
                                                    <div class="form-group col-lg-2">
                                                        <label class="col-sm-2 control-label"><?php echo strtoupper($pasta); ?><br/>
                                                        </label>
                                                    </div>
                                                    <div class="form-group col-lg-4">
                                                        <?php
                                                        $path2  = $path . '/' . $pasta;
                                                        $subdir = opendir($path2);

                                                        while (false !== ($arquivo = readdir($subdir))):
                                                            if ($arquivo != '.' && $arquivo != '..') :
                                                                ?>
                                                                <div class="checkbox">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" class="i-checks" name=<?php echo 'usu_permissao[' . $pasta . '][] '; ?> value=<?php echo Helper\funcoes_helperext($arquivo); ?> >
                                                                        <?php echo Helper\funcoes_helperext($arquivo); ?>
                                                                    </label>
                                                                </div>

                                                                <?php
                                                            endif;
                                                        endwhile;
                                                        ?>
                                                    </div>
                                                    <?php
                                                endif;
                                            endforeach;
                                            ?>

                                            <div class="form-group col-lg-12 text-right">
                                                <label></label>
                                                <button type="reset" class="btn btn-warning" >Cancelar</button>
                                                <button class="btn btn-primary" type="submit" name="submit" value="cadastrar">Cadastrar</button>
                                            </div>


                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php Helper\funcoes_helperincludes('footer'); ?>
    </body>
</html>





