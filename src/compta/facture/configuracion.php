<?php

###############################################
# DEPURACION Y ERRORES
###############################################
# TIPO DE ERRORES
error_reporting(E_ERROR|E_WARNING);
# MOSTRAR ERRORES
ini_set('display_errors', true);



###############################################
# DATOS DE CONEXION A LA BASE DE DATOS
###############################################
$FACTRONICA["TIPODB"]="MYSQLI_PRO";
$FACTRONICA["BDSERVER_HOST"]="localhost";
$FACTRONICA["BDSERVER_USER"]="ijsijsi";
$FACTRONICA["BDSERVER_PASS"]="sjsij,ajP4";
$FACTRONICA["BDSERVER_NAME"]="isihish";


###############################################
# DATOS SERVIDOR DE FACTURACION SII CHILE
###############################################
#
#
$FACTRONICA["HOST"]="https://www.servidordte.dominio";
#
# PUERTO DE CONEXION 443 o 80
$FACTRONICA["CURL_PUERTO"]=443;
#
# URL ENDPOINT
$url_api=$FACTRONICA["HOST"]."/api/factronica_creadte_facturas";
#
# URL HOME DOCUMENTOS
$url_home=$FACTRONICA["HOST"]."/home/111111111/ventas";
#
# 0=PDF CON NUEVO NOMBRE Y MANTIENE EL ORIGINAL
# 1=PDF ORIGINAL SE SOBREESCRIBE CON EL NUEVO
$FACTRONICA["SW_SOBREESCRIBIRPDF"]=1;
?>
