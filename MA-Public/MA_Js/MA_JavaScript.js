$(function () {
    'use strict';

    $(".carousel-item img").width($(window).width());
    $(".carousel-item img").height($(window).height());
    $(".carousel-item img").resize(function () {
        $(".carousel-item img").height($(window).height());
    });

    $("ul.shuffle li").click(function () {
        $(this).addClass("liHover").siblings().removeClass("liHover");
    });


    /*
     * Contact Form To Send Data By Ajax
     */
    var Name       = $(".name").val();
    var Email      = $(".email").val();
    var Subject    = $(".sub").val();
    var Message    = $(".msg").val();

   $(".send").click(function () {
       $.ajax({
           url : "/ajax/contact/",
           type : "GET",
           data : {name:Name,email:Email,subject:Subject,message:Message},
           dataType : "html",
           success:function (responseText,Status,xhr) {
               if (Status === "error"){
                   $(".ma-msg").innerHTML = "<div class='alert alert-danger'>عفوا لم يتم إرسال الرسالة </div>";
               } else{
                   console.log(responseText);
                   $(".ma-msg").innerHTML = "<div class='alert alert-success'>+ responseText +</div>";
               }
           },
           statusCode:{404:function () {
               console.log("sorry page Not Found");
           }}
       });
   });


});
var Name       = document.getElementsByClassName("name");
var Email      = document.getElementsByClassName("email");
var Subject    = document.getElementsByClassName("sub");
var Message    = document.getElementsByClassName("msg");
var result     = document.getElementsByClassName("ma-msg");
var SendBtn    = document.getElementsByClassName("send");

function MA_Contact() {

    console.log(MA_Ajax("/ajax/contact/?n="+Name.value+"&e="+Email.value+"&s="+Subject.value+"&m="+Message.value));
    // if ((Name !== "" || Name !== null)&&(Email!==""||Email!==null)&&(Subject!==""||Subject!==null)&&(Message!==""||Message!==null)){
    //     var response = MA_Ajax("/ajax/contact/?n="+Name.value+"&e="+Email.value+"&s="+Subject.value+"&m="+Message.value);
    //     result.innerHTML = response;
    // } else{
    //     result.innerHTML = "من فضلك املاء البيانات كاملة";
    // }

}


function MA_Ajax(MA_url) {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        var xmlhttp;
        xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState===4 && xmlhttp.status===200) {
            var MA_result =  xmlhttp.responseText;
            if (MA_result === true){
                //noinspection JSAnnotator
                return xmlhttp.responseText;
            } else{
                return false;
            }
        }
    };
    console.log(xmlhttp);
    xmlhttp.open("GET",MA_url,true);
    xmlhttp.send();
}
