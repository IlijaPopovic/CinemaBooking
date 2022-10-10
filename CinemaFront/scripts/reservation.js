id_projections = window.location.search.substring(4);
var number_of_tickets = 0; 
var price = 0;

$.ajax({
    type: "GET",
    url: 'http://localhost/cinema/user/get_information_about_reservation.php',
    data: {id: id_projections},
    dataType: 'json',
    success: function(data) 
    {
        console.log(data);

        price = data[0].price;

        $('.seats thead').append('<tr><td>&nbsp;</td></tr>');
        for(y = 0; y<data[0].number_seats;y++)
        {
            sy = y + 1;
            $('.seats thead tr').append('<td data-br-seats="number">'+ sy +'</td>');
        }

        for(i = 0; i<data[0].number_rows;i++)
        {
            ri = i + 1;
            $('.seats tbody').append('<tr></tr>');
            $('.seats tbody tr:last').append('<td data-br-seats="number">'+ ri +'</td>');
            for(y = 0; y<data[0].number_seats;y++)
            {
                sy = y + 1;
                $('.seats tbody tr:last').append
                (
                    '<td data-br-seats="' + ri + "/" + sy + '"><i class="fas fa-couch"></i></td>'
                );
            }
        }
        $('.seats tbody').append('<tr><td>&nbsp;</td><td data-br-seats="number" colspan="'+(data[0].number_seats+1)+'">Screen<td></tr>');
        $('.seats tbody').append('<tr><td>&nbsp;</td><td data-br-seats="number" colspan="'+(data[0].number_seats+1)+'"><hr><td></tr>');

        // vip = 0;
        // for(i = 0;i<data[0].number_vip_rows;i++)
        // {
        //     vip = i + 1;
        //     $('.seats tbody tr:nth-child('+ vip +') td').css('background','gold');
        //     $('.seats tbody tr:nth-child('+ vip +') td:first-child').css('background','rgba(0,0,0,0)');
        // }

        $('.informations').append
        (
            // <td class="vip">Vip sediste <i class="fas fa-couch"></td>\
            '<table>\
                <tr>\
                    <td class="black">Free <i class="fas fa-couch"></td>\
                    <td class="red">Busy <i class="fas fa-couch"></td>\
                    <td class="green">Selected <i class="fas fa-couch"></td>\
                </tr>\
            </table>\
            <table>\
            <tr>\
                <td>Hall name:</td>\
                <td>'+ data[0].name +'</td>\
            </tr>\
            <tr>\
                <td>Movie name:</td>\
                <td>'+ data[0].movie +'</td>\
            </tr>\
            <tr>\
                <td>Date and time:</td>\
                <td>'+ normal_date_and_time(data[0].projection_date) +'h</td>\
            </tr>\
            <tr>\
                <td>Number of tickets:</td>\
                <td><span class="number_of_tickets">0</span></td>\
            </tr>\
            <tr>\
                <td>Total price:</td>\
                <td><span class="total_price">0</span> Euro</td>\
            </tr>\
            <tr>\
                <td>Technology:</td>\
                <td>'+ data[0].technology +'</td>\
            </tr>\
            <tr>\
                <td><button class="reserve">Reserve</button></td>\
            </tr>\
        </table>'
        );
    },
});

$(document).ready(function(){
    throw_if_not_user();
    
    var reserved_places = new Array();
    var reserved_places_db = new Array();
    console.log('idp' + id_projections);
    function delete_from_array(array, element)
    {
        return array.filter(function(elementi)
        {
            return elementi != element;
        })
    }

    $.ajax({
        type: "GET",
        url: 'http://localhost/cinema/user/get_reserved_places_projection.php',
        data: {id: id_projections},
        dataType: 'json',
        success: function(data) 
        {
            console.log(data);

            $.each(data, function(key,value)
            {
                $('*[data-br-seats="'+value.row_seat+'/'+value.number_seat + '"]*').css("color","red");
                reserved_places_db.push(value.row_seat+'/'+value.number_seat);
            });
            console.log(reserved_places_db);
        },
    });

    $(document).on('click','.seats td',function()
    {
        var number_seats = $(this).attr('data-br-seats');

        if(reserved_places_db.includes(number_seats) || number_seats == "number")
        {
            return;
        }
        else if(reserved_places.includes(number_seats))
        {
            $(this).css("color","black");
            reserved_places = delete_from_array(reserved_places,number_seats);
        }
        else
        {
            $(this).css("color","green");
            reserved_places.push(number_seats);
        }
        number_of_tickets = reserved_places.length;
        $('.number_of_tickets').empty();
        $('.total_price').empty();
        $('.number_of_tickets').append(number_of_tickets);
        $('.total_price').append(number_of_tickets * price);
        console.log(reserved_places);
        
    });

    $(document).on('click','.reserve',function()
    {
        if(reserved_places !== undefined || reserved_places.leght != 0)
        {
            var json_mesta = JSON.stringify(reserved_places);

            $.ajax({
                type: "GET",
                url: 'http://localhost/cinema/user/insert_reservation.php',
                data: {
                    client_id: id_user,
                    projection_id: id_projections,
                    place_array: json_mesta
                },
                traditional: true,
                dataType: 'json',
                success: function(data) 
                {
                    console.log(data);
                    alert(data.status);
                    window.history.back();
                },
            });
        }
        else
        {
            alert('Choose seats');
        }
    });

});