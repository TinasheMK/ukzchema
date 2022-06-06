<template>
  <div>
    <table class="table dataTable exportable display" style="width:100%" id="donations">
      <thead class="text-primary">
        <tr>
          <th>Member</th>
          <th>Obituary</th>
          <th>Date</th>
          <th class="text-right">Amount</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="don in donations" :key="don.id">
          <td>{{don.member.first_name}} {{don.member.middle_names || ''}} {{don.member.last_name || ''}}</td>
          <td> <a :href="'obituaries/'+don.obituary_id">{{don.obituary.full_name || 'not set'}}</a></td>
          <td>{{don.on}}</td>
          <td class="text-right">£{{don.amount}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
require("datatables.net");

export default {
  props: ["donations"],
  mounted() {
    console.log(this.donations);
    
    this.$nextTick(() => {
      $("#donations").DataTable();
    });
  }
};
</script>

<style>
</style>