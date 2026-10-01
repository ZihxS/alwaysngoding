<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ReCaptcha
{
		public $CI;
		private $_enabled = FALSE;
		private $_secret, $_sitekey, $_lang;
		private $_version       = "php_1.0";
		private $_signup_url    = "https://www.google.com/recaptcha/admin";
		private $_siteVerifyUrl = "https://www.google.com/recaptcha/api/siteverify";

    function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->config('recaptcha', TRUE);
        $this->_enabled = (bool) $this->CI->config->item('enabled', 'recaptcha');

				$this->_secret  = $this->CI->config->item('recaptcha_secretkey', 'recaptcha');
				$this->_sitekey = $this->CI->config->item('recaptcha_sitekey', 'recaptcha');

        if ($this->CI->config->item('lang', 'recaptcha') == NULL || $this->CI->config->item('lang', 'recaptcha') == "")
        {
            $this->_lang = 'en';
        }
        else
        {
            $this->_lang = $this->CI->config->item('lang', 'recaptcha');
        }
    }

    /**
     * Function to convert an array into query string
     * @param array $data Array of params
     * @return String query string of parameters
     */
    private function _encodeQS($data)
    {
        $req = "";

        foreach ($data as $key => $value)
        {
            $req .= $key . '=' . urlencode(stripslashes($value)) . '&';
        }

        return substr($req, 0, strlen($req) - 1);
    }

    /**
     * HTTP GET to communicate with reCAPTCHA server
     * @param string $url URL to POST
     * @param array $data Array of params
     * @return string JSON response from reCAPTCHA server
     */
    private function _submit($url, $data)
    {
			$req = $this->_encodeQS($data);  // Assuming this generates a properly formatted query string

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
			curl_setopt($ch, CURLOPT_TIMEOUT, 15);
			$response = curl_exec($ch);
			curl_close($ch);
			return $response;
    }

    /**
     * Function for rendering reCAPTCHA widget into views
     * Call this function in your view
     * @return string embedded HTML
     */
    public function render()
    {
        if (!$this->_enabled) return '';
        $return = "<div class='g-recaptcha' data-sitekey='{$this->_sitekey}' data-callback='recaptchaCallback'></div><script src='https://www.google.com/recaptcha/api.js?hl={$this->_lang}' async defer></script>";
        return $return;
    }

    /**
     * Function for verifying user's input
     * @param string $response User's input
     * @param string $remoteIp Remote IP you wish to send to reCAPTCHA, if NULL $this->input->ip_address() will be called
     * @return array Array of response
     */
    public function verifyResponse($response, $remoteIp = NULL)
    {
        if (!$this->_enabled) return ['success' => TRUE, 'error_codes' => '', 'skipped' => TRUE];
        if ($response == null || strlen($response) == 0)
        {
          $return = ['success' => FALSE, 'error_codes' => 'missing-input'];
					return $return;
        }

        $resp = $this->_submit($this->_siteVerifyUrl, [
					'v'        => $this->_version,
					'secret'   => $this->_secret,
					'remoteip' => (!is_null($remoteIp)) ? $remoteIp : $this->CI->input->ip_address(),
					'response' => $response
        ]);

        $answers = json_decode($resp, TRUE);

        return !empty($answers['success']) ? ['success' => TRUE, 'error_codes' => '']
            : ['success' => FALSE, 'error_codes' => $answers['error-codes'] ?? ['verification-failed']];
    }
}
