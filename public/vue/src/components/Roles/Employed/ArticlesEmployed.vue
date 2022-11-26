<template>
  <div id="container-articles">
    <div id="search">
      <div id="container-search">
        <button type="button" class="btn btn-secondary text-black fs-5 em" data-bs-toggle="modal"
          data-bs-target="#exampleModal" data-bs-whatever="@mdo">New</button>
        <input name="buscar articulo" class="em" type="text" id="buscar" v-model="search" @keyup="filtrar()"
          placeholder="Search">
      </div>


    </div>
    <div id="articles">
      <div id="sect_art">
        <article v-for="p in articles_list_mostrar" class="articles" :key="'article' + p.id">

          <div class="face front">
            <figure>
              <img :src="p.image" alt="">
            </figure>

            <p>

            <h4>Nombre: {{ p.name }}</h4>
            </p>
            <p>Precio: {{ p.selling_price }}</p>
          </div>

          <div class="face back">
            <div>
              <p>Codigo: {{ p.code }}</p>
              <p>Categori: {{ p.categories_id }}</p>
              <p>Descripcion: {{ p.description }}</p>
              <p>Stock: {{ p.stock }}</p>

            </div>

            <footer>

              <button type="button" class=" text-black" data-bs-toggle="modal" data-bs-target="#editmodal"
                @click="edit_article(p)">
                Edit
              </button>
              <button @click="borrar(p.id)">Delete</button>
            </footer>
          </div>
        </article>

      </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-3 text-black" id="exampleModalLabel">Create Atticle</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body formnew">
            <form id="formnew">
              <div class="mb-2">
                <label for="image" class="col-form-label text-black">Imagen: </label>
                <input type="text" class="form-control" id="image" v-model="articles.image">
              </div>
              <div class="mb-2">
                <label for="message-text" class="col-form-label text-black">Name:</label>
                <input type="text" class="form-control" id="recipient-name" v-model="articles.name">
              </div>
              <div class="mb-2">
                <label for="categori" class="col-form-label text-black">Categori: </label>
                <input type="text" class="form-control" id="categori" v-model="articles.categories_id">
              </div>
              <div class="mb-2">
                <label for="code" class="col-form-label text-black">Code:</label>
                <input type="text" class="form-control" id="code" v-model="articles.code">
              </div>
              <div class="mb-2">
                <label for="price" class="col-form-label text-black">Price: </label>
                <input type="text" class="form-control" id="price" v-model="articles.selling_price">
              </div>
              <div class="mb-2">
                <label for="stock" class="col-form-label text-black">Stock:</label>
                <input type="text" class="form-control" id="stock" v-model="articles.stock">
              </div>
              <div class="mb-2">
                <label for="description" class="col-form-label text-black">Description: </label>
                <input type="text" class="form-control" id="description" v-model="articles.description">
              </div>
              <div class="mb-2">
                <label for="active" class="col-form-label text-black">Active:</label>
                <input type="text" class="form-control" id="active" v-model="articles.active">
              </div>


            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="text-black " data-bs-dismiss="modal">Close</button>
            <button type="button" class="text-black " data-bs-dismiss="modal" @click="new_article()">Create</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-3 text-black" id="exampleModalLabel">Edit Article </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body formnew">
            <form id="formnew">
              <div class="mb-2">
                <label for="image" class="col-form-label text-black">Imagen: </label>
                <input type="text" class="form-control" id="image" v-model="articles_edit.image">
              </div>
              <div class="mb-2">
                <label for="message-text" class="col-form-label text-black">Name:</label>
                <input type="text" class="form-control" id="recipient-name" v-model="articles_edit.name">
              </div>
              <div class="mb-2">
                <label for="categori" class="col-form-label text-black">Categori: </label>
                <input type="text" class="form-control" id="categori" v-model="articles_edit.categories_id">
              </div>
              <div class="mb-2">
                <label for="code" class="col-form-label text-black">Code:</label>
                <input type="text" class="form-control" id="code" v-model="articles_edit.code">
              </div>
              <div class="mb-2">
                <label for="price" class="col-form-label text-black">Price: </label>
                <input type="text" class="form-control" id="price" v-model="articles_edit.selling_price">
              </div>
              <div class="mb-2">
                <label for="stock" class="col-form-label text-black">Stock:</label>
                <input type="text" class="form-control" id="stock" v-model="articles_edit.stock">
              </div>
              <div class="mb-2">
                <label for="description" class="col-form-label text-black">Description: </label>
                <input type="text" class="form-control" id="description" v-model="articles_edit.description">
              </div>
              <div class="mb-2">
                <label for="active" class="col-form-label text-black">Active:</label>
                <input type="text" class="form-control" id="active" v-model="articles_edit.active">
              </div>


            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="text-black " data-bs-dismiss="modal">Close</button>
            <button type="button" class="text-black " data-bs-dismiss="modal" @click="update()">Edit</button>
          </div>
        </div>
      </div>
    </div>


  </div>

