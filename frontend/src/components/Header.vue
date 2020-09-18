<template>
    <header class="bg-dark text-white d-flex justify-content-between px-3 py-1 align-items-center">
        <div>
            <h1>Todo List</h1>
            <small :style="{display:paginationMeta.total ? 'block' : 'none'}"> {{paginationMeta.from}}-{{paginationMeta.to}} of {{paginationMeta.total}} </small>
        </div>
        <button class="btn btn-sm btn-primary" @click=toggleModalAddTask>+</button>
    </header>
</template>

<script>
export default {
    name: 'Header',
    props:['paginationMeta'],
    methods:{
        toggleModalAddTask(){
            this.$emit('toggleModalAddTask', true);

        }
    }
}
</script>

<style scoped>

</style>