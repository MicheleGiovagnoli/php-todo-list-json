const { createApp } = Vue

createApp({
    data() {
        return {
            jsList: [],
            item: ''
        }
    },
    methods: {
        readList() {
            axios.get('server.php')
                .then(response => {
                    this.jsList = response.data;
                })
        }

    },
    mounted() {
        this.readList();
    }
}).mount('#app')