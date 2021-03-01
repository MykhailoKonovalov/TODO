<template>
    <form @submit.prevent="onSubmit">
        <div class="group">
            <input type="text" placeholder="New Task..." v-model="text" required>
            <span class="bar"></span>
        </div>
    </form>
</template>

<script>
export default {
    name: "AddForm",
    data() {
        return {
            text: ''
        }
    },
    methods: {
        onSubmit() {
            if (this.text.trim()) {
                const newTask = {
                    id: Date.now(),
                    text: this.text,
                    completed: false
                }

                this.$emit('add-task', newTask)
                this.text  = ''
            }
        }
    }
}
</script>

<style scoped>
.group {
    position: relative;
    margin: 2% 20% 2% 20%;
}

input {
    font-size: 16px;
    padding: 10px;
    display: block;
    width: 100%;
    border: none;
    border-bottom: 1px solid #ccc;
}
input:focus {
    outline: none;
}
</style>
