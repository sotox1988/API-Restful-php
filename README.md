# API-Restful-php
API que permite gestionar el consumo de servicios:

- Operaciones soportadas POST: 'signup', 'login', 'listado', 'add' y 'saludo'.
- Conexión con MySql PDO.
- Intercambio de información con el formato de comunicación Json para compartir recursos.
- Conexión a base de datos MySql con PDO previniendo la inyección de sentencias.

### Descripción.

La comunicación la realizamos enviando los datos en formato Json:

```
{
	"operacion":"saludo"
}
```

Recibiendo la salida también en Json:

```
{
  "resultado":{
    "estado":"Correcto",
    "mensaje":"API REST on POST Saludando."
  }
}
```
