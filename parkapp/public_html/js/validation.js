class FormValidator{
    constructor(form) {
        this._form = form;
        // this._validElems = document.querySelectorAll(".validate");
        this._validElems = form.elements;
        this._form.addEventListener('submit', this.checkSome.bind(this));
        this._err = [];
        this._alert = document.createElement("div");
        this._content = document.createElement("div");
        this._close = document.createElement("span");
        this._close.addEventListener("click", this.closeAlert.bind(this));

    };
    addRules(rules){
        this._rules = rules.rules;
        this._messages = rules.messages;

    };

    checkSome(event) {
        event.preventDefault();
        // let alert = document.createElement("div");
        this._alert.className = "alert";
        document.body.insertBefore(this._alert, document.body.firstChild);

        this._content = document.createElement("div");
        this._content.className = "alert-content";
        this._alert.appendChild(this._content);

        this._close.className = "close-btn";
        this._close.innerHTML = "&times;";

        this._content.appendChild(this._close);
        for (let i = 0; i < this._validElems.length-1; i++) {

            if (!this._rules[this._validElems[i].name].test(this._validElems[i].value) || this._validElems[i].value == null) {

                /*
                Сохранения числа ошибок, полученных при заполнении формы, в массив, с выводом в консоль
                */
                this._err.push([this._validElems[i].value]);
                // console.log(this._err);
                // console.log(this._validElems[i].name);

                /*
                Добавление на html сообщения о том, где и что введено неправильно
                */
                // let input = document.getElementsByName(this._validElems[i].name);
                // console.log(input[0].parentElement);

                let notification = document.createElement("p");
                // notification.className = "alert-p";
                // notification.className = "alert-auth";
                notification.innerHTML = this._messages[this._validElems[i].name];
                this._content.appendChild(notification);
                // input[0].parentElement.insertBefore(notification, input[0].nextElementSibling);

                // document.body.insertBefore(notification, document.body.firstChild);

                // input[0].parentElement.after(notification);
                // console.log(typeof input[0].parentElement);
                /*
                // Спустя 4 секунды сообщение исчезает благодаря SetTimeout
                */

                // setTimeout(function () {
                //     // notification.parentNode.removeChild(notification)
                //     alert.remove();
                //     notification.remove();
                //     close.remove();
                // }, 4000);
                document.getElementsByName(this._validElems[i].name)[0].focus();
            } else {
                let notification = document.createElement("p");
                notification.innerHTML = "Успешно!";
                this._content.appendChild(notification);
            }
        }
    };

    isValid() {
        if (this._err.length > 0) {
            console.warn("Ошибок: ", this._err.length);
            this._err = [];
            return;
        }
        return true;
        // if(this._err.length === 0 ) {
        //     return true;
        // } else {
        //     console.warn("Ошибок:", this._err.length);
        //     return false;
        // }
    };

    closeAlert(event) {
        if (event.target === this._close){
            this._alert.remove();
            this._close.remove();
            this._content.remove();
        }
    }
}

for(let i = 0; i < document.forms.length; i++) {
    let formToValidate = document.forms[i];
    // console.log(document.querySelectorAll(".validate"));
    let formValidator = new FormValidator(formToValidate);

    formValidator.addRules({
        rules: {
            login: /^[a-z0-9_-]{8,16}$/,
            password: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/,
            email: /^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/,
            phone: /(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?/
        },
        messages: {
            login: "Логин должен содержать цифры, строчные буквы, символы - и _. Длина - от 8 до 16 символов",
            password: "Пароль должен содержать строчные и прописные латинские буквы, цифры.",
            email: "Задан неверный формат email, попробуйте ещё раз.",
            phone: "Задан неверный телефонный номер."
        }
    });

    formToValidate.addEventListener("submit", noErorrs);

    function noErorrs() {
        if (formValidator.isValid()) {
            console.info("Validation has no errors!");

            let data = new FormData(this);
            console.log(document.forms.signUpForm);
            console.log(this);

            // for (let j = 0; j < this.elements.length-1; j++) {
            //     // let get = this.elements[j].value;
            //     // console.log(typeof get);
            //     data.append(this.elements[j].name, this.elements[j].value);
            // }
            console.log(data.get('email'));
            //
            let xhr = new XMLHttpRequest(); // объект запроса
            console.log(xhr);

            xhr.open("POST", this.action, true);
            xhr.send(data);
            console.log(this.action);
            console.log(data);
            //
            xhr.onload = function (event) {
                if (xhr.status == 200) {
                    window.location.href = '/account';
                } else {
                    window.location.href = this;
                }
            };
        }
    }

// console.log(formValidator._err);

    function responseHandler(statusText) {
        console.dirxml("ответ сервера: " + statusText);
    }
}