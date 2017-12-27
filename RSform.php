<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<link href="DisplayBox.css" rel="stylesheet" type="text/css"/>

<?php
$connection=mysqli_connect("db714095400.db.1and1.com","dbo714095400","Sleas2019!","db714095400");
session_start();
        
        $rawdata="";
        $data="";
        $Attack =[];
        $Defence =[];
	$Strength =[];
	$Hitpoints =[];
	$Ranged=[];
	$Prayer =[];
	$Magic=[];
        $Attack[1] = "1";
        $Defence[1] ="1";
	$Strength[1] ="1";
	$Hitpoints[1] ="10";
	$Ranged[1] = "1";
	$Prayer[1] = "1";
	$Magic[1] = "1";


if($connection){

} 
else{
    die("connection failed. Reason:".mysqli_connect_error());
}

function getIP() {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forwarded = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
                return $client;}
        elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
                return $forward;}
        else {
                return $remote;}
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

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<link href="DisplayBox.css" rel="stylesheet" type="text/css"/>
<form method="post" enctype="multipart/form-data">
    <script type="text/javascript">
    function recaptchaCallback() {
    $(':input[type="submit"]').prop("disabled", false);
};
</script>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Group Finder</title>
        <link rel="icon" type = "image/x-icon" href="https://osrslfg.com/favicon.ico">
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <span><h69>Oldschool Runescape Group Finder</h69><br>
        <h68>Find people to play with, plain and simple <br></h68></span><br><br>
    <fieldset>
        <legend>Find a Group</legend>
        <h3>Username</h3>
<input type="text" placeholder="Username" name="username" maxlength="12" required /><br>
<h3>Activity</h3>

      <!--<input type="radio" value="pvp" id="pvp" onclick="activity(0)" name="activity" checked/>
      <label for="pvp" class="radio" >PVP</label>
      <input type="radio" value="pve" id="pve" onclick="activity(1)" name="activity" />
      <label for="pve" class="radio">PVE</label> -->
      
<h3 class="column-6 form-select">
  <select name="activity" required id="activity">
    <option value="" disabled="disabled" selected="selected">Activity</option>
    <!-- normal options -->
    <option value="P2P PVP">P2P PVP</option>
    <option value="F2P PVP">F2P PVP</option>
    <option value="Armadyl GWD">Armadyl GWD</option>
    <option value="Bandos GWD">Bandos GWD</option>
    <option value="Callisto">Callisto</option>
    <option value="Chambers of Xeric">Chambers of Xeric</option>
    <option value="Chaos Elemental">Chaos Elemental</option>
    <option value="Corporeal Beast">Corporeal Beast</option>
    <option value="Dagganoth Kings">Dagganoth Kings</option>
    <option value="Demonic Gorillas">Demonic Gorillas</option>
    <option value="Giant Mole">Giant Mole</option>
    <option value="Kalphite Queen">Kalphite Queen</option>
    <option value="King Black Dragon">King Black Dragon</option>
    <option value="Lizardman Shamans">Lizardman Shamans</option>
    <option value="Revenants">Revenants</option>
    <option value="Saradomin GWD">Saradomin GWD</option>
    <option value="Scorpia">Scorpia</option>
    <option value="Venenitis">Venenitis</option>
    <option value="Vet'ion">Vet'ion</option>
    <option value="Zamorak GWD">Zamorak GWD</option>
    <option value="Quest - Shield of Arrav">Quest - Shield of Arrav</option>
    <option value="Quest - Heroes' Quest">Quest - Heroes' Quest</option>
    <option value="Quest - Other">Quest - Other</option> 
  </select>
</h3>
          
          
          
<div1 class="captcha_wrapper">
		<div1 class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LdaazwUAAAAAMfSknmWy5qBmG13_h0TkV3gVXfP"></div1>
	</div1>
<p>
<label>
    
<input type="submit" name="submit" id="submit" value="Submit" disabled/>
    
</label>
</p>

<?php
if( $_SESSION['submit'] == $_POST['submit'] && 
     isset($_SESSION['submit'])){
    // user double submitted 
}
else {
    // user submitted once
    $_SESSION['submit'] = $_POST['submit'];        
} 
?>

