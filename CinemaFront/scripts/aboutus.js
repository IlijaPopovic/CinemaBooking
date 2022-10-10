$(document).ready(function(){

    $.ajax({
        type: "GET",
        url: 'http://localhost/cinema/user/get_aboutus.php',
        data: {},
        dataType: 'json',
        success: function(data) 
        {
            console.log(data);
            if(id_admin != "no_logged_admin")
            {
                var pricelist_text_change = '<p><button class="change_about_us_text">change</button></p>';
            }
            else
            {
                var pricelist_text_change = '';
            }

            $('.text').append(data[0].text + pricelist_text_change);
        },
    });

    $(document).on('click','.change_about_us_text',function()
    {
        window.location.replace("change_description_aboutus.php");
    });

});
