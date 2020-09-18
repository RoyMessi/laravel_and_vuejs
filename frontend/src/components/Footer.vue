<template>
    <footer class="bg-white d-flex justify-content-between py-1 px-2">
        <div>Incomplete <span class="font-weight-bold">{{tasksStatus.incomplete}}</span></div>
        <div>Completed <span class="font-weight-bold">{{tasksStatus.completed}}</span></div>
        <div>Total <span class="font-weight-bold">{{tasksStatus.total}}</span></div>
    </footer>
</template>

<script>
export default {
    name: 'Footer',
    props: ['tasksStatus']
}
</script>

<style scoped>

</style>