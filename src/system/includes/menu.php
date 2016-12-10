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

            <?php if (Helper\funcoes_helper::permissaoMenu('manifestacao')): ?>
                <li>
                    <a href="#"><span class="nav-label">Manifestação</span><span class="fa arrow"></span> </a>
                    <ul class="nav nav-second-level">
                        <?php if (Helper\funcoes_helper::permissaoItem('manifestacao', 'cadastrar-intervencao')): ?>
                            <li><a href="manifestacao/cadastrar-intervencao">Nova Intervenção</a></li>
                        <?php endif; ?>

                        <?php if (Helper\funcoes_helper::permissaoItem('manifestacao', 'cadastrar-denuncia')): ?>
                            <li><a href="manifestacao/cadastrar-denuncia">Nova Denúncia</a></li>
                        <?php endif; ?>

                        <?php if (Helper\funcoes_helper::permissaoItem('manifestacao', 'consultar')): ?>
                            <li><a href="manifestacao/consultar">Consultar</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>


            <?php if (Helper\funcoes_helper::permissaoMenu('demanda')): ?>

                <li>
                    <a href="#"><span class="nav-label">demanda</span><span class="fa arrow"></span> </a>
                    <ul class="nav nav-second-level">

                        <?php if (Helper\funcoes_helper::permissaoItem('demanda', 'dashboard')): ?>
                            <li><a href="demanda/dashboard/categoria/novas">Dashboard</a></li>
                        <?php endif; ?>

                        <?php if (Helper\funcoes_helper::permissaoItem('demanda', 'cadastrar')): ?>
                            <li><a href="demanda/cadastrar">Nova Demanda</a></li>
                        <?php endif; ?>

                        <?php if (Helper\funcoes_helper::permissaoItem('demanda', 'cadastrar-orgao')): ?>
                            <li><a href="demanda/cadastrar-orgao">Cadastro Órgão</a></li>
                        <?php endif; ?>

                        <?php if (Helper\funcoes_helper::permissaoItem('demanda', 'consultar')): ?>
                            <li><a href="demanda/consultar">Consulta</a></li>
                        <?php endif; ?>

                        <?php if (Helper\funcoes_helper::permissaoItem('demanda', 'consultaindividual')): ?>
                            <li><a href="demanda/consultaindividual">Consulta Individual</a></li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>


            <?php if (Helper\funcoes_helper::permissaoMenu('oficio')): ?>
                <li>
                    <a href="#"><span class="nav-label">Ofício</span><span class="fa arrow"></span> </a>
                    <ul class="nav nav-second-level">
                        <?php if (Helper\funcoes_helper::permissaoItem('oficio', 'cadastrar')): ?>
                            <li><a href="oficio/cadastrar">Cadastrar</a></li>
                        <?php endif; ?>

                        <?php if (Helper\funcoes_helper::permissaoItem('oficio', 'cadastrar-promotor')): ?>
                            <li><a href="oficio/cadastrar-promotor">Cadastrar Promotor</a></li>
                        <?php endif; ?>

                        <?php if (Helper\funcoes_helper::permissaoItem('oficio', 'cadastrar-orgao')): ?>
                            <li><a href="oficio/cadastrar-orgao">Cadastrar Órgão</a></li>
                        <?php endif; ?>

                        <?php if (Helper\funcoes_helper::permissaoItem('oficio', 'consultar')) : ?>
                            <li><a href="oficio/consultar">Consultar</a></li>
                        <?php endif; ?>

                        <?php if (Helper\funcoes_helper::permissaoItem('oficio', 'pendentes')) : ?>
                            <li><a href="oficio/pendentes">Pendentes</a></li>
                        <?php endif; ?>

                        <?php if (Helper\funcoes_helper::permissaoItem('oficio', 'despachados')): ?>
                            <li><a href="oficio/despachados">Despachados</a></li>
                        <?php endif; ?>

                        <?php if (Helper\funcoes_helper::permissaoItem('oficio', 'consultaindividual')): ?>
                            <li><a href="oficio/consultaindividual">Consulta Individual</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>


            <?php if (Helper\funcoes_helper::permissaoMenu('imobiliario')): ?>
                <li>
                    <a href="#"><span class="nav-label">Imobiliário</span><span class="fa arrow"></span> </a>
                    <ul class="nav nav-second-level">
                        <?php if (Helper\funcoes_helper::permissaoItem('imobiliario', 'cadastrar')): ?>
                            <li><a href="imobiliario/cadastrar">Cadastrar</a></li>
                        <?php endif; ?>

                        <?php if (Helper\funcoes_helper::permissaoItem('imobiliario', 'consultar')): ?>
                            <li><a href="imobiliario/consultar">Consultar</a></li>
                        <?php endif; ?>

                        <?php if (Helper\funcoes_helper::permissaoItem('imobiliario', 'historico')): ?>
                            <li><a href="imobiliario/historico">Histórcio</a></li>
                        <?php endif; ?>

                        <?php if (Helper\funcoes_helper::permissaoItem('imobiliario', 'mapa')) : ?>
                            <li><a href="imobiliario/mapa">Projeto Infraero</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (Helper\funcoes_helper::permissaoMenu('projetopiloto')): ?>
                <li>
                    <a href="#"><span class="nav-label">Projeto Piloto</span><span class="fa arrow"></span> </a>
                    <ul class="nav nav-second-level">
                        <?php if (Helper\funcoes_helper::permissaoItem('projetopiloto', 'infraero')): ?><li><a href="projetopiloto/infraero">Infraero</a></li><?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (Helper\funcoes_helper::permissaoMenu('certificado')): ?>

                <li>
                    <a href="#"><span class="nav-label">Certificado</span><span class="fa arrow"></span> </a>
                    <ul class="nav nav-second-level">

                        <?php if (Helper\funcoes_helper::permissaoItem('certificado', 'disponiveis')): ?><li><a href="certificado/disponiveis">Disponíveis</a></li><?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (Helper\funcoes_helper::permissaoMenu('administrador')): ?>
                <li>
                    <a href="#"><span class="nav-label">administrador</span><span class="fa arrow"></span> </a>
                    <ul class="nav nav-second-level">
                        <?php if (Helper\funcoes_helper::permissaoItem('administrador', 'cadastrar-usuario')): ?>
                            <li><a href="administrador/cadastrar-usuario">Cadastrar Usuário</a></li>
                        <?php endif; ?>

                        <?php if (Helper\funcoes_helper::permissaoItem('administrador', 'editar-usuario')): ?>
                            <li><a href="administrador/editar-usuario">Editar Usuário</a></li>
                        <?php endif; ?>

                        <?php if (Helper\funcoes_helper::permissaoItem('administrador', 'cadastrar-orgao')): ?>
                            <li><a href="administrador/cadastrar-orgao">Cadastrar Órgão</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>



            <!--
                 <li>
                     <a href="#"> <span class="nav-label">Suporte</span><span class="label label-warning pull-right">beta</span></a>
                 </li>

                 <li>
                     <a href="registro"> <span class="nav-label">Alterar Dados</span></a>
                 </li>
            -->

        </ul>
    </div>
</aside>