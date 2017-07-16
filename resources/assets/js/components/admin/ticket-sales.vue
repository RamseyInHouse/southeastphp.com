<style lang='scss'>

</style>

<template></template>
<script>
  import axios from 'axios';

  export default {
    mounted() {
      this.getTicketSales();
    },

    methods: {
      getTicketSales() {
        axios.get('/api/admin/sales').then(response => {
          this.tickets = response.data;
        }).catch(error => {
          throw new Exception('Could not load ticket sale data right now.');
        });
      },i
    }
  }
</script>