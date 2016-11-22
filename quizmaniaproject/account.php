<!DOCTYPE>
<html >
<head>
 <title>QUIZMANIA </title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
     <link rel="stylesheet" href="css/chart.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/account.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"  type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

 
<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
      
 
</head>
 

<body>
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">QUIZMANIA</span></div>
<div class="col-md-4 col-md-offset-2">
 <?php
 include_once 'dbConnection.php';
session_start();
  if(!(isset($_SESSION['email']))){
header("location:index.php");

}
else
{
$name = $_SESSION['name'];
$email=$_SESSION['email'];

include "dbConnection.php";
echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="account.php?q=1" class="log log1">'.$name.'</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
}?>
</div>
</div></div>
<div class="bg">

<!--navigation menu-->
<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(@$_GET['q']==1) echo'class="active"'; ?> ><a href="account.php?q=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home<span class="sr-only">(current)</span></a></li>
        <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="account.php?q=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;History</a></li>
        <li <?php if(@$_GET['q']==4)echo'class="active"'; ?>><a href="account.php?q=4"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;Profile</a></li>
		<li <?php if(@$_GET['q']==5)echo'class="active"'; ?>><a href="account.php?q=5"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>&nbsp;Practice</a></li>
          <li <?php if(@$_GET['q']==6)echo'class="active"'; ?>><a href="account.php?q=6"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>&nbsp;Performance chart</a></li>
		
		
		</ul>
            
      </div> 
  </div> 
</nav> 
   
    </div>
   
<div class="container"> 
<div class="row">
<div class="col-md-12">
    <?php if(@$_GET['q']==1) {

$result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$sahi = $row['sahi'];
    $time = $row['time'];
	$eid = $row['eid'];
$q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" );
$rowcount=mysqli_num_rows($q12);	
if($rowcount == 0){
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="account.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:#99cc32"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a></b></td></tr>';
}
else
{
echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="update.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Restart</b></span></a></b></td></tr>';
}
}
$c=0;
echo '</table></div>';

}?>
 
 <?php
if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) {
    
$eid=@$_GET['eid'];
$sn=@$_GET['n'];
$total=@$_GET['t'];
$q=mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' " );
echo '<div class="panel" style="margin:5%">';
while($row=mysqli_fetch_array($q) )
{
$qns=$row['qns'];
$qid=$row['qid'];
echo '<b>Question &nbsp;'.$sn.'&nbsp;::<br />'.$qns.'</b><br /><br />';
}
$q=mysqli_query($con,"SELECT * FROM options WHERE qid='$qid' " );
echo '<form action="update.php?q=quiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST"  class="form-horizontal">
<br />';

while($row=mysqli_fetch_array($q) )
{
$option=$row['option'];
$optionid=$row['optionid'];
echo'<input type="radio" name="ans" value="'.$optionid.'">'.$option.'<br /><br />';
}
echo'<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button></form></div>';
 
}
 //result
