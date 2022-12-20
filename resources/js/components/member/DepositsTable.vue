<template>
  <div>
    <table class="table dataTable exportable display" style="width:100%" id="deposits">
      <thead class="text-primary">
        <tr>
          <th>Payment Ref</th>
          <th>Date</th>
          <th class="text-right">Amount</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="dep in my_deposits" :key="dep.id">
          <td>{{dep.payment_ref}}</td>
          <td>{{date_format(dep.created_at,"Y/m/d H:i:s")}}</td>
          <td class="text-right">£{{dep.amount}}</td>
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
