/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports, __webpack_require__) {

	usernoise.miniRequire.define('discussion/dist/discussion', ['vendor/vue'], function(Vue) {
	  var getOptions;
	  getOptions = function(el) {
	    return {
	      type: el.attributes['current-type'] ? el.attributes['current-type'].value : null,
	      tabs: !el.attributes['notabs']
	    };
	  };
	  return {
	    discussion: function(el) {
	      var $, discussions, template;
	      $ = __webpack_require__(1);
	      Vue.config.prefix = 'un-';
	      Vue.config.debug = true;
	      discussions = __webpack_require__(2);
	      template = discussions.options.template;
	      discussions = discussions(getOptions(el));
	      discussions.template = template;
	      return new Vue($.extend({}, discussions, {
	        el: el
	      }));
	    },
	    discussionPopup: function(id) {
	      return __webpack_require__(29)(id);
	    }
	  };
	});


/***/ },
/* 1 */
/***/ function(module, exports) {

	module.exports = jQuery;

/***/ },
/* 2 */
/***/ function(module, exports, __webpack_require__) {

	var __vue_script__, __vue_template__
	__webpack_require__(3)
	__vue_script__ = __webpack_require__(7)
	__vue_template__ = __webpack_require__(70)
	module.exports = __vue_script__ || {}
	if (module.exports.__esModule) module.exports = module.exports.default
	if (__vue_template__) { (typeof module.exports === "function" ? module.exports.options : module.exports).template = __vue_template__ }
	if (false) {(function () {  module.hot.accept()
	  var hotAPI = require("vue-hot-reload-api")
	  hotAPI.install(require("vue"), true)
	  if (!hotAPI.compatible) return
	  var id = "/Users/karevn/Dropbox/www/wp/wp-content/plugins/usernoise/js/discussion/components/discussions.vue"
	  if (!module.hot.data) {
	    hotAPI.createRecord(id, module.exports)
	  } else {
	    hotAPI.update(id, module.exports, __vue_template__)
	  }
	})()}

/***/ },
/* 3 */
/***/ function(module, exports, __webpack_require__) {

	// style-loader: Adds some css to the DOM by adding a <style> tag

	// load the styles
	var content = __webpack_require__(4);
	if(typeof content === 'string') content = [[module.id, content, '']];
	// add the styles to the DOM
	var update = __webpack_require__(6)(content, {});
	if(content.locals) module.exports = content.locals;
	// Hot Module Replacement
	if(false) {
		// When the styles change, update the <style> tags
		if(!content.locals) {
			module.hot.accept("!!./../node_modules/css-loader/index.js!./../node_modules/vue-loader/lib/style-rewriter.js?id=_v-177c9c72&file=discussions.vue!./../node_modules/autoprefixer-loader/index.js!./../../../node_modules/sass-loader/index.js?indentedSyntax!./../node_modules/vue-loader/lib/selector.js?type=style&index=0!./discussions.vue", function() {
				var newContent = require("!!./../node_modules/css-loader/index.js!./../node_modules/vue-loader/lib/style-rewriter.js?id=_v-177c9c72&file=discussions.vue!./../node_modules/autoprefixer-loader/index.js!./../../../node_modules/sass-loader/index.js?indentedSyntax!./../node_modules/vue-loader/lib/selector.js?type=style&index=0!./discussions.vue");
				if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
				update(newContent);
			});
		}
		// When the module is disposed, remove the <style> tags
		module.hot.dispose(function() { update(); });
	}

/***/ },
/* 4 */
/***/ function(module, exports, __webpack_require__) {

	exports = module.exports = __webpack_require__(5)();
	// imports


	// module
	exports.push([module.id, "@-webkit-keyframes un-icon-spin {\n  0% {\n    -webkit-transform: rotate(0deg);\n            transform: rotate(0deg); }\n  100% {\n    -webkit-transform: rotate(359.9deg);\n            transform: rotate(359.9deg); } }\n\n@keyframes un-icon-spin {\n  0% {\n    -webkit-transform: rotate(0deg);\n            transform: rotate(0deg); }\n  100% {\n    -webkit-transform: rotate(359.9deg);\n            transform: rotate(359.9deg); } }\n\n.un-icon-spin {\n  -webkit-animation: un-icon-spin linear 1.5s infinite;\n          animation: un-icon-spin linear 1.5s infinite; }\n\ndiv.un-discussions, div.un-discussion-popup {\n  color: #4A4A4F;\n  font-weight: normal; }\n  div.un-discussions div, div.un-discussions span, div.un-discussion-popup div, div.un-discussion-popup span {\n    padding: 0;\n    margin: 0;\n    font-size: 14px;\n    line-height: 1.5;\n    box-sizing: border-box;\n    float: none; }\n  div.un-discussions h3, div.un-discussions h3 a, div.un-discussion-popup h3, div.un-discussion-popup h3 a {\n    color: inherit; }\n  div.un-discussions textarea, div.un-discussions input[type=text], div.un-discussions input[type=email], div.un-discussion-popup textarea, div.un-discussion-popup input[type=text], div.un-discussion-popup input[type=email] {\n    box-sizing: border-box;\n    display: block; }\n  div.un-discussions div, div.un-discussion-popup div {\n    display: block; }\n  div.un-discussions p, div.un-discussion-popup p {\n    font-size: 14px;\n    word-spacing: 0.05em;\n    line-height: 1.6;\n    margin: 1.2em 0; }\n  div.un-discussions .un-fade-transition, div.un-discussion-popup .un-fade-transition {\n    -webkit-transition: opacity 0.3s;\n    transition: opacity 0.3s;\n    opacity: 1; }\n  div.un-discussions .un-fade-enter, div.un-discussions .un-fade-leave, div.un-discussion-popup .un-fade-enter, div.un-discussion-popup .un-fade-leave {\n    opacity: 0; }\n  div.un-discussions button, div.un-discussion-popup button {\n    white-space: nowrap; }\n", ""]);

	// exports


/***/ },
/* 5 */
/***/ function(module, exports) {

	/*
		MIT License http://www.opensource.org/licenses/mit-license.php
		Author Tobias Koppers @sokra
	*/
	// css base code, injected by the css-loader
	module.exports = function() {
		var list = [];

		// return the list of modules as css string
		list.toString = function toString() {
			var result = [];
			for(var i = 0; i < this.length; i++) {
				var item = this[i];
				if(item[2]) {
					result.push("@media " + item[2] + "{" + item[1] + "}");
				} else {
					result.push(item[1]);
				}
			}
			return result.join("");
		};

		// import a list of modules into the list
		list.i = function(modules, mediaQuery) {
			if(typeof modules === "string")
				modules = [[null, modules, ""]];
			var alreadyImportedModules = {};
			for(var i = 0; i < this.length; i++) {
				var id = this[i][0];
				if(typeof id === "number")
					alreadyImportedModules[id] = true;
			}
			for(i = 0; i < modules.length; i++) {
				var item = modules[i];
				// skip already imported module
				// this implementation is not 100% perfect for weird media query combinations
				//  when a module is imported multiple times with different media queries.
				//  I hope this will never occur (Hey this way we have smaller bundles)
				if(typeof item[0] !== "number" || !alreadyImportedModules[item[0]]) {
					if(mediaQuery && !item[2]) {
						item[2] = mediaQuery;
					} else if(mediaQuery) {
						item[2] = "(" + item[2] + ") and (" + mediaQuery + ")";
					}
					list.push(item);
				}
			}
		};
		return list;
	};


/***/ },
/* 6 */
/***/ function(module, exports, __webpack_require__) {

	/*
		MIT License http://www.opensource.org/licenses/mit-license.php
		Author Tobias Koppers @sokra
	*/
	var stylesInDom = {},
		memoize = function(fn) {
			var memo;
			return function () {
				if (typeof memo === "undefined") memo = fn.apply(this, arguments);
				return memo;
			};
		},
		isOldIE = memoize(function() {
			return /msie [6-9]\b/.test(window.navigator.userAgent.toLowerCase());
		}),
		getHeadElement = memoize(function () {
			return document.head || document.getElementsByTagName("head")[0];
		}),
		singletonElement = null,
		singletonCounter = 0,
		styleElementsInsertedAtTop = [];

	module.exports = function(list, options) {
		if(false) {
			if(typeof document !== "object") throw new Error("The style-loader cannot be used in a non-browser environment");
		}

		options = options || {};
		// Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
		// tags it will allow on a page
		if (typeof options.singleton === "undefined") options.singleton = isOldIE();

		// By default, add <style> tags to the bottom of <head>.
		if (typeof options.insertAt === "undefined") options.insertAt = "bottom";

		var styles = listToStyles(list);
		addStylesToDom(styles, options);

		return function update(newList) {
			var mayRemove = [];
			for(var i = 0; i < styles.length; i++) {
				var item = styles[i];
				var domStyle = stylesInDom[item.id];
				domStyle.refs--;
				mayRemove.push(domStyle);
			}
			if(newList) {
				var newStyles = listToStyles(newList);
				addStylesToDom(newStyles, options);
			}
			for(var i = 0; i < mayRemove.length; i++) {
				var domStyle = mayRemove[i];
				if(domStyle.refs === 0) {
					for(var j = 0; j < domStyle.parts.length; j++)
						domStyle.parts[j]();
					delete stylesInDom[domStyle.id];
				}
			}
		};
	}

	function addStylesToDom(styles, options) {
		for(var i = 0; i < styles.length; i++) {
			var item = styles[i];
			var domStyle = stylesInDom[item.id];
			if(domStyle) {
				domStyle.refs++;
				for(var j = 0; j < domStyle.parts.length; j++) {
					domStyle.parts[j](item.parts[j]);
				}
				for(; j < item.parts.length; j++) {
					domStyle.parts.push(addStyle(item.parts[j], options));
				}
			} else {
				var parts = [];
				for(var j = 0; j < item.parts.length; j++) {
					parts.push(addStyle(item.parts[j], options));
				}
				stylesInDom[item.id] = {id: item.id, refs: 1, parts: parts};
			}
		}
	}

	function listToStyles(list) {
		var styles = [];
		var newStyles = {};
		for(var i = 0; i < list.length; i++) {
			var item = list[i];
			var id = item[0];
			var css = item[1];
			var media = item[2];
			var sourceMap = item[3];
			var part = {css: css, media: media, sourceMap: sourceMap};
			if(!newStyles[id])
				styles.push(newStyles[id] = {id: id, parts: [part]});
			else
				newStyles[id].parts.push(part);
		}
		return styles;
	}

	function insertStyleElement(options, styleElement) {
		var head = getHeadElement();
		var lastStyleElementInsertedAtTop = styleElementsInsertedAtTop[styleElementsInsertedAtTop.length - 1];
		if (options.insertAt === "top") {
			if(!lastStyleElementInsertedAtTop) {
				head.insertBefore(styleElement, head.firstChild);
			} else if(lastStyleElementInsertedAtTop.nextSibling) {
				head.insertBefore(styleElement, lastStyleElementInsertedAtTop.nextSibling);
			} else {
				head.appendChild(styleElement);
			}
			styleElementsInsertedAtTop.push(styleElement);
		} else if (options.insertAt === "bottom") {
			head.appendChild(styleElement);
		} else {
			throw new Error("Invalid value for parameter 'insertAt'. Must be 'top' or 'bottom'.");
		}
	}

	function removeStyleElement(styleElement) {
		styleElement.parentNode.removeChild(styleElement);
		var idx = styleElementsInsertedAtTop.indexOf(styleElement);
		if(idx >= 0) {
			styleElementsInsertedAtTop.splice(idx, 1);
		}
	}

	function createStyleElement(options) {
		var styleElement = document.createElement("style");
		styleElement.type = "text/css";
		insertStyleElement(options, styleElement);
		return styleElement;
	}

	function createLinkElement(options) {
		var linkElement = document.createElement("link");
		linkElement.rel = "stylesheet";
		insertStyleElement(options, linkElement);
		return linkElement;
	}

	function addStyle(obj, options) {
		var styleElement, update, remove;

		if (options.singleton) {
			var styleIndex = singletonCounter++;
			styleElement = singletonElement || (singletonElement = createStyleElement(options));
			update = applyToSingletonTag.bind(null, styleElement, styleIndex, false);
			remove = applyToSingletonTag.bind(null, styleElement, styleIndex, true);
		} else if(obj.sourceMap &&
			typeof URL === "function" &&
			typeof URL.createObjectURL === "function" &&
			typeof URL.revokeObjectURL === "function" &&
			typeof Blob === "function" &&
			typeof btoa === "function") {
			styleElement = createLinkElement(options);
			update = updateLink.bind(null, styleElement);
			remove = function() {
				removeStyleElement(styleElement);
				if(styleElement.href)
					URL.revokeObjectURL(styleElement.href);
			};
		} else {
			styleElement = createStyleElement(options);
			update = applyToTag.bind(null, styleElement);
			remove = function() {
				removeStyleElement(styleElement);
			};
		}

		update(obj);

		return function updateStyle(newObj) {
			if(newObj) {
				if(newObj.css === obj.css && newObj.media === obj.media && newObj.sourceMap === obj.sourceMap)
					return;
				update(obj = newObj);
			} else {
				remove();
			}
		};
	}

	var replaceText = (function () {
		var textStore = [];

		return function (index, replacement) {
			textStore[index] = replacement;
			return textStore.filter(Boolean).join('\n');
		};
	})();

	function applyToSingletonTag(styleElement, index, remove, obj) {
		var css = remove ? "" : obj.css;

		if (styleElement.styleSheet) {
			styleElement.styleSheet.cssText = replaceText(index, css);
		} else {
			var cssNode = document.createTextNode(css);
			var childNodes = styleElement.childNodes;
			if (childNodes[index]) styleElement.removeChild(childNodes[index]);
			if (childNodes.length) {
				styleElement.insertBefore(cssNode, childNodes[index]);
			} else {
				styleElement.appendChild(cssNode);
			}
		}
	}

	function applyToTag(styleElement, obj) {
		var css = obj.css;
		var media = obj.media;
		var sourceMap = obj.sourceMap;

		if(media) {
			styleElement.setAttribute("media", media)
		}

		if(styleElement.styleSheet) {
			styleElement.styleSheet.cssText = css;
		} else {
			while(styleElement.firstChild) {
				styleElement.removeChild(styleElement.firstChild);
			}
			styleElement.appendChild(document.createTextNode(css));
		}
	}

	function updateLink(linkElement, obj) {
		var css = obj.css;
		var media = obj.media;
		var sourceMap = obj.sourceMap;

		if(sourceMap) {
			// http://stackoverflow.com/a/26603875
			css += "\n/*# sourceMappingURL=data:application/json;base64," + btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))) + " */";
		}

		var blob = new Blob([css], { type: "text/css" });

		var oldSrc = linkElement.href;

		linkElement.href = URL.createObjectURL(blob);

		if(oldSrc)
			URL.revokeObjectURL(oldSrc);
	}


