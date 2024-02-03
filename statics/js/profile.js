var http = new XMLHttpRequest()
http.open("GET", "/check.php?action=showUsername")
http.withCredentials = true;
http.send()

http.onreadystatechange = function(){
    if(http.readyState == 4 && http.status == 200){
        var data = http.response
        var data = JSON.parse(data)
        
        document.getElementById("username").innerHTML = data.username
    }
}