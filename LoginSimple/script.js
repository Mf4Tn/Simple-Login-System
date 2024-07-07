function change(){
    const sus = document.querySelector('.signup');
    const sis = document.querySelector('.signin');

    if (sus.style.display === 'none') {
        sus.style.display = 'inline';
        sis.style.display = 'none';
    } else {
        sus.style.display = 'none';
        sis.style.display = 'inline';
    }
}
function signin(){
    var username = document.getElementById('user_').value;
    var password = document.getElementById('password_').value;
    var req = new XMLHttpRequest();
    req.open('POST','signin.php',true);
    req.setRequestHeader("content-type","application/x-www-form-urlencoded")
    req.send(`username=${username}&password=${password}`);
    req.onload = () =>{
        document.getElementById('response_').innerHTML = JSON.parse(req.responseText)['response'];
        if(JSON.parse(req.responseText)['success'] == true){
            window.location.href = 'next.php';
        }
    }

}
function signup(){
    var username = document.getElementById('user').value;
    var password = document.getElementById('password').value;
    var name = document.getElementById('name').value;
    var req = new XMLHttpRequest();
    req.open('POST','signup.php',true);
    req.setRequestHeader("content-type","application/x-www-form-urlencoded")
    req.send(`username=${username}&password=${password}&name=${name}`);
    req.onload = () =>{
        if(JSON.parse(req.responseText)['success'] == true){
            change();
            document.getElementById('response_').innerHTML = JSON.parse(req.responseText)['response'];
        }
    }

}

function user_info(){
    var req = new XMLHttpRequest();
    req.open("GET","user_info.php",true);
    req.send();
    req.onload = () =>{
        if(JSON.parse(req.responseText)['loggedin'] == true){
            window.location.href = 'next.php';
        }
    }
}