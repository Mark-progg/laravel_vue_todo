<template>
    <div class="background-custom-1">
        <div class="container-sm py-1 h-100 w-50">
            <div class="card mt-1 p-5">
                <CreateComponent ref="create"></CreateComponent>
                <IndexComponent ref="index"></IndexComponent>
            </div>
        </div>
    </div>
</template>

<script>
import CreateComponent from "@/components/CreateComponent.vue";
import IndexComponent from "@/components/IndexComponent.vue";

export default {
    name: "TodoApp",
    components:{
        CreateComponent,
        IndexComponent,
    },
    mounted() {

    },

    methods: {
        parentLog(){
            console.log('this is parent component');
        }
    }
}
</script>

<style scoped>
    .background-custom-1{
        height: 100vh;
        background: radial-gradient(50% 123.47% at 50% 50%, #00ff94 0%, #720059 100%),
        linear-gradient(121.28deg, #669600 0%, #ff0000 100%),
        linear-gradient(360deg, #0029ff 0%, #8fff00 100%),
        radial-gradient(100% 164.72% at 100% 100%, #6100ff 0%, #00ff57 100%),
        radial-gradient(100% 148.07% at 0% 0%, #fff500 0%, #51d500 100%);
        background-blend-mode: screen, color-dodge, overlay, difference, normal;
    }
</style>
