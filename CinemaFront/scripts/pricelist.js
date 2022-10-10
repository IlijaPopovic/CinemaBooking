$(document).ready(function(){

    $.ajax({
    type: "POST",
    url: 'http://localhost/cinema/user/get_prices.php',
    data: {},
    dataType: 'json',
    success: function(data) 
    {
        console.log(data);
        
        $.each(data, function(key,value)
        {
            if(id_admin != "no_logged_admin")
            {
                var delete_tehnology = '<td><button class="delete_tehnology" data-value="'+ value.id +'">delete</button></td>';
            }
            else
            {
                var delete_tehnology = '';
            }

            $(".table").append
            (
                '<tr id="'+ value.id +'">\
                    <td>' + value.name + '</td>\
                    <td>' + value.price + '</td>\
                    <td>' + value.discount + '</td>' + delete_tehnology +
                '</tr>'
            );
        });
    },
    });

    $.ajax({
    type: "POST",
    url: 'http://localhost/cinema/user/get_pricelist.php',
    data: {},
    dataType: 'json',
    success: function(data) 
    {
        console.log(data);

        if(id_admin != "no_logged_admin")
        {
            var pricelist_text_change = '<p><button class="pricelist_text_change">change</button></p>';
        }
        else
        {
            var pricelist_text_change = '';
        }

        $(".technology_discounts").empty();
        $(".technology_discounts").append
        (
            '<p>'+ data[0].text +'</p>'+ pricelist_text_change
        );
    },
    });

    $(document).on('click','.delete_tehnology',function()
    {
        var id_technology = $(this).attr('data-value');
        $.ajax({
            type: "GET",
            url: 'http://localhost/cinema/user/delete_technology.php',
            data: {technology_id: id_technology},
            dataType: 'json',
            success: function(data)
            {
                if(data.status=='deleted')
                {
                alert('Technology deleted');
                $('.table #' + id_technology).remove();
                }
                else if(data.status == 'in_use')
                {
                    alert('Technology cant be deleted, its in use');
                }
            },
        });
    });

    $(document).on('click','.pricelist_text_change',function()
    {
        window.location.replace("change_description_pricelist.php");
    });
});