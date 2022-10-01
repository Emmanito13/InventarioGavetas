<?php
require_once './Model/Modelo.php';

class Productos {
    private $model;
    
    function __construct(){
        $this->model = new Modelo();
    }
    
    function GuardarProducto(){
        $name = $_REQUEST['nombre'];
        $clave = $_REQUEST['claveinterna'];
        $codigo = $_REQUEST['cbarras'];
        $marca = $_REQUEST['marca'];
        $numpar = $_REQUEST['numero_parte'];
        $estado = $_REQUEST['condicion'];
        $cantidad = $_REQUEST['cantidad'];
        $ancho = $_REQUEST['ancho'];
        $eje = $_REQUEST['eje'];
        $spesor = $_REQUEST['espesor'];
        $largo = $_REQUEST['largo'];
        $carac = $_REQUEST['caracteristicas'];
        $lado = $_REQUEST['lado'];
        $tipo = $_REQUEST['tipo_refaccion'];
        $precio = $_REQUEST['preciounit'];
        $iva = $_REQUEST['iva'];
        $ieps = $_REQUEST['ieps'];
        $tabla = "ref_productos";
        $data = "(nombre,claveinterna,cbarras,marca,numero_parte,condicion,cantidad,ancho,eje,espesor,largo,caracteristicas,lado,tipo_refaccion,preciounit,iva,ieps) VALUES
                 ('$name','$clave','$codigo','$marca','$numpar','$estado','$cantidad','$ancho','$eje','$spesor','$largo','$carac','$lado','$tipo','$precio','$iva','$ieps');";
        $productos = new Modelo();
        $data = $productos->InserGeneral($tabla, $data);
        if($data){
            $id = $productos->ConsultarUltimaID("id_ref_producto",$tabla);
            echo $id;
        } else {
            echo "fallo";
        }
    }
    
    function GuardarFoto(){
        $idp = $_REQUEST['id_ref_producto'];
        $productos = new Modelo();
        $data = $productos->InserGeneral("ref_fotos","(id_ref_producto,foto,informacion) VALUES ($idp,'producto.png','sin foto')");
        if($data){
            echo "exitoso";
        } else {
            echo "fallo";
        }
    }
    
    function ConsultarRefProductos(){
        $productos = new Modelo();
        $dato = $productos->ConsultaCondicion("ref_productos", "estado='activo'");
        if($dato){
            echo json_encode($dato);
        } else {
            echo "fallo";
        }
    }
    
    function ConsultarMarcas(){
        $productos = new Modelo();
        $dato = $productos->ConsultaGeneral("car_make GROUP BY name ASC");
        if($dato){
            echo json_encode($dato);
        } else {
            echo "fallo";
        }
    }
    
    function ConsultarModelo(){
        $id_model = $_REQUEST['id_car_make'];
        $productos = new Modelo();
        $dato = $productos->ConsultaCondicion("car_model", "id_car_make = $id_model ORDER BY name ASC");
        if($dato){
            echo json_encode($dato);
        } else {
            echo "fallo";
        }
    }
    
    function ConsultarMotor(){
        $id_motor = $_REQUEST['id_car_model'];
        $productos = new Modelo();
        $dato = $productos->ConsultaCondicion("car_trim", "id_car_model = $id_motor");
        if($dato){
            echo json_encode($dato);
        } else {
            echo "fallo";
        }
    }
    
    function ConsultarAnios(){
        $id_motor = $_REQUEST['id_car_model'];
        $productos = new Modelo();
        $dato = $productos->ConsultaCondicion("car_generation", "id_car_model = $id_motor");
        if($dato){
            echo json_encode($dato);
        } else {
            echo "fallo";
        }
    }
    
    function GuardarProductoCompatibles(){
        $idproducto = $_REQUEST['id_ref_producto'];
        $id_tipo = $_REQUEST['id_tipo_ref'];
        $marca = $_REQUEST['marca'];
        $modelo = $_REQUEST['modelo'];
        $inicio = $_REQUEST['anio_inicio'];
        $fin = $_REQUEST['anio_fin'];
        $motor = $_REQUEST['motor'];
        $comen = $_REQUEST['comentario'];
        $tabla = "ref_productos_compatible";
        $data = "(id_ref_producto,id_tipo_ref,marca,modelo,anio_inicio,anio_fin,motor,comentario) VALUES ($idproducto,$id_tipo,'$marca','$modelo',$inicio,$fin,'$motor','$comen')";
        $productos = new Modelo();
        $data = $productos->InserGeneral($tabla, $data);
        if ($data){
            echo "exitoso";
        } else {
            echo "fallo";
        }
    }
    
