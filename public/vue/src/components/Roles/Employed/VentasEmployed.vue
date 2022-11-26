<template>
    <div id="container-ventas">
        <h1>VENTAS:</h1>
        <div id="con_buton_sale">
            <button @click="filtrar(0)">
                En proceso
            </button>
            <button @click="filtrar(1)">
                Compra finalizada
            </button>
            <button @click="filtrar(2)">
                Producto enviado
            </button>
            <button @click="filtrar(3)">
                Producto entregado
            </button>
        </div>
        <div id="ventas">

            <table class="table table-hover table-dark ventas">
                <thead>
                    <tr>

                        <th scope="col"> <B>ID</B> </th>
                        <th scope="col"><b>CODIGO DEL ARTICULO</b></th>
                        <th scope="col"><b>USUARIO</b></th>
                        <th scope="col"><b>FECHA</b> </th>
                        <th scope="col"><b>NUMERO DE LA VENTA</b></th>
                        <th scope="col"><b>ESTADO DE LA VENTA</b></th>
                        <th scope="col"><b>TOTAL</b></th>
                    </tr>
                </thead>
                <tbody>

                    <tr v-for="s in sales_list_show">

                        <td>{{s.id}}</td>
                        <td>{{s.articles_id}}</td>
                        <td>{{s.users_id}}</td>
                        <td>{{s.date}}</td>
                        <td>{{s.sales_number}}</td>
                        <td>{{s.state}}</td>
                        <td>{{s.total}}</td>


                    </tr>


                </tbody>
            </table>
        </div>
    </div>
</template>
<style>
#container-ventas {
    display: flex;
    flex-direction: column;
    width: 100%;
    height: 100%;
    color: white;

}

#ventas {
    padding: 1rem;
    width: 100%;
    height: 100%;
    overflow-y: scroll;
    /* border-radius: 10%; */
    /* border: 1px solid red; */
    border-radius: 1rem;

}

.ventas {
    border-radius: 1rem;
}
</style>
<script>
export default {
    data() {
        return {
            sales_list: [],
            sales_list_show: [],
            search:"",
        }
    },
    mounted() {
        this.get_sales();

    },
    methods: {
        async get_sales() {
            let response = await this.axios.get("/api/sales");
            this.sales_list = response.data;

            this.sales_list_show = this.sales_list;
            // this.sales_list_show.forEach(element => {
            //     console.log(element);

            // });
            this.filtrar(0);
        },
        filtrar(p) {

            this.search = p;
            console.log(this.search);
            this.sales_list_show = this.sales_list.filter(
                (s) =>
                    (s.state.toString().toLowerCase().toString().indexOf(this.search.toString()) > -1)

            );
            console.log('whaaaat');
        },

    }
};
</script>