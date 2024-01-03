import LoginRegister from '../modules/LoginRegister'
const loginRegister=new LoginRegister();
document.addEventListener("DOMContentLoaded", () => {
    loginRegister.events();
});