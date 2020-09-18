<template>
    <div id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" class="modal fade bg-modal"
    :class="{show:togglePopup}">
        <div role="document" class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalCenterTitle" class="modal-title">New Task</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close" @click=closePopup><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <textarea class="form-control"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary" @click=closePopup>Cancel</button>
                    <button type="button" class="btn btn-primary" @click=addTask>Create</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ModalAddTask',
    props:['togglePopup'],
    updated(){
        this.resetTextarea();
    },
    methods:{
        resetTextarea(){
            const textarea = this.$el.querySelector('textarea');
            textarea.value = '';
            if (this.togglePopup)
                textarea.focus();
        },
        closePopup(){
            this.$emit('toggleModalAddTask', false);
        },
        addTask(){
            this.$emit('addTask',{
                text: this.$el.querySelector('textarea').value.trim(),
                is_completed: false
            });
            this.$emit('toggleModalAddTask', false);
        }
    }
}
</script>

<style scoped>

</style>