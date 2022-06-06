<template>
  <div class="card">
    <div class="card-body">
      <table class="table dataTable exportable display" style="width:100%" :id="type+'Table'">
        <thead class="text-primary d-none">
          <tr>
            <th>--</th>
            <th>--</th>
            <th>--</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="notification in notifications" :key="notification.id">
            <td>
              <a :href="'notifications/'+notification.id">
                {{notification.data.title}}
              </a>
            </td>
            <td :class="notification.read_at? '' : 'font-weight-bold'">{{notification.data.message | truncate(50)}}</td>
            <td class="text-right">{{format_date(notification.created_at)}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
require("datatables.net");

export default {
  props: ["type", "notifications"],
  mounted() {
    this.$nextTick(() => {
      $(`#${this.type}Table`).DataTable();
    });
    console.log(this.notifications);
  },
  methods: {
    format_date(date) {
      return moment(date).fromNow();
    }
  }
};
</script>

<style>
</style>