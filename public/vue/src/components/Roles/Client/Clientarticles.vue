<!-- <template>
    <div id="container_clinarts">
        <div id="contcar">
            <input name="buscar articulo" type="text" id="buscar" v-model="search" @keyup="filtrar()"
                placeholder="search">
            <label id="buycar" for="car"> Carrito </label>
            <input type="checkbox" name="" id="car">
            <div class="carrito">
                <carhead>
                    TU CARRITO
                </carhead>
                <carbody>
                    <div id="container_carbody">

                        <table>
                            <tr>
                                <th><b>Company</b></th>
                                <th><b>Company</b></th>
                                <th><b>Company</b></th>
                            </tr>
                            <tr v-for="f in factura">
                                <td>{{f.code}}</td>

                            </tr>

                        </table>

                    </div>

                </carbody>
                <carfooter>
                    <div>
                        <span id="sale">
                            PAY
                        </span>
                        <span id="price">
                            1600000
                        </span>
                    </div>
                </carfooter>
            </div>
        </div>


        <div id="Client_articles">

            <div class="cont-art">
                <article v-for="p in articles_list_mostrar" class="articles" @click="insert(p.code)">
                    <div class="face front">
                        <figure>
                            <img :src="p.image" alt="">
                        </figure>
                        <footer>
                            <p>
                            <h3>{{p.name}}</h3>
                            </p>
                            <p>Precio: {{p.selling_price}}</p>
                        </footer>

                    </div>

                    <div class="face back">
                        <p>{{p.description}}</p>
                    </div>
                </article>
            </div>
        </div>
    </div>


</template>

<style>
#container_clinarts {
    display: flex;
    flex-direction: column;
    width: 100%;
    height: 100%;
}

#Client_articles {

    width: 100%;
    height: 100%;
    overflow-y: scroll;
}

.cont-art {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;

}

#contcar {
    display: flex;
    justify-content: space-between;
    padding: 0.5rem;
}

#buycar {
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: 2rem;
    width: 3rem;
    background-color: rgb(255, 255, 255);
    border-radius: 0.5rem;
    text-align: center;
    z-index: 11;
    color: rgb(58, 5, 128);
}

#car {
    display: none;
}

.carrito {
    display: none;
    flex-direction: column;
    height: 44rem;
    width: 30rem;
    position: absolute;
    top: 0.5rem;
    right: 0.5rem;
    background-color: rgb(255, 255, 255);
    border-radius: 0.5rem;
    z-index: 10;
    animation: carrito 200ms;
    transition: ease-in-out 10ms;
    padding: 0.5rem
}

carhead {
    height: 10%;
    border-bottom: 1px solid blueviolet;
    color: black;
    font-size: xx-large;
}

carbody {
    height: 80%;
    width: 100%;
    /* border-bottom: 1px solid blueviolet; */
    color: black;
}

#container_carbody {
    display: flex;
    flex-direction: column;
    height: max-content;
    width: 100%;
}

.carticle {
    border-bottom: 1px solid blueviolet;
}

carfooter {
    /* display: flex;
    justify-content: center; */
    height: 10%;
    width: 100%;
    color: black;
    /* padding: 0.2rem; */

}

carfooter div {
    display: flex;
    justify-content: space-between;
    background-color: rgb(69, 5, 121);
    height: 100%;
    width: 100%;
    border-radius: 0.5rem;
    padding: 0.5rem;
}

carfooter div:active {
    transform: scale(0.98);
    background-color: rgb(92, 17, 153);
}

#sale {
    display: flex;
    flex-direction: column;
    justify-content: center;
    color: white;
    font-size: xx-large;
    border-radius: 0.5rem;
    /* background-color: blueviolet; */
    width: 50%;
}

#price {
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: end;
    color: white;
    font-size: xx-large;
    border-radius: 0.5rem;
    /* background-color: blueviolet; */
    width: 50%;
}

.articles {
    position: relative;
}

.face {
    position: absolute;
    backface-visibility: hidden;
}

