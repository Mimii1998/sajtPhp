window.onload = function() {
    document.getElementById("registracija").addEventListener("click", proveraRegistracija);
    document.getElementById("btnLogin").addEventListener("click", proveraLogin);
}


    function proveraLogin(e){
        e.preventDefault();
        var emailLogin = document.getElementById("tbLoginEmail");
        var lozinkaLogin = document.getElementById("tbLoginPass");

        var reEmailLogin = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;
        var validan = true;

        if(!reEmailLogin.test(emailLogin.value)){
            emailLogin.style.border = "3px solid red"
            validan = false;
        } else {
            emailLogin.style.border = "3px solid green"
        }
        if(lozinkaLogin.value == "" || lozinkaLogin.value == null) {
            lozinkaLogin.style.border = "3px solid red"
            validan = false;
        } else {
            lozinkaLogin.style.border = "3px solid green"
        }
        if(validan){
            $.ajax({
                url:"models/logovanje.php",
                method:"POST",
                data:{
                    email:emailLogin.value,
                    lozinka:lozinkaLogin.value,
                    send:true
                },
                dataType:"JSON",
                success: function(data){
                    if(data.id_uloga=="2"){
                        window.location.replace("admin.php");
                    }else{
                        window.location.replace("index.php");
                    }
                },
                error: function(xhr,status,error){
                    switch(xhr.status) {
                        case 404 :
                        alert("There is no user with specified email/password.");
                        break;
                        case 422 :
                        alert("Your email or password is not valid.");
                        break;
                    }
                }
            })
        } else {
            e.preventDefault();
        }
    }

    function proveraRegistracija(e) {
        var nameRegistracija = document.getElementById("tbIme");
        var prezimeRegistracija = document.getElementById("tbPrezime")
        var mailRegistracija = document.getElementById("tbFormaMail");
        var lozinkaRegistracija = document.getElementById("tbFormaLozinka");
    
        var reName = /^[A-Z][a-z]{1,11}$/;
        var reEmail = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;
        var rePrezime = /^[A-Z][a-z]{1,11}$/;
        var validan = true;

    
        if(!reName.test(nameRegistracija.value)) {
            nameRegistracija.style.border = "3px solid red"
            document.getElementById("greskaName").style.visibility = "visible";
            validan = false;
        } else {
            nameRegistracija.style.border = "3px solid green"
        }
    
        if(!rePrezime.test(prezimeRegistracija.value)) {
            prezimeRegistracija.style.border = "3px solid red"
            document.getElementById("greskaPrezime").style.visibility = "visible";
            validan = false;
        } else {
            prezimeRegistracija.style.border = "3px solid green"
        }
    
        if(!reEmail.test(mailRegistracija.value)) {
            mailRegistracija.style.border = "3px solid red"
            document.getElementById("greskaMail").style.visibility = "visible";
            validan = false;
        } else {
            mailRegistracija.style.border = "3px solid green"
        }
    
        if(lozinkaRegistracija.value == "" || lozinkaRegistracija.value == null) {
            lozinkaRegistracija.style.border = "3px solid red"
            document.getElementById("greskaSifra").style.visibility = "visible";
            validan = false;
        } else {
            lozinkaRegistracija.style.border = "3px solid green"
        }

        if(validan){
            $.ajax({
                url:"models/registracija.php",
                method:"post",
                data:{
                    ime:nameRegistracija.value,
                    prezime:prezimeRegistracija.value,
                    email:mailRegistracija.value,
                    sifra:lozinkaRegistracija.value,
                    send:true
                },
                success: function(xhr,status){
                    // alert("Succsessfully registered!");
                    window.location.replace("index.php");
                },
                error: function(error){
                    console.log(error);
                    //location.reload();
                    alert("Something went wrong, try again!");
                }
            })
        } else {
            e.preventDefault();
        }
    }