<?php

$month = $_GET['month'];
$year = $_GET['year'];
$date = $_GET['date'];

class Calendar
{
    /*
        Constructor for the Calendar class
    */
    function Calendar()
    {
    }
    
    
    /*
        Get the array of strings used to label the days of the week. This array contains seven 
        elements, one for each day of the week. The first entry in this array represents Sunday. 
    */
    function getDayNames()
    {
        return $this->dayNames;
    }
    

    /*
        Set the array of strings used to label the days of the week. This array must contain seven 
        elements, one for each day of the week. The first entry in this array represents Sunday. 
    */
    function setDayNames($names)
    {
        $this->dayNames = $names;
    }
    
    /*
        Get the array of strings used to label the months of the year. This array contains twelve 
        elements, one for each month of the year. The first entry in this array represents January. 
    */
    function getMonthNames()
    {
        return $this->monthNames;
    }
    
    /*
        Set the array of strings used to label the months of the year. This array must contain twelve 
        elements, one for each month of the year. The first entry in this array represents January. 
    */
    function setMonthNames($names)
    {
        $this->monthNames = $names;
    }
    
    
    
    /* 
        Gets the start day of the week. This is the day that appears in the first column
        of the calendar. Sunday = 0.
    */
      function getStartDay()
    {
        return $this->startDay;
    }
    
    /* 
        Sets the start day of the week. This is the day that appears in the first column
        of the calendar. Sunday = 0.
    */
    function setStartDay($day)
    {
        $this->startDay = $day;
    }
    
    
    /* 
        Gets the start month of the year. This is the month that appears first in the year
        view. January = 1.
    */
    function getStartMonth()
    {
        return $this->startMonth;
    }
    
    /* 
        Sets the start month of the year. This is the month that appears first in the year
        view. January = 1.
    */
    function setStartMonth($month)
    {
        $this->startMonth = $month;
    }
    
    
    /*
        Return the URL to link to in order to display a calendar for a given month/year.
        You must override this method if you want to activate the "forward" and "back" 
        feature of the calendar.
        
        Note: If you return an empty string from this function, no navigation link will
        be displayed. This is the default behaviour.
        
        If the calendar is being displayed in "year" view, $month will be set to zero.
    */
    function getCalendarLink($month, $year)
    {
        return "";
    }
    
 
    /*
        Return the HTML for the current month
    */
    function getCurrentMonthView()
    {
        $d = getdate(time());
        return $this->getMonthView($d["mon"], $d["year"]);
    }
    

    /*
        Return the HTML for the current year
    */
    function getCurrentYearView()
    {
        $d = getdate(time());
        return $this->getYearView($d["year"]);
    }
    
    
    /*
        Return the HTML for a specified month
    */
    function getMonthView($month, $year)
    {
        return $this->getMonthHTML($month, $year);
    }
    

    /*
        Return the HTML for a specified year
    */
    function getYearView($year)
    {
        return $this->getYearHTML($year);
    }
    
    
    
    /********************************************************************************
    
        The rest are private methods. No user-servicable parts inside.
        
        You shouldn't need to call any of these functions directly.
        
    *********************************************************************************/


    /*
        Calculate the number of days in a month, taking into account leap years.
    */
    function getDaysInMonth($month, $year)
    {
        if ($month < 1 || $month > 12)
        {
            return 0;
        }
   
        $d = $this->daysInMonth[$month - 1];
   
        if ($month == 2)
        {
            // Check for leap year
            // Forget the 4000 rule, I doubt I'll be around then...
        
            if ($year%4 == 0)
            {
                if ($year%100 == 0)
                {
                    if ($year%400 == 0)
                    {
                        $d = 29;
                    }
                }
                else
                {
                    $d = 29;
                }
            }
        }
    
        return $d;
    }


