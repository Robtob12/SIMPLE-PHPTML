# Modules.mod.php

Mini librería PHP de funciones rápidas para HTML, formularios, utilidades visuales, seguridad y helpers JavaScript.

> Archivo principal: `Modules.mod.php`
> Versión: `1.0.0`

---

# Instalación

## Método 1 — Git Clone

```bash id="m1xjv9"
git clone https://github.com/TUUSUARIO/modules-mod.git
```

Luego incluye el archivo en tu proyecto:

```php id="7j2nfp"
require_once("modules-mod/Modules.mod.php");
```

---

## Método 2 — Descargar ZIP

1. Abre tu repositorio en GitHub
2. Pulsa **Code**
3. Selecciona **Download ZIP**
4. Extrae la carpeta
5. Incluye el archivo:

```php id="g3m0yy"
require_once("modules-mod/Modules.mod.php");
```

---

# Inicio rápido

```php id="n1i9wb"
<?php
require_once("Modules.mod.php");

INIT();
VERSION();

echo BOLD("Hola mundo");
echo INPUT("text", "user", ["id","usuario"], "Tu nombre");
?>
```

---

# Funciones disponibles

---

# Sistema

## INIT()

Comprueba que el módulo está activo.

```php id="q0wz8m"
INIT();
```

Salida:

```text id="7j6qok"
Activo
```

---

## VERSION()

Muestra la versión actual.

```php id="1d5nlg"
VERSION();
```

Salida:

```text id="bh4v7k"
Modules.mod.php v1.0.0
```

---

# Texto y formato

## BOLD()

Texto en negrita.

```php id="3g8hkr"
echo BOLD("Hola");
```

Resultado:

```html id="1y1apd"
<strong>Hola</strong>
```

---

## ITAL()

Texto en cursiva.

```php id="q4k7fi"
echo ITAL("Hola");
```

---

## UNDER()

Texto subrayado.

```php id="e6b5vw"
echo UNDER("Hola");
```

---

## FONT()

Texto con fuente personalizada.

```php id="2v59yy"
echo FONT("Hola Mundo", "Arial");
```

Resultado:

```html id="6q4x88"
<span class="FONT" style="font-family:Arial;">Hola Mundo</span>
```

---

# Listas y enlaces

## INLIST()

Crear listas HTML.

### Lista desordenada

```php id="6xb5vq"
echo INLIST("ul", ["PHP", "JS", "CSS"]);
```

### Lista ordenada

```php id="qtv2jt"
echo INLIST("ol", ["Uno", "Dos", "Tres"]);
```

---

## ANCORA()

Crear enlaces.

```php id="myh7oa"
echo ANCORA("https://google.com", "Google");
```

Abrir misma pestaña:

```php id="5sbr6h"
echo ANCORA("index.php", "Inicio", "_self");
```

---

# Formularios

## INPUT()

Generar inputs dinámicos.

```php id="yyz3x3"
echo INPUT(
    "text",
    "usuario",
    ["id","inputUser"],
    "Escribe tu nombre"
);
```

Resultado:

```html id="q4z8qe"
<input type="text" name="usuario" id="inputUser" placeholder="Escribe tu nombre">
```

Con clase:

```php id="j2tch2"
echo INPUT("email","correo",["class","campo"],"Correo");
```

---

## BTN()

Generar botones.

```php id="oq7zjj"
echo BTN(
    "button",
    "btn",
    ["id","enviar"],
    "Enviar",
    "alert('Hola')"
);
```

Resultado:

```html id="4jrzfh"
<button type="button" id="enviar" onclick="alert('Hola')">
Enviar
</button>
```

---

# Componentes visuales

## CLOCK()

Reloj digital en tiempo real.

```php id="nxyg8m"
CLOCK();
```

Personalizado:

```php id="5mb6km"
CLOCK("black", "white", "300px", "20px", "15px");
```

Incluye:

* Hora actual
* Actualización automática
* Zona horaria detectada

---

# Seguridad

## HTML()

Convierte caracteres especiales.

```php id="e6gk1e"
echo HTML("<script>");
```

Resultado:

```text id="t9vq9q"
&lt;script&gt;
```

---

## AUTH_EMAIL()

Validar email real.

```php id="p2o6l6"
if (AUTH_EMAIL("correo@gmail.com")) {
    echo "Email válido";
}
```

---

# Contraseñas

## HASTD()

Hash con algoritmo por defecto.

```php id="bn6f0m"
$hash = HASTD("123456");
```

---

## HASTB()

Hash con bcrypt.

```php id="3mghrk"
$hash = HASTB("123456");
```

---

# Navegación

## GO()

Redirección.

```php id="g6m0z9"
GO("home.php");
```

---

# JavaScript Helpers

## ALERT()

```php id="sz1o9d"
ALERT("Bienvenido");
```

---

## CONSOLE()

```php id="6dzw8j"
CONSOLE("Debug activo");
```

---

# Ejemplo completo

```php id="b1n3e7"
<?php
require_once("Modules.mod.php");

INIT();
VERSION();

echo BOLD("Hola");
echo FONT(" Mundo", "Verdana");

echo INPUT("text","user",["id","usuario"],"Nombre");
echo BTN("button","",["id","btn"],"Enviar","alert('OK')");

CLOCK();
?>
```

---

# Estructura del proyecto

```text id="o3b4f6"
modules-mod/
│── modules.mod.php
│── README.md
```

---

# Próximas mejoras sugeridas

* SELECT()
* TEXTAREA()
* IMG()
* TABLE()
* CARD()
* MODAL()
* Router simple
* CSRF Token
* Sistema de temas
* Composer package

---

# Licencia

MIT

---

# Autor

Creado como librería modular PHP para acelerar proyectos rápidos.
