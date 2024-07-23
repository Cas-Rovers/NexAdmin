/*
 * Importing the Axios library for making HTTP requests
 *
 * Axios is a promise-based HTTP client for the browser and Node.js.
 * It provides a simple and easy-to-use API for performing various HTTP requests such as GET, POST, PUT, DELETE.
 * Axios supports request and response interceptors, transformation of request and response data, cancellation of requests, and automatic transformation of JSON data.
 *
 * Key Features:
 * – Make XMLHttpRequests from the browser
 * – Make HTTP requests from Node.js
 * – Supports the Promise API
 * – Intercept request and response
 * – Transform request and response data
 * – Cancel requests
 * – Automatic transforms for JSON data
 * – Client-side support for protecting against XSRF
 *
 * Documentation: https://axios-http.com/docs/intro
 */
import axios from 'axios';

/*
 * Importing jQuery
 *
 * jQuery is a fast, small, and feature-rich JavaScript library. It makes things like HTML document traversal and manipulation, event handling, and animation much simpler with an easy-to-use API that works across a multitude of browsers.
 *
 * Key Features:
 * – HTML/DOM manipulation
 * – Event handling
 * – CSS manipulation
 * – Effects and animations
 * – AJAX
 * – Utilities
 *
 * Documentation: https://jquery.com/
 */
import $ from 'jquery';

/*
 * Importing Alpine.js
 *
 * Alpine.js is a lightweight JavaScript framework for adding interactivity to HTML.
 * It offers a simple and declarative way to handle user interactions and state management.
 *
 * Key Features:
 * – Lightweight and fast
 * – Simple syntax similar to Vue.js
 * – Reactive data binding
 * – Easy integration with existing projects
 *
 * Documentation: https://alpinejs.dev/start
 */
import Alpine from 'alpinejs';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

Alpine.start();
window.Alpine = Alpine

window.$ = $;
