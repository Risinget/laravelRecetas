<template>

    <button class="btn btn-danger d-block w-100 mb-2" value="" v-on:click="eliminarReceta">Eliminar</button>

</template>

<script>

export default {

    props: ['recetaId'],
    methods:{
        eliminarReceta(){

           this.$swal({
                title: "¿Deseas eliminar esta receta?",
                text: "Una vez eliminada, no se puede recuprear",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "No",
                confirmButtonText: "Si"
            }).then((result) => {
                if (result.isConfirmed) {

                    const params = {
                        id: this.recetaId
                    }
                    // Enviar la petición 
                    axios.post(`/recetas/${this.recetaId}`, { params, _method: 'delete' })
                        .then(respuesta => {
                            console.log(respuesta)
                            const elementToRemove = document.getElementById(`${this.recetaId}-tr`);
                            if (elementToRemove) {
                                elementToRemove.parentNode.removeChild(elementToRemove);
                            }
                            this.$swal({
                                title: "Receta eliminada!",
                                text: "Se eliminó la receta",
                                icon: "success"
                            });

                        })
                        .catch(error =>{

                            console.log(error)
                        })

                    
                }
            });
        }
    }
}
</script>