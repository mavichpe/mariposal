<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Agregar Asociado
            </h1>
        </div>
    </div>
    <!-- /.row --><?php echo $this->Form->create('Member'); ?>
    <fieldset>
	<?php
		echo $this->Form->input('name',array("label"=>"Nombre"));
		echo $this->Form->input('cedula');
		echo $this->Form->input('edad');
		echo $this->Form->input('estado-civil',array("label"=>"Estado Civil","options"=>$estadosCiviles));
		echo $this->Form->input('tel-habitacion',array("label"=>"Telefono Habitacion"));
		echo $this->Form->input('tel-trabajo',array("label"=>"Telefono Trabajo"));
		echo $this->Form->input('tel-cel',array("label"=>"Telefono Celular"));
		echo $this->Form->input('direccion',array("label"=>"Direccion"));
		echo $this->Form->input('ocupacion',array("label"=>"Ocupacion"));
		echo $this->Form->input('trabajo',array("label"=>"Lugar de Trabajo"));
		echo $this->Form->input('programa-obtar',array("label"=>"Programa a Obtar"));
                echo '<div class="form-group">';
                echo '<label>Ahorro / Credito</label>';
                echo $this->Form->input("is-ahorro", array(
                'before' => '<div class="radio">',
                'after' => '</div>',
                "div"=>false,
                'separator' => '</div><div class="radio">',
                'legend' => false,
                "options"=>array(1=>"Ahorro",0=>"Credito"),
                'type' => 'radio'
                ));
                echo '</div>'; 
		echo $this->Form->input('is-bono-59',array("div"=>"form-group","label"=>"Bono ley 59","type"=>"checkbox"));?>
        <div class="familimembers">
            <div class="btn btn-default btn-success" onclick="agregarMiembro()"> <i class="fa fa-lg fa-user"></i> &nbsp;Agregar Miembro</div>
            <table class="members-table table table-striped table-hover">
                <thead>
                    <tr>
                        <th style="width: 1%">&nbsp;</th>
                        <th style="width: 18%">Nombre</th>
                        <th style="width: 3%">Edad</th>
                        <th style="width: 9%">Cedula</th>
                        <th style="width: 7%">Parentesco</th>
                        <th style="width: 10%">Estado Civil</th>
                        <th style="width: 14%">Ocupacion</th>
                        <th style="width: 16%">Lugar Trabajo / Estudio</th>
                        <th style="width: 7%">Telefono</th>
                        <th style="width: 7%">Salario Bruto</th>
                        <th style="width: 7%">Salario Neto</th>
                        <th style="width: 1%">CCSS</th>
                    </tr>
                </thead>
                <tbody id="family-members-list">
                    <?php if(isset($this->request->data["Familymember"])){
                        foreach($this->request->data["Familymember"] as $index => $familyMember){?>
                    <tr>
                        <td><i class="fa fa-trash fa-lg" onclick="deleteRow(this)"></i></td>
                        <td><?php  echo $this->Form->input('Familymember.'.$index.'.name',array("label"=>false,"div"=>false)); ?></td>
                        <td><?php  echo $this->Form->input('Familymember.'.$index.'.edad',array("label"=>false,"div"=>false));?> </td>
                        <td><?php  echo $this->Form->input('Familymember.'.$index.'.cedula',array("label"=>false,"div"=>false));?> </td>
                        <td><?php  echo $this->Form->input('Familymember.'.$index.'.parentesco',array("options"=>$parentescos,"label"=>false,"div"=>false));?> </td>
                        <td><?php  echo $this->Form->input('Familymember.'.$index.'.estado-civil',array("options"=>$estadosCiviles,"label"=>false,"div"=>false));?> </td>
                        <td><?php  echo $this->Form->input('Familymember.'.$index.'.ocupacion',array("label"=>false,"div"=>false));?> </td>
                        <td><?php  echo $this->Form->input('Familymember.'.$index.'.lugar-trabajo',array("label"=>false,"div"=>false));?> </td>
                        <td><?php  echo $this->Form->input('Familymember.'.$index.'.tel',array("label"=>false,"div"=>false));?> </td>
                        <td><?php  echo $this->Form->input('Familymember.'.$index.'.salario-bruto',array("label"=>false,"div"=>false));?> </td>
                        <td><?php  echo $this->Form->input('Familymember.'.$index.'.salario-neto',array("label"=>false,"div"=>false));?> </td>
                        <td><?php  echo $this->Form->input('Familymember.'.$index.'.is-ccss',array("type"=>"checkbox","label"=>false,"div"=>false));   ?> </td>
                <?php } 
                    }?>
                </tbody>
            </table>


        </div>
                <?php 
        echo $this->Form->input('is-discapacitado',array("div"=>"form-group","label"=>"Es discapacitado","type"=>"checkbox"));
        echo $this->Form->input('discapacidad-details',array("label"=>"Detalles discapacidad"));
        echo $this->Form->input('observaciones');
        echo $this->Form->input('elaborado-por',array("label"=>"Elaborado por"));
        echo $this->Form->input('ingreso',array("label"=>"Fecha Ingreso"));
        ?>
    </fieldset>
