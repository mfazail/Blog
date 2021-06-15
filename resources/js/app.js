require("./bootstrap");

require("alpinejs");

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
var firebaseConfig = {
    apiKey: "AIzaSyBt6ZENsh_Y5CuJEeUemBIDUW7zJHvOtPk",
    authDomain: "ftblog-in.firebaseapp.com",
    projectId: "ftblog-in",
    storageBucket: "ftblog-in.appspot.com",
    messagingSenderId: "544857094878",
    appId: "1:544857094878:web:86a1bc8269083849f0204f",
    measurementId: "G-ZP5VT0CENR",
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
firebase.analytics();