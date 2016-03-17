
$(document).ready(function(){

$('.chat_head').click(function(){
	$('.chat_body').slideToggle('slow');
});

$('.msg_head').click(function(){
	$('.msg_wrap').slideToggle('slow');
});
$('.close').click(function(){
	$('.msg_box').hide();
});
$('.user').click(function(){
	$('.msg_wrap').show();
	$('.msg_box').show();
});

$('textarea').keypress(
function(e){
	e.keyCode;
		if(e.keyCode =="13"){
			//alert('enter');
			var msg=$(this).val();
if( $.trim($(this).val()).length == 0 && $.trim($('textarea').val()).length == 0 ) {
//alert('enter some text in the message');

}			
			/* if (msg == '') {
alert("Enter Some Text In Textarea");
} */
else{
		$(this).val('');
		//alert(msg);
		$("<div class='msg_a'>"+msg+"</div>").insertBefore('.msg_insert');
$('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);
}
			/*if($(this).index()==0){
				Code FOR the textarea
			}
			else{
				CODE FOR OTHER BLOCK
			} */ 
		}

	});



	
});


/*
document.onkeydown = function(event) {
	var key_press = String.fromCharCode(event.keyCode);
	var key_code = event.keyCode;
	document.getElementById('kp').innerHTML = key_press;
    document.getElementById('kc').innerHTML = key_code;
	var status = document.getElementById('status');
	status.innerHTML = "DOWN Event Fired For : "+key_press;
	if(key_code == "13"){
		alert("enter pressed");
	} 
}
document.onkeyup = function(event){
    var key_press = String.fromCharCode(event.keyCode);
	var status = document.getElementById('status');
	status.innerHTML = "UP Event Fired For : "+key_press;
}*/