<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Summernote_gallery_library
{
    public function getDirectory($physical_path ,$parent = null)
    {
        $directories = array_diff(scandir($physical_path), array('..', '.'));

        if(count($directories) > 0)
        {
            $results = array();

            foreach($directories as $directory)
            {
                if(!is_file($physical_path.'/'.$directory))
                {
                    $current_path = ($parent == null)?$directory:$parent."/".$directory;
                    $current_physical_path = $physical_path.'/'.$directory;

                    $results[] = array(
                        // MANDATORY
                        "id" => sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535)),
                        "text" => $directory,
                        "icon" => "glyphicon glyphicon-folder-open",
                        "children" => $this->getDirectory($current_physical_path ,$current_path),
                        // OPTIONAL
                        "path" => $current_path,
                        "parent_path" => $parent,
                        "physical_path" => $current_physical_path
                    );
                }
            }

            return $results;
        }
        else
        {
            return array();
        }
    }

    public function getImage($physical_path, $path)
    {
        $files = array_diff(scandir($physical_path), array('..', '.'));

        if(count($files) > 0)
        {
            $results = array();

            foreach($files as $file)
            {
                if(is_file($physical_path.'/'.$file))
                {
                    $current_url = base_url("assets/plugins/summernote_gallery/".$path.'/'.$file);
                    $current_delete_url = base_url("PluginsArea/SummernoteGallery/deleteImage?file_path=".$path.'/'.$file);

                    $results[] = array(
                        "name" => $file,
                        "size" => filesize($physical_path."/".$file),
                        "url" => $current_url,
                        "delete_url" => $current_delete_url
                    );
                }
            }

            return $results;
        }
        else
        {
            return array();
        }
    }

    public function deleteFolder($physical_path)
    {
        $directories = array_diff(scandir($physical_path), array('..', '.'));

        if(count($directories) > 0)
        {
            foreach($directories as $directory)
            {
                $current_physical_path = $physical_path.'/'.$directory;
                if(is_file($current_physical_path))
                {
                    unlink($current_physical_path);
                }
                else
                {
                    $this->deleteFolder($current_physical_path);
                    rmdir($current_physical_path);
                }
            }
            rmdir($physical_path);
        }
        else
        {
            rmdir($physical_path);
        }
    }
}