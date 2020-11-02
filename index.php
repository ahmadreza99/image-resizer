<!doctype html>
<html lang="en">
  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Image Resizer</title>

    <!-- style -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto&display=swap">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- style -->

  </head>

  <body>

    <div class="container">
      <div class="card">
        <h1>Image Resizer</h1>

        <form method="get">
          <input type="text" name="src" placeholder="Enter Image URL" value="<?php echo ( isset( $_GET['src'] ) ) ? $_GET['src'] : ''; ?>">
          <input type="number" name="w" min="1" placeholder="Width" value="<?php echo ( isset( $_GET['w'] ) ) ? $_GET['w'] : ''; ?>">
          <input type="number" name="h" min="1" placeholder="Height" value="<?php echo ( isset( $_GET['h'] ) ) ? $_GET['h'] : ''; ?>">
          <input type="submit" value="Submit">
        </form>

      </div>
    </div>

     <?php if ( isset( $_GET['src'] ) ) { ?>
       <div class="container">
         <div class="card">
            <?php
            $url   = 'image.php?f='.$_GET['src'];
            $width = $height = '';
            if ( isset( $_GET['w'] ) ) {
               $url   .= '&w='.$_GET['w'];
               $width = ' width='.$_GET['w'];
            }
            if ( isset( $_GET['h'] ) ) {
               $url .= '&h='.$_GET['h'];
               $height = ' height='.$_GET['h'];
            }
            ?>
           <img src="<?php echo $url; ?>" alt="" <?php echo $width.$height; ?>>
         </div>
       </div>
     <?php } else { ?>
       <div class="container">
         <div class="card">
           Please fill in the URL field.
         </div>
       </div>
     <?php } ?>

  </body>

</html>