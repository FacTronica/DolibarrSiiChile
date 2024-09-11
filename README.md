# INSTALACIÓN MÓDULO DOLITRONICA SII CHILE

## INDICE
01.-AGREGAR ATRIBUTOS COMPLEMENTARIOS A LA FACTURA.  
02.-AGREGAR ATRIBUTOS COMPLEMENTARIOS AL CLIENTE.  
03.-CREAR MODULO FACTRONICA SII CHILE.  
04.-EN EL MODULO DOLIBARR CREAR OBJETO CONTRIBUYENTE.  
05.-EN EL MODULO DOLIBARR CREAR OBJETO CERTIFICADO.  
06.-EN EL MODULO DOLIBARR CREAR OBJETO TIMBRAJE.  
07.-ACTUALIZAR ARCHIVOS DOLIBARR MODULO.  
  
## 01.-AGREGAR ATRIBUTOS COMPLEMENTARIOS A LA FACTURA:

### TrackID:
01.-Ir a módulos  
02.-Ir a facturas  
03.-Configurar  
04.-Atributos complementarios (facturas)  
05.-Pulsar simbolo + para crear un nuevo Atributo  
06.-En clave Digitar TrackID SII  
07.-Tipo Cadena de texto 1 línea  
08.-En código digitar trackid  
09.-Poner ticket en Puede editarse siempre  
10.-Finalmente Guardar  
11.-  

### Tipo DTE:
01.-Pulsar simbolo + para crear un nuevo Atributo  
02.-En clave Digitar Tipo DTE  
03.-En código digitar tipodte  
04.-Tipo seleccionar lista de selección  
05.-En valor digitar (quitando los espacios de la izquierda)  
    33,Factura Electrónica  
    34,Factura Exenta Electrónica  
    52,Guía Despacho Electrónica  
    56,Nota Débito Electrónica  
    61,Nota Crédito Electrónica  
06.-Poner ticket en obligatorio  
07.-Quitar ticket Siempre se puede editar  
08.-Finalmente Guardar  
  
### Estado DTE:
01.-Pulsar simbolo + para crear un nuevo Atributo  
02.-En Clave digitar Estado DTE  
03.-En código digitar estadodte  
04.-Tipo seleccionar Lista  
05.-En valor digitar (quitando los espacios de la izquierda)  
    0,Por Enviar  
    1,Por Consultar  
    2,Aceptado  
    3,Aceptado con Reparos  
    4,Rechazado  
06.-Poner ticket Siempre se puede editar  
07.-Finalmente Guardar  
  
### 02.-AGREGAR ATRIBUTOS COMPLEMENTARIOS AL CLIENTE:
01.-Ir a Inicio > Configurar >  módulos  
02.-Ir a Terceros  
03.-Pulsar Configurar  
04.-Atributos complementarios (tercero)  
05.-Pulsar simbolo + para crear un nuevo Atributo  
06.-En etiqueta digitar Giro Comercial  
07.-En código digitar giro  
08.-En tipo seleccionar Cadena 1 linea  
09.-En tamaño o largo 200  
10.-Poner ticket en Obligatorio  
11.-Poner ticket, siempre se puede editar  
12.-Guardar  
  
## 03.-CREAR MODULO FACTRONICA SII CHILE
01.-Ir al Inicio  
02.-Ir a la configuración  
03.-Configuración de módulos  
04.-En la parte final de abajo activar el Constructor de módulos.  
05.-Pulsar el Icono Editor Creador de Módulos  
06.-Pulsar pestaña Nuevo módulo  
07.-En Nombre de módulo digitar Factronica  
08.-En descripción digitar Módulo para Integrar Dolibarr con SII Chile  
09.-Nombre del editor Factronica SpA  
10.-Url del editor www.factronica.cl  
11.-Pulsar Crear  
  
## 04.-Crear el Objeto Contribuyente en el Módulo Dolibarr SII Chile
01.-Pulsar el icono Módulo y Generador de Aplicaciones  
02.-Seleccionar el módulo Factronica
03.-Pulsar en Objetos  
04.-Pulsar en + Nuevo Objeto  
05.-En clave de objeto digitar Contribuyente  
06.-Poner ticket en Quiero administrar los permisos en este objeto  
07.-Pulsar Generar Código  
08.-Click en el objeto Contribuyente  
09.-Eliminar la propiedad qty  
10.-Eliminar la propiedad amount  
11.-Eliminar la propiedad description  
12.-Eliminar la propiedad fk_soc  
13.-Eliminar la propiedad status  
14.-Eliminar la propiedad label  
15.-Eliminar la propiedad ref  
Link Video: https://www.youtube.com/watch?v=GtdIF310izk
  
