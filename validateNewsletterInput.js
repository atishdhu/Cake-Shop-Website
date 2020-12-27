var newsletterForm = document.getElementById('newsletterForm');
var email = document.getElementById('email');
var buttonPressed = document.getElementById('subscribe');

if(buttonPressed.id == "subscribe")
{
    newsletterForm.addEventListener('submit', (f) => {
        var mailError = "";
        
        document.getElementById("errorMessage").innerHTML = "";
    
        var allErrors = [];
        
        email.value = String(email.value).trim();
        var regmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if( !email.value.match(regmail) )
        {
            mailError = "Invalid email format";
            document.getElementById("mailError").innerHTML = mailError;
            allErrors.push(mailError);
        }
    
        if(allErrors.length > 0)
        {
            f.preventDefault();
            document.getElementById("sendError").innerHTML = "Message Not Sent!";
        }
        else
        {
            sendToServer();
            document.getElementById("sendError").innerHTML = "Message Sent!";
            f.preventDefault();
        }
    })
    
    function sendToServer() {
        var var_str = "email=" + email.value;
        
        const xhr = new XMLHttpRequest();
    
        xhr.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
                document.getElementById("errorMessage").innerHTML = this.responseText;
            }
        };
    
        xhr.open("POST", "validateNewsletterInput.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(var_str);
    }
}