.front {
    display: flex;
    flex-direction: column;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    padding: 0.5rem;
    /* border: 1px solid red; */
    transform: perspective(600px) rotatey(0);
    transition: ease-in-out 300ms;
}

figure {
    display: flex;
    flex-direction: column;
    height: 70%;
    width: 100%;
}

img {

    border-radius: 0.5rem;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;

}

.back {
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    width: 100%;
    height: 100%;
    /* position: absolute; */
    top: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.466);
    padding: 0.5rem;
    /* border: 1px solid red; */
    border-radius: 1rem;
    transition: ease-in-out 300ms;
    transform: perspective(600px) rotateY(180deg);
}

.articles:hover .front {
    transform: perspective(600px) rotateY(180deg);
}

.articles:hover .back {
    transform: perspective(600px) rotateY(360deg);
}




@keyframes carrito {
    0% {
        width: 5rem;
        height: 10rem;
    }

    5% {
        width: 7rem;
        height: 12rem;
    }

    10% {
        width: 8rem;
        height: 15rem;
    }

    15% {
        width: 9rem;
        height: 17rem;
    }

    20% {
        width: 10rem;
        height: 20rem;
    }

    25% {
        width: 11rem;
        height: 23rem;
    }

    30% {
        width: 12rem;
        height: 25rem;
    }

    35% {
        width: 13rem;
        height: 26rem;
    }

    40% {
        width: 14rem;
        height: 27rem;
    }

    50% {
        width: 15rem;
        height: 30rem;
    }

    60% {
        width: 17rem;
        height: 33rem;
    }

    70% {
        width: 20rem;
        height: 36rem;
    }

    75% {
        width: 23rem;
        height: 37rem;
    }

    80% {
        width: 25rem;
        height: 38rem;
    }

    90% {
        width: 28rem;
        height: 40rem;
    }

    100% {
        width: 30rem;
        height: 44rem;
    }
}

.select {
    display: none;
}

#car:checked~.carrito {
    display: flex;
}



@media (max-width:500px) {
    .carrito {
        width: 96%;
    }
}
</style>

<script>

