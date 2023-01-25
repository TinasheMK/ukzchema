(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[32],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/applicant/PersonalForm.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/applicant/PersonalForm.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vuelidate/lib/validators */ "./node_modules/vuelidate/lib/validators/index.js");
/* harmony import */ var vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var libphonenumber_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! libphonenumber-js */ "./node_modules/libphonenumber-js/index.js");
/* harmony import */ var _services_api__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../services/api */ "./resources/js/services/api.js");



/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    Datepicker: function Datepicker() {
      return __webpack_require__.e(/*! import() */ 0).then(__webpack_require__.bind(null, /*! vuejs-datepicker */ "./node_modules/vuejs-datepicker/dist/vuejs-datepicker.esm.js"));
    }
  },
  data: function data() {
    return {
      phone: "",
      phone_locked: false,
      phone_error: false,
      form: {},
      email_taken: false,
      submitted: false,
      date_invalid: false,
      validating_email: false
    };
  },
  validations: {
    form: {
      first_name: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"]
      },
      last_name: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"]
      },
      street: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"]
      },
      email: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"],
        email: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["email"]
      },
      phone: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"]
      },
      city: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"]
      },
      country: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"]
      },
      gender: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"]
      },
      dob: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"]
      }
    }
  },
  methods: {
    handlePersonal: function handlePersonal() {
      var _this = this;
      this.submitted = true;
      this.$v.$touch();
      this.phone_error = !this.validPhone(this.form.phone);
      if (this.$v.$invalid || this.phone_error) return this.scrollErrorToView();
      this.validating_email = true;
      Object(_services_api__WEBPACK_IMPORTED_MODULE_2__["isUnique"])(this.form.email).then(function (_ref) {
        var data = _ref.data;
        if (data && data.unique) {
          return _this.$emit("done", _this.form);
        }
        _this.email_taken = true;
        _this.scrollErrorToView();
      })["catch"](function (err) {
        console.error({
          err: err
        });
        _this.email_taken = true;
        _this.scrollErrorToView();
      })["finally"](function () {
        _this.submitted = false;
        _this.validating_email = false;
      });
    },
    checkDateValidity: function checkDateValidity(d) {
      var sixteenYearsAgo = moment().subtract(16, "years");
      var selectedDate = moment(d);
      if (selectedDate.isAfter(sixteenYearsAgo)) {
        this.date_invalid = true;
      } else {
        this.date_invalid = false;
      }
    },
    validPhone: function validPhone(phone) {
      if (!phone) return false;
      var phoneNumber = Object(libphonenumber_js__WEBPACK_IMPORTED_MODULE_1__["parsePhoneNumberFromString"])(phone);
      if (!phoneNumber) return false;
      return phoneNumber && phoneNumber.isValid();
    },
    scrollErrorToView: function scrollErrorToView() {
      setTimeout(function () {
        var elem = $(".is-invalid").first();
        $(elem).focus();
      }, 100);
    },
    clearEmailErr: function clearEmailErr() {
      var _this2 = this;
      setTimeout(function () {
        _this2.email_taken = false;
      }, 5000);
    }
  },
  watch: {
    phone: function phone(p) {
      var _this3 = this;
      this.form.phone = p;
      if (this.phone_locked) return;
      this.phone_locked = true;
      setTimeout(function () {
        return _this3.phone_locked = false;
      }, 10);
      this.phone = new libphonenumber_js__WEBPACK_IMPORTED_MODULE_1__["AsYouType"]().input(p);
      if (this.validPhone(p)) {
        this.phone_error = false;
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/applicant/PersonalForm.vue?vue&type=template&id=5abd2688&":
/*!*******************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib/loaders/templateLoader.js??ref--6!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/applicant/PersonalForm.vue?vue&type=template&id=5abd2688& ***!
  \*******************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function render() {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", [_c("form", {
    on: {
      submit: function submit($event) {
        $event.preventDefault();
        return null.apply(null, arguments);
      }
    }
  }, [_c("div", {
    staticClass: "row"
  }, [_vm._m(0), _vm._v(" "), _c("div", {
    staticClass: "col-12 col-lg-4"
  }, [_c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.form.first_name,
      expression: "form.first_name"
    }],
    staticClass: "form-control mb-30 bg-gray",
    "class": {
      "is-invalid": _vm.submitted && _vm.$v.form.first_name.$error
    },
    attrs: {
      type: "text",
      name: "first_name",
      id: "first_name",
      placeholder: "First Name"
    },
    domProps: {
      value: _vm.form.first_name
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;
        _vm.$set(_vm.form, "first_name", $event.target.value);
      }
    }
  })]), _vm._v(" "), _c("div", {
    staticClass: "col-12 col-lg-4"
  }, [_c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.form.middle_names,
      expression: "form.middle_names"
    }],
    staticClass: "form-control mb-30 bg-gray",
    attrs: {
      type: "text",
      name: "middle_names",
      placeholder: "Middle Names"
    },
    domProps: {
      value: _vm.form.middle_names
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;
        _vm.$set(_vm.form, "middle_names", $event.target.value);
      }
    }
  })]), _vm._v(" "), _c("div", {
    staticClass: "col-12 col-lg-4"
  }, [_c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.form.last_name,
      expression: "form.last_name"
    }],
    staticClass: "form-control mb-30 bg-gray",
    "class": {
      "is-invalid": _vm.submitted && _vm.$v.form.last_name.$error
    },
    attrs: {
      type: "text",
      name: "last_name",
      placeholder: "Last Name"
    },
    domProps: {
      value: _vm.form.last_name
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;
        _vm.$set(_vm.form, "last_name", $event.target.value);
      }
    }
  })]), _vm._v(" "), _c("div", {
    staticClass: "col-12 col-lg-6"
  }, [_c("datepicker", {
    attrs: {
      format: "dd MMMM yyyy",
      initialView: "year",
      name: "dob",
      placeholder: "Date of Birth",
      "input-class": _vm.date_invalid || _vm.submitted && _vm.$v.form.dob.$error ? "form-control is-invalid" : "mb-30 form-control"
    },
    on: {
      selected: function selected($event) {
        return _vm.checkDateValidity($event);
      }
    },
    model: {
      value: _vm.form.dob,
      callback: function callback($$v) {
        _vm.$set(_vm.form, "dob", $$v);
      },
      expression: "form.dob"
    }
  }), _vm._v(" "), !_vm.date_invalid && !_vm.form.dob ? _c("div", {
    staticClass: "mb-30"
  }) : _vm._e(), _vm._v(" "), _vm.date_invalid && _vm.form.dob ? _c("div", {
    staticClass: "mb-30 mt-2 invalid-feedback d-block"
  }, [_vm._v("\n                    You must be 16 years or older\n                ")]) : _vm._e()], 1), _vm._v(" "), _c("div", {
    staticClass: "col-12 col-lg-6"
  }, [_c("select", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.form.gender,
      expression: "form.gender"
    }],
    staticClass: "custom-select form-control mb-30 bg-gray selectpicker",
    "class": {
      "is-invalid": _vm.submitted && _vm.$v.form.gender.$error
    },
    attrs: {
      id: "gender"
    },
    on: {
      change: function change($event) {
        var $$selectedVal = Array.prototype.filter.call($event.target.options, function (o) {
          return o.selected;
        }).map(function (o) {
          var val = "_value" in o ? o._value : o.value;
          return val;
        });
        _vm.$set(_vm.form, "gender", $event.target.multiple ? $$selectedVal : $$selectedVal[0]);
      }
    }
  }, [_c("option", {
    attrs: {
      value: "undefined",
      disabled: "",
      selected: ""
    }
  }, [_vm._v("\n                        Gender\n                    ")]), _vm._v(" "), _c("option", {
    attrs: {
      value: "m"
    }
  }, [_vm._v("Male")]), _vm._v(" "), _c("option", {
    attrs: {
      value: "f"
    }
  }, [_vm._v("Female")])])])]), _vm._v(" "), _c("div", {
    staticClass: "row"
  }, [_vm._m(1), _vm._v(" "), _c("div", {
    staticClass: "col-12 col-lg-6"
  }, [_c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.form.email,
      expression: "form.email"
    }],
    staticClass: "form-control bg-gray",
    "class": {
      "is-invalid": _vm.email_taken || _vm.submitted && _vm.$v.form.email.$error
    },
    attrs: {
      id: "email",
      type: "email",
      placeholder: "Email Address"
    },
    domProps: {
      value: _vm.form.email
    },
    on: {
      focus: function focus($event) {
        return _vm.clearEmailErr();
      },
      input: function input($event) {
        if ($event.target.composing) return;
        _vm.$set(_vm.form, "email", $event.target.value);
      }
    }
  }), _vm._v(" "), !_vm.email_taken ? _c("div", {
    staticClass: "mb-30"
  }) : _vm._e(), _vm._v(" "), _vm.email_taken ? _c("div", {
    staticClass: "mb-30 mt-2 invalid-feedback d-block"
  }, [_vm._v("\n                    Email already taken\n                ")]) : _vm._e()]), _vm._v(" "), _c("div", {
    staticClass: "col-12 col-lg-6"
  }, [_c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.phone,
      expression: "phone"
    }],
    staticClass: "form-control bg-gray",
    "class": {
      "is-invalid": _vm.submitted && _vm.phone_error
    },
    attrs: {
      type: "tel",
      name: "phone",
      placeholder: "Mobile Number"
    },
    domProps: {
      value: _vm.phone
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;
        _vm.phone = $event.target.value;
      }
    }
  }), _vm._v(" "), _vm._m(2)])]), _vm._v(" "), _c("div", {
    staticClass: "row"
  }, [_vm._m(3), _vm._v(" "), _c("div", {
    staticClass: "col-12 col-lg-6"
  }, [_c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.form.street,
      expression: "form.street"
    }],
    staticClass: "form-control mb-30 bg-gray",
    "class": {
      "is-invalid": _vm.submitted && _vm.$v.form.street.$error
    },
    attrs: {
      type: "text",
      id: "street",
      name: "street",
      placeholder: "Address Line 1"
    },
    domProps: {
      value: _vm.form.street
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;
        _vm.$set(_vm.form, "street", $event.target.value);
      }
    }
  })]), _vm._v(" "), _c("div", {
    staticClass: "col-12 col-lg-6"
  }, [_c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.form.apartment,
      expression: "form.apartment"
    }],
    staticClass: "form-control mb-30 bg-gray",
    attrs: {
      type: "text",
      id: "apartment",
      name: "apartment",
      placeholder: "Address Line 2"
    },
    domProps: {
      value: _vm.form.apartment
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;
        _vm.$set(_vm.form, "apartment", $event.target.value);
      }
    }
  })]), _vm._v(" "), _c("div", {
    staticClass: "col-12 col-lg-4"
  }, [_c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.form.city,
      expression: "form.city"
    }],
    staticClass: "form-control mb-30 bg-gray",
    "class": {
      "is-invalid": _vm.submitted && _vm.$v.form.city.$error
    },
    attrs: {
      type: "text",
      name: "city",
      placeholder: "City"
    },
    domProps: {
      value: _vm.form.city
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;
        _vm.$set(_vm.form, "city", $event.target.value);
      }
    }
  })]), _vm._v(" "), _c("div", {
    staticClass: "col-12 col-lg-4"
  }, [_c("country-select", {
    staticClass: "custom-select form-control mb-30 bg-gray",
    "class": {
      "is-invalid": _vm.submitted && _vm.$v.form.country.$error
    },
    attrs: {
      country: _vm.form.country,
      whiteList: ["GB", "IE"],
      countryName: true,
      topCountry: "GB"
    },
    model: {
      value: _vm.form.country,
      callback: function callback($$v) {
        _vm.$set(_vm.form, "country", $$v);
      },
      expression: "form.country"
    }
  })], 1), _vm._v(" "), _c("div", {
    staticClass: "col-12 col-lg-4"
  }, [_c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.form.zip,
      expression: "form.zip"
    }],
    staticClass: "form-control mb-30 bg-gray",
    attrs: {
      type: "text",
      name: "zip",
      placeholder: "ZIP/Postal code"
    },
    domProps: {
      value: _vm.form.zip
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;
        _vm.$set(_vm.form, "zip", $event.target.value);
      }
    }
  })])]), _vm._v(" "), _c("div", {
    staticClass: "col-12 text-right"
  }, [_c("button", {
    staticClass: "btn radix-btn",
    attrs: {
      type: "button",
      disabled: _vm.submitted && _vm.validating_email
    },
    on: {
      click: function click($event) {
        return _vm.handlePersonal();
      }
    }
  }, [_vm._v("\n                Next Step\n            ")])])])]);
};
var staticRenderFns = [function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    staticClass: "col-12"
  }, [_c("label", {
    staticClass: "font-weight-bold",
    attrs: {
      "for": "first_name"
    }
  }, [_vm._v("Full Name:")])]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    staticClass: "col-12"
  }, [_c("label", {
    staticClass: "font-weight-bold",
    attrs: {
      "for": "email"
    }
  }, [_vm._v("Contact:")])]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    staticClass: "mb-30 mt-1"
  }, [_vm._v("\n                    With country code\n                    "), _c("small", [_vm._v("e.g +44")])]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    staticClass: "col-12"
  }, [_c("label", {
    staticClass: "font-weight-bold",
    attrs: {
      "for": "street"
    }
  }, [_vm._v("Physical Address:")])]);
}];
render._withStripped = true;


/***/ }),

/***/ "./resources/js/components/applicant/PersonalForm.vue":
/*!************************************************************!*\
  !*** ./resources/js/components/applicant/PersonalForm.vue ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _PersonalForm_vue_vue_type_template_id_5abd2688___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./PersonalForm.vue?vue&type=template&id=5abd2688& */ "./resources/js/components/applicant/PersonalForm.vue?vue&type=template&id=5abd2688&");
