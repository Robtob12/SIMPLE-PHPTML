<?php
# comprovar que el mod funciona
function INIT(){
    echo "\nActivo";
}

function VERSION(){
    echo "\nModules.mod.php v1.0.0";
}

# Funciones de texto personalizado sin escribir html por ensima #

function BOLD($arg) : string {
    return '<strong>' . $arg . '</strong>';
}

function ITAL($arg) : string{
    return '<i>' . $arg . '</i>';
}

function UNDER($arg) : string{
    return '<u>' . $arg . '</u>';
}
 
function FONT($text = "Function FONT", $font = "serif"){    
    return "<span class='FONT' style = 'font-family:$font;'> $text </span>";
}
# Funciones de cajas

function INLIST($type, $items = []) : string{
    # CONFIGURAR ERRORES
    if(!isset($type)){
        return "Error De tipo no definido ul / ol";
    }

    else if($type !== "ul" && $type !== "ol"){
        return "Error de tipo no compatible '$type'";
    }

    if(empty($items)){
        return "Lista sin elementos";
    }

    # CREAR LISTA
    $lista = "";
    foreach($items as $item){
        $lista .= "<li> $item </li>";
    }

    return  "<$type>" . $lista . "</$type>";
    
}

function ANCORA($arg = "", $text = "Link-php-template", $target = "_blank") : string{
    if(!isset($arg)){
        return "Error de argumento 'href' esa vacio";
    }

    if(empty($text)){
        $text = "Link-php-template";
    }

    $target = $target == "_blank" ? "_blank" : "_self";

    return "<a href = " . $arg . " target = " . $target . ">" . $text . "</a>";
}

function INPUT($type = "text", $name = "", $ind = [], $plchldr = "", $value = ""){
    if(empty($type)){
        return "Error tipo no definido '$type'";
    }

   if(!empty($ind)){
        if($ind[0] !== "id" && $ind[0] !== "class" || empty($ind[0])){
            return "Error al indicar el tipo de indicador '".$ind[0]."' -> no es una argumento";
        }
   }

    return "<input type='$type' name='$name' ".$ind[0]."='".$ind[1]."' placeholder='$plchldr' value='$value'>";
}

function BTN($type = "button", $name = "", $ind = [], $plchldr = "", $value = ""){
    return "<button type='$type' name='$name' ".$ind[0]."='".$ind[1]."' onclick='$value'> $plchldr </button>";
}

function CLOCK($bg = "transparent", $color = "black", $width = "200px",$padding = "20px", $br = "20px"){
    

    $html = "
    <div style='background:$bg;color:$color;font-family:$font;width:$width;padding:$padding;border-radius:$br;text-align:center;'>
        <h1 id='reloj'></h1> 
        <p id='zona'></p>
    </div>
    ";

    $reloj = <<<SCRIPT
    <script>
        const reloj = document.getElementById("reloj");
        const zona  = document.getElementById("zona");

        const timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;

        zona.textContent = "Zona horaria: " + timeZone;

        function actualizarReloj() {
            const ahora = new Date();

            reloj.textContent = ahora.toLocaleTimeString("es-ES", {
                timeZone: timeZone,
                hour: "2-digit",
                minute: "2-digit",
                second: "2-digit"
            });
        }

        actualizarReloj();
        setInterval(actualizarReloj, 1000);
    </script>
    SCRIPT;

    echo $html;
    echo $reloj;
}
# Funciones de seguridad

function HTML($arg) : string {
    return htmlspecialchars($arg);
}

function AUTH_EMAIL(string $email): bool{
    $email = trim($email);

    if ($email === '') {
        return false;
    }

    if (strlen($email) > 254) {
        return false;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }

    $domain = substr(strrchr($email, "@"), 1);

    if ($domain === '' || !checkdnsrr($domain, 'MX')) {
        return false;
    }

    return true;
}

function HASTD($password = ""){
    if(!isset($password)){
        return "Error, contraseña no definida - hast default";
    }

    return password_hash($password, PASSWORD_DEFAULT);
}

function HASTB($password = ""){
    if(empty($password)){
        return "Error, contraseña no definida - hast bcrypt";
    }

    return password_hash($password, PASSWORD_BCRYPT);
}

# Funciones de rutas y manejo de lenguaje

function GO($url){
    header("Location: $url");
}

function ALERT($script){
    echo "<script> alert('$script')</script>";
}

function CONSOLE($arg){
    echo "<script> console.log('$arg')</script>";
}

