/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/jquery/dist/jquery.js":
/*!********************************************!*\
  !*** ./node_modules/jquery/dist/jquery.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;/*!
 * jQuery JavaScript Library v3.5.1
 * https://jquery.com/
 *
 * Includes Sizzle.js
 * https://sizzlejs.com/
 *
 * Copyright JS Foundation and other contributors
 * Released under the MIT license
 * https://jquery.org/license
 *
 * Date: 2020-05-04T22:49Z
 */
( function( global, factory ) {

	"use strict";

	if (  true && typeof module.exports === "object" ) {

		// For CommonJS and CommonJS-like environments where a proper `window`
		// is present, execute the factory and get jQuery.
		// For environments that do not have a `window` with a `document`
		// (such as Node.js), expose a factory as module.exports.
		// This accentuates the need for the creation of a real `window`.
		// e.g. var jQuery = require("jquery")(window);
		// See ticket #14549 for more info.
		module.exports = global.document ?
			factory( global, true ) :
			function( w ) {
				if ( !w.document ) {
					throw new Error( "jQuery requires a window with a document" );
				}
				return factory( w );
			};
	} else {
		factory( global );
	}

// Pass this if window is not defined yet
} )( typeof window !== "undefined" ? window : this, function( window, noGlobal ) {

// Edge <= 12 - 13+, Firefox <=18 - 45+, IE 10 - 11, Safari 5.1 - 9+, iOS 6 - 9.1
// throw exceptions when non-strict code (e.g., ASP.NET 4.5) accesses strict mode
// arguments.callee.caller (trac-13335). But as of jQuery 3.0 (2016), strict mode should be common
// enough that all such attempts are guarded in a try block.
"use strict";

var arr = [];

var getProto = Object.getPrototypeOf;

var slice = arr.slice;

var flat = arr.flat ? function( array ) {
	return arr.flat.call( array );
} : function( array ) {
	return arr.concat.apply( [], array );
};


var push = arr.push;

var indexOf = arr.indexOf;

var class2type = {};

var toString = class2type.toString;

var hasOwn = class2type.hasOwnProperty;

var fnToString = hasOwn.toString;

var ObjectFunctionString = fnToString.call( Object );

var support = {};

var isFunction = function isFunction( obj ) {

      // Support: Chrome <=57, Firefox <=52
      // In some browsers, typeof returns "function" for HTML <object> elements
      // (i.e., `typeof document.createElement( "object" ) === "function"`).
      // We don't want to classify *any* DOM node as a function.
      return typeof obj === "function" && typeof obj.nodeType !== "number";
  };


var isWindow = function isWindow( obj ) {
		return obj != null && obj === obj.window;
	};


var document = window.document;



	var preservedScriptAttributes = {
		type: true,
		src: true,
		nonce: true,
		noModule: true
	};

	function DOMEval( code, node, doc ) {
		doc = doc || document;

		var i, val,
			script = doc.createElement( "script" );

		script.text = code;
		if ( node ) {
			for ( i in preservedScriptAttributes ) {

				// Support: Firefox 64+, Edge 18+
				// Some browsers don't support the "nonce" property on scripts.
				// On the other hand, just using `getAttribute` is not enough as
				// the `nonce` attribute is reset to an empty string whenever it
				// becomes browsing-context connected.
				// See https://github.com/whatwg/html/issues/2369
				// See https://html.spec.whatwg.org/#nonce-attributes
				// The `node.getAttribute` check was added for the sake of
				// `jQuery.globalEval` so that it can fake a nonce-containing node
				// via an object.
				val = node[ i ] || node.getAttribute && node.getAttribute( i );
				if ( val ) {
					script.setAttribute( i, val );
				}
			}
		}
		doc.head.appendChild( script ).parentNode.removeChild( script );
	}


function toType( obj ) {
	if ( obj == null ) {
		return obj + "";
	}

	// Support: Android <=2.3 only (functionish RegExp)
	return typeof obj === "object" || typeof obj === "function" ?
		class2type[ toString.call( obj ) ] || "object" :
		typeof obj;
}
/* global Symbol */
// Defining this global in .eslintrc.json would create a danger of using the global
// unguarded in another place, it seems safer to define global only for this module



var
	version = "3.5.1",

	// Define a local copy of jQuery
	jQuery = function( selector, context ) {

		// The jQuery object is actually just the init constructor 'enhanced'
		// Need init if jQuery is called (just allow error to be thrown if not included)
		return new jQuery.fn.init( selector, context );
	};

jQuery.fn = jQuery.prototype = {

	// The current version of jQuery being used
	jquery: version,

	constructor: jQuery,

	// The default length of a jQuery object is 0
	length: 0,

	toArray: function() {
		return slice.call( this );
	},

	// Get the Nth element in the matched element set OR
	// Get the whole matched element set as a clean array
	get: function( num ) {

		// Return all the elements in a clean array
		if ( num == null ) {
			return slice.call( this );
		}

		// Return just the one element from the set
		return num < 0 ? this[ num + this.length ] : this[ num ];
	},

	// Take an array of elements and push it onto the stack
	// (returning the new matched element set)
	pushStack: function( elems ) {

		// Build a new jQuery matched element set
		var ret = jQuery.merge( this.constructor(), elems );

		// Add the old object onto the stack (as a reference)
		ret.prevObject = this;

		// Return the newly-formed element set
		return ret;
	},

	// Execute a callback for every element in the matched set.
	each: function( callback ) {
		return jQuery.each( this, callback );
	},

	map: function( callback ) {
		return this.pushStack( jQuery.map( this, function( elem, i ) {
			return callback.call( elem, i, elem );
		} ) );
	},

	slice: function() {
		return this.pushStack( slice.apply( this, arguments ) );
	},

	first: function() {
		return this.eq( 0 );
	},

	last: function() {
		return this.eq( -1 );
	},

	even: function() {
		return this.pushStack( jQuery.grep( this, function( _elem, i ) {
			return ( i + 1 ) % 2;
		} ) );
	},

	odd: function() {
		return this.pushStack( jQuery.grep( this, function( _elem, i ) {
			return i % 2;
		} ) );
	},

	eq: function( i ) {
		var len = this.length,
			j = +i + ( i < 0 ? len : 0 );
		return this.pushStack( j >= 0 && j < len ? [ this[ j ] ] : [] );
	},

	end: function() {
		return this.prevObject || this.constructor();
	},

	// For internal use only.
	// Behaves like an Array's method, not like a jQuery method.
	push: push,
	sort: arr.sort,
	splice: arr.splice
};

jQuery.extend = jQuery.fn.extend = function() {
	var options, name, src, copy, copyIsArray, clone,
		target = arguments[ 0 ] || {},
		i = 1,
		length = arguments.length,
		deep = false;

	// Handle a deep copy situation
	if ( typeof target === "boolean" ) {
		deep = target;

		// Skip the boolean and the target
		target = arguments[ i ] || {};
		i++;
	}

	// Handle case when target is a string or something (possible in deep copy)
	if ( typeof target !== "object" && !isFunction( target ) ) {
		target = {};
	}

	// Extend jQuery itself if only one argument is passed
	if ( i === length ) {
		target = this;
		i--;
	}

	for ( ; i < length; i++ ) {

		// Only deal with non-null/undefined values
		if ( ( options = arguments[ i ] ) != null ) {

			// Extend the base object
			for ( name in options ) {
				copy = options[ name ];

				// Prevent Object.prototype pollution
				// Prevent never-ending loop
				if ( name === "__proto__" || target === copy ) {
					continue;
				}

				// Recurse if we're merging plain objects or arrays
				if ( deep && copy && ( jQuery.isPlainObject( copy ) ||
					( copyIsArray = Array.isArray( copy ) ) ) ) {
					src = target[ name ];

					// Ensure proper type for the source value
					if ( copyIsArray && !Array.isArray( src ) ) {
						clone = [];
					} else if ( !copyIsArray && !jQuery.isPlainObject( src ) ) {
						clone = {};
					} else {
						clone = src;
					}
					copyIsArray = false;

					// Never move original objects, clone them
					target[ name ] = jQuery.extend( deep, clone, copy );

				// Don't bring in undefined values
				} else if ( copy !== undefined ) {
					target[ name ] = copy;
				}
			}
		}
	}

	// Return the modified object
	return target;
};

jQuery.extend( {

	// Unique for each copy of jQuery on the page
	expando: "jQuery" + ( version + Math.random() ).replace( /\D/g, "" ),

	// Assume jQuery is ready without the ready module
	isReady: true,

	error: function( msg ) {
		throw new Error( msg );
	},

	noop: function() {},

	isPlainObject: function( obj ) {
		var proto, Ctor;

		// Detect obvious negatives
		// Use toString instead of jQuery.type to catch host objects
		if ( !obj || toString.call( obj ) !== "[object Object]" ) {
			return false;
		}

		proto = getProto( obj );

		// Objects with no prototype (e.g., `Object.create( null )`) are plain
		if ( !proto ) {
			return true;
		}

		// Objects with prototype are plain iff they were constructed by a global Object function
		Ctor = hasOwn.call( proto, "constructor" ) && proto.constructor;
		return typeof Ctor === "function" && fnToString.call( Ctor ) === ObjectFunctionString;
	},

	isEmptyObject: function( obj ) {
		var name;

		for ( name in obj ) {
			return false;
		}
		return true;
	},

	// Evaluates a script in a provided context; falls back to the global one
	// if not specified.
	globalEval: function( code, options, doc ) {
		DOMEval( code, { nonce: options && options.nonce }, doc );
	},

	each: function( obj, callback ) {
		var length, i = 0;

		if ( isArrayLike( obj ) ) {
			length = obj.length;
			for ( ; i < length; i++ ) {
				if ( callback.call( obj[ i ], i, obj[ i ] ) === false ) {
					break;
				}
			}
		} else {
			for ( i in obj ) {
				if ( callback.call( obj[ i ], i, obj[ i ] ) === false ) {
					break;
				}
			}
		}

		return obj;
	},

	// results is for internal usage only
	makeArray: function( arr, results ) {
		var ret = results || [];

		if ( arr != null ) {
			if ( isArrayLike( Object( arr ) ) ) {
				jQuery.merge( ret,
					typeof arr === "string" ?
					[ arr ] : arr
				);
			} else {
				push.call( ret, arr );
			}
		}

		return ret;
	},

	inArray: function( elem, arr, i ) {
		return arr == null ? -1 : indexOf.call( arr, elem, i );
	},

	// Support: Android <=4.0 only, PhantomJS 1 only
	// push.apply(_, arraylike) throws on ancient WebKit
	merge: function( first, second ) {
		var len = +second.length,
			j = 0,
			i = first.length;

		for ( ; j < len; j++ ) {
			first[ i++ ] = second[ j ];
		}

		first.length = i;

		return first;
	},

	grep: function( elems, callback, invert ) {
		var callbackInverse,
			matches = [],
			i = 0,
			length = elems.length,
			callbackExpect = !invert;

		// Go through the array, only saving the items
		// that pass the validator function
		for ( ; i < length; i++ ) {
			callbackInverse = !callback( elems[ i ], i );
			if ( callbackInverse !== callbackExpect ) {
				matches.push( elems[ i ] );
			}
		}

		return matches;
	},

	// arg is for internal usage only
	map: function( elems, callback, arg ) {
		var length, value,
			i = 0,
			ret = [];

		// Go through the array, translating each of the items to their new values
		if ( isArrayLike( elems ) ) {
			length = elems.length;
			for ( ; i < length; i++ ) {
				value = callback( elems[ i ], i, arg );

				if ( value != null ) {
					ret.push( value );
				}
			}

		// Go through every key on the object,
		} else {
			for ( i in elems ) {
				value = callback( elems[ i ], i, arg );

				if ( value != null ) {
					ret.push( value );
				}
			}
		}

		// Flatten any nested arrays
		return flat( ret );
	},

	// A global GUID counter for objects
	guid: 1,

	// jQuery.support is not used in Core but other projects attach their
	// properties to it so it needs to exist.
	support: support
} );

if ( typeof Symbol === "function" ) {
	jQuery.fn[ Symbol.iterator ] = arr[ Symbol.iterator ];
}

// Populate the class2type map
jQuery.each( "Boolean Number String Function Array Date RegExp Object Error Symbol".split( " " ),
function( _i, name ) {
	class2type[ "[object " + name + "]" ] = name.toLowerCase();
} );

function isArrayLike( obj ) {

	// Support: real iOS 8.2 only (not reproducible in simulator)
	// `in` check used to prevent JIT error (gh-2145)
	// hasOwn isn't used here due to false negatives
	// regarding Nodelist length in IE
	var length = !!obj && "length" in obj && obj.length,
		type = toType( obj );

	if ( isFunction( obj ) || isWindow( obj ) ) {
		return false;
	}

	return type === "array" || length === 0 ||
		typeof length === "number" && length > 0 && ( length - 1 ) in obj;
}
var Sizzle =
/*!
 * Sizzle CSS Selector Engine v2.3.5
 * https://sizzlejs.com/
 *
 * Copyright JS Foundation and other contributors
 * Released under the MIT license
 * https://js.foundation/
 *
 * Date: 2020-03-14
 */
( function( window ) {
var i,
	support,
	Expr,
	getText,
	isXML,
	tokenize,
	compile,
	select,
	outermostContext,
	sortInput,
	hasDuplicate,

	// Local document vars
	setDocument,
	document,
	docElem,
	documentIsHTML,
	rbuggyQSA,
	rbuggyMatches,
	matches,
	contains,

	// Instance-specific data
	expando = "sizzle" + 1 * new Date(),
	preferredDoc = window.document,
	dirruns = 0,
	done = 0,
	classCache = createCache(),
	tokenCache = createCache(),
	compilerCache = createCache(),
	nonnativeSelectorCache = createCache(),
	sortOrder = function( a, b ) {
		if ( a === b ) {
			hasDuplicate = true;
		}
		return 0;
	},

	// Instance methods
	hasOwn = ( {} ).hasOwnProperty,
	arr = [],
	pop = arr.pop,
	pushNative = arr.push,
	push = arr.push,
	slice = arr.slice,

	// Use a stripped-down indexOf as it's faster than native
	// https://jsperf.com/thor-indexof-vs-for/5
	indexOf = function( list, elem ) {
		var i = 0,
			len = list.length;
		for ( ; i < len; i++ ) {
			if ( list[ i ] === elem ) {
				return i;
			}
		}
		return -1;
	},

	booleans = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|" +
		"ismap|loop|multiple|open|readonly|required|scoped",

	// Regular expressions

	// http://www.w3.org/TR/css3-selectors/#whitespace
	whitespace = "[\\x20\\t\\r\\n\\f]",

	// https://www.w3.org/TR/css-syntax-3/#ident-token-diagram
	identifier = "(?:\\\\[\\da-fA-F]{1,6}" + whitespace +
		"?|\\\\[^\\r\\n\\f]|[\\w-]|[^\0-\\x7f])+",

	// Attribute selectors: http://www.w3.org/TR/selectors/#attribute-selectors
	attributes = "\\[" + whitespace + "*(" + identifier + ")(?:" + whitespace +

		// Operator (capture 2)
		"*([*^$|!~]?=)" + whitespace +

		// "Attribute values must be CSS identifiers [capture 5]
		// or strings [capture 3 or capture 4]"
		"*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + identifier + "))|)" +
		whitespace + "*\\]",

	pseudos = ":(" + identifier + ")(?:\\((" +

		// To reduce the number of selectors needing tokenize in the preFilter, prefer arguments:
		// 1. quoted (capture 3; capture 4 or capture 5)
		"('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|" +

		// 2. simple (capture 6)
		"((?:\\\\.|[^\\\\()[\\]]|" + attributes + ")*)|" +

		// 3. anything else (capture 2)
		".*" +
		")\\)|)",

	// Leading and non-escaped trailing whitespace, capturing some non-whitespace characters preceding the latter
	rwhitespace = new RegExp( whitespace + "+", "g" ),
	rtrim = new RegExp( "^" + whitespace + "+|((?:^|[^\\\\])(?:\\\\.)*)" +
		whitespace + "+$", "g" ),

	rcomma = new RegExp( "^" + whitespace + "*," + whitespace + "*" ),
	rcombinators = new RegExp( "^" + whitespace + "*([>+~]|" + whitespace + ")" + whitespace +
		"*" ),
	rdescend = new RegExp( whitespace + "|>" ),

	rpseudo = new RegExp( pseudos ),
	ridentifier = new RegExp( "^" + identifier + "$" ),

	matchExpr = {
		"ID": new RegExp( "^#(" + identifier + ")" ),
		"CLASS": new RegExp( "^\\.(" + identifier + ")" ),
		"TAG": new RegExp( "^(" + identifier + "|[*])" ),
		"ATTR": new RegExp( "^" + attributes ),
		"PSEUDO": new RegExp( "^" + pseudos ),
		"CHILD": new RegExp( "^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" +
			whitespace + "*(even|odd|(([+-]|)(\\d*)n|)" + whitespace + "*(?:([+-]|)" +
			whitespace + "*(\\d+)|))" + whitespace + "*\\)|)", "i" ),
		"bool": new RegExp( "^(?:" + booleans + ")$", "i" ),

		// For use in libraries implementing .is()
		// We use this for POS matching in `select`
		"needsContext": new RegExp( "^" + whitespace +
			"*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + whitespace +
			"*((?:-\\d)?\\d*)" + whitespace + "*\\)|)(?=[^-]|$)", "i" )
	},

	rhtml = /HTML$/i,
	rinputs = /^(?:input|select|textarea|button)$/i,
	rheader = /^h\d$/i,

	rnative = /^[^{]+\{\s*\[native \w/,

	// Easily-parseable/retrievable ID or TAG or CLASS selectors
	rquickExpr = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,

	rsibling = /[+~]/,

	// CSS escapes
	// http://www.w3.org/TR/CSS21/syndata.html#escaped-characters
	runescape = new RegExp( "\\\\[\\da-fA-F]{1,6}" + whitespace + "?|\\\\([^\\r\\n\\f])", "g" ),
	funescape = function( escape, nonHex ) {
		var high = "0x" + escape.slice( 1 ) - 0x10000;

		return nonHex ?

			// Strip the backslash prefix from a non-hex escape sequence
			nonHex :

			// Replace a hexadecimal escape sequence with the encoded Unicode code point
			// Support: IE <=11+
			// For values outside the Basic Multilingual Plane (BMP), manually construct a
			// surrogate pair
			high < 0 ?
				String.fromCharCode( high + 0x10000 ) :
				String.fromCharCode( high >> 10 | 0xD800, high & 0x3FF | 0xDC00 );
	},

	// CSS string/identifier serialization
	// https://drafts.csswg.org/cssom/#common-serializing-idioms
	rcssescape = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g,
	fcssescape = function( ch, asCodePoint ) {
		if ( asCodePoint ) {

			// U+0000 NULL becomes U+FFFD REPLACEMENT CHARACTER
			if ( ch === "\0" ) {
				return "\uFFFD";
			}

			// Control characters and (dependent upon position) numbers get escaped as code points
			return ch.slice( 0, -1 ) + "\\" +
				ch.charCodeAt( ch.length - 1 ).toString( 16 ) + " ";
		}

		// Other potentially-special ASCII characters get backslash-escaped
		return "\\" + ch;
	},

	// Used for iframes
	// See setDocument()
	// Removing the function wrapper causes a "Permission Denied"
	// error in IE
	unloadHandler = function() {
		setDocument();
	},

	inDisabledFieldset = addCombinator(
		function( elem ) {
			return elem.disabled === true && elem.nodeName.toLowerCase() === "fieldset";
		},
		{ dir: "parentNode", next: "legend" }
	);

// Optimize for push.apply( _, NodeList )
try {
	push.apply(
		( arr = slice.call( preferredDoc.childNodes ) ),
		preferredDoc.childNodes
	);

	// Support: Android<4.0
	// Detect silently failing push.apply
	// eslint-disable-next-line no-unused-expressions
	arr[ preferredDoc.childNodes.length ].nodeType;
} catch ( e ) {
	push = { apply: arr.length ?

		// Leverage slice if possible
		function( target, els ) {
			pushNative.apply( target, slice.call( els ) );
		} :

		// Support: IE<9
		// Otherwise append directly
		function( target, els ) {
			var j = target.length,
				i = 0;

			// Can't trust NodeList.length
			while ( ( target[ j++ ] = els[ i++ ] ) ) {}
			target.length = j - 1;
		}
	};
}

function Sizzle( selector, context, results, seed ) {
	var m, i, elem, nid, match, groups, newSelector,
		newContext = context && context.ownerDocument,

		// nodeType defaults to 9, since context defaults to document
		nodeType = context ? context.nodeType : 9;

	results = results || [];

	// Return early from calls with invalid selector or context
	if ( typeof selector !== "string" || !selector ||
		nodeType !== 1 && nodeType !== 9 && nodeType !== 11 ) {

		return results;
	}

	// Try to shortcut find operations (as opposed to filters) in HTML documents
	if ( !seed ) {
		setDocument( context );
		context = context || document;

		if ( documentIsHTML ) {

			// If the selector is sufficiently simple, try using a "get*By*" DOM method
			// (excepting DocumentFragment context, where the methods don't exist)
			if ( nodeType !== 11 && ( match = rquickExpr.exec( selector ) ) ) {

				// ID selector
				if ( ( m = match[ 1 ] ) ) {

					// Document context
					if ( nodeType === 9 ) {
						if ( ( elem = context.getElementById( m ) ) ) {

							// Support: IE, Opera, Webkit
							// TODO: identify versions
							// getElementById can match elements by name instead of ID
							if ( elem.id === m ) {
								results.push( elem );
								return results;
							}
						} else {
							return results;
						}

					// Element context
					} else {

						// Support: IE, Opera, Webkit
						// TODO: identify versions
						// getElementById can match elements by name instead of ID
						if ( newContext && ( elem = newContext.getElementById( m ) ) &&
							contains( context, elem ) &&
							elem.id === m ) {

							results.push( elem );
							return results;
						}
					}

				// Type selector
				} else if ( match[ 2 ] ) {
					push.apply( results, context.getElementsByTagName( selector ) );
					return results;

				// Class selector
				} else if ( ( m = match[ 3 ] ) && support.getElementsByClassName &&
					context.getElementsByClassName ) {

					push.apply( results, context.getElementsByClassName( m ) );
					return results;
				}
			}

			// Take advantage of querySelectorAll
			if ( support.qsa &&
				!nonnativeSelectorCache[ selector + " " ] &&
				( !rbuggyQSA || !rbuggyQSA.test( selector ) ) &&

				// Support: IE 8 only
				// Exclude object elements
				( nodeType !== 1 || context.nodeName.toLowerCase() !== "object" ) ) {

				newSelector = selector;
				newContext = context;

				// qSA considers elements outside a scoping root when evaluating child or
				// descendant combinators, which is not what we want.
				// In such cases, we work around the behavior by prefixing every selector in the
				// list with an ID selector referencing the scope context.
				// The technique has to be used as well when a leading combinator is used
				// as such selectors are not recognized by querySelectorAll.
				// Thanks to Andrew Dupont for this technique.
				if ( nodeType === 1 &&
					( rdescend.test( selector ) || rcombinators.test( selector ) ) ) {

					// Expand context for sibling selectors
					newContext = rsibling.test( selector ) && testContext( context.parentNode ) ||
						context;

					// We can use :scope instead of the ID hack if the browser
					// supports it & if we're not changing the context.
					if ( newContext !== context || !support.scope ) {

						// Capture the context ID, setting it first if necessary
						if ( ( nid = context.getAttribute( "id" ) ) ) {
							nid = nid.replace( rcssescape, fcssescape );
						} else {
							context.setAttribute( "id", ( nid = expando ) );
						}
					}

					// Prefix every selector in the list
					groups = tokenize( selector );
					i = groups.length;
					while ( i-- ) {
						groups[ i ] = ( nid ? "#" + nid : ":scope" ) + " " +
							toSelector( groups[ i ] );
					}
					newSelector = groups.join( "," );
				}

				try {
					push.apply( results,
						newContext.querySelectorAll( newSelector )
					);
					return results;
				} catch ( qsaError ) {
					nonnativeSelectorCache( selector, true );
				} finally {
					if ( nid === expando ) {
						context.removeAttribute( "id" );
					}
				}
			}
		}
	}

	// All others
	return select( selector.replace( rtrim, "$1" ), context, results, seed );
}

/**
 * Create key-value caches of limited size
 * @returns {function(string, object)} Returns the Object data after storing it on itself with
 *	property name the (space-suffixed) string and (if the cache is larger than Expr.cacheLength)
 *	deleting the oldest entry
 */
function createCache() {
	var keys = [];

	function cache( key, value ) {

		// Use (key + " ") to avoid collision with native prototype properties (see Issue #157)
		if ( keys.push( key + " " ) > Expr.cacheLength ) {

			// Only keep the most recent entries
			delete cache[ keys.shift() ];
		}
		return ( cache[ key + " " ] = value );
	}
	return cache;
}

/**
 * Mark a function for special use by Sizzle
 * @param {Function} fn The function to mark
 */
function markFunction( fn ) {
	fn[ expando ] = true;
	return fn;
}

/**
 * Support testing using an element
 * @param {Function} fn Passed the created element and returns a boolean result
 */
function assert( fn ) {
	var el = document.createElement( "fieldset" );

	try {
		return !!fn( el );
	} catch ( e ) {
		return false;
	} finally {

		// Remove from its parent by default
		if ( el.parentNode ) {
			el.parentNode.removeChild( el );
		}

		// release memory in IE
		el = null;
	}
}

/**
 * Adds the same handler for all of the specified attrs
 * @param {String} attrs Pipe-separated list of attributes
 * @param {Function} handler The method that will be applied
 */
function addHandle( attrs, handler ) {
	var arr = attrs.split( "|" ),
		i = arr.length;

	while ( i-- ) {
		Expr.attrHandle[ arr[ i ] ] = handler;
	}
}

/**
 * Checks document order of two siblings
 * @param {Element} a
 * @param {Element} b
 * @returns {Number} Returns less than 0 if a precedes b, greater than 0 if a follows b
 */
function siblingCheck( a, b ) {
	var cur = b && a,
		diff = cur && a.nodeType === 1 && b.nodeType === 1 &&
			a.sourceIndex - b.sourceIndex;

	// Use IE sourceIndex if available on both nodes
	if ( diff ) {
		return diff;
	}

	// Check if b follows a
	if ( cur ) {
		while ( ( cur = cur.nextSibling ) ) {
			if ( cur === b ) {
				return -1;
			}
		}
	}

	return a ? 1 : -1;
}

/**
 * Returns a function to use in pseudos for input types
 * @param {String} type
 */
function createInputPseudo( type ) {
	return function( elem ) {
		var name = elem.nodeName.toLowerCase();
		return name === "input" && elem.type === type;
	};
}

/**
 * Returns a function to use in pseudos for buttons
 * @param {String} type
 */
function createButtonPseudo( type ) {
	return function( elem ) {
		var name = elem.nodeName.toLowerCase();
		return ( name === "input" || name === "button" ) && elem.type === type;
	};
}

/**
 * Returns a function to use in pseudos for :enabled/:disabled
 * @param {Boolean} disabled true for :disabled; false for :enabled
 */
function createDisabledPseudo( disabled ) {

	// Known :disabled false positives: fieldset[disabled] > legend:nth-of-type(n+2) :can-disable
	return function( elem ) {

		// Only certain elements can match :enabled or :disabled
		// https://html.spec.whatwg.org/multipage/scripting.html#selector-enabled
		// https://html.spec.whatwg.org/multipage/scripting.html#selector-disabled
		if ( "form" in elem ) {

			// Check for inherited disabledness on relevant non-disabled elements:
			// * listed form-associated elements in a disabled fieldset
			//   https://html.spec.whatwg.org/multipage/forms.html#category-listed
			//   https://html.spec.whatwg.org/multipage/forms.html#concept-fe-disabled
			// * option elements in a disabled optgroup
			//   https://html.spec.whatwg.org/multipage/forms.html#concept-option-disabled
			// All such elements have a "form" property.
			if ( elem.parentNode && elem.disabled === false ) {

				// Option elements defer to a parent optgroup if present
				if ( "label" in elem ) {
					if ( "label" in elem.parentNode ) {
						return elem.parentNode.disabled === disabled;
					} else {
						return elem.disabled === disabled;
					}
				}

				// Support: IE 6 - 11
				// Use the isDisabled shortcut property to check for disabled fieldset ancestors
				return elem.isDisabled === disabled ||

					// Where there is no isDisabled, check manually
					/* jshint -W018 */
					elem.isDisabled !== !disabled &&
					inDisabledFieldset( elem ) === disabled;
			}

			return elem.disabled === disabled;

		// Try to winnow out elements that can't be disabled before trusting the disabled property.
		// Some victims get caught in our net (label, legend, menu, track), but it shouldn't
		// even exist on them, let alone have a boolean value.
		} else if ( "label" in elem ) {
			return elem.disabled === disabled;
		}

		// Remaining elements are neither :enabled nor :disabled
		return false;
	};
}

/**
 * Returns a function to use in pseudos for positionals
 * @param {Function} fn
 */
function createPositionalPseudo( fn ) {
	return markFunction( function( argument ) {
		argument = +argument;
		return markFunction( function( seed, matches ) {
			var j,
				matchIndexes = fn( [], seed.length, argument ),
				i = matchIndexes.length;

			// Match elements found at the specified indexes
			while ( i-- ) {
				if ( seed[ ( j = matchIndexes[ i ] ) ] ) {
					seed[ j ] = !( matches[ j ] = seed[ j ] );
				}
			}
		} );
	} );
}

/**
 * Checks a node for validity as a Sizzle context
 * @param {Element|Object=} context
 * @returns {Element|Object|Boolean} The input node if acceptable, otherwise a falsy value
 */
function testContext( context ) {
	return context && typeof context.getElementsByTagName !== "undefined" && context;
}

// Expose support vars for convenience
support = Sizzle.support = {};

/**
 * Detects XML nodes
 * @param {Element|Object} elem An element or a document
 * @returns {Boolean} True iff elem is a non-HTML XML node
 */
isXML = Sizzle.isXML = function( elem ) {
	var namespace = elem.namespaceURI,
		docElem = ( elem.ownerDocument || elem ).documentElement;

	// Support: IE <=8
	// Assume HTML when documentElement doesn't yet exist, such as inside loading iframes
	// https://bugs.jquery.com/ticket/4833
	return !rhtml.test( namespace || docElem && docElem.nodeName || "HTML" );
};

/**
 * Sets document-related variables once based on the current document
 * @param {Element|Object} [doc] An element or document object to use to set the document
 * @returns {Object} Returns the current document
 */
setDocument = Sizzle.setDocument = function( node ) {
	var hasCompare, subWindow,
		doc = node ? node.ownerDocument || node : preferredDoc;

	// Return early if doc is invalid or already selected
	// Support: IE 11+, Edge 17 - 18+
	// IE/Edge sometimes throw a "Permission denied" error when strict-comparing
	// two documents; shallow comparisons work.
	// eslint-disable-next-line eqeqeq
	if ( doc == document || doc.nodeType !== 9 || !doc.documentElement ) {
		return document;
	}

	// Update global variables
	document = doc;
	docElem = document.documentElement;
	documentIsHTML = !isXML( document );

	// Support: IE 9 - 11+, Edge 12 - 18+
	// Accessing iframe documents after unload throws "permission denied" errors (jQuery #13936)
	// Support: IE 11+, Edge 17 - 18+
	// IE/Edge sometimes throw a "Permission denied" error when strict-comparing
	// two documents; shallow comparisons work.
	// eslint-disable-next-line eqeqeq
	if ( preferredDoc != document &&
		( subWindow = document.defaultView ) && subWindow.top !== subWindow ) {

		// Support: IE 11, Edge
		if ( subWindow.addEventListener ) {
			subWindow.addEventListener( "unload", unloadHandler, false );

		// Support: IE 9 - 10 only
		} else if ( subWindow.attachEvent ) {
			subWindow.attachEvent( "onunload", unloadHandler );
		}
	}

	// Support: IE 8 - 11+, Edge 12 - 18+, Chrome <=16 - 25 only, Firefox <=3.6 - 31 only,
	// Safari 4 - 5 only, Opera <=11.6 - 12.x only
	// IE/Edge & older browsers don't support the :scope pseudo-class.
	// Support: Safari 6.0 only
	// Safari 6.0 supports :scope but it's an alias of :root there.
	support.scope = assert( function( el ) {
		docElem.appendChild( el ).appendChild( document.createElement( "div" ) );
		return typeof el.querySelectorAll !== "undefined" &&
			!el.querySelectorAll( ":scope fieldset div" ).length;
	} );

	/* Attributes
	---------------------------------------------------------------------- */

	// Support: IE<8
	// Verify that getAttribute really returns attributes and not properties
	// (excepting IE8 booleans)
	support.attributes = assert( function( el ) {
		el.className = "i";
		return !el.getAttribute( "className" );
	} );

	/* getElement(s)By*
	---------------------------------------------------------------------- */

	// Check if getElementsByTagName("*") returns only elements
	support.getElementsByTagName = assert( function( el ) {
		el.appendChild( document.createComment( "" ) );
		return !el.getElementsByTagName( "*" ).length;
	} );

	// Support: IE<9
	support.getElementsByClassName = rnative.test( document.getElementsByClassName );

	// Support: IE<10
	// Check if getElementById returns elements by name
	// The broken getElementById methods don't pick up programmatically-set names,
	// so use a roundabout getElementsByName test
	support.getById = assert( function( el ) {
		docElem.appendChild( el ).id = expando;
		return !document.getElementsByName || !document.getElementsByName( expando ).length;
	} );

	// ID filter and find
	if ( support.getById ) {
		Expr.filter[ "ID" ] = function( id ) {
			var attrId = id.replace( runescape, funescape );
			return function( elem ) {
				return elem.getAttribute( "id" ) === attrId;
			};
		};
		Expr.find[ "ID" ] = function( id, context ) {
			if ( typeof context.getElementById !== "undefined" && documentIsHTML ) {
				var elem = context.getElementById( id );
				return elem ? [ elem ] : [];
			}
		};
	} else {
		Expr.filter[ "ID" ] =  function( id ) {
			var attrId = id.replace( runescape, funescape );
			return function( elem ) {
				var node = typeof elem.getAttributeNode !== "undefined" &&
					elem.getAttributeNode( "id" );
				return node && node.value === attrId;
			};
		};

		// Support: IE 6 - 7 only
		// getElementById is not reliable as a find shortcut
		Expr.find[ "ID" ] = function( id, context ) {
			if ( typeof context.getElementById !== "undefined" && documentIsHTML ) {
				var node, i, elems,
					elem = context.getElementById( id );

				if ( elem ) {

					// Verify the id attribute
					node = elem.getAttributeNode( "id" );
					if ( node && node.value === id ) {
						return [ elem ];
					}

					// Fall back on getElementsByName
					elems = context.getElementsByName( id );
					i = 0;
					while ( ( elem = elems[ i++ ] ) ) {
						node = elem.getAttributeNode( "id" );
						if ( node && node.value === id ) {
							return [ elem ];
						}
					}
				}

				return [];
			}
		};
	}

	// Tag
	Expr.find[ "TAG" ] = support.getElementsByTagName ?
		function( tag, context ) {
			if ( typeof context.getElementsByTagName !== "undefined" ) {
				return context.getElementsByTagName( tag );

			// DocumentFragment nodes don't have gEBTN
			} else if ( support.qsa ) {
				return context.querySelectorAll( tag );
			}
		} :

		function( tag, context ) {
			var elem,
				tmp = [],
				i = 0,

				// By happy coincidence, a (broken) gEBTN appears on DocumentFragment nodes too
				results = context.getElementsByTagName( tag );

			// Filter out possible comments
			if ( tag === "*" ) {
				while ( ( elem = results[ i++ ] ) ) {
					if ( elem.nodeType === 1 ) {
						tmp.push( elem );
					}
				}

				return tmp;
			}
			return results;
		};

	// Class
	Expr.find[ "CLASS" ] = support.getElementsByClassName && function( className, context ) {
		if ( typeof context.getElementsByClassName !== "undefined" && documentIsHTML ) {
			return context.getElementsByClassName( className );
		}
	};

	/* QSA/matchesSelector
	---------------------------------------------------------------------- */

	// QSA and matchesSelector support

	// matchesSelector(:active) reports false when true (IE9/Opera 11.5)
	rbuggyMatches = [];

	// qSa(:focus) reports false when true (Chrome 21)
	// We allow this because of a bug in IE8/9 that throws an error
	// whenever `document.activeElement` is accessed on an iframe
	// So, we allow :focus to pass through QSA all the time to avoid the IE error
	// See https://bugs.jquery.com/ticket/13378
	rbuggyQSA = [];

	if ( ( support.qsa = rnative.test( document.querySelectorAll ) ) ) {

		// Build QSA regex
		// Regex strategy adopted from Diego Perini
		assert( function( el ) {

			var input;

			// Select is set to empty string on purpose
			// This is to test IE's treatment of not explicitly
			// setting a boolean content attribute,
			// since its presence should be enough
			// https://bugs.jquery.com/ticket/12359
			docElem.appendChild( el ).innerHTML = "<a id='" + expando + "'></a>" +
				"<select id='" + expando + "-\r\\' msallowcapture=''>" +
				"<option selected=''></option></select>";

			// Support: IE8, Opera 11-12.16
			// Nothing should be selected when empty strings follow ^= or $= or *=
			// The test attribute must be unknown in Opera but "safe" for WinRT
			// https://msdn.microsoft.com/en-us/library/ie/hh465388.aspx#attribute_section
			if ( el.querySelectorAll( "[msallowcapture^='']" ).length ) {
				rbuggyQSA.push( "[*^$]=" + whitespace + "*(?:''|\"\")" );
			}

			// Support: IE8
			// Boolean attributes and "value" are not treated correctly
			if ( !el.querySelectorAll( "[selected]" ).length ) {
				rbuggyQSA.push( "\\[" + whitespace + "*(?:value|" + booleans + ")" );
			}

			// Support: Chrome<29, Android<4.4, Safari<7.0+, iOS<7.0+, PhantomJS<1.9.8+
			if ( !el.querySelectorAll( "[id~=" + expando + "-]" ).length ) {
				rbuggyQSA.push( "~=" );
			}

			// Support: IE 11+, Edge 15 - 18+
			// IE 11/Edge don't find elements on a `[name='']` query in some cases.
			// Adding a temporary attribute to the document before the selection works
			// around the issue.
			// Interestingly, IE 10 & older don't seem to have the issue.
			input = document.createElement( "input" );
			input.setAttribute( "name", "" );
			el.appendChild( input );
			if ( !el.querySelectorAll( "[name='']" ).length ) {
				rbuggyQSA.push( "\\[" + whitespace + "*name" + whitespace + "*=" +
					whitespace + "*(?:''|\"\")" );
			}

			// Webkit/Opera - :checked should return selected option elements
			// http://www.w3.org/TR/2011/REC-css3-selectors-20110929/#checked
			// IE8 throws error here and will not see later tests
			if ( !el.querySelectorAll( ":checked" ).length ) {
				rbuggyQSA.push( ":checked" );
			}

			// Support: Safari 8+, iOS 8+
			// https://bugs.webkit.org/show_bug.cgi?id=136851
			// In-page `selector#id sibling-combinator selector` fails
			if ( !el.querySelectorAll( "a#" + expando + "+*" ).length ) {
				rbuggyQSA.push( ".#.+[+~]" );
			}

			// Support: Firefox <=3.6 - 5 only
			// Old Firefox doesn't throw on a badly-escaped identifier.
			el.querySelectorAll( "\\\f" );
			rbuggyQSA.push( "[\\r\\n\\f]" );
		} );

		assert( function( el ) {
			el.innerHTML = "<a href='' disabled='disabled'></a>" +
				"<select disabled='disabled'><option/></select>";

			// Support: Windows 8 Native Apps
			// The type and name attributes are restricted during .innerHTML assignment
			var input = document.createElement( "input" );
			input.setAttribute( "type", "hidden" );
			el.appendChild( input ).setAttribute( "name", "D" );

			// Support: IE8
			// Enforce case-sensitivity of name attribute
			if ( el.querySelectorAll( "[name=d]" ).length ) {
				rbuggyQSA.push( "name" + whitespace + "*[*^$|!~]?=" );
			}

			// FF 3.5 - :enabled/:disabled and hidden elements (hidden elements are still enabled)
			// IE8 throws error here and will not see later tests
			if ( el.querySelectorAll( ":enabled" ).length !== 2 ) {
				rbuggyQSA.push( ":enabled", ":disabled" );
			}

			// Support: IE9-11+
			// IE's :disabled selector does not pick up the children of disabled fieldsets
			docElem.appendChild( el ).disabled = true;
			if ( el.querySelectorAll( ":disabled" ).length !== 2 ) {
				rbuggyQSA.push( ":enabled", ":disabled" );
			}

			// Support: Opera 10 - 11 only
			// Opera 10-11 does not throw on post-comma invalid pseudos
			el.querySelectorAll( "*,:x" );
			rbuggyQSA.push( ",.*:" );
		} );
	}

	if ( ( support.matchesSelector = rnative.test( ( matches = docElem.matches ||
		docElem.webkitMatchesSelector ||
		docElem.mozMatchesSelector ||
		docElem.oMatchesSelector ||
		docElem.msMatchesSelector ) ) ) ) {

		assert( function( el ) {

			// Check to see if it's possible to do matchesSelector
			// on a disconnected node (IE 9)
			support.disconnectedMatch = matches.call( el, "*" );

			// This should fail with an exception
			// Gecko does not error, returns false instead
			matches.call( el, "[s!='']:x" );
			rbuggyMatches.push( "!=", pseudos );
		} );
	}

	rbuggyQSA = rbuggyQSA.length && new RegExp( rbuggyQSA.join( "|" ) );
	rbuggyMatches = rbuggyMatches.length && new RegExp( rbuggyMatches.join( "|" ) );

	/* Contains
	---------------------------------------------------------------------- */
	hasCompare = rnative.test( docElem.compareDocumentPosition );

	// Element contains another
	// Purposefully self-exclusive
	// As in, an element does not contain itself
	contains = hasCompare || rnative.test( docElem.contains ) ?
		function( a, b ) {
			var adown = a.nodeType === 9 ? a.documentElement : a,
				bup = b && b.parentNode;
			return a === bup || !!( bup && bup.nodeType === 1 && (
				adown.contains ?
					adown.contains( bup ) :
					a.compareDocumentPosition && a.compareDocumentPosition( bup ) & 16
			) );
		} :
		function( a, b ) {
			if ( b ) {
				while ( ( b = b.parentNode ) ) {
					if ( b === a ) {
						return true;
					}
				}
			}
			return false;
		};

	/* Sorting
	---------------------------------------------------------------------- */

	// Document order sorting
	sortOrder = hasCompare ?
	function( a, b ) {

		// Flag for duplicate removal
		if ( a === b ) {
			hasDuplicate = true;
			return 0;
		}

		// Sort on method existence if only one input has compareDocumentPosition
		var compare = !a.compareDocumentPosition - !b.compareDocumentPosition;
		if ( compare ) {
			return compare;
		}

		// Calculate position if both inputs belong to the same document
		// Support: IE 11+, Edge 17 - 18+
		// IE/Edge sometimes throw a "Permission denied" error when strict-comparing
		// two documents; shallow comparisons work.
		// eslint-disable-next-line eqeqeq
		compare = ( a.ownerDocument || a ) == ( b.ownerDocument || b ) ?
			a.compareDocumentPosition( b ) :

			// Otherwise we know they are disconnected
			1;

		// Disconnected nodes
		if ( compare & 1 ||
			( !support.sortDetached && b.compareDocumentPosition( a ) === compare ) ) {

			// Choose the first element that is related to our preferred document
			// Support: IE 11+, Edge 17 - 18+
			// IE/Edge sometimes throw a "Permission denied" error when strict-comparing
			// two documents; shallow comparisons work.
			// eslint-disable-next-line eqeqeq
			if ( a == document || a.ownerDocument == preferredDoc &&
				contains( preferredDoc, a ) ) {
				return -1;
			}

			// Support: IE 11+, Edge 17 - 18+
			// IE/Edge sometimes throw a "Permission denied" error when strict-comparing
			// two documents; shallow comparisons work.
			// eslint-disable-next-line eqeqeq
			if ( b == document || b.ownerDocument == preferredDoc &&
				contains( preferredDoc, b ) ) {
				return 1;
			}

			// Maintain original order
			return sortInput ?
				( indexOf( sortInput, a ) - indexOf( sortInput, b ) ) :
				0;
		}

		return compare & 4 ? -1 : 1;
	} :
	function( a, b ) {

		// Exit early if the nodes are identical
		if ( a === b ) {
			hasDuplicate = true;
			return 0;
		}

		var cur,
			i = 0,
			aup = a.parentNode,
			bup = b.parentNode,
			ap = [ a ],
			bp = [ b ];

		// Parentless nodes are either documents or disconnected
		if ( !aup || !bup ) {

			// Support: IE 11+, Edge 17 - 18+
			// IE/Edge sometimes throw a "Permission denied" error when strict-comparing
			// two documents; shallow comparisons work.
			/* eslint-disable eqeqeq */
			return a == document ? -1 :
				b == document ? 1 :
				/* eslint-enable eqeqeq */
				aup ? -1 :
				bup ? 1 :
				sortInput ?
				( indexOf( sortInput, a ) - indexOf( sortInput, b ) ) :
				0;

		// If the nodes are siblings, we can do a quick check
		} else if ( aup === bup ) {
			return siblingCheck( a, b );
		}

		// Otherwise we need full lists of their ancestors for comparison
		cur = a;
		while ( ( cur = cur.parentNode ) ) {
			ap.unshift( cur );
		}
		cur = b;
		while ( ( cur = cur.parentNode ) ) {
			bp.unshift( cur );
		}

		// Walk down the tree looking for a discrepancy
		while ( ap[ i ] === bp[ i ] ) {
			i++;
		}

		return i ?

			// Do a sibling check if the nodes have a common ancestor
			siblingCheck( ap[ i ], bp[ i ] ) :

			// Otherwise nodes in our document sort first
			// Support: IE 11+, Edge 17 - 18+
			// IE/Edge sometimes throw a "Permission denied" error when strict-comparing
			// two documents; shallow comparisons work.
			/* eslint-disable eqeqeq */
			ap[ i ] == preferredDoc ? -1 :
			bp[ i ] == preferredDoc ? 1 :
			/* eslint-enable eqeqeq */
			0;
	};

	return document;
};

Sizzle.matches = function( expr, elements ) {
	return Sizzle( expr, null, null, elements );
};

Sizzle.matchesSelector = function( elem, expr ) {
	setDocument( elem );

	if ( support.matchesSelector && documentIsHTML &&
		!nonnativeSelectorCache[ expr + " " ] &&
		( !rbuggyMatches || !rbuggyMatches.test( expr ) ) &&
		( !rbuggyQSA     || !rbuggyQSA.test( expr ) ) ) {

		try {
			var ret = matches.call( elem, expr );

			// IE 9's matchesSelector returns false on disconnected nodes
			if ( ret || support.disconnectedMatch ||

				// As well, disconnected nodes are said to be in a document
				// fragment in IE 9
				elem.document && elem.document.nodeType !== 11 ) {
				return ret;
			}
		} catch ( e ) {
			nonnativeSelectorCache( expr, true );
		}
	}

	return Sizzle( expr, document, null, [ elem ] ).length > 0;
};

Sizzle.contains = function( context, elem ) {

	// Set document vars if needed
	// Support: IE 11+, Edge 17 - 18+
	// IE/Edge sometimes throw a "Permission denied" error when strict-comparing
	// two documents; shallow comparisons work.
	// eslint-disable-next-line eqeqeq
	if ( ( context.ownerDocument || context ) != document ) {
		setDocument( context );
	}
	return contains( context, elem );
};

Sizzle.attr = function( elem, name ) {

	// Set document vars if needed
	// Support: IE 11+, Edge 17 - 18+
	// IE/Edge sometimes throw a "Permission denied" error when strict-comparing
	// two documents; shallow comparisons work.
	// eslint-disable-next-line eqeqeq
	if ( ( elem.ownerDocument || elem ) != document ) {
		setDocument( elem );
	}

	var fn = Expr.attrHandle[ name.toLowerCase() ],

		// Don't get fooled by Object.prototype properties (jQuery #13807)
		val = fn && hasOwn.call( Expr.attrHandle, name.toLowerCase() ) ?
			fn( elem, name, !documentIsHTML ) :
			undefined;

	return val !== undefined ?
		val :
		support.attributes || !documentIsHTML ?
			elem.getAttribute( name ) :
			( val = elem.getAttributeNode( name ) ) && val.specified ?
				val.value :
				null;
};

Sizzle.escape = function( sel ) {
	return ( sel + "" ).replace( rcssescape, fcssescape );
};

Sizzle.error = function( msg ) {
	throw new Error( "Syntax error, unrecognized expression: " + msg );
};

/**
 * Document sorting and removing duplicates
 * @param {ArrayLike} results
 */
Sizzle.uniqueSort = function( results ) {
	var elem,
		duplicates = [],
		j = 0,
		i = 0;

	// Unless we *know* we can detect duplicates, assume their presence
	hasDuplicate = !support.detectDuplicates;
	sortInput = !support.sortStable && results.slice( 0 );
	results.sort( sortOrder );

	if ( hasDuplicate ) {
		while ( ( elem = results[ i++ ] ) ) {
			if ( elem === results[ i ] ) {
				j = duplicates.push( i );
			}
		}
		while ( j-- ) {
			results.splice( duplicates[ j ], 1 );
		}
	}

	// Clear input after sorting to release objects
	// See https://github.com/jquery/sizzle/pull/225
	sortInput = null;

	return results;
};

/**
 * Utility function for retrieving the text value of an array of DOM nodes
 * @param {Array|Element} elem
 */
getText = Sizzle.getText = function( elem ) {
	var node,
		ret = "",
		i = 0,
		nodeType = elem.nodeType;

	if ( !nodeType ) {

		// If no nodeType, this is expected to be an array
		while ( ( node = elem[ i++ ] ) ) {

			// Do not traverse comment nodes
			ret += getText( node );
		}
	} else if ( nodeType === 1 || nodeType === 9 || nodeType === 11 ) {

		// Use textContent for elements
		// innerText usage removed for consistency of new lines (jQuery #11153)
		if ( typeof elem.textContent === "string" ) {
			return elem.textContent;
		} else {

			// Traverse its children
			for ( elem = elem.firstChild; elem; elem = elem.nextSibling ) {
				ret += getText( elem );
			}
		}
	} else if ( nodeType === 3 || nodeType === 4 ) {
		return elem.nodeValue;
	}

	// Do not include comment or processing instruction nodes

	return ret;
};

Expr = Sizzle.selectors = {

	// Can be adjusted by the user
	cacheLength: 50,

	createPseudo: markFunction,

	match: matchExpr,

	attrHandle: {},

	find: {},

	relative: {
		">": { dir: "parentNode", first: true },
		" ": { dir: "parentNode" },
		"+": { dir: "previousSibling", first: true },
		"~": { dir: "previousSibling" }
	},

	preFilter: {
		"ATTR": function( match ) {
			match[ 1 ] = match[ 1 ].replace( runescape, funescape );

			// Move the given value to match[3] whether quoted or unquoted
			match[ 3 ] = ( match[ 3 ] || match[ 4 ] ||
				match[ 5 ] || "" ).replace( runescape, funescape );

			if ( match[ 2 ] === "~=" ) {
				match[ 3 ] = " " + match[ 3 ] + " ";
			}

			return match.slice( 0, 4 );
		},

		"CHILD": function( match ) {

			/* matches from matchExpr["CHILD"]
				1 type (only|nth|...)
				2 what (child|of-type)
				3 argument (even|odd|\d*|\d*n([+-]\d+)?|...)
				4 xn-component of xn+y argument ([+-]?\d*n|)
				5 sign of xn-component
				6 x of xn-component
				7 sign of y-component
				8 y of y-component
			*/
			match[ 1 ] = match[ 1 ].toLowerCase();

			if ( match[ 1 ].slice( 0, 3 ) === "nth" ) {

				// nth-* requires argument
				if ( !match[ 3 ] ) {
					Sizzle.error( match[ 0 ] );
				}

				// numeric x and y parameters for Expr.filter.CHILD
				// remember that false/true cast respectively to 0/1
				match[ 4 ] = +( match[ 4 ] ?
					match[ 5 ] + ( match[ 6 ] || 1 ) :
					2 * ( match[ 3 ] === "even" || match[ 3 ] === "odd" ) );
				match[ 5 ] = +( ( match[ 7 ] + match[ 8 ] ) || match[ 3 ] === "odd" );

				// other types prohibit arguments
			} else if ( match[ 3 ] ) {
				Sizzle.error( match[ 0 ] );
			}

			return match;
		},

		"PSEUDO": function( match ) {
			var excess,
				unquoted = !match[ 6 ] && match[ 2 ];

			if ( matchExpr[ "CHILD" ].test( match[ 0 ] ) ) {
				return null;
			}

			// Accept quoted arguments as-is
			if ( match[ 3 ] ) {
				match[ 2 ] = match[ 4 ] || match[ 5 ] || "";

			// Strip excess characters from unquoted arguments
			} else if ( unquoted && rpseudo.test( unquoted ) &&

				// Get excess from tokenize (recursively)
				( excess = tokenize( unquoted, true ) ) &&

				// advance to the next closing parenthesis
				( excess = unquoted.indexOf( ")", unquoted.length - excess ) - unquoted.length ) ) {

				// excess is a negative index
				match[ 0 ] = match[ 0 ].slice( 0, excess );
				match[ 2 ] = unquoted.slice( 0, excess );
			}

			// Return only captures needed by the pseudo filter method (type and argument)
			return match.slice( 0, 3 );
		}
	},

	filter: {

		"TAG": function( nodeNameSelector ) {
			var nodeName = nodeNameSelector.replace( runescape, funescape ).toLowerCase();
			return nodeNameSelector === "*" ?
				function() {
					return true;
				} :
				function( elem ) {
					return elem.nodeName && elem.nodeName.toLowerCase() === nodeName;
				};
		},

		"CLASS": function( className ) {
			var pattern = classCache[ className + " " ];

			return pattern ||
				( pattern = new RegExp( "(^|" + whitespace +
					")" + className + "(" + whitespace + "|$)" ) ) && classCache(
						className, function( elem ) {
							return pattern.test(
								typeof elem.className === "string" && elem.className ||
								typeof elem.getAttribute !== "undefined" &&
									elem.getAttribute( "class" ) ||
								""
							);
				} );
		},

		"ATTR": function( name, operator, check ) {
			return function( elem ) {
				var result = Sizzle.attr( elem, name );

				if ( result == null ) {
					return operator === "!=";
				}
				if ( !operator ) {
					return true;
				}

				result += "";

				/* eslint-disable max-len */

				return operator === "=" ? result === check :
					operator === "!=" ? result !== check :
					operator === "^=" ? check && result.indexOf( check ) === 0 :
					operator === "*=" ? check && result.indexOf( check ) > -1 :
					operator === "$=" ? check && result.slice( -check.length ) === check :
					operator === "~=" ? ( " " + result.replace( rwhitespace, " " ) + " " ).indexOf( check ) > -1 :
					operator === "|=" ? result === check || result.slice( 0, check.length + 1 ) === check + "-" :
					false;
				/* eslint-enable max-len */

			};
		},

		"CHILD": function( type, what, _argument, first, last ) {
			var simple = type.slice( 0, 3 ) !== "nth",
				forward = type.slice( -4 ) !== "last",
				ofType = what === "of-type";

			return first === 1 && last === 0 ?

				// Shortcut for :nth-*(n)
				function( elem ) {
					return !!elem.parentNode;
				} :

				function( elem, _context, xml ) {
					var cache, uniqueCache, outerCache, node, nodeIndex, start,
						dir = simple !== forward ? "nextSibling" : "previousSibling",
						parent = elem.parentNode,
						name = ofType && elem.nodeName.toLowerCase(),
						useCache = !xml && !ofType,
						diff = false;

					if ( parent ) {

						// :(first|last|only)-(child|of-type)
						if ( simple ) {
							while ( dir ) {
								node = elem;
								while ( ( node = node[ dir ] ) ) {
									if ( ofType ?
										node.nodeName.toLowerCase() === name :
										node.nodeType === 1 ) {

										return false;
									}
								}

								// Reverse direction for :only-* (if we haven't yet done so)
								start = dir = type === "only" && !start && "nextSibling";
							}
							return true;
						}

						start = [ forward ? parent.firstChild : parent.lastChild ];

						// non-xml :nth-child(...) stores cache data on `parent`
						if ( forward && useCache ) {

							// Seek `elem` from a previously-cached index

							// ...in a gzip-friendly way
							node = parent;
							outerCache = node[ expando ] || ( node[ expando ] = {} );

							// Support: IE <9 only
							// Defend against cloned attroperties (jQuery gh-1709)
							uniqueCache = outerCache[ node.uniqueID ] ||
								( outerCache[ node.uniqueID ] = {} );

							cache = uniqueCache[ type ] || [];
							nodeIndex = cache[ 0 ] === dirruns && cache[ 1 ];
							diff = nodeIndex && cache[ 2 ];
							node = nodeIndex && parent.childNodes[ nodeIndex ];

							while ( ( node = ++nodeIndex && node && node[ dir ] ||

								// Fallback to seeking `elem` from the start
								( diff = nodeIndex = 0 ) || start.pop() ) ) {

								// When found, cache indexes on `parent` and break
								if ( node.nodeType === 1 && ++diff && node === elem ) {
									uniqueCache[ type ] = [ dirruns, nodeIndex, diff ];
									break;
								}
							}

						} else {

							// Use previously-cached element index if available
							if ( useCache ) {

								// ...in a gzip-friendly way
								node = elem;
								outerCache = node[ expando ] || ( node[ expando ] = {} );

								// Support: IE <9 only
								// Defend against cloned attroperties (jQuery gh-1709)
								uniqueCache = outerCache[ node.uniqueID ] ||
									( outerCache[ node.uniqueID ] = {} );

								cache = uniqueCache[ type ] || [];
								nodeIndex = cache[ 0 ] === dirruns && cache[ 1 ];
								diff = nodeIndex;
							}

							// xml :nth-child(...)
							// or :nth-last-child(...) or :nth(-last)?-of-type(...)
							if ( diff === false ) {

								// Use the same loop as above to seek `elem` from the start
								while ( ( node = ++nodeIndex && node && node[ dir ] ||
									( diff = nodeIndex = 0 ) || start.pop() ) ) {

									if ( ( ofType ?
										node.nodeName.toLowerCase() === name :
										node.nodeType === 1 ) &&
										++diff ) {

										// Cache the index of each encountered element
										if ( useCache ) {
											outerCache = node[ expando ] ||
												( node[ expando ] = {} );

											// Support: IE <9 only
											// Defend against cloned attroperties (jQuery gh-1709)
											uniqueCache = outerCache[ node.uniqueID ] ||
												( outerCache[ node.uniqueID ] = {} );

											uniqueCache[ type ] = [ dirruns, diff ];
										}

										if ( node === elem ) {
											break;
										}
									}
								}
							}
						}

						// Incorporate the offset, then check against cycle size
						diff -= last;
						return diff === first || ( diff % first === 0 && diff / first >= 0 );
					}
				};
		},

		"PSEUDO": function( pseudo, argument ) {

			// pseudo-class names are case-insensitive
			// http://www.w3.org/TR/selectors/#pseudo-classes
			// Prioritize by case sensitivity in case custom pseudos are added with uppercase letters
			// Remember that setFilters inherits from pseudos
			var args,
				fn = Expr.pseudos[ pseudo ] || Expr.setFilters[ pseudo.toLowerCase() ] ||
					Sizzle.error( "unsupported pseudo: " + pseudo );

			// The user may use createPseudo to indicate that
			// arguments are needed to create the filter function
			// just as Sizzle does
			if ( fn[ expando ] ) {
				return fn( argument );
			}

			// But maintain support for old signatures
			if ( fn.length > 1 ) {
				args = [ pseudo, pseudo, "", argument ];
				return Expr.setFilters.hasOwnProperty( pseudo.toLowerCase() ) ?
					markFunction( function( seed, matches ) {
						var idx,
							matched = fn( seed, argument ),
							i = matched.length;
						while ( i-- ) {
							idx = indexOf( seed, matched[ i ] );
							seed[ idx ] = !( matches[ idx ] = matched[ i ] );
						}
					} ) :
					function( elem ) {
						return fn( elem, 0, args );
					};
			}

			return fn;
		}
	},

	pseudos: {

		// Potentially complex pseudos
		"not": markFunction( function( selector ) {

			// Trim the selector passed to compile
			// to avoid treating leading and trailing
			// spaces as combinators
			var input = [],
				results = [],
				matcher = compile( selector.replace( rtrim, "$1" ) );

			return matcher[ expando ] ?
				markFunction( function( seed, matches, _context, xml ) {
					var elem,
						unmatched = matcher( seed, null, xml, [] ),
						i = seed.length;

					// Match elements unmatched by `matcher`
					while ( i-- ) {
						if ( ( elem = unmatched[ i ] ) ) {
							seed[ i ] = !( matches[ i ] = elem );
						}
					}
				} ) :
				function( elem, _context, xml ) {
					input[ 0 ] = elem;
					matcher( input, null, xml, results );

					// Don't keep the element (issue #299)
					input[ 0 ] = null;
					return !results.pop();
				};
		} ),

		"has": markFunction( function( selector ) {
			return function( elem ) {
				return Sizzle( selector, elem ).length > 0;
			};
		} ),

		"contains": markFunction( function( text ) {
			text = text.replace( runescape, funescape );
			return function( elem ) {
				return ( elem.textContent || getText( elem ) ).indexOf( text ) > -1;
			};
		} ),

		// "Whether an element is represented by a :lang() selector
		// is based solely on the element's language value
		// being equal to the identifier C,
		// or beginning with the identifier C immediately followed by "-".
		// The matching of C against the element's language value is performed case-insensitively.
		// The identifier C does not have to be a valid language name."
		// http://www.w3.org/TR/selectors/#lang-pseudo
		"lang": markFunction( function( lang ) {

			// lang value must be a valid identifier
			if ( !ridentifier.test( lang || "" ) ) {
				Sizzle.error( "unsupported lang: " + lang );
			}
			lang = lang.replace( runescape, funescape ).toLowerCase();
			return function( elem ) {
				var elemLang;
				do {
					if ( ( elemLang = documentIsHTML ?
						elem.lang :
						elem.getAttribute( "xml:lang" ) || elem.getAttribute( "lang" ) ) ) {

						elemLang = elemLang.toLowerCase();
						return elemLang === lang || elemLang.indexOf( lang + "-" ) === 0;
					}
				} while ( ( elem = elem.parentNode ) && elem.nodeType === 1 );
				return false;
			};
		} ),

		// Miscellaneous
		"target": function( elem ) {
			var hash = window.location && window.location.hash;
			return hash && hash.slice( 1 ) === elem.id;
		},

		"root": function( elem ) {
			return elem === docElem;
		},

		"focus": function( elem ) {
			return elem === document.activeElement &&
				( !document.hasFocus || document.hasFocus() ) &&
				!!( elem.type || elem.href || ~elem.tabIndex );
		},

		// Boolean properties
		"enabled": createDisabledPseudo( false ),
		"disabled": createDisabledPseudo( true ),

		"checked": function( elem ) {

			// In CSS3, :checked should return both checked and selected elements
			// http://www.w3.org/TR/2011/REC-css3-selectors-20110929/#checked
			var nodeName = elem.nodeName.toLowerCase();
			return ( nodeName === "input" && !!elem.checked ) ||
				( nodeName === "option" && !!elem.selected );
		},

		"selected": function( elem ) {

			// Accessing this property makes selected-by-default
			// options in Safari work properly
			if ( elem.parentNode ) {
				// eslint-disable-next-line no-unused-expressions
				elem.parentNode.selectedIndex;
			}

			return elem.selected === true;
		},

		// Contents
		"empty": function( elem ) {

			// http://www.w3.org/TR/selectors/#empty-pseudo
			// :empty is negated by element (1) or content nodes (text: 3; cdata: 4; entity ref: 5),
			//   but not by others (comment: 8; processing instruction: 7; etc.)
			// nodeType < 6 works because attributes (2) do not appear as children
			for ( elem = elem.firstChild; elem; elem = elem.nextSibling ) {
				if ( elem.nodeType < 6 ) {
					return false;
				}
			}
			return true;
		},

		"parent": function( elem ) {
			return !Expr.pseudos[ "empty" ]( elem );
		},

		// Element/input types
		"header": function( elem ) {
			return rheader.test( elem.nodeName );
		},

		"input": function( elem ) {
			return rinputs.test( elem.nodeName );
		},

		"button": function( elem ) {
			var name = elem.nodeName.toLowerCase();
			return name === "input" && elem.type === "button" || name === "button";
		},

		"text": function( elem ) {
			var attr;
			return elem.nodeName.toLowerCase() === "input" &&
				elem.type === "text" &&

				// Support: IE<8
				// New HTML5 attribute values (e.g., "search") appear with elem.type === "text"
				( ( attr = elem.getAttribute( "type" ) ) == null ||
					attr.toLowerCase() === "text" );
		},

		// Position-in-collection
		"first": createPositionalPseudo( function() {
			return [ 0 ];
		} ),

		"last": createPositionalPseudo( function( _matchIndexes, length ) {
			return [ length - 1 ];
		} ),

		"eq": createPositionalPseudo( function( _matchIndexes, length, argument ) {
			return [ argument < 0 ? argument + length : argument ];
		} ),

		"even": createPositionalPseudo( function( matchIndexes, length ) {
			var i = 0;
			for ( ; i < length; i += 2 ) {
				matchIndexes.push( i );
			}
			return matchIndexes;
		} ),

		"odd": createPositionalPseudo( function( matchIndexes, length ) {
			var i = 1;
			for ( ; i < length; i += 2 ) {
				matchIndexes.push( i );
			}
			return matchIndexes;
		} ),

		"lt": createPositionalPseudo( function( matchIndexes, length, argument ) {
			var i = argument < 0 ?
				argument + length :
				argument > length ?
					length :
					argument;
			for ( ; --i >= 0; ) {
				matchIndexes.push( i );
			}
			return matchIndexes;
		} ),

		"gt": createPositionalPseudo( function( matchIndexes, length, argument ) {
			var i = argument < 0 ? argument + length : argument;
			for ( ; ++i < length; ) {
				matchIndexes.push( i );
			}
			return matchIndexes;
		} )
	}
};

Expr.pseudos[ "nth" ] = Expr.pseudos[ "eq" ];

// Add button/input type pseudos
for ( i in { radio: true, checkbox: true, file: true, password: true, image: true } ) {
	Expr.pseudos[ i ] = createInputPseudo( i );
}
for ( i in { submit: true, reset: true } ) {
	Expr.pseudos[ i ] = createButtonPseudo( i );
}

// Easy API for creating new setFilters
function setFilters() {}
setFilters.prototype = Expr.filters = Expr.pseudos;
Expr.setFilters = new setFilters();

tokenize = Sizzle.tokenize = function( selector, parseOnly ) {
	var matched, match, tokens, type,
		soFar, groups, preFilters,
		cached = tokenCache[ selector + " " ];

	if ( cached ) {
		return parseOnly ? 0 : cached.slice( 0 );
	}

	soFar = selector;
	groups = [];
	preFilters = Expr.preFilter;

	while ( soFar ) {

		// Comma and first run
		if ( !matched || ( match = rcomma.exec( soFar ) ) ) {
			if ( match ) {

				// Don't consume trailing commas as valid
				soFar = soFar.slice( match[ 0 ].length ) || soFar;
			}
			groups.push( ( tokens = [] ) );
		}

		matched = false;

		// Combinators
		if ( ( match = rcombinators.exec( soFar ) ) ) {
			matched = match.shift();
			tokens.push( {
				value: matched,

				// Cast descendant combinators to space
				type: match[ 0 ].replace( rtrim, " " )
			} );
			soFar = soFar.slice( matched.length );
		}

		// Filters
		for ( type in Expr.filter ) {
			if ( ( match = matchExpr[ type ].exec( soFar ) ) && ( !preFilters[ type ] ||
				( match = preFilters[ type ]( match ) ) ) ) {
				matched = match.shift();
				tokens.push( {
					value: matched,
					type: type,
					matches: match
				} );
				soFar = soFar.slice( matched.length );
			}
		}

		if ( !matched ) {
			break;
		}
	}

	// Return the length of the invalid excess
	// if we're just parsing
	// Otherwise, throw an error or return tokens
	return parseOnly ?
		soFar.length :
		soFar ?
			Sizzle.error( selector ) :

			// Cache the tokens
			tokenCache( selector, groups ).slice( 0 );
};

function toSelector( tokens ) {
	var i = 0,
		len = tokens.length,
		selector = "";
	for ( ; i < len; i++ ) {
		selector += tokens[ i ].value;
	}
	return selector;
}

function addCombinator( matcher, combinator, base ) {
	var dir = combinator.dir,
		skip = combinator.next,
		key = skip || dir,
		checkNonElements = base && key === "parentNode",
		doneName = done++;

	return combinator.first ?

		// Check against closest ancestor/preceding element
		function( elem, context, xml ) {
			while ( ( elem = elem[ dir ] ) ) {
				if ( elem.nodeType === 1 || checkNonElements ) {
					return matcher( elem, context, xml );
				}
			}
			return false;
		} :

		// Check against all ancestor/preceding elements
		function( elem, context, xml ) {
			var oldCache, uniqueCache, outerCache,
				newCache = [ dirruns, doneName ];

			// We can't set arbitrary data on XML nodes, so they don't benefit from combinator caching
			if ( xml ) {
				while ( ( elem = elem[ dir ] ) ) {
					if ( elem.nodeType === 1 || checkNonElements ) {
						if ( matcher( elem, context, xml ) ) {
							return true;
						}
					}
				}
			} else {
				while ( ( elem = elem[ dir ] ) ) {
					if ( elem.nodeType === 1 || checkNonElements ) {
						outerCache = elem[ expando ] || ( elem[ expando ] = {} );

						// Support: IE <9 only
						// Defend against cloned attroperties (jQuery gh-1709)
						uniqueCache = outerCache[ elem.uniqueID ] ||
							( outerCache[ elem.uniqueID ] = {} );

						if ( skip && skip === elem.nodeName.toLowerCase() ) {
							elem = elem[ dir ] || elem;
						} else if ( ( oldCache = uniqueCache[ key ] ) &&
							oldCache[ 0 ] === dirruns && oldCache[ 1 ] === doneName ) {

							// Assign to newCache so results back-propagate to previous elements
							return ( newCache[ 2 ] = oldCache[ 2 ] );
						} else {

							// Reuse newcache so results back-propagate to previous elements
							uniqueCache[ key ] = newCache;

							// A match means we're done; a fail means we have to keep checking
							if ( ( newCache[ 2 ] = matcher( elem, context, xml ) ) ) {
								return true;
							}
						}
					}
				}
			}
			return false;
		};
}

function elementMatcher( matchers ) {
	return matchers.length > 1 ?
		function( elem, context, xml ) {
			var i = matchers.length;
			while ( i-- ) {
				if ( !matchers[ i ]( elem, context, xml ) ) {
					return false;
				}
			}
			return true;
		} :
		matchers[ 0 ];
}

function multipleContexts( selector, contexts, results ) {
	var i = 0,
		len = contexts.length;
	for ( ; i < len; i++ ) {
		Sizzle( selector, contexts[ i ], results );
	}
	return results;
}

function condense( unmatched, map, filter, context, xml ) {
	var elem,
		newUnmatched = [],
		i = 0,
		len = unmatched.length,
		mapped = map != null;

	for ( ; i < len; i++ ) {
		if ( ( elem = unmatched[ i ] ) ) {
			if ( !filter || filter( elem, context, xml ) ) {
				newUnmatched.push( elem );
				if ( mapped ) {
					map.push( i );
				}
			}
		}
	}

	return newUnmatched;
}

function setMatcher( preFilter, selector, matcher, postFilter, postFinder, postSelector ) {
	if ( postFilter && !postFilter[ expando ] ) {
		postFilter = setMatcher( postFilter );
	}
	if ( postFinder && !postFinder[ expando ] ) {
		postFinder = setMatcher( postFinder, postSelector );
	}
	return markFunction( function( seed, results, context, xml ) {
		var temp, i, elem,
			preMap = [],
			postMap = [],
			preexisting = results.length,

			// Get initial elements from seed or context
			elems = seed || multipleContexts(
				selector || "*",
				context.nodeType ? [ context ] : context,
				[]
			),

			// Prefilter to get matcher input, preserving a map for seed-results synchronization
			matcherIn = preFilter && ( seed || !selector ) ?
				condense( elems, preMap, preFilter, context, xml ) :
				elems,

			matcherOut = matcher ?

				// If we have a postFinder, or filtered seed, or non-seed postFilter or preexisting results,
				postFinder || ( seed ? preFilter : preexisting || postFilter ) ?

					// ...intermediate processing is necessary
					[] :

					// ...otherwise use results directly
					results :
				matcherIn;

		// Find primary matches
		if ( matcher ) {
			matcher( matcherIn, matcherOut, context, xml );
		}

		// Apply postFilter
		if ( postFilter ) {
			temp = condense( matcherOut, postMap );
			postFilter( temp, [], context, xml );

			// Un-match failing elements by moving them back to matcherIn
			i = temp.length;
			while ( i-- ) {
				if ( ( elem = temp[ i ] ) ) {
					matcherOut[ postMap[ i ] ] = !( matcherIn[ postMap[ i ] ] = elem );
				}
			}
		}

		if ( seed ) {
			if ( postFinder || preFilter ) {
				if ( postFinder ) {

					// Get the final matcherOut by condensing this intermediate into postFinder contexts
					temp = [];
					i = matcherOut.length;
					while ( i-- ) {
						if ( ( elem = matcherOut[ i ] ) ) {

							// Restore matcherIn since elem is not yet a final match
							temp.push( ( matcherIn[ i ] = elem ) );
						}
					}
					postFinder( null, ( matcherOut = [] ), temp, xml );
				}

				// Move matched elements from seed to results to keep them synchronized
				i = matcherOut.length;
				while ( i-- ) {
					if ( ( elem = matcherOut[ i ] ) &&
						( temp = postFinder ? indexOf( seed, elem ) : preMap[ i ] ) > -1 ) {

						seed[ temp ] = !( results[ temp ] = elem );
					}
				}
			}

		// Add elements to results, through postFinder if defined
		} else {
			matcherOut = condense(
				matcherOut === results ?
					matcherOut.splice( preexisting, matcherOut.length ) :
					matcherOut
			);
			if ( postFinder ) {
				postFinder( null, results, matcherOut, xml );
			} else {
				push.apply( results, matcherOut );
			}
		}
	} );
}

function matcherFromTokens( tokens ) {
	var checkContext, matcher, j,
		len = tokens.length,
		leadingRelative = Expr.relative[ tokens[ 0 ].type ],
		implicitRelative = leadingRelative || Expr.relative[ " " ],
		i = leadingRelative ? 1 : 0,

		// The foundational matcher ensures that elements are reachable from top-level context(s)
		matchContext = addCombinator( function( elem ) {
			return elem === checkContext;
		}, implicitRelative, true ),
		matchAnyContext = addCombinator( function( elem ) {
			return indexOf( checkContext, elem ) > -1;
		}, implicitRelative, true ),
		matchers = [ function( elem, context, xml ) {
			var ret = ( !leadingRelative && ( xml || context !== outermostContext ) ) || (
				( checkContext = context ).nodeType ?
					matchContext( elem, context, xml ) :
					matchAnyContext( elem, context, xml ) );

			// Avoid hanging onto element (issue #299)
			checkContext = null;
			return ret;
		} ];

	for ( ; i < len; i++ ) {
		if ( ( matcher = Expr.relative[ tokens[ i ].type ] ) ) {
			matchers = [ addCombinator( elementMatcher( matchers ), matcher ) ];
		} else {
			matcher = Expr.filter[ tokens[ i ].type ].apply( null, tokens[ i ].matches );

			// Return special upon seeing a positional matcher
			if ( matcher[ expando ] ) {

				// Find the next relative operator (if any) for proper handling
				j = ++i;
				for ( ; j < len; j++ ) {
					if ( Expr.relative[ tokens[ j ].type ] ) {
						break;
					}
				}
				return setMatcher(
					i > 1 && elementMatcher( matchers ),
					i > 1 && toSelector(

					// If the preceding token was a descendant combinator, insert an implicit any-element `*`
					tokens
						.slice( 0, i - 1 )
						.concat( { value: tokens[ i - 2 ].type === " " ? "*" : "" } )
					).replace( rtrim, "$1" ),
					matcher,
					i < j && matcherFromTokens( tokens.slice( i, j ) ),
					j < len && matcherFromTokens( ( tokens = tokens.slice( j ) ) ),
					j < len && toSelector( tokens )
				);
			}
			matchers.push( matcher );
		}
	}

	return elementMatcher( matchers );
}

function matcherFromGroupMatchers( elementMatchers, setMatchers ) {
	var bySet = setMatchers.length > 0,
		byElement = elementMatchers.length > 0,
		superMatcher = function( seed, context, xml, results, outermost ) {
			var elem, j, matcher,
				matchedCount = 0,
				i = "0",
				unmatched = seed && [],
				setMatched = [],
				contextBackup = outermostContext,

				// We must always have either seed elements or outermost context
				elems = seed || byElement && Expr.find[ "TAG" ]( "*", outermost ),

				// Use integer dirruns iff this is the outermost matcher
				dirrunsUnique = ( dirruns += contextBackup == null ? 1 : Math.random() || 0.1 ),
				len = elems.length;

			if ( outermost ) {

				// Support: IE 11+, Edge 17 - 18+
				// IE/Edge sometimes throw a "Permission denied" error when strict-comparing
				// two documents; shallow comparisons work.
				// eslint-disable-next-line eqeqeq
				outermostContext = context == document || context || outermost;
			}

			// Add elements passing elementMatchers directly to results
			// Support: IE<9, Safari
			// Tolerate NodeList properties (IE: "length"; Safari: <number>) matching elements by id
			for ( ; i !== len && ( elem = elems[ i ] ) != null; i++ ) {
				if ( byElement && elem ) {
					j = 0;

					// Support: IE 11+, Edge 17 - 18+
					// IE/Edge sometimes throw a "Permission denied" error when strict-comparing
					// two documents; shallow comparisons work.
					// eslint-disable-next-line eqeqeq
					if ( !context && elem.ownerDocument != document ) {
						setDocument( elem );
						xml = !documentIsHTML;
					}
					while ( ( matcher = elementMatchers[ j++ ] ) ) {
						if ( matcher( elem, context || document, xml ) ) {
							results.push( elem );
							break;
						}
					}
					if ( outermost ) {
						dirruns = dirrunsUnique;
					}
				}

				// Track unmatched elements for set filters
				if ( bySet ) {

					// They will have gone through all possible matchers
					if ( ( elem = !matcher && elem ) ) {
						matchedCount--;
					}

					// Lengthen the array for every element, matched or not
					if ( seed ) {
						unmatched.push( elem );
					}
				}
			}

			// `i` is now the count of elements visited above, and adding it to `matchedCount`
			// makes the latter nonnegative.
			matchedCount += i;

			// Apply set filters to unmatched elements
			// NOTE: This can be skipped if there are no unmatched elements (i.e., `matchedCount`
			// equals `i`), unless we didn't visit _any_ elements in the above loop because we have
			// no element matchers and no seed.
			// Incrementing an initially-string "0" `i` allows `i` to remain a string only in that
			// case, which will result in a "00" `matchedCount` that differs from `i` but is also
			// numerically zero.
			if ( bySet && i !== matchedCount ) {
				j = 0;
				while ( ( matcher = setMatchers[ j++ ] ) ) {
					matcher( unmatched, setMatched, context, xml );
				}

				if ( seed ) {

					// Reintegrate element matches to eliminate the need for sorting
					if ( matchedCount > 0 ) {
						while ( i-- ) {
							if ( !( unmatched[ i ] || setMatched[ i ] ) ) {
								setMatched[ i ] = pop.call( results );
							}
						}
					}

					// Discard index placeholder values to get only actual matches
					setMatched = condense( setMatched );
				}

				// Add matches to results
				push.apply( results, setMatched );

				// Seedless set matches succeeding multiple successful matchers stipulate sorting
				if ( outermost && !seed && setMatched.length > 0 &&
					( matchedCount + setMatchers.length ) > 1 ) {

					Sizzle.uniqueSort( results );
				}
			}

			// Override manipulation of globals by nested matchers
			if ( outermost ) {
				dirruns = dirrunsUnique;
				outermostContext = contextBackup;
			}

			return unmatched;
		};

	return bySet ?
		markFunction( superMatcher ) :
		superMatcher;
}

compile = Sizzle.compile = function( selector, match /* Internal Use Only */ ) {
	var i,
		setMatchers = [],
		elementMatchers = [],
		cached = compilerCache[ selector + " " ];

	if ( !cached ) {

		// Generate a function of recursive functions that can be used to check each element
		if ( !match ) {
			match = tokenize( selector );
		}
		i = match.length;
		while ( i-- ) {
			cached = matcherFromTokens( match[ i ] );
			if ( cached[ expando ] ) {
				setMatchers.push( cached );
			} else {
				elementMatchers.push( cached );
			}
		}

		// Cache the compiled function
		cached = compilerCache(
			selector,
			matcherFromGroupMatchers( elementMatchers, setMatchers )
		);

		// Save selector and tokenization
		cached.selector = selector;
	}
	return cached;
};

/**
 * A low-level selection function that works with Sizzle's compiled
 *  selector functions
 * @param {String|Function} selector A selector or a pre-compiled
 *  selector function built with Sizzle.compile
 * @param {Element} context
 * @param {Array} [results]
 * @param {Array} [seed] A set of elements to match against
 */
select = Sizzle.select = function( selector, context, results, seed ) {
	var i, tokens, token, type, find,
		compiled = typeof selector === "function" && selector,
		match = !seed && tokenize( ( selector = compiled.selector || selector ) );

	results = results || [];

	// Try to minimize operations if there is only one selector in the list and no seed
	// (the latter of which guarantees us context)
	if ( match.length === 1 ) {

		// Reduce context if the leading compound selector is an ID
		tokens = match[ 0 ] = match[ 0 ].slice( 0 );
		if ( tokens.length > 2 && ( token = tokens[ 0 ] ).type === "ID" &&
			context.nodeType === 9 && documentIsHTML && Expr.relative[ tokens[ 1 ].type ] ) {

			context = ( Expr.find[ "ID" ]( token.matches[ 0 ]
				.replace( runescape, funescape ), context ) || [] )[ 0 ];
			if ( !context ) {
				return results;

			// Precompiled matchers will still verify ancestry, so step up a level
			} else if ( compiled ) {
				context = context.parentNode;
			}

			selector = selector.slice( tokens.shift().value.length );
		}

		// Fetch a seed set for right-to-left matching
		i = matchExpr[ "needsContext" ].test( selector ) ? 0 : tokens.length;
		while ( i-- ) {
			token = tokens[ i ];

			// Abort if we hit a combinator
			if ( Expr.relative[ ( type = token.type ) ] ) {
				break;
			}
			if ( ( find = Expr.find[ type ] ) ) {

				// Search, expanding context for leading sibling combinators
				if ( ( seed = find(
					token.matches[ 0 ].replace( runescape, funescape ),
					rsibling.test( tokens[ 0 ].type ) && testContext( context.parentNode ) ||
						context
				) ) ) {

					// If seed is empty or no tokens remain, we can return early
					tokens.splice( i, 1 );
					selector = seed.length && toSelector( tokens );
					if ( !selector ) {
						push.apply( results, seed );
						return results;
					}

					break;
				}
			}
		}
	}

	// Compile and execute a filtering function if one is not provided
	// Provide `match` to avoid retokenization if we modified the selector above
	( compiled || compile( selector, match ) )(
		seed,
		context,
		!documentIsHTML,
		results,
		!context || rsibling.test( selector ) && testContext( context.parentNode ) || context
	);
	return results;
};

// One-time assignments

// Sort stability
support.sortStable = expando.split( "" ).sort( sortOrder ).join( "" ) === expando;

// Support: Chrome 14-35+
// Always assume duplicates if they aren't passed to the comparison function
support.detectDuplicates = !!hasDuplicate;

// Initialize against the default document
setDocument();

// Support: Webkit<537.32 - Safari 6.0.3/Chrome 25 (fixed in Chrome 27)
// Detached nodes confoundingly follow *each other*
support.sortDetached = assert( function( el ) {

	// Should return 1, but returns 4 (following)
	return el.compareDocumentPosition( document.createElement( "fieldset" ) ) & 1;
} );

// Support: IE<8
// Prevent attribute/property "interpolation"
// https://msdn.microsoft.com/en-us/library/ms536429%28VS.85%29.aspx
if ( !assert( function( el ) {
	el.innerHTML = "<a href='#'></a>";
	return el.firstChild.getAttribute( "href" ) === "#";
} ) ) {
	addHandle( "type|href|height|width", function( elem, name, isXML ) {
		if ( !isXML ) {
			return elem.getAttribute( name, name.toLowerCase() === "type" ? 1 : 2 );
		}
	} );
}

// Support: IE<9
// Use defaultValue in place of getAttribute("value")
if ( !support.attributes || !assert( function( el ) {
	el.innerHTML = "<input/>";
	el.firstChild.setAttribute( "value", "" );
	return el.firstChild.getAttribute( "value" ) === "";
} ) ) {
	addHandle( "value", function( elem, _name, isXML ) {
		if ( !isXML && elem.nodeName.toLowerCase() === "input" ) {
			return elem.defaultValue;
		}
	} );
}

// Support: IE<9
// Use getAttributeNode to fetch booleans when getAttribute lies
if ( !assert( function( el ) {
	return el.getAttribute( "disabled" ) == null;
} ) ) {
	addHandle( booleans, function( elem, name, isXML ) {
		var val;
		if ( !isXML ) {
			return elem[ name ] === true ? name.toLowerCase() :
				( val = elem.getAttributeNode( name ) ) && val.specified ?
					val.value :
					null;
		}
	} );
}

return Sizzle;

} )( window );



jQuery.find = Sizzle;
jQuery.expr = Sizzle.selectors;

// Deprecated
jQuery.expr[ ":" ] = jQuery.expr.pseudos;
jQuery.uniqueSort = jQuery.unique = Sizzle.uniqueSort;
jQuery.text = Sizzle.getText;
jQuery.isXMLDoc = Sizzle.isXML;
jQuery.contains = Sizzle.contains;
jQuery.escapeSelector = Sizzle.escape;




var dir = function( elem, dir, until ) {
	var matched = [],
		truncate = until !== undefined;

	while ( ( elem = elem[ dir ] ) && elem.nodeType !== 9 ) {
		if ( elem.nodeType === 1 ) {
			if ( truncate && jQuery( elem ).is( until ) ) {
				break;
			}
			matched.push( elem );
		}
	}
	return matched;
};


var siblings = function( n, elem ) {
	var matched = [];

	for ( ; n; n = n.nextSibling ) {
		if ( n.nodeType === 1 && n !== elem ) {
			matched.push( n );
		}
	}

	return matched;
};


var rneedsContext = jQuery.expr.match.needsContext;



function nodeName( elem, name ) {

  return elem.nodeName && elem.nodeName.toLowerCase() === name.toLowerCase();

};
var rsingleTag = ( /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i );



// Implement the identical functionality for filter and not
function winnow( elements, qualifier, not ) {
	if ( isFunction( qualifier ) ) {
		return jQuery.grep( elements, function( elem, i ) {
			return !!qualifier.call( elem, i, elem ) !== not;
		} );
	}

	// Single element
	if ( qualifier.nodeType ) {
		return jQuery.grep( elements, function( elem ) {
			return ( elem === qualifier ) !== not;
		} );
	}

	// Arraylike of elements (jQuery, arguments, Array)
	if ( typeof qualifier !== "string" ) {
		return jQuery.grep( elements, function( elem ) {
			return ( indexOf.call( qualifier, elem ) > -1 ) !== not;
		} );
	}

	// Filtered directly for both simple and complex selectors
	return jQuery.filter( qualifier, elements, not );
}

jQuery.filter = function( expr, elems, not ) {
	var elem = elems[ 0 ];

	if ( not ) {
		expr = ":not(" + expr + ")";
	}

	if ( elems.length === 1 && elem.nodeType === 1 ) {
		return jQuery.find.matchesSelector( elem, expr ) ? [ elem ] : [];
	}

	return jQuery.find.matches( expr, jQuery.grep( elems, function( elem ) {
		return elem.nodeType === 1;
	} ) );
};

jQuery.fn.extend( {
	find: function( selector ) {
		var i, ret,
			len = this.length,
			self = this;

		if ( typeof selector !== "string" ) {
			return this.pushStack( jQuery( selector ).filter( function() {
				for ( i = 0; i < len; i++ ) {
					if ( jQuery.contains( self[ i ], this ) ) {
						return true;
					}
				}
			} ) );
		}

		ret = this.pushStack( [] );

		for ( i = 0; i < len; i++ ) {
			jQuery.find( selector, self[ i ], ret );
		}

		return len > 1 ? jQuery.uniqueSort( ret ) : ret;
	},
	filter: function( selector ) {
		return this.pushStack( winnow( this, selector || [], false ) );
	},
	not: function( selector ) {
		return this.pushStack( winnow( this, selector || [], true ) );
	},
	is: function( selector ) {
		return !!winnow(
			this,

			// If this is a positional/relative selector, check membership in the returned set
			// so $("p:first").is("p:last") won't return true for a doc with two "p".
			typeof selector === "string" && rneedsContext.test( selector ) ?
				jQuery( selector ) :
				selector || [],
			false
		).length;
	}
} );


// Initialize a jQuery object


// A central reference to the root jQuery(document)
var rootjQuery,

	// A simple way to check for HTML strings
	// Prioritize #id over <tag> to avoid XSS via location.hash (#9521)
	// Strict HTML recognition (#11290: must start with <)
	// Shortcut simple #id case for speed
	rquickExpr = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/,

	init = jQuery.fn.init = function( selector, context, root ) {
		var match, elem;

		// HANDLE: $(""), $(null), $(undefined), $(false)
		if ( !selector ) {
			return this;
		}

		// Method init() accepts an alternate rootjQuery
		// so migrate can support jQuery.sub (gh-2101)
		root = root || rootjQuery;

		// Handle HTML strings
		if ( typeof selector === "string" ) {
			if ( selector[ 0 ] === "<" &&
				selector[ selector.length - 1 ] === ">" &&
				selector.length >= 3 ) {

				// Assume that strings that start and end with <> are HTML and skip the regex check
				match = [ null, selector, null ];

			} else {
				match = rquickExpr.exec( selector );
			}

			// Match html or make sure no context is specified for #id
			if ( match && ( match[ 1 ] || !context ) ) {

				// HANDLE: $(html) -> $(array)
				if ( match[ 1 ] ) {
					context = context instanceof jQuery ? context[ 0 ] : context;

					// Option to run scripts is true for back-compat
					// Intentionally let the error be thrown if parseHTML is not present
					jQuery.merge( this, jQuery.parseHTML(
						match[ 1 ],
						context && context.nodeType ? context.ownerDocument || context : document,
						true
					) );

					// HANDLE: $(html, props)
					if ( rsingleTag.test( match[ 1 ] ) && jQuery.isPlainObject( context ) ) {
						for ( match in context ) {

							// Properties of context are called as methods if possible
							if ( isFunction( this[ match ] ) ) {
								this[ match ]( context[ match ] );

							// ...and otherwise set as attributes
							} else {
								this.attr( match, context[ match ] );
							}
						}
					}

					return this;

				// HANDLE: $(#id)
				} else {
					elem = document.getElementById( match[ 2 ] );

					if ( elem ) {

						// Inject the element directly into the jQuery object
						this[ 0 ] = elem;
						this.length = 1;
					}
					return this;
				}

			// HANDLE: $(expr, $(...))
			} else if ( !context || context.jquery ) {
				return ( context || root ).find( selector );

			// HANDLE: $(expr, context)
			// (which is just equivalent to: $(context).find(expr)
			} else {
				return this.constructor( context ).find( selector );
			}

		// HANDLE: $(DOMElement)
		} else if ( selector.nodeType ) {
			this[ 0 ] = selector;
			this.length = 1;
			return this;

		// HANDLE: $(function)
		// Shortcut for document ready
		} else if ( isFunction( selector ) ) {
			return root.ready !== undefined ?
				root.ready( selector ) :

				// Execute immediately if ready is not present
				selector( jQuery );
		}

		return jQuery.makeArray( selector, this );
	};

// Give the init function the jQuery prototype for later instantiation
init.prototype = jQuery.fn;

// Initialize central reference
rootjQuery = jQuery( document );


var rparentsprev = /^(?:parents|prev(?:Until|All))/,

	// Methods guaranteed to produce a unique set when starting from a unique set
	guaranteedUnique = {
		children: true,
		contents: true,
		next: true,
		prev: true
	};

jQuery.fn.extend( {
	has: function( target ) {
		var targets = jQuery( target, this ),
			l = targets.length;

		return this.filter( function() {
			var i = 0;
			for ( ; i < l; i++ ) {
				if ( jQuery.contains( this, targets[ i ] ) ) {
					return true;
				}
			}
		} );
	},

	closest: function( selectors, context ) {
		var cur,
			i = 0,
			l = this.length,
			matched = [],
			targets = typeof selectors !== "string" && jQuery( selectors );

		// Positional selectors never match, since there's no _selection_ context
		if ( !rneedsContext.test( selectors ) ) {
			for ( ; i < l; i++ ) {
				for ( cur = this[ i ]; cur && cur !== context; cur = cur.parentNode ) {

					// Always skip document fragments
					if ( cur.nodeType < 11 && ( targets ?
						targets.index( cur ) > -1 :

						// Don't pass non-elements to Sizzle
						cur.nodeType === 1 &&
							jQuery.find.matchesSelector( cur, selectors ) ) ) {

						matched.push( cur );
						break;
					}
				}
			}
		}

		return this.pushStack( matched.length > 1 ? jQuery.uniqueSort( matched ) : matched );
	},

	// Determine the position of an element within the set
	index: function( elem ) {

		// No argument, return index in parent
		if ( !elem ) {
			return ( this[ 0 ] && this[ 0 ].parentNode ) ? this.first().prevAll().length : -1;
		}

		// Index in selector
		if ( typeof elem === "string" ) {
			return indexOf.call( jQuery( elem ), this[ 0 ] );
		}

		// Locate the position of the desired element
		return indexOf.call( this,

			// If it receives a jQuery object, the first element is used
			elem.jquery ? elem[ 0 ] : elem
		);
	},

	add: function( selector, context ) {
		return this.pushStack(
			jQuery.uniqueSort(
				jQuery.merge( this.get(), jQuery( selector, context ) )
			)
		);
	},

	addBack: function( selector ) {
		return this.add( selector == null ?
			this.prevObject : this.prevObject.filter( selector )
		);
	}
} );

function sibling( cur, dir ) {
	while ( ( cur = cur[ dir ] ) && cur.nodeType !== 1 ) {}
	return cur;
}

jQuery.each( {
	parent: function( elem ) {
		var parent = elem.parentNode;
		return parent && parent.nodeType !== 11 ? parent : null;
	},
	parents: function( elem ) {
		return dir( elem, "parentNode" );
	},
	parentsUntil: function( elem, _i, until ) {
		return dir( elem, "parentNode", until );
	},
	next: function( elem ) {
		return sibling( elem, "nextSibling" );
	},
	prev: function( elem ) {
		return sibling( elem, "previousSibling" );
	},
	nextAll: function( elem ) {
		return dir( elem, "nextSibling" );
	},
	prevAll: function( elem ) {
		return dir( elem, "previousSibling" );
	},
	nextUntil: function( elem, _i, until ) {
		return dir( elem, "nextSibling", until );
	},
	prevUntil: function( elem, _i, until ) {
		return dir( elem, "previousSibling", until );
	},
	siblings: function( elem ) {
		return siblings( ( elem.parentNode || {} ).firstChild, elem );
	},
	children: function( elem ) {
		return siblings( elem.firstChild );
	},
	contents: function( elem ) {
		if ( elem.contentDocument != null &&

			// Support: IE 11+
			// <object> elements with no `data` attribute has an object
			// `contentDocument` with a `null` prototype.
			getProto( elem.contentDocument ) ) {

			return elem.contentDocument;
		}

		// Support: IE 9 - 11 only, iOS 7 only, Android Browser <=4.3 only
		// Treat the template element as a regular one in browsers that
		// don't support it.
		if ( nodeName( elem, "template" ) ) {
			elem = elem.content || elem;
		}

		return jQuery.merge( [], elem.childNodes );
	}
}, function( name, fn ) {
	jQuery.fn[ name ] = function( until, selector ) {
		var matched = jQuery.map( this, fn, until );

		if ( name.slice( -5 ) !== "Until" ) {
			selector = until;
		}

		if ( selector && typeof selector === "string" ) {
			matched = jQuery.filter( selector, matched );
		}

		if ( this.length > 1 ) {

			// Remove duplicates
			if ( !guaranteedUnique[ name ] ) {
				jQuery.uniqueSort( matched );
			}

			// Reverse order for parents* and prev-derivatives
			if ( rparentsprev.test( name ) ) {
				matched.reverse();
			}
		}

		return this.pushStack( matched );
	};
} );
var rnothtmlwhite = ( /[^\x20\t\r\n\f]+/g );



// Convert String-formatted options into Object-formatted ones
function createOptions( options ) {
	var object = {};
	jQuery.each( options.match( rnothtmlwhite ) || [], function( _, flag ) {
		object[ flag ] = true;
	} );
	return object;
}

/*
 * Create a callback list using the following parameters:
 *
 *	options: an optional list of space-separated options that will change how
 *			the callback list behaves or a more traditional option object
 *
 * By default a callback list will act like an event callback list and can be
 * "fired" multiple times.
 *
 * Possible options:
 *
 *	once:			will ensure the callback list can only be fired once (like a Deferred)
 *
 *	memory:			will keep track of previous values and will call any callback added
 *					after the list has been fired right away with the latest "memorized"
 *					values (like a Deferred)
 *
 *	unique:			will ensure a callback can only be added once (no duplicate in the list)
 *
 *	stopOnFalse:	interrupt callings when a callback returns false
 *
 */
jQuery.Callbacks = function( options ) {

	// Convert options from String-formatted to Object-formatted if needed
	// (we check in cache first)
	options = typeof options === "string" ?
		createOptions( options ) :
		jQuery.extend( {}, options );

	var // Flag to know if list is currently firing
		firing,

		// Last fire value for non-forgettable lists
		memory,

		// Flag to know if list was already fired
		fired,

		// Flag to prevent firing
		locked,

		// Actual callback list
		list = [],

		// Queue of execution data for repeatable lists
		queue = [],

		// Index of currently firing callback (modified by add/remove as needed)
		firingIndex = -1,

		// Fire callbacks
		fire = function() {

			// Enforce single-firing
			locked = locked || options.once;

			// Execute callbacks for all pending executions,
			// respecting firingIndex overrides and runtime changes
			fired = firing = true;
			for ( ; queue.length; firingIndex = -1 ) {
				memory = queue.shift();
				while ( ++firingIndex < list.length ) {

					// Run callback and check for early termination
					if ( list[ firingIndex ].apply( memory[ 0 ], memory[ 1 ] ) === false &&
						options.stopOnFalse ) {

						// Jump to end and forget the data so .add doesn't re-fire
						firingIndex = list.length;
						memory = false;
					}
				}
			}

			// Forget the data if we're done with it
			if ( !options.memory ) {
				memory = false;
			}

			firing = false;

			// Clean up if we're done firing for good
			if ( locked ) {

				// Keep an empty list if we have data for future add calls
				if ( memory ) {
					list = [];

				// Otherwise, this object is spent
				} else {
					list = "";
				}
			}
		},

		// Actual Callbacks object
		self = {

			// Add a callback or a collection of callbacks to the list
			add: function() {
				if ( list ) {

					// If we have memory from a past run, we should fire after adding
					if ( memory && !firing ) {
						firingIndex = list.length - 1;
						queue.push( memory );
					}

					( function add( args ) {
						jQuery.each( args, function( _, arg ) {
							if ( isFunction( arg ) ) {
								if ( !options.unique || !self.has( arg ) ) {
									list.push( arg );
								}
							} else if ( arg && arg.length && toType( arg ) !== "string" ) {

								// Inspect recursively
								add( arg );
							}
						} );
					} )( arguments );

					if ( memory && !firing ) {
						fire();
					}
				}
				return this;
			},

			// Remove a callback from the list
			remove: function() {
				jQuery.each( arguments, function( _, arg ) {
					var index;
					while ( ( index = jQuery.inArray( arg, list, index ) ) > -1 ) {
						list.splice( index, 1 );

						// Handle firing indexes
						if ( index <= firingIndex ) {
							firingIndex--;
						}
					}
				} );
				return this;
			},

			// Check if a given callback is in the list.
			// If no argument is given, return whether or not list has callbacks attached.
			has: function( fn ) {
				return fn ?
					jQuery.inArray( fn, list ) > -1 :
					list.length > 0;
			},

			// Remove all callbacks from the list
			empty: function() {
				if ( list ) {
					list = [];
				}
				return this;
			},

			// Disable .fire and .add
			// Abort any current/pending executions
			// Clear all callbacks and values
			disable: function() {
				locked = queue = [];
				list = memory = "";
				return this;
			},
			disabled: function() {
				return !list;
			},

			// Disable .fire
			// Also disable .add unless we have memory (since it would have no effect)
			// Abort any pending executions
			lock: function() {
				locked = queue = [];
				if ( !memory && !firing ) {
					list = memory = "";
				}
				return this;
			},
			locked: function() {
				return !!locked;
			},

			// Call all callbacks with the given context and arguments
			fireWith: function( context, args ) {
				if ( !locked ) {
					args = args || [];
					args = [ context, args.slice ? args.slice() : args ];
					queue.push( args );
					if ( !firing ) {
						fire();
					}
				}
				return this;
			},

			// Call all the callbacks with the given arguments
			fire: function() {
				self.fireWith( this, arguments );
				return this;
			},

			// To know if the callbacks have already been called at least once
			fired: function() {
				return !!fired;
			}
		};

	return self;
};


function Identity( v ) {
	return v;
}
function Thrower( ex ) {
	throw ex;
}

function adoptValue( value, resolve, reject, noValue ) {
	var method;

	try {

		// Check for promise aspect first to privilege synchronous behavior
		if ( value && isFunction( ( method = value.promise ) ) ) {
			method.call( value ).done( resolve ).fail( reject );

		// Other thenables
		} else if ( value && isFunction( ( method = value.then ) ) ) {
			method.call( value, resolve, reject );

		// Other non-thenables
		} else {

			// Control `resolve` arguments by letting Array#slice cast boolean `noValue` to integer:
			// * false: [ value ].slice( 0 ) => resolve( value )
			// * true: [ value ].slice( 1 ) => resolve()
			resolve.apply( undefined, [ value ].slice( noValue ) );
		}

	// For Promises/A+, convert exceptions into rejections
	// Since jQuery.when doesn't unwrap thenables, we can skip the extra checks appearing in
	// Deferred#then to conditionally suppress rejection.
	} catch ( value ) {

		// Support: Android 4.0 only
		// Strict mode functions invoked without .call/.apply get global-object context
		reject.apply( undefined, [ value ] );
	}
}

jQuery.extend( {

	Deferred: function( func ) {
		var tuples = [

				// action, add listener, callbacks,
				// ... .then handlers, argument index, [final state]
				[ "notify", "progress", jQuery.Callbacks( "memory" ),
					jQuery.Callbacks( "memory" ), 2 ],
				[ "resolve", "done", jQuery.Callbacks( "once memory" ),
					jQuery.Callbacks( "once memory" ), 0, "resolved" ],
				[ "reject", "fail", jQuery.Callbacks( "once memory" ),
					jQuery.Callbacks( "once memory" ), 1, "rejected" ]
			],
			state = "pending",
			promise = {
				state: function() {
					return state;
				},
				always: function() {
					deferred.done( arguments ).fail( arguments );
					return this;
				},
				"catch": function( fn ) {
					return promise.then( null, fn );
				},

				// Keep pipe for back-compat
				pipe: function( /* fnDone, fnFail, fnProgress */ ) {
					var fns = arguments;

					return jQuery.Deferred( function( newDefer ) {
						jQuery.each( tuples, function( _i, tuple ) {

							// Map tuples (progress, done, fail) to arguments (done, fail, progress)
							var fn = isFunction( fns[ tuple[ 4 ] ] ) && fns[ tuple[ 4 ] ];

							// deferred.progress(function() { bind to newDefer or newDefer.notify })
							// deferred.done(function() { bind to newDefer or newDefer.resolve })
							// deferred.fail(function() { bind to newDefer or newDefer.reject })
							deferred[ tuple[ 1 ] ]( function() {
								var returned = fn && fn.apply( this, arguments );
								if ( returned && isFunction( returned.promise ) ) {
									returned.promise()
										.progress( newDefer.notify )
										.done( newDefer.resolve )
										.fail( newDefer.reject );
								} else {
									newDefer[ tuple[ 0 ] + "With" ](
										this,
										fn ? [ returned ] : arguments
									);
								}
							} );
						} );
						fns = null;
					} ).promise();
				},
				then: function( onFulfilled, onRejected, onProgress ) {
					var maxDepth = 0;
					function resolve( depth, deferred, handler, special ) {
						return function() {
							var that = this,
								args = arguments,
								mightThrow = function() {
									var returned, then;

									// Support: Promises/A+ section 2.3.3.3.3
									// https://promisesaplus.com/#point-59
									// Ignore double-resolution attempts
									if ( depth < maxDepth ) {
										return;
									}

									returned = handler.apply( that, args );

									// Support: Promises/A+ section 2.3.1
									// https://promisesaplus.com/#point-48
									if ( returned === deferred.promise() ) {
										throw new TypeError( "Thenable self-resolution" );
									}

									// Support: Promises/A+ sections 2.3.3.1, 3.5
									// https://promisesaplus.com/#point-54
									// https://promisesaplus.com/#point-75
									// Retrieve `then` only once
									then = returned &&

										// Support: Promises/A+ section 2.3.4
										// https://promisesaplus.com/#point-64
										// Only check objects and functions for thenability
										( typeof returned === "object" ||
											typeof returned === "function" ) &&
										returned.then;

									// Handle a returned thenable
									if ( isFunction( then ) ) {

										// Special processors (notify) just wait for resolution
										if ( special ) {
											then.call(
												returned,
												resolve( maxDepth, deferred, Identity, special ),
												resolve( maxDepth, deferred, Thrower, special )
											);

										// Normal processors (resolve) also hook into progress
										} else {

											// ...and disregard older resolution values
											maxDepth++;

											then.call(
												returned,
												resolve( maxDepth, deferred, Identity, special ),
												resolve( maxDepth, deferred, Thrower, special ),
												resolve( maxDepth, deferred, Identity,
													deferred.notifyWith )
											);
										}

									// Handle all other returned values
									} else {

										// Only substitute handlers pass on context
										// and multiple values (non-spec behavior)
										if ( handler !== Identity ) {
											that = undefined;
											args = [ returned ];
										}

										// Process the value(s)
										// Default process is resolve
										( special || deferred.resolveWith )( that, args );
									}
								},

								// Only normal processors (resolve) catch and reject exceptions
								process = special ?
									mightThrow :
									function() {
										try {
											mightThrow();
										} catch ( e ) {

											if ( jQuery.Deferred.exceptionHook ) {
												jQuery.Deferred.exceptionHook( e,
													process.stackTrace );
											}

											// Support: Promises/A+ section 2.3.3.3.4.1
											// https://promisesaplus.com/#point-61
											// Ignore post-resolution exceptions
											if ( depth + 1 >= maxDepth ) {

												// Only substitute handlers pass on context
												// and multiple values (non-spec behavior)
												if ( handler !== Thrower ) {
													that = undefined;
													args = [ e ];
												}

												deferred.rejectWith( that, args );
											}
										}
									};

							// Support: Promises/A+ section 2.3.3.3.1
							// https://promisesaplus.com/#point-57
							// Re-resolve promises immediately to dodge false rejection from
							// subsequent errors
							if ( depth ) {
								process();
							} else {

								// Call an optional hook to record the stack, in case of exception
								// since it's otherwise lost when execution goes async
								if ( jQuery.Deferred.getStackHook ) {
									process.stackTrace = jQuery.Deferred.getStackHook();
								}
								window.setTimeout( process );
							}
						};
					}

					return jQuery.Deferred( function( newDefer ) {

						// progress_handlers.add( ... )
						tuples[ 0 ][ 3 ].add(
							resolve(
								0,
								newDefer,
								isFunction( onProgress ) ?
									onProgress :
									Identity,
								newDefer.notifyWith
							)
						);

						// fulfilled_handlers.add( ... )
						tuples[ 1 ][ 3 ].add(
							resolve(
								0,
								newDefer,
								isFunction( onFulfilled ) ?
									onFulfilled :
									Identity
							)
						);

						// rejected_handlers.add( ... )
						tuples[ 2 ][ 3 ].add(
							resolve(
								0,
								newDefer,
								isFunction( onRejected ) ?
									onRejected :
									Thrower
							)
						);
					} ).promise();
				},

				// Get a promise for this deferred
				// If obj is provided, the promise aspect is added to the object
				promise: function( obj ) {
					return obj != null ? jQuery.extend( obj, promise ) : promise;
				}
			},
			deferred = {};

		// Add list-specific methods
		jQuery.each( tuples, function( i, tuple ) {
			var list = tuple[ 2 ],
				stateString = tuple[ 5 ];

			// promise.progress = list.add
			// promise.done = list.add
			// promise.fail = list.add
			promise[ tuple[ 1 ] ] = list.add;

			// Handle state
			if ( stateString ) {
				list.add(
					function() {

						// state = "resolved" (i.e., fulfilled)
						// state = "rejected"
						state = stateString;
					},

					// rejected_callbacks.disable
					// fulfilled_callbacks.disable
					tuples[ 3 - i ][ 2 ].disable,

					// rejected_handlers.disable
					// fulfilled_handlers.disable
					tuples[ 3 - i ][ 3 ].disable,

					// progress_callbacks.lock
					tuples[ 0 ][ 2 ].lock,

					// progress_handlers.lock
					tuples[ 0 ][ 3 ].lock
				);
			}

			// progress_handlers.fire
			// fulfilled_handlers.fire
			// rejected_handlers.fire
			list.add( tuple[ 3 ].fire );

			// deferred.notify = function() { deferred.notifyWith(...) }
			// deferred.resolve = function() { deferred.resolveWith(...) }
			// deferred.reject = function() { deferred.rejectWith(...) }
			deferred[ tuple[ 0 ] ] = function() {
				deferred[ tuple[ 0 ] + "With" ]( this === deferred ? undefined : this, arguments );
				return this;
			};

			// deferred.notifyWith = list.fireWith
			// deferred.resolveWith = list.fireWith
			// deferred.rejectWith = list.fireWith
			deferred[ tuple[ 0 ] + "With" ] = list.fireWith;
		} );

		// Make the deferred a promise
		promise.promise( deferred );

		// Call given func if any
		if ( func ) {
			func.call( deferred, deferred );
		}

		// All done!
		return deferred;
	},

	// Deferred helper
	when: function( singleValue ) {
		var

			// count of uncompleted subordinates
			remaining = arguments.length,

			// count of unprocessed arguments
			i = remaining,

			// subordinate fulfillment data
			resolveContexts = Array( i ),
			resolveValues = slice.call( arguments ),

			// the master Deferred
			master = jQuery.Deferred(),

			// subordinate callback factory
			updateFunc = function( i ) {
				return function( value ) {
					resolveContexts[ i ] = this;
					resolveValues[ i ] = arguments.length > 1 ? slice.call( arguments ) : value;
					if ( !( --remaining ) ) {
						master.resolveWith( resolveContexts, resolveValues );
					}
				};
			};

		// Single- and empty arguments are adopted like Promise.resolve
		if ( remaining <= 1 ) {
			adoptValue( singleValue, master.done( updateFunc( i ) ).resolve, master.reject,
				!remaining );

			// Use .then() to unwrap secondary thenables (cf. gh-3000)
			if ( master.state() === "pending" ||
				isFunction( resolveValues[ i ] && resolveValues[ i ].then ) ) {

				return master.then();
			}
		}

		// Multiple arguments are aggregated like Promise.all array elements
		while ( i-- ) {
			adoptValue( resolveValues[ i ], updateFunc( i ), master.reject );
		}

		return master.promise();
	}
} );


// These usually indicate a programmer mistake during development,
// warn about them ASAP rather than swallowing them by default.
var rerrorNames = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;

jQuery.Deferred.exceptionHook = function( error, stack ) {

	// Support: IE 8 - 9 only
	// Console exists when dev tools are open, which can happen at any time
	if ( window.console && window.console.warn && error && rerrorNames.test( error.name ) ) {
		window.console.warn( "jQuery.Deferred exception: " + error.message, error.stack, stack );
	}
};




jQuery.readyException = function( error ) {
	window.setTimeout( function() {
		throw error;
	} );
};




// The deferred used on DOM ready
var readyList = jQuery.Deferred();

jQuery.fn.ready = function( fn ) {

	readyList
		.then( fn )

		// Wrap jQuery.readyException in a function so that the lookup
		// happens at the time of error handling instead of callback
		// registration.
		.catch( function( error ) {
			jQuery.readyException( error );
		} );

	return this;
};

jQuery.extend( {

	// Is the DOM ready to be used? Set to true once it occurs.
	isReady: false,

	// A counter to track how many items to wait for before
	// the ready event fires. See #6781
	readyWait: 1,

	// Handle when the DOM is ready
	ready: function( wait ) {

		// Abort if there are pending holds or we're already ready
		if ( wait === true ? --jQuery.readyWait : jQuery.isReady ) {
			return;
		}

		// Remember that the DOM is ready
		jQuery.isReady = true;

		// If a normal DOM Ready event fired, decrement, and wait if need be
		if ( wait !== true && --jQuery.readyWait > 0 ) {
			return;
		}

		// If there are functions bound, to execute
		readyList.resolveWith( document, [ jQuery ] );
	}
} );

jQuery.ready.then = readyList.then;

// The ready event handler and self cleanup method
function completed() {
	document.removeEventListener( "DOMContentLoaded", completed );
	window.removeEventListener( "load", completed );
	jQuery.ready();
}

// Catch cases where $(document).ready() is called
// after the browser event has already occurred.
// Support: IE <=9 - 10 only
// Older IE sometimes signals "interactive" too soon
if ( document.readyState === "complete" ||
	( document.readyState !== "loading" && !document.documentElement.doScroll ) ) {

	// Handle it asynchronously to allow scripts the opportunity to delay ready
	window.setTimeout( jQuery.ready );

} else {

	// Use the handy event callback
	document.addEventListener( "DOMContentLoaded", completed );

	// A fallback to window.onload, that will always work
	window.addEventListener( "load", completed );
}




// Multifunctional method to get and set values of a collection
// The value/s can optionally be executed if it's a function
var access = function( elems, fn, key, value, chainable, emptyGet, raw ) {
	var i = 0,
		len = elems.length,
		bulk = key == null;

	// Sets many values
	if ( toType( key ) === "object" ) {
		chainable = true;
		for ( i in key ) {
			access( elems, fn, i, key[ i ], true, emptyGet, raw );
		}

	// Sets one value
	} else if ( value !== undefined ) {
		chainable = true;

		if ( !isFunction( value ) ) {
			raw = true;
		}

		if ( bulk ) {

			// Bulk operations run against the entire set
			if ( raw ) {
				fn.call( elems, value );
				fn = null;

			// ...except when executing function values
			} else {
				bulk = fn;
				fn = function( elem, _key, value ) {
					return bulk.call( jQuery( elem ), value );
				};
			}
		}

		if ( fn ) {
			for ( ; i < len; i++ ) {
				fn(
					elems[ i ], key, raw ?
					value :
					value.call( elems[ i ], i, fn( elems[ i ], key ) )
				);
			}
		}
	}

	if ( chainable ) {
		return elems;
	}

	// Gets
	if ( bulk ) {
		return fn.call( elems );
	}

	return len ? fn( elems[ 0 ], key ) : emptyGet;
};


// Matches dashed string for camelizing
var rmsPrefix = /^-ms-/,
	rdashAlpha = /-([a-z])/g;

// Used by camelCase as callback to replace()
function fcamelCase( _all, letter ) {
	return letter.toUpperCase();
}

// Convert dashed to camelCase; used by the css and data modules
// Support: IE <=9 - 11, Edge 12 - 15
// Microsoft forgot to hump their vendor prefix (#9572)
function camelCase( string ) {
	return string.replace( rmsPrefix, "ms-" ).replace( rdashAlpha, fcamelCase );
}
var acceptData = function( owner ) {

	// Accepts only:
	//  - Node
	//    - Node.ELEMENT_NODE
	//    - Node.DOCUMENT_NODE
	//  - Object
	//    - Any
	return owner.nodeType === 1 || owner.nodeType === 9 || !( +owner.nodeType );
};




function Data() {
	this.expando = jQuery.expando + Data.uid++;
}

Data.uid = 1;

Data.prototype = {

	cache: function( owner ) {

		// Check if the owner object already has a cache
		var value = owner[ this.expando ];

		// If not, create one
		if ( !value ) {
			value = {};

			// We can accept data for non-element nodes in modern browsers,
			// but we should not, see #8335.
			// Always return an empty object.
			if ( acceptData( owner ) ) {

				// If it is a node unlikely to be stringify-ed or looped over
				// use plain assignment
				if ( owner.nodeType ) {
					owner[ this.expando ] = value;

				// Otherwise secure it in a non-enumerable property
				// configurable must be true to allow the property to be
				// deleted when data is removed
				} else {
					Object.defineProperty( owner, this.expando, {
						value: value,
						configurable: true
					} );
				}
			}
		}

		return value;
	},
	set: function( owner, data, value ) {
		var prop,
			cache = this.cache( owner );

		// Handle: [ owner, key, value ] args
		// Always use camelCase key (gh-2257)
		if ( typeof data === "string" ) {
			cache[ camelCase( data ) ] = value;

		// Handle: [ owner, { properties } ] args
		} else {

			// Copy the properties one-by-one to the cache object
			for ( prop in data ) {
				cache[ camelCase( prop ) ] = data[ prop ];
			}
		}
		return cache;
	},
	get: function( owner, key ) {
		return key === undefined ?
			this.cache( owner ) :

			// Always use camelCase key (gh-2257)
			owner[ this.expando ] && owner[ this.expando ][ camelCase( key ) ];
	},
	access: function( owner, key, value ) {

		// In cases where either:
		//
		//   1. No key was specified
		//   2. A string key was specified, but no value provided
		//
		// Take the "read" path and allow the get method to determine
		// which value to return, respectively either:
		//
		//   1. The entire cache object
		//   2. The data stored at the key
		//
		if ( key === undefined ||
				( ( key && typeof key === "string" ) && value === undefined ) ) {

			return this.get( owner, key );
		}

		// When the key is not a string, or both a key and value
		// are specified, set or extend (existing objects) with either:
		//
		//   1. An object of properties
		//   2. A key and value
		//
		this.set( owner, key, value );

		// Since the "set" path can have two possible entry points
		// return the expected data based on which path was taken[*]
		return value !== undefined ? value : key;
	},
	remove: function( owner, key ) {
		var i,
			cache = owner[ this.expando ];

		if ( cache === undefined ) {
			return;
		}

		if ( key !== undefined ) {

			// Support array or space separated string of keys
			if ( Array.isArray( key ) ) {

				// If key is an array of keys...
				// We always set camelCase keys, so remove that.
				key = key.map( camelCase );
			} else {
				key = camelCase( key );

				// If a key with the spaces exists, use it.
				// Otherwise, create an array by matching non-whitespace
				key = key in cache ?
					[ key ] :
					( key.match( rnothtmlwhite ) || [] );
			}

			i = key.length;

			while ( i-- ) {
				delete cache[ key[ i ] ];
			}
		}

		// Remove the expando if there's no more data
		if ( key === undefined || jQuery.isEmptyObject( cache ) ) {

			// Support: Chrome <=35 - 45
			// Webkit & Blink performance suffers when deleting properties
			// from DOM nodes, so set to undefined instead
			// https://bugs.chromium.org/p/chromium/issues/detail?id=378607 (bug restricted)
			if ( owner.nodeType ) {
				owner[ this.expando ] = undefined;
			} else {
				delete owner[ this.expando ];
			}
		}
	},
	hasData: function( owner ) {
		var cache = owner[ this.expando ];
		return cache !== undefined && !jQuery.isEmptyObject( cache );
	}
};
var dataPriv = new Data();

var dataUser = new Data();



//	Implementation Summary
//
//	1. Enforce API surface and semantic compatibility with 1.9.x branch
//	2. Improve the module's maintainability by reducing the storage
//		paths to a single mechanism.
//	3. Use the same single mechanism to support "private" and "user" data.
//	4. _Never_ expose "private" data to user code (TODO: Drop _data, _removeData)
//	5. Avoid exposing implementation details on user objects (eg. expando properties)
//	6. Provide a clear path for implementation upgrade to WeakMap in 2014

var rbrace = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
	rmultiDash = /[A-Z]/g;

function getData( data ) {
	if ( data === "true" ) {
		return true;
	}

	if ( data === "false" ) {
		return false;
	}

	if ( data === "null" ) {
		return null;
	}

	// Only convert to a number if it doesn't change the string
	if ( data === +data + "" ) {
		return +data;
	}

	if ( rbrace.test( data ) ) {
		return JSON.parse( data );
	}

	return data;
}

function dataAttr( elem, key, data ) {
	var name;

	// If nothing was found internally, try to fetch any
	// data from the HTML5 data-* attribute
	if ( data === undefined && elem.nodeType === 1 ) {
		name = "data-" + key.replace( rmultiDash, "-$&" ).toLowerCase();
		data = elem.getAttribute( name );

		if ( typeof data === "string" ) {
			try {
				data = getData( data );
			} catch ( e ) {}

			// Make sure we set the data so it isn't changed later
			dataUser.set( elem, key, data );
		} else {
			data = undefined;
		}
	}
	return data;
}

jQuery.extend( {
	hasData: function( elem ) {
		return dataUser.hasData( elem ) || dataPriv.hasData( elem );
	},

	data: function( elem, name, data ) {
		return dataUser.access( elem, name, data );
	},

	removeData: function( elem, name ) {
		dataUser.remove( elem, name );
	},

	// TODO: Now that all calls to _data and _removeData have been replaced
	// with direct calls to dataPriv methods, these can be deprecated.
	_data: function( elem, name, data ) {
		return dataPriv.access( elem, name, data );
	},

	_removeData: function( elem, name ) {
		dataPriv.remove( elem, name );
	}
} );

jQuery.fn.extend( {
	data: function( key, value ) {
		var i, name, data,
			elem = this[ 0 ],
			attrs = elem && elem.attributes;

		// Gets all values
		if ( key === undefined ) {
			if ( this.length ) {
				data = dataUser.get( elem );

				if ( elem.nodeType === 1 && !dataPriv.get( elem, "hasDataAttrs" ) ) {
					i = attrs.length;
					while ( i-- ) {

						// Support: IE 11 only
						// The attrs elements can be null (#14894)
						if ( attrs[ i ] ) {
							name = attrs[ i ].name;
							if ( name.indexOf( "data-" ) === 0 ) {
								name = camelCase( name.slice( 5 ) );
								dataAttr( elem, name, data[ name ] );
							}
						}
					}
					dataPriv.set( elem, "hasDataAttrs", true );
				}
			}

			return data;
		}

		// Sets multiple values
		if ( typeof key === "object" ) {
			return this.each( function() {
				dataUser.set( this, key );
			} );
		}

		return access( this, function( value ) {
			var data;

			// The calling jQuery object (element matches) is not empty
			// (and therefore has an element appears at this[ 0 ]) and the
			// `value` parameter was not undefined. An empty jQuery object
			// will result in `undefined` for elem = this[ 0 ] which will
			// throw an exception if an attempt to read a data cache is made.
			if ( elem && value === undefined ) {

				// Attempt to get data from the cache
				// The key will always be camelCased in Data
				data = dataUser.get( elem, key );
				if ( data !== undefined ) {
					return data;
				}

				// Attempt to "discover" the data in
				// HTML5 custom data-* attrs
				data = dataAttr( elem, key );
				if ( data !== undefined ) {
					return data;
				}

				// We tried really hard, but the data doesn't exist.
				return;
			}

			// Set the data...
			this.each( function() {

				// We always store the camelCased key
				dataUser.set( this, key, value );
			} );
		}, null, value, arguments.length > 1, null, true );
	},

	removeData: function( key ) {
		return this.each( function() {
			dataUser.remove( this, key );
		} );
	}
} );


jQuery.extend( {
	queue: function( elem, type, data ) {
		var queue;

		if ( elem ) {
			type = ( type || "fx" ) + "queue";
			queue = dataPriv.get( elem, type );

			// Speed up dequeue by getting out quickly if this is just a lookup
			if ( data ) {
				if ( !queue || Array.isArray( data ) ) {
					queue = dataPriv.access( elem, type, jQuery.makeArray( data ) );
				} else {
					queue.push( data );
				}
			}
			return queue || [];
		}
	},

	dequeue: function( elem, type ) {
		type = type || "fx";

		var queue = jQuery.queue( elem, type ),
			startLength = queue.length,
			fn = queue.shift(),
			hooks = jQuery._queueHooks( elem, type ),
			next = function() {
				jQuery.dequeue( elem, type );
			};

		// If the fx queue is dequeued, always remove the progress sentinel
		if ( fn === "inprogress" ) {
			fn = queue.shift();
			startLength--;
		}

		if ( fn ) {

			// Add a progress sentinel to prevent the fx queue from being
			// automatically dequeued
			if ( type === "fx" ) {
				queue.unshift( "inprogress" );
			}

			// Clear up the last queue stop function
			delete hooks.stop;
			fn.call( elem, next, hooks );
		}

		if ( !startLength && hooks ) {
			hooks.empty.fire();
		}
	},

	// Not public - generate a queueHooks object, or return the current one
	_queueHooks: function( elem, type ) {
		var key = type + "queueHooks";
		return dataPriv.get( elem, key ) || dataPriv.access( elem, key, {
			empty: jQuery.Callbacks( "once memory" ).add( function() {
				dataPriv.remove( elem, [ type + "queue", key ] );
			} )
		} );
	}
} );

jQuery.fn.extend( {
	queue: function( type, data ) {
		var setter = 2;

		if ( typeof type !== "string" ) {
			data = type;
			type = "fx";
			setter--;
		}

		if ( arguments.length < setter ) {
			return jQuery.queue( this[ 0 ], type );
		}

		return data === undefined ?
			this :
			this.each( function() {
				var queue = jQuery.queue( this, type, data );

				// Ensure a hooks for this queue
				jQuery._queueHooks( this, type );

				if ( type === "fx" && queue[ 0 ] !== "inprogress" ) {
					jQuery.dequeue( this, type );
				}
			} );
	},
	dequeue: function( type ) {
		return this.each( function() {
			jQuery.dequeue( this, type );
		} );
	},
	clearQueue: function( type ) {
		return this.queue( type || "fx", [] );
	},

	// Get a promise resolved when queues of a certain type
	// are emptied (fx is the type by default)
	promise: function( type, obj ) {
		var tmp,
			count = 1,
			defer = jQuery.Deferred(),
			elements = this,
			i = this.length,
			resolve = function() {
				if ( !( --count ) ) {
					defer.resolveWith( elements, [ elements ] );
				}
			};

		if ( typeof type !== "string" ) {
			obj = type;
			type = undefined;
		}
		type = type || "fx";

		while ( i-- ) {
			tmp = dataPriv.get( elements[ i ], type + "queueHooks" );
			if ( tmp && tmp.empty ) {
				count++;
				tmp.empty.add( resolve );
			}
		}
		resolve();
		return defer.promise( obj );
	}
} );
var pnum = ( /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/ ).source;

var rcssNum = new RegExp( "^(?:([+-])=|)(" + pnum + ")([a-z%]*)$", "i" );


var cssExpand = [ "Top", "Right", "Bottom", "Left" ];

var documentElement = document.documentElement;



	var isAttached = function( elem ) {
			return jQuery.contains( elem.ownerDocument, elem );
		},
		composed = { composed: true };

	// Support: IE 9 - 11+, Edge 12 - 18+, iOS 10.0 - 10.2 only
	// Check attachment across shadow DOM boundaries when possible (gh-3504)
	// Support: iOS 10.0-10.2 only
	// Early iOS 10 versions support `attachShadow` but not `getRootNode`,
	// leading to errors. We need to check for `getRootNode`.
	if ( documentElement.getRootNode ) {
		isAttached = function( elem ) {
			return jQuery.contains( elem.ownerDocument, elem ) ||
				elem.getRootNode( composed ) === elem.ownerDocument;
		};
	}
var isHiddenWithinTree = function( elem, el ) {

		// isHiddenWithinTree might be called from jQuery#filter function;
		// in that case, element will be second argument
		elem = el || elem;

		// Inline style trumps all
		return elem.style.display === "none" ||
			elem.style.display === "" &&

			// Otherwise, check computed style
			// Support: Firefox <=43 - 45
			// Disconnected elements can have computed display: none, so first confirm that elem is
			// in the document.
			isAttached( elem ) &&

			jQuery.css( elem, "display" ) === "none";
	};



function adjustCSS( elem, prop, valueParts, tween ) {
	var adjusted, scale,
		maxIterations = 20,
		currentValue = tween ?
			function() {
				return tween.cur();
			} :
			function() {
				return jQuery.css( elem, prop, "" );
			},
		initial = currentValue(),
		unit = valueParts && valueParts[ 3 ] || ( jQuery.cssNumber[ prop ] ? "" : "px" ),

		// Starting value computation is required for potential unit mismatches
		initialInUnit = elem.nodeType &&
			( jQuery.cssNumber[ prop ] || unit !== "px" && +initial ) &&
			rcssNum.exec( jQuery.css( elem, prop ) );

	if ( initialInUnit && initialInUnit[ 3 ] !== unit ) {

		// Support: Firefox <=54
		// Halve the iteration target value to prevent interference from CSS upper bounds (gh-2144)
		initial = initial / 2;

		// Trust units reported by jQuery.css
		unit = unit || initialInUnit[ 3 ];

		// Iteratively approximate from a nonzero starting point
		initialInUnit = +initial || 1;

		while ( maxIterations-- ) {

			// Evaluate and update our best guess (doubling guesses that zero out).
			// Finish if the scale equals or crosses 1 (making the old*new product non-positive).
			jQuery.style( elem, prop, initialInUnit + unit );
			if ( ( 1 - scale ) * ( 1 - ( scale = currentValue() / initial || 0.5 ) ) <= 0 ) {
				maxIterations = 0;
			}
			initialInUnit = initialInUnit / scale;

		}

		initialInUnit = initialInUnit * 2;
		jQuery.style( elem, prop, initialInUnit + unit );

		// Make sure we update the tween properties later on
		valueParts = valueParts || [];
	}

	if ( valueParts ) {
		initialInUnit = +initialInUnit || +initial || 0;

		// Apply relative offset (+=/-=) if specified
		adjusted = valueParts[ 1 ] ?
			initialInUnit + ( valueParts[ 1 ] + 1 ) * valueParts[ 2 ] :
			+valueParts[ 2 ];
		if ( tween ) {
			tween.unit = unit;
			tween.start = initialInUnit;
			tween.end = adjusted;
		}
	}
	return adjusted;
}


var defaultDisplayMap = {};

function getDefaultDisplay( elem ) {
	var temp,
		doc = elem.ownerDocument,
		nodeName = elem.nodeName,
		display = defaultDisplayMap[ nodeName ];

	if ( display ) {
		return display;
	}

	temp = doc.body.appendChild( doc.createElement( nodeName ) );
	display = jQuery.css( temp, "display" );

	temp.parentNode.removeChild( temp );

	if ( display === "none" ) {
		display = "block";
	}
	defaultDisplayMap[ nodeName ] = display;

	return display;
}

function showHide( elements, show ) {
	var display, elem,
		values = [],
		index = 0,
		length = elements.length;

	// Determine new display value for elements that need to change
	for ( ; index < length; index++ ) {
		elem = elements[ index ];
		if ( !elem.style ) {
			continue;
		}

		display = elem.style.display;
		if ( show ) {

			// Since we force visibility upon cascade-hidden elements, an immediate (and slow)
			// check is required in this first loop unless we have a nonempty display value (either
			// inline or about-to-be-restored)
			if ( display === "none" ) {
				values[ index ] = dataPriv.get( elem, "display" ) || null;
				if ( !values[ index ] ) {
					elem.style.display = "";
				}
			}
			if ( elem.style.display === "" && isHiddenWithinTree( elem ) ) {
				values[ index ] = getDefaultDisplay( elem );
			}
		} else {
			if ( display !== "none" ) {
				values[ index ] = "none";

				// Remember what we're overwriting
				dataPriv.set( elem, "display", display );
			}
		}
	}

	// Set the display of the elements in a second loop to avoid constant reflow
	for ( index = 0; index < length; index++ ) {
		if ( values[ index ] != null ) {
			elements[ index ].style.display = values[ index ];
		}
	}

	return elements;
}

jQuery.fn.extend( {
	show: function() {
		return showHide( this, true );
	},
	hide: function() {
		return showHide( this );
	},
	toggle: function( state ) {
		if ( typeof state === "boolean" ) {
			return state ? this.show() : this.hide();
		}

		return this.each( function() {
			if ( isHiddenWithinTree( this ) ) {
				jQuery( this ).show();
			} else {
				jQuery( this ).hide();
			}
		} );
	}
} );
var rcheckableType = ( /^(?:checkbox|radio)$/i );

var rtagName = ( /<([a-z][^\/\0>\x20\t\r\n\f]*)/i );

var rscriptType = ( /^$|^module$|\/(?:java|ecma)script/i );



( function() {
	var fragment = document.createDocumentFragment(),
		div = fragment.appendChild( document.createElement( "div" ) ),
		input = document.createElement( "input" );

	// Support: Android 4.0 - 4.3 only
	// Check state lost if the name is set (#11217)
	// Support: Windows Web Apps (WWA)
	// `name` and `type` must use .setAttribute for WWA (#14901)
	input.setAttribute( "type", "radio" );
	input.setAttribute( "checked", "checked" );
	input.setAttribute( "name", "t" );

	div.appendChild( input );

	// Support: Android <=4.1 only
	// Older WebKit doesn't clone checked state correctly in fragments
	support.checkClone = div.cloneNode( true ).cloneNode( true ).lastChild.checked;

	// Support: IE <=11 only
	// Make sure textarea (and checkbox) defaultValue is properly cloned
	div.innerHTML = "<textarea>x</textarea>";
	support.noCloneChecked = !!div.cloneNode( true ).lastChild.defaultValue;

	// Support: IE <=9 only
	// IE <=9 replaces <option> tags with their contents when inserted outside of
	// the select element.
	div.innerHTML = "<option></option>";
	support.option = !!div.lastChild;
} )();


// We have to close these tags to support XHTML (#13200)
var wrapMap = {

	// XHTML parsers do not magically insert elements in the
	// same way that tag soup parsers do. So we cannot shorten
	// this by omitting <tbody> or other required elements.
	thead: [ 1, "<table>", "</table>" ],
	col: [ 2, "<table><colgroup>", "</colgroup></table>" ],
	tr: [ 2, "<table><tbody>", "</tbody></table>" ],
	td: [ 3, "<table><tbody><tr>", "</tr></tbody></table>" ],

	_default: [ 0, "", "" ]
};

wrapMap.tbody = wrapMap.tfoot = wrapMap.colgroup = wrapMap.caption = wrapMap.thead;
wrapMap.th = wrapMap.td;

// Support: IE <=9 only
if ( !support.option ) {
	wrapMap.optgroup = wrapMap.option = [ 1, "<select multiple='multiple'>", "</select>" ];
}


function getAll( context, tag ) {

	// Support: IE <=9 - 11 only
	// Use typeof to avoid zero-argument method invocation on host objects (#15151)
	var ret;

	if ( typeof context.getElementsByTagName !== "undefined" ) {
		ret = context.getElementsByTagName( tag || "*" );

	} else if ( typeof context.querySelectorAll !== "undefined" ) {
		ret = context.querySelectorAll( tag || "*" );

	} else {
		ret = [];
	}

	if ( tag === undefined || tag && nodeName( context, tag ) ) {
		return jQuery.merge( [ context ], ret );
	}

	return ret;
}


// Mark scripts as having already been evaluated
function setGlobalEval( elems, refElements ) {
	var i = 0,
		l = elems.length;

	for ( ; i < l; i++ ) {
		dataPriv.set(
			elems[ i ],
			"globalEval",
			!refElements || dataPriv.get( refElements[ i ], "globalEval" )
		);
	}
}


var rhtml = /<|&#?\w+;/;

function buildFragment( elems, context, scripts, selection, ignored ) {
	var elem, tmp, tag, wrap, attached, j,
		fragment = context.createDocumentFragment(),
		nodes = [],
		i = 0,
		l = elems.length;

	for ( ; i < l; i++ ) {
		elem = elems[ i ];

		if ( elem || elem === 0 ) {

			// Add nodes directly
			if ( toType( elem ) === "object" ) {

				// Support: Android <=4.0 only, PhantomJS 1 only
				// push.apply(_, arraylike) throws on ancient WebKit
				jQuery.merge( nodes, elem.nodeType ? [ elem ] : elem );

			// Convert non-html into a text node
			} else if ( !rhtml.test( elem ) ) {
				nodes.push( context.createTextNode( elem ) );

			// Convert html into DOM nodes
			} else {
				tmp = tmp || fragment.appendChild( context.createElement( "div" ) );

				// Deserialize a standard representation
				tag = ( rtagName.exec( elem ) || [ "", "" ] )[ 1 ].toLowerCase();
				wrap = wrapMap[ tag ] || wrapMap._default;
				tmp.innerHTML = wrap[ 1 ] + jQuery.htmlPrefilter( elem ) + wrap[ 2 ];

				// Descend through wrappers to the right content
				j = wrap[ 0 ];
				while ( j-- ) {
					tmp = tmp.lastChild;
				}

				// Support: Android <=4.0 only, PhantomJS 1 only
				// push.apply(_, arraylike) throws on ancient WebKit
				jQuery.merge( nodes, tmp.childNodes );

				// Remember the top-level container
				tmp = fragment.firstChild;

				// Ensure the created nodes are orphaned (#12392)
				tmp.textContent = "";
			}
		}
	}

	// Remove wrapper from fragment
	fragment.textContent = "";

	i = 0;
	while ( ( elem = nodes[ i++ ] ) ) {

		// Skip elements already in the context collection (trac-4087)
		if ( selection && jQuery.inArray( elem, selection ) > -1 ) {
			if ( ignored ) {
				ignored.push( elem );
			}
			continue;
		}

		attached = isAttached( elem );

		// Append to fragment
		tmp = getAll( fragment.appendChild( elem ), "script" );

		// Preserve script evaluation history
		if ( attached ) {
			setGlobalEval( tmp );
		}

		// Capture executables
		if ( scripts ) {
			j = 0;
			while ( ( elem = tmp[ j++ ] ) ) {
				if ( rscriptType.test( elem.type || "" ) ) {
					scripts.push( elem );
				}
			}
		}
	}

	return fragment;
}


var
	rkeyEvent = /^key/,
	rmouseEvent = /^(?:mouse|pointer|contextmenu|drag|drop)|click/,
	rtypenamespace = /^([^.]*)(?:\.(.+)|)/;

function returnTrue() {
	return true;
}

function returnFalse() {
	return false;
}

// Support: IE <=9 - 11+
// focus() and blur() are asynchronous, except when they are no-op.
// So expect focus to be synchronous when the element is already active,
// and blur to be synchronous when the element is not already active.
// (focus and blur are always synchronous in other supported browsers,
// this just defines when we can count on it).
function expectSync( elem, type ) {
	return ( elem === safeActiveElement() ) === ( type === "focus" );
}

// Support: IE <=9 only
// Accessing document.activeElement can throw unexpectedly
// https://bugs.jquery.com/ticket/13393
function safeActiveElement() {
	try {
		return document.activeElement;
	} catch ( err ) { }
}

function on( elem, types, selector, data, fn, one ) {
	var origFn, type;

	// Types can be a map of types/handlers
	if ( typeof types === "object" ) {

		// ( types-Object, selector, data )
		if ( typeof selector !== "string" ) {

			// ( types-Object, data )
			data = data || selector;
			selector = undefined;
		}
		for ( type in types ) {
			on( elem, type, selector, data, types[ type ], one );
		}
		return elem;
	}

	if ( data == null && fn == null ) {

		// ( types, fn )
		fn = selector;
		data = selector = undefined;
	} else if ( fn == null ) {
		if ( typeof selector === "string" ) {

			// ( types, selector, fn )
			fn = data;
			data = undefined;
		} else {

			// ( types, data, fn )
			fn = data;
			data = selector;
			selector = undefined;
		}
	}
	if ( fn === false ) {
		fn = returnFalse;
	} else if ( !fn ) {
		return elem;
	}

	if ( one === 1 ) {
		origFn = fn;
		fn = function( event ) {

			// Can use an empty set, since event contains the info
			jQuery().off( event );
			return origFn.apply( this, arguments );
		};

		// Use same guid so caller can remove using origFn
		fn.guid = origFn.guid || ( origFn.guid = jQuery.guid++ );
	}
	return elem.each( function() {
		jQuery.event.add( this, types, fn, data, selector );
	} );
}

/*
 * Helper functions for managing events -- not part of the public interface.
 * Props to Dean Edwards' addEvent library for many of the ideas.
 */
jQuery.event = {

	global: {},

	add: function( elem, types, handler, data, selector ) {

		var handleObjIn, eventHandle, tmp,
			events, t, handleObj,
			special, handlers, type, namespaces, origType,
			elemData = dataPriv.get( elem );

		// Only attach events to objects that accept data
		if ( !acceptData( elem ) ) {
			return;
		}

		// Caller can pass in an object of custom data in lieu of the handler
		if ( handler.handler ) {
			handleObjIn = handler;
			handler = handleObjIn.handler;
			selector = handleObjIn.selector;
		}

		// Ensure that invalid selectors throw exceptions at attach time
		// Evaluate against documentElement in case elem is a non-element node (e.g., document)
		if ( selector ) {
			jQuery.find.matchesSelector( documentElement, selector );
		}

		// Make sure that the handler has a unique ID, used to find/remove it later
		if ( !handler.guid ) {
			handler.guid = jQuery.guid++;
		}

		// Init the element's event structure and main handler, if this is the first
		if ( !( events = elemData.events ) ) {
			events = elemData.events = Object.create( null );
		}
		if ( !( eventHandle = elemData.handle ) ) {
			eventHandle = elemData.handle = function( e ) {

				// Discard the second event of a jQuery.event.trigger() and
				// when an event is called after a page has unloaded
				return typeof jQuery !== "undefined" && jQuery.event.triggered !== e.type ?
					jQuery.event.dispatch.apply( elem, arguments ) : undefined;
			};
		}

		// Handle multiple events separated by a space
		types = ( types || "" ).match( rnothtmlwhite ) || [ "" ];
		t = types.length;
		while ( t-- ) {
			tmp = rtypenamespace.exec( types[ t ] ) || [];
			type = origType = tmp[ 1 ];
			namespaces = ( tmp[ 2 ] || "" ).split( "." ).sort();

			// There *must* be a type, no attaching namespace-only handlers
			if ( !type ) {
				continue;
			}

			// If event changes its type, use the special event handlers for the changed type
			special = jQuery.event.special[ type ] || {};

			// If selector defined, determine special event api type, otherwise given type
			type = ( selector ? special.delegateType : special.bindType ) || type;

			// Update special based on newly reset type
			special = jQuery.event.special[ type ] || {};

			// handleObj is passed to all event handlers
			handleObj = jQuery.extend( {
				type: type,
				origType: origType,
				data: data,
				handler: handler,
				guid: handler.guid,
				selector: selector,
				needsContext: selector && jQuery.expr.match.needsContext.test( selector ),
				namespace: namespaces.join( "." )
			}, handleObjIn );

			// Init the event handler queue if we're the first
			if ( !( handlers = events[ type ] ) ) {
				handlers = events[ type ] = [];
				handlers.delegateCount = 0;

				// Only use addEventListener if the special events handler returns false
				if ( !special.setup ||
					special.setup.call( elem, data, namespaces, eventHandle ) === false ) {

					if ( elem.addEventListener ) {
						elem.addEventListener( type, eventHandle );
					}
				}
			}

			if ( special.add ) {
				special.add.call( elem, handleObj );

				if ( !handleObj.handler.guid ) {
					handleObj.handler.guid = handler.guid;
				}
			}

			// Add to the element's handler list, delegates in front
			if ( selector ) {
				handlers.splice( handlers.delegateCount++, 0, handleObj );
			} else {
				handlers.push( handleObj );
			}

			// Keep track of which events have ever been used, for event optimization
			jQuery.event.global[ type ] = true;
		}

	},

	// Detach an event or set of events from an element
	remove: function( elem, types, handler, selector, mappedTypes ) {

		var j, origCount, tmp,
			events, t, handleObj,
			special, handlers, type, namespaces, origType,
			elemData = dataPriv.hasData( elem ) && dataPriv.get( elem );

		if ( !elemData || !( events = elemData.events ) ) {
			return;
		}

		// Once for each type.namespace in types; type may be omitted
		types = ( types || "" ).match( rnothtmlwhite ) || [ "" ];
		t = types.length;
		while ( t-- ) {
			tmp = rtypenamespace.exec( types[ t ] ) || [];
			type = origType = tmp[ 1 ];
			namespaces = ( tmp[ 2 ] || "" ).split( "." ).sort();

			// Unbind all events (on this namespace, if provided) for the element
			if ( !type ) {
				for ( type in events ) {
					jQuery.event.remove( elem, type + types[ t ], handler, selector, true );
				}
				continue;
			}

			special = jQuery.event.special[ type ] || {};
			type = ( selector ? special.delegateType : special.bindType ) || type;
			handlers = events[ type ] || [];
			tmp = tmp[ 2 ] &&
				new RegExp( "(^|\\.)" + namespaces.join( "\\.(?:.*\\.|)" ) + "(\\.|$)" );

			// Remove matching events
			origCount = j = handlers.length;
			while ( j-- ) {
				handleObj = handlers[ j ];

				if ( ( mappedTypes || origType === handleObj.origType ) &&
					( !handler || handler.guid === handleObj.guid ) &&
					( !tmp || tmp.test( handleObj.namespace ) ) &&
					( !selector || selector === handleObj.selector ||
						selector === "**" && handleObj.selector ) ) {
					handlers.splice( j, 1 );

					if ( handleObj.selector ) {
						handlers.delegateCount--;
					}
					if ( special.remove ) {
						special.remove.call( elem, handleObj );
					}
				}
			}

			// Remove generic event handler if we removed something and no more handlers exist
			// (avoids potential for endless recursion during removal of special event handlers)
			if ( origCount && !handlers.length ) {
				if ( !special.teardown ||
					special.teardown.call( elem, namespaces, elemData.handle ) === false ) {

					jQuery.removeEvent( elem, type, elemData.handle );
				}

				delete events[ type ];
			}
		}

		// Remove data and the expando if it's no longer used
		if ( jQuery.isEmptyObject( events ) ) {
			dataPriv.remove( elem, "handle events" );
		}
	},

	dispatch: function( nativeEvent ) {

		var i, j, ret, matched, handleObj, handlerQueue,
			args = new Array( arguments.length ),

			// Make a writable jQuery.Event from the native event object
			event = jQuery.event.fix( nativeEvent ),

			handlers = (
					dataPriv.get( this, "events" ) || Object.create( null )
				)[ event.type ] || [],
			special = jQuery.event.special[ event.type ] || {};

		// Use the fix-ed jQuery.Event rather than the (read-only) native event
		args[ 0 ] = event;

		for ( i = 1; i < arguments.length; i++ ) {
			args[ i ] = arguments[ i ];
		}

		event.delegateTarget = this;

		// Call the preDispatch hook for the mapped type, and let it bail if desired
		if ( special.preDispatch && special.preDispatch.call( this, event ) === false ) {
			return;
		}

		// Determine handlers
		handlerQueue = jQuery.event.handlers.call( this, event, handlers );

		// Run delegates first; they may want to stop propagation beneath us
		i = 0;
		while ( ( matched = handlerQueue[ i++ ] ) && !event.isPropagationStopped() ) {
			event.currentTarget = matched.elem;

			j = 0;
			while ( ( handleObj = matched.handlers[ j++ ] ) &&
				!event.isImmediatePropagationStopped() ) {

				// If the event is namespaced, then each handler is only invoked if it is
				// specially universal or its namespaces are a superset of the event's.
				if ( !event.rnamespace || handleObj.namespace === false ||
					event.rnamespace.test( handleObj.namespace ) ) {

					event.handleObj = handleObj;
					event.data = handleObj.data;

					ret = ( ( jQuery.event.special[ handleObj.origType ] || {} ).handle ||
						handleObj.handler ).apply( matched.elem, args );

					if ( ret !== undefined ) {
						if ( ( event.result = ret ) === false ) {
							event.preventDefault();
							event.stopPropagation();
						}
					}
				}
			}
		}

		// Call the postDispatch hook for the mapped type
		if ( special.postDispatch ) {
			special.postDispatch.call( this, event );
		}

		return event.result;
	},

	handlers: function( event, handlers ) {
		var i, handleObj, sel, matchedHandlers, matchedSelectors,
			handlerQueue = [],
			delegateCount = handlers.delegateCount,
			cur = event.target;

		// Find delegate handlers
		if ( delegateCount &&

			// Support: IE <=9
			// Black-hole SVG <use> instance trees (trac-13180)
			cur.nodeType &&

			// Support: Firefox <=42
			// Suppress spec-violating clicks indicating a non-primary pointer button (trac-3861)
			// https://www.w3.org/TR/DOM-Level-3-Events/#event-type-click
			// Support: IE 11 only
			// ...but not arrow key "clicks" of radio inputs, which can have `button` -1 (gh-2343)
			!( event.type === "click" && event.button >= 1 ) ) {

			for ( ; cur !== this; cur = cur.parentNode || this ) {

				// Don't check non-elements (#13208)
				// Don't process clicks on disabled elements (#6911, #8165, #11382, #11764)
				if ( cur.nodeType === 1 && !( event.type === "click" && cur.disabled === true ) ) {
					matchedHandlers = [];
					matchedSelectors = {};
					for ( i = 0; i < delegateCount; i++ ) {
						handleObj = handlers[ i ];

						// Don't conflict with Object.prototype properties (#13203)
						sel = handleObj.selector + " ";

						if ( matchedSelectors[ sel ] === undefined ) {
							matchedSelectors[ sel ] = handleObj.needsContext ?
								jQuery( sel, this ).index( cur ) > -1 :
								jQuery.find( sel, this, null, [ cur ] ).length;
						}
						if ( matchedSelectors[ sel ] ) {
							matchedHandlers.push( handleObj );
						}
					}
					if ( matchedHandlers.length ) {
						handlerQueue.push( { elem: cur, handlers: matchedHandlers } );
					}
				}
			}
		}

		// Add the remaining (directly-bound) handlers
		cur = this;
		if ( delegateCount < handlers.length ) {
			handlerQueue.push( { elem: cur, handlers: handlers.slice( delegateCount ) } );
		}

		return handlerQueue;
	},

	addProp: function( name, hook ) {
		Object.defineProperty( jQuery.Event.prototype, name, {
			enumerable: true,
			configurable: true,

			get: isFunction( hook ) ?
				function() {
					if ( this.originalEvent ) {
							return hook( this.originalEvent );
					}
				} :
				function() {
					if ( this.originalEvent ) {
							return this.originalEvent[ name ];
					}
				},

			set: function( value ) {
				Object.defineProperty( this, name, {
					enumerable: true,
					configurable: true,
					writable: true,
					value: value
				} );
			}
		} );
	},

	fix: function( originalEvent ) {
		return originalEvent[ jQuery.expando ] ?
			originalEvent :
			new jQuery.Event( originalEvent );
	},

	special: {
		load: {

			// Prevent triggered image.load events from bubbling to window.load
			noBubble: true
		},
		click: {

			// Utilize native event to ensure correct state for checkable inputs
			setup: function( data ) {

				// For mutual compressibility with _default, replace `this` access with a local var.
				// `|| data` is dead code meant only to preserve the variable through minification.
				var el = this || data;

				// Claim the first handler
				if ( rcheckableType.test( el.type ) &&
					el.click && nodeName( el, "input" ) ) {

					// dataPriv.set( el, "click", ... )
					leverageNative( el, "click", returnTrue );
				}

				// Return false to allow normal processing in the caller
				return false;
			},
			trigger: function( data ) {

				// For mutual compressibility with _default, replace `this` access with a local var.
				// `|| data` is dead code meant only to preserve the variable through minification.
				var el = this || data;

				// Force setup before triggering a click
				if ( rcheckableType.test( el.type ) &&
					el.click && nodeName( el, "input" ) ) {

					leverageNative( el, "click" );
				}

				// Return non-false to allow normal event-path propagation
				return true;
			},

			// For cross-browser consistency, suppress native .click() on links
			// Also prevent it if we're currently inside a leveraged native-event stack
			_default: function( event ) {
				var target = event.target;
				return rcheckableType.test( target.type ) &&
					target.click && nodeName( target, "input" ) &&
					dataPriv.get( target, "click" ) ||
					nodeName( target, "a" );
			}
		},

		beforeunload: {
			postDispatch: function( event ) {

				// Support: Firefox 20+
				// Firefox doesn't alert if the returnValue field is not set.
				if ( event.result !== undefined && event.originalEvent ) {
					event.originalEvent.returnValue = event.result;
				}
			}
		}
	}
};

// Ensure the presence of an event listener that handles manually-triggered
// synthetic events by interrupting progress until reinvoked in response to
// *native* events that it fires directly, ensuring that state changes have
// already occurred before other listeners are invoked.
function leverageNative( el, type, expectSync ) {

	// Missing expectSync indicates a trigger call, which must force setup through jQuery.event.add
	if ( !expectSync ) {
		if ( dataPriv.get( el, type ) === undefined ) {
			jQuery.event.add( el, type, returnTrue );
		}
		return;
	}

	// Register the controller as a special universal handler for all event namespaces
	dataPriv.set( el, type, false );
	jQuery.event.add( el, type, {
		namespace: false,
		handler: function( event ) {
			var notAsync, result,
				saved = dataPriv.get( this, type );

			if ( ( event.isTrigger & 1 ) && this[ type ] ) {

				// Interrupt processing of the outer synthetic .trigger()ed event
				// Saved data should be false in such cases, but might be a leftover capture object
				// from an async native handler (gh-4350)
				if ( !saved.length ) {

					// Store arguments for use when handling the inner native event
					// There will always be at least one argument (an event object), so this array
					// will not be confused with a leftover capture object.
					saved = slice.call( arguments );
					dataPriv.set( this, type, saved );

					// Trigger the native event and capture its result
					// Support: IE <=9 - 11+
					// focus() and blur() are asynchronous
					notAsync = expectSync( this, type );
					this[ type ]();
					result = dataPriv.get( this, type );
					if ( saved !== result || notAsync ) {
						dataPriv.set( this, type, false );
					} else {
						result = {};
					}
					if ( saved !== result ) {

						// Cancel the outer synthetic event
						event.stopImmediatePropagation();
						event.preventDefault();
						return result.value;
					}

				// If this is an inner synthetic event for an event with a bubbling surrogate
				// (focus or blur), assume that the surrogate already propagated from triggering the
				// native event and prevent that from happening again here.
				// This technically gets the ordering wrong w.r.t. to `.trigger()` (in which the
				// bubbling surrogate propagates *after* the non-bubbling base), but that seems
				// less bad than duplication.
				} else if ( ( jQuery.event.special[ type ] || {} ).delegateType ) {
					event.stopPropagation();
				}

			// If this is a native event triggered above, everything is now in order
			// Fire an inner synthetic event with the original arguments
			} else if ( saved.length ) {

				// ...and capture the result
				dataPriv.set( this, type, {
					value: jQuery.event.trigger(

						// Support: IE <=9 - 11+
						// Extend with the prototype to reset the above stopImmediatePropagation()
						jQuery.extend( saved[ 0 ], jQuery.Event.prototype ),
						saved.slice( 1 ),
						this
					)
				} );

				// Abort handling of the native event
				event.stopImmediatePropagation();
			}
		}
	} );
}

jQuery.removeEvent = function( elem, type, handle ) {

	// This "if" is needed for plain objects
	if ( elem.removeEventListener ) {
		elem.removeEventListener( type, handle );
	}
};

jQuery.Event = function( src, props ) {

	// Allow instantiation without the 'new' keyword
	if ( !( this instanceof jQuery.Event ) ) {
		return new jQuery.Event( src, props );
	}

	// Event object
	if ( src && src.type ) {
		this.originalEvent = src;
		this.type = src.type;

		// Events bubbling up the document may have been marked as prevented
		// by a handler lower down the tree; reflect the correct value.
		this.isDefaultPrevented = src.defaultPrevented ||
				src.defaultPrevented === undefined &&

				// Support: Android <=2.3 only
				src.returnValue === false ?
			returnTrue :
			returnFalse;

		// Create target properties
		// Support: Safari <=6 - 7 only
		// Target should not be a text node (#504, #13143)
		this.target = ( src.target && src.target.nodeType === 3 ) ?
			src.target.parentNode :
			src.target;

		this.currentTarget = src.currentTarget;
		this.relatedTarget = src.relatedTarget;

	// Event type
	} else {
		this.type = src;
	}

	// Put explicitly provided properties onto the event object
	if ( props ) {
		jQuery.extend( this, props );
	}

	// Create a timestamp if incoming event doesn't have one
	this.timeStamp = src && src.timeStamp || Date.now();

	// Mark it as fixed
	this[ jQuery.expando ] = true;
};

// jQuery.Event is based on DOM3 Events as specified by the ECMAScript Language Binding
// https://www.w3.org/TR/2003/WD-DOM-Level-3-Events-20030331/ecma-script-binding.html
jQuery.Event.prototype = {
	constructor: jQuery.Event,
	isDefaultPrevented: returnFalse,
	isPropagationStopped: returnFalse,
	isImmediatePropagationStopped: returnFalse,
	isSimulated: false,

	preventDefault: function() {
		var e = this.originalEvent;

		this.isDefaultPrevented = returnTrue;

		if ( e && !this.isSimulated ) {
			e.preventDefault();
		}
	},
	stopPropagation: function() {
		var e = this.originalEvent;

		this.isPropagationStopped = returnTrue;

		if ( e && !this.isSimulated ) {
			e.stopPropagation();
		}
	},
	stopImmediatePropagation: function() {
		var e = this.originalEvent;

		this.isImmediatePropagationStopped = returnTrue;

		if ( e && !this.isSimulated ) {
			e.stopImmediatePropagation();
		}

		this.stopPropagation();
	}
};

// Includes all common event props including KeyEvent and MouseEvent specific props
jQuery.each( {
	altKey: true,
	bubbles: true,
	cancelable: true,
	changedTouches: true,
	ctrlKey: true,
	detail: true,
	eventPhase: true,
	metaKey: true,
	pageX: true,
	pageY: true,
	shiftKey: true,
	view: true,
	"char": true,
	code: true,
	charCode: true,
	key: true,
	keyCode: true,
	button: true,
	buttons: true,
	clientX: true,
	clientY: true,
	offsetX: true,
	offsetY: true,
	pointerId: true,
	pointerType: true,
	screenX: true,
	screenY: true,
	targetTouches: true,
	toElement: true,
	touches: true,

	which: function( event ) {
		var button = event.button;

		// Add which for key events
		if ( event.which == null && rkeyEvent.test( event.type ) ) {
			return event.charCode != null ? event.charCode : event.keyCode;
		}

		// Add which for click: 1 === left; 2 === middle; 3 === right
		if ( !event.which && button !== undefined && rmouseEvent.test( event.type ) ) {
			if ( button & 1 ) {
				return 1;
			}

			if ( button & 2 ) {
				return 3;
			}

			if ( button & 4 ) {
				return 2;
			}

			return 0;
		}

		return event.which;
	}
}, jQuery.event.addProp );

jQuery.each( { focus: "focusin", blur: "focusout" }, function( type, delegateType ) {
	jQuery.event.special[ type ] = {

		// Utilize native event if possible so blur/focus sequence is correct
		setup: function() {

			// Claim the first handler
			// dataPriv.set( this, "focus", ... )
			// dataPriv.set( this, "blur", ... )
			leverageNative( this, type, expectSync );

			// Return false to allow normal processing in the caller
			return false;
		},
		trigger: function() {

			// Force setup before trigger
			leverageNative( this, type );

			// Return non-false to allow normal event-path propagation
			return true;
		},

		delegateType: delegateType
	};
} );

// Create mouseenter/leave events using mouseover/out and event-time checks
// so that event delegation works in jQuery.
// Do the same for pointerenter/pointerleave and pointerover/pointerout
//
// Support: Safari 7 only
// Safari sends mouseenter too often; see:
// https://bugs.chromium.org/p/chromium/issues/detail?id=470258
// for the description of the bug (it existed in older Chrome versions as well).
jQuery.each( {
	mouseenter: "mouseover",
	mouseleave: "mouseout",
	pointerenter: "pointerover",
	pointerleave: "pointerout"
}, function( orig, fix ) {
	jQuery.event.special[ orig ] = {
		delegateType: fix,
		bindType: fix,

		handle: function( event ) {
			var ret,
				target = this,
				related = event.relatedTarget,
				handleObj = event.handleObj;

			// For mouseenter/leave call the handler if related is outside the target.
			// NB: No relatedTarget if the mouse left/entered the browser window
			if ( !related || ( related !== target && !jQuery.contains( target, related ) ) ) {
				event.type = handleObj.origType;
				ret = handleObj.handler.apply( this, arguments );
				event.type = fix;
			}
			return ret;
		}
	};
} );

jQuery.fn.extend( {

	on: function( types, selector, data, fn ) {
		return on( this, types, selector, data, fn );
	},
	one: function( types, selector, data, fn ) {
		return on( this, types, selector, data, fn, 1 );
	},
	off: function( types, selector, fn ) {
		var handleObj, type;
		if ( types && types.preventDefault && types.handleObj ) {

			// ( event )  dispatched jQuery.Event
			handleObj = types.handleObj;
			jQuery( types.delegateTarget ).off(
				handleObj.namespace ?
					handleObj.origType + "." + handleObj.namespace :
					handleObj.origType,
				handleObj.selector,
				handleObj.handler
			);
			return this;
		}
		if ( typeof types === "object" ) {

			// ( types-object [, selector] )
			for ( type in types ) {
				this.off( type, selector, types[ type ] );
			}
			return this;
		}
		if ( selector === false || typeof selector === "function" ) {

			// ( types [, fn] )
			fn = selector;
			selector = undefined;
		}
		if ( fn === false ) {
			fn = returnFalse;
		}
		return this.each( function() {
			jQuery.event.remove( this, types, fn, selector );
		} );
	}
} );


var

	// Support: IE <=10 - 11, Edge 12 - 13 only
	// In IE/Edge using regex groups here causes severe slowdowns.
	// See https://connect.microsoft.com/IE/feedback/details/1736512/
	rnoInnerhtml = /<script|<style|<link/i,

	// checked="checked" or checked
	rchecked = /checked\s*(?:[^=]|=\s*.checked.)/i,
	rcleanScript = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;

// Prefer a tbody over its parent table for containing new rows
function manipulationTarget( elem, content ) {
	if ( nodeName( elem, "table" ) &&
		nodeName( content.nodeType !== 11 ? content : content.firstChild, "tr" ) ) {

		return jQuery( elem ).children( "tbody" )[ 0 ] || elem;
	}

	return elem;
}

// Replace/restore the type attribute of script elements for safe DOM manipulation
function disableScript( elem ) {
	elem.type = ( elem.getAttribute( "type" ) !== null ) + "/" + elem.type;
	return elem;
}
function restoreScript( elem ) {
	if ( ( elem.type || "" ).slice( 0, 5 ) === "true/" ) {
		elem.type = elem.type.slice( 5 );
	} else {
		elem.removeAttribute( "type" );
	}

	return elem;
}

function cloneCopyEvent( src, dest ) {
	var i, l, type, pdataOld, udataOld, udataCur, events;

	if ( dest.nodeType !== 1 ) {
		return;
	}

	// 1. Copy private data: events, handlers, etc.
	if ( dataPriv.hasData( src ) ) {
		pdataOld = dataPriv.get( src );
		events = pdataOld.events;

		if ( events ) {
			dataPriv.remove( dest, "handle events" );

			for ( type in events ) {
				for ( i = 0, l = events[ type ].length; i < l; i++ ) {
					jQuery.event.add( dest, type, events[ type ][ i ] );
				}
			}
		}
	}

	// 2. Copy user data
	if ( dataUser.hasData( src ) ) {
		udataOld = dataUser.access( src );
		udataCur = jQuery.extend( {}, udataOld );

		dataUser.set( dest, udataCur );
	}
}

// Fix IE bugs, see support tests
function fixInput( src, dest ) {
	var nodeName = dest.nodeName.toLowerCase();

	// Fails to persist the checked state of a cloned checkbox or radio button.
	if ( nodeName === "input" && rcheckableType.test( src.type ) ) {
		dest.checked = src.checked;

	// Fails to return the selected option to the default selected state when cloning options
	} else if ( nodeName === "input" || nodeName === "textarea" ) {
		dest.defaultValue = src.defaultValue;
	}
}

function domManip( collection, args, callback, ignored ) {

	// Flatten any nested arrays
	args = flat( args );

	var fragment, first, scripts, hasScripts, node, doc,
		i = 0,
		l = collection.length,
		iNoClone = l - 1,
		value = args[ 0 ],
		valueIsFunction = isFunction( value );

	// We can't cloneNode fragments that contain checked, in WebKit
	if ( valueIsFunction ||
			( l > 1 && typeof value === "string" &&
				!support.checkClone && rchecked.test( value ) ) ) {
		return collection.each( function( index ) {
			var self = collection.eq( index );
			if ( valueIsFunction ) {
				args[ 0 ] = value.call( this, index, self.html() );
			}
			domManip( self, args, callback, ignored );
		} );
	}

	if ( l ) {
		fragment = buildFragment( args, collection[ 0 ].ownerDocument, false, collection, ignored );
		first = fragment.firstChild;

		if ( fragment.childNodes.length === 1 ) {
			fragment = first;
		}

		// Require either new content or an interest in ignored elements to invoke the callback
		if ( first || ignored ) {
			scripts = jQuery.map( getAll( fragment, "script" ), disableScript );
			hasScripts = scripts.length;

			// Use the original fragment for the last item
			// instead of the first because it can end up
			// being emptied incorrectly in certain situations (#8070).
			for ( ; i < l; i++ ) {
				node = fragment;

				if ( i !== iNoClone ) {
					node = jQuery.clone( node, true, true );

					// Keep references to cloned scripts for later restoration
					if ( hasScripts ) {

						// Support: Android <=4.0 only, PhantomJS 1 only
						// push.apply(_, arraylike) throws on ancient WebKit
						jQuery.merge( scripts, getAll( node, "script" ) );
					}
				}

				callback.call( collection[ i ], node, i );
			}

			if ( hasScripts ) {
				doc = scripts[ scripts.length - 1 ].ownerDocument;

				// Reenable scripts
				jQuery.map( scripts, restoreScript );

				// Evaluate executable scripts on first document insertion
				for ( i = 0; i < hasScripts; i++ ) {
					node = scripts[ i ];
					if ( rscriptType.test( node.type || "" ) &&
						!dataPriv.access( node, "globalEval" ) &&
						jQuery.contains( doc, node ) ) {

						if ( node.src && ( node.type || "" ).toLowerCase()  !== "module" ) {

							// Optional AJAX dependency, but won't run scripts if not present
							if ( jQuery._evalUrl && !node.noModule ) {
								jQuery._evalUrl( node.src, {
									nonce: node.nonce || node.getAttribute( "nonce" )
								}, doc );
							}
						} else {
							DOMEval( node.textContent.replace( rcleanScript, "" ), node, doc );
						}
					}
				}
			}
		}
	}

	return collection;
}

function remove( elem, selector, keepData ) {
	var node,
		nodes = selector ? jQuery.filter( selector, elem ) : elem,
		i = 0;

	for ( ; ( node = nodes[ i ] ) != null; i++ ) {
		if ( !keepData && node.nodeType === 1 ) {
			jQuery.cleanData( getAll( node ) );
		}

		if ( node.parentNode ) {
			if ( keepData && isAttached( node ) ) {
				setGlobalEval( getAll( node, "script" ) );
			}
			node.parentNode.removeChild( node );
		}
	}

	return elem;
}

jQuery.extend( {
	htmlPrefilter: function( html ) {
		return html;
	},

	clone: function( elem, dataAndEvents, deepDataAndEvents ) {
		var i, l, srcElements, destElements,
			clone = elem.cloneNode( true ),
			inPage = isAttached( elem );

		// Fix IE cloning issues
		if ( !support.noCloneChecked && ( elem.nodeType === 1 || elem.nodeType === 11 ) &&
				!jQuery.isXMLDoc( elem ) ) {

			// We eschew Sizzle here for performance reasons: https://jsperf.com/getall-vs-sizzle/2
			destElements = getAll( clone );
			srcElements = getAll( elem );

			for ( i = 0, l = srcElements.length; i < l; i++ ) {
				fixInput( srcElements[ i ], destElements[ i ] );
			}
		}

		// Copy the events from the original to the clone
		if ( dataAndEvents ) {
			if ( deepDataAndEvents ) {
				srcElements = srcElements || getAll( elem );
				destElements = destElements || getAll( clone );

				for ( i = 0, l = srcElements.length; i < l; i++ ) {
					cloneCopyEvent( srcElements[ i ], destElements[ i ] );
				}
			} else {
				cloneCopyEvent( elem, clone );
			}
		}

		// Preserve script evaluation history
		destElements = getAll( clone, "script" );
		if ( destElements.length > 0 ) {
			setGlobalEval( destElements, !inPage && getAll( elem, "script" ) );
		}

		// Return the cloned set
		return clone;
	},

	cleanData: function( elems ) {
		var data, elem, type,
			special = jQuery.event.special,
			i = 0;

		for ( ; ( elem = elems[ i ] ) !== undefined; i++ ) {
			if ( acceptData( elem ) ) {
				if ( ( data = elem[ dataPriv.expando ] ) ) {
					if ( data.events ) {
						for ( type in data.events ) {
							if ( special[ type ] ) {
								jQuery.event.remove( elem, type );

							// This is a shortcut to avoid jQuery.event.remove's overhead
							} else {
								jQuery.removeEvent( elem, type, data.handle );
							}
						}
					}

					// Support: Chrome <=35 - 45+
					// Assign undefined instead of using delete, see Data#remove
					elem[ dataPriv.expando ] = undefined;
				}
				if ( elem[ dataUser.expando ] ) {

					// Support: Chrome <=35 - 45+
					// Assign undefined instead of using delete, see Data#remove
					elem[ dataUser.expando ] = undefined;
				}
			}
		}
	}
} );

jQuery.fn.extend( {
	detach: function( selector ) {
		return remove( this, selector, true );
	},

	remove: function( selector ) {
		return remove( this, selector );
	},

	text: function( value ) {
		return access( this, function( value ) {
			return value === undefined ?
				jQuery.text( this ) :
				this.empty().each( function() {
					if ( this.nodeType === 1 || this.nodeType === 11 || this.nodeType === 9 ) {
						this.textContent = value;
					}
				} );
		}, null, value, arguments.length );
	},

	append: function() {
		return domManip( this, arguments, function( elem ) {
			if ( this.nodeType === 1 || this.nodeType === 11 || this.nodeType === 9 ) {
				var target = manipulationTarget( this, elem );
				target.appendChild( elem );
			}
		} );
	},

	prepend: function() {
		return domManip( this, arguments, function( elem ) {
			if ( this.nodeType === 1 || this.nodeType === 11 || this.nodeType === 9 ) {
				var target = manipulationTarget( this, elem );
				target.insertBefore( elem, target.firstChild );
			}
		} );
	},

	before: function() {
		return domManip( this, arguments, function( elem ) {
			if ( this.parentNode ) {
				this.parentNode.insertBefore( elem, this );
			}
		} );
	},

	after: function() {
		return domManip( this, arguments, function( elem ) {
			if ( this.parentNode ) {
				this.parentNode.insertBefore( elem, this.nextSibling );
			}
		} );
	},

	empty: function() {
		var elem,
			i = 0;

		for ( ; ( elem = this[ i ] ) != null; i++ ) {
			if ( elem.nodeType === 1 ) {

				// Prevent memory leaks
				jQuery.cleanData( getAll( elem, false ) );

				// Remove any remaining nodes
				elem.textContent = "";
			}
		}

		return this;
	},

	clone: function( dataAndEvents, deepDataAndEvents ) {
		dataAndEvents = dataAndEvents == null ? false : dataAndEvents;
		deepDataAndEvents = deepDataAndEvents == null ? dataAndEvents : deepDataAndEvents;

		return this.map( function() {
			return jQuery.clone( this, dataAndEvents, deepDataAndEvents );
		} );
	},

	html: function( value ) {
		return access( this, function( value ) {
			var elem = this[ 0 ] || {},
				i = 0,
				l = this.length;

			if ( value === undefined && elem.nodeType === 1 ) {
				return elem.innerHTML;
			}

			// See if we can take a shortcut and just use innerHTML
			if ( typeof value === "string" && !rnoInnerhtml.test( value ) &&
				!wrapMap[ ( rtagName.exec( value ) || [ "", "" ] )[ 1 ].toLowerCase() ] ) {

				value = jQuery.htmlPrefilter( value );

				try {
					for ( ; i < l; i++ ) {
						elem = this[ i ] || {};

						// Remove element nodes and prevent memory leaks
						if ( elem.nodeType === 1 ) {
							jQuery.cleanData( getAll( elem, false ) );
							elem.innerHTML = value;
						}
					}

					elem = 0;

				// If using innerHTML throws an exception, use the fallback method
				} catch ( e ) {}
			}

			if ( elem ) {
				this.empty().append( value );
			}
		}, null, value, arguments.length );
	},

	replaceWith: function() {
		var ignored = [];

		// Make the changes, replacing each non-ignored context element with the new content
		return domManip( this, arguments, function( elem ) {
			var parent = this.parentNode;

			if ( jQuery.inArray( this, ignored ) < 0 ) {
				jQuery.cleanData( getAll( this ) );
				if ( parent ) {
					parent.replaceChild( elem, this );
				}
			}

		// Force callback invocation
		}, ignored );
	}
} );

jQuery.each( {
	appendTo: "append",
	prependTo: "prepend",
	insertBefore: "before",
	insertAfter: "after",
	replaceAll: "replaceWith"
}, function( name, original ) {
	jQuery.fn[ name ] = function( selector ) {
		var elems,
			ret = [],
			insert = jQuery( selector ),
			last = insert.length - 1,
			i = 0;

		for ( ; i <= last; i++ ) {
			elems = i === last ? this : this.clone( true );
			jQuery( insert[ i ] )[ original ]( elems );

			// Support: Android <=4.0 only, PhantomJS 1 only
			// .get() because push.apply(_, arraylike) throws on ancient WebKit
			push.apply( ret, elems.get() );
		}

		return this.pushStack( ret );
	};
} );
var rnumnonpx = new RegExp( "^(" + pnum + ")(?!px)[a-z%]+$", "i" );

var getStyles = function( elem ) {

		// Support: IE <=11 only, Firefox <=30 (#15098, #14150)
		// IE throws on elements created in popups
		// FF meanwhile throws on frame elements through "defaultView.getComputedStyle"
		var view = elem.ownerDocument.defaultView;

		if ( !view || !view.opener ) {
			view = window;
		}

		return view.getComputedStyle( elem );
	};

var swap = function( elem, options, callback ) {
	var ret, name,
		old = {};

	// Remember the old values, and insert the new ones
	for ( name in options ) {
		old[ name ] = elem.style[ name ];
		elem.style[ name ] = options[ name ];
	}

	ret = callback.call( elem );

	// Revert the old values
	for ( name in options ) {
		elem.style[ name ] = old[ name ];
	}

	return ret;
};


var rboxStyle = new RegExp( cssExpand.join( "|" ), "i" );



( function() {

	// Executing both pixelPosition & boxSizingReliable tests require only one layout
	// so they're executed at the same time to save the second computation.
	function computeStyleTests() {

		// This is a singleton, we need to execute it only once
		if ( !div ) {
			return;
		}

		container.style.cssText = "position:absolute;left:-11111px;width:60px;" +
			"margin-top:1px;padding:0;border:0";
		div.style.cssText =
			"position:relative;display:block;box-sizing:border-box;overflow:scroll;" +
			"margin:auto;border:1px;padding:1px;" +
			"width:60%;top:1%";
		documentElement.appendChild( container ).appendChild( div );

		var divStyle = window.getComputedStyle( div );
		pixelPositionVal = divStyle.top !== "1%";

		// Support: Android 4.0 - 4.3 only, Firefox <=3 - 44
		reliableMarginLeftVal = roundPixelMeasures( divStyle.marginLeft ) === 12;

		// Support: Android 4.0 - 4.3 only, Safari <=9.1 - 10.1, iOS <=7.0 - 9.3
		// Some styles come back with percentage values, even though they shouldn't
		div.style.right = "60%";
		pixelBoxStylesVal = roundPixelMeasures( divStyle.right ) === 36;

		// Support: IE 9 - 11 only
		// Detect misreporting of content dimensions for box-sizing:border-box elements
		boxSizingReliableVal = roundPixelMeasures( divStyle.width ) === 36;

		// Support: IE 9 only
		// Detect overflow:scroll screwiness (gh-3699)
		// Support: Chrome <=64
		// Don't get tricked when zoom affects offsetWidth (gh-4029)
		div.style.position = "absolute";
		scrollboxSizeVal = roundPixelMeasures( div.offsetWidth / 3 ) === 12;

		documentElement.removeChild( container );

		// Nullify the div so it wouldn't be stored in the memory and
		// it will also be a sign that checks already performed
		div = null;
	}

	function roundPixelMeasures( measure ) {
		return Math.round( parseFloat( measure ) );
	}

	var pixelPositionVal, boxSizingReliableVal, scrollboxSizeVal, pixelBoxStylesVal,
		reliableTrDimensionsVal, reliableMarginLeftVal,
		container = document.createElement( "div" ),
		div = document.createElement( "div" );

	// Finish early in limited (non-browser) environments
	if ( !div.style ) {
		return;
	}

	// Support: IE <=9 - 11 only
	// Style of cloned element affects source element cloned (#8908)
	div.style.backgroundClip = "content-box";
	div.cloneNode( true ).style.backgroundClip = "";
	support.clearCloneStyle = div.style.backgroundClip === "content-box";

	jQuery.extend( support, {
		boxSizingReliable: function() {
			computeStyleTests();
			return boxSizingReliableVal;
		},
		pixelBoxStyles: function() {
			computeStyleTests();
			return pixelBoxStylesVal;
		},
		pixelPosition: function() {
			computeStyleTests();
			return pixelPositionVal;
		},
		reliableMarginLeft: function() {
			computeStyleTests();
			return reliableMarginLeftVal;
		},
		scrollboxSize: function() {
			computeStyleTests();
			return scrollboxSizeVal;
		},

		// Support: IE 9 - 11+, Edge 15 - 18+
		// IE/Edge misreport `getComputedStyle` of table rows with width/height
		// set in CSS while `offset*` properties report correct values.
		// Behavior in IE 9 is more subtle than in newer versions & it passes
		// some versions of this test; make sure not to make it pass there!
		reliableTrDimensions: function() {
			var table, tr, trChild, trStyle;
			if ( reliableTrDimensionsVal == null ) {
				table = document.createElement( "table" );
				tr = document.createElement( "tr" );
				trChild = document.createElement( "div" );

				table.style.cssText = "position:absolute;left:-11111px";
				tr.style.height = "1px";
				trChild.style.height = "9px";

				documentElement
					.appendChild( table )
					.appendChild( tr )
					.appendChild( trChild );

				trStyle = window.getComputedStyle( tr );
				reliableTrDimensionsVal = parseInt( trStyle.height ) > 3;

				documentElement.removeChild( table );
			}
			return reliableTrDimensionsVal;
		}
	} );
} )();


function curCSS( elem, name, computed ) {
	var width, minWidth, maxWidth, ret,

		// Support: Firefox 51+
		// Retrieving style before computed somehow
		// fixes an issue with getting wrong values
		// on detached elements
		style = elem.style;

	computed = computed || getStyles( elem );

	// getPropertyValue is needed for:
	//   .css('filter') (IE 9 only, #12537)
	//   .css('--customProperty) (#3144)
	if ( computed ) {
		ret = computed.getPropertyValue( name ) || computed[ name ];

		if ( ret === "" && !isAttached( elem ) ) {
			ret = jQuery.style( elem, name );
		}

		// A tribute to the "awesome hack by Dean Edwards"
		// Android Browser returns percentage for some values,
		// but width seems to be reliably pixels.
		// This is against the CSSOM draft spec:
		// https://drafts.csswg.org/cssom/#resolved-values
		if ( !support.pixelBoxStyles() && rnumnonpx.test( ret ) && rboxStyle.test( name ) ) {

			// Remember the original values
			width = style.width;
			minWidth = style.minWidth;
			maxWidth = style.maxWidth;

			// Put in the new values to get a computed value out
			style.minWidth = style.maxWidth = style.width = ret;
			ret = computed.width;

			// Revert the changed values
			style.width = width;
			style.minWidth = minWidth;
			style.maxWidth = maxWidth;
		}
	}

	return ret !== undefined ?

		// Support: IE <=9 - 11 only
		// IE returns zIndex value as an integer.
		ret + "" :
		ret;
}


function addGetHookIf( conditionFn, hookFn ) {

	// Define the hook, we'll check on the first run if it's really needed.
	return {
		get: function() {
			if ( conditionFn() ) {

				// Hook not needed (or it's not possible to use it due
				// to missing dependency), remove it.
				delete this.get;
				return;
			}

			// Hook needed; redefine it so that the support test is not executed again.
			return ( this.get = hookFn ).apply( this, arguments );
		}
	};
}


var cssPrefixes = [ "Webkit", "Moz", "ms" ],
	emptyStyle = document.createElement( "div" ).style,
	vendorProps = {};

// Return a vendor-prefixed property or undefined
function vendorPropName( name ) {

	// Check for vendor prefixed names
	var capName = name[ 0 ].toUpperCase() + name.slice( 1 ),
		i = cssPrefixes.length;

	while ( i-- ) {
		name = cssPrefixes[ i ] + capName;
		if ( name in emptyStyle ) {
			return name;
		}
	}
}

// Return a potentially-mapped jQuery.cssProps or vendor prefixed property
function finalPropName( name ) {
	var final = jQuery.cssProps[ name ] || vendorProps[ name ];

	if ( final ) {
		return final;
	}
	if ( name in emptyStyle ) {
		return name;
	}
	return vendorProps[ name ] = vendorPropName( name ) || name;
}


var

	// Swappable if display is none or starts with table
	// except "table", "table-cell", or "table-caption"
	// See here for display values: https://developer.mozilla.org/en-US/docs/CSS/display
	rdisplayswap = /^(none|table(?!-c[ea]).+)/,
	rcustomProp = /^--/,
	cssShow = { position: "absolute", visibility: "hidden", display: "block" },
	cssNormalTransform = {
		letterSpacing: "0",
		fontWeight: "400"
	};

function setPositiveNumber( _elem, value, subtract ) {

	// Any relative (+/-) values have already been
	// normalized at this point
	var matches = rcssNum.exec( value );
	return matches ?

		// Guard against undefined "subtract", e.g., when used as in cssHooks
		Math.max( 0, matches[ 2 ] - ( subtract || 0 ) ) + ( matches[ 3 ] || "px" ) :
		value;
}

function boxModelAdjustment( elem, dimension, box, isBorderBox, styles, computedVal ) {
	var i = dimension === "width" ? 1 : 0,
		extra = 0,
		delta = 0;

	// Adjustment may not be necessary
	if ( box === ( isBorderBox ? "border" : "content" ) ) {
		return 0;
	}

	for ( ; i < 4; i += 2 ) {

		// Both box models exclude margin
		if ( box === "margin" ) {
			delta += jQuery.css( elem, box + cssExpand[ i ], true, styles );
		}

		// If we get here with a content-box, we're seeking "padding" or "border" or "margin"
		if ( !isBorderBox ) {

			// Add padding
			delta += jQuery.css( elem, "padding" + cssExpand[ i ], true, styles );

			// For "border" or "margin", add border
			if ( box !== "padding" ) {
				delta += jQuery.css( elem, "border" + cssExpand[ i ] + "Width", true, styles );

			// But still keep track of it otherwise
			} else {
				extra += jQuery.css( elem, "border" + cssExpand[ i ] + "Width", true, styles );
			}

		// If we get here with a border-box (content + padding + border), we're seeking "content" or
		// "padding" or "margin"
		} else {

			// For "content", subtract padding
			if ( box === "content" ) {
				delta -= jQuery.css( elem, "padding" + cssExpand[ i ], true, styles );
			}

			// For "content" or "padding", subtract border
			if ( box !== "margin" ) {
				delta -= jQuery.css( elem, "border" + cssExpand[ i ] + "Width", true, styles );
			}
		}
	}

	// Account for positive content-box scroll gutter when requested by providing computedVal
	if ( !isBorderBox && computedVal >= 0 ) {

		// offsetWidth/offsetHeight is a rounded sum of content, padding, scroll gutter, and border
		// Assuming integer scroll gutter, subtract the rest and round down
		delta += Math.max( 0, Math.ceil(
			elem[ "offset" + dimension[ 0 ].toUpperCase() + dimension.slice( 1 ) ] -
			computedVal -
			delta -
			extra -
			0.5

		// If offsetWidth/offsetHeight is unknown, then we can't determine content-box scroll gutter
		// Use an explicit zero to avoid NaN (gh-3964)
		) ) || 0;
	}

	return delta;
}

function getWidthOrHeight( elem, dimension, extra ) {

	// Start with computed style
	var styles = getStyles( elem ),

		// To avoid forcing a reflow, only fetch boxSizing if we need it (gh-4322).
		// Fake content-box until we know it's needed to know the true value.
		boxSizingNeeded = !support.boxSizingReliable() || extra,
		isBorderBox = boxSizingNeeded &&
			jQuery.css( elem, "boxSizing", false, styles ) === "border-box",
		valueIsBorderBox = isBorderBox,

		val = curCSS( elem, dimension, styles ),
		offsetProp = "offset" + dimension[ 0 ].toUpperCase() + dimension.slice( 1 );

	// Support: Firefox <=54
	// Return a confounding non-pixel value or feign ignorance, as appropriate.
	if ( rnumnonpx.test( val ) ) {
		if ( !extra ) {
			return val;
		}
		val = "auto";
	}


	// Support: IE 9 - 11 only
	// Use offsetWidth/offsetHeight for when box sizing is unreliable.
	// In those cases, the computed value can be trusted to be border-box.
	if ( ( !support.boxSizingReliable() && isBorderBox ||

		// Support: IE 10 - 11+, Edge 15 - 18+
		// IE/Edge misreport `getComputedStyle` of table rows with width/height
		// set in CSS while `offset*` properties report correct values.
		// Interestingly, in some cases IE 9 doesn't suffer from this issue.
		!support.reliableTrDimensions() && nodeName( elem, "tr" ) ||

		// Fall back to offsetWidth/offsetHeight when value is "auto"
		// This happens for inline elements with no explicit setting (gh-3571)
		val === "auto" ||

		// Support: Android <=4.1 - 4.3 only
		// Also use offsetWidth/offsetHeight for misreported inline dimensions (gh-3602)
		!parseFloat( val ) && jQuery.css( elem, "display", false, styles ) === "inline" ) &&

		// Make sure the element is visible & connected
		elem.getClientRects().length ) {

		isBorderBox = jQuery.css( elem, "boxSizing", false, styles ) === "border-box";

		// Where available, offsetWidth/offsetHeight approximate border box dimensions.
		// Where not available (e.g., SVG), assume unreliable box-sizing and interpret the
		// retrieved value as a content box dimension.
		valueIsBorderBox = offsetProp in elem;
		if ( valueIsBorderBox ) {
			val = elem[ offsetProp ];
		}
	}

	// Normalize "" and auto
	val = parseFloat( val ) || 0;

	// Adjust for the element's box model
	return ( val +
		boxModelAdjustment(
			elem,
			dimension,
			extra || ( isBorderBox ? "border" : "content" ),
			valueIsBorderBox,
			styles,

			// Provide the current computed size to request scroll gutter calculation (gh-3589)
			val
		)
	) + "px";
}

jQuery.extend( {

	// Add in style property hooks for overriding the default
	// behavior of getting and setting a style property
	cssHooks: {
		opacity: {
			get: function( elem, computed ) {
				if ( computed ) {

					// We should always get a number back from opacity
					var ret = curCSS( elem, "opacity" );
					return ret === "" ? "1" : ret;
				}
			}
		}
	},

	// Don't automatically add "px" to these possibly-unitless properties
	cssNumber: {
		"animationIterationCount": true,
		"columnCount": true,
		"fillOpacity": true,
		"flexGrow": true,
		"flexShrink": true,
		"fontWeight": true,
		"gridArea": true,
		"gridColumn": true,
		"gridColumnEnd": true,
		"gridColumnStart": true,
		"gridRow": true,
		"gridRowEnd": true,
		"gridRowStart": true,
		"lineHeight": true,
		"opacity": true,
		"order": true,
		"orphans": true,
		"widows": true,
		"zIndex": true,
		"zoom": true
	},

	// Add in properties whose names you wish to fix before
	// setting or getting the value
	cssProps: {},

	// Get and set the style property on a DOM Node
	style: function( elem, name, value, extra ) {

		// Don't set styles on text and comment nodes
		if ( !elem || elem.nodeType === 3 || elem.nodeType === 8 || !elem.style ) {
			return;
		}

		// Make sure that we're working with the right name
		var ret, type, hooks,
			origName = camelCase( name ),
			isCustomProp = rcustomProp.test( name ),
			style = elem.style;

		// Make sure that we're working with the right name. We don't
		// want to query the value if it is a CSS custom property
		// since they are user-defined.
		if ( !isCustomProp ) {
			name = finalPropName( origName );
		}

		// Gets hook for the prefixed version, then unprefixed version
		hooks = jQuery.cssHooks[ name ] || jQuery.cssHooks[ origName ];

		// Check if we're setting a value
		if ( value !== undefined ) {
			type = typeof value;

			// Convert "+=" or "-=" to relative numbers (#7345)
			if ( type === "string" && ( ret = rcssNum.exec( value ) ) && ret[ 1 ] ) {
				value = adjustCSS( elem, name, ret );

				// Fixes bug #9237
				type = "number";
			}

			// Make sure that null and NaN values aren't set (#7116)
			if ( value == null || value !== value ) {
				return;
			}

			// If a number was passed in, add the unit (except for certain CSS properties)
			// The isCustomProp check can be removed in jQuery 4.0 when we only auto-append
			// "px" to a few hardcoded values.
			if ( type === "number" && !isCustomProp ) {
				value += ret && ret[ 3 ] || ( jQuery.cssNumber[ origName ] ? "" : "px" );
			}

			// background-* props affect original clone's values
			if ( !support.clearCloneStyle && value === "" && name.indexOf( "background" ) === 0 ) {
				style[ name ] = "inherit";
			}

			// If a hook was provided, use that value, otherwise just set the specified value
			if ( !hooks || !( "set" in hooks ) ||
				( value = hooks.set( elem, value, extra ) ) !== undefined ) {

				if ( isCustomProp ) {
					style.setProperty( name, value );
				} else {
					style[ name ] = value;
				}
			}

		} else {

			// If a hook was provided get the non-computed value from there
			if ( hooks && "get" in hooks &&
				( ret = hooks.get( elem, false, extra ) ) !== undefined ) {

				return ret;
			}

			// Otherwise just get the value from the style object
			return style[ name ];
		}
	},

	css: function( elem, name, extra, styles ) {
		var val, num, hooks,
			origName = camelCase( name ),
			isCustomProp = rcustomProp.test( name );

		// Make sure that we're working with the right name. We don't
		// want to modify the value if it is a CSS custom property
		// since they are user-defined.
		if ( !isCustomProp ) {
			name = finalPropName( origName );
		}

		// Try prefixed name followed by the unprefixed name
		hooks = jQuery.cssHooks[ name ] || jQuery.cssHooks[ origName ];

		// If a hook was provided get the computed value from there
		if ( hooks && "get" in hooks ) {
			val = hooks.get( elem, true, extra );
		}

		// Otherwise, if a way to get the computed value exists, use that
		if ( val === undefined ) {
			val = curCSS( elem, name, styles );
		}

		// Convert "normal" to computed value
		if ( val === "normal" && name in cssNormalTransform ) {
			val = cssNormalTransform[ name ];
		}

		// Make numeric if forced or a qualifier was provided and val looks numeric
		if ( extra === "" || extra ) {
			num = parseFloat( val );
			return extra === true || isFinite( num ) ? num || 0 : val;
		}

		return val;
	}
} );

jQuery.each( [ "height", "width" ], function( _i, dimension ) {
	jQuery.cssHooks[ dimension ] = {
		get: function( elem, computed, extra ) {
			if ( computed ) {

				// Certain elements can have dimension info if we invisibly show them
				// but it must have a current display style that would benefit
				return rdisplayswap.test( jQuery.css( elem, "display" ) ) &&

					// Support: Safari 8+
					// Table columns in Safari have non-zero offsetWidth & zero
					// getBoundingClientRect().width unless display is changed.
					// Support: IE <=11 only
					// Running getBoundingClientRect on a disconnected node
					// in IE throws an error.
					( !elem.getClientRects().length || !elem.getBoundingClientRect().width ) ?
						swap( elem, cssShow, function() {
							return getWidthOrHeight( elem, dimension, extra );
						} ) :
						getWidthOrHeight( elem, dimension, extra );
			}
		},

		set: function( elem, value, extra ) {
			var matches,
				styles = getStyles( elem ),

				// Only read styles.position if the test has a chance to fail
				// to avoid forcing a reflow.
				scrollboxSizeBuggy = !support.scrollboxSize() &&
					styles.position === "absolute",

				// To avoid forcing a reflow, only fetch boxSizing if we need it (gh-3991)
				boxSizingNeeded = scrollboxSizeBuggy || extra,
				isBorderBox = boxSizingNeeded &&
					jQuery.css( elem, "boxSizing", false, styles ) === "border-box",
				subtract = extra ?
					boxModelAdjustment(
						elem,
						dimension,
						extra,
						isBorderBox,
						styles
					) :
					0;

			// Account for unreliable border-box dimensions by comparing offset* to computed and
			// faking a content-box to get border and padding (gh-3699)
			if ( isBorderBox && scrollboxSizeBuggy ) {
				subtract -= Math.ceil(
					elem[ "offset" + dimension[ 0 ].toUpperCase() + dimension.slice( 1 ) ] -
					parseFloat( styles[ dimension ] ) -
					boxModelAdjustment( elem, dimension, "border", false, styles ) -
					0.5
				);
			}

			// Convert to pixels if value adjustment is needed
			if ( subtract && ( matches = rcssNum.exec( value ) ) &&
				( matches[ 3 ] || "px" ) !== "px" ) {

				elem.style[ dimension ] = value;
				value = jQuery.css( elem, dimension );
			}

			return setPositiveNumber( elem, value, subtract );
		}
	};
} );

jQuery.cssHooks.marginLeft = addGetHookIf( support.reliableMarginLeft,
	function( elem, computed ) {
		if ( computed ) {
			return ( parseFloat( curCSS( elem, "marginLeft" ) ) ||
				elem.getBoundingClientRect().left -
					swap( elem, { marginLeft: 0 }, function() {
						return elem.getBoundingClientRect().left;
					} )
				) + "px";
		}
	}
);

// These hooks are used by animate to expand properties
jQuery.each( {
	margin: "",
	padding: "",
	border: "Width"
}, function( prefix, suffix ) {
	jQuery.cssHooks[ prefix + suffix ] = {
		expand: function( value ) {
			var i = 0,
				expanded = {},

				// Assumes a single number if not a string
				parts = typeof value === "string" ? value.split( " " ) : [ value ];

			for ( ; i < 4; i++ ) {
				expanded[ prefix + cssExpand[ i ] + suffix ] =
					parts[ i ] || parts[ i - 2 ] || parts[ 0 ];
			}

			return expanded;
		}
	};

	if ( prefix !== "margin" ) {
		jQuery.cssHooks[ prefix + suffix ].set = setPositiveNumber;
	}
} );

jQuery.fn.extend( {
	css: function( name, value ) {
		return access( this, function( elem, name, value ) {
			var styles, len,
				map = {},
				i = 0;

			if ( Array.isArray( name ) ) {
				styles = getStyles( elem );
				len = name.length;

				for ( ; i < len; i++ ) {
					map[ name[ i ] ] = jQuery.css( elem, name[ i ], false, styles );
				}

				return map;
			}

			return value !== undefined ?
				jQuery.style( elem, name, value ) :
				jQuery.css( elem, name );
		}, name, value, arguments.length > 1 );
	}
} );


function Tween( elem, options, prop, end, easing ) {
	return new Tween.prototype.init( elem, options, prop, end, easing );
}
jQuery.Tween = Tween;

Tween.prototype = {
	constructor: Tween,
	init: function( elem, options, prop, end, easing, unit ) {
		this.elem = elem;
		this.prop = prop;
		this.easing = easing || jQuery.easing._default;
		this.options = options;
		this.start = this.now = this.cur();
		this.end = end;
		this.unit = unit || ( jQuery.cssNumber[ prop ] ? "" : "px" );
	},
	cur: function() {
		var hooks = Tween.propHooks[ this.prop ];

		return hooks && hooks.get ?
			hooks.get( this ) :
			Tween.propHooks._default.get( this );
	},
	run: function( percent ) {
		var eased,
			hooks = Tween.propHooks[ this.prop ];

		if ( this.options.duration ) {
			this.pos = eased = jQuery.easing[ this.easing ](
				percent, this.options.duration * percent, 0, 1, this.options.duration
			);
		} else {
			this.pos = eased = percent;
		}
		this.now = ( this.end - this.start ) * eased + this.start;

		if ( this.options.step ) {
			this.options.step.call( this.elem, this.now, this );
		}

		if ( hooks && hooks.set ) {
			hooks.set( this );
		} else {
			Tween.propHooks._default.set( this );
		}
		return this;
	}
};

Tween.prototype.init.prototype = Tween.prototype;

Tween.propHooks = {
	_default: {
		get: function( tween ) {
			var result;

			// Use a property on the element directly when it is not a DOM element,
			// or when there is no matching style property that exists.
			if ( tween.elem.nodeType !== 1 ||
				tween.elem[ tween.prop ] != null && tween.elem.style[ tween.prop ] == null ) {
				return tween.elem[ tween.prop ];
			}

			// Passing an empty string as a 3rd parameter to .css will automatically
			// attempt a parseFloat and fallback to a string if the parse fails.
			// Simple values such as "10px" are parsed to Float;
			// complex values such as "rotate(1rad)" are returned as-is.
			result = jQuery.css( tween.elem, tween.prop, "" );

			// Empty strings, null, undefined and "auto" are converted to 0.
			return !result || result === "auto" ? 0 : result;
		},
		set: function( tween ) {

			// Use step hook for back compat.
			// Use cssHook if its there.
			// Use .style if available and use plain properties where available.
			if ( jQuery.fx.step[ tween.prop ] ) {
				jQuery.fx.step[ tween.prop ]( tween );
			} else if ( tween.elem.nodeType === 1 && (
					jQuery.cssHooks[ tween.prop ] ||
					tween.elem.style[ finalPropName( tween.prop ) ] != null ) ) {
				jQuery.style( tween.elem, tween.prop, tween.now + tween.unit );
			} else {
				tween.elem[ tween.prop ] = tween.now;
			}
		}
	}
};

// Support: IE <=9 only
// Panic based approach to setting things on disconnected nodes
Tween.propHooks.scrollTop = Tween.propHooks.scrollLeft = {
	set: function( tween ) {
		if ( tween.elem.nodeType && tween.elem.parentNode ) {
			tween.elem[ tween.prop ] = tween.now;
		}
	}
};

jQuery.easing = {
	linear: function( p ) {
		return p;
	},
	swing: function( p ) {
		return 0.5 - Math.cos( p * Math.PI ) / 2;
	},
	_default: "swing"
};

jQuery.fx = Tween.prototype.init;

// Back compat <1.8 extension point
jQuery.fx.step = {};




var
	fxNow, inProgress,
	rfxtypes = /^(?:toggle|show|hide)$/,
	rrun = /queueHooks$/;

function schedule() {
	if ( inProgress ) {
		if ( document.hidden === false && window.requestAnimationFrame ) {
			window.requestAnimationFrame( schedule );
		} else {
			window.setTimeout( schedule, jQuery.fx.interval );
		}

		jQuery.fx.tick();
	}
}

// Animations created synchronously will run synchronously
function createFxNow() {
	window.setTimeout( function() {
		fxNow = undefined;
	} );
	return ( fxNow = Date.now() );
}

// Generate parameters to create a standard animation
function genFx( type, includeWidth ) {
	var which,
		i = 0,
		attrs = { height: type };

	// If we include width, step value is 1 to do all cssExpand values,
	// otherwise step value is 2 to skip over Left and Right
	includeWidth = includeWidth ? 1 : 0;
	for ( ; i < 4; i += 2 - includeWidth ) {
		which = cssExpand[ i ];
		attrs[ "margin" + which ] = attrs[ "padding" + which ] = type;
	}

	if ( includeWidth ) {
		attrs.opacity = attrs.width = type;
	}

	return attrs;
}

function createTween( value, prop, animation ) {
	var tween,
		collection = ( Animation.tweeners[ prop ] || [] ).concat( Animation.tweeners[ "*" ] ),
		index = 0,
		length = collection.length;
	for ( ; index < length; index++ ) {
		if ( ( tween = collection[ index ].call( animation, prop, value ) ) ) {

			// We're done with this property
			return tween;
		}
	}
}

function defaultPrefilter( elem, props, opts ) {
	var prop, value, toggle, hooks, oldfire, propTween, restoreDisplay, display,
		isBox = "width" in props || "height" in props,
		anim = this,
		orig = {},
		style = elem.style,
		hidden = elem.nodeType && isHiddenWithinTree( elem ),
		dataShow = dataPriv.get( elem, "fxshow" );

	// Queue-skipping animations hijack the fx hooks
	if ( !opts.queue ) {
		hooks = jQuery._queueHooks( elem, "fx" );
		if ( hooks.unqueued == null ) {
			hooks.unqueued = 0;
			oldfire = hooks.empty.fire;
			hooks.empty.fire = function() {
				if ( !hooks.unqueued ) {
					oldfire();
				}
			};
		}
		hooks.unqueued++;

		anim.always( function() {

			// Ensure the complete handler is called before this completes
			anim.always( function() {
				hooks.unqueued--;
				if ( !jQuery.queue( elem, "fx" ).length ) {
					hooks.empty.fire();
				}
			} );
		} );
	}

	// Detect show/hide animations
	for ( prop in props ) {
		value = props[ prop ];
		if ( rfxtypes.test( value ) ) {
			delete props[ prop ];
			toggle = toggle || value === "toggle";
			if ( value === ( hidden ? "hide" : "show" ) ) {

				// Pretend to be hidden if this is a "show" and
				// there is still data from a stopped show/hide
				if ( value === "show" && dataShow && dataShow[ prop ] !== undefined ) {
					hidden = true;

				// Ignore all other no-op show/hide data
				} else {
					continue;
				}
			}
			orig[ prop ] = dataShow && dataShow[ prop ] || jQuery.style( elem, prop );
		}
	}

	// Bail out if this is a no-op like .hide().hide()
	propTween = !jQuery.isEmptyObject( props );
	if ( !propTween && jQuery.isEmptyObject( orig ) ) {
		return;
	}

	// Restrict "overflow" and "display" styles during box animations
	if ( isBox && elem.nodeType === 1 ) {

		// Support: IE <=9 - 11, Edge 12 - 15
		// Record all 3 overflow attributes because IE does not infer the shorthand
		// from identically-valued overflowX and overflowY and Edge just mirrors
		// the overflowX value there.
		opts.overflow = [ style.overflow, style.overflowX, style.overflowY ];

		// Identify a display type, preferring old show/hide data over the CSS cascade
		restoreDisplay = dataShow && dataShow.display;
		if ( restoreDisplay == null ) {
			restoreDisplay = dataPriv.get( elem, "display" );
		}
		display = jQuery.css( elem, "display" );
		if ( display === "none" ) {
			if ( restoreDisplay ) {
				display = restoreDisplay;
			} else {

				// Get nonempty value(s) by temporarily forcing visibility
				showHide( [ elem ], true );
				restoreDisplay = elem.style.display || restoreDisplay;
				display = jQuery.css( elem, "display" );
				showHide( [ elem ] );
			}
		}

		// Animate inline elements as inline-block
		if ( display === "inline" || display === "inline-block" && restoreDisplay != null ) {
			if ( jQuery.css( elem, "float" ) === "none" ) {

				// Restore the original display value at the end of pure show/hide animations
				if ( !propTween ) {
					anim.done( function() {
						style.display = restoreDisplay;
					} );
					if ( restoreDisplay == null ) {
						display = style.display;
						restoreDisplay = display === "none" ? "" : display;
					}
				}
				style.display = "inline-block";
			}
		}
	}

	if ( opts.overflow ) {
		style.overflow = "hidden";
		anim.always( function() {
			style.overflow = opts.overflow[ 0 ];
			style.overflowX = opts.overflow[ 1 ];
			style.overflowY = opts.overflow[ 2 ];
		} );
	}

	// Implement show/hide animations
	propTween = false;
	for ( prop in orig ) {

		// General show/hide setup for this element animation
		if ( !propTween ) {
			if ( dataShow ) {
				if ( "hidden" in dataShow ) {
					hidden = dataShow.hidden;
				}
			} else {
				dataShow = dataPriv.access( elem, "fxshow", { display: restoreDisplay } );
			}

			// Store hidden/visible for toggle so `.stop().toggle()` "reverses"
			if ( toggle ) {
				dataShow.hidden = !hidden;
			}

			// Show elements before animating them
			if ( hidden ) {
				showHide( [ elem ], true );
			}

			/* eslint-disable no-loop-func */

			anim.done( function() {

			/* eslint-enable no-loop-func */

				// The final step of a "hide" animation is actually hiding the element
				if ( !hidden ) {
					showHide( [ elem ] );
				}
				dataPriv.remove( elem, "fxshow" );
				for ( prop in orig ) {
					jQuery.style( elem, prop, orig[ prop ] );
				}
			} );
		}

		// Per-property setup
		propTween = createTween( hidden ? dataShow[ prop ] : 0, prop, anim );
		if ( !( prop in dataShow ) ) {
			dataShow[ prop ] = propTween.start;
			if ( hidden ) {
				propTween.end = propTween.start;
				propTween.start = 0;
			}
		}
	}
}

function propFilter( props, specialEasing ) {
	var index, name, easing, value, hooks;

	// camelCase, specialEasing and expand cssHook pass
	for ( index in props ) {
		name = camelCase( index );
		easing = specialEasing[ name ];
		value = props[ index ];
		if ( Array.isArray( value ) ) {
			easing = value[ 1 ];
			value = props[ index ] = value[ 0 ];
		}

		if ( index !== name ) {
			props[ name ] = value;
			delete props[ index ];
		}

		hooks = jQuery.cssHooks[ name ];
		if ( hooks && "expand" in hooks ) {
			value = hooks.expand( value );
			delete props[ name ];

			// Not quite $.extend, this won't overwrite existing keys.
			// Reusing 'index' because we have the correct "name"
			for ( index in value ) {
				if ( !( index in props ) ) {
					props[ index ] = value[ index ];
					specialEasing[ index ] = easing;
				}
			}
		} else {
			specialEasing[ name ] = easing;
		}
	}
}

function Animation( elem, properties, options ) {
	var result,
		stopped,
		index = 0,
		length = Animation.prefilters.length,
		deferred = jQuery.Deferred().always( function() {

			// Don't match elem in the :animated selector
			delete tick.elem;
		} ),
		tick = function() {
			if ( stopped ) {
				return false;
			}
			var currentTime = fxNow || createFxNow(),
				remaining = Math.max( 0, animation.startTime + animation.duration - currentTime ),

				// Support: Android 2.3 only
				// Archaic crash bug won't allow us to use `1 - ( 0.5 || 0 )` (#12497)
				temp = remaining / animation.duration || 0,
				percent = 1 - temp,
				index = 0,
				length = animation.tweens.length;

			for ( ; index < length; index++ ) {
				animation.tweens[ index ].run( percent );
			}

			deferred.notifyWith( elem, [ animation, percent, remaining ] );

			// If there's more to do, yield
			if ( percent < 1 && length ) {
				return remaining;
			}

			// If this was an empty animation, synthesize a final progress notification
			if ( !length ) {
				deferred.notifyWith( elem, [ animation, 1, 0 ] );
			}

			// Resolve the animation and report its conclusion
			deferred.resolveWith( elem, [ animation ] );
			return false;
		},
		animation = deferred.promise( {
			elem: elem,
			props: jQuery.extend( {}, properties ),
			opts: jQuery.extend( true, {
				specialEasing: {},
				easing: jQuery.easing._default
			}, options ),
			originalProperties: properties,
			originalOptions: options,
			startTime: fxNow || createFxNow(),
			duration: options.duration,
			tweens: [],
			createTween: function( prop, end ) {
				var tween = jQuery.Tween( elem, animation.opts, prop, end,
						animation.opts.specialEasing[ prop ] || animation.opts.easing );
				animation.tweens.push( tween );
				return tween;
			},
			stop: function( gotoEnd ) {
				var index = 0,

					// If we are going to the end, we want to run all the tweens
					// otherwise we skip this part
					length = gotoEnd ? animation.tweens.length : 0;
				if ( stopped ) {
					return this;
				}
				stopped = true;
				for ( ; index < length; index++ ) {
					animation.tweens[ index ].run( 1 );
				}

				// Resolve when we played the last frame; otherwise, reject
				if ( gotoEnd ) {
					deferred.notifyWith( elem, [ animation, 1, 0 ] );
					deferred.resolveWith( elem, [ animation, gotoEnd ] );
				} else {
					deferred.rejectWith( elem, [ animation, gotoEnd ] );
				}
				return this;
			}
		} ),
		props = animation.props;

	propFilter( props, animation.opts.specialEasing );

	for ( ; index < length; index++ ) {
		result = Animation.prefilters[ index ].call( animation, elem, props, animation.opts );
		if ( result ) {
			if ( isFunction( result.stop ) ) {
				jQuery._queueHooks( animation.elem, animation.opts.queue ).stop =
					result.stop.bind( result );
			}
			return result;
		}
	}

	jQuery.map( props, createTween, animation );

	if ( isFunction( animation.opts.start ) ) {
		animation.opts.start.call( elem, animation );
	}

	// Attach callbacks from options
	animation
		.progress( animation.opts.progress )
		.done( animation.opts.done, animation.opts.complete )
		.fail( animation.opts.fail )
		.always( animation.opts.always );

	jQuery.fx.timer(
		jQuery.extend( tick, {
			elem: elem,
			anim: animation,
			queue: animation.opts.queue
		} )
	);

	return animation;
}

jQuery.Animation = jQuery.extend( Animation, {

	tweeners: {
		"*": [ function( prop, value ) {
			var tween = this.createTween( prop, value );
			adjustCSS( tween.elem, prop, rcssNum.exec( value ), tween );
			return tween;
		} ]
	},

	tweener: function( props, callback ) {
		if ( isFunction( props ) ) {
			callback = props;
			props = [ "*" ];
		} else {
			props = props.match( rnothtmlwhite );
		}

		var prop,
			index = 0,
			length = props.length;

		for ( ; index < length; index++ ) {
			prop = props[ index ];
			Animation.tweeners[ prop ] = Animation.tweeners[ prop ] || [];
			Animation.tweeners[ prop ].unshift( callback );
		}
	},

	prefilters: [ defaultPrefilter ],

	prefilter: function( callback, prepend ) {
		if ( prepend ) {
			Animation.prefilters.unshift( callback );
		} else {
			Animation.prefilters.push( callback );
		}
	}
} );

jQuery.speed = function( speed, easing, fn ) {
	var opt = speed && typeof speed === "object" ? jQuery.extend( {}, speed ) : {
		complete: fn || !fn && easing ||
			isFunction( speed ) && speed,
		duration: speed,
		easing: fn && easing || easing && !isFunction( easing ) && easing
	};

	// Go to the end state if fx are off
	if ( jQuery.fx.off ) {
		opt.duration = 0;

	} else {
		if ( typeof opt.duration !== "number" ) {
			if ( opt.duration in jQuery.fx.speeds ) {
				opt.duration = jQuery.fx.speeds[ opt.duration ];

			} else {
				opt.duration = jQuery.fx.speeds._default;
			}
		}
	}

	// Normalize opt.queue - true/undefined/null -> "fx"
	if ( opt.queue == null || opt.queue === true ) {
		opt.queue = "fx";
	}

	// Queueing
	opt.old = opt.complete;

	opt.complete = function() {
		if ( isFunction( opt.old ) ) {
			opt.old.call( this );
		}

		if ( opt.queue ) {
			jQuery.dequeue( this, opt.queue );
		}
	};

	return opt;
};

jQuery.fn.extend( {
	fadeTo: function( speed, to, easing, callback ) {

		// Show any hidden elements after setting opacity to 0
		return this.filter( isHiddenWithinTree ).css( "opacity", 0 ).show()

			// Animate to the value specified
			.end().animate( { opacity: to }, speed, easing, callback );
	},
	animate: function( prop, speed, easing, callback ) {
		var empty = jQuery.isEmptyObject( prop ),
			optall = jQuery.speed( speed, easing, callback ),
			doAnimation = function() {

				// Operate on a copy of prop so per-property easing won't be lost
				var anim = Animation( this, jQuery.extend( {}, prop ), optall );

				// Empty animations, or finishing resolves immediately
				if ( empty || dataPriv.get( this, "finish" ) ) {
					anim.stop( true );
				}
			};
			doAnimation.finish = doAnimation;

		return empty || optall.queue === false ?
			this.each( doAnimation ) :
			this.queue( optall.queue, doAnimation );
	},
	stop: function( type, clearQueue, gotoEnd ) {
		var stopQueue = function( hooks ) {
			var stop = hooks.stop;
			delete hooks.stop;
			stop( gotoEnd );
		};

		if ( typeof type !== "string" ) {
			gotoEnd = clearQueue;
			clearQueue = type;
			type = undefined;
		}
		if ( clearQueue ) {
			this.queue( type || "fx", [] );
		}

		return this.each( function() {
			var dequeue = true,
				index = type != null && type + "queueHooks",
				timers = jQuery.timers,
				data = dataPriv.get( this );

			if ( index ) {
				if ( data[ index ] && data[ index ].stop ) {
					stopQueue( data[ index ] );
				}
			} else {
				for ( index in data ) {
					if ( data[ index ] && data[ index ].stop && rrun.test( index ) ) {
						stopQueue( data[ index ] );
					}
				}
			}

			for ( index = timers.length; index--; ) {
				if ( timers[ index ].elem === this &&
					( type == null || timers[ index ].queue === type ) ) {

					timers[ index ].anim.stop( gotoEnd );
					dequeue = false;
					timers.splice( index, 1 );
				}
			}

			// Start the next in the queue if the last step wasn't forced.
			// Timers currently will call their complete callbacks, which
			// will dequeue but only if they were gotoEnd.
			if ( dequeue || !gotoEnd ) {
				jQuery.dequeue( this, type );
			}
		} );
	},
	finish: function( type ) {
		if ( type !== false ) {
			type = type || "fx";
		}
		return this.each( function() {
			var index,
				data = dataPriv.get( this ),
				queue = data[ type + "queue" ],
				hooks = data[ type + "queueHooks" ],
				timers = jQuery.timers,
				length = queue ? queue.length : 0;

			// Enable finishing flag on private data
			data.finish = true;

			// Empty the queue first
			jQuery.queue( this, type, [] );

			if ( hooks && hooks.stop ) {
				hooks.stop.call( this, true );
			}

			// Look for any active animations, and finish them
			for ( index = timers.length; index--; ) {
				if ( timers[ index ].elem === this && timers[ index ].queue === type ) {
					timers[ index ].anim.stop( true );
					timers.splice( index, 1 );
				}
			}

			// Look for any animations in the old queue and finish them
			for ( index = 0; index < length; index++ ) {
				if ( queue[ index ] && queue[ index ].finish ) {
					queue[ index ].finish.call( this );
				}
			}

			// Turn off finishing flag
			delete data.finish;
		} );
	}
} );

jQuery.each( [ "toggle", "show", "hide" ], function( _i, name ) {
	var cssFn = jQuery.fn[ name ];
	jQuery.fn[ name ] = function( speed, easing, callback ) {
		return speed == null || typeof speed === "boolean" ?
			cssFn.apply( this, arguments ) :
			this.animate( genFx( name, true ), speed, easing, callback );
	};
} );

// Generate shortcuts for custom animations
jQuery.each( {
	slideDown: genFx( "show" ),
	slideUp: genFx( "hide" ),
	slideToggle: genFx( "toggle" ),
	fadeIn: { opacity: "show" },
	fadeOut: { opacity: "hide" },
	fadeToggle: { opacity: "toggle" }
}, function( name, props ) {
	jQuery.fn[ name ] = function( speed, easing, callback ) {
		return this.animate( props, speed, easing, callback );
	};
} );

jQuery.timers = [];
jQuery.fx.tick = function() {
	var timer,
		i = 0,
		timers = jQuery.timers;

	fxNow = Date.now();

	for ( ; i < timers.length; i++ ) {
		timer = timers[ i ];

		// Run the timer and safely remove it when done (allowing for external removal)
		if ( !timer() && timers[ i ] === timer ) {
			timers.splice( i--, 1 );
		}
	}

	if ( !timers.length ) {
		jQuery.fx.stop();
	}
	fxNow = undefined;
};

jQuery.fx.timer = function( timer ) {
	jQuery.timers.push( timer );
	jQuery.fx.start();
};

jQuery.fx.interval = 13;
jQuery.fx.start = function() {
	if ( inProgress ) {
		return;
	}

	inProgress = true;
	schedule();
};

jQuery.fx.stop = function() {
	inProgress = null;
};

jQuery.fx.speeds = {
	slow: 600,
	fast: 200,

	// Default speed
	_default: 400
};


// Based off of the plugin by Clint Helfers, with permission.
// https://web.archive.org/web/20100324014747/http://blindsignals.com/index.php/2009/07/jquery-delay/
jQuery.fn.delay = function( time, type ) {
	time = jQuery.fx ? jQuery.fx.speeds[ time ] || time : time;
	type = type || "fx";

	return this.queue( type, function( next, hooks ) {
		var timeout = window.setTimeout( next, time );
		hooks.stop = function() {
			window.clearTimeout( timeout );
		};
	} );
};


( function() {
	var input = document.createElement( "input" ),
		select = document.createElement( "select" ),
		opt = select.appendChild( document.createElement( "option" ) );

	input.type = "checkbox";

	// Support: Android <=4.3 only
	// Default value for a checkbox should be "on"
	support.checkOn = input.value !== "";

	// Support: IE <=11 only
	// Must access selectedIndex to make default options select
	support.optSelected = opt.selected;

	// Support: IE <=11 only
	// An input loses its value after becoming a radio
	input = document.createElement( "input" );
	input.value = "t";
	input.type = "radio";
	support.radioValue = input.value === "t";
} )();


var boolHook,
	attrHandle = jQuery.expr.attrHandle;

jQuery.fn.extend( {
	attr: function( name, value ) {
		return access( this, jQuery.attr, name, value, arguments.length > 1 );
	},

	removeAttr: function( name ) {
		return this.each( function() {
			jQuery.removeAttr( this, name );
		} );
	}
} );

jQuery.extend( {
	attr: function( elem, name, value ) {
		var ret, hooks,
			nType = elem.nodeType;

		// Don't get/set attributes on text, comment and attribute nodes
		if ( nType === 3 || nType === 8 || nType === 2 ) {
			return;
		}

		// Fallback to prop when attributes are not supported
		if ( typeof elem.getAttribute === "undefined" ) {
			return jQuery.prop( elem, name, value );
		}

		// Attribute hooks are determined by the lowercase version
		// Grab necessary hook if one is defined
		if ( nType !== 1 || !jQuery.isXMLDoc( elem ) ) {
			hooks = jQuery.attrHooks[ name.toLowerCase() ] ||
				( jQuery.expr.match.bool.test( name ) ? boolHook : undefined );
		}

		if ( value !== undefined ) {
			if ( value === null ) {
				jQuery.removeAttr( elem, name );
				return;
			}

			if ( hooks && "set" in hooks &&
				( ret = hooks.set( elem, value, name ) ) !== undefined ) {
				return ret;
			}

			elem.setAttribute( name, value + "" );
			return value;
		}

		if ( hooks && "get" in hooks && ( ret = hooks.get( elem, name ) ) !== null ) {
			return ret;
		}

		ret = jQuery.find.attr( elem, name );

		// Non-existent attributes return null, we normalize to undefined
		return ret == null ? undefined : ret;
	},

	attrHooks: {
		type: {
			set: function( elem, value ) {
				if ( !support.radioValue && value === "radio" &&
					nodeName( elem, "input" ) ) {
					var val = elem.value;
					elem.setAttribute( "type", value );
					if ( val ) {
						elem.value = val;
					}
					return value;
				}
			}
		}
	},

	removeAttr: function( elem, value ) {
		var name,
			i = 0,

			// Attribute names can contain non-HTML whitespace characters
			// https://html.spec.whatwg.org/multipage/syntax.html#attributes-2
			attrNames = value && value.match( rnothtmlwhite );

		if ( attrNames && elem.nodeType === 1 ) {
			while ( ( name = attrNames[ i++ ] ) ) {
				elem.removeAttribute( name );
			}
		}
	}
} );

// Hooks for boolean attributes
boolHook = {
	set: function( elem, value, name ) {
		if ( value === false ) {

			// Remove boolean attributes when set to false
			jQuery.removeAttr( elem, name );
		} else {
			elem.setAttribute( name, name );
		}
		return name;
	}
};

jQuery.each( jQuery.expr.match.bool.source.match( /\w+/g ), function( _i, name ) {
	var getter = attrHandle[ name ] || jQuery.find.attr;

	attrHandle[ name ] = function( elem, name, isXML ) {
		var ret, handle,
			lowercaseName = name.toLowerCase();

		if ( !isXML ) {

			// Avoid an infinite loop by temporarily removing this function from the getter
			handle = attrHandle[ lowercaseName ];
			attrHandle[ lowercaseName ] = ret;
			ret = getter( elem, name, isXML ) != null ?
				lowercaseName :
				null;
			attrHandle[ lowercaseName ] = handle;
		}
		return ret;
	};
} );




var rfocusable = /^(?:input|select|textarea|button)$/i,
	rclickable = /^(?:a|area)$/i;

jQuery.fn.extend( {
	prop: function( name, value ) {
		return access( this, jQuery.prop, name, value, arguments.length > 1 );
	},

	removeProp: function( name ) {
		return this.each( function() {
			delete this[ jQuery.propFix[ name ] || name ];
		} );
	}
} );

jQuery.extend( {
	prop: function( elem, name, value ) {
		var ret, hooks,
			nType = elem.nodeType;

		// Don't get/set properties on text, comment and attribute nodes
		if ( nType === 3 || nType === 8 || nType === 2 ) {
			return;
		}

		if ( nType !== 1 || !jQuery.isXMLDoc( elem ) ) {

			// Fix name and attach hooks
			name = jQuery.propFix[ name ] || name;
			hooks = jQuery.propHooks[ name ];
		}

		if ( value !== undefined ) {
			if ( hooks && "set" in hooks &&
				( ret = hooks.set( elem, value, name ) ) !== undefined ) {
				return ret;
			}

			return ( elem[ name ] = value );
		}

		if ( hooks && "get" in hooks && ( ret = hooks.get( elem, name ) ) !== null ) {
			return ret;
		}

		return elem[ name ];
	},

	propHooks: {
		tabIndex: {
			get: function( elem ) {

				// Support: IE <=9 - 11 only
				// elem.tabIndex doesn't always return the
				// correct value when it hasn't been explicitly set
				// https://web.archive.org/web/20141116233347/http://fluidproject.org/blog/2008/01/09/getting-setting-and-removing-tabindex-values-with-javascript/
				// Use proper attribute retrieval(#12072)
				var tabindex = jQuery.find.attr( elem, "tabindex" );

				if ( tabindex ) {
					return parseInt( tabindex, 10 );
				}

				if (
					rfocusable.test( elem.nodeName ) ||
					rclickable.test( elem.nodeName ) &&
					elem.href
				) {
					return 0;
				}

				return -1;
			}
		}
	},

	propFix: {
		"for": "htmlFor",
		"class": "className"
	}
} );

// Support: IE <=11 only
// Accessing the selectedIndex property
// forces the browser to respect setting selected
// on the option
// The getter ensures a default option is selected
// when in an optgroup
// eslint rule "no-unused-expressions" is disabled for this code
// since it considers such accessions noop
if ( !support.optSelected ) {
	jQuery.propHooks.selected = {
		get: function( elem ) {

			/* eslint no-unused-expressions: "off" */

			var parent = elem.parentNode;
			if ( parent && parent.parentNode ) {
				parent.parentNode.selectedIndex;
			}
			return null;
		},
		set: function( elem ) {

			/* eslint no-unused-expressions: "off" */

			var parent = elem.parentNode;
			if ( parent ) {
				parent.selectedIndex;

				if ( parent.parentNode ) {
					parent.parentNode.selectedIndex;
				}
			}
		}
	};
}

jQuery.each( [
	"tabIndex",
	"readOnly",
	"maxLength",
	"cellSpacing",
	"cellPadding",
	"rowSpan",
	"colSpan",
	"useMap",
	"frameBorder",
	"contentEditable"
], function() {
	jQuery.propFix[ this.toLowerCase() ] = this;
} );




	// Strip and collapse whitespace according to HTML spec
	// https://infra.spec.whatwg.org/#strip-and-collapse-ascii-whitespace
	function stripAndCollapse( value ) {
		var tokens = value.match( rnothtmlwhite ) || [];
		return tokens.join( " " );
	}


function getClass( elem ) {
	return elem.getAttribute && elem.getAttribute( "class" ) || "";
}

function classesToArray( value ) {
	if ( Array.isArray( value ) ) {
		return value;
	}
	if ( typeof value === "string" ) {
		return value.match( rnothtmlwhite ) || [];
	}
	return [];
}

jQuery.fn.extend( {
	addClass: function( value ) {
		var classes, elem, cur, curValue, clazz, j, finalValue,
			i = 0;

		if ( isFunction( value ) ) {
			return this.each( function( j ) {
				jQuery( this ).addClass( value.call( this, j, getClass( this ) ) );
			} );
		}

		classes = classesToArray( value );

		if ( classes.length ) {
			while ( ( elem = this[ i++ ] ) ) {
				curValue = getClass( elem );
				cur = elem.nodeType === 1 && ( " " + stripAndCollapse( curValue ) + " " );

				if ( cur ) {
					j = 0;
					while ( ( clazz = classes[ j++ ] ) ) {
						if ( cur.indexOf( " " + clazz + " " ) < 0 ) {
							cur += clazz + " ";
						}
					}

					// Only assign if different to avoid unneeded rendering.
					finalValue = stripAndCollapse( cur );
					if ( curValue !== finalValue ) {
						elem.setAttribute( "class", finalValue );
					}
				}
			}
		}

		return this;
	},

	removeClass: function( value ) {
		var classes, elem, cur, curValue, clazz, j, finalValue,
			i = 0;

		if ( isFunction( value ) ) {
			return this.each( function( j ) {
				jQuery( this ).removeClass( value.call( this, j, getClass( this ) ) );
			} );
		}

		if ( !arguments.length ) {
			return this.attr( "class", "" );
		}

		classes = classesToArray( value );

		if ( classes.length ) {
			while ( ( elem = this[ i++ ] ) ) {
				curValue = getClass( elem );

				// This expression is here for better compressibility (see addClass)
				cur = elem.nodeType === 1 && ( " " + stripAndCollapse( curValue ) + " " );

				if ( cur ) {
					j = 0;
					while ( ( clazz = classes[ j++ ] ) ) {

						// Remove *all* instances
						while ( cur.indexOf( " " + clazz + " " ) > -1 ) {
							cur = cur.replace( " " + clazz + " ", " " );
						}
					}

					// Only assign if different to avoid unneeded rendering.
					finalValue = stripAndCollapse( cur );
					if ( curValue !== finalValue ) {
						elem.setAttribute( "class", finalValue );
					}
				}
			}
		}

		return this;
	},

	toggleClass: function( value, stateVal ) {
		var type = typeof value,
			isValidValue = type === "string" || Array.isArray( value );

		if ( typeof stateVal === "boolean" && isValidValue ) {
			return stateVal ? this.addClass( value ) : this.removeClass( value );
		}

		if ( isFunction( value ) ) {
			return this.each( function( i ) {
				jQuery( this ).toggleClass(
					value.call( this, i, getClass( this ), stateVal ),
					stateVal
				);
			} );
		}

		return this.each( function() {
			var className, i, self, classNames;

			if ( isValidValue ) {

				// Toggle individual class names
				i = 0;
				self = jQuery( this );
				classNames = classesToArray( value );

				while ( ( className = classNames[ i++ ] ) ) {

					// Check each className given, space separated list
					if ( self.hasClass( className ) ) {
						self.removeClass( className );
					} else {
						self.addClass( className );
					}
				}

			// Toggle whole class name
			} else if ( value === undefined || type === "boolean" ) {
				className = getClass( this );
				if ( className ) {

					// Store className if set
					dataPriv.set( this, "__className__", className );
				}

				// If the element has a class name or if we're passed `false`,
				// then remove the whole classname (if there was one, the above saved it).
				// Otherwise bring back whatever was previously saved (if anything),
				// falling back to the empty string if nothing was stored.
				if ( this.setAttribute ) {
					this.setAttribute( "class",
						className || value === false ?
						"" :
						dataPriv.get( this, "__className__" ) || ""
					);
				}
			}
		} );
	},

	hasClass: function( selector ) {
		var className, elem,
			i = 0;

		className = " " + selector + " ";
		while ( ( elem = this[ i++ ] ) ) {
			if ( elem.nodeType === 1 &&
				( " " + stripAndCollapse( getClass( elem ) ) + " " ).indexOf( className ) > -1 ) {
					return true;
			}
		}

		return false;
	}
} );




var rreturn = /\r/g;

jQuery.fn.extend( {
	val: function( value ) {
		var hooks, ret, valueIsFunction,
			elem = this[ 0 ];

		if ( !arguments.length ) {
			if ( elem ) {
				hooks = jQuery.valHooks[ elem.type ] ||
					jQuery.valHooks[ elem.nodeName.toLowerCase() ];

				if ( hooks &&
					"get" in hooks &&
					( ret = hooks.get( elem, "value" ) ) !== undefined
				) {
					return ret;
				}

				ret = elem.value;

				// Handle most common string cases
				if ( typeof ret === "string" ) {
					return ret.replace( rreturn, "" );
				}

				// Handle cases where value is null/undef or number
				return ret == null ? "" : ret;
			}

			return;
		}

		valueIsFunction = isFunction( value );

		return this.each( function( i ) {
			var val;

			if ( this.nodeType !== 1 ) {
				return;
			}

			if ( valueIsFunction ) {
				val = value.call( this, i, jQuery( this ).val() );
			} else {
				val = value;
			}

			// Treat null/undefined as ""; convert numbers to string
			if ( val == null ) {
				val = "";

			} else if ( typeof val === "number" ) {
				val += "";

			} else if ( Array.isArray( val ) ) {
				val = jQuery.map( val, function( value ) {
					return value == null ? "" : value + "";
				} );
			}

			hooks = jQuery.valHooks[ this.type ] || jQuery.valHooks[ this.nodeName.toLowerCase() ];

			// If set returns undefined, fall back to normal setting
			if ( !hooks || !( "set" in hooks ) || hooks.set( this, val, "value" ) === undefined ) {
				this.value = val;
			}
		} );
	}
} );

jQuery.extend( {
	valHooks: {
		option: {
			get: function( elem ) {

				var val = jQuery.find.attr( elem, "value" );
				return val != null ?
					val :

					// Support: IE <=10 - 11 only
					// option.text throws exceptions (#14686, #14858)
					// Strip and collapse whitespace
					// https://html.spec.whatwg.org/#strip-and-collapse-whitespace
					stripAndCollapse( jQuery.text( elem ) );
			}
		},
		select: {
			get: function( elem ) {
				var value, option, i,
					options = elem.options,
					index = elem.selectedIndex,
					one = elem.type === "select-one",
					values = one ? null : [],
					max = one ? index + 1 : options.length;

				if ( index < 0 ) {
					i = max;

				} else {
					i = one ? index : 0;
				}

				// Loop through all the selected options
				for ( ; i < max; i++ ) {
					option = options[ i ];

					// Support: IE <=9 only
					// IE8-9 doesn't update selected after form reset (#2551)
					if ( ( option.selected || i === index ) &&

							// Don't return options that are disabled or in a disabled optgroup
							!option.disabled &&
							( !option.parentNode.disabled ||
								!nodeName( option.parentNode, "optgroup" ) ) ) {

						// Get the specific value for the option
						value = jQuery( option ).val();

						// We don't need an array for one selects
						if ( one ) {
							return value;
						}

						// Multi-Selects return an array
						values.push( value );
					}
				}

				return values;
			},

			set: function( elem, value ) {
				var optionSet, option,
					options = elem.options,
					values = jQuery.makeArray( value ),
					i = options.length;

				while ( i-- ) {
					option = options[ i ];

					/* eslint-disable no-cond-assign */

					if ( option.selected =
						jQuery.inArray( jQuery.valHooks.option.get( option ), values ) > -1
					) {
						optionSet = true;
					}

					/* eslint-enable no-cond-assign */
				}

				// Force browsers to behave consistently when non-matching value is set
				if ( !optionSet ) {
					elem.selectedIndex = -1;
				}
				return values;
			}
		}
	}
} );

// Radios and checkboxes getter/setter
jQuery.each( [ "radio", "checkbox" ], function() {
	jQuery.valHooks[ this ] = {
		set: function( elem, value ) {
			if ( Array.isArray( value ) ) {
				return ( elem.checked = jQuery.inArray( jQuery( elem ).val(), value ) > -1 );
			}
		}
	};
	if ( !support.checkOn ) {
		jQuery.valHooks[ this ].get = function( elem ) {
			return elem.getAttribute( "value" ) === null ? "on" : elem.value;
		};
	}
} );




// Return jQuery for attributes-only inclusion


support.focusin = "onfocusin" in window;


var rfocusMorph = /^(?:focusinfocus|focusoutblur)$/,
	stopPropagationCallback = function( e ) {
		e.stopPropagation();
	};

jQuery.extend( jQuery.event, {

	trigger: function( event, data, elem, onlyHandlers ) {

		var i, cur, tmp, bubbleType, ontype, handle, special, lastElement,
			eventPath = [ elem || document ],
			type = hasOwn.call( event, "type" ) ? event.type : event,
			namespaces = hasOwn.call( event, "namespace" ) ? event.namespace.split( "." ) : [];

		cur = lastElement = tmp = elem = elem || document;

		// Don't do events on text and comment nodes
		if ( elem.nodeType === 3 || elem.nodeType === 8 ) {
			return;
		}

		// focus/blur morphs to focusin/out; ensure we're not firing them right now
		if ( rfocusMorph.test( type + jQuery.event.triggered ) ) {
			return;
		}

		if ( type.indexOf( "." ) > -1 ) {

			// Namespaced trigger; create a regexp to match event type in handle()
			namespaces = type.split( "." );
			type = namespaces.shift();
			namespaces.sort();
		}
		ontype = type.indexOf( ":" ) < 0 && "on" + type;

		// Caller can pass in a jQuery.Event object, Object, or just an event type string
		event = event[ jQuery.expando ] ?
			event :
			new jQuery.Event( type, typeof event === "object" && event );

		// Trigger bitmask: & 1 for native handlers; & 2 for jQuery (always true)
		event.isTrigger = onlyHandlers ? 2 : 3;
		event.namespace = namespaces.join( "." );
		event.rnamespace = event.namespace ?
			new RegExp( "(^|\\.)" + namespaces.join( "\\.(?:.*\\.|)" ) + "(\\.|$)" ) :
			null;

		// Clean up the event in case it is being reused
		event.result = undefined;
		if ( !event.target ) {
			event.target = elem;
		}

		// Clone any incoming data and prepend the event, creating the handler arg list
		data = data == null ?
			[ event ] :
			jQuery.makeArray( data, [ event ] );

		// Allow special events to draw outside the lines
		special = jQuery.event.special[ type ] || {};
		if ( !onlyHandlers && special.trigger && special.trigger.apply( elem, data ) === false ) {
			return;
		}

		// Determine event propagation path in advance, per W3C events spec (#9951)
		// Bubble up to document, then to window; watch for a global ownerDocument var (#9724)
		if ( !onlyHandlers && !special.noBubble && !isWindow( elem ) ) {

			bubbleType = special.delegateType || type;
			if ( !rfocusMorph.test( bubbleType + type ) ) {
				cur = cur.parentNode;
			}
			for ( ; cur; cur = cur.parentNode ) {
				eventPath.push( cur );
				tmp = cur;
			}

			// Only add window if we got to document (e.g., not plain obj or detached DOM)
			if ( tmp === ( elem.ownerDocument || document ) ) {
				eventPath.push( tmp.defaultView || tmp.parentWindow || window );
			}
		}

		// Fire handlers on the event path
		i = 0;
		while ( ( cur = eventPath[ i++ ] ) && !event.isPropagationStopped() ) {
			lastElement = cur;
			event.type = i > 1 ?
				bubbleType :
				special.bindType || type;

			// jQuery handler
			handle = (
					dataPriv.get( cur, "events" ) || Object.create( null )
				)[ event.type ] &&
				dataPriv.get( cur, "handle" );
			if ( handle ) {
				handle.apply( cur, data );
			}

			// Native handler
			handle = ontype && cur[ ontype ];
			if ( handle && handle.apply && acceptData( cur ) ) {
				event.result = handle.apply( cur, data );
				if ( event.result === false ) {
					event.preventDefault();
				}
			}
		}
		event.type = type;

		// If nobody prevented the default action, do it now
		if ( !onlyHandlers && !event.isDefaultPrevented() ) {

			if ( ( !special._default ||
				special._default.apply( eventPath.pop(), data ) === false ) &&
				acceptData( elem ) ) {

				// Call a native DOM method on the target with the same name as the event.
				// Don't do default actions on window, that's where global variables be (#6170)
				if ( ontype && isFunction( elem[ type ] ) && !isWindow( elem ) ) {

					// Don't re-trigger an onFOO event when we call its FOO() method
					tmp = elem[ ontype ];

					if ( tmp ) {
						elem[ ontype ] = null;
					}

					// Prevent re-triggering of the same event, since we already bubbled it above
					jQuery.event.triggered = type;

					if ( event.isPropagationStopped() ) {
						lastElement.addEventListener( type, stopPropagationCallback );
					}

					elem[ type ]();

					if ( event.isPropagationStopped() ) {
						lastElement.removeEventListener( type, stopPropagationCallback );
					}

					jQuery.event.triggered = undefined;

					if ( tmp ) {
						elem[ ontype ] = tmp;
					}
				}
			}
		}

		return event.result;
	},

	// Piggyback on a donor event to simulate a different one
	// Used only for `focus(in | out)` events
	simulate: function( type, elem, event ) {
		var e = jQuery.extend(
			new jQuery.Event(),
			event,
			{
				type: type,
				isSimulated: true
			}
		);

		jQuery.event.trigger( e, null, elem );
	}

} );

jQuery.fn.extend( {

	trigger: function( type, data ) {
		return this.each( function() {
			jQuery.event.trigger( type, data, this );
		} );
	},
	triggerHandler: function( type, data ) {
		var elem = this[ 0 ];
		if ( elem ) {
			return jQuery.event.trigger( type, data, elem, true );
		}
	}
} );


// Support: Firefox <=44
// Firefox doesn't have focus(in | out) events
// Related ticket - https://bugzilla.mozilla.org/show_bug.cgi?id=687787
//
// Support: Chrome <=48 - 49, Safari <=9.0 - 9.1
// focus(in | out) events fire after focus & blur events,
// which is spec violation - http://www.w3.org/TR/DOM-Level-3-Events/#events-focusevent-event-order
// Related ticket - https://bugs.chromium.org/p/chromium/issues/detail?id=449857
if ( !support.focusin ) {
	jQuery.each( { focus: "focusin", blur: "focusout" }, function( orig, fix ) {

		// Attach a single capturing handler on the document while someone wants focusin/focusout
		var handler = function( event ) {
			jQuery.event.simulate( fix, event.target, jQuery.event.fix( event ) );
		};

		jQuery.event.special[ fix ] = {
			setup: function() {

				// Handle: regular nodes (via `this.ownerDocument`), window
				// (via `this.document`) & document (via `this`).
				var doc = this.ownerDocument || this.document || this,
					attaches = dataPriv.access( doc, fix );

				if ( !attaches ) {
					doc.addEventListener( orig, handler, true );
				}
				dataPriv.access( doc, fix, ( attaches || 0 ) + 1 );
			},
			teardown: function() {
				var doc = this.ownerDocument || this.document || this,
					attaches = dataPriv.access( doc, fix ) - 1;

				if ( !attaches ) {
					doc.removeEventListener( orig, handler, true );
					dataPriv.remove( doc, fix );

				} else {
					dataPriv.access( doc, fix, attaches );
				}
			}
		};
	} );
}
var location = window.location;

var nonce = { guid: Date.now() };

var rquery = ( /\?/ );



// Cross-browser xml parsing
jQuery.parseXML = function( data ) {
	var xml;
	if ( !data || typeof data !== "string" ) {
		return null;
	}

	// Support: IE 9 - 11 only
	// IE throws on parseFromString with invalid input.
	try {
		xml = ( new window.DOMParser() ).parseFromString( data, "text/xml" );
	} catch ( e ) {
		xml = undefined;
	}

	if ( !xml || xml.getElementsByTagName( "parsererror" ).length ) {
		jQuery.error( "Invalid XML: " + data );
	}
	return xml;
};


var
	rbracket = /\[\]$/,
	rCRLF = /\r?\n/g,
	rsubmitterTypes = /^(?:submit|button|image|reset|file)$/i,
	rsubmittable = /^(?:input|select|textarea|keygen)/i;

function buildParams( prefix, obj, traditional, add ) {
	var name;

	if ( Array.isArray( obj ) ) {

		// Serialize array item.
		jQuery.each( obj, function( i, v ) {
			if ( traditional || rbracket.test( prefix ) ) {

				// Treat each array item as a scalar.
				add( prefix, v );

			} else {

				// Item is non-scalar (array or object), encode its numeric index.
				buildParams(
					prefix + "[" + ( typeof v === "object" && v != null ? i : "" ) + "]",
					v,
					traditional,
					add
				);
			}
		} );

	} else if ( !traditional && toType( obj ) === "object" ) {

		// Serialize object item.
		for ( name in obj ) {
			buildParams( prefix + "[" + name + "]", obj[ name ], traditional, add );
		}

	} else {

		// Serialize scalar item.
		add( prefix, obj );
	}
}

// Serialize an array of form elements or a set of
// key/values into a query string
jQuery.param = function( a, traditional ) {
	var prefix,
		s = [],
		add = function( key, valueOrFunction ) {

			// If value is a function, invoke it and use its return value
			var value = isFunction( valueOrFunction ) ?
				valueOrFunction() :
				valueOrFunction;

			s[ s.length ] = encodeURIComponent( key ) + "=" +
				encodeURIComponent( value == null ? "" : value );
		};

	if ( a == null ) {
		return "";
	}

	// If an array was passed in, assume that it is an array of form elements.
	if ( Array.isArray( a ) || ( a.jquery && !jQuery.isPlainObject( a ) ) ) {

		// Serialize the form elements
		jQuery.each( a, function() {
			add( this.name, this.value );
		} );

	} else {

		// If traditional, encode the "old" way (the way 1.3.2 or older
		// did it), otherwise encode params recursively.
		for ( prefix in a ) {
			buildParams( prefix, a[ prefix ], traditional, add );
		}
	}

	// Return the resulting serialization
	return s.join( "&" );
};

jQuery.fn.extend( {
	serialize: function() {
		return jQuery.param( this.serializeArray() );
	},
	serializeArray: function() {
		return this.map( function() {

			// Can add propHook for "elements" to filter or add form elements
			var elements = jQuery.prop( this, "elements" );
			return elements ? jQuery.makeArray( elements ) : this;
		} )
		.filter( function() {
			var type = this.type;

			// Use .is( ":disabled" ) so that fieldset[disabled] works
			return this.name && !jQuery( this ).is( ":disabled" ) &&
				rsubmittable.test( this.nodeName ) && !rsubmitterTypes.test( type ) &&
				( this.checked || !rcheckableType.test( type ) );
		} )
		.map( function( _i, elem ) {
			var val = jQuery( this ).val();

			if ( val == null ) {
				return null;
			}

			if ( Array.isArray( val ) ) {
				return jQuery.map( val, function( val ) {
					return { name: elem.name, value: val.replace( rCRLF, "\r\n" ) };
				} );
			}

			return { name: elem.name, value: val.replace( rCRLF, "\r\n" ) };
		} ).get();
	}
} );


var
	r20 = /%20/g,
	rhash = /#.*$/,
	rantiCache = /([?&])_=[^&]*/,
	rheaders = /^(.*?):[ \t]*([^\r\n]*)$/mg,

	// #7653, #8125, #8152: local protocol detection
	rlocalProtocol = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
	rnoContent = /^(?:GET|HEAD)$/,
	rprotocol = /^\/\//,

	/* Prefilters
	 * 1) They are useful to introduce custom dataTypes (see ajax/jsonp.js for an example)
	 * 2) These are called:
	 *    - BEFORE asking for a transport
	 *    - AFTER param serialization (s.data is a string if s.processData is true)
	 * 3) key is the dataType
	 * 4) the catchall symbol "*" can be used
	 * 5) execution will start with transport dataType and THEN continue down to "*" if needed
	 */
	prefilters = {},

	/* Transports bindings
	 * 1) key is the dataType
	 * 2) the catchall symbol "*" can be used
	 * 3) selection will start with transport dataType and THEN go to "*" if needed
	 */
	transports = {},

	// Avoid comment-prolog char sequence (#10098); must appease lint and evade compression
	allTypes = "*/".concat( "*" ),

	// Anchor tag for parsing the document origin
	originAnchor = document.createElement( "a" );
	originAnchor.href = location.href;

// Base "constructor" for jQuery.ajaxPrefilter and jQuery.ajaxTransport
function addToPrefiltersOrTransports( structure ) {

	// dataTypeExpression is optional and defaults to "*"
	return function( dataTypeExpression, func ) {

		if ( typeof dataTypeExpression !== "string" ) {
			func = dataTypeExpression;
			dataTypeExpression = "*";
		}

		var dataType,
			i = 0,
			dataTypes = dataTypeExpression.toLowerCase().match( rnothtmlwhite ) || [];

		if ( isFunction( func ) ) {

			// For each dataType in the dataTypeExpression
			while ( ( dataType = dataTypes[ i++ ] ) ) {

				// Prepend if requested
				if ( dataType[ 0 ] === "+" ) {
					dataType = dataType.slice( 1 ) || "*";
					( structure[ dataType ] = structure[ dataType ] || [] ).unshift( func );

				// Otherwise append
				} else {
					( structure[ dataType ] = structure[ dataType ] || [] ).push( func );
				}
			}
		}
	};
}

// Base inspection function for prefilters and transports
function inspectPrefiltersOrTransports( structure, options, originalOptions, jqXHR ) {

	var inspected = {},
		seekingTransport = ( structure === transports );

	function inspect( dataType ) {
		var selected;
		inspected[ dataType ] = true;
		jQuery.each( structure[ dataType ] || [], function( _, prefilterOrFactory ) {
			var dataTypeOrTransport = prefilterOrFactory( options, originalOptions, jqXHR );
			if ( typeof dataTypeOrTransport === "string" &&
				!seekingTransport && !inspected[ dataTypeOrTransport ] ) {

				options.dataTypes.unshift( dataTypeOrTransport );
				inspect( dataTypeOrTransport );
				return false;
			} else if ( seekingTransport ) {
				return !( selected = dataTypeOrTransport );
			}
		} );
		return selected;
	}

	return inspect( options.dataTypes[ 0 ] ) || !inspected[ "*" ] && inspect( "*" );
}

// A special extend for ajax options
// that takes "flat" options (not to be deep extended)
// Fixes #9887
function ajaxExtend( target, src ) {
	var key, deep,
		flatOptions = jQuery.ajaxSettings.flatOptions || {};

	for ( key in src ) {
		if ( src[ key ] !== undefined ) {
			( flatOptions[ key ] ? target : ( deep || ( deep = {} ) ) )[ key ] = src[ key ];
		}
	}
	if ( deep ) {
		jQuery.extend( true, target, deep );
	}

	return target;
}

/* Handles responses to an ajax request:
 * - finds the right dataType (mediates between content-type and expected dataType)
 * - returns the corresponding response
 */
function ajaxHandleResponses( s, jqXHR, responses ) {

	var ct, type, finalDataType, firstDataType,
		contents = s.contents,
		dataTypes = s.dataTypes;

	// Remove auto dataType and get content-type in the process
	while ( dataTypes[ 0 ] === "*" ) {
		dataTypes.shift();
		if ( ct === undefined ) {
			ct = s.mimeType || jqXHR.getResponseHeader( "Content-Type" );
		}
	}

	// Check if we're dealing with a known content-type
	if ( ct ) {
		for ( type in contents ) {
			if ( contents[ type ] && contents[ type ].test( ct ) ) {
				dataTypes.unshift( type );
				break;
			}
		}
	}

	// Check to see if we have a response for the expected dataType
	if ( dataTypes[ 0 ] in responses ) {
		finalDataType = dataTypes[ 0 ];
	} else {

		// Try convertible dataTypes
		for ( type in responses ) {
			if ( !dataTypes[ 0 ] || s.converters[ type + " " + dataTypes[ 0 ] ] ) {
				finalDataType = type;
				break;
			}
			if ( !firstDataType ) {
				firstDataType = type;
			}
		}

		// Or just use first one
		finalDataType = finalDataType || firstDataType;
	}

	// If we found a dataType
	// We add the dataType to the list if needed
	// and return the corresponding response
	if ( finalDataType ) {
		if ( finalDataType !== dataTypes[ 0 ] ) {
			dataTypes.unshift( finalDataType );
		}
		return responses[ finalDataType ];
	}
}

/* Chain conversions given the request and the original response
 * Also sets the responseXXX fields on the jqXHR instance
 */
function ajaxConvert( s, response, jqXHR, isSuccess ) {
	var conv2, current, conv, tmp, prev,
		converters = {},

		// Work with a copy of dataTypes in case we need to modify it for conversion
		dataTypes = s.dataTypes.slice();

	// Create converters map with lowercased keys
	if ( dataTypes[ 1 ] ) {
		for ( conv in s.converters ) {
			converters[ conv.toLowerCase() ] = s.converters[ conv ];
		}
	}

	current = dataTypes.shift();

	// Convert to each sequential dataType
	while ( current ) {

		if ( s.responseFields[ current ] ) {
			jqXHR[ s.responseFields[ current ] ] = response;
		}

		// Apply the dataFilter if provided
		if ( !prev && isSuccess && s.dataFilter ) {
			response = s.dataFilter( response, s.dataType );
		}

		prev = current;
		current = dataTypes.shift();

		if ( current ) {

			// There's only work to do if current dataType is non-auto
			if ( current === "*" ) {

				current = prev;

			// Convert response if prev dataType is non-auto and differs from current
			} else if ( prev !== "*" && prev !== current ) {

				// Seek a direct converter
				conv = converters[ prev + " " + current ] || converters[ "* " + current ];

				// If none found, seek a pair
				if ( !conv ) {
					for ( conv2 in converters ) {

						// If conv2 outputs current
						tmp = conv2.split( " " );
						if ( tmp[ 1 ] === current ) {

							// If prev can be converted to accepted input
							conv = converters[ prev + " " + tmp[ 0 ] ] ||
								converters[ "* " + tmp[ 0 ] ];
							if ( conv ) {

								// Condense equivalence converters
								if ( conv === true ) {
									conv = converters[ conv2 ];

								// Otherwise, insert the intermediate dataType
								} else if ( converters[ conv2 ] !== true ) {
									current = tmp[ 0 ];
									dataTypes.unshift( tmp[ 1 ] );
								}
								break;
							}
						}
					}
				}

				// Apply converter (if not an equivalence)
				if ( conv !== true ) {

					// Unless errors are allowed to bubble, catch and return them
					if ( conv && s.throws ) {
						response = conv( response );
					} else {
						try {
							response = conv( response );
						} catch ( e ) {
							return {
								state: "parsererror",
								error: conv ? e : "No conversion from " + prev + " to " + current
							};
						}
					}
				}
			}
		}
	}

	return { state: "success", data: response };
}

jQuery.extend( {

	// Counter for holding the number of active queries
	active: 0,

	// Last-Modified header cache for next request
	lastModified: {},
	etag: {},

	ajaxSettings: {
		url: location.href,
		type: "GET",
		isLocal: rlocalProtocol.test( location.protocol ),
		global: true,
		processData: true,
		async: true,
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",

		/*
		timeout: 0,
		data: null,
		dataType: null,
		username: null,
		password: null,
		cache: null,
		throws: false,
		traditional: false,
		headers: {},
		*/

		accepts: {
			"*": allTypes,
			text: "text/plain",
			html: "text/html",
			xml: "application/xml, text/xml",
			json: "application/json, text/javascript"
		},

		contents: {
			xml: /\bxml\b/,
			html: /\bhtml/,
			json: /\bjson\b/
		},

		responseFields: {
			xml: "responseXML",
			text: "responseText",
			json: "responseJSON"
		},

		// Data converters
		// Keys separate source (or catchall "*") and destination types with a single space
		converters: {

			// Convert anything to text
			"* text": String,

			// Text to html (true = no transformation)
			"text html": true,

			// Evaluate text as a json expression
			"text json": JSON.parse,

			// Parse text as xml
			"text xml": jQuery.parseXML
		},

		// For options that shouldn't be deep extended:
		// you can add your own custom options here if
		// and when you create one that shouldn't be
		// deep extended (see ajaxExtend)
		flatOptions: {
			url: true,
			context: true
		}
	},

	// Creates a full fledged settings object into target
	// with both ajaxSettings and settings fields.
	// If target is omitted, writes into ajaxSettings.
	ajaxSetup: function( target, settings ) {
		return settings ?

			// Building a settings object
			ajaxExtend( ajaxExtend( target, jQuery.ajaxSettings ), settings ) :

			// Extending ajaxSettings
			ajaxExtend( jQuery.ajaxSettings, target );
	},

	ajaxPrefilter: addToPrefiltersOrTransports( prefilters ),
	ajaxTransport: addToPrefiltersOrTransports( transports ),

	// Main method
	ajax: function( url, options ) {

		// If url is an object, simulate pre-1.5 signature
		if ( typeof url === "object" ) {
			options = url;
			url = undefined;
		}

		// Force options to be an object
		options = options || {};

		var transport,

			// URL without anti-cache param
			cacheURL,

			// Response headers
			responseHeadersString,
			responseHeaders,

			// timeout handle
			timeoutTimer,

			// Url cleanup var
			urlAnchor,

			// Request state (becomes false upon send and true upon completion)
			completed,

			// To know if global events are to be dispatched
			fireGlobals,

			// Loop variable
			i,

			// uncached part of the url
			uncached,

			// Create the final options object
			s = jQuery.ajaxSetup( {}, options ),

			// Callbacks context
			callbackContext = s.context || s,

			// Context for global events is callbackContext if it is a DOM node or jQuery collection
			globalEventContext = s.context &&
				( callbackContext.nodeType || callbackContext.jquery ) ?
					jQuery( callbackContext ) :
					jQuery.event,

			// Deferreds
			deferred = jQuery.Deferred(),
			completeDeferred = jQuery.Callbacks( "once memory" ),

			// Status-dependent callbacks
			statusCode = s.statusCode || {},

			// Headers (they are sent all at once)
			requestHeaders = {},
			requestHeadersNames = {},

			// Default abort message
			strAbort = "canceled",

			// Fake xhr
			jqXHR = {
				readyState: 0,

				// Builds headers hashtable if needed
				getResponseHeader: function( key ) {
					var match;
					if ( completed ) {
						if ( !responseHeaders ) {
							responseHeaders = {};
							while ( ( match = rheaders.exec( responseHeadersString ) ) ) {
								responseHeaders[ match[ 1 ].toLowerCase() + " " ] =
									( responseHeaders[ match[ 1 ].toLowerCase() + " " ] || [] )
										.concat( match[ 2 ] );
							}
						}
						match = responseHeaders[ key.toLowerCase() + " " ];
					}
					return match == null ? null : match.join( ", " );
				},

				// Raw string
				getAllResponseHeaders: function() {
					return completed ? responseHeadersString : null;
				},

				// Caches the header
				setRequestHeader: function( name, value ) {
					if ( completed == null ) {
						name = requestHeadersNames[ name.toLowerCase() ] =
							requestHeadersNames[ name.toLowerCase() ] || name;
						requestHeaders[ name ] = value;
					}
					return this;
				},

				// Overrides response content-type header
				overrideMimeType: function( type ) {
					if ( completed == null ) {
						s.mimeType = type;
					}
					return this;
				},

				// Status-dependent callbacks
				statusCode: function( map ) {
					var code;
					if ( map ) {
						if ( completed ) {

							// Execute the appropriate callbacks
							jqXHR.always( map[ jqXHR.status ] );
						} else {

							// Lazy-add the new callbacks in a way that preserves old ones
							for ( code in map ) {
								statusCode[ code ] = [ statusCode[ code ], map[ code ] ];
							}
						}
					}
					return this;
				},

				// Cancel the request
				abort: function( statusText ) {
					var finalText = statusText || strAbort;
					if ( transport ) {
						transport.abort( finalText );
					}
					done( 0, finalText );
					return this;
				}
			};

		// Attach deferreds
		deferred.promise( jqXHR );

		// Add protocol if not provided (prefilters might expect it)
		// Handle falsy url in the settings object (#10093: consistency with old signature)
		// We also use the url parameter if available
		s.url = ( ( url || s.url || location.href ) + "" )
			.replace( rprotocol, location.protocol + "//" );

		// Alias method option to type as per ticket #12004
		s.type = options.method || options.type || s.method || s.type;

		// Extract dataTypes list
		s.dataTypes = ( s.dataType || "*" ).toLowerCase().match( rnothtmlwhite ) || [ "" ];

		// A cross-domain request is in order when the origin doesn't match the current origin.
		if ( s.crossDomain == null ) {
			urlAnchor = document.createElement( "a" );

			// Support: IE <=8 - 11, Edge 12 - 15
			// IE throws exception on accessing the href property if url is malformed,
			// e.g. http://example.com:80x/
			try {
				urlAnchor.href = s.url;

				// Support: IE <=8 - 11 only
				// Anchor's host property isn't correctly set when s.url is relative
				urlAnchor.href = urlAnchor.href;
				s.crossDomain = originAnchor.protocol + "//" + originAnchor.host !==
					urlAnchor.protocol + "//" + urlAnchor.host;
			} catch ( e ) {

				// If there is an error parsing the URL, assume it is crossDomain,
				// it can be rejected by the transport if it is invalid
				s.crossDomain = true;
			}
		}

		// Convert data if not already a string
		if ( s.data && s.processData && typeof s.data !== "string" ) {
			s.data = jQuery.param( s.data, s.traditional );
		}

		// Apply prefilters
		inspectPrefiltersOrTransports( prefilters, s, options, jqXHR );

		// If request was aborted inside a prefilter, stop there
		if ( completed ) {
			return jqXHR;
		}

		// We can fire global events as of now if asked to
		// Don't fire events if jQuery.event is undefined in an AMD-usage scenario (#15118)
		fireGlobals = jQuery.event && s.global;

		// Watch for a new set of requests
		if ( fireGlobals && jQuery.active++ === 0 ) {
			jQuery.event.trigger( "ajaxStart" );
		}

		// Uppercase the type
		s.type = s.type.toUpperCase();

		// Determine if request has content
		s.hasContent = !rnoContent.test( s.type );

		// Save the URL in case we're toying with the If-Modified-Since
		// and/or If-None-Match header later on
		// Remove hash to simplify url manipulation
		cacheURL = s.url.replace( rhash, "" );

		// More options handling for requests with no content
		if ( !s.hasContent ) {

			// Remember the hash so we can put it back
			uncached = s.url.slice( cacheURL.length );

			// If data is available and should be processed, append data to url
			if ( s.data && ( s.processData || typeof s.data === "string" ) ) {
				cacheURL += ( rquery.test( cacheURL ) ? "&" : "?" ) + s.data;

				// #9682: remove data so that it's not used in an eventual retry
				delete s.data;
			}

			// Add or update anti-cache param if needed
			if ( s.cache === false ) {
				cacheURL = cacheURL.replace( rantiCache, "$1" );
				uncached = ( rquery.test( cacheURL ) ? "&" : "?" ) + "_=" + ( nonce.guid++ ) +
					uncached;
			}

			// Put hash and anti-cache on the URL that will be requested (gh-1732)
			s.url = cacheURL + uncached;

		// Change '%20' to '+' if this is encoded form body content (gh-2658)
		} else if ( s.data && s.processData &&
			( s.contentType || "" ).indexOf( "application/x-www-form-urlencoded" ) === 0 ) {
			s.data = s.data.replace( r20, "+" );
		}

		// Set the If-Modified-Since and/or If-None-Match header, if in ifModified mode.
		if ( s.ifModified ) {
			if ( jQuery.lastModified[ cacheURL ] ) {
				jqXHR.setRequestHeader( "If-Modified-Since", jQuery.lastModified[ cacheURL ] );
			}
			if ( jQuery.etag[ cacheURL ] ) {
				jqXHR.setRequestHeader( "If-None-Match", jQuery.etag[ cacheURL ] );
			}
		}

		// Set the correct header, if data is being sent
		if ( s.data && s.hasContent && s.contentType !== false || options.contentType ) {
			jqXHR.setRequestHeader( "Content-Type", s.contentType );
		}

		// Set the Accepts header for the server, depending on the dataType
		jqXHR.setRequestHeader(
			"Accept",
			s.dataTypes[ 0 ] && s.accepts[ s.dataTypes[ 0 ] ] ?
				s.accepts[ s.dataTypes[ 0 ] ] +
					( s.dataTypes[ 0 ] !== "*" ? ", " + allTypes + "; q=0.01" : "" ) :
				s.accepts[ "*" ]
		);

		// Check for headers option
		for ( i in s.headers ) {
			jqXHR.setRequestHeader( i, s.headers[ i ] );
		}

		// Allow custom headers/mimetypes and early abort
		if ( s.beforeSend &&
			( s.beforeSend.call( callbackContext, jqXHR, s ) === false || completed ) ) {

			// Abort if not done already and return
			return jqXHR.abort();
		}

		// Aborting is no longer a cancellation
		strAbort = "abort";

		// Install callbacks on deferreds
		completeDeferred.add( s.complete );
		jqXHR.done( s.success );
		jqXHR.fail( s.error );

		// Get transport
		transport = inspectPrefiltersOrTransports( transports, s, options, jqXHR );

		// If no transport, we auto-abort
		if ( !transport ) {
			done( -1, "No Transport" );
		} else {
			jqXHR.readyState = 1;

			// Send global event
			if ( fireGlobals ) {
				globalEventContext.trigger( "ajaxSend", [ jqXHR, s ] );
			}

			// If request was aborted inside ajaxSend, stop there
			if ( completed ) {
				return jqXHR;
			}

			// Timeout
			if ( s.async && s.timeout > 0 ) {
				timeoutTimer = window.setTimeout( function() {
					jqXHR.abort( "timeout" );
				}, s.timeout );
			}

			try {
				completed = false;
				transport.send( requestHeaders, done );
			} catch ( e ) {

				// Rethrow post-completion exceptions
				if ( completed ) {
					throw e;
				}

				// Propagate others as results
				done( -1, e );
			}
		}

		// Callback for when everything is done
		function done( status, nativeStatusText, responses, headers ) {
			var isSuccess, success, error, response, modified,
				statusText = nativeStatusText;

			// Ignore repeat invocations
			if ( completed ) {
				return;
			}

			completed = true;

			// Clear timeout if it exists
			if ( timeoutTimer ) {
				window.clearTimeout( timeoutTimer );
			}

			// Dereference transport for early garbage collection
			// (no matter how long the jqXHR object will be used)
			transport = undefined;

			// Cache response headers
			responseHeadersString = headers || "";

			// Set readyState
			jqXHR.readyState = status > 0 ? 4 : 0;

			// Determine if successful
			isSuccess = status >= 200 && status < 300 || status === 304;

			// Get response data
			if ( responses ) {
				response = ajaxHandleResponses( s, jqXHR, responses );
			}

			// Use a noop converter for missing script
			if ( !isSuccess && jQuery.inArray( "script", s.dataTypes ) > -1 ) {
				s.converters[ "text script" ] = function() {};
			}

			// Convert no matter what (that way responseXXX fields are always set)
			response = ajaxConvert( s, response, jqXHR, isSuccess );

			// If successful, handle type chaining
			if ( isSuccess ) {

				// Set the If-Modified-Since and/or If-None-Match header, if in ifModified mode.
				if ( s.ifModified ) {
					modified = jqXHR.getResponseHeader( "Last-Modified" );
					if ( modified ) {
						jQuery.lastModified[ cacheURL ] = modified;
					}
					modified = jqXHR.getResponseHeader( "etag" );
					if ( modified ) {
						jQuery.etag[ cacheURL ] = modified;
					}
				}

				// if no content
				if ( status === 204 || s.type === "HEAD" ) {
					statusText = "nocontent";

				// if not modified
				} else if ( status === 304 ) {
					statusText = "notmodified";

				// If we have data, let's convert it
				} else {
					statusText = response.state;
					success = response.data;
					error = response.error;
					isSuccess = !error;
				}
			} else {

				// Extract error from statusText and normalize for non-aborts
				error = statusText;
				if ( status || !statusText ) {
					statusText = "error";
					if ( status < 0 ) {
						status = 0;
					}
				}
			}

			// Set data for the fake xhr object
			jqXHR.status = status;
			jqXHR.statusText = ( nativeStatusText || statusText ) + "";

			// Success/Error
			if ( isSuccess ) {
				deferred.resolveWith( callbackContext, [ success, statusText, jqXHR ] );
			} else {
				deferred.rejectWith( callbackContext, [ jqXHR, statusText, error ] );
			}

			// Status-dependent callbacks
			jqXHR.statusCode( statusCode );
			statusCode = undefined;

			if ( fireGlobals ) {
				globalEventContext.trigger( isSuccess ? "ajaxSuccess" : "ajaxError",
					[ jqXHR, s, isSuccess ? success : error ] );
			}

			// Complete
			completeDeferred.fireWith( callbackContext, [ jqXHR, statusText ] );

			if ( fireGlobals ) {
				globalEventContext.trigger( "ajaxComplete", [ jqXHR, s ] );

				// Handle the global AJAX counter
				if ( !( --jQuery.active ) ) {
					jQuery.event.trigger( "ajaxStop" );
				}
			}
		}

		return jqXHR;
	},

	getJSON: function( url, data, callback ) {
		return jQuery.get( url, data, callback, "json" );
	},

	getScript: function( url, callback ) {
		return jQuery.get( url, undefined, callback, "script" );
	}
} );

jQuery.each( [ "get", "post" ], function( _i, method ) {
	jQuery[ method ] = function( url, data, callback, type ) {

		// Shift arguments if data argument was omitted
		if ( isFunction( data ) ) {
			type = type || callback;
			callback = data;
			data = undefined;
		}

		// The url can be an options object (which then must have .url)
		return jQuery.ajax( jQuery.extend( {
			url: url,
			type: method,
			dataType: type,
			data: data,
			success: callback
		}, jQuery.isPlainObject( url ) && url ) );
	};
} );

jQuery.ajaxPrefilter( function( s ) {
	var i;
	for ( i in s.headers ) {
		if ( i.toLowerCase() === "content-type" ) {
			s.contentType = s.headers[ i ] || "";
		}
	}
} );


jQuery._evalUrl = function( url, options, doc ) {
	return jQuery.ajax( {
		url: url,

		// Make this explicit, since user can override this through ajaxSetup (#11264)
		type: "GET",
		dataType: "script",
		cache: true,
		async: false,
		global: false,

		// Only evaluate the response if it is successful (gh-4126)
		// dataFilter is not invoked for failure responses, so using it instead
		// of the default converter is kludgy but it works.
		converters: {
			"text script": function() {}
		},
		dataFilter: function( response ) {
			jQuery.globalEval( response, options, doc );
		}
	} );
};


jQuery.fn.extend( {
	wrapAll: function( html ) {
		var wrap;

		if ( this[ 0 ] ) {
			if ( isFunction( html ) ) {
				html = html.call( this[ 0 ] );
			}

			// The elements to wrap the target around
			wrap = jQuery( html, this[ 0 ].ownerDocument ).eq( 0 ).clone( true );

			if ( this[ 0 ].parentNode ) {
				wrap.insertBefore( this[ 0 ] );
			}

			wrap.map( function() {
				var elem = this;

				while ( elem.firstElementChild ) {
					elem = elem.firstElementChild;
				}

				return elem;
			} ).append( this );
		}

		return this;
	},

	wrapInner: function( html ) {
		if ( isFunction( html ) ) {
			return this.each( function( i ) {
				jQuery( this ).wrapInner( html.call( this, i ) );
			} );
		}

		return this.each( function() {
			var self = jQuery( this ),
				contents = self.contents();

			if ( contents.length ) {
				contents.wrapAll( html );

			} else {
				self.append( html );
			}
		} );
	},

	wrap: function( html ) {
		var htmlIsFunction = isFunction( html );

		return this.each( function( i ) {
			jQuery( this ).wrapAll( htmlIsFunction ? html.call( this, i ) : html );
		} );
	},

	unwrap: function( selector ) {
		this.parent( selector ).not( "body" ).each( function() {
			jQuery( this ).replaceWith( this.childNodes );
		} );
		return this;
	}
} );


jQuery.expr.pseudos.hidden = function( elem ) {
	return !jQuery.expr.pseudos.visible( elem );
};
jQuery.expr.pseudos.visible = function( elem ) {
	return !!( elem.offsetWidth || elem.offsetHeight || elem.getClientRects().length );
};




jQuery.ajaxSettings.xhr = function() {
	try {
		return new window.XMLHttpRequest();
	} catch ( e ) {}
};

var xhrSuccessStatus = {

		// File protocol always yields status code 0, assume 200
		0: 200,

		// Support: IE <=9 only
		// #1450: sometimes IE returns 1223 when it should be 204
		1223: 204
	},
	xhrSupported = jQuery.ajaxSettings.xhr();

support.cors = !!xhrSupported && ( "withCredentials" in xhrSupported );
support.ajax = xhrSupported = !!xhrSupported;

jQuery.ajaxTransport( function( options ) {
	var callback, errorCallback;

	// Cross domain only allowed if supported through XMLHttpRequest
	if ( support.cors || xhrSupported && !options.crossDomain ) {
		return {
			send: function( headers, complete ) {
				var i,
					xhr = options.xhr();

				xhr.open(
					options.type,
					options.url,
					options.async,
					options.username,
					options.password
				);

				// Apply custom fields if provided
				if ( options.xhrFields ) {
					for ( i in options.xhrFields ) {
						xhr[ i ] = options.xhrFields[ i ];
					}
				}

				// Override mime type if needed
				if ( options.mimeType && xhr.overrideMimeType ) {
					xhr.overrideMimeType( options.mimeType );
				}

				// X-Requested-With header
				// For cross-domain requests, seeing as conditions for a preflight are
				// akin to a jigsaw puzzle, we simply never set it to be sure.
				// (it can always be set on a per-request basis or even using ajaxSetup)
				// For same-domain requests, won't change header if already provided.
				if ( !options.crossDomain && !headers[ "X-Requested-With" ] ) {
					headers[ "X-Requested-With" ] = "XMLHttpRequest";
				}

				// Set headers
				for ( i in headers ) {
					xhr.setRequestHeader( i, headers[ i ] );
				}

				// Callback
				callback = function( type ) {
					return function() {
						if ( callback ) {
							callback = errorCallback = xhr.onload =
								xhr.onerror = xhr.onabort = xhr.ontimeout =
									xhr.onreadystatechange = null;

							if ( type === "abort" ) {
								xhr.abort();
							} else if ( type === "error" ) {

								// Support: IE <=9 only
								// On a manual native abort, IE9 throws
								// errors on any property access that is not readyState
								if ( typeof xhr.status !== "number" ) {
									complete( 0, "error" );
								} else {
									complete(

										// File: protocol always yields status 0; see #8605, #14207
										xhr.status,
										xhr.statusText
									);
								}
							} else {
								complete(
									xhrSuccessStatus[ xhr.status ] || xhr.status,
									xhr.statusText,

									// Support: IE <=9 only
									// IE9 has no XHR2 but throws on binary (trac-11426)
									// For XHR2 non-text, let the caller handle it (gh-2498)
									( xhr.responseType || "text" ) !== "text"  ||
									typeof xhr.responseText !== "string" ?
										{ binary: xhr.response } :
										{ text: xhr.responseText },
									xhr.getAllResponseHeaders()
								);
							}
						}
					};
				};

				// Listen to events
				xhr.onload = callback();
				errorCallback = xhr.onerror = xhr.ontimeout = callback( "error" );

				// Support: IE 9 only
				// Use onreadystatechange to replace onabort
				// to handle uncaught aborts
				if ( xhr.onabort !== undefined ) {
					xhr.onabort = errorCallback;
				} else {
					xhr.onreadystatechange = function() {

						// Check readyState before timeout as it changes
						if ( xhr.readyState === 4 ) {

							// Allow onerror to be called first,
							// but that will not handle a native abort
							// Also, save errorCallback to a variable
							// as xhr.onerror cannot be accessed
							window.setTimeout( function() {
								if ( callback ) {
									errorCallback();
								}
							} );
						}
					};
				}

				// Create the abort callback
				callback = callback( "abort" );

				try {

					// Do send the request (this may raise an exception)
					xhr.send( options.hasContent && options.data || null );
				} catch ( e ) {

					// #14683: Only rethrow if this hasn't been notified as an error yet
					if ( callback ) {
						throw e;
					}
				}
			},

			abort: function() {
				if ( callback ) {
					callback();
				}
			}
		};
	}
} );




// Prevent auto-execution of scripts when no explicit dataType was provided (See gh-2432)
jQuery.ajaxPrefilter( function( s ) {
	if ( s.crossDomain ) {
		s.contents.script = false;
	}
} );

// Install script dataType
jQuery.ajaxSetup( {
	accepts: {
		script: "text/javascript, application/javascript, " +
			"application/ecmascript, application/x-ecmascript"
	},
	contents: {
		script: /\b(?:java|ecma)script\b/
	},
	converters: {
		"text script": function( text ) {
			jQuery.globalEval( text );
			return text;
		}
	}
} );

// Handle cache's special case and crossDomain
jQuery.ajaxPrefilter( "script", function( s ) {
	if ( s.cache === undefined ) {
		s.cache = false;
	}
	if ( s.crossDomain ) {
		s.type = "GET";
	}
} );

// Bind script tag hack transport
jQuery.ajaxTransport( "script", function( s ) {

	// This transport only deals with cross domain or forced-by-attrs requests
	if ( s.crossDomain || s.scriptAttrs ) {
		var script, callback;
		return {
			send: function( _, complete ) {
				script = jQuery( "<script>" )
					.attr( s.scriptAttrs || {} )
					.prop( { charset: s.scriptCharset, src: s.url } )
					.on( "load error", callback = function( evt ) {
						script.remove();
						callback = null;
						if ( evt ) {
							complete( evt.type === "error" ? 404 : 200, evt.type );
						}
					} );

				// Use native DOM manipulation to avoid our domManip AJAX trickery
				document.head.appendChild( script[ 0 ] );
			},
			abort: function() {
				if ( callback ) {
					callback();
				}
			}
		};
	}
} );




var oldCallbacks = [],
	rjsonp = /(=)\?(?=&|$)|\?\?/;

// Default jsonp settings
jQuery.ajaxSetup( {
	jsonp: "callback",
	jsonpCallback: function() {
		var callback = oldCallbacks.pop() || ( jQuery.expando + "_" + ( nonce.guid++ ) );
		this[ callback ] = true;
		return callback;
	}
} );

// Detect, normalize options and install callbacks for jsonp requests
jQuery.ajaxPrefilter( "json jsonp", function( s, originalSettings, jqXHR ) {

	var callbackName, overwritten, responseContainer,
		jsonProp = s.jsonp !== false && ( rjsonp.test( s.url ) ?
			"url" :
			typeof s.data === "string" &&
				( s.contentType || "" )
					.indexOf( "application/x-www-form-urlencoded" ) === 0 &&
				rjsonp.test( s.data ) && "data"
		);

	// Handle iff the expected data type is "jsonp" or we have a parameter to set
	if ( jsonProp || s.dataTypes[ 0 ] === "jsonp" ) {

		// Get callback name, remembering preexisting value associated with it
		callbackName = s.jsonpCallback = isFunction( s.jsonpCallback ) ?
			s.jsonpCallback() :
			s.jsonpCallback;

		// Insert callback into url or form data
		if ( jsonProp ) {
			s[ jsonProp ] = s[ jsonProp ].replace( rjsonp, "$1" + callbackName );
		} else if ( s.jsonp !== false ) {
			s.url += ( rquery.test( s.url ) ? "&" : "?" ) + s.jsonp + "=" + callbackName;
		}

		// Use data converter to retrieve json after script execution
		s.converters[ "script json" ] = function() {
			if ( !responseContainer ) {
				jQuery.error( callbackName + " was not called" );
			}
			return responseContainer[ 0 ];
		};

		// Force json dataType
		s.dataTypes[ 0 ] = "json";

		// Install callback
		overwritten = window[ callbackName ];
		window[ callbackName ] = function() {
			responseContainer = arguments;
		};

		// Clean-up function (fires after converters)
		jqXHR.always( function() {

			// If previous value didn't exist - remove it
			if ( overwritten === undefined ) {
				jQuery( window ).removeProp( callbackName );

			// Otherwise restore preexisting value
			} else {
				window[ callbackName ] = overwritten;
			}

			// Save back as free
			if ( s[ callbackName ] ) {

				// Make sure that re-using the options doesn't screw things around
				s.jsonpCallback = originalSettings.jsonpCallback;

				// Save the callback name for future use
				oldCallbacks.push( callbackName );
			}

			// Call if it was a function and we have a response
			if ( responseContainer && isFunction( overwritten ) ) {
				overwritten( responseContainer[ 0 ] );
			}

			responseContainer = overwritten = undefined;
		} );

		// Delegate to script
		return "script";
	}
} );




// Support: Safari 8 only
// In Safari 8 documents created via document.implementation.createHTMLDocument
// collapse sibling forms: the second one becomes a child of the first one.
// Because of that, this security measure has to be disabled in Safari 8.
// https://bugs.webkit.org/show_bug.cgi?id=137337
support.createHTMLDocument = ( function() {
	var body = document.implementation.createHTMLDocument( "" ).body;
	body.innerHTML = "<form></form><form></form>";
	return body.childNodes.length === 2;
} )();


// Argument "data" should be string of html
// context (optional): If specified, the fragment will be created in this context,
// defaults to document
// keepScripts (optional): If true, will include scripts passed in the html string
jQuery.parseHTML = function( data, context, keepScripts ) {
	if ( typeof data !== "string" ) {
		return [];
	}
	if ( typeof context === "boolean" ) {
		keepScripts = context;
		context = false;
	}

	var base, parsed, scripts;

	if ( !context ) {

		// Stop scripts or inline event handlers from being executed immediately
		// by using document.implementation
		if ( support.createHTMLDocument ) {
			context = document.implementation.createHTMLDocument( "" );

			// Set the base href for the created document
			// so any parsed elements with URLs
			// are based on the document's URL (gh-2965)
			base = context.createElement( "base" );
			base.href = document.location.href;
			context.head.appendChild( base );
		} else {
			context = document;
		}
	}

	parsed = rsingleTag.exec( data );
	scripts = !keepScripts && [];

	// Single tag
	if ( parsed ) {
		return [ context.createElement( parsed[ 1 ] ) ];
	}

	parsed = buildFragment( [ data ], context, scripts );

	if ( scripts && scripts.length ) {
		jQuery( scripts ).remove();
	}

	return jQuery.merge( [], parsed.childNodes );
};


/**
 * Load a url into a page
 */
jQuery.fn.load = function( url, params, callback ) {
	var selector, type, response,
		self = this,
		off = url.indexOf( " " );

	if ( off > -1 ) {
		selector = stripAndCollapse( url.slice( off ) );
		url = url.slice( 0, off );
	}

	// If it's a function
	if ( isFunction( params ) ) {

		// We assume that it's the callback
		callback = params;
		params = undefined;

	// Otherwise, build a param string
	} else if ( params && typeof params === "object" ) {
		type = "POST";
	}

	// If we have elements to modify, make the request
	if ( self.length > 0 ) {
		jQuery.ajax( {
			url: url,

			// If "type" variable is undefined, then "GET" method will be used.
			// Make value of this field explicit since
			// user can override it through ajaxSetup method
			type: type || "GET",
			dataType: "html",
			data: params
		} ).done( function( responseText ) {

			// Save response for use in complete callback
			response = arguments;

			self.html( selector ?

				// If a selector was specified, locate the right elements in a dummy div
				// Exclude scripts to avoid IE 'Permission Denied' errors
				jQuery( "<div>" ).append( jQuery.parseHTML( responseText ) ).find( selector ) :

				// Otherwise use the full result
				responseText );

		// If the request succeeds, this function gets "data", "status", "jqXHR"
		// but they are ignored because response was set above.
		// If it fails, this function gets "jqXHR", "status", "error"
		} ).always( callback && function( jqXHR, status ) {
			self.each( function() {
				callback.apply( this, response || [ jqXHR.responseText, status, jqXHR ] );
			} );
		} );
	}

	return this;
};




jQuery.expr.pseudos.animated = function( elem ) {
	return jQuery.grep( jQuery.timers, function( fn ) {
		return elem === fn.elem;
	} ).length;
};




jQuery.offset = {
	setOffset: function( elem, options, i ) {
		var curPosition, curLeft, curCSSTop, curTop, curOffset, curCSSLeft, calculatePosition,
			position = jQuery.css( elem, "position" ),
			curElem = jQuery( elem ),
			props = {};

		// Set position first, in-case top/left are set even on static elem
		if ( position === "static" ) {
			elem.style.position = "relative";
		}

		curOffset = curElem.offset();
		curCSSTop = jQuery.css( elem, "top" );
		curCSSLeft = jQuery.css( elem, "left" );
		calculatePosition = ( position === "absolute" || position === "fixed" ) &&
			( curCSSTop + curCSSLeft ).indexOf( "auto" ) > -1;

		// Need to be able to calculate position if either
		// top or left is auto and position is either absolute or fixed
		if ( calculatePosition ) {
			curPosition = curElem.position();
			curTop = curPosition.top;
			curLeft = curPosition.left;

		} else {
			curTop = parseFloat( curCSSTop ) || 0;
			curLeft = parseFloat( curCSSLeft ) || 0;
		}

		if ( isFunction( options ) ) {

			// Use jQuery.extend here to allow modification of coordinates argument (gh-1848)
			options = options.call( elem, i, jQuery.extend( {}, curOffset ) );
		}

		if ( options.top != null ) {
			props.top = ( options.top - curOffset.top ) + curTop;
		}
		if ( options.left != null ) {
			props.left = ( options.left - curOffset.left ) + curLeft;
		}

		if ( "using" in options ) {
			options.using.call( elem, props );

		} else {
			if ( typeof props.top === "number" ) {
				props.top += "px";
			}
			if ( typeof props.left === "number" ) {
				props.left += "px";
			}
			curElem.css( props );
		}
	}
};

jQuery.fn.extend( {

	// offset() relates an element's border box to the document origin
	offset: function( options ) {

		// Preserve chaining for setter
		if ( arguments.length ) {
			return options === undefined ?
				this :
				this.each( function( i ) {
					jQuery.offset.setOffset( this, options, i );
				} );
		}

		var rect, win,
			elem = this[ 0 ];

		if ( !elem ) {
			return;
		}

		// Return zeros for disconnected and hidden (display: none) elements (gh-2310)
		// Support: IE <=11 only
		// Running getBoundingClientRect on a
		// disconnected node in IE throws an error
		if ( !elem.getClientRects().length ) {
			return { top: 0, left: 0 };
		}

		// Get document-relative position by adding viewport scroll to viewport-relative gBCR
		rect = elem.getBoundingClientRect();
		win = elem.ownerDocument.defaultView;
		return {
			top: rect.top + win.pageYOffset,
			left: rect.left + win.pageXOffset
		};
	},

	// position() relates an element's margin box to its offset parent's padding box
	// This corresponds to the behavior of CSS absolute positioning
	position: function() {
		if ( !this[ 0 ] ) {
			return;
		}

		var offsetParent, offset, doc,
			elem = this[ 0 ],
			parentOffset = { top: 0, left: 0 };

		// position:fixed elements are offset from the viewport, which itself always has zero offset
		if ( jQuery.css( elem, "position" ) === "fixed" ) {

			// Assume position:fixed implies availability of getBoundingClientRect
			offset = elem.getBoundingClientRect();

		} else {
			offset = this.offset();

			// Account for the *real* offset parent, which can be the document or its root element
			// when a statically positioned element is identified
			doc = elem.ownerDocument;
			offsetParent = elem.offsetParent || doc.documentElement;
			while ( offsetParent &&
				( offsetParent === doc.body || offsetParent === doc.documentElement ) &&
				jQuery.css( offsetParent, "position" ) === "static" ) {

				offsetParent = offsetParent.parentNode;
			}
			if ( offsetParent && offsetParent !== elem && offsetParent.nodeType === 1 ) {

				// Incorporate borders into its offset, since they are outside its content origin
				parentOffset = jQuery( offsetParent ).offset();
				parentOffset.top += jQuery.css( offsetParent, "borderTopWidth", true );
				parentOffset.left += jQuery.css( offsetParent, "borderLeftWidth", true );
			}
		}

		// Subtract parent offsets and element margins
		return {
			top: offset.top - parentOffset.top - jQuery.css( elem, "marginTop", true ),
			left: offset.left - parentOffset.left - jQuery.css( elem, "marginLeft", true )
		};
	},

	// This method will return documentElement in the following cases:
	// 1) For the element inside the iframe without offsetParent, this method will return
	//    documentElement of the parent window
	// 2) For the hidden or detached element
	// 3) For body or html element, i.e. in case of the html node - it will return itself
	//
	// but those exceptions were never presented as a real life use-cases
	// and might be considered as more preferable results.
	//
	// This logic, however, is not guaranteed and can change at any point in the future
	offsetParent: function() {
		return this.map( function() {
			var offsetParent = this.offsetParent;

			while ( offsetParent && jQuery.css( offsetParent, "position" ) === "static" ) {
				offsetParent = offsetParent.offsetParent;
			}

			return offsetParent || documentElement;
		} );
	}
} );

// Create scrollLeft and scrollTop methods
jQuery.each( { scrollLeft: "pageXOffset", scrollTop: "pageYOffset" }, function( method, prop ) {
	var top = "pageYOffset" === prop;

	jQuery.fn[ method ] = function( val ) {
		return access( this, function( elem, method, val ) {

			// Coalesce documents and windows
			var win;
			if ( isWindow( elem ) ) {
				win = elem;
			} else if ( elem.nodeType === 9 ) {
				win = elem.defaultView;
			}

			if ( val === undefined ) {
				return win ? win[ prop ] : elem[ method ];
			}

			if ( win ) {
				win.scrollTo(
					!top ? val : win.pageXOffset,
					top ? val : win.pageYOffset
				);

			} else {
				elem[ method ] = val;
			}
		}, method, val, arguments.length );
	};
} );

// Support: Safari <=7 - 9.1, Chrome <=37 - 49
// Add the top/left cssHooks using jQuery.fn.position
// Webkit bug: https://bugs.webkit.org/show_bug.cgi?id=29084
// Blink bug: https://bugs.chromium.org/p/chromium/issues/detail?id=589347
// getComputedStyle returns percent when specified for top/left/bottom/right;
// rather than make the css module depend on the offset module, just check for it here
jQuery.each( [ "top", "left" ], function( _i, prop ) {
	jQuery.cssHooks[ prop ] = addGetHookIf( support.pixelPosition,
		function( elem, computed ) {
			if ( computed ) {
				computed = curCSS( elem, prop );

				// If curCSS returns percentage, fallback to offset
				return rnumnonpx.test( computed ) ?
					jQuery( elem ).position()[ prop ] + "px" :
					computed;
			}
		}
	);
} );


// Create innerHeight, innerWidth, height, width, outerHeight and outerWidth methods
jQuery.each( { Height: "height", Width: "width" }, function( name, type ) {
	jQuery.each( { padding: "inner" + name, content: type, "": "outer" + name },
		function( defaultExtra, funcName ) {

		// Margin is only for outerHeight, outerWidth
		jQuery.fn[ funcName ] = function( margin, value ) {
			var chainable = arguments.length && ( defaultExtra || typeof margin !== "boolean" ),
				extra = defaultExtra || ( margin === true || value === true ? "margin" : "border" );

			return access( this, function( elem, type, value ) {
				var doc;

				if ( isWindow( elem ) ) {

					// $( window ).outerWidth/Height return w/h including scrollbars (gh-1729)
					return funcName.indexOf( "outer" ) === 0 ?
						elem[ "inner" + name ] :
						elem.document.documentElement[ "client" + name ];
				}

				// Get document width or height
				if ( elem.nodeType === 9 ) {
					doc = elem.documentElement;

					// Either scroll[Width/Height] or offset[Width/Height] or client[Width/Height],
					// whichever is greatest
					return Math.max(
						elem.body[ "scroll" + name ], doc[ "scroll" + name ],
						elem.body[ "offset" + name ], doc[ "offset" + name ],
						doc[ "client" + name ]
					);
				}

				return value === undefined ?

					// Get width or height on the element, requesting but not forcing parseFloat
					jQuery.css( elem, type, extra ) :

					// Set width or height on the element
					jQuery.style( elem, type, value, extra );
			}, type, chainable ? margin : undefined, chainable );
		};
	} );
} );


jQuery.each( [
	"ajaxStart",
	"ajaxStop",
	"ajaxComplete",
	"ajaxError",
	"ajaxSuccess",
	"ajaxSend"
], function( _i, type ) {
	jQuery.fn[ type ] = function( fn ) {
		return this.on( type, fn );
	};
} );




jQuery.fn.extend( {

	bind: function( types, data, fn ) {
		return this.on( types, null, data, fn );
	},
	unbind: function( types, fn ) {
		return this.off( types, null, fn );
	},

	delegate: function( selector, types, data, fn ) {
		return this.on( types, selector, data, fn );
	},
	undelegate: function( selector, types, fn ) {

		// ( namespace ) or ( selector, types [, fn] )
		return arguments.length === 1 ?
			this.off( selector, "**" ) :
			this.off( types, selector || "**", fn );
	},

	hover: function( fnOver, fnOut ) {
		return this.mouseenter( fnOver ).mouseleave( fnOut || fnOver );
	}
} );

jQuery.each( ( "blur focus focusin focusout resize scroll click dblclick " +
	"mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave " +
	"change select submit keydown keypress keyup contextmenu" ).split( " " ),
	function( _i, name ) {

		// Handle event binding
		jQuery.fn[ name ] = function( data, fn ) {
			return arguments.length > 0 ?
				this.on( name, null, data, fn ) :
				this.trigger( name );
		};
	} );




// Support: Android <=4.0 only
// Make sure we trim BOM and NBSP
var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;

// Bind a function to a context, optionally partially applying any
// arguments.
// jQuery.proxy is deprecated to promote standards (specifically Function#bind)
// However, it is not slated for removal any time soon
jQuery.proxy = function( fn, context ) {
	var tmp, args, proxy;

	if ( typeof context === "string" ) {
		tmp = fn[ context ];
		context = fn;
		fn = tmp;
	}

	// Quick check to determine if target is callable, in the spec
	// this throws a TypeError, but we will just return undefined.
	if ( !isFunction( fn ) ) {
		return undefined;
	}

	// Simulated bind
	args = slice.call( arguments, 2 );
	proxy = function() {
		return fn.apply( context || this, args.concat( slice.call( arguments ) ) );
	};

	// Set the guid of unique handler to the same of original handler, so it can be removed
	proxy.guid = fn.guid = fn.guid || jQuery.guid++;

	return proxy;
};

jQuery.holdReady = function( hold ) {
	if ( hold ) {
		jQuery.readyWait++;
	} else {
		jQuery.ready( true );
	}
};
jQuery.isArray = Array.isArray;
jQuery.parseJSON = JSON.parse;
jQuery.nodeName = nodeName;
jQuery.isFunction = isFunction;
jQuery.isWindow = isWindow;
jQuery.camelCase = camelCase;
jQuery.type = toType;

jQuery.now = Date.now;

jQuery.isNumeric = function( obj ) {

	// As of jQuery 3.0, isNumeric is limited to
	// strings and numbers (primitives or objects)
	// that can be coerced to finite numbers (gh-2662)
	var type = jQuery.type( obj );
	return ( type === "number" || type === "string" ) &&

		// parseFloat NaNs numeric-cast false positives ("")
		// ...but misinterprets leading-number strings, particularly hex literals ("0x...")
		// subtraction forces infinities to NaN
		!isNaN( obj - parseFloat( obj ) );
};

jQuery.trim = function( text ) {
	return text == null ?
		"" :
		( text + "" ).replace( rtrim, "" );
};



// Register as a named AMD module, since jQuery can be concatenated with other
// files that may use define, but not via a proper concatenation script that
// understands anonymous AMD modules. A named AMD is safest and most robust
// way to register. Lowercase jquery is used because AMD module names are
// derived from file names, and jQuery is normally delivered in a lowercase
// file name. Do this after creating the global so that if an AMD module wants
// to call noConflict to hide this version of jQuery, it will work.

// Note that for maximum portability, libraries that are not jQuery should
// declare themselves as anonymous modules, and avoid setting a global if an
// AMD loader is present. jQuery is a special case. For more information, see
// https://github.com/jrburke/requirejs/wiki/Updating-existing-libraries#wiki-anon

if ( true ) {
	!(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function() {
		return jQuery;
	}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
}




var

	// Map over jQuery in case of overwrite
	_jQuery = window.jQuery,

	// Map over the $ in case of overwrite
	_$ = window.$;

jQuery.noConflict = function( deep ) {
	if ( window.$ === jQuery ) {
		window.$ = _$;
	}

	if ( deep && window.jQuery === jQuery ) {
		window.jQuery = _jQuery;
	}

	return jQuery;
};

// Expose jQuery and $ identifiers, even in AMD
// (#7102#comment:10, https://github.com/jquery/jquery/pull/557)
// and CommonJS for browser emulators (#13566)
if ( typeof noGlobal === "undefined" ) {
	window.jQuery = window.$ = jQuery;
}




return jQuery;
} );


/***/ }),

/***/ "./node_modules/popper.js/dist/esm/popper.js":
/*!***************************************************!*\
  !*** ./node_modules/popper.js/dist/esm/popper.js ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function(global) {/**!
 * @fileOverview Kickass library to create and place poppers near their reference elements.
 * @version 1.16.1
 * @license
 * Copyright (c) 2016 Federico Zivolo and contributors
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */
var isBrowser = typeof window !== 'undefined' && typeof document !== 'undefined' && typeof navigator !== 'undefined';

var timeoutDuration = function () {
  var longerTimeoutBrowsers = ['Edge', 'Trident', 'Firefox'];
  for (var i = 0; i < longerTimeoutBrowsers.length; i += 1) {
    if (isBrowser && navigator.userAgent.indexOf(longerTimeoutBrowsers[i]) >= 0) {
      return 1;
    }
  }
  return 0;
}();

function microtaskDebounce(fn) {
  var called = false;
  return function () {
    if (called) {
      return;
    }
    called = true;
    window.Promise.resolve().then(function () {
      called = false;
      fn();
    });
  };
}

function taskDebounce(fn) {
  var scheduled = false;
  return function () {
    if (!scheduled) {
      scheduled = true;
      setTimeout(function () {
        scheduled = false;
        fn();
      }, timeoutDuration);
    }
  };
}

var supportsMicroTasks = isBrowser && window.Promise;

/**
* Create a debounced version of a method, that's asynchronously deferred
* but called in the minimum time possible.
*
* @method
* @memberof Popper.Utils
* @argument {Function} fn
* @returns {Function}
*/
var debounce = supportsMicroTasks ? microtaskDebounce : taskDebounce;

/**
 * Check if the given variable is a function
 * @method
 * @memberof Popper.Utils
 * @argument {Any} functionToCheck - variable to check
 * @returns {Boolean} answer to: is a function?
 */
function isFunction(functionToCheck) {
  var getType = {};
  return functionToCheck && getType.toString.call(functionToCheck) === '[object Function]';
}

/**
 * Get CSS computed property of the given element
 * @method
 * @memberof Popper.Utils
 * @argument {Eement} element
 * @argument {String} property
 */
function getStyleComputedProperty(element, property) {
  if (element.nodeType !== 1) {
    return [];
  }
  // NOTE: 1 DOM access here
  var window = element.ownerDocument.defaultView;
  var css = window.getComputedStyle(element, null);
  return property ? css[property] : css;
}

/**
 * Returns the parentNode or the host of the element
 * @method
 * @memberof Popper.Utils
 * @argument {Element} element
 * @returns {Element} parent
 */
function getParentNode(element) {
  if (element.nodeName === 'HTML') {
    return element;
  }
  return element.parentNode || element.host;
}

/**
 * Returns the scrolling parent of the given element
 * @method
 * @memberof Popper.Utils
 * @argument {Element} element
 * @returns {Element} scroll parent
 */
function getScrollParent(element) {
  // Return body, `getScroll` will take care to get the correct `scrollTop` from it
  if (!element) {
    return document.body;
  }

  switch (element.nodeName) {
    case 'HTML':
    case 'BODY':
      return element.ownerDocument.body;
    case '#document':
      return element.body;
  }

  // Firefox want us to check `-x` and `-y` variations as well

  var _getStyleComputedProp = getStyleComputedProperty(element),
      overflow = _getStyleComputedProp.overflow,
      overflowX = _getStyleComputedProp.overflowX,
      overflowY = _getStyleComputedProp.overflowY;

  if (/(auto|scroll|overlay)/.test(overflow + overflowY + overflowX)) {
    return element;
  }

  return getScrollParent(getParentNode(element));
}

/**
 * Returns the reference node of the reference object, or the reference object itself.
 * @method
 * @memberof Popper.Utils
 * @param {Element|Object} reference - the reference element (the popper will be relative to this)
 * @returns {Element} parent
 */
function getReferenceNode(reference) {
  return reference && reference.referenceNode ? reference.referenceNode : reference;
}

var isIE11 = isBrowser && !!(window.MSInputMethodContext && document.documentMode);
var isIE10 = isBrowser && /MSIE 10/.test(navigator.userAgent);

/**
 * Determines if the browser is Internet Explorer
 * @method
 * @memberof Popper.Utils
 * @param {Number} version to check
 * @returns {Boolean} isIE
 */
function isIE(version) {
  if (version === 11) {
    return isIE11;
  }
  if (version === 10) {
    return isIE10;
  }
  return isIE11 || isIE10;
}

/**
 * Returns the offset parent of the given element
 * @method
 * @memberof Popper.Utils
 * @argument {Element} element
 * @returns {Element} offset parent
 */
function getOffsetParent(element) {
  if (!element) {
    return document.documentElement;
  }

  var noOffsetParent = isIE(10) ? document.body : null;

  // NOTE: 1 DOM access here
  var offsetParent = element.offsetParent || null;
  // Skip hidden elements which don't have an offsetParent
  while (offsetParent === noOffsetParent && element.nextElementSibling) {
    offsetParent = (element = element.nextElementSibling).offsetParent;
  }

  var nodeName = offsetParent && offsetParent.nodeName;

  if (!nodeName || nodeName === 'BODY' || nodeName === 'HTML') {
    return element ? element.ownerDocument.documentElement : document.documentElement;
  }

  // .offsetParent will return the closest TH, TD or TABLE in case
  // no offsetParent is present, I hate this job...
  if (['TH', 'TD', 'TABLE'].indexOf(offsetParent.nodeName) !== -1 && getStyleComputedProperty(offsetParent, 'position') === 'static') {
    return getOffsetParent(offsetParent);
  }

  return offsetParent;
}

function isOffsetContainer(element) {
  var nodeName = element.nodeName;

  if (nodeName === 'BODY') {
    return false;
  }
  return nodeName === 'HTML' || getOffsetParent(element.firstElementChild) === element;
}

/**
 * Finds the root node (document, shadowDOM root) of the given element
 * @method
 * @memberof Popper.Utils
 * @argument {Element} node
 * @returns {Element} root node
 */
function getRoot(node) {
  if (node.parentNode !== null) {
    return getRoot(node.parentNode);
  }

  return node;
}

/**
 * Finds the offset parent common to the two provided nodes
 * @method
 * @memberof Popper.Utils
 * @argument {Element} element1
 * @argument {Element} element2
 * @returns {Element} common offset parent
 */
function findCommonOffsetParent(element1, element2) {
  // This check is needed to avoid errors in case one of the elements isn't defined for any reason
  if (!element1 || !element1.nodeType || !element2 || !element2.nodeType) {
    return document.documentElement;
  }

  // Here we make sure to give as "start" the element that comes first in the DOM
  var order = element1.compareDocumentPosition(element2) & Node.DOCUMENT_POSITION_FOLLOWING;
  var start = order ? element1 : element2;
  var end = order ? element2 : element1;

  // Get common ancestor container
  var range = document.createRange();
  range.setStart(start, 0);
  range.setEnd(end, 0);
  var commonAncestorContainer = range.commonAncestorContainer;

  // Both nodes are inside #document

  if (element1 !== commonAncestorContainer && element2 !== commonAncestorContainer || start.contains(end)) {
    if (isOffsetContainer(commonAncestorContainer)) {
      return commonAncestorContainer;
    }

    return getOffsetParent(commonAncestorContainer);
  }

  // one of the nodes is inside shadowDOM, find which one
  var element1root = getRoot(element1);
  if (element1root.host) {
    return findCommonOffsetParent(element1root.host, element2);
  } else {
    return findCommonOffsetParent(element1, getRoot(element2).host);
  }
}

/**
 * Gets the scroll value of the given element in the given side (top and left)
 * @method
 * @memberof Popper.Utils
 * @argument {Element} element
 * @argument {String} side `top` or `left`
 * @returns {number} amount of scrolled pixels
 */
function getScroll(element) {
  var side = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'top';

  var upperSide = side === 'top' ? 'scrollTop' : 'scrollLeft';
  var nodeName = element.nodeName;

  if (nodeName === 'BODY' || nodeName === 'HTML') {
    var html = element.ownerDocument.documentElement;
    var scrollingElement = element.ownerDocument.scrollingElement || html;
    return scrollingElement[upperSide];
  }

  return element[upperSide];
}

/*
 * Sum or subtract the element scroll values (left and top) from a given rect object
 * @method
 * @memberof Popper.Utils
 * @param {Object} rect - Rect object you want to change
 * @param {HTMLElement} element - The element from the function reads the scroll values
 * @param {Boolean} subtract - set to true if you want to subtract the scroll values
 * @return {Object} rect - The modifier rect object
 */
function includeScroll(rect, element) {
  var subtract = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false;

  var scrollTop = getScroll(element, 'top');
  var scrollLeft = getScroll(element, 'left');
  var modifier = subtract ? -1 : 1;
  rect.top += scrollTop * modifier;
  rect.bottom += scrollTop * modifier;
  rect.left += scrollLeft * modifier;
  rect.right += scrollLeft * modifier;
  return rect;
}

/*
 * Helper to detect borders of a given element
 * @method
 * @memberof Popper.Utils
 * @param {CSSStyleDeclaration} styles
 * Result of `getStyleComputedProperty` on the given element
 * @param {String} axis - `x` or `y`
 * @return {number} borders - The borders size of the given axis
 */

function getBordersSize(styles, axis) {
  var sideA = axis === 'x' ? 'Left' : 'Top';
  var sideB = sideA === 'Left' ? 'Right' : 'Bottom';

  return parseFloat(styles['border' + sideA + 'Width']) + parseFloat(styles['border' + sideB + 'Width']);
}

function getSize(axis, body, html, computedStyle) {
  return Math.max(body['offset' + axis], body['scroll' + axis], html['client' + axis], html['offset' + axis], html['scroll' + axis], isIE(10) ? parseInt(html['offset' + axis]) + parseInt(computedStyle['margin' + (axis === 'Height' ? 'Top' : 'Left')]) + parseInt(computedStyle['margin' + (axis === 'Height' ? 'Bottom' : 'Right')]) : 0);
}

function getWindowSizes(document) {
  var body = document.body;
  var html = document.documentElement;
  var computedStyle = isIE(10) && getComputedStyle(html);

  return {
    height: getSize('Height', body, html, computedStyle),
    width: getSize('Width', body, html, computedStyle)
  };
}

var classCallCheck = function (instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
};

var createClass = function () {
  function defineProperties(target, props) {
    for (var i = 0; i < props.length; i++) {
      var descriptor = props[i];
      descriptor.enumerable = descriptor.enumerable || false;
      descriptor.configurable = true;
      if ("value" in descriptor) descriptor.writable = true;
      Object.defineProperty(target, descriptor.key, descriptor);
    }
  }

  return function (Constructor, protoProps, staticProps) {
    if (protoProps) defineProperties(Constructor.prototype, protoProps);
    if (staticProps) defineProperties(Constructor, staticProps);
    return Constructor;
  };
}();





var defineProperty = function (obj, key, value) {
  if (key in obj) {
    Object.defineProperty(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }

  return obj;
};

var _extends = Object.assign || function (target) {
  for (var i = 1; i < arguments.length; i++) {
    var source = arguments[i];

    for (var key in source) {
      if (Object.prototype.hasOwnProperty.call(source, key)) {
        target[key] = source[key];
      }
    }
  }

  return target;
};

/**
 * Given element offsets, generate an output similar to getBoundingClientRect
 * @method
 * @memberof Popper.Utils
 * @argument {Object} offsets
 * @returns {Object} ClientRect like output
 */
function getClientRect(offsets) {
  return _extends({}, offsets, {
    right: offsets.left + offsets.width,
    bottom: offsets.top + offsets.height
  });
}

/**
 * Get bounding client rect of given element
 * @method
 * @memberof Popper.Utils
 * @param {HTMLElement} element
 * @return {Object} client rect
 */
function getBoundingClientRect(element) {
  var rect = {};

  // IE10 10 FIX: Please, don't ask, the element isn't
  // considered in DOM in some circumstances...
  // This isn't reproducible in IE10 compatibility mode of IE11
  try {
    if (isIE(10)) {
      rect = element.getBoundingClientRect();
      var scrollTop = getScroll(element, 'top');
      var scrollLeft = getScroll(element, 'left');
      rect.top += scrollTop;
      rect.left += scrollLeft;
      rect.bottom += scrollTop;
      rect.right += scrollLeft;
    } else {
      rect = element.getBoundingClientRect();
    }
  } catch (e) {}

  var result = {
    left: rect.left,
    top: rect.top,
    width: rect.right - rect.left,
    height: rect.bottom - rect.top
  };

  // subtract scrollbar size from sizes
  var sizes = element.nodeName === 'HTML' ? getWindowSizes(element.ownerDocument) : {};
  var width = sizes.width || element.clientWidth || result.width;
  var height = sizes.height || element.clientHeight || result.height;

  var horizScrollbar = element.offsetWidth - width;
  var vertScrollbar = element.offsetHeight - height;

  // if an hypothetical scrollbar is detected, we must be sure it's not a `border`
  // we make this check conditional for performance reasons
  if (horizScrollbar || vertScrollbar) {
    var styles = getStyleComputedProperty(element);
    horizScrollbar -= getBordersSize(styles, 'x');
    vertScrollbar -= getBordersSize(styles, 'y');

    result.width -= horizScrollbar;
    result.height -= vertScrollbar;
  }

  return getClientRect(result);
}

function getOffsetRectRelativeToArbitraryNode(children, parent) {
  var fixedPosition = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false;

  var isIE10 = isIE(10);
  var isHTML = parent.nodeName === 'HTML';
  var childrenRect = getBoundingClientRect(children);
  var parentRect = getBoundingClientRect(parent);
  var scrollParent = getScrollParent(children);

  var styles = getStyleComputedProperty(parent);
  var borderTopWidth = parseFloat(styles.borderTopWidth);
  var borderLeftWidth = parseFloat(styles.borderLeftWidth);

  // In cases where the parent is fixed, we must ignore negative scroll in offset calc
  if (fixedPosition && isHTML) {
    parentRect.top = Math.max(parentRect.top, 0);
    parentRect.left = Math.max(parentRect.left, 0);
  }
  var offsets = getClientRect({
    top: childrenRect.top - parentRect.top - borderTopWidth,
    left: childrenRect.left - parentRect.left - borderLeftWidth,
    width: childrenRect.width,
    height: childrenRect.height
  });
  offsets.marginTop = 0;
  offsets.marginLeft = 0;

  // Subtract margins of documentElement in case it's being used as parent
  // we do this only on HTML because it's the only element that behaves
  // differently when margins are applied to it. The margins are included in
  // the box of the documentElement, in the other cases not.
  if (!isIE10 && isHTML) {
    var marginTop = parseFloat(styles.marginTop);
    var marginLeft = parseFloat(styles.marginLeft);

    offsets.top -= borderTopWidth - marginTop;
    offsets.bottom -= borderTopWidth - marginTop;
    offsets.left -= borderLeftWidth - marginLeft;
    offsets.right -= borderLeftWidth - marginLeft;

    // Attach marginTop and marginLeft because in some circumstances we may need them
    offsets.marginTop = marginTop;
    offsets.marginLeft = marginLeft;
  }

  if (isIE10 && !fixedPosition ? parent.contains(scrollParent) : parent === scrollParent && scrollParent.nodeName !== 'BODY') {
    offsets = includeScroll(offsets, parent);
  }

  return offsets;
}

function getViewportOffsetRectRelativeToArtbitraryNode(element) {
  var excludeScroll = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;

  var html = element.ownerDocument.documentElement;
  var relativeOffset = getOffsetRectRelativeToArbitraryNode(element, html);
  var width = Math.max(html.clientWidth, window.innerWidth || 0);
  var height = Math.max(html.clientHeight, window.innerHeight || 0);

  var scrollTop = !excludeScroll ? getScroll(html) : 0;
  var scrollLeft = !excludeScroll ? getScroll(html, 'left') : 0;

  var offset = {
    top: scrollTop - relativeOffset.top + relativeOffset.marginTop,
    left: scrollLeft - relativeOffset.left + relativeOffset.marginLeft,
    width: width,
    height: height
  };

  return getClientRect(offset);
}

/**
 * Check if the given element is fixed or is inside a fixed parent
 * @method
 * @memberof Popper.Utils
 * @argument {Element} element
 * @argument {Element} customContainer
 * @returns {Boolean} answer to "isFixed?"
 */
function isFixed(element) {
  var nodeName = element.nodeName;
  if (nodeName === 'BODY' || nodeName === 'HTML') {
    return false;
  }
  if (getStyleComputedProperty(element, 'position') === 'fixed') {
    return true;
  }
  var parentNode = getParentNode(element);
  if (!parentNode) {
    return false;
  }
  return isFixed(parentNode);
}

/**
 * Finds the first parent of an element that has a transformed property defined
 * @method
 * @memberof Popper.Utils
 * @argument {Element} element
 * @returns {Element} first transformed parent or documentElement
 */

function getFixedPositionOffsetParent(element) {
  // This check is needed to avoid errors in case one of the elements isn't defined for any reason
  if (!element || !element.parentElement || isIE()) {
    return document.documentElement;
  }
  var el = element.parentElement;
  while (el && getStyleComputedProperty(el, 'transform') === 'none') {
    el = el.parentElement;
  }
  return el || document.documentElement;
}

/**
 * Computed the boundaries limits and return them
 * @method
 * @memberof Popper.Utils
 * @param {HTMLElement} popper
 * @param {HTMLElement} reference
 * @param {number} padding
 * @param {HTMLElement} boundariesElement - Element used to define the boundaries
 * @param {Boolean} fixedPosition - Is in fixed position mode
 * @returns {Object} Coordinates of the boundaries
 */
function getBoundaries(popper, reference, padding, boundariesElement) {
  var fixedPosition = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : false;

  // NOTE: 1 DOM access here

  var boundaries = { top: 0, left: 0 };
  var offsetParent = fixedPosition ? getFixedPositionOffsetParent(popper) : findCommonOffsetParent(popper, getReferenceNode(reference));

  // Handle viewport case
  if (boundariesElement === 'viewport') {
    boundaries = getViewportOffsetRectRelativeToArtbitraryNode(offsetParent, fixedPosition);
  } else {
    // Handle other cases based on DOM element used as boundaries
    var boundariesNode = void 0;
    if (boundariesElement === 'scrollParent') {
      boundariesNode = getScrollParent(getParentNode(reference));
      if (boundariesNode.nodeName === 'BODY') {
        boundariesNode = popper.ownerDocument.documentElement;
      }
    } else if (boundariesElement === 'window') {
      boundariesNode = popper.ownerDocument.documentElement;
    } else {
      boundariesNode = boundariesElement;
    }

    var offsets = getOffsetRectRelativeToArbitraryNode(boundariesNode, offsetParent, fixedPosition);

    // In case of HTML, we need a different computation
    if (boundariesNode.nodeName === 'HTML' && !isFixed(offsetParent)) {
      var _getWindowSizes = getWindowSizes(popper.ownerDocument),
          height = _getWindowSizes.height,
          width = _getWindowSizes.width;

      boundaries.top += offsets.top - offsets.marginTop;
      boundaries.bottom = height + offsets.top;
      boundaries.left += offsets.left - offsets.marginLeft;
      boundaries.right = width + offsets.left;
    } else {
      // for all the other DOM elements, this one is good
      boundaries = offsets;
    }
  }

  // Add paddings
  padding = padding || 0;
  var isPaddingNumber = typeof padding === 'number';
  boundaries.left += isPaddingNumber ? padding : padding.left || 0;
  boundaries.top += isPaddingNumber ? padding : padding.top || 0;
  boundaries.right -= isPaddingNumber ? padding : padding.right || 0;
  boundaries.bottom -= isPaddingNumber ? padding : padding.bottom || 0;

  return boundaries;
}

function getArea(_ref) {
  var width = _ref.width,
      height = _ref.height;

  return width * height;
}

/**
 * Utility used to transform the `auto` placement to the placement with more
 * available space.
 * @method
 * @memberof Popper.Utils
 * @argument {Object} data - The data object generated by update method
 * @argument {Object} options - Modifiers configuration and options
 * @returns {Object} The data object, properly modified
 */
function computeAutoPlacement(placement, refRect, popper, reference, boundariesElement) {
  var padding = arguments.length > 5 && arguments[5] !== undefined ? arguments[5] : 0;

  if (placement.indexOf('auto') === -1) {
    return placement;
  }

  var boundaries = getBoundaries(popper, reference, padding, boundariesElement);

  var rects = {
    top: {
      width: boundaries.width,
      height: refRect.top - boundaries.top
    },
    right: {
      width: boundaries.right - refRect.right,
      height: boundaries.height
    },
    bottom: {
      width: boundaries.width,
      height: boundaries.bottom - refRect.bottom
    },
    left: {
      width: refRect.left - boundaries.left,
      height: boundaries.height
    }
  };

  var sortedAreas = Object.keys(rects).map(function (key) {
    return _extends({
      key: key
    }, rects[key], {
      area: getArea(rects[key])
    });
  }).sort(function (a, b) {
    return b.area - a.area;
  });

  var filteredAreas = sortedAreas.filter(function (_ref2) {
    var width = _ref2.width,
        height = _ref2.height;
    return width >= popper.clientWidth && height >= popper.clientHeight;
  });

  var computedPlacement = filteredAreas.length > 0 ? filteredAreas[0].key : sortedAreas[0].key;

  var variation = placement.split('-')[1];

  return computedPlacement + (variation ? '-' + variation : '');
}

/**
 * Get offsets to the reference element
 * @method
 * @memberof Popper.Utils
 * @param {Object} state
 * @param {Element} popper - the popper element
 * @param {Element} reference - the reference element (the popper will be relative to this)
 * @param {Element} fixedPosition - is in fixed position mode
 * @returns {Object} An object containing the offsets which will be applied to the popper
 */
function getReferenceOffsets(state, popper, reference) {
  var fixedPosition = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : null;

  var commonOffsetParent = fixedPosition ? getFixedPositionOffsetParent(popper) : findCommonOffsetParent(popper, getReferenceNode(reference));
  return getOffsetRectRelativeToArbitraryNode(reference, commonOffsetParent, fixedPosition);
}

/**
 * Get the outer sizes of the given element (offset size + margins)
 * @method
 * @memberof Popper.Utils
 * @argument {Element} element
 * @returns {Object} object containing width and height properties
 */
function getOuterSizes(element) {
  var window = element.ownerDocument.defaultView;
  var styles = window.getComputedStyle(element);
  var x = parseFloat(styles.marginTop || 0) + parseFloat(styles.marginBottom || 0);
  var y = parseFloat(styles.marginLeft || 0) + parseFloat(styles.marginRight || 0);
  var result = {
    width: element.offsetWidth + y,
    height: element.offsetHeight + x
  };
  return result;
}

/**
 * Get the opposite placement of the given one
 * @method
 * @memberof Popper.Utils
 * @argument {String} placement
 * @returns {String} flipped placement
 */
function getOppositePlacement(placement) {
  var hash = { left: 'right', right: 'left', bottom: 'top', top: 'bottom' };
  return placement.replace(/left|right|bottom|top/g, function (matched) {
    return hash[matched];
  });
}

/**
 * Get offsets to the popper
 * @method
 * @memberof Popper.Utils
 * @param {Object} position - CSS position the Popper will get applied
 * @param {HTMLElement} popper - the popper element
 * @param {Object} referenceOffsets - the reference offsets (the popper will be relative to this)
 * @param {String} placement - one of the valid placement options
 * @returns {Object} popperOffsets - An object containing the offsets which will be applied to the popper
 */
function getPopperOffsets(popper, referenceOffsets, placement) {
  placement = placement.split('-')[0];

  // Get popper node sizes
  var popperRect = getOuterSizes(popper);

  // Add position, width and height to our offsets object
  var popperOffsets = {
    width: popperRect.width,
    height: popperRect.height
  };

  // depending by the popper placement we have to compute its offsets slightly differently
  var isHoriz = ['right', 'left'].indexOf(placement) !== -1;
  var mainSide = isHoriz ? 'top' : 'left';
  var secondarySide = isHoriz ? 'left' : 'top';
  var measurement = isHoriz ? 'height' : 'width';
  var secondaryMeasurement = !isHoriz ? 'height' : 'width';

  popperOffsets[mainSide] = referenceOffsets[mainSide] + referenceOffsets[measurement] / 2 - popperRect[measurement] / 2;
  if (placement === secondarySide) {
    popperOffsets[secondarySide] = referenceOffsets[secondarySide] - popperRect[secondaryMeasurement];
  } else {
    popperOffsets[secondarySide] = referenceOffsets[getOppositePlacement(secondarySide)];
  }

  return popperOffsets;
}

/**
 * Mimics the `find` method of Array
 * @method
 * @memberof Popper.Utils
 * @argument {Array} arr
 * @argument prop
 * @argument value
 * @returns index or -1
 */
function find(arr, check) {
  // use native find if supported
  if (Array.prototype.find) {
    return arr.find(check);
  }

  // use `filter` to obtain the same behavior of `find`
  return arr.filter(check)[0];
}

/**
 * Return the index of the matching object
 * @method
 * @memberof Popper.Utils
 * @argument {Array} arr
 * @argument prop
 * @argument value
 * @returns index or -1
 */
function findIndex(arr, prop, value) {
  // use native findIndex if supported
  if (Array.prototype.findIndex) {
    return arr.findIndex(function (cur) {
      return cur[prop] === value;
    });
  }

  // use `find` + `indexOf` if `findIndex` isn't supported
  var match = find(arr, function (obj) {
    return obj[prop] === value;
  });
  return arr.indexOf(match);
}

/**
 * Loop trough the list of modifiers and run them in order,
 * each of them will then edit the data object.
 * @method
 * @memberof Popper.Utils
 * @param {dataObject} data
 * @param {Array} modifiers
 * @param {String} ends - Optional modifier name used as stopper
 * @returns {dataObject}
 */
function runModifiers(modifiers, data, ends) {
  var modifiersToRun = ends === undefined ? modifiers : modifiers.slice(0, findIndex(modifiers, 'name', ends));

  modifiersToRun.forEach(function (modifier) {
    if (modifier['function']) {
      // eslint-disable-line dot-notation
      console.warn('`modifier.function` is deprecated, use `modifier.fn`!');
    }
    var fn = modifier['function'] || modifier.fn; // eslint-disable-line dot-notation
    if (modifier.enabled && isFunction(fn)) {
      // Add properties to offsets to make them a complete clientRect object
      // we do this before each modifier to make sure the previous one doesn't
      // mess with these values
      data.offsets.popper = getClientRect(data.offsets.popper);
      data.offsets.reference = getClientRect(data.offsets.reference);

      data = fn(data, modifier);
    }
  });

  return data;
}

/**
 * Updates the position of the popper, computing the new offsets and applying
 * the new style.<br />
 * Prefer `scheduleUpdate` over `update` because of performance reasons.
 * @method
 * @memberof Popper
 */
function update() {
  // if popper is destroyed, don't perform any further update
  if (this.state.isDestroyed) {
    return;
  }

  var data = {
    instance: this,
    styles: {},
    arrowStyles: {},
    attributes: {},
    flipped: false,
    offsets: {}
  };

  // compute reference element offsets
  data.offsets.reference = getReferenceOffsets(this.state, this.popper, this.reference, this.options.positionFixed);

  // compute auto placement, store placement inside the data object,
  // modifiers will be able to edit `placement` if needed
  // and refer to originalPlacement to know the original value
  data.placement = computeAutoPlacement(this.options.placement, data.offsets.reference, this.popper, this.reference, this.options.modifiers.flip.boundariesElement, this.options.modifiers.flip.padding);

  // store the computed placement inside `originalPlacement`
  data.originalPlacement = data.placement;

  data.positionFixed = this.options.positionFixed;

  // compute the popper offsets
  data.offsets.popper = getPopperOffsets(this.popper, data.offsets.reference, data.placement);

  data.offsets.popper.position = this.options.positionFixed ? 'fixed' : 'absolute';

  // run the modifiers
  data = runModifiers(this.modifiers, data);

  // the first `update` will call `onCreate` callback
  // the other ones will call `onUpdate` callback
  if (!this.state.isCreated) {
    this.state.isCreated = true;
    this.options.onCreate(data);
  } else {
    this.options.onUpdate(data);
  }
}

/**
 * Helper used to know if the given modifier is enabled.
 * @method
 * @memberof Popper.Utils
 * @returns {Boolean}
 */
function isModifierEnabled(modifiers, modifierName) {
  return modifiers.some(function (_ref) {
    var name = _ref.name,
        enabled = _ref.enabled;
    return enabled && name === modifierName;
  });
}

/**
 * Get the prefixed supported property name
 * @method
 * @memberof Popper.Utils
 * @argument {String} property (camelCase)
 * @returns {String} prefixed property (camelCase or PascalCase, depending on the vendor prefix)
 */
function getSupportedPropertyName(property) {
  var prefixes = [false, 'ms', 'Webkit', 'Moz', 'O'];
  var upperProp = property.charAt(0).toUpperCase() + property.slice(1);

  for (var i = 0; i < prefixes.length; i++) {
    var prefix = prefixes[i];
    var toCheck = prefix ? '' + prefix + upperProp : property;
    if (typeof document.body.style[toCheck] !== 'undefined') {
      return toCheck;
    }
  }
  return null;
}

/**
 * Destroys the popper.
 * @method
 * @memberof Popper
 */
function destroy() {
  this.state.isDestroyed = true;

  // touch DOM only if `applyStyle` modifier is enabled
  if (isModifierEnabled(this.modifiers, 'applyStyle')) {
    this.popper.removeAttribute('x-placement');
    this.popper.style.position = '';
    this.popper.style.top = '';
    this.popper.style.left = '';
    this.popper.style.right = '';
    this.popper.style.bottom = '';
    this.popper.style.willChange = '';
    this.popper.style[getSupportedPropertyName('transform')] = '';
  }

  this.disableEventListeners();

  // remove the popper if user explicitly asked for the deletion on destroy
  // do not use `remove` because IE11 doesn't support it
  if (this.options.removeOnDestroy) {
    this.popper.parentNode.removeChild(this.popper);
  }
  return this;
}

/**
 * Get the window associated with the element
 * @argument {Element} element
 * @returns {Window}
 */
function getWindow(element) {
  var ownerDocument = element.ownerDocument;
  return ownerDocument ? ownerDocument.defaultView : window;
}

function attachToScrollParents(scrollParent, event, callback, scrollParents) {
  var isBody = scrollParent.nodeName === 'BODY';
  var target = isBody ? scrollParent.ownerDocument.defaultView : scrollParent;
  target.addEventListener(event, callback, { passive: true });

  if (!isBody) {
    attachToScrollParents(getScrollParent(target.parentNode), event, callback, scrollParents);
  }
  scrollParents.push(target);
}

/**
 * Setup needed event listeners used to update the popper position
 * @method
 * @memberof Popper.Utils
 * @private
 */
function setupEventListeners(reference, options, state, updateBound) {
  // Resize event listener on window
  state.updateBound = updateBound;
  getWindow(reference).addEventListener('resize', state.updateBound, { passive: true });

  // Scroll event listener on scroll parents
  var scrollElement = getScrollParent(reference);
  attachToScrollParents(scrollElement, 'scroll', state.updateBound, state.scrollParents);
  state.scrollElement = scrollElement;
  state.eventsEnabled = true;

  return state;
}

/**
 * It will add resize/scroll events and start recalculating
 * position of the popper element when they are triggered.
 * @method
 * @memberof Popper
 */
function enableEventListeners() {
  if (!this.state.eventsEnabled) {
    this.state = setupEventListeners(this.reference, this.options, this.state, this.scheduleUpdate);
  }
}

/**
 * Remove event listeners used to update the popper position
 * @method
 * @memberof Popper.Utils
 * @private
 */
function removeEventListeners(reference, state) {
  // Remove resize event listener on window
  getWindow(reference).removeEventListener('resize', state.updateBound);

  // Remove scroll event listener on scroll parents
  state.scrollParents.forEach(function (target) {
    target.removeEventListener('scroll', state.updateBound);
  });

  // Reset state
  state.updateBound = null;
  state.scrollParents = [];
  state.scrollElement = null;
  state.eventsEnabled = false;
  return state;
}

/**
 * It will remove resize/scroll events and won't recalculate popper position
 * when they are triggered. It also won't trigger `onUpdate` callback anymore,
 * unless you call `update` method manually.
 * @method
 * @memberof Popper
 */
function disableEventListeners() {
  if (this.state.eventsEnabled) {
    cancelAnimationFrame(this.scheduleUpdate);
    this.state = removeEventListeners(this.reference, this.state);
  }
}

/**
 * Tells if a given input is a number
 * @method
 * @memberof Popper.Utils
 * @param {*} input to check
 * @return {Boolean}
 */
function isNumeric(n) {
  return n !== '' && !isNaN(parseFloat(n)) && isFinite(n);
}

/**
 * Set the style to the given popper
 * @method
 * @memberof Popper.Utils
 * @argument {Element} element - Element to apply the style to
 * @argument {Object} styles
 * Object with a list of properties and values which will be applied to the element
 */
function setStyles(element, styles) {
  Object.keys(styles).forEach(function (prop) {
    var unit = '';
    // add unit if the value is numeric and is one of the following
    if (['width', 'height', 'top', 'right', 'bottom', 'left'].indexOf(prop) !== -1 && isNumeric(styles[prop])) {
      unit = 'px';
    }
    element.style[prop] = styles[prop] + unit;
  });
}

/**
 * Set the attributes to the given popper
 * @method
 * @memberof Popper.Utils
 * @argument {Element} element - Element to apply the attributes to
 * @argument {Object} styles
 * Object with a list of properties and values which will be applied to the element
 */
function setAttributes(element, attributes) {
  Object.keys(attributes).forEach(function (prop) {
    var value = attributes[prop];
    if (value !== false) {
      element.setAttribute(prop, attributes[prop]);
    } else {
      element.removeAttribute(prop);
    }
  });
}

/**
 * @function
 * @memberof Modifiers
 * @argument {Object} data - The data object generated by `update` method
 * @argument {Object} data.styles - List of style properties - values to apply to popper element
 * @argument {Object} data.attributes - List of attribute properties - values to apply to popper element
 * @argument {Object} options - Modifiers configuration and options
 * @returns {Object} The same data object
 */
function applyStyle(data) {
  // any property present in `data.styles` will be applied to the popper,
  // in this way we can make the 3rd party modifiers add custom styles to it
  // Be aware, modifiers could override the properties defined in the previous
  // lines of this modifier!
  setStyles(data.instance.popper, data.styles);

  // any property present in `data.attributes` will be applied to the popper,
  // they will be set as HTML attributes of the element
  setAttributes(data.instance.popper, data.attributes);

  // if arrowElement is defined and arrowStyles has some properties
  if (data.arrowElement && Object.keys(data.arrowStyles).length) {
    setStyles(data.arrowElement, data.arrowStyles);
  }

  return data;
}

/**
 * Set the x-placement attribute before everything else because it could be used
 * to add margins to the popper margins needs to be calculated to get the
 * correct popper offsets.
 * @method
 * @memberof Popper.modifiers
 * @param {HTMLElement} reference - The reference element used to position the popper
 * @param {HTMLElement} popper - The HTML element used as popper
 * @param {Object} options - Popper.js options
 */
function applyStyleOnLoad(reference, popper, options, modifierOptions, state) {
  // compute reference element offsets
  var referenceOffsets = getReferenceOffsets(state, popper, reference, options.positionFixed);

  // compute auto placement, store placement inside the data object,
  // modifiers will be able to edit `placement` if needed
  // and refer to originalPlacement to know the original value
  var placement = computeAutoPlacement(options.placement, referenceOffsets, popper, reference, options.modifiers.flip.boundariesElement, options.modifiers.flip.padding);

  popper.setAttribute('x-placement', placement);

  // Apply `position` to popper before anything else because
  // without the position applied we can't guarantee correct computations
  setStyles(popper, { position: options.positionFixed ? 'fixed' : 'absolute' });

  return options;
}

/**
 * @function
 * @memberof Popper.Utils
 * @argument {Object} data - The data object generated by `update` method
 * @argument {Boolean} shouldRound - If the offsets should be rounded at all
 * @returns {Object} The popper's position offsets rounded
 *
 * The tale of pixel-perfect positioning. It's still not 100% perfect, but as
 * good as it can be within reason.
 * Discussion here: https://github.com/FezVrasta/popper.js/pull/715
 *
 * Low DPI screens cause a popper to be blurry if not using full pixels (Safari
 * as well on High DPI screens).
 *
 * Firefox prefers no rounding for positioning and does not have blurriness on
 * high DPI screens.
 *
 * Only horizontal placement and left/right values need to be considered.
 */
function getRoundedOffsets(data, shouldRound) {
  var _data$offsets = data.offsets,
      popper = _data$offsets.popper,
      reference = _data$offsets.reference;
  var round = Math.round,
      floor = Math.floor;

  var noRound = function noRound(v) {
    return v;
  };

  var referenceWidth = round(reference.width);
  var popperWidth = round(popper.width);

  var isVertical = ['left', 'right'].indexOf(data.placement) !== -1;
  var isVariation = data.placement.indexOf('-') !== -1;
  var sameWidthParity = referenceWidth % 2 === popperWidth % 2;
  var bothOddWidth = referenceWidth % 2 === 1 && popperWidth % 2 === 1;

  var horizontalToInteger = !shouldRound ? noRound : isVertical || isVariation || sameWidthParity ? round : floor;
  var verticalToInteger = !shouldRound ? noRound : round;

  return {
    left: horizontalToInteger(bothOddWidth && !isVariation && shouldRound ? popper.left - 1 : popper.left),
    top: verticalToInteger(popper.top),
    bottom: verticalToInteger(popper.bottom),
    right: horizontalToInteger(popper.right)
  };
}

var isFirefox = isBrowser && /Firefox/i.test(navigator.userAgent);

/**
 * @function
 * @memberof Modifiers
 * @argument {Object} data - The data object generated by `update` method
 * @argument {Object} options - Modifiers configuration and options
 * @returns {Object} The data object, properly modified
 */
function computeStyle(data, options) {
  var x = options.x,
      y = options.y;
  var popper = data.offsets.popper;

  // Remove this legacy support in Popper.js v2

  var legacyGpuAccelerationOption = find(data.instance.modifiers, function (modifier) {
    return modifier.name === 'applyStyle';
  }).gpuAcceleration;
  if (legacyGpuAccelerationOption !== undefined) {
    console.warn('WARNING: `gpuAcceleration` option moved to `computeStyle` modifier and will not be supported in future versions of Popper.js!');
  }
  var gpuAcceleration = legacyGpuAccelerationOption !== undefined ? legacyGpuAccelerationOption : options.gpuAcceleration;

  var offsetParent = getOffsetParent(data.instance.popper);
  var offsetParentRect = getBoundingClientRect(offsetParent);

  // Styles
  var styles = {
    position: popper.position
  };

  var offsets = getRoundedOffsets(data, window.devicePixelRatio < 2 || !isFirefox);

  var sideA = x === 'bottom' ? 'top' : 'bottom';
  var sideB = y === 'right' ? 'left' : 'right';

  // if gpuAcceleration is set to `true` and transform is supported,
  //  we use `translate3d` to apply the position to the popper we
  // automatically use the supported prefixed version if needed
  var prefixedProperty = getSupportedPropertyName('transform');

  // now, let's make a step back and look at this code closely (wtf?)
  // If the content of the popper grows once it's been positioned, it
  // may happen that the popper gets misplaced because of the new content
  // overflowing its reference element
  // To avoid this problem, we provide two options (x and y), which allow
  // the consumer to define the offset origin.
  // If we position a popper on top of a reference element, we can set
  // `x` to `top` to make the popper grow towards its top instead of
  // its bottom.
  var left = void 0,
      top = void 0;
  if (sideA === 'bottom') {
    // when offsetParent is <html> the positioning is relative to the bottom of the screen (excluding the scrollbar)
    // and not the bottom of the html element
    if (offsetParent.nodeName === 'HTML') {
      top = -offsetParent.clientHeight + offsets.bottom;
    } else {
      top = -offsetParentRect.height + offsets.bottom;
    }
  } else {
    top = offsets.top;
  }
  if (sideB === 'right') {
    if (offsetParent.nodeName === 'HTML') {
      left = -offsetParent.clientWidth + offsets.right;
    } else {
      left = -offsetParentRect.width + offsets.right;
    }
  } else {
    left = offsets.left;
  }
  if (gpuAcceleration && prefixedProperty) {
    styles[prefixedProperty] = 'translate3d(' + left + 'px, ' + top + 'px, 0)';
    styles[sideA] = 0;
    styles[sideB] = 0;
    styles.willChange = 'transform';
  } else {
    // othwerise, we use the standard `top`, `left`, `bottom` and `right` properties
    var invertTop = sideA === 'bottom' ? -1 : 1;
    var invertLeft = sideB === 'right' ? -1 : 1;
    styles[sideA] = top * invertTop;
    styles[sideB] = left * invertLeft;
    styles.willChange = sideA + ', ' + sideB;
  }

  // Attributes
  var attributes = {
    'x-placement': data.placement
  };

  // Update `data` attributes, styles and arrowStyles
  data.attributes = _extends({}, attributes, data.attributes);
  data.styles = _extends({}, styles, data.styles);
  data.arrowStyles = _extends({}, data.offsets.arrow, data.arrowStyles);

  return data;
}

/**
 * Helper used to know if the given modifier depends from another one.<br />
 * It checks if the needed modifier is listed and enabled.
 * @method
 * @memberof Popper.Utils
 * @param {Array} modifiers - list of modifiers
 * @param {String} requestingName - name of requesting modifier
 * @param {String} requestedName - name of requested modifier
 * @returns {Boolean}
 */
function isModifierRequired(modifiers, requestingName, requestedName) {
  var requesting = find(modifiers, function (_ref) {
    var name = _ref.name;
    return name === requestingName;
  });

  var isRequired = !!requesting && modifiers.some(function (modifier) {
    return modifier.name === requestedName && modifier.enabled && modifier.order < requesting.order;
  });

  if (!isRequired) {
    var _requesting = '`' + requestingName + '`';
    var requested = '`' + requestedName + '`';
    console.warn(requested + ' modifier is required by ' + _requesting + ' modifier in order to work, be sure to include it before ' + _requesting + '!');
  }
  return isRequired;
}

/**
 * @function
 * @memberof Modifiers
 * @argument {Object} data - The data object generated by update method
 * @argument {Object} options - Modifiers configuration and options
 * @returns {Object} The data object, properly modified
 */
function arrow(data, options) {
  var _data$offsets$arrow;

  // arrow depends on keepTogether in order to work
  if (!isModifierRequired(data.instance.modifiers, 'arrow', 'keepTogether')) {
    return data;
  }

  var arrowElement = options.element;

  // if arrowElement is a string, suppose it's a CSS selector
  if (typeof arrowElement === 'string') {
    arrowElement = data.instance.popper.querySelector(arrowElement);

    // if arrowElement is not found, don't run the modifier
    if (!arrowElement) {
      return data;
    }
  } else {
    // if the arrowElement isn't a query selector we must check that the
    // provided DOM node is child of its popper node
    if (!data.instance.popper.contains(arrowElement)) {
      console.warn('WARNING: `arrow.element` must be child of its popper element!');
      return data;
    }
  }

  var placement = data.placement.split('-')[0];
  var _data$offsets = data.offsets,
      popper = _data$offsets.popper,
      reference = _data$offsets.reference;

  var isVertical = ['left', 'right'].indexOf(placement) !== -1;

  var len = isVertical ? 'height' : 'width';
  var sideCapitalized = isVertical ? 'Top' : 'Left';
  var side = sideCapitalized.toLowerCase();
  var altSide = isVertical ? 'left' : 'top';
  var opSide = isVertical ? 'bottom' : 'right';
  var arrowElementSize = getOuterSizes(arrowElement)[len];

  //
  // extends keepTogether behavior making sure the popper and its
  // reference have enough pixels in conjunction
  //

  // top/left side
  if (reference[opSide] - arrowElementSize < popper[side]) {
    data.offsets.popper[side] -= popper[side] - (reference[opSide] - arrowElementSize);
  }
  // bottom/right side
  if (reference[side] + arrowElementSize > popper[opSide]) {
    data.offsets.popper[side] += reference[side] + arrowElementSize - popper[opSide];
  }
  data.offsets.popper = getClientRect(data.offsets.popper);

  // compute center of the popper
  var center = reference[side] + reference[len] / 2 - arrowElementSize / 2;

  // Compute the sideValue using the updated popper offsets
  // take popper margin in account because we don't have this info available
  var css = getStyleComputedProperty(data.instance.popper);
  var popperMarginSide = parseFloat(css['margin' + sideCapitalized]);
  var popperBorderSide = parseFloat(css['border' + sideCapitalized + 'Width']);
  var sideValue = center - data.offsets.popper[side] - popperMarginSide - popperBorderSide;

  // prevent arrowElement from being placed not contiguously to its popper
  sideValue = Math.max(Math.min(popper[len] - arrowElementSize, sideValue), 0);

  data.arrowElement = arrowElement;
  data.offsets.arrow = (_data$offsets$arrow = {}, defineProperty(_data$offsets$arrow, side, Math.round(sideValue)), defineProperty(_data$offsets$arrow, altSide, ''), _data$offsets$arrow);

  return data;
}

/**
 * Get the opposite placement variation of the given one
 * @method
 * @memberof Popper.Utils
 * @argument {String} placement variation
 * @returns {String} flipped placement variation
 */
function getOppositeVariation(variation) {
  if (variation === 'end') {
    return 'start';
  } else if (variation === 'start') {
    return 'end';
  }
  return variation;
}

/**
 * List of accepted placements to use as values of the `placement` option.<br />
 * Valid placements are:
 * - `auto`
 * - `top`
 * - `right`
 * - `bottom`
 * - `left`
 *
 * Each placement can have a variation from this list:
 * - `-start`
 * - `-end`
 *
 * Variations are interpreted easily if you think of them as the left to right
 * written languages. Horizontally (`top` and `bottom`), `start` is left and `end`
 * is right.<br />
 * Vertically (`left` and `right`), `start` is top and `end` is bottom.
 *
 * Some valid examples are:
 * - `top-end` (on top of reference, right aligned)
 * - `right-start` (on right of reference, top aligned)
 * - `bottom` (on bottom, centered)
 * - `auto-end` (on the side with more space available, alignment depends by placement)
 *
 * @static
 * @type {Array}
 * @enum {String}
 * @readonly
 * @method placements
 * @memberof Popper
 */
var placements = ['auto-start', 'auto', 'auto-end', 'top-start', 'top', 'top-end', 'right-start', 'right', 'right-end', 'bottom-end', 'bottom', 'bottom-start', 'left-end', 'left', 'left-start'];

// Get rid of `auto` `auto-start` and `auto-end`
var validPlacements = placements.slice(3);

/**
 * Given an initial placement, returns all the subsequent placements
 * clockwise (or counter-clockwise).
 *
 * @method
 * @memberof Popper.Utils
 * @argument {String} placement - A valid placement (it accepts variations)
 * @argument {Boolean} counter - Set to true to walk the placements counterclockwise
 * @returns {Array} placements including their variations
 */
function clockwise(placement) {
  var counter = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;

  var index = validPlacements.indexOf(placement);
  var arr = validPlacements.slice(index + 1).concat(validPlacements.slice(0, index));
  return counter ? arr.reverse() : arr;
}

var BEHAVIORS = {
  FLIP: 'flip',
  CLOCKWISE: 'clockwise',
  COUNTERCLOCKWISE: 'counterclockwise'
};

/**
 * @function
 * @memberof Modifiers
 * @argument {Object} data - The data object generated by update method
 * @argument {Object} options - Modifiers configuration and options
 * @returns {Object} The data object, properly modified
 */
function flip(data, options) {
  // if `inner` modifier is enabled, we can't use the `flip` modifier
  if (isModifierEnabled(data.instance.modifiers, 'inner')) {
    return data;
  }

  if (data.flipped && data.placement === data.originalPlacement) {
    // seems like flip is trying to loop, probably there's not enough space on any of the flippable sides
    return data;
  }

  var boundaries = getBoundaries(data.instance.popper, data.instance.reference, options.padding, options.boundariesElement, data.positionFixed);

  var placement = data.placement.split('-')[0];
  var placementOpposite = getOppositePlacement(placement);
  var variation = data.placement.split('-')[1] || '';

  var flipOrder = [];

  switch (options.behavior) {
    case BEHAVIORS.FLIP:
      flipOrder = [placement, placementOpposite];
      break;
    case BEHAVIORS.CLOCKWISE:
      flipOrder = clockwise(placement);
      break;
    case BEHAVIORS.COUNTERCLOCKWISE:
      flipOrder = clockwise(placement, true);
      break;
    default:
      flipOrder = options.behavior;
  }

  flipOrder.forEach(function (step, index) {
    if (placement !== step || flipOrder.length === index + 1) {
      return data;
    }

    placement = data.placement.split('-')[0];
    placementOpposite = getOppositePlacement(placement);

    var popperOffsets = data.offsets.popper;
    var refOffsets = data.offsets.reference;

    // using floor because the reference offsets may contain decimals we are not going to consider here
    var floor = Math.floor;
    var overlapsRef = placement === 'left' && floor(popperOffsets.right) > floor(refOffsets.left) || placement === 'right' && floor(popperOffsets.left) < floor(refOffsets.right) || placement === 'top' && floor(popperOffsets.bottom) > floor(refOffsets.top) || placement === 'bottom' && floor(popperOffsets.top) < floor(refOffsets.bottom);

    var overflowsLeft = floor(popperOffsets.left) < floor(boundaries.left);
    var overflowsRight = floor(popperOffsets.right) > floor(boundaries.right);
    var overflowsTop = floor(popperOffsets.top) < floor(boundaries.top);
    var overflowsBottom = floor(popperOffsets.bottom) > floor(boundaries.bottom);

    var overflowsBoundaries = placement === 'left' && overflowsLeft || placement === 'right' && overflowsRight || placement === 'top' && overflowsTop || placement === 'bottom' && overflowsBottom;

    // flip the variation if required
    var isVertical = ['top', 'bottom'].indexOf(placement) !== -1;

    // flips variation if reference element overflows boundaries
    var flippedVariationByRef = !!options.flipVariations && (isVertical && variation === 'start' && overflowsLeft || isVertical && variation === 'end' && overflowsRight || !isVertical && variation === 'start' && overflowsTop || !isVertical && variation === 'end' && overflowsBottom);

    // flips variation if popper content overflows boundaries
    var flippedVariationByContent = !!options.flipVariationsByContent && (isVertical && variation === 'start' && overflowsRight || isVertical && variation === 'end' && overflowsLeft || !isVertical && variation === 'start' && overflowsBottom || !isVertical && variation === 'end' && overflowsTop);

    var flippedVariation = flippedVariationByRef || flippedVariationByContent;

    if (overlapsRef || overflowsBoundaries || flippedVariation) {
      // this boolean to detect any flip loop
      data.flipped = true;

      if (overlapsRef || overflowsBoundaries) {
        placement = flipOrder[index + 1];
      }

      if (flippedVariation) {
        variation = getOppositeVariation(variation);
      }

      data.placement = placement + (variation ? '-' + variation : '');

      // this object contains `position`, we want to preserve it along with
      // any additional property we may add in the future
      data.offsets.popper = _extends({}, data.offsets.popper, getPopperOffsets(data.instance.popper, data.offsets.reference, data.placement));

      data = runModifiers(data.instance.modifiers, data, 'flip');
    }
  });
  return data;
}

/**
 * @function
 * @memberof Modifiers
 * @argument {Object} data - The data object generated by update method
 * @argument {Object} options - Modifiers configuration and options
 * @returns {Object} The data object, properly modified
 */
function keepTogether(data) {
  var _data$offsets = data.offsets,
      popper = _data$offsets.popper,
      reference = _data$offsets.reference;

  var placement = data.placement.split('-')[0];
  var floor = Math.floor;
  var isVertical = ['top', 'bottom'].indexOf(placement) !== -1;
  var side = isVertical ? 'right' : 'bottom';
  var opSide = isVertical ? 'left' : 'top';
  var measurement = isVertical ? 'width' : 'height';

  if (popper[side] < floor(reference[opSide])) {
    data.offsets.popper[opSide] = floor(reference[opSide]) - popper[measurement];
  }
  if (popper[opSide] > floor(reference[side])) {
    data.offsets.popper[opSide] = floor(reference[side]);
  }

  return data;
}

/**
 * Converts a string containing value + unit into a px value number
 * @function
 * @memberof {modifiers~offset}
 * @private
 * @argument {String} str - Value + unit string
 * @argument {String} measurement - `height` or `width`
 * @argument {Object} popperOffsets
 * @argument {Object} referenceOffsets
 * @returns {Number|String}
 * Value in pixels, or original string if no values were extracted
 */
function toValue(str, measurement, popperOffsets, referenceOffsets) {
  // separate value from unit
  var split = str.match(/((?:\-|\+)?\d*\.?\d*)(.*)/);
  var value = +split[1];
  var unit = split[2];

  // If it's not a number it's an operator, I guess
  if (!value) {
    return str;
  }

  if (unit.indexOf('%') === 0) {
    var element = void 0;
    switch (unit) {
      case '%p':
        element = popperOffsets;
        break;
      case '%':
      case '%r':
      default:
        element = referenceOffsets;
    }

    var rect = getClientRect(element);
    return rect[measurement] / 100 * value;
  } else if (unit === 'vh' || unit === 'vw') {
    // if is a vh or vw, we calculate the size based on the viewport
    var size = void 0;
    if (unit === 'vh') {
      size = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
    } else {
      size = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    }
    return size / 100 * value;
  } else {
    // if is an explicit pixel unit, we get rid of the unit and keep the value
    // if is an implicit unit, it's px, and we return just the value
    return value;
  }
}

/**
 * Parse an `offset` string to extrapolate `x` and `y` numeric offsets.
 * @function
 * @memberof {modifiers~offset}
 * @private
 * @argument {String} offset
 * @argument {Object} popperOffsets
 * @argument {Object} referenceOffsets
 * @argument {String} basePlacement
 * @returns {Array} a two cells array with x and y offsets in numbers
 */
function parseOffset(offset, popperOffsets, referenceOffsets, basePlacement) {
  var offsets = [0, 0];

  // Use height if placement is left or right and index is 0 otherwise use width
  // in this way the first offset will use an axis and the second one
  // will use the other one
  var useHeight = ['right', 'left'].indexOf(basePlacement) !== -1;

  // Split the offset string to obtain a list of values and operands
  // The regex addresses values with the plus or minus sign in front (+10, -20, etc)
  var fragments = offset.split(/(\+|\-)/).map(function (frag) {
    return frag.trim();
  });

  // Detect if the offset string contains a pair of values or a single one
  // they could be separated by comma or space
  var divider = fragments.indexOf(find(fragments, function (frag) {
    return frag.search(/,|\s/) !== -1;
  }));

  if (fragments[divider] && fragments[divider].indexOf(',') === -1) {
    console.warn('Offsets separated by white space(s) are deprecated, use a comma (,) instead.');
  }

  // If divider is found, we divide the list of values and operands to divide
  // them by ofset X and Y.
  var splitRegex = /\s*,\s*|\s+/;
  var ops = divider !== -1 ? [fragments.slice(0, divider).concat([fragments[divider].split(splitRegex)[0]]), [fragments[divider].split(splitRegex)[1]].concat(fragments.slice(divider + 1))] : [fragments];

  // Convert the values with units to absolute pixels to allow our computations
  ops = ops.map(function (op, index) {
    // Most of the units rely on the orientation of the popper
    var measurement = (index === 1 ? !useHeight : useHeight) ? 'height' : 'width';
    var mergeWithPrevious = false;
    return op
    // This aggregates any `+` or `-` sign that aren't considered operators
    // e.g.: 10 + +5 => [10, +, +5]
    .reduce(function (a, b) {
      if (a[a.length - 1] === '' && ['+', '-'].indexOf(b) !== -1) {
        a[a.length - 1] = b;
        mergeWithPrevious = true;
        return a;
      } else if (mergeWithPrevious) {
        a[a.length - 1] += b;
        mergeWithPrevious = false;
        return a;
      } else {
        return a.concat(b);
      }
    }, [])
    // Here we convert the string values into number values (in px)
    .map(function (str) {
      return toValue(str, measurement, popperOffsets, referenceOffsets);
    });
  });

  // Loop trough the offsets arrays and execute the operations
  ops.forEach(function (op, index) {
    op.forEach(function (frag, index2) {
      if (isNumeric(frag)) {
        offsets[index] += frag * (op[index2 - 1] === '-' ? -1 : 1);
      }
    });
  });
  return offsets;
}

/**
 * @function
 * @memberof Modifiers
 * @argument {Object} data - The data object generated by update method
 * @argument {Object} options - Modifiers configuration and options
 * @argument {Number|String} options.offset=0
 * The offset value as described in the modifier description
 * @returns {Object} The data object, properly modified
 */
function offset(data, _ref) {
  var offset = _ref.offset;
  var placement = data.placement,
      _data$offsets = data.offsets,
      popper = _data$offsets.popper,
      reference = _data$offsets.reference;

  var basePlacement = placement.split('-')[0];

  var offsets = void 0;
  if (isNumeric(+offset)) {
    offsets = [+offset, 0];
  } else {
    offsets = parseOffset(offset, popper, reference, basePlacement);
  }

  if (basePlacement === 'left') {
    popper.top += offsets[0];
    popper.left -= offsets[1];
  } else if (basePlacement === 'right') {
    popper.top += offsets[0];
    popper.left += offsets[1];
  } else if (basePlacement === 'top') {
    popper.left += offsets[0];
    popper.top -= offsets[1];
  } else if (basePlacement === 'bottom') {
    popper.left += offsets[0];
    popper.top += offsets[1];
  }

  data.popper = popper;
  return data;
}

/**
 * @function
 * @memberof Modifiers
 * @argument {Object} data - The data object generated by `update` method
 * @argument {Object} options - Modifiers configuration and options
 * @returns {Object} The data object, properly modified
 */
function preventOverflow(data, options) {
  var boundariesElement = options.boundariesElement || getOffsetParent(data.instance.popper);

  // If offsetParent is the reference element, we really want to
  // go one step up and use the next offsetParent as reference to
  // avoid to make this modifier completely useless and look like broken
  if (data.instance.reference === boundariesElement) {
    boundariesElement = getOffsetParent(boundariesElement);
  }

  // NOTE: DOM access here
  // resets the popper's position so that the document size can be calculated excluding
  // the size of the popper element itself
  var transformProp = getSupportedPropertyName('transform');
  var popperStyles = data.instance.popper.style; // assignment to help minification
  var top = popperStyles.top,
      left = popperStyles.left,
      transform = popperStyles[transformProp];

  popperStyles.top = '';
  popperStyles.left = '';
  popperStyles[transformProp] = '';

  var boundaries = getBoundaries(data.instance.popper, data.instance.reference, options.padding, boundariesElement, data.positionFixed);

  // NOTE: DOM access here
  // restores the original style properties after the offsets have been computed
  popperStyles.top = top;
  popperStyles.left = left;
  popperStyles[transformProp] = transform;

  options.boundaries = boundaries;

  var order = options.priority;
  var popper = data.offsets.popper;

  var check = {
    primary: function primary(placement) {
      var value = popper[placement];
      if (popper[placement] < boundaries[placement] && !options.escapeWithReference) {
        value = Math.max(popper[placement], boundaries[placement]);
      }
      return defineProperty({}, placement, value);
    },
    secondary: function secondary(placement) {
      var mainSide = placement === 'right' ? 'left' : 'top';
      var value = popper[mainSide];
      if (popper[placement] > boundaries[placement] && !options.escapeWithReference) {
        value = Math.min(popper[mainSide], boundaries[placement] - (placement === 'right' ? popper.width : popper.height));
      }
      return defineProperty({}, mainSide, value);
    }
  };

  order.forEach(function (placement) {
    var side = ['left', 'top'].indexOf(placement) !== -1 ? 'primary' : 'secondary';
    popper = _extends({}, popper, check[side](placement));
  });

  data.offsets.popper = popper;

  return data;
}

/**
 * @function
 * @memberof Modifiers
 * @argument {Object} data - The data object generated by `update` method
 * @argument {Object} options - Modifiers configuration and options
 * @returns {Object} The data object, properly modified
 */
function shift(data) {
  var placement = data.placement;
  var basePlacement = placement.split('-')[0];
  var shiftvariation = placement.split('-')[1];

  // if shift shiftvariation is specified, run the modifier
  if (shiftvariation) {
    var _data$offsets = data.offsets,
        reference = _data$offsets.reference,
        popper = _data$offsets.popper;

    var isVertical = ['bottom', 'top'].indexOf(basePlacement) !== -1;
    var side = isVertical ? 'left' : 'top';
    var measurement = isVertical ? 'width' : 'height';

    var shiftOffsets = {
      start: defineProperty({}, side, reference[side]),
      end: defineProperty({}, side, reference[side] + reference[measurement] - popper[measurement])
    };

    data.offsets.popper = _extends({}, popper, shiftOffsets[shiftvariation]);
  }

  return data;
}

/**
 * @function
 * @memberof Modifiers
 * @argument {Object} data - The data object generated by update method
 * @argument {Object} options - Modifiers configuration and options
 * @returns {Object} The data object, properly modified
 */
function hide(data) {
  if (!isModifierRequired(data.instance.modifiers, 'hide', 'preventOverflow')) {
    return data;
  }

  var refRect = data.offsets.reference;
  var bound = find(data.instance.modifiers, function (modifier) {
    return modifier.name === 'preventOverflow';
  }).boundaries;

  if (refRect.bottom < bound.top || refRect.left > bound.right || refRect.top > bound.bottom || refRect.right < bound.left) {
    // Avoid unnecessary DOM access if visibility hasn't changed
    if (data.hide === true) {
      return data;
    }

    data.hide = true;
    data.attributes['x-out-of-boundaries'] = '';
  } else {
    // Avoid unnecessary DOM access if visibility hasn't changed
    if (data.hide === false) {
      return data;
    }

    data.hide = false;
    data.attributes['x-out-of-boundaries'] = false;
  }

  return data;
}

/**
 * @function
 * @memberof Modifiers
 * @argument {Object} data - The data object generated by `update` method
 * @argument {Object} options - Modifiers configuration and options
 * @returns {Object} The data object, properly modified
 */
function inner(data) {
  var placement = data.placement;
  var basePlacement = placement.split('-')[0];
  var _data$offsets = data.offsets,
      popper = _data$offsets.popper,
      reference = _data$offsets.reference;

  var isHoriz = ['left', 'right'].indexOf(basePlacement) !== -1;

  var subtractLength = ['top', 'left'].indexOf(basePlacement) === -1;

  popper[isHoriz ? 'left' : 'top'] = reference[basePlacement] - (subtractLength ? popper[isHoriz ? 'width' : 'height'] : 0);

  data.placement = getOppositePlacement(placement);
  data.offsets.popper = getClientRect(popper);

  return data;
}

/**
 * Modifier function, each modifier can have a function of this type assigned
 * to its `fn` property.<br />
 * These functions will be called on each update, this means that you must
 * make sure they are performant enough to avoid performance bottlenecks.
 *
 * @function ModifierFn
 * @argument {dataObject} data - The data object generated by `update` method
 * @argument {Object} options - Modifiers configuration and options
 * @returns {dataObject} The data object, properly modified
 */

/**
 * Modifiers are plugins used to alter the behavior of your poppers.<br />
 * Popper.js uses a set of 9 modifiers to provide all the basic functionalities
 * needed by the library.
 *
 * Usually you don't want to override the `order`, `fn` and `onLoad` props.
 * All the other properties are configurations that could be tweaked.
 * @namespace modifiers
 */
var modifiers = {
  /**
   * Modifier used to shift the popper on the start or end of its reference
   * element.<br />
   * It will read the variation of the `placement` property.<br />
   * It can be one either `-end` or `-start`.
   * @memberof modifiers
   * @inner
   */
  shift: {
    /** @prop {number} order=100 - Index used to define the order of execution */
    order: 100,
    /** @prop {Boolean} enabled=true - Whether the modifier is enabled or not */
    enabled: true,
    /** @prop {ModifierFn} */
    fn: shift
  },

  /**
   * The `offset` modifier can shift your popper on both its axis.
   *
   * It accepts the following units:
   * - `px` or unit-less, interpreted as pixels
   * - `%` or `%r`, percentage relative to the length of the reference element
   * - `%p`, percentage relative to the length of the popper element
   * - `vw`, CSS viewport width unit
   * - `vh`, CSS viewport height unit
   *
   * For length is intended the main axis relative to the placement of the popper.<br />
   * This means that if the placement is `top` or `bottom`, the length will be the
   * `width`. In case of `left` or `right`, it will be the `height`.
   *
   * You can provide a single value (as `Number` or `String`), or a pair of values
   * as `String` divided by a comma or one (or more) white spaces.<br />
   * The latter is a deprecated method because it leads to confusion and will be
   * removed in v2.<br />
   * Additionally, it accepts additions and subtractions between different units.
   * Note that multiplications and divisions aren't supported.
   *
   * Valid examples are:
   * ```
   * 10
   * '10%'
   * '10, 10'
   * '10%, 10'
   * '10 + 10%'
   * '10 - 5vh + 3%'
   * '-10px + 5vh, 5px - 6%'
   * ```
   * > **NB**: If you desire to apply offsets to your poppers in a way that may make them overlap
   * > with their reference element, unfortunately, you will have to disable the `flip` modifier.
   * > You can read more on this at this [issue](https://github.com/FezVrasta/popper.js/issues/373).
   *
   * @memberof modifiers
   * @inner
   */
  offset: {
    /** @prop {number} order=200 - Index used to define the order of execution */
    order: 200,
    /** @prop {Boolean} enabled=true - Whether the modifier is enabled or not */
    enabled: true,
    /** @prop {ModifierFn} */
    fn: offset,
    /** @prop {Number|String} offset=0
     * The offset value as described in the modifier description
     */
    offset: 0
  },

  /**
   * Modifier used to prevent the popper from being positioned outside the boundary.
   *
   * A scenario exists where the reference itself is not within the boundaries.<br />
   * We can say it has "escaped the boundaries" — or just "escaped".<br />
   * In this case we need to decide whether the popper should either:
   *
   * - detach from the reference and remain "trapped" in the boundaries, or
   * - if it should ignore the boundary and "escape with its reference"
   *
   * When `escapeWithReference` is set to`true` and reference is completely
   * outside its boundaries, the popper will overflow (or completely leave)
   * the boundaries in order to remain attached to the edge of the reference.
   *
   * @memberof modifiers
   * @inner
   */
  preventOverflow: {
    /** @prop {number} order=300 - Index used to define the order of execution */
    order: 300,
    /** @prop {Boolean} enabled=true - Whether the modifier is enabled or not */
    enabled: true,
    /** @prop {ModifierFn} */
    fn: preventOverflow,
    /**
     * @prop {Array} [priority=['left','right','top','bottom']]
     * Popper will try to prevent overflow following these priorities by default,
     * then, it could overflow on the left and on top of the `boundariesElement`
     */
    priority: ['left', 'right', 'top', 'bottom'],
    /**
     * @prop {number} padding=5
     * Amount of pixel used to define a minimum distance between the boundaries
     * and the popper. This makes sure the popper always has a little padding
     * between the edges of its container
     */
    padding: 5,
    /**
     * @prop {String|HTMLElement} boundariesElement='scrollParent'
     * Boundaries used by the modifier. Can be `scrollParent`, `window`,
     * `viewport` or any DOM element.
     */
    boundariesElement: 'scrollParent'
  },

  /**
   * Modifier used to make sure the reference and its popper stay near each other
   * without leaving any gap between the two. Especially useful when the arrow is
   * enabled and you want to ensure that it points to its reference element.
   * It cares only about the first axis. You can still have poppers with margin
   * between the popper and its reference element.
   * @memberof modifiers
   * @inner
   */
  keepTogether: {
    /** @prop {number} order=400 - Index used to define the order of execution */
    order: 400,
    /** @prop {Boolean} enabled=true - Whether the modifier is enabled or not */
    enabled: true,
    /** @prop {ModifierFn} */
    fn: keepTogether
  },

  /**
   * This modifier is used to move the `arrowElement` of the popper to make
   * sure it is positioned between the reference element and its popper element.
   * It will read the outer size of the `arrowElement` node to detect how many
   * pixels of conjunction are needed.
   *
   * It has no effect if no `arrowElement` is provided.
   * @memberof modifiers
   * @inner
   */
  arrow: {
    /** @prop {number} order=500 - Index used to define the order of execution */
    order: 500,
    /** @prop {Boolean} enabled=true - Whether the modifier is enabled or not */
    enabled: true,
    /** @prop {ModifierFn} */
    fn: arrow,
    /** @prop {String|HTMLElement} element='[x-arrow]' - Selector or node used as arrow */
    element: '[x-arrow]'
  },

  /**
   * Modifier used to flip the popper's placement when it starts to overlap its
   * reference element.
   *
   * Requires the `preventOverflow` modifier before it in order to work.
   *
   * **NOTE:** this modifier will interrupt the current update cycle and will
   * restart it if it detects the need to flip the placement.
   * @memberof modifiers
   * @inner
   */
  flip: {
    /** @prop {number} order=600 - Index used to define the order of execution */
    order: 600,
    /** @prop {Boolean} enabled=true - Whether the modifier is enabled or not */
    enabled: true,
    /** @prop {ModifierFn} */
    fn: flip,
    /**
     * @prop {String|Array} behavior='flip'
     * The behavior used to change the popper's placement. It can be one of
     * `flip`, `clockwise`, `counterclockwise` or an array with a list of valid
     * placements (with optional variations)
     */
    behavior: 'flip',
    /**
     * @prop {number} padding=5
     * The popper will flip if it hits the edges of the `boundariesElement`
     */
    padding: 5,
    /**
     * @prop {String|HTMLElement} boundariesElement='viewport'
     * The element which will define the boundaries of the popper position.
     * The popper will never be placed outside of the defined boundaries
     * (except if `keepTogether` is enabled)
     */
    boundariesElement: 'viewport',
    /**
     * @prop {Boolean} flipVariations=false
     * The popper will switch placement variation between `-start` and `-end` when
     * the reference element overlaps its boundaries.
     *
     * The original placement should have a set variation.
     */
    flipVariations: false,
    /**
     * @prop {Boolean} flipVariationsByContent=false
     * The popper will switch placement variation between `-start` and `-end` when
     * the popper element overlaps its reference boundaries.
     *
     * The original placement should have a set variation.
     */
    flipVariationsByContent: false
  },

  /**
   * Modifier used to make the popper flow toward the inner of the reference element.
   * By default, when this modifier is disabled, the popper will be placed outside
   * the reference element.
   * @memberof modifiers
   * @inner
   */
  inner: {
    /** @prop {number} order=700 - Index used to define the order of execution */
    order: 700,
    /** @prop {Boolean} enabled=false - Whether the modifier is enabled or not */
    enabled: false,
    /** @prop {ModifierFn} */
    fn: inner
  },

  /**
   * Modifier used to hide the popper when its reference element is outside of the
   * popper boundaries. It will set a `x-out-of-boundaries` attribute which can
   * be used to hide with a CSS selector the popper when its reference is
   * out of boundaries.
   *
   * Requires the `preventOverflow` modifier before it in order to work.
   * @memberof modifiers
   * @inner
   */
  hide: {
    /** @prop {number} order=800 - Index used to define the order of execution */
    order: 800,
    /** @prop {Boolean} enabled=true - Whether the modifier is enabled or not */
    enabled: true,
    /** @prop {ModifierFn} */
    fn: hide
  },

  /**
   * Computes the style that will be applied to the popper element to gets
   * properly positioned.
   *
   * Note that this modifier will not touch the DOM, it just prepares the styles
   * so that `applyStyle` modifier can apply it. This separation is useful
   * in case you need to replace `applyStyle` with a custom implementation.
   *
   * This modifier has `850` as `order` value to maintain backward compatibility
   * with previous versions of Popper.js. Expect the modifiers ordering method
   * to change in future major versions of the library.
   *
   * @memberof modifiers
   * @inner
   */
  computeStyle: {
    /** @prop {number} order=850 - Index used to define the order of execution */
    order: 850,
    /** @prop {Boolean} enabled=true - Whether the modifier is enabled or not */
    enabled: true,
    /** @prop {ModifierFn} */
    fn: computeStyle,
    /**
     * @prop {Boolean} gpuAcceleration=true
     * If true, it uses the CSS 3D transformation to position the popper.
     * Otherwise, it will use the `top` and `left` properties
     */
    gpuAcceleration: true,
    /**
     * @prop {string} [x='bottom']
     * Where to anchor the X axis (`bottom` or `top`). AKA X offset origin.
     * Change this if your popper should grow in a direction different from `bottom`
     */
    x: 'bottom',
    /**
     * @prop {string} [x='left']
     * Where to anchor the Y axis (`left` or `right`). AKA Y offset origin.
     * Change this if your popper should grow in a direction different from `right`
     */
    y: 'right'
  },

  /**
   * Applies the computed styles to the popper element.
   *
   * All the DOM manipulations are limited to this modifier. This is useful in case
   * you want to integrate Popper.js inside a framework or view library and you
   * want to delegate all the DOM manipulations to it.
   *
   * Note that if you disable this modifier, you must make sure the popper element
   * has its position set to `absolute` before Popper.js can do its work!
   *
   * Just disable this modifier and define your own to achieve the desired effect.
   *
   * @memberof modifiers
   * @inner
   */
  applyStyle: {
    /** @prop {number} order=900 - Index used to define the order of execution */
    order: 900,
    /** @prop {Boolean} enabled=true - Whether the modifier is enabled or not */
    enabled: true,
    /** @prop {ModifierFn} */
    fn: applyStyle,
    /** @prop {Function} */
    onLoad: applyStyleOnLoad,
    /**
     * @deprecated since version 1.10.0, the property moved to `computeStyle` modifier
     * @prop {Boolean} gpuAcceleration=true
     * If true, it uses the CSS 3D transformation to position the popper.
     * Otherwise, it will use the `top` and `left` properties
     */
    gpuAcceleration: undefined
  }
};

/**
 * The `dataObject` is an object containing all the information used by Popper.js.
 * This object is passed to modifiers and to the `onCreate` and `onUpdate` callbacks.
 * @name dataObject
 * @property {Object} data.instance The Popper.js instance
 * @property {String} data.placement Placement applied to popper
 * @property {String} data.originalPlacement Placement originally defined on init
 * @property {Boolean} data.flipped True if popper has been flipped by flip modifier
 * @property {Boolean} data.hide True if the reference element is out of boundaries, useful to know when to hide the popper
 * @property {HTMLElement} data.arrowElement Node used as arrow by arrow modifier
 * @property {Object} data.styles Any CSS property defined here will be applied to the popper. It expects the JavaScript nomenclature (eg. `marginBottom`)
 * @property {Object} data.arrowStyles Any CSS property defined here will be applied to the popper arrow. It expects the JavaScript nomenclature (eg. `marginBottom`)
 * @property {Object} data.boundaries Offsets of the popper boundaries
 * @property {Object} data.offsets The measurements of popper, reference and arrow elements
 * @property {Object} data.offsets.popper `top`, `left`, `width`, `height` values
 * @property {Object} data.offsets.reference `top`, `left`, `width`, `height` values
 * @property {Object} data.offsets.arrow] `top` and `left` offsets, only one of them will be different from 0
 */

/**
 * Default options provided to Popper.js constructor.<br />
 * These can be overridden using the `options` argument of Popper.js.<br />
 * To override an option, simply pass an object with the same
 * structure of the `options` object, as the 3rd argument. For example:
 * ```
 * new Popper(ref, pop, {
 *   modifiers: {
 *     preventOverflow: { enabled: false }
 *   }
 * })
 * ```
 * @type {Object}
 * @static
 * @memberof Popper
 */
var Defaults = {
  /**
   * Popper's placement.
   * @prop {Popper.placements} placement='bottom'
   */
  placement: 'bottom',

  /**
   * Set this to true if you want popper to position it self in 'fixed' mode
   * @prop {Boolean} positionFixed=false
   */
  positionFixed: false,

  /**
   * Whether events (resize, scroll) are initially enabled.
   * @prop {Boolean} eventsEnabled=true
   */
  eventsEnabled: true,

  /**
   * Set to true if you want to automatically remove the popper when
   * you call the `destroy` method.
   * @prop {Boolean} removeOnDestroy=false
   */
  removeOnDestroy: false,

  /**
   * Callback called when the popper is created.<br />
   * By default, it is set to no-op.<br />
   * Access Popper.js instance with `data.instance`.
   * @prop {onCreate}
   */
  onCreate: function onCreate() {},

  /**
   * Callback called when the popper is updated. This callback is not called
   * on the initialization/creation of the popper, but only on subsequent
   * updates.<br />
   * By default, it is set to no-op.<br />
   * Access Popper.js instance with `data.instance`.
   * @prop {onUpdate}
   */
  onUpdate: function onUpdate() {},

  /**
   * List of modifiers used to modify the offsets before they are applied to the popper.
   * They provide most of the functionalities of Popper.js.
   * @prop {modifiers}
   */
  modifiers: modifiers
};

/**
 * @callback onCreate
 * @param {dataObject} data
 */

/**
 * @callback onUpdate
 * @param {dataObject} data
 */

// Utils
// Methods
var Popper = function () {
  /**
   * Creates a new Popper.js instance.
   * @class Popper
   * @param {Element|referenceObject} reference - The reference element used to position the popper
   * @param {Element} popper - The HTML / XML element used as the popper
   * @param {Object} options - Your custom options to override the ones defined in [Defaults](#defaults)
   * @return {Object} instance - The generated Popper.js instance
   */
  function Popper(reference, popper) {
    var _this = this;

    var options = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {};
    classCallCheck(this, Popper);

    this.scheduleUpdate = function () {
      return requestAnimationFrame(_this.update);
    };

    // make update() debounced, so that it only runs at most once-per-tick
    this.update = debounce(this.update.bind(this));

    // with {} we create a new object with the options inside it
    this.options = _extends({}, Popper.Defaults, options);

    // init state
    this.state = {
      isDestroyed: false,
      isCreated: false,
      scrollParents: []
    };

    // get reference and popper elements (allow jQuery wrappers)
    this.reference = reference && reference.jquery ? reference[0] : reference;
    this.popper = popper && popper.jquery ? popper[0] : popper;

    // Deep merge modifiers options
    this.options.modifiers = {};
    Object.keys(_extends({}, Popper.Defaults.modifiers, options.modifiers)).forEach(function (name) {
      _this.options.modifiers[name] = _extends({}, Popper.Defaults.modifiers[name] || {}, options.modifiers ? options.modifiers[name] : {});
    });

    // Refactoring modifiers' list (Object => Array)
    this.modifiers = Object.keys(this.options.modifiers).map(function (name) {
      return _extends({
        name: name
      }, _this.options.modifiers[name]);
    })
    // sort the modifiers by order
    .sort(function (a, b) {
      return a.order - b.order;
    });

    // modifiers have the ability to execute arbitrary code when Popper.js get inited
    // such code is executed in the same order of its modifier
    // they could add new properties to their options configuration
    // BE AWARE: don't add options to `options.modifiers.name` but to `modifierOptions`!
    this.modifiers.forEach(function (modifierOptions) {
      if (modifierOptions.enabled && isFunction(modifierOptions.onLoad)) {
        modifierOptions.onLoad(_this.reference, _this.popper, _this.options, modifierOptions, _this.state);
      }
    });

    // fire the first update to position the popper in the right place
    this.update();

    var eventsEnabled = this.options.eventsEnabled;
    if (eventsEnabled) {
      // setup event listeners, they will take care of update the position in specific situations
      this.enableEventListeners();
    }

    this.state.eventsEnabled = eventsEnabled;
  }

  // We can't use class properties because they don't get listed in the
  // class prototype and break stuff like Sinon stubs


  createClass(Popper, [{
    key: 'update',
    value: function update$$1() {
      return update.call(this);
    }
  }, {
    key: 'destroy',
    value: function destroy$$1() {
      return destroy.call(this);
    }
  }, {
    key: 'enableEventListeners',
    value: function enableEventListeners$$1() {
      return enableEventListeners.call(this);
    }
  }, {
    key: 'disableEventListeners',
    value: function disableEventListeners$$1() {
      return disableEventListeners.call(this);
    }

    /**
     * Schedules an update. It will run on the next UI update available.
     * @method scheduleUpdate
     * @memberof Popper
     */


    /**
     * Collection of utilities useful when writing custom modifiers.
     * Starting from version 1.7, this method is available only if you
     * include `popper-utils.js` before `popper.js`.
     *
     * **DEPRECATION**: This way to access PopperUtils is deprecated
     * and will be removed in v2! Use the PopperUtils module directly instead.
     * Due to the high instability of the methods contained in Utils, we can't
     * guarantee them to follow semver. Use them at your own risk!
     * @static
     * @private
     * @type {Object}
     * @deprecated since version 1.8
     * @member Utils
     * @memberof Popper
     */

  }]);
  return Popper;
}();

/**
 * The `referenceObject` is an object that provides an interface compatible with Popper.js
 * and lets you use it as replacement of a real DOM node.<br />
 * You can use this method to position a popper relatively to a set of coordinates
 * in case you don't have a DOM node to use as reference.
 *
 * ```
 * new Popper(referenceObject, popperNode);
 * ```
 *
 * NB: This feature isn't supported in Internet Explorer 10.
 * @name referenceObject
 * @property {Function} data.getBoundingClientRect
 * A function that returns a set of coordinates compatible with the native `getBoundingClientRect` method.
 * @property {number} data.clientWidth
 * An ES6 getter that will return the width of the virtual reference element.
 * @property {number} data.clientHeight
 * An ES6 getter that will return the height of the virtual reference element.
 */


Popper.Utils = (typeof window !== 'undefined' ? window : global).PopperUtils;
Popper.placements = placements;
Popper.Defaults = Defaults;

/* harmony default export */ __webpack_exports__["default"] = (Popper);
//# sourceMappingURL=popper.js.map

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../../webpack/buildin/global.js */ "./node_modules/webpack/buildin/global.js")))

/***/ }),

/***/ "./node_modules/webpack/buildin/global.js":
/*!***********************************!*\
  !*** (webpack)/buildin/global.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var g;

// This works in non-strict mode
g = (function() {
	return this;
})();

try {
	// This works if eval is allowed (see CSP)
	g = g || new Function("return this")();
} catch (e) {
	// This works if the window reference is available
	if (typeof window === "object") g = window;
}

// g can still be undefined, but nothing to do about it...
// We return undefined, instead of nothing here, so it's
// easier to handle this case. if(!global) { ...}

module.exports = g;


/***/ }),

/***/ "./node_modules/webpack/buildin/module.js":
/*!***********************************!*\
  !*** (webpack)/buildin/module.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = function(module) {
	if (!module.webpackPolyfill) {
		module.deprecate = function() {};
		module.paths = [];
		// module.parent = undefined by default
		if (!module.children) module.children = [];
		Object.defineProperty(module, "loaded", {
			enumerable: true,
			get: function() {
				return module.l;
			}
		});
		Object.defineProperty(module, "id", {
			enumerable: true,
			get: function() {
				return module.i;
			}
		});
		module.webpackPolyfill = 1;
	}
	return module;
};


/***/ }),

/***/ "./resources/admin_asset/lib/bootstrap-4.5.3-dist/js/bootstrap.min.js":
/*!****************************************************************************!*\
  !*** ./resources/admin_asset/lib/bootstrap-4.5.3-dist/js/bootstrap.min.js ***!
  \****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/*!
  * Bootstrap v4.5.3 (https://getbootstrap.com/)
  * Copyright 2011-2020 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
  */
!function (t, e) {
  "object" == ( false ? undefined : _typeof(exports)) && "undefined" != typeof module ? e(exports, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js"), __webpack_require__(/*! popper.js */ "./node_modules/popper.js/dist/esm/popper.js")) :  true ? !(__WEBPACK_AMD_DEFINE_ARRAY__ = [exports, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js"), __webpack_require__(/*! popper.js */ "./node_modules/popper.js/dist/esm/popper.js")], __WEBPACK_AMD_DEFINE_FACTORY__ = (e),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : undefined;
}(this, function (t, e, n) {
  "use strict";

  function i(t) {
    return t && "object" == _typeof(t) && "default" in t ? t : {
      "default": t
    };
  }

  var o = i(e),
      a = i(n);

  function s(t, e) {
    for (var n = 0; n < e.length; n++) {
      var i = e[n];
      i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(t, i.key, i);
    }
  }

  function l(t, e, n) {
    return e && s(t.prototype, e), n && s(t, n), t;
  }

  function r() {
    return (r = Object.assign || function (t) {
      for (var e = 1; e < arguments.length; e++) {
        var n = arguments[e];

        for (var i in n) {
          Object.prototype.hasOwnProperty.call(n, i) && (t[i] = n[i]);
        }
      }

      return t;
    }).apply(this, arguments);
  }

  function u(t) {
    var e = this,
        n = !1;
    return o["default"](this).one(d.TRANSITION_END, function () {
      n = !0;
    }), setTimeout(function () {
      n || d.triggerTransitionEnd(e);
    }, t), this;
  }

  var d = {
    TRANSITION_END: "bsTransitionEnd",
    getUID: function getUID(t) {
      do {
        t += ~~(1e6 * Math.random());
      } while (document.getElementById(t));

      return t;
    },
    getSelectorFromElement: function getSelectorFromElement(t) {
      var e = t.getAttribute("data-target");

      if (!e || "#" === e) {
        var n = t.getAttribute("href");
        e = n && "#" !== n ? n.trim() : "";
      }

      try {
        return document.querySelector(e) ? e : null;
      } catch (t) {
        return null;
      }
    },
    getTransitionDurationFromElement: function getTransitionDurationFromElement(t) {
      if (!t) return 0;
      var e = o["default"](t).css("transition-duration"),
          n = o["default"](t).css("transition-delay"),
          i = parseFloat(e),
          a = parseFloat(n);
      return i || a ? (e = e.split(",")[0], n = n.split(",")[0], 1e3 * (parseFloat(e) + parseFloat(n))) : 0;
    },
    reflow: function reflow(t) {
      return t.offsetHeight;
    },
    triggerTransitionEnd: function triggerTransitionEnd(t) {
      o["default"](t).trigger("transitionend");
    },
    supportsTransitionEnd: function supportsTransitionEnd() {
      return Boolean("transitionend");
    },
    isElement: function isElement(t) {
      return (t[0] || t).nodeType;
    },
    typeCheckConfig: function typeCheckConfig(t, e, n) {
      for (var i in n) {
        if (Object.prototype.hasOwnProperty.call(n, i)) {
          var o = n[i],
              a = e[i],
              s = a && d.isElement(a) ? "element" : null === (l = a) || "undefined" == typeof l ? "" + l : {}.toString.call(l).match(/\s([a-z]+)/i)[1].toLowerCase();
          if (!new RegExp(o).test(s)) throw new Error(t.toUpperCase() + ': Option "' + i + '" provided type "' + s + '" but expected type "' + o + '".');
        }
      }

      var l;
    },
    findShadowRoot: function findShadowRoot(t) {
      if (!document.documentElement.attachShadow) return null;

      if ("function" == typeof t.getRootNode) {
        var e = t.getRootNode();
        return e instanceof ShadowRoot ? e : null;
      }

      return t instanceof ShadowRoot ? t : t.parentNode ? d.findShadowRoot(t.parentNode) : null;
    },
    jQueryDetection: function jQueryDetection() {
      if ("undefined" == typeof o["default"]) throw new TypeError("Bootstrap's JavaScript requires jQuery. jQuery must be included before Bootstrap's JavaScript.");
      var t = o["default"].fn.jquery.split(" ")[0].split(".");
      if (t[0] < 2 && t[1] < 9 || 1 === t[0] && 9 === t[1] && t[2] < 1 || t[0] >= 4) throw new Error("Bootstrap's JavaScript requires at least jQuery v1.9.1 but less than v4.0.0");
    }
  };
  d.jQueryDetection(), o["default"].fn.emulateTransitionEnd = u, o["default"].event.special[d.TRANSITION_END] = {
    bindType: "transitionend",
    delegateType: "transitionend",
    handle: function handle(t) {
      if (o["default"](t.target).is(this)) return t.handleObj.handler.apply(this, arguments);
    }
  };

  var f = "alert",
      c = o["default"].fn[f],
      h = function () {
    function t(t) {
      this._element = t;
    }

    var e = t.prototype;
    return e.close = function (t) {
      var e = this._element;
      t && (e = this._getRootElement(t)), this._triggerCloseEvent(e).isDefaultPrevented() || this._removeElement(e);
    }, e.dispose = function () {
      o["default"].removeData(this._element, "bs.alert"), this._element = null;
    }, e._getRootElement = function (t) {
      var e = d.getSelectorFromElement(t),
          n = !1;
      return e && (n = document.querySelector(e)), n || (n = o["default"](t).closest(".alert")[0]), n;
    }, e._triggerCloseEvent = function (t) {
      var e = o["default"].Event("close.bs.alert");
      return o["default"](t).trigger(e), e;
    }, e._removeElement = function (t) {
      var e = this;

      if (o["default"](t).removeClass("show"), o["default"](t).hasClass("fade")) {
        var n = d.getTransitionDurationFromElement(t);
        o["default"](t).one(d.TRANSITION_END, function (n) {
          return e._destroyElement(t, n);
        }).emulateTransitionEnd(n);
      } else this._destroyElement(t);
    }, e._destroyElement = function (t) {
      o["default"](t).detach().trigger("closed.bs.alert").remove();
    }, t._jQueryInterface = function (e) {
      return this.each(function () {
        var n = o["default"](this),
            i = n.data("bs.alert");
        i || (i = new t(this), n.data("bs.alert", i)), "close" === e && i[e](this);
      });
    }, t._handleDismiss = function (t) {
      return function (e) {
        e && e.preventDefault(), t.close(this);
      };
    }, l(t, null, [{
      key: "VERSION",
      get: function get() {
        return "4.5.3";
      }
    }]), t;
  }();

  o["default"](document).on("click.bs.alert.data-api", '[data-dismiss="alert"]', h._handleDismiss(new h())), o["default"].fn[f] = h._jQueryInterface, o["default"].fn[f].Constructor = h, o["default"].fn[f].noConflict = function () {
    return o["default"].fn[f] = c, h._jQueryInterface;
  };

  var g = o["default"].fn.button,
      m = function () {
    function t(t) {
      this._element = t, this.shouldAvoidTriggerChange = !1;
    }

    var e = t.prototype;
    return e.toggle = function () {
      var t = !0,
          e = !0,
          n = o["default"](this._element).closest('[data-toggle="buttons"]')[0];

      if (n) {
        var i = this._element.querySelector('input:not([type="hidden"])');

        if (i) {
          if ("radio" === i.type) if (i.checked && this._element.classList.contains("active")) t = !1;else {
            var a = n.querySelector(".active");
            a && o["default"](a).removeClass("active");
          }
          t && ("checkbox" !== i.type && "radio" !== i.type || (i.checked = !this._element.classList.contains("active")), this.shouldAvoidTriggerChange || o["default"](i).trigger("change")), i.focus(), e = !1;
        }
      }

      this._element.hasAttribute("disabled") || this._element.classList.contains("disabled") || (e && this._element.setAttribute("aria-pressed", !this._element.classList.contains("active")), t && o["default"](this._element).toggleClass("active"));
    }, e.dispose = function () {
      o["default"].removeData(this._element, "bs.button"), this._element = null;
    }, t._jQueryInterface = function (e, n) {
      return this.each(function () {
        var i = o["default"](this),
            a = i.data("bs.button");
        a || (a = new t(this), i.data("bs.button", a)), a.shouldAvoidTriggerChange = n, "toggle" === e && a[e]();
      });
    }, l(t, null, [{
      key: "VERSION",
      get: function get() {
        return "4.5.3";
      }
    }]), t;
  }();

  o["default"](document).on("click.bs.button.data-api", '[data-toggle^="button"]', function (t) {
    var e = t.target,
        n = e;
    if (o["default"](e).hasClass("btn") || (e = o["default"](e).closest(".btn")[0]), !e || e.hasAttribute("disabled") || e.classList.contains("disabled")) t.preventDefault();else {
      var i = e.querySelector('input:not([type="hidden"])');
      if (i && (i.hasAttribute("disabled") || i.classList.contains("disabled"))) return void t.preventDefault();
      "INPUT" !== n.tagName && "LABEL" === e.tagName || m._jQueryInterface.call(o["default"](e), "toggle", "INPUT" === n.tagName);
    }
  }).on("focus.bs.button.data-api blur.bs.button.data-api", '[data-toggle^="button"]', function (t) {
    var e = o["default"](t.target).closest(".btn")[0];
    o["default"](e).toggleClass("focus", /^focus(in)?$/.test(t.type));
  }), o["default"](window).on("load.bs.button.data-api", function () {
    for (var t = [].slice.call(document.querySelectorAll('[data-toggle="buttons"] .btn')), e = 0, n = t.length; e < n; e++) {
      var i = t[e],
          o = i.querySelector('input:not([type="hidden"])');
      o.checked || o.hasAttribute("checked") ? i.classList.add("active") : i.classList.remove("active");
    }

    for (var a = 0, s = (t = [].slice.call(document.querySelectorAll('[data-toggle="button"]'))).length; a < s; a++) {
      var l = t[a];
      "true" === l.getAttribute("aria-pressed") ? l.classList.add("active") : l.classList.remove("active");
    }
  }), o["default"].fn.button = m._jQueryInterface, o["default"].fn.button.Constructor = m, o["default"].fn.button.noConflict = function () {
    return o["default"].fn.button = g, m._jQueryInterface;
  };

  var p = "carousel",
      _ = ".bs.carousel",
      v = o["default"].fn[p],
      b = {
    interval: 5e3,
    keyboard: !0,
    slide: !1,
    pause: "hover",
    wrap: !0,
    touch: !0
  },
      y = {
    interval: "(number|boolean)",
    keyboard: "boolean",
    slide: "(boolean|string)",
    pause: "(string|boolean)",
    wrap: "boolean",
    touch: "boolean"
  },
      E = {
    TOUCH: "touch",
    PEN: "pen"
  },
      w = function () {
    function t(t, e) {
      this._items = null, this._interval = null, this._activeElement = null, this._isPaused = !1, this._isSliding = !1, this.touchTimeout = null, this.touchStartX = 0, this.touchDeltaX = 0, this._config = this._getConfig(e), this._element = t, this._indicatorsElement = this._element.querySelector(".carousel-indicators"), this._touchSupported = "ontouchstart" in document.documentElement || navigator.maxTouchPoints > 0, this._pointerEvent = Boolean(window.PointerEvent || window.MSPointerEvent), this._addEventListeners();
    }

    var e = t.prototype;
    return e.next = function () {
      this._isSliding || this._slide("next");
    }, e.nextWhenVisible = function () {
      var t = o["default"](this._element);
      !document.hidden && t.is(":visible") && "hidden" !== t.css("visibility") && this.next();
    }, e.prev = function () {
      this._isSliding || this._slide("prev");
    }, e.pause = function (t) {
      t || (this._isPaused = !0), this._element.querySelector(".carousel-item-next, .carousel-item-prev") && (d.triggerTransitionEnd(this._element), this.cycle(!0)), clearInterval(this._interval), this._interval = null;
    }, e.cycle = function (t) {
      t || (this._isPaused = !1), this._interval && (clearInterval(this._interval), this._interval = null), this._config.interval && !this._isPaused && (this._interval = setInterval((document.visibilityState ? this.nextWhenVisible : this.next).bind(this), this._config.interval));
    }, e.to = function (t) {
      var e = this;
      this._activeElement = this._element.querySelector(".active.carousel-item");

      var n = this._getItemIndex(this._activeElement);

      if (!(t > this._items.length - 1 || t < 0)) if (this._isSliding) o["default"](this._element).one("slid.bs.carousel", function () {
        return e.to(t);
      });else {
        if (n === t) return this.pause(), void this.cycle();
        var i = t > n ? "next" : "prev";

        this._slide(i, this._items[t]);
      }
    }, e.dispose = function () {
      o["default"](this._element).off(_), o["default"].removeData(this._element, "bs.carousel"), this._items = null, this._config = null, this._element = null, this._interval = null, this._isPaused = null, this._isSliding = null, this._activeElement = null, this._indicatorsElement = null;
    }, e._getConfig = function (t) {
      return t = r({}, b, t), d.typeCheckConfig(p, t, y), t;
    }, e._handleSwipe = function () {
      var t = Math.abs(this.touchDeltaX);

      if (!(t <= 40)) {
        var e = t / this.touchDeltaX;
        this.touchDeltaX = 0, e > 0 && this.prev(), e < 0 && this.next();
      }
    }, e._addEventListeners = function () {
      var t = this;
      this._config.keyboard && o["default"](this._element).on("keydown.bs.carousel", function (e) {
        return t._keydown(e);
      }), "hover" === this._config.pause && o["default"](this._element).on("mouseenter.bs.carousel", function (e) {
        return t.pause(e);
      }).on("mouseleave.bs.carousel", function (e) {
        return t.cycle(e);
      }), this._config.touch && this._addTouchEventListeners();
    }, e._addTouchEventListeners = function () {
      var t = this;

      if (this._touchSupported) {
        var e = function e(_e) {
          t._pointerEvent && E[_e.originalEvent.pointerType.toUpperCase()] ? t.touchStartX = _e.originalEvent.clientX : t._pointerEvent || (t.touchStartX = _e.originalEvent.touches[0].clientX);
        },
            n = function n(e) {
          t._pointerEvent && E[e.originalEvent.pointerType.toUpperCase()] && (t.touchDeltaX = e.originalEvent.clientX - t.touchStartX), t._handleSwipe(), "hover" === t._config.pause && (t.pause(), t.touchTimeout && clearTimeout(t.touchTimeout), t.touchTimeout = setTimeout(function (e) {
            return t.cycle(e);
          }, 500 + t._config.interval));
        };

        o["default"](this._element.querySelectorAll(".carousel-item img")).on("dragstart.bs.carousel", function (t) {
          return t.preventDefault();
        }), this._pointerEvent ? (o["default"](this._element).on("pointerdown.bs.carousel", function (t) {
          return e(t);
        }), o["default"](this._element).on("pointerup.bs.carousel", function (t) {
          return n(t);
        }), this._element.classList.add("pointer-event")) : (o["default"](this._element).on("touchstart.bs.carousel", function (t) {
          return e(t);
        }), o["default"](this._element).on("touchmove.bs.carousel", function (e) {
          return function (e) {
            e.originalEvent.touches && e.originalEvent.touches.length > 1 ? t.touchDeltaX = 0 : t.touchDeltaX = e.originalEvent.touches[0].clientX - t.touchStartX;
          }(e);
        }), o["default"](this._element).on("touchend.bs.carousel", function (t) {
          return n(t);
        }));
      }
    }, e._keydown = function (t) {
      if (!/input|textarea/i.test(t.target.tagName)) switch (t.which) {
        case 37:
          t.preventDefault(), this.prev();
          break;

        case 39:
          t.preventDefault(), this.next();
      }
    }, e._getItemIndex = function (t) {
      return this._items = t && t.parentNode ? [].slice.call(t.parentNode.querySelectorAll(".carousel-item")) : [], this._items.indexOf(t);
    }, e._getItemByDirection = function (t, e) {
      var n = "next" === t,
          i = "prev" === t,
          o = this._getItemIndex(e),
          a = this._items.length - 1;

      if ((i && 0 === o || n && o === a) && !this._config.wrap) return e;
      var s = (o + ("prev" === t ? -1 : 1)) % this._items.length;
      return -1 === s ? this._items[this._items.length - 1] : this._items[s];
    }, e._triggerSlideEvent = function (t, e) {
      var n = this._getItemIndex(t),
          i = this._getItemIndex(this._element.querySelector(".active.carousel-item")),
          a = o["default"].Event("slide.bs.carousel", {
        relatedTarget: t,
        direction: e,
        from: i,
        to: n
      });

      return o["default"](this._element).trigger(a), a;
    }, e._setActiveIndicatorElement = function (t) {
      if (this._indicatorsElement) {
        var e = [].slice.call(this._indicatorsElement.querySelectorAll(".active"));
        o["default"](e).removeClass("active");

        var n = this._indicatorsElement.children[this._getItemIndex(t)];

        n && o["default"](n).addClass("active");
      }
    }, e._slide = function (t, e) {
      var n,
          i,
          a,
          s = this,
          l = this._element.querySelector(".active.carousel-item"),
          r = this._getItemIndex(l),
          u = e || l && this._getItemByDirection(t, l),
          f = this._getItemIndex(u),
          c = Boolean(this._interval);

      if ("next" === t ? (n = "carousel-item-left", i = "carousel-item-next", a = "left") : (n = "carousel-item-right", i = "carousel-item-prev", a = "right"), u && o["default"](u).hasClass("active")) this._isSliding = !1;else if (!this._triggerSlideEvent(u, a).isDefaultPrevented() && l && u) {
        this._isSliding = !0, c && this.pause(), this._setActiveIndicatorElement(u);
        var h = o["default"].Event("slid.bs.carousel", {
          relatedTarget: u,
          direction: a,
          from: r,
          to: f
        });

        if (o["default"](this._element).hasClass("slide")) {
          o["default"](u).addClass(i), d.reflow(u), o["default"](l).addClass(n), o["default"](u).addClass(n);
          var g = parseInt(u.getAttribute("data-interval"), 10);
          g ? (this._config.defaultInterval = this._config.defaultInterval || this._config.interval, this._config.interval = g) : this._config.interval = this._config.defaultInterval || this._config.interval;
          var m = d.getTransitionDurationFromElement(l);
          o["default"](l).one(d.TRANSITION_END, function () {
            o["default"](u).removeClass(n + " " + i).addClass("active"), o["default"](l).removeClass("active " + i + " " + n), s._isSliding = !1, setTimeout(function () {
              return o["default"](s._element).trigger(h);
            }, 0);
          }).emulateTransitionEnd(m);
        } else o["default"](l).removeClass("active"), o["default"](u).addClass("active"), this._isSliding = !1, o["default"](this._element).trigger(h);

        c && this.cycle();
      }
    }, t._jQueryInterface = function (e) {
      return this.each(function () {
        var n = o["default"](this).data("bs.carousel"),
            i = r({}, b, o["default"](this).data());
        "object" == _typeof(e) && (i = r({}, i, e));
        var a = "string" == typeof e ? e : i.slide;
        if (n || (n = new t(this, i), o["default"](this).data("bs.carousel", n)), "number" == typeof e) n.to(e);else if ("string" == typeof a) {
          if ("undefined" == typeof n[a]) throw new TypeError('No method named "' + a + '"');
          n[a]();
        } else i.interval && i.ride && (n.pause(), n.cycle());
      });
    }, t._dataApiClickHandler = function (e) {
      var n = d.getSelectorFromElement(this);

      if (n) {
        var i = o["default"](n)[0];

        if (i && o["default"](i).hasClass("carousel")) {
          var a = r({}, o["default"](i).data(), o["default"](this).data()),
              s = this.getAttribute("data-slide-to");
          s && (a.interval = !1), t._jQueryInterface.call(o["default"](i), a), s && o["default"](i).data("bs.carousel").to(s), e.preventDefault();
        }
      }
    }, l(t, null, [{
      key: "VERSION",
      get: function get() {
        return "4.5.3";
      }
    }, {
      key: "Default",
      get: function get() {
        return b;
      }
    }]), t;
  }();

  o["default"](document).on("click.bs.carousel.data-api", "[data-slide], [data-slide-to]", w._dataApiClickHandler), o["default"](window).on("load.bs.carousel.data-api", function () {
    for (var t = [].slice.call(document.querySelectorAll('[data-ride="carousel"]')), e = 0, n = t.length; e < n; e++) {
      var i = o["default"](t[e]);

      w._jQueryInterface.call(i, i.data());
    }
  }), o["default"].fn[p] = w._jQueryInterface, o["default"].fn[p].Constructor = w, o["default"].fn[p].noConflict = function () {
    return o["default"].fn[p] = v, w._jQueryInterface;
  };

  var T = "collapse",
      C = o["default"].fn[T],
      S = {
    toggle: !0,
    parent: ""
  },
      N = {
    toggle: "boolean",
    parent: "(string|element)"
  },
      D = function () {
    function t(t, e) {
      this._isTransitioning = !1, this._element = t, this._config = this._getConfig(e), this._triggerArray = [].slice.call(document.querySelectorAll('[data-toggle="collapse"][href="#' + t.id + '"],[data-toggle="collapse"][data-target="#' + t.id + '"]'));

      for (var n = [].slice.call(document.querySelectorAll('[data-toggle="collapse"]')), i = 0, o = n.length; i < o; i++) {
        var a = n[i],
            s = d.getSelectorFromElement(a),
            l = [].slice.call(document.querySelectorAll(s)).filter(function (e) {
          return e === t;
        });
        null !== s && l.length > 0 && (this._selector = s, this._triggerArray.push(a));
      }

      this._parent = this._config.parent ? this._getParent() : null, this._config.parent || this._addAriaAndCollapsedClass(this._element, this._triggerArray), this._config.toggle && this.toggle();
    }

    var e = t.prototype;
    return e.toggle = function () {
      o["default"](this._element).hasClass("show") ? this.hide() : this.show();
    }, e.show = function () {
      var e,
          n,
          i = this;

      if (!this._isTransitioning && !o["default"](this._element).hasClass("show") && (this._parent && 0 === (e = [].slice.call(this._parent.querySelectorAll(".show, .collapsing")).filter(function (t) {
        return "string" == typeof i._config.parent ? t.getAttribute("data-parent") === i._config.parent : t.classList.contains("collapse");
      })).length && (e = null), !(e && (n = o["default"](e).not(this._selector).data("bs.collapse")) && n._isTransitioning))) {
        var a = o["default"].Event("show.bs.collapse");

        if (o["default"](this._element).trigger(a), !a.isDefaultPrevented()) {
          e && (t._jQueryInterface.call(o["default"](e).not(this._selector), "hide"), n || o["default"](e).data("bs.collapse", null));

          var s = this._getDimension();

          o["default"](this._element).removeClass("collapse").addClass("collapsing"), this._element.style[s] = 0, this._triggerArray.length && o["default"](this._triggerArray).removeClass("collapsed").attr("aria-expanded", !0), this.setTransitioning(!0);
          var l = "scroll" + (s[0].toUpperCase() + s.slice(1)),
              r = d.getTransitionDurationFromElement(this._element);
          o["default"](this._element).one(d.TRANSITION_END, function () {
            o["default"](i._element).removeClass("collapsing").addClass("collapse show"), i._element.style[s] = "", i.setTransitioning(!1), o["default"](i._element).trigger("shown.bs.collapse");
          }).emulateTransitionEnd(r), this._element.style[s] = this._element[l] + "px";
        }
      }
    }, e.hide = function () {
      var t = this;

      if (!this._isTransitioning && o["default"](this._element).hasClass("show")) {
        var e = o["default"].Event("hide.bs.collapse");

        if (o["default"](this._element).trigger(e), !e.isDefaultPrevented()) {
          var n = this._getDimension();

          this._element.style[n] = this._element.getBoundingClientRect()[n] + "px", d.reflow(this._element), o["default"](this._element).addClass("collapsing").removeClass("collapse show");
          var i = this._triggerArray.length;
          if (i > 0) for (var a = 0; a < i; a++) {
            var s = this._triggerArray[a],
                l = d.getSelectorFromElement(s);
            if (null !== l) o["default"]([].slice.call(document.querySelectorAll(l))).hasClass("show") || o["default"](s).addClass("collapsed").attr("aria-expanded", !1);
          }
          this.setTransitioning(!0);
          this._element.style[n] = "";
          var r = d.getTransitionDurationFromElement(this._element);
          o["default"](this._element).one(d.TRANSITION_END, function () {
            t.setTransitioning(!1), o["default"](t._element).removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse");
          }).emulateTransitionEnd(r);
        }
      }
    }, e.setTransitioning = function (t) {
      this._isTransitioning = t;
    }, e.dispose = function () {
      o["default"].removeData(this._element, "bs.collapse"), this._config = null, this._parent = null, this._element = null, this._triggerArray = null, this._isTransitioning = null;
    }, e._getConfig = function (t) {
      return (t = r({}, S, t)).toggle = Boolean(t.toggle), d.typeCheckConfig(T, t, N), t;
    }, e._getDimension = function () {
      return o["default"](this._element).hasClass("width") ? "width" : "height";
    }, e._getParent = function () {
      var e,
          n = this;
      d.isElement(this._config.parent) ? (e = this._config.parent, "undefined" != typeof this._config.parent.jquery && (e = this._config.parent[0])) : e = document.querySelector(this._config.parent);
      var i = '[data-toggle="collapse"][data-parent="' + this._config.parent + '"]',
          a = [].slice.call(e.querySelectorAll(i));
      return o["default"](a).each(function (e, i) {
        n._addAriaAndCollapsedClass(t._getTargetFromElement(i), [i]);
      }), e;
    }, e._addAriaAndCollapsedClass = function (t, e) {
      var n = o["default"](t).hasClass("show");
      e.length && o["default"](e).toggleClass("collapsed", !n).attr("aria-expanded", n);
    }, t._getTargetFromElement = function (t) {
      var e = d.getSelectorFromElement(t);
      return e ? document.querySelector(e) : null;
    }, t._jQueryInterface = function (e) {
      return this.each(function () {
        var n = o["default"](this),
            i = n.data("bs.collapse"),
            a = r({}, S, n.data(), "object" == _typeof(e) && e ? e : {});

        if (!i && a.toggle && "string" == typeof e && /show|hide/.test(e) && (a.toggle = !1), i || (i = new t(this, a), n.data("bs.collapse", i)), "string" == typeof e) {
          if ("undefined" == typeof i[e]) throw new TypeError('No method named "' + e + '"');
          i[e]();
        }
      });
    }, l(t, null, [{
      key: "VERSION",
      get: function get() {
        return "4.5.3";
      }
    }, {
      key: "Default",
      get: function get() {
        return S;
      }
    }]), t;
  }();

  o["default"](document).on("click.bs.collapse.data-api", '[data-toggle="collapse"]', function (t) {
    "A" === t.currentTarget.tagName && t.preventDefault();
    var e = o["default"](this),
        n = d.getSelectorFromElement(this),
        i = [].slice.call(document.querySelectorAll(n));
    o["default"](i).each(function () {
      var t = o["default"](this),
          n = t.data("bs.collapse") ? "toggle" : e.data();

      D._jQueryInterface.call(t, n);
    });
  }), o["default"].fn[T] = D._jQueryInterface, o["default"].fn[T].Constructor = D, o["default"].fn[T].noConflict = function () {
    return o["default"].fn[T] = C, D._jQueryInterface;
  };

  var k = "dropdown",
      A = o["default"].fn[k],
      I = new RegExp("38|40|27"),
      j = {
    offset: 0,
    flip: !0,
    boundary: "scrollParent",
    reference: "toggle",
    display: "dynamic",
    popperConfig: null
  },
      O = {
    offset: "(number|string|function)",
    flip: "boolean",
    boundary: "(string|element)",
    reference: "(string|element)",
    display: "string",
    popperConfig: "(null|object)"
  },
      x = function () {
    function t(t, e) {
      this._element = t, this._popper = null, this._config = this._getConfig(e), this._menu = this._getMenuElement(), this._inNavbar = this._detectNavbar(), this._addEventListeners();
    }

    var e = t.prototype;
    return e.toggle = function () {
      if (!this._element.disabled && !o["default"](this._element).hasClass("disabled")) {
        var e = o["default"](this._menu).hasClass("show");
        t._clearMenus(), e || this.show(!0);
      }
    }, e.show = function (e) {
      if (void 0 === e && (e = !1), !(this._element.disabled || o["default"](this._element).hasClass("disabled") || o["default"](this._menu).hasClass("show"))) {
        var n = {
          relatedTarget: this._element
        },
            i = o["default"].Event("show.bs.dropdown", n),
            s = t._getParentFromElement(this._element);

        if (o["default"](s).trigger(i), !i.isDefaultPrevented()) {
          if (!this._inNavbar && e) {
            if ("undefined" == typeof a["default"]) throw new TypeError("Bootstrap's dropdowns require Popper.js (https://popper.js.org/)");
            var l = this._element;
            "parent" === this._config.reference ? l = s : d.isElement(this._config.reference) && (l = this._config.reference, "undefined" != typeof this._config.reference.jquery && (l = this._config.reference[0])), "scrollParent" !== this._config.boundary && o["default"](s).addClass("position-static"), this._popper = new a["default"](l, this._menu, this._getPopperConfig());
          }

          "ontouchstart" in document.documentElement && 0 === o["default"](s).closest(".navbar-nav").length && o["default"](document.body).children().on("mouseover", null, o["default"].noop), this._element.focus(), this._element.setAttribute("aria-expanded", !0), o["default"](this._menu).toggleClass("show"), o["default"](s).toggleClass("show").trigger(o["default"].Event("shown.bs.dropdown", n));
        }
      }
    }, e.hide = function () {
      if (!this._element.disabled && !o["default"](this._element).hasClass("disabled") && o["default"](this._menu).hasClass("show")) {
        var e = {
          relatedTarget: this._element
        },
            n = o["default"].Event("hide.bs.dropdown", e),
            i = t._getParentFromElement(this._element);

        o["default"](i).trigger(n), n.isDefaultPrevented() || (this._popper && this._popper.destroy(), o["default"](this._menu).toggleClass("show"), o["default"](i).toggleClass("show").trigger(o["default"].Event("hidden.bs.dropdown", e)));
      }
    }, e.dispose = function () {
      o["default"].removeData(this._element, "bs.dropdown"), o["default"](this._element).off(".bs.dropdown"), this._element = null, this._menu = null, null !== this._popper && (this._popper.destroy(), this._popper = null);
    }, e.update = function () {
      this._inNavbar = this._detectNavbar(), null !== this._popper && this._popper.scheduleUpdate();
    }, e._addEventListeners = function () {
      var t = this;
      o["default"](this._element).on("click.bs.dropdown", function (e) {
        e.preventDefault(), e.stopPropagation(), t.toggle();
      });
    }, e._getConfig = function (t) {
      return t = r({}, this.constructor.Default, o["default"](this._element).data(), t), d.typeCheckConfig(k, t, this.constructor.DefaultType), t;
    }, e._getMenuElement = function () {
      if (!this._menu) {
        var e = t._getParentFromElement(this._element);

        e && (this._menu = e.querySelector(".dropdown-menu"));
      }

      return this._menu;
    }, e._getPlacement = function () {
      var t = o["default"](this._element.parentNode),
          e = "bottom-start";
      return t.hasClass("dropup") ? e = o["default"](this._menu).hasClass("dropdown-menu-right") ? "top-end" : "top-start" : t.hasClass("dropright") ? e = "right-start" : t.hasClass("dropleft") ? e = "left-start" : o["default"](this._menu).hasClass("dropdown-menu-right") && (e = "bottom-end"), e;
    }, e._detectNavbar = function () {
      return o["default"](this._element).closest(".navbar").length > 0;
    }, e._getOffset = function () {
      var t = this,
          e = {};
      return "function" == typeof this._config.offset ? e.fn = function (e) {
        return e.offsets = r({}, e.offsets, t._config.offset(e.offsets, t._element) || {}), e;
      } : e.offset = this._config.offset, e;
    }, e._getPopperConfig = function () {
      var t = {
        placement: this._getPlacement(),
        modifiers: {
          offset: this._getOffset(),
          flip: {
            enabled: this._config.flip
          },
          preventOverflow: {
            boundariesElement: this._config.boundary
          }
        }
      };
      return "static" === this._config.display && (t.modifiers.applyStyle = {
        enabled: !1
      }), r({}, t, this._config.popperConfig);
    }, t._jQueryInterface = function (e) {
      return this.each(function () {
        var n = o["default"](this).data("bs.dropdown");

        if (n || (n = new t(this, "object" == _typeof(e) ? e : null), o["default"](this).data("bs.dropdown", n)), "string" == typeof e) {
          if ("undefined" == typeof n[e]) throw new TypeError('No method named "' + e + '"');
          n[e]();
        }
      });
    }, t._clearMenus = function (e) {
      if (!e || 3 !== e.which && ("keyup" !== e.type || 9 === e.which)) for (var n = [].slice.call(document.querySelectorAll('[data-toggle="dropdown"]')), i = 0, a = n.length; i < a; i++) {
        var s = t._getParentFromElement(n[i]),
            l = o["default"](n[i]).data("bs.dropdown"),
            r = {
          relatedTarget: n[i]
        };

        if (e && "click" === e.type && (r.clickEvent = e), l) {
          var u = l._menu;

          if (o["default"](s).hasClass("show") && !(e && ("click" === e.type && /input|textarea/i.test(e.target.tagName) || "keyup" === e.type && 9 === e.which) && o["default"].contains(s, e.target))) {
            var d = o["default"].Event("hide.bs.dropdown", r);
            o["default"](s).trigger(d), d.isDefaultPrevented() || ("ontouchstart" in document.documentElement && o["default"](document.body).children().off("mouseover", null, o["default"].noop), n[i].setAttribute("aria-expanded", "false"), l._popper && l._popper.destroy(), o["default"](u).removeClass("show"), o["default"](s).removeClass("show").trigger(o["default"].Event("hidden.bs.dropdown", r)));
          }
        }
      }
    }, t._getParentFromElement = function (t) {
      var e,
          n = d.getSelectorFromElement(t);
      return n && (e = document.querySelector(n)), e || t.parentNode;
    }, t._dataApiKeydownHandler = function (e) {
      if (!(/input|textarea/i.test(e.target.tagName) ? 32 === e.which || 27 !== e.which && (40 !== e.which && 38 !== e.which || o["default"](e.target).closest(".dropdown-menu").length) : !I.test(e.which)) && !this.disabled && !o["default"](this).hasClass("disabled")) {
        var n = t._getParentFromElement(this),
            i = o["default"](n).hasClass("show");

        if (i || 27 !== e.which) {
          if (e.preventDefault(), e.stopPropagation(), !i || 27 === e.which || 32 === e.which) return 27 === e.which && o["default"](n.querySelector('[data-toggle="dropdown"]')).trigger("focus"), void o["default"](this).trigger("click");
          var a = [].slice.call(n.querySelectorAll(".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)")).filter(function (t) {
            return o["default"](t).is(":visible");
          });

          if (0 !== a.length) {
            var s = a.indexOf(e.target);
            38 === e.which && s > 0 && s--, 40 === e.which && s < a.length - 1 && s++, s < 0 && (s = 0), a[s].focus();
          }
        }
      }
    }, l(t, null, [{
      key: "VERSION",
      get: function get() {
        return "4.5.3";
      }
    }, {
      key: "Default",
      get: function get() {
        return j;
      }
    }, {
      key: "DefaultType",
      get: function get() {
        return O;
      }
    }]), t;
  }();

  o["default"](document).on("keydown.bs.dropdown.data-api", '[data-toggle="dropdown"]', x._dataApiKeydownHandler).on("keydown.bs.dropdown.data-api", ".dropdown-menu", x._dataApiKeydownHandler).on("click.bs.dropdown.data-api keyup.bs.dropdown.data-api", x._clearMenus).on("click.bs.dropdown.data-api", '[data-toggle="dropdown"]', function (t) {
    t.preventDefault(), t.stopPropagation(), x._jQueryInterface.call(o["default"](this), "toggle");
  }).on("click.bs.dropdown.data-api", ".dropdown form", function (t) {
    t.stopPropagation();
  }), o["default"].fn[k] = x._jQueryInterface, o["default"].fn[k].Constructor = x, o["default"].fn[k].noConflict = function () {
    return o["default"].fn[k] = A, x._jQueryInterface;
  };

  var P = o["default"].fn.modal,
      R = {
    backdrop: !0,
    keyboard: !0,
    focus: !0,
    show: !0
  },
      L = {
    backdrop: "(boolean|string)",
    keyboard: "boolean",
    focus: "boolean",
    show: "boolean"
  },
      q = function () {
    function t(t, e) {
      this._config = this._getConfig(e), this._element = t, this._dialog = t.querySelector(".modal-dialog"), this._backdrop = null, this._isShown = !1, this._isBodyOverflowing = !1, this._ignoreBackdropClick = !1, this._isTransitioning = !1, this._scrollbarWidth = 0;
    }

    var e = t.prototype;
    return e.toggle = function (t) {
      return this._isShown ? this.hide() : this.show(t);
    }, e.show = function (t) {
      var e = this;

      if (!this._isShown && !this._isTransitioning) {
        o["default"](this._element).hasClass("fade") && (this._isTransitioning = !0);
        var n = o["default"].Event("show.bs.modal", {
          relatedTarget: t
        });
        o["default"](this._element).trigger(n), this._isShown || n.isDefaultPrevented() || (this._isShown = !0, this._checkScrollbar(), this._setScrollbar(), this._adjustDialog(), this._setEscapeEvent(), this._setResizeEvent(), o["default"](this._element).on("click.dismiss.bs.modal", '[data-dismiss="modal"]', function (t) {
          return e.hide(t);
        }), o["default"](this._dialog).on("mousedown.dismiss.bs.modal", function () {
          o["default"](e._element).one("mouseup.dismiss.bs.modal", function (t) {
            o["default"](t.target).is(e._element) && (e._ignoreBackdropClick = !0);
          });
        }), this._showBackdrop(function () {
          return e._showElement(t);
        }));
      }
    }, e.hide = function (t) {
      var e = this;

      if (t && t.preventDefault(), this._isShown && !this._isTransitioning) {
        var n = o["default"].Event("hide.bs.modal");

        if (o["default"](this._element).trigger(n), this._isShown && !n.isDefaultPrevented()) {
          this._isShown = !1;
          var i = o["default"](this._element).hasClass("fade");

          if (i && (this._isTransitioning = !0), this._setEscapeEvent(), this._setResizeEvent(), o["default"](document).off("focusin.bs.modal"), o["default"](this._element).removeClass("show"), o["default"](this._element).off("click.dismiss.bs.modal"), o["default"](this._dialog).off("mousedown.dismiss.bs.modal"), i) {
            var a = d.getTransitionDurationFromElement(this._element);
            o["default"](this._element).one(d.TRANSITION_END, function (t) {
              return e._hideModal(t);
            }).emulateTransitionEnd(a);
          } else this._hideModal();
        }
      }
    }, e.dispose = function () {
      [window, this._element, this._dialog].forEach(function (t) {
        return o["default"](t).off(".bs.modal");
      }), o["default"](document).off("focusin.bs.modal"), o["default"].removeData(this._element, "bs.modal"), this._config = null, this._element = null, this._dialog = null, this._backdrop = null, this._isShown = null, this._isBodyOverflowing = null, this._ignoreBackdropClick = null, this._isTransitioning = null, this._scrollbarWidth = null;
    }, e.handleUpdate = function () {
      this._adjustDialog();
    }, e._getConfig = function (t) {
      return t = r({}, R, t), d.typeCheckConfig("modal", t, L), t;
    }, e._triggerBackdropTransition = function () {
      var t = this;

      if ("static" === this._config.backdrop) {
        var e = o["default"].Event("hidePrevented.bs.modal");
        if (o["default"](this._element).trigger(e), e.isDefaultPrevented()) return;
        var n = this._element.scrollHeight > document.documentElement.clientHeight;
        n || (this._element.style.overflowY = "hidden"), this._element.classList.add("modal-static");
        var i = d.getTransitionDurationFromElement(this._dialog);
        o["default"](this._element).off(d.TRANSITION_END), o["default"](this._element).one(d.TRANSITION_END, function () {
          t._element.classList.remove("modal-static"), n || o["default"](t._element).one(d.TRANSITION_END, function () {
            t._element.style.overflowY = "";
          }).emulateTransitionEnd(t._element, i);
        }).emulateTransitionEnd(i), this._element.focus();
      } else this.hide();
    }, e._showElement = function (t) {
      var e = this,
          n = o["default"](this._element).hasClass("fade"),
          i = this._dialog ? this._dialog.querySelector(".modal-body") : null;
      this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE || document.body.appendChild(this._element), this._element.style.display = "block", this._element.removeAttribute("aria-hidden"), this._element.setAttribute("aria-modal", !0), this._element.setAttribute("role", "dialog"), o["default"](this._dialog).hasClass("modal-dialog-scrollable") && i ? i.scrollTop = 0 : this._element.scrollTop = 0, n && d.reflow(this._element), o["default"](this._element).addClass("show"), this._config.focus && this._enforceFocus();

      var a = o["default"].Event("shown.bs.modal", {
        relatedTarget: t
      }),
          s = function s() {
        e._config.focus && e._element.focus(), e._isTransitioning = !1, o["default"](e._element).trigger(a);
      };

      if (n) {
        var l = d.getTransitionDurationFromElement(this._dialog);
        o["default"](this._dialog).one(d.TRANSITION_END, s).emulateTransitionEnd(l);
      } else s();
    }, e._enforceFocus = function () {
      var t = this;
      o["default"](document).off("focusin.bs.modal").on("focusin.bs.modal", function (e) {
        document !== e.target && t._element !== e.target && 0 === o["default"](t._element).has(e.target).length && t._element.focus();
      });
    }, e._setEscapeEvent = function () {
      var t = this;
      this._isShown ? o["default"](this._element).on("keydown.dismiss.bs.modal", function (e) {
        t._config.keyboard && 27 === e.which ? (e.preventDefault(), t.hide()) : t._config.keyboard || 27 !== e.which || t._triggerBackdropTransition();
      }) : this._isShown || o["default"](this._element).off("keydown.dismiss.bs.modal");
    }, e._setResizeEvent = function () {
      var t = this;
      this._isShown ? o["default"](window).on("resize.bs.modal", function (e) {
        return t.handleUpdate(e);
      }) : o["default"](window).off("resize.bs.modal");
    }, e._hideModal = function () {
      var t = this;
      this._element.style.display = "none", this._element.setAttribute("aria-hidden", !0), this._element.removeAttribute("aria-modal"), this._element.removeAttribute("role"), this._isTransitioning = !1, this._showBackdrop(function () {
        o["default"](document.body).removeClass("modal-open"), t._resetAdjustments(), t._resetScrollbar(), o["default"](t._element).trigger("hidden.bs.modal");
      });
    }, e._removeBackdrop = function () {
      this._backdrop && (o["default"](this._backdrop).remove(), this._backdrop = null);
    }, e._showBackdrop = function (t) {
      var e = this,
          n = o["default"](this._element).hasClass("fade") ? "fade" : "";

      if (this._isShown && this._config.backdrop) {
        if (this._backdrop = document.createElement("div"), this._backdrop.className = "modal-backdrop", n && this._backdrop.classList.add(n), o["default"](this._backdrop).appendTo(document.body), o["default"](this._element).on("click.dismiss.bs.modal", function (t) {
          e._ignoreBackdropClick ? e._ignoreBackdropClick = !1 : t.target === t.currentTarget && e._triggerBackdropTransition();
        }), n && d.reflow(this._backdrop), o["default"](this._backdrop).addClass("show"), !t) return;
        if (!n) return void t();
        var i = d.getTransitionDurationFromElement(this._backdrop);
        o["default"](this._backdrop).one(d.TRANSITION_END, t).emulateTransitionEnd(i);
      } else if (!this._isShown && this._backdrop) {
        o["default"](this._backdrop).removeClass("show");

        var a = function a() {
          e._removeBackdrop(), t && t();
        };

        if (o["default"](this._element).hasClass("fade")) {
          var s = d.getTransitionDurationFromElement(this._backdrop);
          o["default"](this._backdrop).one(d.TRANSITION_END, a).emulateTransitionEnd(s);
        } else a();
      } else t && t();
    }, e._adjustDialog = function () {
      var t = this._element.scrollHeight > document.documentElement.clientHeight;
      !this._isBodyOverflowing && t && (this._element.style.paddingLeft = this._scrollbarWidth + "px"), this._isBodyOverflowing && !t && (this._element.style.paddingRight = this._scrollbarWidth + "px");
    }, e._resetAdjustments = function () {
      this._element.style.paddingLeft = "", this._element.style.paddingRight = "";
    }, e._checkScrollbar = function () {
      var t = document.body.getBoundingClientRect();
      this._isBodyOverflowing = Math.round(t.left + t.right) < window.innerWidth, this._scrollbarWidth = this._getScrollbarWidth();
    }, e._setScrollbar = function () {
      var t = this;

      if (this._isBodyOverflowing) {
        var e = [].slice.call(document.querySelectorAll(".fixed-top, .fixed-bottom, .is-fixed, .sticky-top")),
            n = [].slice.call(document.querySelectorAll(".sticky-top"));
        o["default"](e).each(function (e, n) {
          var i = n.style.paddingRight,
              a = o["default"](n).css("padding-right");
          o["default"](n).data("padding-right", i).css("padding-right", parseFloat(a) + t._scrollbarWidth + "px");
        }), o["default"](n).each(function (e, n) {
          var i = n.style.marginRight,
              a = o["default"](n).css("margin-right");
          o["default"](n).data("margin-right", i).css("margin-right", parseFloat(a) - t._scrollbarWidth + "px");
        });
        var i = document.body.style.paddingRight,
            a = o["default"](document.body).css("padding-right");
        o["default"](document.body).data("padding-right", i).css("padding-right", parseFloat(a) + this._scrollbarWidth + "px");
      }

      o["default"](document.body).addClass("modal-open");
    }, e._resetScrollbar = function () {
      var t = [].slice.call(document.querySelectorAll(".fixed-top, .fixed-bottom, .is-fixed, .sticky-top"));
      o["default"](t).each(function (t, e) {
        var n = o["default"](e).data("padding-right");
        o["default"](e).removeData("padding-right"), e.style.paddingRight = n || "";
      });
      var e = [].slice.call(document.querySelectorAll(".sticky-top"));
      o["default"](e).each(function (t, e) {
        var n = o["default"](e).data("margin-right");
        "undefined" != typeof n && o["default"](e).css("margin-right", n).removeData("margin-right");
      });
      var n = o["default"](document.body).data("padding-right");
      o["default"](document.body).removeData("padding-right"), document.body.style.paddingRight = n || "";
    }, e._getScrollbarWidth = function () {
      var t = document.createElement("div");
      t.className = "modal-scrollbar-measure", document.body.appendChild(t);
      var e = t.getBoundingClientRect().width - t.clientWidth;
      return document.body.removeChild(t), e;
    }, t._jQueryInterface = function (e, n) {
      return this.each(function () {
        var i = o["default"](this).data("bs.modal"),
            a = r({}, R, o["default"](this).data(), "object" == _typeof(e) && e ? e : {});

        if (i || (i = new t(this, a), o["default"](this).data("bs.modal", i)), "string" == typeof e) {
          if ("undefined" == typeof i[e]) throw new TypeError('No method named "' + e + '"');
          i[e](n);
        } else a.show && i.show(n);
      });
    }, l(t, null, [{
      key: "VERSION",
      get: function get() {
        return "4.5.3";
      }
    }, {
      key: "Default",
      get: function get() {
        return R;
      }
    }]), t;
  }();

  o["default"](document).on("click.bs.modal.data-api", '[data-toggle="modal"]', function (t) {
    var e,
        n = this,
        i = d.getSelectorFromElement(this);
    i && (e = document.querySelector(i));
    var a = o["default"](e).data("bs.modal") ? "toggle" : r({}, o["default"](e).data(), o["default"](this).data());
    "A" !== this.tagName && "AREA" !== this.tagName || t.preventDefault();
    var s = o["default"](e).one("show.bs.modal", function (t) {
      t.isDefaultPrevented() || s.one("hidden.bs.modal", function () {
        o["default"](n).is(":visible") && n.focus();
      });
    });

    q._jQueryInterface.call(o["default"](e), a, this);
  }), o["default"].fn.modal = q._jQueryInterface, o["default"].fn.modal.Constructor = q, o["default"].fn.modal.noConflict = function () {
    return o["default"].fn.modal = P, q._jQueryInterface;
  };
  var F = ["background", "cite", "href", "itemtype", "longdesc", "poster", "src", "xlink:href"],
      Q = {
    "*": ["class", "dir", "id", "lang", "role", /^aria-[\w-]*$/i],
    a: ["target", "href", "title", "rel"],
    area: [],
    b: [],
    br: [],
    col: [],
    code: [],
    div: [],
    em: [],
    hr: [],
    h1: [],
    h2: [],
    h3: [],
    h4: [],
    h5: [],
    h6: [],
    i: [],
    img: ["src", "srcset", "alt", "title", "width", "height"],
    li: [],
    ol: [],
    p: [],
    pre: [],
    s: [],
    small: [],
    span: [],
    sub: [],
    sup: [],
    strong: [],
    u: [],
    ul: []
  },
      B = /^(?:(?:https?|mailto|ftp|tel|file):|[^#&/:?]*(?:[#/?]|$))/gi,
      H = /^data:(?:image\/(?:bmp|gif|jpeg|jpg|png|tiff|webp)|video\/(?:mpeg|mp4|ogg|webm)|audio\/(?:mp3|oga|ogg|opus));base64,[\d+/a-z]+=*$/i;

  function U(t, e, n) {
    if (0 === t.length) return t;
    if (n && "function" == typeof n) return n(t);

    for (var i = new window.DOMParser().parseFromString(t, "text/html"), o = Object.keys(e), a = [].slice.call(i.body.querySelectorAll("*")), s = function s(t, n) {
      var i = a[t],
          s = i.nodeName.toLowerCase();
      if (-1 === o.indexOf(i.nodeName.toLowerCase())) return i.parentNode.removeChild(i), "continue";
      var l = [].slice.call(i.attributes),
          r = [].concat(e["*"] || [], e[s] || []);
      l.forEach(function (t) {
        (function (t, e) {
          var n = t.nodeName.toLowerCase();
          if (-1 !== e.indexOf(n)) return -1 === F.indexOf(n) || Boolean(t.nodeValue.match(B) || t.nodeValue.match(H));

          for (var i = e.filter(function (t) {
            return t instanceof RegExp;
          }), o = 0, a = i.length; o < a; o++) {
            if (n.match(i[o])) return !0;
          }

          return !1;
        })(t, r) || i.removeAttribute(t.nodeName);
      });
    }, l = 0, r = a.length; l < r; l++) {
      s(l);
    }

    return i.body.innerHTML;
  }

  var M = "tooltip",
      W = o["default"].fn[M],
      V = new RegExp("(^|\\s)bs-tooltip\\S+", "g"),
      z = ["sanitize", "whiteList", "sanitizeFn"],
      K = {
    animation: "boolean",
    template: "string",
    title: "(string|element|function)",
    trigger: "string",
    delay: "(number|object)",
    html: "boolean",
    selector: "(string|boolean)",
    placement: "(string|function)",
    offset: "(number|string|function)",
    container: "(string|element|boolean)",
    fallbackPlacement: "(string|array)",
    boundary: "(string|element)",
    sanitize: "boolean",
    sanitizeFn: "(null|function)",
    whiteList: "object",
    popperConfig: "(null|object)"
  },
      X = {
    AUTO: "auto",
    TOP: "top",
    RIGHT: "right",
    BOTTOM: "bottom",
    LEFT: "left"
  },
      Y = {
    animation: !0,
    template: '<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
    trigger: "hover focus",
    title: "",
    delay: 0,
    html: !1,
    selector: !1,
    placement: "top",
    offset: 0,
    container: !1,
    fallbackPlacement: "flip",
    boundary: "scrollParent",
    sanitize: !0,
    sanitizeFn: null,
    whiteList: Q,
    popperConfig: null
  },
      $ = {
    HIDE: "hide.bs.tooltip",
    HIDDEN: "hidden.bs.tooltip",
    SHOW: "show.bs.tooltip",
    SHOWN: "shown.bs.tooltip",
    INSERTED: "inserted.bs.tooltip",
    CLICK: "click.bs.tooltip",
    FOCUSIN: "focusin.bs.tooltip",
    FOCUSOUT: "focusout.bs.tooltip",
    MOUSEENTER: "mouseenter.bs.tooltip",
    MOUSELEAVE: "mouseleave.bs.tooltip"
  },
      J = function () {
    function t(t, e) {
      if ("undefined" == typeof a["default"]) throw new TypeError("Bootstrap's tooltips require Popper.js (https://popper.js.org/)");
      this._isEnabled = !0, this._timeout = 0, this._hoverState = "", this._activeTrigger = {}, this._popper = null, this.element = t, this.config = this._getConfig(e), this.tip = null, this._setListeners();
    }

    var e = t.prototype;
    return e.enable = function () {
      this._isEnabled = !0;
    }, e.disable = function () {
      this._isEnabled = !1;
    }, e.toggleEnabled = function () {
      this._isEnabled = !this._isEnabled;
    }, e.toggle = function (t) {
      if (this._isEnabled) if (t) {
        var e = this.constructor.DATA_KEY,
            n = o["default"](t.currentTarget).data(e);
        n || (n = new this.constructor(t.currentTarget, this._getDelegateConfig()), o["default"](t.currentTarget).data(e, n)), n._activeTrigger.click = !n._activeTrigger.click, n._isWithActiveTrigger() ? n._enter(null, n) : n._leave(null, n);
      } else {
        if (o["default"](this.getTipElement()).hasClass("show")) return void this._leave(null, this);

        this._enter(null, this);
      }
    }, e.dispose = function () {
      clearTimeout(this._timeout), o["default"].removeData(this.element, this.constructor.DATA_KEY), o["default"](this.element).off(this.constructor.EVENT_KEY), o["default"](this.element).closest(".modal").off("hide.bs.modal", this._hideModalHandler), this.tip && o["default"](this.tip).remove(), this._isEnabled = null, this._timeout = null, this._hoverState = null, this._activeTrigger = null, this._popper && this._popper.destroy(), this._popper = null, this.element = null, this.config = null, this.tip = null;
    }, e.show = function () {
      var t = this;
      if ("none" === o["default"](this.element).css("display")) throw new Error("Please use show on visible elements");
      var e = o["default"].Event(this.constructor.Event.SHOW);

      if (this.isWithContent() && this._isEnabled) {
        o["default"](this.element).trigger(e);
        var n = d.findShadowRoot(this.element),
            i = o["default"].contains(null !== n ? n : this.element.ownerDocument.documentElement, this.element);
        if (e.isDefaultPrevented() || !i) return;
        var s = this.getTipElement(),
            l = d.getUID(this.constructor.NAME);
        s.setAttribute("id", l), this.element.setAttribute("aria-describedby", l), this.setContent(), this.config.animation && o["default"](s).addClass("fade");

        var r = "function" == typeof this.config.placement ? this.config.placement.call(this, s, this.element) : this.config.placement,
            u = this._getAttachment(r);

        this.addAttachmentClass(u);

        var f = this._getContainer();

        o["default"](s).data(this.constructor.DATA_KEY, this), o["default"].contains(this.element.ownerDocument.documentElement, this.tip) || o["default"](s).appendTo(f), o["default"](this.element).trigger(this.constructor.Event.INSERTED), this._popper = new a["default"](this.element, s, this._getPopperConfig(u)), o["default"](s).addClass("show"), "ontouchstart" in document.documentElement && o["default"](document.body).children().on("mouseover", null, o["default"].noop);

        var c = function c() {
          t.config.animation && t._fixTransition();
          var e = t._hoverState;
          t._hoverState = null, o["default"](t.element).trigger(t.constructor.Event.SHOWN), "out" === e && t._leave(null, t);
        };

        if (o["default"](this.tip).hasClass("fade")) {
          var h = d.getTransitionDurationFromElement(this.tip);
          o["default"](this.tip).one(d.TRANSITION_END, c).emulateTransitionEnd(h);
        } else c();
      }
    }, e.hide = function (t) {
      var e = this,
          n = this.getTipElement(),
          i = o["default"].Event(this.constructor.Event.HIDE),
          a = function a() {
        "show" !== e._hoverState && n.parentNode && n.parentNode.removeChild(n), e._cleanTipClass(), e.element.removeAttribute("aria-describedby"), o["default"](e.element).trigger(e.constructor.Event.HIDDEN), null !== e._popper && e._popper.destroy(), t && t();
      };

      if (o["default"](this.element).trigger(i), !i.isDefaultPrevented()) {
        if (o["default"](n).removeClass("show"), "ontouchstart" in document.documentElement && o["default"](document.body).children().off("mouseover", null, o["default"].noop), this._activeTrigger.click = !1, this._activeTrigger.focus = !1, this._activeTrigger.hover = !1, o["default"](this.tip).hasClass("fade")) {
          var s = d.getTransitionDurationFromElement(n);
          o["default"](n).one(d.TRANSITION_END, a).emulateTransitionEnd(s);
        } else a();

        this._hoverState = "";
      }
    }, e.update = function () {
      null !== this._popper && this._popper.scheduleUpdate();
    }, e.isWithContent = function () {
      return Boolean(this.getTitle());
    }, e.addAttachmentClass = function (t) {
      o["default"](this.getTipElement()).addClass("bs-tooltip-" + t);
    }, e.getTipElement = function () {
      return this.tip = this.tip || o["default"](this.config.template)[0], this.tip;
    }, e.setContent = function () {
      var t = this.getTipElement();
      this.setElementContent(o["default"](t.querySelectorAll(".tooltip-inner")), this.getTitle()), o["default"](t).removeClass("fade show");
    }, e.setElementContent = function (t, e) {
      "object" != _typeof(e) || !e.nodeType && !e.jquery ? this.config.html ? (this.config.sanitize && (e = U(e, this.config.whiteList, this.config.sanitizeFn)), t.html(e)) : t.text(e) : this.config.html ? o["default"](e).parent().is(t) || t.empty().append(e) : t.text(o["default"](e).text());
    }, e.getTitle = function () {
      var t = this.element.getAttribute("data-original-title");
      return t || (t = "function" == typeof this.config.title ? this.config.title.call(this.element) : this.config.title), t;
    }, e._getPopperConfig = function (t) {
      var e = this;
      return r({}, {
        placement: t,
        modifiers: {
          offset: this._getOffset(),
          flip: {
            behavior: this.config.fallbackPlacement
          },
          arrow: {
            element: ".arrow"
          },
          preventOverflow: {
            boundariesElement: this.config.boundary
          }
        },
        onCreate: function onCreate(t) {
          t.originalPlacement !== t.placement && e._handlePopperPlacementChange(t);
        },
        onUpdate: function onUpdate(t) {
          return e._handlePopperPlacementChange(t);
        }
      }, this.config.popperConfig);
    }, e._getOffset = function () {
      var t = this,
          e = {};
      return "function" == typeof this.config.offset ? e.fn = function (e) {
        return e.offsets = r({}, e.offsets, t.config.offset(e.offsets, t.element) || {}), e;
      } : e.offset = this.config.offset, e;
    }, e._getContainer = function () {
      return !1 === this.config.container ? document.body : d.isElement(this.config.container) ? o["default"](this.config.container) : o["default"](document).find(this.config.container);
    }, e._getAttachment = function (t) {
      return X[t.toUpperCase()];
    }, e._setListeners = function () {
      var t = this;
      this.config.trigger.split(" ").forEach(function (e) {
        if ("click" === e) o["default"](t.element).on(t.constructor.Event.CLICK, t.config.selector, function (e) {
          return t.toggle(e);
        });else if ("manual" !== e) {
          var n = "hover" === e ? t.constructor.Event.MOUSEENTER : t.constructor.Event.FOCUSIN,
              i = "hover" === e ? t.constructor.Event.MOUSELEAVE : t.constructor.Event.FOCUSOUT;
          o["default"](t.element).on(n, t.config.selector, function (e) {
            return t._enter(e);
          }).on(i, t.config.selector, function (e) {
            return t._leave(e);
          });
        }
      }), this._hideModalHandler = function () {
        t.element && t.hide();
      }, o["default"](this.element).closest(".modal").on("hide.bs.modal", this._hideModalHandler), this.config.selector ? this.config = r({}, this.config, {
        trigger: "manual",
        selector: ""
      }) : this._fixTitle();
    }, e._fixTitle = function () {
      var t = _typeof(this.element.getAttribute("data-original-title"));

      (this.element.getAttribute("title") || "string" !== t) && (this.element.setAttribute("data-original-title", this.element.getAttribute("title") || ""), this.element.setAttribute("title", ""));
    }, e._enter = function (t, e) {
      var n = this.constructor.DATA_KEY;
      (e = e || o["default"](t.currentTarget).data(n)) || (e = new this.constructor(t.currentTarget, this._getDelegateConfig()), o["default"](t.currentTarget).data(n, e)), t && (e._activeTrigger["focusin" === t.type ? "focus" : "hover"] = !0), o["default"](e.getTipElement()).hasClass("show") || "show" === e._hoverState ? e._hoverState = "show" : (clearTimeout(e._timeout), e._hoverState = "show", e.config.delay && e.config.delay.show ? e._timeout = setTimeout(function () {
        "show" === e._hoverState && e.show();
      }, e.config.delay.show) : e.show());
    }, e._leave = function (t, e) {
      var n = this.constructor.DATA_KEY;
      (e = e || o["default"](t.currentTarget).data(n)) || (e = new this.constructor(t.currentTarget, this._getDelegateConfig()), o["default"](t.currentTarget).data(n, e)), t && (e._activeTrigger["focusout" === t.type ? "focus" : "hover"] = !1), e._isWithActiveTrigger() || (clearTimeout(e._timeout), e._hoverState = "out", e.config.delay && e.config.delay.hide ? e._timeout = setTimeout(function () {
        "out" === e._hoverState && e.hide();
      }, e.config.delay.hide) : e.hide());
    }, e._isWithActiveTrigger = function () {
      for (var t in this._activeTrigger) {
        if (this._activeTrigger[t]) return !0;
      }

      return !1;
    }, e._getConfig = function (t) {
      var e = o["default"](this.element).data();
      return Object.keys(e).forEach(function (t) {
        -1 !== z.indexOf(t) && delete e[t];
      }), "number" == typeof (t = r({}, this.constructor.Default, e, "object" == _typeof(t) && t ? t : {})).delay && (t.delay = {
        show: t.delay,
        hide: t.delay
      }), "number" == typeof t.title && (t.title = t.title.toString()), "number" == typeof t.content && (t.content = t.content.toString()), d.typeCheckConfig(M, t, this.constructor.DefaultType), t.sanitize && (t.template = U(t.template, t.whiteList, t.sanitizeFn)), t;
    }, e._getDelegateConfig = function () {
      var t = {};
      if (this.config) for (var e in this.config) {
        this.constructor.Default[e] !== this.config[e] && (t[e] = this.config[e]);
      }
      return t;
    }, e._cleanTipClass = function () {
      var t = o["default"](this.getTipElement()),
          e = t.attr("class").match(V);
      null !== e && e.length && t.removeClass(e.join(""));
    }, e._handlePopperPlacementChange = function (t) {
      this.tip = t.instance.popper, this._cleanTipClass(), this.addAttachmentClass(this._getAttachment(t.placement));
    }, e._fixTransition = function () {
      var t = this.getTipElement(),
          e = this.config.animation;
      null === t.getAttribute("x-placement") && (o["default"](t).removeClass("fade"), this.config.animation = !1, this.hide(), this.show(), this.config.animation = e);
    }, t._jQueryInterface = function (e) {
      return this.each(function () {
        var n = o["default"](this),
            i = n.data("bs.tooltip"),
            a = "object" == _typeof(e) && e;

        if ((i || !/dispose|hide/.test(e)) && (i || (i = new t(this, a), n.data("bs.tooltip", i)), "string" == typeof e)) {
          if ("undefined" == typeof i[e]) throw new TypeError('No method named "' + e + '"');
          i[e]();
        }
      });
    }, l(t, null, [{
      key: "VERSION",
      get: function get() {
        return "4.5.3";
      }
    }, {
      key: "Default",
      get: function get() {
        return Y;
      }
    }, {
      key: "NAME",
      get: function get() {
        return M;
      }
    }, {
      key: "DATA_KEY",
      get: function get() {
        return "bs.tooltip";
      }
    }, {
      key: "Event",
      get: function get() {
        return $;
      }
    }, {
      key: "EVENT_KEY",
      get: function get() {
        return ".bs.tooltip";
      }
    }, {
      key: "DefaultType",
      get: function get() {
        return K;
      }
    }]), t;
  }();

  o["default"].fn[M] = J._jQueryInterface, o["default"].fn[M].Constructor = J, o["default"].fn[M].noConflict = function () {
    return o["default"].fn[M] = W, J._jQueryInterface;
  };

  var G = "popover",
      Z = o["default"].fn[G],
      tt = new RegExp("(^|\\s)bs-popover\\S+", "g"),
      et = r({}, J.Default, {
    placement: "right",
    trigger: "click",
    content: "",
    template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
  }),
      nt = r({}, J.DefaultType, {
    content: "(string|element|function)"
  }),
      it = {
    HIDE: "hide.bs.popover",
    HIDDEN: "hidden.bs.popover",
    SHOW: "show.bs.popover",
    SHOWN: "shown.bs.popover",
    INSERTED: "inserted.bs.popover",
    CLICK: "click.bs.popover",
    FOCUSIN: "focusin.bs.popover",
    FOCUSOUT: "focusout.bs.popover",
    MOUSEENTER: "mouseenter.bs.popover",
    MOUSELEAVE: "mouseleave.bs.popover"
  },
      ot = function (t) {
    var e, n;

    function i() {
      return t.apply(this, arguments) || this;
    }

    n = t, (e = i).prototype = Object.create(n.prototype), e.prototype.constructor = e, e.__proto__ = n;
    var a = i.prototype;
    return a.isWithContent = function () {
      return this.getTitle() || this._getContent();
    }, a.addAttachmentClass = function (t) {
      o["default"](this.getTipElement()).addClass("bs-popover-" + t);
    }, a.getTipElement = function () {
      return this.tip = this.tip || o["default"](this.config.template)[0], this.tip;
    }, a.setContent = function () {
      var t = o["default"](this.getTipElement());
      this.setElementContent(t.find(".popover-header"), this.getTitle());

      var e = this._getContent();

      "function" == typeof e && (e = e.call(this.element)), this.setElementContent(t.find(".popover-body"), e), t.removeClass("fade show");
    }, a._getContent = function () {
      return this.element.getAttribute("data-content") || this.config.content;
    }, a._cleanTipClass = function () {
      var t = o["default"](this.getTipElement()),
          e = t.attr("class").match(tt);
      null !== e && e.length > 0 && t.removeClass(e.join(""));
    }, i._jQueryInterface = function (t) {
      return this.each(function () {
        var e = o["default"](this).data("bs.popover"),
            n = "object" == _typeof(t) ? t : null;

        if ((e || !/dispose|hide/.test(t)) && (e || (e = new i(this, n), o["default"](this).data("bs.popover", e)), "string" == typeof t)) {
          if ("undefined" == typeof e[t]) throw new TypeError('No method named "' + t + '"');
          e[t]();
        }
      });
    }, l(i, null, [{
      key: "VERSION",
      get: function get() {
        return "4.5.3";
      }
    }, {
      key: "Default",
      get: function get() {
        return et;
      }
    }, {
      key: "NAME",
      get: function get() {
        return G;
      }
    }, {
      key: "DATA_KEY",
      get: function get() {
        return "bs.popover";
      }
    }, {
      key: "Event",
      get: function get() {
        return it;
      }
    }, {
      key: "EVENT_KEY",
      get: function get() {
        return ".bs.popover";
      }
    }, {
      key: "DefaultType",
      get: function get() {
        return nt;
      }
    }]), i;
  }(J);

  o["default"].fn[G] = ot._jQueryInterface, o["default"].fn[G].Constructor = ot, o["default"].fn[G].noConflict = function () {
    return o["default"].fn[G] = Z, ot._jQueryInterface;
  };

  var at = "scrollspy",
      st = o["default"].fn[at],
      lt = {
    offset: 10,
    method: "auto",
    target: ""
  },
      rt = {
    offset: "number",
    method: "string",
    target: "(string|element)"
  },
      ut = function () {
    function t(t, e) {
      var n = this;
      this._element = t, this._scrollElement = "BODY" === t.tagName ? window : t, this._config = this._getConfig(e), this._selector = this._config.target + " .nav-link," + this._config.target + " .list-group-item," + this._config.target + " .dropdown-item", this._offsets = [], this._targets = [], this._activeTarget = null, this._scrollHeight = 0, o["default"](this._scrollElement).on("scroll.bs.scrollspy", function (t) {
        return n._process(t);
      }), this.refresh(), this._process();
    }

    var e = t.prototype;
    return e.refresh = function () {
      var t = this,
          e = this._scrollElement === this._scrollElement.window ? "offset" : "position",
          n = "auto" === this._config.method ? e : this._config.method,
          i = "position" === n ? this._getScrollTop() : 0;
      this._offsets = [], this._targets = [], this._scrollHeight = this._getScrollHeight(), [].slice.call(document.querySelectorAll(this._selector)).map(function (t) {
        var e,
            a = d.getSelectorFromElement(t);

        if (a && (e = document.querySelector(a)), e) {
          var s = e.getBoundingClientRect();
          if (s.width || s.height) return [o["default"](e)[n]().top + i, a];
        }

        return null;
      }).filter(function (t) {
        return t;
      }).sort(function (t, e) {
        return t[0] - e[0];
      }).forEach(function (e) {
        t._offsets.push(e[0]), t._targets.push(e[1]);
      });
    }, e.dispose = function () {
      o["default"].removeData(this._element, "bs.scrollspy"), o["default"](this._scrollElement).off(".bs.scrollspy"), this._element = null, this._scrollElement = null, this._config = null, this._selector = null, this._offsets = null, this._targets = null, this._activeTarget = null, this._scrollHeight = null;
    }, e._getConfig = function (t) {
      if ("string" != typeof (t = r({}, lt, "object" == _typeof(t) && t ? t : {})).target && d.isElement(t.target)) {
        var e = o["default"](t.target).attr("id");
        e || (e = d.getUID(at), o["default"](t.target).attr("id", e)), t.target = "#" + e;
      }

      return d.typeCheckConfig(at, t, rt), t;
    }, e._getScrollTop = function () {
      return this._scrollElement === window ? this._scrollElement.pageYOffset : this._scrollElement.scrollTop;
    }, e._getScrollHeight = function () {
      return this._scrollElement.scrollHeight || Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);
    }, e._getOffsetHeight = function () {
      return this._scrollElement === window ? window.innerHeight : this._scrollElement.getBoundingClientRect().height;
    }, e._process = function () {
      var t = this._getScrollTop() + this._config.offset,
          e = this._getScrollHeight(),
          n = this._config.offset + e - this._getOffsetHeight();

      if (this._scrollHeight !== e && this.refresh(), t >= n) {
        var i = this._targets[this._targets.length - 1];
        this._activeTarget !== i && this._activate(i);
      } else {
        if (this._activeTarget && t < this._offsets[0] && this._offsets[0] > 0) return this._activeTarget = null, void this._clear();

        for (var o = this._offsets.length; o--;) {
          this._activeTarget !== this._targets[o] && t >= this._offsets[o] && ("undefined" == typeof this._offsets[o + 1] || t < this._offsets[o + 1]) && this._activate(this._targets[o]);
        }
      }
    }, e._activate = function (t) {
      this._activeTarget = t, this._clear();

      var e = this._selector.split(",").map(function (e) {
        return e + '[data-target="' + t + '"],' + e + '[href="' + t + '"]';
      }),
          n = o["default"]([].slice.call(document.querySelectorAll(e.join(","))));

      n.hasClass("dropdown-item") ? (n.closest(".dropdown").find(".dropdown-toggle").addClass("active"), n.addClass("active")) : (n.addClass("active"), n.parents(".nav, .list-group").prev(".nav-link, .list-group-item").addClass("active"), n.parents(".nav, .list-group").prev(".nav-item").children(".nav-link").addClass("active")), o["default"](this._scrollElement).trigger("activate.bs.scrollspy", {
        relatedTarget: t
      });
    }, e._clear = function () {
      [].slice.call(document.querySelectorAll(this._selector)).filter(function (t) {
        return t.classList.contains("active");
      }).forEach(function (t) {
        return t.classList.remove("active");
      });
    }, t._jQueryInterface = function (e) {
      return this.each(function () {
        var n = o["default"](this).data("bs.scrollspy");

        if (n || (n = new t(this, "object" == _typeof(e) && e), o["default"](this).data("bs.scrollspy", n)), "string" == typeof e) {
          if ("undefined" == typeof n[e]) throw new TypeError('No method named "' + e + '"');
          n[e]();
        }
      });
    }, l(t, null, [{
      key: "VERSION",
      get: function get() {
        return "4.5.3";
      }
    }, {
      key: "Default",
      get: function get() {
        return lt;
      }
    }]), t;
  }();

  o["default"](window).on("load.bs.scrollspy.data-api", function () {
    for (var t = [].slice.call(document.querySelectorAll('[data-spy="scroll"]')), e = t.length; e--;) {
      var n = o["default"](t[e]);

      ut._jQueryInterface.call(n, n.data());
    }
  }), o["default"].fn[at] = ut._jQueryInterface, o["default"].fn[at].Constructor = ut, o["default"].fn[at].noConflict = function () {
    return o["default"].fn[at] = st, ut._jQueryInterface;
  };

  var dt = o["default"].fn.tab,
      ft = function () {
    function t(t) {
      this._element = t;
    }

    var e = t.prototype;
    return e.show = function () {
      var t = this;

      if (!(this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE && o["default"](this._element).hasClass("active") || o["default"](this._element).hasClass("disabled"))) {
        var e,
            n,
            i = o["default"](this._element).closest(".nav, .list-group")[0],
            a = d.getSelectorFromElement(this._element);

        if (i) {
          var s = "UL" === i.nodeName || "OL" === i.nodeName ? "> li > .active" : ".active";
          n = (n = o["default"].makeArray(o["default"](i).find(s)))[n.length - 1];
        }

        var l = o["default"].Event("hide.bs.tab", {
          relatedTarget: this._element
        }),
            r = o["default"].Event("show.bs.tab", {
          relatedTarget: n
        });

        if (n && o["default"](n).trigger(l), o["default"](this._element).trigger(r), !r.isDefaultPrevented() && !l.isDefaultPrevented()) {
          a && (e = document.querySelector(a)), this._activate(this._element, i);

          var u = function u() {
            var e = o["default"].Event("hidden.bs.tab", {
              relatedTarget: t._element
            }),
                i = o["default"].Event("shown.bs.tab", {
              relatedTarget: n
            });
            o["default"](n).trigger(e), o["default"](t._element).trigger(i);
          };

          e ? this._activate(e, e.parentNode, u) : u();
        }
      }
    }, e.dispose = function () {
      o["default"].removeData(this._element, "bs.tab"), this._element = null;
    }, e._activate = function (t, e, n) {
      var i = this,
          a = (!e || "UL" !== e.nodeName && "OL" !== e.nodeName ? o["default"](e).children(".active") : o["default"](e).find("> li > .active"))[0],
          s = n && a && o["default"](a).hasClass("fade"),
          l = function l() {
        return i._transitionComplete(t, a, n);
      };

      if (a && s) {
        var r = d.getTransitionDurationFromElement(a);
        o["default"](a).removeClass("show").one(d.TRANSITION_END, l).emulateTransitionEnd(r);
      } else l();
    }, e._transitionComplete = function (t, e, n) {
      if (e) {
        o["default"](e).removeClass("active");
        var i = o["default"](e.parentNode).find("> .dropdown-menu .active")[0];
        i && o["default"](i).removeClass("active"), "tab" === e.getAttribute("role") && e.setAttribute("aria-selected", !1);
      }

      if (o["default"](t).addClass("active"), "tab" === t.getAttribute("role") && t.setAttribute("aria-selected", !0), d.reflow(t), t.classList.contains("fade") && t.classList.add("show"), t.parentNode && o["default"](t.parentNode).hasClass("dropdown-menu")) {
        var a = o["default"](t).closest(".dropdown")[0];

        if (a) {
          var s = [].slice.call(a.querySelectorAll(".dropdown-toggle"));
          o["default"](s).addClass("active");
        }

        t.setAttribute("aria-expanded", !0);
      }

      n && n();
    }, t._jQueryInterface = function (e) {
      return this.each(function () {
        var n = o["default"](this),
            i = n.data("bs.tab");

        if (i || (i = new t(this), n.data("bs.tab", i)), "string" == typeof e) {
          if ("undefined" == typeof i[e]) throw new TypeError('No method named "' + e + '"');
          i[e]();
        }
      });
    }, l(t, null, [{
      key: "VERSION",
      get: function get() {
        return "4.5.3";
      }
    }]), t;
  }();

  o["default"](document).on("click.bs.tab.data-api", '[data-toggle="tab"], [data-toggle="pill"], [data-toggle="list"]', function (t) {
    t.preventDefault(), ft._jQueryInterface.call(o["default"](this), "show");
  }), o["default"].fn.tab = ft._jQueryInterface, o["default"].fn.tab.Constructor = ft, o["default"].fn.tab.noConflict = function () {
    return o["default"].fn.tab = dt, ft._jQueryInterface;
  };

  var ct = o["default"].fn.toast,
      ht = {
    animation: "boolean",
    autohide: "boolean",
    delay: "number"
  },
      gt = {
    animation: !0,
    autohide: !0,
    delay: 500
  },
      mt = function () {
    function t(t, e) {
      this._element = t, this._config = this._getConfig(e), this._timeout = null, this._setListeners();
    }

    var e = t.prototype;
    return e.show = function () {
      var t = this,
          e = o["default"].Event("show.bs.toast");

      if (o["default"](this._element).trigger(e), !e.isDefaultPrevented()) {
        this._clearTimeout(), this._config.animation && this._element.classList.add("fade");

        var n = function n() {
          t._element.classList.remove("showing"), t._element.classList.add("show"), o["default"](t._element).trigger("shown.bs.toast"), t._config.autohide && (t._timeout = setTimeout(function () {
            t.hide();
          }, t._config.delay));
        };

        if (this._element.classList.remove("hide"), d.reflow(this._element), this._element.classList.add("showing"), this._config.animation) {
          var i = d.getTransitionDurationFromElement(this._element);
          o["default"](this._element).one(d.TRANSITION_END, n).emulateTransitionEnd(i);
        } else n();
      }
    }, e.hide = function () {
      if (this._element.classList.contains("show")) {
        var t = o["default"].Event("hide.bs.toast");
        o["default"](this._element).trigger(t), t.isDefaultPrevented() || this._close();
      }
    }, e.dispose = function () {
      this._clearTimeout(), this._element.classList.contains("show") && this._element.classList.remove("show"), o["default"](this._element).off("click.dismiss.bs.toast"), o["default"].removeData(this._element, "bs.toast"), this._element = null, this._config = null;
    }, e._getConfig = function (t) {
      return t = r({}, gt, o["default"](this._element).data(), "object" == _typeof(t) && t ? t : {}), d.typeCheckConfig("toast", t, this.constructor.DefaultType), t;
    }, e._setListeners = function () {
      var t = this;
      o["default"](this._element).on("click.dismiss.bs.toast", '[data-dismiss="toast"]', function () {
        return t.hide();
      });
    }, e._close = function () {
      var t = this,
          e = function e() {
        t._element.classList.add("hide"), o["default"](t._element).trigger("hidden.bs.toast");
      };

      if (this._element.classList.remove("show"), this._config.animation) {
        var n = d.getTransitionDurationFromElement(this._element);
        o["default"](this._element).one(d.TRANSITION_END, e).emulateTransitionEnd(n);
      } else e();
    }, e._clearTimeout = function () {
      clearTimeout(this._timeout), this._timeout = null;
    }, t._jQueryInterface = function (e) {
      return this.each(function () {
        var n = o["default"](this),
            i = n.data("bs.toast");

        if (i || (i = new t(this, "object" == _typeof(e) && e), n.data("bs.toast", i)), "string" == typeof e) {
          if ("undefined" == typeof i[e]) throw new TypeError('No method named "' + e + '"');
          i[e](this);
        }
      });
    }, l(t, null, [{
      key: "VERSION",
      get: function get() {
        return "4.5.3";
      }
    }, {
      key: "DefaultType",
      get: function get() {
        return ht;
      }
    }, {
      key: "Default",
      get: function get() {
        return gt;
      }
    }]), t;
  }();

  o["default"].fn.toast = mt._jQueryInterface, o["default"].fn.toast.Constructor = mt, o["default"].fn.toast.noConflict = function () {
    return o["default"].fn.toast = ct, mt._jQueryInterface;
  }, t.Alert = h, t.Button = m, t.Carousel = w, t.Collapse = D, t.Dropdown = x, t.Modal = q, t.Popover = ot, t.Scrollspy = ut, t.Tab = ft, t.Toast = mt, t.Tooltip = J, t.Util = d, Object.defineProperty(t, "__esModule", {
    value: !0
  });
});

/***/ }),

/***/ "./resources/admin_asset/lib/char/js/Chart.min.js":
/*!********************************************************!*\
  !*** ./resources/admin_asset/lib/char/js/Chart.min.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/*!
 * Chart.js v2.9.4
 * https://www.chartjs.org
 * (c) 2020 Chart.js Contributors
 * Released under the MIT License
 */
!function (t, e) {
  "object" == ( false ? undefined : _typeof(exports)) && "undefined" != typeof module ? module.exports = e(function () {
    try {
      return __webpack_require__(!(function webpackMissingModule() { var e = new Error("Cannot find module 'moment'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()));
    } catch (t) {}
  }()) :  true ? !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__], __WEBPACK_AMD_DEFINE_RESULT__ = (function (t) {
    return e(function () {
      try {
        return t("moment");
      } catch (t) {}
    }());
  }).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : undefined;
}(this, function (t) {
  "use strict";

  t = t && t.hasOwnProperty("default") ? t["default"] : t;

  var e = {
    aliceblue: [240, 248, 255],
    antiquewhite: [250, 235, 215],
    aqua: [0, 255, 255],
    aquamarine: [127, 255, 212],
    azure: [240, 255, 255],
    beige: [245, 245, 220],
    bisque: [255, 228, 196],
    black: [0, 0, 0],
    blanchedalmond: [255, 235, 205],
    blue: [0, 0, 255],
    blueviolet: [138, 43, 226],
    brown: [165, 42, 42],
    burlywood: [222, 184, 135],
    cadetblue: [95, 158, 160],
    chartreuse: [127, 255, 0],
    chocolate: [210, 105, 30],
    coral: [255, 127, 80],
    cornflowerblue: [100, 149, 237],
    cornsilk: [255, 248, 220],
    crimson: [220, 20, 60],
    cyan: [0, 255, 255],
    darkblue: [0, 0, 139],
    darkcyan: [0, 139, 139],
    darkgoldenrod: [184, 134, 11],
    darkgray: [169, 169, 169],
    darkgreen: [0, 100, 0],
    darkgrey: [169, 169, 169],
    darkkhaki: [189, 183, 107],
    darkmagenta: [139, 0, 139],
    darkolivegreen: [85, 107, 47],
    darkorange: [255, 140, 0],
    darkorchid: [153, 50, 204],
    darkred: [139, 0, 0],
    darksalmon: [233, 150, 122],
    darkseagreen: [143, 188, 143],
    darkslateblue: [72, 61, 139],
    darkslategray: [47, 79, 79],
    darkslategrey: [47, 79, 79],
    darkturquoise: [0, 206, 209],
    darkviolet: [148, 0, 211],
    deeppink: [255, 20, 147],
    deepskyblue: [0, 191, 255],
    dimgray: [105, 105, 105],
    dimgrey: [105, 105, 105],
    dodgerblue: [30, 144, 255],
    firebrick: [178, 34, 34],
    floralwhite: [255, 250, 240],
    forestgreen: [34, 139, 34],
    fuchsia: [255, 0, 255],
    gainsboro: [220, 220, 220],
    ghostwhite: [248, 248, 255],
    gold: [255, 215, 0],
    goldenrod: [218, 165, 32],
    gray: [128, 128, 128],
    green: [0, 128, 0],
    greenyellow: [173, 255, 47],
    grey: [128, 128, 128],
    honeydew: [240, 255, 240],
    hotpink: [255, 105, 180],
    indianred: [205, 92, 92],
    indigo: [75, 0, 130],
    ivory: [255, 255, 240],
    khaki: [240, 230, 140],
    lavender: [230, 230, 250],
    lavenderblush: [255, 240, 245],
    lawngreen: [124, 252, 0],
    lemonchiffon: [255, 250, 205],
    lightblue: [173, 216, 230],
    lightcoral: [240, 128, 128],
    lightcyan: [224, 255, 255],
    lightgoldenrodyellow: [250, 250, 210],
    lightgray: [211, 211, 211],
    lightgreen: [144, 238, 144],
    lightgrey: [211, 211, 211],
    lightpink: [255, 182, 193],
    lightsalmon: [255, 160, 122],
    lightseagreen: [32, 178, 170],
    lightskyblue: [135, 206, 250],
    lightslategray: [119, 136, 153],
    lightslategrey: [119, 136, 153],
    lightsteelblue: [176, 196, 222],
    lightyellow: [255, 255, 224],
    lime: [0, 255, 0],
    limegreen: [50, 205, 50],
    linen: [250, 240, 230],
    magenta: [255, 0, 255],
    maroon: [128, 0, 0],
    mediumaquamarine: [102, 205, 170],
    mediumblue: [0, 0, 205],
    mediumorchid: [186, 85, 211],
    mediumpurple: [147, 112, 219],
    mediumseagreen: [60, 179, 113],
    mediumslateblue: [123, 104, 238],
    mediumspringgreen: [0, 250, 154],
    mediumturquoise: [72, 209, 204],
    mediumvioletred: [199, 21, 133],
    midnightblue: [25, 25, 112],
    mintcream: [245, 255, 250],
    mistyrose: [255, 228, 225],
    moccasin: [255, 228, 181],
    navajowhite: [255, 222, 173],
    navy: [0, 0, 128],
    oldlace: [253, 245, 230],
    olive: [128, 128, 0],
    olivedrab: [107, 142, 35],
    orange: [255, 165, 0],
    orangered: [255, 69, 0],
    orchid: [218, 112, 214],
    palegoldenrod: [238, 232, 170],
    palegreen: [152, 251, 152],
    paleturquoise: [175, 238, 238],
    palevioletred: [219, 112, 147],
    papayawhip: [255, 239, 213],
    peachpuff: [255, 218, 185],
    peru: [205, 133, 63],
    pink: [255, 192, 203],
    plum: [221, 160, 221],
    powderblue: [176, 224, 230],
    purple: [128, 0, 128],
    rebeccapurple: [102, 51, 153],
    red: [255, 0, 0],
    rosybrown: [188, 143, 143],
    royalblue: [65, 105, 225],
    saddlebrown: [139, 69, 19],
    salmon: [250, 128, 114],
    sandybrown: [244, 164, 96],
    seagreen: [46, 139, 87],
    seashell: [255, 245, 238],
    sienna: [160, 82, 45],
    silver: [192, 192, 192],
    skyblue: [135, 206, 235],
    slateblue: [106, 90, 205],
    slategray: [112, 128, 144],
    slategrey: [112, 128, 144],
    snow: [255, 250, 250],
    springgreen: [0, 255, 127],
    steelblue: [70, 130, 180],
    tan: [210, 180, 140],
    teal: [0, 128, 128],
    thistle: [216, 191, 216],
    tomato: [255, 99, 71],
    turquoise: [64, 224, 208],
    violet: [238, 130, 238],
    wheat: [245, 222, 179],
    white: [255, 255, 255],
    whitesmoke: [245, 245, 245],
    yellow: [255, 255, 0],
    yellowgreen: [154, 205, 50]
  },
      n = function (t, e) {
    return t(e = {
      exports: {}
    }, e.exports), e.exports;
  }(function (t) {
    var n = {};

    for (var i in e) {
      e.hasOwnProperty(i) && (n[e[i]] = i);
    }

    var a = t.exports = {
      rgb: {
        channels: 3,
        labels: "rgb"
      },
      hsl: {
        channels: 3,
        labels: "hsl"
      },
      hsv: {
        channels: 3,
        labels: "hsv"
      },
      hwb: {
        channels: 3,
        labels: "hwb"
      },
      cmyk: {
        channels: 4,
        labels: "cmyk"
      },
      xyz: {
        channels: 3,
        labels: "xyz"
      },
      lab: {
        channels: 3,
        labels: "lab"
      },
      lch: {
        channels: 3,
        labels: "lch"
      },
      hex: {
        channels: 1,
        labels: ["hex"]
      },
      keyword: {
        channels: 1,
        labels: ["keyword"]
      },
      ansi16: {
        channels: 1,
        labels: ["ansi16"]
      },
      ansi256: {
        channels: 1,
        labels: ["ansi256"]
      },
      hcg: {
        channels: 3,
        labels: ["h", "c", "g"]
      },
      apple: {
        channels: 3,
        labels: ["r16", "g16", "b16"]
      },
      gray: {
        channels: 1,
        labels: ["gray"]
      }
    };

    for (var r in a) {
      if (a.hasOwnProperty(r)) {
        if (!("channels" in a[r])) throw new Error("missing channels property: " + r);
        if (!("labels" in a[r])) throw new Error("missing channel labels property: " + r);
        if (a[r].labels.length !== a[r].channels) throw new Error("channel and label counts mismatch: " + r);
        var o = a[r].channels,
            s = a[r].labels;
        delete a[r].channels, delete a[r].labels, Object.defineProperty(a[r], "channels", {
          value: o
        }), Object.defineProperty(a[r], "labels", {
          value: s
        });
      }
    }

    a.rgb.hsl = function (t) {
      var e,
          n,
          i = t[0] / 255,
          a = t[1] / 255,
          r = t[2] / 255,
          o = Math.min(i, a, r),
          s = Math.max(i, a, r),
          l = s - o;
      return s === o ? e = 0 : i === s ? e = (a - r) / l : a === s ? e = 2 + (r - i) / l : r === s && (e = 4 + (i - a) / l), (e = Math.min(60 * e, 360)) < 0 && (e += 360), n = (o + s) / 2, [e, 100 * (s === o ? 0 : n <= .5 ? l / (s + o) : l / (2 - s - o)), 100 * n];
    }, a.rgb.hsv = function (t) {
      var e,
          n,
          i,
          a,
          r,
          o = t[0] / 255,
          s = t[1] / 255,
          l = t[2] / 255,
          u = Math.max(o, s, l),
          d = u - Math.min(o, s, l),
          h = function h(t) {
        return (u - t) / 6 / d + .5;
      };

      return 0 === d ? a = r = 0 : (r = d / u, e = h(o), n = h(s), i = h(l), o === u ? a = i - n : s === u ? a = 1 / 3 + e - i : l === u && (a = 2 / 3 + n - e), a < 0 ? a += 1 : a > 1 && (a -= 1)), [360 * a, 100 * r, 100 * u];
    }, a.rgb.hwb = function (t) {
      var e = t[0],
          n = t[1],
          i = t[2];
      return [a.rgb.hsl(t)[0], 100 * (1 / 255 * Math.min(e, Math.min(n, i))), 100 * (i = 1 - 1 / 255 * Math.max(e, Math.max(n, i)))];
    }, a.rgb.cmyk = function (t) {
      var e,
          n = t[0] / 255,
          i = t[1] / 255,
          a = t[2] / 255;
      return [100 * ((1 - n - (e = Math.min(1 - n, 1 - i, 1 - a))) / (1 - e) || 0), 100 * ((1 - i - e) / (1 - e) || 0), 100 * ((1 - a - e) / (1 - e) || 0), 100 * e];
    }, a.rgb.keyword = function (t) {
      var i = n[t];
      if (i) return i;
      var a,
          r,
          o,
          s = 1 / 0;

      for (var l in e) {
        if (e.hasOwnProperty(l)) {
          var u = e[l],
              d = (r = t, o = u, Math.pow(r[0] - o[0], 2) + Math.pow(r[1] - o[1], 2) + Math.pow(r[2] - o[2], 2));
          d < s && (s = d, a = l);
        }
      }

      return a;
    }, a.keyword.rgb = function (t) {
      return e[t];
    }, a.rgb.xyz = function (t) {
      var e = t[0] / 255,
          n = t[1] / 255,
          i = t[2] / 255;
      return [100 * (.4124 * (e = e > .04045 ? Math.pow((e + .055) / 1.055, 2.4) : e / 12.92) + .3576 * (n = n > .04045 ? Math.pow((n + .055) / 1.055, 2.4) : n / 12.92) + .1805 * (i = i > .04045 ? Math.pow((i + .055) / 1.055, 2.4) : i / 12.92)), 100 * (.2126 * e + .7152 * n + .0722 * i), 100 * (.0193 * e + .1192 * n + .9505 * i)];
    }, a.rgb.lab = function (t) {
      var e = a.rgb.xyz(t),
          n = e[0],
          i = e[1],
          r = e[2];
      return i /= 100, r /= 108.883, n = (n /= 95.047) > .008856 ? Math.pow(n, 1 / 3) : 7.787 * n + 16 / 116, [116 * (i = i > .008856 ? Math.pow(i, 1 / 3) : 7.787 * i + 16 / 116) - 16, 500 * (n - i), 200 * (i - (r = r > .008856 ? Math.pow(r, 1 / 3) : 7.787 * r + 16 / 116))];
    }, a.hsl.rgb = function (t) {
      var e,
          n,
          i,
          a,
          r,
          o = t[0] / 360,
          s = t[1] / 100,
          l = t[2] / 100;
      if (0 === s) return [r = 255 * l, r, r];
      e = 2 * l - (n = l < .5 ? l * (1 + s) : l + s - l * s), a = [0, 0, 0];

      for (var u = 0; u < 3; u++) {
        (i = o + 1 / 3 * -(u - 1)) < 0 && i++, i > 1 && i--, r = 6 * i < 1 ? e + 6 * (n - e) * i : 2 * i < 1 ? n : 3 * i < 2 ? e + (n - e) * (2 / 3 - i) * 6 : e, a[u] = 255 * r;
      }

      return a;
    }, a.hsl.hsv = function (t) {
      var e = t[0],
          n = t[1] / 100,
          i = t[2] / 100,
          a = n,
          r = Math.max(i, .01);
      return n *= (i *= 2) <= 1 ? i : 2 - i, a *= r <= 1 ? r : 2 - r, [e, 100 * (0 === i ? 2 * a / (r + a) : 2 * n / (i + n)), 100 * ((i + n) / 2)];
    }, a.hsv.rgb = function (t) {
      var e = t[0] / 60,
          n = t[1] / 100,
          i = t[2] / 100,
          a = Math.floor(e) % 6,
          r = e - Math.floor(e),
          o = 255 * i * (1 - n),
          s = 255 * i * (1 - n * r),
          l = 255 * i * (1 - n * (1 - r));

      switch (i *= 255, a) {
        case 0:
          return [i, l, o];

        case 1:
          return [s, i, o];

        case 2:
          return [o, i, l];

        case 3:
          return [o, s, i];

        case 4:
          return [l, o, i];

        case 5:
          return [i, o, s];
      }
    }, a.hsv.hsl = function (t) {
      var e,
          n,
          i,
          a = t[0],
          r = t[1] / 100,
          o = t[2] / 100,
          s = Math.max(o, .01);
      return i = (2 - r) * o, n = r * s, [a, 100 * (n = (n /= (e = (2 - r) * s) <= 1 ? e : 2 - e) || 0), 100 * (i /= 2)];
    }, a.hwb.rgb = function (t) {
      var e,
          n,
          i,
          a,
          r,
          o,
          s,
          l = t[0] / 360,
          u = t[1] / 100,
          d = t[2] / 100,
          h = u + d;

      switch (h > 1 && (u /= h, d /= h), i = 6 * l - (e = Math.floor(6 * l)), 0 != (1 & e) && (i = 1 - i), a = u + i * ((n = 1 - d) - u), e) {
        default:
        case 6:
        case 0:
          r = n, o = a, s = u;
          break;

        case 1:
          r = a, o = n, s = u;
          break;

        case 2:
          r = u, o = n, s = a;
          break;

        case 3:
          r = u, o = a, s = n;
          break;

        case 4:
          r = a, o = u, s = n;
          break;

        case 5:
          r = n, o = u, s = a;
      }

      return [255 * r, 255 * o, 255 * s];
    }, a.cmyk.rgb = function (t) {
      var e = t[0] / 100,
          n = t[1] / 100,
          i = t[2] / 100,
          a = t[3] / 100;
      return [255 * (1 - Math.min(1, e * (1 - a) + a)), 255 * (1 - Math.min(1, n * (1 - a) + a)), 255 * (1 - Math.min(1, i * (1 - a) + a))];
    }, a.xyz.rgb = function (t) {
      var e,
          n,
          i,
          a = t[0] / 100,
          r = t[1] / 100,
          o = t[2] / 100;
      return n = -.9689 * a + 1.8758 * r + .0415 * o, i = .0557 * a + -.204 * r + 1.057 * o, e = (e = 3.2406 * a + -1.5372 * r + -.4986 * o) > .0031308 ? 1.055 * Math.pow(e, 1 / 2.4) - .055 : 12.92 * e, n = n > .0031308 ? 1.055 * Math.pow(n, 1 / 2.4) - .055 : 12.92 * n, i = i > .0031308 ? 1.055 * Math.pow(i, 1 / 2.4) - .055 : 12.92 * i, [255 * (e = Math.min(Math.max(0, e), 1)), 255 * (n = Math.min(Math.max(0, n), 1)), 255 * (i = Math.min(Math.max(0, i), 1))];
    }, a.xyz.lab = function (t) {
      var e = t[0],
          n = t[1],
          i = t[2];
      return n /= 100, i /= 108.883, e = (e /= 95.047) > .008856 ? Math.pow(e, 1 / 3) : 7.787 * e + 16 / 116, [116 * (n = n > .008856 ? Math.pow(n, 1 / 3) : 7.787 * n + 16 / 116) - 16, 500 * (e - n), 200 * (n - (i = i > .008856 ? Math.pow(i, 1 / 3) : 7.787 * i + 16 / 116))];
    }, a.lab.xyz = function (t) {
      var e,
          n,
          i,
          a = t[0];
      e = t[1] / 500 + (n = (a + 16) / 116), i = n - t[2] / 200;
      var r = Math.pow(n, 3),
          o = Math.pow(e, 3),
          s = Math.pow(i, 3);
      return n = r > .008856 ? r : (n - 16 / 116) / 7.787, e = o > .008856 ? o : (e - 16 / 116) / 7.787, i = s > .008856 ? s : (i - 16 / 116) / 7.787, [e *= 95.047, n *= 100, i *= 108.883];
    }, a.lab.lch = function (t) {
      var e,
          n = t[0],
          i = t[1],
          a = t[2];
      return (e = 360 * Math.atan2(a, i) / 2 / Math.PI) < 0 && (e += 360), [n, Math.sqrt(i * i + a * a), e];
    }, a.lch.lab = function (t) {
      var e,
          n = t[0],
          i = t[1];
      return e = t[2] / 360 * 2 * Math.PI, [n, i * Math.cos(e), i * Math.sin(e)];
    }, a.rgb.ansi16 = function (t) {
      var e = t[0],
          n = t[1],
          i = t[2],
          r = 1 in arguments ? arguments[1] : a.rgb.hsv(t)[2];
      if (0 === (r = Math.round(r / 50))) return 30;
      var o = 30 + (Math.round(i / 255) << 2 | Math.round(n / 255) << 1 | Math.round(e / 255));
      return 2 === r && (o += 60), o;
    }, a.hsv.ansi16 = function (t) {
      return a.rgb.ansi16(a.hsv.rgb(t), t[2]);
    }, a.rgb.ansi256 = function (t) {
      var e = t[0],
          n = t[1],
          i = t[2];
      return e === n && n === i ? e < 8 ? 16 : e > 248 ? 231 : Math.round((e - 8) / 247 * 24) + 232 : 16 + 36 * Math.round(e / 255 * 5) + 6 * Math.round(n / 255 * 5) + Math.round(i / 255 * 5);
    }, a.ansi16.rgb = function (t) {
      var e = t % 10;
      if (0 === e || 7 === e) return t > 50 && (e += 3.5), [e = e / 10.5 * 255, e, e];
      var n = .5 * (1 + ~~(t > 50));
      return [(1 & e) * n * 255, (e >> 1 & 1) * n * 255, (e >> 2 & 1) * n * 255];
    }, a.ansi256.rgb = function (t) {
      if (t >= 232) {
        var e = 10 * (t - 232) + 8;
        return [e, e, e];
      }

      var n;
      return t -= 16, [Math.floor(t / 36) / 5 * 255, Math.floor((n = t % 36) / 6) / 5 * 255, n % 6 / 5 * 255];
    }, a.rgb.hex = function (t) {
      var e = (((255 & Math.round(t[0])) << 16) + ((255 & Math.round(t[1])) << 8) + (255 & Math.round(t[2]))).toString(16).toUpperCase();
      return "000000".substring(e.length) + e;
    }, a.hex.rgb = function (t) {
      var e = t.toString(16).match(/[a-f0-9]{6}|[a-f0-9]{3}/i);
      if (!e) return [0, 0, 0];
      var n = e[0];
      3 === e[0].length && (n = n.split("").map(function (t) {
        return t + t;
      }).join(""));
      var i = parseInt(n, 16);
      return [i >> 16 & 255, i >> 8 & 255, 255 & i];
    }, a.rgb.hcg = function (t) {
      var e,
          n = t[0] / 255,
          i = t[1] / 255,
          a = t[2] / 255,
          r = Math.max(Math.max(n, i), a),
          o = Math.min(Math.min(n, i), a),
          s = r - o;
      return e = s <= 0 ? 0 : r === n ? (i - a) / s % 6 : r === i ? 2 + (a - n) / s : 4 + (n - i) / s + 4, e /= 6, [360 * (e %= 1), 100 * s, 100 * (s < 1 ? o / (1 - s) : 0)];
    }, a.hsl.hcg = function (t) {
      var e = t[1] / 100,
          n = t[2] / 100,
          i = 1,
          a = 0;
      return (i = n < .5 ? 2 * e * n : 2 * e * (1 - n)) < 1 && (a = (n - .5 * i) / (1 - i)), [t[0], 100 * i, 100 * a];
    }, a.hsv.hcg = function (t) {
      var e = t[1] / 100,
          n = t[2] / 100,
          i = e * n,
          a = 0;
      return i < 1 && (a = (n - i) / (1 - i)), [t[0], 100 * i, 100 * a];
    }, a.hcg.rgb = function (t) {
      var e = t[0] / 360,
          n = t[1] / 100,
          i = t[2] / 100;
      if (0 === n) return [255 * i, 255 * i, 255 * i];
      var a,
          r = [0, 0, 0],
          o = e % 1 * 6,
          s = o % 1,
          l = 1 - s;

      switch (Math.floor(o)) {
        case 0:
          r[0] = 1, r[1] = s, r[2] = 0;
          break;

        case 1:
          r[0] = l, r[1] = 1, r[2] = 0;
          break;

        case 2:
          r[0] = 0, r[1] = 1, r[2] = s;
          break;

        case 3:
          r[0] = 0, r[1] = l, r[2] = 1;
          break;

        case 4:
          r[0] = s, r[1] = 0, r[2] = 1;
          break;

        default:
          r[0] = 1, r[1] = 0, r[2] = l;
      }

      return a = (1 - n) * i, [255 * (n * r[0] + a), 255 * (n * r[1] + a), 255 * (n * r[2] + a)];
    }, a.hcg.hsv = function (t) {
      var e = t[1] / 100,
          n = e + t[2] / 100 * (1 - e),
          i = 0;
      return n > 0 && (i = e / n), [t[0], 100 * i, 100 * n];
    }, a.hcg.hsl = function (t) {
      var e = t[1] / 100,
          n = t[2] / 100 * (1 - e) + .5 * e,
          i = 0;
      return n > 0 && n < .5 ? i = e / (2 * n) : n >= .5 && n < 1 && (i = e / (2 * (1 - n))), [t[0], 100 * i, 100 * n];
    }, a.hcg.hwb = function (t) {
      var e = t[1] / 100,
          n = e + t[2] / 100 * (1 - e);
      return [t[0], 100 * (n - e), 100 * (1 - n)];
    }, a.hwb.hcg = function (t) {
      var e = t[1] / 100,
          n = 1 - t[2] / 100,
          i = n - e,
          a = 0;
      return i < 1 && (a = (n - i) / (1 - i)), [t[0], 100 * i, 100 * a];
    }, a.apple.rgb = function (t) {
      return [t[0] / 65535 * 255, t[1] / 65535 * 255, t[2] / 65535 * 255];
    }, a.rgb.apple = function (t) {
      return [t[0] / 255 * 65535, t[1] / 255 * 65535, t[2] / 255 * 65535];
    }, a.gray.rgb = function (t) {
      return [t[0] / 100 * 255, t[0] / 100 * 255, t[0] / 100 * 255];
    }, a.gray.hsl = a.gray.hsv = function (t) {
      return [0, 0, t[0]];
    }, a.gray.hwb = function (t) {
      return [0, 100, t[0]];
    }, a.gray.cmyk = function (t) {
      return [0, 0, 0, t[0]];
    }, a.gray.lab = function (t) {
      return [t[0], 0, 0];
    }, a.gray.hex = function (t) {
      var e = 255 & Math.round(t[0] / 100 * 255),
          n = ((e << 16) + (e << 8) + e).toString(16).toUpperCase();
      return "000000".substring(n.length) + n;
    }, a.rgb.gray = function (t) {
      return [(t[0] + t[1] + t[2]) / 3 / 255 * 100];
    };
  });

  n.rgb, n.hsl, n.hsv, n.hwb, n.cmyk, n.xyz, n.lab, n.lch, n.hex, n.keyword, n.ansi16, n.ansi256, n.hcg, n.apple, n.gray;

  function i(t) {
    var e = function () {
      for (var t = {}, e = Object.keys(n), i = e.length, a = 0; a < i; a++) {
        t[e[a]] = {
          distance: -1,
          parent: null
        };
      }

      return t;
    }(),
        i = [t];

    for (e[t].distance = 0; i.length;) {
      for (var a = i.pop(), r = Object.keys(n[a]), o = r.length, s = 0; s < o; s++) {
        var l = r[s],
            u = e[l];
        -1 === u.distance && (u.distance = e[a].distance + 1, u.parent = a, i.unshift(l));
      }
    }

    return e;
  }

  function a(t, e) {
    return function (n) {
      return e(t(n));
    };
  }

  function r(t, e) {
    for (var i = [e[t].parent, t], r = n[e[t].parent][t], o = e[t].parent; e[o].parent;) {
      i.unshift(e[o].parent), r = a(n[e[o].parent][o], r), o = e[o].parent;
    }

    return r.conversion = i, r;
  }

  var o = {};
  Object.keys(n).forEach(function (t) {
    o[t] = {}, Object.defineProperty(o[t], "channels", {
      value: n[t].channels
    }), Object.defineProperty(o[t], "labels", {
      value: n[t].labels
    });

    var e = function (t) {
      for (var e = i(t), n = {}, a = Object.keys(e), o = a.length, s = 0; s < o; s++) {
        var l = a[s];
        null !== e[l].parent && (n[l] = r(l, e));
      }

      return n;
    }(t);

    Object.keys(e).forEach(function (n) {
      var i = e[n];
      o[t][n] = function (t) {
        var e = function e(_e2) {
          if (null == _e2) return _e2;
          arguments.length > 1 && (_e2 = Array.prototype.slice.call(arguments));
          var n = t(_e2);
          if ("object" == _typeof(n)) for (var i = n.length, a = 0; a < i; a++) {
            n[a] = Math.round(n[a]);
          }
          return n;
        };

        return "conversion" in t && (e.conversion = t.conversion), e;
      }(i), o[t][n].raw = function (t) {
        var e = function e(_e3) {
          return null == _e3 ? _e3 : (arguments.length > 1 && (_e3 = Array.prototype.slice.call(arguments)), t(_e3));
        };

        return "conversion" in t && (e.conversion = t.conversion), e;
      }(i);
    });
  });
  var s = o,
      l = {
    aliceblue: [240, 248, 255],
    antiquewhite: [250, 235, 215],
    aqua: [0, 255, 255],
    aquamarine: [127, 255, 212],
    azure: [240, 255, 255],
    beige: [245, 245, 220],
    bisque: [255, 228, 196],
    black: [0, 0, 0],
    blanchedalmond: [255, 235, 205],
    blue: [0, 0, 255],
    blueviolet: [138, 43, 226],
    brown: [165, 42, 42],
    burlywood: [222, 184, 135],
    cadetblue: [95, 158, 160],
    chartreuse: [127, 255, 0],
    chocolate: [210, 105, 30],
    coral: [255, 127, 80],
    cornflowerblue: [100, 149, 237],
    cornsilk: [255, 248, 220],
    crimson: [220, 20, 60],
    cyan: [0, 255, 255],
    darkblue: [0, 0, 139],
    darkcyan: [0, 139, 139],
    darkgoldenrod: [184, 134, 11],
    darkgray: [169, 169, 169],
    darkgreen: [0, 100, 0],
    darkgrey: [169, 169, 169],
    darkkhaki: [189, 183, 107],
    darkmagenta: [139, 0, 139],
    darkolivegreen: [85, 107, 47],
    darkorange: [255, 140, 0],
    darkorchid: [153, 50, 204],
    darkred: [139, 0, 0],
    darksalmon: [233, 150, 122],
    darkseagreen: [143, 188, 143],
    darkslateblue: [72, 61, 139],
    darkslategray: [47, 79, 79],
    darkslategrey: [47, 79, 79],
    darkturquoise: [0, 206, 209],
    darkviolet: [148, 0, 211],
    deeppink: [255, 20, 147],
    deepskyblue: [0, 191, 255],
    dimgray: [105, 105, 105],
    dimgrey: [105, 105, 105],
    dodgerblue: [30, 144, 255],
    firebrick: [178, 34, 34],
    floralwhite: [255, 250, 240],
    forestgreen: [34, 139, 34],
    fuchsia: [255, 0, 255],
    gainsboro: [220, 220, 220],
    ghostwhite: [248, 248, 255],
    gold: [255, 215, 0],
    goldenrod: [218, 165, 32],
    gray: [128, 128, 128],
    green: [0, 128, 0],
    greenyellow: [173, 255, 47],
    grey: [128, 128, 128],
    honeydew: [240, 255, 240],
    hotpink: [255, 105, 180],
    indianred: [205, 92, 92],
    indigo: [75, 0, 130],
    ivory: [255, 255, 240],
    khaki: [240, 230, 140],
    lavender: [230, 230, 250],
    lavenderblush: [255, 240, 245],
    lawngreen: [124, 252, 0],
    lemonchiffon: [255, 250, 205],
    lightblue: [173, 216, 230],
    lightcoral: [240, 128, 128],
    lightcyan: [224, 255, 255],
    lightgoldenrodyellow: [250, 250, 210],
    lightgray: [211, 211, 211],
    lightgreen: [144, 238, 144],
    lightgrey: [211, 211, 211],
    lightpink: [255, 182, 193],
    lightsalmon: [255, 160, 122],
    lightseagreen: [32, 178, 170],
    lightskyblue: [135, 206, 250],
    lightslategray: [119, 136, 153],
    lightslategrey: [119, 136, 153],
    lightsteelblue: [176, 196, 222],
    lightyellow: [255, 255, 224],
    lime: [0, 255, 0],
    limegreen: [50, 205, 50],
    linen: [250, 240, 230],
    magenta: [255, 0, 255],
    maroon: [128, 0, 0],
    mediumaquamarine: [102, 205, 170],
    mediumblue: [0, 0, 205],
    mediumorchid: [186, 85, 211],
    mediumpurple: [147, 112, 219],
    mediumseagreen: [60, 179, 113],
    mediumslateblue: [123, 104, 238],
    mediumspringgreen: [0, 250, 154],
    mediumturquoise: [72, 209, 204],
    mediumvioletred: [199, 21, 133],
    midnightblue: [25, 25, 112],
    mintcream: [245, 255, 250],
    mistyrose: [255, 228, 225],
    moccasin: [255, 228, 181],
    navajowhite: [255, 222, 173],
    navy: [0, 0, 128],
    oldlace: [253, 245, 230],
    olive: [128, 128, 0],
    olivedrab: [107, 142, 35],
    orange: [255, 165, 0],
    orangered: [255, 69, 0],
    orchid: [218, 112, 214],
    palegoldenrod: [238, 232, 170],
    palegreen: [152, 251, 152],
    paleturquoise: [175, 238, 238],
    palevioletred: [219, 112, 147],
    papayawhip: [255, 239, 213],
    peachpuff: [255, 218, 185],
    peru: [205, 133, 63],
    pink: [255, 192, 203],
    plum: [221, 160, 221],
    powderblue: [176, 224, 230],
    purple: [128, 0, 128],
    rebeccapurple: [102, 51, 153],
    red: [255, 0, 0],
    rosybrown: [188, 143, 143],
    royalblue: [65, 105, 225],
    saddlebrown: [139, 69, 19],
    salmon: [250, 128, 114],
    sandybrown: [244, 164, 96],
    seagreen: [46, 139, 87],
    seashell: [255, 245, 238],
    sienna: [160, 82, 45],
    silver: [192, 192, 192],
    skyblue: [135, 206, 235],
    slateblue: [106, 90, 205],
    slategray: [112, 128, 144],
    slategrey: [112, 128, 144],
    snow: [255, 250, 250],
    springgreen: [0, 255, 127],
    steelblue: [70, 130, 180],
    tan: [210, 180, 140],
    teal: [0, 128, 128],
    thistle: [216, 191, 216],
    tomato: [255, 99, 71],
    turquoise: [64, 224, 208],
    violet: [238, 130, 238],
    wheat: [245, 222, 179],
    white: [255, 255, 255],
    whitesmoke: [245, 245, 245],
    yellow: [255, 255, 0],
    yellowgreen: [154, 205, 50]
  },
      u = {
    getRgba: d,
    getHsla: h,
    getRgb: function getRgb(t) {
      var e = d(t);
      return e && e.slice(0, 3);
    },
    getHsl: function getHsl(t) {
      var e = h(t);
      return e && e.slice(0, 3);
    },
    getHwb: c,
    getAlpha: function getAlpha(t) {
      var e = d(t);
      if (e) return e[3];
      if (e = h(t)) return e[3];
      if (e = c(t)) return e[3];
    },
    hexString: function hexString(t, e) {
      e = void 0 !== e && 3 === t.length ? e : t[3];
      return "#" + v(t[0]) + v(t[1]) + v(t[2]) + (e >= 0 && e < 1 ? v(Math.round(255 * e)) : "");
    },
    rgbString: function rgbString(t, e) {
      if (e < 1 || t[3] && t[3] < 1) return f(t, e);
      return "rgb(" + t[0] + ", " + t[1] + ", " + t[2] + ")";
    },
    rgbaString: f,
    percentString: function percentString(t, e) {
      if (e < 1 || t[3] && t[3] < 1) return g(t, e);
      var n = Math.round(t[0] / 255 * 100),
          i = Math.round(t[1] / 255 * 100),
          a = Math.round(t[2] / 255 * 100);
      return "rgb(" + n + "%, " + i + "%, " + a + "%)";
    },
    percentaString: g,
    hslString: function hslString(t, e) {
      if (e < 1 || t[3] && t[3] < 1) return p(t, e);
      return "hsl(" + t[0] + ", " + t[1] + "%, " + t[2] + "%)";
    },
    hslaString: p,
    hwbString: function hwbString(t, e) {
      void 0 === e && (e = void 0 !== t[3] ? t[3] : 1);
      return "hwb(" + t[0] + ", " + t[1] + "%, " + t[2] + "%" + (void 0 !== e && 1 !== e ? ", " + e : "") + ")";
    },
    keyword: function keyword(t) {
      return b[t.slice(0, 3)];
    }
  };

  function d(t) {
    if (t) {
      var e = [0, 0, 0],
          n = 1,
          i = t.match(/^#([a-fA-F0-9]{3,4})$/i),
          a = "";

      if (i) {
        a = (i = i[1])[3];

        for (var r = 0; r < e.length; r++) {
          e[r] = parseInt(i[r] + i[r], 16);
        }

        a && (n = Math.round(parseInt(a + a, 16) / 255 * 100) / 100);
      } else if (i = t.match(/^#([a-fA-F0-9]{6}([a-fA-F0-9]{2})?)$/i)) {
        a = i[2], i = i[1];

        for (r = 0; r < e.length; r++) {
          e[r] = parseInt(i.slice(2 * r, 2 * r + 2), 16);
        }

        a && (n = Math.round(parseInt(a, 16) / 255 * 100) / 100);
      } else if (i = t.match(/^rgba?\(\s*([+-]?\d+)\s*,\s*([+-]?\d+)\s*,\s*([+-]?\d+)\s*(?:,\s*([+-]?[\d\.]+)\s*)?\)$/i)) {
        for (r = 0; r < e.length; r++) {
          e[r] = parseInt(i[r + 1]);
        }

        n = parseFloat(i[4]);
      } else if (i = t.match(/^rgba?\(\s*([+-]?[\d\.]+)\%\s*,\s*([+-]?[\d\.]+)\%\s*,\s*([+-]?[\d\.]+)\%\s*(?:,\s*([+-]?[\d\.]+)\s*)?\)$/i)) {
        for (r = 0; r < e.length; r++) {
          e[r] = Math.round(2.55 * parseFloat(i[r + 1]));
        }

        n = parseFloat(i[4]);
      } else if (i = t.match(/(\w+)/)) {
        if ("transparent" == i[1]) return [0, 0, 0, 0];
        if (!(e = l[i[1]])) return;
      }

      for (r = 0; r < e.length; r++) {
        e[r] = m(e[r], 0, 255);
      }

      return n = n || 0 == n ? m(n, 0, 1) : 1, e[3] = n, e;
    }
  }

  function h(t) {
    if (t) {
      var e = t.match(/^hsla?\(\s*([+-]?\d+)(?:deg)?\s*,\s*([+-]?[\d\.]+)%\s*,\s*([+-]?[\d\.]+)%\s*(?:,\s*([+-]?[\d\.]+)\s*)?\)/);

      if (e) {
        var n = parseFloat(e[4]);
        return [m(parseInt(e[1]), 0, 360), m(parseFloat(e[2]), 0, 100), m(parseFloat(e[3]), 0, 100), m(isNaN(n) ? 1 : n, 0, 1)];
      }
    }
  }

  function c(t) {
    if (t) {
      var e = t.match(/^hwb\(\s*([+-]?\d+)(?:deg)?\s*,\s*([+-]?[\d\.]+)%\s*,\s*([+-]?[\d\.]+)%\s*(?:,\s*([+-]?[\d\.]+)\s*)?\)/);

      if (e) {
        var n = parseFloat(e[4]);
        return [m(parseInt(e[1]), 0, 360), m(parseFloat(e[2]), 0, 100), m(parseFloat(e[3]), 0, 100), m(isNaN(n) ? 1 : n, 0, 1)];
      }
    }
  }

  function f(t, e) {
    return void 0 === e && (e = void 0 !== t[3] ? t[3] : 1), "rgba(" + t[0] + ", " + t[1] + ", " + t[2] + ", " + e + ")";
  }

  function g(t, e) {
    return "rgba(" + Math.round(t[0] / 255 * 100) + "%, " + Math.round(t[1] / 255 * 100) + "%, " + Math.round(t[2] / 255 * 100) + "%, " + (e || t[3] || 1) + ")";
  }

  function p(t, e) {
    return void 0 === e && (e = void 0 !== t[3] ? t[3] : 1), "hsla(" + t[0] + ", " + t[1] + "%, " + t[2] + "%, " + e + ")";
  }

  function m(t, e, n) {
    return Math.min(Math.max(e, t), n);
  }

  function v(t) {
    var e = t.toString(16).toUpperCase();
    return e.length < 2 ? "0" + e : e;
  }

  var b = {};

  for (var x in l) {
    b[l[x]] = x;
  }

  var y = function y(t) {
    return t instanceof y ? t : this instanceof y ? (this.valid = !1, this.values = {
      rgb: [0, 0, 0],
      hsl: [0, 0, 0],
      hsv: [0, 0, 0],
      hwb: [0, 0, 0],
      cmyk: [0, 0, 0, 0],
      alpha: 1
    }, void ("string" == typeof t ? (e = u.getRgba(t)) ? this.setValues("rgb", e) : (e = u.getHsla(t)) ? this.setValues("hsl", e) : (e = u.getHwb(t)) && this.setValues("hwb", e) : "object" == _typeof(t) && (void 0 !== (e = t).r || void 0 !== e.red ? this.setValues("rgb", e) : void 0 !== e.l || void 0 !== e.lightness ? this.setValues("hsl", e) : void 0 !== e.v || void 0 !== e.value ? this.setValues("hsv", e) : void 0 !== e.w || void 0 !== e.whiteness ? this.setValues("hwb", e) : void 0 === e.c && void 0 === e.cyan || this.setValues("cmyk", e)))) : new y(t);
    var e;
  };

  y.prototype = {
    isValid: function isValid() {
      return this.valid;
    },
    rgb: function rgb() {
      return this.setSpace("rgb", arguments);
    },
    hsl: function hsl() {
      return this.setSpace("hsl", arguments);
    },
    hsv: function hsv() {
      return this.setSpace("hsv", arguments);
    },
    hwb: function hwb() {
      return this.setSpace("hwb", arguments);
    },
    cmyk: function cmyk() {
      return this.setSpace("cmyk", arguments);
    },
    rgbArray: function rgbArray() {
      return this.values.rgb;
    },
    hslArray: function hslArray() {
      return this.values.hsl;
    },
    hsvArray: function hsvArray() {
      return this.values.hsv;
    },
    hwbArray: function hwbArray() {
      var t = this.values;
      return 1 !== t.alpha ? t.hwb.concat([t.alpha]) : t.hwb;
    },
    cmykArray: function cmykArray() {
      return this.values.cmyk;
    },
    rgbaArray: function rgbaArray() {
      var t = this.values;
      return t.rgb.concat([t.alpha]);
    },
    hslaArray: function hslaArray() {
      var t = this.values;
      return t.hsl.concat([t.alpha]);
    },
    alpha: function alpha(t) {
      return void 0 === t ? this.values.alpha : (this.setValues("alpha", t), this);
    },
    red: function red(t) {
      return this.setChannel("rgb", 0, t);
    },
    green: function green(t) {
      return this.setChannel("rgb", 1, t);
    },
    blue: function blue(t) {
      return this.setChannel("rgb", 2, t);
    },
    hue: function hue(t) {
      return t && (t = (t %= 360) < 0 ? 360 + t : t), this.setChannel("hsl", 0, t);
    },
    saturation: function saturation(t) {
      return this.setChannel("hsl", 1, t);
    },
    lightness: function lightness(t) {
      return this.setChannel("hsl", 2, t);
    },
    saturationv: function saturationv(t) {
      return this.setChannel("hsv", 1, t);
    },
    whiteness: function whiteness(t) {
      return this.setChannel("hwb", 1, t);
    },
    blackness: function blackness(t) {
      return this.setChannel("hwb", 2, t);
    },
    value: function value(t) {
      return this.setChannel("hsv", 2, t);
    },
    cyan: function cyan(t) {
      return this.setChannel("cmyk", 0, t);
    },
    magenta: function magenta(t) {
      return this.setChannel("cmyk", 1, t);
    },
    yellow: function yellow(t) {
      return this.setChannel("cmyk", 2, t);
    },
    black: function black(t) {
      return this.setChannel("cmyk", 3, t);
    },
    hexString: function hexString() {
      return u.hexString(this.values.rgb);
    },
    rgbString: function rgbString() {
      return u.rgbString(this.values.rgb, this.values.alpha);
    },
    rgbaString: function rgbaString() {
      return u.rgbaString(this.values.rgb, this.values.alpha);
    },
    percentString: function percentString() {
      return u.percentString(this.values.rgb, this.values.alpha);
    },
    hslString: function hslString() {
      return u.hslString(this.values.hsl, this.values.alpha);
    },
    hslaString: function hslaString() {
      return u.hslaString(this.values.hsl, this.values.alpha);
    },
    hwbString: function hwbString() {
      return u.hwbString(this.values.hwb, this.values.alpha);
    },
    keyword: function keyword() {
      return u.keyword(this.values.rgb, this.values.alpha);
    },
    rgbNumber: function rgbNumber() {
      var t = this.values.rgb;
      return t[0] << 16 | t[1] << 8 | t[2];
    },
    luminosity: function luminosity() {
      for (var t = this.values.rgb, e = [], n = 0; n < t.length; n++) {
        var i = t[n] / 255;
        e[n] = i <= .03928 ? i / 12.92 : Math.pow((i + .055) / 1.055, 2.4);
      }

      return .2126 * e[0] + .7152 * e[1] + .0722 * e[2];
    },
    contrast: function contrast(t) {
      var e = this.luminosity(),
          n = t.luminosity();
      return e > n ? (e + .05) / (n + .05) : (n + .05) / (e + .05);
    },
    level: function level(t) {
      var e = this.contrast(t);
      return e >= 7.1 ? "AAA" : e >= 4.5 ? "AA" : "";
    },
    dark: function dark() {
      var t = this.values.rgb;
      return (299 * t[0] + 587 * t[1] + 114 * t[2]) / 1e3 < 128;
    },
    light: function light() {
      return !this.dark();
    },
    negate: function negate() {
      for (var t = [], e = 0; e < 3; e++) {
        t[e] = 255 - this.values.rgb[e];
      }

      return this.setValues("rgb", t), this;
    },
    lighten: function lighten(t) {
      var e = this.values.hsl;
      return e[2] += e[2] * t, this.setValues("hsl", e), this;
    },
    darken: function darken(t) {
      var e = this.values.hsl;
      return e[2] -= e[2] * t, this.setValues("hsl", e), this;
    },
    saturate: function saturate(t) {
      var e = this.values.hsl;
      return e[1] += e[1] * t, this.setValues("hsl", e), this;
    },
    desaturate: function desaturate(t) {
      var e = this.values.hsl;
      return e[1] -= e[1] * t, this.setValues("hsl", e), this;
    },
    whiten: function whiten(t) {
      var e = this.values.hwb;
      return e[1] += e[1] * t, this.setValues("hwb", e), this;
    },
    blacken: function blacken(t) {
      var e = this.values.hwb;
      return e[2] += e[2] * t, this.setValues("hwb", e), this;
    },
    greyscale: function greyscale() {
      var t = this.values.rgb,
          e = .3 * t[0] + .59 * t[1] + .11 * t[2];
      return this.setValues("rgb", [e, e, e]), this;
    },
    clearer: function clearer(t) {
      var e = this.values.alpha;
      return this.setValues("alpha", e - e * t), this;
    },
    opaquer: function opaquer(t) {
      var e = this.values.alpha;
      return this.setValues("alpha", e + e * t), this;
    },
    rotate: function rotate(t) {
      var e = this.values.hsl,
          n = (e[0] + t) % 360;
      return e[0] = n < 0 ? 360 + n : n, this.setValues("hsl", e), this;
    },
    mix: function mix(t, e) {
      var n = t,
          i = void 0 === e ? .5 : e,
          a = 2 * i - 1,
          r = this.alpha() - n.alpha(),
          o = ((a * r == -1 ? a : (a + r) / (1 + a * r)) + 1) / 2,
          s = 1 - o;
      return this.rgb(o * this.red() + s * n.red(), o * this.green() + s * n.green(), o * this.blue() + s * n.blue()).alpha(this.alpha() * i + n.alpha() * (1 - i));
    },
    toJSON: function toJSON() {
      return this.rgb();
    },
    clone: function clone() {
      var t,
          e,
          n = new y(),
          i = this.values,
          a = n.values;

      for (var r in i) {
        i.hasOwnProperty(r) && (t = i[r], "[object Array]" === (e = {}.toString.call(t)) ? a[r] = t.slice(0) : "[object Number]" === e ? a[r] = t : console.error("unexpected color value:", t));
      }

      return n;
    }
  }, y.prototype.spaces = {
    rgb: ["red", "green", "blue"],
    hsl: ["hue", "saturation", "lightness"],
    hsv: ["hue", "saturation", "value"],
    hwb: ["hue", "whiteness", "blackness"],
    cmyk: ["cyan", "magenta", "yellow", "black"]
  }, y.prototype.maxes = {
    rgb: [255, 255, 255],
    hsl: [360, 100, 100],
    hsv: [360, 100, 100],
    hwb: [360, 100, 100],
    cmyk: [100, 100, 100, 100]
  }, y.prototype.getValues = function (t) {
    for (var e = this.values, n = {}, i = 0; i < t.length; i++) {
      n[t.charAt(i)] = e[t][i];
    }

    return 1 !== e.alpha && (n.a = e.alpha), n;
  }, y.prototype.setValues = function (t, e) {
    var n,
        i,
        a = this.values,
        r = this.spaces,
        o = this.maxes,
        l = 1;
    if (this.valid = !0, "alpha" === t) l = e;else if (e.length) a[t] = e.slice(0, t.length), l = e[t.length];else if (void 0 !== e[t.charAt(0)]) {
      for (n = 0; n < t.length; n++) {
        a[t][n] = e[t.charAt(n)];
      }

      l = e.a;
    } else if (void 0 !== e[r[t][0]]) {
      var u = r[t];

      for (n = 0; n < t.length; n++) {
        a[t][n] = e[u[n]];
      }

      l = e.alpha;
    }
    if (a.alpha = Math.max(0, Math.min(1, void 0 === l ? a.alpha : l)), "alpha" === t) return !1;

    for (n = 0; n < t.length; n++) {
      i = Math.max(0, Math.min(o[t][n], a[t][n])), a[t][n] = Math.round(i);
    }

    for (var d in r) {
      d !== t && (a[d] = s[t][d](a[t]));
    }

    return !0;
  }, y.prototype.setSpace = function (t, e) {
    var n = e[0];
    return void 0 === n ? this.getValues(t) : ("number" == typeof n && (n = Array.prototype.slice.call(e)), this.setValues(t, n), this);
  }, y.prototype.setChannel = function (t, e, n) {
    var i = this.values[t];
    return void 0 === n ? i[e] : n === i[e] ? this : (i[e] = n, this.setValues(t, i), this);
  }, "undefined" != typeof window && (window.Color = y);
  var _ = y;

  function k(t) {
    return -1 === ["__proto__", "prototype", "constructor"].indexOf(t);
  }

  var w,
      M = {
    noop: function noop() {},
    uid: (w = 0, function () {
      return w++;
    }),
    isNullOrUndef: function isNullOrUndef(t) {
      return null == t;
    },
    isArray: function isArray(t) {
      if (Array.isArray && Array.isArray(t)) return !0;
      var e = Object.prototype.toString.call(t);
      return "[object" === e.substr(0, 7) && "Array]" === e.substr(-6);
    },
    isObject: function isObject(t) {
      return null !== t && "[object Object]" === Object.prototype.toString.call(t);
    },
    isFinite: function (_isFinite) {
      function isFinite(_x) {
        return _isFinite.apply(this, arguments);
      }

      isFinite.toString = function () {
        return _isFinite.toString();
      };

      return isFinite;
    }(function (t) {
      return ("number" == typeof t || t instanceof Number) && isFinite(t);
    }),
    valueOrDefault: function valueOrDefault(t, e) {
      return void 0 === t ? e : t;
    },
    valueAtIndexOrDefault: function valueAtIndexOrDefault(t, e, n) {
      return M.valueOrDefault(M.isArray(t) ? t[e] : t, n);
    },
    callback: function callback(t, e, n) {
      if (t && "function" == typeof t.call) return t.apply(n, e);
    },
    each: function each(t, e, n, i) {
      var a, r, o;
      if (M.isArray(t)) {
        if (r = t.length, i) for (a = r - 1; a >= 0; a--) {
          e.call(n, t[a], a);
        } else for (a = 0; a < r; a++) {
          e.call(n, t[a], a);
        }
      } else if (M.isObject(t)) for (r = (o = Object.keys(t)).length, a = 0; a < r; a++) {
        e.call(n, t[o[a]], o[a]);
      }
    },
    arrayEquals: function arrayEquals(t, e) {
      var n, i, a, r;
      if (!t || !e || t.length !== e.length) return !1;

      for (n = 0, i = t.length; n < i; ++n) {
        if (a = t[n], r = e[n], a instanceof Array && r instanceof Array) {
          if (!M.arrayEquals(a, r)) return !1;
        } else if (a !== r) return !1;
      }

      return !0;
    },
    clone: function clone(t) {
      if (M.isArray(t)) return t.map(M.clone);

      if (M.isObject(t)) {
        for (var e = Object.create(t), n = Object.keys(t), i = n.length, a = 0; a < i; ++a) {
          e[n[a]] = M.clone(t[n[a]]);
        }

        return e;
      }

      return t;
    },
    _merger: function _merger(t, e, n, i) {
      if (k(t)) {
        var a = e[t],
            r = n[t];
        M.isObject(a) && M.isObject(r) ? M.merge(a, r, i) : e[t] = M.clone(r);
      }
    },
    _mergerIf: function _mergerIf(t, e, n) {
      if (k(t)) {
        var i = e[t],
            a = n[t];
        M.isObject(i) && M.isObject(a) ? M.mergeIf(i, a) : e.hasOwnProperty(t) || (e[t] = M.clone(a));
      }
    },
    merge: function merge(t, e, n) {
      var i,
          a,
          r,
          o,
          s,
          l = M.isArray(e) ? e : [e],
          u = l.length;
      if (!M.isObject(t)) return t;

      for (i = (n = n || {}).merger || M._merger, a = 0; a < u; ++a) {
        if (e = l[a], M.isObject(e)) for (s = 0, o = (r = Object.keys(e)).length; s < o; ++s) {
          i(r[s], t, e, n);
        }
      }

      return t;
    },
    mergeIf: function mergeIf(t, e) {
      return M.merge(t, e, {
        merger: M._mergerIf
      });
    },
    extend: Object.assign || function (t) {
      return M.merge(t, [].slice.call(arguments, 1), {
        merger: function merger(t, e, n) {
          e[t] = n[t];
        }
      });
    },
    inherits: function inherits(t) {
      var e = this,
          n = t && t.hasOwnProperty("constructor") ? t.constructor : function () {
        return e.apply(this, arguments);
      },
          i = function i() {
        this.constructor = n;
      };

      return i.prototype = e.prototype, n.prototype = new i(), n.extend = M.inherits, t && M.extend(n.prototype, t), n.__super__ = e.prototype, n;
    },
    _deprecated: function _deprecated(t, e, n, i) {
      void 0 !== e && console.warn(t + ': "' + n + '" is deprecated. Please use "' + i + '" instead');
    }
  },
      S = M;
  M.callCallback = M.callback, M.indexOf = function (t, e, n) {
    return Array.prototype.indexOf.call(t, e, n);
  }, M.getValueOrDefault = M.valueOrDefault, M.getValueAtIndexOrDefault = M.valueAtIndexOrDefault;
  var C = {
    linear: function linear(t) {
      return t;
    },
    easeInQuad: function easeInQuad(t) {
      return t * t;
    },
    easeOutQuad: function easeOutQuad(t) {
      return -t * (t - 2);
    },
    easeInOutQuad: function easeInOutQuad(t) {
      return (t /= .5) < 1 ? .5 * t * t : -.5 * (--t * (t - 2) - 1);
    },
    easeInCubic: function easeInCubic(t) {
      return t * t * t;
    },
    easeOutCubic: function easeOutCubic(t) {
      return (t -= 1) * t * t + 1;
    },
    easeInOutCubic: function easeInOutCubic(t) {
      return (t /= .5) < 1 ? .5 * t * t * t : .5 * ((t -= 2) * t * t + 2);
    },
    easeInQuart: function easeInQuart(t) {
      return t * t * t * t;
    },
    easeOutQuart: function easeOutQuart(t) {
      return -((t -= 1) * t * t * t - 1);
    },
    easeInOutQuart: function easeInOutQuart(t) {
      return (t /= .5) < 1 ? .5 * t * t * t * t : -.5 * ((t -= 2) * t * t * t - 2);
    },
    easeInQuint: function easeInQuint(t) {
      return t * t * t * t * t;
    },
    easeOutQuint: function easeOutQuint(t) {
      return (t -= 1) * t * t * t * t + 1;
    },
    easeInOutQuint: function easeInOutQuint(t) {
      return (t /= .5) < 1 ? .5 * t * t * t * t * t : .5 * ((t -= 2) * t * t * t * t + 2);
    },
    easeInSine: function easeInSine(t) {
      return 1 - Math.cos(t * (Math.PI / 2));
    },
    easeOutSine: function easeOutSine(t) {
      return Math.sin(t * (Math.PI / 2));
    },
    easeInOutSine: function easeInOutSine(t) {
      return -.5 * (Math.cos(Math.PI * t) - 1);
    },
    easeInExpo: function easeInExpo(t) {
      return 0 === t ? 0 : Math.pow(2, 10 * (t - 1));
    },
    easeOutExpo: function easeOutExpo(t) {
      return 1 === t ? 1 : 1 - Math.pow(2, -10 * t);
    },
    easeInOutExpo: function easeInOutExpo(t) {
      return 0 === t ? 0 : 1 === t ? 1 : (t /= .5) < 1 ? .5 * Math.pow(2, 10 * (t - 1)) : .5 * (2 - Math.pow(2, -10 * --t));
    },
    easeInCirc: function easeInCirc(t) {
      return t >= 1 ? t : -(Math.sqrt(1 - t * t) - 1);
    },
    easeOutCirc: function easeOutCirc(t) {
      return Math.sqrt(1 - (t -= 1) * t);
    },
    easeInOutCirc: function easeInOutCirc(t) {
      return (t /= .5) < 1 ? -.5 * (Math.sqrt(1 - t * t) - 1) : .5 * (Math.sqrt(1 - (t -= 2) * t) + 1);
    },
    easeInElastic: function easeInElastic(t) {
      var e = 1.70158,
          n = 0,
          i = 1;
      return 0 === t ? 0 : 1 === t ? 1 : (n || (n = .3), i < 1 ? (i = 1, e = n / 4) : e = n / (2 * Math.PI) * Math.asin(1 / i), -i * Math.pow(2, 10 * (t -= 1)) * Math.sin((t - e) * (2 * Math.PI) / n));
    },
    easeOutElastic: function easeOutElastic(t) {
      var e = 1.70158,
          n = 0,
          i = 1;
      return 0 === t ? 0 : 1 === t ? 1 : (n || (n = .3), i < 1 ? (i = 1, e = n / 4) : e = n / (2 * Math.PI) * Math.asin(1 / i), i * Math.pow(2, -10 * t) * Math.sin((t - e) * (2 * Math.PI) / n) + 1);
    },
    easeInOutElastic: function easeInOutElastic(t) {
      var e = 1.70158,
          n = 0,
          i = 1;
      return 0 === t ? 0 : 2 == (t /= .5) ? 1 : (n || (n = .45), i < 1 ? (i = 1, e = n / 4) : e = n / (2 * Math.PI) * Math.asin(1 / i), t < 1 ? i * Math.pow(2, 10 * (t -= 1)) * Math.sin((t - e) * (2 * Math.PI) / n) * -.5 : i * Math.pow(2, -10 * (t -= 1)) * Math.sin((t - e) * (2 * Math.PI) / n) * .5 + 1);
    },
    easeInBack: function easeInBack(t) {
      var e = 1.70158;
      return t * t * ((e + 1) * t - e);
    },
    easeOutBack: function easeOutBack(t) {
      var e = 1.70158;
      return (t -= 1) * t * ((e + 1) * t + e) + 1;
    },
    easeInOutBack: function easeInOutBack(t) {
      var e = 1.70158;
      return (t /= .5) < 1 ? t * t * ((1 + (e *= 1.525)) * t - e) * .5 : .5 * ((t -= 2) * t * ((1 + (e *= 1.525)) * t + e) + 2);
    },
    easeInBounce: function easeInBounce(t) {
      return 1 - C.easeOutBounce(1 - t);
    },
    easeOutBounce: function easeOutBounce(t) {
      return t < 1 / 2.75 ? 7.5625 * t * t : t < 2 / 2.75 ? 7.5625 * (t -= 1.5 / 2.75) * t + .75 : t < 2.5 / 2.75 ? 7.5625 * (t -= 2.25 / 2.75) * t + .9375 : 7.5625 * (t -= 2.625 / 2.75) * t + .984375;
    },
    easeInOutBounce: function easeInOutBounce(t) {
      return t < .5 ? .5 * C.easeInBounce(2 * t) : .5 * C.easeOutBounce(2 * t - 1) + .5;
    }
  },
      P = {
    effects: C
  };
  S.easingEffects = C;
  var A = Math.PI,
      D = A / 180,
      T = 2 * A,
      I = A / 2,
      F = A / 4,
      O = 2 * A / 3,
      L = {
    clear: function clear(t) {
      t.ctx.clearRect(0, 0, t.width, t.height);
    },
    roundedRect: function roundedRect(t, e, n, i, a, r) {
      if (r) {
        var o = Math.min(r, a / 2, i / 2),
            s = e + o,
            l = n + o,
            u = e + i - o,
            d = n + a - o;
        t.moveTo(e, l), s < u && l < d ? (t.arc(s, l, o, -A, -I), t.arc(u, l, o, -I, 0), t.arc(u, d, o, 0, I), t.arc(s, d, o, I, A)) : s < u ? (t.moveTo(s, n), t.arc(u, l, o, -I, I), t.arc(s, l, o, I, A + I)) : l < d ? (t.arc(s, l, o, -A, 0), t.arc(s, d, o, 0, A)) : t.arc(s, l, o, -A, A), t.closePath(), t.moveTo(e, n);
      } else t.rect(e, n, i, a);
    },
    drawPoint: function drawPoint(t, e, n, i, a, r) {
      var o,
          s,
          l,
          u,
          d,
          h = (r || 0) * D;
      if (e && "object" == _typeof(e) && ("[object HTMLImageElement]" === (o = e.toString()) || "[object HTMLCanvasElement]" === o)) return t.save(), t.translate(i, a), t.rotate(h), t.drawImage(e, -e.width / 2, -e.height / 2, e.width, e.height), void t.restore();

      if (!(isNaN(n) || n <= 0)) {
        switch (t.beginPath(), e) {
          default:
            t.arc(i, a, n, 0, T), t.closePath();
            break;

          case "triangle":
            t.moveTo(i + Math.sin(h) * n, a - Math.cos(h) * n), h += O, t.lineTo(i + Math.sin(h) * n, a - Math.cos(h) * n), h += O, t.lineTo(i + Math.sin(h) * n, a - Math.cos(h) * n), t.closePath();
            break;

          case "rectRounded":
            u = n - (d = .516 * n), s = Math.cos(h + F) * u, l = Math.sin(h + F) * u, t.arc(i - s, a - l, d, h - A, h - I), t.arc(i + l, a - s, d, h - I, h), t.arc(i + s, a + l, d, h, h + I), t.arc(i - l, a + s, d, h + I, h + A), t.closePath();
            break;

          case "rect":
            if (!r) {
              u = Math.SQRT1_2 * n, t.rect(i - u, a - u, 2 * u, 2 * u);
              break;
            }

            h += F;

          case "rectRot":
            s = Math.cos(h) * n, l = Math.sin(h) * n, t.moveTo(i - s, a - l), t.lineTo(i + l, a - s), t.lineTo(i + s, a + l), t.lineTo(i - l, a + s), t.closePath();
            break;

          case "crossRot":
            h += F;

          case "cross":
            s = Math.cos(h) * n, l = Math.sin(h) * n, t.moveTo(i - s, a - l), t.lineTo(i + s, a + l), t.moveTo(i + l, a - s), t.lineTo(i - l, a + s);
            break;

          case "star":
            s = Math.cos(h) * n, l = Math.sin(h) * n, t.moveTo(i - s, a - l), t.lineTo(i + s, a + l), t.moveTo(i + l, a - s), t.lineTo(i - l, a + s), h += F, s = Math.cos(h) * n, l = Math.sin(h) * n, t.moveTo(i - s, a - l), t.lineTo(i + s, a + l), t.moveTo(i + l, a - s), t.lineTo(i - l, a + s);
            break;

          case "line":
            s = Math.cos(h) * n, l = Math.sin(h) * n, t.moveTo(i - s, a - l), t.lineTo(i + s, a + l);
            break;

          case "dash":
            t.moveTo(i, a), t.lineTo(i + Math.cos(h) * n, a + Math.sin(h) * n);
        }

        t.fill(), t.stroke();
      }
    },
    _isPointInArea: function _isPointInArea(t, e) {
      return t.x > e.left - 1e-6 && t.x < e.right + 1e-6 && t.y > e.top - 1e-6 && t.y < e.bottom + 1e-6;
    },
    clipArea: function clipArea(t, e) {
      t.save(), t.beginPath(), t.rect(e.left, e.top, e.right - e.left, e.bottom - e.top), t.clip();
    },
    unclipArea: function unclipArea(t) {
      t.restore();
    },
    lineTo: function lineTo(t, e, n, i) {
      var a = n.steppedLine;

      if (a) {
        if ("middle" === a) {
          var r = (e.x + n.x) / 2;
          t.lineTo(r, i ? n.y : e.y), t.lineTo(r, i ? e.y : n.y);
        } else "after" === a && !i || "after" !== a && i ? t.lineTo(e.x, n.y) : t.lineTo(n.x, e.y);

        t.lineTo(n.x, n.y);
      } else n.tension ? t.bezierCurveTo(i ? e.controlPointPreviousX : e.controlPointNextX, i ? e.controlPointPreviousY : e.controlPointNextY, i ? n.controlPointNextX : n.controlPointPreviousX, i ? n.controlPointNextY : n.controlPointPreviousY, n.x, n.y) : t.lineTo(n.x, n.y);
    }
  },
      R = L;
  S.clear = L.clear, S.drawRoundedRectangle = function (t) {
    t.beginPath(), L.roundedRect.apply(L, arguments);
  };
  var z = {
    _set: function _set(t, e) {
      return S.merge(this[t] || (this[t] = {}), e);
    }
  };

  z._set("global", {
    defaultColor: "rgba(0,0,0,0.1)",
    defaultFontColor: "#666",
    defaultFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
    defaultFontSize: 12,
    defaultFontStyle: "normal",
    defaultLineHeight: 1.2,
    showLines: !0
  });

  var N = z,
      B = S.valueOrDefault;
  var E = {
    toLineHeight: function toLineHeight(t, e) {
      var n = ("" + t).match(/^(normal|(\d+(?:\.\d+)?)(px|em|%)?)$/);
      if (!n || "normal" === n[1]) return 1.2 * e;

      switch (t = +n[2], n[3]) {
        case "px":
          return t;

        case "%":
          t /= 100;
      }

      return e * t;
    },
    toPadding: function toPadding(t) {
      var e, n, i, a;
      return S.isObject(t) ? (e = +t.top || 0, n = +t.right || 0, i = +t.bottom || 0, a = +t.left || 0) : e = n = i = a = +t || 0, {
        top: e,
        right: n,
        bottom: i,
        left: a,
        height: e + i,
        width: a + n
      };
    },
    _parseFont: function _parseFont(t) {
      var e = N.global,
          n = B(t.fontSize, e.defaultFontSize),
          i = {
        family: B(t.fontFamily, e.defaultFontFamily),
        lineHeight: S.options.toLineHeight(B(t.lineHeight, e.defaultLineHeight), n),
        size: n,
        style: B(t.fontStyle, e.defaultFontStyle),
        weight: null,
        string: ""
      };
      return i.string = function (t) {
        return !t || S.isNullOrUndef(t.size) || S.isNullOrUndef(t.family) ? null : (t.style ? t.style + " " : "") + (t.weight ? t.weight + " " : "") + t.size + "px " + t.family;
      }(i), i;
    },
    resolve: function resolve(t, e, n, i) {
      var a,
          r,
          o,
          s = !0;

      for (a = 0, r = t.length; a < r; ++a) {
        if (void 0 !== (o = t[a]) && (void 0 !== e && "function" == typeof o && (o = o(e), s = !1), void 0 !== n && S.isArray(o) && (o = o[n], s = !1), void 0 !== o)) return i && !s && (i.cacheable = !1), o;
      }
    }
  },
      W = {
    _factorize: function _factorize(t) {
      var e,
          n = [],
          i = Math.sqrt(t);

      for (e = 1; e < i; e++) {
        t % e == 0 && (n.push(e), n.push(t / e));
      }

      return i === (0 | i) && n.push(i), n.sort(function (t, e) {
        return t - e;
      }).pop(), n;
    },
    log10: Math.log10 || function (t) {
      var e = Math.log(t) * Math.LOG10E,
          n = Math.round(e);
      return t === Math.pow(10, n) ? n : e;
    }
  },
      V = W;
  S.log10 = W.log10;
  var H = S,
      j = P,
      q = R,
      U = E,
      Y = V,
      G = {
    getRtlAdapter: function getRtlAdapter(t, e, n) {
      return t ? function (t, e) {
        return {
          x: function x(n) {
            return t + t + e - n;
          },
          setWidth: function setWidth(t) {
            e = t;
          },
          textAlign: function textAlign(t) {
            return "center" === t ? t : "right" === t ? "left" : "right";
          },
          xPlus: function xPlus(t, e) {
            return t - e;
          },
          leftForLtr: function leftForLtr(t, e) {
            return t - e;
          }
        };
      }(e, n) : {
        x: function x(t) {
          return t;
        },
        setWidth: function setWidth(t) {},
        textAlign: function textAlign(t) {
          return t;
        },
        xPlus: function xPlus(t, e) {
          return t + e;
        },
        leftForLtr: function leftForLtr(t, e) {
          return t;
        }
      };
    },
    overrideTextDirection: function overrideTextDirection(t, e) {
      var n, i;
      "ltr" !== e && "rtl" !== e || (i = [(n = t.canvas.style).getPropertyValue("direction"), n.getPropertyPriority("direction")], n.setProperty("direction", e, "important"), t.prevTextDirection = i);
    },
    restoreTextDirection: function restoreTextDirection(t) {
      var e = t.prevTextDirection;
      void 0 !== e && (delete t.prevTextDirection, t.canvas.style.setProperty("direction", e[0], e[1]));
    }
  };
  H.easing = j, H.canvas = q, H.options = U, H.math = Y, H.rtl = G;

  var X = function X(t) {
    H.extend(this, t), this.initialize.apply(this, arguments);
  };

  H.extend(X.prototype, {
    _type: void 0,
    initialize: function initialize() {
      this.hidden = !1;
    },
    pivot: function pivot() {
      var t = this;
      return t._view || (t._view = H.extend({}, t._model)), t._start = {}, t;
    },
    transition: function transition(t) {
      var e = this,
          n = e._model,
          i = e._start,
          a = e._view;
      return n && 1 !== t ? (a || (a = e._view = {}), i || (i = e._start = {}), function (t, e, n, i) {
        var a,
            r,
            o,
            s,
            l,
            u,
            d,
            h,
            c,
            f = Object.keys(n);

        for (a = 0, r = f.length; a < r; ++a) {
          if (u = n[o = f[a]], e.hasOwnProperty(o) || (e[o] = u), (s = e[o]) !== u && "_" !== o[0]) {
            if (t.hasOwnProperty(o) || (t[o] = s), (d = _typeof(u)) === _typeof(l = t[o])) if ("string" === d) {
              if ((h = _(l)).valid && (c = _(u)).valid) {
                e[o] = c.mix(h, i).rgbString();
                continue;
              }
            } else if (H.isFinite(l) && H.isFinite(u)) {
              e[o] = l + (u - l) * i;
              continue;
            }
            e[o] = u;
          }
        }
      }(i, a, n, t), e) : (e._view = H.extend({}, n), e._start = null, e);
    },
    tooltipPosition: function tooltipPosition() {
      return {
        x: this._model.x,
        y: this._model.y
      };
    },
    hasValue: function hasValue() {
      return H.isNumber(this._model.x) && H.isNumber(this._model.y);
    }
  }), X.extend = H.inherits;
  var K = X,
      Z = K.extend({
    chart: null,
    currentStep: 0,
    numSteps: 60,
    easing: "",
    render: null,
    onAnimationProgress: null,
    onAnimationComplete: null
  }),
      $ = Z;
  Object.defineProperty(Z.prototype, "animationObject", {
    get: function get() {
      return this;
    }
  }), Object.defineProperty(Z.prototype, "chartInstance", {
    get: function get() {
      return this.chart;
    },
    set: function set(t) {
      this.chart = t;
    }
  }), N._set("global", {
    animation: {
      duration: 1e3,
      easing: "easeOutQuart",
      onProgress: H.noop,
      onComplete: H.noop
    }
  });
  var J = {
    animations: [],
    request: null,
    addAnimation: function addAnimation(t, e, n, i) {
      var a,
          r,
          o = this.animations;

      for (e.chart = t, e.startTime = Date.now(), e.duration = n, i || (t.animating = !0), a = 0, r = o.length; a < r; ++a) {
        if (o[a].chart === t) return void (o[a] = e);
      }

      o.push(e), 1 === o.length && this.requestAnimationFrame();
    },
    cancelAnimation: function cancelAnimation(t) {
      var e = H.findIndex(this.animations, function (e) {
        return e.chart === t;
      });
      -1 !== e && (this.animations.splice(e, 1), t.animating = !1);
    },
    requestAnimationFrame: function requestAnimationFrame() {
      var t = this;
      null === t.request && (t.request = H.requestAnimFrame.call(window, function () {
        t.request = null, t.startDigest();
      }));
    },
    startDigest: function startDigest() {
      this.advance(), this.animations.length > 0 && this.requestAnimationFrame();
    },
    advance: function advance() {
      for (var t, e, n, i, a = this.animations, r = 0; r < a.length;) {
        e = (t = a[r]).chart, n = t.numSteps, i = Math.floor((Date.now() - t.startTime) / t.duration * n) + 1, t.currentStep = Math.min(i, n), H.callback(t.render, [e, t], e), H.callback(t.onAnimationProgress, [t], e), t.currentStep >= n ? (H.callback(t.onAnimationComplete, [t], e), e.animating = !1, a.splice(r, 1)) : ++r;
      }
    }
  },
      Q = H.options.resolve,
      tt = ["push", "pop", "shift", "splice", "unshift"];

  function et(t, e) {
    var n = t._chartjs;

    if (n) {
      var i = n.listeners,
          a = i.indexOf(e);
      -1 !== a && i.splice(a, 1), i.length > 0 || (tt.forEach(function (e) {
        delete t[e];
      }), delete t._chartjs);
    }
  }

  var nt = function nt(t, e) {
    this.initialize(t, e);
  };

  H.extend(nt.prototype, {
    datasetElementType: null,
    dataElementType: null,
    _datasetElementOptions: ["backgroundColor", "borderCapStyle", "borderColor", "borderDash", "borderDashOffset", "borderJoinStyle", "borderWidth"],
    _dataElementOptions: ["backgroundColor", "borderColor", "borderWidth", "pointStyle"],
    initialize: function initialize(t, e) {
      var n = this;
      n.chart = t, n.index = e, n.linkScales(), n.addElements(), n._type = n.getMeta().type;
    },
    updateIndex: function updateIndex(t) {
      this.index = t;
    },
    linkScales: function linkScales() {
      var t = this.getMeta(),
          e = this.chart,
          n = e.scales,
          i = this.getDataset(),
          a = e.options.scales;
      null !== t.xAxisID && t.xAxisID in n && !i.xAxisID || (t.xAxisID = i.xAxisID || a.xAxes[0].id), null !== t.yAxisID && t.yAxisID in n && !i.yAxisID || (t.yAxisID = i.yAxisID || a.yAxes[0].id);
    },
    getDataset: function getDataset() {
      return this.chart.data.datasets[this.index];
    },
    getMeta: function getMeta() {
      return this.chart.getDatasetMeta(this.index);
    },
    getScaleForId: function getScaleForId(t) {
      return this.chart.scales[t];
    },
    _getValueScaleId: function _getValueScaleId() {
      return this.getMeta().yAxisID;
    },
    _getIndexScaleId: function _getIndexScaleId() {
      return this.getMeta().xAxisID;
    },
    _getValueScale: function _getValueScale() {
      return this.getScaleForId(this._getValueScaleId());
    },
    _getIndexScale: function _getIndexScale() {
      return this.getScaleForId(this._getIndexScaleId());
    },
    reset: function reset() {
      this._update(!0);
    },
    destroy: function destroy() {
      this._data && et(this._data, this);
    },
    createMetaDataset: function createMetaDataset() {
      var t = this.datasetElementType;
      return t && new t({
        _chart: this.chart,
        _datasetIndex: this.index
      });
    },
    createMetaData: function createMetaData(t) {
      var e = this.dataElementType;
      return e && new e({
        _chart: this.chart,
        _datasetIndex: this.index,
        _index: t
      });
    },
    addElements: function addElements() {
      var t,
          e,
          n = this.getMeta(),
          i = this.getDataset().data || [],
          a = n.data;

      for (t = 0, e = i.length; t < e; ++t) {
        a[t] = a[t] || this.createMetaData(t);
      }

      n.dataset = n.dataset || this.createMetaDataset();
    },
    addElementAndReset: function addElementAndReset(t) {
      var e = this.createMetaData(t);
      this.getMeta().data.splice(t, 0, e), this.updateElement(e, t, !0);
    },
    buildOrUpdateElements: function buildOrUpdateElements() {
      var t,
          e,
          n = this,
          i = n.getDataset(),
          a = i.data || (i.data = []);
      n._data !== a && (n._data && et(n._data, n), a && Object.isExtensible(a) && (e = n, (t = a)._chartjs ? t._chartjs.listeners.push(e) : (Object.defineProperty(t, "_chartjs", {
        configurable: !0,
        enumerable: !1,
        value: {
          listeners: [e]
        }
      }), tt.forEach(function (e) {
        var n = "onData" + e.charAt(0).toUpperCase() + e.slice(1),
            i = t[e];
        Object.defineProperty(t, e, {
          configurable: !0,
          enumerable: !1,
          value: function value() {
            var e = Array.prototype.slice.call(arguments),
                a = i.apply(this, e);
            return H.each(t._chartjs.listeners, function (t) {
              "function" == typeof t[n] && t[n].apply(t, e);
            }), a;
          }
        });
      }))), n._data = a), n.resyncElements();
    },
    _configure: function _configure() {
      this._config = H.merge(Object.create(null), [this.chart.options.datasets[this._type], this.getDataset()], {
        merger: function merger(t, e, n) {
          "_meta" !== t && "data" !== t && H._merger(t, e, n);
        }
      });
    },
    _update: function _update(t) {
      this._configure(), this._cachedDataOpts = null, this.update(t);
    },
    update: H.noop,
    transition: function transition(t) {
      for (var e = this.getMeta(), n = e.data || [], i = n.length, a = 0; a < i; ++a) {
        n[a].transition(t);
      }

      e.dataset && e.dataset.transition(t);
    },
    draw: function draw() {
      var t = this.getMeta(),
          e = t.data || [],
          n = e.length,
          i = 0;

      for (t.dataset && t.dataset.draw(); i < n; ++i) {
        e[i].draw();
      }
    },
    getStyle: function getStyle(t) {
      var e,
          n = this.getMeta(),
          i = n.dataset;
      return this._configure(), i && void 0 === t ? e = this._resolveDatasetElementOptions(i || {}) : (t = t || 0, e = this._resolveDataElementOptions(n.data[t] || {}, t)), !1 !== e.fill && null !== e.fill || (e.backgroundColor = e.borderColor), e;
    },
    _resolveDatasetElementOptions: function _resolveDatasetElementOptions(t, e) {
      var n,
          i,
          a,
          r,
          o = this,
          s = o.chart,
          l = o._config,
          u = t.custom || {},
          d = s.options.elements[o.datasetElementType.prototype._type] || {},
          h = o._datasetElementOptions,
          c = {},
          f = {
        chart: s,
        dataset: o.getDataset(),
        datasetIndex: o.index,
        hover: e
      };

      for (n = 0, i = h.length; n < i; ++n) {
        a = h[n], r = e ? "hover" + a.charAt(0).toUpperCase() + a.slice(1) : a, c[a] = Q([u[r], l[r], d[r]], f);
      }

      return c;
    },
    _resolveDataElementOptions: function _resolveDataElementOptions(t, e) {
      var n = this,
          i = t && t.custom,
          a = n._cachedDataOpts;
      if (a && !i) return a;
      var r,
          o,
          s,
          l,
          u = n.chart,
          d = n._config,
          h = u.options.elements[n.dataElementType.prototype._type] || {},
          c = n._dataElementOptions,
          f = {},
          g = {
        chart: u,
        dataIndex: e,
        dataset: n.getDataset(),
        datasetIndex: n.index
      },
          p = {
        cacheable: !i
      };
      if (i = i || {}, H.isArray(c)) for (o = 0, s = c.length; o < s; ++o) {
        f[l = c[o]] = Q([i[l], d[l], h[l]], g, e, p);
      } else for (o = 0, s = (r = Object.keys(c)).length; o < s; ++o) {
        f[l = r[o]] = Q([i[l], d[c[l]], d[l], h[l]], g, e, p);
      }
      return p.cacheable && (n._cachedDataOpts = Object.freeze(f)), f;
    },
    removeHoverStyle: function removeHoverStyle(t) {
      H.merge(t._model, t.$previousStyle || {}), delete t.$previousStyle;
    },
    setHoverStyle: function setHoverStyle(t) {
      var e = this.chart.data.datasets[t._datasetIndex],
          n = t._index,
          i = t.custom || {},
          a = t._model,
          r = H.getHoverColor;
      t.$previousStyle = {
        backgroundColor: a.backgroundColor,
        borderColor: a.borderColor,
        borderWidth: a.borderWidth
      }, a.backgroundColor = Q([i.hoverBackgroundColor, e.hoverBackgroundColor, r(a.backgroundColor)], void 0, n), a.borderColor = Q([i.hoverBorderColor, e.hoverBorderColor, r(a.borderColor)], void 0, n), a.borderWidth = Q([i.hoverBorderWidth, e.hoverBorderWidth, a.borderWidth], void 0, n);
    },
    _removeDatasetHoverStyle: function _removeDatasetHoverStyle() {
      var t = this.getMeta().dataset;
      t && this.removeHoverStyle(t);
    },
    _setDatasetHoverStyle: function _setDatasetHoverStyle() {
      var t,
          e,
          n,
          i,
          a,
          r,
          o = this.getMeta().dataset,
          s = {};

      if (o) {
        for (r = o._model, a = this._resolveDatasetElementOptions(o, !0), t = 0, e = (i = Object.keys(a)).length; t < e; ++t) {
          s[n = i[t]] = r[n], r[n] = a[n];
        }

        o.$previousStyle = s;
      }
    },
    resyncElements: function resyncElements() {
      var t = this.getMeta(),
          e = this.getDataset().data,
          n = t.data.length,
          i = e.length;
      i < n ? t.data.splice(i, n - i) : i > n && this.insertElements(n, i - n);
    },
    insertElements: function insertElements(t, e) {
      for (var n = 0; n < e; ++n) {
        this.addElementAndReset(t + n);
      }
    },
    onDataPush: function onDataPush() {
      var t = arguments.length;
      this.insertElements(this.getDataset().data.length - t, t);
    },
    onDataPop: function onDataPop() {
      this.getMeta().data.pop();
    },
    onDataShift: function onDataShift() {
      this.getMeta().data.shift();
    },
    onDataSplice: function onDataSplice(t, e) {
      this.getMeta().data.splice(t, e), this.insertElements(t, arguments.length - 2);
    },
    onDataUnshift: function onDataUnshift() {
      this.insertElements(0, arguments.length);
    }
  }), nt.extend = H.inherits;
  var it = nt,
      at = 2 * Math.PI;

  function rt(t, e) {
    var n = e.startAngle,
        i = e.endAngle,
        a = e.pixelMargin,
        r = a / e.outerRadius,
        o = e.x,
        s = e.y;
    t.beginPath(), t.arc(o, s, e.outerRadius, n - r, i + r), e.innerRadius > a ? (r = a / e.innerRadius, t.arc(o, s, e.innerRadius - a, i + r, n - r, !0)) : t.arc(o, s, a, i + Math.PI / 2, n - Math.PI / 2), t.closePath(), t.clip();
  }

  function ot(t, e, n) {
    var i = "inner" === e.borderAlign;
    i ? (t.lineWidth = 2 * e.borderWidth, t.lineJoin = "round") : (t.lineWidth = e.borderWidth, t.lineJoin = "bevel"), n.fullCircles && function (t, e, n, i) {
      var a,
          r = n.endAngle;

      for (i && (n.endAngle = n.startAngle + at, rt(t, n), n.endAngle = r, n.endAngle === n.startAngle && n.fullCircles && (n.endAngle += at, n.fullCircles--)), t.beginPath(), t.arc(n.x, n.y, n.innerRadius, n.startAngle + at, n.startAngle, !0), a = 0; a < n.fullCircles; ++a) {
        t.stroke();
      }

      for (t.beginPath(), t.arc(n.x, n.y, e.outerRadius, n.startAngle, n.startAngle + at), a = 0; a < n.fullCircles; ++a) {
        t.stroke();
      }
    }(t, e, n, i), i && rt(t, n), t.beginPath(), t.arc(n.x, n.y, e.outerRadius, n.startAngle, n.endAngle), t.arc(n.x, n.y, n.innerRadius, n.endAngle, n.startAngle, !0), t.closePath(), t.stroke();
  }

  N._set("global", {
    elements: {
      arc: {
        backgroundColor: N.global.defaultColor,
        borderColor: "#fff",
        borderWidth: 2,
        borderAlign: "center"
      }
    }
  });

  var st = K.extend({
    _type: "arc",
    inLabelRange: function inLabelRange(t) {
      var e = this._view;
      return !!e && Math.pow(t - e.x, 2) < Math.pow(e.radius + e.hoverRadius, 2);
    },
    inRange: function inRange(t, e) {
      var n = this._view;

      if (n) {
        for (var i = H.getAngleFromPoint(n, {
          x: t,
          y: e
        }), a = i.angle, r = i.distance, o = n.startAngle, s = n.endAngle; s < o;) {
          s += at;
        }

        for (; a > s;) {
          a -= at;
        }

        for (; a < o;) {
          a += at;
        }

        var l = a >= o && a <= s,
            u = r >= n.innerRadius && r <= n.outerRadius;
        return l && u;
      }

      return !1;
    },
    getCenterPoint: function getCenterPoint() {
      var t = this._view,
          e = (t.startAngle + t.endAngle) / 2,
          n = (t.innerRadius + t.outerRadius) / 2;
      return {
        x: t.x + Math.cos(e) * n,
        y: t.y + Math.sin(e) * n
      };
    },
    getArea: function getArea() {
      var t = this._view;
      return Math.PI * ((t.endAngle - t.startAngle) / (2 * Math.PI)) * (Math.pow(t.outerRadius, 2) - Math.pow(t.innerRadius, 2));
    },
    tooltipPosition: function tooltipPosition() {
      var t = this._view,
          e = t.startAngle + (t.endAngle - t.startAngle) / 2,
          n = (t.outerRadius - t.innerRadius) / 2 + t.innerRadius;
      return {
        x: t.x + Math.cos(e) * n,
        y: t.y + Math.sin(e) * n
      };
    },
    draw: function draw() {
      var t,
          e = this._chart.ctx,
          n = this._view,
          i = "inner" === n.borderAlign ? .33 : 0,
          a = {
        x: n.x,
        y: n.y,
        innerRadius: n.innerRadius,
        outerRadius: Math.max(n.outerRadius - i, 0),
        pixelMargin: i,
        startAngle: n.startAngle,
        endAngle: n.endAngle,
        fullCircles: Math.floor(n.circumference / at)
      };

      if (e.save(), e.fillStyle = n.backgroundColor, e.strokeStyle = n.borderColor, a.fullCircles) {
        for (a.endAngle = a.startAngle + at, e.beginPath(), e.arc(a.x, a.y, a.outerRadius, a.startAngle, a.endAngle), e.arc(a.x, a.y, a.innerRadius, a.endAngle, a.startAngle, !0), e.closePath(), t = 0; t < a.fullCircles; ++t) {
          e.fill();
        }

        a.endAngle = a.startAngle + n.circumference % at;
      }

      e.beginPath(), e.arc(a.x, a.y, a.outerRadius, a.startAngle, a.endAngle), e.arc(a.x, a.y, a.innerRadius, a.endAngle, a.startAngle, !0), e.closePath(), e.fill(), n.borderWidth && ot(e, n, a), e.restore();
    }
  }),
      lt = H.valueOrDefault,
      ut = N.global.defaultColor;

  N._set("global", {
    elements: {
      line: {
        tension: .4,
        backgroundColor: ut,
        borderWidth: 3,
        borderColor: ut,
        borderCapStyle: "butt",
        borderDash: [],
        borderDashOffset: 0,
        borderJoinStyle: "miter",
        capBezierPoints: !0,
        fill: !0
      }
    }
  });

  var dt = K.extend({
    _type: "line",
    draw: function draw() {
      var t,
          e,
          n,
          i = this,
          a = i._view,
          r = i._chart.ctx,
          o = a.spanGaps,
          s = i._children.slice(),
          l = N.global,
          u = l.elements.line,
          d = -1,
          h = i._loop;

      if (s.length) {
        if (i._loop) {
          for (t = 0; t < s.length; ++t) {
            if (e = H.previousItem(s, t), !s[t]._view.skip && e._view.skip) {
              s = s.slice(t).concat(s.slice(0, t)), h = o;
              break;
            }
          }

          h && s.push(s[0]);
        }

        for (r.save(), r.lineCap = a.borderCapStyle || u.borderCapStyle, r.setLineDash && r.setLineDash(a.borderDash || u.borderDash), r.lineDashOffset = lt(a.borderDashOffset, u.borderDashOffset), r.lineJoin = a.borderJoinStyle || u.borderJoinStyle, r.lineWidth = lt(a.borderWidth, u.borderWidth), r.strokeStyle = a.borderColor || l.defaultColor, r.beginPath(), (n = s[0]._view).skip || (r.moveTo(n.x, n.y), d = 0), t = 1; t < s.length; ++t) {
          n = s[t]._view, e = -1 === d ? H.previousItem(s, t) : s[d], n.skip || (d !== t - 1 && !o || -1 === d ? r.moveTo(n.x, n.y) : H.canvas.lineTo(r, e._view, n), d = t);
        }

        h && r.closePath(), r.stroke(), r.restore();
      }
    }
  }),
      ht = H.valueOrDefault,
      ct = N.global.defaultColor;

  function ft(t) {
    var e = this._view;
    return !!e && Math.abs(t - e.x) < e.radius + e.hitRadius;
  }

  N._set("global", {
    elements: {
      point: {
        radius: 3,
        pointStyle: "circle",
        backgroundColor: ct,
        borderColor: ct,
        borderWidth: 1,
        hitRadius: 1,
        hoverRadius: 4,
        hoverBorderWidth: 1
      }
    }
  });

  var gt = K.extend({
    _type: "point",
    inRange: function inRange(t, e) {
      var n = this._view;
      return !!n && Math.pow(t - n.x, 2) + Math.pow(e - n.y, 2) < Math.pow(n.hitRadius + n.radius, 2);
    },
    inLabelRange: ft,
    inXRange: ft,
    inYRange: function inYRange(t) {
      var e = this._view;
      return !!e && Math.abs(t - e.y) < e.radius + e.hitRadius;
    },
    getCenterPoint: function getCenterPoint() {
      var t = this._view;
      return {
        x: t.x,
        y: t.y
      };
    },
    getArea: function getArea() {
      return Math.PI * Math.pow(this._view.radius, 2);
    },
    tooltipPosition: function tooltipPosition() {
      var t = this._view;
      return {
        x: t.x,
        y: t.y,
        padding: t.radius + t.borderWidth
      };
    },
    draw: function draw(t) {
      var e = this._view,
          n = this._chart.ctx,
          i = e.pointStyle,
          a = e.rotation,
          r = e.radius,
          o = e.x,
          s = e.y,
          l = N.global,
          u = l.defaultColor;
      e.skip || (void 0 === t || H.canvas._isPointInArea(e, t)) && (n.strokeStyle = e.borderColor || u, n.lineWidth = ht(e.borderWidth, l.elements.point.borderWidth), n.fillStyle = e.backgroundColor || u, H.canvas.drawPoint(n, i, r, o, s, a));
    }
  }),
      pt = N.global.defaultColor;

  function mt(t) {
    return t && void 0 !== t.width;
  }

  function vt(t) {
    var e, n, i, a, r;
    return mt(t) ? (r = t.width / 2, e = t.x - r, n = t.x + r, i = Math.min(t.y, t.base), a = Math.max(t.y, t.base)) : (r = t.height / 2, e = Math.min(t.x, t.base), n = Math.max(t.x, t.base), i = t.y - r, a = t.y + r), {
      left: e,
      top: i,
      right: n,
      bottom: a
    };
  }

  function bt(t, e, n) {
    return t === e ? n : t === n ? e : t;
  }

  function xt(t, e, n) {
    var i,
        a,
        r,
        o,
        s = t.borderWidth,
        l = function (t) {
      var e = t.borderSkipped,
          n = {};
      return e ? (t.horizontal ? t.base > t.x && (e = bt(e, "left", "right")) : t.base < t.y && (e = bt(e, "bottom", "top")), n[e] = !0, n) : n;
    }(t);

    return H.isObject(s) ? (i = +s.top || 0, a = +s.right || 0, r = +s.bottom || 0, o = +s.left || 0) : i = a = r = o = +s || 0, {
      t: l.top || i < 0 ? 0 : i > n ? n : i,
      r: l.right || a < 0 ? 0 : a > e ? e : a,
      b: l.bottom || r < 0 ? 0 : r > n ? n : r,
      l: l.left || o < 0 ? 0 : o > e ? e : o
    };
  }

  function yt(t, e, n) {
    var i = null === e,
        a = null === n,
        r = !(!t || i && a) && vt(t);
    return r && (i || e >= r.left && e <= r.right) && (a || n >= r.top && n <= r.bottom);
  }

  N._set("global", {
    elements: {
      rectangle: {
        backgroundColor: pt,
        borderColor: pt,
        borderSkipped: "bottom",
        borderWidth: 0
      }
    }
  });

  var _t = K.extend({
    _type: "rectangle",
    draw: function draw() {
      var t = this._chart.ctx,
          e = this._view,
          n = function (t) {
        var e = vt(t),
            n = e.right - e.left,
            i = e.bottom - e.top,
            a = xt(t, n / 2, i / 2);
        return {
          outer: {
            x: e.left,
            y: e.top,
            w: n,
            h: i
          },
          inner: {
            x: e.left + a.l,
            y: e.top + a.t,
            w: n - a.l - a.r,
            h: i - a.t - a.b
          }
        };
      }(e),
          i = n.outer,
          a = n.inner;

      t.fillStyle = e.backgroundColor, t.fillRect(i.x, i.y, i.w, i.h), i.w === a.w && i.h === a.h || (t.save(), t.beginPath(), t.rect(i.x, i.y, i.w, i.h), t.clip(), t.fillStyle = e.borderColor, t.rect(a.x, a.y, a.w, a.h), t.fill("evenodd"), t.restore());
    },
    height: function height() {
      var t = this._view;
      return t.base - t.y;
    },
    inRange: function inRange(t, e) {
      return yt(this._view, t, e);
    },
    inLabelRange: function inLabelRange(t, e) {
      var n = this._view;
      return mt(n) ? yt(n, t, null) : yt(n, null, e);
    },
    inXRange: function inXRange(t) {
      return yt(this._view, t, null);
    },
    inYRange: function inYRange(t) {
      return yt(this._view, null, t);
    },
    getCenterPoint: function getCenterPoint() {
      var t,
          e,
          n = this._view;
      return mt(n) ? (t = n.x, e = (n.y + n.base) / 2) : (t = (n.x + n.base) / 2, e = n.y), {
        x: t,
        y: e
      };
    },
    getArea: function getArea() {
      var t = this._view;
      return mt(t) ? t.width * Math.abs(t.y - t.base) : t.height * Math.abs(t.x - t.base);
    },
    tooltipPosition: function tooltipPosition() {
      var t = this._view;
      return {
        x: t.x,
        y: t.y
      };
    }
  }),
      kt = {},
      wt = st,
      Mt = dt,
      St = gt,
      Ct = _t;

  kt.Arc = wt, kt.Line = Mt, kt.Point = St, kt.Rectangle = Ct;
  var Pt = H._deprecated,
      At = H.valueOrDefault;

  function Dt(t, e, n) {
    var i,
        a,
        r = n.barThickness,
        o = e.stackCount,
        s = e.pixels[t],
        l = H.isNullOrUndef(r) ? function (t, e) {
      var n,
          i,
          a,
          r,
          o = t._length;

      for (a = 1, r = e.length; a < r; ++a) {
        o = Math.min(o, Math.abs(e[a] - e[a - 1]));
      }

      for (a = 0, r = t.getTicks().length; a < r; ++a) {
        i = t.getPixelForTick(a), o = a > 0 ? Math.min(o, Math.abs(i - n)) : o, n = i;
      }

      return o;
    }(e.scale, e.pixels) : -1;
    return H.isNullOrUndef(r) ? (i = l * n.categoryPercentage, a = n.barPercentage) : (i = r * o, a = 1), {
      chunk: i / o,
      ratio: a,
      start: s - i / 2
    };
  }

  N._set("bar", {
    hover: {
      mode: "label"
    },
    scales: {
      xAxes: [{
        type: "category",
        offset: !0,
        gridLines: {
          offsetGridLines: !0
        }
      }],
      yAxes: [{
        type: "linear"
      }]
    }
  }), N._set("global", {
    datasets: {
      bar: {
        categoryPercentage: .8,
        barPercentage: .9
      }
    }
  });
  var Tt = it.extend({
    dataElementType: kt.Rectangle,
    _dataElementOptions: ["backgroundColor", "borderColor", "borderSkipped", "borderWidth", "barPercentage", "barThickness", "categoryPercentage", "maxBarThickness", "minBarLength"],
    initialize: function initialize() {
      var t,
          e,
          n = this;
      it.prototype.initialize.apply(n, arguments), (t = n.getMeta()).stack = n.getDataset().stack, t.bar = !0, e = n._getIndexScale().options, Pt("bar chart", e.barPercentage, "scales.[x/y]Axes.barPercentage", "dataset.barPercentage"), Pt("bar chart", e.barThickness, "scales.[x/y]Axes.barThickness", "dataset.barThickness"), Pt("bar chart", e.categoryPercentage, "scales.[x/y]Axes.categoryPercentage", "dataset.categoryPercentage"), Pt("bar chart", n._getValueScale().options.minBarLength, "scales.[x/y]Axes.minBarLength", "dataset.minBarLength"), Pt("bar chart", e.maxBarThickness, "scales.[x/y]Axes.maxBarThickness", "dataset.maxBarThickness");
    },
    update: function update(t) {
      var e,
          n,
          i = this.getMeta().data;

      for (this._ruler = this.getRuler(), e = 0, n = i.length; e < n; ++e) {
        this.updateElement(i[e], e, t);
      }
    },
    updateElement: function updateElement(t, e, n) {
      var i = this,
          a = i.getMeta(),
          r = i.getDataset(),
          o = i._resolveDataElementOptions(t, e);

      t._xScale = i.getScaleForId(a.xAxisID), t._yScale = i.getScaleForId(a.yAxisID), t._datasetIndex = i.index, t._index = e, t._model = {
        backgroundColor: o.backgroundColor,
        borderColor: o.borderColor,
        borderSkipped: o.borderSkipped,
        borderWidth: o.borderWidth,
        datasetLabel: r.label,
        label: i.chart.data.labels[e]
      }, H.isArray(r.data[e]) && (t._model.borderSkipped = null), i._updateElementGeometry(t, e, n, o), t.pivot();
    },
    _updateElementGeometry: function _updateElementGeometry(t, e, n, i) {
      var a = this,
          r = t._model,
          o = a._getValueScale(),
          s = o.getBasePixel(),
          l = o.isHorizontal(),
          u = a._ruler || a.getRuler(),
          d = a.calculateBarValuePixels(a.index, e, i),
          h = a.calculateBarIndexPixels(a.index, e, u, i);

      r.horizontal = l, r.base = n ? s : d.base, r.x = l ? n ? s : d.head : h.center, r.y = l ? h.center : n ? s : d.head, r.height = l ? h.size : void 0, r.width = l ? void 0 : h.size;
    },
    _getStacks: function _getStacks(t) {
      var e,
          n,
          i = this._getIndexScale(),
          a = i._getMatchingVisibleMetas(this._type),
          r = i.options.stacked,
          o = a.length,
          s = [];

      for (e = 0; e < o && (n = a[e], (!1 === r || -1 === s.indexOf(n.stack) || void 0 === r && void 0 === n.stack) && s.push(n.stack), n.index !== t); ++e) {
        ;
      }

      return s;
    },
    getStackCount: function getStackCount() {
      return this._getStacks().length;
    },
    getStackIndex: function getStackIndex(t, e) {
      var n = this._getStacks(t),
          i = void 0 !== e ? n.indexOf(e) : -1;

      return -1 === i ? n.length - 1 : i;
    },
    getRuler: function getRuler() {
      var t,
          e,
          n = this._getIndexScale(),
          i = [];

      for (t = 0, e = this.getMeta().data.length; t < e; ++t) {
        i.push(n.getPixelForValue(null, t, this.index));
      }

      return {
        pixels: i,
        start: n._startPixel,
        end: n._endPixel,
        stackCount: this.getStackCount(),
        scale: n
      };
    },
    calculateBarValuePixels: function calculateBarValuePixels(t, e, n) {
      var i,
          a,
          r,
          o,
          s,
          l,
          u,
          d = this.chart,
          h = this._getValueScale(),
          c = h.isHorizontal(),
          f = d.data.datasets,
          g = h._getMatchingVisibleMetas(this._type),
          p = h._parseValue(f[t].data[e]),
          m = n.minBarLength,
          v = h.options.stacked,
          b = this.getMeta().stack,
          x = void 0 === p.start ? 0 : p.max >= 0 && p.min >= 0 ? p.min : p.max,
          y = void 0 === p.start ? p.end : p.max >= 0 && p.min >= 0 ? p.max - p.min : p.min - p.max,
          _ = g.length;

      if (v || void 0 === v && void 0 !== b) for (i = 0; i < _ && (a = g[i]).index !== t; ++i) {
        a.stack === b && (r = void 0 === (u = h._parseValue(f[a.index].data[e])).start ? u.end : u.min >= 0 && u.max >= 0 ? u.max : u.min, (p.min < 0 && r < 0 || p.max >= 0 && r > 0) && (x += r));
      }
      return o = h.getPixelForValue(x), l = (s = h.getPixelForValue(x + y)) - o, void 0 !== m && Math.abs(l) < m && (l = m, s = y >= 0 && !c || y < 0 && c ? o - m : o + m), {
        size: l,
        base: o,
        head: s,
        center: s + l / 2
      };
    },
    calculateBarIndexPixels: function calculateBarIndexPixels(t, e, n, i) {
      var a = "flex" === i.barThickness ? function (t, e, n) {
        var i,
            a = e.pixels,
            r = a[t],
            o = t > 0 ? a[t - 1] : null,
            s = t < a.length - 1 ? a[t + 1] : null,
            l = n.categoryPercentage;
        return null === o && (o = r - (null === s ? e.end - e.start : s - r)), null === s && (s = r + r - o), i = r - (r - Math.min(o, s)) / 2 * l, {
          chunk: Math.abs(s - o) / 2 * l / e.stackCount,
          ratio: n.barPercentage,
          start: i
        };
      }(e, n, i) : Dt(e, n, i),
          r = this.getStackIndex(t, this.getMeta().stack),
          o = a.start + a.chunk * r + a.chunk / 2,
          s = Math.min(At(i.maxBarThickness, 1 / 0), a.chunk * a.ratio);
      return {
        base: o - s / 2,
        head: o + s / 2,
        center: o,
        size: s
      };
    },
    draw: function draw() {
      var t = this.chart,
          e = this._getValueScale(),
          n = this.getMeta().data,
          i = this.getDataset(),
          a = n.length,
          r = 0;

      for (H.canvas.clipArea(t.ctx, t.chartArea); r < a; ++r) {
        var o = e._parseValue(i.data[r]);

        isNaN(o.min) || isNaN(o.max) || n[r].draw();
      }

      H.canvas.unclipArea(t.ctx);
    },
    _resolveDataElementOptions: function _resolveDataElementOptions() {
      var t = this,
          e = H.extend({}, it.prototype._resolveDataElementOptions.apply(t, arguments)),
          n = t._getIndexScale().options,
          i = t._getValueScale().options;

      return e.barPercentage = At(n.barPercentage, e.barPercentage), e.barThickness = At(n.barThickness, e.barThickness), e.categoryPercentage = At(n.categoryPercentage, e.categoryPercentage), e.maxBarThickness = At(n.maxBarThickness, e.maxBarThickness), e.minBarLength = At(i.minBarLength, e.minBarLength), e;
    }
  }),
      It = H.valueOrDefault,
      Ft = H.options.resolve;

  N._set("bubble", {
    hover: {
      mode: "single"
    },
    scales: {
      xAxes: [{
        type: "linear",
        position: "bottom",
        id: "x-axis-0"
      }],
      yAxes: [{
        type: "linear",
        position: "left",
        id: "y-axis-0"
      }]
    },
    tooltips: {
      callbacks: {
        title: function title() {
          return "";
        },
        label: function label(t, e) {
          var n = e.datasets[t.datasetIndex].label || "",
              i = e.datasets[t.datasetIndex].data[t.index];
          return n + ": (" + t.xLabel + ", " + t.yLabel + ", " + i.r + ")";
        }
      }
    }
  });

  var Ot = it.extend({
    dataElementType: kt.Point,
    _dataElementOptions: ["backgroundColor", "borderColor", "borderWidth", "hoverBackgroundColor", "hoverBorderColor", "hoverBorderWidth", "hoverRadius", "hitRadius", "pointStyle", "rotation"],
    update: function update(t) {
      var e = this,
          n = e.getMeta().data;
      H.each(n, function (n, i) {
        e.updateElement(n, i, t);
      });
    },
    updateElement: function updateElement(t, e, n) {
      var i = this,
          a = i.getMeta(),
          r = t.custom || {},
          o = i.getScaleForId(a.xAxisID),
          s = i.getScaleForId(a.yAxisID),
          l = i._resolveDataElementOptions(t, e),
          u = i.getDataset().data[e],
          d = i.index,
          h = n ? o.getPixelForDecimal(.5) : o.getPixelForValue("object" == _typeof(u) ? u : NaN, e, d),
          c = n ? s.getBasePixel() : s.getPixelForValue(u, e, d);

      t._xScale = o, t._yScale = s, t._options = l, t._datasetIndex = d, t._index = e, t._model = {
        backgroundColor: l.backgroundColor,
        borderColor: l.borderColor,
        borderWidth: l.borderWidth,
        hitRadius: l.hitRadius,
        pointStyle: l.pointStyle,
        rotation: l.rotation,
        radius: n ? 0 : l.radius,
        skip: r.skip || isNaN(h) || isNaN(c),
        x: h,
        y: c
      }, t.pivot();
    },
    setHoverStyle: function setHoverStyle(t) {
      var e = t._model,
          n = t._options,
          i = H.getHoverColor;
      t.$previousStyle = {
        backgroundColor: e.backgroundColor,
        borderColor: e.borderColor,
        borderWidth: e.borderWidth,
        radius: e.radius
      }, e.backgroundColor = It(n.hoverBackgroundColor, i(n.backgroundColor)), e.borderColor = It(n.hoverBorderColor, i(n.borderColor)), e.borderWidth = It(n.hoverBorderWidth, n.borderWidth), e.radius = n.radius + n.hoverRadius;
    },
    _resolveDataElementOptions: function _resolveDataElementOptions(t, e) {
      var n = this,
          i = n.chart,
          a = n.getDataset(),
          r = t.custom || {},
          o = a.data[e] || {},
          s = it.prototype._resolveDataElementOptions.apply(n, arguments),
          l = {
        chart: i,
        dataIndex: e,
        dataset: a,
        datasetIndex: n.index
      };

      return n._cachedDataOpts === s && (s = H.extend({}, s)), s.radius = Ft([r.radius, o.r, n._config.radius, i.options.elements.point.radius], l, e), s;
    }
  }),
      Lt = H.valueOrDefault,
      Rt = Math.PI,
      zt = 2 * Rt,
      Nt = Rt / 2;

  N._set("doughnut", {
    animation: {
      animateRotate: !0,
      animateScale: !1
    },
    hover: {
      mode: "single"
    },
    legendCallback: function legendCallback(t) {
      var e,
          n,
          i,
          a = document.createElement("ul"),
          r = t.data,
          o = r.datasets,
          s = r.labels;
      if (a.setAttribute("class", t.id + "-legend"), o.length) for (e = 0, n = o[0].data.length; e < n; ++e) {
        (i = a.appendChild(document.createElement("li"))).appendChild(document.createElement("span")).style.backgroundColor = o[0].backgroundColor[e], s[e] && i.appendChild(document.createTextNode(s[e]));
      }
      return a.outerHTML;
    },
    legend: {
      labels: {
        generateLabels: function generateLabels(t) {
          var e = t.data;
          return e.labels.length && e.datasets.length ? e.labels.map(function (n, i) {
            var a = t.getDatasetMeta(0),
                r = a.controller.getStyle(i);
            return {
              text: n,
              fillStyle: r.backgroundColor,
              strokeStyle: r.borderColor,
              lineWidth: r.borderWidth,
              hidden: isNaN(e.datasets[0].data[i]) || a.data[i].hidden,
              index: i
            };
          }) : [];
        }
      },
      onClick: function onClick(t, e) {
        var n,
            i,
            a,
            r = e.index,
            o = this.chart;

        for (n = 0, i = (o.data.datasets || []).length; n < i; ++n) {
          (a = o.getDatasetMeta(n)).data[r] && (a.data[r].hidden = !a.data[r].hidden);
        }

        o.update();
      }
    },
    cutoutPercentage: 50,
    rotation: -Nt,
    circumference: zt,
    tooltips: {
      callbacks: {
        title: function title() {
          return "";
        },
        label: function label(t, e) {
          var n = e.labels[t.index],
              i = ": " + e.datasets[t.datasetIndex].data[t.index];
          return H.isArray(n) ? (n = n.slice())[0] += i : n += i, n;
        }
      }
    }
  });

  var Bt = it.extend({
    dataElementType: kt.Arc,
    linkScales: H.noop,
    _dataElementOptions: ["backgroundColor", "borderColor", "borderWidth", "borderAlign", "hoverBackgroundColor", "hoverBorderColor", "hoverBorderWidth"],
    getRingIndex: function getRingIndex(t) {
      for (var e = 0, n = 0; n < t; ++n) {
        this.chart.isDatasetVisible(n) && ++e;
      }

      return e;
    },
    update: function update(t) {
      var e,
          n,
          i,
          a,
          r = this,
          o = r.chart,
          s = o.chartArea,
          l = o.options,
          u = 1,
          d = 1,
          h = 0,
          c = 0,
          f = r.getMeta(),
          g = f.data,
          p = l.cutoutPercentage / 100 || 0,
          m = l.circumference,
          v = r._getRingWeight(r.index);

      if (m < zt) {
        var b = l.rotation % zt,
            x = (b += b >= Rt ? -zt : b < -Rt ? zt : 0) + m,
            y = Math.cos(b),
            _ = Math.sin(b),
            k = Math.cos(x),
            w = Math.sin(x),
            M = b <= 0 && x >= 0 || x >= zt,
            S = b <= Nt && x >= Nt || x >= zt + Nt,
            C = b <= -Nt && x >= -Nt || x >= Rt + Nt,
            P = b === -Rt || x >= Rt ? -1 : Math.min(y, y * p, k, k * p),
            A = C ? -1 : Math.min(_, _ * p, w, w * p),
            D = M ? 1 : Math.max(y, y * p, k, k * p),
            T = S ? 1 : Math.max(_, _ * p, w, w * p);

        u = (D - P) / 2, d = (T - A) / 2, h = -(D + P) / 2, c = -(T + A) / 2;
      }

      for (i = 0, a = g.length; i < a; ++i) {
        g[i]._options = r._resolveDataElementOptions(g[i], i);
      }

      for (o.borderWidth = r.getMaxBorderWidth(), e = (s.right - s.left - o.borderWidth) / u, n = (s.bottom - s.top - o.borderWidth) / d, o.outerRadius = Math.max(Math.min(e, n) / 2, 0), o.innerRadius = Math.max(o.outerRadius * p, 0), o.radiusLength = (o.outerRadius - o.innerRadius) / (r._getVisibleDatasetWeightTotal() || 1), o.offsetX = h * o.outerRadius, o.offsetY = c * o.outerRadius, f.total = r.calculateTotal(), r.outerRadius = o.outerRadius - o.radiusLength * r._getRingWeightOffset(r.index), r.innerRadius = Math.max(r.outerRadius - o.radiusLength * v, 0), i = 0, a = g.length; i < a; ++i) {
        r.updateElement(g[i], i, t);
      }
    },
    updateElement: function updateElement(t, e, n) {
      var i = this,
          a = i.chart,
          r = a.chartArea,
          o = a.options,
          s = o.animation,
          l = (r.left + r.right) / 2,
          u = (r.top + r.bottom) / 2,
          d = o.rotation,
          h = o.rotation,
          c = i.getDataset(),
          f = n && s.animateRotate ? 0 : t.hidden ? 0 : i.calculateCircumference(c.data[e]) * (o.circumference / zt),
          g = n && s.animateScale ? 0 : i.innerRadius,
          p = n && s.animateScale ? 0 : i.outerRadius,
          m = t._options || {};
      H.extend(t, {
        _datasetIndex: i.index,
        _index: e,
        _model: {
          backgroundColor: m.backgroundColor,
          borderColor: m.borderColor,
          borderWidth: m.borderWidth,
          borderAlign: m.borderAlign,
          x: l + a.offsetX,
          y: u + a.offsetY,
          startAngle: d,
          endAngle: h,
          circumference: f,
          outerRadius: p,
          innerRadius: g,
          label: H.valueAtIndexOrDefault(c.label, e, a.data.labels[e])
        }
      });
      var v = t._model;
      n && s.animateRotate || (v.startAngle = 0 === e ? o.rotation : i.getMeta().data[e - 1]._model.endAngle, v.endAngle = v.startAngle + v.circumference), t.pivot();
    },
    calculateTotal: function calculateTotal() {
      var t,
          e = this.getDataset(),
          n = this.getMeta(),
          i = 0;
      return H.each(n.data, function (n, a) {
        t = e.data[a], isNaN(t) || n.hidden || (i += Math.abs(t));
      }), i;
    },
    calculateCircumference: function calculateCircumference(t) {
      var e = this.getMeta().total;
      return e > 0 && !isNaN(t) ? zt * (Math.abs(t) / e) : 0;
    },
    getMaxBorderWidth: function getMaxBorderWidth(t) {
      var e,
          n,
          i,
          a,
          r,
          o,
          s,
          l,
          u = 0,
          d = this.chart;
      if (!t) for (e = 0, n = d.data.datasets.length; e < n; ++e) {
        if (d.isDatasetVisible(e)) {
          t = (i = d.getDatasetMeta(e)).data, e !== this.index && (r = i.controller);
          break;
        }
      }
      if (!t) return 0;

      for (e = 0, n = t.length; e < n; ++e) {
        a = t[e], r ? (r._configure(), o = r._resolveDataElementOptions(a, e)) : o = a._options, "inner" !== o.borderAlign && (s = o.borderWidth, u = (l = o.hoverBorderWidth) > (u = s > u ? s : u) ? l : u);
      }

      return u;
    },
    setHoverStyle: function setHoverStyle(t) {
      var e = t._model,
          n = t._options,
          i = H.getHoverColor;
      t.$previousStyle = {
        backgroundColor: e.backgroundColor,
        borderColor: e.borderColor,
        borderWidth: e.borderWidth
      }, e.backgroundColor = Lt(n.hoverBackgroundColor, i(n.backgroundColor)), e.borderColor = Lt(n.hoverBorderColor, i(n.borderColor)), e.borderWidth = Lt(n.hoverBorderWidth, n.borderWidth);
    },
    _getRingWeightOffset: function _getRingWeightOffset(t) {
      for (var e = 0, n = 0; n < t; ++n) {
        this.chart.isDatasetVisible(n) && (e += this._getRingWeight(n));
      }

      return e;
    },
    _getRingWeight: function _getRingWeight(t) {
      return Math.max(Lt(this.chart.data.datasets[t].weight, 1), 0);
    },
    _getVisibleDatasetWeightTotal: function _getVisibleDatasetWeightTotal() {
      return this._getRingWeightOffset(this.chart.data.datasets.length);
    }
  });
  N._set("horizontalBar", {
    hover: {
      mode: "index",
      axis: "y"
    },
    scales: {
      xAxes: [{
        type: "linear",
        position: "bottom"
      }],
      yAxes: [{
        type: "category",
        position: "left",
        offset: !0,
        gridLines: {
          offsetGridLines: !0
        }
      }]
    },
    elements: {
      rectangle: {
        borderSkipped: "left"
      }
    },
    tooltips: {
      mode: "index",
      axis: "y"
    }
  }), N._set("global", {
    datasets: {
      horizontalBar: {
        categoryPercentage: .8,
        barPercentage: .9
      }
    }
  });
  var Et = Tt.extend({
    _getValueScaleId: function _getValueScaleId() {
      return this.getMeta().xAxisID;
    },
    _getIndexScaleId: function _getIndexScaleId() {
      return this.getMeta().yAxisID;
    }
  }),
      Wt = H.valueOrDefault,
      Vt = H.options.resolve,
      Ht = H.canvas._isPointInArea;

  function jt(t, e) {
    var n = t && t.options.ticks || {},
        i = n.reverse,
        a = void 0 === n.min ? e : 0,
        r = void 0 === n.max ? e : 0;
    return {
      start: i ? r : a,
      end: i ? a : r
    };
  }

  function qt(t, e, n) {
    var i = n / 2,
        a = jt(t, i),
        r = jt(e, i);
    return {
      top: r.end,
      right: a.end,
      bottom: r.start,
      left: a.start
    };
  }

  function Ut(t) {
    var e, n, i, a;
    return H.isObject(t) ? (e = t.top, n = t.right, i = t.bottom, a = t.left) : e = n = i = a = t, {
      top: e,
      right: n,
      bottom: i,
      left: a
    };
  }

  N._set("line", {
    showLines: !0,
    spanGaps: !1,
    hover: {
      mode: "label"
    },
    scales: {
      xAxes: [{
        type: "category",
        id: "x-axis-0"
      }],
      yAxes: [{
        type: "linear",
        id: "y-axis-0"
      }]
    }
  });

  var Yt = it.extend({
    datasetElementType: kt.Line,
    dataElementType: kt.Point,
    _datasetElementOptions: ["backgroundColor", "borderCapStyle", "borderColor", "borderDash", "borderDashOffset", "borderJoinStyle", "borderWidth", "cubicInterpolationMode", "fill"],
    _dataElementOptions: {
      backgroundColor: "pointBackgroundColor",
      borderColor: "pointBorderColor",
      borderWidth: "pointBorderWidth",
      hitRadius: "pointHitRadius",
      hoverBackgroundColor: "pointHoverBackgroundColor",
      hoverBorderColor: "pointHoverBorderColor",
      hoverBorderWidth: "pointHoverBorderWidth",
      hoverRadius: "pointHoverRadius",
      pointStyle: "pointStyle",
      radius: "pointRadius",
      rotation: "pointRotation"
    },
    update: function update(t) {
      var e,
          n,
          i = this,
          a = i.getMeta(),
          r = a.dataset,
          o = a.data || [],
          s = i.chart.options,
          l = i._config,
          u = i._showLine = Wt(l.showLine, s.showLines);

      for (i._xScale = i.getScaleForId(a.xAxisID), i._yScale = i.getScaleForId(a.yAxisID), u && (void 0 !== l.tension && void 0 === l.lineTension && (l.lineTension = l.tension), r._scale = i._yScale, r._datasetIndex = i.index, r._children = o, r._model = i._resolveDatasetElementOptions(r), r.pivot()), e = 0, n = o.length; e < n; ++e) {
        i.updateElement(o[e], e, t);
      }

      for (u && 0 !== r._model.tension && i.updateBezierControlPoints(), e = 0, n = o.length; e < n; ++e) {
        o[e].pivot();
      }
    },
    updateElement: function updateElement(t, e, n) {
      var i,
          a,
          r = this,
          o = r.getMeta(),
          s = t.custom || {},
          l = r.getDataset(),
          u = r.index,
          d = l.data[e],
          h = r._xScale,
          c = r._yScale,
          f = o.dataset._model,
          g = r._resolveDataElementOptions(t, e);

      i = h.getPixelForValue("object" == _typeof(d) ? d : NaN, e, u), a = n ? c.getBasePixel() : r.calculatePointY(d, e, u), t._xScale = h, t._yScale = c, t._options = g, t._datasetIndex = u, t._index = e, t._model = {
        x: i,
        y: a,
        skip: s.skip || isNaN(i) || isNaN(a),
        radius: g.radius,
        pointStyle: g.pointStyle,
        rotation: g.rotation,
        backgroundColor: g.backgroundColor,
        borderColor: g.borderColor,
        borderWidth: g.borderWidth,
        tension: Wt(s.tension, f ? f.tension : 0),
        steppedLine: !!f && f.steppedLine,
        hitRadius: g.hitRadius
      };
    },
    _resolveDatasetElementOptions: function _resolveDatasetElementOptions(t) {
      var e = this,
          n = e._config,
          i = t.custom || {},
          a = e.chart.options,
          r = a.elements.line,
          o = it.prototype._resolveDatasetElementOptions.apply(e, arguments);

      return o.spanGaps = Wt(n.spanGaps, a.spanGaps), o.tension = Wt(n.lineTension, r.tension), o.steppedLine = Vt([i.steppedLine, n.steppedLine, r.stepped]), o.clip = Ut(Wt(n.clip, qt(e._xScale, e._yScale, o.borderWidth))), o;
    },
    calculatePointY: function calculatePointY(t, e, n) {
      var i,
          a,
          r,
          o,
          s,
          l,
          u,
          d = this.chart,
          h = this._yScale,
          c = 0,
          f = 0;

      if (h.options.stacked) {
        for (s = +h.getRightValue(t), u = (l = d._getSortedVisibleDatasetMetas()).length, i = 0; i < u && (r = l[i]).index !== n; ++i) {
          a = d.data.datasets[r.index], "line" === r.type && r.yAxisID === h.id && ((o = +h.getRightValue(a.data[e])) < 0 ? f += o || 0 : c += o || 0);
        }

        return s < 0 ? h.getPixelForValue(f + s) : h.getPixelForValue(c + s);
      }

      return h.getPixelForValue(t);
    },
    updateBezierControlPoints: function updateBezierControlPoints() {
      var t,
          e,
          n,
          i,
          a = this.chart,
          r = this.getMeta(),
          o = r.dataset._model,
          s = a.chartArea,
          l = r.data || [];

      function u(t, e, n) {
        return Math.max(Math.min(t, n), e);
      }

      if (o.spanGaps && (l = l.filter(function (t) {
        return !t._model.skip;
      })), "monotone" === o.cubicInterpolationMode) H.splineCurveMonotone(l);else for (t = 0, e = l.length; t < e; ++t) {
        n = l[t]._model, i = H.splineCurve(H.previousItem(l, t)._model, n, H.nextItem(l, t)._model, o.tension), n.controlPointPreviousX = i.previous.x, n.controlPointPreviousY = i.previous.y, n.controlPointNextX = i.next.x, n.controlPointNextY = i.next.y;
      }
      if (a.options.elements.line.capBezierPoints) for (t = 0, e = l.length; t < e; ++t) {
        n = l[t]._model, Ht(n, s) && (t > 0 && Ht(l[t - 1]._model, s) && (n.controlPointPreviousX = u(n.controlPointPreviousX, s.left, s.right), n.controlPointPreviousY = u(n.controlPointPreviousY, s.top, s.bottom)), t < l.length - 1 && Ht(l[t + 1]._model, s) && (n.controlPointNextX = u(n.controlPointNextX, s.left, s.right), n.controlPointNextY = u(n.controlPointNextY, s.top, s.bottom)));
      }
    },
    draw: function draw() {
      var t,
          e = this.chart,
          n = this.getMeta(),
          i = n.data || [],
          a = e.chartArea,
          r = e.canvas,
          o = 0,
          s = i.length;

      for (this._showLine && (t = n.dataset._model.clip, H.canvas.clipArea(e.ctx, {
        left: !1 === t.left ? 0 : a.left - t.left,
        right: !1 === t.right ? r.width : a.right + t.right,
        top: !1 === t.top ? 0 : a.top - t.top,
        bottom: !1 === t.bottom ? r.height : a.bottom + t.bottom
      }), n.dataset.draw(), H.canvas.unclipArea(e.ctx)); o < s; ++o) {
        i[o].draw(a);
      }
    },
    setHoverStyle: function setHoverStyle(t) {
      var e = t._model,
          n = t._options,
          i = H.getHoverColor;
      t.$previousStyle = {
        backgroundColor: e.backgroundColor,
        borderColor: e.borderColor,
        borderWidth: e.borderWidth,
        radius: e.radius
      }, e.backgroundColor = Wt(n.hoverBackgroundColor, i(n.backgroundColor)), e.borderColor = Wt(n.hoverBorderColor, i(n.borderColor)), e.borderWidth = Wt(n.hoverBorderWidth, n.borderWidth), e.radius = Wt(n.hoverRadius, n.radius);
    }
  }),
      Gt = H.options.resolve;

  N._set("polarArea", {
    scale: {
      type: "radialLinear",
      angleLines: {
        display: !1
      },
      gridLines: {
        circular: !0
      },
      pointLabels: {
        display: !1
      },
      ticks: {
        beginAtZero: !0
      }
    },
    animation: {
      animateRotate: !0,
      animateScale: !0
    },
    startAngle: -.5 * Math.PI,
    legendCallback: function legendCallback(t) {
      var e,
          n,
          i,
          a = document.createElement("ul"),
          r = t.data,
          o = r.datasets,
          s = r.labels;
      if (a.setAttribute("class", t.id + "-legend"), o.length) for (e = 0, n = o[0].data.length; e < n; ++e) {
        (i = a.appendChild(document.createElement("li"))).appendChild(document.createElement("span")).style.backgroundColor = o[0].backgroundColor[e], s[e] && i.appendChild(document.createTextNode(s[e]));
      }
      return a.outerHTML;
    },
    legend: {
      labels: {
        generateLabels: function generateLabels(t) {
          var e = t.data;
          return e.labels.length && e.datasets.length ? e.labels.map(function (n, i) {
            var a = t.getDatasetMeta(0),
                r = a.controller.getStyle(i);
            return {
              text: n,
              fillStyle: r.backgroundColor,
              strokeStyle: r.borderColor,
              lineWidth: r.borderWidth,
              hidden: isNaN(e.datasets[0].data[i]) || a.data[i].hidden,
              index: i
            };
          }) : [];
        }
      },
      onClick: function onClick(t, e) {
        var n,
            i,
            a,
            r = e.index,
            o = this.chart;

        for (n = 0, i = (o.data.datasets || []).length; n < i; ++n) {
          (a = o.getDatasetMeta(n)).data[r].hidden = !a.data[r].hidden;
        }

        o.update();
      }
    },
    tooltips: {
      callbacks: {
        title: function title() {
          return "";
        },
        label: function label(t, e) {
          return e.labels[t.index] + ": " + t.yLabel;
        }
      }
    }
  });

  var Xt = it.extend({
    dataElementType: kt.Arc,
    linkScales: H.noop,
    _dataElementOptions: ["backgroundColor", "borderColor", "borderWidth", "borderAlign", "hoverBackgroundColor", "hoverBorderColor", "hoverBorderWidth"],
    _getIndexScaleId: function _getIndexScaleId() {
      return this.chart.scale.id;
    },
    _getValueScaleId: function _getValueScaleId() {
      return this.chart.scale.id;
    },
    update: function update(t) {
      var e,
          n,
          i,
          a = this,
          r = a.getDataset(),
          o = a.getMeta(),
          s = a.chart.options.startAngle || 0,
          l = a._starts = [],
          u = a._angles = [],
          d = o.data;

      for (a._updateRadius(), o.count = a.countVisibleElements(), e = 0, n = r.data.length; e < n; e++) {
        l[e] = s, i = a._computeAngle(e), u[e] = i, s += i;
      }

      for (e = 0, n = d.length; e < n; ++e) {
        d[e]._options = a._resolveDataElementOptions(d[e], e), a.updateElement(d[e], e, t);
      }
    },
    _updateRadius: function _updateRadius() {
      var t = this,
          e = t.chart,
          n = e.chartArea,
          i = e.options,
          a = Math.min(n.right - n.left, n.bottom - n.top);
      e.outerRadius = Math.max(a / 2, 0), e.innerRadius = Math.max(i.cutoutPercentage ? e.outerRadius / 100 * i.cutoutPercentage : 1, 0), e.radiusLength = (e.outerRadius - e.innerRadius) / e.getVisibleDatasetCount(), t.outerRadius = e.outerRadius - e.radiusLength * t.index, t.innerRadius = t.outerRadius - e.radiusLength;
    },
    updateElement: function updateElement(t, e, n) {
      var i = this,
          a = i.chart,
          r = i.getDataset(),
          o = a.options,
          s = o.animation,
          l = a.scale,
          u = a.data.labels,
          d = l.xCenter,
          h = l.yCenter,
          c = o.startAngle,
          f = t.hidden ? 0 : l.getDistanceFromCenterForValue(r.data[e]),
          g = i._starts[e],
          p = g + (t.hidden ? 0 : i._angles[e]),
          m = s.animateScale ? 0 : l.getDistanceFromCenterForValue(r.data[e]),
          v = t._options || {};
      H.extend(t, {
        _datasetIndex: i.index,
        _index: e,
        _scale: l,
        _model: {
          backgroundColor: v.backgroundColor,
          borderColor: v.borderColor,
          borderWidth: v.borderWidth,
          borderAlign: v.borderAlign,
          x: d,
          y: h,
          innerRadius: 0,
          outerRadius: n ? m : f,
          startAngle: n && s.animateRotate ? c : g,
          endAngle: n && s.animateRotate ? c : p,
          label: H.valueAtIndexOrDefault(u, e, u[e])
        }
      }), t.pivot();
    },
    countVisibleElements: function countVisibleElements() {
      var t = this.getDataset(),
          e = this.getMeta(),
          n = 0;
      return H.each(e.data, function (e, i) {
        isNaN(t.data[i]) || e.hidden || n++;
      }), n;
    },
    setHoverStyle: function setHoverStyle(t) {
      var e = t._model,
          n = t._options,
          i = H.getHoverColor,
          a = H.valueOrDefault;
      t.$previousStyle = {
        backgroundColor: e.backgroundColor,
        borderColor: e.borderColor,
        borderWidth: e.borderWidth
      }, e.backgroundColor = a(n.hoverBackgroundColor, i(n.backgroundColor)), e.borderColor = a(n.hoverBorderColor, i(n.borderColor)), e.borderWidth = a(n.hoverBorderWidth, n.borderWidth);
    },
    _computeAngle: function _computeAngle(t) {
      var e = this,
          n = this.getMeta().count,
          i = e.getDataset(),
          a = e.getMeta();
      if (isNaN(i.data[t]) || a.data[t].hidden) return 0;
      var r = {
        chart: e.chart,
        dataIndex: t,
        dataset: i,
        datasetIndex: e.index
      };
      return Gt([e.chart.options.elements.arc.angle, 2 * Math.PI / n], r, t);
    }
  });
  N._set("pie", H.clone(N.doughnut)), N._set("pie", {
    cutoutPercentage: 0
  });
  var Kt = Bt,
      Zt = H.valueOrDefault;

  N._set("radar", {
    spanGaps: !1,
    scale: {
      type: "radialLinear"
    },
    elements: {
      line: {
        fill: "start",
        tension: 0
      }
    }
  });

  var $t = it.extend({
    datasetElementType: kt.Line,
    dataElementType: kt.Point,
    linkScales: H.noop,
    _datasetElementOptions: ["backgroundColor", "borderWidth", "borderColor", "borderCapStyle", "borderDash", "borderDashOffset", "borderJoinStyle", "fill"],
    _dataElementOptions: {
      backgroundColor: "pointBackgroundColor",
      borderColor: "pointBorderColor",
      borderWidth: "pointBorderWidth",
      hitRadius: "pointHitRadius",
      hoverBackgroundColor: "pointHoverBackgroundColor",
      hoverBorderColor: "pointHoverBorderColor",
      hoverBorderWidth: "pointHoverBorderWidth",
      hoverRadius: "pointHoverRadius",
      pointStyle: "pointStyle",
      radius: "pointRadius",
      rotation: "pointRotation"
    },
    _getIndexScaleId: function _getIndexScaleId() {
      return this.chart.scale.id;
    },
    _getValueScaleId: function _getValueScaleId() {
      return this.chart.scale.id;
    },
    update: function update(t) {
      var e,
          n,
          i = this,
          a = i.getMeta(),
          r = a.dataset,
          o = a.data || [],
          s = i.chart.scale,
          l = i._config;

      for (void 0 !== l.tension && void 0 === l.lineTension && (l.lineTension = l.tension), r._scale = s, r._datasetIndex = i.index, r._children = o, r._loop = !0, r._model = i._resolveDatasetElementOptions(r), r.pivot(), e = 0, n = o.length; e < n; ++e) {
        i.updateElement(o[e], e, t);
      }

      for (i.updateBezierControlPoints(), e = 0, n = o.length; e < n; ++e) {
        o[e].pivot();
      }
    },
    updateElement: function updateElement(t, e, n) {
      var i = this,
          a = t.custom || {},
          r = i.getDataset(),
          o = i.chart.scale,
          s = o.getPointPositionForValue(e, r.data[e]),
          l = i._resolveDataElementOptions(t, e),
          u = i.getMeta().dataset._model,
          d = n ? o.xCenter : s.x,
          h = n ? o.yCenter : s.y;

      t._scale = o, t._options = l, t._datasetIndex = i.index, t._index = e, t._model = {
        x: d,
        y: h,
        skip: a.skip || isNaN(d) || isNaN(h),
        radius: l.radius,
        pointStyle: l.pointStyle,
        rotation: l.rotation,
        backgroundColor: l.backgroundColor,
        borderColor: l.borderColor,
        borderWidth: l.borderWidth,
        tension: Zt(a.tension, u ? u.tension : 0),
        hitRadius: l.hitRadius
      };
    },
    _resolveDatasetElementOptions: function _resolveDatasetElementOptions() {
      var t = this,
          e = t._config,
          n = t.chart.options,
          i = it.prototype._resolveDatasetElementOptions.apply(t, arguments);

      return i.spanGaps = Zt(e.spanGaps, n.spanGaps), i.tension = Zt(e.lineTension, n.elements.line.tension), i;
    },
    updateBezierControlPoints: function updateBezierControlPoints() {
      var t,
          e,
          n,
          i,
          a = this.getMeta(),
          r = this.chart.chartArea,
          o = a.data || [];

      function s(t, e, n) {
        return Math.max(Math.min(t, n), e);
      }

      for (a.dataset._model.spanGaps && (o = o.filter(function (t) {
        return !t._model.skip;
      })), t = 0, e = o.length; t < e; ++t) {
        n = o[t]._model, i = H.splineCurve(H.previousItem(o, t, !0)._model, n, H.nextItem(o, t, !0)._model, n.tension), n.controlPointPreviousX = s(i.previous.x, r.left, r.right), n.controlPointPreviousY = s(i.previous.y, r.top, r.bottom), n.controlPointNextX = s(i.next.x, r.left, r.right), n.controlPointNextY = s(i.next.y, r.top, r.bottom);
      }
    },
    setHoverStyle: function setHoverStyle(t) {
      var e = t._model,
          n = t._options,
          i = H.getHoverColor;
      t.$previousStyle = {
        backgroundColor: e.backgroundColor,
        borderColor: e.borderColor,
        borderWidth: e.borderWidth,
        radius: e.radius
      }, e.backgroundColor = Zt(n.hoverBackgroundColor, i(n.backgroundColor)), e.borderColor = Zt(n.hoverBorderColor, i(n.borderColor)), e.borderWidth = Zt(n.hoverBorderWidth, n.borderWidth), e.radius = Zt(n.hoverRadius, n.radius);
    }
  });
  N._set("scatter", {
    hover: {
      mode: "single"
    },
    scales: {
      xAxes: [{
        id: "x-axis-1",
        type: "linear",
        position: "bottom"
      }],
      yAxes: [{
        id: "y-axis-1",
        type: "linear",
        position: "left"
      }]
    },
    tooltips: {
      callbacks: {
        title: function title() {
          return "";
        },
        label: function label(t) {
          return "(" + t.xLabel + ", " + t.yLabel + ")";
        }
      }
    }
  }), N._set("global", {
    datasets: {
      scatter: {
        showLine: !1
      }
    }
  });
  var Jt = {
    bar: Tt,
    bubble: Ot,
    doughnut: Bt,
    horizontalBar: Et,
    line: Yt,
    polarArea: Xt,
    pie: Kt,
    radar: $t,
    scatter: Yt
  };

  function Qt(t, e) {
    return t["native"] ? {
      x: t.x,
      y: t.y
    } : H.getRelativePosition(t, e);
  }

  function te(t, e) {
    var n,
        i,
        a,
        r,
        o,
        s,
        l = t._getSortedVisibleDatasetMetas();

    for (i = 0, r = l.length; i < r; ++i) {
      for (a = 0, o = (n = l[i].data).length; a < o; ++a) {
        (s = n[a])._view.skip || e(s);
      }
    }
  }

  function ee(t, e) {
    var n = [];
    return te(t, function (t) {
      t.inRange(e.x, e.y) && n.push(t);
    }), n;
  }

  function ne(t, e, n, i) {
    var a = Number.POSITIVE_INFINITY,
        r = [];
    return te(t, function (t) {
      if (!n || t.inRange(e.x, e.y)) {
        var o = t.getCenterPoint(),
            s = i(e, o);
        s < a ? (r = [t], a = s) : s === a && r.push(t);
      }
    }), r;
  }

  function ie(t) {
    var e = -1 !== t.indexOf("x"),
        n = -1 !== t.indexOf("y");
    return function (t, i) {
      var a = e ? Math.abs(t.x - i.x) : 0,
          r = n ? Math.abs(t.y - i.y) : 0;
      return Math.sqrt(Math.pow(a, 2) + Math.pow(r, 2));
    };
  }

  function ae(t, e, n) {
    var i = Qt(e, t);
    n.axis = n.axis || "x";
    var a = ie(n.axis),
        r = n.intersect ? ee(t, i) : ne(t, i, !1, a),
        o = [];
    return r.length ? (t._getSortedVisibleDatasetMetas().forEach(function (t) {
      var e = t.data[r[0]._index];
      e && !e._view.skip && o.push(e);
    }), o) : [];
  }

  var re = {
    modes: {
      single: function single(t, e) {
        var n = Qt(e, t),
            i = [];
        return te(t, function (t) {
          if (t.inRange(n.x, n.y)) return i.push(t), i;
        }), i.slice(0, 1);
      },
      label: ae,
      index: ae,
      dataset: function dataset(t, e, n) {
        var i = Qt(e, t);
        n.axis = n.axis || "xy";
        var a = ie(n.axis),
            r = n.intersect ? ee(t, i) : ne(t, i, !1, a);
        return r.length > 0 && (r = t.getDatasetMeta(r[0]._datasetIndex).data), r;
      },
      "x-axis": function xAxis(t, e) {
        return ae(t, e, {
          intersect: !1
        });
      },
      point: function point(t, e) {
        return ee(t, Qt(e, t));
      },
      nearest: function nearest(t, e, n) {
        var i = Qt(e, t);
        n.axis = n.axis || "xy";
        var a = ie(n.axis);
        return ne(t, i, n.intersect, a);
      },
      x: function x(t, e, n) {
        var i = Qt(e, t),
            a = [],
            r = !1;
        return te(t, function (t) {
          t.inXRange(i.x) && a.push(t), t.inRange(i.x, i.y) && (r = !0);
        }), n.intersect && !r && (a = []), a;
      },
      y: function y(t, e, n) {
        var i = Qt(e, t),
            a = [],
            r = !1;
        return te(t, function (t) {
          t.inYRange(i.y) && a.push(t), t.inRange(i.x, i.y) && (r = !0);
        }), n.intersect && !r && (a = []), a;
      }
    }
  },
      oe = H.extend;

  function se(t, e) {
    return H.where(t, function (t) {
      return t.pos === e;
    });
  }

  function le(t, e) {
    return t.sort(function (t, n) {
      var i = e ? n : t,
          a = e ? t : n;
      return i.weight === a.weight ? i.index - a.index : i.weight - a.weight;
    });
  }

  function ue(t, e, n, i) {
    return Math.max(t[n], e[n]) + Math.max(t[i], e[i]);
  }

  function de(t, e, n) {
    var i,
        a,
        r = n.box,
        o = t.maxPadding;

    if (n.size && (t[n.pos] -= n.size), n.size = n.horizontal ? r.height : r.width, t[n.pos] += n.size, r.getPadding) {
      var s = r.getPadding();
      o.top = Math.max(o.top, s.top), o.left = Math.max(o.left, s.left), o.bottom = Math.max(o.bottom, s.bottom), o.right = Math.max(o.right, s.right);
    }

    if (i = e.outerWidth - ue(o, t, "left", "right"), a = e.outerHeight - ue(o, t, "top", "bottom"), i !== t.w || a !== t.h) {
      t.w = i, t.h = a;
      var l = n.horizontal ? [i, t.w] : [a, t.h];
      return !(l[0] === l[1] || isNaN(l[0]) && isNaN(l[1]));
    }
  }

  function he(t, e) {
    var n = e.maxPadding;

    function i(t) {
      var i = {
        left: 0,
        top: 0,
        right: 0,
        bottom: 0
      };
      return t.forEach(function (t) {
        i[t] = Math.max(e[t], n[t]);
      }), i;
    }

    return i(t ? ["left", "right"] : ["top", "bottom"]);
  }

  function ce(t, e, n) {
    var i,
        a,
        r,
        o,
        s,
        l,
        u = [];

    for (i = 0, a = t.length; i < a; ++i) {
      (o = (r = t[i]).box).update(r.width || e.w, r.height || e.h, he(r.horizontal, e)), de(e, n, r) && (l = !0, u.length && (s = !0)), o.fullWidth || u.push(r);
    }

    return s && ce(u, e, n) || l;
  }

  function fe(t, e, n) {
    var i,
        a,
        r,
        o,
        s = n.padding,
        l = e.x,
        u = e.y;

    for (i = 0, a = t.length; i < a; ++i) {
      o = (r = t[i]).box, r.horizontal ? (o.left = o.fullWidth ? s.left : e.left, o.right = o.fullWidth ? n.outerWidth - s.right : e.left + e.w, o.top = u, o.bottom = u + o.height, o.width = o.right - o.left, u = o.bottom) : (o.left = l, o.right = l + o.width, o.top = e.top, o.bottom = e.top + e.h, o.height = o.bottom - o.top, l = o.right);
    }

    e.x = l, e.y = u;
  }

  N._set("global", {
    layout: {
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      }
    }
  });

  var ge,
      pe = {
    defaults: {},
    addBox: function addBox(t, e) {
      t.boxes || (t.boxes = []), e.fullWidth = e.fullWidth || !1, e.position = e.position || "top", e.weight = e.weight || 0, e._layers = e._layers || function () {
        return [{
          z: 0,
          draw: function draw() {
            e.draw.apply(e, arguments);
          }
        }];
      }, t.boxes.push(e);
    },
    removeBox: function removeBox(t, e) {
      var n = t.boxes ? t.boxes.indexOf(e) : -1;
      -1 !== n && t.boxes.splice(n, 1);
    },
    configure: function configure(t, e, n) {
      for (var i, a = ["fullWidth", "position", "weight"], r = a.length, o = 0; o < r; ++o) {
        i = a[o], n.hasOwnProperty(i) && (e[i] = n[i]);
      }
    },
    update: function update(t, e, n) {
      if (t) {
        var i = t.options.layout || {},
            a = H.options.toPadding(i.padding),
            r = e - a.width,
            o = n - a.height,
            s = function (t) {
          var e = function (t) {
            var e,
                n,
                i,
                a = [];

            for (e = 0, n = (t || []).length; e < n; ++e) {
              i = t[e], a.push({
                index: e,
                box: i,
                pos: i.position,
                horizontal: i.isHorizontal(),
                weight: i.weight
              });
            }

            return a;
          }(t),
              n = le(se(e, "left"), !0),
              i = le(se(e, "right")),
              a = le(se(e, "top"), !0),
              r = le(se(e, "bottom"));

          return {
            leftAndTop: n.concat(a),
            rightAndBottom: i.concat(r),
            chartArea: se(e, "chartArea"),
            vertical: n.concat(i),
            horizontal: a.concat(r)
          };
        }(t.boxes),
            l = s.vertical,
            u = s.horizontal,
            d = Object.freeze({
          outerWidth: e,
          outerHeight: n,
          padding: a,
          availableWidth: r,
          vBoxMaxWidth: r / 2 / l.length,
          hBoxMaxHeight: o / 2
        }),
            h = oe({
          maxPadding: oe({}, a),
          w: r,
          h: o,
          x: a.left,
          y: a.top
        }, a);

        !function (t, e) {
          var n, i, a;

          for (n = 0, i = t.length; n < i; ++n) {
            (a = t[n]).width = a.horizontal ? a.box.fullWidth && e.availableWidth : e.vBoxMaxWidth, a.height = a.horizontal && e.hBoxMaxHeight;
          }
        }(l.concat(u), d), ce(l, h, d), ce(u, h, d) && ce(l, h, d), function (t) {
          var e = t.maxPadding;

          function n(n) {
            var i = Math.max(e[n] - t[n], 0);
            return t[n] += i, i;
          }

          t.y += n("top"), t.x += n("left"), n("right"), n("bottom");
        }(h), fe(s.leftAndTop, h, d), h.x += h.w, h.y += h.h, fe(s.rightAndBottom, h, d), t.chartArea = {
          left: h.left,
          top: h.top,
          right: h.left + h.w,
          bottom: h.top + h.h
        }, H.each(s.chartArea, function (e) {
          var n = e.box;
          oe(n, t.chartArea), n.update(h.w, h.h);
        });
      }
    }
  },
      me = (ge = Object.freeze({
    __proto__: null,
    "default": "@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}"
  })) && ge["default"] || ge,
      ve = "$chartjs",
      be = "chartjs-size-monitor",
      xe = "chartjs-render-monitor",
      ye = "chartjs-render-animation",
      _e = ["animationstart", "webkitAnimationStart"],
      ke = {
    touchstart: "mousedown",
    touchmove: "mousemove",
    touchend: "mouseup",
    pointerenter: "mouseenter",
    pointerdown: "mousedown",
    pointermove: "mousemove",
    pointerup: "mouseup",
    pointerleave: "mouseout",
    pointerout: "mouseout"
  };

  function we(t, e) {
    var n = H.getStyle(t, e),
        i = n && n.match(/^(\d+)(\.\d+)?px$/);
    return i ? Number(i[1]) : void 0;
  }

  var Me = !!function () {
    var t = !1;

    try {
      var e = Object.defineProperty({}, "passive", {
        get: function get() {
          t = !0;
        }
      });
      window.addEventListener("e", null, e);
    } catch (t) {}

    return t;
  }() && {
    passive: !0
  };

  function Se(t, e, n) {
    t.addEventListener(e, n, Me);
  }

  function Ce(t, e, n) {
    t.removeEventListener(e, n, Me);
  }

  function Pe(t, e, n, i, a) {
    return {
      type: t,
      chart: e,
      "native": a || null,
      x: void 0 !== n ? n : null,
      y: void 0 !== i ? i : null
    };
  }

  function Ae(t) {
    var e = document.createElement("div");
    return e.className = t || "", e;
  }

  function De(t, e, n) {
    var i,
        a,
        r,
        o,
        s = t[ve] || (t[ve] = {}),
        l = s.resizer = function (t) {
      var e = Ae(be),
          n = Ae(be + "-expand"),
          i = Ae(be + "-shrink");
      n.appendChild(Ae()), i.appendChild(Ae()), e.appendChild(n), e.appendChild(i), e._reset = function () {
        n.scrollLeft = 1e6, n.scrollTop = 1e6, i.scrollLeft = 1e6, i.scrollTop = 1e6;
      };

      var a = function a() {
        e._reset(), t();
      };

      return Se(n, "scroll", a.bind(n, "expand")), Se(i, "scroll", a.bind(i, "shrink")), e;
    }((i = function i() {
      if (s.resizer) {
        var i = n.options.maintainAspectRatio && t.parentNode,
            a = i ? i.clientWidth : 0;
        e(Pe("resize", n)), i && i.clientWidth < a && n.canvas && e(Pe("resize", n));
      }
    }, r = !1, o = [], function () {
      o = Array.prototype.slice.call(arguments), a = a || this, r || (r = !0, H.requestAnimFrame.call(window, function () {
        r = !1, i.apply(a, o);
      }));
    }));

    !function (t, e) {
      var n = t[ve] || (t[ve] = {}),
          i = n.renderProxy = function (t) {
        t.animationName === ye && e();
      };

      H.each(_e, function (e) {
        Se(t, e, i);
      }), n.reflow = !!t.offsetParent, t.classList.add(xe);
    }(t, function () {
      if (s.resizer) {
        var e = t.parentNode;
        e && e !== l.parentNode && e.insertBefore(l, e.firstChild), l._reset();
      }
    });
  }

  function Te(t) {
    var e = t[ve] || {},
        n = e.resizer;
    delete e.resizer, function (t) {
      var e = t[ve] || {},
          n = e.renderProxy;
      n && (H.each(_e, function (e) {
        Ce(t, e, n);
      }), delete e.renderProxy), t.classList.remove(xe);
    }(t), n && n.parentNode && n.parentNode.removeChild(n);
  }

  var Ie = {
    disableCSSInjection: !1,
    _enabled: "undefined" != typeof window && "undefined" != typeof document,
    _ensureLoaded: function _ensureLoaded(t) {
      if (!this.disableCSSInjection) {
        var e = t.getRootNode ? t.getRootNode() : document;
        !function (t, e) {
          var n = t[ve] || (t[ve] = {});

          if (!n.containsStyles) {
            n.containsStyles = !0, e = "/* Chart.js */\n" + e;
            var i = document.createElement("style");
            i.setAttribute("type", "text/css"), i.appendChild(document.createTextNode(e)), t.appendChild(i);
          }
        }(e.host ? e : document.head, me);
      }
    },
    acquireContext: function acquireContext(t, e) {
      "string" == typeof t ? t = document.getElementById(t) : t.length && (t = t[0]), t && t.canvas && (t = t.canvas);
      var n = t && t.getContext && t.getContext("2d");
      return n && n.canvas === t ? (this._ensureLoaded(t), function (t, e) {
        var n = t.style,
            i = t.getAttribute("height"),
            a = t.getAttribute("width");

        if (t[ve] = {
          initial: {
            height: i,
            width: a,
            style: {
              display: n.display,
              height: n.height,
              width: n.width
            }
          }
        }, n.display = n.display || "block", null === a || "" === a) {
          var r = we(t, "width");
          void 0 !== r && (t.width = r);
        }

        if (null === i || "" === i) if ("" === t.style.height) t.height = t.width / (e.options.aspectRatio || 2);else {
          var o = we(t, "height");
          void 0 !== r && (t.height = o);
        }
      }(t, e), n) : null;
    },
    releaseContext: function releaseContext(t) {
      var e = t.canvas;

      if (e[ve]) {
        var n = e[ve].initial;
        ["height", "width"].forEach(function (t) {
          var i = n[t];
          H.isNullOrUndef(i) ? e.removeAttribute(t) : e.setAttribute(t, i);
        }), H.each(n.style || {}, function (t, n) {
          e.style[n] = t;
        }), e.width = e.width, delete e[ve];
      }
    },
    addEventListener: function addEventListener(t, e, n) {
      var i = t.canvas;

      if ("resize" !== e) {
        var a = n[ve] || (n[ve] = {});
        Se(i, e, (a.proxies || (a.proxies = {}))[t.id + "_" + e] = function (e) {
          n(function (t, e) {
            var n = ke[t.type] || t.type,
                i = H.getRelativePosition(t, e);
            return Pe(n, e, i.x, i.y, t);
          }(e, t));
        });
      } else De(i, n, t);
    },
    removeEventListener: function removeEventListener(t, e, n) {
      var i = t.canvas;

      if ("resize" !== e) {
        var a = ((n[ve] || {}).proxies || {})[t.id + "_" + e];
        a && Ce(i, e, a);
      } else Te(i);
    }
  };
  H.addEvent = Se, H.removeEvent = Ce;
  var Fe = Ie._enabled ? Ie : {
    acquireContext: function acquireContext(t) {
      return t && t.canvas && (t = t.canvas), t && t.getContext("2d") || null;
    }
  },
      Oe = H.extend({
    initialize: function initialize() {},
    acquireContext: function acquireContext() {},
    releaseContext: function releaseContext() {},
    addEventListener: function addEventListener() {},
    removeEventListener: function removeEventListener() {}
  }, Fe);

  N._set("global", {
    plugins: {}
  });

  var Le = {
    _plugins: [],
    _cacheId: 0,
    register: function register(t) {
      var e = this._plugins;
      [].concat(t).forEach(function (t) {
        -1 === e.indexOf(t) && e.push(t);
      }), this._cacheId++;
    },
    unregister: function unregister(t) {
      var e = this._plugins;
      [].concat(t).forEach(function (t) {
        var n = e.indexOf(t);
        -1 !== n && e.splice(n, 1);
      }), this._cacheId++;
    },
    clear: function clear() {
      this._plugins = [], this._cacheId++;
    },
    count: function count() {
      return this._plugins.length;
    },
    getAll: function getAll() {
      return this._plugins;
    },
    notify: function notify(t, e, n) {
      var i,
          a,
          r,
          o,
          s,
          l = this.descriptors(t),
          u = l.length;

      for (i = 0; i < u; ++i) {
        if ("function" == typeof (s = (r = (a = l[i]).plugin)[e]) && ((o = [t].concat(n || [])).push(a.options), !1 === s.apply(r, o))) return !1;
      }

      return !0;
    },
    descriptors: function descriptors(t) {
      var e = t.$plugins || (t.$plugins = {});
      if (e.id === this._cacheId) return e.descriptors;
      var n = [],
          i = [],
          a = t && t.config || {},
          r = a.options && a.options.plugins || {};
      return this._plugins.concat(a.plugins || []).forEach(function (t) {
        if (-1 === n.indexOf(t)) {
          var e = t.id,
              a = r[e];
          !1 !== a && (!0 === a && (a = H.clone(N.global.plugins[e])), n.push(t), i.push({
            plugin: t,
            options: a || {}
          }));
        }
      }), e.descriptors = i, e.id = this._cacheId, i;
    },
    _invalidate: function _invalidate(t) {
      delete t.$plugins;
    }
  },
      Re = {
    constructors: {},
    defaults: {},
    registerScaleType: function registerScaleType(t, e, n) {
      this.constructors[t] = e, this.defaults[t] = H.clone(n);
    },
    getScaleConstructor: function getScaleConstructor(t) {
      return this.constructors.hasOwnProperty(t) ? this.constructors[t] : void 0;
    },
    getScaleDefaults: function getScaleDefaults(t) {
      return this.defaults.hasOwnProperty(t) ? H.merge(Object.create(null), [N.scale, this.defaults[t]]) : {};
    },
    updateScaleDefaults: function updateScaleDefaults(t, e) {
      this.defaults.hasOwnProperty(t) && (this.defaults[t] = H.extend(this.defaults[t], e));
    },
    addScalesToLayout: function addScalesToLayout(t) {
      H.each(t.scales, function (e) {
        e.fullWidth = e.options.fullWidth, e.position = e.options.position, e.weight = e.options.weight, pe.addBox(t, e);
      });
    }
  },
      ze = H.valueOrDefault,
      Ne = H.rtl.getRtlAdapter;

  N._set("global", {
    tooltips: {
      enabled: !0,
      custom: null,
      mode: "nearest",
      position: "average",
      intersect: !0,
      backgroundColor: "rgba(0,0,0,0.8)",
      titleFontStyle: "bold",
      titleSpacing: 2,
      titleMarginBottom: 6,
      titleFontColor: "#fff",
      titleAlign: "left",
      bodySpacing: 2,
      bodyFontColor: "#fff",
      bodyAlign: "left",
      footerFontStyle: "bold",
      footerSpacing: 2,
      footerMarginTop: 6,
      footerFontColor: "#fff",
      footerAlign: "left",
      yPadding: 6,
      xPadding: 6,
      caretPadding: 2,
      caretSize: 5,
      cornerRadius: 6,
      multiKeyBackground: "#fff",
      displayColors: !0,
      borderColor: "rgba(0,0,0,0)",
      borderWidth: 0,
      callbacks: {
        beforeTitle: H.noop,
        title: function title(t, e) {
          var n = "",
              i = e.labels,
              a = i ? i.length : 0;

          if (t.length > 0) {
            var r = t[0];
            r.label ? n = r.label : r.xLabel ? n = r.xLabel : a > 0 && r.index < a && (n = i[r.index]);
          }

          return n;
        },
        afterTitle: H.noop,
        beforeBody: H.noop,
        beforeLabel: H.noop,
        label: function label(t, e) {
          var n = e.datasets[t.datasetIndex].label || "";
          return n && (n += ": "), H.isNullOrUndef(t.value) ? n += t.yLabel : n += t.value, n;
        },
        labelColor: function labelColor(t, e) {
          var n = e.getDatasetMeta(t.datasetIndex).data[t.index]._view;

          return {
            borderColor: n.borderColor,
            backgroundColor: n.backgroundColor
          };
        },
        labelTextColor: function labelTextColor() {
          return this._options.bodyFontColor;
        },
        afterLabel: H.noop,
        afterBody: H.noop,
        beforeFooter: H.noop,
        footer: H.noop,
        afterFooter: H.noop
      }
    }
  });

  var Be = {
    average: function average(t) {
      if (!t.length) return !1;
      var e,
          n,
          i = 0,
          a = 0,
          r = 0;

      for (e = 0, n = t.length; e < n; ++e) {
        var o = t[e];

        if (o && o.hasValue()) {
          var s = o.tooltipPosition();
          i += s.x, a += s.y, ++r;
        }
      }

      return {
        x: i / r,
        y: a / r
      };
    },
    nearest: function nearest(t, e) {
      var n,
          i,
          a,
          r = e.x,
          o = e.y,
          s = Number.POSITIVE_INFINITY;

      for (n = 0, i = t.length; n < i; ++n) {
        var l = t[n];

        if (l && l.hasValue()) {
          var u = l.getCenterPoint(),
              d = H.distanceBetweenPoints(e, u);
          d < s && (s = d, a = l);
        }
      }

      if (a) {
        var h = a.tooltipPosition();
        r = h.x, o = h.y;
      }

      return {
        x: r,
        y: o
      };
    }
  };

  function Ee(t, e) {
    return e && (H.isArray(e) ? Array.prototype.push.apply(t, e) : t.push(e)), t;
  }

  function We(t) {
    return ("string" == typeof t || t instanceof String) && t.indexOf("\n") > -1 ? t.split("\n") : t;
  }

  function Ve(t) {
    var e = N.global;
    return {
      xPadding: t.xPadding,
      yPadding: t.yPadding,
      xAlign: t.xAlign,
      yAlign: t.yAlign,
      rtl: t.rtl,
      textDirection: t.textDirection,
      bodyFontColor: t.bodyFontColor,
      _bodyFontFamily: ze(t.bodyFontFamily, e.defaultFontFamily),
      _bodyFontStyle: ze(t.bodyFontStyle, e.defaultFontStyle),
      _bodyAlign: t.bodyAlign,
      bodyFontSize: ze(t.bodyFontSize, e.defaultFontSize),
      bodySpacing: t.bodySpacing,
      titleFontColor: t.titleFontColor,
      _titleFontFamily: ze(t.titleFontFamily, e.defaultFontFamily),
      _titleFontStyle: ze(t.titleFontStyle, e.defaultFontStyle),
      titleFontSize: ze(t.titleFontSize, e.defaultFontSize),
      _titleAlign: t.titleAlign,
      titleSpacing: t.titleSpacing,
      titleMarginBottom: t.titleMarginBottom,
      footerFontColor: t.footerFontColor,
      _footerFontFamily: ze(t.footerFontFamily, e.defaultFontFamily),
      _footerFontStyle: ze(t.footerFontStyle, e.defaultFontStyle),
      footerFontSize: ze(t.footerFontSize, e.defaultFontSize),
      _footerAlign: t.footerAlign,
      footerSpacing: t.footerSpacing,
      footerMarginTop: t.footerMarginTop,
      caretSize: t.caretSize,
      cornerRadius: t.cornerRadius,
      backgroundColor: t.backgroundColor,
      opacity: 0,
      legendColorBackground: t.multiKeyBackground,
      displayColors: t.displayColors,
      borderColor: t.borderColor,
      borderWidth: t.borderWidth
    };
  }

  function He(t, e) {
    return "center" === e ? t.x + t.width / 2 : "right" === e ? t.x + t.width - t.xPadding : t.x + t.xPadding;
  }

  function je(t) {
    return Ee([], We(t));
  }

  var qe = K.extend({
    initialize: function initialize() {
      this._model = Ve(this._options), this._lastActive = [];
    },
    getTitle: function getTitle() {
      var t = this,
          e = t._options,
          n = e.callbacks,
          i = n.beforeTitle.apply(t, arguments),
          a = n.title.apply(t, arguments),
          r = n.afterTitle.apply(t, arguments),
          o = [];
      return o = Ee(o, We(i)), o = Ee(o, We(a)), o = Ee(o, We(r));
    },
    getBeforeBody: function getBeforeBody() {
      return je(this._options.callbacks.beforeBody.apply(this, arguments));
    },
    getBody: function getBody(t, e) {
      var n = this,
          i = n._options.callbacks,
          a = [];
      return H.each(t, function (t) {
        var r = {
          before: [],
          lines: [],
          after: []
        };
        Ee(r.before, We(i.beforeLabel.call(n, t, e))), Ee(r.lines, i.label.call(n, t, e)), Ee(r.after, We(i.afterLabel.call(n, t, e))), a.push(r);
      }), a;
    },
    getAfterBody: function getAfterBody() {
      return je(this._options.callbacks.afterBody.apply(this, arguments));
    },
    getFooter: function getFooter() {
      var t = this,
          e = t._options.callbacks,
          n = e.beforeFooter.apply(t, arguments),
          i = e.footer.apply(t, arguments),
          a = e.afterFooter.apply(t, arguments),
          r = [];
      return r = Ee(r, We(n)), r = Ee(r, We(i)), r = Ee(r, We(a));
    },
    update: function update(t) {
      var e,
          n,
          i,
          a,
          r,
          o,
          s,
          l,
          u,
          d,
          h = this,
          c = h._options,
          f = h._model,
          g = h._model = Ve(c),
          p = h._active,
          m = h._data,
          v = {
        xAlign: f.xAlign,
        yAlign: f.yAlign
      },
          b = {
        x: f.x,
        y: f.y
      },
          x = {
        width: f.width,
        height: f.height
      },
          y = {
        x: f.caretX,
        y: f.caretY
      };

      if (p.length) {
        g.opacity = 1;
        var _ = [],
            k = [];
        y = Be[c.position].call(h, p, h._eventPosition);
        var w = [];

        for (e = 0, n = p.length; e < n; ++e) {
          w.push((i = p[e], a = void 0, r = void 0, o = void 0, s = void 0, l = void 0, u = void 0, d = void 0, a = i._xScale, r = i._yScale || i._scale, o = i._index, s = i._datasetIndex, l = i._chart.getDatasetMeta(s).controller, u = l._getIndexScale(), d = l._getValueScale(), {
            xLabel: a ? a.getLabelForIndex(o, s) : "",
            yLabel: r ? r.getLabelForIndex(o, s) : "",
            label: u ? "" + u.getLabelForIndex(o, s) : "",
            value: d ? "" + d.getLabelForIndex(o, s) : "",
            index: o,
            datasetIndex: s,
            x: i._model.x,
            y: i._model.y
          }));
        }

        c.filter && (w = w.filter(function (t) {
          return c.filter(t, m);
        })), c.itemSort && (w = w.sort(function (t, e) {
          return c.itemSort(t, e, m);
        })), H.each(w, function (t) {
          _.push(c.callbacks.labelColor.call(h, t, h._chart)), k.push(c.callbacks.labelTextColor.call(h, t, h._chart));
        }), g.title = h.getTitle(w, m), g.beforeBody = h.getBeforeBody(w, m), g.body = h.getBody(w, m), g.afterBody = h.getAfterBody(w, m), g.footer = h.getFooter(w, m), g.x = y.x, g.y = y.y, g.caretPadding = c.caretPadding, g.labelColors = _, g.labelTextColors = k, g.dataPoints = w, x = function (t, e) {
          var n = t._chart.ctx,
              i = 2 * e.yPadding,
              a = 0,
              r = e.body,
              o = r.reduce(function (t, e) {
            return t + e.before.length + e.lines.length + e.after.length;
          }, 0);
          o += e.beforeBody.length + e.afterBody.length;
          var s = e.title.length,
              l = e.footer.length,
              u = e.titleFontSize,
              d = e.bodyFontSize,
              h = e.footerFontSize;
          i += s * u, i += s ? (s - 1) * e.titleSpacing : 0, i += s ? e.titleMarginBottom : 0, i += o * d, i += o ? (o - 1) * e.bodySpacing : 0, i += l ? e.footerMarginTop : 0, i += l * h, i += l ? (l - 1) * e.footerSpacing : 0;

          var c = 0,
              f = function f(t) {
            a = Math.max(a, n.measureText(t).width + c);
          };

          return n.font = H.fontString(u, e._titleFontStyle, e._titleFontFamily), H.each(e.title, f), n.font = H.fontString(d, e._bodyFontStyle, e._bodyFontFamily), H.each(e.beforeBody.concat(e.afterBody), f), c = e.displayColors ? d + 2 : 0, H.each(r, function (t) {
            H.each(t.before, f), H.each(t.lines, f), H.each(t.after, f);
          }), c = 0, n.font = H.fontString(h, e._footerFontStyle, e._footerFontFamily), H.each(e.footer, f), {
            width: a += 2 * e.xPadding,
            height: i
          };
        }(this, g), b = function (t, e, n, i) {
          var a = t.x,
              r = t.y,
              o = t.caretSize,
              s = t.caretPadding,
              l = t.cornerRadius,
              u = n.xAlign,
              d = n.yAlign,
              h = o + s,
              c = l + s;
          return "right" === u ? a -= e.width : "center" === u && ((a -= e.width / 2) + e.width > i.width && (a = i.width - e.width), a < 0 && (a = 0)), "top" === d ? r += h : r -= "bottom" === d ? e.height + h : e.height / 2, "center" === d ? "left" === u ? a += h : "right" === u && (a -= h) : "left" === u ? a -= c : "right" === u && (a += c), {
            x: a,
            y: r
          };
        }(g, x, v = function (t, e) {
          var n,
              i,
              a,
              r,
              o,
              s = t._model,
              l = t._chart,
              u = t._chart.chartArea,
              d = "center",
              h = "center";
          s.y < e.height ? h = "top" : s.y > l.height - e.height && (h = "bottom");
          var c = (u.left + u.right) / 2,
              f = (u.top + u.bottom) / 2;
          "center" === h ? (n = function n(t) {
            return t <= c;
          }, i = function i(t) {
            return t > c;
          }) : (n = function n(t) {
            return t <= e.width / 2;
          }, i = function i(t) {
            return t >= l.width - e.width / 2;
          }), a = function a(t) {
            return t + e.width + s.caretSize + s.caretPadding > l.width;
          }, r = function r(t) {
            return t - e.width - s.caretSize - s.caretPadding < 0;
          }, o = function o(t) {
            return t <= f ? "top" : "bottom";
          }, n(s.x) ? (d = "left", a(s.x) && (d = "center", h = o(s.y))) : i(s.x) && (d = "right", r(s.x) && (d = "center", h = o(s.y)));
          var g = t._options;
          return {
            xAlign: g.xAlign ? g.xAlign : d,
            yAlign: g.yAlign ? g.yAlign : h
          };
        }(this, x), h._chart);
      } else g.opacity = 0;

      return g.xAlign = v.xAlign, g.yAlign = v.yAlign, g.x = b.x, g.y = b.y, g.width = x.width, g.height = x.height, g.caretX = y.x, g.caretY = y.y, h._model = g, t && c.custom && c.custom.call(h, g), h;
    },
    drawCaret: function drawCaret(t, e) {
      var n = this._chart.ctx,
          i = this._view,
          a = this.getCaretPosition(t, e, i);
      n.lineTo(a.x1, a.y1), n.lineTo(a.x2, a.y2), n.lineTo(a.x3, a.y3);
    },
    getCaretPosition: function getCaretPosition(t, e, n) {
      var i,
          a,
          r,
          o,
          s,
          l,
          u = n.caretSize,
          d = n.cornerRadius,
          h = n.xAlign,
          c = n.yAlign,
          f = t.x,
          g = t.y,
          p = e.width,
          m = e.height;
      if ("center" === c) s = g + m / 2, "left" === h ? (a = (i = f) - u, r = i, o = s + u, l = s - u) : (a = (i = f + p) + u, r = i, o = s - u, l = s + u);else if ("left" === h ? (i = (a = f + d + u) - u, r = a + u) : "right" === h ? (i = (a = f + p - d - u) - u, r = a + u) : (i = (a = n.caretX) - u, r = a + u), "top" === c) s = (o = g) - u, l = o;else {
        s = (o = g + m) + u, l = o;
        var v = r;
        r = i, i = v;
      }
      return {
        x1: i,
        x2: a,
        x3: r,
        y1: o,
        y2: s,
        y3: l
      };
    },
    drawTitle: function drawTitle(t, e, n) {
      var i,
          a,
          r,
          o = e.title,
          s = o.length;

      if (s) {
        var l = Ne(e.rtl, e.x, e.width);

        for (t.x = He(e, e._titleAlign), n.textAlign = l.textAlign(e._titleAlign), n.textBaseline = "middle", i = e.titleFontSize, a = e.titleSpacing, n.fillStyle = e.titleFontColor, n.font = H.fontString(i, e._titleFontStyle, e._titleFontFamily), r = 0; r < s; ++r) {
          n.fillText(o[r], l.x(t.x), t.y + i / 2), t.y += i + a, r + 1 === s && (t.y += e.titleMarginBottom - a);
        }
      }
    },
    drawBody: function drawBody(t, e, n) {
      var i,
          a,
          r,
          o,
          s,
          l,
          u,
          d,
          h = e.bodyFontSize,
          c = e.bodySpacing,
          f = e._bodyAlign,
          g = e.body,
          p = e.displayColors,
          m = 0,
          v = p ? He(e, "left") : 0,
          b = Ne(e.rtl, e.x, e.width),
          x = function x(e) {
        n.fillText(e, b.x(t.x + m), t.y + h / 2), t.y += h + c;
      },
          y = b.textAlign(f);

      for (n.textAlign = f, n.textBaseline = "middle", n.font = H.fontString(h, e._bodyFontStyle, e._bodyFontFamily), t.x = He(e, y), n.fillStyle = e.bodyFontColor, H.each(e.beforeBody, x), m = p && "right" !== y ? "center" === f ? h / 2 + 1 : h + 2 : 0, s = 0, u = g.length; s < u; ++s) {
        for (i = g[s], a = e.labelTextColors[s], r = e.labelColors[s], n.fillStyle = a, H.each(i.before, x), l = 0, d = (o = i.lines).length; l < d; ++l) {
          if (p) {
            var _ = b.x(v);

            n.fillStyle = e.legendColorBackground, n.fillRect(b.leftForLtr(_, h), t.y, h, h), n.lineWidth = 1, n.strokeStyle = r.borderColor, n.strokeRect(b.leftForLtr(_, h), t.y, h, h), n.fillStyle = r.backgroundColor, n.fillRect(b.leftForLtr(b.xPlus(_, 1), h - 2), t.y + 1, h - 2, h - 2), n.fillStyle = a;
          }

          x(o[l]);
        }

        H.each(i.after, x);
      }

      m = 0, H.each(e.afterBody, x), t.y -= c;
    },
    drawFooter: function drawFooter(t, e, n) {
      var i,
          a,
          r = e.footer,
          o = r.length;

      if (o) {
        var s = Ne(e.rtl, e.x, e.width);

        for (t.x = He(e, e._footerAlign), t.y += e.footerMarginTop, n.textAlign = s.textAlign(e._footerAlign), n.textBaseline = "middle", i = e.footerFontSize, n.fillStyle = e.footerFontColor, n.font = H.fontString(i, e._footerFontStyle, e._footerFontFamily), a = 0; a < o; ++a) {
          n.fillText(r[a], s.x(t.x), t.y + i / 2), t.y += i + e.footerSpacing;
        }
      }
    },
    drawBackground: function drawBackground(t, e, n, i) {
      n.fillStyle = e.backgroundColor, n.strokeStyle = e.borderColor, n.lineWidth = e.borderWidth;
      var a = e.xAlign,
          r = e.yAlign,
          o = t.x,
          s = t.y,
          l = i.width,
          u = i.height,
          d = e.cornerRadius;
      n.beginPath(), n.moveTo(o + d, s), "top" === r && this.drawCaret(t, i), n.lineTo(o + l - d, s), n.quadraticCurveTo(o + l, s, o + l, s + d), "center" === r && "right" === a && this.drawCaret(t, i), n.lineTo(o + l, s + u - d), n.quadraticCurveTo(o + l, s + u, o + l - d, s + u), "bottom" === r && this.drawCaret(t, i), n.lineTo(o + d, s + u), n.quadraticCurveTo(o, s + u, o, s + u - d), "center" === r && "left" === a && this.drawCaret(t, i), n.lineTo(o, s + d), n.quadraticCurveTo(o, s, o + d, s), n.closePath(), n.fill(), e.borderWidth > 0 && n.stroke();
    },
    draw: function draw() {
      var t = this._chart.ctx,
          e = this._view;

      if (0 !== e.opacity) {
        var n = {
          width: e.width,
          height: e.height
        },
            i = {
          x: e.x,
          y: e.y
        },
            a = Math.abs(e.opacity < .001) ? 0 : e.opacity,
            r = e.title.length || e.beforeBody.length || e.body.length || e.afterBody.length || e.footer.length;
        this._options.enabled && r && (t.save(), t.globalAlpha = a, this.drawBackground(i, e, t, n), i.y += e.yPadding, H.rtl.overrideTextDirection(t, e.textDirection), this.drawTitle(i, e, t), this.drawBody(i, e, t), this.drawFooter(i, e, t), H.rtl.restoreTextDirection(t, e.textDirection), t.restore());
      }
    },
    handleEvent: function handleEvent(t) {
      var e,
          n = this,
          i = n._options;
      return n._lastActive = n._lastActive || [], "mouseout" === t.type ? n._active = [] : (n._active = n._chart.getElementsAtEventForMode(t, i.mode, i), i.reverse && n._active.reverse()), (e = !H.arrayEquals(n._active, n._lastActive)) && (n._lastActive = n._active, (i.enabled || i.custom) && (n._eventPosition = {
        x: t.x,
        y: t.y
      }, n.update(!0), n.pivot())), e;
    }
  }),
      Ue = Be,
      Ye = qe;
  Ye.positioners = Ue;
  var Ge = H.valueOrDefault;

  function Xe() {
    return H.merge(Object.create(null), [].slice.call(arguments), {
      merger: function merger(t, e, n, i) {
        if ("xAxes" === t || "yAxes" === t) {
          var a,
              r,
              o,
              s = n[t].length;

          for (e[t] || (e[t] = []), a = 0; a < s; ++a) {
            o = n[t][a], r = Ge(o.type, "xAxes" === t ? "category" : "linear"), a >= e[t].length && e[t].push({}), !e[t][a].type || o.type && o.type !== e[t][a].type ? H.merge(e[t][a], [Re.getScaleDefaults(r), o]) : H.merge(e[t][a], o);
          }
        } else H._merger(t, e, n, i);
      }
    });
  }

  function Ke() {
    return H.merge(Object.create(null), [].slice.call(arguments), {
      merger: function merger(t, e, n, i) {
        var a = e[t] || Object.create(null),
            r = n[t];
        "scales" === t ? e[t] = Xe(a, r) : "scale" === t ? e[t] = H.merge(a, [Re.getScaleDefaults(r.type), r]) : H._merger(t, e, n, i);
      }
    });
  }

  function Ze(t) {
    var e = t.options;
    H.each(t.scales, function (e) {
      pe.removeBox(t, e);
    }), e = Ke(N.global, N[t.config.type], e), t.options = t.config.options = e, t.ensureScalesHaveIDs(), t.buildOrUpdateScales(), t.tooltip._options = e.tooltips, t.tooltip.initialize();
  }

  function $e(t, e, n) {
    var i,
        a = function a(t) {
      return t.id === i;
    };

    do {
      i = e + n++;
    } while (H.findIndex(t, a) >= 0);

    return i;
  }

  function Je(t) {
    return "top" === t || "bottom" === t;
  }

  function Qe(t, e) {
    return function (n, i) {
      return n[t] === i[t] ? n[e] - i[e] : n[t] - i[t];
    };
  }

  N._set("global", {
    elements: {},
    events: ["mousemove", "mouseout", "click", "touchstart", "touchmove"],
    hover: {
      onHover: null,
      mode: "nearest",
      intersect: !0,
      animationDuration: 400
    },
    onClick: null,
    maintainAspectRatio: !0,
    responsive: !0,
    responsiveAnimationDuration: 0
  });

  var tn = function tn(t, e) {
    return this.construct(t, e), this;
  };

  H.extend(tn.prototype, {
    construct: function construct(t, e) {
      var n = this;

      e = function (t) {
        var e = (t = t || Object.create(null)).data = t.data || {};
        return e.datasets = e.datasets || [], e.labels = e.labels || [], t.options = Ke(N.global, N[t.type], t.options || {}), t;
      }(e);

      var i = Oe.acquireContext(t, e),
          a = i && i.canvas,
          r = a && a.height,
          o = a && a.width;
      n.id = H.uid(), n.ctx = i, n.canvas = a, n.config = e, n.width = o, n.height = r, n.aspectRatio = r ? o / r : null, n.options = e.options, n._bufferedRender = !1, n._layers = [], n.chart = n, n.controller = n, tn.instances[n.id] = n, Object.defineProperty(n, "data", {
        get: function get() {
          return n.config.data;
        },
        set: function set(t) {
          n.config.data = t;
        }
      }), i && a ? (n.initialize(), n.update()) : console.error("Failed to create chart: can't acquire context from the given item");
    },
    initialize: function initialize() {
      var t = this;
      return Le.notify(t, "beforeInit"), H.retinaScale(t, t.options.devicePixelRatio), t.bindEvents(), t.options.responsive && t.resize(!0), t.initToolTip(), Le.notify(t, "afterInit"), t;
    },
    clear: function clear() {
      return H.canvas.clear(this), this;
    },
    stop: function stop() {
      return J.cancelAnimation(this), this;
    },
    resize: function resize(t) {
      var e = this,
          n = e.options,
          i = e.canvas,
          a = n.maintainAspectRatio && e.aspectRatio || null,
          r = Math.max(0, Math.floor(H.getMaximumWidth(i))),
          o = Math.max(0, Math.floor(a ? r / a : H.getMaximumHeight(i)));

      if ((e.width !== r || e.height !== o) && (i.width = e.width = r, i.height = e.height = o, i.style.width = r + "px", i.style.height = o + "px", H.retinaScale(e, n.devicePixelRatio), !t)) {
        var s = {
          width: r,
          height: o
        };
        Le.notify(e, "resize", [s]), n.onResize && n.onResize(e, s), e.stop(), e.update({
          duration: n.responsiveAnimationDuration
        });
      }
    },
    ensureScalesHaveIDs: function ensureScalesHaveIDs() {
      var t = this.options,
          e = t.scales || {},
          n = t.scale;
      H.each(e.xAxes, function (t, n) {
        t.id || (t.id = $e(e.xAxes, "x-axis-", n));
      }), H.each(e.yAxes, function (t, n) {
        t.id || (t.id = $e(e.yAxes, "y-axis-", n));
      }), n && (n.id = n.id || "scale");
    },
    buildOrUpdateScales: function buildOrUpdateScales() {
      var t = this,
          e = t.options,
          n = t.scales || {},
          i = [],
          a = Object.keys(n).reduce(function (t, e) {
        return t[e] = !1, t;
      }, {});
      e.scales && (i = i.concat((e.scales.xAxes || []).map(function (t) {
        return {
          options: t,
          dtype: "category",
          dposition: "bottom"
        };
      }), (e.scales.yAxes || []).map(function (t) {
        return {
          options: t,
          dtype: "linear",
          dposition: "left"
        };
      }))), e.scale && i.push({
        options: e.scale,
        dtype: "radialLinear",
        isDefault: !0,
        dposition: "chartArea"
      }), H.each(i, function (e) {
        var i = e.options,
            r = i.id,
            o = Ge(i.type, e.dtype);
        Je(i.position) !== Je(e.dposition) && (i.position = e.dposition), a[r] = !0;
        var s = null;
        if (r in n && n[r].type === o) (s = n[r]).options = i, s.ctx = t.ctx, s.chart = t;else {
          var l = Re.getScaleConstructor(o);
          if (!l) return;
          s = new l({
            id: r,
            type: o,
            options: i,
            ctx: t.ctx,
            chart: t
          }), n[s.id] = s;
        }
        s.mergeTicksOptions(), e.isDefault && (t.scale = s);
      }), H.each(a, function (t, e) {
        t || delete n[e];
      }), t.scales = n, Re.addScalesToLayout(this);
    },
    buildOrUpdateControllers: function buildOrUpdateControllers() {
      var t,
          e,
          n = this,
          i = [],
          a = n.data.datasets;

      for (t = 0, e = a.length; t < e; t++) {
        var r = a[t],
            o = n.getDatasetMeta(t),
            s = r.type || n.config.type;
        if (o.type && o.type !== s && (n.destroyDatasetMeta(t), o = n.getDatasetMeta(t)), o.type = s, o.order = r.order || 0, o.index = t, o.controller) o.controller.updateIndex(t), o.controller.linkScales();else {
          var l = Jt[o.type];
          if (void 0 === l) throw new Error('"' + o.type + '" is not a chart type.');
          o.controller = new l(n, t), i.push(o.controller);
        }
      }

      return i;
    },
    resetElements: function resetElements() {
      var t = this;
      H.each(t.data.datasets, function (e, n) {
        t.getDatasetMeta(n).controller.reset();
      }, t);
    },
    reset: function reset() {
      this.resetElements(), this.tooltip.initialize();
    },
    update: function update(t) {
      var e,
          n,
          i = this;

      if (t && "object" == _typeof(t) || (t = {
        duration: t,
        lazy: arguments[1]
      }), Ze(i), Le._invalidate(i), !1 !== Le.notify(i, "beforeUpdate")) {
        i.tooltip._data = i.data;
        var a = i.buildOrUpdateControllers();

        for (e = 0, n = i.data.datasets.length; e < n; e++) {
          i.getDatasetMeta(e).controller.buildOrUpdateElements();
        }

        i.updateLayout(), i.options.animation && i.options.animation.duration && H.each(a, function (t) {
          t.reset();
        }), i.updateDatasets(), i.tooltip.initialize(), i.lastActive = [], Le.notify(i, "afterUpdate"), i._layers.sort(Qe("z", "_idx")), i._bufferedRender ? i._bufferedRequest = {
          duration: t.duration,
          easing: t.easing,
          lazy: t.lazy
        } : i.render(t);
      }
    },
    updateLayout: function updateLayout() {
      var t = this;
      !1 !== Le.notify(t, "beforeLayout") && (pe.update(this, this.width, this.height), t._layers = [], H.each(t.boxes, function (e) {
        e._configure && e._configure(), t._layers.push.apply(t._layers, e._layers());
      }, t), t._layers.forEach(function (t, e) {
        t._idx = e;
      }), Le.notify(t, "afterScaleUpdate"), Le.notify(t, "afterLayout"));
    },
    updateDatasets: function updateDatasets() {
      if (!1 !== Le.notify(this, "beforeDatasetsUpdate")) {
        for (var t = 0, e = this.data.datasets.length; t < e; ++t) {
          this.updateDataset(t);
        }

        Le.notify(this, "afterDatasetsUpdate");
      }
    },
    updateDataset: function updateDataset(t) {
      var e = this.getDatasetMeta(t),
          n = {
        meta: e,
        index: t
      };
      !1 !== Le.notify(this, "beforeDatasetUpdate", [n]) && (e.controller._update(), Le.notify(this, "afterDatasetUpdate", [n]));
    },
    render: function render(t) {
      var e = this;
      t && "object" == _typeof(t) || (t = {
        duration: t,
        lazy: arguments[1]
      });
      var n = e.options.animation,
          i = Ge(t.duration, n && n.duration),
          a = t.lazy;

      if (!1 !== Le.notify(e, "beforeRender")) {
        var r = function r(t) {
          Le.notify(e, "afterRender"), H.callback(n && n.onComplete, [t], e);
        };

        if (n && i) {
          var o = new $({
            numSteps: i / 16.66,
            easing: t.easing || n.easing,
            render: function render(t, e) {
              var n = H.easing.effects[e.easing],
                  i = e.currentStep,
                  a = i / e.numSteps;
              t.draw(n(a), a, i);
            },
            onAnimationProgress: n.onProgress,
            onAnimationComplete: r
          });
          J.addAnimation(e, o, i, a);
        } else e.draw(), r(new $({
          numSteps: 0,
          chart: e
        }));

        return e;
      }
    },
    draw: function draw(t) {
      var e,
          n,
          i = this;

      if (i.clear(), H.isNullOrUndef(t) && (t = 1), i.transition(t), !(i.width <= 0 || i.height <= 0) && !1 !== Le.notify(i, "beforeDraw", [t])) {
        for (n = i._layers, e = 0; e < n.length && n[e].z <= 0; ++e) {
          n[e].draw(i.chartArea);
        }

        for (i.drawDatasets(t); e < n.length; ++e) {
          n[e].draw(i.chartArea);
        }

        i._drawTooltip(t), Le.notify(i, "afterDraw", [t]);
      }
    },
    transition: function transition(t) {
      for (var e = 0, n = (this.data.datasets || []).length; e < n; ++e) {
        this.isDatasetVisible(e) && this.getDatasetMeta(e).controller.transition(t);
      }

      this.tooltip.transition(t);
    },
    _getSortedDatasetMetas: function _getSortedDatasetMetas(t) {
      var e,
          n,
          i = [];

      for (e = 0, n = (this.data.datasets || []).length; e < n; ++e) {
        t && !this.isDatasetVisible(e) || i.push(this.getDatasetMeta(e));
      }

      return i.sort(Qe("order", "index")), i;
    },
    _getSortedVisibleDatasetMetas: function _getSortedVisibleDatasetMetas() {
      return this._getSortedDatasetMetas(!0);
    },
    drawDatasets: function drawDatasets(t) {
      var e, n;

      if (!1 !== Le.notify(this, "beforeDatasetsDraw", [t])) {
        for (n = (e = this._getSortedVisibleDatasetMetas()).length - 1; n >= 0; --n) {
          this.drawDataset(e[n], t);
        }

        Le.notify(this, "afterDatasetsDraw", [t]);
      }
    },
    drawDataset: function drawDataset(t, e) {
      var n = {
        meta: t,
        index: t.index,
        easingValue: e
      };
      !1 !== Le.notify(this, "beforeDatasetDraw", [n]) && (t.controller.draw(e), Le.notify(this, "afterDatasetDraw", [n]));
    },
    _drawTooltip: function _drawTooltip(t) {
      var e = this.tooltip,
          n = {
        tooltip: e,
        easingValue: t
      };
      !1 !== Le.notify(this, "beforeTooltipDraw", [n]) && (e.draw(), Le.notify(this, "afterTooltipDraw", [n]));
    },
    getElementAtEvent: function getElementAtEvent(t) {
      return re.modes.single(this, t);
    },
    getElementsAtEvent: function getElementsAtEvent(t) {
      return re.modes.label(this, t, {
        intersect: !0
      });
    },
    getElementsAtXAxis: function getElementsAtXAxis(t) {
      return re.modes["x-axis"](this, t, {
        intersect: !0
      });
    },
    getElementsAtEventForMode: function getElementsAtEventForMode(t, e, n) {
      var i = re.modes[e];
      return "function" == typeof i ? i(this, t, n) : [];
    },
    getDatasetAtEvent: function getDatasetAtEvent(t) {
      return re.modes.dataset(this, t, {
        intersect: !0
      });
    },
    getDatasetMeta: function getDatasetMeta(t) {
      var e = this.data.datasets[t];
      e._meta || (e._meta = {});
      var n = e._meta[this.id];
      return n || (n = e._meta[this.id] = {
        type: null,
        data: [],
        dataset: null,
        controller: null,
        hidden: null,
        xAxisID: null,
        yAxisID: null,
        order: e.order || 0,
        index: t
      }), n;
    },
    getVisibleDatasetCount: function getVisibleDatasetCount() {
      for (var t = 0, e = 0, n = this.data.datasets.length; e < n; ++e) {
        this.isDatasetVisible(e) && t++;
      }

      return t;
    },
    isDatasetVisible: function isDatasetVisible(t) {
      var e = this.getDatasetMeta(t);
      return "boolean" == typeof e.hidden ? !e.hidden : !this.data.datasets[t].hidden;
    },
    generateLegend: function generateLegend() {
      return this.options.legendCallback(this);
    },
    destroyDatasetMeta: function destroyDatasetMeta(t) {
      var e = this.id,
          n = this.data.datasets[t],
          i = n._meta && n._meta[e];
      i && (i.controller.destroy(), delete n._meta[e]);
    },
    destroy: function destroy() {
      var t,
          e,
          n = this,
          i = n.canvas;

      for (n.stop(), t = 0, e = n.data.datasets.length; t < e; ++t) {
        n.destroyDatasetMeta(t);
      }

      i && (n.unbindEvents(), H.canvas.clear(n), Oe.releaseContext(n.ctx), n.canvas = null, n.ctx = null), Le.notify(n, "destroy"), delete tn.instances[n.id];
    },
    toBase64Image: function toBase64Image() {
      return this.canvas.toDataURL.apply(this.canvas, arguments);
    },
    initToolTip: function initToolTip() {
      var t = this;
      t.tooltip = new Ye({
        _chart: t,
        _chartInstance: t,
        _data: t.data,
        _options: t.options.tooltips
      }, t);
    },
    bindEvents: function bindEvents() {
      var t = this,
          e = t._listeners = {},
          n = function n() {
        t.eventHandler.apply(t, arguments);
      };

      H.each(t.options.events, function (i) {
        Oe.addEventListener(t, i, n), e[i] = n;
      }), t.options.responsive && (n = function n() {
        t.resize();
      }, Oe.addEventListener(t, "resize", n), e.resize = n);
    },
    unbindEvents: function unbindEvents() {
      var t = this,
          e = t._listeners;
      e && (delete t._listeners, H.each(e, function (e, n) {
        Oe.removeEventListener(t, n, e);
      }));
    },
    updateHoverStyle: function updateHoverStyle(t, e, n) {
      var i,
          a,
          r,
          o = n ? "set" : "remove";

      for (a = 0, r = t.length; a < r; ++a) {
        (i = t[a]) && this.getDatasetMeta(i._datasetIndex).controller[o + "HoverStyle"](i);
      }

      "dataset" === e && this.getDatasetMeta(t[0]._datasetIndex).controller["_" + o + "DatasetHoverStyle"]();
    },
    eventHandler: function eventHandler(t) {
      var e = this,
          n = e.tooltip;

      if (!1 !== Le.notify(e, "beforeEvent", [t])) {
        e._bufferedRender = !0, e._bufferedRequest = null;
        var i = e.handleEvent(t);
        n && (i = n._start ? n.handleEvent(t) : i | n.handleEvent(t)), Le.notify(e, "afterEvent", [t]);
        var a = e._bufferedRequest;
        return a ? e.render(a) : i && !e.animating && (e.stop(), e.render({
          duration: e.options.hover.animationDuration,
          lazy: !0
        })), e._bufferedRender = !1, e._bufferedRequest = null, e;
      }
    },
    handleEvent: function handleEvent(t) {
      var e,
          n = this,
          i = n.options || {},
          a = i.hover;
      return n.lastActive = n.lastActive || [], "mouseout" === t.type ? n.active = [] : n.active = n.getElementsAtEventForMode(t, a.mode, a), H.callback(i.onHover || i.hover.onHover, [t["native"], n.active], n), "mouseup" !== t.type && "click" !== t.type || i.onClick && i.onClick.call(n, t["native"], n.active), n.lastActive.length && n.updateHoverStyle(n.lastActive, a.mode, !1), n.active.length && a.mode && n.updateHoverStyle(n.active, a.mode, !0), e = !H.arrayEquals(n.active, n.lastActive), n.lastActive = n.active, e;
    }
  }), tn.instances = {};
  var en = tn;
  tn.Controller = tn, tn.types = {}, H.configMerge = Ke, H.scaleMerge = Xe;

  function nn() {
    throw new Error("This method is not implemented: either no adapter can be found or an incomplete integration was provided.");
  }

  function an(t) {
    this.options = t || {};
  }

  H.extend(an.prototype, {
    formats: nn,
    parse: nn,
    format: nn,
    add: nn,
    diff: nn,
    startOf: nn,
    endOf: nn,
    _create: function _create(t) {
      return t;
    }
  }), an.override = function (t) {
    H.extend(an.prototype, t);
  };
  var rn = {
    _date: an
  },
      on = {
    formatters: {
      values: function values(t) {
        return H.isArray(t) ? t : "" + t;
      },
      linear: function linear(t, e, n) {
        var i = n.length > 3 ? n[2] - n[1] : n[1] - n[0];
        Math.abs(i) > 1 && t !== Math.floor(t) && (i = t - Math.floor(t));
        var a = H.log10(Math.abs(i)),
            r = "";
        if (0 !== t) {
          if (Math.max(Math.abs(n[0]), Math.abs(n[n.length - 1])) < 1e-4) {
            var o = H.log10(Math.abs(t)),
                s = Math.floor(o) - Math.floor(a);
            s = Math.max(Math.min(s, 20), 0), r = t.toExponential(s);
          } else {
            var l = -1 * Math.floor(a);
            l = Math.max(Math.min(l, 20), 0), r = t.toFixed(l);
          }
        } else r = "0";
        return r;
      },
      logarithmic: function logarithmic(t, e, n) {
        var i = t / Math.pow(10, Math.floor(H.log10(t)));
        return 0 === t ? "0" : 1 === i || 2 === i || 5 === i || 0 === e || e === n.length - 1 ? t.toExponential() : "";
      }
    }
  },
      sn = H.isArray,
      ln = H.isNullOrUndef,
      un = H.valueOrDefault,
      dn = H.valueAtIndexOrDefault;

  function hn(t, e, n) {
    var i,
        a = t.getTicks().length,
        r = Math.min(e, a - 1),
        o = t.getPixelForTick(r),
        s = t._startPixel,
        l = t._endPixel;
    if (!(n && (i = 1 === a ? Math.max(o - s, l - o) : 0 === e ? (t.getPixelForTick(1) - o) / 2 : (o - t.getPixelForTick(r - 1)) / 2, (o += r < e ? i : -i) < s - 1e-6 || o > l + 1e-6))) return o;
  }

  function cn(t, e, n, i) {
    var a,
        r,
        o,
        s,
        l,
        u,
        d,
        h,
        c,
        f,
        g,
        p,
        m,
        v = n.length,
        b = [],
        x = [],
        y = [],
        _ = 0,
        k = 0;

    for (a = 0; a < v; ++a) {
      if (s = n[a].label, l = n[a].major ? e.major : e.minor, t.font = u = l.string, d = i[u] = i[u] || {
        data: {},
        gc: []
      }, h = l.lineHeight, c = f = 0, ln(s) || sn(s)) {
        if (sn(s)) for (r = 0, o = s.length; r < o; ++r) {
          g = s[r], ln(g) || sn(g) || (c = H.measureText(t, d.data, d.gc, c, g), f += h);
        }
      } else c = H.measureText(t, d.data, d.gc, c, s), f = h;

      b.push(c), x.push(f), y.push(h / 2), _ = Math.max(c, _), k = Math.max(f, k);
    }

    function w(t) {
      return {
        width: b[t] || 0,
        height: x[t] || 0,
        offset: y[t] || 0
      };
    }

    return function (t, e) {
      H.each(t, function (t) {
        var n,
            i = t.gc,
            a = i.length / 2;

        if (a > e) {
          for (n = 0; n < a; ++n) {
            delete t.data[i[n]];
          }

          i.splice(0, a);
        }
      });
    }(i, v), p = b.indexOf(_), m = x.indexOf(k), {
      first: w(0),
      last: w(v - 1),
      widest: w(p),
      highest: w(m)
    };
  }

  function fn(t) {
    return t.drawTicks ? t.tickMarkLength : 0;
  }

  function gn(t) {
    var e, n;
    return t.display ? (e = H.options._parseFont(t), n = H.options.toPadding(t.padding), e.lineHeight + n.height) : 0;
  }

  function pn(t, e) {
    return H.extend(H.options._parseFont({
      fontFamily: un(e.fontFamily, t.fontFamily),
      fontSize: un(e.fontSize, t.fontSize),
      fontStyle: un(e.fontStyle, t.fontStyle),
      lineHeight: un(e.lineHeight, t.lineHeight)
    }), {
      color: H.options.resolve([e.fontColor, t.fontColor, N.global.defaultFontColor])
    });
  }

  function mn(t) {
    var e = pn(t, t.minor);
    return {
      minor: e,
      major: t.major.enabled ? pn(t, t.major) : e
    };
  }

  function vn(t) {
    var e,
        n,
        i,
        a = [];

    for (n = 0, i = t.length; n < i; ++n) {
      void 0 !== (e = t[n])._index && a.push(e);
    }

    return a;
  }

  function bn(t, e, n, i) {
    var a,
        r,
        o,
        s,
        l = un(n, 0),
        u = Math.min(un(i, t.length), t.length),
        d = 0;

    for (e = Math.ceil(e), i && (e = (a = i - n) / Math.floor(a / e)), s = l; s < 0;) {
      d++, s = Math.round(l + d * e);
    }

    for (r = Math.max(l, 0); r < u; r++) {
      o = t[r], r === s ? (o._index = r, d++, s = Math.round(l + d * e)) : delete o.label;
    }
  }

  N._set("scale", {
    display: !0,
    position: "left",
    offset: !1,
    gridLines: {
      display: !0,
      color: "rgba(0,0,0,0.1)",
      lineWidth: 1,
      drawBorder: !0,
      drawOnChartArea: !0,
      drawTicks: !0,
      tickMarkLength: 10,
      zeroLineWidth: 1,
      zeroLineColor: "rgba(0,0,0,0.25)",
      zeroLineBorderDash: [],
      zeroLineBorderDashOffset: 0,
      offsetGridLines: !1,
      borderDash: [],
      borderDashOffset: 0
    },
    scaleLabel: {
      display: !1,
      labelString: "",
      padding: {
        top: 4,
        bottom: 4
      }
    },
    ticks: {
      beginAtZero: !1,
      minRotation: 0,
      maxRotation: 50,
      mirror: !1,
      padding: 0,
      reverse: !1,
      display: !0,
      autoSkip: !0,
      autoSkipPadding: 0,
      labelOffset: 0,
      callback: on.formatters.values,
      minor: {},
      major: {}
    }
  });

  var xn = K.extend({
    zeroLineIndex: 0,
    getPadding: function getPadding() {
      return {
        left: this.paddingLeft || 0,
        top: this.paddingTop || 0,
        right: this.paddingRight || 0,
        bottom: this.paddingBottom || 0
      };
    },
    getTicks: function getTicks() {
      return this._ticks;
    },
    _getLabels: function _getLabels() {
      var t = this.chart.data;
      return this.options.labels || (this.isHorizontal() ? t.xLabels : t.yLabels) || t.labels || [];
    },
    mergeTicksOptions: function mergeTicksOptions() {},
    beforeUpdate: function beforeUpdate() {
      H.callback(this.options.beforeUpdate, [this]);
    },
    update: function update(t, e, n) {
      var i,
          a,
          r,
          o,
          s,
          l = this,
          u = l.options.ticks,
          d = u.sampleSize;
      if (l.beforeUpdate(), l.maxWidth = t, l.maxHeight = e, l.margins = H.extend({
        left: 0,
        right: 0,
        top: 0,
        bottom: 0
      }, n), l._ticks = null, l.ticks = null, l._labelSizes = null, l._maxLabelLines = 0, l.longestLabelWidth = 0, l.longestTextCache = l.longestTextCache || {}, l._gridLineItems = null, l._labelItems = null, l.beforeSetDimensions(), l.setDimensions(), l.afterSetDimensions(), l.beforeDataLimits(), l.determineDataLimits(), l.afterDataLimits(), l.beforeBuildTicks(), o = l.buildTicks() || [], (!(o = l.afterBuildTicks(o) || o) || !o.length) && l.ticks) for (o = [], i = 0, a = l.ticks.length; i < a; ++i) {
        o.push({
          value: l.ticks[i],
          major: !1
        });
      }
      return l._ticks = o, s = d < o.length, r = l._convertTicksToLabels(s ? function (t, e) {
        for (var n = [], i = t.length / e, a = 0, r = t.length; a < r; a += i) {
          n.push(t[Math.floor(a)]);
        }

        return n;
      }(o, d) : o), l._configure(), l.beforeCalculateTickRotation(), l.calculateTickRotation(), l.afterCalculateTickRotation(), l.beforeFit(), l.fit(), l.afterFit(), l._ticksToDraw = u.display && (u.autoSkip || "auto" === u.source) ? l._autoSkip(o) : o, s && (r = l._convertTicksToLabels(l._ticksToDraw)), l.ticks = r, l.afterUpdate(), l.minSize;
    },
    _configure: function _configure() {
      var t,
          e,
          n = this,
          i = n.options.ticks.reverse;
      n.isHorizontal() ? (t = n.left, e = n.right) : (t = n.top, e = n.bottom, i = !i), n._startPixel = t, n._endPixel = e, n._reversePixels = i, n._length = e - t;
    },
    afterUpdate: function afterUpdate() {
      H.callback(this.options.afterUpdate, [this]);
    },
    beforeSetDimensions: function beforeSetDimensions() {
      H.callback(this.options.beforeSetDimensions, [this]);
    },
    setDimensions: function setDimensions() {
      var t = this;
      t.isHorizontal() ? (t.width = t.maxWidth, t.left = 0, t.right = t.width) : (t.height = t.maxHeight, t.top = 0, t.bottom = t.height), t.paddingLeft = 0, t.paddingTop = 0, t.paddingRight = 0, t.paddingBottom = 0;
    },
    afterSetDimensions: function afterSetDimensions() {
      H.callback(this.options.afterSetDimensions, [this]);
    },
    beforeDataLimits: function beforeDataLimits() {
      H.callback(this.options.beforeDataLimits, [this]);
    },
    determineDataLimits: H.noop,
    afterDataLimits: function afterDataLimits() {
      H.callback(this.options.afterDataLimits, [this]);
    },
    beforeBuildTicks: function beforeBuildTicks() {
      H.callback(this.options.beforeBuildTicks, [this]);
    },
    buildTicks: H.noop,
    afterBuildTicks: function afterBuildTicks(t) {
      var e = this;
      return sn(t) && t.length ? H.callback(e.options.afterBuildTicks, [e, t]) : (e.ticks = H.callback(e.options.afterBuildTicks, [e, e.ticks]) || e.ticks, t);
    },
    beforeTickToLabelConversion: function beforeTickToLabelConversion() {
      H.callback(this.options.beforeTickToLabelConversion, [this]);
    },
    convertTicksToLabels: function convertTicksToLabels() {
      var t = this.options.ticks;
      this.ticks = this.ticks.map(t.userCallback || t.callback, this);
    },
    afterTickToLabelConversion: function afterTickToLabelConversion() {
      H.callback(this.options.afterTickToLabelConversion, [this]);
    },
    beforeCalculateTickRotation: function beforeCalculateTickRotation() {
      H.callback(this.options.beforeCalculateTickRotation, [this]);
    },
    calculateTickRotation: function calculateTickRotation() {
      var t,
          e,
          n,
          i,
          a,
          r,
          o,
          s = this,
          l = s.options,
          u = l.ticks,
          d = s.getTicks().length,
          h = u.minRotation || 0,
          c = u.maxRotation,
          f = h;
      !s._isVisible() || !u.display || h >= c || d <= 1 || !s.isHorizontal() ? s.labelRotation = h : (e = (t = s._getLabelSizes()).widest.width, n = t.highest.height - t.highest.offset, i = Math.min(s.maxWidth, s.chart.width - e), e + 6 > (a = l.offset ? s.maxWidth / d : i / (d - 1)) && (a = i / (d - (l.offset ? .5 : 1)), r = s.maxHeight - fn(l.gridLines) - u.padding - gn(l.scaleLabel), o = Math.sqrt(e * e + n * n), f = H.toDegrees(Math.min(Math.asin(Math.min((t.highest.height + 6) / a, 1)), Math.asin(Math.min(r / o, 1)) - Math.asin(n / o))), f = Math.max(h, Math.min(c, f))), s.labelRotation = f);
    },
    afterCalculateTickRotation: function afterCalculateTickRotation() {
      H.callback(this.options.afterCalculateTickRotation, [this]);
    },
    beforeFit: function beforeFit() {
      H.callback(this.options.beforeFit, [this]);
    },
    fit: function fit() {
      var t = this,
          e = t.minSize = {
        width: 0,
        height: 0
      },
          n = t.chart,
          i = t.options,
          a = i.ticks,
          r = i.scaleLabel,
          o = i.gridLines,
          s = t._isVisible(),
          l = "bottom" === i.position,
          u = t.isHorizontal();

      if (u ? e.width = t.maxWidth : s && (e.width = fn(o) + gn(r)), u ? s && (e.height = fn(o) + gn(r)) : e.height = t.maxHeight, a.display && s) {
        var d = mn(a),
            h = t._getLabelSizes(),
            c = h.first,
            f = h.last,
            g = h.widest,
            p = h.highest,
            m = .4 * d.minor.lineHeight,
            v = a.padding;

        if (u) {
          var b = 0 !== t.labelRotation,
              x = H.toRadians(t.labelRotation),
              y = Math.cos(x),
              _ = Math.sin(x),
              k = _ * g.width + y * (p.height - (b ? p.offset : 0)) + (b ? 0 : m);

          e.height = Math.min(t.maxHeight, e.height + k + v);
          var w,
              M,
              S = t.getPixelForTick(0) - t.left,
              C = t.right - t.getPixelForTick(t.getTicks().length - 1);
          b ? (w = l ? y * c.width + _ * c.offset : _ * (c.height - c.offset), M = l ? _ * (f.height - f.offset) : y * f.width + _ * f.offset) : (w = c.width / 2, M = f.width / 2), t.paddingLeft = Math.max((w - S) * t.width / (t.width - S), 0) + 3, t.paddingRight = Math.max((M - C) * t.width / (t.width - C), 0) + 3;
        } else {
          var P = a.mirror ? 0 : g.width + v + m;
          e.width = Math.min(t.maxWidth, e.width + P), t.paddingTop = c.height / 2, t.paddingBottom = f.height / 2;
        }
      }

      t.handleMargins(), u ? (t.width = t._length = n.width - t.margins.left - t.margins.right, t.height = e.height) : (t.width = e.width, t.height = t._length = n.height - t.margins.top - t.margins.bottom);
    },
    handleMargins: function handleMargins() {
      var t = this;
      t.margins && (t.margins.left = Math.max(t.paddingLeft, t.margins.left), t.margins.top = Math.max(t.paddingTop, t.margins.top), t.margins.right = Math.max(t.paddingRight, t.margins.right), t.margins.bottom = Math.max(t.paddingBottom, t.margins.bottom));
    },
    afterFit: function afterFit() {
      H.callback(this.options.afterFit, [this]);
    },
    isHorizontal: function isHorizontal() {
      var t = this.options.position;
      return "top" === t || "bottom" === t;
    },
    isFullWidth: function isFullWidth() {
      return this.options.fullWidth;
    },
    getRightValue: function getRightValue(t) {
      if (ln(t)) return NaN;
      if (("number" == typeof t || t instanceof Number) && !isFinite(t)) return NaN;
      if (t) if (this.isHorizontal()) {
        if (void 0 !== t.x) return this.getRightValue(t.x);
      } else if (void 0 !== t.y) return this.getRightValue(t.y);
      return t;
    },
    _convertTicksToLabels: function _convertTicksToLabels(t) {
      var e,
          n,
          i,
          a = this;

      for (a.ticks = t.map(function (t) {
        return t.value;
      }), a.beforeTickToLabelConversion(), e = a.convertTicksToLabels(t) || a.ticks, a.afterTickToLabelConversion(), n = 0, i = t.length; n < i; ++n) {
        t[n].label = e[n];
      }

      return e;
    },
    _getLabelSizes: function _getLabelSizes() {
      var t = this,
          e = t._labelSizes;
      return e || (t._labelSizes = e = cn(t.ctx, mn(t.options.ticks), t.getTicks(), t.longestTextCache), t.longestLabelWidth = e.widest.width), e;
    },
    _parseValue: function _parseValue(t) {
      var e, n, i, a;
      return sn(t) ? (e = +this.getRightValue(t[0]), n = +this.getRightValue(t[1]), i = Math.min(e, n), a = Math.max(e, n)) : (e = void 0, n = t = +this.getRightValue(t), i = t, a = t), {
        min: i,
        max: a,
        start: e,
        end: n
      };
    },
    _getScaleLabel: function _getScaleLabel(t) {
      var e = this._parseValue(t);

      return void 0 !== e.start ? "[" + e.start + ", " + e.end + "]" : +this.getRightValue(t);
    },
    getLabelForIndex: H.noop,
    getPixelForValue: H.noop,
    getValueForPixel: H.noop,
    getPixelForTick: function getPixelForTick(t) {
      var e = this.options.offset,
          n = this._ticks.length,
          i = 1 / Math.max(n - (e ? 0 : 1), 1);
      return t < 0 || t > n - 1 ? null : this.getPixelForDecimal(t * i + (e ? i / 2 : 0));
    },
    getPixelForDecimal: function getPixelForDecimal(t) {
      return this._reversePixels && (t = 1 - t), this._startPixel + t * this._length;
    },
    getDecimalForPixel: function getDecimalForPixel(t) {
      var e = (t - this._startPixel) / this._length;
      return this._reversePixels ? 1 - e : e;
    },
    getBasePixel: function getBasePixel() {
      return this.getPixelForValue(this.getBaseValue());
    },
    getBaseValue: function getBaseValue() {
      var t = this.min,
          e = this.max;
      return this.beginAtZero ? 0 : t < 0 && e < 0 ? e : t > 0 && e > 0 ? t : 0;
    },
    _autoSkip: function _autoSkip(t) {
      var e,
          n,
          i,
          a,
          r = this.options.ticks,
          o = this._length,
          s = r.maxTicksLimit || o / this._tickSize() + 1,
          l = r.major.enabled ? function (t) {
        var e,
            n,
            i = [];

        for (e = 0, n = t.length; e < n; e++) {
          t[e].major && i.push(e);
        }

        return i;
      }(t) : [],
          u = l.length,
          d = l[0],
          h = l[u - 1];
      if (u > s) return function (t, e, n) {
        var i,
            a,
            r = 0,
            o = e[0];

        for (n = Math.ceil(n), i = 0; i < t.length; i++) {
          a = t[i], i === o ? (a._index = i, o = e[++r * n]) : delete a.label;
        }
      }(t, l, u / s), vn(t);

      if (i = function (t, e, n, i) {
        var a,
            r,
            o,
            s,
            l = function (t) {
          var e,
              n,
              i = t.length;
          if (i < 2) return !1;

          for (n = t[0], e = 1; e < i; ++e) {
            if (t[e] - t[e - 1] !== n) return !1;
          }

          return n;
        }(t),
            u = (e.length - 1) / i;

        if (!l) return Math.max(u, 1);

        for (o = 0, s = (a = H.math._factorize(l)).length - 1; o < s; o++) {
          if ((r = a[o]) > u) return r;
        }

        return Math.max(u, 1);
      }(l, t, 0, s), u > 0) {
        for (e = 0, n = u - 1; e < n; e++) {
          bn(t, i, l[e], l[e + 1]);
        }

        return a = u > 1 ? (h - d) / (u - 1) : null, bn(t, i, H.isNullOrUndef(a) ? 0 : d - a, d), bn(t, i, h, H.isNullOrUndef(a) ? t.length : h + a), vn(t);
      }

      return bn(t, i), vn(t);
    },
    _tickSize: function _tickSize() {
      var t = this.options.ticks,
          e = H.toRadians(this.labelRotation),
          n = Math.abs(Math.cos(e)),
          i = Math.abs(Math.sin(e)),
          a = this._getLabelSizes(),
          r = t.autoSkipPadding || 0,
          o = a ? a.widest.width + r : 0,
          s = a ? a.highest.height + r : 0;

      return this.isHorizontal() ? s * n > o * i ? o / n : s / i : s * i < o * n ? s / n : o / i;
    },
    _isVisible: function _isVisible() {
      var t,
          e,
          n,
          i = this.chart,
          a = this.options.display;
      if ("auto" !== a) return !!a;

      for (t = 0, e = i.data.datasets.length; t < e; ++t) {
        if (i.isDatasetVisible(t) && ((n = i.getDatasetMeta(t)).xAxisID === this.id || n.yAxisID === this.id)) return !0;
      }

      return !1;
    },
    _computeGridLineItems: function _computeGridLineItems(t) {
      var e,
          n,
          i,
          a,
          r,
          o,
          s,
          l,
          u,
          d,
          h,
          c,
          f,
          g,
          p,
          m,
          v,
          b = this,
          x = b.chart,
          y = b.options,
          _ = y.gridLines,
          k = y.position,
          w = _.offsetGridLines,
          M = b.isHorizontal(),
          S = b._ticksToDraw,
          C = S.length + (w ? 1 : 0),
          P = fn(_),
          A = [],
          D = _.drawBorder ? dn(_.lineWidth, 0, 0) : 0,
          T = D / 2,
          I = H._alignPixel,
          F = function F(t) {
        return I(x, t, D);
      };

      for ("top" === k ? (e = F(b.bottom), s = b.bottom - P, u = e - T, h = F(t.top) + T, f = t.bottom) : "bottom" === k ? (e = F(b.top), h = t.top, f = F(t.bottom) - T, s = e + T, u = b.top + P) : "left" === k ? (e = F(b.right), o = b.right - P, l = e - T, d = F(t.left) + T, c = t.right) : (e = F(b.left), d = t.left, c = F(t.right) - T, o = e + T, l = b.left + P), n = 0; n < C; ++n) {
        i = S[n] || {}, ln(i.label) && n < S.length || (n === b.zeroLineIndex && y.offset === w ? (g = _.zeroLineWidth, p = _.zeroLineColor, m = _.zeroLineBorderDash || [], v = _.zeroLineBorderDashOffset || 0) : (g = dn(_.lineWidth, n, 1), p = dn(_.color, n, "rgba(0,0,0,0.1)"), m = _.borderDash || [], v = _.borderDashOffset || 0), void 0 !== (a = hn(b, i._index || n, w)) && (r = I(x, a, g), M ? o = l = d = c = r : s = u = h = f = r, A.push({
          tx1: o,
          ty1: s,
          tx2: l,
          ty2: u,
          x1: d,
          y1: h,
          x2: c,
          y2: f,
          width: g,
          color: p,
          borderDash: m,
          borderDashOffset: v
        })));
      }

      return A.ticksLength = C, A.borderValue = e, A;
    },
    _computeLabelItems: function _computeLabelItems() {
      var t,
          e,
          n,
          i,
          a,
          r,
          o,
          s,
          l,
          u,
          d,
          h,
          c = this,
          f = c.options,
          g = f.ticks,
          p = f.position,
          m = g.mirror,
          v = c.isHorizontal(),
          b = c._ticksToDraw,
          x = mn(g),
          y = g.padding,
          _ = fn(f.gridLines),
          k = -H.toRadians(c.labelRotation),
          w = [];

      for ("top" === p ? (r = c.bottom - _ - y, o = k ? "left" : "center") : "bottom" === p ? (r = c.top + _ + y, o = k ? "right" : "center") : "left" === p ? (a = c.right - (m ? 0 : _) - y, o = m ? "left" : "right") : (a = c.left + (m ? 0 : _) + y, o = m ? "right" : "left"), t = 0, e = b.length; t < e; ++t) {
        i = (n = b[t]).label, ln(i) || (s = c.getPixelForTick(n._index || t) + g.labelOffset, u = (l = n.major ? x.major : x.minor).lineHeight, d = sn(i) ? i.length : 1, v ? (a = s, h = "top" === p ? ((k ? 1 : .5) - d) * u : (k ? 0 : .5) * u) : (r = s, h = (1 - d) * u / 2), w.push({
          x: a,
          y: r,
          rotation: k,
          label: i,
          font: l,
          textOffset: h,
          textAlign: o
        }));
      }

      return w;
    },
    _drawGrid: function _drawGrid(t) {
      var e = this,
          n = e.options.gridLines;

      if (n.display) {
        var i,
            a,
            r,
            o,
            s,
            l = e.ctx,
            u = e.chart,
            d = H._alignPixel,
            h = n.drawBorder ? dn(n.lineWidth, 0, 0) : 0,
            c = e._gridLineItems || (e._gridLineItems = e._computeGridLineItems(t));

        for (r = 0, o = c.length; r < o; ++r) {
          i = (s = c[r]).width, a = s.color, i && a && (l.save(), l.lineWidth = i, l.strokeStyle = a, l.setLineDash && (l.setLineDash(s.borderDash), l.lineDashOffset = s.borderDashOffset), l.beginPath(), n.drawTicks && (l.moveTo(s.tx1, s.ty1), l.lineTo(s.tx2, s.ty2)), n.drawOnChartArea && (l.moveTo(s.x1, s.y1), l.lineTo(s.x2, s.y2)), l.stroke(), l.restore());
        }

        if (h) {
          var f,
              g,
              p,
              m,
              v = h,
              b = dn(n.lineWidth, c.ticksLength - 1, 1),
              x = c.borderValue;
          e.isHorizontal() ? (f = d(u, e.left, v) - v / 2, g = d(u, e.right, b) + b / 2, p = m = x) : (p = d(u, e.top, v) - v / 2, m = d(u, e.bottom, b) + b / 2, f = g = x), l.lineWidth = h, l.strokeStyle = dn(n.color, 0), l.beginPath(), l.moveTo(f, p), l.lineTo(g, m), l.stroke();
        }
      }
    },
    _drawLabels: function _drawLabels() {
      var t = this;

      if (t.options.ticks.display) {
        var e,
            n,
            i,
            a,
            r,
            o,
            s,
            l,
            u = t.ctx,
            d = t._labelItems || (t._labelItems = t._computeLabelItems());

        for (e = 0, i = d.length; e < i; ++e) {
          if (o = (r = d[e]).font, u.save(), u.translate(r.x, r.y), u.rotate(r.rotation), u.font = o.string, u.fillStyle = o.color, u.textBaseline = "middle", u.textAlign = r.textAlign, s = r.label, l = r.textOffset, sn(s)) for (n = 0, a = s.length; n < a; ++n) {
            u.fillText("" + s[n], 0, l), l += o.lineHeight;
          } else u.fillText(s, 0, l);
          u.restore();
        }
      }
    },
    _drawTitle: function _drawTitle() {
      var t = this,
          e = t.ctx,
          n = t.options,
          i = n.scaleLabel;

      if (i.display) {
        var a,
            r,
            o = un(i.fontColor, N.global.defaultFontColor),
            s = H.options._parseFont(i),
            l = H.options.toPadding(i.padding),
            u = s.lineHeight / 2,
            d = n.position,
            h = 0;

        if (t.isHorizontal()) a = t.left + t.width / 2, r = "bottom" === d ? t.bottom - u - l.bottom : t.top + u + l.top;else {
          var c = "left" === d;
          a = c ? t.left + u + l.top : t.right - u - l.top, r = t.top + t.height / 2, h = c ? -.5 * Math.PI : .5 * Math.PI;
        }
        e.save(), e.translate(a, r), e.rotate(h), e.textAlign = "center", e.textBaseline = "middle", e.fillStyle = o, e.font = s.string, e.fillText(i.labelString, 0, 0), e.restore();
      }
    },
    draw: function draw(t) {
      this._isVisible() && (this._drawGrid(t), this._drawTitle(), this._drawLabels());
    },
    _layers: function _layers() {
      var t = this,
          e = t.options,
          n = e.ticks && e.ticks.z || 0,
          i = e.gridLines && e.gridLines.z || 0;
      return t._isVisible() && n !== i && t.draw === t._draw ? [{
        z: i,
        draw: function draw() {
          t._drawGrid.apply(t, arguments), t._drawTitle.apply(t, arguments);
        }
      }, {
        z: n,
        draw: function draw() {
          t._drawLabels.apply(t, arguments);
        }
      }] : [{
        z: n,
        draw: function draw() {
          t.draw.apply(t, arguments);
        }
      }];
    },
    _getMatchingVisibleMetas: function _getMatchingVisibleMetas(t) {
      var e = this,
          n = e.isHorizontal();
      return e.chart._getSortedVisibleDatasetMetas().filter(function (i) {
        return (!t || i.type === t) && (n ? i.xAxisID === e.id : i.yAxisID === e.id);
      });
    }
  });
  xn.prototype._draw = xn.prototype.draw;
  var yn = xn,
      _n = H.isNullOrUndef,
      kn = yn.extend({
    determineDataLimits: function determineDataLimits() {
      var t,
          e = this,
          n = e._getLabels(),
          i = e.options.ticks,
          a = i.min,
          r = i.max,
          o = 0,
          s = n.length - 1;

      void 0 !== a && (t = n.indexOf(a)) >= 0 && (o = t), void 0 !== r && (t = n.indexOf(r)) >= 0 && (s = t), e.minIndex = o, e.maxIndex = s, e.min = n[o], e.max = n[s];
    },
    buildTicks: function buildTicks() {
      var t = this._getLabels(),
          e = this.minIndex,
          n = this.maxIndex;

      this.ticks = 0 === e && n === t.length - 1 ? t : t.slice(e, n + 1);
    },
    getLabelForIndex: function getLabelForIndex(t, e) {
      var n = this.chart;
      return n.getDatasetMeta(e).controller._getValueScaleId() === this.id ? this.getRightValue(n.data.datasets[e].data[t]) : this._getLabels()[t];
    },
    _configure: function _configure() {
      var t = this,
          e = t.options.offset,
          n = t.ticks;
      yn.prototype._configure.call(t), t.isHorizontal() || (t._reversePixels = !t._reversePixels), n && (t._startValue = t.minIndex - (e ? .5 : 0), t._valueRange = Math.max(n.length - (e ? 0 : 1), 1));
    },
    getPixelForValue: function getPixelForValue(t, e, n) {
      var i,
          a,
          r,
          o = this;
      return _n(e) || _n(n) || (t = o.chart.data.datasets[n].data[e]), _n(t) || (i = o.isHorizontal() ? t.x : t.y), (void 0 !== i || void 0 !== t && isNaN(e)) && (a = o._getLabels(), t = H.valueOrDefault(i, t), e = -1 !== (r = a.indexOf(t)) ? r : e, isNaN(e) && (e = t)), o.getPixelForDecimal((e - o._startValue) / o._valueRange);
    },
    getPixelForTick: function getPixelForTick(t) {
      var e = this.ticks;
      return t < 0 || t > e.length - 1 ? null : this.getPixelForValue(e[t], t + this.minIndex);
    },
    getValueForPixel: function getValueForPixel(t) {
      var e = Math.round(this._startValue + this.getDecimalForPixel(t) * this._valueRange);
      return Math.min(Math.max(e, 0), this.ticks.length - 1);
    },
    getBasePixel: function getBasePixel() {
      return this.bottom;
    }
  }),
      wn = {
    position: "bottom"
  };
  kn._defaults = wn;
  var Mn = H.noop,
      Sn = H.isNullOrUndef;
  var Cn = yn.extend({
    getRightValue: function getRightValue(t) {
      return "string" == typeof t ? +t : yn.prototype.getRightValue.call(this, t);
    },
    handleTickRangeOptions: function handleTickRangeOptions() {
      var t = this,
          e = t.options.ticks;

      if (e.beginAtZero) {
        var n = H.sign(t.min),
            i = H.sign(t.max);
        n < 0 && i < 0 ? t.max = 0 : n > 0 && i > 0 && (t.min = 0);
      }

      var a = void 0 !== e.min || void 0 !== e.suggestedMin,
          r = void 0 !== e.max || void 0 !== e.suggestedMax;
      void 0 !== e.min ? t.min = e.min : void 0 !== e.suggestedMin && (null === t.min ? t.min = e.suggestedMin : t.min = Math.min(t.min, e.suggestedMin)), void 0 !== e.max ? t.max = e.max : void 0 !== e.suggestedMax && (null === t.max ? t.max = e.suggestedMax : t.max = Math.max(t.max, e.suggestedMax)), a !== r && t.min >= t.max && (a ? t.max = t.min + 1 : t.min = t.max - 1), t.min === t.max && (t.max++, e.beginAtZero || t.min--);
    },
    getTickLimit: function getTickLimit() {
      var t,
          e = this.options.ticks,
          n = e.stepSize,
          i = e.maxTicksLimit;
      return n ? t = Math.ceil(this.max / n) - Math.floor(this.min / n) + 1 : (t = this._computeTickLimit(), i = i || 11), i && (t = Math.min(i, t)), t;
    },
    _computeTickLimit: function _computeTickLimit() {
      return Number.POSITIVE_INFINITY;
    },
    handleDirectionalChanges: Mn,
    buildTicks: function buildTicks() {
      var t = this,
          e = t.options.ticks,
          n = t.getTickLimit(),
          i = {
        maxTicks: n = Math.max(2, n),
        min: e.min,
        max: e.max,
        precision: e.precision,
        stepSize: H.valueOrDefault(e.fixedStepSize, e.stepSize)
      },
          a = t.ticks = function (t, e) {
        var n,
            i,
            a,
            r,
            o = [],
            s = t.stepSize,
            l = s || 1,
            u = t.maxTicks - 1,
            d = t.min,
            h = t.max,
            c = t.precision,
            f = e.min,
            g = e.max,
            p = H.niceNum((g - f) / u / l) * l;
        if (p < 1e-14 && Sn(d) && Sn(h)) return [f, g];
        (r = Math.ceil(g / p) - Math.floor(f / p)) > u && (p = H.niceNum(r * p / u / l) * l), s || Sn(c) ? n = Math.pow(10, H._decimalPlaces(p)) : (n = Math.pow(10, c), p = Math.ceil(p * n) / n), i = Math.floor(f / p) * p, a = Math.ceil(g / p) * p, s && (!Sn(d) && H.almostWhole(d / p, p / 1e3) && (i = d), !Sn(h) && H.almostWhole(h / p, p / 1e3) && (a = h)), r = (a - i) / p, r = H.almostEquals(r, Math.round(r), p / 1e3) ? Math.round(r) : Math.ceil(r), i = Math.round(i * n) / n, a = Math.round(a * n) / n, o.push(Sn(d) ? i : d);

        for (var m = 1; m < r; ++m) {
          o.push(Math.round((i + m * p) * n) / n);
        }

        return o.push(Sn(h) ? a : h), o;
      }(i, t);

      t.handleDirectionalChanges(), t.max = H.max(a), t.min = H.min(a), e.reverse ? (a.reverse(), t.start = t.max, t.end = t.min) : (t.start = t.min, t.end = t.max);
    },
    convertTicksToLabels: function convertTicksToLabels() {
      var t = this;
      t.ticksAsNumbers = t.ticks.slice(), t.zeroLineIndex = t.ticks.indexOf(0), yn.prototype.convertTicksToLabels.call(t);
    },
    _configure: function _configure() {
      var t,
          e = this,
          n = e.getTicks(),
          i = e.min,
          a = e.max;
      yn.prototype._configure.call(e), e.options.offset && n.length && (i -= t = (a - i) / Math.max(n.length - 1, 1) / 2, a += t), e._startValue = i, e._endValue = a, e._valueRange = a - i;
    }
  }),
      Pn = {
    position: "left",
    ticks: {
      callback: on.formatters.linear
    }
  };

  function An(t, e, n, i) {
    var a,
        r,
        o = t.options,
        s = function (t, e, n) {
      var i = [n.type, void 0 === e && void 0 === n.stack ? n.index : "", n.stack].join(".");
      return void 0 === t[i] && (t[i] = {
        pos: [],
        neg: []
      }), t[i];
    }(e, o.stacked, n),
        l = s.pos,
        u = s.neg,
        d = i.length;

    for (a = 0; a < d; ++a) {
      r = t._parseValue(i[a]), isNaN(r.min) || isNaN(r.max) || n.data[a].hidden || (l[a] = l[a] || 0, u[a] = u[a] || 0, o.relativePoints ? l[a] = 100 : r.min < 0 || r.max < 0 ? u[a] += r.min : l[a] += r.max);
    }
  }

  function Dn(t, e, n) {
    var i,
        a,
        r = n.length;

    for (i = 0; i < r; ++i) {
      a = t._parseValue(n[i]), isNaN(a.min) || isNaN(a.max) || e.data[i].hidden || (t.min = Math.min(t.min, a.min), t.max = Math.max(t.max, a.max));
    }
  }

  var Tn = Cn.extend({
    determineDataLimits: function determineDataLimits() {
      var t,
          e,
          n,
          i,
          a = this,
          r = a.options,
          o = a.chart.data.datasets,
          s = a._getMatchingVisibleMetas(),
          l = r.stacked,
          u = {},
          d = s.length;

      if (a.min = Number.POSITIVE_INFINITY, a.max = Number.NEGATIVE_INFINITY, void 0 === l) for (t = 0; !l && t < d; ++t) {
        l = void 0 !== (e = s[t]).stack;
      }

      for (t = 0; t < d; ++t) {
        n = o[(e = s[t]).index].data, l ? An(a, u, e, n) : Dn(a, e, n);
      }

      H.each(u, function (t) {
        i = t.pos.concat(t.neg), a.min = Math.min(a.min, H.min(i)), a.max = Math.max(a.max, H.max(i));
      }), a.min = H.isFinite(a.min) && !isNaN(a.min) ? a.min : 0, a.max = H.isFinite(a.max) && !isNaN(a.max) ? a.max : 1, a.handleTickRangeOptions();
    },
    _computeTickLimit: function _computeTickLimit() {
      var t;
      return this.isHorizontal() ? Math.ceil(this.width / 40) : (t = H.options._parseFont(this.options.ticks), Math.ceil(this.height / t.lineHeight));
    },
    handleDirectionalChanges: function handleDirectionalChanges() {
      this.isHorizontal() || this.ticks.reverse();
    },
    getLabelForIndex: function getLabelForIndex(t, e) {
      return this._getScaleLabel(this.chart.data.datasets[e].data[t]);
    },
    getPixelForValue: function getPixelForValue(t) {
      return this.getPixelForDecimal((+this.getRightValue(t) - this._startValue) / this._valueRange);
    },
    getValueForPixel: function getValueForPixel(t) {
      return this._startValue + this.getDecimalForPixel(t) * this._valueRange;
    },
    getPixelForTick: function getPixelForTick(t) {
      var e = this.ticksAsNumbers;
      return t < 0 || t > e.length - 1 ? null : this.getPixelForValue(e[t]);
    }
  }),
      In = Pn;
  Tn._defaults = In;
  var Fn = H.valueOrDefault,
      On = H.math.log10;
  var Ln = {
    position: "left",
    ticks: {
      callback: on.formatters.logarithmic
    }
  };

  function Rn(t, e) {
    return H.isFinite(t) && t >= 0 ? t : e;
  }

  var zn = yn.extend({
    determineDataLimits: function determineDataLimits() {
      var t,
          e,
          n,
          i,
          a,
          r,
          o = this,
          s = o.options,
          l = o.chart,
          u = l.data.datasets,
          d = o.isHorizontal();

      function h(t) {
        return d ? t.xAxisID === o.id : t.yAxisID === o.id;
      }

      o.min = Number.POSITIVE_INFINITY, o.max = Number.NEGATIVE_INFINITY, o.minNotZero = Number.POSITIVE_INFINITY;
      var c = s.stacked;
      if (void 0 === c) for (t = 0; t < u.length; t++) {
        if (e = l.getDatasetMeta(t), l.isDatasetVisible(t) && h(e) && void 0 !== e.stack) {
          c = !0;
          break;
        }
      }

      if (s.stacked || c) {
        var f = {};

        for (t = 0; t < u.length; t++) {
          var g = [(e = l.getDatasetMeta(t)).type, void 0 === s.stacked && void 0 === e.stack ? t : "", e.stack].join(".");
          if (l.isDatasetVisible(t) && h(e)) for (void 0 === f[g] && (f[g] = []), a = 0, r = (i = u[t].data).length; a < r; a++) {
            var p = f[g];
            n = o._parseValue(i[a]), isNaN(n.min) || isNaN(n.max) || e.data[a].hidden || n.min < 0 || n.max < 0 || (p[a] = p[a] || 0, p[a] += n.max);
          }
        }

        H.each(f, function (t) {
          if (t.length > 0) {
            var e = H.min(t),
                n = H.max(t);
            o.min = Math.min(o.min, e), o.max = Math.max(o.max, n);
          }
        });
      } else for (t = 0; t < u.length; t++) {
        if (e = l.getDatasetMeta(t), l.isDatasetVisible(t) && h(e)) for (a = 0, r = (i = u[t].data).length; a < r; a++) {
          n = o._parseValue(i[a]), isNaN(n.min) || isNaN(n.max) || e.data[a].hidden || n.min < 0 || n.max < 0 || (o.min = Math.min(n.min, o.min), o.max = Math.max(n.max, o.max), 0 !== n.min && (o.minNotZero = Math.min(n.min, o.minNotZero)));
        }
      }

      o.min = H.isFinite(o.min) ? o.min : null, o.max = H.isFinite(o.max) ? o.max : null, o.minNotZero = H.isFinite(o.minNotZero) ? o.minNotZero : null, this.handleTickRangeOptions();
    },
    handleTickRangeOptions: function handleTickRangeOptions() {
      var t = this,
          e = t.options.ticks;
      t.min = Rn(e.min, t.min), t.max = Rn(e.max, t.max), t.min === t.max && (0 !== t.min && null !== t.min ? (t.min = Math.pow(10, Math.floor(On(t.min)) - 1), t.max = Math.pow(10, Math.floor(On(t.max)) + 1)) : (t.min = 1, t.max = 10)), null === t.min && (t.min = Math.pow(10, Math.floor(On(t.max)) - 1)), null === t.max && (t.max = 0 !== t.min ? Math.pow(10, Math.floor(On(t.min)) + 1) : 10), null === t.minNotZero && (t.min > 0 ? t.minNotZero = t.min : t.max < 1 ? t.minNotZero = Math.pow(10, Math.floor(On(t.max))) : t.minNotZero = 1);
    },
    buildTicks: function buildTicks() {
      var t = this,
          e = t.options.ticks,
          n = !t.isHorizontal(),
          i = {
        min: Rn(e.min),
        max: Rn(e.max)
      },
          a = t.ticks = function (t, e) {
        var n,
            i,
            a = [],
            r = Fn(t.min, Math.pow(10, Math.floor(On(e.min)))),
            o = Math.floor(On(e.max)),
            s = Math.ceil(e.max / Math.pow(10, o));
        0 === r ? (n = Math.floor(On(e.minNotZero)), i = Math.floor(e.minNotZero / Math.pow(10, n)), a.push(r), r = i * Math.pow(10, n)) : (n = Math.floor(On(r)), i = Math.floor(r / Math.pow(10, n)));
        var l = n < 0 ? Math.pow(10, Math.abs(n)) : 1;

        do {
          a.push(r), 10 === ++i && (i = 1, l = ++n >= 0 ? 1 : l), r = Math.round(i * Math.pow(10, n) * l) / l;
        } while (n < o || n === o && i < s);

        var u = Fn(t.max, r);
        return a.push(u), a;
      }(i, t);

      t.max = H.max(a), t.min = H.min(a), e.reverse ? (n = !n, t.start = t.max, t.end = t.min) : (t.start = t.min, t.end = t.max), n && a.reverse();
    },
    convertTicksToLabels: function convertTicksToLabels() {
      this.tickValues = this.ticks.slice(), yn.prototype.convertTicksToLabels.call(this);
    },
    getLabelForIndex: function getLabelForIndex(t, e) {
      return this._getScaleLabel(this.chart.data.datasets[e].data[t]);
    },
    getPixelForTick: function getPixelForTick(t) {
      var e = this.tickValues;
      return t < 0 || t > e.length - 1 ? null : this.getPixelForValue(e[t]);
    },
    _getFirstTickValue: function _getFirstTickValue(t) {
      var e = Math.floor(On(t));
      return Math.floor(t / Math.pow(10, e)) * Math.pow(10, e);
    },
    _configure: function _configure() {
      var t = this,
          e = t.min,
          n = 0;
      yn.prototype._configure.call(t), 0 === e && (e = t._getFirstTickValue(t.minNotZero), n = Fn(t.options.ticks.fontSize, N.global.defaultFontSize) / t._length), t._startValue = On(e), t._valueOffset = n, t._valueRange = (On(t.max) - On(e)) / (1 - n);
    },
    getPixelForValue: function getPixelForValue(t) {
      var e = this,
          n = 0;
      return (t = +e.getRightValue(t)) > e.min && t > 0 && (n = (On(t) - e._startValue) / e._valueRange + e._valueOffset), e.getPixelForDecimal(n);
    },
    getValueForPixel: function getValueForPixel(t) {
      var e = this,
          n = e.getDecimalForPixel(t);
      return 0 === n && 0 === e.min ? 0 : Math.pow(10, e._startValue + (n - e._valueOffset) * e._valueRange);
    }
  }),
      Nn = Ln;
  zn._defaults = Nn;
  var Bn = H.valueOrDefault,
      En = H.valueAtIndexOrDefault,
      Wn = H.options.resolve,
      Vn = {
    display: !0,
    animate: !0,
    position: "chartArea",
    angleLines: {
      display: !0,
      color: "rgba(0,0,0,0.1)",
      lineWidth: 1,
      borderDash: [],
      borderDashOffset: 0
    },
    gridLines: {
      circular: !1
    },
    ticks: {
      showLabelBackdrop: !0,
      backdropColor: "rgba(255,255,255,0.75)",
      backdropPaddingY: 2,
      backdropPaddingX: 2,
      callback: on.formatters.linear
    },
    pointLabels: {
      display: !0,
      fontSize: 10,
      callback: function callback(t) {
        return t;
      }
    }
  };

  function Hn(t) {
    var e = t.ticks;
    return e.display && t.display ? Bn(e.fontSize, N.global.defaultFontSize) + 2 * e.backdropPaddingY : 0;
  }

  function jn(t, e, n, i, a) {
    return t === i || t === a ? {
      start: e - n / 2,
      end: e + n / 2
    } : t < i || t > a ? {
      start: e - n,
      end: e
    } : {
      start: e,
      end: e + n
    };
  }

  function qn(t) {
    return 0 === t || 180 === t ? "center" : t < 180 ? "left" : "right";
  }

  function Un(t, e, n, i) {
    var a,
        r,
        o = n.y + i / 2;
    if (H.isArray(e)) for (a = 0, r = e.length; a < r; ++a) {
      t.fillText(e[a], n.x, o), o += i;
    } else t.fillText(e, n.x, o);
  }

  function Yn(t, e, n) {
    90 === t || 270 === t ? n.y -= e.h / 2 : (t > 270 || t < 90) && (n.y -= e.h);
  }

  function Gn(t) {
    return H.isNumber(t) ? t : 0;
  }

  var Xn = Cn.extend({
    setDimensions: function setDimensions() {
      var t = this;
      t.width = t.maxWidth, t.height = t.maxHeight, t.paddingTop = Hn(t.options) / 2, t.xCenter = Math.floor(t.width / 2), t.yCenter = Math.floor((t.height - t.paddingTop) / 2), t.drawingArea = Math.min(t.height - t.paddingTop, t.width) / 2;
    },
    determineDataLimits: function determineDataLimits() {
      var t = this,
          e = t.chart,
          n = Number.POSITIVE_INFINITY,
          i = Number.NEGATIVE_INFINITY;
      H.each(e.data.datasets, function (a, r) {
        if (e.isDatasetVisible(r)) {
          var o = e.getDatasetMeta(r);
          H.each(a.data, function (e, a) {
            var r = +t.getRightValue(e);
            isNaN(r) || o.data[a].hidden || (n = Math.min(r, n), i = Math.max(r, i));
          });
        }
      }), t.min = n === Number.POSITIVE_INFINITY ? 0 : n, t.max = i === Number.NEGATIVE_INFINITY ? 0 : i, t.handleTickRangeOptions();
    },
    _computeTickLimit: function _computeTickLimit() {
      return Math.ceil(this.drawingArea / Hn(this.options));
    },
    convertTicksToLabels: function convertTicksToLabels() {
      var t = this;
      Cn.prototype.convertTicksToLabels.call(t), t.pointLabels = t.chart.data.labels.map(function () {
        var e = H.callback(t.options.pointLabels.callback, arguments, t);
        return e || 0 === e ? e : "";
      });
    },
    getLabelForIndex: function getLabelForIndex(t, e) {
      return +this.getRightValue(this.chart.data.datasets[e].data[t]);
    },
    fit: function fit() {
      var t = this.options;
      t.display && t.pointLabels.display ? function (t) {
        var e,
            n,
            i,
            a = H.options._parseFont(t.options.pointLabels),
            r = {
          l: 0,
          r: t.width,
          t: 0,
          b: t.height - t.paddingTop
        },
            o = {};

        t.ctx.font = a.string, t._pointLabelSizes = [];
        var s,
            l,
            u,
            d = t.chart.data.labels.length;

        for (e = 0; e < d; e++) {
          i = t.getPointPosition(e, t.drawingArea + 5), s = t.ctx, l = a.lineHeight, u = t.pointLabels[e], n = H.isArray(u) ? {
            w: H.longestText(s, s.font, u),
            h: u.length * l
          } : {
            w: s.measureText(u).width,
            h: l
          }, t._pointLabelSizes[e] = n;
          var h = t.getIndexAngle(e),
              c = H.toDegrees(h) % 360,
              f = jn(c, i.x, n.w, 0, 180),
              g = jn(c, i.y, n.h, 90, 270);
          f.start < r.l && (r.l = f.start, o.l = h), f.end > r.r && (r.r = f.end, o.r = h), g.start < r.t && (r.t = g.start, o.t = h), g.end > r.b && (r.b = g.end, o.b = h);
        }

        t.setReductions(t.drawingArea, r, o);
      }(this) : this.setCenterPoint(0, 0, 0, 0);
    },
    setReductions: function setReductions(t, e, n) {
      var i = this,
          a = e.l / Math.sin(n.l),
          r = Math.max(e.r - i.width, 0) / Math.sin(n.r),
          o = -e.t / Math.cos(n.t),
          s = -Math.max(e.b - (i.height - i.paddingTop), 0) / Math.cos(n.b);
      a = Gn(a), r = Gn(r), o = Gn(o), s = Gn(s), i.drawingArea = Math.min(Math.floor(t - (a + r) / 2), Math.floor(t - (o + s) / 2)), i.setCenterPoint(a, r, o, s);
    },
    setCenterPoint: function setCenterPoint(t, e, n, i) {
      var a = this,
          r = a.width - e - a.drawingArea,
          o = t + a.drawingArea,
          s = n + a.drawingArea,
          l = a.height - a.paddingTop - i - a.drawingArea;
      a.xCenter = Math.floor((o + r) / 2 + a.left), a.yCenter = Math.floor((s + l) / 2 + a.top + a.paddingTop);
    },
    getIndexAngle: function getIndexAngle(t) {
      var e = this.chart,
          n = (t * (360 / e.data.labels.length) + ((e.options || {}).startAngle || 0)) % 360;
      return (n < 0 ? n + 360 : n) * Math.PI * 2 / 360;
    },
    getDistanceFromCenterForValue: function getDistanceFromCenterForValue(t) {
      var e = this;
      if (H.isNullOrUndef(t)) return NaN;
      var n = e.drawingArea / (e.max - e.min);
      return e.options.ticks.reverse ? (e.max - t) * n : (t - e.min) * n;
    },
    getPointPosition: function getPointPosition(t, e) {
      var n = this.getIndexAngle(t) - Math.PI / 2;
      return {
        x: Math.cos(n) * e + this.xCenter,
        y: Math.sin(n) * e + this.yCenter
      };
    },
    getPointPositionForValue: function getPointPositionForValue(t, e) {
      return this.getPointPosition(t, this.getDistanceFromCenterForValue(e));
    },
    getBasePosition: function getBasePosition(t) {
      var e = this.min,
          n = this.max;
      return this.getPointPositionForValue(t || 0, this.beginAtZero ? 0 : e < 0 && n < 0 ? n : e > 0 && n > 0 ? e : 0);
    },
    _drawGrid: function _drawGrid() {
      var t,
          e,
          n,
          i = this,
          a = i.ctx,
          r = i.options,
          o = r.gridLines,
          s = r.angleLines,
          l = Bn(s.lineWidth, o.lineWidth),
          u = Bn(s.color, o.color);

      if (r.pointLabels.display && function (t) {
        var e = t.ctx,
            n = t.options,
            i = n.pointLabels,
            a = Hn(n),
            r = t.getDistanceFromCenterForValue(n.ticks.reverse ? t.min : t.max),
            o = H.options._parseFont(i);

        e.save(), e.font = o.string, e.textBaseline = "middle";

        for (var s = t.chart.data.labels.length - 1; s >= 0; s--) {
          var l = 0 === s ? a / 2 : 0,
              u = t.getPointPosition(s, r + l + 5),
              d = En(i.fontColor, s, N.global.defaultFontColor);
          e.fillStyle = d;
          var h = t.getIndexAngle(s),
              c = H.toDegrees(h);
          e.textAlign = qn(c), Yn(c, t._pointLabelSizes[s], u), Un(e, t.pointLabels[s], u, o.lineHeight);
        }

        e.restore();
      }(i), o.display && H.each(i.ticks, function (t, n) {
        0 !== n && (e = i.getDistanceFromCenterForValue(i.ticksAsNumbers[n]), function (t, e, n, i) {
          var a,
              r = t.ctx,
              o = e.circular,
              s = t.chart.data.labels.length,
              l = En(e.color, i - 1),
              u = En(e.lineWidth, i - 1);

          if ((o || s) && l && u) {
            if (r.save(), r.strokeStyle = l, r.lineWidth = u, r.setLineDash && (r.setLineDash(e.borderDash || []), r.lineDashOffset = e.borderDashOffset || 0), r.beginPath(), o) r.arc(t.xCenter, t.yCenter, n, 0, 2 * Math.PI);else {
              a = t.getPointPosition(0, n), r.moveTo(a.x, a.y);

              for (var d = 1; d < s; d++) {
                a = t.getPointPosition(d, n), r.lineTo(a.x, a.y);
              }
            }
            r.closePath(), r.stroke(), r.restore();
          }
        }(i, o, e, n));
      }), s.display && l && u) {
        for (a.save(), a.lineWidth = l, a.strokeStyle = u, a.setLineDash && (a.setLineDash(Wn([s.borderDash, o.borderDash, []])), a.lineDashOffset = Wn([s.borderDashOffset, o.borderDashOffset, 0])), t = i.chart.data.labels.length - 1; t >= 0; t--) {
          e = i.getDistanceFromCenterForValue(r.ticks.reverse ? i.min : i.max), n = i.getPointPosition(t, e), a.beginPath(), a.moveTo(i.xCenter, i.yCenter), a.lineTo(n.x, n.y), a.stroke();
        }

        a.restore();
      }
    },
    _drawLabels: function _drawLabels() {
      var t = this,
          e = t.ctx,
          n = t.options.ticks;

      if (n.display) {
        var i,
            a,
            r = t.getIndexAngle(0),
            o = H.options._parseFont(n),
            s = Bn(n.fontColor, N.global.defaultFontColor);

        e.save(), e.font = o.string, e.translate(t.xCenter, t.yCenter), e.rotate(r), e.textAlign = "center", e.textBaseline = "middle", H.each(t.ticks, function (r, l) {
          (0 !== l || n.reverse) && (i = t.getDistanceFromCenterForValue(t.ticksAsNumbers[l]), n.showLabelBackdrop && (a = e.measureText(r).width, e.fillStyle = n.backdropColor, e.fillRect(-a / 2 - n.backdropPaddingX, -i - o.size / 2 - n.backdropPaddingY, a + 2 * n.backdropPaddingX, o.size + 2 * n.backdropPaddingY)), e.fillStyle = s, e.fillText(r, 0, -i));
        }), e.restore();
      }
    },
    _drawTitle: H.noop
  }),
      Kn = Vn;
  Xn._defaults = Kn;
  var Zn = H._deprecated,
      $n = H.options.resolve,
      Jn = H.valueOrDefault,
      Qn = Number.MIN_SAFE_INTEGER || -9007199254740991,
      ti = Number.MAX_SAFE_INTEGER || 9007199254740991,
      ei = {
    millisecond: {
      common: !0,
      size: 1,
      steps: 1e3
    },
    second: {
      common: !0,
      size: 1e3,
      steps: 60
    },
    minute: {
      common: !0,
      size: 6e4,
      steps: 60
    },
    hour: {
      common: !0,
      size: 36e5,
      steps: 24
    },
    day: {
      common: !0,
      size: 864e5,
      steps: 30
    },
    week: {
      common: !1,
      size: 6048e5,
      steps: 4
    },
    month: {
      common: !0,
      size: 2628e6,
      steps: 12
    },
    quarter: {
      common: !1,
      size: 7884e6,
      steps: 4
    },
    year: {
      common: !0,
      size: 3154e7
    }
  },
      ni = Object.keys(ei);

  function ii(t, e) {
    return t - e;
  }

  function ai(t) {
    return H.valueOrDefault(t.time.min, t.ticks.min);
  }

  function ri(t) {
    return H.valueOrDefault(t.time.max, t.ticks.max);
  }

  function oi(t, e, n, i) {
    var a = function (t, e, n) {
      for (var i, a, r, o = 0, s = t.length - 1; o >= 0 && o <= s;) {
        if (a = t[(i = o + s >> 1) - 1] || null, r = t[i], !a) return {
          lo: null,
          hi: r
        };
        if (r[e] < n) o = i + 1;else {
          if (!(a[e] > n)) return {
            lo: a,
            hi: r
          };
          s = i - 1;
        }
      }

      return {
        lo: r,
        hi: null
      };
    }(t, e, n),
        r = a.lo ? a.hi ? a.lo : t[t.length - 2] : t[0],
        o = a.lo ? a.hi ? a.hi : t[t.length - 1] : t[1],
        s = o[e] - r[e],
        l = s ? (n - r[e]) / s : 0,
        u = (o[i] - r[i]) * l;

    return r[i] + u;
  }

  function si(t, e) {
    var n = t._adapter,
        i = t.options.time,
        a = i.parser,
        r = a || i.format,
        o = e;
    return "function" == typeof a && (o = a(o)), H.isFinite(o) || (o = "string" == typeof r ? n.parse(o, r) : n.parse(o)), null !== o ? +o : (a || "function" != typeof r || (o = r(e), H.isFinite(o) || (o = n.parse(o))), o);
  }

  function li(t, e) {
    if (H.isNullOrUndef(e)) return null;
    var n = t.options.time,
        i = si(t, t.getRightValue(e));
    return null === i ? i : (n.round && (i = +t._adapter.startOf(i, n.round)), i);
  }

  function ui(t, e, n, i) {
    var a,
        r,
        o,
        s = ni.length;

    for (a = ni.indexOf(t); a < s - 1; ++a) {
      if (o = (r = ei[ni[a]]).steps ? r.steps : ti, r.common && Math.ceil((n - e) / (o * r.size)) <= i) return ni[a];
    }

    return ni[s - 1];
  }

  function di(t, e, n) {
    var i,
        a,
        r = [],
        o = {},
        s = e.length;

    for (i = 0; i < s; ++i) {
      o[a = e[i]] = i, r.push({
        value: a,
        major: !1
      });
    }

    return 0 !== s && n ? function (t, e, n, i) {
      var a,
          r,
          o = t._adapter,
          s = +o.startOf(e[0].value, i),
          l = e[e.length - 1].value;

      for (a = s; a <= l; a = +o.add(a, 1, i)) {
        (r = n[a]) >= 0 && (e[r].major = !0);
      }

      return e;
    }(t, r, o, n) : r;
  }

  var hi = yn.extend({
    initialize: function initialize() {
      this.mergeTicksOptions(), yn.prototype.initialize.call(this);
    },
    update: function update() {
      var t = this,
          e = t.options,
          n = e.time || (e.time = {}),
          i = t._adapter = new rn._date(e.adapters.date);
      return Zn("time scale", n.format, "time.format", "time.parser"), Zn("time scale", n.min, "time.min", "ticks.min"), Zn("time scale", n.max, "time.max", "ticks.max"), H.mergeIf(n.displayFormats, i.formats()), yn.prototype.update.apply(t, arguments);
    },
    getRightValue: function getRightValue(t) {
      return t && void 0 !== t.t && (t = t.t), yn.prototype.getRightValue.call(this, t);
    },
    determineDataLimits: function determineDataLimits() {
      var t,
          e,
          n,
          i,
          a,
          r,
          o,
          s = this,
          l = s.chart,
          u = s._adapter,
          d = s.options,
          h = d.time.unit || "day",
          c = ti,
          f = Qn,
          g = [],
          p = [],
          m = [],
          v = s._getLabels();

      for (t = 0, n = v.length; t < n; ++t) {
        m.push(li(s, v[t]));
      }

      for (t = 0, n = (l.data.datasets || []).length; t < n; ++t) {
        if (l.isDatasetVisible(t)) {
          if (a = l.data.datasets[t].data, H.isObject(a[0])) for (p[t] = [], e = 0, i = a.length; e < i; ++e) {
            r = li(s, a[e]), g.push(r), p[t][e] = r;
          } else p[t] = m.slice(0), o || (g = g.concat(m), o = !0);
        } else p[t] = [];
      }

      m.length && (c = Math.min(c, m[0]), f = Math.max(f, m[m.length - 1])), g.length && (g = n > 1 ? function (t) {
        var e,
            n,
            i,
            a = {},
            r = [];

        for (e = 0, n = t.length; e < n; ++e) {
          a[i = t[e]] || (a[i] = !0, r.push(i));
        }

        return r;
      }(g).sort(ii) : g.sort(ii), c = Math.min(c, g[0]), f = Math.max(f, g[g.length - 1])), c = li(s, ai(d)) || c, f = li(s, ri(d)) || f, c = c === ti ? +u.startOf(Date.now(), h) : c, f = f === Qn ? +u.endOf(Date.now(), h) + 1 : f, s.min = Math.min(c, f), s.max = Math.max(c + 1, f), s._table = [], s._timestamps = {
        data: g,
        datasets: p,
        labels: m
      };
    },
    buildTicks: function buildTicks() {
      var t,
          e,
          n,
          i = this,
          a = i.min,
          r = i.max,
          o = i.options,
          s = o.ticks,
          l = o.time,
          u = i._timestamps,
          d = [],
          h = i.getLabelCapacity(a),
          c = s.source,
          f = o.distribution;

      for (u = "data" === c || "auto" === c && "series" === f ? u.data : "labels" === c ? u.labels : function (t, e, n, i) {
        var a,
            r = t._adapter,
            o = t.options,
            s = o.time,
            l = s.unit || ui(s.minUnit, e, n, i),
            u = $n([s.stepSize, s.unitStepSize, 1]),
            d = "week" === l && s.isoWeekday,
            h = e,
            c = [];
        if (d && (h = +r.startOf(h, "isoWeek", d)), h = +r.startOf(h, d ? "day" : l), r.diff(n, e, l) > 1e5 * u) throw e + " and " + n + " are too far apart with stepSize of " + u + " " + l;

        for (a = h; a < n; a = +r.add(a, u, l)) {
          c.push(a);
        }

        return a !== n && "ticks" !== o.bounds || c.push(a), c;
      }(i, a, r, h), "ticks" === o.bounds && u.length && (a = u[0], r = u[u.length - 1]), a = li(i, ai(o)) || a, r = li(i, ri(o)) || r, t = 0, e = u.length; t < e; ++t) {
        (n = u[t]) >= a && n <= r && d.push(n);
      }

      return i.min = a, i.max = r, i._unit = l.unit || (s.autoSkip ? ui(l.minUnit, i.min, i.max, h) : function (t, e, n, i, a) {
        var r, o;

        for (r = ni.length - 1; r >= ni.indexOf(n); r--) {
          if (o = ni[r], ei[o].common && t._adapter.diff(a, i, o) >= e - 1) return o;
        }

        return ni[n ? ni.indexOf(n) : 0];
      }(i, d.length, l.minUnit, i.min, i.max)), i._majorUnit = s.major.enabled && "year" !== i._unit ? function (t) {
        for (var e = ni.indexOf(t) + 1, n = ni.length; e < n; ++e) {
          if (ei[ni[e]].common) return ni[e];
        }
      }(i._unit) : void 0, i._table = function (t, e, n, i) {
        if ("linear" === i || !t.length) return [{
          time: e,
          pos: 0
        }, {
          time: n,
          pos: 1
        }];
        var a,
            r,
            o,
            s,
            l,
            u = [],
            d = [e];

        for (a = 0, r = t.length; a < r; ++a) {
          (s = t[a]) > e && s < n && d.push(s);
        }

        for (d.push(n), a = 0, r = d.length; a < r; ++a) {
          l = d[a + 1], o = d[a - 1], s = d[a], void 0 !== o && void 0 !== l && Math.round((l + o) / 2) === s || u.push({
            time: s,
            pos: a / (r - 1)
          });
        }

        return u;
      }(i._timestamps.data, a, r, f), i._offsets = function (t, e, n, i, a) {
        var r,
            o,
            s = 0,
            l = 0;
        return a.offset && e.length && (r = oi(t, "time", e[0], "pos"), s = 1 === e.length ? 1 - r : (oi(t, "time", e[1], "pos") - r) / 2, o = oi(t, "time", e[e.length - 1], "pos"), l = 1 === e.length ? o : (o - oi(t, "time", e[e.length - 2], "pos")) / 2), {
          start: s,
          end: l,
          factor: 1 / (s + 1 + l)
        };
      }(i._table, d, 0, 0, o), s.reverse && d.reverse(), di(i, d, i._majorUnit);
    },
    getLabelForIndex: function getLabelForIndex(t, e) {
      var n = this,
          i = n._adapter,
          a = n.chart.data,
          r = n.options.time,
          o = a.labels && t < a.labels.length ? a.labels[t] : "",
          s = a.datasets[e].data[t];
      return H.isObject(s) && (o = n.getRightValue(s)), r.tooltipFormat ? i.format(si(n, o), r.tooltipFormat) : "string" == typeof o ? o : i.format(si(n, o), r.displayFormats.datetime);
    },
    tickFormatFunction: function tickFormatFunction(t, e, n, i) {
      var a = this._adapter,
          r = this.options,
          o = r.time.displayFormats,
          s = o[this._unit],
          l = this._majorUnit,
          u = o[l],
          d = n[e],
          h = r.ticks,
          c = l && u && d && d.major,
          f = a.format(t, i || (c ? u : s)),
          g = c ? h.major : h.minor,
          p = $n([g.callback, g.userCallback, h.callback, h.userCallback]);
      return p ? p(f, e, n) : f;
    },
    convertTicksToLabels: function convertTicksToLabels(t) {
      var e,
          n,
          i = [];

      for (e = 0, n = t.length; e < n; ++e) {
        i.push(this.tickFormatFunction(t[e].value, e, t));
      }

      return i;
    },
    getPixelForOffset: function getPixelForOffset(t) {
      var e = this._offsets,
          n = oi(this._table, "time", t, "pos");
      return this.getPixelForDecimal((e.start + n) * e.factor);
    },
    getPixelForValue: function getPixelForValue(t, e, n) {
      var i = null;
      if (void 0 !== e && void 0 !== n && (i = this._timestamps.datasets[n][e]), null === i && (i = li(this, t)), null !== i) return this.getPixelForOffset(i);
    },
    getPixelForTick: function getPixelForTick(t) {
      var e = this.getTicks();
      return t >= 0 && t < e.length ? this.getPixelForOffset(e[t].value) : null;
    },
    getValueForPixel: function getValueForPixel(t) {
      var e = this._offsets,
          n = this.getDecimalForPixel(t) / e.factor - e.end,
          i = oi(this._table, "pos", n, "time");
      return this._adapter._create(i);
    },
    _getLabelSize: function _getLabelSize(t) {
      var e = this.options.ticks,
          n = this.ctx.measureText(t).width,
          i = H.toRadians(this.isHorizontal() ? e.maxRotation : e.minRotation),
          a = Math.cos(i),
          r = Math.sin(i),
          o = Jn(e.fontSize, N.global.defaultFontSize);
      return {
        w: n * a + o * r,
        h: n * r + o * a
      };
    },
    getLabelWidth: function getLabelWidth(t) {
      return this._getLabelSize(t).w;
    },
    getLabelCapacity: function getLabelCapacity(t) {
      var e = this,
          n = e.options.time,
          i = n.displayFormats,
          a = i[n.unit] || i.millisecond,
          r = e.tickFormatFunction(t, 0, di(e, [t], e._majorUnit), a),
          o = e._getLabelSize(r),
          s = Math.floor(e.isHorizontal() ? e.width / o.w : e.height / o.h);

      return e.options.offset && s--, s > 0 ? s : 1;
    }
  }),
      ci = {
    position: "bottom",
    distribution: "linear",
    bounds: "data",
    adapters: {},
    time: {
      parser: !1,
      unit: !1,
      round: !1,
      displayFormat: !1,
      isoWeekday: !1,
      minUnit: "millisecond",
      displayFormats: {}
    },
    ticks: {
      autoSkip: !1,
      source: "auto",
      major: {
        enabled: !1
      }
    }
  };
  hi._defaults = ci;
  var fi = {
    category: kn,
    linear: Tn,
    logarithmic: zn,
    radialLinear: Xn,
    time: hi
  },
      gi = {
    datetime: "MMM D, YYYY, h:mm:ss a",
    millisecond: "h:mm:ss.SSS a",
    second: "h:mm:ss a",
    minute: "h:mm a",
    hour: "hA",
    day: "MMM D",
    week: "ll",
    month: "MMM YYYY",
    quarter: "[Q]Q - YYYY",
    year: "YYYY"
  };
  rn._date.override("function" == typeof t ? {
    _id: "moment",
    formats: function formats() {
      return gi;
    },
    parse: function parse(e, n) {
      return "string" == typeof e && "string" == typeof n ? e = t(e, n) : e instanceof t || (e = t(e)), e.isValid() ? e.valueOf() : null;
    },
    format: function format(e, n) {
      return t(e).format(n);
    },
    add: function add(e, n, i) {
      return t(e).add(n, i).valueOf();
    },
    diff: function diff(e, n, i) {
      return t(e).diff(t(n), i);
    },
    startOf: function startOf(e, n, i) {
      return e = t(e), "isoWeek" === n ? e.isoWeekday(i).valueOf() : e.startOf(n).valueOf();
    },
    endOf: function endOf(e, n) {
      return t(e).endOf(n).valueOf();
    },
    _create: function _create(e) {
      return t(e);
    }
  } : {}), N._set("global", {
    plugins: {
      filler: {
        propagate: !0
      }
    }
  });
  var pi = {
    dataset: function dataset(t) {
      var e = t.fill,
          n = t.chart,
          i = n.getDatasetMeta(e),
          a = i && n.isDatasetVisible(e) && i.dataset._children || [],
          r = a.length || 0;
      return r ? function (t, e) {
        return e < r && a[e]._view || null;
      } : null;
    },
    boundary: function boundary(t) {
      var e = t.boundary,
          n = e ? e.x : null,
          i = e ? e.y : null;
      return H.isArray(e) ? function (t, n) {
        return e[n];
      } : function (t) {
        return {
          x: null === n ? t.x : n,
          y: null === i ? t.y : i
        };
      };
    }
  };

  function mi(t, e, n) {
    var i,
        a = t._model || {},
        r = a.fill;
    if (void 0 === r && (r = !!a.backgroundColor), !1 === r || null === r) return !1;
    if (!0 === r) return "origin";
    if (i = parseFloat(r, 10), isFinite(i) && Math.floor(i) === i) return "-" !== r[0] && "+" !== r[0] || (i = e + i), !(i === e || i < 0 || i >= n) && i;

    switch (r) {
      case "bottom":
        return "start";

      case "top":
        return "end";

      case "zero":
        return "origin";

      case "origin":
      case "start":
      case "end":
        return r;

      default:
        return !1;
    }
  }

  function vi(t) {
    return (t.el._scale || {}).getPointPositionForValue ? function (t) {
      var e,
          n,
          i,
          a,
          r,
          o = t.el._scale,
          s = o.options,
          l = o.chart.data.labels.length,
          u = t.fill,
          d = [];
      if (!l) return null;

      for (e = s.ticks.reverse ? o.max : o.min, n = s.ticks.reverse ? o.min : o.max, i = o.getPointPositionForValue(0, e), a = 0; a < l; ++a) {
        r = "start" === u || "end" === u ? o.getPointPositionForValue(a, "start" === u ? e : n) : o.getBasePosition(a), s.gridLines.circular && (r.cx = i.x, r.cy = i.y, r.angle = o.getIndexAngle(a) - Math.PI / 2), d.push(r);
      }

      return d;
    }(t) : function (t) {
      var e,
          n = t.el._model || {},
          i = t.el._scale || {},
          a = t.fill,
          r = null;
      if (isFinite(a)) return null;

      if ("start" === a ? r = void 0 === n.scaleBottom ? i.bottom : n.scaleBottom : "end" === a ? r = void 0 === n.scaleTop ? i.top : n.scaleTop : void 0 !== n.scaleZero ? r = n.scaleZero : i.getBasePixel && (r = i.getBasePixel()), null != r) {
        if (void 0 !== r.x && void 0 !== r.y) return r;
        if (H.isFinite(r)) return {
          x: (e = i.isHorizontal()) ? r : null,
          y: e ? null : r
        };
      }

      return null;
    }(t);
  }

  function bi(t, e, n) {
    var i,
        a = t[e].fill,
        r = [e];
    if (!n) return a;

    for (; !1 !== a && -1 === r.indexOf(a);) {
      if (!isFinite(a)) return a;
      if (!(i = t[a])) return !1;
      if (i.visible) return a;
      r.push(a), a = i.fill;
    }

    return !1;
  }

  function xi(t) {
    var e = t.fill,
        n = "dataset";
    return !1 === e ? null : (isFinite(e) || (n = "boundary"), pi[n](t));
  }

  function yi(t) {
    return t && !t.skip;
  }

  function _i(t, e, n, i, a) {
    var r, o, s, l;

    if (i && a) {
      for (t.moveTo(e[0].x, e[0].y), r = 1; r < i; ++r) {
        H.canvas.lineTo(t, e[r - 1], e[r]);
      }

      if (void 0 === n[0].angle) for (t.lineTo(n[a - 1].x, n[a - 1].y), r = a - 1; r > 0; --r) {
        H.canvas.lineTo(t, n[r], n[r - 1], !0);
      } else for (o = n[0].cx, s = n[0].cy, l = Math.sqrt(Math.pow(n[0].x - o, 2) + Math.pow(n[0].y - s, 2)), r = a - 1; r > 0; --r) {
        t.arc(o, s, l, n[r].angle, n[r - 1].angle, !0);
      }
    }
  }

  function ki(t, e, n, i, a, r) {
    var o,
        s,
        l,
        u,
        d,
        h,
        c,
        f,
        g = e.length,
        p = i.spanGaps,
        m = [],
        v = [],
        b = 0,
        x = 0;

    for (t.beginPath(), o = 0, s = g; o < s; ++o) {
      d = n(u = e[l = o % g]._view, l, i), h = yi(u), c = yi(d), r && void 0 === f && h && (s = g + (f = o + 1)), h && c ? (b = m.push(u), x = v.push(d)) : b && x && (p ? (h && m.push(u), c && v.push(d)) : (_i(t, m, v, b, x), b = x = 0, m = [], v = []));
    }

    _i(t, m, v, b, x), t.closePath(), t.fillStyle = a, t.fill();
  }

  var wi = {
    id: "filler",
    afterDatasetsUpdate: function afterDatasetsUpdate(t, e) {
      var n,
          i,
          a,
          r,
          o = (t.data.datasets || []).length,
          s = e.propagate,
          l = [];

      for (i = 0; i < o; ++i) {
        r = null, (a = (n = t.getDatasetMeta(i)).dataset) && a._model && a instanceof kt.Line && (r = {
          visible: t.isDatasetVisible(i),
          fill: mi(a, i, o),
          chart: t,
          el: a
        }), n.$filler = r, l.push(r);
      }

      for (i = 0; i < o; ++i) {
        (r = l[i]) && (r.fill = bi(l, i, s), r.boundary = vi(r), r.mapper = xi(r));
      }
    },
    beforeDatasetsDraw: function beforeDatasetsDraw(t) {
      var e,
          n,
          i,
          a,
          r,
          o,
          s,
          l = t._getSortedVisibleDatasetMetas(),
          u = t.ctx;

      for (n = l.length - 1; n >= 0; --n) {
        (e = l[n].$filler) && e.visible && (a = (i = e.el)._view, r = i._children || [], o = e.mapper, s = a.backgroundColor || N.global.defaultColor, o && s && r.length && (H.canvas.clipArea(u, t.chartArea), ki(u, r, o, a, s, i._loop), H.canvas.unclipArea(u)));
      }
    }
  },
      Mi = H.rtl.getRtlAdapter,
      Si = H.noop,
      Ci = H.valueOrDefault;

  function Pi(t, e) {
    return t.usePointStyle && t.boxWidth > e ? e : t.boxWidth;
  }

  N._set("global", {
    legend: {
      display: !0,
      position: "top",
      align: "center",
      fullWidth: !0,
      reverse: !1,
      weight: 1e3,
      onClick: function onClick(t, e) {
        var n = e.datasetIndex,
            i = this.chart,
            a = i.getDatasetMeta(n);
        a.hidden = null === a.hidden ? !i.data.datasets[n].hidden : null, i.update();
      },
      onHover: null,
      onLeave: null,
      labels: {
        boxWidth: 40,
        padding: 10,
        generateLabels: function generateLabels(t) {
          var e = t.data.datasets,
              n = t.options.legend || {},
              i = n.labels && n.labels.usePointStyle;
          return t._getSortedDatasetMetas().map(function (n) {
            var a = n.controller.getStyle(i ? 0 : void 0);
            return {
              text: e[n.index].label,
              fillStyle: a.backgroundColor,
              hidden: !t.isDatasetVisible(n.index),
              lineCap: a.borderCapStyle,
              lineDash: a.borderDash,
              lineDashOffset: a.borderDashOffset,
              lineJoin: a.borderJoinStyle,
              lineWidth: a.borderWidth,
              strokeStyle: a.borderColor,
              pointStyle: a.pointStyle,
              rotation: a.rotation,
              datasetIndex: n.index
            };
          }, this);
        }
      }
    },
    legendCallback: function legendCallback(t) {
      var e,
          n,
          i,
          a = document.createElement("ul"),
          r = t.data.datasets;

      for (a.setAttribute("class", t.id + "-legend"), e = 0, n = r.length; e < n; e++) {
        (i = a.appendChild(document.createElement("li"))).appendChild(document.createElement("span")).style.backgroundColor = r[e].backgroundColor, r[e].label && i.appendChild(document.createTextNode(r[e].label));
      }

      return a.outerHTML;
    }
  });

  var Ai = K.extend({
    initialize: function initialize(t) {
      H.extend(this, t), this.legendHitBoxes = [], this._hoveredItem = null, this.doughnutMode = !1;
    },
    beforeUpdate: Si,
    update: function update(t, e, n) {
      var i = this;
      return i.beforeUpdate(), i.maxWidth = t, i.maxHeight = e, i.margins = n, i.beforeSetDimensions(), i.setDimensions(), i.afterSetDimensions(), i.beforeBuildLabels(), i.buildLabels(), i.afterBuildLabels(), i.beforeFit(), i.fit(), i.afterFit(), i.afterUpdate(), i.minSize;
    },
    afterUpdate: Si,
    beforeSetDimensions: Si,
    setDimensions: function setDimensions() {
      var t = this;
      t.isHorizontal() ? (t.width = t.maxWidth, t.left = 0, t.right = t.width) : (t.height = t.maxHeight, t.top = 0, t.bottom = t.height), t.paddingLeft = 0, t.paddingTop = 0, t.paddingRight = 0, t.paddingBottom = 0, t.minSize = {
        width: 0,
        height: 0
      };
    },
    afterSetDimensions: Si,
    beforeBuildLabels: Si,
    buildLabels: function buildLabels() {
      var t = this,
          e = t.options.labels || {},
          n = H.callback(e.generateLabels, [t.chart], t) || [];
      e.filter && (n = n.filter(function (n) {
        return e.filter(n, t.chart.data);
      })), t.options.reverse && n.reverse(), t.legendItems = n;
    },
    afterBuildLabels: Si,
    beforeFit: Si,
    fit: function fit() {
      var t = this,
          e = t.options,
          n = e.labels,
          i = e.display,
          a = t.ctx,
          r = H.options._parseFont(n),
          o = r.size,
          s = t.legendHitBoxes = [],
          l = t.minSize,
          u = t.isHorizontal();

      if (u ? (l.width = t.maxWidth, l.height = i ? 10 : 0) : (l.width = i ? 10 : 0, l.height = t.maxHeight), i) {
        if (a.font = r.string, u) {
          var d = t.lineWidths = [0],
              h = 0;
          a.textAlign = "left", a.textBaseline = "middle", H.each(t.legendItems, function (t, e) {
            var i = Pi(n, o) + o / 2 + a.measureText(t.text).width;
            (0 === e || d[d.length - 1] + i + 2 * n.padding > l.width) && (h += o + n.padding, d[d.length - (e > 0 ? 0 : 1)] = 0), s[e] = {
              left: 0,
              top: 0,
              width: i,
              height: o
            }, d[d.length - 1] += i + n.padding;
          }), l.height += h;
        } else {
          var c = n.padding,
              f = t.columnWidths = [],
              g = t.columnHeights = [],
              p = n.padding,
              m = 0,
              v = 0;
          H.each(t.legendItems, function (t, e) {
            var i = Pi(n, o) + o / 2 + a.measureText(t.text).width;
            e > 0 && v + o + 2 * c > l.height && (p += m + n.padding, f.push(m), g.push(v), m = 0, v = 0), m = Math.max(m, i), v += o + c, s[e] = {
              left: 0,
              top: 0,
              width: i,
              height: o
            };
          }), p += m, f.push(m), g.push(v), l.width += p;
        }

        t.width = l.width, t.height = l.height;
      } else t.width = l.width = t.height = l.height = 0;
    },
    afterFit: Si,
    isHorizontal: function isHorizontal() {
      return "top" === this.options.position || "bottom" === this.options.position;
    },
    draw: function draw() {
      var t = this,
          e = t.options,
          n = e.labels,
          i = N.global,
          a = i.defaultColor,
          r = i.elements.line,
          o = t.height,
          s = t.columnHeights,
          l = t.width,
          u = t.lineWidths;

      if (e.display) {
        var d,
            h = Mi(e.rtl, t.left, t.minSize.width),
            c = t.ctx,
            f = Ci(n.fontColor, i.defaultFontColor),
            g = H.options._parseFont(n),
            p = g.size;

        c.textAlign = h.textAlign("left"), c.textBaseline = "middle", c.lineWidth = .5, c.strokeStyle = f, c.fillStyle = f, c.font = g.string;

        var m = Pi(n, p),
            v = t.legendHitBoxes,
            b = function b(t, i) {
          switch (e.align) {
            case "start":
              return n.padding;

            case "end":
              return t - i;

            default:
              return (t - i + n.padding) / 2;
          }
        },
            x = t.isHorizontal();

        d = x ? {
          x: t.left + b(l, u[0]),
          y: t.top + n.padding,
          line: 0
        } : {
          x: t.left + n.padding,
          y: t.top + b(o, s[0]),
          line: 0
        }, H.rtl.overrideTextDirection(t.ctx, e.textDirection);
        var y = p + n.padding;
        H.each(t.legendItems, function (e, i) {
          var f = c.measureText(e.text).width,
              g = m + p / 2 + f,
              _ = d.x,
              k = d.y;
          h.setWidth(t.minSize.width), x ? i > 0 && _ + g + n.padding > t.left + t.minSize.width && (k = d.y += y, d.line++, _ = d.x = t.left + b(l, u[d.line])) : i > 0 && k + y > t.top + t.minSize.height && (_ = d.x = _ + t.columnWidths[d.line] + n.padding, d.line++, k = d.y = t.top + b(o, s[d.line]));
          var w = h.x(_);
          !function (t, e, i) {
            if (!(isNaN(m) || m <= 0)) {
              c.save();
              var o = Ci(i.lineWidth, r.borderWidth);

              if (c.fillStyle = Ci(i.fillStyle, a), c.lineCap = Ci(i.lineCap, r.borderCapStyle), c.lineDashOffset = Ci(i.lineDashOffset, r.borderDashOffset), c.lineJoin = Ci(i.lineJoin, r.borderJoinStyle), c.lineWidth = o, c.strokeStyle = Ci(i.strokeStyle, a), c.setLineDash && c.setLineDash(Ci(i.lineDash, r.borderDash)), n && n.usePointStyle) {
                var s = m * Math.SQRT2 / 2,
                    l = h.xPlus(t, m / 2),
                    u = e + p / 2;
                H.canvas.drawPoint(c, i.pointStyle, s, l, u, i.rotation);
              } else c.fillRect(h.leftForLtr(t, m), e, m, p), 0 !== o && c.strokeRect(h.leftForLtr(t, m), e, m, p);

              c.restore();
            }
          }(w, k, e), v[i].left = h.leftForLtr(w, v[i].width), v[i].top = k, function (t, e, n, i) {
            var a = p / 2,
                r = h.xPlus(t, m + a),
                o = e + a;
            c.fillText(n.text, r, o), n.hidden && (c.beginPath(), c.lineWidth = 2, c.moveTo(r, o), c.lineTo(h.xPlus(r, i), o), c.stroke());
          }(w, k, e, f), x ? d.x += g + n.padding : d.y += y;
        }), H.rtl.restoreTextDirection(t.ctx, e.textDirection);
      }
    },
    _getLegendItemAt: function _getLegendItemAt(t, e) {
      var n,
          i,
          a,
          r = this;
      if (t >= r.left && t <= r.right && e >= r.top && e <= r.bottom) for (a = r.legendHitBoxes, n = 0; n < a.length; ++n) {
        if (t >= (i = a[n]).left && t <= i.left + i.width && e >= i.top && e <= i.top + i.height) return r.legendItems[n];
      }
      return null;
    },
    handleEvent: function handleEvent(t) {
      var e,
          n = this,
          i = n.options,
          a = "mouseup" === t.type ? "click" : t.type;

      if ("mousemove" === a) {
        if (!i.onHover && !i.onLeave) return;
      } else {
        if ("click" !== a) return;
        if (!i.onClick) return;
      }

      e = n._getLegendItemAt(t.x, t.y), "click" === a ? e && i.onClick && i.onClick.call(n, t["native"], e) : (i.onLeave && e !== n._hoveredItem && (n._hoveredItem && i.onLeave.call(n, t["native"], n._hoveredItem), n._hoveredItem = e), i.onHover && e && i.onHover.call(n, t["native"], e));
    }
  });

  function Di(t, e) {
    var n = new Ai({
      ctx: t.ctx,
      options: e,
      chart: t
    });
    pe.configure(t, n, e), pe.addBox(t, n), t.legend = n;
  }

  var Ti = {
    id: "legend",
    _element: Ai,
    beforeInit: function beforeInit(t) {
      var e = t.options.legend;
      e && Di(t, e);
    },
    beforeUpdate: function beforeUpdate(t) {
      var e = t.options.legend,
          n = t.legend;
      e ? (H.mergeIf(e, N.global.legend), n ? (pe.configure(t, n, e), n.options = e) : Di(t, e)) : n && (pe.removeBox(t, n), delete t.legend);
    },
    afterEvent: function afterEvent(t, e) {
      var n = t.legend;
      n && n.handleEvent(e);
    }
  },
      Ii = H.noop;

  N._set("global", {
    title: {
      display: !1,
      fontStyle: "bold",
      fullWidth: !0,
      padding: 10,
      position: "top",
      text: "",
      weight: 2e3
    }
  });

  var Fi = K.extend({
    initialize: function initialize(t) {
      H.extend(this, t), this.legendHitBoxes = [];
    },
    beforeUpdate: Ii,
    update: function update(t, e, n) {
      var i = this;
      return i.beforeUpdate(), i.maxWidth = t, i.maxHeight = e, i.margins = n, i.beforeSetDimensions(), i.setDimensions(), i.afterSetDimensions(), i.beforeBuildLabels(), i.buildLabels(), i.afterBuildLabels(), i.beforeFit(), i.fit(), i.afterFit(), i.afterUpdate(), i.minSize;
    },
    afterUpdate: Ii,
    beforeSetDimensions: Ii,
    setDimensions: function setDimensions() {
      var t = this;
      t.isHorizontal() ? (t.width = t.maxWidth, t.left = 0, t.right = t.width) : (t.height = t.maxHeight, t.top = 0, t.bottom = t.height), t.paddingLeft = 0, t.paddingTop = 0, t.paddingRight = 0, t.paddingBottom = 0, t.minSize = {
        width: 0,
        height: 0
      };
    },
    afterSetDimensions: Ii,
    beforeBuildLabels: Ii,
    buildLabels: Ii,
    afterBuildLabels: Ii,
    beforeFit: Ii,
    fit: function fit() {
      var t,
          e = this,
          n = e.options,
          i = e.minSize = {},
          a = e.isHorizontal();
      n.display ? (t = (H.isArray(n.text) ? n.text.length : 1) * H.options._parseFont(n).lineHeight + 2 * n.padding, e.width = i.width = a ? e.maxWidth : t, e.height = i.height = a ? t : e.maxHeight) : e.width = i.width = e.height = i.height = 0;
    },
    afterFit: Ii,
    isHorizontal: function isHorizontal() {
      var t = this.options.position;
      return "top" === t || "bottom" === t;
    },
    draw: function draw() {
      var t = this,
          e = t.ctx,
          n = t.options;

      if (n.display) {
        var i,
            a,
            r,
            o = H.options._parseFont(n),
            s = o.lineHeight,
            l = s / 2 + n.padding,
            u = 0,
            d = t.top,
            h = t.left,
            c = t.bottom,
            f = t.right;

        e.fillStyle = H.valueOrDefault(n.fontColor, N.global.defaultFontColor), e.font = o.string, t.isHorizontal() ? (a = h + (f - h) / 2, r = d + l, i = f - h) : (a = "left" === n.position ? h + l : f - l, r = d + (c - d) / 2, i = c - d, u = Math.PI * ("left" === n.position ? -.5 : .5)), e.save(), e.translate(a, r), e.rotate(u), e.textAlign = "center", e.textBaseline = "middle";
        var g = n.text;
        if (H.isArray(g)) for (var p = 0, m = 0; m < g.length; ++m) {
          e.fillText(g[m], 0, p, i), p += s;
        } else e.fillText(g, 0, 0, i);
        e.restore();
      }
    }
  });

  function Oi(t, e) {
    var n = new Fi({
      ctx: t.ctx,
      options: e,
      chart: t
    });
    pe.configure(t, n, e), pe.addBox(t, n), t.titleBlock = n;
  }

  var Li = {},
      Ri = wi,
      zi = Ti,
      Ni = {
    id: "title",
    _element: Fi,
    beforeInit: function beforeInit(t) {
      var e = t.options.title;
      e && Oi(t, e);
    },
    beforeUpdate: function beforeUpdate(t) {
      var e = t.options.title,
          n = t.titleBlock;
      e ? (H.mergeIf(e, N.global.title), n ? (pe.configure(t, n, e), n.options = e) : Oi(t, e)) : n && (pe.removeBox(t, n), delete t.titleBlock);
    }
  };

  for (var Bi in Li.filler = Ri, Li.legend = zi, Li.title = Ni, en.helpers = H, function () {
    function t(t, e, n) {
      var i;
      return "string" == typeof t ? (i = parseInt(t, 10), -1 !== t.indexOf("%") && (i = i / 100 * e.parentNode[n])) : i = t, i;
    }

    function e(t) {
      return null != t && "none" !== t;
    }

    function n(n, i, a) {
      var r = document.defaultView,
          o = H._getParentNode(n),
          s = r.getComputedStyle(n)[i],
          l = r.getComputedStyle(o)[i],
          u = e(s),
          d = e(l),
          h = Number.POSITIVE_INFINITY;

      return u || d ? Math.min(u ? t(s, n, a) : h, d ? t(l, o, a) : h) : "none";
    }

    H.where = function (t, e) {
      if (H.isArray(t) && Array.prototype.filter) return t.filter(e);
      var n = [];
      return H.each(t, function (t) {
        e(t) && n.push(t);
      }), n;
    }, H.findIndex = Array.prototype.findIndex ? function (t, e, n) {
      return t.findIndex(e, n);
    } : function (t, e, n) {
      n = void 0 === n ? t : n;

      for (var i = 0, a = t.length; i < a; ++i) {
        if (e.call(n, t[i], i, t)) return i;
      }

      return -1;
    }, H.findNextWhere = function (t, e, n) {
      H.isNullOrUndef(n) && (n = -1);

      for (var i = n + 1; i < t.length; i++) {
        var a = t[i];
        if (e(a)) return a;
      }
    }, H.findPreviousWhere = function (t, e, n) {
      H.isNullOrUndef(n) && (n = t.length);

      for (var i = n - 1; i >= 0; i--) {
        var a = t[i];
        if (e(a)) return a;
      }
    }, H.isNumber = function (t) {
      return !isNaN(parseFloat(t)) && isFinite(t);
    }, H.almostEquals = function (t, e, n) {
      return Math.abs(t - e) < n;
    }, H.almostWhole = function (t, e) {
      var n = Math.round(t);
      return n - e <= t && n + e >= t;
    }, H.max = function (t) {
      return t.reduce(function (t, e) {
        return isNaN(e) ? t : Math.max(t, e);
      }, Number.NEGATIVE_INFINITY);
    }, H.min = function (t) {
      return t.reduce(function (t, e) {
        return isNaN(e) ? t : Math.min(t, e);
      }, Number.POSITIVE_INFINITY);
    }, H.sign = Math.sign ? function (t) {
      return Math.sign(t);
    } : function (t) {
      return 0 === (t = +t) || isNaN(t) ? t : t > 0 ? 1 : -1;
    }, H.toRadians = function (t) {
      return t * (Math.PI / 180);
    }, H.toDegrees = function (t) {
      return t * (180 / Math.PI);
    }, H._decimalPlaces = function (t) {
      if (H.isFinite(t)) {
        for (var e = 1, n = 0; Math.round(t * e) / e !== t;) {
          e *= 10, n++;
        }

        return n;
      }
    }, H.getAngleFromPoint = function (t, e) {
      var n = e.x - t.x,
          i = e.y - t.y,
          a = Math.sqrt(n * n + i * i),
          r = Math.atan2(i, n);
      return r < -.5 * Math.PI && (r += 2 * Math.PI), {
        angle: r,
        distance: a
      };
    }, H.distanceBetweenPoints = function (t, e) {
      return Math.sqrt(Math.pow(e.x - t.x, 2) + Math.pow(e.y - t.y, 2));
    }, H.aliasPixel = function (t) {
      return t % 2 == 0 ? 0 : .5;
    }, H._alignPixel = function (t, e, n) {
      var i = t.currentDevicePixelRatio,
          a = n / 2;
      return Math.round((e - a) * i) / i + a;
    }, H.splineCurve = function (t, e, n, i) {
      var a = t.skip ? e : t,
          r = e,
          o = n.skip ? e : n,
          s = Math.sqrt(Math.pow(r.x - a.x, 2) + Math.pow(r.y - a.y, 2)),
          l = Math.sqrt(Math.pow(o.x - r.x, 2) + Math.pow(o.y - r.y, 2)),
          u = s / (s + l),
          d = l / (s + l),
          h = i * (u = isNaN(u) ? 0 : u),
          c = i * (d = isNaN(d) ? 0 : d);
      return {
        previous: {
          x: r.x - h * (o.x - a.x),
          y: r.y - h * (o.y - a.y)
        },
        next: {
          x: r.x + c * (o.x - a.x),
          y: r.y + c * (o.y - a.y)
        }
      };
    }, H.EPSILON = Number.EPSILON || 1e-14, H.splineCurveMonotone = function (t) {
      var e,
          n,
          i,
          a,
          r,
          o,
          s,
          l,
          u,
          d = (t || []).map(function (t) {
        return {
          model: t._model,
          deltaK: 0,
          mK: 0
        };
      }),
          h = d.length;

      for (e = 0; e < h; ++e) {
        if (!(i = d[e]).model.skip) {
          if (n = e > 0 ? d[e - 1] : null, (a = e < h - 1 ? d[e + 1] : null) && !a.model.skip) {
            var c = a.model.x - i.model.x;
            i.deltaK = 0 !== c ? (a.model.y - i.model.y) / c : 0;
          }

          !n || n.model.skip ? i.mK = i.deltaK : !a || a.model.skip ? i.mK = n.deltaK : this.sign(n.deltaK) !== this.sign(i.deltaK) ? i.mK = 0 : i.mK = (n.deltaK + i.deltaK) / 2;
        }
      }

      for (e = 0; e < h - 1; ++e) {
        i = d[e], a = d[e + 1], i.model.skip || a.model.skip || (H.almostEquals(i.deltaK, 0, this.EPSILON) ? i.mK = a.mK = 0 : (r = i.mK / i.deltaK, o = a.mK / i.deltaK, (l = Math.pow(r, 2) + Math.pow(o, 2)) <= 9 || (s = 3 / Math.sqrt(l), i.mK = r * s * i.deltaK, a.mK = o * s * i.deltaK)));
      }

      for (e = 0; e < h; ++e) {
        (i = d[e]).model.skip || (n = e > 0 ? d[e - 1] : null, a = e < h - 1 ? d[e + 1] : null, n && !n.model.skip && (u = (i.model.x - n.model.x) / 3, i.model.controlPointPreviousX = i.model.x - u, i.model.controlPointPreviousY = i.model.y - u * i.mK), a && !a.model.skip && (u = (a.model.x - i.model.x) / 3, i.model.controlPointNextX = i.model.x + u, i.model.controlPointNextY = i.model.y + u * i.mK));
      }
    }, H.nextItem = function (t, e, n) {
      return n ? e >= t.length - 1 ? t[0] : t[e + 1] : e >= t.length - 1 ? t[t.length - 1] : t[e + 1];
    }, H.previousItem = function (t, e, n) {
      return n ? e <= 0 ? t[t.length - 1] : t[e - 1] : e <= 0 ? t[0] : t[e - 1];
    }, H.niceNum = function (t, e) {
      var n = Math.floor(H.log10(t)),
          i = t / Math.pow(10, n);
      return (e ? i < 1.5 ? 1 : i < 3 ? 2 : i < 7 ? 5 : 10 : i <= 1 ? 1 : i <= 2 ? 2 : i <= 5 ? 5 : 10) * Math.pow(10, n);
    }, H.requestAnimFrame = "undefined" == typeof window ? function (t) {
      t();
    } : window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function (t) {
      return window.setTimeout(t, 1e3 / 60);
    }, H.getRelativePosition = function (t, e) {
      var n,
          i,
          a = t.originalEvent || t,
          r = t.target || t.srcElement,
          o = r.getBoundingClientRect(),
          s = a.touches;
      s && s.length > 0 ? (n = s[0].clientX, i = s[0].clientY) : (n = a.clientX, i = a.clientY);
      var l = parseFloat(H.getStyle(r, "padding-left")),
          u = parseFloat(H.getStyle(r, "padding-top")),
          d = parseFloat(H.getStyle(r, "padding-right")),
          h = parseFloat(H.getStyle(r, "padding-bottom")),
          c = o.right - o.left - l - d,
          f = o.bottom - o.top - u - h;
      return {
        x: n = Math.round((n - o.left - l) / c * r.width / e.currentDevicePixelRatio),
        y: i = Math.round((i - o.top - u) / f * r.height / e.currentDevicePixelRatio)
      };
    }, H.getConstraintWidth = function (t) {
      return n(t, "max-width", "clientWidth");
    }, H.getConstraintHeight = function (t) {
      return n(t, "max-height", "clientHeight");
    }, H._calculatePadding = function (t, e, n) {
      return (e = H.getStyle(t, e)).indexOf("%") > -1 ? n * parseInt(e, 10) / 100 : parseInt(e, 10);
    }, H._getParentNode = function (t) {
      var e = t.parentNode;
      return e && "[object ShadowRoot]" === e.toString() && (e = e.host), e;
    }, H.getMaximumWidth = function (t) {
      var e = H._getParentNode(t);

      if (!e) return t.clientWidth;

      var n = e.clientWidth,
          i = n - H._calculatePadding(e, "padding-left", n) - H._calculatePadding(e, "padding-right", n),
          a = H.getConstraintWidth(t);

      return isNaN(a) ? i : Math.min(i, a);
    }, H.getMaximumHeight = function (t) {
      var e = H._getParentNode(t);

      if (!e) return t.clientHeight;

      var n = e.clientHeight,
          i = n - H._calculatePadding(e, "padding-top", n) - H._calculatePadding(e, "padding-bottom", n),
          a = H.getConstraintHeight(t);

      return isNaN(a) ? i : Math.min(i, a);
    }, H.getStyle = function (t, e) {
      return t.currentStyle ? t.currentStyle[e] : document.defaultView.getComputedStyle(t, null).getPropertyValue(e);
    }, H.retinaScale = function (t, e) {
      var n = t.currentDevicePixelRatio = e || "undefined" != typeof window && window.devicePixelRatio || 1;

      if (1 !== n) {
        var i = t.canvas,
            a = t.height,
            r = t.width;
        i.height = a * n, i.width = r * n, t.ctx.scale(n, n), i.style.height || i.style.width || (i.style.height = a + "px", i.style.width = r + "px");
      }
    }, H.fontString = function (t, e, n) {
      return e + " " + t + "px " + n;
    }, H.longestText = function (t, e, n, i) {
      var a = (i = i || {}).data = i.data || {},
          r = i.garbageCollect = i.garbageCollect || [];
      i.font !== e && (a = i.data = {}, r = i.garbageCollect = [], i.font = e), t.font = e;
      var o,
          s,
          l,
          u,
          d,
          h = 0,
          c = n.length;

      for (o = 0; o < c; o++) {
        if (null != (u = n[o]) && !0 !== H.isArray(u)) h = H.measureText(t, a, r, h, u);else if (H.isArray(u)) for (s = 0, l = u.length; s < l; s++) {
          null == (d = u[s]) || H.isArray(d) || (h = H.measureText(t, a, r, h, d));
        }
      }

      var f = r.length / 2;

      if (f > n.length) {
        for (o = 0; o < f; o++) {
          delete a[r[o]];
        }

        r.splice(0, f);
      }

      return h;
    }, H.measureText = function (t, e, n, i, a) {
      var r = e[a];
      return r || (r = e[a] = t.measureText(a).width, n.push(a)), r > i && (i = r), i;
    }, H.numberOfLabelLines = function (t) {
      var e = 1;
      return H.each(t, function (t) {
        H.isArray(t) && t.length > e && (e = t.length);
      }), e;
    }, H.color = _ ? function (t) {
      return t instanceof CanvasGradient && (t = N.global.defaultColor), _(t);
    } : function (t) {
      return console.error("Color.js not found!"), t;
    }, H.getHoverColor = function (t) {
      return t instanceof CanvasPattern || t instanceof CanvasGradient ? t : H.color(t).saturate(.5).darken(.1).rgbString();
    };
  }(), en._adapters = rn, en.Animation = $, en.animationService = J, en.controllers = Jt, en.DatasetController = it, en.defaults = N, en.Element = K, en.elements = kt, en.Interaction = re, en.layouts = pe, en.platform = Oe, en.plugins = Le, en.Scale = yn, en.scaleService = Re, en.Ticks = on, en.Tooltip = Ye, en.helpers.each(fi, function (t, e) {
    en.scaleService.registerScaleType(e, t, t._defaults);
  }), Li) {
    Li.hasOwnProperty(Bi) && en.plugins.register(Li[Bi]);
  }

  en.platform.initialize();
  var Ei = en;
  return "undefined" != typeof window && (window.Chart = en), en.Chart = en, en.Legend = Li.legend._element, en.Title = Li.title._element, en.pluginService = en.plugins, en.PluginBase = en.Element.extend({}), en.canvasHelpers = en.helpers.canvas, en.layoutService = en.layouts, en.LinearScaleBase = Cn, en.helpers.each(["Bar", "Bubble", "Doughnut", "Line", "PolarArea", "Radar", "Scatter"], function (t) {
    en[t] = function (e, n) {
      return new en(e, en.helpers.merge(n || {}, {
        type: t.charAt(0).toLowerCase() + t.slice(1)
      }));
    };
  }), Ei;
});

/***/ }),

/***/ "./resources/admin_asset/lib/jquery/jquery-3.2.1.min.js":
/*!**************************************************************!*\
  !*** ./resources/admin_asset/lib/jquery/jquery-3.2.1.min.js ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(module) {var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/*! jQuery v3.2.1 | (c) JS Foundation and other contributors | jquery.org/license */
!function (a, b) {
  "use strict";

  "object" == ( false ? undefined : _typeof(module)) && "object" == _typeof(module.exports) ? module.exports = a.document ? b(a, !0) : function (a) {
    if (!a.document) throw new Error("jQuery requires a window with a document");
    return b(a);
  } : b(a);
}("undefined" != typeof window ? window : this, function (a, b) {
  "use strict";

  var c = [],
      d = a.document,
      e = Object.getPrototypeOf,
      f = c.slice,
      g = c.concat,
      h = c.push,
      i = c.indexOf,
      j = {},
      k = j.toString,
      l = j.hasOwnProperty,
      m = l.toString,
      n = m.call(Object),
      o = {};

  function p(a, b) {
    b = b || d;
    var c = b.createElement("script");
    c.text = a, b.head.appendChild(c).parentNode.removeChild(c);
  }

  var q = "3.2.1",
      r = function r(a, b) {
    return new r.fn.init(a, b);
  },
      s = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,
      t = /^-ms-/,
      u = /-([a-z])/g,
      v = function v(a, b) {
    return b.toUpperCase();
  };

  r.fn = r.prototype = {
    jquery: q,
    constructor: r,
    length: 0,
    toArray: function toArray() {
      return f.call(this);
    },
    get: function get(a) {
      return null == a ? f.call(this) : a < 0 ? this[a + this.length] : this[a];
    },
    pushStack: function pushStack(a) {
      var b = r.merge(this.constructor(), a);
      return b.prevObject = this, b;
    },
    each: function each(a) {
      return r.each(this, a);
    },
    map: function map(a) {
      return this.pushStack(r.map(this, function (b, c) {
        return a.call(b, c, b);
      }));
    },
    slice: function slice() {
      return this.pushStack(f.apply(this, arguments));
    },
    first: function first() {
      return this.eq(0);
    },
    last: function last() {
      return this.eq(-1);
    },
    eq: function eq(a) {
      var b = this.length,
          c = +a + (a < 0 ? b : 0);
      return this.pushStack(c >= 0 && c < b ? [this[c]] : []);
    },
    end: function end() {
      return this.prevObject || this.constructor();
    },
    push: h,
    sort: c.sort,
    splice: c.splice
  }, r.extend = r.fn.extend = function () {
    var a,
        b,
        c,
        d,
        e,
        f,
        g = arguments[0] || {},
        h = 1,
        i = arguments.length,
        j = !1;

    for ("boolean" == typeof g && (j = g, g = arguments[h] || {}, h++), "object" == _typeof(g) || r.isFunction(g) || (g = {}), h === i && (g = this, h--); h < i; h++) {
      if (null != (a = arguments[h])) for (b in a) {
        c = g[b], d = a[b], g !== d && (j && d && (r.isPlainObject(d) || (e = Array.isArray(d))) ? (e ? (e = !1, f = c && Array.isArray(c) ? c : []) : f = c && r.isPlainObject(c) ? c : {}, g[b] = r.extend(j, f, d)) : void 0 !== d && (g[b] = d));
      }
    }

    return g;
  }, r.extend({
    expando: "jQuery" + (q + Math.random()).replace(/\D/g, ""),
    isReady: !0,
    error: function error(a) {
      throw new Error(a);
    },
    noop: function noop() {},
    isFunction: function isFunction(a) {
      return "function" === r.type(a);
    },
    isWindow: function isWindow(a) {
      return null != a && a === a.window;
    },
    isNumeric: function isNumeric(a) {
      var b = r.type(a);
      return ("number" === b || "string" === b) && !isNaN(a - parseFloat(a));
    },
    isPlainObject: function isPlainObject(a) {
      var b, c;
      return !(!a || "[object Object]" !== k.call(a)) && (!(b = e(a)) || (c = l.call(b, "constructor") && b.constructor, "function" == typeof c && m.call(c) === n));
    },
    isEmptyObject: function isEmptyObject(a) {
      var b;

      for (b in a) {
        return !1;
      }

      return !0;
    },
    type: function type(a) {
      return null == a ? a + "" : "object" == _typeof(a) || "function" == typeof a ? j[k.call(a)] || "object" : _typeof(a);
    },
    globalEval: function globalEval(a) {
      p(a);
    },
    camelCase: function camelCase(a) {
      return a.replace(t, "ms-").replace(u, v);
    },
    each: function each(a, b) {
      var c,
          d = 0;

      if (w(a)) {
        for (c = a.length; d < c; d++) {
          if (b.call(a[d], d, a[d]) === !1) break;
        }
      } else for (d in a) {
        if (b.call(a[d], d, a[d]) === !1) break;
      }

      return a;
    },
    trim: function trim(a) {
      return null == a ? "" : (a + "").replace(s, "");
    },
    makeArray: function makeArray(a, b) {
      var c = b || [];
      return null != a && (w(Object(a)) ? r.merge(c, "string" == typeof a ? [a] : a) : h.call(c, a)), c;
    },
    inArray: function inArray(a, b, c) {
      return null == b ? -1 : i.call(b, a, c);
    },
    merge: function merge(a, b) {
      for (var c = +b.length, d = 0, e = a.length; d < c; d++) {
        a[e++] = b[d];
      }

      return a.length = e, a;
    },
    grep: function grep(a, b, c) {
      for (var d, e = [], f = 0, g = a.length, h = !c; f < g; f++) {
        d = !b(a[f], f), d !== h && e.push(a[f]);
      }

      return e;
    },
    map: function map(a, b, c) {
      var d,
          e,
          f = 0,
          h = [];
      if (w(a)) for (d = a.length; f < d; f++) {
        e = b(a[f], f, c), null != e && h.push(e);
      } else for (f in a) {
        e = b(a[f], f, c), null != e && h.push(e);
      }
      return g.apply([], h);
    },
    guid: 1,
    proxy: function proxy(a, b) {
      var c, d, e;
      if ("string" == typeof b && (c = a[b], b = a, a = c), r.isFunction(a)) return d = f.call(arguments, 2), e = function e() {
        return a.apply(b || this, d.concat(f.call(arguments)));
      }, e.guid = a.guid = a.guid || r.guid++, e;
    },
    now: Date.now,
    support: o
  }), "function" == typeof Symbol && (r.fn[Symbol.iterator] = c[Symbol.iterator]), r.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "), function (a, b) {
    j["[object " + b + "]"] = b.toLowerCase();
  });

  function w(a) {
    var b = !!a && "length" in a && a.length,
        c = r.type(a);
    return "function" !== c && !r.isWindow(a) && ("array" === c || 0 === b || "number" == typeof b && b > 0 && b - 1 in a);
  }

  var x = function (a) {
    var b,
        c,
        d,
        e,
        f,
        g,
        h,
        i,
        j,
        k,
        l,
        m,
        n,
        o,
        p,
        q,
        r,
        s,
        t,
        u = "sizzle" + 1 * new Date(),
        v = a.document,
        w = 0,
        x = 0,
        y = ha(),
        z = ha(),
        A = ha(),
        B = function B(a, b) {
      return a === b && (l = !0), 0;
    },
        C = {}.hasOwnProperty,
        D = [],
        E = D.pop,
        F = D.push,
        G = D.push,
        H = D.slice,
        I = function I(a, b) {
      for (var c = 0, d = a.length; c < d; c++) {
        if (a[c] === b) return c;
      }

      return -1;
    },
        J = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
        K = "[\\x20\\t\\r\\n\\f]",
        L = "(?:\\\\.|[\\w-]|[^\0-\\xa0])+",
        M = "\\[" + K + "*(" + L + ")(?:" + K + "*([*^$|!~]?=)" + K + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + L + "))|)" + K + "*\\]",
        N = ":(" + L + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + M + ")*)|.*)\\)|)",
        O = new RegExp(K + "+", "g"),
        P = new RegExp("^" + K + "+|((?:^|[^\\\\])(?:\\\\.)*)" + K + "+$", "g"),
        Q = new RegExp("^" + K + "*," + K + "*"),
        R = new RegExp("^" + K + "*([>+~]|" + K + ")" + K + "*"),
        S = new RegExp("=" + K + "*([^\\]'\"]*?)" + K + "*\\]", "g"),
        T = new RegExp(N),
        U = new RegExp("^" + L + "$"),
        V = {
      ID: new RegExp("^#(" + L + ")"),
      CLASS: new RegExp("^\\.(" + L + ")"),
      TAG: new RegExp("^(" + L + "|[*])"),
      ATTR: new RegExp("^" + M),
      PSEUDO: new RegExp("^" + N),
      CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + K + "*(even|odd|(([+-]|)(\\d*)n|)" + K + "*(?:([+-]|)" + K + "*(\\d+)|))" + K + "*\\)|)", "i"),
      bool: new RegExp("^(?:" + J + ")$", "i"),
      needsContext: new RegExp("^" + K + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + K + "*((?:-\\d)?\\d*)" + K + "*\\)|)(?=[^-]|$)", "i")
    },
        W = /^(?:input|select|textarea|button)$/i,
        X = /^h\d$/i,
        Y = /^[^{]+\{\s*\[native \w/,
        Z = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
        $ = /[+~]/,
        _ = new RegExp("\\\\([\\da-f]{1,6}" + K + "?|(" + K + ")|.)", "ig"),
        aa = function aa(a, b, c) {
      var d = "0x" + b - 65536;
      return d !== d || c ? b : d < 0 ? String.fromCharCode(d + 65536) : String.fromCharCode(d >> 10 | 55296, 1023 & d | 56320);
    },
        ba = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g,
        ca = function ca(a, b) {
      return b ? "\0" === a ? "\uFFFD" : a.slice(0, -1) + "\\" + a.charCodeAt(a.length - 1).toString(16) + " " : "\\" + a;
    },
        da = function da() {
      m();
    },
        ea = ta(function (a) {
      return a.disabled === !0 && ("form" in a || "label" in a);
    }, {
      dir: "parentNode",
      next: "legend"
    });

    try {
      G.apply(D = H.call(v.childNodes), v.childNodes), D[v.childNodes.length].nodeType;
    } catch (fa) {
      G = {
        apply: D.length ? function (a, b) {
          F.apply(a, H.call(b));
        } : function (a, b) {
          var c = a.length,
              d = 0;

          while (a[c++] = b[d++]) {
            ;
          }

          a.length = c - 1;
        }
      };
    }

    function ga(a, b, d, e) {
      var f,
          h,
          j,
          k,
          l,
          o,
          r,
          s = b && b.ownerDocument,
          w = b ? b.nodeType : 9;
      if (d = d || [], "string" != typeof a || !a || 1 !== w && 9 !== w && 11 !== w) return d;

      if (!e && ((b ? b.ownerDocument || b : v) !== n && m(b), b = b || n, p)) {
        if (11 !== w && (l = Z.exec(a))) if (f = l[1]) {
          if (9 === w) {
            if (!(j = b.getElementById(f))) return d;
            if (j.id === f) return d.push(j), d;
          } else if (s && (j = s.getElementById(f)) && t(b, j) && j.id === f) return d.push(j), d;
        } else {
          if (l[2]) return G.apply(d, b.getElementsByTagName(a)), d;
          if ((f = l[3]) && c.getElementsByClassName && b.getElementsByClassName) return G.apply(d, b.getElementsByClassName(f)), d;
        }

        if (c.qsa && !A[a + " "] && (!q || !q.test(a))) {
          if (1 !== w) s = b, r = a;else if ("object" !== b.nodeName.toLowerCase()) {
            (k = b.getAttribute("id")) ? k = k.replace(ba, ca) : b.setAttribute("id", k = u), o = g(a), h = o.length;

            while (h--) {
              o[h] = "#" + k + " " + sa(o[h]);
            }

            r = o.join(","), s = $.test(a) && qa(b.parentNode) || b;
          }
          if (r) try {
            return G.apply(d, s.querySelectorAll(r)), d;
          } catch (x) {} finally {
            k === u && b.removeAttribute("id");
          }
        }
      }

      return i(a.replace(P, "$1"), b, d, e);
    }

    function ha() {
      var a = [];

      function b(c, e) {
        return a.push(c + " ") > d.cacheLength && delete b[a.shift()], b[c + " "] = e;
      }

      return b;
    }

    function ia(a) {
      return a[u] = !0, a;
    }

    function ja(a) {
      var b = n.createElement("fieldset");

      try {
        return !!a(b);
      } catch (c) {
        return !1;
      } finally {
        b.parentNode && b.parentNode.removeChild(b), b = null;
      }
    }

    function ka(a, b) {
      var c = a.split("|"),
          e = c.length;

      while (e--) {
        d.attrHandle[c[e]] = b;
      }
    }

    function la(a, b) {
      var c = b && a,
          d = c && 1 === a.nodeType && 1 === b.nodeType && a.sourceIndex - b.sourceIndex;
      if (d) return d;
      if (c) while (c = c.nextSibling) {
        if (c === b) return -1;
      }
      return a ? 1 : -1;
    }

    function ma(a) {
      return function (b) {
        var c = b.nodeName.toLowerCase();
        return "input" === c && b.type === a;
      };
    }

    function na(a) {
      return function (b) {
        var c = b.nodeName.toLowerCase();
        return ("input" === c || "button" === c) && b.type === a;
      };
    }

    function oa(a) {
      return function (b) {
        return "form" in b ? b.parentNode && b.disabled === !1 ? "label" in b ? "label" in b.parentNode ? b.parentNode.disabled === a : b.disabled === a : b.isDisabled === a || b.isDisabled !== !a && ea(b) === a : b.disabled === a : "label" in b && b.disabled === a;
      };
    }

    function pa(a) {
      return ia(function (b) {
        return b = +b, ia(function (c, d) {
          var e,
              f = a([], c.length, b),
              g = f.length;

          while (g--) {
            c[e = f[g]] && (c[e] = !(d[e] = c[e]));
          }
        });
      });
    }

    function qa(a) {
      return a && "undefined" != typeof a.getElementsByTagName && a;
    }

    c = ga.support = {}, f = ga.isXML = function (a) {
      var b = a && (a.ownerDocument || a).documentElement;
      return !!b && "HTML" !== b.nodeName;
    }, m = ga.setDocument = function (a) {
      var b,
          e,
          g = a ? a.ownerDocument || a : v;
      return g !== n && 9 === g.nodeType && g.documentElement ? (n = g, o = n.documentElement, p = !f(n), v !== n && (e = n.defaultView) && e.top !== e && (e.addEventListener ? e.addEventListener("unload", da, !1) : e.attachEvent && e.attachEvent("onunload", da)), c.attributes = ja(function (a) {
        return a.className = "i", !a.getAttribute("className");
      }), c.getElementsByTagName = ja(function (a) {
        return a.appendChild(n.createComment("")), !a.getElementsByTagName("*").length;
      }), c.getElementsByClassName = Y.test(n.getElementsByClassName), c.getById = ja(function (a) {
        return o.appendChild(a).id = u, !n.getElementsByName || !n.getElementsByName(u).length;
      }), c.getById ? (d.filter.ID = function (a) {
        var b = a.replace(_, aa);
        return function (a) {
          return a.getAttribute("id") === b;
        };
      }, d.find.ID = function (a, b) {
        if ("undefined" != typeof b.getElementById && p) {
          var c = b.getElementById(a);
          return c ? [c] : [];
        }
      }) : (d.filter.ID = function (a) {
        var b = a.replace(_, aa);
        return function (a) {
          var c = "undefined" != typeof a.getAttributeNode && a.getAttributeNode("id");
          return c && c.value === b;
        };
      }, d.find.ID = function (a, b) {
        if ("undefined" != typeof b.getElementById && p) {
          var c,
              d,
              e,
              f = b.getElementById(a);

          if (f) {
            if (c = f.getAttributeNode("id"), c && c.value === a) return [f];
            e = b.getElementsByName(a), d = 0;

            while (f = e[d++]) {
              if (c = f.getAttributeNode("id"), c && c.value === a) return [f];
            }
          }

          return [];
        }
      }), d.find.TAG = c.getElementsByTagName ? function (a, b) {
        return "undefined" != typeof b.getElementsByTagName ? b.getElementsByTagName(a) : c.qsa ? b.querySelectorAll(a) : void 0;
      } : function (a, b) {
        var c,
            d = [],
            e = 0,
            f = b.getElementsByTagName(a);

        if ("*" === a) {
          while (c = f[e++]) {
            1 === c.nodeType && d.push(c);
          }

          return d;
        }

        return f;
      }, d.find.CLASS = c.getElementsByClassName && function (a, b) {
        if ("undefined" != typeof b.getElementsByClassName && p) return b.getElementsByClassName(a);
      }, r = [], q = [], (c.qsa = Y.test(n.querySelectorAll)) && (ja(function (a) {
        o.appendChild(a).innerHTML = "<a id='" + u + "'></a><select id='" + u + "-\r\\' msallowcapture=''><option selected=''></option></select>", a.querySelectorAll("[msallowcapture^='']").length && q.push("[*^$]=" + K + "*(?:''|\"\")"), a.querySelectorAll("[selected]").length || q.push("\\[" + K + "*(?:value|" + J + ")"), a.querySelectorAll("[id~=" + u + "-]").length || q.push("~="), a.querySelectorAll(":checked").length || q.push(":checked"), a.querySelectorAll("a#" + u + "+*").length || q.push(".#.+[+~]");
      }), ja(function (a) {
        a.innerHTML = "<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";
        var b = n.createElement("input");
        b.setAttribute("type", "hidden"), a.appendChild(b).setAttribute("name", "D"), a.querySelectorAll("[name=d]").length && q.push("name" + K + "*[*^$|!~]?="), 2 !== a.querySelectorAll(":enabled").length && q.push(":enabled", ":disabled"), o.appendChild(a).disabled = !0, 2 !== a.querySelectorAll(":disabled").length && q.push(":enabled", ":disabled"), a.querySelectorAll("*,:x"), q.push(",.*:");
      })), (c.matchesSelector = Y.test(s = o.matches || o.webkitMatchesSelector || o.mozMatchesSelector || o.oMatchesSelector || o.msMatchesSelector)) && ja(function (a) {
        c.disconnectedMatch = s.call(a, "*"), s.call(a, "[s!='']:x"), r.push("!=", N);
      }), q = q.length && new RegExp(q.join("|")), r = r.length && new RegExp(r.join("|")), b = Y.test(o.compareDocumentPosition), t = b || Y.test(o.contains) ? function (a, b) {
        var c = 9 === a.nodeType ? a.documentElement : a,
            d = b && b.parentNode;
        return a === d || !(!d || 1 !== d.nodeType || !(c.contains ? c.contains(d) : a.compareDocumentPosition && 16 & a.compareDocumentPosition(d)));
      } : function (a, b) {
        if (b) while (b = b.parentNode) {
          if (b === a) return !0;
        }
        return !1;
      }, B = b ? function (a, b) {
        if (a === b) return l = !0, 0;
        var d = !a.compareDocumentPosition - !b.compareDocumentPosition;
        return d ? d : (d = (a.ownerDocument || a) === (b.ownerDocument || b) ? a.compareDocumentPosition(b) : 1, 1 & d || !c.sortDetached && b.compareDocumentPosition(a) === d ? a === n || a.ownerDocument === v && t(v, a) ? -1 : b === n || b.ownerDocument === v && t(v, b) ? 1 : k ? I(k, a) - I(k, b) : 0 : 4 & d ? -1 : 1);
      } : function (a, b) {
        if (a === b) return l = !0, 0;
        var c,
            d = 0,
            e = a.parentNode,
            f = b.parentNode,
            g = [a],
            h = [b];
        if (!e || !f) return a === n ? -1 : b === n ? 1 : e ? -1 : f ? 1 : k ? I(k, a) - I(k, b) : 0;
        if (e === f) return la(a, b);
        c = a;

        while (c = c.parentNode) {
          g.unshift(c);
        }

        c = b;

        while (c = c.parentNode) {
          h.unshift(c);
        }

        while (g[d] === h[d]) {
          d++;
        }

        return d ? la(g[d], h[d]) : g[d] === v ? -1 : h[d] === v ? 1 : 0;
      }, n) : n;
    }, ga.matches = function (a, b) {
      return ga(a, null, null, b);
    }, ga.matchesSelector = function (a, b) {
      if ((a.ownerDocument || a) !== n && m(a), b = b.replace(S, "='$1']"), c.matchesSelector && p && !A[b + " "] && (!r || !r.test(b)) && (!q || !q.test(b))) try {
        var d = s.call(a, b);
        if (d || c.disconnectedMatch || a.document && 11 !== a.document.nodeType) return d;
      } catch (e) {}
      return ga(b, n, null, [a]).length > 0;
    }, ga.contains = function (a, b) {
      return (a.ownerDocument || a) !== n && m(a), t(a, b);
    }, ga.attr = function (a, b) {
      (a.ownerDocument || a) !== n && m(a);
      var e = d.attrHandle[b.toLowerCase()],
          f = e && C.call(d.attrHandle, b.toLowerCase()) ? e(a, b, !p) : void 0;
      return void 0 !== f ? f : c.attributes || !p ? a.getAttribute(b) : (f = a.getAttributeNode(b)) && f.specified ? f.value : null;
    }, ga.escape = function (a) {
      return (a + "").replace(ba, ca);
    }, ga.error = function (a) {
      throw new Error("Syntax error, unrecognized expression: " + a);
    }, ga.uniqueSort = function (a) {
      var b,
          d = [],
          e = 0,
          f = 0;

      if (l = !c.detectDuplicates, k = !c.sortStable && a.slice(0), a.sort(B), l) {
        while (b = a[f++]) {
          b === a[f] && (e = d.push(f));
        }

        while (e--) {
          a.splice(d[e], 1);
        }
      }

      return k = null, a;
    }, e = ga.getText = function (a) {
      var b,
          c = "",
          d = 0,
          f = a.nodeType;

      if (f) {
        if (1 === f || 9 === f || 11 === f) {
          if ("string" == typeof a.textContent) return a.textContent;

          for (a = a.firstChild; a; a = a.nextSibling) {
            c += e(a);
          }
        } else if (3 === f || 4 === f) return a.nodeValue;
      } else while (b = a[d++]) {
        c += e(b);
      }

      return c;
    }, d = ga.selectors = {
      cacheLength: 50,
      createPseudo: ia,
      match: V,
      attrHandle: {},
      find: {},
      relative: {
        ">": {
          dir: "parentNode",
          first: !0
        },
        " ": {
          dir: "parentNode"
        },
        "+": {
          dir: "previousSibling",
          first: !0
        },
        "~": {
          dir: "previousSibling"
        }
      },
      preFilter: {
        ATTR: function ATTR(a) {
          return a[1] = a[1].replace(_, aa), a[3] = (a[3] || a[4] || a[5] || "").replace(_, aa), "~=" === a[2] && (a[3] = " " + a[3] + " "), a.slice(0, 4);
        },
        CHILD: function CHILD(a) {
          return a[1] = a[1].toLowerCase(), "nth" === a[1].slice(0, 3) ? (a[3] || ga.error(a[0]), a[4] = +(a[4] ? a[5] + (a[6] || 1) : 2 * ("even" === a[3] || "odd" === a[3])), a[5] = +(a[7] + a[8] || "odd" === a[3])) : a[3] && ga.error(a[0]), a;
        },
        PSEUDO: function PSEUDO(a) {
          var b,
              c = !a[6] && a[2];
          return V.CHILD.test(a[0]) ? null : (a[3] ? a[2] = a[4] || a[5] || "" : c && T.test(c) && (b = g(c, !0)) && (b = c.indexOf(")", c.length - b) - c.length) && (a[0] = a[0].slice(0, b), a[2] = c.slice(0, b)), a.slice(0, 3));
        }
      },
      filter: {
        TAG: function TAG(a) {
          var b = a.replace(_, aa).toLowerCase();
          return "*" === a ? function () {
            return !0;
          } : function (a) {
            return a.nodeName && a.nodeName.toLowerCase() === b;
          };
        },
        CLASS: function CLASS(a) {
          var b = y[a + " "];
          return b || (b = new RegExp("(^|" + K + ")" + a + "(" + K + "|$)")) && y(a, function (a) {
            return b.test("string" == typeof a.className && a.className || "undefined" != typeof a.getAttribute && a.getAttribute("class") || "");
          });
        },
        ATTR: function ATTR(a, b, c) {
          return function (d) {
            var e = ga.attr(d, a);
            return null == e ? "!=" === b : !b || (e += "", "=" === b ? e === c : "!=" === b ? e !== c : "^=" === b ? c && 0 === e.indexOf(c) : "*=" === b ? c && e.indexOf(c) > -1 : "$=" === b ? c && e.slice(-c.length) === c : "~=" === b ? (" " + e.replace(O, " ") + " ").indexOf(c) > -1 : "|=" === b && (e === c || e.slice(0, c.length + 1) === c + "-"));
          };
        },
        CHILD: function CHILD(a, b, c, d, e) {
          var f = "nth" !== a.slice(0, 3),
              g = "last" !== a.slice(-4),
              h = "of-type" === b;
          return 1 === d && 0 === e ? function (a) {
            return !!a.parentNode;
          } : function (b, c, i) {
            var j,
                k,
                l,
                m,
                n,
                o,
                p = f !== g ? "nextSibling" : "previousSibling",
                q = b.parentNode,
                r = h && b.nodeName.toLowerCase(),
                s = !i && !h,
                t = !1;

            if (q) {
              if (f) {
                while (p) {
                  m = b;

                  while (m = m[p]) {
                    if (h ? m.nodeName.toLowerCase() === r : 1 === m.nodeType) return !1;
                  }

                  o = p = "only" === a && !o && "nextSibling";
                }

                return !0;
              }

              if (o = [g ? q.firstChild : q.lastChild], g && s) {
                m = q, l = m[u] || (m[u] = {}), k = l[m.uniqueID] || (l[m.uniqueID] = {}), j = k[a] || [], n = j[0] === w && j[1], t = n && j[2], m = n && q.childNodes[n];

                while (m = ++n && m && m[p] || (t = n = 0) || o.pop()) {
                  if (1 === m.nodeType && ++t && m === b) {
                    k[a] = [w, n, t];
                    break;
                  }
                }
              } else if (s && (m = b, l = m[u] || (m[u] = {}), k = l[m.uniqueID] || (l[m.uniqueID] = {}), j = k[a] || [], n = j[0] === w && j[1], t = n), t === !1) while (m = ++n && m && m[p] || (t = n = 0) || o.pop()) {
                if ((h ? m.nodeName.toLowerCase() === r : 1 === m.nodeType) && ++t && (s && (l = m[u] || (m[u] = {}), k = l[m.uniqueID] || (l[m.uniqueID] = {}), k[a] = [w, t]), m === b)) break;
              }

              return t -= e, t === d || t % d === 0 && t / d >= 0;
            }
          };
        },
        PSEUDO: function PSEUDO(a, b) {
          var c,
              e = d.pseudos[a] || d.setFilters[a.toLowerCase()] || ga.error("unsupported pseudo: " + a);
          return e[u] ? e(b) : e.length > 1 ? (c = [a, a, "", b], d.setFilters.hasOwnProperty(a.toLowerCase()) ? ia(function (a, c) {
            var d,
                f = e(a, b),
                g = f.length;

            while (g--) {
              d = I(a, f[g]), a[d] = !(c[d] = f[g]);
            }
          }) : function (a) {
            return e(a, 0, c);
          }) : e;
        }
      },
      pseudos: {
        not: ia(function (a) {
          var b = [],
              c = [],
              d = h(a.replace(P, "$1"));
          return d[u] ? ia(function (a, b, c, e) {
            var f,
                g = d(a, null, e, []),
                h = a.length;

            while (h--) {
              (f = g[h]) && (a[h] = !(b[h] = f));
            }
          }) : function (a, e, f) {
            return b[0] = a, d(b, null, f, c), b[0] = null, !c.pop();
          };
        }),
        has: ia(function (a) {
          return function (b) {
            return ga(a, b).length > 0;
          };
        }),
        contains: ia(function (a) {
          return a = a.replace(_, aa), function (b) {
            return (b.textContent || b.innerText || e(b)).indexOf(a) > -1;
          };
        }),
        lang: ia(function (a) {
          return U.test(a || "") || ga.error("unsupported lang: " + a), a = a.replace(_, aa).toLowerCase(), function (b) {
            var c;

            do {
              if (c = p ? b.lang : b.getAttribute("xml:lang") || b.getAttribute("lang")) return c = c.toLowerCase(), c === a || 0 === c.indexOf(a + "-");
            } while ((b = b.parentNode) && 1 === b.nodeType);

            return !1;
          };
        }),
        target: function target(b) {
          var c = a.location && a.location.hash;
          return c && c.slice(1) === b.id;
        },
        root: function root(a) {
          return a === o;
        },
        focus: function focus(a) {
          return a === n.activeElement && (!n.hasFocus || n.hasFocus()) && !!(a.type || a.href || ~a.tabIndex);
        },
        enabled: oa(!1),
        disabled: oa(!0),
        checked: function checked(a) {
          var b = a.nodeName.toLowerCase();
          return "input" === b && !!a.checked || "option" === b && !!a.selected;
        },
        selected: function selected(a) {
          return a.parentNode && a.parentNode.selectedIndex, a.selected === !0;
        },
        empty: function empty(a) {
          for (a = a.firstChild; a; a = a.nextSibling) {
            if (a.nodeType < 6) return !1;
          }

          return !0;
        },
        parent: function parent(a) {
          return !d.pseudos.empty(a);
        },
        header: function header(a) {
          return X.test(a.nodeName);
        },
        input: function input(a) {
          return W.test(a.nodeName);
        },
        button: function button(a) {
          var b = a.nodeName.toLowerCase();
          return "input" === b && "button" === a.type || "button" === b;
        },
        text: function text(a) {
          var b;
          return "input" === a.nodeName.toLowerCase() && "text" === a.type && (null == (b = a.getAttribute("type")) || "text" === b.toLowerCase());
        },
        first: pa(function () {
          return [0];
        }),
        last: pa(function (a, b) {
          return [b - 1];
        }),
        eq: pa(function (a, b, c) {
          return [c < 0 ? c + b : c];
        }),
        even: pa(function (a, b) {
          for (var c = 0; c < b; c += 2) {
            a.push(c);
          }

          return a;
        }),
        odd: pa(function (a, b) {
          for (var c = 1; c < b; c += 2) {
            a.push(c);
          }

          return a;
        }),
        lt: pa(function (a, b, c) {
          for (var d = c < 0 ? c + b : c; --d >= 0;) {
            a.push(d);
          }

          return a;
        }),
        gt: pa(function (a, b, c) {
          for (var d = c < 0 ? c + b : c; ++d < b;) {
            a.push(d);
          }

          return a;
        })
      }
    }, d.pseudos.nth = d.pseudos.eq;

    for (b in {
      radio: !0,
      checkbox: !0,
      file: !0,
      password: !0,
      image: !0
    }) {
      d.pseudos[b] = ma(b);
    }

    for (b in {
      submit: !0,
      reset: !0
    }) {
      d.pseudos[b] = na(b);
    }

    function ra() {}

    ra.prototype = d.filters = d.pseudos, d.setFilters = new ra(), g = ga.tokenize = function (a, b) {
      var c,
          e,
          f,
          g,
          h,
          i,
          j,
          k = z[a + " "];
      if (k) return b ? 0 : k.slice(0);
      h = a, i = [], j = d.preFilter;

      while (h) {
        c && !(e = Q.exec(h)) || (e && (h = h.slice(e[0].length) || h), i.push(f = [])), c = !1, (e = R.exec(h)) && (c = e.shift(), f.push({
          value: c,
          type: e[0].replace(P, " ")
        }), h = h.slice(c.length));

        for (g in d.filter) {
          !(e = V[g].exec(h)) || j[g] && !(e = j[g](e)) || (c = e.shift(), f.push({
            value: c,
            type: g,
            matches: e
          }), h = h.slice(c.length));
        }

        if (!c) break;
      }

      return b ? h.length : h ? ga.error(a) : z(a, i).slice(0);
    };

    function sa(a) {
      for (var b = 0, c = a.length, d = ""; b < c; b++) {
        d += a[b].value;
      }

      return d;
    }

    function ta(a, b, c) {
      var d = b.dir,
          e = b.next,
          f = e || d,
          g = c && "parentNode" === f,
          h = x++;
      return b.first ? function (b, c, e) {
        while (b = b[d]) {
          if (1 === b.nodeType || g) return a(b, c, e);
        }

        return !1;
      } : function (b, c, i) {
        var j,
            k,
            l,
            m = [w, h];

        if (i) {
          while (b = b[d]) {
            if ((1 === b.nodeType || g) && a(b, c, i)) return !0;
          }
        } else while (b = b[d]) {
          if (1 === b.nodeType || g) if (l = b[u] || (b[u] = {}), k = l[b.uniqueID] || (l[b.uniqueID] = {}), e && e === b.nodeName.toLowerCase()) b = b[d] || b;else {
            if ((j = k[f]) && j[0] === w && j[1] === h) return m[2] = j[2];
            if (k[f] = m, m[2] = a(b, c, i)) return !0;
          }
        }

        return !1;
      };
    }

    function ua(a) {
      return a.length > 1 ? function (b, c, d) {
        var e = a.length;

        while (e--) {
          if (!a[e](b, c, d)) return !1;
        }

        return !0;
      } : a[0];
    }

    function va(a, b, c) {
      for (var d = 0, e = b.length; d < e; d++) {
        ga(a, b[d], c);
      }

      return c;
    }

    function wa(a, b, c, d, e) {
      for (var f, g = [], h = 0, i = a.length, j = null != b; h < i; h++) {
        (f = a[h]) && (c && !c(f, d, e) || (g.push(f), j && b.push(h)));
      }

      return g;
    }

    function xa(a, b, c, d, e, f) {
      return d && !d[u] && (d = xa(d)), e && !e[u] && (e = xa(e, f)), ia(function (f, g, h, i) {
        var j,
            k,
            l,
            m = [],
            n = [],
            o = g.length,
            p = f || va(b || "*", h.nodeType ? [h] : h, []),
            q = !a || !f && b ? p : wa(p, m, a, h, i),
            r = c ? e || (f ? a : o || d) ? [] : g : q;

        if (c && c(q, r, h, i), d) {
          j = wa(r, n), d(j, [], h, i), k = j.length;

          while (k--) {
            (l = j[k]) && (r[n[k]] = !(q[n[k]] = l));
          }
        }

        if (f) {
          if (e || a) {
            if (e) {
              j = [], k = r.length;

              while (k--) {
                (l = r[k]) && j.push(q[k] = l);
              }

              e(null, r = [], j, i);
            }

            k = r.length;

            while (k--) {
              (l = r[k]) && (j = e ? I(f, l) : m[k]) > -1 && (f[j] = !(g[j] = l));
            }
          }
        } else r = wa(r === g ? r.splice(o, r.length) : r), e ? e(null, g, r, i) : G.apply(g, r);
      });
    }

    function ya(a) {
      for (var b, c, e, f = a.length, g = d.relative[a[0].type], h = g || d.relative[" "], i = g ? 1 : 0, k = ta(function (a) {
        return a === b;
      }, h, !0), l = ta(function (a) {
        return I(b, a) > -1;
      }, h, !0), m = [function (a, c, d) {
        var e = !g && (d || c !== j) || ((b = c).nodeType ? k(a, c, d) : l(a, c, d));
        return b = null, e;
      }]; i < f; i++) {
        if (c = d.relative[a[i].type]) m = [ta(ua(m), c)];else {
          if (c = d.filter[a[i].type].apply(null, a[i].matches), c[u]) {
            for (e = ++i; e < f; e++) {
              if (d.relative[a[e].type]) break;
            }

            return xa(i > 1 && ua(m), i > 1 && sa(a.slice(0, i - 1).concat({
              value: " " === a[i - 2].type ? "*" : ""
            })).replace(P, "$1"), c, i < e && ya(a.slice(i, e)), e < f && ya(a = a.slice(e)), e < f && sa(a));
          }

          m.push(c);
        }
      }

      return ua(m);
    }

    function za(a, b) {
      var c = b.length > 0,
          e = a.length > 0,
          f = function f(_f, g, h, i, k) {
        var l,
            o,
            q,
            r = 0,
            s = "0",
            t = _f && [],
            u = [],
            v = j,
            x = _f || e && d.find.TAG("*", k),
            y = w += null == v ? 1 : Math.random() || .1,
            z = x.length;

        for (k && (j = g === n || g || k); s !== z && null != (l = x[s]); s++) {
          if (e && l) {
            o = 0, g || l.ownerDocument === n || (m(l), h = !p);

            while (q = a[o++]) {
              if (q(l, g || n, h)) {
                i.push(l);
                break;
              }
            }

            k && (w = y);
          }

          c && ((l = !q && l) && r--, _f && t.push(l));
        }

        if (r += s, c && s !== r) {
          o = 0;

          while (q = b[o++]) {
            q(t, u, g, h);
          }

          if (_f) {
            if (r > 0) while (s--) {
              t[s] || u[s] || (u[s] = E.call(i));
            }
            u = wa(u);
          }

          G.apply(i, u), k && !_f && u.length > 0 && r + b.length > 1 && ga.uniqueSort(i);
        }

        return k && (w = y, j = v), t;
      };

      return c ? ia(f) : f;
    }

    return h = ga.compile = function (a, b) {
      var c,
          d = [],
          e = [],
          f = A[a + " "];

      if (!f) {
        b || (b = g(a)), c = b.length;

        while (c--) {
          f = ya(b[c]), f[u] ? d.push(f) : e.push(f);
        }

        f = A(a, za(e, d)), f.selector = a;
      }

      return f;
    }, i = ga.select = function (a, b, c, e) {
      var f,
          i,
          j,
          k,
          l,
          m = "function" == typeof a && a,
          n = !e && g(a = m.selector || a);

      if (c = c || [], 1 === n.length) {
        if (i = n[0] = n[0].slice(0), i.length > 2 && "ID" === (j = i[0]).type && 9 === b.nodeType && p && d.relative[i[1].type]) {
          if (b = (d.find.ID(j.matches[0].replace(_, aa), b) || [])[0], !b) return c;
          m && (b = b.parentNode), a = a.slice(i.shift().value.length);
        }

        f = V.needsContext.test(a) ? 0 : i.length;

        while (f--) {
          if (j = i[f], d.relative[k = j.type]) break;

          if ((l = d.find[k]) && (e = l(j.matches[0].replace(_, aa), $.test(i[0].type) && qa(b.parentNode) || b))) {
            if (i.splice(f, 1), a = e.length && sa(i), !a) return G.apply(c, e), c;
            break;
          }
        }
      }

      return (m || h(a, n))(e, b, !p, c, !b || $.test(a) && qa(b.parentNode) || b), c;
    }, c.sortStable = u.split("").sort(B).join("") === u, c.detectDuplicates = !!l, m(), c.sortDetached = ja(function (a) {
      return 1 & a.compareDocumentPosition(n.createElement("fieldset"));
    }), ja(function (a) {
      return a.innerHTML = "<a href='#'></a>", "#" === a.firstChild.getAttribute("href");
    }) || ka("type|href|height|width", function (a, b, c) {
      if (!c) return a.getAttribute(b, "type" === b.toLowerCase() ? 1 : 2);
    }), c.attributes && ja(function (a) {
      return a.innerHTML = "<input/>", a.firstChild.setAttribute("value", ""), "" === a.firstChild.getAttribute("value");
    }) || ka("value", function (a, b, c) {
      if (!c && "input" === a.nodeName.toLowerCase()) return a.defaultValue;
    }), ja(function (a) {
      return null == a.getAttribute("disabled");
    }) || ka(J, function (a, b, c) {
      var d;
      if (!c) return a[b] === !0 ? b.toLowerCase() : (d = a.getAttributeNode(b)) && d.specified ? d.value : null;
    }), ga;
  }(a);

  r.find = x, r.expr = x.selectors, r.expr[":"] = r.expr.pseudos, r.uniqueSort = r.unique = x.uniqueSort, r.text = x.getText, r.isXMLDoc = x.isXML, r.contains = x.contains, r.escapeSelector = x.escape;

  var y = function y(a, b, c) {
    var d = [],
        e = void 0 !== c;

    while ((a = a[b]) && 9 !== a.nodeType) {
      if (1 === a.nodeType) {
        if (e && r(a).is(c)) break;
        d.push(a);
      }
    }

    return d;
  },
      z = function z(a, b) {
    for (var c = []; a; a = a.nextSibling) {
      1 === a.nodeType && a !== b && c.push(a);
    }

    return c;
  },
      A = r.expr.match.needsContext;

  function B(a, b) {
    return a.nodeName && a.nodeName.toLowerCase() === b.toLowerCase();
  }

  var C = /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i,
      D = /^.[^:#\[\.,]*$/;

  function E(a, b, c) {
    return r.isFunction(b) ? r.grep(a, function (a, d) {
      return !!b.call(a, d, a) !== c;
    }) : b.nodeType ? r.grep(a, function (a) {
      return a === b !== c;
    }) : "string" != typeof b ? r.grep(a, function (a) {
      return i.call(b, a) > -1 !== c;
    }) : D.test(b) ? r.filter(b, a, c) : (b = r.filter(b, a), r.grep(a, function (a) {
      return i.call(b, a) > -1 !== c && 1 === a.nodeType;
    }));
  }

  r.filter = function (a, b, c) {
    var d = b[0];
    return c && (a = ":not(" + a + ")"), 1 === b.length && 1 === d.nodeType ? r.find.matchesSelector(d, a) ? [d] : [] : r.find.matches(a, r.grep(b, function (a) {
      return 1 === a.nodeType;
    }));
  }, r.fn.extend({
    find: function find(a) {
      var b,
          c,
          d = this.length,
          e = this;
      if ("string" != typeof a) return this.pushStack(r(a).filter(function () {
        for (b = 0; b < d; b++) {
          if (r.contains(e[b], this)) return !0;
        }
      }));

      for (c = this.pushStack([]), b = 0; b < d; b++) {
        r.find(a, e[b], c);
      }

      return d > 1 ? r.uniqueSort(c) : c;
    },
    filter: function filter(a) {
      return this.pushStack(E(this, a || [], !1));
    },
    not: function not(a) {
      return this.pushStack(E(this, a || [], !0));
    },
    is: function is(a) {
      return !!E(this, "string" == typeof a && A.test(a) ? r(a) : a || [], !1).length;
    }
  });

  var F,
      G = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/,
      H = r.fn.init = function (a, b, c) {
    var e, f;
    if (!a) return this;

    if (c = c || F, "string" == typeof a) {
      if (e = "<" === a[0] && ">" === a[a.length - 1] && a.length >= 3 ? [null, a, null] : G.exec(a), !e || !e[1] && b) return !b || b.jquery ? (b || c).find(a) : this.constructor(b).find(a);

      if (e[1]) {
        if (b = b instanceof r ? b[0] : b, r.merge(this, r.parseHTML(e[1], b && b.nodeType ? b.ownerDocument || b : d, !0)), C.test(e[1]) && r.isPlainObject(b)) for (e in b) {
          r.isFunction(this[e]) ? this[e](b[e]) : this.attr(e, b[e]);
        }
        return this;
      }

      return f = d.getElementById(e[2]), f && (this[0] = f, this.length = 1), this;
    }

    return a.nodeType ? (this[0] = a, this.length = 1, this) : r.isFunction(a) ? void 0 !== c.ready ? c.ready(a) : a(r) : r.makeArray(a, this);
  };

  H.prototype = r.fn, F = r(d);
  var I = /^(?:parents|prev(?:Until|All))/,
      J = {
    children: !0,
    contents: !0,
    next: !0,
    prev: !0
  };
  r.fn.extend({
    has: function has(a) {
      var b = r(a, this),
          c = b.length;
      return this.filter(function () {
        for (var a = 0; a < c; a++) {
          if (r.contains(this, b[a])) return !0;
        }
      });
    },
    closest: function closest(a, b) {
      var c,
          d = 0,
          e = this.length,
          f = [],
          g = "string" != typeof a && r(a);
      if (!A.test(a)) for (; d < e; d++) {
        for (c = this[d]; c && c !== b; c = c.parentNode) {
          if (c.nodeType < 11 && (g ? g.index(c) > -1 : 1 === c.nodeType && r.find.matchesSelector(c, a))) {
            f.push(c);
            break;
          }
        }
      }
      return this.pushStack(f.length > 1 ? r.uniqueSort(f) : f);
    },
    index: function index(a) {
      return a ? "string" == typeof a ? i.call(r(a), this[0]) : i.call(this, a.jquery ? a[0] : a) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1;
    },
    add: function add(a, b) {
      return this.pushStack(r.uniqueSort(r.merge(this.get(), r(a, b))));
    },
    addBack: function addBack(a) {
      return this.add(null == a ? this.prevObject : this.prevObject.filter(a));
    }
  });

  function K(a, b) {
    while ((a = a[b]) && 1 !== a.nodeType) {
      ;
    }

    return a;
  }

  r.each({
    parent: function parent(a) {
      var b = a.parentNode;
      return b && 11 !== b.nodeType ? b : null;
    },
    parents: function parents(a) {
      return y(a, "parentNode");
    },
    parentsUntil: function parentsUntil(a, b, c) {
      return y(a, "parentNode", c);
    },
    next: function next(a) {
      return K(a, "nextSibling");
    },
    prev: function prev(a) {
      return K(a, "previousSibling");
    },
    nextAll: function nextAll(a) {
      return y(a, "nextSibling");
    },
    prevAll: function prevAll(a) {
      return y(a, "previousSibling");
    },
    nextUntil: function nextUntil(a, b, c) {
      return y(a, "nextSibling", c);
    },
    prevUntil: function prevUntil(a, b, c) {
      return y(a, "previousSibling", c);
    },
    siblings: function siblings(a) {
      return z((a.parentNode || {}).firstChild, a);
    },
    children: function children(a) {
      return z(a.firstChild);
    },
    contents: function contents(a) {
      return B(a, "iframe") ? a.contentDocument : (B(a, "template") && (a = a.content || a), r.merge([], a.childNodes));
    }
  }, function (a, b) {
    r.fn[a] = function (c, d) {
      var e = r.map(this, b, c);
      return "Until" !== a.slice(-5) && (d = c), d && "string" == typeof d && (e = r.filter(d, e)), this.length > 1 && (J[a] || r.uniqueSort(e), I.test(a) && e.reverse()), this.pushStack(e);
    };
  });
  var L = /[^\x20\t\r\n\f]+/g;

  function M(a) {
    var b = {};
    return r.each(a.match(L) || [], function (a, c) {
      b[c] = !0;
    }), b;
  }

  r.Callbacks = function (a) {
    a = "string" == typeof a ? M(a) : r.extend({}, a);

    var b,
        c,
        d,
        e,
        f = [],
        g = [],
        h = -1,
        i = function i() {
      for (e = e || a.once, d = b = !0; g.length; h = -1) {
        c = g.shift();

        while (++h < f.length) {
          f[h].apply(c[0], c[1]) === !1 && a.stopOnFalse && (h = f.length, c = !1);
        }
      }

      a.memory || (c = !1), b = !1, e && (f = c ? [] : "");
    },
        j = {
      add: function add() {
        return f && (c && !b && (h = f.length - 1, g.push(c)), function d(b) {
          r.each(b, function (b, c) {
            r.isFunction(c) ? a.unique && j.has(c) || f.push(c) : c && c.length && "string" !== r.type(c) && d(c);
          });
        }(arguments), c && !b && i()), this;
      },
      remove: function remove() {
        return r.each(arguments, function (a, b) {
          var c;

          while ((c = r.inArray(b, f, c)) > -1) {
            f.splice(c, 1), c <= h && h--;
          }
        }), this;
      },
      has: function has(a) {
        return a ? r.inArray(a, f) > -1 : f.length > 0;
      },
      empty: function empty() {
        return f && (f = []), this;
      },
      disable: function disable() {
        return e = g = [], f = c = "", this;
      },
      disabled: function disabled() {
        return !f;
      },
      lock: function lock() {
        return e = g = [], c || b || (f = c = ""), this;
      },
      locked: function locked() {
        return !!e;
      },
      fireWith: function fireWith(a, c) {
        return e || (c = c || [], c = [a, c.slice ? c.slice() : c], g.push(c), b || i()), this;
      },
      fire: function fire() {
        return j.fireWith(this, arguments), this;
      },
      fired: function fired() {
        return !!d;
      }
    };

    return j;
  };

  function N(a) {
    return a;
  }

  function O(a) {
    throw a;
  }

  function P(a, b, c, d) {
    var e;

    try {
      a && r.isFunction(e = a.promise) ? e.call(a).done(b).fail(c) : a && r.isFunction(e = a.then) ? e.call(a, b, c) : b.apply(void 0, [a].slice(d));
    } catch (a) {
      c.apply(void 0, [a]);
    }
  }

  r.extend({
    Deferred: function Deferred(b) {
      var c = [["notify", "progress", r.Callbacks("memory"), r.Callbacks("memory"), 2], ["resolve", "done", r.Callbacks("once memory"), r.Callbacks("once memory"), 0, "resolved"], ["reject", "fail", r.Callbacks("once memory"), r.Callbacks("once memory"), 1, "rejected"]],
          d = "pending",
          e = {
        state: function state() {
          return d;
        },
        always: function always() {
          return f.done(arguments).fail(arguments), this;
        },
        "catch": function _catch(a) {
          return e.then(null, a);
        },
        pipe: function pipe() {
          var a = arguments;
          return r.Deferred(function (b) {
            r.each(c, function (c, d) {
              var e = r.isFunction(a[d[4]]) && a[d[4]];
              f[d[1]](function () {
                var a = e && e.apply(this, arguments);
                a && r.isFunction(a.promise) ? a.promise().progress(b.notify).done(b.resolve).fail(b.reject) : b[d[0] + "With"](this, e ? [a] : arguments);
              });
            }), a = null;
          }).promise();
        },
        then: function then(b, d, e) {
          var f = 0;

          function g(b, c, d, e) {
            return function () {
              var h = this,
                  i = arguments,
                  j = function j() {
                var a, j;

                if (!(b < f)) {
                  if (a = d.apply(h, i), a === c.promise()) throw new TypeError("Thenable self-resolution");
                  j = a && ("object" == _typeof(a) || "function" == typeof a) && a.then, r.isFunction(j) ? e ? j.call(a, g(f, c, N, e), g(f, c, O, e)) : (f++, j.call(a, g(f, c, N, e), g(f, c, O, e), g(f, c, N, c.notifyWith))) : (d !== N && (h = void 0, i = [a]), (e || c.resolveWith)(h, i));
                }
              },
                  k = e ? j : function () {
                try {
                  j();
                } catch (a) {
                  r.Deferred.exceptionHook && r.Deferred.exceptionHook(a, k.stackTrace), b + 1 >= f && (d !== O && (h = void 0, i = [a]), c.rejectWith(h, i));
                }
              };

              b ? k() : (r.Deferred.getStackHook && (k.stackTrace = r.Deferred.getStackHook()), a.setTimeout(k));
            };
          }

          return r.Deferred(function (a) {
            c[0][3].add(g(0, a, r.isFunction(e) ? e : N, a.notifyWith)), c[1][3].add(g(0, a, r.isFunction(b) ? b : N)), c[2][3].add(g(0, a, r.isFunction(d) ? d : O));
          }).promise();
        },
        promise: function promise(a) {
          return null != a ? r.extend(a, e) : e;
        }
      },
          f = {};
      return r.each(c, function (a, b) {
        var g = b[2],
            h = b[5];
        e[b[1]] = g.add, h && g.add(function () {
          d = h;
        }, c[3 - a][2].disable, c[0][2].lock), g.add(b[3].fire), f[b[0]] = function () {
          return f[b[0] + "With"](this === f ? void 0 : this, arguments), this;
        }, f[b[0] + "With"] = g.fireWith;
      }), e.promise(f), b && b.call(f, f), f;
    },
    when: function when(a) {
      var b = arguments.length,
          c = b,
          d = Array(c),
          e = f.call(arguments),
          g = r.Deferred(),
          h = function h(a) {
        return function (c) {
          d[a] = this, e[a] = arguments.length > 1 ? f.call(arguments) : c, --b || g.resolveWith(d, e);
        };
      };

      if (b <= 1 && (P(a, g.done(h(c)).resolve, g.reject, !b), "pending" === g.state() || r.isFunction(e[c] && e[c].then))) return g.then();

      while (c--) {
        P(e[c], h(c), g.reject);
      }

      return g.promise();
    }
  });
  var Q = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;
  r.Deferred.exceptionHook = function (b, c) {
    a.console && a.console.warn && b && Q.test(b.name) && a.console.warn("jQuery.Deferred exception: " + b.message, b.stack, c);
  }, r.readyException = function (b) {
    a.setTimeout(function () {
      throw b;
    });
  };
  var R = r.Deferred();
  r.fn.ready = function (a) {
    return R.then(a)["catch"](function (a) {
      r.readyException(a);
    }), this;
  }, r.extend({
    isReady: !1,
    readyWait: 1,
    ready: function ready(a) {
      (a === !0 ? --r.readyWait : r.isReady) || (r.isReady = !0, a !== !0 && --r.readyWait > 0 || R.resolveWith(d, [r]));
    }
  }), r.ready.then = R.then;

  function S() {
    d.removeEventListener("DOMContentLoaded", S), a.removeEventListener("load", S), r.ready();
  }

  "complete" === d.readyState || "loading" !== d.readyState && !d.documentElement.doScroll ? a.setTimeout(r.ready) : (d.addEventListener("DOMContentLoaded", S), a.addEventListener("load", S));

  var T = function T(a, b, c, d, e, f, g) {
    var h = 0,
        i = a.length,
        j = null == c;

    if ("object" === r.type(c)) {
      e = !0;

      for (h in c) {
        T(a, b, h, c[h], !0, f, g);
      }
    } else if (void 0 !== d && (e = !0, r.isFunction(d) || (g = !0), j && (g ? (b.call(a, d), b = null) : (j = b, b = function b(a, _b, c) {
      return j.call(r(a), c);
    })), b)) for (; h < i; h++) {
      b(a[h], c, g ? d : d.call(a[h], h, b(a[h], c)));
    }

    return e ? a : j ? b.call(a) : i ? b(a[0], c) : f;
  },
      U = function U(a) {
    return 1 === a.nodeType || 9 === a.nodeType || !+a.nodeType;
  };

  function V() {
    this.expando = r.expando + V.uid++;
  }

  V.uid = 1, V.prototype = {
    cache: function cache(a) {
      var b = a[this.expando];
      return b || (b = {}, U(a) && (a.nodeType ? a[this.expando] = b : Object.defineProperty(a, this.expando, {
        value: b,
        configurable: !0
      }))), b;
    },
    set: function set(a, b, c) {
      var d,
          e = this.cache(a);
      if ("string" == typeof b) e[r.camelCase(b)] = c;else for (d in b) {
        e[r.camelCase(d)] = b[d];
      }
      return e;
    },
    get: function get(a, b) {
      return void 0 === b ? this.cache(a) : a[this.expando] && a[this.expando][r.camelCase(b)];
    },
    access: function access(a, b, c) {
      return void 0 === b || b && "string" == typeof b && void 0 === c ? this.get(a, b) : (this.set(a, b, c), void 0 !== c ? c : b);
    },
    remove: function remove(a, b) {
      var c,
          d = a[this.expando];

      if (void 0 !== d) {
        if (void 0 !== b) {
          Array.isArray(b) ? b = b.map(r.camelCase) : (b = r.camelCase(b), b = b in d ? [b] : b.match(L) || []), c = b.length;

          while (c--) {
            delete d[b[c]];
          }
        }

        (void 0 === b || r.isEmptyObject(d)) && (a.nodeType ? a[this.expando] = void 0 : delete a[this.expando]);
      }
    },
    hasData: function hasData(a) {
      var b = a[this.expando];
      return void 0 !== b && !r.isEmptyObject(b);
    }
  };
  var W = new V(),
      X = new V(),
      Y = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
      Z = /[A-Z]/g;

  function $(a) {
    return "true" === a || "false" !== a && ("null" === a ? null : a === +a + "" ? +a : Y.test(a) ? JSON.parse(a) : a);
  }

  function _(a, b, c) {
    var d;
    if (void 0 === c && 1 === a.nodeType) if (d = "data-" + b.replace(Z, "-$&").toLowerCase(), c = a.getAttribute(d), "string" == typeof c) {
      try {
        c = $(c);
      } catch (e) {}

      X.set(a, b, c);
    } else c = void 0;
    return c;
  }

  r.extend({
    hasData: function hasData(a) {
      return X.hasData(a) || W.hasData(a);
    },
    data: function data(a, b, c) {
      return X.access(a, b, c);
    },
    removeData: function removeData(a, b) {
      X.remove(a, b);
    },
    _data: function _data(a, b, c) {
      return W.access(a, b, c);
    },
    _removeData: function _removeData(a, b) {
      W.remove(a, b);
    }
  }), r.fn.extend({
    data: function data(a, b) {
      var c,
          d,
          e,
          f = this[0],
          g = f && f.attributes;

      if (void 0 === a) {
        if (this.length && (e = X.get(f), 1 === f.nodeType && !W.get(f, "hasDataAttrs"))) {
          c = g.length;

          while (c--) {
            g[c] && (d = g[c].name, 0 === d.indexOf("data-") && (d = r.camelCase(d.slice(5)), _(f, d, e[d])));
          }

          W.set(f, "hasDataAttrs", !0);
        }

        return e;
      }

      return "object" == _typeof(a) ? this.each(function () {
        X.set(this, a);
      }) : T(this, function (b) {
        var c;

        if (f && void 0 === b) {
          if (c = X.get(f, a), void 0 !== c) return c;
          if (c = _(f, a), void 0 !== c) return c;
        } else this.each(function () {
          X.set(this, a, b);
        });
      }, null, b, arguments.length > 1, null, !0);
    },
    removeData: function removeData(a) {
      return this.each(function () {
        X.remove(this, a);
      });
    }
  }), r.extend({
    queue: function queue(a, b, c) {
      var d;
      if (a) return b = (b || "fx") + "queue", d = W.get(a, b), c && (!d || Array.isArray(c) ? d = W.access(a, b, r.makeArray(c)) : d.push(c)), d || [];
    },
    dequeue: function dequeue(a, b) {
      b = b || "fx";

      var c = r.queue(a, b),
          d = c.length,
          e = c.shift(),
          f = r._queueHooks(a, b),
          g = function g() {
        r.dequeue(a, b);
      };

      "inprogress" === e && (e = c.shift(), d--), e && ("fx" === b && c.unshift("inprogress"), delete f.stop, e.call(a, g, f)), !d && f && f.empty.fire();
    },
    _queueHooks: function _queueHooks(a, b) {
      var c = b + "queueHooks";
      return W.get(a, c) || W.access(a, c, {
        empty: r.Callbacks("once memory").add(function () {
          W.remove(a, [b + "queue", c]);
        })
      });
    }
  }), r.fn.extend({
    queue: function queue(a, b) {
      var c = 2;
      return "string" != typeof a && (b = a, a = "fx", c--), arguments.length < c ? r.queue(this[0], a) : void 0 === b ? this : this.each(function () {
        var c = r.queue(this, a, b);
        r._queueHooks(this, a), "fx" === a && "inprogress" !== c[0] && r.dequeue(this, a);
      });
    },
    dequeue: function dequeue(a) {
      return this.each(function () {
        r.dequeue(this, a);
      });
    },
    clearQueue: function clearQueue(a) {
      return this.queue(a || "fx", []);
    },
    promise: function promise(a, b) {
      var c,
          d = 1,
          e = r.Deferred(),
          f = this,
          g = this.length,
          h = function h() {
        --d || e.resolveWith(f, [f]);
      };

      "string" != typeof a && (b = a, a = void 0), a = a || "fx";

      while (g--) {
        c = W.get(f[g], a + "queueHooks"), c && c.empty && (d++, c.empty.add(h));
      }

      return h(), e.promise(b);
    }
  });

  var aa = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
      ba = new RegExp("^(?:([+-])=|)(" + aa + ")([a-z%]*)$", "i"),
      ca = ["Top", "Right", "Bottom", "Left"],
      da = function da(a, b) {
    return a = b || a, "none" === a.style.display || "" === a.style.display && r.contains(a.ownerDocument, a) && "none" === r.css(a, "display");
  },
      ea = function ea(a, b, c, d) {
    var e,
        f,
        g = {};

    for (f in b) {
      g[f] = a.style[f], a.style[f] = b[f];
    }

    e = c.apply(a, d || []);

    for (f in b) {
      a.style[f] = g[f];
    }

    return e;
  };

  function fa(a, b, c, d) {
    var e,
        f = 1,
        g = 20,
        h = d ? function () {
      return d.cur();
    } : function () {
      return r.css(a, b, "");
    },
        i = h(),
        j = c && c[3] || (r.cssNumber[b] ? "" : "px"),
        k = (r.cssNumber[b] || "px" !== j && +i) && ba.exec(r.css(a, b));

    if (k && k[3] !== j) {
      j = j || k[3], c = c || [], k = +i || 1;

      do {
        f = f || ".5", k /= f, r.style(a, b, k + j);
      } while (f !== (f = h() / i) && 1 !== f && --g);
    }

    return c && (k = +k || +i || 0, e = c[1] ? k + (c[1] + 1) * c[2] : +c[2], d && (d.unit = j, d.start = k, d.end = e)), e;
  }

  var ga = {};

  function ha(a) {
    var b,
        c = a.ownerDocument,
        d = a.nodeName,
        e = ga[d];
    return e ? e : (b = c.body.appendChild(c.createElement(d)), e = r.css(b, "display"), b.parentNode.removeChild(b), "none" === e && (e = "block"), ga[d] = e, e);
  }

  function ia(a, b) {
    for (var c, d, e = [], f = 0, g = a.length; f < g; f++) {
      d = a[f], d.style && (c = d.style.display, b ? ("none" === c && (e[f] = W.get(d, "display") || null, e[f] || (d.style.display = "")), "" === d.style.display && da(d) && (e[f] = ha(d))) : "none" !== c && (e[f] = "none", W.set(d, "display", c)));
    }

    for (f = 0; f < g; f++) {
      null != e[f] && (a[f].style.display = e[f]);
    }

    return a;
  }

  r.fn.extend({
    show: function show() {
      return ia(this, !0);
    },
    hide: function hide() {
      return ia(this);
    },
    toggle: function toggle(a) {
      return "boolean" == typeof a ? a ? this.show() : this.hide() : this.each(function () {
        da(this) ? r(this).show() : r(this).hide();
      });
    }
  });
  var ja = /^(?:checkbox|radio)$/i,
      ka = /<([a-z][^\/\0>\x20\t\r\n\f]+)/i,
      la = /^$|\/(?:java|ecma)script/i,
      ma = {
    option: [1, "<select multiple='multiple'>", "</select>"],
    thead: [1, "<table>", "</table>"],
    col: [2, "<table><colgroup>", "</colgroup></table>"],
    tr: [2, "<table><tbody>", "</tbody></table>"],
    td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
    _default: [0, "", ""]
  };
  ma.optgroup = ma.option, ma.tbody = ma.tfoot = ma.colgroup = ma.caption = ma.thead, ma.th = ma.td;

  function na(a, b) {
    var c;
    return c = "undefined" != typeof a.getElementsByTagName ? a.getElementsByTagName(b || "*") : "undefined" != typeof a.querySelectorAll ? a.querySelectorAll(b || "*") : [], void 0 === b || b && B(a, b) ? r.merge([a], c) : c;
  }

  function oa(a, b) {
    for (var c = 0, d = a.length; c < d; c++) {
      W.set(a[c], "globalEval", !b || W.get(b[c], "globalEval"));
    }
  }

  var pa = /<|&#?\w+;/;

  function qa(a, b, c, d, e) {
    for (var f, g, h, i, j, k, l = b.createDocumentFragment(), m = [], n = 0, o = a.length; n < o; n++) {
      if (f = a[n], f || 0 === f) if ("object" === r.type(f)) r.merge(m, f.nodeType ? [f] : f);else if (pa.test(f)) {
        g = g || l.appendChild(b.createElement("div")), h = (ka.exec(f) || ["", ""])[1].toLowerCase(), i = ma[h] || ma._default, g.innerHTML = i[1] + r.htmlPrefilter(f) + i[2], k = i[0];

        while (k--) {
          g = g.lastChild;
        }

        r.merge(m, g.childNodes), g = l.firstChild, g.textContent = "";
      } else m.push(b.createTextNode(f));
    }

    l.textContent = "", n = 0;

    while (f = m[n++]) {
      if (d && r.inArray(f, d) > -1) e && e.push(f);else if (j = r.contains(f.ownerDocument, f), g = na(l.appendChild(f), "script"), j && oa(g), c) {
        k = 0;

        while (f = g[k++]) {
          la.test(f.type || "") && c.push(f);
        }
      }
    }

    return l;
  }

  !function () {
    var a = d.createDocumentFragment(),
        b = a.appendChild(d.createElement("div")),
        c = d.createElement("input");
    c.setAttribute("type", "radio"), c.setAttribute("checked", "checked"), c.setAttribute("name", "t"), b.appendChild(c), o.checkClone = b.cloneNode(!0).cloneNode(!0).lastChild.checked, b.innerHTML = "<textarea>x</textarea>", o.noCloneChecked = !!b.cloneNode(!0).lastChild.defaultValue;
  }();
  var ra = d.documentElement,
      sa = /^key/,
      ta = /^(?:mouse|pointer|contextmenu|drag|drop)|click/,
      ua = /^([^.]*)(?:\.(.+)|)/;

  function va() {
    return !0;
  }

  function wa() {
    return !1;
  }

  function xa() {
    try {
      return d.activeElement;
    } catch (a) {}
  }

  function ya(a, b, c, d, e, f) {
    var g, h;

    if ("object" == _typeof(b)) {
      "string" != typeof c && (d = d || c, c = void 0);

      for (h in b) {
        ya(a, h, c, d, b[h], f);
      }

      return a;
    }

    if (null == d && null == e ? (e = c, d = c = void 0) : null == e && ("string" == typeof c ? (e = d, d = void 0) : (e = d, d = c, c = void 0)), e === !1) e = wa;else if (!e) return a;
    return 1 === f && (g = e, e = function e(a) {
      return r().off(a), g.apply(this, arguments);
    }, e.guid = g.guid || (g.guid = r.guid++)), a.each(function () {
      r.event.add(this, b, e, d, c);
    });
  }

  r.event = {
    global: {},
    add: function add(a, b, c, d, e) {
      var f,
          g,
          h,
          i,
          j,
          k,
          l,
          m,
          n,
          o,
          p,
          q = W.get(a);

      if (q) {
        c.handler && (f = c, c = f.handler, e = f.selector), e && r.find.matchesSelector(ra, e), c.guid || (c.guid = r.guid++), (i = q.events) || (i = q.events = {}), (g = q.handle) || (g = q.handle = function (b) {
          return "undefined" != typeof r && r.event.triggered !== b.type ? r.event.dispatch.apply(a, arguments) : void 0;
        }), b = (b || "").match(L) || [""], j = b.length;

        while (j--) {
          h = ua.exec(b[j]) || [], n = p = h[1], o = (h[2] || "").split(".").sort(), n && (l = r.event.special[n] || {}, n = (e ? l.delegateType : l.bindType) || n, l = r.event.special[n] || {}, k = r.extend({
            type: n,
            origType: p,
            data: d,
            handler: c,
            guid: c.guid,
            selector: e,
            needsContext: e && r.expr.match.needsContext.test(e),
            namespace: o.join(".")
          }, f), (m = i[n]) || (m = i[n] = [], m.delegateCount = 0, l.setup && l.setup.call(a, d, o, g) !== !1 || a.addEventListener && a.addEventListener(n, g)), l.add && (l.add.call(a, k), k.handler.guid || (k.handler.guid = c.guid)), e ? m.splice(m.delegateCount++, 0, k) : m.push(k), r.event.global[n] = !0);
        }
      }
    },
    remove: function remove(a, b, c, d, e) {
      var f,
          g,
          h,
          i,
          j,
          k,
          l,
          m,
          n,
          o,
          p,
          q = W.hasData(a) && W.get(a);

      if (q && (i = q.events)) {
        b = (b || "").match(L) || [""], j = b.length;

        while (j--) {
          if (h = ua.exec(b[j]) || [], n = p = h[1], o = (h[2] || "").split(".").sort(), n) {
            l = r.event.special[n] || {}, n = (d ? l.delegateType : l.bindType) || n, m = i[n] || [], h = h[2] && new RegExp("(^|\\.)" + o.join("\\.(?:.*\\.|)") + "(\\.|$)"), g = f = m.length;

            while (f--) {
              k = m[f], !e && p !== k.origType || c && c.guid !== k.guid || h && !h.test(k.namespace) || d && d !== k.selector && ("**" !== d || !k.selector) || (m.splice(f, 1), k.selector && m.delegateCount--, l.remove && l.remove.call(a, k));
            }

            g && !m.length && (l.teardown && l.teardown.call(a, o, q.handle) !== !1 || r.removeEvent(a, n, q.handle), delete i[n]);
          } else for (n in i) {
            r.event.remove(a, n + b[j], c, d, !0);
          }
        }

        r.isEmptyObject(i) && W.remove(a, "handle events");
      }
    },
    dispatch: function dispatch(a) {
      var b = r.event.fix(a),
          c,
          d,
          e,
          f,
          g,
          h,
          i = new Array(arguments.length),
          j = (W.get(this, "events") || {})[b.type] || [],
          k = r.event.special[b.type] || {};

      for (i[0] = b, c = 1; c < arguments.length; c++) {
        i[c] = arguments[c];
      }

      if (b.delegateTarget = this, !k.preDispatch || k.preDispatch.call(this, b) !== !1) {
        h = r.event.handlers.call(this, b, j), c = 0;

        while ((f = h[c++]) && !b.isPropagationStopped()) {
          b.currentTarget = f.elem, d = 0;

          while ((g = f.handlers[d++]) && !b.isImmediatePropagationStopped()) {
            b.rnamespace && !b.rnamespace.test(g.namespace) || (b.handleObj = g, b.data = g.data, e = ((r.event.special[g.origType] || {}).handle || g.handler).apply(f.elem, i), void 0 !== e && (b.result = e) === !1 && (b.preventDefault(), b.stopPropagation()));
          }
        }

        return k.postDispatch && k.postDispatch.call(this, b), b.result;
      }
    },
    handlers: function handlers(a, b) {
      var c,
          d,
          e,
          f,
          g,
          h = [],
          i = b.delegateCount,
          j = a.target;
      if (i && j.nodeType && !("click" === a.type && a.button >= 1)) for (; j !== this; j = j.parentNode || this) {
        if (1 === j.nodeType && ("click" !== a.type || j.disabled !== !0)) {
          for (f = [], g = {}, c = 0; c < i; c++) {
            d = b[c], e = d.selector + " ", void 0 === g[e] && (g[e] = d.needsContext ? r(e, this).index(j) > -1 : r.find(e, this, null, [j]).length), g[e] && f.push(d);
          }

          f.length && h.push({
            elem: j,
            handlers: f
          });
        }
      }
      return j = this, i < b.length && h.push({
        elem: j,
        handlers: b.slice(i)
      }), h;
    },
    addProp: function addProp(a, b) {
      Object.defineProperty(r.Event.prototype, a, {
        enumerable: !0,
        configurable: !0,
        get: r.isFunction(b) ? function () {
          if (this.originalEvent) return b(this.originalEvent);
        } : function () {
          if (this.originalEvent) return this.originalEvent[a];
        },
        set: function set(b) {
          Object.defineProperty(this, a, {
            enumerable: !0,
            configurable: !0,
            writable: !0,
            value: b
          });
        }
      });
    },
    fix: function fix(a) {
      return a[r.expando] ? a : new r.Event(a);
    },
    special: {
      load: {
        noBubble: !0
      },
      focus: {
        trigger: function trigger() {
          if (this !== xa() && this.focus) return this.focus(), !1;
        },
        delegateType: "focusin"
      },
      blur: {
        trigger: function trigger() {
          if (this === xa() && this.blur) return this.blur(), !1;
        },
        delegateType: "focusout"
      },
      click: {
        trigger: function trigger() {
          if ("checkbox" === this.type && this.click && B(this, "input")) return this.click(), !1;
        },
        _default: function _default(a) {
          return B(a.target, "a");
        }
      },
      beforeunload: {
        postDispatch: function postDispatch(a) {
          void 0 !== a.result && a.originalEvent && (a.originalEvent.returnValue = a.result);
        }
      }
    }
  }, r.removeEvent = function (a, b, c) {
    a.removeEventListener && a.removeEventListener(b, c);
  }, r.Event = function (a, b) {
    return this instanceof r.Event ? (a && a.type ? (this.originalEvent = a, this.type = a.type, this.isDefaultPrevented = a.defaultPrevented || void 0 === a.defaultPrevented && a.returnValue === !1 ? va : wa, this.target = a.target && 3 === a.target.nodeType ? a.target.parentNode : a.target, this.currentTarget = a.currentTarget, this.relatedTarget = a.relatedTarget) : this.type = a, b && r.extend(this, b), this.timeStamp = a && a.timeStamp || r.now(), void (this[r.expando] = !0)) : new r.Event(a, b);
  }, r.Event.prototype = {
    constructor: r.Event,
    isDefaultPrevented: wa,
    isPropagationStopped: wa,
    isImmediatePropagationStopped: wa,
    isSimulated: !1,
    preventDefault: function preventDefault() {
      var a = this.originalEvent;
      this.isDefaultPrevented = va, a && !this.isSimulated && a.preventDefault();
    },
    stopPropagation: function stopPropagation() {
      var a = this.originalEvent;
      this.isPropagationStopped = va, a && !this.isSimulated && a.stopPropagation();
    },
    stopImmediatePropagation: function stopImmediatePropagation() {
      var a = this.originalEvent;
      this.isImmediatePropagationStopped = va, a && !this.isSimulated && a.stopImmediatePropagation(), this.stopPropagation();
    }
  }, r.each({
    altKey: !0,
    bubbles: !0,
    cancelable: !0,
    changedTouches: !0,
    ctrlKey: !0,
    detail: !0,
    eventPhase: !0,
    metaKey: !0,
    pageX: !0,
    pageY: !0,
    shiftKey: !0,
    view: !0,
    "char": !0,
    charCode: !0,
    key: !0,
    keyCode: !0,
    button: !0,
    buttons: !0,
    clientX: !0,
    clientY: !0,
    offsetX: !0,
    offsetY: !0,
    pointerId: !0,
    pointerType: !0,
    screenX: !0,
    screenY: !0,
    targetTouches: !0,
    toElement: !0,
    touches: !0,
    which: function which(a) {
      var b = a.button;
      return null == a.which && sa.test(a.type) ? null != a.charCode ? a.charCode : a.keyCode : !a.which && void 0 !== b && ta.test(a.type) ? 1 & b ? 1 : 2 & b ? 3 : 4 & b ? 2 : 0 : a.which;
    }
  }, r.event.addProp), r.each({
    mouseenter: "mouseover",
    mouseleave: "mouseout",
    pointerenter: "pointerover",
    pointerleave: "pointerout"
  }, function (a, b) {
    r.event.special[a] = {
      delegateType: b,
      bindType: b,
      handle: function handle(a) {
        var c,
            d = this,
            e = a.relatedTarget,
            f = a.handleObj;
        return e && (e === d || r.contains(d, e)) || (a.type = f.origType, c = f.handler.apply(this, arguments), a.type = b), c;
      }
    };
  }), r.fn.extend({
    on: function on(a, b, c, d) {
      return ya(this, a, b, c, d);
    },
    one: function one(a, b, c, d) {
      return ya(this, a, b, c, d, 1);
    },
    off: function off(a, b, c) {
      var d, e;
      if (a && a.preventDefault && a.handleObj) return d = a.handleObj, r(a.delegateTarget).off(d.namespace ? d.origType + "." + d.namespace : d.origType, d.selector, d.handler), this;

      if ("object" == _typeof(a)) {
        for (e in a) {
          this.off(e, b, a[e]);
        }

        return this;
      }

      return b !== !1 && "function" != typeof b || (c = b, b = void 0), c === !1 && (c = wa), this.each(function () {
        r.event.remove(this, a, c, b);
      });
    }
  });
  var za = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([a-z][^\/\0>\x20\t\r\n\f]*)[^>]*)\/>/gi,
      Aa = /<script|<style|<link/i,
      Ba = /checked\s*(?:[^=]|=\s*.checked.)/i,
      Ca = /^true\/(.*)/,
      Da = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;

  function Ea(a, b) {
    return B(a, "table") && B(11 !== b.nodeType ? b : b.firstChild, "tr") ? r(">tbody", a)[0] || a : a;
  }

  function Fa(a) {
    return a.type = (null !== a.getAttribute("type")) + "/" + a.type, a;
  }

  function Ga(a) {
    var b = Ca.exec(a.type);
    return b ? a.type = b[1] : a.removeAttribute("type"), a;
  }

  function Ha(a, b) {
    var c, d, e, f, g, h, i, j;

    if (1 === b.nodeType) {
      if (W.hasData(a) && (f = W.access(a), g = W.set(b, f), j = f.events)) {
        delete g.handle, g.events = {};

        for (e in j) {
          for (c = 0, d = j[e].length; c < d; c++) {
            r.event.add(b, e, j[e][c]);
          }
        }
      }

      X.hasData(a) && (h = X.access(a), i = r.extend({}, h), X.set(b, i));
    }
  }

  function Ia(a, b) {
    var c = b.nodeName.toLowerCase();
    "input" === c && ja.test(a.type) ? b.checked = a.checked : "input" !== c && "textarea" !== c || (b.defaultValue = a.defaultValue);
  }

  function Ja(a, b, c, d) {
    b = g.apply([], b);
    var e,
        f,
        h,
        i,
        j,
        k,
        l = 0,
        m = a.length,
        n = m - 1,
        q = b[0],
        s = r.isFunction(q);
    if (s || m > 1 && "string" == typeof q && !o.checkClone && Ba.test(q)) return a.each(function (e) {
      var f = a.eq(e);
      s && (b[0] = q.call(this, e, f.html())), Ja(f, b, c, d);
    });

    if (m && (e = qa(b, a[0].ownerDocument, !1, a, d), f = e.firstChild, 1 === e.childNodes.length && (e = f), f || d)) {
      for (h = r.map(na(e, "script"), Fa), i = h.length; l < m; l++) {
        j = e, l !== n && (j = r.clone(j, !0, !0), i && r.merge(h, na(j, "script"))), c.call(a[l], j, l);
      }

      if (i) for (k = h[h.length - 1].ownerDocument, r.map(h, Ga), l = 0; l < i; l++) {
        j = h[l], la.test(j.type || "") && !W.access(j, "globalEval") && r.contains(k, j) && (j.src ? r._evalUrl && r._evalUrl(j.src) : p(j.textContent.replace(Da, ""), k));
      }
    }

    return a;
  }

  function Ka(a, b, c) {
    for (var d, e = b ? r.filter(b, a) : a, f = 0; null != (d = e[f]); f++) {
      c || 1 !== d.nodeType || r.cleanData(na(d)), d.parentNode && (c && r.contains(d.ownerDocument, d) && oa(na(d, "script")), d.parentNode.removeChild(d));
    }

    return a;
  }

  r.extend({
    htmlPrefilter: function htmlPrefilter(a) {
      return a.replace(za, "<$1></$2>");
    },
    clone: function clone(a, b, c) {
      var d,
          e,
          f,
          g,
          h = a.cloneNode(!0),
          i = r.contains(a.ownerDocument, a);
      if (!(o.noCloneChecked || 1 !== a.nodeType && 11 !== a.nodeType || r.isXMLDoc(a))) for (g = na(h), f = na(a), d = 0, e = f.length; d < e; d++) {
        Ia(f[d], g[d]);
      }
      if (b) if (c) for (f = f || na(a), g = g || na(h), d = 0, e = f.length; d < e; d++) {
        Ha(f[d], g[d]);
      } else Ha(a, h);
      return g = na(h, "script"), g.length > 0 && oa(g, !i && na(a, "script")), h;
    },
    cleanData: function cleanData(a) {
      for (var b, c, d, e = r.event.special, f = 0; void 0 !== (c = a[f]); f++) {
        if (U(c)) {
          if (b = c[W.expando]) {
            if (b.events) for (d in b.events) {
              e[d] ? r.event.remove(c, d) : r.removeEvent(c, d, b.handle);
            }
            c[W.expando] = void 0;
          }

          c[X.expando] && (c[X.expando] = void 0);
        }
      }
    }
  }), r.fn.extend({
    detach: function detach(a) {
      return Ka(this, a, !0);
    },
    remove: function remove(a) {
      return Ka(this, a);
    },
    text: function text(a) {
      return T(this, function (a) {
        return void 0 === a ? r.text(this) : this.empty().each(function () {
          1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || (this.textContent = a);
        });
      }, null, a, arguments.length);
    },
    append: function append() {
      return Ja(this, arguments, function (a) {
        if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
          var b = Ea(this, a);
          b.appendChild(a);
        }
      });
    },
    prepend: function prepend() {
      return Ja(this, arguments, function (a) {
        if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
          var b = Ea(this, a);
          b.insertBefore(a, b.firstChild);
        }
      });
    },
    before: function before() {
      return Ja(this, arguments, function (a) {
        this.parentNode && this.parentNode.insertBefore(a, this);
      });
    },
    after: function after() {
      return Ja(this, arguments, function (a) {
        this.parentNode && this.parentNode.insertBefore(a, this.nextSibling);
      });
    },
    empty: function empty() {
      for (var a, b = 0; null != (a = this[b]); b++) {
        1 === a.nodeType && (r.cleanData(na(a, !1)), a.textContent = "");
      }

      return this;
    },
    clone: function clone(a, b) {
      return a = null != a && a, b = null == b ? a : b, this.map(function () {
        return r.clone(this, a, b);
      });
    },
    html: function html(a) {
      return T(this, function (a) {
        var b = this[0] || {},
            c = 0,
            d = this.length;
        if (void 0 === a && 1 === b.nodeType) return b.innerHTML;

        if ("string" == typeof a && !Aa.test(a) && !ma[(ka.exec(a) || ["", ""])[1].toLowerCase()]) {
          a = r.htmlPrefilter(a);

          try {
            for (; c < d; c++) {
              b = this[c] || {}, 1 === b.nodeType && (r.cleanData(na(b, !1)), b.innerHTML = a);
            }

            b = 0;
          } catch (e) {}
        }

        b && this.empty().append(a);
      }, null, a, arguments.length);
    },
    replaceWith: function replaceWith() {
      var a = [];
      return Ja(this, arguments, function (b) {
        var c = this.parentNode;
        r.inArray(this, a) < 0 && (r.cleanData(na(this)), c && c.replaceChild(b, this));
      }, a);
    }
  }), r.each({
    appendTo: "append",
    prependTo: "prepend",
    insertBefore: "before",
    insertAfter: "after",
    replaceAll: "replaceWith"
  }, function (a, b) {
    r.fn[a] = function (a) {
      for (var c, d = [], e = r(a), f = e.length - 1, g = 0; g <= f; g++) {
        c = g === f ? this : this.clone(!0), r(e[g])[b](c), h.apply(d, c.get());
      }

      return this.pushStack(d);
    };
  });

  var La = /^margin/,
      Ma = new RegExp("^(" + aa + ")(?!px)[a-z%]+$", "i"),
      Na = function Na(b) {
    var c = b.ownerDocument.defaultView;
    return c && c.opener || (c = a), c.getComputedStyle(b);
  };

  !function () {
    function b() {
      if (i) {
        i.style.cssText = "box-sizing:border-box;position:relative;display:block;margin:auto;border:1px;padding:1px;top:1%;width:50%", i.innerHTML = "", ra.appendChild(h);
        var b = a.getComputedStyle(i);
        c = "1%" !== b.top, g = "2px" === b.marginLeft, e = "4px" === b.width, i.style.marginRight = "50%", f = "4px" === b.marginRight, ra.removeChild(h), i = null;
      }
    }

    var c,
        e,
        f,
        g,
        h = d.createElement("div"),
        i = d.createElement("div");
    i.style && (i.style.backgroundClip = "content-box", i.cloneNode(!0).style.backgroundClip = "", o.clearCloneStyle = "content-box" === i.style.backgroundClip, h.style.cssText = "border:0;width:8px;height:0;top:0;left:-9999px;padding:0;margin-top:1px;position:absolute", h.appendChild(i), r.extend(o, {
      pixelPosition: function pixelPosition() {
        return b(), c;
      },
      boxSizingReliable: function boxSizingReliable() {
        return b(), e;
      },
      pixelMarginRight: function pixelMarginRight() {
        return b(), f;
      },
      reliableMarginLeft: function reliableMarginLeft() {
        return b(), g;
      }
    }));
  }();

  function Oa(a, b, c) {
    var d,
        e,
        f,
        g,
        h = a.style;
    return c = c || Na(a), c && (g = c.getPropertyValue(b) || c[b], "" !== g || r.contains(a.ownerDocument, a) || (g = r.style(a, b)), !o.pixelMarginRight() && Ma.test(g) && La.test(b) && (d = h.width, e = h.minWidth, f = h.maxWidth, h.minWidth = h.maxWidth = h.width = g, g = c.width, h.width = d, h.minWidth = e, h.maxWidth = f)), void 0 !== g ? g + "" : g;
  }

  function Pa(a, b) {
    return {
      get: function get() {
        return a() ? void delete this.get : (this.get = b).apply(this, arguments);
      }
    };
  }

  var Qa = /^(none|table(?!-c[ea]).+)/,
      Ra = /^--/,
      Sa = {
    position: "absolute",
    visibility: "hidden",
    display: "block"
  },
      Ta = {
    letterSpacing: "0",
    fontWeight: "400"
  },
      Ua = ["Webkit", "Moz", "ms"],
      Va = d.createElement("div").style;

  function Wa(a) {
    if (a in Va) return a;
    var b = a[0].toUpperCase() + a.slice(1),
        c = Ua.length;

    while (c--) {
      if (a = Ua[c] + b, a in Va) return a;
    }
  }

  function Xa(a) {
    var b = r.cssProps[a];
    return b || (b = r.cssProps[a] = Wa(a) || a), b;
  }

  function Ya(a, b, c) {
    var d = ba.exec(b);
    return d ? Math.max(0, d[2] - (c || 0)) + (d[3] || "px") : b;
  }

  function Za(a, b, c, d, e) {
    var f,
        g = 0;

    for (f = c === (d ? "border" : "content") ? 4 : "width" === b ? 1 : 0; f < 4; f += 2) {
      "margin" === c && (g += r.css(a, c + ca[f], !0, e)), d ? ("content" === c && (g -= r.css(a, "padding" + ca[f], !0, e)), "margin" !== c && (g -= r.css(a, "border" + ca[f] + "Width", !0, e))) : (g += r.css(a, "padding" + ca[f], !0, e), "padding" !== c && (g += r.css(a, "border" + ca[f] + "Width", !0, e)));
    }

    return g;
  }

  function $a(a, b, c) {
    var d,
        e = Na(a),
        f = Oa(a, b, e),
        g = "border-box" === r.css(a, "boxSizing", !1, e);
    return Ma.test(f) ? f : (d = g && (o.boxSizingReliable() || f === a.style[b]), "auto" === f && (f = a["offset" + b[0].toUpperCase() + b.slice(1)]), f = parseFloat(f) || 0, f + Za(a, b, c || (g ? "border" : "content"), d, e) + "px");
  }

  r.extend({
    cssHooks: {
      opacity: {
        get: function get(a, b) {
          if (b) {
            var c = Oa(a, "opacity");
            return "" === c ? "1" : c;
          }
        }
      }
    },
    cssNumber: {
      animationIterationCount: !0,
      columnCount: !0,
      fillOpacity: !0,
      flexGrow: !0,
      flexShrink: !0,
      fontWeight: !0,
      lineHeight: !0,
      opacity: !0,
      order: !0,
      orphans: !0,
      widows: !0,
      zIndex: !0,
      zoom: !0
    },
    cssProps: {
      "float": "cssFloat"
    },
    style: function style(a, b, c, d) {
      if (a && 3 !== a.nodeType && 8 !== a.nodeType && a.style) {
        var e,
            f,
            g,
            h = r.camelCase(b),
            i = Ra.test(b),
            j = a.style;
        return i || (b = Xa(h)), g = r.cssHooks[b] || r.cssHooks[h], void 0 === c ? g && "get" in g && void 0 !== (e = g.get(a, !1, d)) ? e : j[b] : (f = _typeof(c), "string" === f && (e = ba.exec(c)) && e[1] && (c = fa(a, b, e), f = "number"), null != c && c === c && ("number" === f && (c += e && e[3] || (r.cssNumber[h] ? "" : "px")), o.clearCloneStyle || "" !== c || 0 !== b.indexOf("background") || (j[b] = "inherit"), g && "set" in g && void 0 === (c = g.set(a, c, d)) || (i ? j.setProperty(b, c) : j[b] = c)), void 0);
      }
    },
    css: function css(a, b, c, d) {
      var e,
          f,
          g,
          h = r.camelCase(b),
          i = Ra.test(b);
      return i || (b = Xa(h)), g = r.cssHooks[b] || r.cssHooks[h], g && "get" in g && (e = g.get(a, !0, c)), void 0 === e && (e = Oa(a, b, d)), "normal" === e && b in Ta && (e = Ta[b]), "" === c || c ? (f = parseFloat(e), c === !0 || isFinite(f) ? f || 0 : e) : e;
    }
  }), r.each(["height", "width"], function (a, b) {
    r.cssHooks[b] = {
      get: function get(a, c, d) {
        if (c) return !Qa.test(r.css(a, "display")) || a.getClientRects().length && a.getBoundingClientRect().width ? $a(a, b, d) : ea(a, Sa, function () {
          return $a(a, b, d);
        });
      },
      set: function set(a, c, d) {
        var e,
            f = d && Na(a),
            g = d && Za(a, b, d, "border-box" === r.css(a, "boxSizing", !1, f), f);
        return g && (e = ba.exec(c)) && "px" !== (e[3] || "px") && (a.style[b] = c, c = r.css(a, b)), Ya(a, c, g);
      }
    };
  }), r.cssHooks.marginLeft = Pa(o.reliableMarginLeft, function (a, b) {
    if (b) return (parseFloat(Oa(a, "marginLeft")) || a.getBoundingClientRect().left - ea(a, {
      marginLeft: 0
    }, function () {
      return a.getBoundingClientRect().left;
    })) + "px";
  }), r.each({
    margin: "",
    padding: "",
    border: "Width"
  }, function (a, b) {
    r.cssHooks[a + b] = {
      expand: function expand(c) {
        for (var d = 0, e = {}, f = "string" == typeof c ? c.split(" ") : [c]; d < 4; d++) {
          e[a + ca[d] + b] = f[d] || f[d - 2] || f[0];
        }

        return e;
      }
    }, La.test(a) || (r.cssHooks[a + b].set = Ya);
  }), r.fn.extend({
    css: function css(a, b) {
      return T(this, function (a, b, c) {
        var d,
            e,
            f = {},
            g = 0;

        if (Array.isArray(b)) {
          for (d = Na(a), e = b.length; g < e; g++) {
            f[b[g]] = r.css(a, b[g], !1, d);
          }

          return f;
        }

        return void 0 !== c ? r.style(a, b, c) : r.css(a, b);
      }, a, b, arguments.length > 1);
    }
  });

  function _a(a, b, c, d, e) {
    return new _a.prototype.init(a, b, c, d, e);
  }

  r.Tween = _a, _a.prototype = {
    constructor: _a,
    init: function init(a, b, c, d, e, f) {
      this.elem = a, this.prop = c, this.easing = e || r.easing._default, this.options = b, this.start = this.now = this.cur(), this.end = d, this.unit = f || (r.cssNumber[c] ? "" : "px");
    },
    cur: function cur() {
      var a = _a.propHooks[this.prop];
      return a && a.get ? a.get(this) : _a.propHooks._default.get(this);
    },
    run: function run(a) {
      var b,
          c = _a.propHooks[this.prop];
      return this.options.duration ? this.pos = b = r.easing[this.easing](a, this.options.duration * a, 0, 1, this.options.duration) : this.pos = b = a, this.now = (this.end - this.start) * b + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), c && c.set ? c.set(this) : _a.propHooks._default.set(this), this;
    }
  }, _a.prototype.init.prototype = _a.prototype, _a.propHooks = {
    _default: {
      get: function get(a) {
        var b;
        return 1 !== a.elem.nodeType || null != a.elem[a.prop] && null == a.elem.style[a.prop] ? a.elem[a.prop] : (b = r.css(a.elem, a.prop, ""), b && "auto" !== b ? b : 0);
      },
      set: function set(a) {
        r.fx.step[a.prop] ? r.fx.step[a.prop](a) : 1 !== a.elem.nodeType || null == a.elem.style[r.cssProps[a.prop]] && !r.cssHooks[a.prop] ? a.elem[a.prop] = a.now : r.style(a.elem, a.prop, a.now + a.unit);
      }
    }
  }, _a.propHooks.scrollTop = _a.propHooks.scrollLeft = {
    set: function set(a) {
      a.elem.nodeType && a.elem.parentNode && (a.elem[a.prop] = a.now);
    }
  }, r.easing = {
    linear: function linear(a) {
      return a;
    },
    swing: function swing(a) {
      return .5 - Math.cos(a * Math.PI) / 2;
    },
    _default: "swing"
  }, r.fx = _a.prototype.init, r.fx.step = {};
  var ab,
      bb,
      cb = /^(?:toggle|show|hide)$/,
      db = /queueHooks$/;

  function eb() {
    bb && (d.hidden === !1 && a.requestAnimationFrame ? a.requestAnimationFrame(eb) : a.setTimeout(eb, r.fx.interval), r.fx.tick());
  }

  function fb() {
    return a.setTimeout(function () {
      ab = void 0;
    }), ab = r.now();
  }

  function gb(a, b) {
    var c,
        d = 0,
        e = {
      height: a
    };

    for (b = b ? 1 : 0; d < 4; d += 2 - b) {
      c = ca[d], e["margin" + c] = e["padding" + c] = a;
    }

    return b && (e.opacity = e.width = a), e;
  }

  function hb(a, b, c) {
    for (var d, e = (kb.tweeners[b] || []).concat(kb.tweeners["*"]), f = 0, g = e.length; f < g; f++) {
      if (d = e[f].call(c, b, a)) return d;
    }
  }

  function ib(a, b, c) {
    var d,
        e,
        f,
        g,
        h,
        i,
        j,
        k,
        l = "width" in b || "height" in b,
        m = this,
        n = {},
        o = a.style,
        p = a.nodeType && da(a),
        q = W.get(a, "fxshow");
    c.queue || (g = r._queueHooks(a, "fx"), null == g.unqueued && (g.unqueued = 0, h = g.empty.fire, g.empty.fire = function () {
      g.unqueued || h();
    }), g.unqueued++, m.always(function () {
      m.always(function () {
        g.unqueued--, r.queue(a, "fx").length || g.empty.fire();
      });
    }));

    for (d in b) {
      if (e = b[d], cb.test(e)) {
        if (delete b[d], f = f || "toggle" === e, e === (p ? "hide" : "show")) {
          if ("show" !== e || !q || void 0 === q[d]) continue;
          p = !0;
        }

        n[d] = q && q[d] || r.style(a, d);
      }
    }

    if (i = !r.isEmptyObject(b), i || !r.isEmptyObject(n)) {
      l && 1 === a.nodeType && (c.overflow = [o.overflow, o.overflowX, o.overflowY], j = q && q.display, null == j && (j = W.get(a, "display")), k = r.css(a, "display"), "none" === k && (j ? k = j : (ia([a], !0), j = a.style.display || j, k = r.css(a, "display"), ia([a]))), ("inline" === k || "inline-block" === k && null != j) && "none" === r.css(a, "float") && (i || (m.done(function () {
        o.display = j;
      }), null == j && (k = o.display, j = "none" === k ? "" : k)), o.display = "inline-block")), c.overflow && (o.overflow = "hidden", m.always(function () {
        o.overflow = c.overflow[0], o.overflowX = c.overflow[1], o.overflowY = c.overflow[2];
      })), i = !1;

      for (d in n) {
        i || (q ? "hidden" in q && (p = q.hidden) : q = W.access(a, "fxshow", {
          display: j
        }), f && (q.hidden = !p), p && ia([a], !0), m.done(function () {
          p || ia([a]), W.remove(a, "fxshow");

          for (d in n) {
            r.style(a, d, n[d]);
          }
        })), i = hb(p ? q[d] : 0, d, m), d in q || (q[d] = i.start, p && (i.end = i.start, i.start = 0));
      }
    }
  }

  function jb(a, b) {
    var c, d, e, f, g;

    for (c in a) {
      if (d = r.camelCase(c), e = b[d], f = a[c], Array.isArray(f) && (e = f[1], f = a[c] = f[0]), c !== d && (a[d] = f, delete a[c]), g = r.cssHooks[d], g && "expand" in g) {
        f = g.expand(f), delete a[d];

        for (c in f) {
          c in a || (a[c] = f[c], b[c] = e);
        }
      } else b[d] = e;
    }
  }

  function kb(a, b, c) {
    var d,
        e,
        f = 0,
        g = kb.prefilters.length,
        h = r.Deferred().always(function () {
      delete i.elem;
    }),
        i = function i() {
      if (e) return !1;

      for (var b = ab || fb(), c = Math.max(0, j.startTime + j.duration - b), d = c / j.duration || 0, f = 1 - d, g = 0, i = j.tweens.length; g < i; g++) {
        j.tweens[g].run(f);
      }

      return h.notifyWith(a, [j, f, c]), f < 1 && i ? c : (i || h.notifyWith(a, [j, 1, 0]), h.resolveWith(a, [j]), !1);
    },
        j = h.promise({
      elem: a,
      props: r.extend({}, b),
      opts: r.extend(!0, {
        specialEasing: {},
        easing: r.easing._default
      }, c),
      originalProperties: b,
      originalOptions: c,
      startTime: ab || fb(),
      duration: c.duration,
      tweens: [],
      createTween: function createTween(b, c) {
        var d = r.Tween(a, j.opts, b, c, j.opts.specialEasing[b] || j.opts.easing);
        return j.tweens.push(d), d;
      },
      stop: function stop(b) {
        var c = 0,
            d = b ? j.tweens.length : 0;
        if (e) return this;

        for (e = !0; c < d; c++) {
          j.tweens[c].run(1);
        }

        return b ? (h.notifyWith(a, [j, 1, 0]), h.resolveWith(a, [j, b])) : h.rejectWith(a, [j, b]), this;
      }
    }),
        k = j.props;

    for (jb(k, j.opts.specialEasing); f < g; f++) {
      if (d = kb.prefilters[f].call(j, a, k, j.opts)) return r.isFunction(d.stop) && (r._queueHooks(j.elem, j.opts.queue).stop = r.proxy(d.stop, d)), d;
    }

    return r.map(k, hb, j), r.isFunction(j.opts.start) && j.opts.start.call(a, j), j.progress(j.opts.progress).done(j.opts.done, j.opts.complete).fail(j.opts.fail).always(j.opts.always), r.fx.timer(r.extend(i, {
      elem: a,
      anim: j,
      queue: j.opts.queue
    })), j;
  }

  r.Animation = r.extend(kb, {
    tweeners: {
      "*": [function (a, b) {
        var c = this.createTween(a, b);
        return fa(c.elem, a, ba.exec(b), c), c;
      }]
    },
    tweener: function tweener(a, b) {
      r.isFunction(a) ? (b = a, a = ["*"]) : a = a.match(L);

      for (var c, d = 0, e = a.length; d < e; d++) {
        c = a[d], kb.tweeners[c] = kb.tweeners[c] || [], kb.tweeners[c].unshift(b);
      }
    },
    prefilters: [ib],
    prefilter: function prefilter(a, b) {
      b ? kb.prefilters.unshift(a) : kb.prefilters.push(a);
    }
  }), r.speed = function (a, b, c) {
    var d = a && "object" == _typeof(a) ? r.extend({}, a) : {
      complete: c || !c && b || r.isFunction(a) && a,
      duration: a,
      easing: c && b || b && !r.isFunction(b) && b
    };
    return r.fx.off ? d.duration = 0 : "number" != typeof d.duration && (d.duration in r.fx.speeds ? d.duration = r.fx.speeds[d.duration] : d.duration = r.fx.speeds._default), null != d.queue && d.queue !== !0 || (d.queue = "fx"), d.old = d.complete, d.complete = function () {
      r.isFunction(d.old) && d.old.call(this), d.queue && r.dequeue(this, d.queue);
    }, d;
  }, r.fn.extend({
    fadeTo: function fadeTo(a, b, c, d) {
      return this.filter(da).css("opacity", 0).show().end().animate({
        opacity: b
      }, a, c, d);
    },
    animate: function animate(a, b, c, d) {
      var e = r.isEmptyObject(a),
          f = r.speed(b, c, d),
          g = function g() {
        var b = kb(this, r.extend({}, a), f);
        (e || W.get(this, "finish")) && b.stop(!0);
      };

      return g.finish = g, e || f.queue === !1 ? this.each(g) : this.queue(f.queue, g);
    },
    stop: function stop(a, b, c) {
      var d = function d(a) {
        var b = a.stop;
        delete a.stop, b(c);
      };

      return "string" != typeof a && (c = b, b = a, a = void 0), b && a !== !1 && this.queue(a || "fx", []), this.each(function () {
        var b = !0,
            e = null != a && a + "queueHooks",
            f = r.timers,
            g = W.get(this);
        if (e) g[e] && g[e].stop && d(g[e]);else for (e in g) {
          g[e] && g[e].stop && db.test(e) && d(g[e]);
        }

        for (e = f.length; e--;) {
          f[e].elem !== this || null != a && f[e].queue !== a || (f[e].anim.stop(c), b = !1, f.splice(e, 1));
        }

        !b && c || r.dequeue(this, a);
      });
    },
    finish: function finish(a) {
      return a !== !1 && (a = a || "fx"), this.each(function () {
        var b,
            c = W.get(this),
            d = c[a + "queue"],
            e = c[a + "queueHooks"],
            f = r.timers,
            g = d ? d.length : 0;

        for (c.finish = !0, r.queue(this, a, []), e && e.stop && e.stop.call(this, !0), b = f.length; b--;) {
          f[b].elem === this && f[b].queue === a && (f[b].anim.stop(!0), f.splice(b, 1));
        }

        for (b = 0; b < g; b++) {
          d[b] && d[b].finish && d[b].finish.call(this);
        }

        delete c.finish;
      });
    }
  }), r.each(["toggle", "show", "hide"], function (a, b) {
    var c = r.fn[b];

    r.fn[b] = function (a, d, e) {
      return null == a || "boolean" == typeof a ? c.apply(this, arguments) : this.animate(gb(b, !0), a, d, e);
    };
  }), r.each({
    slideDown: gb("show"),
    slideUp: gb("hide"),
    slideToggle: gb("toggle"),
    fadeIn: {
      opacity: "show"
    },
    fadeOut: {
      opacity: "hide"
    },
    fadeToggle: {
      opacity: "toggle"
    }
  }, function (a, b) {
    r.fn[a] = function (a, c, d) {
      return this.animate(b, a, c, d);
    };
  }), r.timers = [], r.fx.tick = function () {
    var a,
        b = 0,
        c = r.timers;

    for (ab = r.now(); b < c.length; b++) {
      a = c[b], a() || c[b] !== a || c.splice(b--, 1);
    }

    c.length || r.fx.stop(), ab = void 0;
  }, r.fx.timer = function (a) {
    r.timers.push(a), r.fx.start();
  }, r.fx.interval = 13, r.fx.start = function () {
    bb || (bb = !0, eb());
  }, r.fx.stop = function () {
    bb = null;
  }, r.fx.speeds = {
    slow: 600,
    fast: 200,
    _default: 400
  }, r.fn.delay = function (b, c) {
    return b = r.fx ? r.fx.speeds[b] || b : b, c = c || "fx", this.queue(c, function (c, d) {
      var e = a.setTimeout(c, b);

      d.stop = function () {
        a.clearTimeout(e);
      };
    });
  }, function () {
    var a = d.createElement("input"),
        b = d.createElement("select"),
        c = b.appendChild(d.createElement("option"));
    a.type = "checkbox", o.checkOn = "" !== a.value, o.optSelected = c.selected, a = d.createElement("input"), a.value = "t", a.type = "radio", o.radioValue = "t" === a.value;
  }();
  var lb,
      mb = r.expr.attrHandle;
  r.fn.extend({
    attr: function attr(a, b) {
      return T(this, r.attr, a, b, arguments.length > 1);
    },
    removeAttr: function removeAttr(a) {
      return this.each(function () {
        r.removeAttr(this, a);
      });
    }
  }), r.extend({
    attr: function attr(a, b, c) {
      var d,
          e,
          f = a.nodeType;
      if (3 !== f && 8 !== f && 2 !== f) return "undefined" == typeof a.getAttribute ? r.prop(a, b, c) : (1 === f && r.isXMLDoc(a) || (e = r.attrHooks[b.toLowerCase()] || (r.expr.match.bool.test(b) ? lb : void 0)), void 0 !== c ? null === c ? void r.removeAttr(a, b) : e && "set" in e && void 0 !== (d = e.set(a, c, b)) ? d : (a.setAttribute(b, c + ""), c) : e && "get" in e && null !== (d = e.get(a, b)) ? d : (d = r.find.attr(a, b), null == d ? void 0 : d));
    },
    attrHooks: {
      type: {
        set: function set(a, b) {
          if (!o.radioValue && "radio" === b && B(a, "input")) {
            var c = a.value;
            return a.setAttribute("type", b), c && (a.value = c), b;
          }
        }
      }
    },
    removeAttr: function removeAttr(a, b) {
      var c,
          d = 0,
          e = b && b.match(L);
      if (e && 1 === a.nodeType) while (c = e[d++]) {
        a.removeAttribute(c);
      }
    }
  }), lb = {
    set: function set(a, b, c) {
      return b === !1 ? r.removeAttr(a, c) : a.setAttribute(c, c), c;
    }
  }, r.each(r.expr.match.bool.source.match(/\w+/g), function (a, b) {
    var c = mb[b] || r.find.attr;

    mb[b] = function (a, b, d) {
      var e,
          f,
          g = b.toLowerCase();
      return d || (f = mb[g], mb[g] = e, e = null != c(a, b, d) ? g : null, mb[g] = f), e;
    };
  });
  var nb = /^(?:input|select|textarea|button)$/i,
      ob = /^(?:a|area)$/i;
  r.fn.extend({
    prop: function prop(a, b) {
      return T(this, r.prop, a, b, arguments.length > 1);
    },
    removeProp: function removeProp(a) {
      return this.each(function () {
        delete this[r.propFix[a] || a];
      });
    }
  }), r.extend({
    prop: function prop(a, b, c) {
      var d,
          e,
          f = a.nodeType;
      if (3 !== f && 8 !== f && 2 !== f) return 1 === f && r.isXMLDoc(a) || (b = r.propFix[b] || b, e = r.propHooks[b]), void 0 !== c ? e && "set" in e && void 0 !== (d = e.set(a, c, b)) ? d : a[b] = c : e && "get" in e && null !== (d = e.get(a, b)) ? d : a[b];
    },
    propHooks: {
      tabIndex: {
        get: function get(a) {
          var b = r.find.attr(a, "tabindex");
          return b ? parseInt(b, 10) : nb.test(a.nodeName) || ob.test(a.nodeName) && a.href ? 0 : -1;
        }
      }
    },
    propFix: {
      "for": "htmlFor",
      "class": "className"
    }
  }), o.optSelected || (r.propHooks.selected = {
    get: function get(a) {
      var b = a.parentNode;
      return b && b.parentNode && b.parentNode.selectedIndex, null;
    },
    set: function set(a) {
      var b = a.parentNode;
      b && (b.selectedIndex, b.parentNode && b.parentNode.selectedIndex);
    }
  }), r.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function () {
    r.propFix[this.toLowerCase()] = this;
  });

  function pb(a) {
    var b = a.match(L) || [];
    return b.join(" ");
  }

  function qb(a) {
    return a.getAttribute && a.getAttribute("class") || "";
  }

  r.fn.extend({
    addClass: function addClass(a) {
      var b,
          c,
          d,
          e,
          f,
          g,
          h,
          i = 0;
      if (r.isFunction(a)) return this.each(function (b) {
        r(this).addClass(a.call(this, b, qb(this)));
      });

      if ("string" == typeof a && a) {
        b = a.match(L) || [];

        while (c = this[i++]) {
          if (e = qb(c), d = 1 === c.nodeType && " " + pb(e) + " ") {
            g = 0;

            while (f = b[g++]) {
              d.indexOf(" " + f + " ") < 0 && (d += f + " ");
            }

            h = pb(d), e !== h && c.setAttribute("class", h);
          }
        }
      }

      return this;
    },
    removeClass: function removeClass(a) {
      var b,
          c,
          d,
          e,
          f,
          g,
          h,
          i = 0;
      if (r.isFunction(a)) return this.each(function (b) {
        r(this).removeClass(a.call(this, b, qb(this)));
      });
      if (!arguments.length) return this.attr("class", "");

      if ("string" == typeof a && a) {
        b = a.match(L) || [];

        while (c = this[i++]) {
          if (e = qb(c), d = 1 === c.nodeType && " " + pb(e) + " ") {
            g = 0;

            while (f = b[g++]) {
              while (d.indexOf(" " + f + " ") > -1) {
                d = d.replace(" " + f + " ", " ");
              }
            }

            h = pb(d), e !== h && c.setAttribute("class", h);
          }
        }
      }

      return this;
    },
    toggleClass: function toggleClass(a, b) {
      var c = _typeof(a);

      return "boolean" == typeof b && "string" === c ? b ? this.addClass(a) : this.removeClass(a) : r.isFunction(a) ? this.each(function (c) {
        r(this).toggleClass(a.call(this, c, qb(this), b), b);
      }) : this.each(function () {
        var b, d, e, f;

        if ("string" === c) {
          d = 0, e = r(this), f = a.match(L) || [];

          while (b = f[d++]) {
            e.hasClass(b) ? e.removeClass(b) : e.addClass(b);
          }
        } else void 0 !== a && "boolean" !== c || (b = qb(this), b && W.set(this, "__className__", b), this.setAttribute && this.setAttribute("class", b || a === !1 ? "" : W.get(this, "__className__") || ""));
      });
    },
    hasClass: function hasClass(a) {
      var b,
          c,
          d = 0;
      b = " " + a + " ";

      while (c = this[d++]) {
        if (1 === c.nodeType && (" " + pb(qb(c)) + " ").indexOf(b) > -1) return !0;
      }

      return !1;
    }
  });
  var rb = /\r/g;
  r.fn.extend({
    val: function val(a) {
      var b,
          c,
          d,
          e = this[0];
      {
        if (arguments.length) return d = r.isFunction(a), this.each(function (c) {
          var e;
          1 === this.nodeType && (e = d ? a.call(this, c, r(this).val()) : a, null == e ? e = "" : "number" == typeof e ? e += "" : Array.isArray(e) && (e = r.map(e, function (a) {
            return null == a ? "" : a + "";
          })), b = r.valHooks[this.type] || r.valHooks[this.nodeName.toLowerCase()], b && "set" in b && void 0 !== b.set(this, e, "value") || (this.value = e));
        });
        if (e) return b = r.valHooks[e.type] || r.valHooks[e.nodeName.toLowerCase()], b && "get" in b && void 0 !== (c = b.get(e, "value")) ? c : (c = e.value, "string" == typeof c ? c.replace(rb, "") : null == c ? "" : c);
      }
    }
  }), r.extend({
    valHooks: {
      option: {
        get: function get(a) {
          var b = r.find.attr(a, "value");
          return null != b ? b : pb(r.text(a));
        }
      },
      select: {
        get: function get(a) {
          var b,
              c,
              d,
              e = a.options,
              f = a.selectedIndex,
              g = "select-one" === a.type,
              h = g ? null : [],
              i = g ? f + 1 : e.length;

          for (d = f < 0 ? i : g ? f : 0; d < i; d++) {
            if (c = e[d], (c.selected || d === f) && !c.disabled && (!c.parentNode.disabled || !B(c.parentNode, "optgroup"))) {
              if (b = r(c).val(), g) return b;
              h.push(b);
            }
          }

          return h;
        },
        set: function set(a, b) {
          var c,
              d,
              e = a.options,
              f = r.makeArray(b),
              g = e.length;

          while (g--) {
            d = e[g], (d.selected = r.inArray(r.valHooks.option.get(d), f) > -1) && (c = !0);
          }

          return c || (a.selectedIndex = -1), f;
        }
      }
    }
  }), r.each(["radio", "checkbox"], function () {
    r.valHooks[this] = {
      set: function set(a, b) {
        if (Array.isArray(b)) return a.checked = r.inArray(r(a).val(), b) > -1;
      }
    }, o.checkOn || (r.valHooks[this].get = function (a) {
      return null === a.getAttribute("value") ? "on" : a.value;
    });
  });
  var sb = /^(?:focusinfocus|focusoutblur)$/;
  r.extend(r.event, {
    trigger: function trigger(b, c, e, f) {
      var g,
          h,
          i,
          j,
          k,
          m,
          n,
          o = [e || d],
          p = l.call(b, "type") ? b.type : b,
          q = l.call(b, "namespace") ? b.namespace.split(".") : [];

      if (h = i = e = e || d, 3 !== e.nodeType && 8 !== e.nodeType && !sb.test(p + r.event.triggered) && (p.indexOf(".") > -1 && (q = p.split("."), p = q.shift(), q.sort()), k = p.indexOf(":") < 0 && "on" + p, b = b[r.expando] ? b : new r.Event(p, "object" == _typeof(b) && b), b.isTrigger = f ? 2 : 3, b.namespace = q.join("."), b.rnamespace = b.namespace ? new RegExp("(^|\\.)" + q.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, b.result = void 0, b.target || (b.target = e), c = null == c ? [b] : r.makeArray(c, [b]), n = r.event.special[p] || {}, f || !n.trigger || n.trigger.apply(e, c) !== !1)) {
        if (!f && !n.noBubble && !r.isWindow(e)) {
          for (j = n.delegateType || p, sb.test(j + p) || (h = h.parentNode); h; h = h.parentNode) {
            o.push(h), i = h;
          }

          i === (e.ownerDocument || d) && o.push(i.defaultView || i.parentWindow || a);
        }

        g = 0;

        while ((h = o[g++]) && !b.isPropagationStopped()) {
          b.type = g > 1 ? j : n.bindType || p, m = (W.get(h, "events") || {})[b.type] && W.get(h, "handle"), m && m.apply(h, c), m = k && h[k], m && m.apply && U(h) && (b.result = m.apply(h, c), b.result === !1 && b.preventDefault());
        }

        return b.type = p, f || b.isDefaultPrevented() || n._default && n._default.apply(o.pop(), c) !== !1 || !U(e) || k && r.isFunction(e[p]) && !r.isWindow(e) && (i = e[k], i && (e[k] = null), r.event.triggered = p, e[p](), r.event.triggered = void 0, i && (e[k] = i)), b.result;
      }
    },
    simulate: function simulate(a, b, c) {
      var d = r.extend(new r.Event(), c, {
        type: a,
        isSimulated: !0
      });
      r.event.trigger(d, null, b);
    }
  }), r.fn.extend({
    trigger: function trigger(a, b) {
      return this.each(function () {
        r.event.trigger(a, b, this);
      });
    },
    triggerHandler: function triggerHandler(a, b) {
      var c = this[0];
      if (c) return r.event.trigger(a, b, c, !0);
    }
  }), r.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "), function (a, b) {
    r.fn[b] = function (a, c) {
      return arguments.length > 0 ? this.on(b, null, a, c) : this.trigger(b);
    };
  }), r.fn.extend({
    hover: function hover(a, b) {
      return this.mouseenter(a).mouseleave(b || a);
    }
  }), o.focusin = "onfocusin" in a, o.focusin || r.each({
    focus: "focusin",
    blur: "focusout"
  }, function (a, b) {
    var c = function c(a) {
      r.event.simulate(b, a.target, r.event.fix(a));
    };

    r.event.special[b] = {
      setup: function setup() {
        var d = this.ownerDocument || this,
            e = W.access(d, b);
        e || d.addEventListener(a, c, !0), W.access(d, b, (e || 0) + 1);
      },
      teardown: function teardown() {
        var d = this.ownerDocument || this,
            e = W.access(d, b) - 1;
        e ? W.access(d, b, e) : (d.removeEventListener(a, c, !0), W.remove(d, b));
      }
    };
  });
  var tb = a.location,
      ub = r.now(),
      vb = /\?/;

  r.parseXML = function (b) {
    var c;
    if (!b || "string" != typeof b) return null;

    try {
      c = new a.DOMParser().parseFromString(b, "text/xml");
    } catch (d) {
      c = void 0;
    }

    return c && !c.getElementsByTagName("parsererror").length || r.error("Invalid XML: " + b), c;
  };

  var wb = /\[\]$/,
      xb = /\r?\n/g,
      yb = /^(?:submit|button|image|reset|file)$/i,
      zb = /^(?:input|select|textarea|keygen)/i;

  function Ab(a, b, c, d) {
    var e;
    if (Array.isArray(b)) r.each(b, function (b, e) {
      c || wb.test(a) ? d(a, e) : Ab(a + "[" + ("object" == _typeof(e) && null != e ? b : "") + "]", e, c, d);
    });else if (c || "object" !== r.type(b)) d(a, b);else for (e in b) {
      Ab(a + "[" + e + "]", b[e], c, d);
    }
  }

  r.param = function (a, b) {
    var c,
        d = [],
        e = function e(a, b) {
      var c = r.isFunction(b) ? b() : b;
      d[d.length] = encodeURIComponent(a) + "=" + encodeURIComponent(null == c ? "" : c);
    };

    if (Array.isArray(a) || a.jquery && !r.isPlainObject(a)) r.each(a, function () {
      e(this.name, this.value);
    });else for (c in a) {
      Ab(c, a[c], b, e);
    }
    return d.join("&");
  }, r.fn.extend({
    serialize: function serialize() {
      return r.param(this.serializeArray());
    },
    serializeArray: function serializeArray() {
      return this.map(function () {
        var a = r.prop(this, "elements");
        return a ? r.makeArray(a) : this;
      }).filter(function () {
        var a = this.type;
        return this.name && !r(this).is(":disabled") && zb.test(this.nodeName) && !yb.test(a) && (this.checked || !ja.test(a));
      }).map(function (a, b) {
        var c = r(this).val();
        return null == c ? null : Array.isArray(c) ? r.map(c, function (a) {
          return {
            name: b.name,
            value: a.replace(xb, "\r\n")
          };
        }) : {
          name: b.name,
          value: c.replace(xb, "\r\n")
        };
      }).get();
    }
  });
  var Bb = /%20/g,
      Cb = /#.*$/,
      Db = /([?&])_=[^&]*/,
      Eb = /^(.*?):[ \t]*([^\r\n]*)$/gm,
      Fb = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
      Gb = /^(?:GET|HEAD)$/,
      Hb = /^\/\//,
      Ib = {},
      Jb = {},
      Kb = "*/".concat("*"),
      Lb = d.createElement("a");
  Lb.href = tb.href;

  function Mb(a) {
    return function (b, c) {
      "string" != typeof b && (c = b, b = "*");
      var d,
          e = 0,
          f = b.toLowerCase().match(L) || [];
      if (r.isFunction(c)) while (d = f[e++]) {
        "+" === d[0] ? (d = d.slice(1) || "*", (a[d] = a[d] || []).unshift(c)) : (a[d] = a[d] || []).push(c);
      }
    };
  }

  function Nb(a, b, c, d) {
    var e = {},
        f = a === Jb;

    function g(h) {
      var i;
      return e[h] = !0, r.each(a[h] || [], function (a, h) {
        var j = h(b, c, d);
        return "string" != typeof j || f || e[j] ? f ? !(i = j) : void 0 : (b.dataTypes.unshift(j), g(j), !1);
      }), i;
    }

    return g(b.dataTypes[0]) || !e["*"] && g("*");
  }

  function Ob(a, b) {
    var c,
        d,
        e = r.ajaxSettings.flatOptions || {};

    for (c in b) {
      void 0 !== b[c] && ((e[c] ? a : d || (d = {}))[c] = b[c]);
    }

    return d && r.extend(!0, a, d), a;
  }

  function Pb(a, b, c) {
    var d,
        e,
        f,
        g,
        h = a.contents,
        i = a.dataTypes;

    while ("*" === i[0]) {
      i.shift(), void 0 === d && (d = a.mimeType || b.getResponseHeader("Content-Type"));
    }

    if (d) for (e in h) {
      if (h[e] && h[e].test(d)) {
        i.unshift(e);
        break;
      }
    }
    if (i[0] in c) f = i[0];else {
      for (e in c) {
        if (!i[0] || a.converters[e + " " + i[0]]) {
          f = e;
          break;
        }

        g || (g = e);
      }

      f = f || g;
    }
    if (f) return f !== i[0] && i.unshift(f), c[f];
  }

  function Qb(a, b, c, d) {
    var e,
        f,
        g,
        h,
        i,
        j = {},
        k = a.dataTypes.slice();
    if (k[1]) for (g in a.converters) {
      j[g.toLowerCase()] = a.converters[g];
    }
    f = k.shift();

    while (f) {
      if (a.responseFields[f] && (c[a.responseFields[f]] = b), !i && d && a.dataFilter && (b = a.dataFilter(b, a.dataType)), i = f, f = k.shift()) if ("*" === f) f = i;else if ("*" !== i && i !== f) {
        if (g = j[i + " " + f] || j["* " + f], !g) for (e in j) {
          if (h = e.split(" "), h[1] === f && (g = j[i + " " + h[0]] || j["* " + h[0]])) {
            g === !0 ? g = j[e] : j[e] !== !0 && (f = h[0], k.unshift(h[1]));
            break;
          }
        }
        if (g !== !0) if (g && a["throws"]) b = g(b);else try {
          b = g(b);
        } catch (l) {
          return {
            state: "parsererror",
            error: g ? l : "No conversion from " + i + " to " + f
          };
        }
      }
    }

    return {
      state: "success",
      data: b
    };
  }

  r.extend({
    active: 0,
    lastModified: {},
    etag: {},
    ajaxSettings: {
      url: tb.href,
      type: "GET",
      isLocal: Fb.test(tb.protocol),
      global: !0,
      processData: !0,
      async: !0,
      contentType: "application/x-www-form-urlencoded; charset=UTF-8",
      accepts: {
        "*": Kb,
        text: "text/plain",
        html: "text/html",
        xml: "application/xml, text/xml",
        json: "application/json, text/javascript"
      },
      contents: {
        xml: /\bxml\b/,
        html: /\bhtml/,
        json: /\bjson\b/
      },
      responseFields: {
        xml: "responseXML",
        text: "responseText",
        json: "responseJSON"
      },
      converters: {
        "* text": String,
        "text html": !0,
        "text json": JSON.parse,
        "text xml": r.parseXML
      },
      flatOptions: {
        url: !0,
        context: !0
      }
    },
    ajaxSetup: function ajaxSetup(a, b) {
      return b ? Ob(Ob(a, r.ajaxSettings), b) : Ob(r.ajaxSettings, a);
    },
    ajaxPrefilter: Mb(Ib),
    ajaxTransport: Mb(Jb),
    ajax: function ajax(b, c) {
      "object" == _typeof(b) && (c = b, b = void 0), c = c || {};
      var e,
          f,
          g,
          h,
          i,
          j,
          k,
          l,
          m,
          n,
          o = r.ajaxSetup({}, c),
          p = o.context || o,
          q = o.context && (p.nodeType || p.jquery) ? r(p) : r.event,
          s = r.Deferred(),
          t = r.Callbacks("once memory"),
          u = o.statusCode || {},
          v = {},
          w = {},
          x = "canceled",
          y = {
        readyState: 0,
        getResponseHeader: function getResponseHeader(a) {
          var b;

          if (k) {
            if (!h) {
              h = {};

              while (b = Eb.exec(g)) {
                h[b[1].toLowerCase()] = b[2];
              }
            }

            b = h[a.toLowerCase()];
          }

          return null == b ? null : b;
        },
        getAllResponseHeaders: function getAllResponseHeaders() {
          return k ? g : null;
        },
        setRequestHeader: function setRequestHeader(a, b) {
          return null == k && (a = w[a.toLowerCase()] = w[a.toLowerCase()] || a, v[a] = b), this;
        },
        overrideMimeType: function overrideMimeType(a) {
          return null == k && (o.mimeType = a), this;
        },
        statusCode: function statusCode(a) {
          var b;
          if (a) if (k) y.always(a[y.status]);else for (b in a) {
            u[b] = [u[b], a[b]];
          }
          return this;
        },
        abort: function abort(a) {
          var b = a || x;
          return e && e.abort(b), A(0, b), this;
        }
      };

      if (s.promise(y), o.url = ((b || o.url || tb.href) + "").replace(Hb, tb.protocol + "//"), o.type = c.method || c.type || o.method || o.type, o.dataTypes = (o.dataType || "*").toLowerCase().match(L) || [""], null == o.crossDomain) {
        j = d.createElement("a");

        try {
          j.href = o.url, j.href = j.href, o.crossDomain = Lb.protocol + "//" + Lb.host != j.protocol + "//" + j.host;
        } catch (z) {
          o.crossDomain = !0;
        }
      }

      if (o.data && o.processData && "string" != typeof o.data && (o.data = r.param(o.data, o.traditional)), Nb(Ib, o, c, y), k) return y;
      l = r.event && o.global, l && 0 === r.active++ && r.event.trigger("ajaxStart"), o.type = o.type.toUpperCase(), o.hasContent = !Gb.test(o.type), f = o.url.replace(Cb, ""), o.hasContent ? o.data && o.processData && 0 === (o.contentType || "").indexOf("application/x-www-form-urlencoded") && (o.data = o.data.replace(Bb, "+")) : (n = o.url.slice(f.length), o.data && (f += (vb.test(f) ? "&" : "?") + o.data, delete o.data), o.cache === !1 && (f = f.replace(Db, "$1"), n = (vb.test(f) ? "&" : "?") + "_=" + ub++ + n), o.url = f + n), o.ifModified && (r.lastModified[f] && y.setRequestHeader("If-Modified-Since", r.lastModified[f]), r.etag[f] && y.setRequestHeader("If-None-Match", r.etag[f])), (o.data && o.hasContent && o.contentType !== !1 || c.contentType) && y.setRequestHeader("Content-Type", o.contentType), y.setRequestHeader("Accept", o.dataTypes[0] && o.accepts[o.dataTypes[0]] ? o.accepts[o.dataTypes[0]] + ("*" !== o.dataTypes[0] ? ", " + Kb + "; q=0.01" : "") : o.accepts["*"]);

      for (m in o.headers) {
        y.setRequestHeader(m, o.headers[m]);
      }

      if (o.beforeSend && (o.beforeSend.call(p, y, o) === !1 || k)) return y.abort();

      if (x = "abort", t.add(o.complete), y.done(o.success), y.fail(o.error), e = Nb(Jb, o, c, y)) {
        if (y.readyState = 1, l && q.trigger("ajaxSend", [y, o]), k) return y;
        o.async && o.timeout > 0 && (i = a.setTimeout(function () {
          y.abort("timeout");
        }, o.timeout));

        try {
          k = !1, e.send(v, A);
        } catch (z) {
          if (k) throw z;
          A(-1, z);
        }
      } else A(-1, "No Transport");

      function A(b, c, d, h) {
        var j,
            m,
            n,
            v,
            w,
            x = c;
        k || (k = !0, i && a.clearTimeout(i), e = void 0, g = h || "", y.readyState = b > 0 ? 4 : 0, j = b >= 200 && b < 300 || 304 === b, d && (v = Pb(o, y, d)), v = Qb(o, v, y, j), j ? (o.ifModified && (w = y.getResponseHeader("Last-Modified"), w && (r.lastModified[f] = w), w = y.getResponseHeader("etag"), w && (r.etag[f] = w)), 204 === b || "HEAD" === o.type ? x = "nocontent" : 304 === b ? x = "notmodified" : (x = v.state, m = v.data, n = v.error, j = !n)) : (n = x, !b && x || (x = "error", b < 0 && (b = 0))), y.status = b, y.statusText = (c || x) + "", j ? s.resolveWith(p, [m, x, y]) : s.rejectWith(p, [y, x, n]), y.statusCode(u), u = void 0, l && q.trigger(j ? "ajaxSuccess" : "ajaxError", [y, o, j ? m : n]), t.fireWith(p, [y, x]), l && (q.trigger("ajaxComplete", [y, o]), --r.active || r.event.trigger("ajaxStop")));
      }

      return y;
    },
    getJSON: function getJSON(a, b, c) {
      return r.get(a, b, c, "json");
    },
    getScript: function getScript(a, b) {
      return r.get(a, void 0, b, "script");
    }
  }), r.each(["get", "post"], function (a, b) {
    r[b] = function (a, c, d, e) {
      return r.isFunction(c) && (e = e || d, d = c, c = void 0), r.ajax(r.extend({
        url: a,
        type: b,
        dataType: e,
        data: c,
        success: d
      }, r.isPlainObject(a) && a));
    };
  }), r._evalUrl = function (a) {
    return r.ajax({
      url: a,
      type: "GET",
      dataType: "script",
      cache: !0,
      async: !1,
      global: !1,
      "throws": !0
    });
  }, r.fn.extend({
    wrapAll: function wrapAll(a) {
      var b;
      return this[0] && (r.isFunction(a) && (a = a.call(this[0])), b = r(a, this[0].ownerDocument).eq(0).clone(!0), this[0].parentNode && b.insertBefore(this[0]), b.map(function () {
        var a = this;

        while (a.firstElementChild) {
          a = a.firstElementChild;
        }

        return a;
      }).append(this)), this;
    },
    wrapInner: function wrapInner(a) {
      return r.isFunction(a) ? this.each(function (b) {
        r(this).wrapInner(a.call(this, b));
      }) : this.each(function () {
        var b = r(this),
            c = b.contents();
        c.length ? c.wrapAll(a) : b.append(a);
      });
    },
    wrap: function wrap(a) {
      var b = r.isFunction(a);
      return this.each(function (c) {
        r(this).wrapAll(b ? a.call(this, c) : a);
      });
    },
    unwrap: function unwrap(a) {
      return this.parent(a).not("body").each(function () {
        r(this).replaceWith(this.childNodes);
      }), this;
    }
  }), r.expr.pseudos.hidden = function (a) {
    return !r.expr.pseudos.visible(a);
  }, r.expr.pseudos.visible = function (a) {
    return !!(a.offsetWidth || a.offsetHeight || a.getClientRects().length);
  }, r.ajaxSettings.xhr = function () {
    try {
      return new a.XMLHttpRequest();
    } catch (b) {}
  };
  var Rb = {
    0: 200,
    1223: 204
  },
      Sb = r.ajaxSettings.xhr();
  o.cors = !!Sb && "withCredentials" in Sb, o.ajax = Sb = !!Sb, r.ajaxTransport(function (b) {
    var _c, d;

    if (o.cors || Sb && !b.crossDomain) return {
      send: function send(e, f) {
        var g,
            h = b.xhr();
        if (h.open(b.type, b.url, b.async, b.username, b.password), b.xhrFields) for (g in b.xhrFields) {
          h[g] = b.xhrFields[g];
        }
        b.mimeType && h.overrideMimeType && h.overrideMimeType(b.mimeType), b.crossDomain || e["X-Requested-With"] || (e["X-Requested-With"] = "XMLHttpRequest");

        for (g in e) {
          h.setRequestHeader(g, e[g]);
        }

        _c = function c(a) {
          return function () {
            _c && (_c = d = h.onload = h.onerror = h.onabort = h.onreadystatechange = null, "abort" === a ? h.abort() : "error" === a ? "number" != typeof h.status ? f(0, "error") : f(h.status, h.statusText) : f(Rb[h.status] || h.status, h.statusText, "text" !== (h.responseType || "text") || "string" != typeof h.responseText ? {
              binary: h.response
            } : {
              text: h.responseText
            }, h.getAllResponseHeaders()));
          };
        }, h.onload = _c(), d = h.onerror = _c("error"), void 0 !== h.onabort ? h.onabort = d : h.onreadystatechange = function () {
          4 === h.readyState && a.setTimeout(function () {
            _c && d();
          });
        }, _c = _c("abort");

        try {
          h.send(b.hasContent && b.data || null);
        } catch (i) {
          if (_c) throw i;
        }
      },
      abort: function abort() {
        _c && _c();
      }
    };
  }), r.ajaxPrefilter(function (a) {
    a.crossDomain && (a.contents.script = !1);
  }), r.ajaxSetup({
    accepts: {
      script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
    },
    contents: {
      script: /\b(?:java|ecma)script\b/
    },
    converters: {
      "text script": function textScript(a) {
        return r.globalEval(a), a;
      }
    }
  }), r.ajaxPrefilter("script", function (a) {
    void 0 === a.cache && (a.cache = !1), a.crossDomain && (a.type = "GET");
  }), r.ajaxTransport("script", function (a) {
    if (a.crossDomain) {
      var b, _c2;

      return {
        send: function send(e, f) {
          b = r("<script>").prop({
            charset: a.scriptCharset,
            src: a.url
          }).on("load error", _c2 = function c(a) {
            b.remove(), _c2 = null, a && f("error" === a.type ? 404 : 200, a.type);
          }), d.head.appendChild(b[0]);
        },
        abort: function abort() {
          _c2 && _c2();
        }
      };
    }
  });
  var Tb = [],
      Ub = /(=)\?(?=&|$)|\?\?/;
  r.ajaxSetup({
    jsonp: "callback",
    jsonpCallback: function jsonpCallback() {
      var a = Tb.pop() || r.expando + "_" + ub++;
      return this[a] = !0, a;
    }
  }), r.ajaxPrefilter("json jsonp", function (b, c, d) {
    var e,
        f,
        g,
        h = b.jsonp !== !1 && (Ub.test(b.url) ? "url" : "string" == typeof b.data && 0 === (b.contentType || "").indexOf("application/x-www-form-urlencoded") && Ub.test(b.data) && "data");
    if (h || "jsonp" === b.dataTypes[0]) return e = b.jsonpCallback = r.isFunction(b.jsonpCallback) ? b.jsonpCallback() : b.jsonpCallback, h ? b[h] = b[h].replace(Ub, "$1" + e) : b.jsonp !== !1 && (b.url += (vb.test(b.url) ? "&" : "?") + b.jsonp + "=" + e), b.converters["script json"] = function () {
      return g || r.error(e + " was not called"), g[0];
    }, b.dataTypes[0] = "json", f = a[e], a[e] = function () {
      g = arguments;
    }, d.always(function () {
      void 0 === f ? r(a).removeProp(e) : a[e] = f, b[e] && (b.jsonpCallback = c.jsonpCallback, Tb.push(e)), g && r.isFunction(f) && f(g[0]), g = f = void 0;
    }), "script";
  }), o.createHTMLDocument = function () {
    var a = d.implementation.createHTMLDocument("").body;
    return a.innerHTML = "<form></form><form></form>", 2 === a.childNodes.length;
  }(), r.parseHTML = function (a, b, c) {
    if ("string" != typeof a) return [];
    "boolean" == typeof b && (c = b, b = !1);
    var e, f, g;
    return b || (o.createHTMLDocument ? (b = d.implementation.createHTMLDocument(""), e = b.createElement("base"), e.href = d.location.href, b.head.appendChild(e)) : b = d), f = C.exec(a), g = !c && [], f ? [b.createElement(f[1])] : (f = qa([a], b, g), g && g.length && r(g).remove(), r.merge([], f.childNodes));
  }, r.fn.load = function (a, b, c) {
    var d,
        e,
        f,
        g = this,
        h = a.indexOf(" ");
    return h > -1 && (d = pb(a.slice(h)), a = a.slice(0, h)), r.isFunction(b) ? (c = b, b = void 0) : b && "object" == _typeof(b) && (e = "POST"), g.length > 0 && r.ajax({
      url: a,
      type: e || "GET",
      dataType: "html",
      data: b
    }).done(function (a) {
      f = arguments, g.html(d ? r("<div>").append(r.parseHTML(a)).find(d) : a);
    }).always(c && function (a, b) {
      g.each(function () {
        c.apply(this, f || [a.responseText, b, a]);
      });
    }), this;
  }, r.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function (a, b) {
    r.fn[b] = function (a) {
      return this.on(b, a);
    };
  }), r.expr.pseudos.animated = function (a) {
    return r.grep(r.timers, function (b) {
      return a === b.elem;
    }).length;
  }, r.offset = {
    setOffset: function setOffset(a, b, c) {
      var d,
          e,
          f,
          g,
          h,
          i,
          j,
          k = r.css(a, "position"),
          l = r(a),
          m = {};
      "static" === k && (a.style.position = "relative"), h = l.offset(), f = r.css(a, "top"), i = r.css(a, "left"), j = ("absolute" === k || "fixed" === k) && (f + i).indexOf("auto") > -1, j ? (d = l.position(), g = d.top, e = d.left) : (g = parseFloat(f) || 0, e = parseFloat(i) || 0), r.isFunction(b) && (b = b.call(a, c, r.extend({}, h))), null != b.top && (m.top = b.top - h.top + g), null != b.left && (m.left = b.left - h.left + e), "using" in b ? b.using.call(a, m) : l.css(m);
    }
  }, r.fn.extend({
    offset: function offset(a) {
      if (arguments.length) return void 0 === a ? this : this.each(function (b) {
        r.offset.setOffset(this, a, b);
      });
      var b,
          c,
          d,
          e,
          f = this[0];
      if (f) return f.getClientRects().length ? (d = f.getBoundingClientRect(), b = f.ownerDocument, c = b.documentElement, e = b.defaultView, {
        top: d.top + e.pageYOffset - c.clientTop,
        left: d.left + e.pageXOffset - c.clientLeft
      }) : {
        top: 0,
        left: 0
      };
    },
    position: function position() {
      if (this[0]) {
        var a,
            b,
            c = this[0],
            d = {
          top: 0,
          left: 0
        };
        return "fixed" === r.css(c, "position") ? b = c.getBoundingClientRect() : (a = this.offsetParent(), b = this.offset(), B(a[0], "html") || (d = a.offset()), d = {
          top: d.top + r.css(a[0], "borderTopWidth", !0),
          left: d.left + r.css(a[0], "borderLeftWidth", !0)
        }), {
          top: b.top - d.top - r.css(c, "marginTop", !0),
          left: b.left - d.left - r.css(c, "marginLeft", !0)
        };
      }
    },
    offsetParent: function offsetParent() {
      return this.map(function () {
        var a = this.offsetParent;

        while (a && "static" === r.css(a, "position")) {
          a = a.offsetParent;
        }

        return a || ra;
      });
    }
  }), r.each({
    scrollLeft: "pageXOffset",
    scrollTop: "pageYOffset"
  }, function (a, b) {
    var c = "pageYOffset" === b;

    r.fn[a] = function (d) {
      return T(this, function (a, d, e) {
        var f;
        return r.isWindow(a) ? f = a : 9 === a.nodeType && (f = a.defaultView), void 0 === e ? f ? f[b] : a[d] : void (f ? f.scrollTo(c ? f.pageXOffset : e, c ? e : f.pageYOffset) : a[d] = e);
      }, a, d, arguments.length);
    };
  }), r.each(["top", "left"], function (a, b) {
    r.cssHooks[b] = Pa(o.pixelPosition, function (a, c) {
      if (c) return c = Oa(a, b), Ma.test(c) ? r(a).position()[b] + "px" : c;
    });
  }), r.each({
    Height: "height",
    Width: "width"
  }, function (a, b) {
    r.each({
      padding: "inner" + a,
      content: b,
      "": "outer" + a
    }, function (c, d) {
      r.fn[d] = function (e, f) {
        var g = arguments.length && (c || "boolean" != typeof e),
            h = c || (e === !0 || f === !0 ? "margin" : "border");
        return T(this, function (b, c, e) {
          var f;
          return r.isWindow(b) ? 0 === d.indexOf("outer") ? b["inner" + a] : b.document.documentElement["client" + a] : 9 === b.nodeType ? (f = b.documentElement, Math.max(b.body["scroll" + a], f["scroll" + a], b.body["offset" + a], f["offset" + a], f["client" + a])) : void 0 === e ? r.css(b, c, h) : r.style(b, c, e, h);
        }, b, g ? e : void 0, g);
      };
    });
  }), r.fn.extend({
    bind: function bind(a, b, c) {
      return this.on(a, null, b, c);
    },
    unbind: function unbind(a, b) {
      return this.off(a, null, b);
    },
    delegate: function delegate(a, b, c, d) {
      return this.on(b, a, c, d);
    },
    undelegate: function undelegate(a, b, c) {
      return 1 === arguments.length ? this.off(a, "**") : this.off(b, a || "**", c);
    }
  }), r.holdReady = function (a) {
    a ? r.readyWait++ : r.ready(!0);
  }, r.isArray = Array.isArray, r.parseJSON = JSON.parse, r.nodeName = B,  true && !(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function () {
    return r;
  }).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
  var Vb = a.jQuery,
      Wb = a.$;
  return r.noConflict = function (b) {
    return a.$ === r && (a.$ = Wb), b && a.jQuery === r && (a.jQuery = Vb), r;
  }, b || (a.jQuery = a.$ = r), r;
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../../../node_modules/webpack/buildin/module.js */ "./node_modules/webpack/buildin/module.js")(module)))

/***/ }),

/***/ "./resources/admin_asset/lib/sweetalert2/js/sweetalert2.all.min.js":
/*!*************************************************************************!*\
  !*** ./resources/admin_asset/lib/sweetalert2/js/sweetalert2.all.min.js ***!
  \*************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_RESULT__;function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

!function (t, e) {
  "object" == ( false ? undefined : _typeof(exports)) && "undefined" != typeof module ? module.exports = e() :  true ? !(__WEBPACK_AMD_DEFINE_FACTORY__ = (e),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.call(exports, __webpack_require__, exports, module)) :
				__WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : undefined;
}(this, function () {
  "use strict";

  function r(t) {
    return (r = "function" == typeof Symbol && "symbol" == _typeof(Symbol.iterator) ? function (t) {
      return _typeof(t);
    } : function (t) {
      return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : _typeof(t);
    })(t);
  }

  function a(t, e) {
    if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function");
  }

  function o(t, e) {
    for (var n = 0; n < e.length; n++) {
      var o = e[n];
      o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(t, o.key, o);
    }
  }

  function c(t, e, n) {
    return e && o(t.prototype, e), n && o(t, n), t;
  }

  function s() {
    return (s = Object.assign || function (t) {
      for (var e = 1; e < arguments.length; e++) {
        var n,
            o = arguments[e];

        for (n in o) {
          Object.prototype.hasOwnProperty.call(o, n) && (t[n] = o[n]);
        }
      }

      return t;
    }).apply(this, arguments);
  }

  function u(t) {
    return (u = Object.setPrototypeOf ? Object.getPrototypeOf : function (t) {
      return t.__proto__ || Object.getPrototypeOf(t);
    })(t);
  }

  function l(t, e) {
    return (l = Object.setPrototypeOf || function (t, e) {
      return t.__proto__ = e, t;
    })(t, e);
  }

  function d() {
    if ("undefined" == typeof Reflect || !Reflect.construct) return !1;
    if (Reflect.construct.sham) return !1;
    if ("function" == typeof Proxy) return !0;

    try {
      return Date.prototype.toString.call(Reflect.construct(Date, [], function () {})), !0;
    } catch (t) {
      return !1;
    }
  }

  function i(t, e, n) {
    return (i = d() ? Reflect.construct : function (t, e, n) {
      var o = [null];
      o.push.apply(o, e);
      o = new (Function.bind.apply(t, o))();
      return n && l(o, n.prototype), o;
    }).apply(null, arguments);
  }

  function p(t, e) {
    return !e || "object" != _typeof(e) && "function" != typeof e ? function (t) {
      if (void 0 === t) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
      return t;
    }(t) : e;
  }

  function f(t, e, n) {
    return (f = "undefined" != typeof Reflect && Reflect.get ? Reflect.get : function (t, e, n) {
      t = function (t, e) {
        for (; !Object.prototype.hasOwnProperty.call(t, e) && null !== (t = u(t));) {
          ;
        }

        return t;
      }(t, e);

      if (t) {
        e = Object.getOwnPropertyDescriptor(t, e);
        return e.get ? e.get.call(n) : e.value;
      }
    })(t, e, n || t);
  }

  function m(t) {
    return t.charAt(0).toUpperCase() + t.slice(1);
  }

  function h(e) {
    return Object.keys(e).map(function (t) {
      return e[t];
    });
  }

  function g(t) {
    return Array.prototype.slice.call(t);
  }

  function v(t, e) {
    e = '"'.concat(t, '" is deprecated and will be removed in the next major release. Please use "').concat(e, '" instead.'), -1 === Y.indexOf(e) && (Y.push(e), W(e));
  }

  function y(t) {
    return t && "function" == typeof t.toPromise;
  }

  function b(t) {
    return y(t) ? t.toPromise() : Promise.resolve(t);
  }

  function w(t) {
    return t && Promise.resolve(t) === t;
  }

  function C(t) {
    return t instanceof Element || "object" === r(t = t) && t.jquery;
  }

  function k() {
    return document.body.querySelector(".".concat($.container));
  }

  function A(t) {
    var e = k();
    return e ? e.querySelector(t) : null;
  }

  function t(t) {
    return A(".".concat(t));
  }

  function x() {
    return t($.popup);
  }

  function n() {
    var t = x();
    return g(t.querySelectorAll(".".concat($.icon)));
  }

  function B() {
    var t = n().filter(function (t) {
      return wt(t);
    });
    return t.length ? t[0] : null;
  }

  function P() {
    return t($.title);
  }

  function S() {
    return t($.content);
  }

  function E() {
    return t($.image);
  }

  function O() {
    return t($["progress-steps"]);
  }

  function T() {
    return t($["validation-message"]);
  }

  function L() {
    return A(".".concat($.actions, " .").concat($.confirm));
  }

  function q() {
    return A(".".concat($.actions, " .").concat($.deny));
  }

  function D() {
    return A(".".concat($.loader));
  }

  function j() {
    return A(".".concat($.actions, " .").concat($.cancel));
  }

  function I() {
    return t($.actions);
  }

  function M() {
    return t($.header);
  }

  function V() {
    return t($.footer);
  }

  function H() {
    return t($["timer-progress-bar"]);
  }

  function R() {
    return t($.close);
  }

  function N() {
    var t = g(x().querySelectorAll('[tabindex]:not([tabindex="-1"]):not([tabindex="0"])')).sort(function (t, e) {
      return t = parseInt(t.getAttribute("tabindex")), (e = parseInt(e.getAttribute("tabindex"))) < t ? 1 : t < e ? -1 : 0;
    }),
        e = g(x().querySelectorAll('\n  a[href],\n  area[href],\n  input:not([disabled]),\n  select:not([disabled]),\n  textarea:not([disabled]),\n  button:not([disabled]),\n  iframe,\n  object,\n  embed,\n  [tabindex="0"],\n  [contenteditable],\n  audio[controls],\n  video[controls],\n  summary\n')).filter(function (t) {
      return "-1" !== t.getAttribute("tabindex");
    });
    return function (t) {
      for (var e = [], n = 0; n < t.length; n++) {
        -1 === e.indexOf(t[n]) && e.push(t[n]);
      }

      return e;
    }(t.concat(e)).filter(function (t) {
      return wt(t);
    });
  }

  function U() {
    return !G() && !document.body.classList.contains($["no-backdrop"]);
  }

  function _(e, t) {
    e.textContent = "", t && (t = new DOMParser().parseFromString(t, "text/html"), g(t.querySelector("head").childNodes).forEach(function (t) {
      e.appendChild(t);
    }), g(t.querySelector("body").childNodes).forEach(function (t) {
      e.appendChild(t);
    }));
  }

  function F(t, e) {
    if (e) {
      for (var n = e.split(/\s+/), o = 0; o < n.length; o++) {
        if (!t.classList.contains(n[o])) return;
      }

      return 1;
    }
  }

  function z(t, e, n) {
    var o, i;

    if (i = e, g((o = t).classList).forEach(function (t) {
      -1 === h($).indexOf(t) && -1 === h(X).indexOf(t) && -1 === h(i.showClass).indexOf(t) && o.classList.remove(t);
    }), e.customClass && e.customClass[n]) {
      if ("string" != typeof e.customClass[n] && !e.customClass[n].forEach) return W("Invalid type of customClass.".concat(n, '! Expected string or iterable object, got "').concat(r(e.customClass[n]), '"'));
      vt(t, e.customClass[n]);
    }
  }

  var e = "SweetAlert2:",
      W = function W(t) {
    console.warn("".concat(e, " ").concat("object" === r(t) ? t.join(" ") : t));
  },
      K = function K(t) {
    console.error("".concat(e, " ").concat(t));
  },
      Y = [],
      Z = function Z(t) {
    return "function" == typeof t ? t() : t;
  },
      Q = Object.freeze({
    cancel: "cancel",
    backdrop: "backdrop",
    close: "close",
    esc: "esc",
    timer: "timer"
  }),
      J = function J(t) {
    var e,
        n = {};

    for (e in t) {
      n[t[e]] = "swal2-" + t[e];
    }

    return n;
  },
      $ = J(["container", "shown", "height-auto", "iosfix", "popup", "modal", "no-backdrop", "no-transition", "toast", "toast-shown", "toast-column", "show", "hide", "close", "title", "header", "content", "html-container", "actions", "confirm", "deny", "cancel", "footer", "icon", "icon-content", "image", "input", "file", "range", "select", "radio", "checkbox", "label", "textarea", "inputerror", "input-label", "validation-message", "progress-steps", "active-progress-step", "progress-step", "progress-step-line", "loader", "loading", "styled", "top", "top-start", "top-end", "top-left", "top-right", "center", "center-start", "center-end", "center-left", "center-right", "bottom", "bottom-start", "bottom-end", "bottom-left", "bottom-right", "grow-row", "grow-column", "grow-fullscreen", "rtl", "timer-progress-bar", "timer-progress-bar-container", "scrollbar-measure", "icon-success", "icon-warning", "icon-info", "icon-question", "icon-error"]),
      X = J(["success", "warning", "info", "question", "error"]),
      G = function G() {
    return document.body.classList.contains($["toast-shown"]);
  },
      tt = {
    previousBodyPadding: null
  };

  function et(t, e) {
    if (!e) return null;

    switch (e) {
      case "select":
      case "textarea":
      case "file":
        return bt(t, $[e]);

      case "checkbox":
        return t.querySelector(".".concat($.checkbox, " input"));

      case "radio":
        return t.querySelector(".".concat($.radio, " input:checked")) || t.querySelector(".".concat($.radio, " input:first-child"));

      case "range":
        return t.querySelector(".".concat($.range, " input"));

      default:
        return bt(t, $.input);
    }
  }

  function nt(t) {
    var e;
    t.focus(), "file" !== t.type && (e = t.value, t.value = "", t.value = e);
  }

  function ot(t, e, n) {
    t && e && ("string" == typeof e && (e = e.split(/\s+/).filter(Boolean)), e.forEach(function (e) {
      t.forEach ? t.forEach(function (t) {
        n ? t.classList.add(e) : t.classList.remove(e);
      }) : n ? t.classList.add(e) : t.classList.remove(e);
    }));
  }

  function it(t, e, n) {
    n === "".concat(parseInt(n)) && (n = parseInt(n)), n || 0 === parseInt(n) ? t.style[e] = "number" == typeof n ? "".concat(n, "px") : n : t.style.removeProperty(e);
  }

  function rt(t, e) {
    e = 1 < arguments.length && void 0 !== e ? e : "flex", t.style.display = e;
  }

  function at(t) {
    t.style.display = "none";
  }

  function ct(t, e, n, o) {
    (e = t.querySelector(e)) && (e.style[n] = o);
  }

  function st(t, e, n) {
    e ? rt(t, n) : at(t);
  }

  function ut(t) {
    return !!(t.scrollHeight > t.clientHeight);
  }

  function lt(t) {
    var e = window.getComputedStyle(t),
        t = parseFloat(e.getPropertyValue("animation-duration") || "0"),
        e = parseFloat(e.getPropertyValue("transition-duration") || "0");
    return 0 < t || 0 < e;
  }

  function dt(t, e) {
    var e = 1 < arguments.length && void 0 !== e && e,
        n = H();
    wt(n) && (e && (n.style.transition = "none", n.style.width = "100%"), setTimeout(function () {
      n.style.transition = "width ".concat(t / 1e3, "s linear"), n.style.width = "0%";
    }, 10));
  }

  function pt() {
    return "undefined" == typeof window || "undefined" == typeof document;
  }

  function ft(t) {
    Dn.isVisible() && gt !== t.target.value && Dn.resetValidationMessage(), gt = t.target.value;
  }

  function mt(t, e) {
    t instanceof HTMLElement ? e.appendChild(t) : "object" === r(t) ? At(t, e) : t && _(e, t);
  }

  function ht(t, e) {
    var n,
        o,
        i,
        r,
        a = I(),
        c = D(),
        s = L(),
        u = q(),
        l = j();
    e.showConfirmButton || e.showDenyButton || e.showCancelButton || at(a), z(a, e, "actions"), Pt(s, "confirm", e), Pt(u, "deny", e), Pt(l, "cancel", e), n = s, o = u, i = l, (r = e).buttonsStyling ? (vt([n, o, i], $.styled), r.confirmButtonColor && (n.style.backgroundColor = r.confirmButtonColor), r.denyButtonColor && (o.style.backgroundColor = r.denyButtonColor), r.cancelButtonColor && (i.style.backgroundColor = r.cancelButtonColor)) : yt([n, o, i], $.styled), e.reverseButtons && (a.insertBefore(l, c), a.insertBefore(u, c), a.insertBefore(s, c)), _(c, e.loaderHtml), z(c, e, "loader");
  }

  var gt,
      vt = function vt(t, e) {
    ot(t, e, !0);
  },
      yt = function yt(t, e) {
    ot(t, e, !1);
  },
      bt = function bt(t, e) {
    for (var n = 0; n < t.childNodes.length; n++) {
      if (F(t.childNodes[n], e)) return t.childNodes[n];
    }
  },
      wt = function wt(t) {
    return !(!t || !(t.offsetWidth || t.offsetHeight || t.getClientRects().length));
  },
      Ct = '\n <div aria-labelledby="'.concat($.title, '" aria-describedby="').concat($.content, '" class="').concat($.popup, '" tabindex="-1">\n   <div class="').concat($.header, '">\n     <ul class="').concat($["progress-steps"], '"></ul>\n     <div class="').concat($.icon, " ").concat(X.error, '"></div>\n     <div class="').concat($.icon, " ").concat(X.question, '"></div>\n     <div class="').concat($.icon, " ").concat(X.warning, '"></div>\n     <div class="').concat($.icon, " ").concat(X.info, '"></div>\n     <div class="').concat($.icon, " ").concat(X.success, '"></div>\n     <img class="').concat($.image, '" />\n     <h2 class="').concat($.title, '" id="').concat($.title, '"></h2>\n     <button type="button" class="').concat($.close, '"></button>\n   </div>\n   <div class="').concat($.content, '">\n     <div id="').concat($.content, '" class="').concat($["html-container"], '"></div>\n     <input class="').concat($.input, '" />\n     <input type="file" class="').concat($.file, '" />\n     <div class="').concat($.range, '">\n       <input type="range" />\n       <output></output>\n     </div>\n     <select class="').concat($.select, '"></select>\n     <div class="').concat($.radio, '"></div>\n     <label for="').concat($.checkbox, '" class="').concat($.checkbox, '">\n       <input type="checkbox" />\n       <span class="').concat($.label, '"></span>\n     </label>\n     <textarea class="').concat($.textarea, '"></textarea>\n     <div class="').concat($["validation-message"], '" id="').concat($["validation-message"], '"></div>\n   </div>\n   <div class="').concat($.actions, '">\n     <div class="').concat($.loader, '"></div>\n     <button type="button" class="').concat($.confirm, '"></button>\n     <button type="button" class="').concat($.deny, '"></button>\n     <button type="button" class="').concat($.cancel, '"></button>\n   </div>\n   <div class="').concat($.footer, '"></div>\n   <div class="').concat($["timer-progress-bar-container"], '">\n     <div class="').concat($["timer-progress-bar"], '"></div>\n   </div>\n </div>\n').replace(/(^|\n)\s*/g, ""),
      kt = function kt(t) {
    var e,
        n,
        o,
        i,
        r,
        a = !!(i = k()) && (i.parentNode.removeChild(i), yt([document.documentElement, document.body], [$["no-backdrop"], $["toast-shown"], $["has-column"]]), !0);
    pt() ? K("SweetAlert2 requires document to initialize") : ((r = document.createElement("div")).className = $.container, a && vt(r, $["no-transition"]), _(r, Ct), (i = "string" == typeof (e = t.target) ? document.querySelector(e) : e).appendChild(r), a = t, (e = x()).setAttribute("role", a.toast ? "alert" : "dialog"), e.setAttribute("aria-live", a.toast ? "polite" : "assertive"), a.toast || e.setAttribute("aria-modal", "true"), r = i, "rtl" === window.getComputedStyle(r).direction && vt(k(), $.rtl), t = S(), a = bt(t, $.input), e = bt(t, $.file), n = t.querySelector(".".concat($.range, " input")), o = t.querySelector(".".concat($.range, " output")), i = bt(t, $.select), r = t.querySelector(".".concat($.checkbox, " input")), t = bt(t, $.textarea), a.oninput = ft, e.onchange = ft, i.onchange = ft, r.onchange = ft, t.oninput = ft, n.oninput = function (t) {
      ft(t), o.value = n.value;
    }, n.onchange = function (t) {
      ft(t), n.nextSibling.value = n.value;
    });
  },
      At = function At(t, e) {
    t.jquery ? xt(e, t) : _(e, t.toString());
  },
      xt = function xt(t, e) {
    if (t.textContent = "", 0 in e) for (var n = 0; (n in e); n++) {
      t.appendChild(e[n].cloneNode(!0));
    } else t.appendChild(e.cloneNode(!0));
  },
      Bt = function () {
    if (pt()) return !1;
    var t,
        e = document.createElement("div"),
        n = {
      WebkitAnimation: "webkitAnimationEnd",
      OAnimation: "oAnimationEnd oanimationend",
      animation: "animationend"
    };

    for (t in n) {
      if (Object.prototype.hasOwnProperty.call(n, t) && void 0 !== e.style[t]) return n[t];
    }

    return !1;
  }();

  function Pt(t, e, n) {
    st(t, n["show".concat(m(e), "Button")], "inline-block"), _(t, n["".concat(e, "ButtonText")]), t.setAttribute("aria-label", n["".concat(e, "ButtonAriaLabel")]), t.className = $[e], z(t, n, "".concat(e, "Button")), vt(t, n["".concat(e, "ButtonClass")]);
  }

  function St(t, e) {
    var n,
        o,
        i = k();
    i && (o = i, "string" == typeof (n = e.backdrop) ? o.style.background = n : n || vt([document.documentElement, document.body], $["no-backdrop"]), !e.backdrop && e.allowOutsideClick && W('"allowOutsideClick" parameter requires `backdrop` parameter to be set to `true`'), o = i, (n = e.position) in $ ? vt(o, $[n]) : (W('The "position" parameter is not valid, defaulting to "center"'), vt(o, $.center)), n = i, !(o = e.grow) || "string" != typeof o || (o = "grow-".concat(o)) in $ && vt(n, $[o]), z(i, e, "container"), (e = document.body.getAttribute("data-swal2-queue-step")) && (i.setAttribute("data-queue-step", e), document.body.removeAttribute("data-swal2-queue-step")));
  }

  function Et(t, e) {
    t.placeholder && !e.inputPlaceholder || (t.placeholder = e.inputPlaceholder);
  }

  function Ot(t, e, n) {
    var o, i;
    n.inputLabel && (t.id = $.input, o = document.createElement("label"), i = $["input-label"], o.setAttribute("for", t.id), o.className = i, o.innerText = n.inputLabel, e.insertAdjacentElement("beforebegin", o));
  }

  var Tt = {
    promise: new WeakMap(),
    innerParams: new WeakMap(),
    domCache: new WeakMap()
  },
      Lt = ["input", "file", "range", "select", "radio", "checkbox", "textarea"],
      qt = function qt(t) {
    if (!Mt[t.input]) return K('Unexpected type of input! Expected "text", "email", "password", "number", "tel", "select", "radio", "checkbox", "textarea", "file" or "url", got "'.concat(t.input, '"'));
    var e = It(t.input),
        n = Mt[t.input](e, t);
    rt(n), setTimeout(function () {
      nt(n);
    });
  },
      Dt = function Dt(t, e) {
    var n = et(S(), t);
    if (n) for (var o in !function (t) {
      for (var e = 0; e < t.attributes.length; e++) {
        var n = t.attributes[e].name;
        -1 === ["type", "value", "style"].indexOf(n) && t.removeAttribute(n);
      }
    }(n), e) {
      "range" === t && "placeholder" === o || n.setAttribute(o, e[o]);
    }
  },
      jt = function jt(t) {
    var e = It(t.input);
    t.customClass && vt(e, t.customClass.input);
  },
      It = function It(t) {
    t = $[t] || $.input;
    return bt(S(), t);
  },
      Mt = {};

  Mt.text = Mt.email = Mt.password = Mt.number = Mt.tel = Mt.url = function (t, e) {
    return "string" == typeof e.inputValue || "number" == typeof e.inputValue ? t.value = e.inputValue : w(e.inputValue) || W('Unexpected type of inputValue! Expected "string", "number" or "Promise", got "'.concat(r(e.inputValue), '"')), Ot(t, t, e), Et(t, e), t.type = e.input, t;
  }, Mt.file = function (t, e) {
    return Ot(t, t, e), Et(t, e), t;
  }, Mt.range = function (t, e) {
    var n = t.querySelector("input"),
        o = t.querySelector("output");
    return n.value = e.inputValue, n.type = e.input, o.value = e.inputValue, Ot(n, t, e), t;
  }, Mt.select = function (t, e) {
    var n;
    return t.textContent = "", e.inputPlaceholder && (n = document.createElement("option"), _(n, e.inputPlaceholder), n.value = "", n.disabled = !0, n.selected = !0, t.appendChild(n)), Ot(t, t, e), t;
  }, Mt.radio = function (t) {
    return t.textContent = "", t;
  }, Mt.checkbox = function (t, e) {
    var n = et(S(), "checkbox");
    n.value = 1, n.id = $.checkbox, n.checked = Boolean(e.inputValue);
    n = t.querySelector("span");
    return _(n, e.inputPlaceholder), t;
  }, Mt.textarea = function (e, t) {
    e.value = t.inputValue, Et(e, t), Ot(e, e, t);

    function n(t) {
      return parseInt(window.getComputedStyle(t).paddingLeft) + parseInt(window.getComputedStyle(t).paddingRight);
    }

    var o;
    return "MutationObserver" in window && (o = parseInt(window.getComputedStyle(x()).width), new MutationObserver(function () {
      var t = e.offsetWidth + n(x()) + n(S());
      x().style.width = o < t ? "".concat(t, "px") : null;
    }).observe(e, {
      attributes: !0,
      attributeFilter: ["style"]
    })), e;
  };

  function Vt(t, e) {
    var o,
        i,
        r,
        n = S().querySelector("#".concat($.content));
    e.html ? (mt(e.html, n), rt(n, "block")) : e.text ? (n.textContent = e.text, rt(n, "block")) : at(n), t = t, o = e, i = S(), t = Tt.innerParams.get(t), r = !t || o.input !== t.input, Lt.forEach(function (t) {
      var e = $[t],
          n = bt(i, e);
      Dt(t, o.inputAttributes), n.className = e, r && at(n);
    }), o.input && (r && qt(o), jt(o)), z(S(), e, "content");
  }

  function Ht() {
    return k() && k().getAttribute("data-queue-step");
  }

  function Rt(t, o) {
    var i = O();
    if (!o.progressSteps || 0 === o.progressSteps.length) return at(i), 0;
    rt(i), i.textContent = "";
    var r = parseInt(void 0 === o.currentProgressStep ? Ht() : o.currentProgressStep);
    r >= o.progressSteps.length && W("Invalid currentProgressStep parameter, it should be less than progressSteps.length (currentProgressStep like JS arrays starts from 0)"), o.progressSteps.forEach(function (t, e) {
      var n,
          t = (n = t, t = document.createElement("li"), vt(t, $["progress-step"]), _(t, n), t);
      i.appendChild(t), e === r && vt(t, $["active-progress-step"]), e !== o.progressSteps.length - 1 && (t = o, e = document.createElement("li"), vt(e, $["progress-step-line"]), t.progressStepsDistance && (e.style.width = t.progressStepsDistance), e = e, i.appendChild(e));
    });
  }

  function Nt(t, e) {
    var n = M();
    z(n, e, "header"), Rt(0, e), n = t, t = e, (n = Tt.innerParams.get(n)) && t.icon === n.icon && B() ? zt(B(), t) : (Ft(), t.icon && (-1 !== Object.keys(X).indexOf(t.icon) ? (n = A(".".concat($.icon, ".").concat(X[t.icon])), rt(n), Kt(n, t), zt(n, t), vt(n, t.showClass.icon)) : K('Unknown icon! Expected "success", "error", "warning", "info" or "question", got "'.concat(t.icon, '"')))), function (t) {
      var e = E();
      if (!t.imageUrl) return at(e);
      rt(e, ""), e.setAttribute("src", t.imageUrl), e.setAttribute("alt", t.imageAlt), it(e, "width", t.imageWidth), it(e, "height", t.imageHeight), e.className = $.image, z(e, t, "image");
    }(e), n = e, t = P(), st(t, n.title || n.titleText), n.title && mt(n.title, t), n.titleText && (t.innerText = n.titleText), z(t, n, "title"), n = e, e = R(), _(e, n.closeButtonHtml), z(e, n, "closeButton"), st(e, n.showCloseButton), e.setAttribute("aria-label", n.closeButtonAriaLabel);
  }

  function Ut(t, e) {
    var n, o;
    o = e, n = x(), it(n, "width", o.width), it(n, "padding", o.padding), o.background && (n.style.background = o.background), Jt(n, o), St(0, e), Nt(t, e), Vt(t, e), ht(0, e), o = e, t = V(), st(t, o.footer), o.footer && mt(o.footer, t), z(t, o, "footer"), "function" == typeof e.didRender ? e.didRender(x()) : "function" == typeof e.onRender && e.onRender(x());
  }

  function _t() {
    return L() && L().click();
  }

  var Ft = function Ft() {
    for (var t = n(), e = 0; e < t.length; e++) {
      at(t[e]);
    }
  },
      zt = function zt(t, e) {
    Yt(t, e), Wt(), z(t, e, "icon");
  },
      Wt = function Wt() {
    for (var t = x(), e = window.getComputedStyle(t).getPropertyValue("background-color"), n = t.querySelectorAll("[class^=swal2-success-circular-line], .swal2-success-fix"), o = 0; o < n.length; o++) {
      n[o].style.backgroundColor = e;
    }
  },
      Kt = function Kt(t, e) {
    t.textContent = "", e.iconHtml ? _(t, Zt(e.iconHtml)) : "success" === e.icon ? _(t, '\n      <div class="swal2-success-circular-line-left"></div>\n      <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>\n      <div class="swal2-success-ring"></div> <div class="swal2-success-fix"></div>\n      <div class="swal2-success-circular-line-right"></div>\n    ') : "error" === e.icon ? _(t, '\n      <span class="swal2-x-mark">\n        <span class="swal2-x-mark-line-left"></span>\n        <span class="swal2-x-mark-line-right"></span>\n      </span>\n    ') : _(t, Zt({
      question: "?",
      warning: "!",
      info: "i"
    }[e.icon]));
  },
      Yt = function Yt(t, e) {
    if (e.iconColor) {
      t.style.color = e.iconColor, t.style.borderColor = e.iconColor;

      for (var n = 0, o = [".swal2-success-line-tip", ".swal2-success-line-long", ".swal2-x-mark-line-left", ".swal2-x-mark-line-right"]; n < o.length; n++) {
        ct(t, o[n], "backgroundColor", e.iconColor);
      }

      ct(t, ".swal2-success-ring", "borderColor", e.iconColor);
    }
  },
      Zt = function Zt(t) {
    return '<div class="'.concat($["icon-content"], '">').concat(t, "</div>");
  },
      Qt = [],
      Jt = function Jt(t, e) {
    t.className = "".concat($.popup, " ").concat(wt(t) ? e.showClass.popup : ""), e.toast ? (vt([document.documentElement, document.body], $["toast-shown"]), vt(t, $.toast)) : vt(t, $.modal), z(t, e, "popup"), "string" == typeof e.customClass && vt(t, e.customClass), e.icon && vt(t, $["icon-".concat(e.icon)]);
  };

  function $t(t) {
    var e = x();
    e || Dn.fire(), e = x();
    var n = I(),
        o = D();
    !t && wt(L()) && (t = L()), rt(n), t && (at(t), o.setAttribute("data-button-to-replace", t.className)), o.parentNode.insertBefore(o, t), vt([e, n], $.loading), rt(o), e.setAttribute("data-loading", !0), e.setAttribute("aria-busy", !0), e.focus();
  }

  function Xt() {
    return new Promise(function (t) {
      var e = window.scrollX,
          n = window.scrollY;
      ie.restoreFocusTimeout = setTimeout(function () {
        ie.previousActiveElement && ie.previousActiveElement.focus ? (ie.previousActiveElement.focus(), ie.previousActiveElement = null) : document.body && document.body.focus(), t();
      }, 100), void 0 !== e && void 0 !== n && window.scrollTo(e, n);
    });
  }

  function Gt() {
    if (ie.timeout) return function () {
      var t = H(),
          e = parseInt(window.getComputedStyle(t).width);
      t.style.removeProperty("transition"), t.style.width = "100%";
      var n = parseInt(window.getComputedStyle(t).width),
          n = parseInt(e / n * 100);
      t.style.removeProperty("transition"), t.style.width = "".concat(n, "%");
    }(), ie.timeout.stop();
  }

  function te() {
    if (ie.timeout) {
      var t = ie.timeout.start();
      return dt(t), t;
    }
  }

  function ee(t) {
    return Object.prototype.hasOwnProperty.call(re, t);
  }

  function ne(t) {
    return ce[t];
  }

  function oe(t) {
    for (var e in t) {
      ee(o = e) || W('Unknown parameter "'.concat(o, '"')), t.toast && (n = e, -1 !== se.indexOf(n) && W('The parameter "'.concat(n, '" is incompatible with toasts'))), ne(n = e) && v(n, ne(n));
    }

    var n, o;
  }

  var ie = {},
      re = {
    title: "",
    titleText: "",
    text: "",
    html: "",
    footer: "",
    icon: void 0,
    iconColor: void 0,
    iconHtml: void 0,
    template: void 0,
    toast: !1,
    animation: !0,
    showClass: {
      popup: "swal2-show",
      backdrop: "swal2-backdrop-show",
      icon: "swal2-icon-show"
    },
    hideClass: {
      popup: "swal2-hide",
      backdrop: "swal2-backdrop-hide",
      icon: "swal2-icon-hide"
    },
    customClass: void 0,
    target: "body",
    backdrop: !0,
    heightAuto: !0,
    allowOutsideClick: !0,
    allowEscapeKey: !0,
    allowEnterKey: !0,
    stopKeydownPropagation: !0,
    keydownListenerCapture: !1,
    showConfirmButton: !0,
    showDenyButton: !1,
    showCancelButton: !1,
    preConfirm: void 0,
    preDeny: void 0,
    confirmButtonText: "OK",
    confirmButtonAriaLabel: "",
    confirmButtonColor: void 0,
    denyButtonText: "No",
    denyButtonAriaLabel: "",
    denyButtonColor: void 0,
    cancelButtonText: "Cancel",
    cancelButtonAriaLabel: "",
    cancelButtonColor: void 0,
    buttonsStyling: !0,
    reverseButtons: !1,
    focusConfirm: !0,
    focusDeny: !1,
    focusCancel: !1,
    showCloseButton: !1,
    closeButtonHtml: "&times;",
    closeButtonAriaLabel: "Close this dialog",
    loaderHtml: "",
    showLoaderOnConfirm: !1,
    imageUrl: void 0,
    imageWidth: void 0,
    imageHeight: void 0,
    imageAlt: "",
    timer: void 0,
    timerProgressBar: !1,
    width: void 0,
    padding: void 0,
    background: void 0,
    input: void 0,
    inputPlaceholder: "",
    inputLabel: "",
    inputValue: "",
    inputOptions: {},
    inputAutoTrim: !0,
    inputAttributes: {},
    inputValidator: void 0,
    returnInputValueOnDeny: !1,
    validationMessage: void 0,
    grow: !1,
    position: "center",
    progressSteps: [],
    currentProgressStep: void 0,
    progressStepsDistance: void 0,
    onBeforeOpen: void 0,
    onOpen: void 0,
    willOpen: void 0,
    didOpen: void 0,
    onRender: void 0,
    didRender: void 0,
    onClose: void 0,
    onAfterClose: void 0,
    willClose: void 0,
    didClose: void 0,
    onDestroy: void 0,
    didDestroy: void 0,
    scrollbarPadding: !0
  },
      ae = ["allowEscapeKey", "allowOutsideClick", "background", "buttonsStyling", "cancelButtonAriaLabel", "cancelButtonColor", "cancelButtonText", "closeButtonAriaLabel", "closeButtonHtml", "confirmButtonAriaLabel", "confirmButtonColor", "confirmButtonText", "currentProgressStep", "customClass", "denyButtonAriaLabel", "denyButtonColor", "denyButtonText", "didClose", "didDestroy", "footer", "hideClass", "html", "icon", "iconColor", "imageAlt", "imageHeight", "imageUrl", "imageWidth", "onAfterClose", "onClose", "onDestroy", "progressSteps", "reverseButtons", "showCancelButton", "showCloseButton", "showConfirmButton", "showDenyButton", "text", "title", "titleText", "willClose"],
      ce = {
    animation: 'showClass" and "hideClass',
    onBeforeOpen: "willOpen",
    onOpen: "didOpen",
    onRender: "didRender",
    onClose: "willClose",
    onAfterClose: "didClose",
    onDestroy: "didDestroy"
  },
      se = ["allowOutsideClick", "allowEnterKey", "backdrop", "focusConfirm", "focusDeny", "focusCancel", "heightAuto", "keydownListenerCapture"],
      ue = Object.freeze({
    isValidParameter: ee,
    isUpdatableParameter: function isUpdatableParameter(t) {
      return -1 !== ae.indexOf(t);
    },
    isDeprecatedParameter: ne,
    argsToParams: function argsToParams(n) {
      var o = {};
      return "object" !== r(n[0]) || C(n[0]) ? ["title", "html", "icon"].forEach(function (t, e) {
        e = n[e];
        "string" == typeof e || C(e) ? o[t] = e : void 0 !== e && K("Unexpected type of ".concat(t, '! Expected "string" or "Element", got ').concat(r(e)));
      }) : s(o, n[0]), o;
    },
    isVisible: function isVisible() {
      return wt(x());
    },
    clickConfirm: _t,
    clickDeny: function clickDeny() {
      return q() && q().click();
    },
    clickCancel: function clickCancel() {
      return j() && j().click();
    },
    getContainer: k,
    getPopup: x,
    getTitle: P,
    getContent: S,
    getHtmlContainer: function getHtmlContainer() {
      return t($["html-container"]);
    },
    getImage: E,
    getIcon: B,
    getIcons: n,
    getInputLabel: function getInputLabel() {
      return t($["input-label"]);
    },
    getCloseButton: R,
    getActions: I,
    getConfirmButton: L,
    getDenyButton: q,
    getCancelButton: j,
    getLoader: D,
    getHeader: M,
    getFooter: V,
    getTimerProgressBar: H,
    getFocusableElements: N,
    getValidationMessage: T,
    isLoading: function isLoading() {
      return x().hasAttribute("data-loading");
    },
    fire: function fire() {
      for (var t = arguments.length, e = new Array(t), n = 0; n < t; n++) {
        e[n] = arguments[n];
      }

      return i(this, e);
    },
    mixin: function mixin(r) {
      return function (t) {
        !function (t, e) {
          if ("function" != typeof e && null !== e) throw new TypeError("Super expression must either be null or a function");
          t.prototype = Object.create(e && e.prototype, {
            constructor: {
              value: t,
              writable: !0,
              configurable: !0
            }
          }), e && l(t, e);
        }(i, t);
        var n,
            o,
            e = (n = i, o = d(), function () {
          var t,
              e = u(n);
          return p(this, o ? (t = u(this).constructor, Reflect.construct(e, arguments, t)) : e.apply(this, arguments));
        });

        function i() {
          return a(this, i), e.apply(this, arguments);
        }

        return c(i, [{
          key: "_main",
          value: function value(t) {
            return f(u(i.prototype), "_main", this).call(this, s({}, r, t));
          }
        }]), i;
      }(this);
    },
    queue: function queue(t) {
      var r = this;
      Qt = t;

      function a(t, e) {
        Qt = [], t(e);
      }

      var c = [];
      return new Promise(function (i) {
        !function e(n, o) {
          n < Qt.length ? (document.body.setAttribute("data-swal2-queue-step", n), r.fire(Qt[n]).then(function (t) {
            void 0 !== t.value ? (c.push(t.value), e(n + 1, o)) : a(i, {
              dismiss: t.dismiss
            });
          })) : a(i, {
            value: c
          });
        }(0);
      });
    },
    getQueueStep: Ht,
    insertQueueStep: function insertQueueStep(t, e) {
      return e && e < Qt.length ? Qt.splice(e, 0, t) : Qt.push(t);
    },
    deleteQueueStep: function deleteQueueStep(t) {
      void 0 !== Qt[t] && Qt.splice(t, 1);
    },
    showLoading: $t,
    enableLoading: $t,
    getTimerLeft: function getTimerLeft() {
      return ie.timeout && ie.timeout.getTimerLeft();
    },
    stopTimer: Gt,
    resumeTimer: te,
    toggleTimer: function toggleTimer() {
      var t = ie.timeout;
      return t && (t.running ? Gt : te)();
    },
    increaseTimer: function increaseTimer(t) {
      if (ie.timeout) {
        t = ie.timeout.increase(t);
        return dt(t, !0), t;
      }
    },
    isTimerRunning: function isTimerRunning() {
      return ie.timeout && ie.timeout.isRunning();
    }
  });

  function le() {
    var t, e;
    Tt.innerParams.get(this) && (t = Tt.domCache.get(this), at(t.loader), (e = t.popup.getElementsByClassName(t.loader.getAttribute("data-button-to-replace"))).length ? rt(e[0], "inline-block") : wt(L()) || wt(q()) || wt(j()) || at(t.actions), yt([t.popup, t.actions], $.loading), t.popup.removeAttribute("aria-busy"), t.popup.removeAttribute("data-loading"), t.confirmButton.disabled = !1, t.denyButton.disabled = !1, t.cancelButton.disabled = !1);
  }

  function de() {
    null === tt.previousBodyPadding && document.body.scrollHeight > window.innerHeight && (tt.previousBodyPadding = parseInt(window.getComputedStyle(document.body).getPropertyValue("padding-right")), document.body.style.paddingRight = "".concat(tt.previousBodyPadding + function () {
      var t = document.createElement("div");
      t.className = $["scrollbar-measure"], document.body.appendChild(t);
      var e = t.getBoundingClientRect().width - t.clientWidth;
      return document.body.removeChild(t), e;
    }(), "px"));
  }

  function pe() {
    return !!window.MSInputMethodContext && !!document.documentMode;
  }

  function fe() {
    var t = k(),
        e = x();
    t.style.removeProperty("align-items"), e.offsetTop < 0 && (t.style.alignItems = "flex-start");
  }

  var me = function me() {
    navigator.userAgent.match(/(CriOS|FxiOS|EdgiOS|YaBrowser|UCBrowser)/i) || x().scrollHeight > window.innerHeight - 44 && (k().style.paddingBottom = "".concat(44, "px"));
  },
      he = function he() {
    var e,
        t = k();
    t.ontouchstart = function (t) {
      e = ge(t);
    }, t.ontouchmove = function (t) {
      e && (t.preventDefault(), t.stopPropagation());
    };
  },
      ge = function ge(t) {
    var e = t.target,
        n = k();
    return !ve(t) && !ye(t) && (e === n || !(ut(n) || "INPUT" === e.tagName || ut(S()) && S().contains(e)));
  },
      ve = function ve(t) {
    return t.touches && t.touches.length && "stylus" === t.touches[0].touchType;
  },
      ye = function ye(t) {
    return t.touches && 1 < t.touches.length;
  },
      be = {
    swalPromiseResolve: new WeakMap()
  };

  function we(t, e, n, o) {
    n ? Pe(t, o) : (Xt().then(function () {
      return Pe(t, o);
    }), ie.keydownTarget.removeEventListener("keydown", ie.keydownHandler, {
      capture: ie.keydownListenerCapture
    }), ie.keydownHandlerAdded = !1), e.parentNode && !document.body.getAttribute("data-swal2-queue-step") && e.parentNode.removeChild(e), U() && (null !== tt.previousBodyPadding && (document.body.style.paddingRight = "".concat(tt.previousBodyPadding, "px"), tt.previousBodyPadding = null), F(document.body, $.iosfix) && (e = parseInt(document.body.style.top, 10), yt(document.body, $.iosfix), document.body.style.top = "", document.body.scrollTop = -1 * e), "undefined" != typeof window && pe() && window.removeEventListener("resize", fe), g(document.body.children).forEach(function (t) {
      t.hasAttribute("data-previous-aria-hidden") ? (t.setAttribute("aria-hidden", t.getAttribute("data-previous-aria-hidden")), t.removeAttribute("data-previous-aria-hidden")) : t.removeAttribute("aria-hidden");
    })), yt([document.documentElement, document.body], [$.shown, $["height-auto"], $["no-backdrop"], $["toast-shown"], $["toast-column"]]);
  }

  function Ce(t) {
    var e,
        n,
        o,
        i = x();
    i && (t = ke(t), (e = Tt.innerParams.get(this)) && !F(i, e.hideClass.popup) && (n = be.swalPromiseResolve.get(this), yt(i, e.showClass.popup), vt(i, e.hideClass.popup), o = k(), yt(o, e.showClass.backdrop), vt(o, e.hideClass.backdrop), Ae(this, i, e), n(t)));
  }

  function ke(t) {
    return void 0 === t ? {
      isConfirmed: !1,
      isDenied: !1,
      isDismissed: !0
    } : s({
      isConfirmed: !1,
      isDenied: !1,
      isDismissed: !1
    }, t);
  }

  function Ae(t, e, n) {
    var o = k(),
        i = Bt && lt(e),
        r = n.onClose,
        a = n.onAfterClose,
        c = n.willClose,
        n = n.didClose;
    xe(e, c, r), i ? Be(t, e, o, n || a) : we(t, o, G(), n || a);
  }

  var xe = function xe(t, e, n) {
    null !== e && "function" == typeof e ? e(t) : null !== n && "function" == typeof n && n(t);
  },
      Be = function Be(t, e, n, o) {
    ie.swalCloseEventFinishedCallback = we.bind(null, t, n, G(), o), e.addEventListener(Bt, function (t) {
      t.target === e && (ie.swalCloseEventFinishedCallback(), delete ie.swalCloseEventFinishedCallback);
    });
  },
      Pe = function Pe(t, e) {
    setTimeout(function () {
      "function" == typeof e && e(), t._destroy();
    });
  };

  function Se(t, e, n) {
    var o = Tt.domCache.get(t);
    e.forEach(function (t) {
      o[t].disabled = n;
    });
  }

  function Ee(t, e) {
    if (!t) return !1;
    if ("radio" === t.type) for (var n = t.parentNode.parentNode.querySelectorAll("input"), o = 0; o < n.length; o++) {
      n[o].disabled = e;
    } else t.disabled = e;
  }

  var Oe = function () {
    function n(t, e) {
      a(this, n), this.callback = t, this.remaining = e, this.running = !1, this.start();
    }

    return c(n, [{
      key: "start",
      value: function value() {
        return this.running || (this.running = !0, this.started = new Date(), this.id = setTimeout(this.callback, this.remaining)), this.remaining;
      }
    }, {
      key: "stop",
      value: function value() {
        return this.running && (this.running = !1, clearTimeout(this.id), this.remaining -= new Date() - this.started), this.remaining;
      }
    }, {
      key: "increase",
      value: function value(t) {
        var e = this.running;
        return e && this.stop(), this.remaining += t, e && this.start(), this.remaining;
      }
    }, {
      key: "getTimerLeft",
      value: function value() {
        return this.running && (this.stop(), this.start()), this.remaining;
      }
    }, {
      key: "isRunning",
      value: function value() {
        return this.running;
      }
    }]), n;
  }(),
      Te = {
    email: function email(t, e) {
      return /^[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9-]{2,24}$/.test(t) ? Promise.resolve() : Promise.resolve(e || "Invalid email address");
    },
    url: function url(t, e) {
      return /^https?:\/\/(www\.)?[-a-zA-Z0-9@:%._+~#=]{1,256}\.[a-z]{2,63}\b([-a-zA-Z0-9@:%_+.~#?&/=]*)$/.test(t) ? Promise.resolve() : Promise.resolve(e || "Invalid URL");
    }
  };

  function Le(t) {
    var e, n;
    (e = t).inputValidator || Object.keys(Te).forEach(function (t) {
      e.input === t && (e.inputValidator = Te[t]);
    }), t.showLoaderOnConfirm && !t.preConfirm && W("showLoaderOnConfirm is set to true, but preConfirm is not defined.\nshowLoaderOnConfirm should be used together with preConfirm, see usage example:\nhttps://sweetalert2.github.io/#ajax-request"), t.animation = Z(t.animation), (n = t).target && ("string" != typeof n.target || document.querySelector(n.target)) && ("string" == typeof n.target || n.target.appendChild) || (W('Target parameter is not valid, defaulting to "body"'), n.target = "body"), "string" == typeof t.title && (t.title = t.title.split("\n").join("<br />")), kt(t);
  }

  function qe(t) {
    var e = k(),
        n = x();
    "function" == typeof t.willOpen ? t.willOpen(n) : "function" == typeof t.onBeforeOpen && t.onBeforeOpen(n);
    var o = window.getComputedStyle(document.body).overflowY;
    Ze(e, n, t), setTimeout(function () {
      Ke(e, n);
    }, 10), U() && (Ye(e, t.scrollbarPadding, o), g(document.body.children).forEach(function (t) {
      t === k() || function (t, e) {
        if ("function" == typeof t.contains) return t.contains(e);
      }(t, k()) || (t.hasAttribute("aria-hidden") && t.setAttribute("data-previous-aria-hidden", t.getAttribute("aria-hidden")), t.setAttribute("aria-hidden", "true"));
    })), G() || ie.previousActiveElement || (ie.previousActiveElement = document.activeElement), We(n, t), yt(e, $["no-transition"]);
  }

  function De(t) {
    var e = x();
    t.target === e && (t = k(), e.removeEventListener(Bt, De), t.style.overflowY = "auto");
  }

  function je(t, e) {
    t.closePopup({
      isConfirmed: !0,
      value: e
    });
  }

  function Ie(t, e, n) {
    var o = N();
    if (o.length) return (e += n) === o.length ? e = 0 : -1 === e && (e = o.length - 1), o[e].focus();
    x().focus();
  }

  var Me = ["swal-title", "swal-html", "swal-footer"],
      Ve = function Ve(t) {
    var n = {};
    return g(t.querySelectorAll("swal-param")).forEach(function (t) {
      ze(t, ["name", "value"]);
      var e = t.getAttribute("name"),
          t = t.getAttribute("value");
      "boolean" == typeof re[e] && "false" === t && (t = !1), "object" === r(re[e]) && (t = JSON.parse(t)), n[e] = t;
    }), n;
  },
      He = function He(t) {
    var i = {};
    return g(t.querySelectorAll("swal-button")).forEach(function (t) {
      ze(t, ["type", "color", "aria-label"]);
      var e = t.getAttribute("type"),
          n = t.getAttribute("color"),
          o = t.getAttribute("aria-label") || "";
      i["".concat(e, "ButtonText")] = t.innerHTML, i["show".concat(m(e), "Button")] = !0, n && (i["".concat(e, "ButtonColor")] = n), i["".concat(e, "ButtonAriaLabel")] = o;
    }), i;
  },
      Re = function Re(t) {
    var e = {},
        t = t.querySelector("swal-image");
    return t && (ze(t, ["src", "width", "height", "alt"]), e.imageUrl = t.getAttribute("src"), e.imageWidth = t.getAttribute("width"), e.imageHeight = t.getAttribute("height"), e.imageAlt = t.getAttribute("alt") || ""), e;
  },
      Ne = function Ne(t) {
    var e = {},
        t = t.querySelector("swal-icon");
    return t && (ze(t, ["type", "color"]), e.icon = t.getAttribute("type"), e.iconColor = t.getAttribute("color"), e.iconHtml = t.innerHTML), e;
  },
      Ue = function Ue(t) {
    var n = {},
        e = t.querySelector("swal-input");
    e && (ze(e, ["type", "label", "placeholder", "value"]), n.input = e.getAttribute("type") || "text", n.inputLabel = e.getAttribute("label") || "", n.inputPlaceholder = e.getAttribute("placeholder") || "", n.inputValue = e.getAttribute("value") || "");
    t = t.querySelectorAll("swal-input-option");
    return t.length && (n.inputOptions = {}, g(t).forEach(function (t) {
      ze(t, ["value"]);
      var e = t.getAttribute("value"),
          t = t.innerHTML;
      n.inputOptions[e] = t;
    })), n;
  },
      _e = function _e(t, e) {
    var n,
        o = {};

    for (n in e) {
      var i = e[n],
          r = t.querySelector(i);
      r && (ze(r, []), o[i.replace(/^swal-/, "")] = r.innerHTML);
    }

    return o;
  },
      Fe = function Fe(t) {
    var e = Me.concat(["swal-param", "swal-button", "swal-image", "swal-icon", "swal-input", "swal-input-option"]);
    g(t.querySelectorAll("*")).forEach(function (t) {
      t = t.tagName.toLowerCase();
      -1 === e.indexOf(t) && W("Unrecognized element <".concat(t, ">"));
    });
  },
      ze = function ze(e, n) {
    g(e.attributes).forEach(function (t) {
      -1 === n.indexOf(t.name) && W(['Unrecognized attribute "'.concat(t.name, '" on <').concat(e.tagName.toLowerCase(), ">."), "".concat(n.length ? "Allowed attributes are: ".concat(n.join(", ")) : "To set the value, use HTML within the element.")]);
    });
  },
      We = function We(t, e) {
    "function" == typeof e.didOpen ? setTimeout(function () {
      return e.didOpen(t);
    }) : "function" == typeof e.onOpen && setTimeout(function () {
      return e.onOpen(t);
    });
  },
      Ke = function Ke(t, e) {
    Bt && lt(e) ? (t.style.overflowY = "hidden", e.addEventListener(Bt, De)) : t.style.overflowY = "auto";
  },
      Ye = function Ye(t, e, n) {
    var o;
    (/iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream || "MacIntel" === navigator.platform && 1 < navigator.maxTouchPoints) && !F(document.body, $.iosfix) && (o = document.body.scrollTop, document.body.style.top = "".concat(-1 * o, "px"), vt(document.body, $.iosfix), he(), me()), "undefined" != typeof window && pe() && (fe(), window.addEventListener("resize", fe)), e && "hidden" !== n && de(), setTimeout(function () {
      t.scrollTop = 0;
    });
  },
      Ze = function Ze(t, e, n) {
    vt(t, n.showClass.backdrop), e.style.setProperty("opacity", "0", "important"), rt(e), setTimeout(function () {
      vt(e, n.showClass.popup), e.style.removeProperty("opacity");
    }, 10), vt([document.documentElement, document.body], $.shown), n.heightAuto && n.backdrop && !n.toast && vt([document.documentElement, document.body], $["height-auto"]);
  },
      Qe = function Qe(t) {
    return t.checked ? 1 : 0;
  },
      Je = function Je(t) {
    return t.checked ? t.value : null;
  },
      $e = function $e(t) {
    return t.files.length ? null !== t.getAttribute("multiple") ? t.files : t.files[0] : null;
  },
      Xe = function Xe(e, n) {
    function o(t) {
      return tn[n.input](i, en(t), n);
    }

    var i = S();
    y(n.inputOptions) || w(n.inputOptions) ? ($t(), b(n.inputOptions).then(function (t) {
      e.hideLoading(), o(t);
    })) : "object" === r(n.inputOptions) ? o(n.inputOptions) : K("Unexpected type of inputOptions! Expected object, Map or Promise, got ".concat(r(n.inputOptions)));
  },
      Ge = function Ge(e, n) {
    var o = e.getInput();
    at(o), b(n.inputValue).then(function (t) {
      o.value = "number" === n.input ? parseFloat(t) || 0 : "".concat(t), rt(o), o.focus(), e.hideLoading();
    })["catch"](function (t) {
      K("Error in inputValue promise: ".concat(t)), o.value = "", rt(o), o.focus(), e.hideLoading();
    });
  },
      tn = {
    select: function select(t, e, i) {
      function o(t, e, n) {
        var o = document.createElement("option");
        o.value = n, _(o, e), o.selected = nn(n, i.inputValue), t.appendChild(o);
      }

      var r = bt(t, $.select);
      e.forEach(function (t) {
        var e,
            n = t[0],
            t = t[1];
        Array.isArray(t) ? ((e = document.createElement("optgroup")).label = n, e.disabled = !1, r.appendChild(e), t.forEach(function (t) {
          return o(e, t[1], t[0]);
        })) : o(r, t, n);
      }), r.focus();
    },
    radio: function radio(t, e, i) {
      var r = bt(t, $.radio);
      e.forEach(function (t) {
        var e = t[0],
            n = t[1],
            o = document.createElement("input"),
            t = document.createElement("label");
        o.type = "radio", o.name = $.radio, o.value = e, nn(e, i.inputValue) && (o.checked = !0);
        e = document.createElement("span");
        _(e, n), e.className = $.label, t.appendChild(o), t.appendChild(e), r.appendChild(t);
      });
      e = r.querySelectorAll("input");
      e.length && e[0].focus();
    }
  },
      en = function n(o) {
    var i = [];
    return "undefined" != typeof Map && o instanceof Map ? o.forEach(function (t, e) {
      "object" === r(t) && (t = n(t)), i.push([e, t]);
    }) : Object.keys(o).forEach(function (t) {
      var e = o[t];
      "object" === r(e) && (e = n(e)), i.push([t, e]);
    }), i;
  },
      nn = function nn(t, e) {
    return e && e.toString() === t.toString();
  },
      on = function on(t, e, n) {
    var o = function (t, e) {
      var n = t.getInput();
      if (!n) return null;

      switch (e.input) {
        case "checkbox":
          return Qe(n);

        case "radio":
          return Je(n);

        case "file":
          return $e(n);

        default:
          return e.inputAutoTrim ? n.value.trim() : n.value;
      }
    }(t, e);

    e.inputValidator ? rn(t, e, o) : t.getInput().checkValidity() ? ("deny" === n ? an : cn)(t, e, o) : (t.enableButtons(), t.showValidationMessage(e.validationMessage));
  },
      rn = function rn(e, n, o) {
    e.disableInput(), Promise.resolve().then(function () {
      return b(n.inputValidator(o, n.validationMessage));
    }).then(function (t) {
      e.enableButtons(), e.enableInput(), t ? e.showValidationMessage(t) : cn(e, n, o);
    });
  },
      an = function an(e, t, n) {
    t.preDeny ? Promise.resolve().then(function () {
      return b(t.preDeny(n, t.validationMessage));
    }).then(function (t) {
      !1 === t ? e.hideLoading() : e.closePopup({
        isDenied: !0,
        value: void 0 === t ? n : t
      });
    }) : e.closePopup({
      isDenied: !0,
      value: n
    });
  },
      cn = function cn(e, t, n) {
    t.showLoaderOnConfirm && $t(), t.preConfirm ? (e.resetValidationMessage(), Promise.resolve().then(function () {
      return b(t.preConfirm(n, t.validationMessage));
    }).then(function (t) {
      wt(T()) || !1 === t ? e.hideLoading() : je(e, void 0 === t ? n : t);
    })) : je(e, n);
  },
      sn = ["ArrowRight", "ArrowDown", "Right", "Down"],
      un = ["ArrowLeft", "ArrowUp", "Left", "Up"],
      ln = ["Escape", "Esc"],
      dn = function dn(t, e, n) {
    var o = Tt.innerParams.get(t);
    o.stopKeydownPropagation && e.stopPropagation(), "Enter" === e.key ? pn(t, e, o) : "Tab" === e.key ? fn(e, o) : -1 !== [].concat(sn, un).indexOf(e.key) ? mn(e.key) : -1 !== ln.indexOf(e.key) && hn(e, o, n);
  },
      pn = function pn(t, e, n) {
    e.isComposing || e.target && t.getInput() && e.target.outerHTML === t.getInput().outerHTML && -1 === ["textarea", "file"].indexOf(n.input) && (_t(), e.preventDefault());
  },
      fn = function fn(t) {
    for (var e = t.target, n = N(), o = -1, i = 0; i < n.length; i++) {
      if (e === n[i]) {
        o = i;
        break;
      }
    }

    t.shiftKey ? Ie(0, o, -1) : Ie(0, o, 1), t.stopPropagation(), t.preventDefault();
  },
      mn = function mn(t) {
    -1 !== [L(), q(), j()].indexOf(document.activeElement) && (t = -1 !== sn.indexOf(t) ? "nextElementSibling" : "previousElementSibling", (t = document.activeElement[t]) && t.focus());
  },
      hn = function hn(t, e, n) {
    Z(e.allowEscapeKey) && (t.preventDefault(), n(Q.esc));
  },
      gn = function gn(e, t, n) {
    t.popup.onclick = function () {
      var t = Tt.innerParams.get(e);
      t.showConfirmButton || t.showDenyButton || t.showCancelButton || t.showCloseButton || t.input || n(Q.close);
    };
  },
      vn = !1,
      yn = function yn(e) {
    e.popup.onmousedown = function () {
      e.container.onmouseup = function (t) {
        e.container.onmouseup = void 0, t.target === e.container && (vn = !0);
      };
    };
  },
      bn = function bn(e) {
    e.container.onmousedown = function () {
      e.popup.onmouseup = function (t) {
        e.popup.onmouseup = void 0, t.target !== e.popup && !e.popup.contains(t.target) || (vn = !0);
      };
    };
  },
      wn = function wn(n, o, i) {
    o.container.onclick = function (t) {
      var e = Tt.innerParams.get(n);
      vn ? vn = !1 : t.target === o.container && Z(e.allowOutsideClick) && i(Q.backdrop);
    };
  };

  function Cn(t) {
    var e = s({}, re.showClass, t.showClass),
        n = s({}, re.hideClass, t.hideClass),
        o = function (t) {
      t = "string" == typeof t.template ? document.querySelector(t.template) : t.template;
      if (!t) return {};
      t = t.content || t;
      return Fe(t), s(Ve(t), He(t), Re(t), Ne(t), Ue(t), _e(t, Me));
    }(t);

    return (o = s({}, re, o, t)).showClass = e, o.hideClass = n, !1 === t.animation && (o.showClass = {
      popup: "swal2-noanimation",
      backdrop: "swal2-noanimation"
    }, o.hideClass = {}), o;
  }

  function kn(a, c, s) {
    return new Promise(function (t) {
      function e(t) {
        a.closePopup({
          isDismissed: !0,
          dismiss: t
        });
      }

      var n, o, i, r;
      be.swalPromiseResolve.set(a, t), c.confirmButton.onclick = function () {
        return e = s, (t = a).disableButtons(), void (e.input ? on(t, e, "confirm") : cn(t, e, !0));
        var t, e;
      }, c.denyButton.onclick = function () {
        return e = s, (t = a).disableButtons(), void (e.returnInputValueOnDeny ? on(t, e, "deny") : an(t, e, !1));
        var t, e;
      }, c.cancelButton.onclick = function () {
        return t = e, a.disableButtons(), void t(Q.cancel);
        var t;
      }, c.closeButton.onclick = function () {
        return e(Q.close);
      }, n = a, r = c, t = e, Tt.innerParams.get(n).toast ? gn(n, r, t) : (yn(r), bn(r), wn(n, r, t)), o = a, r = s, i = e, (t = ie).keydownTarget && t.keydownHandlerAdded && (t.keydownTarget.removeEventListener("keydown", t.keydownHandler, {
        capture: t.keydownListenerCapture
      }), t.keydownHandlerAdded = !1), r.toast || (t.keydownHandler = function (t) {
        return dn(o, t, i);
      }, t.keydownTarget = r.keydownListenerCapture ? window : x(), t.keydownListenerCapture = r.keydownListenerCapture, t.keydownTarget.addEventListener("keydown", t.keydownHandler, {
        capture: t.keydownListenerCapture
      }), t.keydownHandlerAdded = !0), (s.toast && (s.input || s.footer || s.showCloseButton) ? vt : yt)(document.body, $["toast-column"]), r = a, "select" === (t = s).input || "radio" === t.input ? Xe(r, t) : -1 !== ["text", "email", "number", "tel", "textarea"].indexOf(t.input) && (y(t.inputValue) || w(t.inputValue)) && Ge(r, t), qe(s), xn(ie, s, e), Bn(c, s), setTimeout(function () {
        c.container.scrollTop = 0;
      });
    });
  }

  function An(t) {
    var e = {
      popup: x(),
      container: k(),
      content: S(),
      actions: I(),
      confirmButton: L(),
      denyButton: q(),
      cancelButton: j(),
      loader: D(),
      closeButton: R(),
      validationMessage: T(),
      progressSteps: O()
    };
    return Tt.domCache.set(t, e), e;
  }

  var xn = function xn(t, e, n) {
    var o = H();
    at(o), e.timer && (t.timeout = new Oe(function () {
      n("timer"), delete t.timeout;
    }, e.timer), e.timerProgressBar && (rt(o), setTimeout(function () {
      t.timeout.running && dt(e.timer);
    })));
  },
      Bn = function Bn(t, e) {
    if (!e.toast) return Z(e.allowEnterKey) ? void (Pn(t, e) || Ie(0, -1, 1)) : Sn();
  },
      Pn = function Pn(t, e) {
    return e.focusDeny && wt(t.denyButton) ? (t.denyButton.focus(), !0) : e.focusCancel && wt(t.cancelButton) ? (t.cancelButton.focus(), !0) : !(!e.focusConfirm || !wt(t.confirmButton)) && (t.confirmButton.focus(), !0);
  },
      Sn = function Sn() {
    document.activeElement && "function" == typeof document.activeElement.blur && document.activeElement.blur();
  };

  function En(t) {
    "function" == typeof t.didDestroy ? t.didDestroy() : "function" == typeof t.onDestroy && t.onDestroy();
  }

  function On(t) {
    delete t.params, delete ie.keydownHandler, delete ie.keydownTarget, Ln(Tt), Ln(be);
  }

  var Tn,
      Ln = function Ln(t) {
    for (var e in t) {
      t[e] = new WeakMap();
    }
  },
      J = Object.freeze({
    hideLoading: le,
    disableLoading: le,
    getInput: function getInput(t) {
      var e = Tt.innerParams.get(t || this);
      return (t = Tt.domCache.get(t || this)) ? et(t.content, e.input) : null;
    },
    close: Ce,
    closePopup: Ce,
    closeModal: Ce,
    closeToast: Ce,
    enableButtons: function enableButtons() {
      Se(this, ["confirmButton", "denyButton", "cancelButton"], !1);
    },
    disableButtons: function disableButtons() {
      Se(this, ["confirmButton", "denyButton", "cancelButton"], !0);
    },
    enableInput: function enableInput() {
      return Ee(this.getInput(), !1);
    },
    disableInput: function disableInput() {
      return Ee(this.getInput(), !0);
    },
    showValidationMessage: function showValidationMessage(t) {
      var e = Tt.domCache.get(this),
          n = Tt.innerParams.get(this);
      _(e.validationMessage, t), e.validationMessage.className = $["validation-message"], n.customClass && n.customClass.validationMessage && vt(e.validationMessage, n.customClass.validationMessage), rt(e.validationMessage), (e = this.getInput()) && (e.setAttribute("aria-invalid", !0), e.setAttribute("aria-describedBy", $["validation-message"]), nt(e), vt(e, $.inputerror));
    },
    resetValidationMessage: function resetValidationMessage() {
      var t = Tt.domCache.get(this);
      t.validationMessage && at(t.validationMessage), (t = this.getInput()) && (t.removeAttribute("aria-invalid"), t.removeAttribute("aria-describedBy"), yt(t, $.inputerror));
    },
    getProgressSteps: function getProgressSteps() {
      return Tt.domCache.get(this).progressSteps;
    },
    _main: function _main(t) {
      oe(t), ie.currentInstance && ie.currentInstance._destroy(), ie.currentInstance = this;
      var e = Cn(t);
      return Le(e), Object.freeze(e), ie.timeout && (ie.timeout.stop(), delete ie.timeout), clearTimeout(ie.restoreFocusTimeout), t = An(this), Ut(this, e), Tt.innerParams.set(this, e), kn(this, t, e);
    },
    update: function update(e) {
      var t = x(),
          n = Tt.innerParams.get(this);
      if (!t || F(t, n.hideClass.popup)) return W("You're trying to update the closed or closing popup, that won't work. Use the update() method in preConfirm parameter or show a new popup.");
      var o = {};
      Object.keys(e).forEach(function (t) {
        Dn.isUpdatableParameter(t) ? o[t] = e[t] : W('Invalid parameter to update: "'.concat(t, '". Updatable params are listed here: https://github.com/sweetalert2/sweetalert2/blob/master/src/utils/params.js\n\nIf you think this parameter should be updatable, request it here: https://github.com/sweetalert2/sweetalert2/issues/new?template=02_feature_request.md'));
      }), n = s({}, n, o), Ut(this, n), Tt.innerParams.set(this, n), Object.defineProperties(this, {
        params: {
          value: s({}, this.params, e),
          writable: !1,
          enumerable: !0
        }
      });
    },
    _destroy: function _destroy() {
      var t = Tt.domCache.get(this),
          e = Tt.innerParams.get(this);
      e && (t.popup && ie.swalCloseEventFinishedCallback && (ie.swalCloseEventFinishedCallback(), delete ie.swalCloseEventFinishedCallback), ie.deferDisposalTimer && (clearTimeout(ie.deferDisposalTimer), delete ie.deferDisposalTimer), En(e), On(this));
    }
  }),
      qn = function () {
    function i() {
      if (a(this, i), "undefined" != typeof window) {
        "undefined" == typeof Promise && K("This package requires a Promise library, please include a shim to enable it in this browser (See: https://github.com/sweetalert2/sweetalert2/wiki/Migration-from-SweetAlert-to-SweetAlert2#1-ie-support)"), Tn = this;

        for (var t = arguments.length, e = new Array(t), n = 0; n < t; n++) {
          e[n] = arguments[n];
        }

        var o = Object.freeze(this.constructor.argsToParams(e));
        Object.defineProperties(this, {
          params: {
            value: o,
            writable: !1,
            enumerable: !0,
            configurable: !0
          }
        });
        o = this._main(this.params);
        Tt.promise.set(this, o);
      }
    }

    return c(i, [{
      key: "then",
      value: function value(t) {
        return Tt.promise.get(this).then(t);
      }
    }, {
      key: "finally",
      value: function value(t) {
        return Tt.promise.get(this)["finally"](t);
      }
    }]), i;
  }();

  s(qn.prototype, J), s(qn, ue), Object.keys(J).forEach(function (t) {
    qn[t] = function () {
      if (Tn) return Tn[t].apply(Tn, arguments);
    };
  }), qn.DismissReason = Q, qn.version = "10.11.1";
  var Dn = qn;
  return Dn["default"] = Dn;
}), void 0 !== this && this.Sweetalert2 && (this.swal = this.sweetAlert = this.Swal = this.SweetAlert = this.Sweetalert2);
"undefined" != typeof document && function (e, t) {
  var n = e.createElement("style");
  if (e.getElementsByTagName("head")[0].appendChild(n), n.styleSheet) n.styleSheet.disabled || (n.styleSheet.cssText = t);else try {
    n.innerHTML = t;
  } catch (e) {
    n.innerText = t;
  }
}(document, ".swal2-popup.swal2-toast{flex-direction:row;align-items:center;width:auto;padding:.625em;overflow-y:hidden;background:#fff;box-shadow:0 0 .625em #d9d9d9}.swal2-popup.swal2-toast .swal2-header{flex-direction:row;padding:0}.swal2-popup.swal2-toast .swal2-title{flex-grow:1;justify-content:flex-start;margin:0 .6em;font-size:1em}.swal2-popup.swal2-toast .swal2-footer{margin:.5em 0 0;padding:.5em 0 0;font-size:.8em}.swal2-popup.swal2-toast .swal2-close{position:static;width:.8em;height:.8em;line-height:.8}.swal2-popup.swal2-toast .swal2-content{justify-content:flex-start;padding:0;font-size:1em}.swal2-popup.swal2-toast .swal2-icon{width:2em;min-width:2em;height:2em;margin:0}.swal2-popup.swal2-toast .swal2-icon .swal2-icon-content{display:flex;align-items:center;font-size:1.8em;font-weight:700}@media all and (-ms-high-contrast:none),(-ms-high-contrast:active){.swal2-popup.swal2-toast .swal2-icon .swal2-icon-content{font-size:.25em}}.swal2-popup.swal2-toast .swal2-icon.swal2-success .swal2-success-ring{width:2em;height:2em}.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line]{top:.875em;width:1.375em}.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left]{left:.3125em}.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right]{right:.3125em}.swal2-popup.swal2-toast .swal2-actions{flex-basis:auto!important;width:auto;height:auto;margin:0 .3125em;padding:0}.swal2-popup.swal2-toast .swal2-styled{margin:0 .3125em;padding:.3125em .625em;font-size:1em}.swal2-popup.swal2-toast .swal2-styled:focus{box-shadow:0 0 0 1px #fff,0 0 0 3px rgba(100,150,200,.5)}.swal2-popup.swal2-toast .swal2-success{border-color:#a5dc86}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line]{position:absolute;width:1.6em;height:3em;transform:rotate(45deg);border-radius:50%}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=left]{top:-.8em;left:-.5em;transform:rotate(-45deg);transform-origin:2em 2em;border-radius:4em 0 0 4em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=right]{top:-.25em;left:.9375em;transform-origin:0 1.5em;border-radius:0 4em 4em 0}.swal2-popup.swal2-toast .swal2-success .swal2-success-ring{width:2em;height:2em}.swal2-popup.swal2-toast .swal2-success .swal2-success-fix{top:0;left:.4375em;width:.4375em;height:2.6875em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line]{height:.3125em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line][class$=tip]{top:1.125em;left:.1875em;width:.75em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line][class$=long]{top:.9375em;right:.1875em;width:1.375em}.swal2-popup.swal2-toast .swal2-success.swal2-icon-show .swal2-success-line-tip{-webkit-animation:swal2-toast-animate-success-line-tip .75s;animation:swal2-toast-animate-success-line-tip .75s}.swal2-popup.swal2-toast .swal2-success.swal2-icon-show .swal2-success-line-long{-webkit-animation:swal2-toast-animate-success-line-long .75s;animation:swal2-toast-animate-success-line-long .75s}.swal2-popup.swal2-toast.swal2-show{-webkit-animation:swal2-toast-show .5s;animation:swal2-toast-show .5s}.swal2-popup.swal2-toast.swal2-hide{-webkit-animation:swal2-toast-hide .1s forwards;animation:swal2-toast-hide .1s forwards}.swal2-container{display:flex;position:fixed;z-index:1060;top:0;right:0;bottom:0;left:0;flex-direction:row;align-items:center;justify-content:center;padding:.625em;overflow-x:hidden;transition:background-color .1s;-webkit-overflow-scrolling:touch}.swal2-container.swal2-backdrop-show,.swal2-container.swal2-noanimation{background:rgba(0,0,0,.4)}.swal2-container.swal2-backdrop-hide{background:0 0!important}.swal2-container.swal2-top{align-items:flex-start}.swal2-container.swal2-top-left,.swal2-container.swal2-top-start{align-items:flex-start;justify-content:flex-start}.swal2-container.swal2-top-end,.swal2-container.swal2-top-right{align-items:flex-start;justify-content:flex-end}.swal2-container.swal2-center{align-items:center}.swal2-container.swal2-center-left,.swal2-container.swal2-center-start{align-items:center;justify-content:flex-start}.swal2-container.swal2-center-end,.swal2-container.swal2-center-right{align-items:center;justify-content:flex-end}.swal2-container.swal2-bottom{align-items:flex-end}.swal2-container.swal2-bottom-left,.swal2-container.swal2-bottom-start{align-items:flex-end;justify-content:flex-start}.swal2-container.swal2-bottom-end,.swal2-container.swal2-bottom-right{align-items:flex-end;justify-content:flex-end}.swal2-container.swal2-bottom-end>:first-child,.swal2-container.swal2-bottom-left>:first-child,.swal2-container.swal2-bottom-right>:first-child,.swal2-container.swal2-bottom-start>:first-child,.swal2-container.swal2-bottom>:first-child{margin-top:auto}.swal2-container.swal2-grow-fullscreen>.swal2-modal{display:flex!important;flex:1;align-self:stretch;justify-content:center}.swal2-container.swal2-grow-row>.swal2-modal{display:flex!important;flex:1;align-content:center;justify-content:center}.swal2-container.swal2-grow-column{flex:1;flex-direction:column}.swal2-container.swal2-grow-column.swal2-bottom,.swal2-container.swal2-grow-column.swal2-center,.swal2-container.swal2-grow-column.swal2-top{align-items:center}.swal2-container.swal2-grow-column.swal2-bottom-left,.swal2-container.swal2-grow-column.swal2-bottom-start,.swal2-container.swal2-grow-column.swal2-center-left,.swal2-container.swal2-grow-column.swal2-center-start,.swal2-container.swal2-grow-column.swal2-top-left,.swal2-container.swal2-grow-column.swal2-top-start{align-items:flex-start}.swal2-container.swal2-grow-column.swal2-bottom-end,.swal2-container.swal2-grow-column.swal2-bottom-right,.swal2-container.swal2-grow-column.swal2-center-end,.swal2-container.swal2-grow-column.swal2-center-right,.swal2-container.swal2-grow-column.swal2-top-end,.swal2-container.swal2-grow-column.swal2-top-right{align-items:flex-end}.swal2-container.swal2-grow-column>.swal2-modal{display:flex!important;flex:1;align-content:center;justify-content:center}.swal2-container.swal2-no-transition{transition:none!important}.swal2-container:not(.swal2-top):not(.swal2-top-start):not(.swal2-top-end):not(.swal2-top-left):not(.swal2-top-right):not(.swal2-center-start):not(.swal2-center-end):not(.swal2-center-left):not(.swal2-center-right):not(.swal2-bottom):not(.swal2-bottom-start):not(.swal2-bottom-end):not(.swal2-bottom-left):not(.swal2-bottom-right):not(.swal2-grow-fullscreen)>.swal2-modal{margin:auto}@media all and (-ms-high-contrast:none),(-ms-high-contrast:active){.swal2-container .swal2-modal{margin:0!important}}.swal2-popup{display:none;position:relative;box-sizing:border-box;flex-direction:column;justify-content:center;width:32em;max-width:100%;padding:1.25em;border:none;border-radius:5px;background:#fff;font-family:inherit;font-size:1rem}.swal2-popup:focus{outline:0}.swal2-popup.swal2-loading{overflow-y:hidden}.swal2-header{display:flex;flex-direction:column;align-items:center;padding:0 1.8em}.swal2-title{position:relative;max-width:100%;margin:0 0 .4em;padding:0;color:#595959;font-size:1.875em;font-weight:600;text-align:center;text-transform:none;word-wrap:break-word}.swal2-actions{display:flex;z-index:1;box-sizing:border-box;flex-wrap:wrap;align-items:center;justify-content:center;width:100%;margin:1.25em auto 0;padding:0 1.6em}.swal2-actions:not(.swal2-loading) .swal2-styled[disabled]{opacity:.4}.swal2-actions:not(.swal2-loading) .swal2-styled:hover{background-image:linear-gradient(rgba(0,0,0,.1),rgba(0,0,0,.1))}.swal2-actions:not(.swal2-loading) .swal2-styled:active{background-image:linear-gradient(rgba(0,0,0,.2),rgba(0,0,0,.2))}.swal2-loader{display:none;align-items:center;justify-content:center;width:2.2em;height:2.2em;margin:0 1.875em;-webkit-animation:swal2-rotate-loading 1.5s linear 0s infinite normal;animation:swal2-rotate-loading 1.5s linear 0s infinite normal;border-width:.25em;border-style:solid;border-radius:100%;border-color:#2778c4 transparent #2778c4 transparent}.swal2-styled{margin:.3125em;padding:.625em 1.1em;box-shadow:none;font-weight:500}.swal2-styled:not([disabled]){cursor:pointer}.swal2-styled.swal2-confirm{border:0;border-radius:.25em;background:initial;background-color:#2778c4;color:#fff;font-size:1.0625em}.swal2-styled.swal2-deny{border:0;border-radius:.25em;background:initial;background-color:#d14529;color:#fff;font-size:1.0625em}.swal2-styled.swal2-cancel{border:0;border-radius:.25em;background:initial;background-color:#757575;color:#fff;font-size:1.0625em}.swal2-styled:focus{outline:0;box-shadow:0 0 0 3px rgba(100,150,200,.5)}.swal2-styled::-moz-focus-inner{border:0}.swal2-footer{justify-content:center;margin:1.25em 0 0;padding:1em 0 0;border-top:1px solid #eee;color:#545454;font-size:1em}.swal2-timer-progress-bar-container{position:absolute;right:0;bottom:0;left:0;height:.25em;overflow:hidden;border-bottom-right-radius:5px;border-bottom-left-radius:5px}.swal2-timer-progress-bar{width:100%;height:.25em;background:rgba(0,0,0,.2)}.swal2-image{max-width:100%;margin:1.25em auto}.swal2-close{position:absolute;z-index:2;top:0;right:0;align-items:center;justify-content:center;width:1.2em;height:1.2em;padding:0;overflow:hidden;transition:color .1s ease-out;border:none;border-radius:5px;background:0 0;color:#ccc;font-family:serif;font-size:2.5em;line-height:1.2;cursor:pointer}.swal2-close:hover{transform:none;background:0 0;color:#f27474}.swal2-close:focus{outline:0;box-shadow:inset 0 0 0 3px rgba(100,150,200,.5)}.swal2-close::-moz-focus-inner{border:0}.swal2-content{z-index:1;justify-content:center;margin:0;padding:0 1.6em;color:#545454;font-size:1.125em;font-weight:400;line-height:normal;text-align:center;word-wrap:break-word}.swal2-checkbox,.swal2-file,.swal2-input,.swal2-radio,.swal2-select,.swal2-textarea{margin:1em auto}.swal2-file,.swal2-input,.swal2-textarea{box-sizing:border-box;width:100%;transition:border-color .3s,box-shadow .3s;border:1px solid #d9d9d9;border-radius:.1875em;background:inherit;box-shadow:inset 0 1px 1px rgba(0,0,0,.06);color:inherit;font-size:1.125em}.swal2-file.swal2-inputerror,.swal2-input.swal2-inputerror,.swal2-textarea.swal2-inputerror{border-color:#f27474!important;box-shadow:0 0 2px #f27474!important}.swal2-file:focus,.swal2-input:focus,.swal2-textarea:focus{border:1px solid #b4dbed;outline:0;box-shadow:0 0 0 3px rgba(100,150,200,.5)}.swal2-file::-moz-placeholder,.swal2-input::-moz-placeholder,.swal2-textarea::-moz-placeholder{color:#ccc}.swal2-file:-ms-input-placeholder,.swal2-input:-ms-input-placeholder,.swal2-textarea:-ms-input-placeholder{color:#ccc}.swal2-file::placeholder,.swal2-input::placeholder,.swal2-textarea::placeholder{color:#ccc}.swal2-range{margin:1em auto;background:#fff}.swal2-range input{width:80%}.swal2-range output{width:20%;color:inherit;font-weight:600;text-align:center}.swal2-range input,.swal2-range output{height:2.625em;padding:0;font-size:1.125em;line-height:2.625em}.swal2-input{height:2.625em;padding:0 .75em}.swal2-input[type=number]{max-width:10em}.swal2-file{background:inherit;font-size:1.125em}.swal2-textarea{height:6.75em;padding:.75em}.swal2-select{min-width:50%;max-width:100%;padding:.375em .625em;background:inherit;color:inherit;font-size:1.125em}.swal2-checkbox,.swal2-radio{align-items:center;justify-content:center;background:#fff;color:inherit}.swal2-checkbox label,.swal2-radio label{margin:0 .6em;font-size:1.125em}.swal2-checkbox input,.swal2-radio input{margin:0 .4em}.swal2-input-label{display:flex;justify-content:center;margin:1em auto}.swal2-validation-message{display:none;align-items:center;justify-content:center;margin:0 -2.7em;padding:.625em;overflow:hidden;background:#f0f0f0;color:#666;font-size:1em;font-weight:300}.swal2-validation-message::before{content:\"!\";display:inline-block;width:1.5em;min-width:1.5em;height:1.5em;margin:0 .625em;border-radius:50%;background-color:#f27474;color:#fff;font-weight:600;line-height:1.5em;text-align:center}.swal2-icon{position:relative;box-sizing:content-box;justify-content:center;width:5em;height:5em;margin:1.25em auto 1.875em;border:.25em solid transparent;border-radius:50%;font-family:inherit;line-height:5em;cursor:default;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.swal2-icon .swal2-icon-content{display:flex;align-items:center;font-size:3.75em}.swal2-icon.swal2-error{border-color:#f27474;color:#f27474}.swal2-icon.swal2-error .swal2-x-mark{position:relative;flex-grow:1}.swal2-icon.swal2-error [class^=swal2-x-mark-line]{display:block;position:absolute;top:2.3125em;width:2.9375em;height:.3125em;border-radius:.125em;background-color:#f27474}.swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left]{left:1.0625em;transform:rotate(45deg)}.swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right]{right:1em;transform:rotate(-45deg)}.swal2-icon.swal2-error.swal2-icon-show{-webkit-animation:swal2-animate-error-icon .5s;animation:swal2-animate-error-icon .5s}.swal2-icon.swal2-error.swal2-icon-show .swal2-x-mark{-webkit-animation:swal2-animate-error-x-mark .5s;animation:swal2-animate-error-x-mark .5s}.swal2-icon.swal2-warning{border-color:#facea8;color:#f8bb86}.swal2-icon.swal2-info{border-color:#9de0f6;color:#3fc3ee}.swal2-icon.swal2-question{border-color:#c9dae1;color:#87adbd}.swal2-icon.swal2-success{border-color:#a5dc86;color:#a5dc86}.swal2-icon.swal2-success [class^=swal2-success-circular-line]{position:absolute;width:3.75em;height:7.5em;transform:rotate(45deg);border-radius:50%}.swal2-icon.swal2-success [class^=swal2-success-circular-line][class$=left]{top:-.4375em;left:-2.0635em;transform:rotate(-45deg);transform-origin:3.75em 3.75em;border-radius:7.5em 0 0 7.5em}.swal2-icon.swal2-success [class^=swal2-success-circular-line][class$=right]{top:-.6875em;left:1.875em;transform:rotate(-45deg);transform-origin:0 3.75em;border-radius:0 7.5em 7.5em 0}.swal2-icon.swal2-success .swal2-success-ring{position:absolute;z-index:2;top:-.25em;left:-.25em;box-sizing:content-box;width:100%;height:100%;border:.25em solid rgba(165,220,134,.3);border-radius:50%}.swal2-icon.swal2-success .swal2-success-fix{position:absolute;z-index:1;top:.5em;left:1.625em;width:.4375em;height:5.625em;transform:rotate(-45deg)}.swal2-icon.swal2-success [class^=swal2-success-line]{display:block;position:absolute;z-index:2;height:.3125em;border-radius:.125em;background-color:#a5dc86}.swal2-icon.swal2-success [class^=swal2-success-line][class$=tip]{top:2.875em;left:.8125em;width:1.5625em;transform:rotate(45deg)}.swal2-icon.swal2-success [class^=swal2-success-line][class$=long]{top:2.375em;right:.5em;width:2.9375em;transform:rotate(-45deg)}.swal2-icon.swal2-success.swal2-icon-show .swal2-success-line-tip{-webkit-animation:swal2-animate-success-line-tip .75s;animation:swal2-animate-success-line-tip .75s}.swal2-icon.swal2-success.swal2-icon-show .swal2-success-line-long{-webkit-animation:swal2-animate-success-line-long .75s;animation:swal2-animate-success-line-long .75s}.swal2-icon.swal2-success.swal2-icon-show .swal2-success-circular-line-right{-webkit-animation:swal2-rotate-success-circular-line 4.25s ease-in;animation:swal2-rotate-success-circular-line 4.25s ease-in}.swal2-progress-steps{flex-wrap:wrap;align-items:center;max-width:100%;margin:0 0 1.25em;padding:0;background:inherit;font-weight:600}.swal2-progress-steps li{display:inline-block;position:relative}.swal2-progress-steps .swal2-progress-step{z-index:20;flex-shrink:0;width:2em;height:2em;border-radius:2em;background:#2778c4;color:#fff;line-height:2em;text-align:center}.swal2-progress-steps .swal2-progress-step.swal2-active-progress-step{background:#2778c4}.swal2-progress-steps .swal2-progress-step.swal2-active-progress-step~.swal2-progress-step{background:#add8e6;color:#fff}.swal2-progress-steps .swal2-progress-step.swal2-active-progress-step~.swal2-progress-step-line{background:#add8e6}.swal2-progress-steps .swal2-progress-step-line{z-index:10;flex-shrink:0;width:2.5em;height:.4em;margin:0 -1px;background:#2778c4}[class^=swal2]{-webkit-tap-highlight-color:transparent}.swal2-show{-webkit-animation:swal2-show .3s;animation:swal2-show .3s}.swal2-hide{-webkit-animation:swal2-hide .15s forwards;animation:swal2-hide .15s forwards}.swal2-noanimation{transition:none}.swal2-scrollbar-measure{position:absolute;top:-9999px;width:50px;height:50px;overflow:scroll}.swal2-rtl .swal2-close{right:auto;left:0}.swal2-rtl .swal2-timer-progress-bar{right:0;left:auto}@supports (-ms-accelerator:true){.swal2-range input{width:100%!important}.swal2-range output{display:none}}@media all and (-ms-high-contrast:none),(-ms-high-contrast:active){.swal2-range input{width:100%!important}.swal2-range output{display:none}}@-webkit-keyframes swal2-toast-show{0%{transform:translateY(-.625em) rotateZ(2deg)}33%{transform:translateY(0) rotateZ(-2deg)}66%{transform:translateY(.3125em) rotateZ(2deg)}100%{transform:translateY(0) rotateZ(0)}}@keyframes swal2-toast-show{0%{transform:translateY(-.625em) rotateZ(2deg)}33%{transform:translateY(0) rotateZ(-2deg)}66%{transform:translateY(.3125em) rotateZ(2deg)}100%{transform:translateY(0) rotateZ(0)}}@-webkit-keyframes swal2-toast-hide{100%{transform:rotateZ(1deg);opacity:0}}@keyframes swal2-toast-hide{100%{transform:rotateZ(1deg);opacity:0}}@-webkit-keyframes swal2-toast-animate-success-line-tip{0%{top:.5625em;left:.0625em;width:0}54%{top:.125em;left:.125em;width:0}70%{top:.625em;left:-.25em;width:1.625em}84%{top:1.0625em;left:.75em;width:.5em}100%{top:1.125em;left:.1875em;width:.75em}}@keyframes swal2-toast-animate-success-line-tip{0%{top:.5625em;left:.0625em;width:0}54%{top:.125em;left:.125em;width:0}70%{top:.625em;left:-.25em;width:1.625em}84%{top:1.0625em;left:.75em;width:.5em}100%{top:1.125em;left:.1875em;width:.75em}}@-webkit-keyframes swal2-toast-animate-success-line-long{0%{top:1.625em;right:1.375em;width:0}65%{top:1.25em;right:.9375em;width:0}84%{top:.9375em;right:0;width:1.125em}100%{top:.9375em;right:.1875em;width:1.375em}}@keyframes swal2-toast-animate-success-line-long{0%{top:1.625em;right:1.375em;width:0}65%{top:1.25em;right:.9375em;width:0}84%{top:.9375em;right:0;width:1.125em}100%{top:.9375em;right:.1875em;width:1.375em}}@-webkit-keyframes swal2-show{0%{transform:scale(.7)}45%{transform:scale(1.05)}80%{transform:scale(.95)}100%{transform:scale(1)}}@keyframes swal2-show{0%{transform:scale(.7)}45%{transform:scale(1.05)}80%{transform:scale(.95)}100%{transform:scale(1)}}@-webkit-keyframes swal2-hide{0%{transform:scale(1);opacity:1}100%{transform:scale(.5);opacity:0}}@keyframes swal2-hide{0%{transform:scale(1);opacity:1}100%{transform:scale(.5);opacity:0}}@-webkit-keyframes swal2-animate-success-line-tip{0%{top:1.1875em;left:.0625em;width:0}54%{top:1.0625em;left:.125em;width:0}70%{top:2.1875em;left:-.375em;width:3.125em}84%{top:3em;left:1.3125em;width:1.0625em}100%{top:2.8125em;left:.8125em;width:1.5625em}}@keyframes swal2-animate-success-line-tip{0%{top:1.1875em;left:.0625em;width:0}54%{top:1.0625em;left:.125em;width:0}70%{top:2.1875em;left:-.375em;width:3.125em}84%{top:3em;left:1.3125em;width:1.0625em}100%{top:2.8125em;left:.8125em;width:1.5625em}}@-webkit-keyframes swal2-animate-success-line-long{0%{top:3.375em;right:2.875em;width:0}65%{top:3.375em;right:2.875em;width:0}84%{top:2.1875em;right:0;width:3.4375em}100%{top:2.375em;right:.5em;width:2.9375em}}@keyframes swal2-animate-success-line-long{0%{top:3.375em;right:2.875em;width:0}65%{top:3.375em;right:2.875em;width:0}84%{top:2.1875em;right:0;width:3.4375em}100%{top:2.375em;right:.5em;width:2.9375em}}@-webkit-keyframes swal2-rotate-success-circular-line{0%{transform:rotate(-45deg)}5%{transform:rotate(-45deg)}12%{transform:rotate(-405deg)}100%{transform:rotate(-405deg)}}@keyframes swal2-rotate-success-circular-line{0%{transform:rotate(-45deg)}5%{transform:rotate(-45deg)}12%{transform:rotate(-405deg)}100%{transform:rotate(-405deg)}}@-webkit-keyframes swal2-animate-error-x-mark{0%{margin-top:1.625em;transform:scale(.4);opacity:0}50%{margin-top:1.625em;transform:scale(.4);opacity:0}80%{margin-top:-.375em;transform:scale(1.15)}100%{margin-top:0;transform:scale(1);opacity:1}}@keyframes swal2-animate-error-x-mark{0%{margin-top:1.625em;transform:scale(.4);opacity:0}50%{margin-top:1.625em;transform:scale(.4);opacity:0}80%{margin-top:-.375em;transform:scale(1.15)}100%{margin-top:0;transform:scale(1);opacity:1}}@-webkit-keyframes swal2-animate-error-icon{0%{transform:rotateX(100deg);opacity:0}100%{transform:rotateX(0);opacity:1}}@keyframes swal2-animate-error-icon{0%{transform:rotateX(100deg);opacity:0}100%{transform:rotateX(0);opacity:1}}@-webkit-keyframes swal2-rotate-loading{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}@keyframes swal2-rotate-loading{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown){overflow:hidden}body.swal2-height-auto{height:auto!important}body.swal2-no-backdrop .swal2-container{top:auto;right:auto;bottom:auto;left:auto;max-width:calc(100% - .625em * 2);background-color:transparent!important}body.swal2-no-backdrop .swal2-container>.swal2-modal{box-shadow:0 0 10px rgba(0,0,0,.4)}body.swal2-no-backdrop .swal2-container.swal2-top{top:0;left:50%;transform:translateX(-50%)}body.swal2-no-backdrop .swal2-container.swal2-top-left,body.swal2-no-backdrop .swal2-container.swal2-top-start{top:0;left:0}body.swal2-no-backdrop .swal2-container.swal2-top-end,body.swal2-no-backdrop .swal2-container.swal2-top-right{top:0;right:0}body.swal2-no-backdrop .swal2-container.swal2-center{top:50%;left:50%;transform:translate(-50%,-50%)}body.swal2-no-backdrop .swal2-container.swal2-center-left,body.swal2-no-backdrop .swal2-container.swal2-center-start{top:50%;left:0;transform:translateY(-50%)}body.swal2-no-backdrop .swal2-container.swal2-center-end,body.swal2-no-backdrop .swal2-container.swal2-center-right{top:50%;right:0;transform:translateY(-50%)}body.swal2-no-backdrop .swal2-container.swal2-bottom{bottom:0;left:50%;transform:translateX(-50%)}body.swal2-no-backdrop .swal2-container.swal2-bottom-left,body.swal2-no-backdrop .swal2-container.swal2-bottom-start{bottom:0;left:0}body.swal2-no-backdrop .swal2-container.swal2-bottom-end,body.swal2-no-backdrop .swal2-container.swal2-bottom-right{right:0;bottom:0}@media print{body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown){overflow-y:scroll!important}body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown)>[aria-hidden=true]{display:none}body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown) .swal2-container{position:static!important}}body.swal2-toast-shown .swal2-container{background-color:transparent}body.swal2-toast-shown .swal2-container.swal2-top{top:0;right:auto;bottom:auto;left:50%;transform:translateX(-50%)}body.swal2-toast-shown .swal2-container.swal2-top-end,body.swal2-toast-shown .swal2-container.swal2-top-right{top:0;right:0;bottom:auto;left:auto}body.swal2-toast-shown .swal2-container.swal2-top-left,body.swal2-toast-shown .swal2-container.swal2-top-start{top:0;right:auto;bottom:auto;left:0}body.swal2-toast-shown .swal2-container.swal2-center-left,body.swal2-toast-shown .swal2-container.swal2-center-start{top:50%;right:auto;bottom:auto;left:0;transform:translateY(-50%)}body.swal2-toast-shown .swal2-container.swal2-center{top:50%;right:auto;bottom:auto;left:50%;transform:translate(-50%,-50%)}body.swal2-toast-shown .swal2-container.swal2-center-end,body.swal2-toast-shown .swal2-container.swal2-center-right{top:50%;right:0;bottom:auto;left:auto;transform:translateY(-50%)}body.swal2-toast-shown .swal2-container.swal2-bottom-left,body.swal2-toast-shown .swal2-container.swal2-bottom-start{top:auto;right:auto;bottom:0;left:0}body.swal2-toast-shown .swal2-container.swal2-bottom{top:auto;right:auto;bottom:0;left:50%;transform:translateX(-50%)}body.swal2-toast-shown .swal2-container.swal2-bottom-end,body.swal2-toast-shown .swal2-container.swal2-bottom-right{top:auto;right:0;bottom:0;left:auto}body.swal2-toast-column .swal2-toast{flex-direction:column;align-items:stretch}body.swal2-toast-column .swal2-toast .swal2-actions{flex:1;align-self:stretch;height:2.2em;margin-top:.3125em}body.swal2-toast-column .swal2-toast .swal2-loading{justify-content:center}body.swal2-toast-column .swal2-toast .swal2-input{height:2em;margin:.3125em auto;font-size:1em}body.swal2-toast-column .swal2-toast .swal2-validation-message{font-size:1em}");

/***/ }),

/***/ "./resources/admin_asset/sass/vender.scss":
/*!************************************************!*\
  !*** ./resources/admin_asset/sass/vender.scss ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** multi ./resources/admin_asset/libadminlte/js/adminlte.min.js ./resources/admin_asset/lib/jquery/jquery-3.2.1.min.js ./resources/admin_asset/lib/bootstrap-4.5.3-dist/js/bootstrap.min.js ./resources/admin_asset/lib/char/js/Chart.min.js ./resources/admin_asset/lib/sweetalert2/js/sweetalert2.all.min.js ./resources/admin_asset/sass/vender.scss ***!
  \************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

!(function webpackMissingModule() { var e = new Error("Cannot find module 'D:\\xampp\\htdocs\\php-laravel\\webbanhang\\resources\\admin_asset\\libadminlte\\js\\adminlte.min.js'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
__webpack_require__(/*! D:\xampp\htdocs\php-laravel\webbanhang\resources\admin_asset\lib\jquery\jquery-3.2.1.min.js */"./resources/admin_asset/lib/jquery/jquery-3.2.1.min.js");
__webpack_require__(/*! D:\xampp\htdocs\php-laravel\webbanhang\resources\admin_asset\lib\bootstrap-4.5.3-dist\js\bootstrap.min.js */"./resources/admin_asset/lib/bootstrap-4.5.3-dist/js/bootstrap.min.js");
__webpack_require__(/*! D:\xampp\htdocs\php-laravel\webbanhang\resources\admin_asset\lib\char\js\Chart.min.js */"./resources/admin_asset/lib/char/js/Chart.min.js");
__webpack_require__(/*! D:\xampp\htdocs\php-laravel\webbanhang\resources\admin_asset\lib\sweetalert2\js\sweetalert2.all.min.js */"./resources/admin_asset/lib/sweetalert2/js/sweetalert2.all.min.js");
module.exports = __webpack_require__(/*! D:\xampp\htdocs\php-laravel\webbanhang\resources\admin_asset\sass\vender.scss */"./resources/admin_asset/sass/vender.scss");


/***/ })

/******/ });