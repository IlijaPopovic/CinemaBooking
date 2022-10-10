

$(document).ready(function(){
    throw_if_not_admin();
    id_cinema = window.location.search.substring(4);
    var old_image_cinema = '';
    $.ajax({
        type: "get",
        url: 'http://localhost/cinema/user/get_cinema.php',
        data: { 'id': id_cinema },
        dataType: 'json',
        success: function(data) 
        {
            console.log(data);
            $('#name').val(data[0].name);
            $('#address').val(data[0].address);
            $('#city').val(data[0].city);
            $('#phone_number').val(data[0].phone_number);
            $('#about_cinema').val(data[0].about_cinema);
            old_image_cinema = data[0].cinema_picture;
        },
    });

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
            post_data.append('cinema_id',id_cinema);
            post_data.append('old_image_cinema',old_image_cinema);
            for (var key of post_data.entries()) {
                console.log(key[0] + ', ' + key[1]);
            }

            $.ajax({
                url:'http://localhost/cinema/user/change_cinema.php',
                type:'post',
                data:post_data,
                dataType: "json",
                contentType: false,
                processData: false,
                success:function(data)
                {
                    console.log(data);
                    if(data.status == 'changed')
                    {
                        alert('changed');
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
        if(!$('#name').val() || !$('#address').val() || !$('#city').val() || !$('#phone_number').val())
        {
            return false;
        }
        else
        {
            return true;
        }
    }
});


