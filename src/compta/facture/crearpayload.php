<?php



#
# CREAR ARRAY CON DATOS DEL DTE
$arregloJson = array(

# TOKEN DE ACCESO A LA API
"TOKEN" => "accesoapitest",

# RUT EMPRESA EMITE FACTURA
"RUTEMISOR"=>$Contribuyente["rut"],

# DATOS DEL PROCESO
"ACCION" => "INSERTAR",
"DOCUMENTO"=>"FACTURA",
"FOLIODTE"=>$Encabezado["foliodte"],
"TIPODTE"=>$Encabezado["tipodte"],
"FECHADTE"=>$DocCabeza["datef"],
#
# DATOS DE LA CARATULA
"RutEmisor" =>$Contribuyente["rut"],
#
# RUT CERTIFICADO DIGITAL
"RutEnvia" =>$Contribuyente["rut_replegal"],
#
# aqui siempre va el rut del sii 60803000-K
"RutReceptor" =>"60803000-K",
"FchResol" =>$Contribuyente["fecha_resolucion"],
"NroResol" =>$Contribuyente["numres"],
"SucSii" =>$Contribuyente["direccion_regional"],
#
# DATOS DEL ENCABEZADO
"FchEmis" =>$DocCabeza["datef"],
"FchVenc" =>$DocCabeza["date_lim_reglement"],
"TermPagoGlosa" =>"CONTADO EFECTIVO",
"TipoDTE" =>$Encabezado["tipodte"],
"Folio" =>$Encabezado["foliodte"],
#
# EN DETALLE DE ITEMS 1=VALORES_BRUTOS 0=VALORES_NETOS
"MntBruto"=>"0",
#
# COMENTARIOS
"Observaciones" =>"",
#
# DATOS DEL EMISOR
"RUTEmisor" =>$Contribuyente["rut"],
"RznSoc" =>$Contribuyente["razon_social"],
"GiroEmis" =>$Contribuyente["giro"],
"Acteco" =>$Contribuyente["codigo_actividad"],
"CdgSIISucur" =>$Contribuyente["codigo_sucursalsii"],
"DirOrigen" =>$Contribuyente["direccion"],
"CmnaOrigen" =>$Contribuyente["comuna"],
"CiudadOrigen" =>$Contribuyente["ciudad"],
"CdgVendedor"=>"VENTAS",
"CorreoEmisor" =>$Contribuyente["correo"],
"Web" =>$Contribuyente["web"],
"Telefono" =>$Contribuyente["fono"],
#
# DATOS DEL RECEPTOR
"RUTRecep"=>$Receptor["rut"],
"CdgIntRecep"=>$Receptor["codigo"],
"RznSocRecep"=>$Receptor["razon_social"],
"GiroRecep"=>$Receptor["giro"],
"DirRecep"=>$Receptor["direccion"],
"CmnaRecep"=>$Receptor["comuna"],
"CiudadRecep"=>$Receptor["ciudad"],
"Contacto"=>$Receptor["contacto"],
"CorreoRecep"=>$Receptor["correo"],
"FonoRecep"=>$Receptor["fono"],
#
# TOTALES
"TasaIVA" => "19",
"MntNeto" => round($DocCabeza["total_htX"]),
"MntExe" => round($DocCabeza["total_ht"]),
"IVA" => round($DocCabeza["total_tva"]),
"MntTotal" => round($DocCabeza["total_ttc"]),
#
#########################################
# DETALLE DE ITEMS
#########################################
#
# CODIGO DEL ITEM
"VlrCodigo"=>$VlrCodigo,
#
# TIPO DE CODIGO DEL ITEM
"TpoCodigo"=>$VlrCodigo,
#
# NOMBRE DEL ITEM
"NmbItem"=>$NmbItem,
#
# DESCRIPCION EXTENDIDA DEL ITEM
"DscItem"=>$DscItem,
#
# CANTIDAD
"QtyItem"=>$QtyItem,
#
# DECIMALES PARA LA CANTIDAD
"DecQtyItem"=>$DecQtyItem,
#
# UNIDAD DE MEDIDA
"UnmdItem"=>$UnmdItem,
#
# PRECIO UNITARIO
"PrcItem"=>$PrcItem,
#
# DECIMALES PARA EL PRECIO UNITARIO
"DecPrcItem"=>$DecPrcItem,
#
# INDICADOR DE ITEM EXENTO 1=SI 0=NO
"IndExe"=>$IndExe,
#
# PORCENTAJE DE DESCUENTO DEL ITEM
"DescuentoPct"=>$DescuentoPct,
#
# DESCUENTO EN PESOS DEL ITEM
"DscItemPesos"=>$DscItemPesos,
#
# SUBTOTAL DEL ITEM
"MontoItem"=>$MontoItem,


#########################################
# REFERENCIAS
#########################################
#
# NUMERO DE REFERENCIA 1,2,3,ETC...
"NroLinRef"=>array(),
#
# TIPO DE DTE AL CUAL REFERENCIA
"TpoDocRef"=>array(),
#
# SE APLICA PARA FACTURACION MASIVA DE GUIA
"IndGlobal"=>array(),
#
# FOLIO DEL DTE QUE SE REFERENCIA
"FolioRef"=>array(),
#
# FECHA DEL DTE QUE SE REFERENCIA
"FchRef"=>array(),
#
# MOTIVO 1=ANULA  2=CORRIGE_TEXTO   3=CORRIGE_VALORES
"CodRef"=>array(),
#
# COMENTARIO INDICANDO MOTIVO DE LA REFERENCIA
"RazonRef"=>array(),


#########################################
# DATOS SERVIDOR DE CORREO
#########################################
"SMTP_HOST"=>"mail.suservidor.cl",
"SMTP_PORT"=>"465",
"SMTP_SECURE"=>"ssl",
"SMTP_USER"=>"dte@suservidor.cl",
"SMTP_PASS"=>"12345",


#########################################
# ENVIAR COPIAS DE CORREO
#########################################
"CORREO_CC1"=>"COPIA1@gmail.com",
"CORREO_CC2"=>"COPIA2@factronica.cl",
"CORREO_BCC1"=>"COPIAOCULTA1@gmail.com",
"CORREO_BCC2"=>"COPIAOCULTA2@gmail.com",
"CORREO_RESPUESTA"=>"RESPUESTA_PARA@PRUEBAS.cl",


#########################################
# DATOS DEL PROVEEDOR
#########################################
"PROVEEDOR_NOMBRE"=>"FACTRONICA SPA",
"PROVEEDOR_MAIL"=>"soporte@factronica.cl",
"PROVEEDOR_WEB"=>"www.factronica.cl",
"PROVEEDOR_FONO"=>"5693334455",


#########################################
# CERTIFICADO DIGITAL
#########################################
"Modulus"=>$Certificado["modulo"],
"Exponent"=>$Certificado["exponente"],
"X509Certificate"=>$Certificado["cert_x509"],
"PrivKey"=>$Certificado["privkey_sinpass"],

#########################################
# CAF TIMBRAJE DE FOLIOS
#########################################
"RE"=>$Timbraje["rut_emisor"],
"RS"=>$Timbraje["razonsocial_emisor"],
"TD"=>$Timbraje["tipo_documento"],
"RNG_D"=>$Timbraje["folio_desde"],
"RNG_H"=>$Timbraje["folio_hasta"],
"FA"=>$Timbraje["fecha_autorizacion"],
"RSAPK_M"=>$Timbraje["modulo"],
"RSAPK_E"=>$Timbraje["exponente"],
"RSAPK_IDK"=>$Timbraje["indice"],
"FRMA"=>$Timbraje["firma"],
"RSASK"=>$Timbraje["llave_privada"],
"RSAPUBK"=>$Timbraje["llave_publica"]
);


?>
