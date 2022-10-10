

$(document).ready(function(){
    throw_if_not_admin();
    $.ajax({
        type: "GET",
        url: 'http://localhost/cinema/user/get_all_halls_and_movies.php',
        data: {},
        dataType: 'json',
        success: function(data) 
        {
            console.log(data);

            $.each(data[0], function(key,value)
            {
                $('#movie_id').append
                (
                    '<option value="'+ value.id +'">'+ value.name +'</option>'
                );
            });

            $.each(data[1], function(key,value)
            {
                $('#hall_id').append
                (
                    '<option value="'+ value.id +'">'+ value.name +' ('+ value.cinema +')</option>'
                );
            });
        },
    });
});

$('.insert').on('click',function()
    {
        console.log($('#projection_date').val());
        if(is_all_inserted())
        {
            $.ajax({
                type: "POST",
                url: 'http://localhost/cinema/user/insert_projection.php',
                data: 
                {
                    'projection_date': date_and_tname_for_db2($('#projection_date').val()),
                    'movie_id': $('#movie_id').val(),
                    'hall_id': $('#hall_id').val()
                },
                dataType: 'json',
                success: function(data) 
                {
                    if(data.status =='inserted')
                    {
                        alert(data.status);
                    }
                },
                error: function (xhr, status, error) {
                    alert(status);
                    alert(xhr.responseText);
                    alert(error);
                }
            });
            console.log(date_and_tname_for_db2($('#projection_date').val()));//2022-07-27 16:30:00    2022-07-27T15:43
        }
        else
        {
            alert('You did not enter data correctly');
        }

        
    });

function is_all_inserted()
{
    if(!$('#projection_date').val() || $('#movie_id').val() == 'choose' || $('#hall_id').val() == 'choose')
    {
        return false;
    }
    else
    {
        return true;
    }
}

function checkk_date_i_tnamena()
{
    var $regeks = /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]|(?:Jan|Mar|May|Jul|Aug|Oct|Dec)))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2]|(?:Jan|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec))\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)(?:0?2|(?:Feb))\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9]|(?:Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep))|(?:1[0-2]|(?:Oct|Nov|Dec)))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/;

    var $regeks_za_tname= /^(2[0-3]|[01]?[0-9]):([0-5]?[0-9])$/;

    var polomi = $('#projection_date').val().split(" ");

    if(polomi[0].match($regeks) && polomi[1].match($regeks_za_tname) && polomi.length == 2)
    {
        return true;
    }
    else
    {
        alert('los date');
        return false;
    }
}