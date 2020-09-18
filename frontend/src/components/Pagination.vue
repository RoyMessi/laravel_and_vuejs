<template>
    <nav aria-label="Page navigation" class="d-flex justify-content-center mt-2">
        <ul class="pagination pagination-sm">
            <li class="page-item" :class="{disabled:isFirstPage}">
                <a href="#" class="page-link" @click=previousPage>Previous</a>
            </li>
            <li class="page-item" v-for="n in paginationMeta.last_page"
                :key=n
                :class="{active:isCurrentPage(n) }">
                <a href="#" class="page-link" @click=goToPage(n)>{{n}}</a>
            </li>
            <li class="page-item" :class="{disabled:isLastPage}">
                <a href="#" class="page-link" @click=nextPage>Next</a>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: 'Pagination',
    props: ['paginationMeta'],
    computed:{
        isFirstPage(){
            return this.paginationMeta.current_page == 1;
        },
        isLastPage(){
            return this.paginationMeta.current_page == this.paginationMeta.last_page;
        }
    },
    methods:{
        isCurrentPage(pageNumber){
            return this.paginationMeta.current_page == pageNumber;
        },
        goToPage(pageNumber){
            this.$emit('goToPage', pageNumber);
        },
        previousPage(){
            if(this.paginationMeta.current_page - 1 == 0)
                return false;
            this.$emit('goToPage', this.paginationMeta.current_page - 1);
        },
        nextPage(){
            if(this.paginationMeta.current_page + 1 > this.paginationMeta.last_page)
                return false;
            this.$emit('goToPage', this.paginationMeta.current_page + 1);
        }
    }
}
</script>

<style scoped>
.page-item .page-link{
    color:#343a40;
}
.page-item.active .page-link{
    background-color:#343a40;
    border-color:#343a40;
    color:#fff;
}
.page-item.disabled{
    cursor: not-allowed;
}
.page-item.disabled .page-link{
    color: #6c757d;
}
</style>