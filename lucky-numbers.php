<!DOCTYPE html>
<html>
<body>

<?php
#Variables preparation block

/*
Setting a random max number to sieve until it.
Sieving until a fixed number seems kind of bland for demonstration purposes.
Also the Mersenne Twister algorithm is 4 times faster for generating numbers than default rand().
Variable can also be set to any other manually inputted number or other functions with output of integer.
*/
$maxcount = mt_rand(25,500);

#Debugger or rather step display. Activate with "1". Deactivate for clean solution.
$sdisplay = "1";


#$trange is the range of numbers to sieve for lucky numbers.
$trange = range(1, $maxcount, 1);

#$snums for Surving numbers that didn't get sieved/eliminated and won't definitely be iterated over again.
$snums = array();
$snumstep = "0";
$stepd = "0";

#Step display, activate with above option
if ($sdisplay == "1") echo "Generated target-range until $maxcount.<br>Following will be a basic step-to-step display which numbers are left on the array:<br><br>";

#Main function
do {
#Variable of current sieving number, to determine every n-th number to remove. n = $elimstep here.
$elimstep = $trange[$snumstep];
#Because the first step differs from following cycles I had to include a if-statement.
if ($elimstep == "1") $elimstep++;

#Step display, $stepd is increased incrementally with each cycle and $elimnumstep.
if ($sdisplay == "1") {
	++$stepd;
	echo "$stepd ) Eliminate every $elimstep. number:<br><br>";
}

#Determine the first number to delete. In this case the n-th number defined with $elimstep.
$indexpos = $elimstep;

/*
The core command:
From first number to delete with $indexpos to the target number $maxcount, every n-th number defined with $elimnumstep, will be returned with their key as $del and then removed from the array $trange with unset.
*/
foreach (range(--$indexpos, $maxcount, $elimstep) as $del) unset($trange[$del]);
#The result with replace the old $trange
$trange = array_merge($trange);


#Adds the step-size-number eliminated with to the definite lucky numbers pool.
array_push($snums, $trange[$snumstep]);

#Variable for looping, to determine current iteration, almost like $stepd or stepnumber in normal english.
$snumstep++;

#Step display for easy readability, shows one integer per line, ends with subresult
if ($sdisplay == "1") {
	$slist=count($trange);
    for ($x=0;$x<$slist;$x++) echo "$trange[$x]<br>";
	echo "<br>Numbers not to be used in following cycles: ";
    foreach ($snums as $del => $value) echo $value . ", ";
    echo "<br><br>";
}
} while ($trange[$snumstep] <= count($trange));
#Main script ends here, when the size of the next $elimstep will be higher than the current count of array $trange

#Solution display; as there 
if ($sdisplay == "1") echo "Number of next n-th number to delete is higher than the remaining amount of numbers.<br><br><br>";
echo "Lucky numbers until $maxcount are: <br>";
foreach ($trange as $key => $value) echo $value . ", ";

echo "<br><br>Made by Synertry, https://github.com/Synertry/lucky-numbers-calc";
#Made by Synertry, https://github.com/Synertry/lucky-numbers-calc
?>

</body>
</html>