</form>
</fieldset> 
    
<?php
if (isset($_POST['submit']))  {
$username=$_POST['username'];
$activity=$_POST['activity'];
$time=date('Y-m-d H:i:s');

  /*
   Tracking table structure:
    `id`              INT(11) unsigned NOT NULL AUTO_INCREMENT
    `clientIP`       VARCHAR(15) NOT NULL
    `submittedtime`  DATETIME NOT NULL
 */

$ip=getIP();
$timelimit=date('Y-m-d H:i:s',strtotime('-15 minutes'));

 $query = "SELECT COUNT(*) AS 'count' FROM ttable WHERE clientIP = '{$ip}' AND submittedtime > '$timelimit'";
 
 $result = mysqli_fetch_assoc(mysqli_query($connection, $query));

 if ($result['count'] > 0) {
   //echo "You have already submitted within the last 10 mins";
   echo '<script type="text/javascript"> location.replace("https://osrslfg.com/Submitted.php") </script>';
   exit;
 }

 // process survey here
$datenow=date('Y-m-d H:i:s');
 $query = "insert into ttable (clientIP, submittedtime) values('$ip', '$datenow')";
 mysqli_query($connection, $query);




$rawdata = file_get_contents("http://services.runescape.com/m=hiscore_oldschool/index_lite.ws?player=$username");
		fclose($rawdata);
                
		//$name = ucwords($username);
		if (!$rawdata == "")
		{
			//Replace "-1" with zero.
			$data = str_replace("-1", "0", $rawdata);
                        
			//Divide the stats into an array
			$SplitSkill = explode("\n",$data);

			//Divide each skill into array by Rank/Level/XP
                        $Attack = explode(",",$SplitSkill[1]);
			$Defence = explode(",",$SplitSkill[2]);
			$Strength = explode(",",$SplitSkill[3]);
			$Hitpoints = explode(",",$SplitSkill[4]);
			$Ranged= explode(",",$SplitSkill[5]);
			$Prayer = explode(",",$SplitSkill[6]);
			$Magic= explode(",",$SplitSkill[7]);			
					
			$Atkstat = number_format($Attack[1]);
			$Defstat = number_format($Defence[1]);
			$Strstat = number_format($Strength[1]);
			$Hitstat = number_format($Hitpoints[1]);
			$Rangestat = number_format($Ranged[1]);
			$Praystat = number_format($Prayer[1]);
			$Magestat = number_format($Magic[1]);					
                        
                }
                else{
                echo '<script type="text/javascript"> location.replace("https://osrslfg.com/Submitted.php") </script>';
                exit;
                }

       $Basecb=.25 * ($Defstat + $Hitstat + floor(($Praystat/2)));
       $Meleecb=.325 * ($Atkstat + $Strstat);
       $Rangecb=.325 * (floor(($Rangestat/2)) + $Rangestat);
       $Magecb=.325 * (floor(($Magestat/2)) + $Magestat);
       $highest= max($Meleecb, $Rangecb, $Magecb);
       $cmbt= floor(($Basecb + $highest)); 
    
    if (!$cmbt > 10){
        echo '<script type="text/javascript"> location.replace("https://osrslfg.com/Submitted.php") </script>'; 
        exit;
                    }

                   
                    
                    
                    
                    
                    
$sql="insert into rstable (username, cmbt, activity, time, attack, defence, strength, hitpoints, ranged, prayer, magic) values('$username','$cmbt','$activity','$time','$Atkstat','$Defstat','$Strstat','$Hitstat','$Rangestat','$Praystat','$Magestat')";

    if(!mysqli_query($connection,$sql)){
    }
echo '<script type="text/javascript"> location.replace("https://osrslfg.com/Submitted.php") </script>';
}
?>
<link href="DisplayBox.css" rel="stylesheet" type="text/css"/>
<br><br><br>
<legend>Find Players</legend>
<p></p>

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
        //echo "<h5>";
        echo "<p>";
        //echo "<h1>Username</h1>";
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