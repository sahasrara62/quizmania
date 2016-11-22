function check_text(id){
   var v1=document.getElementById(id).value;
    var a=id+"_span";
   if (v1.trim().length==0){
         document.getElementById(a).innerHTML="Can't leave this empty";
            return false;
       }
    else {
       document.getElementById(a).innerHTML=" ";
              return true;
    }
}
// f_2
function email_check(id)
{
    if(check_text(id)==false){
        return false;
    }
    else
    {
	var isEmail_re= /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\ \+_]+)*\s*$/;
	var cnt_value= document.getElementById(id).value;
	if(!cnt_value.match(isEmail_re))
	{
        document.getElementById(id+"_span").innerHTML="Plesae enter correct format";
		 return false;
	} 
    else    
	  return true;
    }
	
}
// f_3
function passwd_check(id)
{
    if(check_text(id)==false){
       return false;
    }
    else
    {
         var pass=  /^[a-zA-Z0-9!@#$%^&*]{6,16}$/;  
         var ab=document.getElementById(id).value;
          if(ab.match(pass))   
         {   
          return true;  
         }  
       else{
       document.getElementById(id+"_span").innerHTML="Please enter correct formated 6 to<br>15 character long password";  
       return false;   
           }  
       }
}
//f_4
function cpasswd_check(id,id2)
{
    if(check_text(id)==false){
       return false;
    }
    else
    {
         var p1=document.getElementById(id).value;  
         var p2=document.getElementById(id2).value;
          if( p1==p2)   
         {   
          return true;  
         }  
       else{
       document.getElementById(id+"_span").innerHTML="Passwords don't match";   
       return false;   
           }  
       }
}
 
function login(cnt1_id,cnt2_id,cnt3_id,cnt4_id)
        {
             var flag=0;
       if(email_check(cnt1_id)==false){
            flag=1;
        }
       if(passwd_check(cnt2_id)==false){
            flag=1;
        } 
       if(passwd_check(cnt3_id)==false){
            flag=1;
        }   
        if(cpasswd_check(cnt4_id,cnt3_id)==false){
            flag=1;
        } 
         if(flag==1){
            return false;
           }
        else
           return true;
        }
 
function myR() {
    location.reload();
}
