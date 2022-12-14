const firebaseConfig = {
apiKey: "<?php echo env('FIREBASE_APIKEY') ?>",
authDomain: "<?php echo env('FIREBASE_AUTH_DOMAIN') ?>",
databaseURL: "<?php echo env('FIREBASE_DATABASE_URL') ?>",
projectId: "<?php echo env('FIREBASE_PROJECT_ID') ?>",
storageBucket: "<?php echo env('FIREBASE_STORAGE_BUCKET') ?>",
messagingSenderId: "<?php echo env('FIREBASE_MESSAAGING_SENDER_ID') ?>",
appId: "<?php echo env('FIREBASE_APP_ID') ?>",
measurementId: "<?php echo env('FIREBASE_MEASUREMENT_ID') ?>",

};
firebase.initializeApp(firebaseConfig);    
const firestore = firebase.firestore();
// Initialize Firebase
<?php /*  apiKey: "AIzaSyCEEU5Ky0SXPckGPLMBP27zlbNttuwPR4k",
  authDomain: "foodies-3c1d9.firebaseapp.com",
  databaseURL: "https://foodies-3c1d9-default-rtdb.firebaseio.com",
  projectId: "foodies-3c1d9",
  storageBucket: "foodies-3c1d9.appspot.com",
  messagingSenderId: "275231286183",
  appId: "1:275231286183:web:b2a20286b8df80499d0c82",
  measurementId: "G-KTWQ93G1PT" */ ?>
	