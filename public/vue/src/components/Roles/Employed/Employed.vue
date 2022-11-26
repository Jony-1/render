
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
    <div id="container_employed">
        <!-- <h1>Employed: </h1> -->
        <aside>
            <div>
                <router-link to="/ArticlesEmployed" class="emp">
                    Articles
                </router-link>
                <router-link to="/VentasEmployed" class="emp">
                    Ventas
                </router-link>
            </div>

            <button class="emp" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasWithBothOptions"> User </button>
          

        </aside>
        <div id="employed">
            <router-view>

            </router-view>
        </div>

    </div>


</template>

<style>
#container_employed {
    display: flex;
    flex-direction: row;
    height: 100%;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.354);
}

aside {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
    width: 4.5rem;
    background-color: rgba(57, 5, 100, 0.553);
}

.emp {
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
    width: 4rem;
    height: 4rem;
    background-color: transparent !important;
    font-size:larger;
    border-radius: 0.5rem;
    border: 1px solid white;
    margin: 0.25rem;
    color: white;
}

#employed {
    height: 100%;
    width: calc(100% - 4rem);
    /* border: 1px solid red; */
}
</style>

<script>
export default {
    data() {
        return {
            user: {},

        }
    },
    mounted() {
        this.$router.push("/ArticlesEmployed");
        
        if (localStorage.token) {
            this.token = localStorage.token;
            this.user = JSON.parse(localStorage.user);
            console.log("Admin rol: "+ this.user.roles_id);
            if (this.user.roles_id === 2) {
                
                this.token = localStorage.token;
                this.user = JSON.parse(localStorage.user);
                // this.token = localStorage.token;
                // this.get_user();
            } else {
                this.token = "";
                this.user = "";

                this.$router.push({
                    name: "Login",
                    params: {
                        message: "No estas autorizado para acceder a esta cuenta"
                    },
                });
            }
        }
        else {
            this.$router.push({
                name: "Login",
                params: {
                    message: "No estas autorizado para acceder a esta cuenta"
                },
            });
        }


       
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
    }

};
</script>