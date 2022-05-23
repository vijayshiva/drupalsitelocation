<?php

namespace Drupal\current_time;

use Drupal\Core\Config\ConfigFactory;
use Drupal\Core\Datetime\DrupalDateTime;
use	Drupal\Core\Datetime\DateFormatter;
class Timezone {

	protected $config;
	protected $date_format;

	public function __construct(ConfigFactory $config, DateFormatter $date_format){
    $this->config = $config;
    $this->date_format = $date_format;
   }

   public function getTime(){
   	$config_timezone = $this->config->get("current_time.settings")->get("Timezone");
   	$current_time = new DrupalDateTime();
   	$timestamp = $current_time->getTimestamp();
   	$type = "custom";
   	$format = 'jS M Y - g:i a';
   	$timezone = $config_timezone;
   	$langcode = null;
   	$df = $this->date_format->format($timestamp,$type,$format,$timezone,$langcode);
   	return $df;


   }

   public function getLocation(){
   	$config_city = $this->config->get("current_time.settings")->get("City");
    $config_country = $this->config->get("current_time.settings")->get("Country");
    return [
    	$config_city, $config_country,
    ];
   }
}