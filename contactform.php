<?php
include( 'admin/includes/database.php' );
if ( $_POST[ 'name' ] and $_POST[ 'email' ] and $_POST[ 'msg' ] )
 {
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