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

function change_status(action,id)
{
    if($('#'+action+id).hasClass('fa-toggle-off'))
    {
        //class
        $('#'+action+id).removeClass('fa-toggle-off').addClass('fa-toggle-on');        
        //title
        $('#'+action+id).removeAttr('title').removeAttr('data-toggle').attr('title','Active').attr('data-original-title','Active');        
        //css
        $('#'+action+id).css('color','#00baf2');        
    }
    else
    {
        //class
        $('#'+action+id).removeClass('fa-toggle-on').addClass('fa-toggle-off');
        //title
        $('#'+action+id).removeAttr('title').removeAttr('data-toggle').attr('title','Deactive').attr('data-original-title','Deactive');        
        //css
        $('#'+action+id).css('color','#777');
    }
    
    $data = { action:action , id:id };
    var path = base_url + 'backend/change_status/';
    
    $.post(path,$data);
    
}