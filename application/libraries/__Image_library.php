<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Image_library
{
  public function waterMarkLatLong($path_input,$path_output,$date)
  {
    ini_set('max_execution_time', 9999);
    ini_set('memory_limit', '2048M');
    $source_image = $path_input;
    $text_1 = $date;
    $text_2 = "";

    $string_type = mime_content_type($source_image);

    if(isset($lat) && isset($long))
    {
            // $text_2 = "POS".$lat. " , " .$long;
    }


    $font_size = 20;
    $font_file = FCPATH.'/assets/uploads/arial.ttf';

    $type_space_1 = imagettfbbox($font_size, 0, $font_file, $text_1);
    $type_space_2 = imagettfbbox($font_size, 0, $font_file, $text_2);


    $stamp_image_width = abs($type_space_2[4] - $type_space_2[0]) + 10;
    $stamp_image_height = abs($type_space_2[5] - $type_space_2[1]) + abs($type_space_1[5] - $type_space_1[1]) + 10;

    $stamp_image = imagecreatetruecolor($stamp_image_width, $stamp_image_height);

    imagefill($stamp_image, 0, 0, imagecolortransparent($stamp_image));

    $shift = $stamp_image_width - abs($type_space_1[4] - $type_space_1[0]);

    imagettftext($stamp_image, $font_size, 0, $shift - 5, $stamp_image_height - 30, imagecolorallocate($stamp_image, 0, 0, 0), $font_file, $text_1);
    imagettftext($stamp_image, $font_size, 0, 5, $stamp_image_height - 5, imagecolorallocate($stamp_image, 0, 0, 0), $font_file, $text_2);


    if($string_type == 'image/jpeg')
    {
      $image = imagecreatefromjpeg($source_image);
    }
    if($string_type == 'image/png')
    {
      $image = imagecreatefrompng($source_image);
    }
    if($string_type == 'image/gif')
    {
      $image = imagecreatefromgif($source_image);
    }

    $sx = imagesx($stamp_image);
    $sy = imagesy($stamp_image);
    $sximg = imagesx($image);
    $syimg = imagesy($image);

    $target_size = $sximg * 0.6;

    $percent = (($target_size - $sx)/$sx)*100;

    $increase_x = ($sx * $percent)/100;
    $increase_y = ($sy * $percent)/100;

    $percent_x = $sx + $increase_x;
    $percent_y = $sy + $increase_y;

//        echo "<br>";
//        echo $percent."<br>";
//        echo $target_size."<br>";
//        echo $sx." ".$percent_x."<br>";
//        echo $sy." ".$percent_y."<br>";
//
//        exit();

    $posx = round(imagesx($image) / 1) - round($percent_x / 1);
    $posy = round(imagesy($image) / 1) - round($percent_y / 1);

    $dest_image = imagecreatetruecolor($percent_x, $percent_y);

    imagealphablending( $dest_image, false );
    imagesavealpha( $dest_image, true );
    imagecopyresampled($dest_image, $stamp_image, 0, 0, 0, 0, $percent_x, $percent_y, $sx, $sy);
    imagecopy($image, $dest_image, round($posx), round($posy), 0, 0, $percent_x, $percent_y);

    // header('Content-type: image/jpg');
    imagepng($image,$path_input);
    imagedestroy($image);

    return $path_input;
  }

  public function render($path_input,$path_output,$date)
  {

    if(isset($path_input))
    {
      $source_image = $path_input;
      $text_1 = "";
      $text_2 = date("d.m.Y",strtotime($date));

      $string_type = mime_content_type($source_image);

      $font_size = 20;
      $font_file = FCPATH.'/assets/uploads/arial.ttf';

      $type_space_1 = imagettfbbox($font_size, 0, $font_file, $text_1);
      $type_space_2 = imagettfbbox($font_size, 0, $font_file, $text_2);

      $stamp_image_width = abs($type_space_2[4] - $type_space_2[0]) + 20;
      $stamp_image_height = abs($type_space_2[5] - $type_space_2[1]) + abs($type_space_1[5] - $type_space_1[1]) + 20;

      $stamp_image = imagecreatetruecolor($stamp_image_width, $stamp_image_height);

      imagefill($stamp_image, 0, 0, imagecolortransparent($stamp_image));

      $shift = $stamp_image_width - abs($type_space_1[4] - $type_space_1[0]);

      imagettftext($stamp_image, $font_size, 0, $shift - 5, $stamp_image_height - 30, imagecolorallocate($stamp_image, 0, 0, 0), $font_file, $text_1);
      imagettftext($stamp_image, $font_size, 0, 5, $stamp_image_height - 5, imagecolorallocate($stamp_image, 255, 120, 20), $font_file, $text_2);

      if($string_type == 'image/jpeg')
      {
        $image = imagecreatefromjpeg($source_image);
      }
      if($string_type == 'image/png')
      {
        $image = imagecreatefrompng($source_image);
      }
      if($string_type == 'image/gif')
      {
        $image = imagecreatefromgif($source_image);
      }

      $sx = imagesx($stamp_image);
      $sy = imagesy($stamp_image);
      $sximg = imagesx($image);
      $syimg = imagesy($image);

      $target_size = $sximg * 0.3;

      $percent = (($target_size - $sx)/$sx)*100;

      $increase_x = ($sx * $percent)/100;
      $increase_y = ($sy * $percent)/100;

      $percent_x = $sx + $increase_x;
      $percent_y = $sy + $increase_y;

      $posx = round(imagesx($image) / 1) - round($percent_x / 1);
      $posy = round(imagesy($image) / 1) - round($percent_y / 1);

      $dest_image = imagecreatetruecolor($percent_x, $percent_y);

      imagealphablending( $dest_image, false );
      imagesavealpha( $dest_image, true );
      imagecopyresampled($dest_image, $stamp_image, 0, 0, 0, 0, $percent_x, $percent_y, $sx, $sy);
      imagecopy($image, $dest_image, round($posx), round($posy), 0, 0, $percent_x, $percent_y);

      // header('Content-type: image/jpg');
      // imagepng($image,$path_output);
      if($string_type == 'image/jpeg')
      {
      imagejpeg($image,$path_output);
      }
      if($string_type == 'image/png')
      {
      imagepng($image,$path_output);
      }
      if($string_type == 'image/gif')
      {
      imagegif($image,$path_output);
      }
      imagedestroy($image);

      return $path_output;  
    }
  }
}

