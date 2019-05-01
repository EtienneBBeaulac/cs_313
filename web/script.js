var admin = document.getElementById('admin');
var tester = document.getElementById('tester');

function admin() {
    console.log("admin clicked.")
}


$('#admin').click(function () {
    $.post('loginscript.php',
    {
        sessiontype: "admin"
    },
    function (data, status) {
        location.href = 'home.php';
    });
});

$(document).ready(function () {
    $('#tester').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: './loginscript.php',
            data: "sessiontype=tester",
            success: function (response) {
                var jsonData = JSON.parse(response);

                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1") {
                    location.href = 'home.php';
                } else {
                    alert('Invalid Credentials!');
                }
            }
        });
    });
});