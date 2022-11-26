<template>

  <div id="container_home">


    <div id="welcome">
      <div id="welcome2">
        <input name="buscar articulo" class="em" type="text" id="buscar" v-model="search" @keyup="filtrar()"
          placeholder="Search">
        <a @click="vea()" class="nav-link" href="#">
          <i class="bi bi-cart" id="po"></i>
        </a>
      </div>
    </div>


    <div id="home">
      <div class="section" v-if="ajam == true">
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
      <router-view>

      </router-view>

    </div>

  </div>

  <div id="barra">
    <nav class="navbar navbar-expand-lg navbar-light bg-black">
      <a class="navbar-brand" href="#">NUESTROS PRODUCTOS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item ">
            <router-link class="nav-link" to="home01" @click="Ajam()">LENCERIA</router-link>
          </li>

          <li class="nav-item">
            <router-link class="nav-link" to="home02" @click="Ajam()">JUGUETES</router-link>

          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="home03" @click="Ajam()">VIBRADORES</router-link>

          </li>

          <li class="nav-item">
            <router-link class="nav-link" to="home04" @click="Ajam()">ACEITES</router-link>
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
  </div>
</template>
<style scoped>
/* @import url(../assets/home.css); */
#container_home {
  display: flex;
  flex-direction: column;
  height: 100%;
  /* position: absolute; */
}

#home {
  display: flex;
  flex-direction: column;

}

h1 {
  color: rgb(61, 3, 95);
  font-size: 2.5rem;

  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  text-shadow: black 3px 3px 3px, rgba(15, 15, 15, 0.76) 2px 2px 2px, rgba(0, 0, 0, 0.493) 1.5px 1.5px 1.5px, rgb(212, 207, 207) 1px 2px 2px;
}

#home {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100%;
  width: 100%;
  /* position: absolute; */
}

a {
  color: white;
}

.navbar-nav {
  color: blueviolet;
}

.section {
  display: flex;
  padding: 1rem;
  background-color: rgba(255, 255, 255, 0.397);
  border-radius: 0.7rem;
  padding: 1rem;
  width: 75%;
  /* position: absolute; */
}

#seccion {
  display: flex;
  height: 20rem;
  width: 100%;
  overflow-x: scroll;
  overflow-y: hidden;
  /* position: absolute; */




}

#contart {
  height: 10rem;
  width: max-content;
  display: flex;
  flex-direction: row;
  /* position: relative; */
}

article {
  display: flex;
  flex-direction: column;
  justify-content: center;
  background-color: rgba(44, 8, 73, 0.603);
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

#po {
  font-size: 2rem;
  color: #ffffff;

}

#redes {
  /* border:1px solid #ffffff; */
  justify-content: space-between;
  width: 10em;
  display: flex;
  flex-flow: row;

}

#welcome {

  justify-content: center;
  width: 100;
  display: flex;
  flex-flow: column;

}

#welcome2 {
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
      // token: null,
      lista_productos: [],
      mostrar_prod: [],
      ajam: true,
      search: ""
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
    Ajam() {
      this.ajam = false;
      console.log('aham:' + this.ajam);
    },

    filtrar() {
      this.mostrar_prod = this.lista_productos.filter(
        (p) =>
          (p.name.toLowerCase().indexOf(this.search.toLowerCase()) > -1)


      );
    },
    vea() {
      this.$router.push({
        name: "Client",
      });
    }


  }

};
</script>