<?php echo $this->Form->submit('Guardar',array("class"=>"btn btn-default btn-success","after"=>"<a href='".Router::url(array("action"=>"index"))."'class='btn btn-default btn-danger' style='margin-left:10px;'>Cancelar</a>")); ?>
<?php echo $this->Form->end(); ?>
</div>
<table style="display: none;">
    <tbody id="default-row">
        <tr>
            <td><div class='delete-member' onclick="deleteRow(this)"><i class="fa fa-trash fa-lg"></i></div></td>
            <td><?php  echo $this->Form->input('name',array("name"=>"name","label"=>false,"div"=>false)); ?></td>
            <td><?php  echo $this->Form->input('edad',array("name"=>"edad","label"=>false,"div"=>false));?> </td>
            <td><?php  echo $this->Form->input('cedula',array("name"=>"cedula","label"=>false,"div"=>false));?> </td>
            <td><?php  echo $this->Form->input('parentesco',array("name"=>"parentesco","options"=>$parentescos,"label"=>false,"div"=>false));?> </td>
            <td><?php  echo $this->Form->input('estado-civil',array("name"=>"estado-civil","options"=>$estadosCiviles,"label"=>false,"div"=>false));?> </td>
            <td><?php  echo $this->Form->input('ocupacion',array("name"=>"ocupacion","label"=>false,"div"=>false));?> </td>
            <td><?php  echo $this->Form->input('lugar-trabajo',array("name"=>"lugar-trabajo","label"=>false,"div"=>false));?> </td>
            <td><?php  echo $this->Form->input('tel',array("name"=>"tel","label"=>false,"div"=>false));?> </td>
            <td><?php  echo $this->Form->input('salario-bruto',array("name"=>"salario-bruto","label"=>false,"div"=>false));?> </td>
            <td><?php  echo $this->Form->input('salario-neto',array("name"=>"salario-neto","label"=>false,"div"=>false));?> </td>
            <td><?php  echo $this->Form->input('is-ccss',array("name"=>"is-ccss","type"=>"checkbox","label"=>false,"div"=>false));   ?> </td>
        </tr>
    </tbody>
</table>
<script>
    var familyMemberIndex = 0;
    function agregarMiembro() {
        var row = $("<tr>");
        var inputs = $("#default-row tr").html();
        inputs = $(inputs);
        inputs.find("input").each(function (index, item) {
            var name = $(item).attr("name");
            name = "data[Familymember][" + familyMemberIndex + "][" + name + "]";
            $(item).attr("name", name);
        });
        row.append(inputs);
        $("#family-members-list").append(row);
        familyMemberIndex++;
    }


    function deleteRow(element) {
        $(element).closest("tr").remove();

    }

</script>

