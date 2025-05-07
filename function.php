<?php

function DateThai($strDate)
{
     $strYear = date("Y",strtotime($strDate))+543;
     $strMonth= date("n",strtotime($strDate));
     $strDay= date("j",strtotime($strDate));

     $strMonthCut = Array("","January","February","March","April","May","June","July","August","September","October","November","December");
     $strMonthThai=$strMonthCut[$strMonth];
     return "$strDay $strMonthThai $strYear";
}

function convert_date($date_tmp)
{
     if($date_tmp != ""){
          $date_tmp_arr = explode("-",$date_tmp);
          $str_return = $date_tmp_arr[2]."/".$date_tmp_arr[1]."/".($date_tmp_arr[0]+543);
     }
     else
     {
          $str_return = "";
     } 
     
     return $str_return;
}

function convert_time($time_tmp)
{
     if($time_tmp != ""){
          $time_tmp_arr = explode(":",$time_tmp);
          $str_return = $time_tmp_arr[0].":".$time_tmp_arr[1];
     }
     else
     {
          $str_return = "";
     } 
     
     return $str_return;
}

function convert_time_hr($time_tmp)
{
     if($time_tmp != ""){
          $time_tmp_arr = explode(":",$time_tmp);
          $str_return = $time_tmp_arr[0];
     }
     else
     {
          $str_return = "";
     } 
     
     return $str_return;
}

function convert_time_min($time_tmp)
{
     if($time_tmp != ""){
          $time_tmp_arr = explode(":",$time_tmp);
          $str_return = $time_tmp_arr[1];
     }
     else
     {
          $str_return = "";
     } 
     
     return $str_return;
}

?>