$(document).ready(function(){
    throw_if_not_admin();

    $.ajax({
        type: "GET",
        url: 'http://localhost/cinema/user/get_aboutus.php',
        data: {},
        dataType: 'json',
        success: function(data) 
        {
            console.log(data);

            $("#about_us_text").val(data[0].text);
        },
    });

    $('.insert').on('click',function()
    {
        $.ajax({
            type: "GET",
            url: 'http://localhost/cinema/user/change_about_us.php',
            data: {text: $("#about_us_text").val()},
            dataType: 'json',
            success: function(data) 
            {
                console.log(data);
                if(data.status == 'changed')
                {
                    alert('Text changed');
                }
            },
        });

    });

});