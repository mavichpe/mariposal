<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Agregar  Registro de Actividad
            </h1>
        </div>
    </div>
    <div class="activitiesMembers form">
        <div class="activity-register">
            <form id="registration-form" onsubmit="return false;">
       <?php echo $this->Form->input('activity_id',array("label"=>"Actividad"));?>

        <?php echo $this->Form->input('search',array("label"=>"Codigo de Asociado","id"=>"search-box")); ?>
                <div id="menber-info" class="jumbotron">
                    <h3>Informacion de Asociado Seleccionado</h3>
                    <div>
                        <label>Nombre:</label>
                        <span class="name"></span>
                    </div>
                    <div>
                        <label>Cedula:</label>
                        <span class="cedula"></span>
                    </div>
                <?php echo $this->Form->input('member_id',array("id"=>"member_id","type"=>"hidden"));?>
                <?php echo $this->Form->input('is-pay',array("div"=>"form-group","label"=>"Pago valor de Actividad","type"=>"checkbox"));?>
                <?php echo $this->Form->input('monto',array("div"=>"form-group","label"=>"Monto Pagado","type"=>"number"));?>
                <?php echo $this->Form->button(__('Guardar'),array("type"=>"button","class"=>"btn btn-default btn-success","onclick"=>"saveActivityRegister();")); ?>
                <?php echo $this->Form->button(__('Cancelar'),array("type"=>"button","class"=>"btn btn-default btn-danger","onclick"=>"clearForm(true);")); ?>
                </div>
                <div id="stored-alert" class="alert alert-success" role="alert" style="display: none">
                    El registro se a guardado con <b> exito</b>
                </div>

            </form>
        </div>
    </div>
</div>
<script>
    $(function () {
        $("#menber-info").hide();
        $("#search-box").keyup(function (event) {
            if (event.which == 13) {
                event.preventDefault();
                searchMember(this.value);
            }
        })
    });
    function clearForm(fullClear) {
        if (fullClear) {
            $("#search-box").val("").focus();
        }
        $("#member_id").val("");
        $("#menber-info .name").text("");
        $("#menber-info .cedula").text("");
        $("#monto").text("");
        $("#menber-info").hide(200);
    }

    function searchMember(memberIdentification) {
        clearForm(false);
        $("#menber-info").hide(200);
        $("#loading-box").addClass("show");
        $.ajax({
            type: 'POST',
            async: true,
            url: '<?php echo Router::url(array("controller"=>"members","action"=>"getMember")); ?>/' + memberIdentification,
            dataType: 'json',
            success: function (data) {
                if (data.exist) {
                    var asociado = data.Member;
                    $("#menber-info .name").text(asociado.name);
                    $("#menber-info .cedula").text(asociado.cedula);
                    $("#member_id").val(asociado.id);
                    $("#menber-info").show(200);
                } else {
                    alert("El Asociado que desea buscar no existe");
                }

            }, complete: function () {
                $("#loading-box").removeClass("show");
            }
        });
    }
    function saveActivityRegister() {
        var registerData = $("#registration-form").serialize();
        $("#loading-box").addClass("show");
        $.ajax({
            type: 'POST',
            async: true,
            data: registerData,
            url: '<?php echo Router::url(array("controller"=>"ActivitiesMembers","action"=>"add")); ?>',
            dataType: 'json',
            success: function (data) {
                if (data.save) {
                    clearForm(true);
                    $("#stored-alert").show(300);
                    setTimeout(function () {
                        $("#stored-alert").hide(300);
                    }, 2000);
                } else {
                    alert("Registro no guardo");
                }

            },
            complete: function () {
                $("#loading-box").removeClass("show");
            }
        });
    }

</script>
