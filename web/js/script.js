function setPasswordVisibility(id) {
    if(id) {
        // untuk edit
        var password = document.getElementById("password" + id);
        var passwordTogleElement = document.getElementById("togglePassword" + id);
    }else{
        // untuk tambah
        var password = document.getElementById("password");
        var passwordTogleElement = document.getElementById("togglePassword");
    }

    if (password.type === "password") {
        password.type = "text"
    }

    else {
        password.type = "password"
    }
    
    passwordTogleElement.classList.toggle("bi-eye");
}
