jQuery(document).ready(function($) {
      $("a").click(function(event) {
           link=$(this).attr("href");
           $.ajax({
                url: link,
           })
           .done(function(html) {
                 $("#mainwindow").empty().append(html);
           })
           .fail(function() {
                console.log("error");
           })
           .always(function() {
                console.log("complete");
           });
           return false;
      });
 });

 function attendevent(eventid)
 {
   var hr = new XMLHttpRequest();
   var url = "attendevent.php";
   var vars = "eventid="+eventid;
   hr.open("POST", url, true);
   hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   hr.onreadystatechange = function() {
     if(hr.readyState == 4 && hr.status == 200) {
       var return_data = hr.responseText;
       document.getElementById("eventinformation").innerHTML = return_data;
     }
   }
   hr.send(vars);
   document.getElementById("eventinformation").innerHTML = "processing...";
 }

 function registerinevent(eventid)
 {
   var hr = new XMLHttpRequest();
   var url = "registerinevent.php";
   var vars = "eventid="+eventid;
   hr.open("POST", url, true);
   hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   hr.onreadystatechange = function() {
     if(hr.readyState == 4 && hr.status == 200) {
       var return_data = hr.responseText;
       document.getElementById("mainwindow").innerHTML = return_data;
     }
   }
   hr.send(vars);
   document.getElementById("mainwindow").innerHTML = "processing...";
 }

 function seeevent(eventid)
 {
   var hr = new XMLHttpRequest();
   var url = "seeevent.php";
   var vars = "eventid="+eventid;
   hr.open("POST", url, true);
   hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   hr.onreadystatechange = function() {
     if(hr.readyState == 4 && hr.status == 200) {
       var return_data = hr.responseText;
       document.getElementById("mainwindow").innerHTML = return_data;
     }
   }
   hr.send(vars);
   document.getElementById("mainwindow").innerHTML = "processing...";
 }
