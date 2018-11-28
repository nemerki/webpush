// Initialize Firebase
var config = {
    apiKey: "AIzaSyBbvhXBDzSnri5lJS-E7iwwNW74SzxuKLY",
    authDomain: "push-not-7debe.firebaseapp.com",
    databaseURL: "https://push-not-7debe.firebaseio.com",
    projectId: "push-not-7debe",
    storageBucket: "",
    messagingSenderId: "81798583542"
};
firebase.initializeApp(config);

const messaging = firebase.messaging();
messaging.requestPermission().then(function() {
    console.log('Notification permission granted.');
    if(isTokenSentToServer()) {
        console.log('Token already saved');
    } else {
        getRegToken();
    }

}).catch(function(err) {
    console.log('Unable to get permission to notify.', err);
});
function getRegToken() {
    messaging.getToken().then(function(currentToken) {
        if (currentToken) {
            //sendTokenToServer(currentToken);
            saveToken(currentToken);
            console.log(currentToken);
            setTokenSentToServer(true);
        } else {
            console.log('No Instance ID token available. Request permission to generate one.');
            setTokenSentToServer(false);
        }
    }).catch(function(err) {
        console.log('An error occurred while retrieving token. ', err);
        setTokenSentToServer(false);
    });
}

function setTokenSentToServer(sent) {
    window.localStorage.setItem('sentToServer', sent ? '1' : '0');
}

function isTokenSentToServer() {
    return window.localStorage.getItem('sentToServer') === '1';
}

function saveToken(currentToken) {
    $.ajax({
        url: 'index.php',
        method: 'post',
        data: 'token=' + currentToken

    }).done(function (result) {
        console.log(result);
    })



}