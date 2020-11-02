<?php
if ( isset( $_GET['f'] ) ) {

   $image = $_GET['f'];

   $ext = explode( '.', $image );
   $ext = array_reverse( $ext );
   $ext = $ext[0];

   $width  = ( isset( $_GET['w'] ) ) ? $_GET['w'] : getimagesize( $_GET['f'] )[0];
   $height = ( isset( $_GET['h'] ) ) ? $_GET['h'] : ( ( $width * getimagesize( $_GET['f'] )[1] ) / getimagesize( $_GET['f'] )[0] );

   if ( $ext == 'jpg' ) {
      $image = imagecreatefromjpeg( $image );
   }
   else if ( $ext == 'png' ) {
      $image = imagecreatefrompng( $image );
   }
   else if ( $ext == 'gif' ) {
      $image = imagecreatefromgif( $image );
   }

   $dst = imagecreatetruecolor( $width, $height );

   imagecopyresized( $dst, $image, 0, 0, 0, 0, $width, $height, getimagesize( $_GET['f'] )[0], getimagesize( $_GET['f'] )[1] );

   imagedestroy( $image );

   ob_end_clean();

   header( 'Content-Type: image/jpeg' );

   imagejpeg( $dst );

   imagedestroy( $dst );

   exit;
}