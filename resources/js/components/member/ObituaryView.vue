<template>
  <ul class="list-unstyled team-members">
    <li>
      <div class="row position-relative">
        <div class="col-12 col-sm-3 mr-0 text-center mb-2">
          <img :src="user.base + 'storage/' + obituary.photo" height="140px" class="mr-3" alt>
        </div>
        <div class="col-12 col-sm-9 ml-0">
          <p class="mb-0"><small>{{lifespan}}</small></p>
          <h5 class="mt-0">{{obituary.full_name}} <span v-if="donated" class="badge badge-success">Paid</span></h5>
          <p>{{obituary.biography | truncate(150) }}
            <br>
            <small class="text-muted mt-2">Posted on {{obituary.created_at}}</small>
          </p>
          <a :href="route+'/'+obituary.id" class="stretched-link">View</a>
        </div>
      </div>
      <hr>
    </li>
  </ul>
</template>

<script>
export default {
  props: ["obituary", "user", "route", "donated", "lifespan"],
  mounted() {
    console.log(this.obituary);
  },
  methods: {
      photo(url) {
          return window.location.origin + url;
      }
  }
};
</script>

<style>
.obt-name{
    font-size: 20px;
}
</style>
