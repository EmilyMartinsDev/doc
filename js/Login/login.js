document.getElementById('button-cad').addEventListener('click', () => {
    document.getElementById('login-form').classList.add('hidden');
    document.getElementById('cadastro-form').classList.remove('hidden');
});

document.getElementById('button-voltar').addEventListener('click', () => {
    document.getElementById('cadastro-form').classList.add('hidden');
    document.getElementById('login-form').classList.remove('hidden');
});

document.getElementById('button-cadastrar').addEventListener('click', () => {
    const newUsername = document.getElementById('new-username').value;
    const newEmail = document.getElementById('new-email').value;
    const newPassword = document.getElementById('new-password').value;

    const data = {
        'new-username': newUsername,
        'new-email': newEmail,
        'new-password': newPassword
    };

    console.log("teste1");
    $.ajax({
        type: "POST",
        url: "../../submits/Cadastrar/salvar_dados.php",
        data: data,
        dataType: "json",
        success: function (response) {

            console.log(response);

            if (response.status == 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message,
                }).then(function () {
                    window.location.href = "/sistema/html/TelaPrincipal/dashboard.html";
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response.message,
                });
            }
        },
        error: function (response) {
            console.log(response);
        }
    });
});

document.getElementById('button-login').addEventListener('click', () => {
    const Username = document.getElementById('username').value;
    const Password = document.getElementById('password').value;

    const data = {
        'username': Username,
        'password': Password
    };

    $.ajax({
        type: "POST",
        url: "../../valida.php",
        data: data,
        dataType: "json",
        success: function (response) {

            if (response.success.status == 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.success.message,
                }).then(function () {
                    window.location.href = "/sistema/html/TelaPrincipal/dashboard.html";
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response.success.message,
                });
            }
        },
        error: function (response) {
            console.log(response);
        }
    });
    


});