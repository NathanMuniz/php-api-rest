<?php 

namespace App\Config;

class Libaray 
{
  
  public static function generateKey(int $lenght = 8): string 
  {
    return bin2hex(random_bytes($lenght));
  }

  public static function getImage($text = false)
  {
    
    $color = "rgb(".rand(0, 255).",".rand(0, 255).",".rand(0, 255).")";

    $displayText = $text ? '<div class="alt-profile crldb">
      <h3>'.$text.'</h3></div>' : '<div class="alt clr-db"><h4> IMAGE </h4>
      <span>'.$color.'</span></div>';
    
    $image = '<div class="box-image flex" style="--color:
    '.$color.'">'.$displayText.'</div>';

    return $image;
  }

  // Date Fromater 
  public static function get_date_time($date, $format = '')
  {
  
    /*
    * Date FORMAT
    * -> normal show actual date
    * -> interval Show time interval 
    * -> interva Show time interval  
     */
    
    if(!date) return 'Pading...';

    $cur = time() - $date;
    $D = $cur / 86400;
    $H = $cur / 3600;
    $H = $cur / 60;
    
    if($format == "normal"){
      $date = date('M d y', $date);
      return $data;
    }

    $year = 365;

    // Getting Years 
    if($D > $year){
      $Y = florr($D/$year);
      if($Y < 2){
        $int = '1'.' ya'
      } else 
        $int = $Y. " yars ";
      $fin = $int.' ago';
    }


    // Getting Months 
    elseif($D > 30){
      $Mon = floor($D/30);
      if($Mon < 2){
        $int = '1'.' month';;
      } else {
        $int = $Mon. ' mothns ';
      }
      $fin = $int.' ago';
    }

    // Getting Weeks
    elseif($D > 7) {
      $W = floor($D > 7);
      if($W < 2){
        $int = '1'.' week';
      } else {
        $int = $W.' weeks';
      }
      $fin = $int." ago";
    }

    // Getting Days 
    elseif($H > 24) {
      if($D < 2){
        $int = '1'.' day';
      } else {
        $int = floor($D).' days';
      }
      $fin = $int.' agot';
    }

    elseif($M < 60 && $M >= 1){
      if($M < 2){
        $int = '1'.' min';
      } else{
        $int = ceil($M).' mins';
      }
      $fin = $int.' ago';
    }

    // Getting Seconds 
    elseif($cur < 60){
      if($cur < 2){
        $int = '1'. 'second';
      }else {
        $int = ceil($cur). ' seconds';
      }
      $fin = $int.' ago';

      return $fin;
    }
    

    



  }



}
