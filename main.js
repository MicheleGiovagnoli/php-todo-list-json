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
        addTask() {
            const data = {                       //Creo un'oggetto che verra inviato con una post al server
                task: this.item                  //
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
    },
    mounted() {
        this.readList();
    }
}).mount('#app')