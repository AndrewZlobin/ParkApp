<div class="form-container sign-up-container">
    <form method="post" action="/account/signup" name="signUpForm" enctype="multipart/form-data">
        <input class="validate" type="text" name="login" placeholder="Имя"/>
        <input class="validate" type="tel" name="phone" placeholder="Телефон"/>
        <input class="validate" type="email" name="email" placeholder="Почта" />
        <input class="validate" type="password" name="password" placeholder="Пароль" />
        <button type="submit">Регистрация</button>
    </form>
</div>
<div class="form-container sign-in-container">
    <form method="post" action="/account/signin" name="signInForm" enctype="multipart/form-data">
        <h1>Авторизация</h1>
        <input class="validate" type="email" name="email" placeholder="Почта" />
        <input class="validate" type="password" name="password" placeholder="Пароль" />
        <button type="submit">Авторизация</button>
    </form>
</div>
<div class="overlay-container">
    <div class="overlay">
        <div class="overlay-panel overlay-left">
            <h1>Добро пожаловать!</h1>
            <p>Нажмите для авторизации</p>
            <button class="ghost" id="signIn">Авторизация</button>
        </div>
        <div class="overlay-panel overlay-right">
            <h1>Добро пожаловать!</h1>
            <p>Нажмите для регистрации</p>
            <button class="ghost" id="signUp">Регистрация</button>
        </div>
    </div>
</div>