<template>

    <!-- modal new_user-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content new_user-modal">
                <div class="modal-header">
                    <h1 class="modal-title fs-3 text-black" id="exampleModalLabel">Create User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body formnew">
                    <form id="formnew">
                        <!-- <div class="mb-2">
                                <label for="image" class="col-form-label text-black">Imagen: </label>
                                <input type="file" class="form-control" id="image" v-model="user.image">
                            </div> -->
                        <div class="mb-2">
                            <label for="message-text" class="col-form-label text-black">Name:</label>
                            <input type="text" class="form-control" id="recipient-name" v-model="user.name">
                        </div>
                        <div class="mb-2">
                            <label for="categori" class="col-form-label text-black">Email: </label>
                            <input type="text" class="form-control" id="email" v-model="user.email">
                        </div>
                        <div class="mb-2">
                            <label for="code" class="col-form-label text-black">password:</label>
                            <input type="password" class="form-control" id="code" v-model="user.password">
                        </div>
                        <div class="mb-2">
                            <label for="code" class="col-form-label text-black">Confirm Password:</label>
                            <input type="password" class="form-control" id="code" v-model="user.password_confirmation">
                        </div>


                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="text-black " data-bs-dismiss="modal">Close</button>
                    <button type="button" class="text-black " data-bs-dismiss="modal"
                        @click="new_user()">Create</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal new_user-->

    <!-- modal edit_user-->

    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content new_user-modal">
                <div class="modal-header">
                    <h1 class="modal-title fs-3 text-black" id="exampleModalLabel">Edit user</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body formnew">
                    <form id="formnew">
                        <!-- <div class="mb-2">
                <label for="image" class="col-form-label text-black">Imagen: </label>
                <input type="text" class="form-control" id="image" v-model="articles_edit.image">
              </div> -->
                        <div class="mb-2">
                            <label for="name_edit" class="col-form-label text-black">Name:</label>
                            <input type="text" class="form-control" id="name_edit" v-model="user_edit.name">
                        </div>
                        <div class="mb-2">
                            <label for="email_edit" class="col-form-label text-black">Email: </label>
                            <input type="text" class="form-control" id="email_edit" v-model="user_edit.email">
                        </div>
                        <div class="mb-2">
                            <label for="password" class="col-form-label text-black">password:</label>
                            <input type="password" class="form-control" id="password" v-model="user_edit.password">
                        </div>
                        <div class="mb-2">
                            <label for="code" class="col-form-label text-black">Confirm Password:</label>
                            <input type="password" class="form-control" id="code" v-model="user_edit.password_confirmation">
                        </div>


                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="text-black " data-bs-dismiss="modal">Close</button>
                    <button type="button" class="text-black " data-bs-dismiss="modal"
                        @click="update_user()">Edit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal edit_user-->


    <div id="container_user">
        <div id="search">
            <div id="container-search">
                <button type="button" class="btn btn-secondary text-black fs-5 em" data-bs-toggle="modal"
                    data-bs-target="#exampleModal" data-bs-whatever="@mdo">New</button>
                <input name="buscar articulo" class="em" type="text" id="buscar" v-model="search" @keyup="filtrar()"
                    placeholder="Search">
            </div>


        </div>
        <div id="user">
            <div id="cont_user_art">

                <article v-for="p in users_list_mostrar" class="art_user">

                    <p>Nombre: {{p.name}}</p>
                    <p>Email: {{p.email}}</p>
                    <p>Rol: {{role[p.roles_id]}}</p>
                    <footer>
                        <button type="button" class="boton text-black" data-bs-toggle="modal"
                            data-bs-target="#editmodal" @click="edit_user(p)">
                            Edit
                        </button>
                        <button @click="borrar_user(p.id)" class="boton">Delete</button>
                    </footer>

                </article>

            </div>
        </div>

    </div>


</template>

<style scoped>
/* @import url("../assets/adminusers.css") */
#container_user {
    display: flex;
    flex-direction: column;
    width: 100%;
    height: 100%;
}

#user {
    width: 100%;
    height: 100%;
    overflow-y: scroll;
}

#cont_user_art {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    width: 100%;
    height: max-content;
}

.art_user {
    width: 12rem !important;
    height: 12rem;
    padding: 0.5rem;
    background-color: rgba(0, 0, 0, 0.445);
    color: white;
    border-radius: 1rem;
    margin: 1rem;
}

.boton {
    width: 4rem;
    text-align: center;
    padding: 0;
    font-size: large;
}

.new_user-modal {
    height: 36rem;
}
</style>
<script>
export default {

    data() {
        return {
            users_list: [],
            users_list_mostrar: [],
            search: "",
            user: {
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
                token: null,
              
                roles_id: 1,
            },
            user_edit: {
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
                token: null,
                // roles_id: 1,
            },
            role: ['ajam', ' Client', ' Employee', ' Administrator']
        };
    },

    mounted() {

        this.get_users();

    },
    methods: {
        async get_users() {
            let response = await this.axios.get("/api/users");
            this.users_list = response.data;

            this.users_list_mostrar = this.users_list;
            this.users_list_mostrar.forEach(element => {
                console.log(element);

            });
        },
        async new_user() {

            console.log(this.user);

            let response = await this.axios.post("/api/users/", this.user);
            this.get_users();
            this.user = "";
        },
        edit_user(p) {
            
            this.user_edit = p;
            // console.log(this.articles_edit);
        },
        async update_user() {
            let id = this.user_edit.id;
            console.log(this.user_edit);
            console.log("Id: " + id);

            await this.axios.put("/api/users/" + id, this.user_edit);
            this.get_users()
            this.user_edit = "";
        },
        async borrar_user(id) {
            console.log(id);
            if (confirm('seguro de eliminar producto')) {
                await this.axios.delete('/api/users/' + id);
                // console.log('se borro(?)');
                this.get_users();
            }
        },
        filtrar() {
            this.users_list_mostrar = this.users_list.filter(
                (p) =>
                    (p.name.toLowerCase().indexOf(this.search.toLowerCase()) > -1) ||
                    (p.roles_id.toString().toLowerCase().toString().indexOf(this.search.toLowerCase()) > -1)

            );
        },

    },


};
</script>