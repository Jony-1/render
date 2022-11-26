<template>

    <div class="offcanvas offcanvas-start bg-dark" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
        aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Luxury sex-shop</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

            <div id="user_data">
                <h1> Mi Perfil</h1>
                <p>Name: {{user.name}}</p>
                <p>Email: {{user.email}}</p>
                <p>Created at: {{user.created_at}}</p>
                <button @click="logout()">Logout</button>
            </div>
        </div>
    </div>
    <div id="container_client">
        <div id="client">
            <router-view>

            </router-view>
           <!-- <div class="cont-art">
            <article v-for="p in articles_list_mostrar">
                <p>{{p.name}}</p>
                <p>{{p.code}}</p>
                <p>{{p.stock}}</p>

                <p>{{p.description}}</p>
                <p>{{p.selling_price}}</p>
            </article>
           </div> -->



        </div>
        <div id="bar">
            <div>
                <router-link to="/Buys" class="btn buton">
                My Buys
            </router-link>
            <router-link to="/Clientarticles" class="btn buton">
                Articles
            </router-link>
            <button class="btn buton" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasWithBothOptions"> User </button>
            </div>
         
           
        </div>
    </div>








</template>

<style>
/* @import url(../assets/account.css); */
* {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

#container_client {
    display: flex;
    flex-direction: column;
    width: 100%;
    height: 100%;
}



#client {
    display: flex;
    flex-direction: column;
    border-radius: 1rem;
    background-color: rgba(0, 0, 0, 0.514);
    width: 100%;
    height: calc(100% - 3.5rem);
    /* overflow-y: scroll; */
}
.cont-art{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
   
}
article{
    width: 20rem !important;
    height: 20rem;
    /* border: 1px solid rgb(69, 5, 111); */
    box-shadow: 1px 1px 2px 1px rgb(26, 2, 49);
    margin: 1rem;
    border-radius: 1rem;
    color: white;
    backdrop-filter: blur(5px);
}
p

h1 {
    /* border: 1px solid red; */
    color: rgb(95, 3, 95) !important;
    font-size: 2.5rem;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    text-shadow: rgb(255, 255, 255) 1px 1px 1px, rgba(56, 2, 63, 0.76) 1px 2px 2px;
}

#datos {
    border: 1px solid;
    border-radius: 1rem;
    padding: 0.2rem;
    background-color: rgba(63, 5, 117, 0.521);
    font-size: 2rem;
    transition: ease-in-out 400ms;
}

#datos:active {
    transform: scale(0.95);
    background-color: aliceblue;
}

#user_data {

    width: 15rem;
    position: relative;
    color: white;
    top: 0rem;
    border-radius: 1rem;
    padding: 1rem;
    background-color: rgba(61, 4, 114, 0.712);
    transition: ease-in-out 200ms;
}



button:hover {
    background-color: rgb(112, 50, 128);
    border: 1px solid white;

}

button:active {
    background-color: rgb(74, 12, 90);
}

.offcanvas {
    background-color: rgba(0, 0, 0, 0.575) !important;
}

h5 {
    background-color: rgba(70, 0, 128, 0.781);
    padding: 5px;
    border-radius: 1rem;
    color: white;
}

.buton {
    background-color: rgb(255, 255, 255) !important;
    color: rgb(122, 43, 226);
    font-size: 1.2rem;
    /* padding: 0.2rem; */
    height: 2.5rem;
    margin-left: 1rem;
}

#bar {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 3.5rem;
    width: 100%;
    background-color: rgba(128, 43, 226, 0.623);
    border-radius: 1rem;
    padding: 0.5rem;
}


#buscar {
    width: 10rem !important;
    height: 2.2rem !important;
    background-color: rgba(255, 255, 255, 0.075);
    border: 1px solid;
    color: white;
    backdrop-filter: blur(5px);
    transition: 200ms ease-in-out;

}

#buscar:focus {
    width: 15rem;
    background-color: rgba(15, 17, 16, 0.205);



}

#buscar::placeholder {
    color: white;
}

.information {

    position: absolute;
    /* display: none; */
}





</style>
<script>


export default {
    data() {
        return {
            token: null,
            user: {},
            articles_list: [],
            articles_list_mostrar: [],
            search: "",
        };
    },
    mounted() {
        this.$router.push('Clientarticles');
        // this.get_products();

        console.log("Client rol: "+this.roles_id);
        if (localStorage.token) {
            this.token = localStorage.token;
            this.user = JSON.parse(localStorage.user);
            console.log("Client rol: "+ this.user.roles_id);
            this.role = this.user.roles_id;
            if (this.role === 1) {
                this.token = localStorage.token;
                this.user = JSON.parse(localStorage.user);
                // this.token = localStorage.token;
                // this.get_user();
            } else {
                this.token = "";
                this.user = "";
                localStorage.clear();
                this.$router.push({
                    name: "Login",
                    params: {
                        message: "No estas autorizado para acceder a esta cuenta Client"
                    },
                });
            }
        }
        else {
            localStorage.clear();
            this.$router.push({
                name: "Login",
                params: {
                    message: "No estas autorizado para acceder a esta cuenta Ay noo"
                },
            });
        }



        // if (localStorage.token) {
        //     this.token = localStorage.token;
        //     this.user = JSON.parse(localStorage.user);
        //     // this.token = localStorage.token;
        //     // this.get_user();
        // } else {
        //     this.$router.push({
        //         name: "Login",
        //         params: {
        //             message: "No estas autorizado para acceder a esta cuenta"
        //         },
        //     });
        // }
    },
    methods: {

        async logout() {
            try {
                console.log(this.token);
                const rs = await this.axios.get("/api/logout", {
                    headers: { Authorization: `Bearer ${this.token}` },
                });

                localStorage.clear();

                this.$router.push({
                    name: "Login",
                    params: {
                        message: rs.data.message,
                    },
                });
            } catch (e) {
                this.$router.push({
                    name: "Login",
                    params: {
                        message: e.response.data.message,
                    },
                });
            }
        },
      

        filtrar() {
            this.articles_list_mostrar = this.articles_list.filter(
                (p) =>
                    (p.name.toLowerCase().indexOf(this.search.toLowerCase()) > -1) ||
                    (p.code.toString().toLowerCase().indexOf(this.search.toLowerCase()) > -1) ||
                    (p.description.toLowerCase().indexOf(this.search.toLowerCase()) > -1) ||
                    (p.selling_price.toString().toLowerCase().indexOf(this.search.toLowerCase()) > -1) ||
                    (p.stock.toString().toLowerCase().toString().indexOf(this.search.toLowerCase()) > -1)

            );
        },
    },


} 
</script>