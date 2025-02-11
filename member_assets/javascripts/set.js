var base_url = "http://localhost/mobile_corner/";

function set_combo(action, id)
{
    $("#"+action).html('<option>Loading...</option>')
    var c = 0;
    var cc = setInterval(function () {
        c++;
        if (c > 1)
        {
            clearInterval(cc);
        } else
        {
            $data = {id: id};
            var path = base_url + "backend/" + action;
            $.post(path, $data, function (output) {
                $("#" + action).html(output);
            });
        }
    },500);

}

