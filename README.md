# TPE-WEB2

# Integrantes

- Nicolas Gomez: anelecarg@icloud.com

- Brandon Leiva: brandonjeremias1@hotmail.com

# Tienda de Indumentaria

Nuestra página web, es una tienda de indumentaria de prendas de futbol que ofrece variedad en distintos talles y precios.

por el momento, contamos con dos 2 tablas: 

- categoria
- producto

### **categoria**

esta tabla cuenta con los atributos:

- id_categoria (pk)
- tipo_prenda
- detalle

### **producto**

esta tabla cuenta con los atributos:

- id_producto (pk)
- id_categoria (fk)
- tipo
- talle
- precio

estas tablas se relaciona entres si por el id_categoria.
