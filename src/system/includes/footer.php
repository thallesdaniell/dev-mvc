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
<script src="src/public/vendor/jquery/dist/jquery.min.1.12.4.js?<?php echo VERSAO; ?>"></script>
<script src="src/public/vendor/jquery-ui/jquery-ui.min.1.12.0.js?<?php echo VERSAO; ?>"></script>  
<!-- Barra Rolagem -->
<script src="src/public/vendor/slimScroll/jquery.slimscroll.min.js?<?php echo VERSAO; ?>"></script>
<script src="src/public/vendor/bootstrap/dist/js/bootstrap.min.js?<?php echo VERSAO; ?>"></script>
<!-- Grafico dinamico  -->
<script src="src/public/vendor/jquery-flot/jquery.flot.js?<?php echo VERSAO; ?>"></script>
<script src="src/public/vendor/jquery-flot/jquery.flot.resize.js?<?php echo VERSAO; ?>"></script>
<script src="src/public/vendor/jquery-flot/jquery.flot.pie.js?<?php echo VERSAO; ?>"></script>
<script src="src/public/vendor/flot.curvedlines/curvedLines.js?<?php echo VERSAO; ?>"></script>
<script src="src/public/vendor/jquery.flot.spline/index.js?<?php echo VERSAO; ?>"></script>
<!-- Menu  -->
<script src="src/public/vendor/metisMenu/dist/metisMenu.min.js?<?php echo VERSAO; ?>"></script>
<!-- style botao checkbox  -->
<script src="src/public/vendor/iCheck/icheck.min.js?<?php echo VERSAO; ?>"></script>
<!-- mini graficos  -->
<script src="src/public/vendor/peity/jquery.peity.min.js?<?php echo VERSAO; ?>"></script>
<!-- mini graficos  -->
<script src="src/public/vendor/sparkline/index.js?<?php echo VERSAO; ?>"></script>
<!-- select dinamico  -->
<script src="src/public/vendor/select2-3.5.2/select2.min.js?<?php echo VERSAO; ?>"></script>
<!-- mascara inputs  -->
<script src="src/public/vendor/mask/jquery.maskedinput.js?<?php echo VERSAO; ?>"></script>
<!-- validacao inputs  -->
<script src="src/public/vendor/jquery-validation/jquery.validate.min.js?<?php echo VERSAO; ?>"></script>
<!-- AutoComplete -->
<script src="src/public/vendor/autocomplete/jquery.autocomplete.js?<?php echo VERSAO; ?>"></script>
<script src="src/public/vendor/autocomplete/auto.js?<?php echo VERSAO; ?>"></script>
<!-- DataTables -->
<script src="src/public/vendor/datatables/media/js/jquery.dataTables.min.js?<?php echo VERSAO; ?>"></script>
<script src="src/public/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js?<?php echo VERSAO; ?>"></script>
<!-- DataTables buttons scripts -->
<script src="src/public/vendor/pdfmake/build/pdfmake.min.js?<?php echo VERSAO; ?>"></script>
<script src="src/public/vendor/pdfmake/build/vfs_fonts.js?<?php echo VERSAO; ?>"></script>
<script src="src/public/vendor/datatables.net-buttons/js/buttons.html5.min.js?<?php echo VERSAO; ?>"></script>
<script src="src/public/vendor/datatables.net-buttons/js/buttons.print.min.js?<?php echo VERSAO; ?>"></script>
<script src="src/public/vendor/datatables.net-buttons/js/dataTables.buttons.min.js?<?php echo VERSAO; ?>"></script>
<script src="src/public/vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js?<?php echo VERSAO; ?>"></script>
<!-- TimeOut scripts -->
<script src="src/public/vendor/timeout/js/timeout-dialog.js?<?php echo VERSAO; ?>"></script>
<!-- Div data -->
<script src="src/public/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js?<?php echo VERSAO; ?>"></script>
<!-- Dropzone-->
<script src="src/public/vendor/dropzone/dropzone.js?<?php echo VERSAO; ?>"></script>

<!-- App scripts -->
<script src="src/public/scripts/homer.js?<?php echo VERSAO; ?>"></script>
<!-- scripts graficos -->
<script src="src/public/scripts/charts.js?<?php echo VERSAO; ?>"></script>

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