    /*
        Generate the HTML for a given month
    */
    function getMonthHTML($m, $y, $showYear = 1)
    {
        $s = "";
        
        $a = $this->adjustDate($m, $y);
        $month = $a[0];
        $year = $a[1];        
        
    	$daysInMonth = $this->getDaysInMonth($month, $year);
    	$date = getdate(mktime(12, 0, 0, $month, 1, $year));
    	
    	$first = $date["wday"];
    	$monthName = $this->monthNames[$month - 1];
    	
    	$prev = $this->adjustDate($month - 1, $year);
    	$next = $this->adjustDate($month + 1, $year);
    	
    	if ($showYear == 1)
    	{
    	    $prevMonth = $this->getCalendarLink($prev[0], $prev[1]);
    	    $nextMonth = $this->getCalendarLink($next[0], $next[1]);
    	}
    	else
    	{
    	    $prevMonth = "";
    	    $nextMonth = "";
    	}
    	
    	$header = $monthName . (($showYear > 0) ? " " . ($year+543) : "");
    	
    	$s .= "<table width=\"700\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"#003366\">";
    	$s .= "  <tr>";
    	$s .= "    <td bgcolor=\"#FFFFFF\">";


    	$s .= "<table class=\"calendar\" border=\"0\" width=\"100%\"  cellpadding=\"0\" cellspacing=\"1\">\n";
    	$s .= "<tr height=\"50\">\n";
    	$s .= "<td align=\"center\" background=\"../images/monthBg.gif\" height=\"22\">" . (($prevMonth == "") ? "&nbsp;" : "<a href=\"$prevMonth\" title=\"เดือนก่อนนี้\"><img src=\"../images/dot10.gif\" border=\"0\"></a>")  . "</td>\n";
    	$s .= "<td align=\"center\"  background=\"../images/monthBg.gif\"  colspan=\"5\"><b><center>$header</center></b></td>\n"; 
    	$s .= "<td align=\"center\"  background=\"../images/monthBg.gif\">" . (($nextMonth == "") ? "&nbsp;" : "<center><a href=\"$nextMonth\" title=\"เดือนถัดไป\"><img src=\"../images/dot09.gif\" border=\"0\"></a></center>")  . "</td>\n";
    	$s .= "</tr>\n";
    	
    	$s .= "<tr>\n";
    	$s .= "<td align=\"center\" valign=\"middle\"  background=\"../images/dayBg.gif\" height=\"25\" width=\"14%\"><center><b>" . $this->dayNames[($this->startDay)%7] . "</b></center></td>\n";
    	$s .= "<td align=\"center\" valign=\"middle\"  background=\"../images/dayBg.gif\" height=\"25\" width=\"14%\"><center><b>" . $this->dayNames[($this->startDay+1)%7] . "</b></center></td>\n";
    	$s .= "<td align=\"center\" valign=\"middle\"  background=\"../images/dayBg.gif\" height=\"25\" width=\"14%\"><center><b>" . $this->dayNames[($this->startDay+2)%7] . "</b></center></td>\n";
    	$s .= "<td align=\"center\" valign=\"middle\"  background=\"../images/dayBg.gif\" height=\"25\" width=\"14%\"><center><b>" . $this->dayNames[($this->startDay+3)%7] . "</b></center></td>\n";
    	$s .= "<td align=\"center\" valign=\"middle\"  background=\"../images/dayBg.gif\" height=\"25\" width=\"14%\"><center><b>" . $this->dayNames[($this->startDay+4)%7] . "</b></center></td>\n";
    	$s .= "<td align=\"center\" valign=\"middle\"  background=\"../images/dayBg.gif\" height=\"25\" width=\"14%\"><center><b>" . $this->dayNames[($this->startDay+5)%7] . "</b></center></td>\n";
    	$s .= "<td align=\"center\" valign=\"middle\"  background=\"../images/dayBg.gif\" height=\"25\" width=\"14%\"><center><b>" . $this->dayNames[($this->startDay+6)%7] . "</b></center></td>\n";
    	$s .= "</tr>\n";
    	
    	// We need to work out what date to start at so that the first appears in the correct column
    	$d = $this->startDay + 1 - $first;
    	while ($d > 1)
    	{
    	    $d -= 7;
    	}

        // Make sure we know when today is, so that we can use a different CSS style
        $today = getdate(time());
    	
    	while ($d <= $daysInMonth)
    	{
    	    $s .= "<tr>\n";       
    	    
    	    for ($i = 0; $i < 7; $i++)
    	    {
        	    $class = ($year == $today["year"] && $month == $today["mon"] && $d == $today["mday"]) ? "calendarToday" : "calendar";
			
			if($d >=1 and $d <=31 )
			{
				$sql="select * from booking_tb where booking_date='$year-$month-$d' ";

				$query=mysql_query($sql);
				$result=mysql_fetch_array($query);
			}
			else
			{
			$result="";
			}
				if($result)
				{
				$link="?month=$_GET[month]&year=$_GET[year]&date=$year-$month-$d";
				$title = "ดูข้อมูลการจองห้องประชุม";
				}
				else
				{
				$link="";
				$title="";
				}

				if($result != "")
				{
				$bgcolor="CCFF00";
				}
				else if(($i ==0 or $i == 6) && ($d > 0 && $d <= $daysInMonth))
				{
				$bgcolor="FADCC1";
				}
				else if($d > 0 && $d <= $daysInMonth)
				{
				$bgcolor="E0E0E0";				
				}
				else
				{
				$bgcolor="EEEEEE";
				}


				if(date("Y-n-j") == "$year-$month-$d")
				{
				$bgcolor="FCE08C";				
				}

    	        $s .= "<td class=\"$class\" align=\"right\" height=\"50\" bgcolor=\"$bgcolor\" title=\"$title\"><center>";       
    	        if ($d > 0 && $d <= $daysInMonth)
    	        {   	            
    	            $s .= (($link == "") ? $d : "<center><a href=\"$link\">$d</a></center>");
    	        }
    	        else
    	        {
    	            $s .= "-";
    	        }
      	        $s .= "</td>\n";       
        	    $d++;
    	    }
    	    $s .= "</tr>\n";    
    	}
    	
    	$s .= "</table>\n";
    	
    	$s .= "</td>";
    	$s .= "</tr>";
    	$s .= "</table>";

    	return $s;  	
    }
    

