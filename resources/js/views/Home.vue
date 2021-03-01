<template>
    <div class="container">
        <AddForm
            @add-task="addTask"
        ></AddForm>
        <hr>
        <Loader
        v-if="loading"
        ></Loader>
        <TodoComponent
            v-else-if="tasks.length"
            v-bind:tasks="tasks"
            @done-task="doneTask"
            @delete-task="deleteTask"
        ></TodoComponent>
        <p v-else>No tasks</p>
    </div>
</template>

<script>
import TodoComponent from '../components/Todo.vue'
import AddForm from "../components/AddForm.vue";
import Loader from '../components/Loader.vue'
import Vue from "vue";
export default {
    name: "Home",
    components: {
        TodoComponent,
        AddForm,
        Loader
    },
    data() {
        return {
            tasks: [],
            loading: true
        }
    },
    mounted() {
        this.getTasks()
    },
    methods: {
        getTasks() {
            Vue.axios
                .get('http://localhost:8000/api/tasks')
                .then((response) => {
                    this.tasks = response.data
                    this.loading = false
                })
        },
        deleteTask(id) {
            Vue.axios
                .delete(`http://localhost:8000/api/tasks/${id}`)
            this.getTasks()
        },
        addTask(task) {
            Vue.axios.post('http://localhost:8000/api/tasks', task)
            this.getTasks()
        },
        doneTask(id, performed) {
            Vue.axios.put(`http://localhost:8000/api/tasks/${id}`, {performed: !performed})
            this.getTasks()
        }
    }
}
</script>

<style scoped>

</style>
