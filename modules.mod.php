<?php

/* =========================
   MODULES.MOD.PHP FIXED
   Mismos nombres, mejor uso
========================= */

/* =========================
   INFO
========================= */

function INIT(){
    echo "Servicio activo :)\n";
}

function VERSION(){
    echo "Remote: https://github.com/Robtob12/Module-PHP-Mods \n";
    echo "Author: Robtob12 - </Scripter> \n";
    echo "Version: Modules.mod.php v1.2.4t \n";
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

function INLIST($class = '', $type = "ul", $items = []): string{

    $type = strtolower($type);

    if ($type !== "ul" && $type !== "ol") {
        $type = "ul";
    }

    $html = "";

    foreach($items as $item){
        $html .= "<li>$item</li>";
    }

    return "<$type class='$class'>$html</$type>";
}

/* =========================
   TAGS HTML
========================= */

function A($class= "", $arg = "#", $text = "Link-php-template", $target = "_blank"): string{

    $target = ($target === "_blank") ? "_blank" : "_self";

    return "<a href='$arg' class='$class' target='$target'>$text</a>";
}

function H1($class = '', $text = ''): string{
    return "<h1 class='$class'>$text</h1>";
}

function H2($class = '', $text = ''): string{
    return "<h2 class='$class'>$text</h2>";
}

function H3($class = '', $text = ''): string{
    return "<h3 class='$class'>$text</h3>";
}

function H4($class = '', $text = ''): string{
    return "<h4 class='$class'>$text</h4>";
}

function H5($class = '', $text = ''): string{
    return "<h5 class='$class'>$text</h5>";
}

function H6($class = '', $text = ''): string{
    return "<h6 class='$class'>$text</h6>";
}

function P($class = '', $text = ''): string{
    return "<p class='$class'>$text</p>";
}

function INPUT($ind = [], $type = "text",$name = "", $plchldr = "",$value = ""): string{

    $attr = '';

    if (!empty($ind) && isset($ind[0], $ind[1])) {
        $attr = $ind[0] . "='" . $ind[1] . "'";
    }

    return "<input type='$type' name='$name' $attr placeholder='$plchldr' value='$value'>";
}

function BTN($class = '', $text = "Button", $onclick = ''): string{
    return "<button onclick='$onclick' class='$class'>$text</button>";
}

function IMG($src = '', $class = '', $alt = ''): string{
    return "<img src='$src' class='$class' alt='$alt'>";
}

function SPAN($class = '', $content = ''): string{
    return "<span class='$class'>$content</span>";
}

function DIV($class = '', $content = ''): string{
    return "<div class='$class'>$content</div>";
}

function NAV($class = '', $content): string{
    return "<nav class='$class'> $content</nav>";
}

function HERO($class = '', $content = ''): string{
    return "<header class='$class'> $content </header>";
}

function SECTION($class = '', $content): string{
    return "<section class='$class'> $content </section>";
}

function BR(): string{
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

function READ($msg = ''){
    echo $msg;
    return trim(fgets(STDIN));
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

function AREA($x, $y){
    return $x * $y;
}

function CRICLE($r){
    return (3.14**2) * $r;
}

function RADIO($d){
    return $d / 2;
}

function DIAMETRO($r){
    return $r**2;
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

    $baseDir = realpath(__DIR__ . '/public');

    $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    $uri = rtrim($uri, '/') ?: '/';

    if (isset($routes[$uri])) {

        // construir ruta segura dentro de /public
        $file = realpath($baseDir . '/' . $routes[$uri]);

        if ($file && str_starts_with($file, $baseDir)) {
            require $file;
            return;
        }
    }

    http_response_code(404);

    if ($notFound) {
        $file = realpath($baseDir . '/' . $notFound);

        if ($file && str_starts_with($file, $baseDir)) {
            require $file;
            return;
        }
    }

    echo "404";
}

function SQLS($db, $table, $columns = '*', $where = []){

    $sql = "SELECT $columns FROM $table";
    $params = [];

    if (!empty($where)) {
        $conditions = [];

        foreach ($where as $key => $value) {
            $conditions[] = "$key = :$key";
            $params[":$key"] = $value;
        }

        $sql .= " WHERE " . implode(' AND ', $conditions);
    }

    $query = $db->prepare($sql);
    $query->execute($params);

    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function SQLI($db, $table, $data = []){

    $columns = implode(', ', array_keys($data));
    $placeholders = ':' . implode(', :', array_keys($data));

    $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";

    $query = $db->prepare($sql);
    $query->execute($data);

    return $db->lastInsertId();
}

function SQLU($db, $table, $data = [], $where = []){

    $set = [];
    $params = [];

    foreach ($data as $key => $value) {
        $set[] = "$key = :set_$key";
        $params[":set_$key"] = $value;
    }

    $sql = "UPDATE $table SET " . implode(', ', $set);

    if (!empty($where)) {
        $conditions = [];

        foreach ($where as $key => $value) {
            $conditions[] = "$key = :where_$key";
            $params[":where_$key"] = $value;
        }

        $sql .= " WHERE " . implode(' AND ', $conditions);
    }

    $query = $db->prepare($sql);
    $query->execute($params);

    return $query->rowCount();
}

function SQLD($db, $table, $where = []){

    $sql = "DELETE FROM $table";
    $params = [];

    if (!empty($where)) {
        $conditions = [];

        foreach ($where as $key => $value) {
            $conditions[] = "$key = :$key";
            $params[":$key"] = $value;
        }

        $sql .= " WHERE " . implode(' AND ', $conditions);
    }

    else if (empty($where)) {
        throw new Exception("DELETE sin WHERE no permitido");
    }

    $query = $db->prepare($sql);
    $query->execute($params);

    return $query->rowCount();
}