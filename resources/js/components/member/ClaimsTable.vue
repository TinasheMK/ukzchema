<template>
  <div>
    <table class="table dataTable exportable display" style="width:100%" id="deposits">
      <thead class="text-primary">
        <tr>
          <th>Deceased Name</th>
          <th>Date</th>
          <th class="text-right">Name of Claimant</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="dep in my_deposits" :key="dep.id">
            <td><a v-bind:href="'claim/'+ dep.id">{{dep.deceased_name}}</a></td>
            <td>{{dep.date_death}}</td>
            <td class="text-right">{{dep.claimant_fullname}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
require("datatables.net");

export default {
  props: ["deposits"],
  mounted() {
    console.log(moment);
    this.$nextTick(() => {
        $("#deposits").DataTable();
    });
},
data() {
      console.log(this.deposits);
      return {
          my_deposits: this.deposits || []
      }
  },
  methods: {
      format_date(date){
          console.log(date);

          return moment(date).format('Y-MM-d @ HH:ss');
      }
  }
};
</script>

<style>
</style>
