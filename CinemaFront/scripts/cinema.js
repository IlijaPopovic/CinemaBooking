$(document).ready(function(){

    id_cinema = window.location.search.substring(4);
    console.log('id cinema: ' + id_cinema);

        $.ajax({
        type: "get",
        url: 'http://localhost/cinema/user/get_cinema.php',
        data: { 'id': id_cinema },
        dataType: 'json',
        success: function(data) 
        {
            console.log(data);
            if(id_admin != "no_logged_admin")
            {
                var cinema_change = '<p><button class="change_cinema" data-value="'+ data[0].id +'">change</button></p><p><button class="delete_cinema" data-value="'+ id_cinema +'">delete</button></p>';
            }
            else
            {
                var cinema_change = '';
            }
            $('.main h2').append
            (
                data[0].name
            );

            $('.information_cinema').append
            (
                '<p>'+ data[0].address +'</p>\
                <p>'+ data[0].city +'</p>\
                <p>'+ data[0].phone_number +'</p>'+ cinema_change
            );

            $('.something_about_cinema').append
            (
                '<p>'+ data[0].about_cinema +'</p>'
            );
            
            $('.cinema_image').append('<img src="http://localhost/cinema/user/images/'+ data[0].cinema_picture +'" alt="">');
        },
        });

        $.ajax({
        type: "get",
        url: 'http://localhost/cinema/user/get_halls_for_cinema.php',
        data: { 'id': id_cinema },
        dataType: 'json',
        success: function(data) 
        {
            console.log(data);

            $.each(data, function(key,value)
            {
                if(id_admin != "no_logged_admin")
                {
                    var delete_and_change_hall = '<p><button class="delete_hall" data-value="'+ value.id +'">delete</button></p><p><button class="change_hall" data-value="'+ value.id +'">change</button></p>';
                }
                else
                {
                    var delete_and_change_hall = '';
                }
                
                $('.list_halls_cinema').append
                (
                    '<div class="hall" id="'+ value.id +'">\
                        <div class="information_hall">\
                            <h4>'+ value.name +'</h4>\
                            <p>Number of seats in one row: ' + value.number_seats + '</p>\
                            <p>Rows: ' + value.number_rows + '</p>\
                            <p>Screen: ' + value.screen_size + '</p>\
                            <p>Technologies: ' + value.technology + '</p>'+ delete_and_change_hall +
                        '</div>\
                        <div class="seat_image">\
                                <img src="http://localhost/cinema/user/images/'+ value.hall_picture +'" alt="">\
                        </div>\
                    </div>'
                );
            });

        },
        });

        $(document).on('click','.delete_hall',function()
        {
            var id_hall = $(this).attr('data-value');
            $.ajax({
                type: "GET",
                url: 'http://localhost/cinema/user/delete_hall.php',
                data: {hall_id: id_hall},
                dataType: 'json',
                success: function(data)
                {
                    console.log(data);
                    if(data.status=='deleted')
                    {
                        alert('Hall deleted');
                        $('.list_halls_cinema #' + id_hall).remove();
                    }
                    else if(data.status == 'in_use')
                    {
                        alert('Hall is in use');
                    }
                },
            });
        });

        $(document).on('click','.delete_cinema',function()
        {
            var id_cinema = $(this).attr('data-value');
            $.ajax({
                type: "GET",
                url: 'http://localhost/cinema/user/delete_cinema.php',
                data: {cinema_id: id_cinema},
                dataType: 'json',
                success: function(data)
                {
                    console.log(data);
                    if(data.status=='deleted')
                    {
                        alert('Cinema deleted');
                        window.history.back();
                    }
                    else if(data.status == 'in_use')
                    {
                        alert('Cinema in use, cinema has halls');
                    }
                },
            });
        });


        $(document).on('click','.change_hall',function()
        {
            window.location.replace("change_hall.php?id=" + $(this).attr('data-value'));
        });

        $(document).on('click','.change_cinema',function()
        {
            window.location.replace("change_cinema.php?id=" + id_cinema);
        });
});