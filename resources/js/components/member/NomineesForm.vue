<template>
  <div>
    <form :action="route" method="POST">
      <slot></slot>
      <div class="row">
        <div class="col-md-6" v-for="(nominee, i) in updated_nominees" :key="nominee.id">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">
                Nominee {{i+1}}
                <span
                  v-if="unlocked"
                  class="close text-danger"
                  @click="del(nominee)"
                >
                  <i class="fa fa-trash" aria-hidden="true"></i>
                </span>
              </h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <input type="hidden" :value="nominee.id" :name="'nominees['+i+'][id]'" />
                  <div class="form-group">
                    <label>Full Name</label>
                    <input
                      required
                      :name="'nominees['+i+'][full_name]'"
                      type="text"
                      :disabled="!unlocked"
                      class="form-control"
                      v-model="nominee.full_name"
                    />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input
                      :name="'nominees['+i+'][email]'"
                      type="email"
                      :disabled="!unlocked"
                      class="form-control"
                      v-model="nominee.email"
                    />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Date of Birth</label>
                    <datepicker
                      format="dd MMMM yyyy"
                      :initialView="'year'"
                      v-model="nominee.dob"
                      :disabled="!unlocked"
                      :name="'nominees['+i+'][dob]'"
                      :input-class="unlocked ? 'form-control dob' : 'form-control nom'"
                    ></datepicker>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Zimbabwean By</label>
                    <select
                      :disabled="!unlocked"
                      required
                      :name="'nominees['+i+'][zimbabwean_by]'"
                      class="form-control select2"
                    >
                      <option :selected="nominee.zimbabwean_by === 'birth'" value="birth">Birth</option>
                      <option
                        :selected="nominee.zimbabwean_by === 'descent'"
                        value="descent"
                      >Descent</option>
                      <option :selected="nominee.zimbabwean_by === 'spouse'" value="spouse">Spouse</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6" v-if="can_update && nominee_vacant >= 1">
          <div class="card card-user text-center p-3">
            <p class="mt-3 mb-2">
              Click button to add new nominee details
              <br />
              <small
                class="text-muted"
              >You can add {{ nominee_vacant }} more nominee{{ nominee_vacant === 1 ? '' : 's'}}</small>
            </p>

            <button @click="add()" type="button" class="btn btn-primary btn-round">Add Nominee</button>
          </div>
        </div>

        <div class="col-12 text-center" v-if="can_update && nominee_vacant !== 3">
          <button type="submit" class="btn btn-primary btn-round">Update Changes</button>
        </div>
        <div class="clearfix" style="margin-bottom: 110px"></div>
      </div>
    </form>
    <div class="modal fade modal-danger" id="remove_nominee" v-if="can_update">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-danger">
            <h4 class="modal-title mt-0">
              Are you sure you want to remove <strong>{{del_full_name}}</strong> from your nominees list?
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <form :action="del_route" method="POST">
            <slot></slot>
            <input type="hidden" name="_method" value="DELETE">
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-danger">Delete</button>
            </div>
          </form>
          
        </div>
      </div>
    </div>
  </div>
</template>

<script>
require("../../libs/bootstrap-notify");

export default {
  props: ["route", "nominees", "can_update", "maximum_nominees"],
  components: {
    Datepicker: () => import("vuejs-datepicker")
  },
  data() {
    return {
      form: {},
      date: {},
      unlocked: !!this.can_update,
      nominee_vacant: 0,
      updated_nominees: this.nominees,
      del_full_name: null,
      max_nominees: 0,
      del_route: null
    };
  },
  mounted() {
    this.max_nominees = Number(this.maximum_nominees);
    console.log(this.can_update, this.max_nominees);
    this.nominee_vacant = this.max_nominees - this.nominees.length;
    if (!this.unlocked) {
      this.alertLocked();
    }
  },
  methods: {
    add() {
      this.nominee_vacant -= 1;
      this.updated_nominees.push({
        full_name: null,
        id: new Date().getTime() + '_new'
      });
    },
    del(nominee) {
      if(isNaN(nominee.id)){
        this.updated_nominees = this.updated_nominees.filter(
          n => n.id !== nominee.id
        );
        this.nominee_vacant = 3 - this.updated_nominees.length;
        return;
      }
      this.del_full_name = nominee.full_name;
      this.del_route = `${this.route}/${nominee.id}`;
      setTimeout(() => $('#remove_nominee').modal('show'), 20)
    },
    alertLocked() {
      $.notify(
        {
          icon: "nc-icon nc-bell-55",
          message: `You cannot update nominees at the moment`
        },
        {
          type: "info",
          timer: 2000,
          placement: {
            from: "top",
            align: "right"
          }
        }
      );
    }
  }
};
</script>

<style>
.dob {
  background-color: #ffffff !important;
  color: #7d7a75 !important;
  cursor: pointer !important;
}
</style>