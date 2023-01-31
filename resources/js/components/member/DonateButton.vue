<template>
  <div class="button-container">
    <div class="row">
      <div class="col-12 text-center" v-if="!loaded">
        <div class="update ml-auto mr-auto">
          <button @click="loadPayPal()" class="btn btn-primary btn-block">
            <span v-if="donate && !error" class="mr-1">
              <i class="fa fa-circle-o-notch fa-spin"></i>
            </span>
            <span>Pay £{{min}}</span>
          </button>
        </div>
      </div>
    </div>
    <p class="text-danger text-center mt-2" v-if="error">
      <i class="fa fa-frown-o"></i>
      Error loading PayPal. Refresh this page.
    </p>
    <h5 class="h6" v-if="loaded && !error">Payment method:</h5>
    <div v-if="donate" ref="paypal" class="mx-2 mt-3"></div>
    <form ref="form" :action="route" method="POST" id="submit_donation">
      <slot></slot>
      <input type="hidden" name="orderID" v-model="orderID" />
      <input type="hidden" name="obituary_id" :value="obituary_id" />
    </form>
  </div>
</template>

<script>
require("../../libs/bootstrap-notify");
export default {
  props: ["obituary", "min", "route", "client_id"],
  data() {
    return {
      donate: false,
      amount: this.min,
      loaded: false,
      obituary_id: this.obituary.id,
      amount_err: false,
      orderID: null,
      error: false,
      btn_text: "Donate"
    };
  },
  mounted() {
    console.log(this.obituary, this.min);
  },
  methods: {
    loadError(){
      this.error = true;
    },
    loadPayPal() {
        if(this.amount == 0) {
            alert('Oops! Invalid Amount');
            return;
        }
      this.donate = true;
      this.btn_text = "Do not Close";
      const scr = document.createElement("script");
      scr.src =
        `https://www.paypal.com/sdk/js?client-id=${this.client_id}&currency=GBP`;
      scr.addEventListener("load", this.showModal);
      scr.addEventListener("error", this.loadError);
      document.body.append(scr);
    },
    showModal(e) {
      this.loaded = true;
      if (typeof paypal === "undefined") {
        console.log("Error loading");
        return;
      }
      paypal
        .Buttons({
          createOrder: (data, action) => {
            this.amount = parseFloat(this.amount);
            this.amount = (this.amount);
            this.amount = this.amount.toFixed(2);

            this.amount1 = (this.amount/0.9871)+0.30-this.amount;
            this.amount1 = this.amount1.toFixed(2);

            return action.order.create({
              application_context: {
                brand_name: "UKZ Chema Association",
                user_action: "PAY_NOW",
                shipping_preference: "NO_SHIPPING"
              },
              purchase_units: [
                {
                  description: `Chema payment for ${this.obituary.full_name}`,
                  amount: {
                    currency_code: "GBP",
                    value: this.amount
                  }
                },
                {
                    reference_id: "d9f80740-38f0-11e8-b467-0ed5f89f718b",
                    description: `Charges`,
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
                console.log(data);
                this.orderID = data.orderID;
                this.loaded = false;
                this.finalise(data.orderID);
              } else {
                this.alertError(
                  "Error saving your payment, contact support with ID: " +
                    data.orderID
                , true);
              }
            });
          }
        })
        .render(this.$refs.paypal);
    },
    finalise(orderID) {
      $.notify(
        {
          icon: "nc-icon nc-check-2",
          message: "Payment received. Redirecting..."
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
      this.orderID = orderID;
      setTimeout(() => this.$refs.form.submit(), 80);
    },
    alertError(message, e = false) {
      if (!e) this.amount_err = true;

      $.notify(
        {
          icon: "nc-icon nc-simple-remove",
          message
        },
        {
          type: "danger",
          timer: e ? 8000 : 3000,
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
.currency-err {
  border-color: var(--danger) !important;
}
</style>
