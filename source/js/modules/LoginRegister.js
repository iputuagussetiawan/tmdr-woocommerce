class LoginRegister {
    constructor() {
        this.url = window.location.href;
        this.url=this.url.split('/');
        this.urlSlug = this.url[this.url.length - 2];
    }
    // 2. events
    events() {
        if (this.urlSlug === 'login' || this.urlSlug === 'masuk' || this.urlSlug === 'my-account' || this.urlSlug === 'akun-saya') {
            let loginDivs = document.querySelectorAll('#customer_login .u-column2');
            if (loginDivs) {
                loginDivs.forEach(function(loginDiv) {
                    loginDiv.remove();
                });
            }
        }
        if (this.urlSlug === 'register' || this.urlSlug === 'daftar') {
            let registerDivs = document.querySelectorAll('#customer_login .u-column1');
            if (registerDivs) {
                registerDivs.forEach(function(registerDiv) {
                    registerDiv.remove();
                });
            }
        }
    }
    // 3. methods (function, action...)
}
export default LoginRegister