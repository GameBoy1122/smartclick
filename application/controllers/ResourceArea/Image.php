<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function render($file)
	{

                $this->load->model("building_checklist_result_model");

                $model_filter = new stdClass();
                $model_filter->get_first = true;
                $model_filter->where["image"] = $file;
                $model_filter->where["status"] = "ACTIVATE";

                $result = $this->building_checklist_result_model->search($model_filter);

                if(isset($result) && $result != null)
                {
                        $file = $result->image;

                        $source_image = FCPATH."/assets/uploads/building_checklist_result/image/".$file;
                        $text_1 = $result->capture_date;
                        $text_2 = "";

                        $string_type = mime_content_type($source_image);

                        if(isset($result->latitude) && isset($result->longitude))
                        {
                                $text_2 = "POS".$result->latitude. " , " .$result->longitude;
                        }

                        $font_size = 20;
                        $font_file = FCPATH.'/assets/uploads/arial.ttf';

                        $type_space_1 = imagettfbbox($font_size, 0, $font_file, $text_1);
                        $type_space_2 = imagettfbbox($font_size, 0, $font_file, $text_2);
//        $xLeft  = $type_space[0]; // (lower|upper) left corner, X position
//        $xRight = $type_space[2]; // (lower|upper) right corner, X position
//        $yLower = $type_space[1]; // lower (left|right) corner, Y position
//        $yUpper = $type_space[5]; // upper (left|right) corner, Y position

                        $stamp_image_width = abs($type_space_2[4] - $type_space_2[0]) + 10;
                        $stamp_image_height = abs($type_space_2[5] - $type_space_2[1]) + abs($type_space_1[5] - $type_space_1[1]) + 10;

                        $stamp_image = imagecreatetruecolor($stamp_image_width, $stamp_image_height);

                        imagefill($stamp_image, 0, 0, imagecolortransparent($stamp_image));

                        $shift = $stamp_image_width - abs($type_space_1[4] - $type_space_1[0]);

                        imagettftext($stamp_image, $font_size, 0, $shift - 5, $stamp_image_height - 30, imagecolorallocate($stamp_image, 0, 0, 0), $font_file, $text_1);
                        imagettftext($stamp_image, $font_size, 0, 5, $stamp_image_height - 5, imagecolorallocate($stamp_image, 0, 0, 0), $font_file, $text_2);

//        header('Content-type: image/png');
//        imagepng($stamp_image);
//        imagedestroy($stamp_image);
//        exit();

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

                        header('Content-type: image/jpg');
                        imagepng($image);
                        imagedestroy($image);
                }
        }
}