import axios from 'axios'

const API_DOMAIN = 'http://api.myapi.local';

class TaskHelper{
    getAll(currentPage){
        return axios.get(`${API_DOMAIN}/task?page=${currentPage}`);
    }
    create(task){
        return axios.post(`${API_DOMAIN}/task`,task);
    }
    update(task){
        return axios.put(`${API_DOMAIN}/task/${task.id}`,task);
    }
    delete(task){
        return axios.delete(`${API_DOMAIN}/task/${task.id}`,task);
    }
}

export default new TaskHelper;