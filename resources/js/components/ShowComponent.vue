<template>
    <tr :class="this.$parent.isEdit(todo.id) ? 'd-none' : ''">
        <th scope="row">
            <input v-if="todo.is_completed === 1" class="form-check-input" type="checkbox" value="" id="flexCheckDefault" v-on:click.prevent="this.$parent.switchIsCompletedTodo(todo.id, todo.is_completed)" checked>
            <input v-else class="form-check-input" type="checkbox" value="" id="flexCheckDefault" v-on:click.prevent="this.$parent.switchIsCompletedTodo(todo.id, todo.is_completed)">
        </th>
        <td>{{todo.content}}</td>
        <td><a href="#" v-on:click.prevent="changeEditTodoId(todo.id, todo.content)" class="btn btn-primary">Edit</a></td>
        <td><a href="#" v-on:click.prevent="deleteTodo(todo.id)" class="btn btn-danger">Delete</a></td>
    </tr>
</template>

<script>
export default {
    name: "ShowComponent",

    props: [
        'todo'
    ],

    methods: {
        deleteTodo(id){
            axios.delete(`/api/todos/${id}`)
                .then(res => {
                    this.$parent.getTodos();
                    console.log(res);
                })
                .catch(err => console.log(err));
        },

        changeEditTodoId(id, content) {
            this.$parent.editTodoId = id;
            let editName = `edit_${id}`;
            let fullName = this.$parent.$refs[editName][0];
            fullName.editContent = content;
        }
    }
}
</script>

<style scoped>

</style>
