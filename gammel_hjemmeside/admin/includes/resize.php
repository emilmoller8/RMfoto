<?
function resize( $filename, $newfilename, $maxw, $maxh, $bestemtformat, $vandmarke, $quality=95 )
{
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
  $ow = imagesx( $srcim );
  $oh = imagesy( $srcim );
  $wscale = $maxw / $ow;
  $hscale = $maxh / $oh;
  
  if($bestemtformat){
   $scale = max( $hscale, $wscale );
   $nw = round( $ow * $scale, 0 );
  $nh = round( $oh * $scale, 0 );
  $x_placering = -round(($nw-$maxw)/2);
  $y_placering = -round(($nh-$maxh)/2);
  $dstim = imagecreatetruecolor( $maxw, $maxh );
 
  }else{
   $scale = min( $hscale, $wscale );
   $nw = round( $ow * $scale, 0 );
  $nh = round( $oh * $scale, 0 );
  $dstim = imagecreatetruecolor( $nw, $nh );
  $x_placering = 0;
  $y_placering = 0;
  }
  imagecopyresampled( $dstim, $srcim, $x_placering, $y_placering, 0, 0, $nw, $nh, $ow, $oh );
  switch($ext)
  {
    case 'jpeg':
    case 'jpe':
    case 'jpg':
      imagejpeg( $dstim, $newfilename, $quality );
      break;
    case 'gif':
      imagegif( $dstim, $newfilename );
      break;
    case 'png':
      imagepng( $dstim, $newfilename, (10-($quality/10)) );
      break;
    default:
      return false;
  }
  imagedestroy( $dstim );
  imagedestroy( $srcim );
 
  if($vandmarke !=""){
  
  $ext = strtolower( pathinfo( $newfilename, PATHINFO_EXTENSION ) );
  switch($ext)
  {
    case 'jpeg':
    case 'jpe':
    case 'jpg':
      $srcim = imagecreatefromjpeg( $newfilename );
      break;
    case 'gif':
      $srcim = imagecreatefromgif( $newfilename );
      break;
    case 'png':
      $srcim = imagecreatefrompng( $newfilename );
      break;
    default:
      return false;
  }
  if($vandmarke == "1"){
  $vand = imagecreatefrompng( "/var/www/www.rmfoto.dk/www/billeder/vand.png" );
  }else if($vandmarke == "2"){
   $vand = imagecreatefrompng( "/var/www/www.rmfoto.dk/www/billeder/vand2.png" );
  }
$imgX = imagesx($vand); 
$imgY = imagesy($vand); 
//  imagealphablending($imgBack, 1); 
   
  imagecopy($srcim, $vand, $nw-$imgX, 0 , 0, 0, $imgX, $imgY); 
   
  
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
      imagepng( $dstsrcimim, $newfilename, (10-($quality/10)) );
      break;
    default:
      return false;
  }
  imagedestroy($srcim); 


  }
  return file_exists($newfilename);
}

?>