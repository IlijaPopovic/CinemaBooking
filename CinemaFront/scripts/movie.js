var projections;
var id_movie;

$(document).ready(function(){

    id_movie = window.location.search.substring(4);
    console.log(id_movie);

    $.ajax({
    type: "POST",
    url: 'http://localhost/cinema/user/get_movie.php?id='+ id_movie,
    data: {},
    dataType: 'json',
    success: function(data) 
    {
        console.log(data);
        $(".content").append
        (
            '<p>'+ data[0].description +'</p>'
        );

        if(data[0].average_grade == null)
        {
            $(".average_grade").empty();
            $(".average_grade").append('<p>No grades</p>');
        }
        else
        {
            $(".average_grade").append
            (
                '<p> Average grade: ' + data[0].average_grade + '/5</p>'
            );
        }
        

        $(".image").append
        (
            '<img src="http://localhost/cinema/user/images/' + data[0].poster +'" alt="">'
        );

        $(".youtube").append
        (
            data[0].trailer_youtube
        );

        $(".main h2").append
        (
            data[0].name
        );
        

        $(".table").append
        (
            '<tr>\
                <td>Name: </td>\
                <td>' + data[0].name + '</td>\
            </tr>\
            <tr>\
                <td>Language: </td>\
                <td>' + data[0].language + '</td>\
            </tr>\
            <tr>\
                <td>Movie lenght: </td>\
                <td>' + data[0].length + '</td>\
            </tr>\
            <tr>\
                <td>Start date: </td>\
                <td>' + normal_date(data[0].beginning) + '</td>\
            </tr>\
            <tr>\
                <td>Genre: </td>\
                <td>' + data[0].genre + '</td>\
            </tr>\
            <tr>\
                <td>Actors: </td>\
                <td>' + data[0].actors + '</td>\
            </tr>'
        );

        if(id_admin != "no_logged_admin")
        {
            $(".table").append
            (
                '<tr>\
                <td><button class="change_movie">Change movie</button><button class="delete_movie">Delete movie</button></td>\
                </tr>'
            );
        }
    },
    });

    $.ajax({
    type: "POST",
    url: 'http://localhost/cinema/user/get_repertoire_for_movie.php?id='+ id_movie,
    data: {},
    dataType: 'json',
    success: function(data) 
    {
        console.log(data);

        if(data.length!=0)
        {
            projections = data;
            var array_for_duplicate = [];
            $.each(data, function(key,value)
            {
                if(!array_for_duplicate.includes(value.name))
                {
                    $(".projections select").append
                    (
                        '<option value="' + value.name + '">' + value.name + '</option>'
                    );
                    array_for_duplicate.push(value.name);
                }
            });
        }
        else
        {
            $(".projections select").remove();
            $(".table_projection").remove();
            $(".projections").append('<p>No projections</p>');

        } 
    },
    });

    function print_comments()
    {
        $.ajax({
            type: "POST",
            url: 'http://localhost/cinema/user/get_comments_for_movie.php?id='+ id_movie,
            data: {},
            dataType: 'json',
            success: function(data) 
            {
                console.log(data);
                if(data.length != 0)
                {
                    $(".comments_table").empty();

                    $(".comments_table").append
                    (
                        '<tr>\
                            <th>User</th>\
                            <th>Comment</th>\
                            <th>Grade</th>\
                        </tr>'
                    );

                    $.each(data, function(key,value)
                    {
                        if(id_admin != "no_logged_admin")
                        {
                            var comments_del = '<td><button class="delete_comment" data-value="'+ value.id +'">delete</button></td>';
                        }
                        else
                        {
                            var comments_del = '';
                        }
                        
                        $(".comments_table").append
                        (
                            '<tr id="'+ value.id +'">\
                                <td>' + value.name + ' ' + value.surname + '</td>\
                                <td>' + value.content + '</td>\
                                <td>' + value.grade + '</td>'+ comments_del +
                            '</tr>'
                        );
                    });
                }
                else
                {
                    $(".comments_table").remove();
                    $(".comments").append('<p>No comments</p>');
                }
                
            },
            });
    }

    print_comments();

    if(id_user != "no_logged_user")
    {
        $('.leave_comment').append
        (
            '<div class="insert">\
            <textarea name="new_comment" class="new_comment" cols="100" rows="10"></textarea>\
                <div>\
                    <span>grade: </span>\
                    <select class="grade">\
                        <option value="choose_grade">Choose grade</option>\
                        <option value="1">1</option>\
                        <option value="2">2</option>\
                        <option value="3">3</option>\
                        <option value="4">4</option>\
                        <option value="5">5</option>\
                    </select>\
                    <button class="comment">comment</button>\
                </div>\
            </div>'
        );
    }
    else
    {
        $('.leave_comment').append
        (
           'log in to leave a comment\
           <button class="for_login">Log in</button>'
        )
    }



    $('.projections select').on('change', function() 
    {
        var selected = this.value;

        $( ".table_projection tbody" ).empty();
        $( ".table_projection thead" ).empty();

        if(selected != 'choose_cinema')
        {
            
            $(".table_projection thead").append
            (
                '<tr>\
                    <th>date and time</th>\
                    <th>hall</th>\
                    <th>technology</th>\
                    <th>reservation</th>\
                </tr>'
            );
                                

            $.each(projections, function(key,value)
            {
                if(value.name == selected)
                {
                    if(id_admin != "no_logged_admin")
                    {
                        var delete_projections = '<td><button class="delete_projection" data-value="'+ value.projection_id +'">delete</button></td>';
                    }
                    else
                    {
                        var delete_projections = '';
                    }

                    if(id_user != "no_logged_user")
                    {
                        var reservation = '<a href="reservation.php?id='+value.projection_id+'"> Reserve </a>';
                    }
                    else
                    {
                        var reservation = '<button class="for_login">Log in</button>';
                    }

                    $(".table_projection tbody").append
                    (
                        '\
                            <tr id="'+ value.projection_id +'">\
                                <td>'+ normal_date_and_time(value.projection_date) +'h</td>\
                                <td>'+ value.name +'</td>\
                                <td>'+ value.tehnology_name +'</td>\
                                <td>'+ reservation + delete_projections +' </td>\
                            </tr>\
                        '
                    );
                }
            })

        }
    });

    $('.comment').on('click',function()
    {
        if($('.new_comment').val()!="" && $('.grade').val()!='choose_grade')
        {
            $.ajax({
                type: "GET",
                url: 'http://localhost/cinema/user/comment.php',
                data: 
                {
                    'id': id_movie,
                    'comment':$('.new_comment').val(),
                    'grade':$('.grade').val(),
                    'client':id_user
                },
                dataType: 'json',
                success: function(data) 
                {
                    console.log(data);
                    if(data.status == 'inserted')
                    {
                        $('.insert').empty();
                        $('.leave_comment .error').empty();
                        $('.insert').append('Successfully entered comment and rating');
                        print_comments();
                    }
                    else if(data.status =='there_is_a_comment')
                    {
                        var pitanje = confirm('You have already commented on this movie, do you want to delete the previous comment and post a new one?');

                        if(pitanje)
                        {
                            $.ajax({
                                type: "GET",
                                url: 'http://localhost/cinema/user/delete_users_comments.php',
                                data: 
                                {
                                    'id': id_movie,
                                    'client':id_user
                                },
                                dataType: 'json',
                                success: function(data) 
                                {
                                    console.log('deleted' + data);
                                },
                            });
                            $( ".comment" ).trigger( "click" );
                        }
                    }
                },
            });
        }
        else
        {
            alert('Insert comment and grade');
        }
    });

    $(document).on('click','.for_login',function()
    {
        window.location.replace("login.php");
    });

    $(document).on('click','.change_movie',function()
    {
        window.location.replace("change_movie.php?id=" + id_movie);
    });

    $(document).on('click','.delete_projection',function()
    {
        var id_projections = $(this).attr('data-value');
        $.ajax({
            type: "GET",
            url: 'http://localhost/cinema/user/delete_projection.php',
            data: {projection_id: id_projections},
            dataType: 'json',
            success: function(data)
            {
                if(data.status=='deleted')
                {
                alert('Projection deleted');
                $('.table_projection tbody #' + id_projections).remove();
                }
            },
        });
    });

    $(document).on('click','.delete_comment',function()
    {
        var id_comment = $(this).attr('data-value');
        $.ajax({
            type: "GET",
            url: 'http://localhost/cinema/user/delete_comment.php',
            data: {comment_id: id_comment},
            dataType: 'json',
            success: function(data)
            {
                if(data.status=='deleted')
                {
                alert('Comment deleted');
                $('.comments_table #' + id_comment).remove();
                }
            },
        });
    });

    $(document).on('click','.delete_movie',function()
        {
            $.ajax({
                type: "GET",
                url: 'http://localhost/cinema/user/delete_movie.php',
                data: {movie_id: id_movie},
                dataType: 'json',
                success: function(data)
                {
                    console.log(data);
                    if(data.status=='deleted')
                    {
                        alert('Movie deleted');
                        window.history.back();
                    }
                },
            });
        });

});