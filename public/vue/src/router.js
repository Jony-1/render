import { createWebHistory, createRouter} from "vue-router";
import login from "./components/Login.vue";
import Register from  "./components/Register.vue";
import SendEmail from "./components/SendEmail.vue";
import VerifyEmail from "./components/VerifyEmail.vue";
import Client from "./components/Roles/Client/Client.vue";
import Buys from "./components/Roles/Client/Buys.vue";
import Clientarticles from "./components/Roles/Client/Clientarticles.vue";
import Home from "./components/Home/Home.vue";
import home01 from "./components/Home/home01.vue";
import home02 from "./components/Home/home02.vue";
import home03 from "./components/Home/home03.vue";
import home04 from "./components/Home/home04.vue";
import ForgotPassword from "./components/ForgotPassword.vue";
import PasswordReset from "./components/ResetPassword.vue";
import Administrator from "./components/Administrator.vue";
import Ventas from "./components/Roles/Admin/Ventas.vue";
import Articles from "./components/Roles/Admin/Articles.vue";
import Users from "./components/Roles/Admin/Users.vue"
import Employed from "./components/Roles/Employed/Employed.vue"
import Account from  "./components/Account.vue";
import VentasEmployed from "./components/Roles/Employed/VentasEmployed.vue";
import ArticlesEmployed from "./components/Roles/Employed/ArticlesEmployed.vue";

const routes= [
{
    path:"/Login",
    name:"Login",
    component:login,
},
{
    path: "/SendEmail",
    name: "SendEmail",
    component: SendEmail,
},
{
    path: "/Verify-Email",
    name: "VerifyEmail",
    component: VerifyEmail,
},
{
    path:"/Client",
    name:"Client",
    component:Client,
    children:[
        {
            path:"/Buys",
            name:"Buys",
            component:Buys,
        },
        {
            
            path:"/Clientarticles",
            name:"Clientarticles",
            component:Clientarticles,
        }
    ] 
},
{
    path:"/Account",
    name:"Account",
    component:Account, 
},
{
    path:"/",
    name:"Home",
    component:Home,
    children:[
        {
            path:"home01",
            name:"home01",
            component:home01
        },
        {
            path:"home02",
            name:"home02",
            component:home02
        },
        {
            path:"home03",
            name:"home03",
            component:home03
        },
        {
            path:"home04",
            name:"home04",
            component:home04
        }
    ]
    
  
},
{
    path:"/Register",
    name:"Register",
    component:Register,
},


{
    path:"/Forgot-Password",
    name:"ForgotPassword",
    component:ForgotPassword,
},

{
    path:"/Password-Reset",
    name:"PasswordReset",
    component:PasswordReset,
},
{
    path:"/register",
    name:"Register",
    component:Register,
},
{
    path:"/Administrator",
    name:"Administrator",
    component:Administrator,
    children:[
        {
            path:"/Ventas",
            component:Ventas,
        },

        {
            path:"/Users",
            name:"Users",
            component: Users,
        },
        {
            path:"/ArticlesAdmin",
            name:"ArticlesAdmin",
            component:Articles,
        }
    ],
},
{
    path:"/Employed",
    name:"Employed",
    component:Employed,
    children:[
        {
            path:"/VentasEmployed",
            component:VentasEmployed,
        },

      
        {
            path:"/ArticlesEmployed",
            name:"ArticlesEmployed",
            component:ArticlesEmployed,
        }
    ]

},

];


const router=  createRouter(
    {
       history: createWebHistory(),
       routes,
    }
);

export default router;
