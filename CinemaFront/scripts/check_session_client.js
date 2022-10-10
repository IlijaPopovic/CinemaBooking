
var id_user;
var id_admin;
var show = 0;

    $.ajax({
        type: "POST",
        url: 'http://localhost/cinema/user/is_there_user.php',
        data: {},
        dataType: 'json',
        success: function(data) 
        {
            console.log(data);
            id_user = data['id_user'];
            if(id_user == "no_logged_user")
            {
                $('.logged').append("<a href='login.php'>Log in</a>");
            }
            else
            {
                $('.logged').append("<a href='profile.php'>My profile</a>");
            }
        },
    });

    $.ajax({
        type: "POST",
        url: 'http://localhost/cinema/user/is_there_admin.php',
        data: {},
        dataType: 'json',
        success: function(data) 
        {
            console.log(data);
            id_admin = data['id_admin'];
            if(id_admin != "no_logged_admin")
            {
                //alert('admin');
                $('.header').append
                (
                    '<div class="adminPart">\
                        <nav class="adminMenu">\
                            <ul>\
                                <li><a href="insert_tehnology.php">Insert tehnology</a></li>\
                                <li><a href="insert_hall.php">Insert hall</a></li>\
                                <li><a href="insert_projection.php">Insert projection</a></li>\
                                <li><a href="insert_movie.php">Insert movie</a></li>\
                                <li><a href="insert_cinema.php">Insert cinema</a></li>\
                                <li><button class="admin_logout">Admin log out</button></li>\
                            </ul>\
                        </nav>\
                    </div>'
                );
            }
        },
    });

    $(document).on('click','.admin_logout',function()
    {
        $.ajax({
            type: "GET",
            url: 'http://localhost/cinema/user/log_out.php',
            data: {},
            dataType: 'json',
            success: function(data) 
            {
                if(data.status == 'logged_out')
                {
                    alert('logged out');
                    window.location.replace("login.php");
                }
                else
                {
                    alert('Error');
                }
            },
            });
    });

    $(document).on('click','.meni_button',function()
    {
        if(show)
        {
            $('.meni').hide();
            show = 0;
        }
        else
        {
            $('.meni').show();
            show = 1;
        }
    });

    function normal_date(date)
    {
        array = date.split("-"); 
        return array[2]+ "." + array[1]+ "." +array[0];
    }

    function normal_date_and_time(date)
    {
        array = date.split(" "); 
        arraydate = array[0].split("-");
        arraytname = array[1].split(":");

        return arraydate[2]+ "." + arraydate[1]+ "." +arraydate[0]+ " " + arraytname[0] + ":"+ arraytname[1];
    }

    function date_for_db(date)
    {
        array = date.split("."); 
        return array[2]+ "-" + array[1]+ "-" +array[0];
    }

    function date_and_tname_for_db(date)
    {
        array = date.split(" "); 
        arraydate = array[0].split(".");
        arraytname = array[1].split(":");

        return arraydate[2]+ "-" + arraydate[1]+ "-" +arraydate[0]+ " " + arraytname[0] + ":"+ arraytname[1]+ ":00";
    }

    function date_and_tname_for_db2(date)
    {
        var r = date.replace("T"," ");

        return r;
    }

    function throw_if_not_admin()
    {
        if(id_admin == "no_logged_admin")
        {
            window.location.replace("login.php");
        }

    }

    function throw_if_not_user()
    {
        if(id_user == "no_logged_user")
        {
            window.location.replace("login.php");
        }

    }