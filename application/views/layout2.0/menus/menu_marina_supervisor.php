<?php 
$activo = $this->session->userdata('activo');
		  $this->session->unset_userdata('activo');
		if (!empty($activo)) {
			$a = explode("-", $activo);
			$menu = $a[0];
			$nombre = $a[1];
			$b = explode('.', $activo);
			$numMenu = $b[0];
		}
	
?>
<li class="clickButtonMenu <?php if(isset($nombre)){ if($nombre === 'home')echo "active"; }?> " data="1.1-home">
	<a href="<?php echo base_url() ?>usuarios/home"><i class="fa fa-home"></i> <span class="title"> Inicio </span></a>
</li>

<li class="clickButtonMenu <?php if(isset($nombre)){ if($nombre === 'trabajadores')echo "active"; }?> " data="1.2-trabajadores">
	<a href="<?php echo base_url() ?>marina/trabajadores"><i class="fa fa-home"></i> <span class="title"> Listado Trabajadores </span></a>
</li>

<li class="clickButtonMenu <?php if(isset($nombre)){ if($nombre === 'listado')echo "active"; }?> " data="1.3-listado">
	<a href="<?php echo base_url() ?>marina/requerimientos/listado"><i class="fa fa-home"></i> <span class="title"> Requerimientos </span></a>
</li>

<li class="clickButtonMenu <?php if(isset($nombre)){ if($nombre === 'horarios')echo "active"; }?> " data="1.4-horarios">
	<a href="<?php echo base_url() ?>marina/horarios"><i class="fa fa-home"></i> <span class="title"> Gestion de Horarios </span></a>
</li>

<li>
	<a href="javascript:void(0)"><i class="fa fa-book"></i> <span class="title"> Solicitudes de Contratos </span></a>
	<ul class="sub-menu" <?php if(isset($menu)){if($menu == '1.5')echo "style='display: block;'"; }?>>
		<li class="clickButtonMenu <?php if(isset($nombre)){ if($nombre === 'solicitudes_pendientes')echo "active"; }?> " data="1.5-solicitudes_pendientes">
			<a href="<?php echo base_url() ?>marina/contratos/solicitudes_pendientes"><i class="fa fa-user"></i> <span class="title"> Solicitudes Pendientes </span></a>
		</li>
		<li class="clickButtonMenu <?php if(isset($nombre)){ if($nombre === 'solicitudes_completas')echo "active"; }?> " data="1.5-solicitudes_completas">
			<a href="<?php echo base_url() ?>marina/contratos/solicitudes_completas"><i class="fa fa-user"></i> <span class="title"> Solicitudes Completas </span></a>
		</li>
		<li class=" clickButtonMenu <?php if(isset($nombre)){ if($nombre === 'marina_sol_pen_baj')echo "active"; }?> " data="1.5-marina_sol_pen_baj">
			<a href="<?php echo base_url() ?>marina/contratos/solicitudes_pendientes_baja"><i class="fa fa-user"></i> <span class="title"> Solicitud en proceso de baja </span></a>
		</li>
		<li class=" clickButtonMenu <?php if(isset($nombre)){ if($nombre === 'marina_sol_compl_baj')echo "active"; }?> " data="1.5-marina_sol_compl_baj">
			<a href="<?php echo base_url() ?>marina/contratos/solicitudes_completas_baja"><i class="fa fa-user"></i> <span class="title"> Solicitudes Bajadas </span></a>
		</li>
	</ul>
</li>
<!--1.6-->
<li  class=" clickButtonMenu <?php if(isset($nombre)){ if($nombre === 'marina_asistencia')echo "active"; }?> " data="1.6-marina_asistencia">
	<a href="<?php echo base_url() ?>marina/asistencia"><i class="fa fa-home"></i> <span class="title"> Asistencia </span> </a>
</li>
<!--1.7-->
<li  class=" clickButtonMenu <?php if(isset($nombre)){ if($nombre === 'marina_bonos')echo "active"; }?> " data="1.7-marina_bonos">
	<a href="<?php echo base_url() ?>marina/asistencia/bonos"><i class="fa fa-home"></i> <span class="title"> Bonos </span> </a>
