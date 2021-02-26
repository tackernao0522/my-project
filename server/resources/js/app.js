require('./bootstrap');

import Vue from 'vue'
import ItemLike from './components/ItemLike'
import FollowButton from './components/FollowButton'

const item = new Vue({
  el: '#item',
  components: {
    ItemLike,
    FollowButton,
  }
})

document.querySelector('.image-picker input')
  .addEventListener('change', (e) => {
    const input = e.target;
    const reader = new FileReader();
    reader.onload = (e) => {
      input.closest('.image-picker').querySelector('img').src = e.target.result
    };
    reader.readAsDataURL(input.files[0]);
  });
