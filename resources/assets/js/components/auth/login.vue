<style lang='scss'>
 a {
     color: #2ab27b;
     &:hover {
         color: #2ab27b;
     }
 }
</style>
<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="alert alert-danger" v-if="showErrorMessage">
                        <p class="text-center">There was an error logging you in. Please try again.</p>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="text-center">Southeast PHP Login</h2>
                        </div>
                        <div class="panel-body">
                            <form class="col-xs-8 col-xs-offset-2" method="post" @submit.prevent="submitLoginForm">
                                <div class="form-group">
                                    <label for="username">Email</label>
                                    <input type="text" class="form-control" id="username" placeholder="Email" v-model="email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password" v-model="password">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" v-model="rememberMe"> Remember Me
                                    </label>
                                    <p>Need to create an account? <router-link to="register">Click here</router-link></p>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-success">Submit</button>
                                    <button class="btn btn-default" @click="emptyForm">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  import axios from 'axios';

  export default {
    data() {
      return {
        email: '',
        password: '',
        rememberMe: '',
        showErrorMessage: false,
      };
    },

    methods: {
      submitLoginForm() {
        axios.post('api/login', {
          email: this.email,
          password: this.password,
          rememberMe: this.rememberMe,
        }).then(response => {
          //window.location.assign('/user');
        }).catch(error => {
          this.showErrorMessage = true;

          setTimeout(() => {
            this.showErrorMessage = false;
          }, 5000);
        });
      },

      emptyForm() {
        this.email = '';
        this.password = '';
        this.rememberMe = '';
      }
    }
  }
</script>