<?php

$tipo_admin = $this->session->userdata('tipo_admin'); //Tipo de usuario almacenado en sesión
$tipo_admin_config = $this->config->item('rol_admin'); //Identificador de administrador

 ?>
<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th>Matr&iacute;cula</th>
						<th>Nombre</th>
						<th>Correo electrónico</th>
						<th>Delegaci&oacute;n</th>
						<th>Categor&iacute;a</th>
						<th>Adscripci&oacute;n</th>
						<th>Sesi&oacute;n</th>
                        <?php
                        if($tipo == 1)
                        {
						  echo "<th>Registrado</th>";
						}
						?>
						<th>Fecha inicial de la sesi&oacute;n</th>
						<th>Fecha final de la sesi&oacute;n</th>
						<?php
                         if($tipo == 1)
                         {
						  if($tipo_admin==$tipo_admin_config['SUPERADMIN']['id']){ echo "<th>Folio de registro</th> <th>hash de constancia</th>";}
						 }
						 ?>
					</tr>
				</thead>
				<tbody>
			<?php
			foreach ($alumnos['data'] as $key => $taller) {

                            echo '<tr>
                                    <td >'.$taller['usr_matricula'].'</td>
                                    <td >'.$taller['fullname'].'</td>
                                    <td >'.$taller['usr_correo'].'</td>
                                    <td >'.$taller['nom_delegacion'].'</td>
                                    <td >'.$taller['nom_categoria'].'</td>
                                    <td >'.$taller['nom_depto_adscripcion'].'</td>
                                    <td >'.$taller['a_nombre'].'</td>';
				            if($tipo == 1)
                            {
                                if($taller['t_estado'] == 1){ echo '<td >registrado</td>';}else{echo '<td >cancelado</td>'; }

                                echo '<td >';
                                if(isset($taller['asistencias'][0]) && !empty($taller['asistencias']) && $taller['asistencias'][0]['as_asistencia'] == 1){ echo $taller['a_inicio']; }else{ echo ' - ';}

                                    echo '</td><td>';

                                if(isset($taller['asistencias'][1]) &&!empty($taller['asistencias']) && $taller['asistencias'][1]['as_asistencia'] == 2 ){ echo $taller['a_fin']; }else{ echo ' - ';}

                                    echo '</td>';


                            }
                            if($tipo != 1) {
                             echo '<td >';
                                if(isset($taller['a_inicio']) && !empty($taller['a_inicio'])){ echo $taller['a_inicio']; }else{ echo ' - ';}

                                    echo '</td><td>';

                                if(isset($taller['a_fin']) &&!empty($taller['a_fin'])){ echo $taller['a_fin']; }else{ echo ' - ';}

                                    echo '</td>';      	# code...
                             }



				if($tipo==1)
				{
				   if($tipo_admin==$tipo_admin_config['SUPERADMIN']['id']){ echo "<td>".$taller['t_folio']."</td>
				   <td>".$taller['t_hash_constancia']."</td>";}
                }
				echo 	'</tr>';

			}
			?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	$('#btn_export').show();
});
</script>
