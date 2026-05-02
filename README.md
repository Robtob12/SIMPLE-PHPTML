# Modules.mod.php

Mini librería PHP para desarrollo rápido con funciones para HTML, utilidades, seguridad, router y base de datos (PDO).

**Archivo principal:** `Modules.mod.php`
**Versión actual:** `v1.2.4t`
**Autor:** Robtob12

---

# 🚀 Instalación

## Método 1 — Git Clone

```bash
git clone https://github.com/Robtob12/Module-PHP-Mods.git
```

```php
require_once("Module-PHP-Mods/Modules.mod.php");
```

---

## Método 2 — Descargar ZIP

1. Descargar desde GitHub
2. Extraer
3. Incluir en tu proyecto:

```php
require_once("Modules.mod.php");
```

---

# ⚡ Inicio rápido

```php
<?php
require_once("Modules.mod.php");

INIT();
VERSION();

echo H1("Hola mundo");
echo BOLD("Texto en negrita");
```

---

# 📦 Funciones disponibles

---

## 🧠 Sistema

* `INIT()` → Verifica que el módulo está activo
* `VERSION()` → Muestra información del módulo

---

## ✍️ Texto

* `BOLD($text)`
* `ITAL($text)`
* `UNDER($text)`
* `FONT($text, $font)`

---

## 🧱 HTML Helpers

* `H1() ... H6()`
* `P()`
* `DIV()`
* `SPAN()`
* `A()`
* `IMG()`
* `NAV()`
* `SECTION()`
* `HERO()`
* `BR()`

---

## 📋 Listas

```php
INLIST("mi-clase", "ul", ["uno", "dos"]);
```

---

## 🧾 Formularios

* `INPUT()`
* `BTN()`

---

## 🎨 CSS

```php
CSS("styles.css");
```

---

## 🔤 Lorem Ipsum

```php
LOREM(20);
```

---

## ⏰ Timer

```php
TIMER("reloj");
```

---

## 🔒 Seguridad

* `HTML()` → Escapar HTML
* `AUTH_EMAIL()` → Validar email
* `HASTD()` → Hash seguro
* `HASTB()` → Hash bcrypt

---

## 🌐 Navegación / JS

* `GO($url)` → Redirección
* `ALERT($msg)`
* `CONSOLE($data)`
* `RELOAD()`
* `READ()` → Entrada por terminal

---

## 🗄️ Base de datos (PDO)

### 🔌 Conexión

```php
$db = CPDO("localhost", "test", "root", "");
```

---

### 🔍 SELECT

```php
SQLS($db, "usuarios", "*", ["id" => 1]);
```

---

### ➕ INSERT

```php
SQLI($db, "usuarios", [
    "nombre" => "Juan",
    "edad" => 25
]);
```

---

### ✏️ UPDATE

```php
SQLU($db, "usuarios",
    ["edad" => 30],
    ["id" => 1]
);
```

---

### ❌ DELETE

```php
SQLD($db, "usuarios", ["id" => 1]);
```

⚠️ Seguridad:
No permite `DELETE` sin `WHERE`.

---

## 🌍 Router seguro

```php
ROUTER([
    "/" => "home.php",
    "/about" => "about.php"
], "404.php");
```

### ✔ Características

* Solo permite archivos dentro de `/public`
* Previene acceso a rutas externas (`../`)
* No afecta `$_GET`

Ejemplo:

```
/user?id=5
```

✔ Funciona correctamente dentro del archivo

---

## 📅 Utilidades

* `TODAY()` → Fecha actual
* `RANDOM($min, $max)`

---

## 🔢 Matemáticas

* `OF($percent, $number)`
* `EVEN($n)`
* `PRIME($n)`
* `AREA($x, $y)`
* `CRICLE($r)`
* `RADIO($d)`
* `DIAMETRO($r)`

---

## 💰 Finanzas

* `INTSIMPLE()`
* `AMOSIMPLE()`
* `INTCOMPOUND()`
* `PROFIT()`
* `DISCOUNT()`
* `TAX()`
* `SAVEMONEY()`

---

# 📁 Estructura

```
Module-PHP-Mods/
├── Modules.mod.php
└── README.md
```

---

# ⚠️ Notas importantes

* Este módulo está diseñado para proyectos rápidos (no es un framework)
* No incluye MVC ni ORM completo
* Ideal para prototipos y herramientas internas

---

# 🛠 Próximas mejoras

* `SELECT avanzado (LIKE, >, <)`
* `TEXTAREA()`
* `TABLE()`
* `MODAL()`
* `CSRF Token`
* Soporte Composer
* Sistema de plantillas

---

# 📜 Licencia

MIT

---

# 👨‍💻 Autor

**Robtob12**
Mini librería PHP para acelerar desarrollo sin frameworks.
