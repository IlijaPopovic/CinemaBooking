
$(document).ready(function()
{
    $('.insert').on('click',function()
    {
        if(is_all_inserted())
        {
            $.ajax({
                type: "POST",
                url: 'http://localhost/cinema/user/create_profile.php',
                data: 
                { 
                    'name': $('#name').val(),
                    'surname': $('#surname').val(),
                    'date_of_birth': date_for_db($('#date_of_birth').val()),
                    'mail': $('#mail').val(),
                    'user_name': $('#user_name').val(),
                    'password': $('#password').val(),
                    'address': $('#address').val(),
                    'city': $('#city').val(),
                    'phone_number': $('#phone_number').val()
                },
                dataType: 'json',
                success: function(data) 
                {
                    if(data.status == 'user name exists')
                    {
                        alert(data.status);
                    }
                    else
                    {
                        alert(data.status);
                        window.location.replace("login.php");
                    }
                },
            });
        }
        else
        {
            alert('You did not enter data correctly');
        }
    });

});

function is_all_inserted()
    {
        if(!$('#name').val() || !$('#surname').val() || !$('#date_of_birth').val() || !$('#mail').val() || !$('#user_name').val() || !$('#password').val() || !$('#address').val() || !$('#phone_number').val() || !$('#city').val() || !checkk_date())
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    function checkk_date()
    {
        var $regeks = /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]|(?:Jan|Mar|May|Jul|Aug|Oct|Dec)))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2]|(?:Jan|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec))\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)(?:0?2|(?:Feb))\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9]|(?:Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep))|(?:1[0-2]|(?:Oct|Nov|Dec)))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/;


        if($('#date_of_birth').val().match($regeks))
        {
            return true;
        }
        else
        {
            alert('los date');
            return false;
        }
    }