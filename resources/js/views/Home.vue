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
            @delete-task="deleteTask"
        ></TodoComponent>
        <p v-else>No tasks</p>
    </div>
</template>

<script>
import TodoComponent from '../components/Todo.vue'
import AddForm from "../components/AddForm.vue";
import Loader from '../components/Loader.vue'
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
        fetch('http://localhost:8000/api/tasks')
            .then(response => response.json())
            .then(json=> {
                setTimeout(()=> {
                    this.tasks = json
                    this.loading = false
                }, 1000)
            })
    },
    methods: {
        deleteTask(id) {
            this.tasks = this.tasks.filter(t => t.id !== id)
        },
        addTask(task) {
            this.tasks.push(task)
        },
    }
}
</script>

<style scoped>

</style>
