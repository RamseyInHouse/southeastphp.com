<style lang='scss'>

</style>
<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2>Hello, {{ name }}</h2>
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
        name: '',
      };
    },

    mounted() {
      this.getTickets();
      this.getSubmissions();
    },

    methods: {
      getTickets() {

      },

      getSubmissions() {

      },
    }
  }
</script>