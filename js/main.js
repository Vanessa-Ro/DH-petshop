// onload = evento de carregamento da página, só executa o js depois que o css e o html carregar
window.addEventListener('load', () => {
// console.log("Arquivo main.js está sendo executado");
// // console.log(document);
// Pessoa em array
// let pessoa = ["Hendy", 25];
// // Pessoa array
// let pessoaObj = {
//     "nome": "Hendy",
//     "idade": 25
// };

// console.log(pessoaObj);
// console.log(pessoaObj.nome);

// querySelector retorna somente o primeiro elemento encontrado
let inputNome = document.querySelector('input');
console.log(inputNome.id);

// querySelectorAll retorna lista de elementos encontrados
let dadosForm = document.querySelectorAll('input');
console.log(dadosForm);

// selecionando o título 
let tituloPrincipal = document.querySelector('h1');
// atribuindo um novo valor ao título / altera conteúdo do elemento
tituloPrincipal.innerText = "Faça parte do nosso time";

// selecionando o input email
let inputEmail = document.querySelector('#email');
// adicionar placeholder -> primeiro o placeholder e depois o valor que deseja
inputEmail.setAttribute('placeholder', 'jane@email.com');

let inputCargaHoraria = document.querySelector('#carga-horaria');
// para saber o que tem no #carga-horaria
console.log(inputCargaHoraria.innerHTML);

// adicionando a opção Trainee na carga horária, se deixar só = ele vai substituir e por isso vai ficar só Trainee como opção
inputCargaHoraria.innerHTML += '<option value="Trainee">Trainee<option>';

// alterando style (css)
tituloPrincipal.style.color = 'orange';

let elementoDiv = document.querySelector('div');
// Adicionando uma classe no elemento div
// elementoDiv.classList.add('novaClasse');
// removendo a classe container da div
// elementoDiv.classList.remove('container');

})