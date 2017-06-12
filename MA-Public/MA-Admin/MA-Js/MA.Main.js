/**
 * Created by Mohamed Abdo on 05/28/2017.
 */



function MA_Hide(MA_Element) {
    MA_Element.style.display = "none";
}





function MA_Ajax(MA_Params,MA_url,MA_Hided_Element,MA_Msg) {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            var MA_result =  xmlhttp.responseText;
            if (MA_result === true){
                MA_Msg.innerHTML = xmlhttp.responseText;
            } else{
                MA_Hide(MA_Hided_Element);
            }
        }
    }
    console.log(xmlhttp);
    xmlhttp.open("GET",MA_url+MA_Params,true);
    xmlhttp.send();
}