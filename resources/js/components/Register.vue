<script setup>
import { ref } from 'vue';
import { useAuthStore } from "../stores/auth";

const authStore = useAuthStore();
const form = ref({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

</script>
<template>
  <div>


    <div class="container ">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-lg-5">
                <div class="card-custom-3">
                    <h1 class="title-custom-1 text-center mb-4 pb-4 border-bottom">Register</h1>


      <form class="space-y-6" @submit.prevent="authStore.handleRegister(form)">

                         <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" value="" id="name" name="name" v-model="form.name" class="form-control" required="" aria-describedby="invalid-name">
                            <div v-if="authStore.errors.name" class="flex">
                  <span class="alert alert-danger text-red-400 text-sm m-2 p-2">{{
                    authStore.errors.name[0]
                  }}</span>
                </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" value="" id="email" name="email" v-model="form.email" autocomplete="email"  required="" class="form-control  ">
                            <div v-if="authStore.errors.email" class="flex">
                  <span class=" alert alert-danger text-red-400 text-sm m-2 p-2">{{
                    authStore.errors.email[0]
                  }}</span>
                </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password </label>
                            <input type="password" id="password" name="password" v-model="form.password"  required="" class="form-control  ">
                            <div v-if="authStore.errors.password" class="flex">
                  <span class="alert alert-danger text-red-400 text-sm m-2 p-2">{{
                    authStore.errors.password[0]
                  }}</span>
                </div>
                        </div>


                        <div class="mb-3">
                            <label for="password" class="form-label">Password Confrime</label>
                            <input type="password" id="password" name="password" v-model="form.password_confirmation"  required="" class="form-control  ">
                            
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-success" type="submit">Register</button>
                        </div>
                    </form>
                    Already have an account?  
                      <router-link to="/login" class="text-primary text-decoration-none"> Sign In </router-link>


                    </div>
            </div>

        </div>
    </div>




 



  </div> 



</template>