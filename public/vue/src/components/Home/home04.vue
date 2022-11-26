<template>
  <h1>
      ACEITES:
  </h1>
  <section id="seccion">
        <div id="contart">
          <article v-for="p in articles_list_show" class="articles">
            <div class="face front">
              <figure>
                <img :src="p.image" alt="">
              </figure>
              <footer>
                <p>
                <h3>{{ p.name }}</h3>
                </p>
                <p>Precio: {{ p.selling_price }}</p>
              </footer>

            </div>

            <div class="face back">

              <p>{{ p.description }}</p>
              <p>CATEGORIA:{{p.categories_id}}</p>
            
            </div>
          </article>
        </div>

      </section>

</template>

<style scoped>
/* @import url(../assets/home.css); */
#container_home{
  display: flex;
  flex-direction: column;
  height: 100%;
  /* position: absolute; */
}
#home{
display: flex;
flex-direction: column;

}
h1{
  color: rgb(61, 3, 95);
  font-size: 2.5rem;

  font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  text-shadow:black 3px 3px 3px ,rgba(15, 15, 15, 0.76) 2px 2px 2px, rgba(0, 0, 0, 0.493) 1.5px 1.5px 1.5px, rgb(212, 207, 207) 1px 2px 2px;
}
#home{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100%;
  width: 100%;
  /* position: absolute; */
}

a{
color: white;
}
.navbar-nav{
color: blueviolet;
}

.section{
display: flex;
padding: 1rem;
background-color: rgba(255, 255, 255, 0.397);
border-radius: 0.7rem;
padding: 1rem;
width: 75%;
/* position: absolute; */
}
#seccion{
display: flex;
  height:20rem;
  width: 100%;
  overflow-x: scroll;
  overflow-y: hidden;
  /* position: absolute; */
  



}
#contart{
  height:10rem;
  width: max-content;
  display: flex;
  flex-direction: row;
  /* position: relative; */
}
article{
  display: flex;
  flex-direction: column;
  justify-content: center;
  background-color:rgba(44, 8, 73, 0.603);
  width: 15rem !important;
  height: 15rem !important;
  margin: 0.5rem;
  color: white;
  font-size: small;
  text-align: center;
  border-radius: 0.7rem;
}

/* #carouselExampleIndicators{
  width: 70rem;
  height: 10rem;
} */

#po{
  font-size: 2rem;
  color: #ffffff;
  
}

#redes{
  /* border:1px solid #ffffff; */
  justify-content: space-between;
  width: 10em;
  display: flex;
  flex-flow: row;

}

#welcome{

  justify-content: center;
  width: 100;
  display: flex;
  flex-flow: column;

}
#welcome2{
  justify-content: end;
  width: 100;
  display: flex;
  flex-flow: row;
}
</style>
<script>
  export default {
      data() {
          return {
              articles_list:[],
              articles_list_show:[],
              search: 4,

          }
      },
      mounted() {
          this.get_articles();

      },
      methods: {
          async get_articles() {
              let response = await this.axios.get("/api/articles");
              this.articles_list = response.data;

              this.articles_list_show = this.articles_list;
           
              this.filtrar();
          },
          filtrar() {

              
              console.log(this.search);
              console.log(this.articles_list);
              this.articles_list_show = this.articles_list.filter(
                  (s) =>
                      (s.categories_id.toString().toLowerCase().toString().indexOf(this.search.toString()) > -1)

              );
              console.log('whaaaat');
          },
          


      }
  };
</script>