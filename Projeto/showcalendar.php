<!DOCTYPE html>
<html>
<head>
  <link href = "calCSS.css" rel="stylesheet" type="text/css" media="all" />
  <script language="javascript" type="text/javascript">
  var showmonth;
  var showyear;
  var showday;
  var currentday;
  var currentmonth;
  var currentyear;
  function initialCalendar() {
    var hr = new XMLHttpRequest();
    var url = "calendar_start.php";
    var currentTime = new Date();
    var month = currentTime.getMonth() + 1;
    var year = currentTime.getFullYear();
    var day = currentTime.getUTCDate();
    showday = currentTime;
    showmonth = month;
    showyear = year;
    currentday = day;
    currentmonth = month;
    currentyear = year;
    var vars = "showmonth="+showmonth+"&showyear="+showyear+"&currentday="+currentday+"&currentmonth="+currentmonth+"&currentyear="+currentyear;
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
    var vars = "showmonth="+showmonth+"&showyear="+showyear+"&currentday="+currentday+"&currentmonth="+currentmonth+"&currentyear="+currentyear;
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
    var vars = "showmonth="+showmonth+"&showyear="+showyear+"&currentday="+currentday+"&currentmonth="+currentmonth+"&currentyear="+currentyear;
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
  <script type="text/javascript">
  function overlay() {
    var el = document.getElementById("overlay");
    el.style.display = (el.style.display == "block") ? "none" : "block";
    var el = document.getElementById("events");
    el.style.display = (el.style.display == "block") ? "none" : "block";
    var el = document.getElementById("eventsBody");
    el.style.display = (el.style.display == "block") ? "none" : "block";
  }
  </script>
  <script language="JavaScript" type="text/javascript">
    function show_details(theId)
    {
      var deets = (theId.id);
      var el = document.getElementById("overlay");
      el.style.display = (el.style.display == "block") ? "none" : "block";
      var el = document.getElementById("events");
      el.style.display = (el.style.display == "block") ? "none" : "block";
      var hr = new XMLHttpRequest();
      var url = "showcalendarevent.php";
      var vars = "deets=" + deets;
      hr.open("POST", url, true);
      hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
          var return_data = hr.responseText;
          document.getElementById('events').innerHTML = return_data;
        }
      }
      hr.send(vars);
      document.getElementById('events').innerHTML = "processing...";
    }
  </script>
</head>
  <header>
    <h1>Event Manager</h1>
  </header>
  <nav>
    <ul>
      <li><a href="main.php">Home</a></li>
      <li><a href="showcalendar.php">Calendar</a></li>
      <li>
        <a href="events.php">Events<span class="caret"></span></a>
        <div>
          <ul>
            <li><a href="events.php#my">My events</a></li>
            <li><a href="events.php#registered">Events I'm in</a></li>
            <li><a href="createevent.php">Create an event</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>
  <body onLoad="initialCalendar();">
  <div id="showCalendar"></div>
  <div id="overlay">
    <div id="events"></div>
  </div>
</body>
</html>
