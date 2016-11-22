<?php
include_once 'dbConnection.php';
session_start();
$email=$_SESSION['email'];


//delete user
 
if(@$_GET['demail']) {
$demail=@$_GET['demail'];

$r2 = mysqli_query($con,"DELETE FROM history WHERE email='$demail' ") or die('Error');
$result = mysqli_query($con,"DELETE FROM user WHERE email='$demail' ") or die('Error');
header("location:dash.php?q=1");
}
 
//remove quiz
 
if(@$_GET['q']== 'rmquiz') {
$eid=@$_GET['eid'];
$result = mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
	$qid = $row['qid'];
$r1 = mysqli_query($con,"DELETE FROM options WHERE qid='$qid'") or die('Error');
$r2 = mysqli_query($con,"DELETE FROM answer WHERE qid='$qid' ") or die('Error');
}
$r3 = mysqli_query($con,"DELETE FROM questions WHERE eid='$eid' ") or die('Error');
$r4 = mysqli_query($con,"DELETE FROM quiz WHERE eid='$eid' ") or die('Error');
$r4 = mysqli_query($con,"DELETE FROM history WHERE eid='$eid' ") or die('Error');

header("location:dash.php?q=5");
}
 

 

if(@$_GET['q']== 'addquiz' ) {
$name = $_POST['name'];
$name= ucwords(strtolower($name));
$total = $_POST['total'];
$sahi = $_POST['right'];
$wrong = $_POST['wrong'];
$time = $_POST['time'];
$tag = $_POST['tag'];
$desc = $_POST['desc'];

$id=uniqid();
$q3=mysqli_query($con,"INSERT INTO quiz VALUES  ('$id','$name' , '$sahi' , '$wrong','$total','$time' ,'$desc','$tag', NOW())") or die('Error64');
 
header("location:dash.php?q=4&step=2&eid=$id&n=$total");
}


//add question
 
if(@$_GET['q']== 'addqns') {
$n=@$_GET['n'];
$eid=@$_GET['eid'];
$ch=@$_GET['ch'];
 
    
    
for($i=1;$i<=$n;$i++)
 {
   $type=$_POST['dropdown'.$i];
   //echo $type;
  $level=$_POST['dropdown2'.$i];
 // echo $level;;
    $qid=uniqid();
 $qns=$_POST['qns'.$i];
$q3=mysqli_query($con,"INSERT INTO questions VALUES('$eid','$qid','$qns','$ch','$i','$type','$level')") or die('Error65');
  $oaid=uniqid();
  $obid=uniqid();
$ocid=uniqid();
$odid=uniqid();
$a=$_POST[$i.'1'];
$b=$_POST[$i.'2'];
$c=$_POST[$i.'3'];
$d=$_POST[$i.'4'];
$qa=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$a','$oaid')") or die('Error61');
$qb=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$b','$obid')") or die('Error62');
$qc=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$c','$ocid')") or die('Error63');
$qd=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$d','$odid')") or die('Error64');
$e=$_POST['ans'.$i];
switch($e)
{
case 'a':
$ansid=$oaid;
break;
case 'b':
$ansid=$obid;
break;
case 'c':
$ansid=$ocid;
break;
case 'd':
$ansid=$odid;
break;
default:
$ansid=$oaid;
}


$qans=mysqli_query($con,"INSERT INTO answer VALUES  ('$qid','$ansid')");

 }
header("location:dash.php?q=0");
}
 

//quiz start
if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) {
$eid=@$_GET['eid'];
$sn=@$_GET['n'];
$total=@$_GET['t'];
$ans=$_POST['ans'];
$qid=@$_GET['qid'];
$q=mysqli_query($con,"SELECT * FROM answer WHERE qid='$qid' " );
while($row=mysqli_fetch_array($q) )
{
$ansid=$row['ansid'];
}
if($ans == $ansid)
{
$q=mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid' " );
while($row=mysqli_fetch_array($q) )
{
$sahi=$row['sahi'];
}
if($sn == 1)
{
$q=mysqli_query($con,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW())")or die('Error');
}
$q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' ")or die('Error115');

while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$r=$row['sahi'];
}
$r++;
$s=$s+$sahi;
$q=mysqli_query($con,"UPDATE `history` SET `score`=$s,`level`=$sn,`sahi`=$r, date= NOW()  WHERE  email = '$email' AND eid = '$eid'")or die('Error124');

} 
else
{
$q=mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid' " )or die('Error129');

while($row=mysqli_fetch_array($q) )
{
$wrong=$row['wrong'];
}
if($sn == 1)
{
$q=mysqli_query($con,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW() )")or die('Error137');
}
$q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error139');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$w=$row['wrong'];
}
$w++;
$s=$s-$wrong;
$q=mysqli_query($con,"UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w, date=NOW() WHERE  email = '$email' AND eid = '$eid'")or die('Error147');
}
if($sn != $total)
{
$sn++;
header("location:account.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total")or die('Error152');
}
else if( $_SESSION['key']!='vic7785068889')
{
$q=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error156');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
}
$q=mysqli_query($con,"SELECT * FROM rank WHERE email='$email'" )or die('Error161');
$rowcount=mysqli_num_rows($q);
if($rowcount == 0)
{
$q2=mysqli_query($con,"INSERT INTO rank VALUES('$email','$s',NOW())")or die('Error165');
}
else
{
while($row=mysqli_fetch_array($q) )
{
$sun=$row['score'];
}
$sun=$s+$sun;
$q=mysqli_query($con,"UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'")or die('Error174');
}
header("location:account.php?q=result&eid=$eid");
}
else
{
header("location:account.php?q=result&eid=$eid");
}
}

