$(document).ready(function(){
    $.ajax({
    type: "POST",
    url: 'http://localhost/cinema/user/get_movies_for_repertoire.php',
    data: {},
    dataType: 'json',
    success: function(data)
    {
        console.log(data);
        $.each(data, function(key,value)
        {
            $(".main").append
            (
                '<article class="article">\
                    <a href="movie.php?id='+ value.id +'">\
                        <div class="container">\
                            <div class="image">\
                                <img src="http://localhost/cinema/User/images/'+ value.poster +'" alt="">\
                            </div>\
                            <div class="informations">\
                                <h3>'+ value.name +'</h3>\
                                <p><b>Language: </b> '+ value.language +'</p>\
                                <p><b>Genre: </b>'+ value.genre +' | '+ value.length +'min </p>\
                                <p> <b>Start date of the movie:</b> '+ normal_date(value.beginning) + '</p>\
                            </div>\
                            <div class="more"> \
                                <p> <b>Description:</b> '+ value.description.substring(0, 300) +'...</p>\
                                <p> <b>Actors:</b> '+ value.actors +'</p> \
                            </div>\
                        </div>\
                    </a>\
                </article>'
            );
        });
    },
    });
});