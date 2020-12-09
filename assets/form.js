import 'bootstrap';
import './styles/app.scss';



const $ = require('jquery');
require('bootstrap');

var btn = document.getElementById('myBtn');
btn.addEventListener('click', function() {
  document.location.href = '/';
});