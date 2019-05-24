
## AirDSS

**Grupo de prácticas:** Martes (17 a 19)

**Integrantes:**

Abraham Jezael Pérez Ramos

Alejandro Panagitidis Arrizabalaga

Berta Murcia Morales

Daniel Allhoff Finn

**Aclaraciones:** 

El fichero PDF con el Diagrama de clases se llama ***DC_DSSAir.pdf*** , el fichero DC_DSSAir.html es la versión modificable.  

Para esta entrega, entregamos las 7 clases: Ticket, BoardingPass, User, Package, Flight, Plane y Airport.
Los mockups se encuentran en el archivo comprimido ***AIRDSS.zip*** , en el que se encuentras las fotografias en las que nos hemos basado para hacer las diferentes vistas que hemos implementado.
La memoria está en formato pdf ***memoria.pdf***
La práctica no necesita de nada extra, completamente ejecutable. Puede ser necesario un composer update

**Usuarios** 

Admin: juan123@gmail.com 1234

Cliente: francisco897@yahoo.es 1234

**Posibles fallos**

* Buscador de clientes: La paginación después de una búsqueda no funciona del todo bien,debido a que cuando le das a la siguiente página, resetea la búsqueda; después de mucho mirar, no he conseguido solucionarlo.
* Reseteo de contraseñas: El reseteo de las contraseñas dentro de la red de la universidad, no funciona.
* Compra de vuelo: En algunos pocos casos (aleatoriamente), el boardingpass asociado a un vuelo comprado, establece como fecha 01-01-1970 y con horas 00:00.
* Se ha implementado el test del servicio BuyServices, pero no se ha sido posible lograr que funcione correctamente.

**Reseteo de contraseñas**

Para el envío del link para resetear la contraseña hemos utilizado mailtrap.io:

Correo: airdss100@gmail.com
Contraseña: airDSS-100
