<!DOCTYPE html>
<html>
    <?php Helper\funcoes_helper::includes('head'); ?>
    <body class="blank" id = "body" style="width: 100%;">

        <div class="splash">
            <div class="color-line"></div>
            <div class="splash-title">
                <h1>SISGES | Sistema de Gestão da SEMA</h1>
                <p>Secretaria Municipal do Meio Ambiente 2016</p>
                <div class="spinner">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>
            </div>
        </div>

        <div class="color-line"></div>

        <div class="login-container" >
            <div class="row">
                <div class="col-md-12" >
                    <div class="text-center m-b-md">
                        <h3>Acesso SISGES</h3>
                    </div>
                    <div class="hpanel">
                        <div class="panel-body">
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label class="control-label" for="usu_login">Matrícula</label>
                                    <input type="text" placeholder="000000" title="Digite com sua matricula"  required value="" name="usu_login" id="usu_login" class="form-control maskmatricula">
                                    <span class="help-block small">Digite sua matrícula</span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="usu_senha">Senha</label>
                                    <input type="password" title="Digite sua senha" placeholder="******" required value="" name="usu_senha" id="usu_senha" class="form-control">
                                    <span class="help-block small">Digite sua senha.</span>

                                </div>
                                <button class="btn btn-success btn-block" id = "bt">Login</button>
                                <span class="help-block small text-center">Caso for primeiro acesso ou resetar a senha digite: abc123</span>
                            </form>

                            <?php if (isset($login['status'])): ?>
                                <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="color-line"></div>
                                            <div class="modal-header text-center">
                                                <h4 class="modal-title"><?php echo $login["titulo"]; ?></h4>
                                            </div>
                                            <form id ="modalSenha" method="POST" >
                                                <div class="modal-body">
                                                    <p><strong>Olá! <?php echo $login['usu_nome']; ?></strong> <?php echo $login["frase"]; ?>
                                                    <ul class='unstyled'>
                                                        <li>Que não seja 'abc123'.</li>
                                                        <li>Com no mínimo 6 dígitos.</li>
                                                        <li>Conter letras e números.</li>
                                                    </ul>
                                                    </p>
                                                    <div class="row">
                                                        <div class="form-group col-lg-6">
                                                            <label>Nome</label> <br/>
                                                            <label id="resetNome"> <?php echo $login['usu_nome']; ?> </label>
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <label>Matrícula</label> <br/>
                                                            <label id="resetNome"> <?php echo $login["usu_login"]; ?> </label>
                                                        </div>

                                                        <?php if ($login['status'] == 'resetar' OR empty($login['usu_cpf'])): ?>
                                                            <div class='form-group col-lg-6'> <label for="cpf">CPF</label>
                                                                <input type='text' value='' id='usu_cpf' class='form-control maskcpf' name='usu_cpf' required="">
                                                            </div>
                                                            <div class='form-group col-lg-6'>
                                                                <label for="usu_dt_nascimento">Data de nascimento</label>
                                                                <input type='text' value='' id='usu_dt_nascimento' class='form-control maskdata' name='usu_dt_nascimento' required="">
                                                            </div>
                                                        <?php endif; ?>
                                                        <input type="hidden" value="<?php echo $login["usu_login"]; ?>" id='matricula' name="matricula">
                                                        <input type="hidden" value="<?php echo $login['status']; ?>" id='status'>

                                                        <div class="form-group col-lg-6">
                                                            <label for="nova_senha">Nova senha</label>
                                                            <input type="password" value="" id="nova_senha" class="form-control" name="nova_senha" required="">
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <label for="repita_senha">Repita a nova senha</label>
                                                            <input type="password" value="" id="repita_senha" class="form-control" name="repita_senha" required="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <div id="resetAlert"></div>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                    <button class="btn btn-primary" id="save">Atualizar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>


                            <span class="help-block small"></span>
                            <?php echo $login['msg']; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <strong>SISGES</strong> - Sistema de Gestão da SEMA <br/> 2016 Copyright DTI-SEMA
                </div>
            </div>

        </div>

        <?php Helper\funcoes_helper::includes('footer'); ?>
        <script>
            $(document).ready(function () {
                var modal = "<?php echo $login['status']; ?>";
                if (modal !== "") {
                    if (modal === "resetar") {
                        $("#Modal").modal('toggle');
                    } else if (modal === "primeiroacesso") {
                        $("#Modal").modal('toggle');
                    }
                }
            });
        </script>
    </body>
</html>