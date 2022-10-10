$(".uloguj_se").on("click", function () {
  $.ajax({
    type: "POST",
    url: "http://localhost/CinemaBooking/cinema/user/log_in.php",
    data: {
      username: $("#username").val(),
      password: $("#password").val(),
    },
    dataType: "json",
    success: function (data) {
      console.log(data["id"]);

      if (data["user"] == "no") {
        alert("Wrong data");
      } else if (data["user"] == "admin") {
        alert("Admin loged in");
        window.location.replace("login.php");
      } else if (data["user"] == "user") {
        alert("User loged in");
        window.location.replace("profile.php");
      }
    },
  });
});
