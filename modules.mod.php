<?php

/* =========================
   MODULES.MOD.PHP FIXED
   Mismos nombres, mejor uso
========================= */

/* =========================
   INFO
========================= */

function INIT(){
    echo "Activo";
}

function VERSION(){
    echo "Modules.mod.php v1.2.4t";
}

function HELP(){

    $groups = [

        "INFO" => [
            "INIT","VERSION","HELP"
        ],

        "TEXT" => [
            "BOLD","ITAL","UNDER","FONT","LOREM","HTML"
        ],

        "HTML" => [
            "A","H1","INPUT","BUTTON","IMG","SPAN","DIV","INLIST"
        ],

        "JS / NAV" => [
            "ALERT","CONSOLE","GO","RELOAD","CLOCK"
        ],

        "DATABASE" => [
            "CPDO"
        ],

        "DATE / TIME" => [
            "TODAY"
        ],

        "MATH" => [
            "RANDOM","OF","EVEN","PRIME"
        ],

        "FINANCE" => [
            "INTSIMPLE","AMOSIMPLE","INTCOMPOUND",
            "PROFIT","DISCOUNT","TAX","SAVEMONEY"
        ],

        "SYSTEM" => [
            "ROUTER","HELP"
        ],

        "SECURITY" => [
            "AUTH_EMAIL","HASTD","HASTB"
        ]

    ];

    foreach($groups as $category => $functions){

        echo "<h3>$category</h3>";

        foreach($functions as $fn){

            if(function_exists($fn)){
                echo strtoupper($fn) . "();<br>";
            }

        }

        echo "<br>";
    }
}

/* =========================
   TEXTO
========================= */

function BOLD($arg = ''): string{
    return '<strong>' . $arg . '</strong>';
}

function ITAL($arg = ''): string{
    return '<i>' . $arg . '</i>';
}

function UNDER($arg = ''): string{
    return '<u>' . $arg . '</u>';
}

function FONT($text = "Function FONT", $font = "serif"): string{
    return "<span style='font-family:$font;'>$text</span>";
}

/* =========================
   LISTAS
========================= */

function INLIST($type = "ul", $items = []): string{

    $type = strtolower($type);

    if ($type !== "ul" && $type !== "ol") {
        $type = "ul";
    }

    if (empty($items)) {
        return "<$type></$type>";
    }

    $html = "";

    foreach($items as $item){
        $html .= "<li>$item</li>";
    }

    return "<$type>$html</$type>";
}

/* =========================
   TAGS HTML
========================= */

function A($arg = "#", $text = "Link-php-template", $class= "", $target = "_blank"): string{

    $target = ($target === "_blank") ? "_blank" : "_self";

    return "<a href='$arg' class='$class' target='$target'>$text</a>";
}

function H1($text = '', $class = ''): string{
    return "<h1 class='$class'>$text</h1>";
}

function P($text = '', $class = ''): string{
    return "<p class='$class'>$text</p>";
}

function INPUT($type = "text",$name = "",$ind = [],$plchldr = "",$value = ""): string{

    $attr = '';

    if (!empty($ind) && isset($ind[0], $ind[1])) {
        $attr = $ind[0] . "='" . $ind[1] . "'";
    }

    return "<input type='$type' name='$name' $attr placeholder='$plchldr' value='$value'>";
}

function BTN($text = "Button", $onclick = '', $class = ''): string{
    return "<button onclick=\"$onclick\" class='$class'>$text</button>";
}

function IMG($src = '', $class = '', $alt = ''): string{
    return "<img src='$src' class='$class' alt='$alt'>";
}

function SPAN($class = '', $content = ''): string{
    return "<span class='$class'>$content</span>";
}

function DIV($content = '', $class = ''): string{
    return "<div class='$class'>$content</div>";
}

function BR(){
    return '<br>';
}

/* =========================
   CSS
========================= */

function CSS($arg = ''){
    echo "<link rel='stylesheet' href='$arg'>";
}

/* =========================
   LOREM
========================= */

