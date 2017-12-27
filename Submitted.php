<link href="DisplayBox.css" rel="stylesheet" type="text/css"/>
<?php
$connection=mysqli_connect("db714095400.db.1and1.com","dbo714095400","Sleas2019!","db714095400");


if($connection){

} 
else{
    die("connection failed. Reason:".mysqli_connect_error());
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Find Players</title>
        <link rel="icon" type = "image/x-icon" href="https://osrslfg.com/Submitted.php/favicon.ico">
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    
 <br>
<legend>Find Players</legend>
<p><br></p>

<?php
$atk="<img src='/skill_icon_attack1.gif' alt ='atk' />";
$str="<img src='/skill_icon_strength1.gif' alt ='str' />";
$def="<img src='/skill_icon_defence1.gif' alt ='def' />";
$hp="<img src='/skill_icon_hitpoints1.gif' alt ='hp' />";
$magic="<img src='/skill_icon_magic1.gif' alt ='magic' />";
$pray="<img src='/skill_icon_prayer1.gif' alt ='prayer' />";
$rng="<img src='/skill_icon_ranged1.gif' alt ='rng' />";
$clock="<img src='/clock2.png' alt ='time' />";

$sql="SELECT id, username, cmbt, activity, time, attack, defence, strength, hitpoints, ranged, prayer, magic FROM rstable ORDER BY id DESC LIMIT 50;";
$results = mysqli_query($connection,$sql);

		
if(mysqli_num_rows($results) > 0) 
    {
    While($row=mysqli_fetch_array($results)) {
    //this is where the table formatting should go. $row[1]

        $timeago=time_elapsed_string($row[4]);
        
        echo"<div2>";
        
        echo "<p>";
        
        echo "<h2>$row[1]</h2>";

        echo "<h1>Combat Level $row[2] </h1>";

        echo "<h1>$atk $row[5]     $str $row[7]   $def $row[6]   </h1>";
        echo "<h1>$hp $row[8]      $pray $row[10]     $rng $row[9]      $magic $row[11]      </h1>";

        echo "<h1>$row[3]</h1>";
    
        echo "<h1>$clock $timeago</h1>";
       
        echo "</div2>";
    }
}      

mysqli_close($connection);
?>   