    function adjustDate($month, $year)
    {
        $a = array();  
        $a[0] = $month;
        $a[1] = $year;
        
        while ($a[0] > 12)
        {
            $a[0] -= 12;
            $a[1]++;
        }
        
        while ($a[0] <= 0)
        {
            $a[0] += 12;
            $a[1]--;
        }
        
        return $a;
    }

    /* 
        The start day of the week. This is the day that appears in the first column
        of the calendar. Sunday = 0.
    */
    var $startDay = 0;

    /* 
        The start month of the year. This is the month that appears in the first slot
        of the calendar in the year view. January = 1.
    */
    var $startMonth = 1;

    /*
        The labels to display for the days of the week. The first entry in this array
        represents Sunday.
    */
    var $dayNames = array("Su", "M", "T", "W", "Th", "F", "S");
    
    /*
        The labels to display for the months of the year. The first entry in this array
        represents January.
    */
    var $monthNames = array("January", "February", "March", "April", "May", "June",
                            "July", "August", "September", "October", "November", "December");
                            
                            
    /*
        The number of days in each month. You're unlikely to want to change this...
        The first entry in this array represents January.
    */
    var $daysInMonth = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    
}

class MyCalendar extends Calendar
{
    function getCalendarLink($month, $year)
    {
        // Redisplay the current page, but with some parameters
        // to set the new month and year
        $s = getenv('SCRIPT_NAME');
        return "$s?month=$month&year=$year";
    }
}



?>

<?php
// If no month/year set, use current month/year
 
$d = getdate(time());

if ($month == "")
{
    $month = $d["mon"];
}

if ($year == "")
{
    $year = $d["year"];
}

$cal = new MyCalendar;
echo $cal->getMonthView($month, $year);
?>