if(@$_GET['q']== 'result' && @$_GET['eid']) 
{
$eid=@$_GET['eid'];
$q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error157');
echo  '<div class="panel">
<center><h1 class="title" style="color:#660033">Result</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$w=$row['wrong'];
$r=$row['sahi'];
$qa=$row['level'];
echo '<tr style="color:#66CCFF"><td>Total Questions</td><td>'.$qa.'</td></tr>
      <tr style="color:#99cc32"><td>right Answer&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>'.$r.'</td></tr> 
	  <tr style="color:red"><td>Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>'.$w.'</td></tr>
	  <tr style="color:#66CCFF"><td>Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
}
   // header("Location:account.php?q=9&s=$s&eid=$eid");
       $email=$_SESSION['email'];
        $sql3="select * from result_graph where eid='$eid' and email='$email'"or die('pahila hi galt aa');
        $query4=mysqli_query($con,$sql3);
        $row1=mysqli_fetch_row($query4);
        if($row1){
           // echo "inside it";
            $purane_no=$row1[2];
            $purana_total=$row1[3];
             $nid=("select * from quiz where eid='$eid'") or die('result ni chalya da');
             $rs1 =mysqli_query($con,$nid);
             $row= mysqli_fetch_row($rs1);
            $right_marks=$row[2];
           $total_ques=$row[4];
           
            $total_marks=$right_marks*$total_ques;
            $nayatotal_marks=$purana_total+$total_marks;
            $naye_no=$purane_no+$s;
            if($naye_no<0){
             $percen_marks=0;
           }
    else{
    
    $percen_marks=($naye_no/$nayatotal_marks);
        $percen_marks=$percen_marks*100;
    }
          $sql23=mysqli_query($con,"update result_graph set marks='$naye_no',total='$nayatotal_marks',percentage='$percen_marks' where eid='$eid'" )or die('Error208');
            
        }
        else{
            
     $nid=("select * from quiz where eid='$eid'") or die('result ni chalya da');
      $rs1 =mysqli_query($con,$nid);
    $row= mysqli_fetch_row($rs1);
    $right_marks=$row[2];
    $total_ques=$row[4];
    $total_marks=$right_marks*$total_ques;
    if($s<0){
        $percen_marks=0;
    }
    else{
    $percen_marks=($s/$total_marks);
        $percen_marks=$percen_marks*100;
    }
            
         
            
        $sql3=mysqli_query($con,"insert into result_graph (eid,email,marks,total,percentage) values('$eid','$email','$s','$total_marks','$percen_marks')") or die('resutl graph me store ni ho raha hai bhai');
    }
    
//$q=mysqli_query($con,"SELECT * FROM rank WHERE  email='$email' " )or die('Error157');
//while($row=mysqli_fetch_array($q) )
//{
//$s=$row['score'];
//echo '<tr style="color:#990000"><td>Overall Score&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
//}
echo '</table></div>';
    

}
     
?>
<!--quiz end-->
 <?php
