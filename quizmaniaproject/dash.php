<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Quizmania || DASHBOARD </title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/val_script.js" type="text/javascript"></script>
<script src="js/assignscript1.js" type="text/javascript"></script>
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

 
</head>

<body  style="background:#eee;">
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">Test Your Skill</span></div>
<?php
 include_once 'dbConnection.php';
session_start();
$email=$_SESSION['email'];
  if(!(isset($_SESSION['email']))){
header("location:index.php");

}
else
{
$name = $_SESSION['name'];

include_once 'dbConnection.php';
echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a class="log log1">'.$name.'</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
}?>

</div></div>
<!-- admin start-->

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
      <a class="navbar-brand" href="dash.php?q=0"><b>Dashboard</b></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       
        <li <?php if(@$_GET['q']==1) echo'class="active"'; ?>><a href="dash.php?q=1">User</a></li>
	 
        <li class="dropdown <?php if(@$_GET['q']==4 || @$_GET['q']==5) echo'active"'; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Question<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="dash.php?q=4">Add Quiz</a></li>
             
            <li><a href="dash.php?q=5">Remove Quiz</a></li>
            
            <li><a href="dash.php?q=7">Edit Question</a></li>
          </ul>
        </li>
      </ul>
          </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">
<!--home start-->




<!--home closed-->
<!--users start-->
<?php if(@$_GET['q']==1) {

$result = mysqli_query($con,"SELECT * FROM user") or die('Error');
echo  '<div class="panel"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>College</b></td><td><b>Email</b></td><td><b>Mobile</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$mob = $row['mob'];
	$gender = $row['gender'];
    $email = $row['email'];
	$college = $row['college'];

	echo '<tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$gender.'</td><td>'.$college.'</td><td>'.$email.'</td><td>'.$mob.'</td>
	<td><a title="Delete User" href="update.php?demail='.$email.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
}
$c=0;
echo '</table></div>';

}?>
 
