<?php
/*
$_GET["facid"]=15;
var_dump($_GET);

exit;
*/

require '../../main.inc.php';




###############################################
# OBTENER IDENTIFICADOR
###############################################
#
if($_POST["facid"]>0){
    $facid=trim($_POST["facid"]);
}elseif($_GET["facid"]>0){
    $facid=trim($_GET["facid"]);
}else{
    exit('{"ERROR":"FALTA IDENTIFICADOR facid"}');
}

###############################################
# INCLUIR CONFIGURACION
###############################################
include("configuracion.php");

###############################################
# INCLUIR FUNCIONES
###############################################
include("funciones.php");

###############################################
# CONECTAR A LA BASE DE DATOS
###############################################
//$link_sistema=Conectar();


###############################################
# OBTENER DATOS DEL CERTIFICADO
###############################################
$Certificado=CertificadoGet();


###############################################
# OBTENER DATOS DEL CAF (TIMBRAJE DE FOLIOS)
###############################################
$Timbraje=CafGet();

###############################################
# OBTENER LOS DATOS DEL CONTRIBUYENTE
###############################################
$Contribuyente=ContribuyenteGet();

###############################################
# OBTENER TIPO DTE Y FOLIO DEL DOCUMENTO
###############################################
$Encabezado=DocumentoGet($facid);

#################################################
# SI EL DOCUMENTO NO TIENE FOLIO DTE ASIGNADO
#################################################
if(!$Encabezado["foliodte"]>0){

    #################################################
    # OBTENER EL FOLIO DOCUMENTO
    #################################################
    $nuevofolio=FolioDocumentoGet($Encabezado["tipodte"]);
    $Encabezado["foliodte"]=$nuevofolio["tipo".$Encabezado["tipodte"]];

    #################################################
    # AVANZAR EL FOLIO EN TABLA DE FOLIOS
    #################################################
    FolioDocumentoSet($Encabezado["tipodte"],$Encabezado["foliodte"]);

    #################################################
    # ACTUALIZAR EL FOLIO EN EL DOCUMENTO
    #################################################
    DocumentoAsignarFolio($facid,$Encabezado["foliodte"]);
}

#################################################
# OBTENER DATOS DEL ENCABEZADO
#################################################
$DocCabeza=DocumentoGetCabeza($facid);


#################################################
# OBTENER DATOS DEL CLIENTE
#################################################
#
$DatosCliente=ClienteGet($DocCabeza["fk_soc"]);
$Receptor["rut"]=$DatosCliente["siren"];
$Receptor["codigo"]=$DatosCliente["code_client"];
$Receptor["razon_social"]=$DatosCliente["nom"];
$Receptor["nombre_fantasia"]=$DatosCliente["name_alias"];
$Receptor["direccion"]=$DatosCliente["address"];
$Receptor["comuna"]=$DatosCliente["town"];
$Receptor["id_region"]=$DatosCliente["fk_departement"];
$Receptor["correo"]=$DatosCliente["email"];
$Receptor["fono"]=$DatosCliente["phone"];
$Receptor["web"]=$DatosCliente["url"];
#
$DatosClienteExtra=ClienteExtraGet($DocCabeza["fk_soc"]);
$Receptor["giro"]=$DatosClienteExtra["giro"];
$Receptor["contacto"]=$DatosClienteExtra["contacto"];
#
$DatosClienteRegion=ClienteRegion($Receptor["id_region"]);
$Receptor["ciudad"]=$DatosClienteRegion["nom"];

# ARRAY CON DETALLE
$VlrCodigo=array();
$NmbItem=array();
$DscItem=array();
$QtyItem=array();
$DecQtyItem=array();
$UnmdItem=array();
$PrcItem=array();
$DecPrcItem=array();
$IndExe=array();
$DescuentoPct=array();
$DscItemPesos=array();
$MontoItem=array();
#
$sql="select fk_product,description,qty,subprice,total_ht from llx_facturedet WHERE fk_facture='$facid' order by rowid asc";
$rsl=EjecutarSql($sql);
$filas=FilasSql($rsl);
$fila=0;
while ($fila < $filas) {
    //
    $objeto = $db->fetch_object($rsl);
    //
    $fk_product = $objeto->fk_product;
    $description = $objeto->description;
    $qty = $objeto->qty;
    $subprice = $objeto->subprice;
    $total_ht = $objeto->total_ht;
    #
    # VENTA DE PRODUCTO DEL CATALOGO
    if($fk_product>0){
        #
        $codigo_producto=$fk_product;
        #
        # OBTENER LOS DATOS DEL PRODUCTO
        $Producto=ProductosGet($codigo_producto);
        #
        # CARGAR VARIABLES
        $nombre_producto=$Producto["label"];
        $descripcion_producto=$Producto["description"];
        $codigo_alternativo=$Producto["ref"];
    #
    # VENTA SIN CODIGO
    }else{
        $nombre_producto=substr($description,0,30)."...";
        $codigo_producto="10001";
        $descripcion_producto=$description;
        $codigo_alternativo="10001";
    }
    #
    array_push($VlrCodigo,$codigo_alternativo);
    array_push($NmbItem,$nombre_producto);
    array_push($DscItem,$descripcion_producto);
    array_push($QtyItem, round($qty));
    array_push($DecQtyItem, 0);
    array_push($UnmdItem, "UND");
    array_push($PrcItem,round($subprice));
    array_push($DecPrcItem, 0);
    array_push($IndExe, 0);
    array_push($DescuentoPct, 0);
    array_push($DscItemPesos, 0);
    array_push($MontoItem, round($total_ht)  );
    #
    $fila++;
}
$db->free($rsl);