/* harmony import */ var _PersonalForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./PersonalForm.vue?vue&type=script&lang=js& */ "./resources/js/components/applicant/PersonalForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _PersonalForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _PersonalForm_vue_vue_type_template_id_5abd2688___WEBPACK_IMPORTED_MODULE_0__["render"],
  _PersonalForm_vue_vue_type_template_id_5abd2688___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/applicant/PersonalForm.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/applicant/PersonalForm.vue?vue&type=script&lang=js&":
/*!*************************************************************************************!*\
  !*** ./resources/js/components/applicant/PersonalForm.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PersonalForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./PersonalForm.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/applicant/PersonalForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PersonalForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/applicant/PersonalForm.vue?vue&type=template&id=5abd2688&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/components/applicant/PersonalForm.vue?vue&type=template&id=5abd2688& ***!
  \*******************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_PersonalForm_vue_vue_type_template_id_5abd2688___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??ref--6!../../../../node_modules/vue-loader/lib??vue-loader-options!./PersonalForm.vue?vue&type=template&id=5abd2688& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/applicant/PersonalForm.vue?vue&type=template&id=5abd2688&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_PersonalForm_vue_vue_type_template_id_5abd2688___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_PersonalForm_vue_vue_type_template_id_5abd2688___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);