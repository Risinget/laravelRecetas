<template>
    <span v-text="formatearFecha"></span>
</template>

<script>
import moment from 'moment';
import esLocale from 'moment/locale/es'; // Importa el locale específico


export default {
    props: ['fecha'],
    computed: {
        formatearFecha() {

            // Establecer el idioma de Moment.js a español
            moment.locale('es', {
                months: 'enero_febrero_marzo_abril_mayo_junio_julio_agosto_septiembre_octubre_noviembre_diciembre'.split('_'),
            });

            // Crear un objeto moment con la fecha deseada
            const fecha = moment(this.fecha);

            // Formatear la fecha en el formato deseado
            const fechaFormateada = fecha.format('D [de] MMMM [del] YYYY');

            // Imprimir la fecha formateada
            console.log(fechaFormateada); // Debería imprimir "2 de febrero del 2024"

            return fechaFormateada; // "2 de febrero del 2024"
        }
    }
}
</script>
