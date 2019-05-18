

<template>
     <form method="post" :action="bookFormAction">
        <input name="_method" type="hidden" value="PUT" v-if="update">
        <input type="hidden" name="_token" :value="csrf">
        <div class="form-group">
            <label>Title</label>
            <input class="form-control" name="title" v-model="bookTitle" v-on:keyup="checkTitle">
        </div>
        <div class="form-group">
            <label>Author</label>
            <input class="form-control" name="author">
        </div>
        <button type="submit" id="submit-book" :class="submitClass">{{submitText}}</button>
    </form>
</template>
<script>
    const Http = new XMLHttpRequest();
    const GET_BOOKS = '/books/getBooks'

    function getBooks(callback) {
        Http.open("GET", GET_BOOKS);
        Http.send();
        Http.onreadystatechange=callback;
    }

    function getCSRF() { 
        return document.querySelector('meta[name="csrf-token"]').getAttribute('content') 
    }

    export default {
        data() {
            return {
                csrf: getCSRF(),
                submitText: 'Add',
                submitClass: 'btn btn-primary',
                bookTitle: '',
                bookFormAction: '/books',
                books: '',
                update: false
            }
        },
        methods: {
            checkTitle: function() {
                let existing = false;
                let bookTitle = this.bookTitle;
                let id = ''

                this.books.forEach(function(book) {
                    if (book.title === bookTitle) {
                        existing = true;
                        id = book.id;
                    }
                });

                if (existing == true) {
                    this.submitText = 'Update';
                    this.submitClass = 'btn btn-success';
                    this.update = true;
                    this.bookFormAction = '/books/' + id;
                }
                else {
                    this.submitText = 'Add';
                    this.submitClass = 'btn btn-primary';
                    this.update = false;
                    this.bookFormAction = '/books';
                }
            },
            updateBooks: function() {
                this.books = eval(Http.responseText);
            }
        },
        beforeMount() {
            getBooks(this.updateBooks);
        }
    }
</script>