<template>

   <div id="container-sales">
      <h1>Ventas: </h1>
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
    
      <div id="sales">
         <div id="container_sales">
            <article v-for="s in sales_list_show">
               <p>Date: {{s.date}}</p>
               <p>invoice number: {{s.invoice_number}}</p>
               <p>User: {{s.users_id}}</p>
               <p>Article: {{s.articles_id}}</p>
               <p>State: {{s.state}}</p>
               <p>Total: {{s.total}}</p>
            </article>

         </div>


      </div>
   </div>

</template>
<style>
#container-sales {
   width: 100%;
   height: 100%;
}

#sales {
   padding: 1rem;
   width: 100%;
   height: 100%;
   overflow-y: scroll;
}

#container_sales {
   display: flex;
   flex-wrap: wrap;
   height: max-content;

}
#con_buton_sale{
   display: flex;
   flex-direction: row;
   justify-content: end;
}
button{
   margin: 0.5rem;
}
</style>
<script>
export default {
   data() {
      return {
         sales_list: [],
         sales_list_show: [],
         search: 0,

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
         //    console.log(element);

         // });
         this.filtrar(0);
      },
      filtrar(p) {

         this.search=p;
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