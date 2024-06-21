
        function confirmCreate() {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Agregarás un nuevo evento!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, agregar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('eventoForm').submit();

                    // Ejemplo de mensaje de éxito con SweetAlert
                    Swal.fire(
                        '¡Agregado!',
                        'El evento ha sido agregado.',
                        'success'
                    );
                }
            });
        }

        function deleteEvento(eventoId) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit del formulario para eliminar
                    document.getElementById('deleteForm'+eventoId).submit();

                    // Ejemplo de mensaje de éxito con SweetAlert
                    Swal.fire(
                        '¡Eliminado!',
                        'El evento ha sido eliminado.',
                        'success'
                    );
                }
            });
        }
        function updateEvento() {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Actualizarás este evento!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, actualizarlo'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('updateForm').submit();

                    // Ejemplo de mensaje de éxito con SweetAlert
                    Swal.fire(
                        '¡Actualizado!',
                        'El evento ha sido actualizado.',
                        'success'
                    );
                }
            });
        }
