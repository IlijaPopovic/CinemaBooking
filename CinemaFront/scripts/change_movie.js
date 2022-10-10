$(document).ready(function () {
  throw_if_not_admin();
  id_movie = window.location.search.substring(4);
  var old_poster = "";
  $.ajax({
    type: "GET",
    url: "http://localhost/CinemaBooking/cinema/user/get_movie.php",
    data: { id: id_movie },
    dataType: "json",
    success: function (data) {
      console.log(data);
      $("#name").val(data[0].name);
      $("#language").val(data[0].language);
      $("#lenght").val(data[0].length);
      $("#beginning").val(normal_date(data[0].beginning));
      $("#genre").val(data[0].genre);
      $("#actors").val(data[0].actors);
      $("#description").val(data[0].description);
      $("#trailer_youtube").val(data[0].trailer_youtube);
      old_poster = data[0].poster;
    },
  });

  $(".insert").on("click", function () {
    if (is_all_inserted()) {
      var post_data = new FormData();
      var poster = $("#poster")[0].files[0];
      console.log(poster);
      post_data.append("poster", poster);
      post_data.append("name", $("#name").val());
      post_data.append("description", $("#description").val());
      post_data.append("lenght", $("#lenght").val());
      post_data.append("beginning", date_for_db($("#beginning").val()));
      post_data.append("language", $("#language").val());
      post_data.append("trailer_youtube", $("#trailer_youtube").val());
      post_data.append("genre", $("#genre").val());
      post_data.append("actors", $("#actors").val());
      post_data.append("old_poster", old_poster);
      post_data.append("movie_id", id_movie);

      for (var key of post_data.entries()) {
        console.log(key[0] + ", " + key[1]);
      }

      $.ajax({
        url: "http://localhost/CinemaBooking/cinema/user/change_movie.php",
        type: "post",
        data: post_data,
        dataType: "json",
        contentType: false,
        processData: false,
        success: function (data) {
          console.log(data);
          if (data.status == "changed") {
            alert("changed");
          } else {
            alert(data.status);
          }
        },
      });
    } else {
      alert("You did not enter data correctly");
    }
  });
});

function is_all_inserted() {
  if (
    !$("#name").val() ||
    !$("#description").val() ||
    !$("#lenght").val() ||
    !$("#language").val() ||
    !$("#trailer_youtube").val() ||
    !$("#genre").val() ||
    !$("#actors").val() ||
    isNaN($("#lenght").val()) ||
    !date_check()
  ) {
    return false;
  } else {
    return true;
  }
}

function date_check() {
  var $regeks =
    /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]|(?:Jan|Mar|May|Jul|Aug|Oct|Dec)))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2]|(?:Jan|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec))\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)(?:0?2|(?:Feb))\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9]|(?:Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep))|(?:1[0-2]|(?:Oct|Nov|Dec)))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/;

  if ($("#beginning").val().match($regeks)) {
    return true;
  } else {
    alert("bad date");
    return false;
  }
}
