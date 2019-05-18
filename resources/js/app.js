/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
const Http = new XMLHttpRequest();

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


 function getBooks(callback) {
    const url='/books/getBooks';
    Http.open("GET", url);
    Http.send();
    Http.onreadystatechange=callback;
 }

const app = new Vue({
    el: '#app',
    data: {
        submitText: 'Add',
        submitClass: 'btn btn-primary',
        bookFormTitle: '',
        books: ''
    },
    methods: {
        updateButton: function () {
            let existing = false;
            let bookFormTitle = this.bookFormTitle

            this.books.forEach(function(book) {
                console.log(this.bookFormTitle === book.title, this.bookFormTitle, book.title)
                if (bookFormTitle === book.title) {
                    existing = true;
                }
            });

            if (existing) {
                this.submitText = 'Edit';
                this.submitClass = 'btn btn-success';

            }
            else {
                this.submitText = 'Add';
                this.submitClass = 'btn btn-primary';
            }
        },
        updateBooks: function() {
            this.books = eval(Http.responseText);
        }
    },
    beforeMount(){
        getBooks(this.updateBooks);
    }
});