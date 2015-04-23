<div class="members">
<?php echo $this->Form->create('Member'); ?>
    <fieldset>
        <legend><?php echo __('Add Member'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('cedula');
		echo $this->Form->input('edad');
		echo $this->Form->input('estado-civil',array("label"=>"Estado Civil","options"=>$estadosCiviles));
		echo $this->Form->input('tel-habitacion',array("label"=>"Telefono Habitacion"));
		echo $this->Form->input('tel-trabajo',array("label"=>"Telefono Trabajo"));
		echo $this->Form->input('tel-cel',array("label"=>"Telefono Celular"));
		echo $this->Form->input('direccion',array("label"=>"Dirección"));
		echo $this->Form->input('ocupacion',array("label"=>"Ocupación"));
		echo $this->Form->input('trabajo',array("label"=>"Lugar de Trabajo"));
		echo $this->Form->input('programa-obtar',array("label"=>"Programa a Obtar"));
		echo $this->Form->input('is-ahorro',array("legend"=>"Ahorro / Credito","type"=>"radio","options"=>array(1=>"Ahorro","Credito")));
		echo $this->Form->input('is-bono-59',array("label"=>"Bono ley 59","type"=>"checkbox"));?>
        <div class="familimembers">
            <div onclick="agregarMiembro()"> Agregar Miembro</div>
            <table class="members-table table table-striped table-bordered table-hover">
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
                    <?php foreach($this->request->data["Familymember"] as $index => $familyMember){?>
                    <tr>data[Familymember][" + familyMemberIndex + "][" + name + "]
                        <td><?php  echo $this->Form->input('Familymember.'+$index+'.id',array("label"=>false,"div"=>false)); ?></td>
                        <td><?php  echo $this->Form->input('Familymember.'+$index+'.name',array("label"=>false,"div"=>false)); ?></td>
                        <td><?php  echo $this->Form->input('Familymember.'+$index+'.edad',array("label"=>false,"div"=>false));?> </td>
                        <td><?php  echo $this->Form->input('Familymember.'+$index+'.cedula',array(,"label"=>false,"div"=>false));?> </td>
                        <td><?php  echo $this->Form->input('Familymember.'+$index+'.parentesco',array("options"=>$parentescos,"label"=>false,"div"=>false));?> </td>
                        <td><?php  echo $this->Form->input('Familymember.'+$index+'.estado-civil',array(,"options"=>$estadosCiviles,"label"=>false,"div"=>false));?> </td>
                        <td><?php  echo $this->Form->input('Familymember.'+$index+'.ocupacion',array("label"=>false,"div"=>false));?> </td>
                        <td><?php  echo $this->Form->input('Familymember.'+$index+'.lugar-trabajo',array("label"=>false,"div"=>false));?> </td>
                        <td><?php  echo $this->Form->input('Familymember.'+$index+'.tel',array("label"=>false,"div"=>false));?> </td>
                        <td><?php  echo $this->Form->input('Familymember.'+$index+'.salario-bruto',array("label"=>false,"div"=>false));?> </td>
                        <td><?php  echo $this->Form->input('Familymember.'+$index+'.salario-neto',array("label"=>false,"div"=>false));?> </td>
                        <td><?php  echo $this->Form->input('Familymember.'+$index+'.is-ccss',array("type"=>"checkbox","label"=>false,"div"=>false));   ?> </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>


        </div>
                <?php 
		echo $this->Form->input('is-discapacitado');
		echo $this->Form->input('discapacidad-details');
		echo $this->Form->input('observaciones');
		echo $this->Form->input('elaborado-por');
		echo $this->Form->input('ingreso');
	?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<table style="display: none;">
    <tbody id="default-row">
        <tr>
            <td><div class='delete-member' onclick="deleteRow(this)">D</div></td>
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

