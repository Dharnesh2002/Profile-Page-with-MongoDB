$(document).ready(function() {
$.ajax({
    url:'/MKCE/php/data.php',
    success:function(data)
    {
        var myObj=JSON.parse(data);
        document.getElementById("uid").innerHTML = myObj.username;
        document.getElementById("nam").value = myObj.name;
        document.getElementById("email").value = myObj.email;
        document.getElementById("dob").value = myObj.dob;
        document.getElementById("age").value = myObj.age;
        document.getElementById("no").value = myObj.mobile;
        document.getElementById("dep").value = myObj.department;
        document.getElementById("cou").value = myObj.con;
    }
});
});
