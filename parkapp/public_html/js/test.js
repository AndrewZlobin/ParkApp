/*Для формы "Добавить объект и арендатора"*/

let addObject = document.forms.addObject;
addObject.addEventListener("submit", addingObject);
console.log(addObject);
function addingObject(event){
    event.preventDefault();
    let addObject = new FormData(this);
    let xhr = new XMLHttpRequest();
    xhr.open("POST", this.action, true);
    xhr.send(addObject);
    xhr.onload = function (event) {
        if (xhr.status == 200) {
            alert("Успешно!");
        } else {
            alert("Возникли ошибки! Обратитесь в отдел разработки");
        }
    }
}

/*Для всех форм на странице "Посмотреть все объекты"*/

for(let i = 1; i < document.forms.length; i++) {
   // console.log(document.forms[i]);
   // console.log(document.forms[i].elements);
    for (let j = 0; j < document.forms[i].elements.length; j++) {
        // console.log(document.forms[i].elements[j].name);
        let formAdmin = document.forms[i];
        formAdmin.addEventListener("submit", noReload);
    }
}

function noReload(){
    let someData = new FormData(this);
    let xhr = new XMLHttpRequest();
    xhr.open("POST", this.action, true);
    xhr.send(someData);
    xhr.onload = function (event) {
        if (xhr.status == 200) {
            alert("Успешно!");
        } else {
            alert("Возникли ошибки! Обратитесь в отдел разработки");
        }
    }
}