//history start
if(@$_GET['q']== 2) 
{
$q=mysqli_query($con,"SELECT * FROM history WHERE email='$email' ORDER BY date DESC " )or die('Error197');
echo  '<div class="panel title">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>S.N.</b></td><td><b>Quiz</b></td><td><b>Question Solved</b></td><td><b>Right</b></td><td><b>Wrong<b></td><td><b>Score</b></td>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
$eid=$row['eid'];
$s=$row['score'];
$w=$row['wrong'];
$r=$row['sahi'];
$qa=$row['level'];
$q23=mysqli_query($con,"SELECT title FROM quiz WHERE  eid='$eid' " )or die('Error208');
while($row=mysqli_fetch_array($q23) )
{
$title=$row['title'];
}
$c++;
echo '<tr><td>'.$c.'</td><td>'.$title.'</td><td>'.$qa.'</td><td>'.$r.'</td><td>'.$w.'</td><td>'.$s.'</td></tr>';
}
echo'</table></div>';
}
?>
 
 
 
 
  <?php
     if(@$_GET['q']== 4) 
{
         $email=$_SESSION['email'];
 
    $sql1= "select * from user where email='$email'";
	 
	 $rs1 =mysqli_query($con,$sql1);
    $row= mysqli_fetch_row($rs1);
    
	if($row){
	       echo"<div align='center'>";
	echo "<table width=80% height='300px' class='table table-hover'  >";
	
	echo "<tr><td><b>Name</b></td><td>$row[0]</td></tr>";
	echo "<tr><td><b>Gender</b></td><td>$row[1]</td></tr>";
	echo "<tr><td><b>College</b></td><td> $row[2] </td></tr>";
	 echo "<tr><td><b>Email</b></td><td> $row[3] </td></tr>";
        echo "<tr><td><b>Mobile</b></td><td> $row[4] </td></tr>";
		 echo "<tr><td><a href='account.php?act1' class='a1'><input type='button' class='btn btn-primary but' value='Edit'></a></td> <td><a href='account.php?act2' class='a1'>&nbsp<input type='button' class='btn btn-warning but1' value='Change password'/></a></td></tr>";
	echo"</table>";
	echo "</form>";
        echo "</div>";
    }
         
	 
}
    if(isset($_REQUEST['act1']))
	{
		 
		$email=$_SESSION['email'];
 
    $sql1= "select * from user where email='$email'";
	 
	 $rs1 =mysqli_query($con,$sql1);
    $row= mysqli_fetch_row($rs1);
 echo'   <script>
function validate(){
    
    var letters = /^[A-Za-z ]+$/;
	var number=/^\d{10}$/
	var y =document.forms["form2"]["name"].value;
	if (y == null || y.trim().length == "")
		{
			alert("Name must be filled out.");
			return false;
			}
	else if(!y.match(letters)){alert("Name must be filled out correctly."); return false;}
	
	var z =document.forms["form2"]["college"].value;if (z == null || z.trim().length == "") {alert("college must be filled out.");return false;}else if(!z.match(letters)){alert("College must be filled out correctly."); return false;}
	
	var m=document.forms["form2"]["mob"].value;
	if (m == null || m.trim().length == "")
		{
			alert("Mobile must be filled out.");
			return false;
			}
	else if(!m.match(number)){alert("Mobile must be filled out correctly."); return false;}
    
    
    var m=confirm("Are You Sure?");
    if(m==false){
    window.location.reload();
    return false;
    }
}


</script>';
	if($row){
    echo"<div align='center'>";
	echo "<form  name='form2' action='account.php?act7'  method='post'  onsubmit='return validate()'>";
	echo "<table width=80% height='300px' class='table' >";
    echo "<tr><td><b>Name</b></td><td><input type='text' name='name' id='name' value='$row[0]'/></td></tr>";
	echo "<tr><td><b>College</b></td><td><input type='text' name='college' id='college' value='$row[2]'/></td></tr>";
	echo "<tr><td><b>Mobile</b></td><td><input type='text' name='mob' id='mob' value='$row[4]'/></td></tr>";
    echo "<tr><td><input type='submit' class='btn btn-warning but' value='update'/></td><td><a href='account.php?q=1'><input type='button' class='btn btn-primary but' value='cancel'/></a></td></tr>";
	echo"</table>";
	echo "</form>";
    echo "</div>";
	}
    }
    else if(isset($_REQUEST['act7']))
	{
        $email=$_SESSION['email'];
		$name=$_POST['name'];
		$college=$_POST['college'];
		$mobile=$_POST['mob'];
		$sql="update user set    name='$name', college='$college', mob='$mobile' where email='$email'";
		$query=mysqli_query($con,$sql);
		if($query)
		{
			
			header("Location:account.php?q=4");
			 
		}
		else
		{
			echo "error<br/>$sql";
		}
	}
    else if(isset($_REQUEST['act2']))
	{
		 if(isset($_POST['Change'])){
		 $Username=$_SESSION['email'];
         $Password=$_POST['Password'];
         $newpass=$_POST['PasswordRN'];
             
        $Password = md5($Password);
             $newpass = md5($newpass);
	 $sql="select * from user where email='$Username'";
	 
	$rs = mysqli_query($con,$sql);
    $row=mysqli_fetch_row($rs); 
    
	if($row){
	       $sql2= "select * from  user where password='$Password' and email='$Username'";  
           $rs2 = mysqli_query($con,$sql2);
           $row2=mysqli_fetch_row($rs2);
           if($row2){
               $sql3=mysqli_query($con,"UPDATE user SET password = '$newpass' WHERE email  = '$Username'");
                   
             if($sql3)
                   echo "<script> alert('Password changed')</script>";
               
               else
                   echo "<script> alert('Query failed')</script>";
                    
           }
           else 
               echo "<script> alert('Invalid Password')</script>";
            
      
	}
         }
          include"changepassword_main.php";
    }
    if(@$_GET['q']== 5) 
{
    echo  '<div class="panel"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Levels</b></td><td></td><td></td></tr>';
        echo '<tr><td> 1) &nbsp</td><td><b>Php</b></td><td><a href="account.php?qpp=6a" class="a2">Level_1</a></td><td><a href="account.php?qpp=6b" class="a2">Level_2</a></td><td><a href="account.php?qpp=6c" class="a2">Level_3</a></td><tr>';
         echo '<tr><td> 2) &nbsp</td><td><b>Html</b></td><td><a href="account.php?qpp=7a" class="a2">Level_1</a></td><td><a href="account.php?qpp=7b" class="a2">Level_2</a></td><td><a href="account.php?qpp=7c" class="a2">Level_3</a></td><tr>';
         echo '<tr><td> 3) &nbsp</td><td><b>Javascript</b></td><td><a  href="account.php?qpp=8a" class="a2">Level_1</a></td><td><a href="account.php?qpp=8b" class="a2">Level_2</a></td><td><a href="account.php?qpp=8c" class="a2">Level_3</a></td><tr>';
        
    }
         $qno=1;   

    if(isset($_REQUEST['qpp']) )
{ 
     $qno=1;
    $type='';
    $level='';    
    $id=$_REQUEST['qpp'];
    if($id=='6a' || $id=='6b'||$id=='6c'){
        $type='PHP';
        if($id=='6a'){
            $level='level1';
        }
        else if($id=='6b'){
            $level='level2';
        }
        else if($id=='6c'){
            $level='level3';
        }
        
    }
    else if($id=='7a' || $id=='7b'||$id=='7c'){
        $type='HTML';
        if($id=='7a'){
            $level='level1';
        }
        else if($id=='7b'){
            $level='level2';
        }
        else if($id=='7c'){
            $level='level3';
        }
    }
    else if($id=='8a' || $id=='8b'||$id=='8c'){
        $type='JAVASCRIPT';
        if($id=='8a'){
            $level='level1';
        }
        else if($id=='8b'){
            $level='level2';
        }
        else if($id=='8c'){
            $level='level3';
        }
    }
        
         echo '<div class="panel" style="margin:5%">';
       
         echo "<h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b>Topic :".$type."&nbsp&nbsp&nbsp&nbspLevel :".$level."</b> </h4><br> ";
         $sql1="select * from questions where Level='$level' and Type='$type'";
         $query1=mysqli_query($con,$sql1);
        $total_rows=mysqli_num_rows($query1);
    // echo "total_rows=$total_rows<br/>";
        $limit=5;
     if(isset($_REQUEST['pageno']))
    {
	$pageno=$_REQUEST['pageno'];
        $qno=$pageno*$limit+1;
    }
    else
    {
    $pageno=0;
        $qno=1;
    }

$offset=$pageno*$limit;
$total_pages=$total_rows/$limit;
                                                                              
$sql="select * from questions where Level='$level' and Type='$type' limit $offset,$limit ";
 
 
$query=mysqli_query($con,$sql);
        $option1='';
        $option2='';
        $option3='';
        $option4='';
        $ansid1='';
         $ansid2='';
         $ansid3='';
         $ansid4='';
while($row_data=mysqli_fetch_array($query))
{
    $qid=$row_data[1];
    $sql1="select * from options where qid='$qid'";
    $query11=mysqli_query($con,$sql1);
    $i=1;
    while($option_data1=mysqli_fetch_array($query11)){
        if($i==1){
               $option1=$option_data1[1];
            $ansid1=$option_data1[2];
                }
            if($i==2){
               $option2=$option_data1[1];
                $ansid2=$option_data1[2];
           }
            if($i==3){
               $option3=$option_data1[1];
               $ansid3=$option_data1[2];
           }
            if($i==4){
               $option4=$option_data1[1];
                $ansid4=$option_data1[2];
           }
             
           $i++;
    }
    $sql2="select * from answer where qid='$qid'";
    $query12=mysqli_query($con,$sql2);
    $r_d=mysqli_fetch_row($query12);
    if($ansid1==$r_d[1] ){
                $answer=$ansid1;
           }
           else if($ansid2==$r_d[1] ){
                $answer=$ansid2;
           }
            else if($ansid3==$r_d[1] ){
                $answer=$ansid3;
           }
             else if($ansid4==$r_d[1] ){
                $answer=$ansid4;
           }
    $sql4= "select * from options where qid='$qid'"; 
        $query4=mysqli_query($con,$sql4);
       $actual_ans='';
       $j=1;
       while($row_d=mysqli_fetch_array($query4)){
           if($answer==$row_d[2]){
              $actual_ans=$row_d[1];   
           } 
           $j++;
       }    
    
   echo"<div class='prac_ques'>";
    echo "<div class='prac_ques2'>";
echo "<br><h4><b> Question : ".$qno."</b></h4>";
    $qno++;
    
echo "<p class='qu' ><b>&nbsp&nbsp".$row_data[2]."</b></p>";
    echo "<p class='ques'>&nbsp&nbspA&nbsp&nbsp".$option1."</p>";
    echo "<p class='ques'>&nbsp&nbspB&nbsp&nbsp".$option2."</p>";
    echo "<p class='ques'>&nbsp&nbspC&nbsp&nbsp".$option3."</p>";  
    echo "<p class='ques'>&nbsp&nbspD&nbsp&nbsp".$option4."</p>";
    echo "<input type='button' id='#hide' value='Answer' name='answer' class='btn btn-success'  onclick='change2($qno)'/><br>";
    echo "<br><p class='ans hidd' id='$qno'>".$actual_ans."</p><br>";
    echo "</div>";
    echo "</div>";
    echo "<br>";
}
        echo "<div class='pager'>";
if($pageno>0)
{
	$pageno1=$pageno-1;
echo "<a href='account.php?qpp=$id&pageno=$pageno1&qno=$qno'><input type='button'  value='<< Prev'  class='btn btn-link'/></a> &nbsp;";
}
for($i=0;$i<$total_pages;$i++)
{
	$new_pageno=$i+1;
	//echo "<a href='account.php?qpp&pageno=$i'>$new_pageno</a> &nbsp;";
    echo "<a href='account.php?qpp=$id&pageno=$i'><input type='button'  value='$new_pageno'  class='btn btn-link'/></a> &nbsp;";
}
if($pageno<$total_pages-1)
{
$pageno++;
echo "<a href='account.php?qpp=$id&pageno=$pageno&qno=$qno'><input type='button'  value='Next >>'  class='btn btn-link'/></a>";
}
        echo "</div>";
      echo "</div>";

}
if(@$_GET['q']== 6)
{
    $email=$_SESSION['email'];
    $sql="select * from result_graph where email='$email'" or die("error 55");
    $query=mysqli_query($con,$sql);
     
    echo"<div class='graph_fancy' data-x-label='Subjects' data-y-label='Score(in %)'>";
    
    while($row_data=mysqli_fetch_array($query)){
          $eid=$row_data[0];
          $per=$row_data[4];
          
        $sql1="select * from quiz where eid='$eid'" or die ("Ab to utha le");
        $query1=mysqli_query($con,$sql1);
        $row_data2=mysqli_fetch_row($query1);
       // echo $row_data2[1];
        echo '
	<span class="bar"></span>';
	echo"<span class='bar' style='height: $per' data-bar-label='$row_data2[1]' data-bar-value='$per%'></span>";
    }
	
	
		 
    echo '</div>';
    
} 
 
   
    
?>
 


</body>
</html>
