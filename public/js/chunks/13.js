(window.webpackJsonp=window.webpackJsonp||[]).push([[13],{16:function(e,n,t){var i=t(219);"string"==typeof i&&(i=[[e.i,i,""]]);var o={hmr:!0,transform:void 0,insertInto:void 0};t(8)(i,o);i.locals&&(e.exports=i.locals)},218:function(e,n,t){"use strict";var i=t(16);t.n(i).a},219:function(e,n,t){(e.exports=t(7)(!1)).push([e.i,".nominee-num,.rm-nominee{font-size:1.2rem}.rm-nominee{right:7px;font-weight:300}",""])},277:function(e,n,t){"use strict";t.r(n);var i={props:["max_nominees"],components:{NomineeForm:function(){return t.e(5).then(t.bind(null,279))}},data:function(){return{listener:!1,nominees:[0],nominee_counter:0,nominees_details:[],nominee_btn_text:"Skip Step"}},methods:{fullNameKeyUp:function(e){this.nominees.length>1||(this.nominee_btn_text=e?"Next Step":"Skip Step")},addNominee:function(){var e=(new Date).getTime();this.nominees.push(e),this.nominee_btn_text="Next Step"},removeNominee:function(e){this.nominees=this.nominees.filter((function(n){return n!==e})),1!==this.nominees.length||this.nominees[0].full_name||(this.nominee_btn_text="Skip Step")},handleNominees:function(){if(this.nominee_counter=0,this.nominees_details=[],"Skip Step"===this.nominee_btn_text)return this.$eventBus.$emit("validate:nominee",!0);this.$eventBus.$emit("validate:nominee")},nomineeValid:function(e){this.nominees_details.push(e),this.nominee_counter+=1,this.nominee_counter===this.nominees.length&&this.$emit("done",{nominees:this.nominees_details})}}},o=(t(218),t(1)),s=Object(o.a)(i,(function(){var e=this,n=e.$createElement,t=e._self._c||n;return t("div",[t("form",{on:{submit:function(n){return n.preventDefault(),e.handleNominees()}}},[e._l(e.nominees,(function(n){return t("div",{key:n},[t("div",{staticClass:"row"},[e.nominees.length>1?t("h5",[e._v("Nominee "+e._s(e.nominees.indexOf(n)+1))]):e._e(),e._v(" "),e.nominees.length>1?t("button",{staticClass:"close rm-nominee text-danger position-absolute",attrs:{type:"button","data-toggle":"tooltip","data-placement":"top",title:"Remove Nominee","aria-label":"Close"},on:{click:function(t){return e.removeNominee(n)}}},[t("span",{attrs:{"aria-hidden":"true"}},[e._v("remove")])]):e._e()]),e._v(" "),t("nominee-form",{on:{fullName:function(n){return e.fullNameKeyUp(n)},nomineeValid:function(n){return e.nomineeValid(n)}}})],1)})),e._v(" "),t("div",{staticClass:"row"},[e.nominees.length<e.max_nominees?t("div",{staticClass:"col-6 text-center"},[t("button",{staticClass:"btn radix-btn",attrs:{type:"button"},on:{click:function(n){return e.addNominee()}}},[e._v("Add Nominee")])]):e._e(),e._v(" "),t("div",{staticClass:"col-6 text-center"},[t("button",{staticClass:"btn radix-btn",attrs:{type:"submit"}},[e._v(e._s(e.nominee_btn_text))])])])],2)])}),[],!1,null,null,null);n.default=s.exports}}]);