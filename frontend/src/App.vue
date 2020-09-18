<template>
  <div id="app" class="container">
    <Header
      @toggleModalAddTask=toggleModalAddTask
      :paginationMeta=paginationMeta />
    <TodoList :tasks=tasks
      @toggleCompleted=toggleCompleted
      @removeTask=removeTask />
    <Footer :tasksStatus=tasksStatus />
    <Pagination
      :paginationMeta=paginationMeta
      @goToPage=goToPage />
    <ModalAddTask
      :togglePopup=modals.addTask.show
      @toggleModalAddTask=toggleModalAddTask
      @addTask=addTask />
    <ModalRemoveTask
      :togglePopup=modals.removeTask.show />
  </div>
</template>

<script>
import TaskHelper from './TaskHelper'
import Header from './components/Header.vue'
import TodoList from './components/TodoList.vue'
import Pagination from './components/Pagination.vue'
import Footer from './components/Footer.vue'
import ModalAddTask from './components/ModalAddTask.vue'
import ModalRemoveTask from './components/ModalRemoveTask.vue'

export default {
  name: 'App',
  components: {
    Header,
    TodoList,
    Pagination,
    Footer,
    ModalAddTask,
    ModalRemoveTask
  },
  data(){
    return {
      modals:{
        addTask:{
            show:false
        },
        removeTask:{
            show:false,
            title:'',
            task:null
        }
      },
      tasks:[],
      currentPage:1,
      paginationMeta:{},
      tasksStatus:{
        total:0,
        completed:0,
        incomplete:0,
      }
    }
  },
  mounted(){
    this.getPageResults();
  },
  methods:{
    addTask(task){
      this.tasks.push(task);
      // this.updateTasksStatus(task.is_completed);
      // this.updateTasksTotalStatus(1);
      TaskHelper.create(task).then(()=>{
        this.getPageResults();
      }).catch(err=>{
        console.error(err);
      });
    },
    toggleCompleted(index){
      const task = this.tasks[index];
      task.is_completed = !task.is_completed;
      this.updateTasksStatus(task.is_completed);
      TaskHelper.update(task).catch(err=>{
        console.error(err);
      });
    },
    removeTask(index){
      const task = this.tasks[index];
      this.tasks.splice(index,1);
      // this.updateTasksCompletedFieldsStatus(task.is_completed);
      // this.updateTasksTotalStatus(-1);
      TaskHelper.delete(task).then(()=>{
        this.getPageResults();
      }).catch(err=>{
        console.error(err);
      })
    },
    toggleModalAddTask(bool=null){
      this.modals.addTask.show = bool;
    },
    getPageResults(){
      TaskHelper.getAll(this.currentPage).then(res=>{
        this.tasks = res.data.data;
        this.paginationMeta = res.data.meta;
        
        this.tasksStatus.total = res.data.meta.total;
        this.tasksStatus.completed = res.data.completedTasksCount;
        this.tasksStatus.incomplete = this.tasksStatus.total - this.tasksStatus.completed;
      });
    },
    goToPage(pageNumber){
      this.currentPage = pageNumber;
      this.getPageResults();
    },
    updateTasksTotalStatus(number){
      this.tasksStatus.total+= number;
    },
    updateTasksStatus(isCompleted){
      this.tasksStatus.completed+= isCompleted ? 1 : -1;
      this.tasksStatus.incomplete+= isCompleted ? -1 : 1;
    },
    // updateTasksCompletedFieldsStatus(isCompleted){
    //   const fieldName = isCompleted ? 'completed' : 'incomplete';
    //   this.tasksStatus[fieldName]-= 1;
    // }
  }
}
</script>

<style>
.modal.bg-modal{
    background-color: rgba(0,0,0,0.4);
}
.modal.show{
  display: block;
}
</style>