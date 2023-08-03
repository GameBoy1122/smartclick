<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Librarycustomtags
{
    private $customtags;
    public function __construct()
    {
        require_once APPPATH.'third_party/CustomTags.php';
    }

    function render($path)
    {
        $this->customtags = new CustomTags(array(
            'parse_on_shutdown'     => true,
            'tag_directory'         => "/".$path,
            'sniff_for_buried_tags' => true
        ));
    }
}