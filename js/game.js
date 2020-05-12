$(document).ready(function() {
                  
      var key = 'AIzaSyDN7_HNL4d1oswYcWOb8ZUMLIc5W2ELbxU';         
      var playlistId = 'PLhNeRwBqkeSXB7NTqyD28UgveRgaY2w7P';
      var URL = 'https://www.googleapis.com/youtube/v3/playlistItems'
      
      var options = {
        part: 'snippet',
        key: key,
        maxResults: 20,
        playlistId: playlistId
      }
      
      loadVids();
      function loadVids() {
        $.getJSON(URL, options, function(data){
          //console.log(data);
          var id = data.items[0].snippet.resourceId.videoId;
          mainVid(id);
          resultsLoop(data);
        });
      }
      
      function mainVid(id) {
        $('#video').html(`
          <iframe width="660" height="415" src="https://www.youtube.com/embed/${id}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        `);
      }
      
      function resultsLoop(data) {
        
        $.each(data.items, function(i, item) {
          
          var thumb = item.snippet.thumbnails.medium.url;
          var title = item.snippet.title;
          var desc = item.snippet.description.substring(0, 100);
          var vid = item.snippet.resourceId.videoId;
          
          $('#mainvid').append(`
          <article class="item" data-key="${vid}">
          <img src="${thumb}" alt="" class="thumb">
          <div class="details">
            <h5>${title}</h5>
            <p>${desc}</p>
          </div>
          </article>
          `);
          
        });
       
        
      }
      $('main').on('click', 'article', function() {
          var id = $(this).attr('data-key');
          mainVid(id);
            
      });
      
    });