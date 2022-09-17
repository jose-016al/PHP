# PHP ![php](.screenshots/logo.png)

# Índice
- [La sintaxis de PHP](#la-sintaxis-de-php)
- [Variables](#variables)
- [Funciones](#funciones)
  - [Funciones de cadena en PHP](#funciones-de-cadena-en-php)
- [Condicionales](#condicionales)
- [Switch](#switch)

# La sintaxis de PHP
Un script PHP comienza con <?phpy termina con ?>, para mostrar texto usamos "echo" como en bash 
```php
<?php
echo "Hello World!";
?>
```

# Variables
En PHP, una variable comienza con el $signo, seguido del nombre de la variable, con "." concatenamos una cadena con otra
```php
<?php
$txt = "Hello world!";
$x = 5;
$y = 10.5;
echo $txt . ' ' . $x . ' ' . $y;
?> 
```

# Funciones 
## Funciones de cadena en PHP
strlen() la función devuelve la longitud de una cadena
```php
<?php
echo strlen("Hello world!"); // outputs 12
?> 
```
str_word_count() la función cuenta el número de palabras en una cadena. 
```php
<?php
echo str_word_count("Hello world!"); // outputs 2
?> 
```
strrev()La función invierte una cadena. 
```php
<?php
echo strrev("Hello world!"); // outputs !dlrow olleH
?> 
```
strpos()función busca un texto específico dentro de una cadena. Si se encuentra una coincidencia, la función devuelve la posición del carácter de la primera coincidencia. Si no se encuentra ninguna coincidencia, devolverá FALSO. 
```php
<?php
echo strpos("Hello world!", "world"); // outputs 6
?> 
```
str_replace()función reemplaza algunos caracteres con algunos otros caracteres en una cadena. 
```php
<?php
echo str_replace("world", "Dolly", "Hello world!"); // outputs Hello Dolly!
?> 
```

# Condicionales
Los condicionales tienen la misma sintaxis que en java.
Salida "¡Que tengas un buen día!" si la hora actual (HORA) es inferior a 20: 
```php
 <?php
$t = date("H");

if ($t < "20") {
  echo "Have a good day!";
}
?> 
```
Salida "¡Que tengas un buen día!" si la hora actual es menos de 20, y "Haga una buenas noches!" de lo contrario: 
```php
 <?php
$t = date("H");

if ($t < "20") {
  echo "Have a good day!";
} else {
  echo "Have a good night!";
}
?> 
```
Salida "¡Que tengas un buen día!" si la hora actual es inferior a 10, y "¡Que tengas un buen día!" si la hora actual es inferior a 20. De lo contrario, Salida "¡Que tengas buenas noches!": 
```php
 <?php
$t = date("H");

if ($t < "10") {
  echo "Have a good morning!";
} elseif ($t < "20") {
  echo "Have a good day!";
} else {
  echo "Have a good night!";
}
?> 
```

# Switch
```php
 <?php
$favcolor = "red";

switch ($favcolor) {
  case "red":
    echo "Your favorite color is red!";
    break;
  case "blue":
    echo "Your favorite color is blue!";
    break;
  case "green":
    echo "Your favorite color is green!";
    break;
  default:
    echo "Your favorite color is neither red, blue, nor green!";
}
?> 
```



```php

```
```php

```
```php

```
```php

```
```php

```
```php

```
```php

```
```php

```
```php

```
```php

```
```php

```
```php

```
```php

```
```php

```
```php

```


