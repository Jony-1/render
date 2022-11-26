<template>
    <div id="container_account">
        <div id="account">
            <router-view>

            </router-view>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            role:null,
           
        }
    },

    mounted() {
      
        console.log("Id: " + this.role);
        

    }
};
</script>