function LOREM($target = 20): string{

    $words = [
        "lorem","ipsum","dolor","sit","amet",
        "consectetur","adipisicing","elit","tempor",
        "incididunt","labore","magna","aliqua",
        "enim","minim","veniam","quis","nostrud",
        "exercitation","ullamco","laboris","nisi",
        "aliquip","commodo","consequat","duis",
        "aute","irure","reprehenderit","voluptate",
        "velit","esse","cillum","eu","fugiat",
        "nulla","pariatur","excepteur","sint",
        "occaecat","cupidatat","non","proident"
    ];

    $target = max(1, (int)$target);

    $text = [];

    for($i = 0; $i < $target; $i++){
        $text[] = $words[array_rand($words)];
    }

    return ucfirst(implode(" ", $text)) . ".";
}

/* =========================
   CLOCK
========================= */

function TIMER($class = ""){

    echo "
    <div class='$class'>
        <span id='clock_timer'></span>
    </div>

    <script>
        const clock = document.getElementById('clock_timer');

        function tick(){
            const now = new Date();

            clock.textContent = now.toLocaleTimeString();
        }

        tick();
        setInterval(tick, 1000);
    </script>
    ";
}

/* =========================
   SEGURIDAD
========================= */

function HTML($arg = ''): string{
    return htmlspecialchars($arg, ENT_QUOTES, 'UTF-8');
}

function AUTH_EMAIL(string $email): bool{

    $email = trim($email);

    if ($email === '') return false;

    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function HASTD($password = ''): string{
    return password_hash($password, PASSWORD_DEFAULT);
}

function HASTB($password = ''): string{
    return password_hash($password, PASSWORD_BCRYPT);
}

/* =========================
   RUTAS / JS
========================= */

function GO($url){
    header("Location: $url");
    exit;
}

function ALERT($msg){
    echo "<script>alert(" . json_encode($msg, JSON_UNESCAPED_UNICODE) . ");</script>";
}

function CONSOLE($arg){
    echo "<script>console.log(" . json_encode($arg, JSON_UNESCAPED_UNICODE) . ");</script>";
}

function RELOAD($arg = null){

    if ($arg === "btn") {
        return "location.reload();";
    }

    echo "<script>location.reload();</script>";
}

/* =========================
   PDO
========================= */

function CPDO($host = '127.0.0.1',$dbname = '',$user = 'root',$pass = '',$show = false){

    try {

        $pdo = new PDO(
            "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
            $user,
            $pass
        );

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($show) {
            echo "Conectado a $dbname";
        }

        return $pdo;

    } catch(PDOException $e){
        return "Error de conexión: " . $e->getMessage();
    }
}

/* =========================
   FECHAS
========================= */

function TODAY(){
    return date("Y-m-d");
}

/* =========================
   MATH
========================= */

function RANDOM($min = 1, $max = 100){
    return random_int($min, $max);
}

function OF($percent, $number){
    return ($percent / 100) * $number;
}

function EVEN($n){
    return $n % 2 == 0;
}

function PRIME($n){

    if ($n < 2) return false;
    if ($n == 2) return true;
    if ($n % 2 == 0) return false;

    for($i = 3; $i <= sqrt($n); $i += 2){
        if($n % $i == 0) return false;
    }

    return true;
}

/* =========================
   FINANZAS
========================= */

function INTSIMPLE($capital, $rate, $time){
    return $capital * $rate * $time;
}

function AMOSIMPLE($capital, $rate, $time){
    return $capital * (1 + ($rate * $time));
}

function INTCOMPOUND($capital, $rate, $time){
    return $capital * pow(1 + $rate, $time);
}

function PROFIT($income, $cost){
    return $income - $cost;
}

function DISCOUNT($price, $percent){
    return $price - (($percent / 100) * $price);
}

function TAX($price, $percent){
    return $price + (($percent / 100) * $price);
}

function SAVEMONEY($goal, $months){
    return $goal / $months;
}

/* =========================
   ROUTER
========================= */

function ROUTER($routes = [], $notFound = null){

    $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

    if (isset($routes[$uri])) {
        require $routes[$uri];
        return;
    }

    http_response_code(404);

    if ($notFound && file_exists($notFound)) {
        require $notFound;
        return;
    }

    echo "404";
}