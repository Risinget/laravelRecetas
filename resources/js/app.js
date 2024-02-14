/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css'; // Importa los estilos de SweetAlert2

import './bootstrap';
import { createApp } from 'vue';
import FechaReceta from './components/FechaReceta.vue'
import EliminarReceta from './components/EliminarReceta.vue'

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

// import ExampleComponent from './components/ExampleComponent.vue';
// app.component('example-component', ExampleComponent);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

// Vue.config.ignoredElements = ['trix-editor'] # PARA IGNORAR ELEMENTOS QUE NO SON DE VUE O PARA VUE
app.component('fecha-receta', FechaReceta);
app.component('eliminar-receta', EliminarReceta);
// Usa el plugin VueSweetalert2 con la aplicación Vue
app.use(VueSweetalert2);

// Revisar que funciones globales se añadieron de $
// console.log(app.config.globalProperties);

app.mount('#app');

