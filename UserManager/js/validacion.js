formRegister.addEventListener("submit", function (e) {
    let errores = [];

    const nombre = document.getElementById("nombre").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();
    const edad = document.getElementById("edad").value.trim();

    /* ===== FASE 1: CAMPOS OBLIGATORIOS ===== */
    if (nombre === "" || email === "" || password === "" || edad === "") {
        e.preventDefault();
        mostrarErrores("errores", ["Todos los campos son obligatorios."]);
        return; 
    }

    /* ===== FASE 2: VALIDACIONES ESPECÍFICAS ===== */
    if (!validarEmail(email)) {
        errores.push("El email no es válido.");
    }

    if (!validarPassword(password)) {
    errores.push("La contraseña debe tener al menos 8 caracteres y contener letras y números.");
    }

    if (!validarNombre(nombre)) {
    errores.push("El nombre debe tener al menos 3 letras y no contener números ni símbolos.");
    }


    if (isNaN(edad)) {
        errores.push("La edad debe ser un número.");
    } else if (edad < 0 || edad > 120) {
        errores.push("La edad debe estar entre 0 y 120 años.");
    }

    if (errores.length > 0) {
        e.preventDefault();
        mostrarErrores("errores", errores);
    }
    });

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

    // ===== FUNCIÓN VALIDAR PASSWORD =====
    function validarPassword(password) {
    const regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    return regex.test(password);
    }

    // ===== FUNCIÓN VALIDAR NOMBRE =====
    function validarNombre(nombre) {
    const regex = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{3,}$/;
    return regex.test(nombre);
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