###############################################
# CREAR PAYLOAD
###############################################
#
include("crearpayload.php");


#########################################
# ENVIAR JSON Y RECUPERAR RESPUESTA
#########################################
#
$retorno=JsonEnviar($arregloJson,$url_api."/index.php");

#########################################
# DECODIFICAR LA RESPUESTA
#########################################
$jsonArray  = json_decode($retorno,true);

################################################
# NOMBRES DE LOS ARCHIVOS DE ORIGEN
################################################
$prefijo="FOLIO".$Encabezado["foliodte"]."_TIPO".$Encabezado["tipodte"]."_RUT".str_replace("-","",$Contribuyente["rut"]);
$nombre_pdfcarta=$prefijo."_CARTA.pdf";
$nombre_xml_sii =$prefijo."_SETFIRMADO_SII.xml";
$nombre_xml_cli =$prefijo."_SETFIRMADO_CLI.xml";
$nombre_trackid =$prefijo."_TRACKID.xml";

################################################
# NOMBRES DE LOS ARCHIVOS DE DESTINO
################################################
# IN2408-0002.pdf
if($FACTRONICA["SW_SOBREESCRIBIRPDF"]==1){
    $prefijo_destino=$DocCabeza["ref"];
}else{
    $prefijo_destino="FOLIO".$Encabezado["foliodte"]."TIPO".$Encabezado["tipodte"];
}

$nombre_pdfcarta_destino=$prefijo_destino.".pdf";
$nombre_pdfcarta_destino_respaldo=$prefijo_destino."CARTA.pdf";
$nombre_xml_sii_destino=$prefijo_destino."SII.xml";
$nombre_xml_cli_destino=$prefijo_destino."CLI.xml";
$nombre_trackid_destino=$prefijo_destino."TRK.xml";


#########################################
# DEFINIR EL ALMACEN LOCAL
#########################################
#
$carpeta_destino="../../../documents/facture/".$DocCabeza["ref"];
$url_origen=$FACTRONICA["HOST"]."/home/".str_replace("-","",$Contribuyente["rut"])."/ventas/".$nombre_pdfcarta;
$ruta_destino=$carpeta_destino."/".$nombre_pdfcarta_destino;
ObtenerArchivo($url_origen,$ruta_destino);


/*
#########################################
# OBTENER XML SII
#########################################
$url_origen=$url_home."/".$nombre_xml_sii;
$ruta_destino=$carpeta_destino."/".$nombre_xml_sii_destino;
ObtenerArchivo($url_origen,$ruta_destino);


#########################################
# OBTENER XML CLIENTE
#########################################
$url_origen=$url_home."/".$nombre_xml_cli;
$ruta_destino=$carpeta_destino."/".$nombre_xml_cli_destino;
ObtenerArchivo($url_origen,$ruta_destino);



#########################################
# OBTENER XML TRACKID
#########################################
$url_origen=$url_home."/".$nombre_trackid;
$ruta_destino=$carpeta_destino."/".$nombre_trackid_destino;
ObtenerArchivo($url_origen,$ruta_destino);
*/

#########################################
# OBTENER EL VALOR DEL TRACKID
#########################################
$trackid=time();


#########################################
# ACTUALIZAR TRACKID
######################################### 1=aprobado 2=aprobadorep 3=rechazado
$sql="update llx_facture_extrafields set trackid='$trackid',estadosii='1' where fk_object='".$facid."'";
EjecutarSql($sql);


echo "<script>location.href='card.php?facid=$facid'</script>";
?>
