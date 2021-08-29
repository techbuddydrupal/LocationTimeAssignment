<?php

/**
* @file providing the service that will return current date and time for specific region.
*
*/

namespace  Drupal\location_time;
use \Datetime; 

class GetTime {

 public function  getTime($region = ''){
   if (empty($region)) {
    //  If no region is passed, then return UTC time
      $current = new DateTime(); 
      return $current->format('dS M Y - h:i A ');
   }
   else {
    //  If region found, then return specific region time
      date_default_timezone_set($region);
      $current = new DateTime(); 
      return $current->format('dS M Y - h:i A ');
   }
 }

}