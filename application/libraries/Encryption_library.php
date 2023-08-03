<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Encryption_library
{
    public function encryptPassword($password)
    {
        /** ------------------------------------------------------- **
         **           PROCESS PHASE
        /** ------------------------------------------------------- **/
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function verifyPassword($password, $hash)
    {
        /** ------------------------------------------------------- **
         **           PROCESS PHASE
        /** ------------------------------------------------------- **/
        return password_verify($password, $hash);
    }

    public function encryptString($string,$secret_key=null)
    {
        /** ------------------------------------------------------- **
         **           CONSTRUCT PHASE
        /** ------------------------------------------------------- **/
        /** @CODEIGNITER_INSTANCE  $codeigniterInstance */
        $codeigniter_instance =& get_instance();

        /** ------------------------------------------------------- **
         **           PROCESS PHASE
        /** ------------------------------------------------------- **/
        if($codeigniter_instance->config->item('ENCRYPTION_ENABLE') == "ENABLED")
        {
            $encrypt_method = "AES-256-CBC";
            if($secret_key == null)
            {
                $secret_key = $codeigniter_instance->config->item('ENCRYPTION_DEFAULT_KEY');
            }
            $secret_key = hash('sha256', $secret_key);
            $secret_iv = substr(hash('sha256', $codeigniter_instance->config->item('ENCRYPTION_DEFAULT_IV')), 0, 16);
            $output = openssl_encrypt($string, $encrypt_method, $secret_key, 0, $secret_iv);
        }
        else
        {
            $output = $string;
        }

        return $output;
    }

    public function decryptString($string,$secret_key=null)
    {
        /** ------------------------------------------------------- **
         **           CONSTRUCT PHASE
        /** ------------------------------------------------------- **/
        /** @CODEIGNITER_INSTANCE  $codeigniterInstance */
        $codeigniter_instance =& get_instance();

        /** ------------------------------------------------------- **
         **           PROCESS PHASE
        /** ------------------------------------------------------- **/
        if($codeigniter_instance->config->item('ENCRYPTION_ENABLE') == "ENABLED")
        {
            $string = str_replace(" ","+",$string);
            $encrypt_method = "AES-256-CBC";
            if($secret_key == null)
            {
                $secret_key = $codeigniter_instance->config->item('ENCRYPTION_DEFAULT_KEY');
            }
            $secret_key = hash('sha256', $secret_key);
            $secret_iv = substr(hash('sha256', $codeigniter_instance->config->item('ENCRYPTION_DEFAULT_IV')), 0, 16);

            if(base64_encode(base64_decode($string)) === $string){
                $output = openssl_decrypt($string, $encrypt_method, $secret_key, 0, $secret_iv);
            }else{
                $output = null;
            }
        }
        else
        {
            $output = $string;
        }

        return $output;
    }

    public function generateRandomString($length = 15) {
        /** ------------------------------------------------------- **
         **           PROCESS PHASE
        /** ------------------------------------------------------- **/
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
}