### 05.-Crear propiedad fecha de resolución
01.-Pulsar el icono Módulo y Generador de Aplicaciones  
02.-Seleccionar el módulo Factronica  
03.-Click en la pestaña Objetos  
04.-Click en el objeto Contribuyente  
05.-Bajar a propiedades del objeto  
06.-Pulsar Icono + para crear nueva Propiedad  
07.-En etiqueta digitar Fecha Resolución  
08.-En codigo digitar fecha_resolucion  
09.-En tipo digitar varchar(10)  
10.-Pulsar en Añadir o Create  
Link Video: https://www.youtube.com/watch?v=5HCaoELj0Qw

### 06.-Crear propiedad número de resolución
01.-Pulsar el icono Módulo y Generador de Aplicaciones  
02.-Seleccionar el módulo Factronica  
03.-Click en la pestaña Objetos  
04.-Click en el objeto Contribuyente  
05.-Bajar a propiedades del objeto  
06.-Pulsar Icono + para crear nueva Propiedad  
07.-En etiqueta digitar Número Resolución  
08.-En codigo digitar numres  
09.-En tipo digitar integer(3)  
10.-Pulsar en Añadir o Create  
Link Video: https://www.youtube.com/watch?v=h_O7cTAecNQ&

### 07.-Crear propiedad Código de Actividad
01.-Pulsar el icono Módulo y Generador de Aplicaciones  
02.-Seleccionar el módulo Factronica  
03.-Click en la pestaña Objetos  
04.-Click en el objeto Contribuyente  
05.-Bajar a propiedades del objeto  
06.-Pulsar Icono + para crear nueva Propiedad  
07.-En etiqueta digitar Código Actividad  
08.-En codigo digitar codigo_actividad  
09.-En tipo digitar varchar(10)  
10.-Pulsar en Añadir o Create  
Link video: https://www.youtube.com/watch?v=RocFsxncfDY

### 08.-Crear propiedad Código de Sucursal SII
01.-Pulsar el icono Módulo y Generador de Aplicaciones  
02.-Seleccionar el módulo Factronica  
03.-Click en la pestaña Objetos  
04.-Click en el objeto Contribuyente  
05.-Bajar a propiedades del objeto  
06.-Pulsar Icono + para crear nueva Propiedad  
07.-En etiqueta digitar Código Sucursal SII  
08.-En codigo digitar codigo_sucursalsii  
09.-En tipo digitar varchar(10)  
10.-Pulsar en Añadir o Create  
Link video: https://www.youtube.com/watch?v=cqEqbgoY_u0

### 09.-Crear propiedad Dirección Regional SII
01.-Pulsar el icono Módulo y Generador de Aplicaciones  
02.-Seleccionar el módulo Factronica  
03.-Click en la pestaña Objetos  
04.-Click en el objeto Contribuyente  
05.-Bajar a propiedades del objeto  
06.-Pulsar Icono + para crear nueva Propiedad  
07.-En etiqueta digitar Dirección Regional  
08.-En codigo digitar direccion_regional  
09.-En tipo digitar varchar(20)  
10.-Pulsar en Añadir  
Link video: https://www.youtube.com/watch?v=Mq-Yttdd1ls

### 10.-Crear propiedad Rut Representante Legal
01.-Pulsar el icono Módulo y Generador de Aplicaciones  
02.-Seleccionar el módulo Factronica  
03.-Click en la pestaña Objetos  
04.-Click en el objeto Contribuyente  
05.-Bajar a propiedades del objeto  
06.-Pulsar Icono + para crear nueva Propiedad  
07.-En etiqueta digitar  Rut Representante Legal  
08.-En codigo digitar rut_replegal  
09.-En tipo digitar varchar(10)  
10.-Pulsar en Añadir  
Link video: https://youtu.be/_PMPYeOLUoA

### 11.-Crear propiedad Razón Social
01.-Pulsar el icono Módulo y Generador de Aplicaciones  
02.-Seleccionar el módulo Factronica  
03.-Click en la pestaña Objetos  
04.-Click en el objeto Contribuyente  
05.-Bajar a propiedades del objeto  
06.-Pulsar Icono + para crear nueva Propiedad  
07.-En etiqueta digitar Razón Social  
08.-En codigo digitar razon_social  
09.-En tipo digitar varchar(100)  
10.-Pulsar en Añadir  
Link video: https://youtu.be/V2I_kbTqUZw

