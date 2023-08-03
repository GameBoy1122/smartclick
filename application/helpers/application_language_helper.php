<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function getVariable($var, $key)
{
     $ci = &get_instance();
     $ci->load->library('session');

     $language = $ci->session->userdata("CURRENT_LANGUAGE");

     if (empty($language)) {
          $ci->session->set_userdata("CURRENT_LANGUAGE", "th");
          $language = $ci->session->userdata("CURRENT_LANGUAGE");
     }


     if ($language == "en") {
          $result = $var->{$key . '_en'};
     } else if ($language == "ae") {
          $result = $var->{$key . '_ae'};
     } else {
          $result = $var->{$key . '_th'};
     }
     return $result;
}


function getWording($page, $key)
{
     $ci = &get_instance();
     $ci->load->library('session');

     $configurations = array(
          'index_menu' => array(
               'th' => array(
                    'lng' => 'th',
                    'homepage' => 'หน้าแรก',
                    'ab' => 'เกี่ยวกับเรา',
                    'services' => 'บริการของเรา',
                    'testimonial' => 'เสียงจากผู้ใช้บริการจริง',
                    'article' => 'คลังความรู้',
                    'contact_us' => 'ติดต่อ',
                    'treatment' => 'การรักษา',
               ),
               'en' => array(
                    'lng' => 'en',
                    'homepage' => 'Home',
                    'ab' => 'About us',
                    'services' => 'Services',
                    'testimonial' => 'Testimonial',
                    'article' => 'Article',
                    'contact_us' => 'Contact us',
                    'treatment' => 'Treatment',
               ),
               'ae' => array(
                    'lng' => 'ae',
                    'homepage' => 'الصفحة الرئيسية​',
                    'ab' => 'النبذة​ عنا​',
                    'services' => 'خدمتنا ',
                    'testimonial' => 'الشهادات و التوصيات​',
                    'article' => 'المقالات وعلم ​التشريح​',
                    'contact_us' => 'التواصل معنا',
                    'treatment' => 'العلاجات ',
               ),

          )
     );

     $language = $ci->session->userdata("CURRENT_LANGUAGE");

     if (empty($language)) {
          $ci->session->set_userdata("CURRENT_LANGUAGE", "th");
          $language = $ci->session->userdata("CURRENT_LANGUAGE");
     }

     return $configurations[$page][$language][$key];
}
