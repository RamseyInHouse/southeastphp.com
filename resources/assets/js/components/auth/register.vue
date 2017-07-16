<style lang='scss'>
    .error {
        border: 1px solid red;
    }

    .disabled {
        pointer-events: none;
    }
</style>

<template>
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="alert alert-danger" v-if="showErrorBanner">
                    <p class="text-center">There was an error creating your account. Please try again in a bit.</p>
                </div>

                <div class="alert alert-danger" v-if="showPasswordBanner">
                    <p class="text-center">The password entered does not match the confirmed password. Please try again.</p>
                </div>

                <div class="alert alert-success" v-if="showSuccessBanner">
                    <p class="text-center">Your account was made, time to log in!</p>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="text-center">Southeast PHP Login</h2>
                    </div>
                    <div class="panel-body">
                        <form class="col-xs-8 col-xs-offset-2" method="post" @submit.prevent="submitUserForm">
                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="text" class="form-control" id="username" placeholder="Email" v-model="email">
                            </div>
                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="First Name" v-model="firstName">
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" id="lastName" placeholder="Last Name" v-model="lastName">
                            </div>
                            <div class="form-group">
                                <label for="preferredName">Preferred Name</label>
                                <input type="text" class="form-control" id="preferredName" placeholder="Preferred Name" v-model="preferredName">
                            </div>
                            <div class="form-group">
                                <label for="company">Company</label>
                                <input type="text" class="form-control" id="company" placeholder="Company" v-model="company">
                            </div>
                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input type="text" class="form-control" id="twitter" placeholder="Twitter" v-model="twitter">
                            </div>
                            <div class="form-group">
                                <label for="password">Password <small>(minimum 8 characters)</small></label>
                                <input v-bind:class="{ error: showPasswordBanner }" type="password" class="form-control" id="password" placeholder="Password" v-model="password">
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Confirm Password</label>
                                <input v-bind:class="{ error: showPasswordBanner }" type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" v-model="confirmPassword">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" v-bind:class="{ disabled: disabled}">Submit</button>
                                <button class="btn btn-default" @click.prevent="emptyForm">Cancel</button>
                            </div>
                        </form>
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
        firstName: '',
        lastName: '',
        preferredName: '',
        company: '',
        twitter: '',
        password: '',
        confirmPassword: '',
        showSuccessBanner: false,
        showErrorBanner: false,
        showPasswordBanner: false,
        disabled: false,
      };
    },

    methods: {
      submitUserForm() {
        if (this.password !== this.confirmPassword || this.password.length < 7) {
          this.showPasswordBanner = true;
        }

        this.createUser();
      },

      createUser() {
        axios.post('/api/user', {
            email: this.email,
            password: this.password,
            firstName: this.firstName,
            lastName: this.lastName,
            preferredName: this.preferredName,
            twitter: this.twitter,
            company: this.company,
          }).then(response => {
          this.showSuccessBanner = true;
          window.scroll(0, 0);

          setTimeout(() => {
            this.showSuccessBanner = false;
            window.location.href = '/#/login';
          }, 3000);
        }).catch(error => {
          this.showErrorBanner = true;

          setTimeout(() => {
            this.showErrorBanner = false;
          }, 3000);
        });
      },

      emptyForm() {
        this.firstName = '';
        this.lastName = '';
        this.email = '';
        this.preferredName = '';
        this.company = '';
        this.twitter = '';
        this.password = '';
        this.confirmPassword = '';
      },
    },
  };
</script>