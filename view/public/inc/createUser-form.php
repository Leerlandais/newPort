<form action="" method="POST" id = "loginForm">
    <label for="newNomInp" id="logLabelName"></label>
    <input type="text" name="newNomInp" id="nomInp" aria-describedby="userNameField" placeholder="User Name">
    <label for="newPwdInp" id="logLabelPwd"></label>
    <input type="text" name="firstInp" id="firstNameInp" aria-describedby="userNameField" placeholder="First Name">
    <label for="nomInp" id="logLabelName"></label>
    <input type="text" name="secondInp" id="lastNameInp" aria-describedby="userNameField" placeholder="Last Name">
    <label for="pwdInp" id="logLabelPwd"></label>
    <label for="emailInp" id=logLabelEmail></label>
    <input type="email" name="emailInp" id="emailAddInp" placeholder="Email">
    <input type="password" name="newPwdInp" id="pwdInp" placeholder="Password">
    <label for="newPwdCheck" id="logLabelPwd"></label>
    <input type="password" name="newPwdCheck" id="pwdInp" placeholder="Password">
    <label for="logLangEN"><img src="img/gb.svg" alt="gbFlag" class="langFlag">
    <input type="radio" name="language" id="logLangEN" value="en"></label>
    <label for="logLangFR"><img src="img/fr.svg" alt="frFlag" class="langFlag">
    <input type="radio" name="language" id="logLangFR" value="fr" checked></label>
    <button type="submit" id="submitLogin"></button>
</form>
