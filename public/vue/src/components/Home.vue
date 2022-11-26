<template>

  <div id="container_home">


    <div id="welcome">
      <div id="welcome2">
        <input name="buscar articulo" class="em" type="text" id="buscar" v-model="search" @keyup="filtrar()"
          placeholder="Search">
        <a class="nav-link" href="#"><i class="bi bi-cart" id="po"></i></a>
      </div>
    </div>


    <div id="home">
      <div class="section" v-if="ajam==true">
        <section id="seccion">
          <div id="contart">
            <article v-for="p in mostrar_prod " class="articles">
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
              </div>
            </article>
          </div>

        </section>
      </div>
      <router-view >
        
      </router-view>

    </div>

  </div>
  <nav class="navbar navbar-expand-lg navbar-light bg-black">
    <a class="navbar-brand" href="#">NUESTROS PRODUCTOS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link" href="#" @click="Ajam()">LENCERIA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" @click="Ajam()">JUGUETES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" @click="Ajam()">VIBRADORES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" @click="Ajam()">ACEITES</a>
        </li>
      </ul>
    </div>
    <div id="redes">
      <a class="nav-link" href="#"><i class="bi bi-whatsapp" id="po"></i></a>
      <a class="nav-link" href="https://es-la.facebook.com/"><i class="bi bi-facebook" id="po"></i></a>
      <a class="nav-link" href="#"><i class="bi bi-instagram" id="po"></i></a>
      <a class="nav-link" href="#"><i class="bi bi-twitter" id="po"></i></a>

    </div>






  </nav>

</template>
<style scoped>
@import url(../assets/home.css);
</style>

<script>

export default {
  data() {
    return {
      // token: null,

      lista_productos: [],
      mostrar_prod: [],
      ajam:true,
    };
  },
  mounted() {



    this.get_products();



  },

  methods: {

    async get_products() {
      let response = await this.axios.get("/api/articles");

      this.lista_productos = response.data;

      // this.lista_productos.forEach(element => {
      //   console.log(element);

      // });

      this.mostrar_prod = this.lista_productos;


    },
    Ajam(){
      this.ajam=false;
      console.log('aham:'+this.ajam);
    }

  }


}
</script>
