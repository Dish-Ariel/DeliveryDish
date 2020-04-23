<br><br>

<div class="container">
    <form action="" method="post">
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <h1 class="">Octopus</h1>
                <input id="varUsuario" type="text" class="form-control" name="idUsuario" value="<?php echo '$idUsuarioBD'; ?>" >
                <input id="varEstatusUsuario" type="text" class="form-control" value="<?php echo '$estatusUsuarioBD';?>">
            </div>
            <div class="col-md-3 mb-3">
                <label>Cadena:</label>
                <input type="text" class="form-control" disabled value="<?php echo'negocio_nombre';?>">
                <input type="text" class="form-control" name="idRestaurante" value="<?php echo 'idNegocio';?>">
            </div>
            <div class="col-md-3 mb-3">
                <label>Farmacia</label>
                <input type="text" class="form-control" disabled value="<?php echo 'sucursal';?>">
                <input id="varLatitud" type="text" value="<?php echo 'latitud';?>" >
                <input id="varLongitud" type="text" value="<?php echo 'longitud';?>" >
                <input id="varRangoDistancia" type="text" value="<?php echo 'rangoDistancia';?>" >
                <input id="varRangoTiempo" type="text" value="<?php echo 'rangoTiempo';?>" >
            </div>
        </div><br>

        <div class="form-row">
                <div class="col-md-2 mb-2">
                    <label>Código postal</label>*
                    <input id="varCp" type="number" class="form-control" name="cp" placeholder="xxxxx" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Colonia</label>*
                    <div id="varColonia">
                        <select id="comboColonia" class="custom-select" required>
                            <option disabled value="">Ingresa tu cp</option>
                        </select>
                    </div>
                    <input id="hiddenColonia" name="colonia" required hidden>
                </div>
                <div class="col-md-3 mb-3">
                    <div id="campo_delegacion">
                        <label>Delegación</label>*
                        <input id="varDelegacion" type="text" class="form-control" value="" name="delegacion" readonly="readonly" required>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div id="campo_municipio">
                        <label>Municipio</label>*
                        <input id="varMunicipio" type="text" class="form-control" value="" name="municipio" readonly="readonly" required>
                    </div>
                </div>
                <div class="col-md-5 mb-3">
                    <label>Calle</label>*
                    <div>
                        <select id="varCalle" class="custom-select" name="calle" required>
                            <option disabled value="">Selecciona tu colonia</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 mb-3">
                    <label>Exterior</label>*
                    <input type="text" class="form-control" name="exterior" value="" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label>Interior</label>*
                    <input type="text" class="form-control" name="interior" value="" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Teléfono Extra</label>
                    <input type="text" class="form-control" name="telefonoExtra" value="" placeholder="xx-xx-xx-xx-xx" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}" >
                </div>
                <div class="col-md-7 mb-3">
                    <label>Referencia del domicilio</label>*
                    <input type="text" class="form-control" name="referencia" value="" required>
                </div>
                <div class="col-md-5 mb-3">
                    <label>Correo electrónico</label>
                    <input type="text" class="form-control" name="correo" value="">
                </div>
                <div class="col-md-2 mb-2">
                    <label>Forma de pago</label>*
                    <select id="comboFormasPago" class="custom-select" name="formaPago" required>
                        <option value="Efectivo">Efectivo</option>
                        <option value="Tarjeta">Tarjeta</option>
                    </select>     
                </div>
                <div class="col-md-2 mb-2">
                    <div class="form-check" id="comboAcciones">
                        <label><input id="comboAccionesPagado" type="radio" name="estatusPago" class="form-check-input" value="Pagado">Pagado</label>
                        <br>
                        <label><input id="comboAccionesPorPagar" type="radio" name="estatusPago" class="form-check-input" value="PorPagar" checked>Por pagar</label>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Total de orden</label>*
                    <input type="number" class="form-control" name="total" value="" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Cambio de</label>
                    <input type="number" class="form-control" name="cambioDe" value="">
                </div>
                <div class="col-md-2 mb-3">
                    <label>Dimensión del pedido</label>*
                    <select class="custom-select" name="dimension" required>
                            <option value="Pequeño">Pequeño</option>
                            <option value="Mediano">Mediano</option>
                            <option value="Grande">Grande</option>
                            <option value="Extra grande">Extra grande</option>
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <label>Fecha de entrega</label>*
                    <input id="fechaPicker" type="text" class="form-control" placeholder="yyyy/mm/dd" name="fechaEntrega" value="<?php echo date("Y/m/d");?>" pattern="[0-9]{4}/[0-9]{2}/[0-9]{2}" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label>Horario de entrega</label>*
                    <input id="horaPicker" type="text" class="form-control" placeholder="hh:mm:ss" name="horarioEntrega" value="<?php echo date("H:i:s");?>" pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}" required>
                </div>
                <div class="col-md-8 mb-3">
                    <label>Número de pedido</label>
                    <input type="text" class="form-control" name="numeroPedido" value="">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Detalle de pedido</label>*
                    <input type="text" class="form-control" name="detallePedido" value="" required>
                </div> 
        </div>
        <br>
        <a id="varValidator" class="btn btn-primary" href="#">validar</a>
        <button id="varGuardador" class="btn btn-success" href="#" name="guardar" onclick="validarGuardar(event)">Guardar</button>
        <a class="btn btn-danger" name="cancelar" href="/">Cancelar</a>
        <br><br>
    </form>
</div>