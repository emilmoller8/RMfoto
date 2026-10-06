<?
function resize( $filename, $newfilename,$xset,$yset,$bynavn, $hv, $quality=95 )
{
  $srcim = imagecreatetruecolor( 305, 535 );
  //imagedestroy( $dstim );
  imagedestroy( $srcim );
 
  $ext = strtolower( pathinfo( $filename, PATHINFO_EXTENSION ) );
  switch($ext)
  {
    case 'jpeg':
    case 'jpe':
    case 'jpg':
      $srcim = imagecreatefromjpeg( $filename );
      break;
    case 'gif':
      $srcim = imagecreatefromgif( $filename );
      break;
    case 'png':
      $srcim = imagecreatefrompng( $filename );
      break;
    default:
      return false;
  }
  
  $vand = imagecreatefrompng( "/var/www/www.rmfoto.dk/www/billeder/dot.png" );
  
$imgX = imagesx($vand); 
$imgY = imagesy($vand); 
//  imagealphablending($imgBack, 1); 
   
  imagecopy($srcim, $vand, $xset,$yset , 0, 0, $imgX, $imgY); 
   
   // text
   
	$black = imagecolorallocate($srcim, 0x00, 0x00, 0x00);


// Path to our ttf font file
	$font_file = '/var/www/www.rmfoto.dk/www/admin/includes/ARIALNB.TTF';

// udregn brede
$im = imagecreatetruecolor(100, 20);
$dimensions = imagettfbbox(9, 0, $font_file, $bynavn);
$textWidth = abs($dimensions[4] - $dimensions[0]);
$xi = $textWidth;

// Draw the text 'PHP Manual' using font size 13
	if($hv=='v'){

		imagefttext($srcim, 9, 0, $xset-$xi-2,$yset+8, $black, $font_file, $bynavn);
	}else if ($hv=='h'){
		imagefttext($srcim, 9, 0, $xset+9,$yset+8, $black, $font_file, $bynavn);
	}
	   
	   //
  
   switch($ext)
  {
    case 'jpeg':
    case 'jpe':
    case 'jpg':
      imagejpeg( $srcim, $newfilename, $quality );
      break;
    case 'gif':
      imagegif( $srcim, $newfilename );
      break;
    case 'png':
      imagepng( $srcim, $newfilename, (10-($quality/10)) );
      break;
    default:
      return false;
  }
  imagedestroy($srcim); 


  
  return file_exists($newfilename);
}

?>