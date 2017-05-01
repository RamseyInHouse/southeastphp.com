<style lang='scss'>

</style>

<template>

    <div class="row">
        <div class="col-xs-12">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Active</th>
                        <th>Signup Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="email in emails">
                        <td>{{ email.email }}</td>
                        <td>{{ email.active }}</td>
                        <td>{{ email.created_at }}</td>
                    </tr>
                </tbody>
            </table>
            <p> {{ totalEmails }} sign ups</p>
        </div>
    </div>

</template>
<script>
  import axios from 'axios';
  import moment from 'moment';

  export default {
    created() {
      this.getEmailList();
    },

    computed: {
      totalEmails() {
        return this.emails.length;
      },
    },

    data() {
      return {
        emails: [],
      };
    },

    methods: {
      getEmailList() {
        return axios.get('/api/emails').then(response => {
          this.emails = response.data;
        }).catch(error => console.log(error))
      },
    },
  };
</script>