    function  EliminarProducto(){
        $id = $_REQUEST['d_ref_producto'];
        $modelo = new Modelo();
        $dato = $modelo->Actualizar("UPDATE ref_productos SET estado='baja' WHERE ref_productos.id_ref_producto=$id;");
        if($dato){ 
            echo "exitoso"; 
        } else { 
            echo "fallo"; 
        }
    }
    
    function ConsultarProductosCompatibles(){
        $id = $_REQUEST['id_ref_producto'];
        $productos = new Modelo();
        $dato = $productos->ConsultaCondicion("ref_productos_compatible, ref_tipo", "id_ref_producto = $id AND ref_productos_compatible.id_tipo_ref=ref_tipo.id_ref_tipo AND ref_productos_compatible.estatus='activo'");
        if($dato){
            echo json_encode($dato);
        } else {
            echo "fallo";
        }
    }
    
    function EliminarCompatibles(){
    	$idR = $_REQUEST['idCompatible'];
        $productos = new Modelo();
        $dato = $productos->ActualizarGeneral("ref_productos_compatible", "estatus='baja'", "id_ref_productos_usos=$idR");
        if($dato){ 
            echo "exitoso"; 
        } else { 
            echo "fallo"; 
        }
    }
    
    function ConsultarProductoConFoto(){
        //SELECT p.id_ref_producto, p.nombre, p.claveinterna, p.cbarras, p.marca AS idmarca, m.nombre AS marca, p.numero_parte, p.condicion, p.cantidad, p.ancho, p.eje, p.espesor, p.espesor, p.largo, p.caracteristicas, p.lado, p.tipo_refaccion, t.nombre as tipo, p.preciounit, p.iva, p.ieps, f.foto FROM ref_productos AS p LEFT OUTER JOIN ref_fotos as f ON p.id_ref_producto=f.id_ref_producto LEFT OUTER JOIN ref_tipo as t ON p.tipo_refaccion=t.id_ref_tipo LEFT OUTER JOIN ref_productos_marca as m ON p.marca=m.id_ref_pro_marca WHERE p.estado='activo' GROUP BY p.id_ref_producto LIMIT 100
        $productos = new Modelo();
        $dato = $productos->Consulta_LEFT("p.id_ref_producto, p.nombre, p.claveinterna, p.cbarras, p.marca AS idmarca, m.nombre AS marca, p.numero_parte, p.condicion, p.cantidad, p.ancho,
            p.eje, p.espesor, p.espesor, p.largo, p.caracteristicas, p.lado, p.tipo_refaccion, t.nombre as tipo, p.preciounit, p.iva, p.ieps, f.foto FROM ref_productos AS p 
            LEFT OUTER JOIN ref_fotos as f ON p.id_ref_producto=f.id_ref_producto LEFT OUTER JOIN ref_tipo as t ON p.tipo_refaccion=t.id_ref_tipo 
            LEFT OUTER JOIN ref_productos_marca as m ON p.marca=m.id_ref_pro_marca WHERE p.estado='activo' GROUP BY p.id_ref_producto ORDER BY p.nombre ASC LIMIT 100");
        if($dato){
            echo json_encode($dato);
        } else {
            echo "fallo";
        }
    }
    
    function EditarProducto(){
    	$id = $_REQUEST['id_ref_producto'];
        $name = $_REQUEST['nombre'];
        $clave = $_REQUEST['claveinterna'];
        $codigo = $_REQUEST['cbarras'];
        $marca = $_REQUEST['marca'];
        $numpar = $_REQUEST['numero_parte'];
        $estado = $_REQUEST['condicion'];
        $cantidad = $_REQUEST['cantidad'];
        $ancho = $_REQUEST['ancho'];
        $eje = $_REQUEST['eje'];
        $spesor = $_REQUEST['espesor'];
        $largo = $_REQUEST['largo'];
        $carac = $_REQUEST['caracteristicas'];
        $lado = $_REQUEST['lado'];
        $tipo = $_REQUEST['tipo_refaccion'];
        $precio = $_REQUEST['preciounit'];
        $iva = $_REQUEST['iva'];
        $ieps = $_REQUEST['ieps'];
        $tabla = "ref_productos";
        $data = "nombre='$name', claveinterna='$clave', cbarras='$codigo', marca='$marca', numero_parte='$numpar', condicion='$estado', cantidad='$cantidad', ancho='$ancho', 
               eje='$eje', espesor='$spesor', largo='$largo', caracteristicas='$carac', lado='$lado', tipo_refaccion='$tipo', preciounit=$precio, iva=$iva, ieps=$ieps";
        $condicion = "id_ref_producto=$id";
        $productos = new Modelo();
        $dato = $productos->ActualizarGeneral($tabla, $data, $condicion);
        if($dato){ 
            echo "exitoso"; 
        } else { 
            echo "fallo"; 
        }
    }
    
    function ConsultarProductoNuevos(){
        $productos = new Modelo();
        $dato = $productos->Consulta_LEFT(" p.id_ref_producto, p.nombre, p.claveinterna, p.cbarras, p.marca AS idmarca, m.nombre AS marca, p.numero_parte, p.condicion, p.cantidad,
                p.ancho, p.eje, p.espesor, p.espesor, p.largo, p.caracteristicas, p.lado, p.tipo_refaccion, t.nombre as tipo, p.preciounit, p.iva, p.ieps, f.foto, p.fecha_alta 
                FROM ref_productos AS p LEFT OUTER JOIN ref_fotos as f ON p.id_ref_producto=f.id_ref_producto LEFT OUTER JOIN ref_tipo as t ON p.tipo_refaccion=t.id_ref_tipo 
                LEFT OUTER JOIN ref_productos_marca as m ON p.marca=m.id_ref_pro_marca WHERE p.estado='activo' AND WEEK(p.fecha_alta) GROUP BY p.id_ref_producto ORDER BY p.nombre ASC LIMIT 100");
        if($dato){
            echo json_encode($dato);
        } else {
            echo "fallo";
        }
    }
    
    
    function BuscarProducto(){
        $b = $_REQUEST['buscar'];
        $productos = new Modelo();
        $dato = $productos->Consulta_LEFT("p.id_ref_producto, p.nombre, p.claveinterna, p.cbarras, p.marca AS idmarca, m.nombre AS marca, p.numero_parte, p.condicion, p.cantidad, p.ancho, 
                p.eje, p.espesor, p.espesor, p.largo, p.caracteristicas, p.lado, p.tipo_refaccion, t.nombre as tipo, p.preciounit, p.iva, p.ieps, f.foto FROM ref_productos AS p 
                LEFT OUTER JOIN ref_fotos as f ON p.id_ref_producto=f.id_ref_producto LEFT OUTER JOIN ref_tipo as t ON p.tipo_refaccion=t.id_ref_tipo 
                LEFT OUTER JOIN ref_productos_marca as m ON p.marca=m.id_ref_pro_marca
            WHERE p.nombre LIKE '%$b%'OR p.claveinterna LIKE '%$b%' OR p.numero_parte LIKE '%$b%' OR p.cbarras LIKE '%$B%' AND p.estado='activo' GROUP BY p.id_ref_producto LIMIT 100");
        if($dato){
            echo json_encode($dato);
        } else {
            echo "fallo";
        }
    }
    
    function ConsultarCompatibesPorID_Producto(){
        $id = $_REQUEST['id_ref_producto'];
        $productos = new Modelo();
        $dato = $productos->ConsultaCondicion("id_ref_producto", "id_ref_producto = $id AND estatus = 'activo'");
        if($dato){
            echo json_encode($dato);
        } else {
            echo "fallo";
        }
    }
    
    function ConsultarCompatibesPorMarca(){
        $marca = $_REQUEST['marca'];
        $model = $_REQUEST['modelo'];
        $inicio = $_REQUEST['anio_inicio'];
        $fin = $_REQUEST['anio_fin'];
        $motor = $_REQUEST['motor'];
        $productos = new Modelo();
        $dato = $productos->ConsultaCondicion("id_ref_producto", "marca='$marca' AND modelo='$model' AND anio_inicio='$inicio' AND anio_fin='$fin' AND motor='$motor' AND estatus='activo'");
        if($dato){
            echo json_encode($dato);
        } else {
            echo "fallo";
        }
    }
    
    function BuscarCompatibes(){
        $idTipo = $_REQUEST['id_ref_tipo'];
        $marca = $_REQUEST['marca'];
        $model = $_REQUEST['modelo'];
        $inicio = $_REQUEST['anio_inicio'];
        $fin = $_REQUEST['anio_fin'];
        $motor = $_REQUEST['motor'];
        $tabla = "ref_productos_compatible as com, ref_tipo";
        $condicion = "com.marca='$marca' AND com.modelo='$model' AND com.anio_inicio=$inicio AND com.anio_fin=$fin AND com.motor='$motor' AND ref_tipo.id_ref_tipo=$idTipo";
        $productos = new Modelo();
        $dato = $productos->ConsultaCondicion($tabla,$condicion);
        if($dato){
            echo json_encode($dato);
        } else {
            echo "fallo";
        }
    }
    
    function ConsultarTipoRef(){
        $fotos = new Modelo();
        $dato = $fotos->ConsultaCondicion("ref_tipo", "estatus='activo'");
        if($dato){
            echo json_encode($dato);
        } else {
            echo "fallo";
        }
    }
    
    function BuscarPorTipo(){
        $tipo = $_REQUEST['id_ref_tipo'];
        $productos = new Modelo();
        $dato = $productos->Consulta_LEFT("p.id_ref_producto, p.nombre, p.claveinterna, p.cbarras, p.marca AS idmarca, m.nombre AS marca, p.numero_parte, p.condicion, p.cantidad, p.ancho, 
            p.eje, p.espesor, p.espesor, p.largo, p.caracteristicas, p.lado, p.tipo_refaccion, t.nombre as tipo, p.preciounit, p.iva, p.ieps, f.foto FROM ref_productos AS p 
            LEFT OUTER JOIN ref_fotos as f ON p.id_ref_producto=f.id_ref_producto LEFT OUTER JOIN ref_tipo as t ON p.tipo_refaccion=t.id_ref_tipo 
            LEFT OUTER JOIN ref_productos_marca as m ON p.marca=m.id_ref_pro_marca
            WHERE t.id_ref_tipo=$tipo AND p.estado='activo'");
        if($dato){
            echo json_encode($dato);
        } else {
            echo "fallo";
        }
    }
    
    function ConsultarProductoPorClave(){
        $clave = $_REQUEST['id_ref_producto'];
        $selec = "pro.id_ref_producto, f.foto, pro.nombre, pro.claveinterna, pro.cbarras, pro.cbarras, pro.marca, pro.numero_parte, pro.condicion, pro.cantidad, pro.ancho, pro.eje, pro.espesor, pro.largo, pro.caracteristicas, pro.lado, tipo.nombre as tipo_ref, pro.preciounit, pro.iva, pro.ieps";
        $condicion = "pro.tipo_refaccion=tipo.id_ref_tipo AND pro.id_ref_producto=f.id_ref_producto AND pro.id_ref_producto='$clave' AND pro.estado='activo' GROUP BY pro.id_ref_producto";
        $tabla = "ref_productos as pro, ref_tipo as tipo, ref_fotos as f";
        $productos = new Modelo();
        $dato = $productos->ConsultaEspe($selec, $tabla, $condicion);
        if($dato){
            echo json_encode($dato);
        } else {
            echo "fallo";
        }
    }
    
    function ConsultarTipoRefaccion(){
        $productos = new Modelo();
        $dato = $productos->ConsultaGroupBy("tipo_refaccion", "ref_productos", "tipo_refaccion");
         if($dato){
            echo json_encode($dato);
        } else {
            echo "fallo";
        }
    }
    
    function AgregarTipoRef(){
        $tipo = $_REQUEST['nombre'];
        $data = " (nombre) VALUES ('$tipo') ";
        $model = new Modelo();
        $data = $model->InserGeneral("ref_tipo", $data);
        if($data){
            echo "exitoso"; 
        } else { 
            echo "fallo"; 
        }
    }
    
    function EliminarTipoRef(){
        $idTipo = $_REQUEST['id_ref_tipo'];
        $model = new Modelo();
        $dato = $model->ActualizarGeneral("ref_tipo", "estatus='baja'", "id_ref_tipo=$idTipo");
        if($dato){ 
            echo "exitoso"; 
        } else { 
            echo "fallo"; 
        }
    }
    
    function BuscarTipoRefaccion(){
        $name = $_REQUEST['nombre'];
        $productos = new Modelo();
        $dato = $productos->ConsultaCondicion("ref_tipo", "nombre LIKE '%$name%'");
        if($dato){
            echo json_encode($dato);
        } else {
            echo "fallo";
        }
    }
    
    function ConsultarRefTipo_ID(){
        $id = $_REQUEST['id_ref_tipo'];
        $fotos = new Modelo();
        $dato = $fotos->ConsultaCondicion("ref_tipo", "id_ref_tipo=$id");
        if($dato){
            echo json_encode($dato);
        } else {
            echo "fallo";
        }
    }
    
     function ConsultarMarcasProducto(){
        $productos = new Modelo();
        $dato = $productos->Consulta("ref_productos_marca");
        if($dato){
            echo json_encode($dato);
        } else {
            echo "fallo";
        }
    }
    
     function ConsultarMarcasProductoPorId(){
        $idm = $_REQUEST['id_ref_pro_marca'];
        $productos = new Modelo();
        $dato = $productos->ConsultaCondicion("ref_productos_marca", "id_ref_pro_marca= AND estatus='ALTA'");
        if($dato){
            echo json_encode($dato);
        } else {
            echo "fallo";
        }
    }
    
    
}
