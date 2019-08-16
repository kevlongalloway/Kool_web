<template>
  <!--MODAL -->
    <div class="modal" id="addPlaylistToClassModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Select students</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <ul v-if="user.playlists.length" class="list-group">
                <li v-for="playlist in user.playlists" :key="playlist.id" class="list-group-item">
                  <a href="javascript:void(0)" @click="addPlaylistToClass(playlist.id)">{{playlist.name}}</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Finish</button>
          </div>
        </div>
      </div>
    </div>
    <!--MODAL -->
</template>

<script>
export default {
  
}
</script>
