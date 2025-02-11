$c=0;

$('#show_pass').click(function(){
    if($c==0)
    {
       
        $("#txt1").attr('type','text');
        $("#show_pass").removeClass("icofont-eye").addClass("icofont-eye-blocked");
        
        $c++;
    }
    else{
        $("#txt1").attr('type','password');
        $("#show_pass").removeClass("icofont-eye-blocked").addClass("icofont-eye");
        
        $c=0;
    }
});

$c=0;

$('#cshow').click(function(){
    if($c==0)
    {
       
        
        $("#txt3").attr('type','text');
        $("#cshow").removeClass("icofont-eye").addClass("icofont-eye-blocked");
        
        $c++;
    }
    else{
        $("#txt3").attr('type','password');
        $("#cshow").removeClass("icofont-eye-blocked").addClass("icofont-eye");
        
        $c=0;
    }
});
