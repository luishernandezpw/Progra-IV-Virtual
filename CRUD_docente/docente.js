var accion = 'nuevo',
    idDocente = 0;
document.addEventListener("DOMContentLoaded", e=>{
    frmDocente.addEventListener("submit", event=>{
        event.preventDefault();

        let docente = {
            idDocente,
            nombre: txtnombre.value,
            direccion: txtdireccion.value,
            telefono: txttelefono.value,
            dui: txtdui.value
        };
        fetch(`procesar.php?accion=${accion}&docente=${JSON.stringify(docente)}`)
        .then(resp=>resp.json())
        .then(data=>{
            if( data ){
                nuevoDocente();
                obtenerDatosDocentes();
            }else{
                alert("Error al intentar guardar el registro");
                console.log( data );
            }
        }).catch(er=>{
            console.log( er );
        });
    });
    obtenerDatosDocentes();
});
function eliminarDocente(docente){
    if( confirm(`Esta seguro de eliminar a ${docente.nombre}?`) ){
        fetch(`procesar.php?accion=eliminar&idDocente=${docente.idDocente}`)
        .then(resp=>resp.json())
        .then(data=>{
            if( data ){
                nuevoDocente();
                obtenerDatosDocentes();
            }else{
                alert("Error al intentar eliminar el registro");
                console.log( data );
            }
        }).catch(er=>{
            console.log( er );
        });
    }
}
function modificarDocente(docente){
    accion = 'modificar';
    idDocente = docente.idDocente;
    txtnombre.value = docente.nombre;
    txtdireccion.value = docente.direccion;
    txttelefono.value = docente.telefono;
    txtdui.value = docente.dui;
}
function obtenerDatosDocentes(){
    fetch('procesar.php?accion=consultar')
    .then(resp=>resp.json())
    .then(docentes=>{
        let filas = '',
            $tblDocente = document.querySelector('#tblDocentes > tbody');
        docentes.forEach(docente=>{
            filas += `
                <tr onClick='modificarDocente(${JSON.stringify(docente)})'>
                    <td>${docente.nombre}</td>
                    <td>${docente.direccion}</td>
                    <td>${docente.telefono}</td>
                    <td>${docente.dui}</td>
                    <td>
                        <button class="btn btn-danger" onClick='eliminarDocente(${JSON.stringify(docente)})'>DEL</button>
                    </td>
                </tr>
            `;
        });
        $tblDocente.innerHTML = filas;
    })
    .catch(err=>{
        console.log(err);
    })
}
function nuevoDocente(){
    accion = 'nuevo';
    idDocente = 0;
    txtnombre.value = "";
    txtdireccion.value = "";
    txttelefono.value = "";
    txtdui.value = "";
}