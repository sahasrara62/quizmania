<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />

 <div class="col-md-3"></div><div class="col-md-6"> 
  <form class='form-horizontal title1' name='form' action="update.php?q=ADDQ"  method='POST' id='myform' onsubmit='return login("dropdown","dropdown2","qns","optionA","optionB","optionC","optionD","ans")'> 
     
<fieldset>
 
 
 
 
<b>Question Database</b>:<br />
<div class="form-group">
  <label class="col-md-12 control-label" for="1"></label>  
  <div class="col-md-12">
  <select name="dropdown" id="dropdown" class="form-control input-md">
         <option value="Select">Select</option>
        <option value="PHP">Php</option>
                <option value="HTML">HTML</option>        
        <option value="JAVASCRIPT">JAVASCRIPT</option>
        </select> <span class="err" id="dropdown_span"></span>
    
  </div>
</div>
<b>Level</b>:<br />
<div class="form-group">
  <label class="col-md-12 control-label" for="1"></label>  
  <div class="col-md-12">
  <select name="dropdown2" id="dropdown2" class="form-control input-md">
         <option value="Select">Select</option>
        <option value="level1">Level_1</option>
                <option value="level2">Level_2</option>        
        <option value="level3">Level_3</option>
        </select> <span class="err" id="dropdown2_span"></span>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="qns"></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns" id="qns" class="form-control" placeholder="Write question     here..."></textarea><span class="err" id="qns_span"></span>
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="1"></label>  
  <div class="col-md-12">
  <input id="optionA" name="optionA" id="optionA" placeholder="Enter option a" class="form-control input-md" type="text"><span class="err" id="optionA_span"></span>
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="2"></label>  
  <div class="col-md-12">
  <input id="optionB" name="optionB" id="optionB" placeholder="Enter option b" class="form-control input-md" type="text"><span class="err" id="optionB_span"></span>
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="3"></label>  
  <div class="col-md-12">
  <input id="optionC" name="optionC" id="optionC" placeholder="Enter option c" class="form-control input-md" type="text"><span class="err" id="optionC_span"></span>
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="4"></label>  
  <div class="col-md-12">
  <input id="optionD" name="optionD" id="optionD" placeholder="Enter option d" class="form-control input-md" type="text"><span class="err" id="optionD_span"></span>
    
  </div>
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans" name="ans" placeholder="Choose correct answer " class="form-control input-md" >
   <option value="Select">Select answer for question</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select> <span class="err" id="ans_span"></span><br /><br />  
  
    
 <div class="form-group">
  <label class="col-md-12 control-label"></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" name="Submit" class="btn btn-primary"/><br><br>
  </div>
</div>

</fieldset>
</form></div>';


