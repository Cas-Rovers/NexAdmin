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

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

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

window.$ = $;

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

Alpine.start();
window.Alpine = Alpine;

/*
 * Importing Bootstrap
 *
 * Bootstrap is a popular front-end framework for developing responsive and mobile-first websites.
 * It contains CSS- and JavaScript-based design templates for typography, forms, buttons, navigation, and other interface Components.
 *
 * Key Features:
 * – Responsive design
 * – Mobile-first approach
 * – Extensive prebuilt Components
 * – Powerful JavaScript plugins
 * – Customizable via Sass variables and mixins
 *
 * Documentation: https://getbootstrap.com/docs/5.3/
 */
import 'bootstrap';

/*
 * Importing D3.js
 *
 * D3.js is a JavaScript library for producing dynamic, interactive data visualizations in web browsers.
 * It uses HTML, SVG, and CSS. D3 helps you bring data to life using HTML, SVG, and CSS. D3’s emphasis on web standards gives you the full capabilities of modern browsers without tying yourself to a proprietary framework.
 *
 * Key Features:
 * – Bind arbitrary data to a Document Object Model (DOM)
 * – Apply data-driven transformations to the document
 * – Support for modern web standards
 * – Rich set of built-in functions for data manipulation and visualization
 * – Compatibility with other web technologies
 *
 * Documentation: https://d3js.org/
 */
import * as d3 from 'd3';

window.d3 = d3;

/*
 * Toast Notification Utility
 *
 * This script imports the `showToast` function, which enables the creation and management of toast notifications within a web application.
 * Toast notifications provide brief, non-intrusive messages that offer feedback to users and automatically disappear after a set duration,
 * although they can be manually dismissed by the user.
 *
 * Features:
 * – Customizable Types: Supports various notification types including info, warning, error, and success.
 * – Dynamic Icons: Icons are automatically chosen based on the notification type.
 * – Auto-Close Functionality: Notifications automatically close after a specified time, with a progress bar showing the remaining duration.
 * – Manual Close Option: Users can close notifications manually via a close button.
 * – Hover Interaction: The progress bar pauses when hovered over and resumes when the mouse is moved away.
 *
 * Usage Instructions:
 * – Import the `showToast` function from `./components/toast.js`.
 * – Assign `showToast` to `window.showToast` to make it globally accessible.
 * – Display a notification by calling `window.showToast(type, title, message)`, where `type` specifies the notification type, `title` is the notification's title, and `message` is the notification's content.
 */
import { showToast } from './components/toast.js';

window.showToast = showToast;