/***/ },
/* 7 */
/***/ function(module, exports, __webpack_require__) {

	module.exports = function(options) {
	  console.info(options);
	  return {
	    components: {
	      filters: __webpack_require__(8),
	      'discussion-list': __webpack_require__(16)
	    },
	    data: function() {
	      return {
	        currentType: this.getDefaultType(),
	        isMyFeedback: false,
	        tabs: options.tabs
	      };
	    },
	    methods: {
	      getDefaultType: function() {
	        var type;
	        if (options.type) {
	          return options.type;
	        }
	        if (!usernoise.config.form.fields.type) {
	          return null;
	        }
	        for (type in usernoise.config.form.fields.type.options) {
	          return type;
	        }
	      }
	    }
	  };
	};

	module.exports.options = {};


/***/ },
/* 8 */
/***/ function(module, exports, __webpack_require__) {

	var __vue_script__, __vue_template__
	__webpack_require__(9)
	__vue_script__ = __webpack_require__(11)
	__vue_template__ = __webpack_require__(15)
	module.exports = __vue_script__ || {}
	if (module.exports.__esModule) module.exports = module.exports.default
	if (__vue_template__) { (typeof module.exports === "function" ? module.exports.options : module.exports).template = __vue_template__ }
	if (false) {(function () {  module.hot.accept()
	  var hotAPI = require("vue-hot-reload-api")
	  hotAPI.install(require("vue"), true)
	  if (!hotAPI.compatible) return
	  var id = "/Users/karevn/Dropbox/www/wp/wp-content/plugins/usernoise/js/discussion/components/filters.vue"
	  if (!module.hot.data) {
	    hotAPI.createRecord(id, module.exports)
	  } else {
	    hotAPI.update(id, module.exports, __vue_template__)
	  }
	})()}

/***/ },
/* 9 */
/***/ function(module, exports, __webpack_require__) {

	// style-loader: Adds some css to the DOM by adding a <style> tag

	// load the styles
	var content = __webpack_require__(10);
	if(typeof content === 'string') content = [[module.id, content, '']];
	// add the styles to the DOM
	var update = __webpack_require__(6)(content, {});
	if(content.locals) module.exports = content.locals;
	// Hot Module Replacement
	if(false) {
		// When the styles change, update the <style> tags
		if(!content.locals) {
			module.hot.accept("!!./../node_modules/css-loader/index.js!./../node_modules/vue-loader/lib/style-rewriter.js?id=_v-31db0277&file=filters.vue!./../node_modules/autoprefixer-loader/index.js!./../../../node_modules/sass-loader/index.js?indentedSyntax!./../node_modules/vue-loader/lib/selector.js?type=style&index=0!./filters.vue", function() {
				var newContent = require("!!./../node_modules/css-loader/index.js!./../node_modules/vue-loader/lib/style-rewriter.js?id=_v-31db0277&file=filters.vue!./../node_modules/autoprefixer-loader/index.js!./../../../node_modules/sass-loader/index.js?indentedSyntax!./../node_modules/vue-loader/lib/selector.js?type=style&index=0!./filters.vue");
				if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
				update(newContent);
			});
		}
		// When the module is disposed, remove the <style> tags
		module.hot.dispose(function() { update(); });
	}

/***/ },
/* 10 */
/***/ function(module, exports, __webpack_require__) {

	exports = module.exports = __webpack_require__(5)();
	// imports


	// module
	exports.push([module.id, ".un-discussions .un-filters {\n  position: relative; }\n\n.un-discussions .un-feedback-type-link, .un-discussions .un-my-feedback-link, .un-discussions .un-all-feedback-link {\n  display: inline-block;\n  background: #FAFAFA;\n  padding: 6px 18px;\n  margin-right: 6px;\n  -webkit-transition: all 0.2s;\n  transition: all 0.2s;\n  position: relative;\n  border-radius: 2px;\n  cursor: pointer;\n  margin-bottom: 6px; }\n  .un-discussions .un-feedback-type-link:after, .un-discussions .un-my-feedback-link:after, .un-discussions .un-all-feedback-link:after {\n    display: block;\n    bottom: -4px;\n    left: 50%;\n    position: absolute;\n    width: 0;\n    height: 0;\n    content: ' ';\n    border-top: 4px solid transparent;\n    border-left: 4px solid transparent;\n    border-right: 4px solid transparent;\n    margin-left: -4px;\n    -webkit-transition: all 0.2s;\n    transition: all 0.2s; }\n  .un-discussions .un-feedback-type-link.un-current, .un-discussions .un-my-feedback-link.un-current, .un-discussions .un-all-feedback-link.un-current {\n    background: #0096DE;\n    color: white; }\n    .un-discussions .un-feedback-type-link.un-current:after, .un-discussions .un-my-feedback-link.un-current:after, .un-discussions .un-all-feedback-link.un-current:after {\n      border-top: 4px solid #0096de; }\n\n.un-discussions .un-my-feedback-link {\n  float: right;\n  top: 0;\n  right: 0; }\n  .un-discussions .un-my-feedback-link.un-left {\n    position: relative; }\n", ""]);

	// exports


/***/ },
/* 11 */
/***/ function(module, exports, __webpack_require__) {

	module.exports = {
	  props: ['current-type', 'is-my-feedback'],
	  components: {
	    'type-link': __webpack_require__(12)
	  },
	  data: function() {
	    return {
	      i18n: usernoise.i18n,
	      types: this.getFeedbackTypes()
	    };
	  },
	  methods: {
	    getFeedbackTypes: function() {
	      var typeField;
	      if (!(typeField = usernoise.config.form.fields.type)) {
	        return null;
	      }
	      return typeField.options;
	    },
	    onMyFeedbackClick: function(e) {
	      e.preventDefault();
	      this.currentType = null;
	      return this.isMyFeedback = true;
	    },
	    onAllFeedbackClick: function(e) {
	      e.preventDefault();
	      this.currentType = null;
	      return this.isMyFeedback = false;
	    }
	  }
	};


/***/ },
/* 12 */
/***/ function(module, exports, __webpack_require__) {

	var __vue_script__, __vue_template__
	__vue_script__ = __webpack_require__(13)
	__vue_template__ = __webpack_require__(14)
	module.exports = __vue_script__ || {}
	if (module.exports.__esModule) module.exports = module.exports.default
	if (__vue_template__) { (typeof module.exports === "function" ? module.exports.options : module.exports).template = __vue_template__ }
	if (false) {(function () {  module.hot.accept()
	  var hotAPI = require("vue-hot-reload-api")
	  hotAPI.install(require("vue"), true)
	  if (!hotAPI.compatible) return
	  var id = "/Users/karevn/Dropbox/www/wp/wp-content/plugins/usernoise/js/discussion/components/type-link.vue"
	  if (!module.hot.data) {
	    hotAPI.createRecord(id, module.exports)
	  } else {
	    hotAPI.update(id, module.exports, __vue_template__)
	  }
	})()}

/***/ },
/* 13 */
/***/ function(module, exports) {

	module.exports = {
	  props: ['label', 'current-type', 'is-my-feedback'],
	  methods: {
	    onClick: function(e) {
	      e.preventDefault();
	      this.currentType = this.$key;
	      return this.isMyFeedback = false;
	    }
	  }
	};


/***/ },
/* 14 */
/***/ function(module, exports) {

	module.exports = "\n<div un-on=\"click: onClick\"  class=\"un-feedback-type-link\" un-class=\"un-current: $key == currentType\">\n\t{{label}}\n</div>\n";

/***/ },
/* 15 */
/***/ function(module, exports) {

	module.exports = "\n<div class=\"un-filters\">\n\t<div class=\"un-my-feedback-link\" un-on=\"click: onMyFeedbackClick\" un-class=\"un-current: isMyFeedback, un-left: !types\">\n\t\t\t{{i18n['My feedback']}}\n\t\t</div>\n\t<div class=\"un-feedback-types\" un-if=\"types\">\n\t\t<type-link \n\t\t\tun-repeat=\"label: types\" \n\t\t\tcurrent-type=\"{{@currentType}}\" \n\t\t\tis-my-feedback=\"{{@isMyFeedback}}\"></type-link>\n\t</div>\n\t<div class=\"un-all-feedback-link\" un-if=\"!types\" un-on=\"click: onAllFeedbackClick\" un-class=\"un-current: !isMyFeedback\">{{i18n['All feedback']}}</div>\n\t\n</div>\n";

/***/ },
/* 16 */
/***/ function(module, exports, __webpack_require__) {

	var __vue_script__, __vue_template__
	__webpack_require__(17)
	__vue_script__ = __webpack_require__(19)
	__vue_template__ = __webpack_require__(69)
	module.exports = __vue_script__ || {}
	if (module.exports.__esModule) module.exports = module.exports.default
	if (__vue_template__) { (typeof module.exports === "function" ? module.exports.options : module.exports).template = __vue_template__ }
	if (false) {(function () {  module.hot.accept()
	  var hotAPI = require("vue-hot-reload-api")
	  hotAPI.install(require("vue"), true)
	  if (!hotAPI.compatible) return
	  var id = "/Users/karevn/Dropbox/www/wp/wp-content/plugins/usernoise/js/discussion/components/discussion-list.vue"
	  if (!module.hot.data) {
	    hotAPI.createRecord(id, module.exports)
	  } else {
	    hotAPI.update(id, module.exports, __vue_template__)
	  }
	})()}

/***/ },
/* 17 */
/***/ function(module, exports, __webpack_require__) {

	// style-loader: Adds some css to the DOM by adding a <style> tag

	// load the styles
	var content = __webpack_require__(18);
	if(typeof content === 'string') content = [[module.id, content, '']];
	// add the styles to the DOM
	var update = __webpack_require__(6)(content, {});
	if(content.locals) module.exports = content.locals;
	// Hot Module Replacement
	if(false) {
		// When the styles change, update the <style> tags
		if(!content.locals) {
			module.hot.accept("!!./../node_modules/css-loader/index.js!./../node_modules/vue-loader/lib/style-rewriter.js?id=_v-bed14cc2&file=discussion-list.vue!./../node_modules/autoprefixer-loader/index.js!./../../../node_modules/sass-loader/index.js?indentedSyntax!./../node_modules/vue-loader/lib/selector.js?type=style&index=0!./discussion-list.vue", function() {
				var newContent = require("!!./../node_modules/css-loader/index.js!./../node_modules/vue-loader/lib/style-rewriter.js?id=_v-bed14cc2&file=discussion-list.vue!./../node_modules/autoprefixer-loader/index.js!./../../../node_modules/sass-loader/index.js?indentedSyntax!./../node_modules/vue-loader/lib/selector.js?type=style&index=0!./discussion-list.vue");
				if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
				update(newContent);
			});
		}
		// When the module is disposed, remove the <style> tags
		module.hot.dispose(function() { update(); });
	}

/***/ },
/* 18 */
/***/ function(module, exports, __webpack_require__) {

	exports = module.exports = __webpack_require__(5)();
	// imports


	// module
	exports.push([module.id, ".un-discussions .un-discusssion-list {\n  position: relative;\n  -webkit-transition: all 0.3s;\n  transition: all 0.3s; }\n\n.un-discussions .un-loading {\n  font-size: 40px;\n  line-height: 1;\n  text-align: center;\n  padding: 18px 0;\n  position: absolute;\n  left: 0;\n  right: 0;\n  top: 0;\n  bottom: 0;\n  background: rgba(255, 255, 255, 0.5);\n  -webkit-transition: all 0.3s;\n  transition: all 0.3s; }\n  .un-discussions .un-loading i {\n    position: absolute;\n    left: 50%;\n    top: 50%;\n    -webkit-transform: translate(-50%, -50%);\n            transform: translate(-50%, -50%); }\n\n.un-discussions .un-no-feedback {\n  color: #999;\n  font-size: 18px;\n  text-align: center;\n  padding: 30px 0;\n  border-bottom: 1px solid #eee; }\n", ""]);

	// exports


/***/ },
/* 19 */
/***/ function(module, exports, __webpack_require__) {

	var $;

	$ = __webpack_require__(1);

	module.exports = {
	  components: {
	    discussion: __webpack_require__(20),
	    pagination: __webpack_require__(61),
	    loading: __webpack_require__(57)
	  },
	  props: ['current-type', 'is-my-feedback'],
	  data: function() {
	    return {
	      i18n: usernoise.i18n,
	      feedback: [],
	      page: 1,
	      pages: 1,
	      orderby: 'likes',
	      loading: true
	    };
	  },
	  watch: {
	    currentType: function() {
	      this.page = 1;
	      return this.reload();
	    },
	    isMyFeedback: function() {
	      this.page = 1;
	      return this.reload();
	    },
	    page: function() {
	      return this.reload();
	    }
	  },
	  ready: function() {
	    return this.reload();
	  },
	  methods: {
	    reload: function() {
	      this.loading = true;
	      return $.get(usernoise.config.urls.feedback.get, {
	        type: this.currentType,
	        isMyFeedback: this.isMyFeedback,
	        page: this.page,
	        orderby: this.orderby
	      }).then((function(_this) {
	        return function(response) {
	          _this.loading = false;
	          _this.feedback = response.feedback;
	          return _this.pages = response.pages;
	        };
	      })(this));
	    }
	  }
	};


/***/ },
/* 20 */
/***/ function(module, exports, __webpack_require__) {

	var __vue_script__, __vue_template__
	__webpack_require__(21)
	__vue_script__ = __webpack_require__(23)
	__vue_template__ = __webpack_require__(60)
	module.exports = __vue_script__ || {}
	if (module.exports.__esModule) module.exports = module.exports.default
	if (__vue_template__) { (typeof module.exports === "function" ? module.exports.options : module.exports).template = __vue_template__ }
	if (false) {(function () {  module.hot.accept()
	  var hotAPI = require("vue-hot-reload-api")
	  hotAPI.install(require("vue"), true)
	  if (!hotAPI.compatible) return
	  var id = "/Users/karevn/Dropbox/www/wp/wp-content/plugins/usernoise/js/discussion/components/discussion-excerpt.vue"
	  if (!module.hot.data) {
	    hotAPI.createRecord(id, module.exports)
	  } else {
	    hotAPI.update(id, module.exports, __vue_template__)
	  }
	})()}

/***/ },
/* 21 */
/***/ function(module, exports, __webpack_require__) {

	// style-loader: Adds some css to the DOM by adding a <style> tag

	// load the styles
	var content = __webpack_require__(22);
	if(typeof content === 'string') content = [[module.id, content, '']];
	// add the styles to the DOM
	var update = __webpack_require__(6)(content, {});
	if(content.locals) module.exports = content.locals;
	// Hot Module Replacement
	if(false) {
		// When the styles change, update the <style> tags
		if(!content.locals) {
			module.hot.accept("!!./../node_modules/css-loader/index.js!./../node_modules/vue-loader/lib/style-rewriter.js?id=_v-131fd590&file=discussion-excerpt.vue!./../node_modules/autoprefixer-loader/index.js!./../../../node_modules/sass-loader/index.js?indentedSyntax!./../node_modules/vue-loader/lib/selector.js?type=style&index=0!./discussion-excerpt.vue", function() {
				var newContent = require("!!./../node_modules/css-loader/index.js!./../node_modules/vue-loader/lib/style-rewriter.js?id=_v-131fd590&file=discussion-excerpt.vue!./../node_modules/autoprefixer-loader/index.js!./../../../node_modules/sass-loader/index.js?indentedSyntax!./../node_modules/vue-loader/lib/selector.js?type=style&index=0!./discussion-excerpt.vue");
				if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
				update(newContent);
			});
		}
		// When the module is disposed, remove the <style> tags
		module.hot.dispose(function() { update(); });
	}

/***/ },
/* 22 */
/***/ function(module, exports, __webpack_require__) {

	exports = module.exports = __webpack_require__(5)();
	// imports


	// module
	exports.push([module.id, "div.un-discussion .un-discussion {\n  border-bottom: 1px solid #eee;\n  padding: 18px 12px 9px 0; }\n\ndiv.un-discussion button {\n  display: inline-block;\n  background: transparent;\n  color: #0096DE;\n  line-height: 13px;\n  font-size: 13px;\n  padding: 4px 15px;\n  border: 1px solid #0096DE;\n  border-radius: 12px;\n  box-shadow: none;\n  outline: none;\n  text-transform: none !important;\n  font-weight: inherit !important; }\n\ndiv.un-discussion h3 {\n  clear: none;\n  font-size: 24px;\n  line-height: 30px;\n  margin: 0 0 0.25em;\n  padding: 0;\n  text-decoration: none;\n  border: none;\n  text-transform: none; }\n  div.un-discussion h3 a {\n    text-decoration: none;\n    border: none;\n    -webkit-transition: all 0.3s;\n    transition: all 0.3s; }\n    div.un-discussion h3 a:hover {\n      text-decoration: none;\n      border: none;\n      color: #0096DE; }\n\ndiv.un-discussion .un-discussion-likes {\n  float: left;\n  width: 60px;\n  height: 60px;\n  position: relative;\n  cursor: pointer; }\n  div.un-discussion .un-discussion-likes.un-liked {\n    cursor: default; }\n  div.un-discussion .un-discussion-likes i {\n    position: absolute;\n    left: 0;\n    top: 0;\n    font-size: 60px;\n    line-height: 1;\n    display: block;\n    width: 62px;\n    -webkit-transition: all 0.3s;\n    transition: all 0.3s; }\n    div.un-discussion .un-discussion-likes i:before {\n      margin: 0 0px 0 0; }\n    div.un-discussion .un-discussion-likes i.un-icon-heart {\n      opacity: 0; }\n  div.un-discussion .un-discussion-likes:hover i.un-icon-heart, div.un-discussion .un-discussion-likes.un-liked .un-icon-heart {\n    opacity: 1; }\n  div.un-discussion .un-discussion-likes span {\n    position: absolute;\n    left: 50%;\n    top: 50%;\n    -webkit-transform: translate(-50%, -50%);\n            transform: translate(-50%, -50%);\n    font-size: 12px;\n    font-weight: 200;\n    line-height: 1;\n    display: block; }\n  div.un-discussion .un-discussion-likes.un-liked span, div.un-discussion .un-discussion-likes:hover span {\n    color: white; }\n\ndiv.un-discussion .un-discussion-body {\n  padding-left: 78px; }\n\ndiv.un-discussion .un-discussion-meta {\n  line-height: 24px;\n  color: #AAA;\n  font-weight: 200;\n  font-size: 12px;\n  margin: 0 0 12px 0;\n  padding: 6px 0 0 0; }\n  div.un-discussion .un-discussion-meta > * {\n    font-size: 12px;\n    margin-right: 1em; }\n  div.un-discussion .un-discussion-meta .un-author-name {\n    color: #0096DE;\n    margin-right: 0.5em; }\n  div.un-discussion .un-discussion-meta a, div.un-discussion .un-discussion-meta span.un-comments-action {\n    color: #aaa;\n    text-decoration: none;\n    cursor: pointer; }\n    div.un-discussion .un-discussion-meta a:hover, div.un-discussion .un-discussion-meta span.un-comments-action:hover {\n      color: #0096DE;\n      text-decoration: none; }\n  div.un-discussion .un-discussion-meta .un-avatar-wrapper {\n    display: block;\n    -webkit-clip-path: circle(12px at center);\n            clip-path: circle(12px at center);\n    float: left;\n    margin-right: 0.75em; }\n    div.un-discussion .un-discussion-meta .un-avatar-wrapper img {\n      display: block;\n      width: 24px;\n      height: 24px; }\n  div.un-discussion .un-discussion-meta .un-status {\n    background: #0096DE;\n    color: white;\n    display: inline-block;\n    padding: 4px 12px;\n    border-radius: 3px;\n    font-size: 11px;\n    line-height: 11px; }\n", ""]);

	// exports


/***/ },
/* 23 */
/***/ function(module, exports, __webpack_require__) {

	var $,
	  indexOf = [].indexOf || function(item) { for (var i = 0, l = this.length; i < l; i++) { if (i in this && this[i] === item) return i; } return -1; };

	$ = __webpack_require__(1);

	module.exports = {
	  props: ['discussion', 'popup'],
	  components: {
	    text: __webpack_require__(24)
	  },
	  data: function() {
	    return {
	      i18n: usernoise.i18n,
	      liked: false,
	      enableComments: usernoise.config.comments.enabled
	    };
	  },
	  ready: function() {
	    var ref;
	    return this.liked = (ref = this.discussion.id, indexOf.call(usernoise.config.likes, ref) >= 0);
	  },
	  methods: {
	    onLikeClick: function(e) {
	      e.preventDefault();
	      if (this.liked) {
	        return;
	      }
	      this.discussion.likes = this.discussion.likes + 1;
	      this.liked = true;
	      return $.post(usernoise.config.urls.feedback.like, {
	        id: this.discussion.id
	      });
	    },
	    onOpenClick: function(e) {
	      e.preventDefault();
	      return __webpack_require__(29)(this.discussion.id);
	    }
	  }
	};


/***/ },
/* 24 */
/***/ function(module, exports, __webpack_require__) {

	var __vue_script__, __vue_template__
	__webpack_require__(25)
	__vue_script__ = __webpack_require__(27)
	__vue_template__ = __webpack_require__(28)
	module.exports = __vue_script__ || {}
	if (module.exports.__esModule) module.exports = module.exports.default
	if (__vue_template__) { (typeof module.exports === "function" ? module.exports.options : module.exports).template = __vue_template__ }
	if (false) {(function () {  module.hot.accept()
	  var hotAPI = require("vue-hot-reload-api")
	  hotAPI.install(require("vue"), true)
	  if (!hotAPI.compatible) return
	  var id = "/Users/karevn/Dropbox/www/wp/wp-content/plugins/usernoise/js/discussion/components/text.vue"
	  if (!module.hot.data) {
	    hotAPI.createRecord(id, module.exports)
	  } else {
	    hotAPI.update(id, module.exports, __vue_template__)
	  }
	})()}

/***/ },
/* 25 */
/***/ function(module, exports, __webpack_require__) {

	// style-loader: Adds some css to the DOM by adding a <style> tag

	// load the styles
	var content = __webpack_require__(26);
	if(typeof content === 'string') content = [[module.id, content, '']];
	// add the styles to the DOM
	var update = __webpack_require__(6)(content, {});
	if(content.locals) module.exports = content.locals;
	// Hot Module Replacement
	if(false) {
		// When the styles change, update the <style> tags
		if(!content.locals) {
			module.hot.accept("!!./../node_modules/css-loader/index.js!./../node_modules/vue-loader/lib/style-rewriter.js?id=_v-b462db3e&file=text.vue!./../node_modules/autoprefixer-loader/index.js!./../../../node_modules/sass-loader/index.js?indentedSyntax!./../node_modules/vue-loader/lib/selector.js?type=style&index=0!./text.vue", function() {
				var newContent = require("!!./../node_modules/css-loader/index.js!./../node_modules/vue-loader/lib/style-rewriter.js?id=_v-b462db3e&file=text.vue!./../node_modules/autoprefixer-loader/index.js!./../../../node_modules/sass-loader/index.js?indentedSyntax!./../node_modules/vue-loader/lib/selector.js?type=style&index=0!./text.vue");
				if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
				update(newContent);
			});
		}
		// When the module is disposed, remove the <style> tags
		module.hot.dispose(function() { update(); });
	}

/***/ },
/* 26 */
/***/ function(module, exports, __webpack_require__) {

	exports = module.exports = __webpack_require__(5)();
	// imports


	// module
	exports.push([module.id, ".un-text {\n  font-size: 13px;\n  line-height: 1.5; }\n  .un-text p {\n    margin: 0 0 1em 0; }\n", ""]);

	// exports


/***/ },
/* 27 */
/***/ function(module, exports) {

	module.exports = {
	  props: ['text']
	};


/***/ },
/* 28 */
/***/ function(module, exports) {

	module.exports = "\n<div class=\"un-text\" un-html=\"text\"></div>\n";

/***/ },
/* 29 */
/***/ function(module, exports, __webpack_require__) {

	var Vue;

	Vue = null;

	usernoise.miniRequire.define('discussion-popup.coffee', ['vendor/vue'], function(vue) {
	  return Vue = vue;
	});

	module.exports = function(id) {
	  var $, el, popup;
	  $ = __webpack_require__(1);
	  Vue.config.prefix = 'un-';
	  Vue.config.debug = true;
	  el = $('<div class="un-discussion-overlay" />').appendTo($('body'));
	  popup = __webpack_require__(30);
	  return new Vue($.extend({}, popup, {
	    data: function() {
	      return $.extend(popup.data(), {
	        id: id,
	        popup: true
	      });
	    }
	  })).$mount(el[0]);
	};


/***/ },
/* 30 */
/***/ function(module, exports, __webpack_require__) {

	var __vue_script__, __vue_template__
	__webpack_require__(31)
	__vue_script__ = __webpack_require__(33)
	__vue_template__ = __webpack_require__(59)
	module.exports = __vue_script__ || {}
	if (module.exports.__esModule) module.exports = module.exports.default
	if (__vue_template__) { (typeof module.exports === "function" ? module.exports.options : module.exports).template = __vue_template__ }
	if (false) {(function () {  module.hot.accept()
	  var hotAPI = require("vue-hot-reload-api")
	  hotAPI.install(require("vue"), true)
	  if (!hotAPI.compatible) return
	  var id = "/Users/karevn/Dropbox/www/wp/wp-content/plugins/usernoise/js/discussion/components/discussion-popup.vue"
	  if (!module.hot.data) {
	    hotAPI.createRecord(id, module.exports)
	  } else {
	    hotAPI.update(id, module.exports, __vue_template__)
	  }
	})()}

/***/ },
/* 31 */
/***/ function(module, exports, __webpack_require__) {

	// style-loader: Adds some css to the DOM by adding a <style> tag

	// load the styles
	var content = __webpack_require__(32);
	if(typeof content === 'string') content = [[module.id, content, '']];
	// add the styles to the DOM
	var update = __webpack_require__(6)(content, {});
	if(content.locals) module.exports = content.locals;
	// Hot Module Replacement
	if(false) {
		// When the styles change, update the <style> tags
		if(!content.locals) {
			module.hot.accept("!!./../node_modules/css-loader/index.js!./../node_modules/vue-loader/lib/style-rewriter.js?id=_v-cd9fb60a&file=discussion-popup.vue!./../node_modules/autoprefixer-loader/index.js!./../../../node_modules/sass-loader/index.js?indentedSyntax!./../node_modules/vue-loader/lib/selector.js?type=style&index=0!./discussion-popup.vue", function() {
				var newContent = require("!!./../node_modules/css-loader/index.js!./../node_modules/vue-loader/lib/style-rewriter.js?id=_v-cd9fb60a&file=discussion-popup.vue!./../node_modules/autoprefixer-loader/index.js!./../../../node_modules/sass-loader/index.js?indentedSyntax!./../node_modules/vue-loader/lib/selector.js?type=style&index=0!./discussion-popup.vue");
				if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
				update(newContent);
			});
		}
		// When the module is disposed, remove the <style> tags
		module.hot.dispose(function() { update(); });
	}

/***/ },
/* 32 */
/***/ function(module, exports, __webpack_require__) {

	exports = module.exports = __webpack_require__(5)();
	// imports


	// module
	exports.push([module.id, "div.un-discussion-wrapper {\n  position: fixed;\n  z-index: 10000; }\n  div.un-discussion-wrapper .un-fade-transition {\n    -webkit-transition: opacity 0.3s;\n    transition: opacity 0.3s;\n    opacity: 1; }\n  div.un-discussion-wrapper .un-fade-enter, div.un-discussion-wrapper .un-fade-leave {\n    opacity: 0; }\n  div.un-discussion-wrapper .un-slide-right-transition, div.un-discussion-wrapper .un-slide-left-transition {\n    -webkit-transform: translate(0, 0);\n            transform: translate(0, 0);\n    -webkit-transition: -webkit-transform 0.25s;\n    transition: -webkit-transform 0.25s;\n    transition: transform 0.25s;\n    transition: transform 0.25s, -webkit-transform 0.25s; }\n  div.un-discussion-wrapper .un-slide-right-enter, div.un-discussion-wrapper .un-slide-left-leave {\n    -webkit-transform: translate(100%, 0);\n            transform: translate(100%, 0); }\n  div.un-discussion-wrapper .un-slide-right-leave, div.un-discussion-wrapper .un-slide-left-enter {\n    -webkit-transform: translate(-100%, 0);\n            transform: translate(-100%, 0); }\n  div.un-discussion-wrapper .un-discussion-overlay {\n    position: fixed;\n    left: 0;\n    right: 0;\n    top: 0;\n    bottom: 0;\n    background: rgba(0, 0, 0, 0.7);\n    overflow: scroll; }\n    div.un-discussion-wrapper .un-discussion-overlay > .un-loading {\n      position: absolute;\n      top: 50%;\n      left: 50%;\n      -webkit-transform: translate(-50%, -50%);\n              transform: translate(-50%, -50%); }\n      div.un-discussion-wrapper .un-discussion-overlay > .un-loading i {\n        color: white;\n        display: block;\n        font-size: 50px; }\n  div.un-discussion-wrapper .un-discussion-popup {\n    background: white;\n    width: 90%;\n    max-width: 700px;\n    margin: 0 auto 50px auto;\n    margin-top: 120px;\n    position: relative; }\n    div.un-discussion-wrapper .un-discussion-popup > .un-close {\n      cursor: pointer;\n      font-style: normal;\n      display: block;\n      position: absolute;\n      top: 42px;\n      right: 42px;\n      font-size: 12px;\n      line-height: 12px;\n      opacity: 0.7;\n      -webkit-transition: all 0.3s;\n      transition: all 0.3s;\n      -webkit-transform: rotate(0);\n              transform: rotate(0); }\n      div.un-discussion-wrapper .un-discussion-popup > .un-close:hover {\n        opacity: 1;\n        -webkit-transform: rotate(90deg);\n                transform: rotate(90deg); }\n    div.un-discussion-wrapper .un-discussion-popup .un-discussion {\n      border-bottom: 1px solid #eee;\n      padding: 36px 36px 6px 24px; }\n", ""]);

	// exports


/***/ },
/* 33 */
/***/ function(module, exports, __webpack_require__) {

	var $;

	$ = __webpack_require__(1);

	module.exports = {
	  components: {
	    excerpt: __webpack_require__(20),
	    comments: __webpack_require__(34),
	    'comment-form': __webpack_require__(42),
	    close: __webpack_require__(52),
	    loading: __webpack_require__(57)
	  },
	  data: function() {
	    return {
	      comments: [],
	      discussion: null,
	      visible: true,
	      enableComment: usernoise.config.comments.enabled
	    };
	  },
	  ready: function() {
	    $.get(usernoise.config.urls.feedback.get_id, {
	      id: this.id
	    }).then((function(_this) {
	      return function(response) {
	        _this.comments = response.comments;
	        return _this.discussion = response.feedback;
	      };
	    })(this));
	    this.overflow = $('html').css('overflow');
	    return $('html').css('overflow', 'hidden');
	  },
	  detached: function() {
	    return $('html').css('overflow', this.overflow);
	  },
	  events: {
	    'close:request': function() {
	      return this.closePopup();
	    }
	  },
	  methods: {
	    onOverlayClick: function(e) {
	      if (e.target === this.$$.overlay) {
	        return this.close();
	      }
	    },
	    onCloseClick: function(e) {
	      e.preventDefault();
	      return this.closePopup();
	    },
	    closePopup: function() {
	      this.visible = false;
	      return setTimeout((function(_this) {
	        return function() {
	          return _this.$remove();
	        };
	      })(this), 300);
	    }
	  }
	};


/***/ },
/* 34 */
/***/ function(module, exports, __webpack_require__) {

	var __vue_script__, __vue_template__
	__vue_script__ = __webpack_require__(35)
	__vue_template__ = __webpack_require__(41)
	module.exports = __vue_script__ || {}
	if (module.exports.__esModule) module.exports = module.exports.default
	if (__vue_template__) { (typeof module.exports === "function" ? module.exports.options : module.exports).template = __vue_template__ }
	if (false) {(function () {  module.hot.accept()
	  var hotAPI = require("vue-hot-reload-api")
	  hotAPI.install(require("vue"), true)
	  if (!hotAPI.compatible) return
	  var id = "/Users/karevn/Dropbox/www/wp/wp-content/plugins/usernoise/js/discussion/components/comments.vue"
	  if (!module.hot.data) {
	    hotAPI.createRecord(id, module.exports)
	  } else {
	    hotAPI.update(id, module.exports, __vue_template__)
	  }
	})()}

/***/ },
/* 35 */
/***/ function(module, exports, __webpack_require__) {

	var $;

	$ = __webpack_require__(1);

	module.exports = {
	  props: ['comments'],
	  components: {
	    comment: __webpack_require__(36)
	  },
	  data: function() {
	    return {
	      i18n: usernoise.i18n,
	      comments: []
	    };
	  }
	};


/***/ },
/* 36 */
/***/ function(module, exports, __webpack_require__) {

	var __vue_script__, __vue_template__
	__webpack_require__(37)
	__vue_script__ = __webpack_require__(39)
	__vue_template__ = __webpack_require__(40)
	module.exports = __vue_script__ || {}
	if (module.exports.__esModule) module.exports = module.exports.default
	if (__vue_template__) { (typeof module.exports === "function" ? module.exports.options : module.exports).template = __vue_template__ }
	if (false) {(function () {  module.hot.accept()
	  var hotAPI = require("vue-hot-reload-api")
	  hotAPI.install(require("vue"), true)
	  if (!hotAPI.compatible) return
	  var id = "/Users/karevn/Dropbox/www/wp/wp-content/plugins/usernoise/js/discussion/components/comment.vue"
	  if (!module.hot.data) {
	    hotAPI.createRecord(id, module.exports)
	  } else {
	    hotAPI.update(id, module.exports, __vue_template__)
	  }
	})()}

/***/ },
/* 37 */
/***/ function(module, exports, __webpack_require__) {

	// style-loader: Adds some css to the DOM by adding a <style> tag

	// load the styles
	var content = __webpack_require__(38);
	if(typeof content === 'string') content = [[module.id, content, '']];
	// add the styles to the DOM
	var update = __webpack_require__(6)(content, {});
	if(content.locals) module.exports = content.locals;
	// Hot Module Replacement
	if(false) {
		// When the styles change, update the <style> tags
		if(!content.locals) {
			module.hot.accept("!!./../node_modules/css-loader/index.js!./../node_modules/vue-loader/lib/style-rewriter.js?id=_v-39870a4a&file=comment.vue!./../node_modules/autoprefixer-loader/index.js!./../../../node_modules/sass-loader/index.js?indentedSyntax!./../node_modules/vue-loader/lib/selector.js?type=style&index=0!./comment.vue", function() {
				var newContent = require("!!./../node_modules/css-loader/index.js!./../node_modules/vue-loader/lib/style-rewriter.js?id=_v-39870a4a&file=comment.vue!./../node_modules/autoprefixer-loader/index.js!./../../../node_modules/sass-loader/index.js?indentedSyntax!./../node_modules/vue-loader/lib/selector.js?type=style&index=0!./comment.vue");
				if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
				update(newContent);
			});
		}
		// When the module is disposed, remove the <style> tags
		module.hot.dispose(function() { update(); });
	}

/***/ },
/* 38 */
/***/ function(module, exports, __webpack_require__) {

	exports = module.exports = __webpack_require__(5)();
	// imports


	// module
	exports.push([module.id, ".un-discussion-popup .un-comment {\n  border-bottom: 1px solid #eee;\n  padding: 24px 36px 24px 102px; }\n\n.un-discussion-popup .un-comment-meta {\n  line-height: 24px;\n  color: #AAA;\n  font-weight: 200;\n  font-size: 12px;\n  margin: 0 0 12px 0; }\n  .un-discussion-popup .un-comment-meta > * {\n    font-size: 12px; }\n  .un-discussion-popup .un-comment-meta .un-author-name {\n    color: #0096DE;\n    margin-right: 0.5em; }\n  .un-discussion-popup .un-comment-meta a, .un-discussion-popup .un-comment-meta span.un-comments-action {\n    color: #aaa;\n    text-decoration: none;\n    cursor: pointer; }\n    .un-discussion-popup .un-comment-meta a:hover, .un-discussion-popup .un-comment-meta span.un-comments-action:hover {\n      color: #0096DE;\n      text-decoration: none; }\n  .un-discussion-popup .un-comment-meta .un-avatar-wrapper {\n    display: block;\n    -webkit-clip-path: circle(12px at center);\n            clip-path: circle(12px at center);\n    float: left;\n    margin-right: 0.75em; }\n    .un-discussion-popup .un-comment-meta .un-avatar-wrapper img {\n      display: block;\n      width: 24px;\n      height: 24px; }\n", ""]);

	// exports


/***/ },
/* 39 */
/***/ function(module, exports, __webpack_require__) {

	module.exports = {
	  components: {
	    text: __webpack_require__(24)
	  }
	};


/***/ },
/* 40 */
/***/ function(module, exports) {

	module.exports = "\n<div class=\"un-comment\" un-transition=\"un-fade\">\n\t<div class=\"un-comment-meta\">\n\t\t<span class=\"un-avatar-wrapper\" un-if=\"comment.avatar\">\n\t\t\t<img un-attr=\"src: comment.avatar\">\n\t\t</span>\n\t\t<span class=\"un-author-name\" un-if=\"comment.author\">{{comment.author}}</span>\n\t\t<span class=\"un-time-ago\">{{comment.time_ago}}</span>\n\t</div>\n\t<text text=\"{{comment.text}}\"></text>\n</div>\n";

/***/ },
/* 41 */
/***/ function(module, exports) {

	module.exports = "\n<div class=\"un-comments\">\n\t<div class=\"un-comments-list\" un-if=\"comments.length > 0\">\n\t\t<comment un-repeat=\"comment: comments\"></comment>\n\t</div>\n\t\n</div>\n";

/***/ },
/* 42 */
/***/ function(module, exports, __webpack_require__) {

	var __vue_script__, __vue_template__
	__webpack_require__(43)
	__vue_script__ = __webpack_require__(45)
	__vue_template__ = __webpack_require__(51)
	module.exports = __vue_script__ || {}
	if (module.exports.__esModule) module.exports = module.exports.default
	if (__vue_template__) { (typeof module.exports === "function" ? module.exports.options : module.exports).template = __vue_template__ }
	if (false) {(function () {  module.hot.accept()
	  var hotAPI = require("vue-hot-reload-api")
	  hotAPI.install(require("vue"), true)
	  if (!hotAPI.compatible) return
	  var id = "/Users/karevn/Dropbox/www/wp/wp-content/plugins/usernoise/js/discussion/components/comment-form.vue"
	  if (!module.hot.data) {
	    hotAPI.createRecord(id, module.exports)
	  } else {
	    hotAPI.update(id, module.exports, __vue_template__)
	  }
	})()}

/***/ },
/* 43 */
/***/ function(module, exports, __webpack_require__) {

	// style-loader: Adds some css to the DOM by adding a <style> tag

	// load the styles
	var content = __webpack_require__(44);
	if(typeof content === 'string') content = [[module.id, content, '']];
	// add the styles to the DOM
	var update = __webpack_require__(6)(content, {});
	if(content.locals) module.exports = content.locals;
	// Hot Module Replacement
	if(false) {
		// When the styles change, update the <style> tags
		if(!content.locals) {
			module.hot.accept("!!./../node_modules/css-loader/index.js!./../node_modules/vue-loader/lib/style-rewriter.js?id=_v-33be2a26&file=comment-form.vue!./../node_modules/autoprefixer-loader/index.js!./../../../node_modules/sass-loader/index.js?indentedSyntax!./../node_modules/vue-loader/lib/selector.js?type=style&index=0!./comment-form.vue", function() {
				var newContent = require("!!./../node_modules/css-loader/index.js!./../node_modules/vue-loader/lib/style-rewriter.js?id=_v-33be2a26&file=comment-form.vue!./../node_modules/autoprefixer-loader/index.js!./../../../node_modules/sass-loader/index.js?indentedSyntax!./../node_modules/vue-loader/lib/selector.js?type=style&index=0!./comment-form.vue");
				if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
				update(newContent);
			});
		}
		// When the module is disposed, remove the <style> tags
		module.hot.dispose(function() { update(); });
	}

/***/ },
/* 44 */
/***/ function(module, exports, __webpack_require__) {

	exports = module.exports = __webpack_require__(5)();
	// imports


	// module
	exports.push([module.id, ".un-comment-form {\n  margin-left: 102px;\n  padding-right: 36px;\n  padding-top: 24px;\n  padding-bottom: 36px; }\n  .un-comment-form .un-submit-wrapper {\n    text-align: right; }\n    .un-comment-form .un-submit-wrapper .un-loading {\n      display: inline-block; }\n  .un-comment-form button, .un-comment-form a.button {\n    background: #0096DE;\n    color: white;\n    border: none;\n    box-shadow: none;\n    text-shadow: none;\n    outline: none;\n    font-size: 13px;\n    line-height: 1;\n    padding: 9px 30px;\n    border-radius: 18px;\n    white-space: no-wrap;\n    cursor: pointer;\n    text-transform: none;\n    font-weight: 300; }\n    .un-comment-form button:hover, .un-comment-form button:focus, .un-comment-form a.button:hover, .un-comment-form a.button:focus {\n      background: #009DE8;\n      color: white; }\n    .un-comment-form button i, .un-comment-form a.button i {\n      margin-left: 0.5em;\n      margin-right: -0.5em;\n      font-size: 11px; }\n    .un-comment-form button.un-next, .un-comment-form a.button.un-next {\n      float: right; }\n  .un-comment-form .un-field {\n    padding: 0;\n    position: relative;\n    margin-bottom: 12px; }\n  .un-comment-form .un-user-info .un-field {\n    width: 50%;\n    float: left;\n    box-sizing: border-box; }\n    .un-comment-form .un-user-info .un-field:first-child {\n      padding-right: 6px; }\n    .un-comment-form .un-user-info .un-field:last-child {\n      padding-left: 6px; }\n  .un-comment-form .un-user-info:after {\n    clear: both;\n    width: 0;\n    left: 0;\n    display: block;\n    content: ' '; }\n  .un-comment-form label {\n    display: block;\n    font-size: 11px;\n    line-height: 11px;\n    color: #777785;\n    font-weight: 400;\n    text-transform: uppercase;\n    margin: 0 0 6px 0; }\n  .un-comment-form input[type=text], .un-comment-form input[type=email], .un-comment-form select {\n    display: inline-block;\n    width: 100%; }\n  .un-comment-form input[type=text], .un-comment-form input[type=email], .un-comment-form textarea {\n    font-size: 13px;\n    color: #333;\n    padding: 12px;\n    margin: 0;\n    font-weight: 300;\n    font-family: inherit;\n    border: 1px solid #ddd; }\n    .un-comment-form input[type=text]:focused, .un-comment-form input[type=email]:focused, .un-comment-form textarea:focused {\n      border: 1px solid #999 !important; }\n  .un-comment-form input[type=text], .un-comment-form input[type=email] {\n    padding: 9px; }\n  .un-comment-form input[type=text], .un-comment-form input[type=email], .un-comment-form select, .un-comment-form textarea {\n    background: transparent; }\n  .un-comment-form input[type=text]::-webkit-input-placeholder, .un-comment-form input[type=email]::-webkit-input-placeholder, .un-comment-form .un-dropdown-label.un-default, .un-comment-form textarea::-webkit-input-placeholder {\n    font-family: inherit;\n    color: #bbbbbd;\n    font-weight: 200; }\n  .un-comment-form input[type=text]::-moz-placeholder, .un-comment-form input[type=email]::-moz-placeholder, .un-comment-form .un-dropdown-label.un-default, .un-comment-form textarea::-moz-placeholder {\n    font-family: inherit;\n    color: #bbbbbd;\n    font-weight: 200; }\n  .un-comment-form input[type=text]:-ms-input-placeholder, .un-comment-form input[type=email]:-ms-input-placeholder, .un-comment-form .un-dropdown-label.un-default, .un-comment-form textarea:-ms-input-placeholder {\n    font-family: inherit;\n    color: #bbbbbd;\n    font-weight: 200; }\n  .un-comment-form input[type=text]::placeholder, .un-comment-form input[type=email]::placeholder, .un-comment-form .un-dropdown-label.un-default, .un-comment-form textarea::placeholder {\n    font-family: inherit;\n    color: #bbbbbd;\n    font-weight: 200; }\n  .un-comment-form textarea {\n    height: 170px;\n    resize: none;\n    width: 100%; }\n", ""]);

	// exports


/***/ },
/* 45 */
/***/ function(module, exports, __webpack_require__) {

	var $;

	$ = __webpack_require__(1);

	module.exports = {
	  components: {
	    'form-field': __webpack_require__(46)
	  },
	  props: ['comments', 'post-id'],
	  data: function() {
	    return {
	      i18n: usernoise.i18n,
	      loggedIn: usernoise.config.loggedIn,
	      submitting: false,
	      comment: {
	        email: null,
	        name: null,
	        text: null
	      },
	      errors: {
	        email: null,
	        name: null,
	        text: null
	      }
	    };
	  },
	  methods: {
	    submitClick: function(e) {
	      var hasErrors;
	      e.preventDefault();
	      if (!(hasErrors = this.validate())) {
	        this.submitting = true;
	        this.comment.postId = this.postId;
	        return $.post(usernoise.config.urls.comment.post, this.comment).then((function(_this) {
	          return function(response) {
	            _this.submitting = false;
	            _this.comments.push(response);
	            return _this.comment.text = '';
	          };
	        })(this));
	      }
	    },
	    validate: function() {
	      var emailRE, hasErrors;
	      this.errors = {};
	      hasErrors = false;
	      if (!this.loggedIn && (!this.comment.name || !this.comment.name.trim())) {
	        this.errors.name = this.i18n['This field is required'];
	        hasErrors = true;
	      }
	      emailRE = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	      if (!this.loggedIn && (!this.comment.email || !this.comment.email.trim())) {
	        this.errors.email = this.i18n['This field is required'];
	        hasErrors = true;
	      }
	      if (this.comment.email && this.comment.email.trim() && !emailRE.test(this.comment.email)) {
	        this.errors.email = this.i18n['Please enter a valid email address'];
	        hasErrors = true;
	      }
	      if (!this.comment.text || !this.comment.text.trim()) {
	        this.errors.text = this.i18n['This field is required'];
	        hasErrors = true;
	      }
	      return hasErrors;
	    }
	  }
	};


/***/ },
/* 46 */
/***/ function(module, exports, __webpack_require__) {

	var __vue_script__, __vue_template__
	__webpack_require__(47)
	__vue_script__ = __webpack_require__(49)
	__vue_template__ = __webpack_require__(50)
	module.exports = __vue_script__ || {}
	if (module.exports.__esModule) module.exports = module.exports.default
	if (__vue_template__) { (typeof module.exports === "function" ? module.exports.options : module.exports).template = __vue_template__ }
	if (false) {(function () {  module.hot.accept()
	  var hotAPI = require("vue-hot-reload-api")
	  hotAPI.install(require("vue"), true)
	  if (!hotAPI.compatible) return
	  var id = "/Users/karevn/Dropbox/www/wp/wp-content/plugins/usernoise/js/discussion/components/field.vue"
	  if (!module.hot.data) {
	    hotAPI.createRecord(id, module.exports)
	  } else {
	    hotAPI.update(id, module.exports, __vue_template__)
	  }
	})()}

/***/ },
/* 47 */
/***/ function(module, exports, __webpack_require__) {

	// style-loader: Adds some css to the DOM by adding a <style> tag

	// load the styles
	var content = __webpack_require__(48);
	if(typeof content === 'string') content = [[module.id, content, '']];
	// add the styles to the DOM
	var update = __webpack_require__(6)(content, {});
	if(content.locals) module.exports = content.locals;
	// Hot Module Replacement
	if(false) {
		// When the styles change, update the <style> tags
		if(!content.locals) {
			module.hot.accept("!!./../node_modules/css-loader/index.js!./../node_modules/vue-loader/lib/style-rewriter.js?id=_v-c0351e14&file=field.vue!./../node_modules/autoprefixer-loader/index.js!./../../../node_modules/sass-loader/index.js?indentedSyntax!./../node_modules/vue-loader/lib/selector.js?type=style&index=0!./field.vue", function() {
				var newContent = require("!!./../node_modules/css-loader/index.js!./../node_modules/vue-loader/lib/style-rewriter.js?id=_v-c0351e14&file=field.vue!./../node_modules/autoprefixer-loader/index.js!./../../../node_modules/sass-loader/index.js?indentedSyntax!./../node_modules/vue-loader/lib/selector.js?type=style&index=0!./field.vue");
				if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
				update(newContent);
			});
		}
		// When the module is disposed, remove the <style> tags
		module.hot.dispose(function() { update(); });
	}

/***/ },
/* 48 */
/***/ function(module, exports, __webpack_require__) {

	exports = module.exports = __webpack_require__(5)();
	// imports


	// module
	exports.push([module.id, "div.un-discussion-popup div.un-field-error {\n  position: absolute;\n  display: inline-block;\n  line-height: 18px;\n  width: auto;\n  text-align: left;\n  min-width: 20%;\n  border-radius: 2px;\n  padding: 5px 15px;\n  -webkit-transform: translate(0, 7px);\n          transform: translate(0, 7px);\n  left: 10%;\n  z-index: 2;\n  background: #FF3366;\n  color: white;\n  padding: 6px 18px; }\n  div.un-discussion-popup div.un-field-error:after {\n    font-size: 12px;\n    border-bottom: 5px solid #FF3366;\n    border-left: 4px solid transparent;\n    border-right: 4px solid transparent;\n    position: absolute;\n    top: -5px;\n    right: 50%;\n    margin-right: -4px;\n    content: ' '; }\n", ""]);

	// exports


/***/ },
/* 49 */
/***/ function(module, exports) {

	module.exports = {
	  props: ['label', 'name', 'errors']
	};


/***/ },
/* 50 */
/***/ function(module, exports) {

	module.exports = "\n<div class=\"un-field\">\n\t<label un-if=\"!!label\">{{label}}</label>\n\t<content></content>\n\t<div class=\"un-field-error\" un-if=\"!!errors[name]\" un-transition=\"un-fade\">{{errors[name]}}</div>\n</div>\n";

/***/ },
/* 51 */
/***/ function(module, exports) {

	module.exports = "\n<form class=\"un-comment-form\" un-on=\"submit: submitClick\">\n\t<div class=\"un-user-info\">\n\t\t<form-field label=\"{{i18n['Your email']}}\" name=\"email\" errors=\"{{errors}}\">\n\t\t\t<input type=\"email\" un-model=\"comment.email\" placeholder=\"example@domain.com\" tabindex=\"0\">\n\t\t</form-field>\n\t\t<form-field label=\"{{i18n['Your name']}}\" name=\"name\" errors=\"{{errors}}\">\n\t\t\t<input type=\"text\" un-model=\"comment.name\" placeholder=\"John Doe\" tabindex=\"1\">\n\t\t</form-field>\n\t</div>\n\t<form-field name=\"text\" errors=\"{{errors}}\">\n\t\t<textarea un-model=\"comment.text\" placeholder=\"{{i18n['Comment text']}}\" tabindex=\"2\"></textarea>\n\t</form-field>\n\t<div class=\"un-submit-wrapper\">\n\t\t<loading un-if=\"submitting\"></loading>\n\t\t<button un-on=\"click: submitClick\" un-attr=\"disabled: submitting\">{{i18n['Submit']}}</button>\n\t</div>\n</form>\n";

/***/ },
/* 52 */
/***/ function(module, exports, __webpack_require__) {

	var __vue_script__, __vue_template__
	__webpack_require__(53)
	__vue_script__ = __webpack_require__(55)
	__vue_template__ = __webpack_require__(56)
	module.exports = __vue_script__ || {}
	if (module.exports.__esModule) module.exports = module.exports.default
	if (__vue_template__) { (typeof module.exports === "function" ? module.exports.options : module.exports).template = __vue_template__ }
	if (false) {(function () {  module.hot.accept()
	  var hotAPI = require("vue-hot-reload-api")
	  hotAPI.install(require("vue"), true)
	  if (!hotAPI.compatible) return
	  var id = "/Users/karevn/Dropbox/www/wp/wp-content/plugins/usernoise/js/discussion/components/close.vue"
	  if (!module.hot.data) {
	    hotAPI.createRecord(id, module.exports)
	  } else {
	    hotAPI.update(id, module.exports, __vue_template__)
	  }
	})()}

/***/ },
/* 53 */
/***/ function(module, exports, __webpack_require__) {

	// style-loader: Adds some css to the DOM by adding a <style> tag

	// load the styles
	var content = __webpack_require__(54);
	if(typeof content === 'string') content = [[module.id, content, '']];
	// add the styles to the DOM
	var update = __webpack_require__(6)(content, {});
	if(content.locals) module.exports = content.locals;
	// Hot Module Replacement
	if(false) {
		// When the styles change, update the <style> tags
		if(!content.locals) {
			module.hot.accept("!!./../node_modules/css-loader/index.js!./../node_modules/vue-loader/lib/style-rewriter.js?id=_v-37b9fef4&file=close.vue!./../node_modules/autoprefixer-loader/index.js!./../../../node_modules/sass-loader/index.js?indentedSyntax!./../node_modules/vue-loader/lib/selector.js?type=style&index=0!./close.vue", function() {
				var newContent = require("!!./../node_modules/css-loader/index.js!./../node_modules/vue-loader/lib/style-rewriter.js?id=_v-37b9fef4&file=close.vue!./../node_modules/autoprefixer-loader/index.js!./../../../node_modules/sass-loader/index.js?indentedSyntax!./../node_modules/vue-loader/lib/selector.js?type=style&index=0!./close.vue");
				if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
				update(newContent);
			});
		}
		// When the module is disposed, remove the <style> tags
		module.hot.dispose(function() { update(); });
	}

/***/ },
/* 54 */
/***/ function(module, exports, __webpack_require__) {

	exports = module.exports = __webpack_require__(5)();
	// imports


	// module
	exports.push([module.id, "div.un-popup div.un-feedback > div > i.un-close, div.un-popup .un-popup-overlay .un-close {\n  position: absolute;\n  top: 18px;\n  right: 0;\n  -webkit-transition: all 0.3s;\n  transition: all 0.3s;\n  cursor: pointer;\n  margin: 0px 18px 18px 18px;\n  padding: 0;\n  opacity: 0.5;\n  -webkit-transform: rotateZ(0);\n          transform: rotateZ(0); }\n  div.un-popup div.un-feedback > div > i.un-close:hover, div.un-popup .un-popup-overlay .un-close:hover {\n    -webkit-transform: rotateZ(90deg);\n            transform: rotateZ(90deg);\n    opacity: 1; }\n\ndiv.un-popup div.un-feedback > div > i.un-close {\n  z-index: 2; }\n\ndiv.un-popup .un-popup-overlay .un-close {\n  color: white;\n  z-index: 3; }\n\ndiv.un-popup .un-close {\n  z-index: 3; }\n", ""]);

	// exports


/***/ },
/* 55 */
/***/ function(module, exports, __webpack_require__) {

	var $;

	$ = __webpack_require__(1);

	module.exports = {
	  ready: function() {
	    return $('body').on('keydown.usernoise', (function(_this) {
	      return function(e) {
	        if (e.which === 27) {
	          return _this.$dispatch('close:request');
	        }
	      };
	    })(this));
	  },
	  beforeDestroy: function() {
	    return $('body').off('keydown.usernoise');
	  }
	};


/***/ },
/* 56 */
/***/ function(module, exports) {

	module.exports = "\n<i class=\"un-icon-close un-close\" href=\"#\" un-on=\"click: this.$dispatch('close:request')\"></i>\n";

/***/ },
/* 57 */
/***/ function(module, exports, __webpack_require__) {

	var __vue_script__, __vue_template__
	__vue_template__ = __webpack_require__(58)
	module.exports = __vue_script__ || {}
	if (module.exports.__esModule) module.exports = module.exports.default
	if (__vue_template__) { (typeof module.exports === "function" ? module.exports.options : module.exports).template = __vue_template__ }
	if (false) {(function () {  module.hot.accept()
	  var hotAPI = require("vue-hot-reload-api")
	  hotAPI.install(require("vue"), true)
	  if (!hotAPI.compatible) return
	  var id = "/Users/karevn/Dropbox/www/wp/wp-content/plugins/usernoise/js/discussion/components/loading.vue"
	  if (!module.hot.data) {
	    hotAPI.createRecord(id, module.exports)
	  } else {
	    hotAPI.update(id, module.exports, __vue_template__)
	  }
	})()}

/***/ },
/* 58 */
/***/ function(module, exports) {

	module.exports = "\n<div class=\"un-loading\" un-transition=\"un-fade\">\n\t<i class=\"un-icon-spin\"></i>\n</div>\n";

/***/ },
/* 59 */
/***/ function(module, exports) {

	module.exports = "\n<div class=\"un-discussion-wrapper\">\n\t<div class=\"un-discussion-overlay\"\n\t\t\tun-el=\"overlay\"\n\t\t\tun-transition=\"un-fade\"\n\t\t\tun-on=\"click: onOverlayClick\" un-if=\"visible\">\n\t\t<div class=\"un-discussion-popup\" un-if=\"!!discussion\" un-transition=\"un-fade\" transition-mode=\"out-in\">\n\t\t\t<close></close>\n\t\t\t<excerpt discussion=\"{{@discussion}}\" popup=\"{{true}}\"></excerpt>\n\t\t\t<comments comments=\"{{@comments}}\"></comments>\n\t\t\t<comment-form discussion=\"{{@discussion}}\" comments=\"{{@comments}}\" post-id=\"{{discussion.id}}\" un-if=\"enableComment\"></comment-form>\n\t\t</div>\n\t\t<loading un-if=\"!discussion\"></loading>\n\t</div>\n</div>\n";

/***/ },
/* 60 */
/***/ function(module, exports) {

	module.exports = "\n<div class=\"un-discussion\">\n\t<div class=\"un-discussion-likes\" un-class=\"un-liked: liked\" un-on=\"click: onLikeClick\">\n\t\t<i class=\"un-icon-heart-empty\" un-if=\"!liked\"></i>\n\t\t<i class=\"un-icon-heart\"></i>\n\t\t<span>{{discussion.likes}}</span>\n\t</div>\n\t<div class=\"un-discussion-body\">\n\t\t<h3 un-if=\"!popup\"><a href=\"#id={{discussion.id}}\" un-on=\"click: onOpenClick\" un-html=\"discussion.title\"></a></h3>\n\t\t<h3 un-if=\"popup\" un-html=\"discussion.title\"></h3>\n\t\t<div class=\"un-discussion-meta\">\n\t\t\t<span class=\"un-avatar-wrapper\" un-if=\"discussion.avatar\">\n\t\t\t\t<img un-attr=\"src: discussion.avatar\">\n\t\t\t</span>\n\t\t\t<span class=\"un-author-name\" un-if=\"discussion.author\">{{discussion.author}}</span>\n\t\t\t<span class=\"un-time-ago\">{{discussion.time_ago}}</span>\n\t\t\t<span class=\"un-status\">{{discussion.status}}</span>\n\t\t</div>\n\t\t<text text=\"{{discussion.text}}\"></text>\n\t\t<div class=\"un-discussion-meta\" un-if=\"!popup\">\n\t\t\t<span class=\"un-comments-action\" un-on=\"click: onOpenClick\"\n\t\t\t\t\tun-if=\"discussion.comments > 0\">\n\t\t\t\t{{i18n['Comments:']}} {{discussion.comments}}\n\t\t\t</span>\n\t\t\t<span class=\"un-comments-action\" un-on=\"click: onOpenClick\" un-if=\"enableComments\">\n\t\t\t\t{{i18n['Leave a comment']}}\n\t\t\t</span>\n\t\t</div>\n\t</div>\n</div>\n";

/***/ },
/* 61 */
/***/ function(module, exports, __webpack_require__) {

	var __vue_script__, __vue_template__
	__webpack_require__(62)
	__vue_script__ = __webpack_require__(64)
	__vue_template__ = __webpack_require__(68)
	module.exports = __vue_script__ || {}
	if (module.exports.__esModule) module.exports = module.exports.default
	if (__vue_template__) { (typeof module.exports === "function" ? module.exports.options : module.exports).template = __vue_template__ }
	if (false) {(function () {  module.hot.accept()
	  var hotAPI = require("vue-hot-reload-api")
	  hotAPI.install(require("vue"), true)
	  if (!hotAPI.compatible) return
	  var id = "/Users/karevn/Dropbox/www/wp/wp-content/plugins/usernoise/js/discussion/components/pagination.vue"
	  if (!module.hot.data) {
	    hotAPI.createRecord(id, module.exports)
	  } else {
	    hotAPI.update(id, module.exports, __vue_template__)
	  }
	})()}

/***/ },
/* 62 */
/***/ function(module, exports, __webpack_require__) {

	// style-loader: Adds some css to the DOM by adding a <style> tag

	// load the styles
	var content = __webpack_require__(63);
	if(typeof content === 'string') content = [[module.id, content, '']];
	// add the styles to the DOM
	var update = __webpack_require__(6)(content, {});
	if(content.locals) module.exports = content.locals;
	// Hot Module Replacement
	if(false) {
		// When the styles change, update the <style> tags
		if(!content.locals) {
			module.hot.accept("!!./../node_modules/css-loader/index.js!./../node_modules/vue-loader/lib/style-rewriter.js?id=_v-4b8f7d64&file=pagination.vue!./../node_modules/autoprefixer-loader/index.js!./../../../node_modules/sass-loader/index.js?indentedSyntax!./../node_modules/vue-loader/lib/selector.js?type=style&index=0!./pagination.vue", function() {
				var newContent = require("!!./../node_modules/css-loader/index.js!./../node_modules/vue-loader/lib/style-rewriter.js?id=_v-4b8f7d64&file=pagination.vue!./../node_modules/autoprefixer-loader/index.js!./../../../node_modules/sass-loader/index.js?indentedSyntax!./../node_modules/vue-loader/lib/selector.js?type=style&index=0!./pagination.vue");
				if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
				update(newContent);
			});
		}
		// When the module is disposed, remove the <style> tags
		module.hot.dispose(function() { update(); });
	}

/***/ },
/* 63 */
/***/ function(module, exports, __webpack_require__) {

	exports = module.exports = __webpack_require__(5)();
	// imports


	// module
	exports.push([module.id, ".un-discussions .un-pagination {\n  display: block;\n  text-align: right;\n  padding: 12px 0 0 0; }\n  .un-discussions .un-pagination > a {\n    display: inline-block;\n    line-height: 31px;\n    background: #eee;\n    color: #555;\n    padding: 0 12px;\n    text-decoration: none;\n    border: none;\n    margin-left: 6px;\n    -webkit-transition: all 0.3s;\n    transition: all 0.3s; }\n    .un-discussions .un-pagination > a.un-current {\n      background: #0096DE;\n      color: white; }\n    .un-discussions .un-pagination > a:focus {\n      outline: none;\n      border: none; }\n", ""]);

	// exports


/***/ },
/* 64 */
/***/ function(module, exports, __webpack_require__) {

	module.exports = {
	  props: ['pages', 'page'],
	  components: {
	    page: __webpack_require__(65)
	  },
	  data: function() {
	    return {
	      pageArray: []
	    };
	  },
	  ready: function() {
	    var i, ref, results;
	    this.pageArray = (function() {
	      results = [];
	      for (var i = 1, ref = this.pages; 1 <= ref ? i <= ref : i >= ref; 1 <= ref ? i++ : i--){ results.push(i); }
	      return results;
	    }).apply(this);
	    return this.$watch('pages', function() {
	      var j, ref1, results1;
	      return this.pageArray = (function() {
	        results1 = [];
	        for (var j = 1, ref1 = this.pages; 1 <= ref1 ? j <= ref1 : j >= ref1; 1 <= ref1 ? j++ : j--){ results1.push(j); }
	        return results1;
	      }).apply(this);
	    });
	  }
	};


/***/ },
/* 65 */
/***/ function(module, exports, __webpack_require__) {

	var __vue_script__, __vue_template__
	__vue_script__ = __webpack_require__(66)
	__vue_template__ = __webpack_require__(67)
	module.exports = __vue_script__ || {}
	if (module.exports.__esModule) module.exports = module.exports.default
	if (__vue_template__) { (typeof module.exports === "function" ? module.exports.options : module.exports).template = __vue_template__ }
	if (false) {(function () {  module.hot.accept()
	  var hotAPI = require("vue-hot-reload-api")
	  hotAPI.install(require("vue"), true)
	  if (!hotAPI.compatible) return
	  var id = "/Users/karevn/Dropbox/www/wp/wp-content/plugins/usernoise/js/discussion/components/page.vue"
	  if (!module.hot.data) {
	    hotAPI.createRecord(id, module.exports)
	  } else {
	    hotAPI.update(id, module.exports, __vue_template__)
	  }
	})()}

/***/ },
/* 66 */
/***/ function(module, exports) {

	module.exports = {
	  props: ['page'],
	  methods: {
	    onPageClick: function(e) {
	      e.preventDefault();
	      return this.page = this.$index + 1;
	    }
	  }
	};


/***/ },
/* 67 */
/***/ function(module, exports) {

	module.exports = "\n<a class=\"un-page\" href=\"#page-{{$index}}\" \n\t\tun-class=\"un-current: $value == this.page\" \n\t\tun-on=\"click: onPageClick\">\n\t\t{{$value}}\n</a>\n\n";

/***/ },
/* 68 */
/***/ function(module, exports) {

	module.exports = "\n<div class=\"un-pagination\">\n\t<page un-repeat=\"pageArray\" page=\"{{@page}}\"></page>\n</div>\n";

/***/ },
/* 69 */
/***/ function(module, exports) {

	module.exports = "\n<div class=\"un-discusssion-list\">\n\t<loading un-if=\"loading\"></loading>\n\t<discussion un-repeat=\"discussion: feedback\"></discussion>\n\t<div class=\"un-no-feedback\" un-if=\"feedback.length == 0\">\n\t\t{{i18n['No feedback matching the criteria']}}\n\t</div>\n\t<pagination pages=\"{{pages}}\" page=\"{{@page}}\" un-transition=\"un-fade\" un-if=\"pages > 1\"></pagination>\n</div>\n";

/***/ },
/* 70 */
/***/ function(module, exports) {

	module.exports = "\n<div class=\"un-discussions\">\n\t<filters\n\t\tun-if=\"tabs\"\n\t\tcurrent-type=\"{{@currentType}}\"\n\t\tis-my-feedback=\"{{@isMyFeedback}}\"></filters>\n\t<discussion-list current-type=\"{{currentType}}\" is-my-feedback=\"{{isMyFeedback}}\"></discussion-list>\n</div>\n";

/***/ }
/******/ ]);