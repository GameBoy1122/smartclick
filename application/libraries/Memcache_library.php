<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Librarymemcache
{
    public function set($key,$value)
    {
        $codeigniter_instance =& get_instance();

        $memcache_object = new Memcache();
        $memcache_object->addServer($codeigniter_instance->config->item("MEMCACHE_IP"), $codeigniter_instance->config->item("MEMCACHE_PORT"));
        $memcache_object->set($key, $value);
    }

    public function get($key)
    {
        $codeigniter_instance =& get_instance();

        $memcache_object = new Memcache();
        $memcache_object->addServer($codeigniter_instance->config->item("MEMCACHE_IP"), $codeigniter_instance->config->item("MEMCACHE_PORT"));
        return $memcache_object->get($key);
    }

    public function delete($key)
    {
        $codeigniter_instance =& get_instance();

        $memcache_object = new Memcache();
        $memcache_object->addServer($codeigniter_instance->config->item("MEMCACHE_IP"), $codeigniter_instance->config->item("MEMCACHE_PORT"));
        $memcache_object->delete($key);
    }

    public function flush()
    {
        $codeigniter_instance =& get_instance();

        $memcache_object = new Memcache();
        $memcache_object->addServer($codeigniter_instance->config->item("MEMCACHE_IP"), $codeigniter_instance->config->item("MEMCACHE_PORT"));
        $memcache_object->flush();
    }
}