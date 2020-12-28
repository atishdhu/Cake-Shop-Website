var profileForm = document.getElementById('profileForm');
var fname = document.getElementById('fname');
var lname = document.getElementById('lname');
var address = document.getElementById('address');
var phone = document.getElementById('phone');

var currentPwd = document.getElementById('currentPwd');
var newPwd = document.getElementById('newPwd');
var confirmPwd = document.getElementById('confirmPwd');

var currentPwdDel = document.getElementById('currentPwdDel');

var var_str = "";

profileForm.addEventListener('submit', (e) => {
    e.stopImmediatePropagation();
    e.preventDefault();
    if(var_str.length == 0)
    {
        sendMessage();
    }
})

function sendMessage(btn) {
    if(btn == "updateProfile")
    {
        var_str = "btn=" + btn + "&fname=" + fname.value + "&lname=" + lname.value + "&address=" + address.value
        + "&phone=" + phone.value;
    } else if(btn == 'clearPassword')
    {
        var_str = "btn=" + btn + "&currentPassword=" + currentPwd + "&newPassword=" + newPassword.value
        + "&confirmPassword=" + confirmPwd.value;
    } else if(btn == 'deleteAccount')
    {
        var_str = "btn=" + btn + "&delPassword" + currentPwdDel.value;
    }
    else
    {
        var_str = "btn=" + btn;
    }

    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200) {
            document.getElementById("message").innerHTML = this.responseText;
        }
    };

    xhr.open("POST", "updateProfile.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(var_str);
}