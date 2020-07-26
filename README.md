# Description
A movie streaming ecommerce website created using vanilla PHP, Javascript ans CSS (plus a little bootsrap 4). The website allows users to buy or rent movies according to the viewing quality[480p, 720p, 1080p] and _rent period (if rented)_. This was 

## Note:

**Folders containing video files have not been uploaded which were placed under the folders NetMovie and NetVideo. The names of the movies were replaced with the ids of the movie and were stored in folders 480p, 720p and 1080p according to quality.**

**For development server MAMP Pro was used to create a custom url `http://dev.netscope.com` so it doesn't show `http://localhost:_port`**

All login credentials are encrypted using md5. 

The website has its own admin dashboard for admins to add/delete or change pricing of movies on the site as well as to interact with purchase verification and so on.

For streaming VLC Streaming was initially used but due to low performance it was scrapped and used the regular videoplayback where the site calls for the location details. 

## API

To get information about movies [The MovieDB API](https://www.themoviedb.org/documentation/api) was used.
