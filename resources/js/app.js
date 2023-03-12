import './bootstrap';
import {createApp} from 'vue';
import TodoApp from "./components/TodoApp.vue";
import '../sass/app.scss';

const app = createApp(TodoApp);

app.component('TodoApp', TodoApp);

app.mount('#app');
