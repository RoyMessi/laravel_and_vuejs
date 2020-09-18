<template>
    <div id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter2Title" aria-hidden="true" class="modal fade bg-modal">
        <div role="document" class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalCenter2Title" class="modal-title">Remove Task</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body"> Are you sure you wish to remove this task? </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancel</button>
                    <button type="button" class="btn btn-danger">Remove</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ModalRemoveTask'
}
</script>

<style scoped>

</style>