### 12.-Crear propiedad Giro
01.-Pulsar el icono Módulo y Generador de Aplicaciones  
02.-Seleccionar el módulo Factronica  
03.-Click en la pestaña Objetos  
04.-Click en el objeto Contribuyente  
05.-Bajar a propiedades del objeto  
06.-Pulsar Icono + para crear nueva Propiedad  
07.-En etiqueta digitar Giro  
08.-En codigo digitar giro  
09.-En tipo digitar varchar(100)  
10.-Pulsar en Añadir  
Link video: https://youtu.be/CxeHLe_wUq4

### 13.-Crear propiedad Dirección
01.-Pulsar el icono Módulo y Generador de Aplicaciones  
02.-Seleccionar el módulo Factronica  
03.-Click en la pestaña Objetos  
04.-Click en el objeto Contribuyente  
05.-Bajar a propiedades del objeto  
06.-Pulsar Icono + para crear nueva Propiedad  
07.-En etiqueta digitar Dirección  
08.-En codigo digitar direccion  
09.-En tipo digitar varchar(200)  
10.-Pulsar en Añadir  
Link video: https://youtu.be/7hWxAryYdS0

### 14.-Crear propiedad Ciudad
01.-Pulsar el icono Módulo y Generador de Aplicaciones  
02.-Seleccionar el módulo Factronica  
03.-Click en la pestaña Objetos  
04.-Click en el objeto Contribuyente  
05.-Bajar a propiedades del objeto  
06.-Pulsar Icono + para crear nueva Propiedad  
07.-En etiqueta digitar Ciudad  
08.-En codigo digitar ciudad  
09.-En tipo digitar varchar(100)  
10.-Pulsar en Añadir  
Link video: https://youtu.be/bMqNh36Nfx0

## 16.-Crear Objeto Certificado Digital
01.-Pulsar el icono Módulo y Generador de Aplicaciones  
02.-Seleccionar el módulo SII Chile  
03.-Pulsar en Objetos  
04.-Pulsar en + Nuevo Objeto  
05.-En clave de objeto digitar Certificado  
06.-Poner ticket en Quiero administrar los permisos en este objeto  
07.-Pulsar Generar Código  
08.-Click en el objeto Certificado  
Link video: 

### 17.-Eliminar propiedades no requeridas
01.-Eliminar la propiedad qty  
02.-Eliminar la propiedad amount  
03.-Eliminar la propiedad description  
04.-Eliminar la propiedad fk_soc  
05.-Eliminar la propiedad status  
06.-Eliminar la propiedad label  
07.-Eliminar la propiedad ref  
Link video: 

### 18.-Agregar Atributo módulo  al objeto Certificado
01.-Pulsar en +  
02.-En etiqueta digitar Módulo  
03.-En código digitar modulo  
04.-En tipo digitar text  
05.-Finalmente Guardar  
Link video: 

### 19.-Agregar Atributo Exponente  al objeto Certificado
01.-Pulsar en +  
02.-En etiqueta digitar Exponente  
03.-En código digitar exponente  
04.-En tipo digitar text  
05.-Finalmente Guardar  
Link video: 

### 20.-Agregar Atributo cert_x509 al objeto Certificado
01.-Pulsar en +  
02.-En etiqueta digitar LLave Pública  
03.-En código digitar cert_x509  
04.-En tipo digitar text  
05.-Finalmente Guardar  
Link video: 

### 21.-Agregar Atributo PrivKey al objeto Certificado
01.-Pulsar en +  
02.-En etiqueta digitar LLave Privada  
03.-En código digitar privkey_sinpass    
04.-En tipo digitar text  
05.-Finalmente Guardar  
Link video: 

## 22.-Crear Objeto Timbraje de Folios CAF
01.-Pulsar el icono Módulo y Generador de Aplicaciones  
02.-Seleccionar el módulo SII Chile  
03.-Pulsar en Objetos  
04.-Pulsar en + Nuevo Objeto  
05.-En clave de objeto digitar Timbrajes  
06.-Poner ticket en Quiero administrar los permisos en este objeto  
07.-Pulsar Generar Código  
08.-Click en el objeto Timbrajes  
Link video: 

