document.getElementById("sub2").onclick = function(){
    var username = document.getElementById("username").value;
    
    var http = new XMLHttpRequest();
    http.open("POST", "/update.php")
    http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")
    http.withCredentials = true;
    http.send("action=changeUsername&newUsername=" + username)

    http.onreadystatechange = function(){
        if (http.readyState == 4 && http.status == 200){
            var data = http.response
            var data = JSON.parse(data)
            if (data.status == false){
                document.location = "/message.html?message=This username alraedy exist&referer=/setting.html"
            }else{
                document.location = "/message.html?message=Your username changed&referer=/setting.html"
            }
        }
    }
}

document.getElementById("sub1").onclick = function(){

    var fullname = document.getElementById("fullname").value;
    
    var http = new XMLHttpRequest();
    http.open("POST", "/update.php")
    http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")
    http.withCredentials = true;
    http.send("action=changeFullname&newFullname=" + fullname)

    http.onreadystatechange = function(){
        if (http.readyState == 4 && http.status == 200){
            var data = http.response
            var data = JSON.parse(data)
            if (data.status == false){
                document.location = "/message.html?message=An error accoured&referer=/setting.html"
            }else{
                document.location = "/message.html?message=Your fullname changed&referer=/setting.html"
            }
        }
    }

}

document.getElementById("sub").onclick = function(){

    var currentPasswd = document.getElementById("cpassword").value;
    var newPasswd = document.getElementById("password").value;
    
    var http = new XMLHttpRequest();
    http.open("POST", "/update.php")
    http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")
    http.withCredentials = true;
    http.send("action=changePassword&currentPassword=" + currentPasswd + "&newPassword=" + newPasswd)

    http.onreadystatechange = function(){
        if (http.readyState == 4 && http.status == 200){
            var data = http.response
            var data = JSON.parse(data)
            if (data.status == false){
                document.location = "/message.html?message=An error accoured&referer=/setting.html"
            }else{
                document.location = "/message.html?message=Your password changed&referer=/setting.html"
            }
        }

    }

}