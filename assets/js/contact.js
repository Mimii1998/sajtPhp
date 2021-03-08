window.onload = function() {
    document.getElementById("btnPosalji").addEventListener("click", proveraKontakt);
}

    function proveraKontakt() {
        var nameContact = document.getElementById("tbIme");
        var emailContact = document.getElementById("tbFormaMail")
        var phoneContact = document.getElementById("tbMobilni");
        var textContact = document.getElementById("textContact");
    
        var reName = /^[A-Z][a-z]{1,11}(\s[A-Z][a-z]{1,11})+$/;
        var reEmail = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;
        var rePhone = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
        var reText = /^[a-zA-Z0-9_ ]{2,}$/;
        var greske = [];

    
        if(!reName.test(nameContact.value)) {
            nameContact.style.border = "3px solid red"
            document.getElementById("greskaName").style.visibility = "visible";
            greske.push(nameContact.value);
        } else {
            nameContact.style.border = "3px solid green"
        }
    
        if(!reEmail.test(emailContact.value)) {
            emailContact.style.border = "3px solid red"
            document.getElementById("greskaMail").style.visibility = "visible";
            greske.push(emailContact.value);
        } else {
            emailContact.style.border = "3px solid green"
        }
    
        if(!rePhone.test(phoneContact.value)) {
            phoneContact.style.border = "3px solid red"
            document.getElementById("greskaMobilni").style.visibility = "visible";
            greske.push(phoneContact.value);
        } else {
            phoneContact.style.border = "3px solid green"
        }
    
        if(!reText.test(textContact.value)) {
            textContact.style.border = "3px solid red"
            document.getElementById("greskaSubject").style.visibility = "visible";
            greske.push(textContact.value);
        } else {
            textContact.style.border = "3px solid green"
        }

        if(greske.length == 0){
            

            $.ajax({
                url:"models/upisivanjeKontakt.php",
                method:"post",
                data:{
                    name:nameContact.value,
                    email:emailContact.value,
                    phone:phoneContact.value,
                    text:textContact.value
                },success:function(){
                    alert("Your message is successfully sent!");
                    // window.location = 'index.php';
                },error:function(xhr,status,error){
                    console.log(xhr);
                    console.log(status);
                    console.log(console.error());
                }
            })
        }
    }
