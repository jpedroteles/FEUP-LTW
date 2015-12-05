<?php
$db = new PDO('sqlite:sql.db');

$show_month = $_POST['showmonth'];
$show_year = $_POST['showyear'];
$show_day = $_POST['showday'];
$showmonth = preg_replace('#[^0-9]#i', '', $show_month);
$showyear = preg_replace('#[^0-9]#i', '', $show_year);

$day_count = cal_days_in_month(CAL_GREGORIAN, $showmonth, $showyear);
$pre_days = date('w', mktime(0,0,0, $showmonth, 1, $showyear));
$post_days = date(6 - (date('w', mktime(0, 0, 0, $showmonth, $day_count, $showyear))));

echo '<div id = "calendar_wrap">';

  echo '<div class = "title_bar">';
    echo '<div class = "previous_month"><input name="myBtn" type="submit" value="Previous Month" onclick="javascript:last_month();"></div>';
    echo '<div class = "show_month">' . $showmonth . '/' . $showyear . '</div>';
    echo '<div class = "next_month"><input name="myBtn" type="submit" value="Next Month" onclick="javascript:next_month();"></div>';
    echo '<div class = "clear"></div>';
  echo '</div>';

  echo '<div class = "week_days">';
    echo '<div class = "days_of_week">Sun</div>';
    echo '<div class = "days_of_week">Mon</div>';
    echo '<div class = "days_of_week">Tue</div>';
    echo '<div class = "days_of_week">Wed</div>';
    echo '<div class = "days_of_week">Thur</div>';
    echo '<div class = "days_of_week">Fri</div>';
    echo '<div class = "days_of_week">Sat</div>';
    echo '<div class = "clear"></div>';
  echo '</div>';

  /*Previous Month Filler Days */
  if($pre_days != 0) {
    for($i = 1; $i <= $pre_days; $i++) {
      echo '<div class = "non_cal_day"></div>';
    }
  }

  /*Current Month */
  for($i = 1; $i <= $day_count; $i++) {
    //get events Logic
    $date = $showyear.'-'.$showmonth.'-'.$i;
    $query = $db->query('SELECT id FROM Event WHERE startDate = "'.$date.'"');
    $num_rows = $db->query('SELECT Count(*) as numRows FROM Event WHERE startDate = "'.$date.'"');
    $data = $num_rows->fetch(PDO::FETCH_ASSOC);

    if($data[numRows] > 0) {
      $event = "<input name='$date' type='submit' value='Details' id='$date' onClick='javascript:show_details(this);'>";
    }

    if($i==$show_day)
    {
      echo '<div class = "present_day"</div>';
    }
    else
      echo '<div class = "cal_day">';

    echo '<div class = "day_heading" a href="page.html">';
    echo $i;
    echo '</div>';

    //show events button
    if($data[numRows] > 0) {
      echo "<div class = 'openings'><br />".$event."</div>";
    }
    echo '</div>';
  }

  /*Next Month Filler Days*/
  if($post_days != 0) {
    for($i = 1; $i <= $post_days; $i++) {
      echo '<div class = "non_cal_day"></div>';
    }
  }

echo '</div>';

?>
