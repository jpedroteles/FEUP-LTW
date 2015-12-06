<?php

$db = new PDO('sqlite:sql.db');
$search = $_POST ['search'];

if( strlen( $search ) <= 1 )
  echo "Search term too short";
else {
  echo "You searched for <b> $search </b> <hr size='1'></ br>";
  $search_exploded = explode(" ", $search);
  $i;
  $idlist;
  $sameid = "FALSE";
  $query1 = $db->query("SELECT * FROM Event WHERE name || startDate || startTime || local || description || type || creator LIKE '%$search%'");
  while($row = $query1->fetch(PDO::FETCH_ASSOC))
  {
    $name = $row[name];
    if (sizeof($idlist) > 0)
    {
      for($j = 0; $j < strlen( $search ); $j++)
      {
        if($idlist[j] == $row[id])
          $sameid = "TRUE";
      }
    }
    if($sameid != "TRUE") {
      echo '<div id = searchresult>'. $name . '</br> <hr>';
      $idlist .= $row[id];
    }
    else {
      $sameid = "FALSE";
    }
  }

  for($i = 0; $i < sizeof($search_exploded);$i++)
  {
    $query2 = $db->query("SELECT * FROM Event WHERE name || startDate || startTime || local || description || type || creator LIKE '%$search_exploded[$i]%'");
    while($row = $query2->fetch(PDO::FETCH_ASSOC))
    {
      $name = $row[name];
      if (sizeof($idlist) > 0)
      {
        for($k = 0; $k < strlen( $search ); $k++)
        {
          if($idlist[$k] == $row[id]) {
            $sameid = "TRUE";
          }
        }
      }
      if($sameid != "TRUE") {
        echo '<div id = searchresult>' . $name . '</br> <hr>';
        $idlist .= $row[id];
      }
      else {
        $sameid = "FALSE";
      }
    }
  }

}

?>
