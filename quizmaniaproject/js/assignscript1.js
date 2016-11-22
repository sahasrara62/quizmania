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
function check_drpdown2(id){
     
   var dp1=document.getElementById(id).value;
    if(dp1=='Select'){
        document.getElementById(id+"_span").innerHTML="  Please select any item";
        return false;
       }
     else
        return true;
     }
 

function login(cnt1_id,cnt2_id,cnt3_id,cnt4_id,cnt5_id,cnt6_id,cnt7_id,cnt8_id)
        {
             
             var flag=0;
       if(check_drpdown2(cnt1_id)==false){
            flag=1;
        } 
    if(check_drpdown2(cnt2_id)==false){
            flag=1;
        } 
             if(check_text(cnt3_id)==false){
            flag=1;
        }
            if(check_text(cnt4_id)==false){
            flag=1;
        }
            if(check_text(cnt5_id)==false){
            flag=1;
        }
            if(check_text(cnt6_id)==false){
            flag=1;
        }
            if(check_text(cnt7_id)==false){
            flag=1;
        }
        if(check_text(cnt6_id)==false){
            flag=1;
        }
     if(check_drpdown2(cnt8_id)==false){
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
