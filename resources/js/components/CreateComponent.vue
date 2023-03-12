<template>
    <div class="mt-1">
        <h1 class="text-center">Todo App</h1>
        <label for="exampleInputEmail1" class="form-label">Add new task to your todo list, now!</label>
        <form class="d-flex justify-content-space-between align-items-center mb-4 w-100">
            <input type="text" class="form-control" id="content" v-model="content">
            <button type="submit" class="btn btn-primary ms-lg-2 w-25" v-on:click.prevent="addTodo">Add</button>
        </form>
    </div>
</template>
<script>
export default {
    name: "CreateComponent",

    data(){
        return {
            content: null,
            is_completed: null,
            obj:{
                color: 'Green',
                number: 32,
                is_completed: true,
            }
        }
    },

    mounted() {
    },

    methods:{
        addTodo() {
            this.is_completed = false;
            axios
                .post('/api/todos', {content: this.content, is_completed: this.is_completed})
                .then(res => {
                    this.content = null;
                    console.log(res);
                    this.$parent.$refs.index.getTodos(); //вызвали метода из IndexComponent
                })
                .catch(err => console.log(err));
        }
    }
}
</script>

<style scoped>

</style>
