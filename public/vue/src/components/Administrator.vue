<template>
    <div id="container_administator">
        <div id="administrator">
            <aside>
                <div>
                    <router-link to="/Ventas" class="aside_art">
                        Sales
                    </router-link>
                    <router-link to="/Users" class="aside_art">
                        Users
                    </router-link>
                    <router-link to="/ArticlesAdmin" class="aside_art">
                        Articles
                    </router-link>


                </div>
                <div>
                    <button class="aside_art" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasWithBothOptions"> ME </button>
                    
                </div>

            </aside>
            <section>
                <router-view>

                </router-view>
            </section>
        </div>
        <div class="offcanvas offcanvas-start bg-dark" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
            aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Luxury sex-shop</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">

                <div id="user_data">
                    <h1> My Profile</h1>
                    <h2>{{role[user.roles_id]}}</h2>
                    <p>Name: {{user.name}}</p>
                    <p>Email: {{user.email}}</p>
                   
                    <button @click="logout()">Logout</button>
                </div>
            </div>
        </div>
    </div>

</template>

<style scoped>
@import url(../assets/administrator.css);
</style>

<script>
export default {
    data() {
        return {
            token: null,

            user: {},
            user_edit: {},
            role: ['ajam', ' Client', ' Employee', ' Administrator']

        };
    },

    mounted() {
        this.$router.push('ArticlesAdmin');

       

        if (localStorage.token) {
            this.token = localStorage.token;
            this.user = JSON.parse(localStorage.user);
            console.log("Admin rol: "+ this.user.roles_id);
            if (this.user.roles_id === 3) {
                
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
        edit_user(p) {
            this.user_edit = p;
            // console.log(this.articles_edit);
        },
        
    }
};
</script>
    


