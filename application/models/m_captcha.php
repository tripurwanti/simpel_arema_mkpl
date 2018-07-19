<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class M_captcha extends CI_Model
{
 
        function __construct()
 {
          parent::__construct();
 }
          
        function setCaptcha()
        {
          $this->load->helper('captcha');
          $vals = array(
           'img_path'       => './assets/captcha/',
           'img_url'        => base_url().'/assets/captcha/',
           'expiration'     => 3600,// one hour
           'font_path'   => './system/fonts/georgia.ttf',
           'img_width'   => '100',
           'img_height'   => '27',
           'word'   => random_string('numeric', 6),
                 );
                  
          $cap = create_captcha($vals);
          if ($cap)
          {
                   $id   = '';
                   $time     = $cap['time'];
                   $ip       = $this -> input -> ip_address();
                   $word     = $cap['word'];
                  $query = "insert into captcha values('".$id."',".$time.",'".$ip."','".$word."')";
                  $this->db->query($query);
          }else {
                                return "Captcha not work" ;
                         }
                        //$data['cap'] = $cap;    
                    return $cap['image'];
 }       
}
?>