# Modules.mod.php

Mini librería PHP con funciones rápidas para HTML, formularios, utilidades visuales, seguridad y helpers JavaScript.

**Archivo principal:** `Modules.mod.php`
**Versión:** `1.0.0`

---

# Instalación

## Método 1 — Git Clone

```bash
git clone https://github.com/TUUSUARIO/modules-mod.git
```

Luego incluye el archivo en tu proyecto:

```php
require_once("modules-mod/Modules.mod.php");
```

## Método 2 — Descargar ZIP

1. Abre el repositorio en GitHub.
2. Haz clic en **Code**.
3. Selecciona **Download ZIP**.
4. Extrae la carpeta.
5. Incluye el archivo:

```php
require_once("modules-mod/Modules.mod.php");
```

---

# Inicio rápido

```php
<?php
require_once("Modules.mod.php");

INIT();
VERSION();

echo BOLD("Hola mundo");
echo INPUT("text", "user", ["id","usuario"], "Tu nombre");
```

---

# Funciones disponibles

## Sistema

### INIT()

Comprueba que el módulo está activo.

### VERSION()

Muestra la versión actual.

---

## Texto y formato

### BOLD()

Texto en negrita.

### ITAL()

Texto en cursiva.

### UNDER()

Texto subrayado.

### FONT($text, $font)

Texto con fuente personalizada.

---

## HTML Helpers

### A($href, $text, $target)

Crear enlaces.

### H1($text, $class)

Título H1.

### DIV($content, $class)

Contenedor div.

### SPAN($class, $content)

Etiqueta span.

### BUTTON($text, $onclick, $class)

Botón HTML.

### IMG($src, $class, $alt)

Imagen.

### INLIST($type, $items)

Listas `ul` / `ol`.

---

## Formularios

### INPUT($type, $name, $attrs, $placeholder, $value)

Genera inputs dinámicos.

Ejemplo:

```php
echo INPUT("email", "correo", ["class","campo"], "Correo");
```

---

## Componentes visuales

### CLOCK($class = "")

Reloj en tiempo real. La clase CSS es opcional para estilizarlo.

```php
CLOCK("mi-reloj");
```

---

## Seguridad

### HTML($text)

Escapa caracteres especiales.

### AUTH_EMAIL($email)

Valida formato de email.

### HASTD($password)

Hash con algoritmo por defecto.

### HASTB($password)

Hash con bcrypt.

---

## Navegación / JavaScript

### GO($url)

Redirección HTTP.

### ALERT($msg)

Muestra `alert()`.

### CONSOLE($data)

Envía datos a `console.log()`.

### RELOAD()

Recarga la página.

---

## Utilidades

### TODAY()

Fecha actual `Y-m-d`.

### RANDOM($min, $max)

Número aleatorio seguro.

### LOREM($target)

Genera texto lorem ipsum.

---

## Matemáticas

### OF($percent, $number)

Obtiene un porcentaje de un número.

### EVEN($n)

Detecta si un número es par.

### PRIME($n)

Detecta si un número es primo.

---

## Finanzas

### INTSIMPLE($capital, $rate, $time)

Interés simple.

### AMOSIMPLE($capital, $rate, $time)

Monto con interés simple.

### INTCOMPOUND($capital, $rate, $time)

Interés compuesto.

### PROFIT($income, $cost)

Ganancia neta.

### DISCOUNT($price, $percent)

Aplicar descuento.

### TAX($price, $percent)

Aplicar impuesto.

### SAVEMONEY($goal, $months)

Ahorro mensual necesario.

---

## Router

### ROUTER($routes, $notFound)

Router simple basado en rutas.

```php
ROUTER([
  "/" => "pages/home.php",
  "/about" => "pages/about.php"
], "404.php");
```

---

# Ejemplo completo

```php
<?php
require_once("Modules.mod.php");

echo H1("Hola");
echo DIV(BOLD("Bienvenido"), "box");
echo INPUT("text", "user", ["id","usuario"], "Nombre");
echo BUTTON("Enviar", "alert('OK')", "btn");
CLOCK("clock");
```

---

# Estructura del proyecto

```text
modules-mod/
├── Modules.mod.php
└── README.md
```

---

# Próximas mejoras sugeridas

* SELECT()
* TEXTAREA()
* TABLE()
* CARD()
* MODAL()
* CSRF Token
* Composer package
* Themes
* CLI installer

---

# Licencia

MIT

---

# Autor

Librería modular PHP para acelerar proyectos rápidos.
