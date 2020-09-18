<template>
    <ul class="table-scroll list-group">
        <li class="list-group-item list-group-item-action task"
            v-for="(task,index) in tasks" :key=index :class="{completed: task.is_completed}">
            <div class="d-flex justify-content-between align-items-center">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" :id="'customCheck'+index" class="custom-control-input"
                        :checked=task.is_completed
                        @change=toggleCompleted(index)>
                    <label :for="'customCheck'+index" class="custom-control-label">{{task.text}}</label>
                </div>
                <button class="btn btn-sm btn-danger" @click=removeTask(index)>×</button>
            </div>
        </li>
    </ul>
</template>

<script>
export default {
    name: 'TodoList',
    props: ['tasks'],
    methods:{
        toggleCompleted(index){
            this.$emit('toggleCompleted', index);
        },
        removeTask(index){
            this.$emit('removeTask', index);
        },
        scrollListUp(){
            this.$el.scroll({
                top: 0,
                behavior: 'smooth'
            });
        }
    },
    watch:{
        tasks(){
            this.scrollListUp();
        }
    }
}
</script>

<style scoped>
.list-group-item[data-v-3de47834]:nth-of-type(odd){
    background-color: rgba(0,0,0,.05);
}
.task.completed label[data-v-3de47834]{
    text-decoration: line-through;
    color: #979393;
}
.table-scroll[data-v-3de47834]{
    /* height: 460px; */
    height: 70vh;
    overflow-x: hidden;
    overflow-y: scroll;
}
</style>