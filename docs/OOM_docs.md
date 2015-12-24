OOM Quick Guide (With examples) And in spanglish (Ahua)
==========================
---------------------------------------------------------------------------------------------
## Construcción de una clase de para representar una tabla

Deberás hacer el require de OOM.php 
```php
require_once '/path/to/OOM.php'
```
y heredar de esa OOM
```php
class Modelo extends OOM
```
En el constructor de la clase deberás añadir el nombre que tiene la tabla a la que hace 
referencia de la base de datos.
```php
function __construct(){
    $this->model_name = "modelo";
}
```
Quedando algo así
```php
<?php
	require_once 'OOM.php';
	class Modelo extends OOM{
		function __construct(){
			$this->model_name = "modelo";
		}

	}
	$m = new Modelo();
?>
```
---
# Métodos (Cosas en las que te ayudará OOM) 😅


## Método: ``` all() ```

Campo      | Valor
-----------|-------
parametros | Nope
regresa    | Un arreglo con todos los resultados de esa tabla

### Implementación
```php
$m_result = $m->all();
echo json_encode($m_result);
```

## Método: ``` find(id) ```

Campo      | Valor
-----------|-------
parametros | id del elemento deseado.
regresa    | Un objeto de la clase que lo invoco.

De igual forma asigna al objeto que lo invoco los valores de retorno, en caso de no querer usar una variable extra. ¯\\_(ツ)_/¯

### Implementación
```php
$r = $m->find(3);
echo json_encode($r);  // {"model_name":"sale_master","db":"gallery","attr":{"id":"40","description":"Coyoacan Agosto 2015","water_mark":"oAt01dN9OM"}}
echo json_encode($m);  // {"id":"40","description":"Coyoacan Agosto 2015","water_mark":"oAt01dN9OM"}
```

## Método: ``` find_by(key,value) ```

Campo      | Valor
-----------|-------
parametros | key: ```Nombre del atributo que se busca```
parametros | value: ```Valor que debe tener el atributo buscado```
regresa    | Un arreglo con todos los elementos que cumplan la condición


### Implementación
```php
$r = $m->find_by('description', 'Coyoacan Agosto 2015');
echo json_encode($r);  //  [{"model_name":"sale_master","db":"gallery","attr":{"id":"40","description":"Coyoacan Agosto 2015","water_mark":"oAt01dN9OM"}},{"model_name":"sale_master","db":"gallery","attr":{"id":"42","description":"Coyoacan Agosto 2015","water_mark":"W2hnsEkVyg"}}]
```



----------------------
###### En caso de dudas, y citando a Santi:

> Use the force, read the code.

###### [eulr.mx, 2015](eulr.mx)