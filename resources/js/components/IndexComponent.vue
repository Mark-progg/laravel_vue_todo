<template>
    <div>
        <div class="mt-3">
            <h3>Active</h3>
            <table class="table">
                <colgroup>
                    <col style="width: 1%;">
                    <col>
                    <col style="width: 1%;">
                    <col style="width: 1%;">
                </colgroup>
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Task</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <template v-for="todo in todosNotCompleted">
                    <ShowComponent :todo="todo" :ref="`show_${todo.id}`"></ShowComponent>
                    <EditComponent :todo="todo" :ref="`edit_${todo.id}`"></EditComponent>
                </template>
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <h3>Completed</h3>
            <table class="table">
                <colgroup>
                    <col style="width: 1%;">
                    <col>
                    <col style="width: 1%;">
                    <col style="width: 1%;">
                </colgroup>
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Task</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <template v-for="todo in todosCompleted">
                    <ShowComponent :todo="todo" :ref="`show_${todo.id}`"></ShowComponent>
                    <EditComponent :todo="todo" :ref="`edit_${todo.id}`"></EditComponent>
                </template>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import EditComponent from "@/components/EditComponent.vue";
import ShowComponent from "@/components/ShowComponent.vue";

export default {
    name: "IndexComponent",
    components: {
        EditComponent,
        ShowComponent
    },

    data(){
        return{
            debugFlag: true,
            todos: null,
            todosCompleted: null,
            todosNotCompleted: null,
            editTodoId: null
        }
    },

    mounted() {
        this.getTodos();
    },

    methods: {
        getTodos(){
            axios.get('/api/todos')
                .then(res => {
                    this.debugFlag && console.log(res.data);
                    this.todos = res.data;
                    this.sortTodos();
                    this.debugFlag && console.log(this.todosCompleted);
                    this.debugFlag && console.log(this.todosNotCompleted);
                })
                .catch(err => console.log(err));

        },

         sortTodos(){
             this.todosCompleted = this.todos.filter(item => item.is_completed === 1);
             this.todosNotCompleted = this.todos.filter(item => item.is_completed === 0);
         },

        switchIsCompletedTodo(id, is_completed){
            is_completed = !Boolean(is_completed);
            axios.patch(`/api/todos/${id}`, {is_completed: is_completed})
                .then(res => {
                    this.getTodos();
                })
                .catch(err => console.log(err));
        },

        isEdit(id){
            return this.editTodoId === id;
        }
    }
}
</script>

<style scoped>

</style>
