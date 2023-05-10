var accion = 'nuevo',
    idUsuario = 0;
document.addEventListener("DOMContentLoaded", e=>{
    frmUsuario.addEventListener("submit", event=>{
        event.preventDefault();

        let usuario = {
            idUsuario,
            usuario: txtusuario.value,
            clave: txtclave.value,
            nombre: txtnombre.value,
            tipo: cbotipo.value
        };
        fetch(`procesar.php?accion=${accion}&usuario=${JSON.stringify(usuario)}`)
        .then(resp=>resp.json())
        .then(data=>{
            if( data ){
                nuevoUsuario();
                obtenerDatosUsuarios();
            }else{
                alert("Error al intentar guardar el registro");
                console.log( data );
            }
        }).catch(er=>{
            console.log( er );
        });
    });
    obtenerDatosUsuarios();
});
function eliminarUsuario(usuario){
    if( confirm(`Esta seguro de eliminar a ${usuario.nombre}?`) ){
        fetch(`procesar.php?accion=eliminar&idUsuario=${usuario.idUsuario}`)
        .then(resp=>resp.json())
        .then(data=>{
            if( data ){
                nuevoUsuario();
                obtenerDatosUsuarios();
            }else{
                alert("Error al intentar eliminar el registro");
                console.log( data );
            }
        }).catch(er=>{
            console.log( er );
        });
    }
}
function modificarUsuario(usuario){
    accion = 'modificar';
    idUsuario = usuario.idUsuario;
    txtusuario.value = usuario.usuario;
    txtclave.value = usuario.clave;
    txtnombre.value = usuario.nombre;
    cbotipo.value = usuario.tipo;
}
function obtenerDatosUsuarios(){
    fetch('procesar.php?accion=consultar')
    .then(resp=>resp.json())
    .then(usuarios=>{
        let filas = '',
            $tblUsuario = document.querySelector('#tblUsuarios > tbody');
        usuarios.forEach(usuario=>{
            filas += `
                <tr onClick='modificarUsuario(${JSON.stringify(usuario)})'>
                    <td>${usuario.usuario}</td>
                    <td>${usuario.nombre}</td>
                    <td>${usuario.tipo}</td>
                    <td>
                        <button class="btn btn-danger" onClick='eliminarUsuario(${JSON.stringify(usuario)})'>DEL</button>
                    </td>
                </tr>
            `;
        });
        $tblUsuario.innerHTML = filas;
    })
    .catch(err=>{
        console.log(err);
    })
}
function nuevoUsuario(){
    accion = 'nuevo';
    idUsuario = 0;
    txtusuario.value = "";
    txtclave.value = "";
    txtnombre.value = "";
}