<!--feedback reading portion start-->
<?php if(@$_GET['fid']) {
echo '<br />';
$id=@$_GET['fid'];
$result = mysqli_query($con,"SELECT * FROM feedback WHERE id='$id' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$subject = $row['subject'];
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
	$feedback = $row['feedback'];
	
echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>'.$subject.'</b></h1>';
 echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">-&nbsp;<b>DATE:</b>&nbsp;'.$date.'</span>
<span style="line-height:35px;padding:5px;">&nbsp;<b>Time:</b>&nbsp;'.$time.'</span><span style="line-height:35px;padding:5px;">&nbsp;<b>By:</b>&nbsp;'.$name.'</span><br />'.$feedback.'</div></div>';}
}?>
<!--Feedback reading portion closed-->

<!--add quiz start-->
<?php
if(@$_GET['q']==4 && !(@$_GET['step']) ) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Quiz Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Enter Quiz title" class="form-control input-md" type="text">
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>  
  <div class="col-md-12">
  <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="right"></label>  
  <div class="col-md-12">
  <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="wrong"></label>  
  <div class="col-md-12">
  <input id="wrong" name="wrong" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="time"></label>  
  <div class="col-md-12">
  <input id="time" name="time" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number">
    
  </div>
</div>



<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?>

<?php
if(@$_GET['q']==4 && (@$_GET['step'])==2 ) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">
<fieldset>
';
 
 for($i=1;$i<=@$_GET['n'];$i++)
 {
echo '<b>Question number&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input-->
<b><br>Question Database</b>:<br />
<div class="form-group">
  <label class="col-md-12 control-label" for="1"></label>  
  <div class="col-md-12">
  <select name="dropdown'.$i.'"   class="form-control input-md" >
       <option value="a">Select database for question '.$i.'</option>
       <option value="PHP" select>PHP</option> 
       <option value="HTML">HTML</option>        
       <option value="JAVASCRIPT">JAVASCRIPT</option>
       </select> 
    </div>
  </div>
  <b>Level</b>:<br />
<div class="form-group">
  <label class="col-md-12 control-label" for="1"></label>  
  <div class="col-md-12">
  <select name="dropdown2'.$i.'"   class="form-control input-md"> 
        <option value="a">Select level for question '.$i.'</option>
        <option value="level1" select>level1</option> 
        <option value="level2">Level2</option>        
        <option value="level3">Level3</option>
        </select> 
        
        
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..."></textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'1"></label>  
  <div class="col-md-12">
  <input id="'.$i.'1" name="'.$i.'1" placeholder="Enter option a" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'2"></label>  
  <div class="col-md-12">
  <input id="'.$i.'2" name="'.$i.'2" placeholder="Enter option b" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'3"></label>  
  <div class="col-md-12">
  <input id="'.$i.'3" name="'.$i.'3" placeholder="Enter option c" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'4"></label>  
  <div class="col-md-12">
  <input id="'.$i.'4" name="'.$i.'4" placeholder="Enter option d" class="form-control input-md" type="text">
    
  </div>
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer " class="form-control input-md" >
   <option value="a">Select answer for question '.$i.'</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br />'; 
 }
    
echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?><!--add quiz step 2 end-->

<!--remove quiz-->
<?php if(@$_GET['q']==5) {

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
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="update.php?q=rmquiz&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></td></tr>';
}
$c=0;
echo '</table></div>';

}
?>
<?php
if(@$_GET['q']==6) {
include("add_question.php");
}  
   if(@$_GET['q']==7) {
     $result = "SELECT qid,Type,Level,qns FROM questions";
       $query1=mysqli_query($con,$result);
        $total_rows=mysqli_num_rows($query1);
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
$result = "SELECT qid,Type,Level,qns FROM questions limit $offset,$limit";   
echo  '<div class="panel"><table class="table table-striped title1" width="600px" >
<tr><td><b>ID</b></td><td><b>Topic</b></td><td><b>Level</b></td><td><b>Question</b></td><th>Option</th></tr>';
       
$query=mysqli_query($con,$result);
$count=mysqli_num_rows($query);
 $col_count=mysqli_num_fields($query);
       $id;
while($row_data=mysqli_fetch_array($query))
{
    
  
    
echo "<tr>";
for($c=0;$c<$col_count;$c++)
{ 
	echo "<td>$row_data[$c]</td>";
}   
  
    echo "<td><a href='dash.php?q=8&edit=$row_data[0]'><input type='button' value='Edit' class='btn btn-primary'></a>&nbsp&nbsp<a href='update.php?delete=$row_data[0]'><input type='button' value='Delete' class='btn btn-danger'></a></td>";
     echo "</tr>";                                                                             
}
echo "</table>";

       echo "<div class='pager'>";
if($pageno>0)
{
	$pageno1=$pageno-1;
echo "<a href='dash.php?q=7&pageno=$pageno1&qno=$qno'><input type='button'  value='<< Prev'  class='btn btn-link'/></a> &nbsp;";
}
for($i=0;$i<$total_pages;$i++)
{
	$new_pageno=$i+1;
	//echo "<a href='account.php?qpp&pageno=$i'>$new_pageno</a> &nbsp;";
    echo "<a href='dash.php?q=7&pageno=$i'><input type='button'  value='$new_pageno'  class='btn btn-link'/></a> &nbsp;";
}
if($pageno<$total_pages-1)
{
$pageno++;
echo "<a href='dash.php?q=7&pageno=$pageno&qno=$qno'><input type='button' value='Next >>'  class='btn btn-link'/></a>";
}
        echo "</div>";
       echo "</div>";
   }
   if(@$_GET['q']==8) 
       
