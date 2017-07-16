<style lang='scss' xmlns="http://www.w3.org/1999/html">

</style>
<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="text-center">SoutheastPHP - Submit Talk</h2>
                    <p class="text-center"> {{ user.name }}</p>
                    <form class="col-xs-8 col-xs-offset-2" method="post">
                        <fieldset>
                            <h3>Talk Details</h3>
                            <div class="form-group">
                                <label for="talkTitle">Title of your talk</label>
                                <input type="text" class="form-control" id="talkTitle" placeholder="Title of your talk">
                            </div>
                            <div class="form-group">
                                <label>Is this talk a 45 minute session or a 3 hour tutorial?</label><br>
                                <label>
                                    <input type="radio" name="talkType" id="talk-session" value="session">
                                    45 Minute Sessions
                                </label>
                                <label>
                                    <input type="radio" name="talkType" id="talk-tutorial" value="tutorial">
                                    3 Hour Tutorial
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="talkAbstract">Abstract of Talk</label>
                                <textarea class="form-control" id="talkAbstract" rows="6"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="talkDetails">Talk Details <small><em>Anything you didnt include in your abstract you want us to know about your talk</em></small></label>
                                <textarea class="form-control" id="talkDetails" rows="6"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Have you given this talk before?</label><br>
                                <label>
                                    <input type="radio" name="given-talk" id="yes" value="yes">
                                    Yes
                                </label>
                                <label>
                                    <input type="radio" name="given-talk" id="no" value="no">
                                    No
                                </label>
                            </div>
                        </fieldset>
                        <fieldset>
                            <h3>Speaker Details</h3>
                            <div class="form-group">
                                <label for="joindIn">Joind.in profile</label>
                                <input type="text" class="form-control" id="joindIn" placeholder="Title of your talk">
                            </div>
                            <div class="form-group">
                                <label for="airport">Airport</label>
                                <input type="text" class="form-control" id="airport" placeholder="Which city airport are you flying out of" v-model="term">
                            </div>
                            <div class="form-group">
                                <label>Do you need help with travel or hotel? Can your company help you our with any of those?</label><br>
                                <label>
                                    <input type="checkbox" value="true" v-model="travelAssistance">
                                    Travel Assistance
                                </label><br>
                                <label>
                                    <input type="checkbox" value="true" v-model="hotelAssistance">
                                    Hotel Assistance
                                </label><br>
                                <label>
                                    <input type="checkbox" value="true" v-model="companyAssistance">
                                    Company Assistance
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Do you have any dietery needs? <small>If allergies, please specify below</small></label>
                                <select v-model="dieteryNeeds">
                                    <option selected value="">Pick One</option>
                                    <option v-for="diet in diets" value="diet">{[ diet }}</option>
                                </select>
                            </div>

                        </fieldset>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
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
        user: '',
        airports: [],
        term: '',
        hotelAssistance: '',
        travelAssistance: '',
        companyAssistance: '',
        diets: [
          'vegetarian',
          'vegan',
          'kosher',
          'halal',
          'gluten-free',
          'allegeries',
        ],
      };
    },

    watch: {
      term() {
        if (this.term.length > 3) {
          //this.getAirports();
        }
      }
    },

    methods: {
      getUser() {
        return axios.get('/api/user').then(response => {
          this.user = response.data;
        }).catch(error => {
          this.showErrorBanner = true;

          setTimeout(() => {
            this.showErrorBanner = false;
          }, 3000);
        });
      },

      getAirports() {
        return axios.post('/api/airports', { term: this.term }).then(response => {
          this.airports = response.data;
        }).catch(error => {
          console.error()
        });
      },
    }
  };
</script>