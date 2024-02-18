<script setup>
import { onMounted } from "vue";

import { ref } from "vue";

import { useAuthStore } from "../stores/auth";

const authStore = useAuthStore();
const form = ref({
    email: "",
    password: "",
});

onMounted(async () => {
  await authStore.getUser();
});
</script>
<template>
  <div>
    
  <div class="container ">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-lg-5">
                <div class="card-custom-3">
                    <h1 class="title-custom-1 text-center mb-4 pb-4 border-bottom">Login</h1>
<form  @submit.prevent="authStore.handleLogin(form)">


                         <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email"  id="email" name="email" class="form-control"  v-model="form.email"  aria-describedby="invalid-email">
                            <div v-if="authStore.errors.email" class="flex">
                              <!--<div class="alert alert-danger">-->
                            
                            <span class=" alert alert-danger text-red-400 text-sm m-2 p-2">{{
                              authStore.errors.email[0]
                             }}</span>
                             <!--</div>-->
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control " v-model="form.password"  aria-describedby="invalid-password">
                            
                                <div v-if="authStore.errors.password" class="flex">
                                 <!-- <div class="alert alert-danger">-->
                            
                                <span class=" alert alert-danger text-red-400 text-sm m-2 p-2">{{
                             authStore.errors.password[0]
                               }}</span>
                                <!---  </div>-->
                                      </div>
                              
                        </div>


                        <div class="mb-3">
                            <button class="btn btn-success" type="submit">Login</button>
                        </div>

                      </form> 
                      Not a member?  
                      <router-link to="/register" class="text-primary text-decoration-none"> Sign Up</router-link>


                    </div>
            </div>

        </div>
    </div>




 



  </div> 







                   
                        
                        
                 

   




</template>