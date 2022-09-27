// window.onload = () => {
//     console.log('validando');

//     let btnEnviar = document.querySelector('form button');
//     btnEnviar.onclick = (evento) => {
//         //previne o evento padrão == pausa o envio do formulário
//         evento.preventDefault();
//     }
// }

window.addEventListener('load', () => {
    console.log('validando');

    let btnEnviar = document.querySelector('form button');
    btnEnviar.onclick = (evento) => {
        //previne o evento padrão == pausa o envio do formulário
        evento.preventDefault();

        console.log('Clicou no botão enviar!');

        // Selecionando o formulário
        let form = document.querySelector('form');
        // Selecionando o campo telefone
        let inputTelefone = document.querySelector('#telefone');

        // Verificando se o valor preenchido no Telefone tem pelo menos 10 caracteres
        if (inputTelefone.value.length < 10){
            // Mensagem de erro para o usuário
            alert('Coloque um número de telefone válido.') 
            } else {
                // Envio do formulário
                form.submit();
    }
})

