/**
 * Created by kalljoshua on 11/27/17.
 */
function randomcompany(pid){

    var chk = document.getElementById("rand-check-company"+pid);
    var status;
    if(chk.checked == true) {
        state = 1;
    }else {
        state = 0;
    }

    console.log("Howdy: "+pid);
    console.log("Howdy2: "+state);

    $.ajax({
        type: 'GET',
        headers: {"cache-control": "no-cache"},
        url: "/admin/random-company",
        async: true,
        cache: false,
        dataType: "json",
        data: 'company_id=' + pid+ '&state=' +state,
        processData: false,
        contentType: false,
        success: function (jsonData, textStatus, jqXHR) {

            console.log("Error: "+jsonData["error"]+", Status: "+jsonData["status"]+", Message: "+jsonData["message"]);


            if(jsonData["error"] == 0 && jsonData["status"] == 1){
                document.getElementById("rand-check-company"+pid).checked = true;
            }

            if(jsonData["error"] == 0 && jsonData["status"] == 2){
                document.getElementById("rand-check-company"+pid).checked = false;
            }

        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log("the error is: "+errorThrown);
        }
    });
}

(function($){

    $.ajax({
        type: 'GET',
        headers: {"cache-control": "no-cache"},
        url: "/admin/get-random-companies",
        async: true,
        cache: false,
        dataType: "json",
        data: 'company_id=',
        processData: false,
        contentType: false,
        success: function (jsonData, textStatus, jqXHR) {

            console.log('getting random Companies');

            var f = jsonData["random"];

            for(var i = 0;i < f.length;i++){

                console.log("rand-check-company"+f[i]);

                //var span = document.getElementById("sus-check-property"+f[i]);
                document.getElementById("rand-check-company"+f[i]).checked = true;
            }

        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log("The errooor is:" +errorThrown);
        }
    });
})(window.jQuery);


