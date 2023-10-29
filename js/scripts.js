// payapal payment code to save data

jQuery(document).ready(function(){
    jQuery("#paypalPaymentForm").submit(function(){
        setData(
            jQuery("#PriceVal").val(),
            jQuery("#bid").val(),
            jQuery("#userId").val(),
            jQuery("#contractDuration").val()
            );
    });
    function setData(PriceVal, bid,userId,contractDuration) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        
      };
      xhttp.open("GET", "save_payment.php?amount="+PriceVal+"&booking_id="+bid+"&user_id="+userId+"&pay_for="+contractDuration, true);
      xhttp.send();
    }
});

// pwd check
function checkpassword()
{
if(document.register.password.value!=document.register.cnfpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.register.cnfpassword.focus();
return false;
}
return true;
} 

// chnage password
function chnagecheckpassword()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 