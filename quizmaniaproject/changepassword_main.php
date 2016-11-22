<head>
<script>
function login(id1,id2,id3)
{
	 var v1=document.getElementById(id1).value;
	 var v2=document.getElementById(id2).value;
	 var v3=document.getElementById(id3).value;
	 if(v1.trim().length==""){
		 
		 alert('Password must be filled out.')
		 return false;
	 }
	  if(v2.trim().length==""){
		 
		 alert("New Password can't be empty")
		 return false;
	 }
	 if(v2.length<5 || v2.length>25){alert("Passwords must be 5 to 25 characters long.");return false;}
	 if(v2!=v3){
		 alert('password must match');
		 return false;
	 }
	 var r=confirm("Are You Sure?");
	 if(r==false){
		 window.location.replace('account.php?q=4');
		 return false;
		 
		 
	 }
	 

}




</script>
</head>

<h2>Change password </h2><br>
 <form   method='Post' onsubmit ="return login('pwd','pwd2','pwd3')">
     <div class="form-group" > 
   
<input type="password" class="form-control" id="pwd" placeholder="Password" name='Password' onblur='check_text(this.id)'> <span class='err1' id='pwd_span'></span><br> 
  <input type="password" class="form-control" id="pwd2" placeholder="New Password" name='PasswordN' onblur='check_text(this.id)'> <span class='err1' id='pwd2_span'></span><br>        
  <input type="password" class="form-control" id="pwd3" placeholder="Enter again" name='PasswordRN' onblur='check_text(this.id)'> <span class='err1' id='pwd3_span'></span><br> 
  <input type="submit" class="btn btn-danger but" value="Change" name='Change' style="width:100px ; font-size:20px" onclick='hii();'><br>
</div>
</form>
     
