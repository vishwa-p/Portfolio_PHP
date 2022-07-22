<?php

include( 'admin/includes/database.php' );
include( 'admin/includes/config.php' );
include( 'admin/includes/functions.php' );

?>
<?php
if ( $_POST[ 'name' ] and $_POST[ 'email' ] and $_POST[ 'msg' ] ) {
    $query = 'INSERT INTO contactForm (
        name,
        email,
        message
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST[ 'name' ] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST[ 'email' ] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST[ 'msg' ] ).'"
      )';
    mysqli_query( $connect, $query );

}
?>
<!doctype html>
<html>
<head>

<meta charset = 'UTF-8'>
<meta http-equiv = 'Content-type' content = 'text/html; charset=UTF-8'>

<title>Vishwa Patel Portfolio</title>

<link href = 'style.css' type = 'text/css' rel = 'stylesheet'>
<link rel = 'stylesheet' href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel = 'stylesheet' href = 'https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css' integrity = 'sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin = 'anonymous'>
<script src = 'https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js'></script>
<script src = 'https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity = 'sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin = 'anonymous'></script>
<script src = 'https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js' integrity = 'sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49' crossorigin = 'anonymous'></script>
<script src = 'https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js' integrity = 'sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin = 'anonymous'></script>
<script src = 'script.js'></script>
</head>
<body>

<div class = 'topnav' id = 'myTopnav'>
<div>
<a href = '#content'>About</a>
<a href = '#quali'>Qualification</a>
<a href = '#projects'>Project</a>
<a href = '#experience'>Experience</a>
<a href = '#skill'>Skill</a>
<a href = '#contact'>Contact</a>
<a href = 'javascript:void(0);' class = 'icon' onclick = 'myFunction()'>
<i class = 'fa fa-bars'></i>
</a>
</div>
<img src = 'logo1.png' width = '10px' height = '10px' alt = 'logo'>
</div>
<section id = 'content'>
<div class = 'profilecontent'>
<?php

$query = 'SELECT *
    FROM content where type="Introduction" and id=1';
$result = mysqli_query( $connect, $query );
while( $record = mysqli_fetch_assoc( $result ) ): ?>
<div>
<span class = 'intro'><?php echo $record[ 'content' ];
?>
</div>
<?php endwhile;
?>
<?php

$query = 'SELECT *
    FROM content where id=4';
$result = mysqli_query( $connect, $query );
while( $record = mysqli_fetch_assoc( $result ) ): ?>
<div>
<span class = 'intropara'><?php echo $record[ 'content' ];
?>
</div>
<?php endwhile;
?>
</div>
<div class = 'profileimg'>
<img src = 'profile.jpeg' alt = 'profile' width = '300' height = '300' />
</div>
</section>
<h1 class = 'proheading'>Projects</h1>

<section id = 'projects'>

<?php

$query = 'SELECT *
    FROM projects';
$result = mysqli_query( $connect, $query );
while( $record = mysqli_fetch_assoc( $result ) ):
$data = base64_decode( explode( ',', $record[ 'photo' ] )[ 1 ] );
?>
<div class = 'projectimg'>

<?php
echo '<img src="data:image/png;base64,'.base64_encode( $data ).'" width="300" height="300">';

?>
</div>

<div class = 'projectcontent'>
<h2>
<?php echo $record[ 'title' ];

?></h2>
<div class = 'des'>
<?php echo $record[ 'description' ];
?>
</div><span class = 'lanspan'>Used Languages:</span><span class = 'technology'><b> <?php echo $record[ 'technologies' ];
?></b></span><br>
<a href = "<?php echo $record[ 'gitUrl' ];?>"><i class = 'fa fa-github' style = 'font-size:48px'></i></a>

<?php endwhile;
?>
</div>
</section>

<section class = 'skill' id = 'skill'>
<div>
<h2 class = 'skillhead'>Skills</h2>
<?php

$query = 'SELECT *
    FROM skills';
$result = mysqli_query( $connect, $query );
while( $record = mysqli_fetch_assoc( $result ) ): ?>

<h3><?php echo $record[ 'type' ];
?></h3>
<p>
<?php echo $record[ 'details' ];
?></p>
<?php endwhile;
?>
</div>
<div class = 'quali' id = 'quali'>
<h2 class = 'Qualificationhead'>Qualifications</h2>
<?php

$query = 'SELECT *
    FROM qualifications';
$result = mysqli_query( $connect, $query );
while( $record = mysqli_fetch_assoc( $result ) ): ?>

<h3><?php echo $record[ 'credential' ];
?></h3>
<p>
<?php echo $record[ 'details' ];
?></p>
<p>
<?php echo $record[ 'yearCompleted' ];
?></p>
<?php endwhile;
?>

</div>
</section>
<section id = 'experience'>
<h2>My Experience</h2>
<?php

$query = 'SELECT *
    FROM experience';
$result = mysqli_query( $connect, $query );
while( $record = mysqli_fetch_assoc( $result ) ):

?>

<div class = 'experiencecontent'>

<h5><?php echo $record[ 'companyName' ];
?></h5>
<p><?php echo $record[ 'position' ];
?></p>
<p><?php echo $record[ 'duration' ];
?></p>

<div class = 'keyrole'><b>Key Roles:</b></div>
<?php echo $record[ 'responsibilities' ];
?>

<?php endwhile;
?>
</div>
</section>
<section id = 'contact'>
<h2>Contact Me</h2>
<form action = 'index.php' method = 'POST'>
<label>Name:</label>
<input type = 'text' id = 'name' name = 'name' placeholder = 'Enter your name'>
<label>Email:</label>
<input type = 'email' id = 'email' name = 'email' placeholder = 'Enter your email'>
<label>Message:</label>
<textarea id = 'msg' name = 'msg' placeholder = 'leave your message...'></textarea>
<input type = 'submit' value = 'Submit' class = 'button' onclick = "javascript:confirm('Send Message?');">
</form>

</section>
<hr>
<footer class = 'ftr'>
<span>@ Vishwa Patel, 2022.</span>
<div class = 'logos'>
<?php

$query = 'SELECT *
    FROM socialMedia';
$result = mysqli_query( $connect, $query );
while( $record = mysqli_fetch_assoc( $result ) ):
$data = base64_decode( explode( ',', $record[ 'logo' ] )[ 1 ] );
?>

<?php
echo '<a href="'.$record[ 'url' ].'"><img src="data:image/png;base64,'.base64_encode( $data ).'"></a>';

?>
<?php endwhile;
?>

</div>
</footer>
</body>
</html>