</li>
<?php if($this->session->userdata('id') == 121 ){ ?>
<li  <?php if(isset($numMenu)){if ($numMenu == 5)echo "class='open'"; }?>>
	<a href="javascript:void(0)"><i class="fa fa-home"></i> <span class="title" style="color: #e6a614bf"> MARINA CHILLAN</span></a>
	<ul class="sub-menu" <?php if(isset($numMenu)){if ($numMenu == 6)echo "style='display: block;'"; }?>>
		<!--3.1-->
		<li  class=" clickButtonMenu <?php if(isset($nombre)){ if($nombre === 'marina_chillan_horarios')echo "active"; }?> " data="6.1-marina_chillan_horarios">
			<a class="Marina_chillan"  href="<?php echo base_url() ?>marina_chillan/horarios"><i class="fa fa-home"></i> <span class="title"> Gestion de Horarios </span></a>
		</li>
		<!--3.2-->
		<li class=" clickButtonMenu <?php if(isset($nombre)){ if($nombre === 'marina_chillan_trabajadores')echo "active"; }?> " data="6.2-marina_chillan_trabajadores">
			<a class="Marina_chillan" href="<?php echo base_url() ?>marina_chillan/trabajadores"><i class="fa fa-home"></i> <span class="title"> Listado Trabajadores </span></a>
		</li>
		<!--3.3-->
		<li class=" clickButtonMenu <?php if(isset($nombre)){ if($nombre === 'marina_chillan_listado')echo "active"; }?> " data="6.3-marina_chillan_listado">
			<a class="Marina_chillan" href="<?php echo base_url() ?>marina_chillan/requerimientos/listado"><i class="fa fa-home"></i> <span class="title"> Requerimientos </span></a>
		</li>
		<!--3.4-->
		<li>
			<a class="Marina_chillan" href="javascript:void(0)"><i class="fa fa-user"></i> <span class="title"> Solicitudes de Contratos marina_chillan </span></a>
			<ul class="sub-menu"  <?php if(isset($menu)){if($menu == '6.41')echo "style='display: block;'"; }?>>
				<!--6.41-->
				<li class=" clickButtonMenu <?php if(isset($nombre)){ if($nombre === 'marina_chillan_sol_pendie')echo "active"; }?> " data="6.41-marina_chillan_sol_pendie">
					<a class="Marina_chillan" href="<?php echo base_url() ?>marina_chillan/contratos/solicitudes_pendientes"><i class="fa fa-user"></i> <span class="title"> Solicitudes Pendientes </span></a>
				</li>
				<!--6.41-->
				<li class=" clickButtonMenu <?php if(isset($nombre)){ if($nombre === 'marina_chillan_sol_compl')echo "active"; }?> " data="6.41-marina_chillan_sol_compl">
					<a class="Marina_chillan" href="<?php echo base_url() ?>marina_chillan/contratos/solicitudes_completas"><i class="fa fa-user"></i> <span class="title"> Solicitudes Completas </span></a>
				</li>
				<li class=" clickButtonMenu <?php if(isset($nombre)){ if($nombre === 'marina_chillan_sol_pen_baj')echo "active"; }?> " data="6.41-marina_chillan_sol_pen_baj">
					<a class="Marina_chillan" href="<?php echo base_url() ?>marina_chillan/contratos/solicitudes_pendientes_baja"><i class="fa fa-user"></i> <span class="title"> Solicitud en proceso de baja </span></a>
				</li>
				<li class=" clickButtonMenu <?php if(isset($nombre)){ if($nombre === 'marina_chillan_sol_compl_baj')echo "active"; }?> " data="6.41-marina_chillan_sol_compl_baj">
					<a class="Marina_chillan" href="<?php echo base_url() ?>marina_chillan/contratos/solicitudes_completas_baja"><i class="fa fa-user"></i> <span class="title"> Solicitudes Bajadas </span></a>
				</li>
			</ul>
		</li>
	</ul>
</li>
<?php } ?>

