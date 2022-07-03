(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[12],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/member/NomineesForm.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/member/NomineesForm.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
__webpack_require__(/*! ../../libs/bootstrap-notify */ "./resources/js/libs/bootstrap-notify.js");

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ["route", "nominees", "can_update", "maximum_nominees"],
  components: {
    Datepicker: function Datepicker() {
      return __webpack_require__.e(/*! import() */ 0).then(__webpack_require__.bind(null, /*! vuejs-datepicker */ "./node_modules/vuejs-datepicker/dist/vuejs-datepicker.esm.js"));
    }
  },
  data: function data() {
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
  mounted: function mounted() {
    this.max_nominees = Number(this.maximum_nominees);
    console.log(this.can_update, this.max_nominees);
    this.nominee_vacant = this.max_nominees - this.nominees.length;

    if (!this.unlocked) {
      this.alertLocked();
    }
  },
  methods: {
    add: function add() {
      this.nominee_vacant -= 1;
      this.updated_nominees.push({
        full_name: null,
        id: new Date().getTime() + '_new'
      });
    },
    del: function del(nominee) {
      if (isNaN(nominee.id)) {
        this.updated_nominees = this.updated_nominees.filter(function (n) {
          return n.id !== nominee.id;
        });
        this.nominee_vacant = 3 - this.updated_nominees.length;
        return;
      }

      this.del_full_name = nominee.full_name;
      this.del_route = "".concat(this.route, "/").concat(nominee.id);
      setTimeout(function () {
        return $('#remove_nominee').modal('show');
      }, 20);
    },
    alertLocked: function alertLocked() {
      $.notify({
        icon: "nc-icon nc-bell-55",
        message: "You cannot update nominees at the moment"
      }, {
        type: "info",
        timer: 2000,
        placement: {
          from: "top",
          align: "right"
        }
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/member/NomineesForm.vue?vue&type=style&index=0&lang=css&":
/*!*************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--6-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/member/NomineesForm.vue?vue&type=style&index=0&lang=css& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.dob {\r\n  background-color: #ffffff !important;\r\n  color: #7d7a75 !important;\r\n  cursor: pointer !important;\n}\r\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/member/NomineesForm.vue?vue&type=style&index=0&lang=css&":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--6-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/member/NomineesForm.vue?vue&type=style&index=0&lang=css& ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../node_modules/css-loader??ref--6-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--6-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./NomineesForm.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/member/NomineesForm.vue?vue&type=style&index=0&lang=css&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/member/NomineesForm.vue?vue&type=template&id=b7e291c0&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/member/NomineesForm.vue?vue&type=template&id=b7e291c0& ***!
  \**********************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c(
      "form",
      { attrs: { action: _vm.route, method: "POST" } },
      [
        _vm._t("default"),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "row" },
          [
            _vm._l(_vm.updated_nominees, function(nominee, i) {
              return _c("div", { key: nominee.id, staticClass: "col-md-6" }, [
                _c("div", { staticClass: "card" }, [
                  _c("div", { staticClass: "card-header" }, [
                    _c("h5", { staticClass: "card-title" }, [
                      _vm._v(
                        "\n              Nominee " +
                          _vm._s(i + 1) +
                          "\n              "
                      ),
                      _vm.unlocked
                        ? _c(
                            "span",
                            {
                              staticClass: "close text-danger",
                              on: {
                                click: function($event) {
                                  return _vm.del(nominee)
                                }
                              }
                            },
                            [
                              _c("i", {
                                staticClass: "fa fa-trash",
                                attrs: { "aria-hidden": "true" }
                              })
                            ]
                          )
                        : _vm._e()
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "card-body" }, [
                    _c("div", { staticClass: "row" }, [
                      _c("div", { staticClass: "col-md-12" }, [
                        _c("input", {
                          attrs: {
                            type: "hidden",
                            name: "nominees[" + i + "][id]"
                          },
                          domProps: { value: nominee.id }
                        }),
                        _vm._v(" "),
                        _c("div", { staticClass: "form-group" }, [
                          _c("label", [_vm._v("Full Name")]),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: nominee.full_name,
                                expression: "nominee.full_name"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              required: "",
                              name: "nominees[" + i + "][full_name]",
                              type: "text",
                              disabled: !_vm.unlocked
                            },
                            domProps: { value: nominee.full_name },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  nominee,
                                  "full_name",
                                  $event.target.value
                                )
                              }
                            }
                          })
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "col-md-12" }, [
                        _c("div", { staticClass: "form-group" }, [
                          _c(
                            "label",
                            { attrs: { for: "exampleInputEmail1" } },
                            [_vm._v("Email address")]
                          ),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: nominee.email,
                                expression: "nominee.email"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              name: "nominees[" + i + "][email]",
                              type: "email",
                              disabled: !_vm.unlocked
                            },
                            domProps: { value: nominee.email },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(nominee, "email", $event.target.value)
                              }
                            }
                          })
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "col-md-12" }, [
                        _c(
                          "div",
                          { staticClass: "form-group" },
                          [
                            _c("label", [_vm._v("Date of Birth")]),
                            _vm._v(" "),
                            _c("datepicker", {
                              attrs: {
                                format: "dd MMMM yyyy",
                                initialView: "year",
                                disabled: !_vm.unlocked,
                                name: "nominees[" + i + "][dob]",
                                "input-class": _vm.unlocked
                                  ? "form-control dob"
                                  : "form-control nom"
                              },
                              model: {
                                value: nominee.dob,
                                callback: function($$v) {
                                  _vm.$set(nominee, "dob", $$v)
                                },
                                expression: "nominee.dob"
                              }
                            })
                          ],
                          1
                        )
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "col-md-12" }, [
                        _c("div", { staticClass: "form-group" }, [
                          _c("label", [_vm._v("Zimbabwean By")]),
                          _vm._v(" "),
                          _c(
                            "select",
                            {
                              staticClass: "form-control select2",
                              attrs: {
                                disabled: !_vm.unlocked,
                                required: "",
                                name: "nominees[" + i + "][zimbabwean_by]"
                              }
                            },
                            [
                              _c(
                                "option",
                                {
                                  attrs: { value: "birth" },
                                  domProps: {
                                    selected: nominee.zimbabwean_by === "birth"
                                  }
                                },
                                [_vm._v("Birth")]
                              ),
                              _vm._v(" "),
                              _c(
                                "option",
                                {
                                  attrs: { value: "descent" },
                                  domProps: {
                                    selected:
                                      nominee.zimbabwean_by === "descent"
                                  }
                                },
                                [_vm._v("Descent")]
                              ),
                              _vm._v(" "),
                              _c(
                                "option",
                                {
                                  attrs: { value: "spouse" },
                                  domProps: {
                                    selected: nominee.zimbabwean_by === "spouse"
                                  }
                                },
                                [_vm._v("Spouse")]
                              )
                            ]
                          )
                        ])
                      ])
                    ])
                  ])
                ])
              ])
            }),
            _vm._v(" "),
            _vm.can_update && _vm.nominee_vacant >= 1
              ? _c("div", { staticClass: "col-md-6" }, [
                  _c("div", { staticClass: "card card-user text-center p-3" }, [
                    _c("p", { staticClass: "mt-3 mb-2" }, [
                      _vm._v(
                        "\n            Click button to add new nominee details\n            "
                      ),
                      _c("br"),
                      _vm._v(" "),
                      _c("small", { staticClass: "text-muted" }, [
                        _vm._v(
                          "You can add " +
                            _vm._s(_vm.nominee_vacant) +
                            " more nominee" +
                            _vm._s(_vm.nominee_vacant === 1 ? "" : "s")
                        )
                      ])
                    ]),
                    _vm._v(" "),
                    _c(
                      "button",
                      {
                        staticClass: "btn btn-primary btn-round",
                        attrs: { type: "button" },
                        on: {
                          click: function($event) {
                            return _vm.add()
                          }
                        }
                      },
                      [_vm._v("Add Nominee")]
                    )
                  ])
                ])
              : _vm._e(),
            _vm._v(" "),
            _vm.can_update && _vm.nominee_vacant !== 3
              ? _c("div", { staticClass: "col-12 text-center" }, [
                  _c(
                    "button",
                    {
                      staticClass: "btn btn-primary btn-round",
                      attrs: { type: "submit" }
                    },
                    [_vm._v("Update Changes")]
                  )
                ])
              : _vm._e(),
            _vm._v(" "),
            _c("div", {
              staticClass: "clearfix",
              staticStyle: { "margin-bottom": "110px" }
            })
          ],
          2
        )
      ],
      2
    ),
    _vm._v(" "),
    _vm.can_update
      ? _c(
          "div",
          {
            staticClass: "modal fade modal-danger",
            attrs: { id: "remove_nominee" }
          },
          [
            _c("div", { staticClass: "modal-dialog" }, [
              _c("div", { staticClass: "modal-content" }, [
                _c("div", { staticClass: "modal-header bg-danger" }, [
                  _c("h4", { staticClass: "modal-title mt-0" }, [
                    _vm._v("\n            Are you sure you want to remove "),
                    _c("strong", [_vm._v(_vm._s(_vm.del_full_name))]),
                    _vm._v(" from your nominees list?\n          ")
                  ]),
                  _vm._v(" "),
                  _c(
                    "button",
                    {
                      staticClass: "close",
                      attrs: {
                        type: "button",
                        "data-dismiss": "modal",
                        "aria-hidden": "true"
                      }
                    },
                    [_vm._v("×")]
                  )
                ]),
                _vm._v(" "),
                _c(
                  "form",
                  { attrs: { action: _vm.del_route, method: "POST" } },
                  [
                    _vm._t("default"),
                    _vm._v(" "),
                    _c("input", {
                      attrs: {
                        type: "hidden",
                        name: "_method",
                        value: "DELETE"
                      }
                    }),
                    _vm._v(" "),
                    _vm._m(0)
                  ],
                  2
                )
              ])
            ])
          ]
        )
      : _vm._e()
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "modal-footer" }, [
      _c(
        "button",
        {
          staticClass: "btn btn-default",
          attrs: { type: "button", "data-dismiss": "modal" }
        },
        [_vm._v("Cancel")]
      ),
      _vm._v(" "),
      _c(
        "button",
        { staticClass: "btn btn-danger", attrs: { type: "submit" } },
        [_vm._v("Delete")]
      )
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/member/NomineesForm.vue":
/*!*********************************************************!*\
  !*** ./resources/js/components/member/NomineesForm.vue ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _NomineesForm_vue_vue_type_template_id_b7e291c0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./NomineesForm.vue?vue&type=template&id=b7e291c0& */ "./resources/js/components/member/NomineesForm.vue?vue&type=template&id=b7e291c0&");
/* harmony import */ var _NomineesForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./NomineesForm.vue?vue&type=script&lang=js& */ "./resources/js/components/member/NomineesForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _NomineesForm_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./NomineesForm.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/member/NomineesForm.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _NomineesForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _NomineesForm_vue_vue_type_template_id_b7e291c0___WEBPACK_IMPORTED_MODULE_0__["render"],
  _NomineesForm_vue_vue_type_template_id_b7e291c0___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/member/NomineesForm.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/member/NomineesForm.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/member/NomineesForm.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_NomineesForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./NomineesForm.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/member/NomineesForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_NomineesForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/member/NomineesForm.vue?vue&type=style&index=0&lang=css&":
/*!******************************************************************************************!*\
  !*** ./resources/js/components/member/NomineesForm.vue?vue&type=style&index=0&lang=css& ***!
  \******************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_NomineesForm_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader!../../../../node_modules/css-loader??ref--6-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--6-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./NomineesForm.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/member/NomineesForm.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_NomineesForm_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_NomineesForm_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_NomineesForm_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_NomineesForm_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_NomineesForm_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/components/member/NomineesForm.vue?vue&type=template&id=b7e291c0&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/member/NomineesForm.vue?vue&type=template&id=b7e291c0& ***!
  \****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NomineesForm_vue_vue_type_template_id_b7e291c0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./NomineesForm.vue?vue&type=template&id=b7e291c0& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/member/NomineesForm.vue?vue&type=template&id=b7e291c0&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NomineesForm_vue_vue_type_template_id_b7e291c0___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NomineesForm_vue_vue_type_template_id_b7e291c0___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);