</template>

<style>
/* @import url("../assets/administerarticles.css"); */

#container-articles {
  display: flex;
  flex-direction: column;
  height: 100%;
  width: 100%;


}

#articles {
  height: calc(100% - 5rem);
  width: 100%;
  overflow-y: scroll !important;
  overflow-x: hidden !important;

}

#sect_art {
  display: flex;
  flex-wrap: wrap;
  height: max-content;
  justify-content: center;
  background-color: rgba(19, 17, 20, 0.438);
  border-radius: 1rem;
  margin: 2rem;
  padding: 2rem;

}

.articles {
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  width: 20rem;
  height: 20rem;
  margin: 1rem;
  padding: 1rem;
  border-radius: 1rem;
  /* border: 1px solid rgb(92, 0, 128); */
  color: white;
}

footer {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
}

#search {
  display: flex;
  flex-direction: column;
  justify-content: center;
  height: 5rem;
  width: 100%;
  padding: 0.5rem;
  /* border: 1px solid red; */
}

#container-search {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  /* border: 1px solid red; */
}

#buscar {
  width: 10rem;
  height: 2.2rem !important;
  background-color: rgba(255, 255, 255, 0);
  border: 1px solid;
  color: white;
  backdrop-filter: blur(5px);

}

#buscar:focus-visible {
  background-color: rgba(55, 9, 82, 0.479);
  width: 20rem;
  height: 20rem;


}

#buscar::placeholder {
  color: white;
}

input {
  margin: 0.5rem;
}

.formnew {
  height: 40rem;
  overflow-y: scroll;
  overflow-x: hidden;
}

#formnew {
  display: flex;
  flex-direction: column;
  height: max-content;
}

@media (max-width: 400px) {
  .em {
    display: block;
  }




}
</style>

<script>
export default {
  data() {
    return {
      articles_list: [],
      articles_list_mostrar: [],
      search: "",
      articles: {
        image: "",
        name: "",
        categories_id: "",
        code: "",
        selling_price: "",
        stock: "",
        description: "",
        active: "",

      },
      articles_edit: {},

    };
  },
  mounted() {
    this.get_products();


    // this.new_article();
  },

  methods: {
    async get_products() {
      let response = await this.axios.get("/api/articles");
      this.articles_list = response.data;
      this.articles_list_mostrar = this.articles_list;
    },

    async new_article() {

      console.log(this.articles);
      let response = await this.axios.post("/api/articles/", this.articles);
      this.get_products();
      this.articles = "";


    },
    edit_article(p) {
      this.articles_edit = p;
      // console.log(this.articles_edit);
    },
    async update() {
      let id = this.articles_edit.id;
      console.log(this.articles_edit);
      console.log("Id: " + id);

      await this.axios.put("/api/articles/" + id, this.articles_edit);
      this.get_products()
      this.articles_edit = "";
    },


    async borrar(id) {
      console.log(id);
      if (confirm('seguro de eliminar producto')) {
        await this.axios.delete('/api/articles/' + id);
        // console.log('se borro(?)');
        this.get_products();
      }
    },

    filtrar() {
      this.articles_list_mostrar = this.articles_list.filter(
        (p) =>
          (p.name.toLowerCase().indexOf(this.search.toLowerCase()) > -1) ||
          (p.code.toString().toLowerCase().indexOf(this.search.toLowerCase()) > -1) ||
          (p.description.toLowerCase().indexOf(this.search.toLowerCase()) > -1) ||
          (p.selling_price.toString().toLowerCase().indexOf(this.search.toLowerCase()) > -1) ||
          (p.stock.toString().toLowerCase().toString().indexOf(this.search.toLowerCase()) > -1) ||
          (p.categories_id.toString().toLowerCase().toString().indexOf(this.search.toLowerCase()) > -1)

      );
    },
  },
};
</script>

    