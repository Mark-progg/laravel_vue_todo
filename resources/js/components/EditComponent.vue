<template>
    <tr :class="this.$parent.isEdit(todo.id) ? '' : 'd-none'">
        <th scope="row">
            <input v-if="todo.is_completed === 1" class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
            <input v-else class="form-check-input" type="checkbox" value="" id="flexCheckDefault" disabled>
        </th>
        <td><input type="text" v-model="editContent" class="form-control"></td>
        <td><a href="#" v-on:click.prevent="updateTodo(todo.id)" class="btn btn-success">Update</a></td>
        <td></td>
    </tr>
</template>

<script>
export default {
    name: "EditComponent",

    props: [
        'todo'
    ],

    data(){
        return{
            debugFlag: false,
            editContent: ''
        }
    },

    mounted() {
    },

    methods: {

        updateTodo(id){
            this.debugFlag && console.log(id);
            this.$parent.editTodoId = null;
            this.debugFlag && console.log(this.editContent);
            axios.patch(`/api/todos/${id}`, {content: this.editContent})
                .then(res => {
                    this.debugFlag && console.log(res.data);
                    this.$parent.getTodos();
                })
                .catch(err => console.log(err));
        }
    }
}
</script>

<style scoped>

</style>