{ 
       $id=$_REQUEST['edit'];
       // echo $id;
    $sql="select * from questions where qid='$id'";
    $sql2= "select * from options where qid='$id'"; 
        
    $sql3= "select * from answer where qid='$id'";    
    $query=mysqli_query($con,$sql);
        
     $row = mysqli_fetch_row($query);
       
        $query1=mysqli_query($con,$sql2);
         $option1='';
         $option2='';
         $option3='';
         $option4='';
         $ansid1='';
         $ansid2='';
         $ansid3='';
         $ansid4='';
       $i=1;
    
       while($row_data1=mysqli_fetch_array($query1)){
           if($i==1){
               $option1=$row_data1[1];
               $ansid1=$row_data1[2];
           }
            if($i==2){
               $option2=$row_data1[1];
               $ansid2=$row_data1[2];
           }
            if($i==3){
               $option3=$row_data1[1];
               $ansid3=$row_data1[2];
           }
            if($i==4){
               $option4=$row_data1[1];
               $ansid4=$row_data1[2];
           }
             
           $i++;
       }
       $answer='';
      $query3=mysqli_query($con,$sql3);
       $row_data=mysqli_fetch_row($query3);
           if($ansid1==$row_data[1] ){
                $answer=$ansid1;
           }
           else if($ansid2==$row_data[1] ){
                $answer=$ansid2;
           }
            else if($ansid3==$row_data[1] ){
                $answer=$ansid3;
           }
             else if($ansid4==$row_data[1] ){
                $answer=$ansid4;
           }
       $sql4= "select * from options where qid='$id'"; 
        $query4=mysqli_query($con,$sql4);
       $actual_ans='';
       $j=1;
       while($row_d=mysqli_fetch_array($query4)){
           if($answer==$row_d[2]){
                 if($j==1)
                $actual_ans='A';
               else if($j==2)
                $actual_ans='B';
              else if($j==3)
                $actual_ans='C';
              else if($j==4)
                $actual_ans='D';
           } 
           $j++;
       }
       
    echo ' <div class="row">
<span class="title1" style="margin-left:35%;font-size:30px;"><b>Update Question Details</b></span><br /><br />';

 echo "<div class='col-md-3'></div><div class='col-md-6'><form class='form-horizontal title1' name='form' action='update.php?ADDU=$id&optid1=$ansid1&optid2=$ansid2&optid3=$ansid3&optid4=$ansid4' method='POST' onsubmit='return login('dropdown','dropdown2','qns','optionA','optionB','optionC','optionD','ans')'>
";
 
 
echo ' <fieldset>
<b>Question Database</b>:<br />
<div class="form-group">
  <label class="col-md-12 control-label" for="1"></label>  
  <div class="col-md-12">
  <select name="dropdown" id="dropdown" class="form-control input-md" >';
       echo " <option value='$row[5]' select>$row[5]</option>";
       if($row[5]=='PHP'){
           
       echo '
         
                <option value="HTML">HTML</option>        
        <option value="JAVASCRIPT">JAVASCRIPT</option>
        </select>';
        }
       else if($row[5]=='HTML'){
           
       echo '
        <option value="PHP">PHP</option>
                      
        <option value="JAVASCRIPT">JAVASCRIPT</option>
        </select>';
        }
      else if($row[5]=='JAVASCRIPT'){
           
       echo '
        <option value="PHP">PHP</option>
                <option value="HTML">HTML</option>        
         
        </select>';
        }
    echo '
  </div>
</div>
<b>Level</b>:<br />
<div class="form-group">
  <label class="col-md-12 control-label" for="1"></label>  
  <div class="col-md-12">
  <select name="dropdown2" id="dropdown2" class="form-control input-md">';
         echo " <option value='$row[6]' select>$row[6]</option>";
           if($row[6]=='level1'){
       echo '
         
                <option value="level2">Level2</option>        
        <option value="level3">Level3</option>
        </select>';
        }
       else if($row[6]=='level2'){
       echo '
        <option value="level1">Level1</option>
                     
        <option value="level3">Level3</option>
        </select>';
        }
       if($row[6]=='level3'){
       echo '
        <option value="level1">Level1</option>
                <option value="level2">Level2</option>        
         
        </select>';
        }
       echo '
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="qns"></label>  
  <div class="col-md-12">';
echo "<input type='text' name='qns' id='qns' class='form-control' placeholder='Enter question' value='$row[2]'>"; 
echo ' </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="1"></label>  
  <div class="col-md-12">';
        
echo "<input id='optionA' name='optionA' placeholder='Enter option a' class='form-control input-md' type='text' value='$option1'>";
    echo '
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="2"></label>  
  <div class="col-md-12">';
  echo "<input id='optionB' name='optionB' placeholder='Enter option b' class='form-control input-md' type='text' value='$option2'>";
  echo '  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="3"></label>  
  <div class="col-md-12">';
  echo "<input id='optionC' name='optionC' placeholder='Enter option c' class='form-control input-md' type='text' value='$option3'>";
    echo '
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="4"></label>  
  <div class="col-md-12">';
  echo "<input id='optionD' name='optionD' placeholder='Enter option d' class='form-control input-md' type='text' value='$option4'>";
    echo '
  </div>
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans" name="ans" placeholder="Choose correct answer " class="form-control input-md" >';
/*echo "<option value='$actual_ans'>$actual_ans</option>";
       echo '
<option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option> </select><br /><br />';
     */  
        
   echo " <option value='$actual_ans' select>$actual_ans</option>";
       if($actual_ans=='A'){
       echo '
  
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option> </select><br /><br />'; 
       }
       else if($actual_ans=='B'){
       echo '
  
  <option value="A">A</option>
  <option value="C">C</option>
  <option value="D">D</option> </select><br /><br />'; 
       }
       else if($actual_ans=='C'){
       echo '
  
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="D">D</option> </select><br /><br />'; 
       }
       else if($actual_ans=='D'){
       echo '
  
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option> </select><br /><br />'; 
       }
    
echo '<div class="form-group">
  <label class="col-md-12 control-label"></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" name="Submit" class="btn btn-primary"/></br></br>
  </div>
</div>

</fieldset>
</form></div>';
} 
   
    
     
?>

</div><!--container closed-->
</div></div>
</body>
</html>