export default {
    data() {
        return {

            user: {},
            articles_list: [],
            articles_list_mostrar: [],
            search: "",
            factura: [],
        };
    },
    mounted() {

        
        this.get_products();

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
        async get_products() {
            let response = await this.axios.get("/api/articles");
            this.articles_list = response.data;
            this.articles_list_mostrar = this.articles_list;

            this.get_images();
            
        },
        async get_images(){
            let id=126;
             let response = await this.axios.get("/api/articles_images/");
             console.log(response.data);            
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
        insert() {
            // this.factura=code;
            console.log("factura(?)" + this.factura);
        },
    },


} 
</script>
 -->
<template>
    <div id="container_clinarts">
        <div id="contcar">
            <input name="buscar articulo" type="text" id="buscar" v-model="search" @keyup="filtrar()"
                placeholder="search">
            <label id="buycar" for="car"><i class="bi bi-cart"></i></label>
            <input type="checkbox" name="" id="car">
            <div class="carrito">
                <carhead>
                    Factura de venta
                </carhead>
                <carbody>
                    <div id="container_carbody">

                        <table>
                            <tr>
                                <th><b>NOMBRE</b></th>
                                <th><b>PRECIO</b></th>
                                <th><b>CODIGO</b></th>
                                <th><b>CANTIDAD</b></th>
                                <th><b>SUBTOTAL</b></th>
                            </tr>

                            <tr v-for="a in sales.articles">
                                <td>{{a.name}}</td>

                                <td class="fac">
                                    <span @click="a.stock"></span>
                                <td>${{a.price}}</td>
                                <td>{{a.code}}</td>
                                <span @click="restar(a)"><i class="bi bi-file-minus-fill"></i></span>
                                <span>{{a.amount}}</span>
                                <span @click="sumar(a)"><i class="bi bi-file-plus-fill"></i></span></td>
                                <td>
                                    <span @click="fdelete(f.id)"><i class="bi bi-trash"></i></span>
                                </td>
                                <td>{{a.total}}</td>

                            </tr>

                        </table>

                    </div>

                </carbody>
                <carfooter>
                    <button>
                        <span id="sale">
                            PAY
                        </span>
                        <span id="price">
                            <p>Precio: {{total}}</p>
                        </span>

                    </button>
                </carfooter>
            </div>
        </div>


        <div id="Client_articles">

            <div class="cont-art">
                <article v-for="a in articles_list_mostrar" class="articles" @click="insert(a)">
                    <div class="face front">
                        <figure>
                            <img :src="a.image">
                        </figure>
                        <footer>
                            <p>
                            <h3>{{a.name}}</h3>
                            </p>
                            <p>Precio:{{a.price}}</p>
                        </footer>
                    </div>

                    <div class="face back">
                        <p>{{a.description}}</p>
                    </div>
                </article>
            </div>
        </div>
    </div>


</template>

<style>
    #container_clinarts {
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 100%;
    }

    #Client_articles {

        width: 100%;
        height: 100%;
        overflow-y: scroll;
    }

    .cont-art {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;

    }

    #contcar {
        display: flex;
        justify-content: space-between;
        padding: 0.5rem;
    }

    #buycar {
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 2rem;
        width: 3rem;
        background-color: rgb(255, 255, 255);
        border-radius: 0.5rem;
        text-align: center;
        z-index: 11;
        color: rgb(58, 5, 128);
    }

    #car {
        display: none;
    }

    .carrito {
        display: none;
        flex-direction: column;
        height: 75vh;
        width: 30rem;
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        background-color: rgb(255, 255, 255);
        border-radius: 0.5rem;
        z-index: 10;
        animation: carrito 200ms;
        transition: ease-in-out 10ms;
        padding: 0.5rem
    }

    carhead {
        height: 10%;
        border-bottom: 1px solid blueviolet;
        color: black;
        font-size: xx-large;
    }

    carbody {
        height: 80%;
        width: 100%;
        /* border-bottom: 1px solid blueviolet; */
        color: black;
    }

    #container_carbody {
        display: flex;
        flex-direction: column;
        height: max-content;
        width: 90%;
    }

    #man {
        border-radius: 100px;
        width: 2rem;
        height: 2rem;
        background-color: #f9c94475;
        border: solid 1px rgb(122, 122, 122);
        position: relative;
        text-align: center;

    }

    #son {
        border-radius: 100px;
        width: 2rem;
        height: 2rem;
        background-color: white;
        border: solid 5px gray;
        position: relative;
        text-align: center;

    }

    #girl {
        border-radius: 100px;
        width: 1.5rem;
        height: 1.5rem;
        background-color: #f9c9445d;
        border: solid 1px rgb(122, 122, 122);
        position: relative;
        text-align: center;

    }




    .carticle {
        border-bottom: 1px solid blueviolet;
    }

    carfooter {
        /* display: flex;
    justify-content: center; */
        height: 10%;
        width: 100%;
        color: black;
        /* padding: 0.2rem; */

    }

    carfooter button {
        display: flex;
        justify-content: space-between;
        background-color: rgb(69, 5, 121) !important;

        height: 100% !important;
        width: 100% !important;
        border-radius: 0.5rem;
        padding: 0.5rem;
    }

    carfooter div:active {
        transform: scale(0.98);
        background-color: rgb(92, 17, 153);
    }


    #sale {
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: white;
        font-size: xx-large;
        border-radius: 0.5rem;
        /* background-color: blueviolet; */
        width: 45%;
    }


    #price {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: end;
        color: white;
        font-size: xx-large;
        border-radius: 0.5rem;
        /* background-color: blueviolet; */
        width: 45%;
    }

    .articles {
        position: relative;
    }

    .face {
        position: absolute;
        backface-visibility: hidden;
    }

    .front {
        display: flex;
        flex-direction: column;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        padding: 0.5rem;
        /* border: 1px solid red; */
        transform: perspective(600px) rotatey(0);
        transition: ease-in-out 300ms;
    }

    figure {
        display: flex;
        flex-direction: column;
        height: 70%;
        width: 100%;
    }

    img {

        border-radius: 0.5rem;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;

    }

    .back {
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        width: 100%;
        height: 100%;
        /* position: absolute; */
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.466);
        padding: 0.5rem;
        /* border: 1px solid red; */
        border-radius: 1rem;
        transition: ease-in-out 300ms;
        transform: perspective(600px) rotateY(180deg);
    }

    .articles:hover .front {
        transform: perspective(600px) rotateY(180deg);
    }

    .articles:hover .back {
        transform: perspective(600px) rotateY(360deg);
    }

    .fac {
        display: flex;
        flex-flow: row;
        border: 2px solid red;

    }




    @keyframes carrito {
        0% {
            width: 5rem;
            height: 10rem;
        }

        5% {
            width: 7rem;
            height: 12rem;
        }

        10% {
            width: 8rem;
            height: 15rem;
        }

        15% {
            width: 9rem;
            height: 17rem;
        }

        20% {
            width: 10rem;
            height: 20rem;
        }

        25% {
            width: 11rem;
            height: 23rem;
        }

        30% {
            width: 12rem;
            height: 25rem;
        }

        35% {
            width: 13rem;
            height: 26rem;
        }

        40% {
            width: 14rem;
            height: 27rem;
        }

        50% {
            width: 15rem;
            height: 30rem;
        }

        60% {
            width: 17rem;
            height: 33rem;
        }

        70% {
            width: 20rem;
            height: 36rem;
        }

        75% {
            width: 23rem;
            height: 37rem;
        }

        80% {
            width: 25rem;
            height: 38rem;
        }

        90% {
            width: 28rem;
            height: 40rem;
        }

        100% {
            width: 30rem;
            height: 44rem;
        }
    }

    .select {
        display: none;
    }

    #car:checked~.carrito {
        display: flex;
    }



    @media (max-width:500px) {
        .carrito {
            width: 96%;
        }
    }