### 23.-Agregar Atributo rut_emisor
01.-Pulsar en +  
02.-En etiqueta digitar Rut Emisor  
03.-En código digitar rut_emisor  
04.-En tipo digitar varchar(12)  
05.-Finalmente Guardar  
Link video: 

### 24.-Agregar Atributo razonsocial_emisor
01.-Pulsar en +  
02.-En etiqueta digitar Razón Social  
03.-En código digitar razonsocial_emisor    
04.-En tipo digitar varchar(200)  
05.-Finalmente Guardar  
Link video: 

### 25.-Agregar Atributo Tipo DTE
01.-Pulsar en +  
02.-En etiqueta digitar Tipo DTE  
03.-En código digitar tipo_documento    
04.-En tipo digitar varchar(10)  
05.-Finalmente Guardar  
Link video: 

### 26.-Agregar Atributo Folio Desde
01.-Pulsar en +  
02.-En etiqueta digitar Folio Desde  
03.-En código digitar folio_desde    
04.-En tipo digitar integer  
05.-Finalmente Guardar  
Link video: 

### 27.-Agregar Atributo Folio Hasta
01.-Pulsar en +  
02.-En etiqueta digitar Folio Hasta  
03.-En código digitar folio_hasta    
04.-En tipo digitar integer  
05.-Finalmente Guardar  
Link video: 

### 28.-Agregar Atributo Fecha Autorización
01.-Pulsar en +  
02.-En etiqueta digitar Fecha Autorización  
03.-En código digitar fecha_autorizacion    
04.-En tipo digitar varchar(10)  
05.-Finalmente Guardar  
Link video: 

### 29.-Agregar Atributo Módulo
01.-Pulsar en +  
02.-En etiqueta digitar Módulo  
03.-En código digitar modulo    
04.-En tipo digitar text  
05.-Finalmente Guardar  
Link video: 

### 30.-Agregar Atributo Exponente
01.-Pulsar en +  
02.-En etiqueta digitar Exponente  
03.-En código digitar exponente    
04.-En tipo digitar text  
05.-Finalmente Guardar  
Link video: 

### 31.-Agregar Atributo Indice
01.-Pulsar en +  
02.-En etiqueta digitar Indice  
03.-En código digitar indice    
04.-En tipo digitar text  
05.-Finalmente Guardar  
Link video: 

### 32.-Agregar Atributo Firma
01.-Pulsar en +  
02.-En etiqueta digitar Firma  
03.-En código digitar firma    
04.-En tipo digitar text  
05.-Finalmente Guardar  
Link video: 

### 33.-Agregar Atributo Llave Pública
01.-Pulsar en +  
02.-En etiqueta digitar Llave Pública  
03.-En código digitar llave_publica    
04.-En tipo digitar text  
05.-Finalmente Guardar  
Link video: 

### 34.-Agregar Atributo Llave Privada
01.-Pulsar en +  
02.-En etiqueta digitar Llave Privada  
03.-En código digitar llave_privada   
04.-En tipo digitar text  
05.-Finalmente Guardar  
Link video: 

### 35.-Para Activar módulo  
01.-En el creador de módulos  
02.-En el objeto Timbrajes pulsar Destruya la tabla  
03.-Apagar el módulo Factronica  
04.-Activar el módulo Factronica  
05.-En este último paso se debería haber creado la tabla para timbrajes  
Link video: 

### 36.-Eliminar propiedades no utilizadas
01.-Click en el objeto Timbrajes  
02.-Eliminar la propiedad qty  
03.-Eliminar la propiedad amount  
04.-Eliminar la propiedad ref  
05.-Eliminar la propiedad label  
06.-Eliminar la propiedad fk_soc  
07.-Eliminar la propiedad status  
08.-Eliminar la propiedad description  
Link video: 

## 36.-Actualizar módulo Factura
01.-Copiar los siguientes archivos en la ruta  htdocs/compta/facture  
02.-Los archivos api cliente [Ver Archivos](https://github.com/FacTronica/DolibarrSiiChile/tree/main/htdocs/compta/facture)  
03.-htdocs/compta/facture/enviar_json.php  
05.-htdocs/compta/facture/crearpayload.php  
06.-htdocs/compta/facture/funciones.php  
07.-htdocs/compta/facture/configuracion.php  
08.-htdocs/compta/facture/card.php  
Link video: 
 







