/**
 * Created by acer on 12/13/2015.
 */
$(document).ready(function() {

   /*$('.f').submit(function(e){
       e.preventDefault();*/
       //var tex=$('#test').val();
      // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      // alert(tex);
    setInterval(function(){
        //alert('Test');
      $.ajax( {
           type: "GET",
           url: 'display',
          context: document.body


       }).done(function( msg ) {
         //  $('#test').val(msg);
         //  alert(msg);
           console.log(msg);
          $('.yes').load('display2');
           // $("#ajaxResponse").append("<div>"+msg+"</div>");
           }).fail(function(jqXHR, textStatus ){
           console.log(textStatus);
           // alert(textStatus);
       });

    },2000);//end of interval
  // });//end of sumbit
});