//restart quiz
if(@$_GET['q']== 'quizre' && @$_GET['step']== 25 ) {
$eid=@$_GET['eid'];
$n=@$_GET['n'];
$t=@$_GET['t'];
$q=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error156');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
}
$q=mysqli_query($con,"DELETE FROM `history` WHERE eid='$eid' AND email='$email' " )or die('Error184');
//$q=mysqli_query($con,"SELECT * FROM rank WHERE email='$email'" )or die('Error161');
//while($row=mysqli_fetch_array($q) )
//{
//$sun=$row['score'];
//}
//$sun=$sun-$s;
//$q=mysqli_query($con,"UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'")or die('Error174');
header("location:account.php?q=quiz&step=2&eid=$eid&n=1&t=$t");
}

///admudshbvjchdk.sbld
 
if(@$_GET['q']=='ADDQ') {
    
if(isset($_POST['Submit']))
{
    
    $Type=$_POST['dropdown'];
    $level=$_POST['dropdown2'];
    $qns=$_POST['qns'];   
    $Qption_A=$_POST['optionA']; 
    $Qption_B=$_POST['optionB']; 
    $Qption_C=$_POST['optionC']; 
    $Qption_D=$_POST['optionD']; 
    $eid='5589222f16b93';
    $qid=uniqid();
 
$q3=mysqli_query($con,"INSERT INTO questions VALUES('$eid','$qid','$qns','4',0,'$Type','$level')") or die('Error65');
     
  $oaid=uniqid();
  $obid=uniqid();
$ocid=uniqid();
$odid=uniqid();
$a=$_POST['optionA'];
$b=$_POST['optionB'];
$c=$_POST['optionC'];
$d=$_POST['optionD'];
     
$qa=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$a','$oaid')") or die('Error61');
$qb=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$b','$obid')") or die('Error62');
$qc=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$c','$ocid')") or die('Error63');
$qd=mysqli_query($con,"INSERT INTO options VALUES  ('$qid','$d','$odid')") or die('Error64');
$e=$_POST['ans'];
     
switch($e)
{
case 'a':
$ansid=$oaid;
break;
case 'b':
$ansid=$obid;
break;
case 'c':
$ansid=$ocid;
break;
case 'd':
$ansid=$odid;
break;
default:
$ansid=$oaid;
}


$qans=mysqli_query($con,"INSERT INTO answer VALUES  ('$qid','$ansid')") or die('Error64');;
 
header("location:dash.php?q=7");
}
}
if(isset($_REQUEST['delete']) )
{
   $id=$_REQUEST['delete'];
   
    $sql=mysqli_query($con,"delete from questions where qid='$id'")or die('Error61');
     
     $sql=mysqli_query($con,"delete from answer where qid='$id'")or die('Error61');
     $sql=mysqli_query($con,"delete from options where qid='$id'")or die('Error61');
    header("location:dash.php?q=7");
}
if(isset($_REQUEST['edit']) )
{
    $id=$_REQUEST['edit'];
    $sql="seclect * from php where Question_id=$id";
    $query=mysqli_query($con,$sql);
     $row_data=mysqli_fetch_row($query);
    echo ' <div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Update Question Details</b></span><br /><br />

 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=ADDQ" method="POST">
<fieldset>
';
 
 
echo ' 
<b>Question Database</b>:<br />
<div class="form-group">
  <label class="col-md-12 control-label" for="1"></label>  
  <div class="col-md-12">
  <select name="dropdown" class="form-control input-md" value="$row_data[0]">
         
        <option value="PHP">Php</option>
                <option value="HTML">HTML</option>        
        <option value="JAVASCRIPT">JAVASCRIPT</option>
        </select>
    
  </div>
</div>
<b>Level</b>:<br />
<div class="form-group">
  <label class="col-md-12 control-label" for="1"></label>  
  <div class="col-md-12">
  <select name="dropdown2" class="form-control input-md">
         
        <option value="level1">Level_1</option>
                <option value="level2">Level_2</option>        
        <option value="level3">Level_3</option>
        </select>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="qns"></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns" class="form-control" placeholder="Write question     here..."></textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="1"></label>  
  <div class="col-md-12">
  <input id="optionA" name="optionA" placeholder="Enter option a" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="2"></label>  
  <div class="col-md-12">
  <input id="optionB" name="optionB" placeholder="Enter option b" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="3"></label>  
  <div class="col-md-12">
  <input id="optionC" name="optionC" placeholder="Enter option c" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="4"></label>  
  <div class="col-md-12">
  <input id="optionD" name="optionD" placeholder="Enter option d" class="form-control input-md" type="text">
    
  </div>
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans" name="ans" placeholder="Choose correct answer " class="form-control input-md" >
   <option value="a">Select answer for question</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br />'; 
  
    
echo '<div class="form-group">
  <label class="col-md-12 control-label"></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" name="Submit" class="btn btn-primary"/></br></br>
  </div>
</div>

</fieldset>
</form></div>';

    //header("location:dash.php?q=7");
}
/*if(isset($_REQUEST['ADDU']) ){
     $id=$_REQUEST['ADDU'];
     
if(isset($_POST['Submit']))
{
    
   //echo $id;
 $Type=$_POST['dropdown'];
  $level=$_POST['dropdown2'];
  $Question=$_POST['qns'];   
   $Qption_A=$_POST['optionA']; 
   $Qption_B=$_POST['optionB']; 
   $Qption_C=$_POST['optionC']; 
   $Qption_D=$_POST['optionD'];  
   $Correct=$_POST['ans']; 
    $Correct_Answer='';
        if($Correct=='A'){
            $Correct_Answer='A) '.$Qption_A;
        }
        else if($Correct=='B'){
            $Correct_Answer='B) '.$Qption_B;
        }
        else if($Correct=='C'){
            $Correct_Answer='C) '.$Qption_C;
        }
        else if($Correct=='D'){
            $Correct_Answer='D) '.$Qption_D;
        }
    $cdk= mysqli_query($con,"UPDATE php set Type='$Type',Level='$level',Question='$Question',Option_A='$Qption_A',Option_B='$Qption_B',Option_C='$Qption_C',Option_D='$Qption_D',Correct_Answer='$Correct_Answer' where Question_id=$id");
  if($cdk)
      echo "true";
header("location:dash.php?q=7");
}
}*/
if(isset($_REQUEST['ADDU']) ){
     $id=$_REQUEST['ADDU'];
     
if(isset($_POST['Submit']))
{
    $optid1=$_REQUEST['optid1'];
    $optid2=$_REQUEST['optid2'];
    $optid3=$_REQUEST['optid3'];
    $optid4=$_REQUEST['optid4'];
    $Type=$_POST['dropdown'];
    $level=$_POST['dropdown2'];
    $qns=$_POST['qns'];   
    $Qption_A=$_POST['optionA']; 
     
    $Qption_B=$_POST['optionB']; 
    $Qption_C=$_POST['optionC']; 
    $Qption_D=$_POST['optionD']; 
   // $eid='5589222f16b93';
    $qid=uniqid();
 
$q3=mysqli_query($con,"update questions set  Type='$Type',Level='$level',qns='$qns' where qid='$id'") or die('Error61');
    $q4=mysqli_query($con,"update options set  option='$Qption_A' where qid='$id' and optionid='$optid1'") or die('Error64');
    $q5=mysqli_query($con,"update options set  option='$Qption_B' where qid='$id' and optionid='$optid2'") or die('Error65');
    $q6=mysqli_query($con,"update options set  option='$Qption_C' where qid='$id' and optionid='$optid3'") or die('Error66');
    $q7=mysqli_query($con,"update options set  option='$Qption_D' where qid='$id' and optionid='$optid4'") or die('Error67');
$e=$_POST['ans'];
switch($e)
{
case 'A':
$ansid=$optid1;
break;
case 'B':
$ansid=$optid2;
break;
case 'C':
$ansid=$optid3;
break;
case 'D':
$ansid=$optid4;
break;
default:
$ansid=$optid1;
}


$qans=mysqli_query($con,"update answer set ansid='$ansid' where qid='$id'");
 
header("location:dash.php?q=7");
}
}

?>



