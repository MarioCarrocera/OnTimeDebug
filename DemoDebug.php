<?php

ini_set('display_errors', true);
error_reporting(E_ERROR | E_PARSE | E_NOTICE | E_WARNING);

$base='ontime/';
$AdminPassword='OT2021Free';
include_once($base."OnTime.php");
$demo=new OnTime();

echo "**********+++++++++++ <br> Debug Demo <br> **********+++++++++++ <br> <br>";
$demo->Connect('admin',$AdminPassword);

echo "**********+++++++++++ <br> start debug with default, system, disk <br> **********+++++++++++ <br> <br>";
$demo->DbgStr();
echo  "<br>";$demo->ot_error("Start!!!");echo "<br>";
$demo->DiscConnect();
$demo->Connect('admix',$AdminPassword);
$demo->Connect('admin',$AdminPassword);
echo "**********+++++++++++ <br> stop debug <br> **********+++++++++++ <br> <br>";
echo "DbgStr() ";
$demo->DbgStp();
echo  "<br>";$demo->ot_error("Stop!!!");echo "<br>";
echo "**********+++++++++++ <br> Show logs <br> **********+++++++++++ <br> <br>";
echo "DbgShw('') ";
$tmp=$demo->DbgShw();
$demo->ot_show($demo->DbgShw());
echo "**********+++++++++++ <br> Show 1rst log <br> **********+++++++++++ <br> <br>";
echo "DbgShwLog('".$tmp[1]."') ";
$demo->ot_show($demo->DbgShwLog($tmp[1]));
echo "**********+++++++++++ <br> Delete 1rst log <br> **********+++++++++++ <br> <br>";
echo "DbgDltLog('".$tmp[1]."') ";
$demo->DbgDltLog($tmp[1]);

echo "**********+++++++++++ <br> start debug with user, disk <br> **********+++++++++++ <br> <br>";
echo "DbgForUsr() ";
$demo->DbgForUsr();
echo  "<br>";$demo->ot_error("Start!!!");echo "<br>";
echo "DbgStr() ";
$demo->DbgStr();
echo  "<br>";$demo->ot_error("Start!!!");echo "<br>";
$demo->DiscConnect();
$demo->Connect('admix',$AdminPassword);
$demo->Connect('admin',$AdminPassword);
echo "**********+++++++++++ <br> stop debug <br> **********+++++++++++ <br> <br>";
echo "DbgStr() ";
$demo->DbgStp();
echo  "<br>";$demo->ot_error("Stop!!!");echo "<br>";
echo "**********+++++++++++ <br> Show logs <br> **********+++++++++++ <br> <br>";
echo "DbgShw('') ";
$tmp=$demo->DbgShw();
$demo->ot_show($demo->DbgShw());
echo "**********+++++++++++ <br> Show 1rst log <br> **********+++++++++++ <br> <br>";
echo "DbgShwLog('".$tmp[1]."') ";
$demo->ot_show($demo->DbgShwLog($tmp[1]));
echo "**********+++++++++++ <br> delete  all log <br> **********+++++++++++ <br> <br>";
echo "DbgClrLog() ";
$demo->ot_show($demo->DbgClrLog());
echo "**********+++++++++++ <br> start debug with advanced, user, disk <br> **********+++++++++++ <br> <br>";
echo "DbgMdeAdv() ";
$demo->DbgMdeAdv();
echo  "<br>";$demo->ot_error("Start!!!");echo "<br>";
echo "DbgStr() ";
$demo->DbgStr();
echo  "<br>";$demo->ot_error("Start!!!");echo "<br>";
$demo->DiscConnect();
$demo->Connect('admix',$AdminPassword);
$demo->Connect('admin',$AdminPassword);
echo "**********+++++++++++ <br> stop debug <br> **********+++++++++++ <br> <br>";
echo "DbgStr() ";
$demo->DbgStp();
echo  "<br>";$demo->ot_error("Stop!!!");echo "<br>";
echo "**********+++++++++++ <br> Show logs <br> **********+++++++++++ <br> <br>";
echo "DbgShw('') ";
$tmp=$demo->DbgShw();
$demo->ot_show($demo->DbgShw());
echo "**********+++++++++++ <br> Show 1rst log <br> **********+++++++++++ <br> <br>";
echo "DbgShwLog('".$tmp[1]."') ";
$demo->ot_show($demo->DbgShwLog($tmp[1]));
echo "**********+++++++++++ <br> delete  all log <br> **********+++++++++++ <br> <br>";
echo "DbgClrLog() ";
$demo->ot_show($demo->DbgClrLog());
echo "**********+++++++++++ <br> start debug to screen with advanced, user <br> **********+++++++++++ <br> <br>";
echo "DbgToScr() ";
$demo->DbgToScr();
echo  "<br>";$demo->ot_error("Start!!!");echo "<br>";
echo "DbgStr() ";
$demo->DbgStr();
echo  "<br>";$demo->ot_error("Start!!!");echo "<br>";
$demo->DiscConnect();
$demo->Connect('admix',$AdminPassword);
$demo->Connect('admin',$AdminPassword);
echo "**********+++++++++++ <br> stop debug <br> **********+++++++++++ <br> <br>";
echo "DbgStr() ";
$demo->DbgStp();
echo  "<br>";$demo->ot_error("Stop!!!");echo "<br>";

echo "**********+++++++++++ <br> start debug to memory with advanced, user <br> **********+++++++++++ <br> <br>";
echo "DbgToMmr() ";
$demo->DbgToMmr();
echo  "<br>";$demo->ot_error("Start!!!");echo "<br>";
echo "DbgStr() ";
$demo->DbgStr();
echo  "<br>";$demo->ot_error("Start!!!");echo "<br>";
$demo->DiscConnect();
$demo->Connect('admix',$AdminPassword);
$demo->Connect('admin',$AdminPassword);


echo "**********+++++++++++ <br> show memory  <br> **********+++++++++++ <br> <br>";
echo "Debughold ";
$demo->ot_show($demo->Debughold);

echo "**********+++++++++++ <br> stop debug <br> **********+++++++++++ <br> <br>";
echo "DbgStr() ";
$demo->DbgStp();
echo  "<br>";$demo->ot_error("Stop!!!");echo "<br>";


echo "**********+++++++++++ <br> start debug of errors<br> **********+++++++++++ <br> <br>";
echo "DbgErrOn() ";
$demo->DbgErrOn();
echo  "<br>";$demo->ot_error("Start!!!");echo "<br>";
$demo->DiscConnect();
$demo->Connect('admix',$AdminPassword);
$demo->Connect('admin',$AdminPassword);
echo "**********+++++++++++ <br> stop debug error <br> **********+++++++++++ <br> <br>";
echo "DbgErrOff() ";
$demo->DbgErrOff();
echo  "<br>";$demo->ot_error("Stop!!!");echo "<br>";
echo "**********+++++++++++ <br> Show logs <br> **********+++++++++++ <br> <br>";
echo "DbgShw('') ";
$tmp=$demo->DbgShw();
$demo->ot_show($demo->DbgShw());
echo "**********+++++++++++ <br> Show 1rst log <br> **********+++++++++++ <br> <br>";
echo "DbgShwLog('".$tmp[1]."') ";
$demo->ot_show($demo->DbgShwLog($tmp[1]));
echo "**********+++++++++++ <br> delete  all log <br> **********+++++++++++ <br> <br>";
echo "DbgClrLog() ";
$demo->ot_show($demo->DbgClrLog());





echo "**********+++++++++++ <br> Demo Finish<br> **********+++++++++++ <br> <br>";

?>