$(document).ready(function () {
  throw_if_not_admin();

  $(".insert").on("click", function () {
    if (is_all_inserted()) {
      console.log($("#beginning").val());
      var post_data = new FormData();
      var poster = $("#poster")[0].files[0];
      console.log(poster);
      post_data.append("poster", poster);
      post_data.append("name", $("#name").val());
      post_data.append("description", $("#description").val());
      post_data.append("lenght", $("#lenght").val());
      post_data.append("beginning", $("#beginning").val());
      post_data.append("language", $("#language").val());
      post_data.append("trailer_youtube", $("#trailer_youtube").val());
      post_data.append("genre", $("#genre").val());
      post_data.append("actors", $("#actors").val());
      for (var key of post_data.entries()) {
        console.log(key[0] + ", " + key[1]);
      }

      $.ajax({
        url: "http://localhost/CinemaBooking/cinema/user/insert_movie.php",
        type: "post",
        data: post_data,
        dataType: "json",
        contentType: false,
        processData: false,
        success: function (data) {
          console.log(data);
          if (data.status == "inserted") {
            alert("inserted");
            $(":input").val("");
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
    !$("#poster").val() ||
    !$("#name").val() ||
    !$("#description").val() ||
    !$("#lenght").val() ||
    !$("#language").val() ||
    !$("#trailer_youtube").val() ||
    !$("#genre").val() ||
    !$("#actors").val() ||
    isNaN($("#lenght").val())
  ) {
    return false;
  } else {
    return true;
  }
}

function checkk_date() {
  var $regeks =
    /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]|(?:Jan|Mar|May|Jul|Aug|Oct|Dec)))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2]|(?:Jan|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec))\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)(?:0?2|(?:Feb))\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9]|(?:Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep))|(?:1[0-2]|(?:Oct|Nov|Dec)))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/;

  if ($("#beginning").val().match($regeks)) {
    return true;
  } else {
    alert("los date");
    return false;
  }
}
