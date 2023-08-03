<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Libraryfacebook
{
    public function __construct()
    {
        require_once APPPATH.'third_party/facebook/autoload.php';
    }

    public function getLoginFacebookUrl($callBackUrl,$facebook_app_key = null,$facebook_app_secret = null)
    {
        $codeigniter_instance =& get_instance();
        if($facebook_app_key == null && $facebook_app_key == null)
        {
            $fb = new Facebook\Facebook([
                'app_id' => $codeigniter_instance->config->item('FACEBOOK_APP_KEY'),
                'app_secret' => $codeigniter_instance->config->item('FACEBOOK_API_SECRET'),
                'default_graph_version' => 'v2.9',
            ]);
        }
        else
        {
            $fb = new Facebook\Facebook([
                'app_id' => $facebook_app_key,
                'app_secret' => $facebook_app_secret,
                'default_graph_version' => 'v2.9',
            ]);
        }

        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['public_profile','email'];
        $loginUrl = $helper->getLoginUrl($callBackUrl, $permissions);
        $loginFacebookUrl = htmlspecialchars($loginUrl);
        return $loginFacebookUrl;
    }

    public function getLoginFacebookResponse($facebook_app_key = null,$facebook_app_secret = null)
    {
        $codeigniter_instance =& get_instance();
        if($facebook_app_key == null && $facebook_app_key == null)
        {
            $fb = new Facebook\Facebook([
                'app_id' => $codeigniter_instance->config->item('FACEBOOK_APP_KEY'),
                'app_secret' => $codeigniter_instance->config->item('FACEBOOK_API_SECRET'),
                'default_graph_version' => 'v2.9',
            ]);
        }
        else
        {
            $fb = new Facebook\Facebook([
                'app_id' => $facebook_app_key,
                'app_secret' => $facebook_app_secret,
                'default_graph_version' => 'v2.9',
            ]);
        }

        $helper = $fb->getRedirectLoginHelper();
        $fbSession = array("FBRLH_state" => $_GET['state']);
        $codeigniter_instance->session->set_userdata($fbSession);

        try {
            $accessToken = $helper->getAccessToken();
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (! isset($accessToken)) {
            if ($helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;
        }

        $oAuth2Client = $fb->getOAuth2Client();
        $tokenMetadata = $oAuth2Client->debugToken($accessToken);
        if($facebook_app_key == null && $facebook_app_key == null)
        {
            $tokenMetadata->validateAppId($codeigniter_instance->config->item('FACEBOOK_APP_KEY'));
        }
        else
        {
            $tokenMetadata->validateAppId($facebook_app_key);
        }
        $tokenMetadata->validateExpiration();

        if (! $accessToken->isLongLived()) {
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
                exit;
            }

            echo '<h3>Long-lived</h3>';
            var_dump($accessToken->getValue());
        }

        try {
            $response = $fb->get('/me?fields=id,name,email,gender', $accessToken);
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $facebookObject = $response->getGraphUser();
        return $facebookObject;
    }
}