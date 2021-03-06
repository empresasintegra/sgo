<div id="modal">
  <form action="<?php echo base_url() ?>logistica_servicios/requerimientos/guardar_nuevo_contrato_anexo_doc_contractual/<?php echo $usuario?>/<?php echo $tipo?>/<?php echo $asc_area?>" role="form" id="form2" method='post' name="f2" enctype="multipart/form-data">
    <input type='hidden' name="datos_extras" id="datos_extras" value="SI"/> 
    <div id="modal_content">
      <?php if($datos_generales != FALSE){ ?>
      <?php foreach ($datos_generales as $usu){ ?>
      <div class="row">
        <div class="col-md-6 col-sd-6">
          <h5><b><u>Datos trabajador:</u></b></h5>
          <table class="table">
            <tbody>
              <tr>
                <td><b>Nombres</b></td>
                <td><?php echo $usu->nombres_apellidos ?></td>
              </tr>
              <tr>
                <td><b>Rut</b></td>
                <td><?php echo $usu->rut ?></td>
              </tr>
              <tr>
                <td><b>Estado Civil</b></td>
                <td><?php echo $usu->estado_civil ?></td>
              </tr>
              <tr>
                <td><b>Fecha Nacimiento</b></td>
                <td><?php echo $usu->fecha_nac ?></td>
              </tr>
              <tr>
                <td><b>Domicilio</b></td>
                <td><?php echo $usu->domicilo ?></td>
              </tr>
              <tr>
                <td><b>Ciudad</b></td>
                <td><?php echo $usu->ciudad ?></td>
              </tr>
              <tr>
                <td><b>Previsión</b></td>
                <td><?php echo $usu->prevision ?></td>
              </tr>
              <tr>
                <td><b>Salud</b></td>
                <td><?php echo $usu->salud ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md-6  col-sd-6">
          <h5><b><u>Datos adicionales:</u></b></h5>
          <table class="table">
            <tbody>
                <!--<tr>
                  <td><b>Nombre Requerimiento</b></td>
                  <td><font color="#0101DF"><?php echo $usu->nombre_req ?></font></td>
                </tr>-->
                <tr>
                  <td><b>Referido</b></td>
                  <td><?php if($usu->referido == 1) echo "SI"; else echo "NO";  ?></td>
                </tr>
                <tr>
                  <td><b>Puesto de trabajo/Cargo</b></td>
                  <td><?php echo $usu->cargo ?></td>
                </tr>
                <tr>
                  <td><b>Area Trabajo</b></td>
                  <td><?php echo $usu->area ?></td>
                </tr>
                <tr>
                  <td><b>Centro de Costo</b></td>
                  <td><?php echo $usu->nombre_centro_costo ?></td>
                </tr>
                <tr>
                  <td><b>Nivel Educacional</b></td>
                  <td><?php echo $usu->nivel_estudios ?></td>
                </tr>
                <tr>
                  <td><b>Teléfono</b></td>
                  <td><?php echo $usu->telefono ?></td>
                </tr>
                <tr>
                  <td><b>Nacionalidad</b></td>
                  <td><?php echo $usu->nacionalidad ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <h5><b><u>Datos empresa:</u></b></h5>
        <div class="row">
          <div class="col-md-6  col-sd-6">
            <table class="table">
              <tbody>
                <tr>
                  <td><b>Razón Social</b></td>
                  <td><?php echo $usu->nombre_centro_costo ?></td>
                </tr>
                <tr>
                  <td><b>Rut</b></td>
                  <td><?php echo $usu->rut_centro_costo ?></td>
                </tr>
                <tr>
                  <td><b>Planta</b></td>
                  <td><?php echo $usu->nombre_planta ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-md-6  col-sd-">
            <table class="table">
              <tbody>
                <tr>
                  <td><b>Dirección Planta</b></td>
                  <td><?php echo $usu->direccion_planta ?></td>
                </tr>
                <tr>
                  <td><b>Región Planta</b></td>
                  <td><?php echo $usu->region_planta ?></td>
                </tr>
                <tr>
                  <td><b>Tipo Gratificación Planta</b></td>
                  <td><?php echo $usu->tipo_gratificacion ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <?php } ?>
        <?php } ?>
        <hr>
        <br>
        <div class="col-md-6">
          <h4><b><u>Datos del contrato</u></b></h4>
          <div class="control-form">
            <label class="control-label" for="causal">Causal</label>
            <div class="controls">
              <select name="causal" id="causal" class="form-control" required>
                <option value="<?php echo isset($datos_req->causal)?$datos_req->causal:'' ?>"><?php echo isset($datos_req->causal)?$datos_req->causal:$causal_defecto ?></option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
              </select>
            </div>
          </div>
          <div class="control-form">
            <label class="control-label" for="motivo">Motivo</label>
            <div class="controls">
              <input type='text' class="form-control" name="motivo" id="motivo" value="<?php echo isset($datos_req->motivo)?$datos_req->motivo:$motivo_defecto ?>" required/>
            </div>
          </div>
          <div class="control-form">
            <label class="control-label" for="dia_fi">Fecha Inicio</label>
            <div class="controls">
              <?php
              $get_fi = isset($datos_req->fecha_inicio)?1:0;
              if($get_fi == 1){
                $f = explode('-', $datos_req->fecha_inicio);
                $dia_fi = $f[2];
                $mes_fi = $f[1];
                $ano_fi = $f[0];
              }else{
                $dia_fi = false;
                $mes_fi = false;
                $ano_fi = false;
              }
              ?>
              <select name="dia_fi" id="dia_fi" style="width: 33%;" required>
                <option value="" >Dia</option>
                <?php for($i=1;$i<32;$i++){ ?>
                <option <?php echo ($dia_fi == $i)? "selected='selected'" : '' ?>><?php echo $i ?></option>
                <?php } ?>
              </select>
              <select name="mes_fi" id="mes_fi" style="width: 33%;" required>
                <option value="">Mes</option>
                <option value='01' <?php echo ($mes_fi == '1')? "selected='selected'" : '' ?>>Enero</option>
                <option value='02' <?php echo ($mes_fi == '2')? "selected='selected'" : '' ?>>Febrero</option>
                <option value='03' <?php echo ($mes_fi == '3')? "selected='selected'" : '' ?>>Marzo</option>
                <option value='04' <?php echo ($mes_fi == '4')? "selected='selected'" : '' ?>>Abril</option>
                <option value='05' <?php echo ($mes_fi == '5')? "selected='selected'" : '' ?>>Mayo</option>
                <option value='06' <?php echo ($mes_fi == '6')? "selected='selected'" : '' ?>>Junio</option>
                <option value='07' <?php echo ($mes_fi == '7')? "selected='selected'" : '' ?>>Julio</option>
                <option value='08' <?php echo ($mes_fi == '8')? "selected='selected'" : '' ?>>Agosto</option>
                <option value='09' <?php echo ($mes_fi == '9')? "selected='selected'" : '' ?>>Septiembre</option>
                <option value='10' <?php echo ($mes_fi == '10')? "selected='selected'" : '' ?>>Octubre</option>
                <option value='11' <?php echo ($mes_fi == '11')? "selected='selected'" : '' ?>>Noviembre</option>
                <option value='12' <?php echo ($mes_fi == '12')? "selected='selected'" : '' ?>>Diciembre</option>
              </select>
              <select name="ano_fi" id="ano_fi" style="width: 32%;" required>
                <option value="">Año</option>
                <?php $tope_f = (date('Y') - 5 ); ?>
                <?php for($i=$tope_f;$i < (date('Y') + 6 ); $i++){ ?>
                <option value="<?php echo $i ?>" <?php echo ($ano_fi == $i)? "selected='selected'" : '' ?>><?php echo $i ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="control-form">
            <label class="control-label" for="dia_ft">Fecha Termino</label>
            <div class="controls">
              <?php
              $get_ft = isset($datos_req->fecha_termino)?1:0;
              if($get_ft == 1){
                $f = explode('-', $datos_req->fecha_termino);
                $dia_ft = $f[2];
                $mes_ft = $f[1];
                $ano_ft = $f[0];
              }else{
                $dia_ft = false;
                $mes_ft = false;
                $ano_ft = false;
              } ?>
              <select name="dia_ft" id="dia_ft" style="width: 33%;">
                <option value="" >Dia</option>
                <?php for($i=1;$i<32;$i++){ ?>
                <option <?php echo ($dia_ft == $i)? "selected='selected'" : '' ?>><?php echo $i ?></option>
                <?php } ?>
              </select>
              <select name="mes_ft" id="mes_ft" style="width: 33%;">
                <option value="">Mes</option>
                <option value='01' <?php echo ($mes_ft == '1')? "selected='selected'" : '' ?>>Enero</option>
                <option value='02' <?php echo ($mes_ft == '2')? "selected='selected'" : '' ?>>Febrero</option>
                <option value='03' <?php echo ($mes_ft == '3')? "selected='selected'" : '' ?>>Marzo</option>
                <option value='04' <?php echo ($mes_ft == '4')? "selected='selected'" : '' ?>>Abril</option>
                <option value='05' <?php echo ($mes_ft == '5')? "selected='selected'" : '' ?>>Mayo</option>
                <option value='06' <?php echo ($mes_ft == '6')? "selected='selected'" : '' ?>>Junio</option>
                <option value='07' <?php echo ($mes_ft == '7')? "selected='selected'" : '' ?>>Julio</option>
                <option value='08' <?php echo ($mes_ft == '8')? "selected='selected'" : '' ?>>Agosto</option>
                <option value='09' <?php echo ($mes_ft == '9')? "selected='selected'" : '' ?>>Septiembre</option>
                <option value='10' <?php echo ($mes_ft == '10')? "selected='selected'" : '' ?>>Octubre</option>
                <option value='11' <?php echo ($mes_ft == '11')? "selected='selected'" : '' ?>>Noviembre</option>
                <option value='12' <?php echo ($mes_ft == '12')? "selected='selected'" : '' ?>>Diciembre</option>
              </select>
              <select name="ano_ft" id="ano_ft" style="width: 32%;">
                <option value="">Año</option>
                <?php $tope_f = (date('Y') - 5 ); ?>
                <?php for($i=$tope_f;$i < (date('Y') + 6 ); $i++){ ?>
                <option value="<?php echo $i ?>" <?php echo ($ano_ft == $i)? "selected='selected'" : '' ?>><?php echo $i ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="control-form">
            <label class="control-label" for="jornada">Jornada</label>
            <div class="controls">
              <?php $id_horario_antiguo = isset($datos_req->jornada)?$datos_req->jornada:''; ?>
              <select name="jornada" id="jornada" class="form-control" required>
                <option value="">[Seleccione]</option>
                <?php foreach($horarios_planta as $hp){ ?>
                <option value="<?php echo $hp->id ?>" title="<?php echo str_replace("<w:br/>","\n", $hp->descripcion) ?>" <?php if($id_horario_antiguo == $hp->id) echo "selected"; ?>  ><?php echo $hp->nombre_horario ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="control-form">
            <label class="control-label" for="renta_imponible">Sueldo Base de la Liquidación</label>
            <div class="controls">
              <input type='text' class="form-control" name="renta_imponible" id="renta_imponible" value="<?php echo isset($datos_req->renta_imponible)?$datos_req->renta_imponible:'0' ?>" required/>
            </div>
          </div>
        </div>
        <div class="col-md-6">
         <h4><b><u>Bonos</u></b></h4>
         <div class="control-form">
          <label class="control-label" for="asignacion_movilizacion">Asignación Movilización</label>
          <div class="controls">
            <input type='text' class="form-control" name="asignacion_movilizacion" id="asignacion_movilizacion" value="<?php echo isset($datos_req->asignacion_movilizacion)?$datos_req->asignacion_movilizacion:'0' ?>" required/>
          </div>
        </div>
        <div class="control-form">
          <label class="control-label" for="asignacion_colacion">Asignación Colación</label>
          <div class="controls">
            <input type='text' class="form-control" name="asignacion_colacion" id="asignacion_colacion" value="<?php echo isset($datos_req->asignacion_colacion)?$datos_req->asignacion_colacion:'0' ?>" required/>
          </div>
        </div>
        <div class="control-form">
          <label class="control-label" for="asignacion_zona">Asignación Zona</label>
          <div class="controls">
            <input type='text' class="form-control" name="asignacion_zona" id="asignacion_zona" value="<?php echo isset($datos_req->asignacion_zona)?$datos_req->asignacion_zona:'0' ?>" required/>
          </div>
        </div>
        <div class="control-form">
          <label class="control-label" for="viatico">Viatico</label>
          <div class="controls">
            <input type='text' class="form-control" name="viatico" id="viatico" value="<?php echo isset($datos_req->viatico)?$datos_req->viatico:'0' ?>" required/>
          </div>
        </div>
      </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br>
    <div class="modal_content">
      <button type="button" name="cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      <button type="submit" name="actualizar" class="btn btn-primary">Agregar</button>
    </div>
  </form>
</div>