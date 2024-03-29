<template>
  <div
    class="modal fade"
    id="joiningPaymentModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="joiningPaymentModalTitle"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="joiningPaymentModalTitle">Pay Joining Fee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-12 mb-2">
            <label for="_amount">Joining Fee Amount</label>
             <p>Please note payment will include additional transaction charges that are not part of the deposit.</p>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="amount">£</span>
              </div>
              <input
                id="_amount"
                value="3"
                disabled
                v-model.number="amount"
                type="number"
                class="form-control"
                placeholder="Amount"
                aria-label="Amount"
                aria-describedby="amount"
              />
            </div>
          </div>
          <p class="text-center" v-if="!open && !error">
            <i class="fa fa-circle-o-notch fa-spin"></i> Loading PayPal
          </p>
          <p class="text-danger text-center" v-if="error">
            <i class="fa fa-frown-o"></i>
            Error loading PayPal. Refresh this page.
          </p>
          <h5 v-if="open" class="h6">Deposit method:</h5>
          <div ref="paypal" class="mx-2 mt-3"></div>
          <form :action="route" ref="form" method="POST">
            <slot></slot>
            <input type="hidden" name="payment_ref" v-model="payment_ref" />
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['route', 'user', 'client_id'],
  mounted() {
    console.log(this.user, this.client_id);

    $("#joiningPaymentModal").on("show.bs.modal", e => {
      if(!this.open){
        const scr = document.createElement("script");
        scr.src =
          `https://www.paypal.com/sdk/js?client-id=${this.client_id}&currency=GBP`;
        scr.addEventListener("load", this.loadPayPal);
        scr.addEventListener("error", this.loadError);
        document.body.append(scr);
        this.script = scr;
      }
    });
    $('#joiningPaymentModal').on('hidden.bs.modal', (e) => {
        if(this.error){
          this.error = false;
          $(this.script).remove();
          this.load = false;
        }
    });
  }
  ,
  data() {
    return {
      open: false,
      error: false,
      amount: 100,
      payment_ref: null,
      script: null
    };
  },

  methods: {
    finalise(payment_ref){
      console.log(payment_ref);
      $.notify(
        {
          icon: "nc-icon nc-check-2",
          message: "Paid Joining Fee Successfully. Please wait to be redirected to reset password."
        },
        {
          type: "primary",
          timer: 5000,
          placement: {
            from: "top",
            align: "right"
          }
        }
      );
      this.payment_ref = payment_ref;
      setTimeout(() => this.$refs.form.submit(), 80);
    },
    loadError(){
      this.error = true;
    },
    loadPayPal(e){
      this.open = true;
      console.log(e, "Loaded Successfully");
      if (typeof paypal === "undefined") {
        this.error = true;
        return;
      }
      paypal
        .Buttons({
          createOrder: (data, action) => {

            this.amount = parseFloat(100);
            this.amount = (this.amount);
            this.amount = this.amount.toFixed(2);

            this.amount1 = (this.amount/0.971)+0.31;
            this.amount1 = this.amount1.toFixed(2);

            console.log("Paypal payment of: ", this.amount);
            return action.order.create({
              application_context: {
                brand_name: "UKZ Chema Association",
                user_action: "PAY_NOW",
                shipping_preference: "NO_SHIPPING"
              },
              purchase_units: [
                {
                    description: `Joining fee for applicant: ${this.user.id} (${this.user.first_name})`,
                    amount: {
                        currency_code: "GBP",
                        value: this.amount1
                  }
                }
              ]
            });
          },
          onApprove: (data, actions) => {
            return actions.order.capture().then(details => {
              if (details.status == "COMPLETED") {
                this.orderID = data.orderID;
                this.finalise(data.orderID);
              } else {
                $.notify({
                    icon: "nc-icon nc-simple-remove",
                    message: `Error saving your payment, contact support with ID: ${data.orderID}`,
                  },
                  {
                    type: "danger",
                    timer: 8000,
                    placement: {
                      from: "top",
                      align: "right"
                    }
                  }
                );
              }
            });
          }
        })
        .render(this.$refs.paypal);
    }
  }
};
</script>

<style>
</style>
