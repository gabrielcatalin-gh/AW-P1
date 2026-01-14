document.addEventListener("DOMContentLoaded", function () {

    // ===== VALIDACIÓN REGISTRO =====
    const formRegister = document.getElementById("formRegister");
    if (formRegister) {
        formRegister.addEventListener("submit", function (e) {
            let errores = [];

            const nombre = document.getElementById("nombre").value.trim();
            const email = document.getElementById("email").value.trim();
            const password = document.getElementById("password").value.trim();

            if (nombre === "") errores.push("El nombre es obligatorio.");
            if (email === "") errores.push("El email es obligatorio.");
            if (!validarEmail(email)) errores.push("El email no es válido.");
            if (password === "") errores.push("La contraseña es obligatoria.");

            if (errores.length > 0) {
                e.preventDefault();
                mostrarErrores("errores", errores);
            }
        });
    }

    // ===== VALIDACIÓN LOGIN =====
    const formLogin = document.getElementById("formLogin");
    if (formLogin) {
        formLogin.addEventListener("submit", function (e) {
            let errores = [];

            const email = document.getElementById("loginEmail").value.trim();
            const password = document.getElementById("loginPassword").value.trim();

            if (email === "") errores.push("El email es obligatorio.");
            if (!validarEmail(email)) errores.push("El email no es válido.");
            if (password === "") errores.push("La contraseña es obligatoria.");

            if (errores.length > 0) {
                e.preventDefault();
                mostrarErrores("erroresLogin", errores);
            }
        });
    }

    // ===== FUNCIÓN VALIDAR EMAIL =====
    function validarEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    // ===== MOSTRAR ERRORES =====
    function mostrarErrores(id, errores) {
        const div = document.getElementById(id);
        div.innerHTML = "";
        errores.forEach(error => {
            const p = document.createElement("p");
            p.textContent = error;
            p.classList.add("error");
            div.appendChild(p);
        });
    }

});
