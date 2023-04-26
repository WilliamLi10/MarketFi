var clicked = false;
$(document).ready(function(){
    var accountType = "";
    $("#New").click(function(){
        accountType = "New";
        $(this).css('border-color', 'coral');
        $("#Experienced").css('border-color', 'lightgray');
        clicked = true;
    })
    $("#Experienced").click(function(){
        accountType = "Experienced";
        $(this).css('border-color', 'coral');
        $("#New").css('border-color', 'lightgray');
        clicked = true
    })
    $("#GetStarted").click(function(){
        if(!clicked){
            event.preventDefault();
            $("#NotClicked").css('visibility','visible');
        } else{
            if (accountType === "New") {
                window.location.href = "NewUserStockForm.html";
              } else if (accountType === "Experienced") {
                window.location.href = "ExperiencedUserStockForm.html";
              } else {
                // Redirect to a default or error page if the account type is not set
                window.location.href = "error.html";
              }

        }
    })

    $("#personalInfoForm").submit(function (e) {
        e.preventDefault();
        window.location.href = "index.html";
    });    

})