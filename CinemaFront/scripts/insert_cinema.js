$(document).ready(function(){
    throw_if_not_admin();
    $('.insert').on('click',function()
    {
        
        if(is_all_inserted())
        {
            var post_data = new FormData();
            var cinema_image = $('#cinema_image')[0].files[0];
            console.log(cinema_image);
            post_data.append('cinema_image',cinema_image);
            post_data.append('name',$('#name').val());
            post_data.append('address',$('#address').val());
            post_data.append('city',$('#city').val());
            post_data.append('phone_number',$('#phone_number').val());
            post_data.append('about_cinema',$('#about_cinema').val());
            for (var key of post_data.entries()) {
                console.log(key[0] + ', ' + key[1]);
            }

            $.ajax({
                url:'http://localhost/cinema/user/insert_cinema.php',
                type:'post',
                data:post_data,
                dataType: "json",
                contentType: false,
                processData: false,
                success:function(data)
                {
                    console.log(data);
                    if(data.status == 'inserted')
                    {
                        alert('inserted');
                        $(':input').val('');
                    }
                    else
                    {
                        alert(data.status);
                    }
                }
            });
        }
        else
        {
            alert('You did not enter data correctly');
        }

    });

    function is_all_inserted()
    {
        if(!$('#name').val() || !$('#address').val() || !$('#city').val() || !$('#phone_number').val() || !$('#cinema_image').val() || !$('#about_cinema').val())
        {
            return false;
        }
        else
        {
            return true;
        }
    }

});