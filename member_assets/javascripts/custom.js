$c=0;
$('#showpass1').click(function(){
    if($c==0)
    {
       
        
        $("#txt1").attr('type','text');
        $("#showpass1").attr("title","Hide Password");
        $("#showpass1").removeClass("fa fa-toggle-off").addClass("fa fa-toggle-on");
        
        
        $c++;
    }
    else{
        $("#txt1").attr('type','password');
        $("#showpass1").attr("title","Show Password");
        $("#showpass1").removeClass("fa fa-toggle-on").addClass("fa fa-toggle-off");
        
        $c=0;
    }
});

$c=0;
$('#showpass2').click(function(){
    if($c==0)
    {
       
      
        $("#txt2").attr('type','text');
        $("#showpass2").attr("title","Hide Password");
        $("#showpass2").removeClass("fa fa-toggle-off").addClass("fa fa-toggle-on");
        
        
        $c++;
    }
    else{
        $("#txt2").attr('type','password');
        $("#showpass2").attr("title","Show Password");
        $("#showpass2").removeClass("fa fa-toggle-on").addClass("fa fa-toggle-off");
        
        $c=0;
    }
});

//1
$c=0;
$('#showpass3').click(function(){
    if($c==0)
    {
       
      
        $("#txt3").attr('type','text');
        $("#showpass3").attr("title","Hide Password");
        $("#showpass3").removeClass("fa fa-toggle-off").addClass("fa fa-toggle-on");
        
        
        $c++;
    }
    else{
        $("#txt3").attr('type','password');
        $("#showpass3").attr("title","Show Password");
        $("#showpass3").removeClass("fa fa-toggle-on").addClass("fa fa-toggle-off");
        
        $c=0;
    }
});

//2
$c=0;
$('#showpass4').click(function(){
    if($c==0)
    {
       

        $("#txt4").attr('type','text');
        $("#showpass4").attr("title","Hide Password");
        $("#showpass4").removeClass("fa fa-toggle-off").addClass("fa fa-toggle-on");
        
        
        $c++;
    }
    else{
        $("#txt4").attr('type','password');
        $("#showpass4").attr("title","Show Password");
        $("#showpass4").removeClass("fa fa-toggle-on").addClass("fa fa-toggle-off");
        
        $c=0;
    }
});



$('#all').click(function(){
    $("input[type=checkbox]").prop('checked',$(this).prop('checked'));
            
});

$("#input[type=checkbox]").click(function(){
    if(!$(this).prop("checked")){
        $('#all').prop("checked",false);
    }
});

//$("#btn_clear").click(function(){
//    alert('hello');
//    $("#clear").empty();
//})





function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#imgInp").change(function() {
  readURL(this);
});

