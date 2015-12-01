<!DOCTYPE html>
<html>
<head>
  <link href = "calCSS.css" rel="stylesheet" type="text/css" media="all" />
  <script language="javascript" type="text/javascript">
  var showmonth;
  var showyear;
  var showday;
  function initialCalendar() {
    var hr = new XMLHttpRequest();
    var url = "calendar_start.php";
    var currentTime = new Date();
    var month = currentTime.getMonth() + 1;
    var year = currentTime.getFullYear();
    var day = currentTime.getUTCDate();
    showday = day;
    showmonth = month;
    showyear = year;
    var vars = "showmonth="+showmonth+"&showyear="+showyear+"&showday="+showday;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
      if(hr.readyState == 4 && hr.status == 200) {
        var return_data = hr.responseText;
        document.getElementById("showCalendar").innerHTML = return_data;
      }
    }
    hr.send(vars);
    document.getElementById("showCalendar").innerHTML = "processing...";
  }
  </script>
  <script language="javascript" type="text/javascript">
  function next_month() {
    var nextmonth = showmonth + 1;
    if(nextmonth > 12) {
      nextmonth = 1;
      showyear = showyear + 1;
    }
    showmonth = nextmonth;
    var hr = new XMLHttpRequest();
    var url = "calendar_start.php";
    var vars = "showmonth="+showmonth+"&showyear="+showyear+"&showday="+showday;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
      if(hr.readyState == 4 && hr.status == 200) {
        var return_data = hr.responseText;
        document.getElementById("showCalendar").innerHTML = return_data;
      }
    }
    hr.send(vars);
    document.getElementById("showCalendar").innerHTML = "processing...";
  }
  </script>
  <script language="javascript" type="text/javascript">
  function last_month() {
    var lastmonth = showmonth - 1;
    if(lastmonth < 1) {
      lastmonth = 12;
      showyear = showyear - 1;
    }
    showmonth = lastmonth;
    var hr = new XMLHttpRequest();
    var url = "calendar_start.php";
    var vars = "showmonth="+showmonth+"&showyear="+showyear+"&showday="+showday;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
      if(hr.readyState == 4 && hr.status == 200) {
        var return_data = hr.responseText;
        document.getElementById("showCalendar").innerHTML = return_data;
      }
    }
    hr.send(vars);
    document.getElementById("showCalendar").innerHTML = "processing...";
  }
  </script>
</head>
<body onLoad="initialCalendar();">
  <div id="showCalendar"></div>
  <div id="overlay">
    <div id="eventsform"></div>
  </div>
</body>
</html>
