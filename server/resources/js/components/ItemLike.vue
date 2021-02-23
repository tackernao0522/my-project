<template>
  <div>
    <button
     type="button"
     class="btn m-0 p-1 shadow-none"
    >
      <i class="fas fa-heart mr1"
       :class="{'red-text':this.isLikedBy}"
      />
    </button>
    {{ countLikes }}
  </div>
</template>

<script>
  export default {
    props: {
      initialIsLikedBy: {
        type: Boolean,
        default: false,
      },
      initialCountLiked: {
        type: Number,
        default: 0,
      }
    },
    data() {
      return {
        isLikedBy: this.initialIsLikedBy,
        countLikes: this.initialCountLikes,
      }
    },
  }
</script>
