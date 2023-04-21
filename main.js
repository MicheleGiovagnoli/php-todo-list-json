const { createApp } = Vue

createApp({
    data() {
        return {
            jsList: [],     //array 
            item: "",
        }
    },
    methods: {
        readList() {                             //API
            axios.get('server.php')
                .then(response => {              //response.data sara il contenuto della chiamata API
                    this.jsList = response.data; //Metto la risposta alla chiamata all'interno di un'array
                })                               //facendone una 'copia' che utilizzero con vue.js in index.html
        },
        addTask() {                                 //Creo un'oggetto che verra inviato con una post al server
            const data = {
                task: this.item
            };
            axios.post('server.php', data,       //scelgo il file e cosa inviare
                {
                    headers: { 'Content-Type': 'multipart/form-data' }
                }
            ).then(response => {
                this.jsList = response.data;
                this.item = "";
            });
        },
        removeTask(position) {
            axios.post('server.php',        //scelgo il file e cosa inviare
                {
                    headers: { 'Content-Type': 'multipart/form-data' }
                }
            ).then(response => {
                this.jsList[position] = [];
            });
        },
    },
    mounted() {
        this.readList();
    }
}).mount('#app')