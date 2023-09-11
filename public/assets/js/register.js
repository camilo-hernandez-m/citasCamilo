//Url base del proyecto
const url = "http://citas.test"
//Atributos del formulario
const email = document.getElementById('email')


//Función validar correo electronico
const validarEmail = email => {
    // Validamos que el campo tenga solo un @  y un punto
    // el @ no puede ser el primer caracter del correo 
    // y el punto debe ir posicionando al menos un carácter después de la @
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
}

//Función para solicitar datos al servidor
const validacion = async (e) => {
    //Validamos que el campo correo este lleno
    if (email.value != '') {
        //Validamos que el formato del correo sea valido
        if (validarEmail(email.value)) {
            //Los datos que enviaremos al controlador
            const data = {
                email: email.value
            }
            //Codificamos los datos
            const request_data = JSON.stringify(data)
            try {
                //Realizamos el envio a la ruta del controlador
                let ajax = await fetch(url + '/register/email', {
                    method: 'POST',
                    body: request_data
                })
                //Respuesta servidor
                let json = await ajax.json()

                //Validamos el codigo de respuesta
                if (json.status) {
                    console.log(json.data)
                } else {
                    console.log(json.data)
                }
            } catch (err) {
                let message = err.statusText || 'Ocurrio un error'
            } finally {
            }
        } else {
            alert("Por favor, escribe un correo electrónico válido");
        }
    }
}

//Eventos del formulario
email.addEventListener('blur', validacion)