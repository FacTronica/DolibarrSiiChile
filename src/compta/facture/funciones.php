<?php

#################################################
# OBTENER DATOS DE CONDICIONES DE PAGO
#################################################
/*
llx_c_payment_term   nbjour=dias
libelle  npmbre
libelle_facture  descripion
*/


#################################################
# OBTENER DATOS DE UNA TABLA
#################################################
#
# PARAMETROS: TABLA,KEY,ID,CAMPOS
/*
function EntidadGetX($tabla,$key,$id,$campos){
    $sql="select $campos from $tabla where $key='$id' limit 1";
    $rsl=EjecutarSql($sql);
    $respuesta=mysqli_fetch_array($rsl,MYSQLI_ASSOC);
    mysqli_free_result($rsl);
    return $respuesta;
}
*/

function EntidadGet($tabla,$key,$id,$campos){
    global $db;
    if($key!="" and $id!=""){
        $filtro=" where $key='$id' ";
    }
    $limite="  limit 1";

    $sql="select $campos from $tabla $filtro $limite";
    //echo "<hr>$sql<hr>";
    //$rsl=EjecutarSql($sql);
	$rsl = $db->query($sql);
    $respuesta=mysqli_fetch_array($rsl,MYSQLI_ASSOC);
    mysqli_free_result($rsl);
    return $respuesta;
}


function EjecutarSql($sql){
    global $db;
    //echo "<hr>$sql<hr>";
	$rsl = $db->query($sql);
    return $rsl;
}


function FilasSql($rsl){
    global $db;
    $num = $db->num_rows($rsl);
    return $num;
}



###############################################
# FUNCION PARA ENVIAR JSON A UNA URL
###############################################
#
function JsonEnviar($arregloJson,$url){
    //
    global $FACTRONICA;
    //
    $payload = json_encode($arregloJson);
    #
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_PORT,$FACTRONICA["CURL_PUERTO"]);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER,array("Content-type: application/json"));
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS,$payload);
    $json_response = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    #
    return $json_response;
}

###############################################
#
###############################################
#
function ObtenerArchivo($url_origen,$ruta_destino){
	$contenido = file_get_contents($url_origen);
	$archivo=fopen ($ruta_destino, 'w');
	fwrite ($archivo, $contenido)or die("error: al guardar el archivo $ruta_destino");
	fclose ($archivo);
}

###############################################
#
###############################################
#
function ObtenerArchivoCurl($url_origen,$ruta_destino,$puerto){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url_origen);
    curl_setopt($ch, CURLOPT_PORT,$puerto);
    $fp = fopen($ruta_destino, 'w')or die("Error File");
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_exec ($ch)or die("Error Curl");
    curl_close ($ch);
    fclose($fp);
}



#################################################
# OBTENER LOS DATOS DEL CAF
#################################################
function CafGet(){
    return EntidadGet("llx_siitimbrajes","","","*");
}


#################################################
# OBTENER LOS DATOS DEL CERTIFICADO
#################################################
function CertificadoGet(){
    return EntidadGet("llx_siicertificados","","","*");
}


#################################################
# OBTENER LOS DATOS DEL CONTRIBUYENTE EMISOR
#################################################
function ContribuyenteGet(){
    /*
    $sql="select * from llx_siichile_contribuyente limit 1";
    $rsl=EjecutarSql($sql);
    $respuesta=mysqli_fetch_array($rsl,MYSQLI_ASSOC); // MYSQLI_ASSOC  MYSQLI_NUM  MYSQLI_BOTH (this is default)
    mysqli_free_result($rsl);
    return $respuesta;
    */
    return EntidadGet("llx_siichile_contribuyente","","","*");
}


#################################################
# ACTUALIZAR EL FOLIO DEL DOCUMENTO
#################################################
function FolioDocumentoSet($tipodte,$foliodte){
    $folio_siguiente=$foliodte+1;
    $sql="update llx_siichile_contadorfolios set tipo".$tipodte."='$folio_siguiente'";
    EjecutarSql($sql);
}
#################################################
# OBTENER EL ULTIMO FOLIO EMITIDO DEL TIPO
#################################################
function FolioDocumentoGet($tipodte){
    /*
    $sql="select tipo".$tipodte." from llx_siichile_contadorfolios";
    $rsl=EjecutarSql($sql);
    $respuesta=mysqli_fetch_array($rsl,MYSQLI_ASSOC);
    mysqli_free_result($rsl);
    return $respuesta["tipo".$tipodte];
    */
    return EntidadGet("llx_siichile_contadorfolios","","","tipo".$tipodte);
}


#################################################
# ACTUALIZAR EL FOLIO DEL DTE EN EL DOCUMENTO
#################################################
function DocumentoAsignarFolio($facid,$foliodte){
    $sql="update llx_facture_extrafields set foliodte='$foliodte' where fk_object='$facid'";
    EjecutarSql($sql);
}
#################################################
# OBTENER TIPO DTE Y FOLIO ACTUAL DEL DOCUMENTO
#################################################
function DocumentoGet($facid){
    /*
    $sql="select tipodte,foliodte from llx_facture_extrafields where fk_object='$facid'";
    $rsl=EjecutarSql($sql);
    $respuesta=mysqli_fetch_array($rsl,MYSQLI_ASSOC);
    mysqli_free_result($rsl);
    return $respuesta;
    */
    return EntidadGet("llx_facture_extrafields","fk_object","$facid","tipodte,foliodte");
}
#################################################
# OBTENER TOTALES DEL DOCUMENTO
#################################################
function DocumentoGetCabeza($facid){
    #  total_tva=iva  total_ht=iva    total_ttc=total
    /*
    $sql="select * from llx_facture where rowid='$facid'";
    $rsl=EjecutarSql($sql);
    $respuesta=mysqli_fetch_array($rsl,MYSQLI_ASSOC);
    mysqli_free_result($rsl);
    return $respuesta;
    */
    return EntidadGet("llx_facture","rowid","$facid","*");
}
#################################################
# OBTENER REFERENCIAS DEL DOCUMENTO
#################################################
function DocumentoGetReferencia($facid){
    /*
    $sql="select ref from llx_facture where rowid='$facid'";
    $rsl=EjecutarSql($sql);
    $respuesta=mysqli_fetch_array($rsl,MYSQLI_ASSOC);
    mysqli_free_result($rsl);
    return $respuesta;
    */
    return EntidadGet("llx_facture","rowid","$facid","ref");
}


#################################################
# OBTENER DATOS DEL CLIENTE
#################################################
function ClienteGet($id){
    return EntidadGet("llx_societe","rowid",$id,"*");
}
function ClienteExtraGet($id){
    return EntidadGet("llx_societe_extrafields","fk_object",$id,"*");
}
function ClienteRegion($id){
    return EntidadGet("llx_c_departements","rowid",$id,"*");
}

#################################################
# OBTENER DATOS DEL DETALLE
#################################################
#
# PARAMETROS: TABLA,KEY,ID,CAMPOS
function DetalleGet($id){
    return EntidadGet("llx_facturedet","fk_facture",$id,"*");
}


#################################################
# OBTENER DATOS DEL PRODUCTO
#################################################
#
# PARAMETROS: TABLA,KEY,ID,CAMPOS
function ProductosGet($id){
    return EntidadGet("llx_product","rowid",$id,"*");
}




?>
