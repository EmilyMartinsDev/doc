$(document).ready(function () {
    // Aplicar máscara de CNPJ
    $('#cnpj').mask('00.000.000/0000-00', { reverse: true });

    document.getElementById('button-cadastrar').addEventListener('click', () => {
        const nome = document.getElementById('nome').value;
        const cnpj = document.getElementById('cnpj').value.replace(/[^\d]+/g, ''); // Remover caracteres não numéricos
        const cidade = document.getElementById('cidade').value;
        const UF = document.getElementById('uf').value.toUpperCase(); // Converter para maiúsculas

        // Validar se os campos estão preenchidos
        if (nome === '' || cnpj === '' || cidade === '' || UF === '') {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Por favor, preencha todos os campos.',
            });
            return; // Impede o envio dos dados se algum campo estiver vazio
        }

        // Validar se a UF tem exatamente 2 caracteres
        if (UF.length !== 2) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'UF deve ter exatamente 2 caracteres.',
            });
            return;
        }

        // Agora, você pode enviar os dados para o servidor
        const data = {
            'new-client-name': nome,
            'new-client-cnpj': cnpj,
            'new-client-city': cidade,
            'new-client-uf': UF
        };

        $.ajax({
            type: "POST",
            url: "../../submits/Cliente/salvar_dados.php",
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
                        window.location.href = "/sistema/html/TelaPrincipal/Dashboard.html";
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
});