</style>
<script>

    export default {
        data() {
            return {

                user: {},
                articles_list: [],
                articles_list_mostrar: [],
                search: "",
                cont: 1,
                //venta actual
                sales: {
                    users_id: null,
                    date: null,
                    sales_number: null,
                    state: 0, //factura abierta
                    total: 0,
                    articles: [] //articulos del carrito
                }
            };
        },
        mounted() {
            if (localStorage.user) {
                this.user = JSON.parse(localStorage.user);
            }
            else {
                //Se va para el login
            }

            this.get_products();

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
            async get_products() {
                let response = await this.axios.get("/api/articles");
                this.articles_list = response.data;
                this.articles_list_mostrar = this.articles_list;

                // this.get_images();

            },
            // async get_images(){
            //     let id=126;
            //      let response = await this.axios.get("/api/articles_images/");
            //      console.log(response.data);            
            // },

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

            insert(a) {
                const iva = (a.price / 1.19)
                const article = {
                    key: this.cont,
                    name: a.name,
                    code: a.code,
                    stock: a.stock,                    
                    article_id: a.id,
                    sales_id: null,
                    users_id: 1, //this.user.id,
                    amount: 1,
                    price: a.selling_price,
                    subtotal: (a.price - iva),
                    iva: iva, //iva desde la tabla config
                    total: a.price
                }
                this.sales.articles.push(article)
                this.cont++
            },

            sumar(a) {
                let item = this.sales.articles.find(article => article.key == a.key)

                if (item.amount < item.stock) {
                    item.amount++
                    item.total = item.amount * item.price
                    item.iva = item.total / 1.19 //iva desde la tabla config 
                    item.subtotal = (item.total - item.iva)
                    this.sales.articles.total += item.price
                }
            },

            restar(a) {
                let item = this.item_factura.find((pro) => pro.codigo == codigo)

                if (item.cantidad > 1) {
                    this.factura.total -= item.subtotal

                    item.cantidad--
                    item.subtotal = item.cantidad * item.precio

                    this.factura.total += item.subtotal
                }
            },
            eliminar(index) {
                let item = this.item_factura[index]
                this.factura.total -= item.subtotal
                this.item_factura.splice(index, 1)
                item.seleccionado = false
                item.cantidad = ''
            },




        },

    }

</script>