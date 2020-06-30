<!DOCTYPE html>
<html>
<body>

<?php
#Preparing variables
$array = range(1, 25, 1);
$snums = array();
$maxcount = count($array);
$survivingnum = "0";
$step = "0";

do {
#In-Loop preparation
++$step;
echo "$step ) ";
$elimnumstep = $array[$survivingnum];
if ($elimnumstep == "1")
  $elimnumstep++;
$indexpos = $elimnumstep;

#Needed to compare the array against the old loopthrough
$arrayc = count($array);

echo "Eliminate every $elimnumstep. number:<br>";
foreach (range(--$indexpos, $maxcount, $elimnumstep) as $key) {
  unset($array[$key]);
}
$array = array_merge($array);
$slist=count($array);
for($x=0;$x<$slist;$x++)
  {
  echo "$array[$x] <br>";
  }
array_push($snums, $array[$survivingnum]);

echo "<br>Surving numbers: ";
foreach ($snums as $key => $value) {
            echo $value . ", ";
}
$survivingnum++;
echo "<br><br>";
} while ($arrayc != count($array));
?>

</body>
</html>
