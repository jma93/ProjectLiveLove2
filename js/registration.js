$(function () {
    $("#registrationSubmit").click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/ProjectLiveLove/php/registration.php', // use .. to "go up" (out of the folder)
            data: {
                username: $("#usernamesu").val(), //hashtag means id, . means class
                firstname: $("#firstname").val(),
                lastname: $("#lastname").val(), //getting the values from what was inputted in the form
                email: $("#emailsu").val(),
                password: $("#passwordsu").val()
            },
            success: function (data) {
                alert(data);
                console.log(data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
                console.log(thrownError);
            }
        });
    });

});

//when someone clicks register, take what they inputted and make it into an object that can be sent to the php server
